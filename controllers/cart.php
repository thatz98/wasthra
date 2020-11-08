<?php

class Cart extends Controller{
    function __construct(){
        parent::__construct();
        
    }

    function index(){
        Authenticate::handleLogin();
     //   $this->view->cartList = $this->model->listCart();
        $this->view->userCart = $this->model->listUserCart();
        $this->view->sizeList =  $this->model->getSizes(); 
        $this->view->imageList = $this->model->getImages();
        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->colorList =  $this->model->getColors();

    	$this->view->render('cart/cart');
    }
    function addToCart(){
           $data = array();
           $data['product_id'] = $_POST['product_id'];
           $data['item_qty']=$_POST['quantity'];
           $data['item_color']=$_POST['color'];
           $data['item_size']=$_POST['size'];
        
           if(Session::get('loggedIn')=='true'){
            $this->model->create($data);
            header('location: '.URL.'');
           } else{
            $data['item_color'] = str_replace('#','',$data['item_color']);
               header('location: '.URL.'login/cartRequireLogin?productId='.$data['product_id'].'&qty='.$data['item_qty'].'&color='.$data['item_color'].'&size='.$data['item_size'].'&loginRequired=true');
           }
           
    }

    function addToCartAfterLogin(){
        $data = array();
        $data['product_id'] = $_GET['productId'];
        $data['item_qty']=$_GET['qty'];
        $data['item_color']='#'.$_GET['color'];
        $data['item_size']=$_GET['size'];
     print_r($data);
        if(Session::get('loggedIn')=='true'){
         $this->model->create($data);
         header('location: '.URL.'?success=itemAddedToCart#message');
        } else{
            header('location: '.URL.'login/cartRequireLogin?productId='.$data['product_id'].'&qty='.$data['item_qty'].'&color='.$data['item_color'].'&size='.$data['item_size'].'&loginRequired=true');
        }
        
 }

 function updateCartItem($itemId){
    $data = array();
    $data['product_id'] = $_POST['prod_id'];
    $data['item_qty']=$_POST['quantity'];
    $data['item_color']=$_POST['color'];
    $data['item_size']=$_POST['size'];
    $data['item_id']=$itemId;
 
     $this->model->update($data);
     header('location: '.URL.'cart');
    
}

  function delete($id){
    $this->model->delete($id);
    header('location: '.URL.'cart');
}

}