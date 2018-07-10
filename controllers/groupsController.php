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

    public function index($msg = '') {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['permissions_groups'] = $permissions->getGroupList();
        $data['msg'] = $msg;

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

        if(isset($_POST['name']) && !isset($_POST['ids'])) {
            echo "ERRO: Nenhuma permissão selecionada.";
            exit;
        }

        if(isset($_POST['ids']) && !empty($_POST['ids'])) {
            $name = addslashes($_POST['name']);
            $notes = addslashes($_POST['notes']);
            $params = implode(',', $_POST['ids']);

            $permissions->addGroup($name, $notes, $params);
            header('Location: '.BASE_URL.'admin/groups');
            exit;
        }

        $this->loadAdminTemplate('group_add', $data);
    }
    
    public function delete() {
        
        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();
        
        $staff->setLoggedStaff();
        
        if(!isset($_POST['ids'])) { $this->index($msg='Nenhum grupo foi selecionado'); exit; }
        
        if(isset($_POST['ids']) && !empty($_POST['ids'])) {
            $ids = $_POST['ids'];           
            $permissions->deleteGroups($ids);
        }
        header('Location: '.BASE_URL.'admin/groups');
        exit;
        
    }

    public function edit($id) {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'edit';

        $data['group_info'] = $permissions->getGroupInfo();


        $this->loadAdminTemplate('group_edit', $data);
    }

}
