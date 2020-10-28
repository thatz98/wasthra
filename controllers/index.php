<?php

class Index extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->title = 'Home | Wasthra';
    	$this->view->product = array();
    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

    	$this->view->render('index/index');
    }

   }