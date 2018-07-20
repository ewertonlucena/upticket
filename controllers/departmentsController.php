<?php
class departmentsController extends controller {
    
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
            $departments = new Departments();
            $staff->setLoggedStaff();
            
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            $data['departments'] = $departments->getDepartmentsList();
            
            $data['info'] = $info;
            $ids = array_column($data['departments'],'id');
            
            foreach ($ids as $id) {
                $leader_id = $departments->getDepartmentInfo($id);
                $leader_id = $leader_id['id_leader'];
                
                $data['members'][$id] = $staff->getDepartmentTotalMembers($id);
                $data['leaders'][$id] = $staff->getNameById($leader_id);
            }
            
            $this->loadAdminTemplate('departments', $data);        
    }
    
    public function add(){
            $data = array();
            
            $staff = new Staff();
            $departments = new Departments();
            $staff->setLoggedStaff();
            
            $data['staff_name'] = $staff->getName();
            $data['page_level_1'] = 'agents';
            $data['page_level_2'] = 'Novo Setor';
            
            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $signature = filter_input(INPUT_POST, 'signature', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $info['rows'] = $departments->addDepartment($name, $email, $signature);
                if($info['rows']) {
                    $info['alert'] = 'success';
                    $info['header'] = 'SUCESSO';
                    $info['content'] = 'Novo setor criado com sucesso';
                    $info['ids'] = '';
                    $info['action'] = '';
                } else {
                    $info['alert'] = 'danger';
                    $info['header'] = 'ERRO';
                    $info['content'] = 'Falha ao criar novo setor';
                    $info['ids'] = '';
                    $info['action'] = '';
                }
                
                $this->index($info);
                exit;
                
            }
            
            $this->loadAdminTemplate('departments_add', $data);        
    }
    
    public function edit($id){
            $data = array();
            
            $staff = new Staff();
            $departments = new Departments();
            $views = new Views();
            $staff->setLoggedStaff();
            
            $data['staff_name'] = $staff->getName();
            $data['department_info'] = $departments->getDepartmentInfo($id);
            $data['page_level_1'] = 'agents';
            $data['page_level_2'] = 'Setor '.$data['department_info']['name'];
            $data['members'] = $views->getDepartmentMembers($id);
            $data['leader'] = $views->getDepartmentLeader($id);            
            
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_MAGIC_QUOTES);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $leader = filter_input(INPUT_POST, 'leader', FILTER_VALIDATE_INT);
            $signature = filter_input(INPUT_POST, 'signature', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            if(!empty($name)) {
                $info['rows'] = $departments->editDepartment($id, $name, $email, $leader, $signature);
                if($info['rows']) {
                    $info['alert'] = 'success';
                    $info['header'] = 'SUCESSO';
                    $info['content'] = 'Setor salvo com sucesso';
                    $info['ids'] = '';
                    $info['action'] = '';
                } else {
                    $info['alert'] = 'danger';
                    $info['header'] = 'ERRO';
                    $info['content'] = 'Falha ao salvar setor';
                    $info['ids'] = '';
                    $info['action'] = '';
                }
                
                $this->index($info);
                exit;
                
            }
            
            $this->loadAdminTemplate('departments_edit', $data);        
    }
    
    public function deleteConfirmation() {
        #instance Models
        $staff = new Staff();
        

        $staff->setLoggedStaff();

        if (!isset($_POST['ids'])) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao apagar grupos',
                        'content' => 'Nenhum setor foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        }
        
        if (isset($_POST['ids']) && !empty($_POST['ids'])) {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja apagar ' . count($_POST['ids']) . ' setor(es) selecionado(s)',
                    'ids' => join(',',$_POST['ids']),
                    'action' => 'delete'
                ]
            );
              
        }
        
    }
    
    public function delete() {
        
        $staff = new Staff();
        $departments = new Departments();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $members = $departments->hasMembers($ids);
        if (empty($members)) {
            $deleted = $departments->deleteDepartments($ids);
        } else {
            $deleted = 0;
        }
        
        if(!empty($deleted)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $deleted.' setores apagados com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível apagar os setores selecionados!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }
        
    }

    public function enableConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();

        if (!isset($_POST['ids'])) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao ativar grupos',
                        'content' => 'Nenhum setor foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        }
        
        if (isset($_POST['ids']) && !empty($_POST['ids'])) {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja ativar ' . count($_POST['ids']) . ' setor(es) selecionado(s)',
                    'ids' => join(',',$_POST['ids']),
                    'action' => 'enable'
                ]
            );
              
        }
        
    }
    
    public function enable() {
        
        $staff = new Staff();
        $departments = new Departments();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $members = $departments->hasMembers($ids);
        if (empty($members)) {
            $enabled = $departments->enableDepartments($ids);
        } else {
            $enabled = 0;
        }
        
        if(!empty($enabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $enabled.' setores ativados com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível ativar os setores selecionados!',
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

        if (!isset($_POST['ids'])) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao desativar setores',
                        'content' => 'Nenhum setor foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        }
        
        if (isset($_POST['ids']) && !empty($_POST['ids'])) {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja desativar ' . count($_POST['ids']) . ' setor(es) selecionado(s)',
                    'ids' => join(',',$_POST['ids']),
                    'action' => 'disable'
                ]
            );
              
        }
        
    }
    
    public function disable() {
        
        $staff = new Staff();
        $departments = new Departments();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $members = $departments->hasMembers($ids);
        if (empty($members)) {
            $disabled = $departments->disableDepartments($ids);
        } else {
            $disabled = 0;
        }
        
        if(!empty($disabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $disabled.' setores desativados com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível desativar os setores selecionados!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }
        
    }
    
}

