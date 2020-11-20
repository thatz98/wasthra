<?php

class ContactUs extends Controller{
    function __construct()
    {
        parent::__construct();
        // Authenticate::adminAuth();
    }

    function index(){
        $this->view->title = 'Contact Us';
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();

        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> Contact Us';
    	$this->view->render('user/contactUS');
    }

}