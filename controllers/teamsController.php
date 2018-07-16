<?php
class teamsController extends controller {
    
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
        $teams = new Teams();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['info'] = $info;

        $data['teams'] = $teams->getTeamsList();

        if(!empty($data['teams'])) {
            $ids = array_column($data['teams'],'id');

            foreach ($ids as $id) {                 
                $data['members'][$id] = $teams->getTeamMembers($id);                
                $data['leaders'][$id] = $teams->getTeamLeader($id);
            }
        }            

        $this->loadAdminTemplate('teams', $data);        
    }
    
    public function add(){
        $data = array();

        $staff = new Staff();
        $teams = new Teams();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'Novo Time';
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_MAGIC_QUOTES);
        $notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        if(!empty($name)) {                            
            if(empty($teams->validName($name))) {
                $info['rows'] = $teams->addTeam($name, $notes);
            }            
            if(!empty($info['rows'])) {
                $info['alert'] = 'success';
                $info['header'] = 'SUCESSO';
                $info['content'] = 'Novo time criado com sucesso';
                $info['ids'] = '';
                $info['action'] = '';
            } else {
                $info['alert'] = 'danger';
                $info['header'] = 'ERRO';
                $info['content'] = 'Falha ao criar novo time';
                $info['ids'] = '';
                $info['action'] = '';
            }

            $this->index($info);
            exit;

        }

        $this->loadAdminTemplate('teams_add', $data);    
    }
    
    public function edit($id){
        $data = array();

        $staff = new Staff();
        $teams = new Teams();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['team_info'] = $teams->getTeamInfo($id);
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'Time '.$data['team_info']['name'];        
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_MAGIC_QUOTES);
        $notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty($name)) {
            $valid = $teams->validName($name);
            if(empty($valid) || $valid = $id ) {
                $info['rows'] = $teams->editTeam($id, $name, $notes);
            }             
            
            if($info['rows']) {
                $info['alert'] = 'success';
                $info['header'] = 'SUCESSO';
                $info['content'] = 'Time salvo com sucesso';
                $info['ids'] = '';
                $info['action'] = '';
            } else {
                $info['alert'] = 'danger';
                $info['header'] = 'ERRO';
                $info['content'] = 'Falha ao salvar time';
                $info['ids'] = '';
                $info['action'] = '';
            }

            $this->index($info);
            exit;

        }

        $this->loadAdminTemplate('teams_edit', $data);        
    }
    
    
}

