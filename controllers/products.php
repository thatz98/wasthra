<?php

class Products extends Controller {

    function __construct() {

        parent::__construct();
        // restrict access to only admin and owner
        Authenticate::adminAuth();
    }


    /**
     * Display product page
     *
     * @return void
     */
    function index() {
        $this->view->title = 'Products';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Products';

        // get number of published items
        $this->view->publishedCount = $this->model->getPublishedCount();
        // get number of items that require login
        $this->view->reorderCount = $this->model->getReorderCount();
        // get number of items which is out of stock
        $this->view->outStockCount = $this->model->getOutStockCount();
        // get all product details
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->totQuantity = $this->model->getQty();
        // $totalQuantity = 0;
        // foreach ($quantity as $qty){
        //     $totalQuantity += $qty['qty'];
        // }
        //$this->view->totQuantity = $totalQuantity;
        $this->view->render('control_panel/admin/products');
    }

    /**
     * Display product detail page
     *
     * @param  mixed $id Id of the product that need to be displayed in the page
     * @return void
     */
    function productDetails($id) {

        $this->view->title = 'Product Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Product Details';

        // get all product details
        $this->view->product = $this->model->getProduct($id);
        $this->view->reviews = $this->model->getReviewDetails($id);
        $this->view->varients = $this->model->getVarientDetails($id);
        $this->view->sumQty = $this->model->getQtyCount($id);
        $this->view->render('control_panel/admin/view_product');
    }

    /**
     * Add new product
     *
     * @return void
     */
    function create() {

        $data = array();
        $data['product_id'] = $_POST['product_id'];
        $data['product_name'] = $_POST['product_name'];
        $data['product_description'] = $_POST['product_description'];
        $data['is_new'] = $_POST['is_new'];
        $data['is_published'] = $_POST['is_published'];
        $data['is_featured'] = $_POST['is_featured'];
        $data['category'] = $_POST['category'];
        $data['price_category'] = $_POST['price_category'];
        // $data['quantity'] = $_POST['quantity'];
        // $data['colors'] = $_POST['colors'];
        $data['meta_product_name'] = metaphone($_POST['product_name']);
        $data['meta_product_desc'] = metaphone($_POST['product_description']);

        // $size = $_POST['size'];
        $imageName['img'] = $_FILES['img']['name'];
        $imageName['temp'] = $_FILES['img']['tmp_name'];
        // upload all the photos
        for ($x = 0; $x < sizeof($imageName['temp']); $x++) {
            move_uploaded_file($imageName['temp'][$x], 'C:\xampp\htdocs\wasthra\public\images\products\\' . $imageName['img'][$x]);
        }

        $this->model->create($data, $imageName['img']);

        header('location: ' . URL . 'products');
    }

    function addVarient(){

        $data = array();
        $data['color'] = $_POST['color'];
        $data['qty'] = $_POST['quantity'];
        $data['product_id'] = $_POST['product_id'];
        $product_id = $data['product_id'];

        if($_POST['size']==''){
            $data['size_couple'] = $_POST['size-couple'];
            $size_couple = $data['size_couple'];
            $this->model->addVarient($data, $size_couple);
        }
        else{
            $data['size'] = $_POST['size'];
            $size = $data['size'];
            $this->model->addVarient($data, $size);
        }
        
        header('location: ' . URL . 'products/productDetails/'.$product_id);        

    }

    function editVariant($inventoryId,$id){

        $this->view->title = 'Edit Variant Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Product Details';

        // get all product details
        $this->view->product = $this->model->getProduct($id);
        $this->view->reviews = $this->model->getReviewDetails($id);
        //$this->view->varients = $this->model->getVarientDetails($id);
        $this->view->varients = $this->model->getVariantByID($inventoryId);
        $this->view->render('control_panel/admin/edit_variant');

    }


    /**
     * Display edit product page
     *
     * @param  mixed $id Id of the product that need to be updated
     * @return void
     */
    function edit($id) {

        $this->view->title = 'Products';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'products">Products</a> <i class="fas fa-angle-right"></i> Edit Product';

        // get product details of the given item id
        $this->view->product = $this->model->getProduct($id);
        $this->view->product_colors = $this->model->getColors();
        $this->view->product_category = $this->model->getCategories();
        $this->view->quantity = $this->model->getQty();
        $this->view->price_category = $this->model->getPriceCategories();
        //$this->view->imageList = $this->model->getImagesByID($id);
        $this->view->imageList =  $this->model->getImages();

        $sizeArray = array();
        foreach ($this->model->getSizesByID($id) as $sizes) {
            array_push($sizeArray, $sizes['sizes']);
        }
        $this->view->sizes = $sizeArray;

        $this->view->render('control_panel/admin/edit_products');
    }

    /**
     * Update existing product details
     *
     * @return void
     */
    function editSave() {

        // get the previous images
        $prevImages = rtrim($_POST['prev_images'], ",");
        $imageArray = explode(",", $prevImages);

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
        // $data['quantity'] = $_POST['quantity'];
        // $data['colors'] = $_POST['colors'];
        // $size = $_POST['size'];
        $imageName['img'] = $_FILES['img']['name'];
        $data['meta_product_name'] = metaphone($_POST['product_name']);
        $data['meta_product_desc'] = metaphone($_POST['product_description']);

        $this->model->update($data, $imageName['img'], $imageArray);

        header('location: ' . URL . 'products');
    }

    function updateVariant(){

        $data = array();
        $data['color'] = $_POST['color'];
        $data['size'] = $_POST['size'];
        $data['qty'] = $_POST['quantity'];
        $data['product_id'] = $_POST['product_id'];
        $data['inventory_id'] = $_POST['inventory_id'];
        $product_id = $data['product_id'];
        $inventory_id = $data['inventory_id'];
        $data['prev_color'] = $_POST['prev_color'];
        $data['prev_size'] = $_POST['prev_size'];
        //print_r($data);
        $this->model->updateVariant($data, $product_id, $inventory_id);

    }

    /**
     * Delete exisiting product
     *
     * @param  mixed $id Id of the product that need to be deleted
     * @return void
     */
    function delete($id) {

        $this->model->delete($id);

        header('location: ' . URL . 'products');
    }

    /**
     * Delete product images
     *
     * @param  mixed $id Id of the product
     * @param  mixed $name Name of the image
     * @return void
     */
    function deleteImage($id, $name) {

        $this->model->deleteImage($id, $name);

        header('location: ' . URL . 'edit/' . $id);
    }
}
