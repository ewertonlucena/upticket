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
    
    public function getCategoryInfo($id) {
        $sql = $this->db->prepare("SELECT * FROM help_topics WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        return $sql->fetch();
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
                . "priority = :priority, "
                . "create_date = :create_date");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id_department', $id_department);
        $sql->bindValue(':description', $description);
        $sql->bindValue(':priority', $priority);
        $sql->bindValue(':create_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function editCategory($id, $name, $id_department, $priority, $description) {
        $sql = $this->db->prepare(""
                . "UPDATE "
                . "help_topics "
                . "SET "
                . "name = :name, "
                . "id_department = :id_department, "
                . "description = :description, "
                . "priority = :priority, "
                . "update_date = :update_date "
                . "WHERE "
                . "id = :id");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id_department', $id_department);
        $sql->bindValue(':description', $description);
        $sql->bindValue(':priority', $priority);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function enableCategories($ids) {        
        $sql = $this->db->prepare("UPDATE help_topics SET active = 1, update_date = :update_date WHERE id IN ($ids)");        
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();        
    }
    
    public function disableCategories($ids) {        
        $sql = $this->db->prepare("UPDATE help_topics SET active = 0, update_date = :update_date WHERE id IN ($ids)");        
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function deleteCategories($ids) {        
        $sql = $this->db->prepare("DELETE FROM help_topics WHERE id IN ($ids)");        
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function changeCategoriesDepartment($ids, $department) {
        $sql = $this->db->prepare("UPDATE help_topics SET id_department = :id_department, update_date = :update_date WHERE id IN ($ids)");
        $sql->bindValue(':id_department', $department);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();        
        
        return $sql->rowCount();
    }
}   
