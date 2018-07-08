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

    public function index() {
        $data = array();

        #instance Models
        $staff = new Staff();
        $permissions = new Permissions();

        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['permissions_groups'] = $permissions->getGroupList();


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
        $data['page_level_2'] = 'add';        
        $data['permissions_list'] = $permissions->getPermissionsList();
        
        

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
        $data['page_level_2'] = 'edit';

        $data['group_info'] = $permissions->getGroupInfo();


        $this->loadAdminTemplate('group_edit', $data);
    }

}
