<?php

class View {
    public $title;
    protected $variables = array();
    protected $controller;
    protected $action;
    protected $layout;
    protected $show_message = false;
    private $content;
    
    function __construct($layout, $controller, $action) {
        $this->layout = $layout;
        $this->controller = $controller;
        $this->action = $action;
    }
    function __destruct() {
        //unset($_SESSION["flash"]);
    }
    /** Set Variables **/

    function set($name,$value) {
        $this->variables[$name] = $value;
    }
    
    function set_flash($message,$class){
        $_SESSION["flash"] = '<div class="alert '.$class.'">';
        $_SESSION["flash"] .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        $_SESSION["flash"] .= $message;
        $_SESSION["flash"] .= '</div>';
    }
    function flash(){
        $flash = (empty($_SESSION["flash"]))? "" : $_SESSION["flash"];
        unset($_SESSION["flash"]);
        if(!empty($flash))
            return $flash;
        
    }
    /** Display Template **/
    function set_title($title){
        $this->title = $title;
    }
    function render(){
        
        @extract($this->variables);
        $this->content = APP_ROOT.DS."view".DS.$this->controller.DS.$this->action.".php";
        include(APP_ROOT.DS."view".DS."layout".DS.$this->layout.".php");
       
    }
    
}
?>
