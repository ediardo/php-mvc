<?php

/**
 * Description of PastesController
 *
 * @author ediardo
 */
class UsersController extends Controller {
    
    function __construct($action){
        if($action == "login" || $action == "add" || $action == "recover")
            $this->layout = "login";
        else
            $this->layout = "layout";
        $this->controller = 'users';
        $this->action = $action;
        parent::__construct('User',get_class_methods($this));
        @$this->$action();
        
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
            
            if($this->validate_username($this->data["username"])){
                $this->model->username = strtolower(trim($this->data["username"]));
            }else{
                $errors[] = "Formato de usuario incorrecto";
            }
            if ($this->validate_password($this->data["password_1"]) &&  $this->data["password_1"] == $this->data["password_2"]){
                $clean_password = $this->data["password_1"];
                $this->model->password = $this->password_salt($this->data["password_1"]);
            }else{
                $errors[] = "Formato de contraseña incorrecto";
            }if($this->validate_email($this->data["email"])){
                $this->model->email = strtolower(trim($this->data["email"]));
            }else{
                $errors[] = "Formato de email incorrecto";
            }
            if(empty($errors)){
                // checar si el usuario ya existe
                
                if(!$this->model->username_is_free($this->model->username)){
                    $this->view->set_flash("El nombre de usuario ".$this->model->username." ya existe!, escoge uno nuevo","alert-error");
                }else{
                    $this->model->group_id = 2;
                    if($this->model->save()){
                        $this->_new_account_email($this->model->get_inserted_id());
                        $this->view->set_flash("Tu cuenta se ha creado exitosamente!","alert-success");
                        $this->model->auth($this->model->username, $this->model->password);
                        $this->redirect("index.php?controller=numbers&action=search");
                    }else{
                        $this->view->set_flash("Error al guardar el registro en la BD.","alert-error");
                    }
                }
            }else{
                $this->view->set_flash("Error en los campos, verificalos! ", "alert-error");
            }
        }
    }
    /*
     * asda
     */
    function delete(){
        
    }
    
    function edit(){
        $this->view->title = "Editar mi cuenta";
        if($this->check_login()){
            if(!empty($this->data)){
                $fields = array();
                if(!empty($this->data["password_1"]))
                    if(($this->validate_password($this->data["password_1"]) &&  $this->data["password_1"] == $this->data["password_2"])){
                        $clean_password = $this->data["password_1"];
                        $this->model->password = $this->password_salt($this->data["password_1"]);
                        $fields[] = "password";
                    }else{
                        $errors[] = "Formato de contraseña incorrecto";
                }if($this->validate_email($this->data["email"])){
                    $this->model->email = strtolower(trim($this->data["email"]));
                    $fields[] = "email";
                }else{
                    $errors[] = "Formato de email incorrecto";
                }
                if(empty($errors)){
                    $this->model->user_id = $_SESSION["user_id"];
                    if($this->model->update($fields)){
                        $this->view->set_flash("Tu cuenta se ha modificado exitosamente!","alert-success");
                        $_SESSION["email"] = $this->model->email;
                    }else{
                        $this->view->set_flash("Error al guardar el registro en la BD.","alert-error");
                    }

                }else{
                    $this->view->set_flash("Error en los campos, verificalos! ", "alert-error");
                }
            }
            $this->view->set("username", $_SESSION["username"]);
            $this->view->set("email", $_SESSION["email"]);
        }else{
            $this->view->set_flash("No tienes permisos para ver esa area. Inicia sesión.","alert-error");
            $this->redirect("index.php?controller=users&action=login");
        }
    }
    
    function drop(){
        $this->view->title = "Dar de baja";
        
        if($this->check_login()){
            $this->view->set("drop_key", md5($_SESSION["user_id"].$_SESSION["email"]));
            if(!empty($this->data)){
                if($this->data["drop_key"] == md5($_SESSION["user_id"].$_SESSION["email"])){
                    $this->model->user_id = $_SESSION["user_id"];
                    $this->model->inactivateByID();
                    if($this->model->get_affected_rows() == 1){
                        $this->view->set_flash("Tu cuenta ha sido borrada exitosamente. Te extrañaremos!","alert-success");
                        $this->logout();
                    }  else {
                        $this->view->set_flash("Imposible dar de baja tu cuenta, contactanos para solucionar este problema. ", "alert-error");
                    }
                }
            }
        }else{
            $this->view->set_flash("No tienes permisos para ver esa area. Inicia sesión.","alert-error");
            $this->redirect("index.php?controller=users&action=login");
        }
    }
    function logout(){
        if(!empty($_SESSION['user_id'])){
            session_unset();
            session_destroy();
            setcookie(session_name('login'),'',time()-3600);
            $this->redirect("index.php?controller=numbers&action=search");
        }
    }
    function recover(){
        $this->view->title = "Recuperar contraseña";
        if(!$this->check_login()){
            if(!empty($this->data)){
                
            }
        }
    }
    function login(){
        $this->view->title = "Login";
        // si se envio datos por POST
        if(!empty($this->data)){
            if($this->model->auth($this->data['username'], $this->password_salt($this->data['password']))){
                $this->redirect("index.php?controller=users&action=index");
            }else{
                $this->view->set_flash("Usuario y contraseña incorrectos. Intenta de nuevo.", "alert-error");
            }
            
        }
    }
    
    function _new_account_email($user_id = null){
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
            return mail($to, $subject, $message,$headers);
            
        }
        return false;
        
    }
    
    function _recover_password_email($user_id = null){
        
    }
}

?>