<?php
class panelController extends controller {
    
    public function __construct(){
        $staff = new Staff();        
        if($staff->isLogged() == FALSE) { 
            header("Location: ".BASE_URL."login");
            exit;
        }
        $staff->setLoggedStaff();
        if (!$staff->isAdmin()) {
            header("Location: " . BASE_URL);
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
}



