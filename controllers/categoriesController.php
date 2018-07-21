<?php
class categoriesController extends controller {
    
    public function __construct(){
        $staff = new Staff();        
        if($staff->isLogged() == FALSE) { 
            header("Location: ".BASE_URL."login");
            exit;
        }
        
        $staff->setLoggedStaff();
        if(!$staff->isAdmin()){
            header("Location: ".BASE_URL);
            exit;
        }
    }
    
    public function index($info = array()){
        $data = array();
        $staff = new Staff();
        $categories = new Categories();
        $views = new Views();

        $staff->setLoggedStaff();
        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'manage';
        $data['info'] = $info;
        $data['categories'] = $categories->getCategoriesList();            

        $ids = array_column($data['categories'], 'id');            
        foreach ($ids as $id) {              
            $data['department'][$id] = $views->getCategoriesDepartment($id); 
        }

        $this->loadAdminTemplate('categories', $data);        
    }
    
    public function add() {
        $data = array();
        $staff = new Staff();
        $categories = new Categories();
        $views = new Views();

        $staff->setLoggedStaff();
        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'manage';
        $data['page_level_2'] = 'Nova Categoria';
        
        $this->loadAdminTemplate('categories_add', $data);        
    }
        
}

