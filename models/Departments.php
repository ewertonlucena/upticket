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
    
    public function editDepartment($id, $name, $email, $signature) {
        $sql = $this->db->prepare(""
                . "UPDATE "
                . "departments "
                . "SET "
                . "name = :name, "
                . "email = :email, "
                . "signature = :signature, "
                . "update_date = :update_date "
                . "WHERE id = :id"); 
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':signature', $signature);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        $rows = $sql->rowCount();
        
        return $rows;
    }
    
    public function hasMembers($ids) {
        $sql = $this->db->prepare("SELECT id_department FROM view_department_staff WHERE id_department IN ($ids)");
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
        
    }
    
    public function deleteDepartments($ids) {
        
        $sql = $this->db->prepare("DELETE FROM departments WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function enableDepartments($ids) {
        $sql = $this->db->prepare("UPDATE departments SET active = 1 WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function disableDepartments($ids) {
        $sql = $this->db->prepare("UPDATE departments SET active = 0 WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function validName($name) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM departments WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
}

