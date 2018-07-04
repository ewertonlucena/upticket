<?php
class agentsController extends controller {
    
    public function __construct(){
        $staff = new Staff();        
        if($staff->isLogged() == FALSE) { 
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    

        public function index(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_parents'] = 'agents';
            
            $this->loadAdminTemplate('agents', $data);        
    }
    
    public function teams(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_parents'] = 'agents';
            
            $this->loadAdminTemplate('teams', $data);        
    }
}

