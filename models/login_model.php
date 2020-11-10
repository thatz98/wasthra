<?php

class Login_Model extends Model{

    public function __construct(){
         parent::__construct();
    }

    public function run(){

        $username = $_POST['username'];
        $prev_url = $_POST['prev_url'];
        if(empty($prev_url)){
            $prev_url = URL; 
        }

    	$user = $this->db->listWhere('login',array('login_id','username','password','user_type','user_status'),"username='$username'");

    	if($user){
            if(password_verify($_POST['password'], $user['password'])){
                Session::init();
                Session::set('loggedIn',true);
                Session::set('username',$user['username']);
                Session::set('loginId',$user['login_id']);
                Session::set('userType',$user['user_type']);
                if(Session::get('userType')=='admin'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('admin',array('user_id','first_name','last_name','gender','contact_no','email'),"login_id='$loginId'");
                    Session::set('userData',$userData);
                    Session::set('userId',$userData['user_id']);
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='owner'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('owner',array('user_id','first_name','last_name','gender','contact_no','email'),"login_id='$loginId'");
                    Session::set('userData',$userData);
                    Session::set('userId',$userData['user_id']);
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='delivery_staff'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('delivery_staff',array('user_id','first_name','last_name','gender','contact_no','email'),"login_id='$loginId'");
                    Session::set('userData',$userData);
                    Session::set('userId',$userData['user_id']);
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='customer'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('customer',array('user_id','first_name','last_name','gender','contact_no','email'),"login_id='$loginId'");
                    Session::set('userData',$userData);
                    Session::set('userId',$userData['user_id']);
                    $userId = $userData['user_id'];
                    $addressData = $this->db->listWhere('delivery_address',array('address_id','postal_code','address_line_1','address_line_2','address_line_3','city'),"user_id='$userId'");
                    Session::set('addressData',$addressData);
                    $cartId=$this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
                    $id=$cartId[0]['cart_id'];
                //  print_r($id);
                  $cartData = $this->db->query("SELECT cart_item.product_id,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size
                    FROM cart_item WHERE cart_item.cart_id='$id';");
                Session::set('cartData',$cartData);
                if(isset($_POST['product_id']) && isset($_POST['item_size']) && isset($_POST['item_qty']) && isset($_POST['item_color'])){
                    header('location: '.URL.'cart/addToCartAfterLogin?productId='.$_POST['product_id'].'&qty='.$_POST['item_qty'].'&color='.$_POST['item_color'].'&size='.$_POST['item_size']);
                } else{
                    if($prev_url==URL.'login'){
                        header('location: '.URL);
                    } else{
                        header('location: '.$prev_url);

                    }
                }
                
                }
                
            exit;
            } else{
                header('location: ../login?error=wrongPwd#message');
            }
    		
    	} else{
    		header('location: ../login?error=noAccount#message');
    	} 

    }

    public function signup($data){

        $this->db->insert('login',array(
            'username' => $data['username'],
            'password' => $data['password'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type']));
            $username = $data['username'];

        $login_id = $this->db->listWhere('login',array('login_id'),"username='$username'"); 

        $this->db->insert('customer',array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'login_id' => $login_id['login_id']
        ));
        $email = $data['email'];
        $user_id = $this->db->listWhere('customer',array('user_id'),"email='$email'");

        $this->db->insert('shopping_cart',array('user_id' => $user_id['user_id']));

       header('location: ../login?success=signUp#message');
    }

    public function checkAccountExist($username){
        if($this->db->listWhere('login',array('username'),"username='$username'")==null){
            return false;
        } else{
            return true;
        }

    }
}