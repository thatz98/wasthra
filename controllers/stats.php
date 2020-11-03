<?php

class Stats extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
        
   	    $this->view->render('dashboard/owner/stats');
    }
}