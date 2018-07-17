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
    
    public function validName($name) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM staff WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
    
    public function validLogin($login) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM staff WHERE login = :login");
        $sql->bindValue(':login', $login);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
}
