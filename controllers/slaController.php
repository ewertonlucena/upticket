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
        $data['page_level_2'] = 'SLA: '.$data['name'];
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
        
        $this->loadAdminTemplate('sla_edit', $data);
    }
}
