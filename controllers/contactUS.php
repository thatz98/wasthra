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
    	$this->view->render('user/contactUS');
    }

}