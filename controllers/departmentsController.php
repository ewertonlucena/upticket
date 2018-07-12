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
            
            
            $this->loadAdminTemplate('departments_add', $data);        
    }
    
}

