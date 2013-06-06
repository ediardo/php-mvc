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
    protected $report_id;
    protected $number_id;
    protected $description;
    protected $status;
    protected $created;
    protected $modified;
    

    function __construct(){
        parent::__construct(get_class($this), 'reports');
    }
    function searchById($id = null) {
        $this->set_properties(get_object_vars($this));
        parent::searchById($id);
    }
    function test(){
        echo "test";
    }
    
}

?>
