<?php

class PriceCategories extends Controller{

    function __construct()
    {
        parent::__construct();
    
    }

    function index(){

    	$this->view->render('dashboard/owner/pricecategories');
    }
}

function create(){
    $data = array();
    $data['category_id'] = $_POST['category_id'];
    $data['category_name'] = $_POST['category_name'];
    $data['production_cost'] = $_POST['production_cost'];
    $data['market_price'] = $_POST['market_price'];
    $data['discount'] = $_POST['discount'];
  

    $this->model->create($data);
    header('location: '.URL.'user');
}

function edit($id){
    $this->view->user = $this->model->getUser($id);
    $this->view->render('dashboard/admin/edit_user');
}

function editSave(){
    $data = array();
    $data['category_id'] = $_POST['category_id'];
    $data['category_name'] = $_POST['category_name'];
    $data['production_cost'] = $_POST['production_cost'];
    $data['market_price'] = $_POST['market_price'];
    $data['discount'] = $_POST['discount'];

    $this->model->update($data);
    header('location: '.URL.'user');
}

function delete($id){
    $this->model->delete($id);
    header('location: '.URL.'user');
}
