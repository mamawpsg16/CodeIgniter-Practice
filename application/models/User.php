<?php 
class User extends  CI_Model{

    public function getUsers(){
        $query = $this->db->get('users');  
        return $query->result();
    }

    public function findStudent($id){
       $query = $this->db->get_where('users', array('id' => $id));
       return $query->row();
    }

    public function createStudent($data){
        return $this->db->insert('users',$data);
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
