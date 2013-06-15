<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment
 *
 * @author ediardo
 */
class Report extends Model {
    //put your code here
    public $report_id;
    public $number_id;
    public $user_id;
    public $description;
    public $status = 1;
    public $allow_notification = 0;
    public $created;
    public $modified;
    
    

    function __construct(){
        parent::__construct(get_class($this), 'reports');
    }
    function searchById($id = null) {
        $this->set_properties(get_object_vars($this));
        parent::searchById($id);
    }
    function save() {
        $this->set_properties(get_object_vars($this));
        return parent::save();
    }
    
}

?>
