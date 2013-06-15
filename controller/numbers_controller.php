<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PastesController
 *
 * @author ediardoa
 * a
 */
class NumbersController extends Controller{
    //put your code here
    
     function __construct($action = null){
        $this->layout = "layout";
        $this->controller = 'numbers';
        $this->action = $action;
        parent::__construct('Number');
        if($this->action != "_number_exists")
            $this->$action();
        
    }
    
    function __destruct(){
        if($this->action != "_number_exists")
            $this->view->render();
        unset($_SESSION["flash"]);
    }
    
    /*
     * Muestra el listado de reportes
     * @
     */
    function index(){
        
    }
    function add(){
        
    }
    
    function delete(){
        
    }
    
    function edit(){
        
    }
    
    function search(){
        $this->view->title = "Busca numeros";
    }
    
    function _number_exists($number){
        return $this->model->search_by_number($number);
    }
}

?>
