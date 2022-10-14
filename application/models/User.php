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

    public function updateStudent($data){
        return $this->db->update('users',$data);
    }

    public function deleteStudent($id){
        return $this->db->delete('users', array('id' => $id));
    }
    
}
