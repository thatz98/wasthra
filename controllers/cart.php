<?php

class Cart extends Controller {

    function __construct() {

        parent::__construct();
        // check whether the user is logged in
        Authenticate::handleLogin();
        // restrict access to only customers
        Authenticate::customerOnly();
    }

    /**
     * Display the cart
     *
     * @return void
     */
    function index() {

        $this->view->title = 'Cart';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Cart';

        // load delivery charges
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        // load items in the cart of the partcular customer
        $this->view->userCart = $this->model->listUserCart();
        //get all product details
        $this->view->cartItems = $this->model->getAllProducts();

        $this->view->render('cart/cart');
    }


    /**
     * Add items to cart
     *
     * @return void
     */
    function addToCart() {

        if (isset($_POST['prod_idC'])) {
            $sizeGents = $_POST['size1C'];
            $sizeLadies = $_POST['size2C'];
            $sizeNormal = $_POST['sizeC'];
            $sizeArray = '';
            $sizeArray .= $sizeNormal;
            $sizeArray .= $sizeLadies . ",";
            $sizeArray .= $sizeGents;
            // remove the last comma that has been added to the string
            $sizeArray = rtrim($sizeArray, ",");

            $data = array();
            $data['product_id'] = $_POST['prod_idC'];
            $data['item_qty'] = $_POST['quantityC'];
            $data['item_color'] = $_POST['colorC'];
            $data['item_size'] = $sizeArray;
        } else {
            $sizeGents = $_POST['size1'];
            $sizeLadies = $_POST['size2'];
            $sizeNormal = $_POST['size'];
            $sizeArray = '';
            $sizeArray .= $sizeNormal;
            $sizeArray .= $sizeLadies . ",";
            $sizeArray .= $sizeGents;
            // remove the last comma that has been added to the string
            $sizeArray = rtrim($sizeArray, ",");

            $data = array();
            $data['product_id'] = $_POST['prod_id'];
            $data['item_qty'] = $_POST['quantity'];
            $data['item_color'] = $_POST['color'];
            $data['item_size'] = $sizeArray;
        }
        $flag=0;
        // check whether the customer is logged in
        if (Session::get('loggedIn') == 'true') {
            foreach(Session::get('cartData') as $cartData){
                if($data['product_id']==$cartData['product_id'] && $data['item_color']==$cartData['item_color'] 
                && $data['item_size']==$cartData['item_size']){
                    //echo "yes";
                    Logs::writeApplicationLog('Add items to cart','Attemting',Session::get('userData')['username'],$data);
                    $this->model->updateCartQuantity($data,$cartData['item_qty']);
                    $flag++;
                    break;
                }
            }
            if($flag==0){
                Logs::writeApplicationLog('Add items to cart','Attemting',Session::get('userData')['username'],$data);
                $this->model->create($data);
            }
            
            if (strpos($_POST['prev_url'], '=') == false) {
                header('location: ' . $_POST['prev_url'] . '?success=itemAddedToCart#message');
            } else {
                header('location: ' . $_POST['prev_url'] . '&success=itemAddedToCart#message');
            }
        } else {
            $data['item_color'] = str_replace('#', '', $data['item_color']);

            // redirect customer to the login page
            // once the login is successfull, the item will be added to the cart
            header('location: ' . URL . 'login/cartRequireLogin?productId=' . $data['product_id'] . '&qty=' . $data['item_qty'] . '&color=' . $data['item_color'] . '&size=' . $data['item_size'] . '&loginRequired=true');
        }
    }

    function buyNow() {

        $sizeGents = $_POST['size1B'];
        $sizeLadies = $_POST['size2B'];
        $sizeNormal = $_POST['sizeB'];
        $sizeArray = '';
        $sizeArray .= $sizeNormal;
        $sizeArray .= $sizeLadies . ",";
        $sizeArray .= $sizeGents;
        // remove the last comma that has been added to the string
        $sizeArray = rtrim($sizeArray, ",");

        $data = array();
        $data['product_id'] = $_POST['prod_idB'];
        $data['item_qty'] = $_POST['quantityB'];
        $data['item_color'] = $_POST['colorB'];
        $data['item_size'] = $sizeArray;
        $productPrice = $this->model->getProductPriceById($data['product_id']);
        $data['product_price'] = $productPrice[0][0];
        // check whether the customer is logged in
        if (Session::get('loggedIn') == 'true') {
            Session::set('buyNowData', $data);
            //print_r(Session::get('buyNowData'));
            //echo($data['product_price']);
            //header('location: ' . $_POST['prev_url'].'?success=itemAddedToCart#message');
            Logs::writeApplicationLog('Add item to buy now','Attemting',Session::get('userData')['username'],$data);
            header('location: ' . URL . 'shop/checkout/buyNow');
        } else {
            $data['item_color'] = str_replace('#', '', $data['item_color']);

            // redirect customer to the login page
            // once the login is successfull, the item will be added to the cart
            //header('location: ' . URL . 'login/cartRequireLogin?productId=' . $data['product_id'] . '&qty=' . $data['item_qty'] . '&color=' . $data['item_color'] . '&size=' . $data['item_size'] . '&loginRequired=true');
        }
    }


    /**
     * Add items to cart after login (if the customer has not already logged in by the time he/she clicks 'Add to cart')
     *
     * @return void
     */
    function addToCartAfterLogin() {

        $data = array();
        $data['product_id'] = $_GET['productId'];
        $data['item_qty'] = $_GET['qty'];
        $data['item_color'] = '#' . $_GET['color'];
        $data['item_size'] = $_GET['size'];

        // check whether the customer is logged in
        if (Session::get('loggedIn') == 'true') {
            $this->model->create($data);

            header('location: ' . URL . '?success=itemAddedToCart#message');
        } else {
            // redirect customer to the login page
            // once the login is successfull, the item will be added to the cart
            header('location: ' . URL . 'login/cartRequireLogin?productId=' . $data['product_id'] . '&qty=' . $data['item_qty'] . '&color=' . $data['item_color'] . '&size=' . $data['item_size'] . '&loginRequired=true');
        }
    }

    /**
     * Update the exisiting items in the cart
     *
     * @param  mixed $itemId Id of the item that need to be updated
     * @return void
     */
    function updateCartItem($itemId) {

        $sizeGents = $_POST['size1'];
        $sizeLadies = $_POST['size2'];
        $sizeNormal = $_POST['size'];
        $sizeArray = '';
        $sizeArray .= $sizeNormal;
        $sizeArray .= $sizeLadies . ",";
        $sizeArray .= $sizeGents;
        // remove the last comma that has been added to the string
        $sizeArray = rtrim($sizeArray, ",");

        $data['product_id'] = $_POST['prod_id'];
        $data['item_qty'] = $_POST['quantity'];
        $data['item_color'] = $_POST['color'];
        $data['item_size'] = $sizeArray;
        $data['item_id'] = $itemId;

        $this->model->update($data);

        header('location: ' . URL . 'cart?success=itemUpdatedToCart#message');
    }


    /**
     * Delete an item from the cart
     *
     * @param  mixed $id Id of the item that need to be deleted
     * @return void
     */
    function delete($id) {

        $this->model->delete($id);

        header('location: ' . URL . 'cart?success=itemDeleted#message');
    }
}
