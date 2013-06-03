<?php

/**
 * Description of PastesController
 *
 * @author ediardo
 */
class UsersController extends Controller {
    
    function __construct($action){
        if($this->action = "login")
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
        $this->view->set_title("Login");
        // si se envio datos por POST
        if(!empty($this->data)){
            if($this->model->auth($this->data['username'], $this->password_salt($this->data['password']))){
                $this->redirect("index.php?controller=users&action=index");
            }else{
                echo "contrasena mal";
            }
            
        }
    }
}

?>