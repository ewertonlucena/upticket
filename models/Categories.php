<?php
class Categories extends model { 
    
    public function getCategoriesList() {
        
        $sql = $this->db->prepare("SELECT * FROM help_topics");
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function validName($name) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM help_topics WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
    
    public function addCategory($name, $id_department, $priority, $description) {
        $sql = $this->db->prepare(""
                . "INSERT INTO "
                . "help_topics "
                . "SET "
                . "active = 1, "
                . "name = :name, "
                . "id_department = :id_department, "
                . "description = :description, "
                . "priority = :priority");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id_department', $id_department);
        $sql->bindValue(':description', $description);
        $sql->bindValue(':priority', $priority);
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function addCategory($id, $name, $id_department, $priority, $description) {
        $sql = $this->db->prepare(""
                . "INSERT INTO "
                . "help_topics "
                . "SET "
                . "active = 1, "
                . "name = :name, "
                . "id_department = :id_department, "
                . "description = :description, "
                . "priority = :priority");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id_department', $id_department);
        $sql->bindValue(':description', $description);
        $sql->bindValue(':priority', $priority);
        $sql->execute();
        
        return $sql->rowCount();
    }
}   
