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
    
     function __construct($action){
        $this->layout = "layout";
        $this->controller = 'numbers';
        $this->action = $action;
        parent::__construct('Number');
        $this->$action();
        
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
}

?>
