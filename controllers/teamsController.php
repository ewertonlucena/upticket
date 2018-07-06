<?php
class teamsController extends controller {
    
    public function __construct(){
        $staff = new Staff();        
        if($staff->isLogged() == FALSE) { 
            header("Location: ".BASE_URL."login");
            exit;
        }
        $staff->setLoggedStaff();
        if(!$staff->hasPermission('admin')){            
            header("Location: ".BASE_URL);
            exit;
        }
    }    
    
    public function index(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            
            $this->loadAdminTemplate('teams', $data);        
    }
   
}

