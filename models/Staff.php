<?php
class Staff extends model{
    
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

