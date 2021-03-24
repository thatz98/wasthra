<?php

class Wishlist extends Controller {

    function __construct() {
        parent::__construct();
        // customer only
        Authenticate::customerOnly();
    }

    /**
     * Display wishlist page
     *
     * @return void
     */
    function index() {

        $this->view->title = 'Wishlist';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Wishlist';
        
        // get items in the wishlist
        $this->view->wishlistqtyList =  $this->model->getAllProducts();
        $this->view->wishlistimageList =  $this->model->getwishlistImages();

        // get all product details
        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->colorList =  $this->model->getColors();
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->render('user/wish_list');
    }
    
    /**
     * Add products to wishlist
     *
     * @param  mixed $id Product id that need to be added to wishlist
     * @return void
     */
    function addToWishlist($id) {

        $this->model->create($id);
        if(isset($_SERVER['HTTP_REFERER'])){ 
        header('location: ' . $_SERVER['HTTP_REFERER'] . '?success=addedToWishlist#message');
    } else{
        header('location: ' . URL . '?success=addedToWishlist#message');
    }
    }
    
    /**
     * Remove exisitig item from wishlist
     *
     * @param  mixed $id Id of the item that need to be deleted from wishlist
     * @return void
     */
    function removeFromWishlist($id) {

        $this->model->delete($id);
        if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'],'wishlist')==FALSE){  
        header('location: ' . $_SERVER['HTTP_REFERER'] . 'wishlist?success=removedFromWishlist#message');
        } else{
            header('location: ' . URL . 'wishlist?success=removedFromWishlist#message');
        }
    }
}
