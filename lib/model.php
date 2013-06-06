<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model
 *
 * @author ediardo
 */
class Model extends Database{
    //put your code here
    
    private $model;
    private $table;
    private $properties;
    
    function __construct($model, $table){
        
        
        $this->model = $model;
        $this->table = $table;
        
        parent::__construct($model,'localhost','cc409_autosiiau','AxI2rKBC4m','cc409_autosiiau',3306,'mysqli');
    }
    function set_properties($properties){
        $this->properties = $properties ;
    }
    /*
     * Magia!
     */
    public function __set($name, $value){
        $this->properties[$name] = $value;
    }
    private function get_id_name(){
        $keys = array_keys($this->properties);
        return $keys[0];
    }
    protected function showAll(){
        return $this->execute("SELECT * FROM $this->table");
    }
    
    function deleteById($id = null){
        
    }
    function search_by_number($number){
        return $this->model->execute("SELECT * FROM numbers WHERE number = '$number'");
    }
    function inactivateById($id = null){
        $magic_id_name = $this->get_id_name();
        $id = (empty($id))? $this->properties[$magic_id_name] : $id;
        $sql = "UPDATE $this->table SET status = 0 WHERE ".$magic_id_name." = $id";
        return $this->execute($sql);
    }
    function searchById($id = null){
        $magic_id_name = $this->get_id_name();
        $id = (empty($id))? $this->properties[$magic_id_name] : $id;
        return $this->execute("SELECT * FROM $this->table WHERE ".$magic_id_name." = $id");
              
    }
    /*
    function update($fields){
        foreach($fields as $field => $value){
            
        }
    }
     * 
     */
    function save(){
        if(empty($this->properties[0])){
            
            $sql_verb = "insert";
            $sql = "INSERT INTO $this->table SET ";
        }else{
            echo "update";
            $sql_verb = "update";
            $sql = "UPDATE $this->table SET ";
        }
        
        $fields = "";
        $values = "";
        $fields_count = count($this->properties);
        $x = 0;
        foreach($this->properties as $field => $value){
            
            switch(gettype($value)){
                case "string":
                    if($x == $fields_count-1)
                        $sql .= "$field = '".$value."'";
                    else
                        $values .= "$field = '".$value."',";
                    break;
                case "integer":
                    if($x == $fields_count-1)
                        $values .= "$field = ".$value."";    
                    else
                        $values .= "$field = ".$value.",";  
                    break;
            }
           
            ++$x;
                
        }
        if($sql_verb == "insert"){
            if(key_exists("created", $this->properties))
               $values .= ",created = NOW()";
            if(key_exists("modified", $this->properties)){
               $values .= ",modified = NOW()";
            }
        }
        if($sql_verb == "update"){
            if(key_exists("modified", $this->properties))
               $values .= ",modified = NOW()";
        }

        $sql .= $fields." ".$values;
        //echo $sql;
        return $this->execute($sql);
        
    }
    
}

?>
