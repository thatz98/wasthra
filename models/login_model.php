<?php

class Login_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function run(){

        $username = $_POST['username'];
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
                    $userData = $this->db->listWhere('admin',array('user_id','first_name','last_name'),"login_id='$loginId'");
                    Session::set('userId',$userData['user_id']);
                    Session::set('firstName',$userData['first_name']);
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='owner'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('owner',array('user_id','first_name','last_name'),"login_id='$loginId'");
                    Session::set('userId',$userData['user_id']);
                    Session::set('firstName',$userData['first_name']);
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='delivery'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('delivery_staff',array('user_id','first_name','last_name'),"login_id='$loginId'");
                    Session::set('userId',$userData['user_id']);
                    Session::set('firstName',$userData['first_name']);
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='customer'){
                    $loginId = Session::get('loginId');
                    $userData = $this->db->listWhere('customer',array('user_id','first_name','last_name'),"login_id='$loginId'");
                    Session::set('userId',$userData['user_id']);
                    Session::set('firstName',$userData['first_name']);
                    header('location: ../');
                }
                
            exit;
            } else{
                header('location: ../login');
            }
    		
    	} else{
    		header('location: ../login');
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

        

       header('location: ../login#signup=success');
    }


}