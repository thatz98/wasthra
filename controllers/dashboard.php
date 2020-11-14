<?php

class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        Authenticate::staffAuth();
    }

    function index(){
        $userType = Session::get('userType');
        $this->view->title = 'Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> Dashboard';

        if($userType=='admin'){
            $this->view->render('dashboard/admin/index');
        } else if($userType=='owner'){
            $this->view->render('dashboard/owner/index');
        } else if($userType=='delivery_staff'){
            $this->view->render('dashboard/delivery/index');
        }
    	
    }
    
}