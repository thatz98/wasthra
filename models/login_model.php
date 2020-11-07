<?php

class Login_Model extends Model{

    public function __construct(){
         parent::__construct();
    }

    public function run(){

        $username = $_POST['username'];
        $prev_url = $_POST['prev_url'];
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
                } else if(Session::get('userType')=='delivery'){
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
                header('location: '.$prev_url);
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

        

       header('location: ../login?success=signUp#message');
    }

    public function checkAccountExist($username){
        if(count($this->db->listWhere('login',array('username'),"username='$username'"))){
            return true;
        } else{
            return false;
        }

    }
}