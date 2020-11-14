<?php

class Stats extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
        $this->view->title = 'Stats | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i> Stats';

   	    $this->view->render('dashboard/owner/stats');
    }
}