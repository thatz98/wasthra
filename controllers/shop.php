<?php

class Shop extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->title = 'Shop | Wasthra';

    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

    	$this->view->render('shop/shop');
    }

    function productDetails($id){

    	$this->view->productList = $this->model->listProducts();
    	$this->view->product = $this->model->getProduct($id);
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

    	$this->view->render('shop/product_details');
    }

}