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
       
    public function getLeaderId($id) {
        
        
        
    }
}

