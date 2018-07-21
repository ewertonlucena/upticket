<?php
class Categories extends model { 
    
    public function getCategoriesList() {
        
        $sql = $this->db->prepare("SELECT * FROM help_topics");
        $sql->execute();
        
        return $sql->fetchAll();
    }
}
