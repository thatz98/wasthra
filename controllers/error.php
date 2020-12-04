<?php

class ErrorE extends Controller{

    function __construct(){
        parent::__construct();   
    }
    
    /**
     * Display error page
     *
     * @param  mixed $msg Error message that need to be displayed
     * @return void
     */
    function index($msg){
    	$this->view->msg = "$msg";
        $this->view->render('error/index');
    }
}