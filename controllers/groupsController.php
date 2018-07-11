<?php

class groupsController extends controller {

    public function __construct() {
        $staff = new Staff();
        if ($staff->isLogged() == FALSE) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
        $staff->setLoggedStaff();
        if (!$staff->hasPermission('admin')) {
            header("Location: " . BASE_URL);
            exit;
        }
    }

    public function index($info = array()) {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['permissions_groups'] = $permissions->getGroupList();
        $data['info'] = $info;

        $this->loadAdminTemplate('groups', $data);
    }

    public function add() {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'group_add';
        $data['permissions_list'] = $permissions->getPermissionsList();

        if (isset($_POST['name']) && !isset($_POST['ids'])) {            
            $data['error'] = "ERRO: Nenhuma permissão selecionada.";            
        }

        if (isset($_POST['ids']) && !empty($_POST['ids'])) {
            $name = addslashes($_POST['name']);
            $notes = $_POST['notes'];
            $params = implode(',', $_POST['ids']);

            $permissions->addGroup($name, $notes, $params);
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'SUCESSO',
                        'content' => 'Novo grupo criado com sucesso!',
                        'ids' => '',
                        'action' => ''
                        ]
                    );
            exit;
        }

        $this->loadAdminTemplate('group_add', $data);
    }
    
    public function edit($id) {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'group_edit';
        $data['permissions_list'] = $permissions->getPermissionsList();

        $data['group_info'] = $permissions->getGroupInfo($id);
        $data['group_ids'] = array();
        
        if(isset($data['group_info']['params']) && !empty($data['group_info']['params'])) {            
            $data['group_ids'] = explode(',',$data['group_info']['params']);            
        }
        
        if (isset($_POST['name']) && !isset($_POST['ids'])) {            
            $data['error'] = "Nenhuma permissão selecionada";            
        }

        if (isset($_POST['ids']) && !empty($_POST['ids'])) {
            $id = addslashes($_POST['id']);
            $name = addslashes($_POST['name']);
            $notes = $_POST['notes'];
            $params = implode(',', $_POST['ids']);

            $permissions->editGroup($id, $name, $notes, $params);
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'SUCESSO',
                        'content' => 'Grupo editado com sucesso!',
                        'ids' => '',
                        'action' => ''
                        ]
                    );
            exit;
        }
        
        $this->loadAdminTemplate('group_edit', $data);
    }

    public function deleteConfirmation() {
        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        if (!isset($_POST['ids'])) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao apagar grupos',
                        'content' => 'Nenhum grupo foi selecionado',
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
                    'content' => 'Deseja apagar ' . count($_POST['ids']) . ' grupo(s) selecionado(s)',
                    'ids' => join(',',$_POST['ids']),
                    'action' => 'delete'
                ]
            );
              
        }
        
    }

    public function delete() {

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();
        
        $ids = explode(',', $_POST['ids']);        
        
        $notdelete = $permissions->deleteGroups($ids);          
        
        
        if(empty($notdelete)) {
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => count($ids) . ' grupo(s) apagado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao apagar os grupos selecionados',
                        'content' => 'Os seguintes grupos possuem membros atrelados: ',
                        'groups' => $notdelete,
                        'ids' => '',
                        'action' => ''
                    ]
            );
        }
            
        
       
    }
    
    public function disableConfirmation() {
        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        if (!isset($_POST['ids'])) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao apagar grupos',
                        'content' => 'Nenhum grupo foi selecionado',
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
                    'content' => 'Deseja desativar ' . count($_POST['ids']) . ' grupo(s) selecionado(s)',
                    'ids' => join(',',$_POST['ids']),
                    'action' => 'disable'
                ]
            );
              
        }
        
    }
    
    public function disable() {

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();
        
        $ids = explode(',', $_POST['ids']);        
        
        $permissions->disableGroups($ids);
        $this->index(
                $info = [
                    'alert' => 'success',
                    'header' => 'Sucesso',
                    'content' => count($ids) . ' grupo(s) desativado(s) com sucesso!',
                    'ids' => '',
                    'action' => ''
                ]
        );
        
       
    }
    
    public function enableConfirmation() {
        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        if (!isset($_POST['ids'])) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao apagar grupos',
                        'content' => 'Nenhum grupo foi selecionado',
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
                    'content' => 'Deseja ativar ' . count($_POST['ids']) . ' grupo(s) selecionado(s)',
                    'ids' => join(',',$_POST['ids']),
                    'action' => 'enable'
                ]
            );
              
        }
        
    }
    
    public function enable() {

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();
        
        $ids = explode(',', $_POST['ids']);        
        
        $permissions->enableGroups($ids);
        $this->index(
                $info = [
                    'alert' => 'success',
                    'header' => 'Sucesso',
                    'content' => count($ids) . ' grupo(s) ativado(s) com sucesso!',
                    'ids' => '',
                    'action' => ''
                ]
        );
        
       
    }

    

}
