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
        $departments = new Departments();
        $groups = new Permissions();
        $teams = new Teams();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['info'] = $info;
        $data['agents'] = $agents->getAgentsList();
        $data['departments'] = $departments->getDepartmentsList();
        $data['groups'] = $groups->getGroupList();
        $data['teams'] = $teams->getTeamsList();

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
    
    public function edit($id) {
        $data = array();
        $staff = new Staff();
        $agents = new Agents();
        $departments = new Departments();
        $groups = new Permissions();
        $teams = new Teams();
        
        
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['agent'] = $agents->getAgentInfo($id);        
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'Agente: '.$data['agent']['name'];        
        $data['departments'] = $departments->getDepartmentsList();
        $data['groups'] = $groups->getGroupList();
        $data['teams'] = $teams->getTeamsList();
        $data['error'] = array();        
        $args = array(  'id' => FILTER_VALIDATE_INT,
                        'full_name' => FILTER_SANITIZE_MAGIC_QUOTES,
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
                if(     $data['error'][$i] == 'pass' ||
                        $data['error'][$i] == 'phone' || 
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
            $validName = $agents->validName($post['name']);
            $validLogin = $agents->validLogin($post['login']);
            if((empty($validName) || $validName == $id) && (empty($validLogin) || $validLogin == $id)) {
                if(!empty($post['pass'])) {                    
                    $post['pass'] = md5($post['pass']);                    
                } else {                    
                    $post['pass'] = $data['agent']['pass'];                    
                }
                $info['rows'] = $agents->editAgent($post);                
            }
            if(!empty($info['rows'])) {
                $info['alert'] = 'success';
                $info['header'] = 'SUCESSO';
                $info['content'] = 'Informações salvas com sucesso';
                $info['ids'] = '';
                $info['action'] = '';
            } else {
                $info['alert'] = 'danger';
                $info['header'] = 'ERRO';
                $info['content'] = 'Falha ao salvar informações';
                $info['ids'] = '';
                $info['action'] = '';
            }
            $this->index($info);
            exit;                
        }        
        $this->loadAdminTemplate('agents_edit', $data);
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
                        'content' => 'Nenhum agente foi selecionado',
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
                    'content' => 'Deseja ativar ' . count($ids) . ' agente(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'enable'
                ]
            );              
        }        
    }
    
    public function enable() {
        
        $staff = new Staff();
        $agents = new Agents();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $enabled = $agents->enableAgent($ids);
        
        if(!empty($enabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $enabled.' agente(s) ativado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível ativar o(s) agente(s) selecionado(s)!',
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
                        'content' => 'Nenhum agente foi selecionado',
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
                    'content' => 'Deseja desativar ' . count($ids) . ' agente(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'disable'
                ]
            );              
        }        
    }
    
    public function disable() {
        
        $staff = new Staff();
        $agents = new Agents();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $disabled = $agents->disableAgent($ids);
        
        if(!empty($disabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $disabled.' agente(s) desativado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível desativar o(s) agente(s) selecionado(s)!',
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
                        'content' => 'Nenhum agente foi selecionado',
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
                    'content' => 'Deseja apagar ' . count($ids) . ' agente(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'delete'
                ]
            );              
        }        
    }
    
    public function delete() {
        
        $staff = new Staff();
        $agents = new Agents();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $deleted = $agents->deleteAgents($ids);
        
        if(!empty($deleted)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $deleted.' agente(s) apagado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível apagar o(s) agente(s) selecionado(s)!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
    
    public function changeTeamConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Nenhum agente foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'light',
                    'header' => 'Mudar Time',
                    'content' => 'Mudar time de '.count($ids).' agente(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'changeTeam'
                ]
            );              
        }        
    }
    
    public function changeTeam() {
        
        $staff = new Staff();
        $agents = new Agents();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        $team = filter_input(INPUT_POST, 'team', FILTER_VALIDATE_INT);
        
        $changed = $agents->changeAgentsTeam($ids, $team);
        
        if(!empty($changed)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => 'O time de '.$changed.' agente(s) foi modificado com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível mudar o(s) agente(s) selecionado(s) de time!',
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
                        'content' => 'Nenhum agente foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'light',
                    'header' => 'Mudar Setor',
                    'content' => 'Mudar setor de '.count($ids).' agente(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'changeDepartment'
                ]
            );              
        }        
    }
    
    public function changeDepartment() {
        
        $staff = new Staff();
        $agents = new Agents();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        $department = filter_input(INPUT_POST, 'department', FILTER_VALIDATE_INT);
        
        $changed = $agents->changeAgentsDepartment($ids, $department);
        
        if(!empty($changed)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => 'O setor de '.$changed.' agente(s) foi modificado com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível mudar o(s) agente(s) selecionado(s) de setor',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
    
    public function changeGroupConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Nenhum agente foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'light',
                    'header' => 'Mudar Grupo',
                    'content' => 'Mudar grupo de '.count($ids).' agente(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'changeGroup'
                ]
            );              
        }        
    }
    
    public function changeGroup() {
        
        $staff = new Staff();
        $agents = new Agents();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        $group = filter_input(INPUT_POST, 'group', FILTER_VALIDATE_INT);
        
        $changed = $agents->changeAgentsGroup($ids, $group);
        
        if(!empty($changed)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => 'O grupo de '.$changed.' agente(s) foi modificado com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível mudar o(s) agente(s) selecionado(s) de grupo',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
}

