<?php
class corpsController extends controller {

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

        $this->loadTemplate('corps', $data);        
    }
    
    public function add(){
        $data = array();
        $staff = new Staff();
        $staff->setLoggedStaff();
        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'clients';
        $data['page_level_2'] = 'Nova Empresa';

        $this->loadTemplate('corps_add', $data); 
    }
}

