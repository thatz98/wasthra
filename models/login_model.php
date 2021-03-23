<?php

class Login_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function run()
    {

        $username = $_POST['username'];
        $prev_url = $_POST['prev_url'];
        if (empty($prev_url)) {
            $prev_url = URL;
        }

        $user = $this->db->selectOneWhere('login', array('login_id', 'username', 'password', 'user_type', 'user_status'), "username=:username",array('username'=>$username));

        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                if ($user['user_type'] == 'customer' && $user['user_status'] == 'new') {
                    Logs::writeSessionLog('Login','Failed',$username,'Account is not verified');
                    header('Location: ../login?username='.$user['username'].'&error=notVerified#message');
                    exit;
                } else {
                    Session::init();
                    Session::set('loggedIn', true);
                    Session::set('username', $user['username']);
                    Session::set('loginId', $user['login_id']);
                    Session::set('userType', $user['user_type']);
                    Logs::writeSessionLog('Login','Success',$username,'Session initialized; UserType: '.Session::get('userType'));
                    if (Session::get('userType') == 'admin') {
                        $loginId = Session::get('loginId');
                        $userData = $this->db->selectOneWhere('admin', array('user_id', 'first_name', 'last_name', 'gender', 'contact_no', 'email'), "login_id=:loginId",array('loginId'=>$loginId));
                        Session::set('userData', $userData);
                        Session::set('userId', $userData['user_id']);
                        header('location: ../controlPanel');
                    } else if (Session::get('userType') == 'owner') {
                        $loginId = Session::get('loginId');
                        $userData = $this->db->selectOneWhere('owner', array('user_id', 'first_name', 'last_name', 'gender', 'contact_no', 'email'),  "login_id=:loginId",array('loginId'=>$loginId));
                        Session::set('userData', $userData);
                        Session::set('userId', $userData['user_id']);
                        header('location: ../controlPanel');
                    } else if (Session::get('userType') == 'delivery_staff') {
                        $loginId = Session::get('loginId');
                        $userData = $this->db->selectOneWhere('delivery_staff', array('user_id', 'first_name', 'last_name', 'gender', 'contact_no', 'email'),  "login_id=:loginId",array('loginId'=>$loginId));
                        Session::set('userData', $userData);
                        Session::set('userId', $userData['user_id']);
                        header('location: ../controlPanel');
                    } else if (Session::get('userType') == 'customer') {
                        $loginId = Session::get('loginId');
                        $userData = $this->db->selectOneWhere('customer', array('user_id', 'first_name', 'last_name', 'gender', 'contact_no', 'email'),  "login_id=:loginId",array('loginId'=>$loginId));
                        Session::set('userData', $userData);
                        $cities = $this->db->select('delivery_charges',array('city'));
                        Session::set('city', $cities);
                        Session::set('userId', $userData['user_id']);
                        $userId = $userData['user_id'];
                        $addressData = $this->db->selectOneWhere('delivery_address', array('address_id', 'postal_code', 'address_line_1', 'address_line_2', 'address_line_3', 'city'), "user_id=:userId LIMIT 1",array('userId'=>$userId));
                        Session::set('addressData', $addressData);
                        $cartData = $this->getCartItems($userId);
                        Session::set('cartCount', count($cartData));
                        Session::set('cartData', $cartData);
                        if (isset($_POST['product_id']) && isset($_POST['item_size']) && isset($_POST['item_qty']) && isset($_POST['item_color'])) {
                            header('location: ' . URL . 'cart/addToCartAfterLogin?productId=' . $_POST['product_id'] . '&qty=' . $_POST['item_qty'] . '&color=' . $_POST['item_color'] . '&size=' . $_POST['item_size']);
                        } else {
                            if (strpos($prev_url, '/login') !== false) {
                                header('location: ' . URL);
                            } else {
                                header('location: ' . $prev_url);
                            }
                        }
                    }

                    exit;
                }
            } else {
                Logs::writeSessionLog('Login','Failed',$username,'Incorrect password');
                header('location: ../login?error=wrongPwd#message');
            }
        } else {
            Logs::writeSessionLog('Login','Failed',$username,'User does not exist');
            header('location: ../login?error=noAccount#message');
        }
    }

    function signup($data)
    {

        $this->db->insert('login', array(
            'username' => $data['username'],
            'password' => $data['password'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type'],
            'token' => $data['token']
        ));
        $username = $data['username'];
        Logs::writeSessionLog('Signup','In porcess',$username,'Login credentials initiated');
        $login_id = $this->db->selectOneWhere('login', array('login_id'), "username=:username",array('username'=>$username));

        $this->db->insert('customer', array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'login_id' => $login_id['login_id']
        ));
        $email = $data['email'];
        $user_id = $this->db->selectOneWhere('customer', array('user_id'), "email=:email",array('email'=>$email));
        if($user_id){
            Logs::writeSessionLog('Signup','Success',$username,'User created; pending verification');
        } else{
            Logs::writeSessionLog('Signup','Failed',$username,'User has not been created');
        }
        $this->db->insert('shopping_cart', array('user_id' => $user_id['user_id']));
    }

    function checkAccountExist($username)
    {
        if ($this->db->selectOneWhere('login', array('username'), "username=:username",array('username'=>$username)) == null) {
            return false;
        } else {
            return true;
        }
    }

    function createRecord($username, $token)
    {
        $this->db->insert('password_reset', array('username' => $username, 'token' => $token));
    }

    function checkToken($username, $token)
    {
        if ($this->db->selectOneWhere('password_reset', array('username'), "username=:username AND token=:token",array('username'=>$username,'token'=>$token)) == null) {
            return false;
        } else {
            return true;
        }
    }


    function checkVerifyToken($username, $token)
    {
        if ($this->db->selectOneWhere('login', array('username'), "username=:username AND token=:token",array('username'=>$username,'token'=>$token)) == null) {
            return false;
        } else {
            return true;
        }
    }

    function updatePassword($data)
    {
        $username = $data['username'];

        $this->db->update('login', array('password' => $data['password']), 'username=:username',array('username'=>$username));
    }


    function verifyAccount($username)
    {
        $this->db->update('login', array('user_status' => 'verified', 'token' => null), 'username=:username',array('username'=>$username));
    }

    function updateToken($username,$token){
        $this->db->update('login', array('token' => $token), 'username=:username',array('username'=>$username));
    }

    function getCartItems($userId) {
        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, price_category.product_price, cart_item.item_qty, cart_item.item_color, cart_item.item_size  FROM product
         INNER JOIN cart_item ON cart_item.product_id=product.product_id
         INNER JOIN shopping_cart ON shopping_cart.cart_id=cart_item.cart_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         WHERE shopping_cart.user_id=:userId
         GROUP BY cart_item.item_id",array('userId'=>$userId));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
        }

        return $data;
    }
}
