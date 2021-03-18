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
                    $this->view->orderDistribution = $this->model->getDailyOrderDistribution("date=CURRENT_DATE()");
                    $this->view->salesDistribution = $this->model->getDailySalesDistribution("date=CURRENT_DATE()");
                    $this->view->revenueDistribution = $this->model->getDailyRevenueDistribution("date=CURRENT_DATE()");
                    $this->view->visitorDistribution = $this->model->getDailyVisitorDistribution("date=CURRENT_DATE()");
                    break;
                case 'weekly':
                    $this->view->visitorCount = $this->model->getVisitorCount("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->salesCount = $this->model->getSalesCount("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("YEARWEEK(date,5) = YEARWEEK(CURDATE(),5)");
                    $this->view->orderDistribution = $this->model->getWeeklyOrderDistribution();
                    $this->view->salesDistribution = $this->model->getWeeklySalesDistribution();
                    $this->view->revenueDistribution = $this->model->getWeeklyRevenueDistribution();
                    $this->view->visitorDistribution = $this->model->getWeeklyVisitorDistribution();
                    break;
                case 'monthly':
                    $this->view->visitorCount = $this->model->getVisitorCount("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->salesCount = $this->model->getSalesCount("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->orderDistribution = $this->model->getMonthlyOrderDistribution();
                    $this->view->revenueDistribution = $this->model->getMonthlyRevenueDistribution();
                    $this->view->salesDistribution = $this->model->getMonthlySalesDistribution();
                    $this->view->visitorDistribution = $this->model->getMonthlyVisitorDistribution();
                    break;
                case 'yearly':
                    $this->view->visitorCount = $this->model->getVisitorCount("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->salesCount = $this->model->getSalesCount("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("YEAR(date) = YEAR(CURRENT_DATE())");
                    $this->view->orderDistribution = $this->model->getYearlyOrderDistribution();
                    $this->view->salesDistribution = $this->model->getYearlySalesDistribution();
                    $this->view->revenueDistribution = $this->model->getYearlyRevenueDistribution();
                    $this->view->visitorDistribution = $this->model->getYearlyVisitorDistribution();
                    break;
                default:
                    $this->view->visitorCount = $this->model->getVisitorCount("date=CURRENT_DATE()");
                    $this->view->salesCount = $this->model->getSalesCount("date=CURRENT_DATE()");
                    $this->view->revenueAndCost = $this->model->getRevenueAndCost("date=CURRENT_DATE()");
                    $this->view->totalOrderCount = $this->model->getTotalOrderCount("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("date=CURRENT_DATE()");
                    $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("date=CURRENT_DATE()");
                    $this->view->orderDistribution = $this->model->getDailyOrderDistribution();
                    $this->view->salesDistribution = $this->model->getDailySalesDistribution();
                    $this->view->revenueDistribution = $this->model->getDailyRevenueDistribution();
                    $this->view->visitorDistribution = $this->model->getDailyVisitorDistribution();
                    break;
            }
        } else {
            $this->view->visitorCount = $this->model->getVisitorCount("date=CURRENT_DATE()");
            $this->view->salesCount = $this->model->getSalesCount("date=CURRENT_DATE()");
            $this->view->revenueAndCost = $this->model->getRevenueAndCost("date=CURRENT_DATE()");
            $this->view->totalOrderCount = $this->model->getTotalOrderCount("date=CURRENT_DATE()");
            $this->view->totalSalesPerCategory = $this->model->getTotalSalesPerCategory("date=CURRENT_DATE()");
            $this->view->totalSalesPerCity = $this->model->getTotalSalesPerCity("date=CURRENT_DATE()");
            $this->view->orderDistribution = $this->model->getDailyOrderDistribution();
            $this->view->salesDistribution = $this->model->getDailySalesDistribution();
            $this->view->revenueDistribution = $this->model->getDailyRevenueDistribution();
            $this->view->visitorDistribution = $this->model->getDailyVisitorDistribution();
        }

        $visitors = explode(",", $this->view->visitorDistribution[1]);
        $sales = explode(",", $this->view->orderDistribution[1]);
        $conversions = array();
        foreach ($visitors as $key => $value) {
            if ($value == 0) {
                $conversions[$key] = 0;
            } else {
                $conversions[$key] = $sales[$key] / $value;
            }
        }
        $this->view->convDistribution = implode(",",$conversions);

       //$this->view->render('control_panel/owner/stats');
    }
}
