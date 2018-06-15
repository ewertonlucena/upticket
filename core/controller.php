<?php
class controller {
    
    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
    public function loadTemplate($viewName, $viewData = array()) {        
        require 'views/template.php';
    }
    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);        
        require 'views/'.$viewName.'.php';
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

