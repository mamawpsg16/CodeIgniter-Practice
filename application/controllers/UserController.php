<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserController extends CI_Controller
{
    public function index()
    {
        $this->load->model('User');
        $users = $this->User->getUsers();
        $this->load->view('layout/delete-modal');
        $this->load->view('layout/header');
        $this->load->view('user/index',['users' => $users]);
        $this->load->view('layout/footer');
    }

    public function create()
    {
        $this->load->view('layout/header');
        $this->load->view('user/create');
        $this->load->view('layout/footer');
    }
    
    public function store()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[11]|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() != FALSE) {
            $data = $this->input->post(array('first_name', 'last_name', 'email', 'address', 'phone_number'));
            $this->load->model('User');
            $this->User->createStudent($data);
            $this->session->set_flashdata('store', 'User added successfully!');
            redirect(base_url(('users')));
        }else{
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
        $this->load->view('user/edit', ['user' => $user]);
        $this->load->view('layout/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_unique_email['.$id.']');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[11]|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $data = $this->input->post(array('first_name', 'last_name', 'email', 'address', 'phone_number'));
        
        $this->load->model('User');
        // $email_unique = $this->User->checkEmail($this->input->post('email'),$id);
        
        if ($this->form_validation->run() != FALSE) {
            echo 'SHIT';
            $data = $this->input->post(array('first_name', 'last_name', 'email', 'address', 'phone_number'));
            $this->User->updateStudent($data,$id);
            $this->session->set_flashdata('update', 'User updated successfully!');
            $this->edit($id);
        }
        else{
            // echo 'SHIT';
            $this->edit($id);
        }
    }

    public function destroy($id)
    {
        $this->load->model('User');
        $user = $this->User->deleteStudent($id);
        if($user){
            $this->session->set_flashdata('destroy', 'User deleted successfully!');
            $this->index();
        }
        // return $user;
    }

    function unique_email($email,$id){
        $this->db->select('id,email,first_name');
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('id !=',$id);
        $result = $this->db->get();

        if($result->row()){
            $this->form_validation->set_message('unique_email', 'The email is already taken!');
            return false;
    
        }
        return true;
    }

    

}
