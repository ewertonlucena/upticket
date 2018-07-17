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
        $views = new Views();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'Novo Agente';
        
        $this->loadAdminTemplate('agents_add', $data);
    }
}

