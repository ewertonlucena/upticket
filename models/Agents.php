<?php
class Agents extends model {
    
    public function getTeamInfo($id) {
        
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM staff WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getAgentsList() {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM staff");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
}
