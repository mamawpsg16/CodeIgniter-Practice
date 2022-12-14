<?php 
class User extends  CI_Model{

    public function getUsers(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('users');  
        return $query->result();
    }

    public function getPdfUserDetails(){
        // $this->db->select('email, CONCAT(user_firstname, '.', user_surname) AS name',FALSE);
        $this->db->select('CONCAT(first_name,'.', last_name) AS name, email,   phone_number, address,', FALSE);
        // $this->db->from('users');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('users');  
        return $query->result();
    }

    public function findStudent($id){
       $query = $this->db->get_where('users', array('id' => $id));
       return $query->row();
    }

    public function createStudent($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    public function updateStudent($data,$id){
       return $this->db->update('users', $data, array('id' => $id));
    }

    public function deleteStudent($id){
        return $this->db->delete('users',array('id' => $id));
    }

    public function checkEmail($email,$id){
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email !=',$email);
        $this->db->where('id !=',$id);
        return $this->db->get();
    }
    
}
