<?php

class ErrorE extends Controller{

    function __construct(){
        parent::__construct();   
    }

    function index($msg){
    	$this->view->msg = "$msg";
        $this->view->render('error/index');
    }
}