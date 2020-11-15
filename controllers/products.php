<?php

class Products extends Controller{
    
    function __construct()
    {
        
        parent::__construct();
        Authenticate::adminAuth();
    }
    

    function index(){
        $this->view->title = 'Products | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i> Products';

        $this->view->publishedCount = $this->model->getPublishedCount();
        $this->view->reorderCount = $this->model->getReorderCount();
        $this->view->outStockCount = $this->model->getOutStockCount();

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
        $imageName['img']=$_FILES['img']['name'];
        $imageName['temp']=$_FILES['img']['tmp_name'];
        for ($x=0; $x<sizeof($imageName['temp']); $x++){
            move_uploaded_file ($imageName['temp'][$x] , 'C:\xampp\htdocs\wasthra\public\images\products\\'.$imageName['img'][$x]);
        }
        $this->model->create($data,$size,$imageName['img']);
        header('location: '.URL.'products');

    }


    function edit($id){
        $this->view->title = 'Products | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i><a href="'.URL.'products">Products</a> <i class="fas fa-angle-right"></i>Edit Product';

        $this->view->product = $this->model->getProduct($id);
        $this->view->product_colors = $this->model->getColors();
        $this->view->product_category = $this->model->getCategories();
        $this->view->quantity = $this->model->getQty();
        $this->view->price_category = $this->model->getPriceCategories();
        //$this->view->imageList = $this->model->getImagesByID($id);
        $this->view->imageList =  $this->model->getImages();
        $sizeArray=array();
        foreach($this->model->getSizesByID($id) as $sizes){
            array_push($sizeArray,$sizes['sizes']);
        }
        $this->view->sizes = $sizeArray;

        $this->view->render('dashboard/admin/edit_products');
    }
    function editSave(){
        $prevImages = rtrim($_POST['prev_images'],",");
        $imageArray = explode(",",$prevImages);        
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
        $imageName['img']=$_FILES['img']['name'];
       
        $this->model->update($data,$size,$imageName['img'],$imageArray);
        header('location: '.URL.'products');
    }

    function delete($id){
        $this->model->delete($id);
        header('location: '.URL.'products');
    }    
  
    function deleteImage($id,$name){
        $this->model->deleteImage($id,$name);
        header('location: '.URL.'edit/'.$id);
    }   
}
