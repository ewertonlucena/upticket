<?php
class SLA extends model {
    public function getSLAInfo($id) {
        $sql = $this->db->prepare("SELECT * FROM sla WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        return $sql->fetch();        
    }
    
    public function getSLAList() {
        $sql = $this->db->prepare("SELECT * FROM sla");        
        $sql->execute();
        
        return $sql->fetchAll();        
    }
    
    public function addSLA($name, $period, $transient, $notes) {
        $sql = $this->db->prepare(""
                . "INSERT INTO "
                . "sla "
                . "SET "
                . "active = 1, "
                . "name = :name, "
                . "period = :period, "
                . "transient = :transient, "
                . "notes = :notes, "
                . "created = :created");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':period', $period);
        $sql->bindValue(':transient', $transient);
        $sql->bindValue(':notes', $notes);
        $sql->bindValue(':created', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function editSLA($id, $name, $period, $transient, $notes) {
        $sql = $this->db->prepare(""
                . "UPDATE "
                . "sla "
                . "SET "                
                . "name = :name, "
                . "period = :period, "
                . "transient = :transient, "
                . "notes = :notes, "
                . "updated = :updated "
                . "WHERE "
                . "id = :id");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':period', $period);
        $sql->bindValue(':transient', $transient);
        $sql->bindValue(':notes', $notes);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':updated', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function enableSLA($ids) {        
        $sql = $this->db->prepare("UPDATE sla SET active = 1, updated = :updated WHERE id IN ($ids)");        
        $sql->bindValue(':updated', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();        
    }
    
    public function disableSLA($ids) {        
        $sql = $this->db->prepare("UPDATE sla SET active = 0, updated = :updated WHERE id IN ($ids)");        
        $sql->bindValue(':updated', date('Y-m-d H:i:s'));
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function deleteSLA($ids) {        
        $sql = $this->db->prepare("DELETE FROM sla WHERE id IN ($ids)");        
        $sql->execute();
        
        return $sql->rowCount();
    }
    
    public function validName($name) {  
        $return = 0;
        
        $sql = $this->db->prepare("SELECT id FROM sla WHERE name = :name");
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            $return = $sql->fetchColumn();        
        }
        
        return $return;
    }
}