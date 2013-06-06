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
    
     function __construct($action){
        $this->layout = "layout";
        $this->controller = 'reports';
        $this->action = $action;
        parent::__construct('Report');
        $this->$action();
        
    }
    
    /*
     * Muestra el listado de reportes
     * @
     */
    function index(){
        
    }
    
    function my_reports(){
        $this->view->title = "Mis reportes";
        if($this->check_login()){
            $user_id = $_SESSION["user_id"];
            $reports = $this->model->searchById();
            $total_reports = $this->model->get_num_rows();
            if($total_reports > 0){ // hay registros
                $this->view->set("total_reports",$total_reports);
            }else{
                $this->view->set_flash("No hay reportes creado por ti.","alert-warning");
            }
        }else{
            $this->view->set_flash("No tienes permisos para ver esa area. Inicia sesión.","alert-error");
            $this->redirect("index.php?controller=users&action=login");
        }
        
    }
    function add(){
        $this->view->title = "Denunciar un numero";
        if($this->check_login()){
            if(!empty($this->data)){
                if(is_numeric($this->data["number_txt"])){
                    $phone_number = trim($this->data["number_txt"]);
                    if($this->model->check_number($phone_number)){
                        
                    }
                }
            }
        }else{
            $this->view->set_flash("No tienes permisos para ver esa area. Inicia sesión.","alert-error");
            $this->redirect("index.php?controller=users&action=login");
        }
    }
    
    function delete(){
        
    }
    
    function edit(){
        
    }
}

?>
