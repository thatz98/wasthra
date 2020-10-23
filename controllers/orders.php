<?php

class Orders extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
    	$this->view->render('order/index');
    }

    function orderDetails(){
    	$this->view->render('order/order_details');
    }
}