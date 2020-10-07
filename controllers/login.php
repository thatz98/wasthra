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
        $this->model->signup();
    }
}