<?php

class Wishlist extends Controller {

    function __construct() {
        parent::__construct();
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
        $this->view->wishlistqtyList =  $this->model->getwishlistDetails();
        $this->view->wishlistimageList =  $this->model->getwishlistImages();

        // get all product details
        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->colorList =  $this->model->getColors();
        
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

        header('location: ' . URL . '');
    }
    
    /**
     * Remove exisitig item from wishlist
     *
     * @param  mixed $id Id of the item that need to be deleted from wishlist
     * @return void
     */
    function removeFromWishlist($id) {

        $this->model->delete($id);
        
        header('location: ' . URL . 'wishlist');
    }
}
