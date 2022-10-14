<?php 
class User extends  CI_Model{
    public $class_name;

    // public function __construct($class_name){
    //     $this->class_name = $class_name;
    // }
    
    public function getData($class){
        return 'Student Name: '. 'Kevin Mensah'.' Class: '. $class;
    }

    public function findStudent($id){
        if($id == 1){
            return 'Student : Kevin Mensah';
        }else{
            return 'Student : Kenneth Mensah';
        }
    }
    
}
?>