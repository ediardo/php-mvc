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
                if($this->model->save()){
                    $this->new_account_email($this->model->get_inserted_id());
                }
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
        if($this->model->get_num_rows() == 1){
            $to = $result["User"]["email"];
            $subject = "Bienvenido a Reportel";
            $message = "<h1>Bienvenido a reportel!</h1>";
            $message .= "Ahora podrás hacer uso mas amplio de la pagina al web, ya que ahora puedes: ";
            $message .= "<ul>";
            $message .= "<li>Reportar numeros</li>";
            $message .= "<li>Comentar reportes</li>";
            
            $message .= "</ul>";
            $message .= "Esperamos que Reportel sea de gran ayuda para ti!";
            
            $message .= "Atte.";
            $message .= "Staff Reportel";
            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: noreply@reportel.com' . "\r\n" .
                        'Reply-To: noreply@reportel.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message,$headers);
            
        }
        return false;
        
    }
}

?>