<?php
class Staff extends model{
    
    public function isLogged(){
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
            return true;
        } else {
            return false;
        }
    }

    public function getName(){
        return 'Ewerton';
    }

    public function getStaffQuant(){
        $sql = "SELECT COUNT(*) as c FROM staff";
        $sql = $this->db->query($sql);
        
        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            return $sql['c'];
        } else {
            return 0;
        }
    }
}
