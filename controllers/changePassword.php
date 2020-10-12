<?php

class ChangePassword extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
    	
    	$this->view->render('user/change_password');
    }

  
}
