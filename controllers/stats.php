<?php

class Stats extends Controller {

    function __construct() {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index() {
        $this->view->title = 'Stats';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Stats';

        if (isset($_GET['filter'])) {
            $filter = $_GET['filter'];
            switch ($filter) {
                case 'daily':
                    $this->view->visitorCount = $this->model->getVisitorCount("date=CURRENT_DATE()");
                    $this->view->salesCount = $this->model->getSalesCount("date=CURRENT_DATE()");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("date=CURRENT_DATE()");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("date=CURRENT_DATE()");
                    $this->view->salesDistribution = $this->model->getDailySalesDistribution("date=CURRENT_DATE()");
                    break;
                case 'weekly':
                    $this->view->visitorCount = $this->model->getVisitorCount("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->salesCount = $this->model->getSalesCount("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->salesDistribution = $this->model->getWeeklySalesDistribution();
                    break;
                case 'monthly':
                    $this->view->visitorCount = $this->model->getVisitorCount("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->salesCount = $this->model->getSalesCount("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->salesDistribution = $this->model->getMonthlySalesDistribution();
                    break;
                case 'yearly':
                    $this->view->visitorCount = $this->model->getVisitorCount("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->salesCount = $this->model->getSalesCount("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->salesDistribution = $this->model->getYearlySalesDistribution();
                    break;
                default:
                    $this->view->visitorCount = $this->model->getVisitorCount("date=CURRENT_DATE()");
                    $this->view->salesCount = $this->model->getSalesCount("date=CURRENT_DATE()");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("date=CURRENT_DATE()");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("date=CURRENT_DATE()");
                    $this->view->salesDistribution = $this->model->getDailySalesDistribution();
                    break;
            }
        } else {
            $this->view->visitorCount = $this->model->getVisitorCount("date=CURRENT_DATE()");
                    $this->view->salesCount = $this->model->getSalesCount("date=CURRENT_DATE()");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("date=CURRENT_DATE()");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("date=CURRENT_DATE()");
                    $this->view->salesDistribution = $this->model->getDailySalesDistribution();
        }
        $this->view->render('control_panel/owner/stats');
    }
}
