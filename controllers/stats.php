<?php

class Stats extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
        $this->view->title = 'Stats';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Stats';

   	    $this->view->render('control_panel/owner/stats');
    }
}