<?php
class Views extends model {
 
    public function getAgentDepartment($id) {
        $return = false;
        
        $sql = $this->db->prepare("SELECT department FROM view_department_staff WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $return = $sql->fetchColumn();
        }        
        return $return;                
    }
    
    public function getDepartmentMembers($id) {
        $return = array();
        
        $sql = $this->db->prepare("SELECT id, name FROM view_department_staff WHERE id_department = :id_department");
        $sql->bindValue(':id_department', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $return = $sql->fetchAll();
        }
        
        return $return;
    }
    
    public function getDepartmentLeader($id) {
        $return = array();
        
        $sql = $this->db->prepare("SELECT id FROM view_departments_leaders WHERE id_department = :id_department");
        $sql->bindValue(':id_department', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $return = $sql->fetch();
        }
        
        return $return;
    }
    
    public function getTeamMembers($id) {
        $return = array();
        
        $sql = $this->db->prepare("SELECT id, name FROM view_teams_members WHERE id_team = :id_team");
        $sql->bindValue(':id_team', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $return = $sql->fetchAll();
        }
        
        return $return;
    }
    
    public function getTeamLeader($id) {
        $return = array();
        
        $sql = $this->db->prepare("SELECT id FROM view_teams_leaders WHERE id_team = :id_team");
        $sql->bindValue(':id_team', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $return = $sql->fetch();
        }
        
        return $return;
    }
    
    public function getCategoriesDepartment($id_cat) {
        $sql = $this->db->prepare("SELECT department FROM view_categories_departments WHERE id_cat = :id_cat");
        $sql->bindValue(':id_cat', $id_cat);
        $sql->execute();
        
        return $sql->fetchColumn();
    }
}
