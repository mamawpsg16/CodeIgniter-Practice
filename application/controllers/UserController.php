<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller{
    public function index(){
        $this->load->model('User');
        $user = new User();
        // $user = $this->User->getData();
        // echo $user->getData('IT');
        $this->load->view('layout/header');
        $this->load->view('user/index');
        $this->load->view('layout/footer');
    }
    
    public function create(){
        $this->load->view('user/create');
    }
    
    public function show($id){
        $this->load->model('User');
        $user = new User();
        // $student = $this->User->findStudent($id);
        $student = $user->findStudent($id);
        print_r($student);
        $this->load->view('user/show',['id' => $id]);
    }
}