<?php

class Wishlist extends Controller{

    function __construct()
    {
        parent::__construct();

    }

    function index(){
    	
    	$this->view->render('user/wish_list');
    }

  
}