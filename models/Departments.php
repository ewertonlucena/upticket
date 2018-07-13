<?php

class Departments extends model {
    
    public function getDepartmentInfo($id) {
        
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM departments WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getDepartmentsList() {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM departments");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
       
    public function addDepartment($name, $email, $signature) {
        
        $sql = $this->db->prepare(""
                . "INSERT INTO "
                . "departments "
                . "SET "
                . "active = 1, "
                . "name = :name, "
                . "email = :email, "
                . "signature = :signature, "
                . "create_date = :create_date");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':signature', $signature);
        $sql->bindValue(':create_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $rows = $sql->rowCount();
        
        return $rows;
        
        
    }
    
    public function validName($name) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT name FROM departments WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = 1;
        }
        
        return $return;
    }
}

