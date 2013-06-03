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
class User extends Model {
    //put your code here
    protected $user_id;
    protected $username;
    protected $password;
    protected $email;
    protected $status;
    protected $created;
    protected $modified;
    

    function __construct(){
        
        parent::__construct(get_class($this), 'users', get_class_vars(get_class($this)));
    }
    
    function auth($username, $password){
        $result = $this->execute("SELECT users.*,groups.* FROM users INNER JOIN groups ON (groups.group_id = users.group_id) WHERE username = '$username' AND password = '$password' AND status IN (1) LIMIT 1");
        if($this->get_num_rows() > 0){
            $_SERVER["user_id"] =  $result["User"]["user_id"];
            $_SERVER["username"] =  $result["User"]["username"];
            $_SERVER["power"] =  $result["User"]["power"];
            return true;
        }else
            return false;
    }

}

?>
