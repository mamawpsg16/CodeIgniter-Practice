<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
class UserController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }
    
    public function index()
    {
        // $this->load->library(['Smartyci' => 'sm']);


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
        $user = $this->User->findStudent($id);

        $this->load->view('layout/header');
        $this->load->view('user/show', ['user' => $user]);
        $this->load->view('layout/footer');
    }

    public function edit($id)
    {
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
        
        $user = $this->User->deleteStudent($id);
        if ($user) {
            $this->session->set_flashdata('destroy', 'User deleted successfully!');
            $this->index();
        }
        // return $user;
    }

    // public function exportPdf(){
    //     // die('user/exportPdf');
    //     $pdf = new FPDF();
    //     $pdf->AddPage(['L','A4']);
    //     $pdf->SetFont('Arial','B',16);
    //     $pdf->Image('assets/images/uploads/default.png',10,10,40);
    //     // $pdf->Cell(195,10,'Users',1,0,'C');
    //     $pdf->Ln(25);
    //     $pdf->Cell(270,10,'Users',0,0,'C');
    //     $pdf->Ln(20);
    //     $pdf->SetX(20);
    //     $pdf->Cell(70,10,'Name',1);
    //     $pdf->Cell(70,10,'Email',1);
    //     $pdf->Cell(45,10,'Phone Number',1);
    //     $pdf->Cell(70,10,'Address',1);
    //     $pdf->Ln();
    //     $this->load->model('User');
    //     $users = $this->User->getPdfUserDetails();
    //     // Data
    //     foreach($users as $key => $value)
    //     {
    //         $pdf->SetX(20);
    //         foreach($value as $key => $col)
    //         { 
    //             if($key != 'id' && $key != 'image' && $key != 'first_name' && $key != 'phone_number'){
    //                 $pdf->Cell(70,10,$col,1);
    //             }
                    
    //             if($key == 'phone_number'){
    //                 $pdf->Cell(45,10,$col,1);
    //             }
    //         }
            
    //         $pdf->Ln();

    //     }
    //     $pdf->Output();
    //     // Line break
    // }

    public function exportPDF(){
        $dompdf = new Dompdf();
        $users = $this->User->getUsers();
        // die(print_r($users));
        // $html = '<link type="text/css" href="/assets/css/style.css" rel="stylesheet" />';
        $html= $this->load->view('pdf/user-pdf',array('users'=>$users),true);
        $dompdf->set_option('isRemoteEnabled',true);
        $dompdf->setPaper('A4','Landscape');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('my.pdf',array('Attachment'=> 0));
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
}
