<?php


class Authenticate
{
	
	function __construct()
	{
	}

	public static function handleLogin(){
		Session::init();
        $logged = $_SESSION['loggedIn'];
        $userType = Session::get('userType');
        if($logged==false){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }
	}

	public static function adminAuth(){
		Session::init();
        $logged = $_SESSION['loggedIn'];
        $userType = Session::get('userType');
        if($logged==false || !($userType=='admin' || $userType=='owner')){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }
	}

	public static function staffAuth(){
		Session::init();
        $logged = $_SESSION['loggedIn'];
        $userType = Session::get('userType');
        if($logged==false || $userType=='customer'){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }
	}
}