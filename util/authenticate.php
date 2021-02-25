<?php


class Authenticate
{

	public static function handleLogin(){
		Session::init();
        $logged = Session::get('loggedIn');
        if($logged==false){
            Session::destroy();
           if($_SERVER['REDIRECT_URL']=='/wasthra/cart/addToCart'){
           } else{
            header('location: '.URL.'login?loginRequired=true');
            exit;
           }
            
        }
	}

	public static function adminAuth(){
		Session::init();
        $logged = Session::get('loggedIn');
        $userType = Session::get('userType');
        $username = Session::get('username');
        if(!$logged){
            Logs::writeLog('access_log',basename($_SERVER['PHP_SELF']),"Unautherized guest access!");
            Session::destroy();
            header('location: '.URL.'login?loginRequired=true');
            exit;
        } else if(!($userType=='admin' || $userType=='owner')){
            Logs::writeLog('access_log',basename($_SERVER['PHP_SELF']),"Unautherized $userType access by $username!");
            Session::destroy();
            header('location: '.URL.'login?loginRequired=true');
            exit;
        }
    }
    
    public static function ownerAuth(){
		Session::init();
        $logged = Session::get('loggedIn');;
        $userType = Session::get('userType');
        $username = Session::get('username');
        if(!$logged){
            Logs::writeLog('access_log',basename($_SERVER['PHP_SELF']),"Unautherized guest access!");
            Session::destroy();
            header('location: '.URL.'login?loginRequired=true');
            exit;
        } else if(!$userType=='owner'){
            Logs::writeLog('access_log',basename($_SERVER['PHP_SELF']),"Unautherized $userType access by $username!");
            Session::destroy();
            header('location: '.URL.'login?loginRequired=true');
            exit;
        }
    }

	public static function staffAuth(){
		Session::init();
        $logged = $_SESSION['loggedIn'];
        $userType = Session::get('userType');
        if($logged==false || $userType=='customer'){
            Session::destroy();
            header('location: '.URL.'login?loginRequired=true');
            exit;
        }
    }
    
    public static function customerOnly(){
		Session::init();
        $logged = $_SESSION['loggedIn'];
        $userType = Session::get('userType');
        if($logged==false){
            Session::destroy();
            if($_SERVER['REDIRECT_URL']=='/wasthra/cart/addToCart'){
            } else{
             header('location: '.URL.'login?loginRequired=true');
             exit;
            }
            
        } else if($userType!='customer'){
            header('location: ../?error=customerOnly#message');
            exit;
        }
	}
}