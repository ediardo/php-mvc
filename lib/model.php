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
        var_dump($this->properties);
        if(empty($this->properties[0])){
            
            $sql_verb = "insert";
            $sql = "INSERT INTO $this->table SET ";
        }else{
            //echo "update";
            $sql_verb = "update";
            $sql = "UPDATE $this->table SET ";
        }
        
        $fields = "";
        $values = "";
        $fields_count = count($this->properties);
        //echo $fields_count;
        $x = 0;
        foreach($this->properties as $field => $value){
            ++$x;
            switch(gettype($value)){
                case "string":
                    if($x == $fields_count)
                        $sql .= "$field = '".$value."'";
                    else
                        $values .= "$field = '".$value."',";
                    break;
                case "integer":
                    if($x == $fields_count)
                        $values .= "$field = ".$value."";    
                    else
                        $values .= "$field = ".$value.",";  
                    break;
            }
           if($field == "created"){
                if($x == $fields_count)
                    $values .= "created = NOW()";
                else 
                    $values .= "created = NOW(),";
                
           }
           if($field == "modified"){
                if($x == $fields_count)
                    $values .= "modified = NOW()";
                else 
                    $values .= "modified = NOW(),";
                
           }
                
        }
        /*
        if($sql_verb == "insert"){
            if(key_exists("created", $this->properties))
              
            if(key_exists("modified", $this->properties)){
               
            }
        }
         * 
         */
        if($sql_verb == "update"){
            if(key_exists("modified", $this->properties))
               $values .= ",modified = NOW()";
        }

        $sql .= $fields." ".$values;
        echo $sql;
        return $this->execute($sql);
        
    }
    
}

?>
