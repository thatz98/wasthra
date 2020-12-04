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
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

        $this->view->render('index/index');
    }
    
}
