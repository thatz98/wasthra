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

    function byColor($color){
    	$this->view->title = 'Shop | Wasthra';

    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('color','#'.$color);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories(); 
        $this->view->selected = '#'.$color;  
    	$this->view->render('shop/shop');
    }

    function bySize($size){
    	$this->view->title = 'Shop | Wasthra';

    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('size',$size);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = $size;
    	$this->view->render('shop/shop');
    }

    function byCategory($category){
    	$this->view->title = 'Shop | Wasthra';

    	$this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('category',$category);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = $category;   
    	$this->view->render('shop/shop');
    }

    function addReview($id){
        
        $this->view->productName = $this->model->getProductName($id);
        $this->view->render('user/add_review');
    }

    function submitReview(){

        // $imageName['img']=$_FILES['img']['name'];
        // $imageName['temp']=$_FILES['img']['tmp_name'];
        // for ($x=0; $x<sizeof($imageName['temp']); $x++){
        //     move_uploaded_file ($imageName['temp'][$x] , 'C:\xampp\htdocs\wasthra\public\images\products\\'.$imageName['img'][$x]);
        // }
        $data = array();
        $data['product_id'] = $_POST['product_id'];
        $data['comment'] = $_POST['comment'];
        $data['rating'] = $_POST['rating'];
        $data['user_id'] = $_POST['user_id'];

        $this->model->addReview($data);

        header('location: '.URL.'shop');
    }

}