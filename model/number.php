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
    protected $user_id;
    protected $username;
    protected $password;
    protected $email;
    protected $status;
    protected $created;
    protected $modified;
    

    function __construct(){
        parent::__construct('Number','numbers');
    }
    
    function test(){
        echo "test";
    }
    
}

?>
