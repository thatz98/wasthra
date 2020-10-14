<?php

class Help_Model extends Model{

    function __construct(){
        parent::__construct();
        
    }

    function index(){
    	return "hello from the model";
    }
}