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
    public $user_id;
    public $username;
    public $password;
    public $email;
    public $status = 1;
    public $created;
    public $modified;
    public $group_id;
    

    function __construct(){
        parent::__construct(get_class($this), 'users');
    }
    
    function auth($username, $password){
        $result = $this->execute("SELECT users.*,groups.* FROM users INNER JOIN groups ON (groups.group_id = users.group_id) WHERE username = '$username' AND password = '$password' AND status IN (1) LIMIT 1");
        if($this->get_num_rows() > 0){
            $_SESSION["user_id"] =  $result["User"]["user_id"];
            $_SESSION["username"] =  $result["User"]["username"];
            $_SESSION["email"] =  $result["User"]["email"];
            $_SESSION["power"] =  $result["User"]["power"];
            return true;
        }else
            return false;
    }
    function save() {
        $this->set_properties(get_object_vars($this));
        return parent::save();
    }
    /*
     * Sobrescritura
     */
    function inactivateById($id = null) {
        $this->set_properties(get_object_vars($this));
        parent::inactivateById($id);
    }
    
    function recover_password_hash(){
        
    }
    
    function search_by_username($username){
        return $this->execute("SELECT * FROM users WHERE username = '$username'");
    }
    function update($fields){
        $fields_count = count($fields);
        $sql = "UPDATE users SET ";
        $x = 0;
        foreach($fields as $field){
            $x++;
            if($x < $fields_count)
                $sql .= "$field = '".$this->{$field}."',";
            else
                $sql .= "$field = '".$this->{$field}."'";
            
        }
        $sql .= " WHERE user_id = $this->user_id";
        return $this->execute($sql);
    }
    function username_is_free($username = null){
        //var_dump(get_object_vars($this));
        $username = (empty($username))? $this->username : $username;
        $this->execute("SELECT user_id FROM users WHERE username = '$username'");
        if($this->get_num_rows() > 0) //si ya esta ocupado
            return false;
        return true; //si esta libre 
    }

}

?>
