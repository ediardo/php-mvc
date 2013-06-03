<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author ediardo
 */
class Database{
    private $model;
    private $host;
    private $user;
    private $password;
    private $db;
    private $port;
    private $driver;
    private $con;
    private $result;
    private $err_no;
    private $err_msg;
    private $affected_rows;
    private $num_rows;
    private $query_success;
    private $fields;
    protected function __construct($model,$host,$user,$password, $db, $port, $driver){
        $this->model = $model;
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->port = $port;
        $this->driver = $driver;
        $this->connect();   
    }
    private function connect(){
        switch($this->driver){
            case 'mysqli':
                $this->con = new mysqli($this->host, $this->user, $this->password,  $this->db, $this->port);
                if(!$this->con){
                    $this->err_no = $this->con->connect_errno;
                    $this->err_msg = $this->con->connect_error;
                }
                break;
        }
    }
    public function get_num_rows(){
        return $this->num_rows;
    }
    public function get_affected_rows(){
        return $this->affected_rows;
    }
    public function get_err_no(){
        return $this->err_no;
    }
    public function get_err_msg(){
        return $this->err_msg;
    }
    protected function get_result(){
        return $this->result;
    }
    protected function get_fields(){
        return $this->fields;
    }
    protected function execute($query){
        $this->result = $this->con->query($query);
        // si es un select
        if(is_object($this->result)){
            $this->num_rows = $this->result->num_rows;
            return $this->parse_result();
            // si es un DML
        }elseif($this->result){
            $this->affected_rows = $this->con->affected_rows;
            return true;
        }else{
            echo $this->con->connect_error;
            $this->err_no = $this->con->connect_errno;
            $this->err_msg = $this->con->connect_error;
            return false;
        }
    }
    public function __set($name, $value){
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }
    protected function parse_result(){
        $arr[$this->model] = array();
        while($row = $this->result->fetch_assoc()){
            $arr[$this->model] = $row;
        }
        return $arr;
    }
   
}

?>
