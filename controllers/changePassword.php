<?php

class ChangePassword extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){	
    	header('location: ./#change-password');
    }

  
}
