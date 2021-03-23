<?php

class Controller{

    function __construct(){
        $this->view = new View();

        
    }

    public function loadModel($name){
    	
    	$path = 'models/'.$name.'_model.php';

    	if(file_exists($path)){
        	require 'models/'.$name.'_model.php';
        	$modelName = $name.'_Model';
        	$this->model = new $modelName();
            $ip = $_SERVER['REMOTE_ADDR'];
        $this->model->db->insert('visitors',array('ip'=>"$ip",'date'=>'CURDATE()','time'=>'CURRENT_TIME()'));
        }
        
    }
    
}