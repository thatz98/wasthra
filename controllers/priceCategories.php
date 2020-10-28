<?php

class PriceCategories extends Controller{

    function __construct()
    {
        parent::__construct();
    
    }

    function index(){
        $this->view->pricecatList = $this->model->listPricecat();
    	$this->view->render('dashboard/owner/pricecategories');
    }


    function create(){
        $data = array();
        $data['price_category_id'] = $_POST['category_id'];
        $data['price_category_name'] = $_POST['category_name'];
        $data['production_cost'] = $_POST['production_cost'];
        $data['add_market_price'] = $_POST['market_price'];
        $data['discount'] = $_POST['discount'];
  

        $this->model->create($data);
        header('location: '.URL.'priceCategories');
   }


   function edit($id){
       $this->view->getpricecat = $this->model->getPriceCategory($id);
       $this->view->render('dashboard/owner/editPriceCategories');
 }
 
 
   function editSave(){
        $data = array();
        $data['prev_id'] = $_POST['prev_id'];
        $data['price_category_id'] = $_POST['category_id'];
        $data['price_category_name'] = $_POST['category_name'];
        $data['production_cost'] = $_POST['production_cost'];
        $data['add_market_price'] = $_POST['market_price'];
        $data['discount'] = $_POST['discount'];

        $this->model->update($data);
        header('location: '.URL.'priceCategories');
}

 
   function delete($id){
       $this->model->delete($id);
       header('location: '.URL.'priceCategories');
   }

}