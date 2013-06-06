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
    
    function __destruct(){
        $this->view->render();
        
        unset($_SESSION["flash"]);
    }
    function redirect($url){
        header("Location: $url") ;
    }
    function check_login(){
       if(!empty($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
    function password_salt($password){
        return md5($password);
    }
    
    function validate_username($str){
        return preg_match("/^[a-z\d_]{2,20}$/i",$str);
    }
   
    function validate_email($str){
        return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $str);
    }
    
    function validate_password($str){
        return preg_match("/^[a-z0-9_-]{6,40}$/i", $str);
    }
    
    
}

?>
