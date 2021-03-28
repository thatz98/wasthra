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
        $this->view->wishlist =  $this->model->getAllProductsInWishlist();
       
        $this->view->render('user/wish_list');
    }
    
    /**
     * Add products to wishlist
     *
     * @param  mixed $id Product id that need to be added to wishlist
     * @return void
     */
    function addToWishlist($id) {

        Logs::writeApplicationLog('Add Item to Wishlist','Attemting',Session::get('userData')['email'],$id);
        $this->model->create($id);
        Logs::writeApplicationLog('Item Added to Wishlist','Successfull',Session::get('userData')['email'],$id);

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

        Logs::writeApplicationLog('Delete Item from Wishlist','Attemting',Session::get('userData')['email'],$id);
        $this->model->delete($id);
        Logs::writeApplicationLog('Item Deleted from Wishlist','Successfull',Session::get('userData')['email'],$id);

        if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'],'wishlist')==FALSE){  
        header('location: ' . $_SERVER['HTTP_REFERER'] . 'wishlist?success=removedFromWishlist#message');
        } else{
            header('location: ' . URL . 'wishlist?success=removedFromWishlist#message');
        }
    }
}
