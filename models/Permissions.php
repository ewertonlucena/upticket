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
        $GroupList = array();

        $sql = $this->db->prepare("SELECT * FROM permissions_groups");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $GroupList = $sql->fetchAll();
        }
        return $GroupList;
    }
    
    public function addGroup($name, $notes, $params) {        
        $sql = $this->db->prepare("INSERT INTO permissions_groups SET active = 1, name = :name, params = :params, admin_notes = :notes, create_date = :create_date");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':params', $params);
        $sql->bindValue(':notes', $notes);
        $sql->bindParam(':create_date', time());
        $sql->execute();
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
}
