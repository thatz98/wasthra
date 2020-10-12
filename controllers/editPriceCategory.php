<?php

class EditPriceCategory extends Controller{

    function __construct()
    {
        parent::__construct();
    
    }

    function index(){

    	$this->view->render('dashboard/owner/editPriceCategory');
    }
}
