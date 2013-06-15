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
class Number extends Model {
    //put your code here
    public $number_id;
    public $user_id;
    public $number;
    public $owner;
    public $num_reports = null;
    public $status = 1;
    public $created;
    public $modified;
    

    function __construct(){
       parent::__construct(get_class($this), 'numbers');
    }
    

    function search_by_number($number){
        $this->set_properties(get_object_vars($this));
        return $this->execute("SELECT * FROM numbers WHERE number = '$number' AND status = 1 LIMIT 1");
    }
    
    function save() {
        $this->set_properties(get_object_vars($this));
        return parent::save();
    }
    
    
}

?>
