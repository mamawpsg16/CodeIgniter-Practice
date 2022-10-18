<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserController extends CI_Controller
{
    public function index()
    {
        // $this->load->library(['Smartyci' => 'sm']);


        $this->load->model('User');
        $data['users'] = $this->User->getUsers();
        // $this->load->view('layout/delete-modal');
        // $this->load->view('layout/header');
        $data['flash_store'] = $this->session->flashdata('store');
        // $flash_destroy = $this->session->flashdata('destroy');
        $data['flash_update'] = $this->session->flashdata('update');

        $this->sm->assign($data);
        $this->sm->display('user/index.tpl');
        // $this->sm->display('layout/footer.tpl');
        // $this->load->view('layout/footer');
    }

    public function create()
    {
        $this->load->view('layout/header');
        $this->sm->display('user/create.tpl');
        $this->load->view('layout/footer');
    }

    public function store()
    {
        $this->load->model('User');
        $config['upload_path']          = 'assets/images/uploads';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = uniqid().time();
        
        $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|callback_validate');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|callback_validate|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|callback_validate|min_length[11]|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|callback_validate');

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run() != FALSE) {
            $data = $this->input->post(array('first_name', 'last_name', 'email', 'address', 'phone_number'));
            $user_id = $this->User->createStudent($data);
            if ($this->upload->do_upload('image')) {
                $data = ['image' => $this->upload->data()['file_name']];
                    $this->db->update('users', $data,  array('id' => $user_id));
            }
            $this->session->set_flashdata('store', 'User added successfully!');
            redirect(base_url(('users')));
        } else {
            $this->create();
        }
    }

    public function show($id)
    {
        $this->load->model('User');
        $user = $this->User->findStudent($id);

        $this->load->view('layout/header');
        $this->load->view('user/show', ['user' => $user]);
        $this->load->view('layout/footer');
    }

    public function edit($id)
    {
        $this->load->model('User');
        $user = $this->User->findStudent($id);
        $this->load->view('layout/header');
        // $this->load->view('user/edit', ['user' => $user]);
        $this->sm->assign('user', $user);
        $this->sm->display('user/edit.tpl');
        $this->load->view('layout/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|callback_validate');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|callback_validate');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|callback_unique_email[' . $id . ']');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[11]|trim|callback_validate');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|callback_validate');
        $data = $this->input->post(array('first_name', 'last_name', 'email', 'address', 'phone_number'));

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        $config['upload_path']          = 'assets/images/uploads';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']            = uniqid().time();
        $this->load->library('upload', $config);

        $this->load->model('User');
        // $email_unique = $this->User->checkEmail($this->input->post('email'),$id);

        if ($this->form_validation->run() != FALSE) {
            $data = $this->input->post(array('first_name', 'last_name', 'email', 'address', 'phone_number'));
            $this->User->updateStudent($data, $id);
            if ($this->upload->do_upload('image')) {
                $data = ['image' => $this->upload->data()['file_name']];
                    $this->db->update('users', $data,  array('id' => $id));
            }
            $this->session->set_flashdata('update', 'User updated successfully!');
            redirect(base_url('users'));
        } else {
            $this->edit($id);
        }
    }

    public function destroy($id)
    {
        $this->load->model('User');
        $user = $this->User->deleteStudent($id);
        if ($user) {
            $this->session->set_flashdata('destroy', 'User deleted successfully!');
            $this->index();
        }
        // return $user;
    }

    function unique_email($email, $id)
    {
        $this->db->select('id,email');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('id !=', $id);
        $result = $this->db->get();

        if ($result->row()) {
            $this->form_validation->set_message('unique_email', 'The email is already taken!');
            return false;
        }
        return true;
    }

    function validate($value)
    {
        $val = trim($value);
        if(!preg_match('/^[a-zA-Z0-9_., ]*$/',$val)){
            $this->form_validation->set_message('validate', '{field} must be Alpha Numerics with Spaces Only!');
            return false;
        }
        return true;
    }

    // function validate_image($image){
      

    //     $this->load->library('upload', $config);

    //     if ( ! $this->upload->do_upload('image'))
    //     {
    //             // $error = array('error' => $this->upload->display_errors());
    //             $this->form_validation->set_message('validate', '{field} {$this->upload->display_errors()}!');
    //             return false;
    //     }
    //     else
    //     {
    //             $data = array('upload_data' => $this->upload->data());
    //             return true;


    //     }
    // }
}
