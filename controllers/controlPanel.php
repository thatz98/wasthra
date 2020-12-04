<?php

class ControlPanel extends Controller{
    
    function __construct(){
        
        parent::__construct();
        // restrict access to the staff
        Authenticate::staffAuth();
    }
    
    /**
     * Display the control panel page based on the user type
     *
     * @return void
     */
    function index(){

        $this->view->title = 'Home';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> Control Panel';

        $userType = Session::get('userType');
        // render the view based on the user type
        if($userType=='admin'){
            $this->view->render('control_panel/admin/index');
        } else if($userType=='owner'){
            $this->view->render('control_panel/owner/index');
        } else if($userType=='delivery_staff'){
            $this->view->render('control_panel/delivery/index');
        }
    	
    }
    
}