<?php
class loginController extends controller {

    public function index() {
        $data = array();        
        if (isset($_POST['login']) && !empty($_POST['login'])) {
            $login = addslashes($_POST['login']);
            $pass = addslashes($_POST['pass']);
            
            $staff = new Staff();
            
            if ($staff->doLogin($login, $pass)) {
                header('Location: ' . BASE_URL);
                exit;
            } else {
                $data['error'] = 'Login e/ou senha não conferem.';
            }
        }
        $this->loadView('login', $data);
    }
    
    public function logout() {
        $staff = new Staff();
        $staff->logout();        
        header("Location: ".BASE_URL);
        exit;
    }
}
