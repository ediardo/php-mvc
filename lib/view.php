<?php

class View {
    protected $controller;
    protected $action;
    protected $layout;
    
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

    function render() {
        extract($this->variables);
        $this->action_view = APP_ROOT.DS."view".DS.$this->controller.DS.$this->action.".php";
        include(APP_ROOT.DS."view".DS."layout".DS.$this->layout.".php");
       
    }
    
}
?>
