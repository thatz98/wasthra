<?php

class Shop extends Controller
{

    function __construct()
    {

        parent::__construct();
    }

    /**
     * Display the shop page
     *
     * @return void
     */
    function index()
    {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Shop';

        // get all product details
        $this->view->products = $this->model->getProductList();

        // get filter data
        $this->view->sizeList =  $this->model->getAllSizes();
        $this->view->colorList =  $this->model->getAllColors();
        $this->view->categoryList =  $this->model->getAllCategories();

        $this->view->render('shop/shop');
    }

    /**
     * Display product detail page
     *
     * @param  mixed $id Id of the product that need to be displayed in the page
     * @return void
     */
    function productDetails($id)
    {

        $this->view->title = 'Product Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Product Details';

        // get all product details
        $this->view->product = $this->model->getProduct($id);
        $this->view->reviews = $this->model->getReviewDetails($id);
        $this->view->featuredProducts =  $this->model->getFeaturedProducts();

        $this->view->render('shop/product_details');
    }

    /**
     * Filter products by color
     *
     * @param  mixed $color Color which the products need to be filtered by
     * @return void
     */
    function byColor($color)
    {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Color';

        // get all product details in the given color
        $this->view->products = $this->model->getProductListBy('color', '#' . $color);

        $this->view->sizeList =  $this->model->getAllSizes();
        $this->view->colorList =  $this->model->getAllColors();
        $this->view->categoryList =  $this->model->getAllCategories();

        $this->view->selected = '#' . $color;

        $this->view->render('shop/shop');
    }

    /**
     * Filter products by Size
     *
     * @param  mixed $size Size which the products need to be filtered by
     * @return void
     */
    function bySize($size)
    {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Size';

        // get all product details in the given size
        $this->view->products = $this->model->getProductListBy('size', $size);

        $this->view->sizeList =  $this->model->getAllSizes();
        $this->view->colorList =  $this->model->getAllColors();
        $this->view->categoryList =  $this->model->getAllCategories();

        $this->view->selected = $size;

        $this->view->render('shop/shop');
    }

    /**
     * Filter products by Category
     *
     * @param  mixed $category Category which the products need to be filtered by
     * @return void
     */
    function byCategory($category)
    {

        $this->view->title = 'Shop';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> Filter by Category';

        // get all product details in the given category
        $this->view->products = $this->model->getProductListBy('category', $category);

        $this->view->sizeList =  $this->model->getAllSizes();
        $this->view->colorList =  $this->model->getAllColors();
        $this->view->categoryList =  $this->model->getAllCategories();

        $this->view->selected = $category;

        $this->view->render('shop/shop');
    }

    /**
     * Add product review by customer
     *
     * @return void
     */
    function submitReview()
    {

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
    function deleteReview($id, $productId)
    {

        $this->model->deleteReview($id);

        header('Location: ' . URL . 'shop/productDetails/' . $productId);
    }

    /**
     * Display checkout page
     *
     * @return void
     */
    function checkout($flag)
    {

        $this->view->title = 'Checkout';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'cart">Cart</a> <i class="fas fa-angle-right"></i> Checkout';

        // get product details
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->flag = $flag;
        //$x=$this->model->getCartItems();
        //echo($x);
        if (Session::get('cartCount') == 0 && empty(Session::get('buyNowData'))) {
            header('location: ' . URL . 'shop');
        } else {
            $this->view->render('checkout/index');
        }
    }

    /**
     * Proceed to payment
     *
     * @return void
     */
    function pay()
    {

        $this->view->title = 'Payment';

        $data = array();
        $data['address_line_1'] = $_POST['address_line_1'];
        $data['address_line_2'] = $_POST['address_line_2'];
        $data['address_line_3'] = $_POST['address_line_3'];
        $data['city'] = explode(' ', $_POST['city'], 2)[0];
        $data['postal_code'] = $_POST['postal_code'];
        $data['latitude'] = $_POST['latitude'];
        $data['longtitude'] = $_POST['longtitude'];
        $data['buyNow'] = $_POST['buyNow'];
        $buyNow = $data['buyNow'];
        $comment = $_POST['delivery_comments'];
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
        $data['order_id'] = $orderID;
        if ($buyNow == "false") {
            Logs::writeApplicationLog('Placing an order with cart items', 'Attemting', Session::get('userData')['email'], $data);
            $this->model->placeOrder($date, $time, $orderID, $payMethod, $aId[0][0], $comment, $buyNow);
            Logs::writeApplicationLog('Order placed', 'Successfull', Session::get('userData')['email'], $data);
            $this->model->deleteCartItems();
            Session::set('cartData', '');
            Session::set('cartCount', 0);
            Session::set('buyNowData', '');
        } else {
            Logs::writeApplicationLog('Placing an order with buy now', 'Attemting', Session::get('userData')['email'], $data);
            $this->model->placeOrder($date, $time, $orderID, $payMethod, $aId[0][0], $comment, $buyNow);
            Logs::writeApplicationLog('Order placed', 'Successfull', Session::get('userData')['email'], $data);
        }

        if ($_POST['payment_method'] == 'online payment') {
            $this->view->orderDetails = $this->model->getAllOrderDetails($orderID);
         //   $this->view->render('checkout/payment');
        } else {

         //   header('location: ' . URL . 'orders/myOrderDetails/' . $orderID .'?success=orderPlaced#message');
        }
    }

    function getSizes()
    {
        if (isset($_POST["color"]) && isset($_POST["product_id"])) {
            echo json_encode($this->model->getSizes($_POST["product_id"], $_POST["color"]));
        }
    }

    function getGentsSizes()
    {
        $single_sizes_gents = array('XS-G', 'S-G', 'M-G', 'L-G', 'XL-G');
        if (isset($_POST["color"]) && isset($_POST["product_id"])) {
            $data = $this->model->getSizes($_POST["product_id"], $_POST["color"]);
            //  $sizes = array();
            foreach ($data as $record) {
                if (in_array($record['size'], $single_sizes_gents)) {
                    $record['size'] = rtrim($record['size'], "-W");
                }
            }

            echo json_encode($data);
        }
    }

    function getLadiesSizes()
    {
        $single_sizes_ladies = array('XS-W', 'S-W', 'M-W', 'L-W', 'XL-W');
        if (isset($_POST["color"]) && isset($_POST["product_id"])) {
            $data = $this->model->getSizes($_POST["product_id"], $_POST["color"]);
            $sizes = array();
            $result = array();
            foreach ($data as $record) {
                if (in_array($record['size'], $single_sizes_ladies)) {
                    $sizes['size'] = rtrim($record['size'], "-W");
                    $result .= $sizes;
                }
            }

            echo json_encode($result);
        }
    }

    function getQtys()
    {
        if (isset($_POST["color"]) && isset($_POST["size"]) && isset($_POST["product_id"])) {
            echo json_encode($this->model->getQtys($_POST["product_id"], $_POST["color"], $_POST["size"]));
        }
    }

    function getCoupleQtys()
    {
        if (isset($_POST["color"]) && isset($_POST["size1"]) && isset($_POST["size2"]) && isset($_POST["product_id"])) {
            echo json_encode($this->model->getCoupleQtys($_POST["product_id"], $_POST["color"], $_POST["size1"], $_POST["size2"]));
        }
    }
}
