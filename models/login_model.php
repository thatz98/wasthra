<?php

class Login_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function run(){

        $username = $_POST['username'];
    	$user = $this->db->listWhere('login',array('nic','username','password','user_type','user_status'),"username='$username'");

    	if($user){
            if(password_verify($_POST['password'], $user['password'])){
                Session::init();
                Session::set('loggedIn',true);
                Session::set('username',$user['username']);
                Session::set('nic',$user['nic']);
                Session::set('userType',$user['user_type']);
                if(Session::get('userType')=='admin'){
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='owner'){
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='delivery'){
                    header('location: ../dashboard');
                } else if(Session::get('userType')=='customer'){
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

        $this->db->insert('customer',array(
            'nic' => $data['nic'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password'],
            'contact_no' => $data['contact_no'],
            'user_status' => $data['user_status']));

        $this->db->insert('login',array(
            'nic' => $data['nic'],
            'username' => $data['username'],
            'password' => $data['password'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type']));

       header('location: ../login#signup=success');
    }


}