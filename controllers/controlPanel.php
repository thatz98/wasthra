<?php

class ControlPanel extends Controller{
    function __construct(){
        parent::__construct();
        Authenticate::staffAuth();
    }

    function index(){
        $userType = Session::get('userType');
        $this->view->title = 'Control Panel';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> Control Panel';

        if($userType=='admin'){
            $this->view->render('control_panel/admin/index');
        } else if($userType=='owner'){
            $this->view->render('control_panel/owner/index');
        } else if($userType=='delivery_staff'){
            $this->view->render('control_panel/delivery/index');
        }
    	
    }
    
}