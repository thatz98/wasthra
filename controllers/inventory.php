<?php

class Inventory extends Controller{
    
    function __construct()
    {
        
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
        $this->view->title = 'Inventory | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i> Inventory';

        $this->view->inventoryDetails = $this->model->listInventoryDetials();
        $this->view->render('dashboard/admin/inventory');
    }

    function edit($id){
        $this->view->title = 'Inventory | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i><a href="'.URL.'dashboard/inventory">Inventory</a> <i class="fas fa-angle-right"></i>Edit Inventory';

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