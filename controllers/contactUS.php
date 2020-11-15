<?php

class ContactUs extends Controller{
    function __construct()
    {
        parent::__construct();
        // Authenticate::adminAuth();
    }

    function index(){
    	
    	$this->view->render('user/contactUS');
    }

}