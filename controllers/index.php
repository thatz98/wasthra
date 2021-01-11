<?php

class Index extends Controller {
    
    function __construct() {
        
        parent::__construct();
    }
    
    /**
     * Display the home page
     *
     * @return void
     */
    function index() {

        $this->view->title = 'Home';
     
        // get all product details
        $this->view->featuredProducts =  $this->model->getFeaturedProducts();
        $this->view->newProducts =  $this->model->getNewProducts();
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->render('index/index');
    }
    
}
