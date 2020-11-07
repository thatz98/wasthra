<?php

class Cart extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->cartList = $this->model->listCart();
        $this->view->imageList = $this->model->getImages();
        $this->view->qtyList = $this->model->getAllDetails();
        
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

//     function edit($id){
//         $this->view->qty =  $this->model->getQty($id);
//         $this->view->size =  $this->model->getSize($id);
//         $this->view->color =  $this->model->getColor($id);
//         $this->view->colorList =  $this->model->getColors();
//         $this->view->sizeList =  $this->model->getSizes();
//         $this->view->getCart = $this->model->getCart($id);
//         $this->view->render('cart/editCart');
//   }


  function delete($id){
    $this->model->delete($id);
    header('location: '.URL.'cart');
}

}