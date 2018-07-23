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
        $departments = new Departments();
        $views = new Views();

        $staff->setLoggedStaff();
        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'manage';
        $data['info'] = $info;
        $data['categories'] = $categories->getCategoriesList();
        $data['departments'] = $departments->getDepartmentsList();

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
    
    public function edit($id) {
        $data = array();
        
        $staff = new Staff();
        $categories = new Categories();
        $departments = new Departments(); 
        
        $staff->setLoggedStaff();      
        
        $data['staff_name'] = $staff->getName();        
        $data['page_level_1'] = 'manage';
        $data['category'] = $categories->getCategoryInfo($id);        
        $data['page_level_2'] = 'Categoria: '.$data['category']['name'];
        $data['departments'] = $departments->getDepartmentsList();
        $data['error'] = array();
        
        $args = array(
            'name' => FILTER_SANITIZE_MAGIC_QUOTES,
            'department' => FILTER_VALIDATE_INT,
            'priority' => FILTER_VALIDATE_INT,
            'description' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
        
        if (empty($data['category'])) {
            $info['alert'] = 'warning';
            $info['header'] = 'ALERTA';
            $info['content'] = 'Categoria não existe';
            $info['ids'] = '';
            $info['action'] = '';
            
            $this->index($info);
            exit;
        }
        
        $post = filter_input_array(INPUT_POST, $args);
        
        if(!empty($post)) { 
            $data['post'] = $post;
            extract($post);            
            if(empty($name)) {
                $data['error'][] = 'name';                
            } else {
                $info['rows'] = false;
                if(empty($categories->validName($name)) || $categories->validName($name) == $id) {                    
                    $info['rows'] = $categories->editCategory($id, $name, $department, $priority, $description);
                }
                if(!empty($info['rows'])) {
                    $info['alert'] = 'success';
                    $info['header'] = 'SUCESSO';
                    $info['content'] = 'Categoria atualizada com sucesso';
                    $info['ids'] = '';
                    $info['action'] = '';
                } else {
                    $info['alert'] = 'danger';
                    $info['header'] = 'ERRO';
                    $info['content'] = 'Falha ao salvar categoria';
                    $info['ids'] = '';
                    $info['action'] = '';
                }
                $this->index($info);
                exit;
            }
        }        
        
        $this->loadAdminTemplate('categories_edit', $data);        
    }
    
    public function enableConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao ativar agentes',
                        'content' => 'Nenhuma categoria foi selecionada',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja ativar ' . count($ids) . ' categoria(s) selecionada(s)',
                    'ids' => join(',',$ids),
                    'action' => 'enable'
                ]
            );              
        }        
    }
    
    public function enable() {
        
        $staff = new Staff();
        $categories = new Categories();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $enabled = $categories->enableCategories($ids);
        
        if(!empty($enabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $enabled.' categoria(s) ativada(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível ativar a(s) categoria(s) selecionada(s)!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
    
    public function disableConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao desativar agentes',
                        'content' => 'Nenhuma categoria foi selecionada',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja desativar ' . count($ids) . ' categoria(s) selecionada(s)',
                    'ids' => join(',',$ids),
                    'action' => 'disable'
                ]
            );              
        }        
    }
    
    public function disable() {
        
        $staff = new Staff();
        $categories = new Categories();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $disabled = $categories->disableCategories($ids);
        
        if(!empty($disabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $disabled.' categoria(s) desativada(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível desativar a(s) categoria(s) selecionada(s)!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
    
    public function deleteConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao apagar agentes',
                        'content' => 'Nenhuma categoria foi selecionada',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja apagar ' . count($ids) . ' categoria(s) selecionada(s)',
                    'ids' => join(',',$ids),
                    'action' => 'delete'
                ]
            );              
        }        
    }
    
    public function delete() {
        
        $staff = new Staff();
        $categories = new Categories();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $deleted = $categories->deleteCategories($ids);
        
        if(!empty($deleted)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $deleted.' categoria(s) apagada(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível apagar a(s) categoria(s) selecionado(s)!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
    
    public function changeDepartmentConfirmation() {
        #instance Models
        $staff = new Staff();

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Nenhum categoria foi selecionada',
                        'ids' => '',
                        'action' => ''
                    ]);
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'light',
                    'header' => 'Mudar Setor',
                    'content' => 'Mudar setor de '.count($ids).' categoria(s) selecionada(s)?',
                    'ids' => join(',',$ids),
                    'action' => 'changeDepartment'
                ]);              
        }        
    }
    
    public function changeDepartment() {
        
        $staff = new Staff();
        $categories = new Categories();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        $department = filter_input(INPUT_POST, 'department', FILTER_VALIDATE_INT);
        
        $changed = $categories->changeCategoriesDepartment($ids, $department);
        
        if(!empty($changed)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => 'O setor de '.$changed.' categoria(s) foi modificado com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]);
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível mudar o setor da(s) categoria(s) selecionada(s)',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
        
}

