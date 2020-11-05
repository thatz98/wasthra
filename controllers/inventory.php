<?php

class Inventory extends Controller{
    
    function __construct()
    {
        
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
        
        $this->view->inventoryDetails = $this->model->listInventoryDetials();
        $this->view->render('dashboard/admin/inventory');
    }

    function edit($id){
        $this->view->getInventory = $this->model->getInventory($id);
        $this->view->render('dashboard/admin/edit_inventory');
     }

     function editSave(){
        $data = array();
        $data['product_id'] = $_POST['product_id'];
        $data['reorder_level'] = $_POST['reorder_level'];
        $data['reorder_qty'] = $_POST['reorder_quantity'];

        $this->model->update($data);
        header('location: '.URL.'inventory');
    }
}