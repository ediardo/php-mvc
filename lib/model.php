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
    
    function __construct($model, $table, $properties){
        
        
        $this->model = $model;
        $this->table = $table;
        $this->properties = $properties;
        
        parent::__construct($model,'localhost','cc409_autosiiau','AxI2rKBC4m','cc409_autosiiau',3306,'mysqli');
    }
    /*
     * Magia!
     */
    public function __set($name, $value){
        $this->properties[$name] = $value;
    }
    
    protected function showAll(){
        return $this->execute("SELECT * FROM $this->table");
    }
    
    function deleteById($id = null){
        
    }
    function searchById($id = null){
        return $this->execute("SELECT * FROM $this->table WHERE ".key($properties[0])." = $properties[0]");
    }
    function save($data = null){
        if(empty($this->properties[0])){
            $sql_type = "insert";
            $sql = "INSERT INTO $this->table SET ";
        }else{
            $sql_type = "update";
            $sql = "UPDATE $this->table SET ";
        }
        
        $fields = "";
        $values = "";
        $fields_count = count($this->properties);
        echo $fields_count;
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
            /*
            if($x == 0){
                $fields .= "(";
                $values .= "(";
            }else{
                
                if($x == $fields_count-1)
                    $fields .= "$field)";
                else
                    $fields .= "$field,";
                switch(gettype($value)){
                    case "string":
                        if($x == $fields_count-1)
                            $values .= "'".$value."')";
                        else
                            $values .= "'".$value."',";
                        break;
                    case "integer":
                        if($x == $fields_count-1)
                            $values .= "".$value.")";    
                        else
                            $values .= "".$value.",";  
                        break;
                }
            }
            ++$x;
             * 
             */
            
        
        $sql .= $fields." VALUES ".$values;
        echo $sql;
        
    }
    
    
    
}

?>
