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

    protected function showAll(){
        $this->execute("SELECT * FROM $this->table");
    }
    
    function deleteById($id){
        
    }
    function searchById($id){
        
    }
    function save($data){
        
    }
    
    
    
}

?>
