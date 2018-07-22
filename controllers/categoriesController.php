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
        $departments = new Departments(); 
        
        $staff->setLoggedStaff();      
        
        $data['staff_name'] = $staff->getName();        
        $data['page_level_1'] = 'manage';
        $data['page_level_2'] = 'Nova Categoria';
        $data['departments'] = $departments->getDepartmentsList();
        $data['error'] = array();
        
        $args = array(
            'name' => FILTER_SANITIZE_MAGIC_QUOTES,
            'department' => FILTER_VALIDATE_INT,
            'priority' => FILTER_VALIDATE_INT,
            'description' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        
        $post = filter_input_array(INPUT_POST, $args);
        if(!empty($post)) {            
            extract($post);            
            if(empty($name)) {
                $data['error'][] = 'name';
            } else {
                $info['rows'] = false;
                if(empty($categories->validName($name))) {
                    $info['rows'] = $categories->addCategory($name, $department, $priority, $description);
                }
                if(!empty($info['rows'])) {
                    $info['alert'] = 'success';
                    $info['header'] = 'SUCESSO';
                    $info['content'] = 'Nova categoria criada com sucesso';
                    $info['ids'] = '';
                    $info['action'] = '';
                } else {
                    $info['alert'] = 'danger';
                    $info['header'] = 'ERRO';
                    $info['content'] = 'Falha ao criar nova categoria';
                    $info['ids'] = '';
                    $info['action'] = '';
                }
                $this->index($info);
                exit;
            }
        }        
        
        $this->loadAdminTemplate('categories_add', $data);        
    }
        
}

