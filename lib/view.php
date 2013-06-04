<?php

class View {
    public $title;
    protected $variables = array();
    protected $controller;
    protected $action;
    protected $layout;
    private $content;
    function __construct($layout, $controller, $action) {
        $this->layout = $layout;
        $this->controller = $controller;
        $this->action = $action;
    }

    /** Set Variables **/

    function set($name,$value) {
        $this->variables[$name] = $value;
    }

    /** Display Template **/
    function set_title($title){
        $this->title = $title;
    }
    function render() {
        @extract($this->variables);
        $this->content = APP_ROOT.DS."view".DS.$this->controller.DS.$this->action.".php";
        include(APP_ROOT.DS."view".DS."layout".DS.$this->layout.".php");
       
    }
    
}
?>
