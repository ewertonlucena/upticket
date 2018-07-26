<?php
class slaController extends controller {

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
        $sla = new SLA();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'manage';
        $data['info'] = $info;
        $data['sla'] = $sla->getSLAList();        
        
        $this->loadAdminTemplate('sla', $data);
    }
    
    public function add(){
        $data = array();
        $staff = new Staff();
        $sla = new SLA();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'manage';
        $data['page_level_2'] = 'Novo SLA';
        $data['error'] = array();
        
        $args = array (
                    'name' => FILTER_SANITIZE_MAGIC_QUOTES,
                    'period' => FILTER_VALIDATE_INT,
                    'transient' => FILTER_VALIDATE_INT,
                    'notes' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
        $post = filter_input_array(INPUT_POST, $args);
        $data['post'] = $post;
        
        if(!empty($post)) {
            $data['error'] = array_keys($post, '');
            $until = count($data['error']);
            for($i = 0; $i < $until; $i++) {
                if( $data['error'][$i] == 'transient' || 
                    $data['error'][$i] == 'notes') {
                    unset($data['error'][$i]);
                }
            }
        }
        
        if(empty($data['error']) && !empty($post)) {
            extract($post);
            $rows = false;
            if(empty($sla->validName($name))) {
                $rows = $sla->addSLA($name, $period, $transient, $notes);
            }
            if(!empty($rows)) {
                $info['alert'] = 'success';
                $info['header'] = 'SUCESSO';
                $info['content'] = 'Novo SLA criado com sucesso';
                $info['ids'] = '';
                $info['action'] = '';
            } else {
                $info['alert'] = 'danger';
                $info['header'] = 'ERRO';
                $info['content'] = 'Falha ao criar novo SLA';
                $info['ids'] = '';
                $info['action'] = '';
            }
            $this->index($info);
            exit;
            
        }
        
        $this->loadAdminTemplate('sla_add', $data);
    }
    
    public function edit($id){
        $data = array();
        $staff = new Staff();
        $sla = new SLA();
        $staff->setLoggedStaff();

        $data['staff_name'] = $staff->getName();
        $data['page_level_1'] = 'manage';
        $data['sla'] = $sla->getSLAInfo($id);
        $data['page_level_2'] = 'SLA: '.$data['sla']['name'];
        $data['error'] = array();
        
        $args = array (
                    'name' => FILTER_SANITIZE_MAGIC_QUOTES,
                    'period' => FILTER_VALIDATE_INT,
                    'transient' => FILTER_VALIDATE_INT,
                    'notes' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
        $post = filter_input_array(INPUT_POST, $args);
        $data['post'] = $post;
        
        if(!empty($post)) {
            $data['error'] = array_keys($post, '');
            $until = count($data['error']);
            for($i = 0; $i < $until; $i++) {
                if( $data['error'][$i] == 'transient' || 
                    $data['error'][$i] == 'notes') {
                    unset($data['error'][$i]);
                }
            }
        }
        
        if(empty($data['error']) && !empty($post)) {
            extract($post);
            $rows = false;
            $valid = $sla->validName($name);
            if(empty($valid) || $valid == $id ) {
                $rows = $sla->editSLA($id, $name, $period, $transient, $notes);
            }
            if(!empty($rows)) {
                $info['alert'] = 'success';
                $info['header'] = 'SUCESSO';
                $info['content'] = 'SLA salvo com sucesso';
                $info['ids'] = '';
                $info['action'] = '';
            } else {
                $info['alert'] = 'danger';
                $info['header'] = 'ERRO';
                $info['content'] = 'Falha ao salvar SLA';
                $info['ids'] = '';
                $info['action'] = '';
            }
            $this->index($info);
            exit;
            
        }
        
        $this->loadAdminTemplate('sla_edit', $data);
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
                        'header' => 'ERRO',
                        'content' => 'Nenhum SLA foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'ALERTA',
                    'content' => 'Deseja ativar ' . count($ids) . ' SLA(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'enable'
                ]
            );              
        }        
    }
    
    public function enable() {
        
        $staff = new Staff();
        $sla = new SLA();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $enabled = $sla->enableSLA($ids);
        
        if(!empty($enabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'SUCESSO',
                        'content' => $enabled.' SLA(s) ativado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'ERRO',
                        'content' => 'Não foi possível ativar o(s) SLA(s) selecionado(s)!',
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
                        'header' => 'ERRO',
                        'content' => 'Nenhum SLA foi selecionado',
                        'ids' => '',
                        'action' => ''
                    ]
            );
            exit;
        } else {
           $this->index(
                $info = [
                    'alert' => 'warning',
                    'header' => 'ALERTA',
                    'content' => 'Deseja desativar ' . count($ids) . ' SLA(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'disable'
                ]
            );              
        }        
    }
    
    public function disable() {
        
        $staff = new Staff();
        $sla = new SLA();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $disabled = $sla->disableSLA($ids);
        
        if(!empty($disabled)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'SUCESSO',
                        'content' => $disabled.' SLA(s) desativado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'ERRO',
                        'content' => 'Não foi possível desativar o(s) SLA(s) selecionado(s)!',
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
                        'header' => 'ERRO',
                        'content' => 'Nenhum SLA foi selecionada',
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
                    'content' => 'Deseja apagar ' . count($ids) . ' SLA(s) selecionado(s)',
                    'ids' => join(',',$ids),
                    'action' => 'delete'
                ]
            );              
        }        
    }
    
    public function delete() {
        
        $staff = new Staff();
        $sla = new SLA();
        
        $staff->setLoggedStaff();
        
        $ids = filter_input(INPUT_POST, 'ids', FILTER_SANITIZE_MAGIC_QUOTES);        
        
        $deleted = $sla->deleteSLA($ids);
        
        if(!empty($deleted)){
            $this->index(
                    $info = [
                        'alert' => 'success',
                        'header' => 'SUCESSO',
                        'content' => $deleted.' SLA(s) apagado(s) com sucesso!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        } else {
            $this->index(
                    $info = [
                        'alert' => 'danger',
                        'header' => 'ERRO',
                        'content' => 'Não foi possível apagar o(s) SLA(s) selecionado(s)!',
                        'ids' => '',
                        'action' => ''
                        
                    ]
            );
        }        
    }
}
