<?php

class Products extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
    	
    	$this->view->render('dashboard/admin/products');
    }

    function edit(){
    	
    	$this->view->render('dashboard/admin/edit_products');
    }

  
}
