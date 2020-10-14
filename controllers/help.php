<?php

class Help extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function other($arg=false)
    {

        require 'models/help_model.php';
        $model = new Help_Model();
    }

    public function index($data=false, $data2=false){


    	$this->view->render('formtest');


    }
}