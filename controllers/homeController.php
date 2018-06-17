<?php
class homeController extends controller {
    
    public function __construct(){
        $staff = new Staff();        
        if($staff->isLogged() == FALSE) { 
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    

        public function index(){
        $staff = new Staff();        
        $data = array(
            'quant' => $staff->getStaffQuant(),
            'teste' => 'teste123'
        );
        $this->loadTemplate('home', $data);        
    }
}

