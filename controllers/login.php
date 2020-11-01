<?php

class Login extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
        $this->view->usernames = $this->model->listUsernames();
        if(isset($_POST['screen-size'])){
            if($_POST['screen-size']<600){
                $this->view->render('user/mobile_login');
            } else{
                $this->view->render('user/login');
            }
        } else{
            $this->view->render('user/login');
        }
        
    	
    }

    function mobile(){
        $this->view->usernames = $this->model->listUsernames();
    	$this->view->render('user/mobile_login');
    }

    function run(){
    	$this->model->run();
    }

    function logout(){
        	Session::destroy();
        	header('location: ../');
        	exit;
    }

    function signup(){
        $data = array();
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['username'] = $_POST['email'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['user_status'] = 'new';
        $data['user_type'] = 'customer';

        $this->model->signup($data);
    }

    function changePassword(){
        $this->view->render('user/change_password');
    }
}