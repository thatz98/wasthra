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
        $this->view->totQuantity = $this->model->getQty();
        $this->view->totProducts = $this->model->getProductCount();
        $this->view->allProducts = $this->model->getAllProducts();
        $this->view->pricecategoryList = $this->model->getPriceCategories();
        //print_r($this->model->getPriceCategories());
        $this->view->categoryList = $this->model->getCategories();

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
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'products">Products</a><i class="fas fa-angle-right"></i> Product Details';

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
        $data['meta_product_name'] = metaphone($_POST['product_name']);
        $data['meta_product_desc'] = metaphone($_POST['product_description']);

        $imageName['img'] = $_FILES['img']['name'];
        $imageName['temp'] = $_FILES['img']['tmp_name'];
        // upload all the photos
        for ($x = 0; $x < sizeof($imageName['temp']); $x++) {
            move_uploaded_file($imageName['temp'][$x], 'C:\xampp\htdocs\wasthra\public\images\products\\' . $imageName['img'][$x]);
        }
        Logs::writeApplicationLog('Add new Product','Attempting',Session::get('userData')['email'],$data);
        $this->model->create($data, $imageName['img']);
        Logs::writeApplicationLog('Product added','Successfull',Session::get('userData')['email'],$data);

        header('location: ' . URL . 'products');
    }
    
    /**
     * Add product varient
     *
     * @return void
     */
    function addVarient(){

        $data = array();
        $data['color'] = $_POST['color'];
        $data['qty'] = $_POST['quantity'];
        $data['product_id'] = $_POST['product_id'];
        $product_id = $data['product_id'];

        if($_POST['size']==''){
            $data['size_couple'] = $_POST['size-couple'];
            $size_couple = $data['size_couple'];
            Logs::writeApplicationLog('Add new Variant','Attempting',Session::get('userData')['email'],$data);
            $this->model->addVarient($data, $size_couple);
            Logs::writeApplicationLog('Variant added','Successfull',Session::get('userData')['email'],$data);
        }
        else{
            $data['size'] = $_POST['size'];
            $size = $data['size'];
            Logs::writeApplicationLog('Add new Variant','Attempting',Session::get('userData')['email'],$data);
            $this->model->addVarient($data, $size);
            Logs::writeApplicationLog('Variant added','Successfull',Session::get('userData')['email'],$data);
        }
        
        header('location: ' . URL . 'products/productDetails/'.$product_id);        

    }
    
    /**
     * Edit exisiting product varient
     *
     * @param  mixed $inventoryId Id of the vairent in the inventory
     * @param  mixed $id Id of the product
     * @return void
     */
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
        //$this->view->product_colors = $this->model->getColors();
        $this->view->product_category = $this->model->getCategories();
        //$this->view->quantity = $this->model->getQty();
        $this->view->price_category = $this->model->getPriceCategories();
        //$this->view->imageList = $this->model->getImagesByID($id);
        $this->view->imageList =  $this->model->getImages();

        

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
        Logs::writeApplicationLog('Edit product','Attempting',Session::get('userData')['email'],$data);
        $this->model->update($data, $imageName['img'], $imageArray);
        Logs::writeApplicationLog('Product edited','Successfull',Session::get('userData')['email'],$data);

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
        Logs::writeApplicationLog('Edit variant','Attempting',Session::get('userData')['email'],$data);
        $this->model->updateVariant($data, $product_id, $inventory_id);
        Logs::writeApplicationLog('Variant edited','Successfull',Session::get('userData')['email'],$data);

        header('location: ' . URL . 'products/productDetails/'.$product_id); 

    }

    /**
     * Delete exisiting product
     *
     * @param  mixed $id Id of the product that need to be deleted
     * @return void
     */
    function delete($id) {
        Logs::writeApplicationLog('Delete product','Attempting',Session::get('userData')['email'],$id);
        $this->model->delete($id);
        Logs::writeApplicationLog('Product deleted','Successfull',Session::get('userData')['email'],$id);

        header('location: ' . URL . 'products');
    }
    
    /**
     * Delete a product varient
     *
     * @param  mixed $id Id of the vairent
     * @param  mixed $pID Id of the product
     * @return void
     */
    function deleteVariant($id,$pID) {
        Logs::writeApplicationLog('Delete variant','Attempting',Session::get('userData')['email'],$id);
        $this->model->deleteVariant($id);
        Logs::writeApplicationLog('Variant deleted','Successfull',Session::get('userData')['email'],$id);

        header('location: ' . URL . 'products/productDetails/'.$pID);
    }
    
    /**
     * Delete product images
     *
     * @param  mixed $id Id of the product
     * @param  mixed $name Name of the image
     * @return void
     */
    function deleteImage($id, $name) {
        Logs::writeApplicationLog('Delete image','Attempting',Session::get('userData')['email'],$id);
        $this->model->deleteImage($id, $name);
        Logs::writeApplicationLog('Image deleted','Successfull',Session::get('userData')['email'],$id);

        header('location: ' . URL . 'edit/' . $id);
    }
}
