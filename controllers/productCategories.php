<?php

class ProductCategories extends Controller {
    function __construct() {

        parent::__construct();
        // restrict access to admin and owner
        Authenticate::adminAuth();
    }
    
    /**
     * Display product category page
     *
     * @return void
     */
    function index() {

        $this->view->title = 'Product Categories';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Product Categories';

        // get product category list
        $this->view->productcatList = $this->model->listProductcat();

        $this->view->render('control_panel/admin/product_category');
    }

    
    /**
     * Add new product category
     *
     * @return void
     */
    function create() {

        $data = array();
        $data['category_id'] = $_POST['product_category_id'];
        $data['name'] = $_POST['category_name'];

        $this->model->create($data);

        header('location: ' . URL . 'productCategories');
    }

    
    /**
     * Display edit product category page
     *
     * @param  mixed $id Id of the product that need to be updated
     * @return void
     */
    function edit($id) {

        $this->view->title = 'Product Categories';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'productCategories">Product Categories</a> <i class="fas fa-angle-right"></i>Edit Product Category';

        // fet details of the given id
        $this->view->getproductcategory = $this->model->getProductcat($id);

        $this->view->render('control_panel/admin/edit_productcat');
    }
    
    /**
     * Update existing product cateogry
     *
     * @return void
     */
    function editSave() {

        $data = array();
        $data['prev_id'] = $_POST['prev_id'];
        $data['category_id'] = $_POST['product_category_id'];
        $data['name'] = $_POST['category_name'];

        $this->model->update($data);

        header('location: ' . URL . 'productCategories');
    }
    
    /**
     * Delete existing product category
     *
     * @param  mixed $id Id of the product category that need to be deleted
     * @return void
     */
    function delete($id) {

        $this->model->delete($id);
        
        header('location:' . URL . 'productCategories');
    }
}
