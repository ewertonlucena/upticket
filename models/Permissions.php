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

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();

            if (empty($row['params'])) {
                $row['params'] = 0;
            }

            $params = $row['params'];          
            
            $sql = $this->db->prepare("SELECT name FROM permissions_params WHERE id IN ($params)");
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $params = $sql->fetchAll();
                foreach ($params as $item) {
                    $this->permissions[] = $item['name'];
                }
            }
        }
    }

    public function hasPermission($param) {
        if (in_array($param, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }
    
    

    public function getGroupList() {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM permissions_groups");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    
    public function getGroupName($ids) {
        $array = array();
        $params = implode(',', $ids);
        
        $sql = $this->db->prepare("SELECT name FROM permissions_groups WHERE id IN ($params)");
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
            $array = array_column($array, 'name');
        }
        return $array;
    }
    
    public function getGroupInfo($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM permissions_groups WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;        
    }


    public function addGroup($name, $notes, $params) {        
        $sql = $this->db->prepare("INSERT INTO permissions_groups SET active = 1, name = :name, params = :params, admin_notes = :notes, create_date = :create_date");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':params', $params);
        $sql->bindValue(':notes', $notes);
        $sql->bindValue(':create_date', date('Y-m-d H:i:s'));
        $sql->execute();
    }
    
    public function editGroup($id, $name, $notes, $params) {
        $sql = $this->db->prepare("UPDATE permissions_groups SET name = :name, params = :params, admin_notes = :notes, update_date = :update_date WHERE id = :id"); 
        $sql->bindValue(':name', $name);
        $sql->bindValue(':params', $params);
        $sql->bindValue(':notes', $notes);
        $sql->bindValue(':update_date', date('Y-m-d H:i:s'));
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
    
    public function enableGroups($ids) {
        $params = implode(',', $ids);
        
        $sql = $this->db->prepare("UPDATE permissions_groups SET active = 1 WHERE id IN ($params)");
        $sql->execute();
    }
    
    public function disableGroups($ids) {
        $params = implode(',', $ids);
        
        $sql = $this->db->prepare("UPDATE permissions_groups SET active = 0 WHERE id IN ($params)");
        $sql->execute();
    }
    
    public function deleteGroups($ids) {
        $params = implode(',', $ids);        
        $staff = new Staff();
        $array = $this->getGroupName($staff->hasGroupMembers($ids));
        
        
        if(empty($array)) {
            $sql = $this->db->prepare("DELETE FROM permissions_groups WHERE id IN ($params)");
            $sql->execute();          
        }
        
        return $array;
    }  
    
    public function getPermissionsList() {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM permissions_params");
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        
        return $array;
    }
    
    public function getPermissionInfo($id) {
        $array = array();
        
        $sql = $this->db->prepare("SELECT * FROM permissions_params WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        
        return $array;
    }

    public function addPermission($group, $name, $description) {
        
        $sql = $this->db->prepare("INSERT INTO permissions_params SET p_group = :group, name = :name, description = :description");
        $sql->bindValue(":group", $group);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":description", $description);
        $sql->execute();
    }
    
    public function editPermission($id, $group, $name, $description) {
        
        $sql = $this->db->prepare("UPDATE permissions_params SET p_group = :group, name = :name, description = :description WHERE id = :id");
        $sql->bindValue(":group", $group);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":description", $description);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function deletePermissions($ids) {
        
        $params = join(',', $ids);
        
        $sql = $this->db->prepare("DELETE FROM permissions_params WHERE id IN ($params)");
        $sql->execute();        
    }
    
    public function validName($name) {        
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM permissions_groups WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();
        }
        
        return $return;
    }
}
