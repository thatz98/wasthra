<?php

class Edit_Productcat extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	    	$this->view->render('dashboard/admin/Edit_productcat');
    }
}