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
        $views = new Views();
        $staff->setLoggedStaff();
        
        $data['staff_name'] = $staff->getName();
        $data['team_info'] = $teams->getTeamInfo($id);
        $data['page_level_1'] = 'agents';
        $data['page_level_2'] = 'Time '.$data['team_info']['name'];
        $data['members'] = $views->getTeamMembers($id);
        $data['leader'] = $views->getTeamLeader($id);         
        
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_MAGIC_QUOTES);
        $leader = filter_input(INPUT_POST, 'leader', FILTER_SANITIZE_MAGIC_QUOTES);
        $notes = filter_input(INPUT_POST, 'notes', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty($name)) {
            $valid = $teams->validName($name);
            if(empty($valid) || $valid = $id ) {
                $info['rows'] = $teams->editTeam($id, $name, $leader, $notes);
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
    
    public function enableConfirmation() {
        #instance Models
        $staff = new Staff();        

        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids',FILTER_DEFAULT , FILTER_REQUIRE_ARRAY);

        if (empty($ids)) {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha ao ativar times',
                        'content' => 'Nenhum time foi selecionado',
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
                    'content' => 'Deseja ativar ' . count($ids) . ' setor(es) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'enable'
                ]
            );
              
        }
        
    }
    
    public function enable() {
        
        $staff = new Staff();
        $teams = new Teams();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $members = $teams->hasTeamMembers($ids);
        if (empty($members)) {
            $enabled = $teams->enableTeams($ids);
        } else {
            $enabled = 0;
        }
        
        if(!empty($enabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $enabled.' times ativados com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível ativar os times selecionados!',
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
                        'header' => 'Falha ao desativar times',
                        'content' => 'Nenhum time foi selecionado',
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
                    'content' => 'Deseja desativar ' . count($ids) . ' setor(es) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'disable'
                ]
            );
              
        }
        
    }
    
    public function disable() {
        
        $staff = new Staff();
        $teams = new Teams();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $members = $teams->hasTeamMembers($ids);
        if (empty($members)) {
            $enabled = $teams->disableTeams($ids);
        } else {
            $enabled = 0;
        }
        
        if(!empty($enabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $enabled.' times desativados com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível desativar os times selecionados!',
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
                        'header' => 'Falha ao apagar times',
                        'content' => 'Nenhum time foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            
        } else {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'Alerta',
                    'content' => 'Deseja apagar ' . count($ids) . ' time(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'delete'
                ]
            );
              
        }
        
    }
    
    public function delete() {
        
        $staff = new Staff();
        $teams = new Teams();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);
        
        $members = $teams->hasTeamMembers($ids);
        if (empty($members)) {
            $deleted = $teams->deleteTeams($ids);
        } else {
            $deleted = 0;
        }
        
        if(!empty($deleted)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'Sucesso',
                        'content' => $deleted.' times apagados com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'Falha',
                        'content' => 'Não foi possível apagar os times selecionados!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }
        
    }
    
}

