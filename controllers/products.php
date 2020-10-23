<?php

class Products extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
        $this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
    	$this->view->render('dashboard/admin/products');
    }

    function create(){
        $data = array();
    	$data['product_id'] = $_POST['product_id'];
        $data['product_name'] = $_POST['product_name'];
        $data['product_description'] = $_POST['product_description'];
        $data['is_new'] = $_POST['is_new'];
        $data['is_published'] = $_POST['is_published'];
        $data['is_featured'] = $_POST['is_featured'];
        $data['category'] = $_POST['category'];
        $data['price_category'] = $_POST['price_category'];
        $data['quantity'] = $_POST['quantity'];
        $data['colors'] = $_POST['colors'];
        
        $size=$_POST['size'];
       
        $this->model->create($data,$size);
        header('location: '.URL.'products');

    }


    function edit($id){
    	$this->view->product = $this->model->getProduct($id);
    	$this->view->render('dashboard/admin/edit_products');
    }

    function delete($id){
        $this->model->delete($id);
        header('location: '.URL.'products');
    }    
  
}
