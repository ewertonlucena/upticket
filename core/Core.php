<?php

class Core {

    public function run() {

        $url = isset($_GET['url']) ? '/' . $_GET['url'] : '/';
        $params = array();
        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            if ($url[0] == 'admin') {
                array_shift($url);
                $currentController = 'panelController';
            }

            if (isset($url[0]) && !empty($url[0])) {
                $currentController = $url[0] . 'Controller';
            }

            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }
            if (!empty($url[0])) {
                $params = $url;
                if (empty(end($params))) {
                    array_pop($params);
                }
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }

}
