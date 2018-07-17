<?php
class Views extends model {
 
    public function getAgentDepartment($id) {
        $return = false;
        
        $sql = $this->db->prepare("SELECT department FROM view_department_staff WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $return = $sql->fetchColumn();
        }
        
        return $return;
                
    }
    
}
