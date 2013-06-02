<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author ediardo
 */
class Controller  {
    protected $controller;
    protected $model;
    protected $view;
    protected $params;
    protected $layout;
    
    function __construct($model){
        session_start();
        include_once(APP_MODELS.DS.strtolower($model).'.php');
        $this->model = new $model();
        $this->params = $_GET;
        $this->data = $_POST;
        $this->view = new View($this->layout,$this->controller, $this->action);
        
    }
    
    function check_login(){
       if(!empty($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
    
}

?>
