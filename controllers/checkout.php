<?php

class Checkout extends Controller{
    function __construct()
    {
        parent::__construct();
        Authenticate::handleLogin();
    }

    function index(){

    	$this->view->title = 'Checkout';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'cart">Cart</a> <i class="fas fa-angle-right"></i> Checkout';

    	$this->view->render('checkout/index');
    }

    function create(){
        $data = array();
    	$data['address_line_1'] = $_POST['address_line_1'];
        $data['address_line_2'] = $_POST['address_line_2'];
        $data['address_line_3'] = $_POST['address_line_3'];
        $data['city'] = $_POST['city'];
        $data['postal_code'] = $_POST['postal_code'];

        $this->model->create($data);
        header('location: '.URL.'shop');
    }
}