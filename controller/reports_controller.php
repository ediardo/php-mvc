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
class ReportsController extends Controller{
    //put your code here
    
    /*
     * Muestra el listado de reportes
     * @
     */
    function index(){
        
    }
    function my_reports(){
        if($this->check_login()){
            $user_id = $_SESSION["user_id"];
            $this->model->searchBy($user_id);
        }
        
    }
    function add(){
        
    }
    
    function delete(){
        
    }
    
    function edit(){
        
    }
}

?>
