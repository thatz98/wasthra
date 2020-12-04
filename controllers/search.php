<?php

class Search extends Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->title = 'Advanced Search';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Advanced Search';

        $this->view->qtyList =  array();
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();

        $this->view->render('shop/advanced_search');
    }

    function byMultiFilter() {
        $filters = array();

        if (isset($_POST['search_color'])) {
            $filters['color'] = $_POST['search_color'];
            $this->view->selectedColor = $filters['color'];
        }
        if (isset($_POST['search_size'])) {
            $filters['size'] = $_POST['search_size'];
            $this->view->selectedSize = $filters['size'];
        }
        if (isset($_POST['search_category'])) {
            $filters['category'] = $_POST['search_category'];
            $this->view->selectedCategory = $filters['category'];
        }
        if (isset($_POST['keyword'])) {
            $filters['keyword'] = $_POST['keyword'];
            $this->view->selectedKeyword = $filters['keyword'];
        }
        $this->view->title = 'Search Results';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'shop">Shop</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'search">Advanced Search</a> <i class="fas fa-angle-right"></i> Search Results';


        $this->view->qtyList =  $this->model->getAllDetailsByMultipleFilters($filters);
        $this->view->sizeList =  $this->model->getSizes();
        $this->view->imageList =  $this->model->getImages();
        $this->view->colorList =  $this->model->getColors();
        $this->view->categoryList =  $this->model->getCategories();
        $this->view->pricecategoryList =  $this->model->getPriceCategories();



        $this->view->render('shop/advanced_search');
    }
}
