<?php
class clientsController extends controller {

    public function __construct(){
        $staff = new Staff();
        if($staff->isLogged() == FALSE) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    
    public function index($info = array()){
        $data = array();
        $staff = new Staff();
        $staff->setLoggedStaff();
        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'clients';

        $this->loadTemplate('clients', $data);        
    }
    
}

