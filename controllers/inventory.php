<?php

class Inventory extends Controller {

    function __construct() {

        parent::__construct();
        // restrict access to only admin and owner
        Authenticate::adminAuth();
    }
    
    /**
     * Display invertory management page
     *
     * @return void
     */
    function index() {
        $this->view->title = 'Inventory';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'products">Products</a> <i class="fas fa-angle-right"></i> Inventory';

        // get invertory details
        $this->view->inventoryDetails = $this->model->listInventoryDetials();
        $this->view->totProducts = $this->model->getProductCount();
        $this->view->render('control_panel/admin/inventory');
    }
    
    /**
     * Display edit inventory page
     *
     * @param  mixed $id Id of the product inventory that need to be updated
     * @return void
     */
    function edit($id) {

        $this->view->title = 'Inventory';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'products">Products</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'controlPanel/inventory">Inventory</a> <i class="fas fa-angle-right"></i>Edit Inventory';

        // get the details of a given id
        $this->view->getInventory = $this->model->getInventory($id);
        $this->view->render('control_panel/admin/edit_inventory');
    }
    
    /**
     * Update existing inventory details
     *
     * @return void
     */
    function editSave() {

        $data = array();
        $data['product_id'] = $_POST['product_id'];
        $data['reorder_level'] = $_POST['reorder_level'];
        $data['reorder_qty'] = $_POST['reorder_quantity'];
        $data['size'] = $_POST['size'];
        $data['color'] = $_POST['color'];
        
        $this->model->update($data);
        
        header('location: ' . URL . 'inventory');
    }

    
}
