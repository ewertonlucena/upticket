<?php
class ajaxController extends controller {
    public function __construct() {
        $staff = new Staff();
        if ($staff->isLogged() == FALSE) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
        
    }
    
    public function index() {}
    
    public function validName() {        
        $data = array();
            
        $staff = new Staff();       
        $staff->setLoggedStaff();
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_MAGIC_QUOTES);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_MAGIC_QUOTES);
        
        if(!empty($name) && !empty($model)) {
            $m = new $model();
            
            $data = $m->validName($name);
        }
        
        echo $data;
    }
    
    public function validLogin() {        
        $data = array();
            
        $staff = new Staff();       
        $staff->setLoggedStaff();
        
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_MAGIC_QUOTES);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_MAGIC_QUOTES);
        
        if(!empty($login) && !empty($model)) {
            $m = new $model();
            
            $data = $m->validLogin($login);
        }
        
        echo $data;
    }
}

