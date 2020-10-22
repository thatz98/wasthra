<?php

class Login extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
    	$this->view->render('user/login');
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
        $data['nic'] = $_POST['nic'];
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
}