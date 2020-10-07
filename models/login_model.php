<?php

class Login_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function run(){

    	$stmt = $this->db->prepare("SELECT username,password,user_type FROM user WHERE username=:username");
    	$stmt->execute(array(':username'=>$_POST['username']));

    	$users = $stmt->fetchAll();
        $count = $stmt->rowCount();

    	if($count>0){
            foreach ($users as $user) {
            if(password_verify($_POST['password'], $user['password'])){
                Session::init();
                Session::set('loggedIn',true);
                Session::set('username',$user['username']);
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
        }
    		
    	} else{
    		header('location: ../login');
    	}

    }

    public function signup(){
        $nic = $_POST['nic'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $contact_no = $_POST['contact_no'];
        $username = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_status = 'new';
        $user_type = 'customer';

        $stmt = $this->db->prepare('INSERT INTO user (nic,first_name,last_name,gender,email,username,password,contact_no,user_status,user_type) VALUES (:nic,:first_name,:last_name,:gender,:email,:username,:password,:contact_no,:user_status,:user_type)');
        $stmt->execute($arr = array(':nic' => $nic,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':gender' => $gender,
            ':email' => $email,
            ':username' => $username,
            ':password' => $password,
            ':contact_no' => $contact_no,
            ':user_status' => $user_status,
            ':user_type' => $user_type));

        header('location: ../login');
    }


}