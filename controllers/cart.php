<?php

class Cart extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->cartList = $this->model->listCart();
        $this->view->userCart = $this->model->listUserCart(); 
        $this->view->imageList = $this->model->getImages();
        $this->view->priceCatList = $this->model->getCatName();
        $this->view->priceCatID = $this->model->getPriceCatIdProducts();
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




  function delete($id){
    $this->model->delete($id);
    header('location: '.URL.'cart');
}

}