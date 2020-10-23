<?php

class Orders extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
    	$this->view->render('index/index');
    }

    function myOrders(){
    	$this->view->render('order/index');
    }

    function myOrderDetails(){
    	$this->view->render('order/order_details');
    }

    function orderDashboard(){
    	$this->view->render('dashboard/admin/orders');
    }

    function orderDetails(){
    	$this->view->render('dashboard/admin/order_details');
    }

    function assignedOrders(){
    	$this->view->render('dashboard/delivery/orders');
    }

    function assignedOrderDetails(){
    	$this->view->render('dashboard/delivery/order_details');
    }

    function history(){
        $this->view->render('dashboard/delivery/history');
    }

    function historyDetails(){
        $this->view->render('dashboard/delivery/history_details');
    }
}