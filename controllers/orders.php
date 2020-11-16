<?php

class Orders extends Controller{
    function __construct(){
        parent::__construct();
    }

    function myOrders(){
        $this->view->title = 'My Orders | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> My Orders';

    	$this->view->render('order/index');
    }

    function myOrderDetails(){
        $this->view->title = 'My Order Details | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'orders/myOrders">My Orders</a> <i class="fas fa-angle-right"></i>My Order Details';

    	$this->view->render('order/order_details');
    }

    function orderDashboard(){
        $this->view->title = 'Orders | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i> Orders';

    	$this->view->render('dashboard/admin/orders');
    }

    function orderDetails(){
        $this->view->title = 'Order Details | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/myOrderDetails">Orders</a> <i class="fas fa-angle-right"></i> Order Details';
        $this->view->deliveryStaffList = $this->model->getDeliveryStaffList();
      //  print_r($this->view->deliveryStaffList);
    	$this->view->render('dashboard/admin/order_details');
    }

    function assignedOrders(){
        $this->view->title = 'Assigned Orders | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i> Assigned Orders';

    	$this->view->render('dashboard/delivery/orders');
    }

    function assignedOrderDetails(){
        $this->view->title = 'Assigned Order Details | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/assignedOrderDetails">Assigned Orders</a> <i class="fas fa-angle-right"></i> Assigned Order Details';

    	$this->view->render('dashboard/delivery/order_details');
    }

    function history(){
        $this->view->title = 'History | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i> History';

        $this->view->render('dashboard/delivery/history');
    }

    function historyDetails(){
        $this->view->title = 'History Details | Dashboard | Wasthra';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'dashboard">Dashboard</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/historyDetails">History</a> <i class="fas fa-angle-right"></i> History Details';

        $this->view->render('dashboard/delivery/history_details');
    }
}