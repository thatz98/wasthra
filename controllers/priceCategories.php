<?php

class PriceCategories extends Controller{

    function __construct()
    {
        parent::__construct();
    
    }
    
    /**
     * Display the price category page
     *
     * @return void
     */
    function index(){
        $this->view->title = 'Price Categories';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Price Categories';

        $this->view->pricecatList = $this->model->listPricecat();
    	$this->view->render('control_panel/owner/price_categories');
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
    $this->view->title = 'Price Categories';
    $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'priceCategories">Price Categories</a> <i class="fas fa-angle-right"></i>Edit Price Category';

       $this->view->getpricecat = $this->model->getPriceCategory($id);
       $this->view->render('control_panel/owner/edit_price_categories');
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