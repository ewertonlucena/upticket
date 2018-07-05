<?php
class adminController extends controller {
    
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
            $data['page_level_1'] = 'admin';
            
            $this->loadAdminTemplate('admin', $data);        
    }
    
        public function agents(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            
            $this->loadAdminTemplate('agents', $data);        
    }
    
    public function teams(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            
            $this->loadAdminTemplate('teams', $data);        
    }
    
    public function groups(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            
            $this->loadAdminTemplate('groups', $data);        
    }
    
    public function departments(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            
            $this->loadAdminTemplate('departments', $data);        
    }
    
    public function manage(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'manage';
            
            $this->loadAdminTemplate('manage', $data);        
    }
    
    public function settings(){
            $data = array();
            $staff = new Staff();
            $staff->setLoggedStaff();
            $data['staff_name'] = $staff->getName();
            
            $this->loadAdminTemplate('settings', $data);        
    }
}



