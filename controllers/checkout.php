<?php

class Checkout extends Controller{
    function __construct()
    {
        parent::__construct();
        Authenticate::handleLogin();
    }

    function index(){

    	 $this->view->title = 'Checkout | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'cart">Cart</a> <i class="fas fa-angle-right"></i> Checkout';

    	$this->view->render('checkout/index');
    }
}