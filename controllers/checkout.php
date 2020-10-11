<?php

class Checkout extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->title = 'Home | Wasthra';
    	$this->view->render('checkout/index');
    }
}