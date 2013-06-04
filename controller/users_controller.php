<?php

/**
 * Description of PastesController
 *
 * @author ediardo
 */
class UsersController extends Controller {
    
    function __construct($action){
        if($action == "login" || $action == "add")
            $this->layout = "login";
        else
            $this->layout = "layout";
        $this->controller = 'users';
        $this->action = $action;
        parent::__construct('User');
        $this->$action();
        
    }
    function index(){
        
        if(!$this->check_login()){
           $this->redirect("index.php?controller=users&action=login");
        }
        
        
        
    }
    /*
     * 
     */
    function add(){
        $errors = array();
        $this->view->title = "Registrar nueva cuenta";
        if(!empty($this->data)){
            if(preg_match("/^[a-z\d_]{2,20}$/i",$this->data["username"])){
                $this->model->username = $this->data["username"];
            }else{
                $errors[] = "Formato de usuario incorrecto";
            }
            if (preg_match("/^[a-z0-9_-]{6,40}$/i", $this->data["password_1"]) &&  $this->data["password_1"] == $this->data["password_2"]){
                $this->model->password = $this->password_salt($this->data["password_1"]);
            }else{
                
            }if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $this->data["email"])){
                $this->model->email = $this->data["email"];
            }else{
                $errors[] = "Formato de email incorrecto";
            }
            if(empty($errors)){
                $this->model->group_id = 2;
                $this->model->save();
            }else{
                echo "todo mal";
            }
        }
    }
    /*
     * asda
     */
    function delete(){
        
    }
    
    function edit(){
        
    }
    function logout(){
        if(!empty($_SESSION['user_id'])){
            session_unset();
            session_destroy();
            setcookie(session_name('login'),'',time()-3600);
            echo "borrado";
        }else{
            echo "no session";
        }
        
    }
    function login(){
        $this->layout = "login";
        $this->view->title = "Login";
        // si se envio datos por POST
        if(!empty($this->data)){
            if($this->model->auth($this->data['username'], $this->password_salt($this->data['password']))){
                $this->redirect("index.php?controller=users&action=index");
            }else{
                echo "contrasena mal";
            }
            
        }
    }
    
    function new_account_email($user_id){
        $this->model->user_id = $user_id;
        $result = $this->model->searchById();
    }
}

?>