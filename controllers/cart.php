<?php

class Cart extends Controller {

    function __construct() {
        parent::__construct();
        Authenticate::handleLogin();
    }

    function index() {
        $this->view->title = 'Cart';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Cart';
        
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->userCart = $this->model->listUserCart();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList = $this->model->getImages();
        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->colorList =  $this->model->getColors();

        $this->view->render('cart/cart');
    }
    function addToCart() {
        
        $sizeGents = $_POST['size1'];
        $sizeLadies = $_POST['size2'];
        $sizeNormal = $_POST['size'];
        $sizeArray = '';
        $sizeArray .= $sizeNormal;
        $sizeArray .= $sizeLadies . ",";
        $sizeArray .= $sizeGents;
        $sizeArray = rtrim($sizeArray, ",");

        $data = array();
        $data['product_id'] = $_POST['prod_id'];
        $data['item_qty'] = $_POST['quantity'];
        $data['item_color'] = $_POST['color'];
        $data['item_size'] = $sizeArray;

        if (Session::get('loggedIn') == 'true') {
            $this->model->create($data);
            header('location: ' . $_POST['prev_url'].'?success=itemAddedToCart#message');
        } else {
            $data['item_color'] = str_replace('#', '', $data['item_color']);
            header('location: ' . URL . 'login/cartRequireLogin?productId=' . $data['product_id'] . '&qty=' . $data['item_qty'] . '&color=' . $data['item_color'] . '&size=' . $data['item_size'] . '&loginRequired=true');
        }
    }

    function addToCartAfterLogin() {
        $data = array();
        $data['product_id'] = $_GET['productId'];
        $data['item_qty'] = $_GET['qty'];
        $data['item_color'] = '#' . $_GET['color'];
        $data['item_size'] = $_GET['size'];
        
        if (Session::get('loggedIn') == 'true') {
            $this->model->create($data);
            header('location: ' . URL . '?success=itemAddedToCart#message');
        } else {
            header('location: ' . URL . 'login/cartRequireLogin?productId=' . $data['product_id'] . '&qty=' . $data['item_qty'] . '&color=' . $data['item_color'] . '&size=' . $data['item_size'] . '&loginRequired=true');
        }
    }

    function updateCartItem($itemId) {
        $sizeGents = $_POST['size1'];
        $sizeLadies = $_POST['size2'];
        $sizeNormal = $_POST['size'];
        $sizeArray = '';
        $sizeArray .= $sizeNormal;
        $sizeArray .= $sizeLadies . ",";
        $sizeArray .= $sizeGents;
        $sizeArray = rtrim($sizeArray, ",");
        
        $data['product_id'] = $_POST['prod_id'];
        $data['item_qty'] = $_POST['quantity'];
        $data['item_color'] = $_POST['color'];
        $data['item_size'] = $sizeArray;
        $data['item_id'] = $itemId;

        $this->model->update($data);
        header('location: ' . URL . 'cart?success=itemUpdatedToCart#message');
    }

    function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'cart?success=itemDeleted#message');
    }
}
