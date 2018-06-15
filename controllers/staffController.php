<?php
class homeController extends controller {
    
    public function index(){
        $staff = new Staff();
        
        $data = array(
            'quant' => $staff->getStaffQuant(),
            'teste' => 'teste123'
        );
        $this->loadTemplate('home', $data);
        
    }
}

