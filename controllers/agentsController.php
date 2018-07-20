<?php
class agentsController extends controller {

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
        $agents = new Agents();
        $views = new Views();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['info'] = $info;
        $data['agents'] = $agents->getAgentsList();

        if(!empty($data['agents'])) {
            $ids = array_column($data['agents'], 'id');
            foreach ($ids as $id) {
                $data['department'][$id] = $views->getAgentDepartment($id);
            }
        }

        $this->loadAdminTemplate('agents', $data);
    }
    
    public function add() {
        $data = array();
        $staff = new Staff();
        $agents = new Agents();
        $departments = new Departments();
        $groups = new Permissions();
        $teams = new Teams();
        $views = new Views();
        
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'Novo Agente';
        
        $data['departments'] = $departments->getDepartmentsList();
        $data['groups'] = $groups->getGroupList();
        $data['teams'] = $teams->getTeamsList();
        $data['error'] = array();
        
        $args = array(  'full_name' => FILTER_SANITIZE_MAGIC_QUOTES,
                        'name' => FILTER_SANITIZE_MAGIC_QUOTES,
                        'login' => FILTER_SANITIZE_MAGIC_QUOTES,
                        'pass' => FILTER_SANITIZE_MAGIC_QUOTES,
                        'email' => FILTER_VALIDATE_EMAIL,
                        'phone' => FILTER_SANITIZE_MAGIC_QUOTES,
                        'mobile' => FILTER_SANITIZE_MAGIC_QUOTES,
                        'notes' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                        'department' => FILTER_VALIDATE_INT,
                        'team' => FILTER_VALIDATE_INT,
                        'p_group' => FILTER_VALIDATE_INT,
                        'active' => FILTER_VALIDATE_INT,
                        'admin' => FILTER_VALIDATE_INT,
                        'vacation' => FILTER_VALIDATE_INT,
                        'dir_list_show' => FILTER_VALIDATE_INT,
                        'only_assigned' => FILTER_VALIDATE_INT
                        
        );
        $post = filter_input_array(INPUT_POST, $args);  
            
        if(!empty($post)) {            
            $data['error'] = array_keys($post, "");            
            $until = count($data['error']);
            for ($i = 0; $i < $until; $i++) {                
                if(     $data['error'][$i] == 'phone' || 
                        $data['error'][$i] == 'team' || 
                        $data['error'][$i] == 'notes' ||
                        $data['error'][$i] == 'active' ||
                        $data['error'][$i] == 'admin' ||
                        $data['error'][$i] == 'vacation' ||
                        $data['error'][$i] == 'dir_list_show' ||
                        $data['error'][$i] == 'only_assigned') {
                    unset($data['error'][$i]);
                }               
            }           
        }
        
        $data['post'] = $post;        
        
        
        if(empty($data['error']) && !empty($post)) {
            $info['rows'] = false;
            if(empty($agents->validName($post['name']) && empty($agents->validLogin($post['login'])))) {
                $info['rows'] = $agents->addAgent($post);
            }
            if(!empty($info['rows'])) {
                $info['alert'] = 'success';
                $info['header'] = 'SUCESSO';
                $info['content'] = 'Novo agente criado com sucesso';
                $info['ids'] = '';
                $info['action'] = '';
            } else {
                $info['alert'] = 'danger';
                $info['header'] = 'ERRO';
                $info['content'] = 'Falha ao criar novo agente';
                $info['ids'] = '';
                $info['action'] = '';
            }
            $this->index($info);
            exit;
                
        }
        
        $this->loadAdminTemplate('agents_add', $data);
    }
}

