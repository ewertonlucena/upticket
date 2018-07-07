<?php

class permissionsController extends controller {

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

    public function index() {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['permissions'] = $permissions->getPermissionsList();


        $this->loadAdminTemplate('permissions', $data);
    }

    public function add() {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'edit';
        
        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $group = addslashes($_POST['group']);
            $name = addslashes($_POST['name']);
            $description = addslashes($_POST['description']);
            
            $permissions->addPermission($group, $name, $description);
            header('Location: '.BASE_URL.'permissions');            
            exit;
        }

        $this->loadAdminTemplate('permissions_add', $data);
    }
    
    public function delete() {
        
        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();
        
        $staff->setLoggedStaff();
        
        if(isset($_POST['ids']) && !empty($_POST['ids'])) {            
            $permissions->deletePermissions($_POST['ids']);
        }
        header('Location: '.BASE_URL.'permissions/');
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

        $data['permissions_params'] = $permissions->getGroupInfo();


        $this->loadAdminTemplate('permissions_edit', $data);
    }

}
