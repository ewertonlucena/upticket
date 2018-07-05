<?php
class Permissions extends model {
    
    private $group;
    private $permissions;
    
    public function setGroup($id) {
        $this->group = $id;
        $this->permissions = array();
        
        $sql = $this->db->prepare("SELECT params FROM permissions_groups WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $row = $sql->fetch();
            
            if(empty($row['params'])) {
                $row['params'] = 0;
            }
            
            $params = $row['params'];
            
            $sql = $this->db->prepare("SELECT name FROM permissions_params WHERE id IN ($params)");            
            $sql->execute();
            
            if($sql->rowCount() > 0) {
                $params = $sql->fetchAll();
                foreach($params as $item) {
                    $this->permissions[] = $item['name'];
                }
            }   
        }          
    }
    
    public function hasPermission($param) {
        if(in_array($param, $this->permissions)){
            return true;
        } else {
            return false;
        }
    }
}
