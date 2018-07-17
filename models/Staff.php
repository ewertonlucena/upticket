<?php
class Staff extends model {

    private $staffInfo;
    private $permissions;

    public function isLogged() {
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            return true;
        } else {
            return false;
        }
    }

    public function doLogin($login, $pass) {

        $sql = $this->db->prepare("SELECT * FROM staff WHERE login = :login AND pass = :pass");
        $sql->bindValue(':login', $login);
        $sql->bindValue(':pass', md5($pass));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $this->staffInfo = $sql->fetch();
            $_SESSION['ccUser'] = $this->staffInfo['id'];
            $id = $_SESSION['ccUser'];
            $sql = $this->db->prepare("UPDATE staff SET last_login = :last_login WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':last_login', date('Y-m-d H:i:s'));
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }
     
    public function setLoggedStaff() {
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) { 
            $id = $_SESSION['ccUser'];
            
            $sql = $this->db->prepare("SELECT * FROM staff WHERE id = :id");
            $sql->bindValue(':id', $id);            
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $this->staffInfo = $sql->fetch();
                $this->permissions = new Permissions();
                $this->permissions->setGroup($this->staffInfo['p_group']);
            }
        }
    }
    
    public function hasPermission($param){
        return $this->permissions->hasPermission($param);
    }

    public function logout() {
        $id = $_SESSION['ccUser'];
        $sql = $this->db->prepare("UPDATE staff SET last_login = :last_login WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':last_login', date('Y-m-d H:i:s'));
        $sql->execute();
        
        unset($_SESSION['ccUser']);
    }
    
    public function isAdmin() {
        if (isset($this->staffInfo['admin'])) {
            return $this->staffInfo['admin'];
        } else {
            return 0;
        }
    }


    public function getName() {
        if (isset($this->staffInfo['name'])) {
            return $this->staffInfo['name'];
        } else {
            return 0;
        }
    }
    
    public function hasGroupMembers($ids) {
        $array = array();
        $params = implode(',', $ids);
        
        $sql = $this->db->prepare("SELECT p_group FROM staff WHERE p_group IN ($params)");
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            $array = array_unique(array_column($array,'p_group'));            
        }
        
        return $array;
    }
    
    public function getDepartmentTotalMembers($id_department) {
        
        
        $sql = $this->db->prepare("SELECT * FROM staff WHERE department = :id_department");
        $sql->bindValue(':id_department', $id_department);
        $sql->execute();
        
        $return = $sql->rowCount();
        
        return $return;
        
    }
    
    public function getNameById($id) {
        $return = '';
        
        $sql = $this->db->prepare("SELECT name FROM staff WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $return = $sql->fetchColumn();
        }
        return $return;
    }
}
