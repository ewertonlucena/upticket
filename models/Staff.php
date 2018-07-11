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
        unset($_SESSION['ccUser']);
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
}
