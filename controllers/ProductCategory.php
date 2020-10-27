<?php

class ProductCategory extends Controller{
    function __construct()
    {
        parent::__construct();
        // Authenticate::adminAuth();
    }

    function index(){
    	$this->view->productcatList = $this->model->listProductcat();
    	$this->view->render('dashboard/admin/ProductCategory');
    }

   
    function create(){
    	$data= array();
    	$data['category_id']= $_POST['product_category_id'];
    	$data['name']=$_POST['category_name'];

    	$this->model->create($data);
    	header('location: '.URL.'ProductCategory');
    }
     function delete($id){
    	$this->model->delete($id);
    	header('location:'.URL.'ProductCategory');
    }
}