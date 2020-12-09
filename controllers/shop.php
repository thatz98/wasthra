<?php

class Shop extends Controller {

    function __construct() {

        parent::__construct();
    }
    
    /**
     * Display the shop page
     *
     * @return void
     */
    function index() {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Shop';

        // get all product details
        $this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

        $this->view->render('shop/shop');
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
        $this->view->productList = $this->model->listProducts();
        $this->view->product = $this->model->getProduct($id);
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->reviews = $this->model->reviewDetails($id);
        $this->view->reviewImageList = $this->model->reviewImages();

        $this->view->render('shop/product_details');
    }
    
    /**
     * Filter products by color
     *
     * @param  mixed $color Color which the products need to be filtered by
     * @return void
     */
    function byColor($color) {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Color';

        // get all product details in the given color
        $this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('color', '#' . $color);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = '#' . $color;
        
        $this->view->render('shop/shop');
    }
    
    /**
     * Filter products by Size
     *
     * @param  mixed $size Size which the products need to be filtered by
     * @return void
     */
    function bySize($size) {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Size';

        // get all product details in the given size
        $this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('size', $size);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = $size;
        
        $this->view->render('shop/shop');
    }
    
    /**
     * Filter products by Category
     *
     * @param  mixed $category Category which the products need to be filtered by
     * @return void
     */
    function byCategory($category) {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Category';

        // get all product details in the given category
        $this->view->productList = $this->model->listProducts();
        $this->view->qtyList =  $this->model->getAllDetailsBy('category', $category);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();
        $this->view->selected = $category;
        
        $this->view->render('shop/shop');
    }
    
    /**
     * Add product review by customer
     *
     * @return void
     */
    function submitReview() {

        $imageName['img'] = $_FILES['img']['name'];
        $imageName['temp'] = $_FILES['img']['tmp_name'];
        // upload all the images to the directory
        for ($x = 0; $x < sizeof($imageName['temp']); $x++) {
            move_uploaded_file($imageName['temp'][$x], 'C:\xampp\htdocs\wasthra\public\images\Review_images\\' . $imageName['img'][$x]);
        }

        $data = array();
        $data['product_id'] = $_POST['product_id'];
        $data['comment'] = $_POST['comment'];
        $data['rating'] = $_POST['rating'];
        $data['user_id'] = $_POST['user_id'];

        $date = date("Y-m-d");
        date_default_timezone_set("Asia/Kolkata");
        $time = date("H:i:s");
        $this->model->addReview($data, $date, $time, $imageName['img']);
        
        header('location: ' . URL . 'shop/productDetails/' . $data['product_id']);
    }
    
    /**
     * Delete existing reviews
     *
     * @param  mixed $id Review id
     * @param  mixed $productId Product id
     * @return void
     */
    function deleteReview($id, $productId) {

        $this->model->deleteReview($id);

        header('Location: ' . URL . 'shop/productDetails/' . $productId);
    }
    
    /**
     * Display checkout page
     *
     * @return void
     */
    function checkout() {

        $this->view->title = 'Checkout';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'cart">Cart</a> <i class="fas fa-angle-right"></i> Checkout';
        
        // get product details
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();
        
        $this->view->render('checkout/index');
    }
    
    /**
     * Proceed to payment
     *
     * @return void
     */
    function pay() {

        $this->view->title = 'Payment';
        
        if ($_POST['payment_method'] == 'online') {
            $this->view->render('checkout/payment');
        } else {

            header('location: ' . URL . 'orders/myOrders');
        }

        $data = array();
        $data['address_line_1'] = $_POST['address_line_1'];
        $data['address_line_2'] = $_POST['address_line_2'];
        $data['address_line_3'] = $_POST['address_line_3'];
        $data['city'] = $_POST['city'];
        $data['postal_code'] = $_POST['postal_code'];

        if (
            $data['address_line_1'] != Session::get('addressData')['address_line_1']
            || $data['address_line_2'] != Session::get('addressData')['address_line_2']
            || $data['address_line_3'] != Session::get('addressData')['address_line_3']
            || $data['city'] != Session::get('addressData')['city']
            || $data['postal_code'] != Session::get('addressData')['postal_code']
        ) {

            $this->model->create($data);
        }
        $aId = $this->model->getAddressId($data);
        echo $aId[0][0];
        $date = date("Y-m-d");
        date_default_timezone_set("Asia/Kolkata");
        $time = date("H:i:s");
        $orderID = 'ORD';
        $orderID .= $date;
        $orderID .= $time;
        $orderID .= Session::get('userId');
        $orderID = str_replace("-", "", $orderID);
        $orderID = str_replace(":", "", $orderID);
        $payMethod = $_POST['payment_method'];
        $this->model->placeOrder($date, $time, $orderID, $payMethod,$aId[0][0]);
    }

    // function placeOrder(){
    //     $data = array();
    // 	$data['address_line_1'] = $_POST['address_line_1'];
    //     $data['address_line_2'] = $_POST['address_line_2'];
    //     $data['address_line_3'] = $_POST['address_line_3'];
    //     $data['city'] = $_POST['city'];
    //     $data['postal_code'] = $_POST['postal_code'];

    //     if($data['address_line_1']!=Session::get('addressData')['address_line_1']
    //         || $data['address_line_2']!=Session::get('addressData')['address_line_2']
    //         || $data['address_line_3']!=Session::get('addressData')['address_line_3']
    //         || $data['city']!=Session::get('addressData')['city']
    //         || $data['postal_code']!=Session::get('addressData')['postal_code']){

    //         //$this->model->create($data);
    //     }


    //     //header('location: '.URL.'orders/myOrderDetails');
    // }

}
