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
        parent::__construct('Report',get_class_methods($this));
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
    
    function view(){
        
    }
    
    function add(){
        $this->view->title = "Denunciar un numero";
        $error = array();
        if($this->check_login()){
            if(!empty($this->data)){
                
                // valida numero telefonico
                if(is_numeric($this->data["number_txt"])){
                    $phone_number = trim($this->data["number_txt"]);
                    $number = new NumbersController("_number_exists");
                    $previous_number = $number->_number_exists($phone_number);
                    if(count($previous_number["Number"]) > 0 ){
                        $this->model->number_id = $previous_number["Number"]["number_id"];
                    }else{ //si el numero no existe, entonces crea uno
                        $number->model->number_id = $phone_number;
                        $number->model->owner = trim($this->data["owner_txt"]);
                        $number->model->user_id = intval($_SESSION["user_id"]);
                        $number->model->num_reports = 1;
                        if($number->model->save()){
                            $this->model->number_id = $this->model->get_inserted_id();
                        }else{
                            $this->view->set_flash("Error al guardar el numero.","alert-error");
                        }
                    }
                }else{
                    $errors[] = "Formato incorrecto de numero telefonico. Solo ingresa numeros.";
                }
                // Valida descricion
                if(!empty($this->data["description_txt"])){
                    $this->model->description = trim($this->data["description_txt"]);
                }else{
                    $errors[] = "La descripcion no puede ir vacia.";
                }
                
                if(isset($this->data["allow_notification_check"])){
                    $this->model->allow_notification = 1;
                }else{
                    $this->model->allow_notification = 0;
                }
                $this->model->user_id = intval($_SESSION["user_id"]);
                if(empty($errors)){ // si no hay errores
                    if($this->model->save()){
                        $report_id = $this->model->get_inserted_id();
                        $this->view->set_flash("Tu reporte se ha creado exitosamente!","alert-success");
                        $this->redirect("index.php?controller=reports&action=view&id=".$report_id);
                    }else{
                        $this->view->set_flash("Error al guardar el registro en la BD.","alert-error");
                    }
                }else{
                    $this->view->set_flash("Error al guardar el registro en la BD.","alert-error");
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
