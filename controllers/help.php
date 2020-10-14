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
    	echo "this is help contoller $data $data2 <br>";
    	

    	$testData = $this->model->index();

    	$this->view->testData = $testData;


    	$this->view->render('testing');


    }
}