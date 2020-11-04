<?php

class Cart extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
    	$this->view->render('cart/cart');
    }

    function addToCart(){
    	
    }
}