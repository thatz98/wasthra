<?php

class Cart extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
    	$this->view->render('cart/cart');
    }
    function addToCart(){
           $data = array();
           $data['product_id'] = $_POST['prod_id'];
           $data['item_qty']=$_POST['quantity'];
           $data['item_color']=$_POST['color'];
           $data['item_size']=$_POST['size'];

           $this->model->create($data);
           header('location: '.URL.'');
    }

}