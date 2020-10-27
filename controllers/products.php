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
        $imageName['img']=$_FILES['img[]']['name'];
        //echo $imageName['img'];
         $this->model->create($data,$size,$imageName['img']);
         header('location: '.URL.'products');

    }


    function edit($id){
        
        $this->view->product = $this->model->getProduct($id);
        $this->view->product_colors = $this->model->getColors();
        $this->view->product_category = $this->model->getCategories();
        $this->view->quantity = $this->model->getQty();
        $this->view->price_category = $this->model->getPriceCategories();
        $this->view->sizes = $this->model->getSizes();
        
    	$this->view->render('dashboard/admin/edit_products');
    }
    function editSave(){
        $data = array();
        $data['prev_id'] = $_POST['prev_id'];
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
        $this->model->update($data,$size);
        header('location: '.URL.'products');
    }

    function delete($id){
        $this->model->delete($id);
        header('location: '.URL.'products');
    }    
  
}
