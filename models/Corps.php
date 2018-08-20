<?php
class Corps extends model { 
    
    
     public function validName($name) {  
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM corporations WHERE fantasy = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();        
        }
        
        return $return;
    }
}
