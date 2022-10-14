<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserController extends CI_Controller
{
    public function index()
    {
        $this->load->model('User');
        $users = $this->User->getUsers();
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
            redirect(base_url(('users')));
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
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[11]|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() != FALSE) {
            $data = $this->input->input_stream(array('first_name', 'last_name', 'email', 'address', 'phone_number'));
            $this->load->model('User');
            $user = $this->User->updateStudent($data);
            print_r($user);
            redirect(base_url(('users/edit/'.$user->id)));
        }
    }

    public function destroy($id)
    {
        $this->load->model('User');
        $user = $this->User->deleteStudent($id);
        if($user){
            $this->index();
        }
    }

}
