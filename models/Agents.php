<?php
class Agents extends model {
    
    public function getAgentInfo($id) {
        
        $return = array();
        
        $sql = $this->db->prepare("SELECT * FROM staff WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetch();
        }
        
        return $return;
    }
    
    public function getAgentsList() {
        $return = array();

        $sql = $this->db->prepare("SELECT * FROM staff");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $return = $sql->fetchAll();
        }
        return $return;
    }
    
    public function addAgent($post) {
        extract($post);
        
        $sql = $this->db->prepare(""
                . "INSERT INTO staff SET "                
                . "full_name = :full_name, "
                . "name = :name, "
                . "login = :login, "
                . "pass = :pass, "
                . "email = :email, "
                . "phone = :phone, "
                . "mobile = :mobile, "
                . "admin_notes = :admin_notes, "
                . "department = :department, "
                . "id_teams = :id_teams, "
                . "p_group = :p_group, "
                . "active = :active, "
                . "admin = :admin, "
                . "vacation = :vacation, "
                . "dir_list_show = :dir_list_show, "
                . "only_assigned = :only_assigned, "
                . "create_date = :create_date");
        $sql->bindValue(':full_name', $full_name);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':login', $login);
        $sql->bindValue(':pass', md5($pass));
        $sql->bindValue(':email', $email);
        $sql->bindValue(':phone', $phone);
        $sql->bindValue(':mobile', $mobile);
        $sql->bindValue(':admin_notes', $notes);
        $sql->bindValue(':department', $department);
        $sql->bindValue(':id_teams', $team);
        $sql->bindValue(':p_group', $p_group);
        $sql->bindValue(':active', $active);
        $sql->bindValue(':admin', $admin);
        $sql->bindValue(':vacation', $vacation);
        $sql->bindValue(':dir_list_show', $dir_list_show);
        $sql->bindValue(':only_assigned', $only_assigned);
        $sql->bindValue(':create_date', date('Y-m-d H:i:s'));
        $sql->execute();    
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function editAgent($post) {
        extract($post);
        
        $sql = $this->db->prepare(""
                . "UPDATE staff SET "                
                . "full_name = :full_name, "
                . "name = :name, "
                . "login = :login, "
                . "pass = :pass, "                
                . "email = :email, "
                . "phone = :phone, "
                . "mobile = :mobile, "
                . "admin_notes = :admin_notes, "
                . "department = :department, "
                . "id_teams = :id_teams, "
                . "p_group = :p_group, "
                . "active = :active, "
                . "admin = :admin, "
                . "vacation = :vacation, "
                . "dir_list_show = :dir_list_show, "
                . "only_assigned = :only_assigned, "
                . "update_date = :update_date "
                . "WHERE id = :id");
        $sql->bindValue(':full_name', $full_name);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':login', $login);       
        $sql->bindValue(':pass', $pass); 
        $sql->bindValue(':email', $email);
        $sql->bindValue(':phone', $phone);
        $sql->bindValue(':mobile', $mobile);
        $sql->bindValue(':admin_notes', $notes);
        $sql->bindValue(':department', $department);
        $sql->bindValue(':id_teams', $team);
        $sql->bindValue(':p_group', $p_group);
        $sql->bindValue(':active', $active);
        $sql->bindValue(':admin', $admin);
        $sql->bindValue(':vacation', $vacation);
        $sql->bindValue(':dir_list_show', $dir_list_show);
        $sql->bindValue(':only_assigned', $only_assigned);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->bindValue(':id', $id);
        $sql->execute();    
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function enableAgent($ids) {        
        $sql = $this->db->prepare("UPDATE staff SET active = 1, update_date = :update_date WHERE id IN ($ids)");        
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;   
    }
    
    public function disableAgent($ids) {        
        $sql = $this->db->prepare("UPDATE staff SET active = 0, update_date = :update_date WHERE id IN ($ids)");        
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;   
    }
    
    public function deleteAgents($ids) {
        
        $sql = $this->db->prepare("DELETE FROM staff WHERE id IN ($ids)");        
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
    }
    
    public function changeAgentsTeam($ids, $team) {
        $sql = $this->db->prepare("UPDATE staff SET id_teams = :id_teams, update_date = :update_date WHERE id IN ($ids)");
        $sql->bindValue(':id_teams', $team);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;  
    }
    
    public function changeAgentsDepartment($ids, $department) {
        $sql = $this->db->prepare("UPDATE staff SET department = :department, update_date = :update_date WHERE id IN ($ids)");
        $sql->bindValue(':department', $department);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;  
    }
    
    public function changeAgentsGroup($ids, $group) {
        $sql = $this->db->prepare("UPDATE staff SET p_group = :p_group, update_date = :update_date WHERE id IN ($ids)");
        $sql->bindValue(':p_group', $group);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;  
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
