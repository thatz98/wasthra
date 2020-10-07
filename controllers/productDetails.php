<?php

class ProductDetails extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->render('shop/product_details');
    }
}