<?php
class Teams extends model {
    
    public function getTeamInfo($id) {
        
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM teams WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        
        return $array;
    }
    
    public function getTeamsList() {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM teams");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getTeamMembers($id) {
        
        $sql = $this->db->prepare(""
                . "SELECT "
                . "* "
                . "FROM "
                . "view_teams_members "
                . "WHERE "
                . "id_team = :id_team");
        $sql->bindValue(':id_team', $id);
        $sql->execute();
        
        $return = $sql->rowCount();        
        
        return $return;
    }
    
    public function getTeamLeader($id) {
        $return = false;
        
        $sql = $this->db->prepare(""
                . "SELECT "
                . "leader "
                . "FROM "
                . "view_teams_leaders "
                . "WHERE "
                . "id_team = :id_team");
        $sql->bindValue(':id_team', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
    
    public function addTeam($name, $notes) {
        
        $sql = $this->db->prepare("INSERT INTO teams SET active = 1, name = :name, admin_notes = :notes, create_date = :create_date");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':notes', $notes);
        $sql->bindValue(':create_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;        
    }
    
    public function editTeam($id, $name, $leader, $notes) {
        
        $sql = $this->db->prepare("UPDATE teams SET name = :name, id_leader = :id_leader, admin_notes = :notes, update_date = :update_date WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id_leader', $leader);
        $sql->bindValue(':notes', $notes);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;        
    }
    
    public function hasTeamMembers($ids) {
        $sql = $this->db->prepare("SELECT id_team FROM view_teams_members WHERE id_team IN ($ids)");
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
        
    }
    
    public function enableTeams($ids) {
        $sql = $this->db->prepare("UPDATE teams SET active = 1 WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function disableTeams($ids) {
        $sql = $this->db->prepare("UPDATE teams SET active = 0 WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function deleteTeams($ids) {
        
        $sql = $this->db->prepare("DELETE FROM teams WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function validName($name) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM teams WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
    
}
