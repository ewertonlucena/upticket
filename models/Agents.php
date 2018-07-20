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
