<?php

class Orders extends Controller{

    function __construct(){
        parent::__construct();

    }

    function myOrders(){

        $this->view->title = 'My Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> My Orders';
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();
        $this->view->orderList = $this->model->getOrders();
        $this->view->render('order/index');
        
    }

    function myOrderDetails($id){

        $this->view->title = 'My Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'orders/myOrders">My Orders</a> <i class="fas fa-angle-right"></i>My Order Details';
        $this->view->qtyList =  $this->model->getAllDetails();
        $this->view->imageList =  $this->model->getImages();
        $this->view->orderDetails = $this->model->getOrderDetails($id);
        $this->view->orderList = $this->model->getMyOrder($id);
        $this->view->payMethod = $this->model->getPayDetails($id);
        $this->view->render('order/order_details');

    }

    function orderDashboard(){

        $this->view->title = 'Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Orders';
        $this->view->orderList = $this->model->getAllOrders();
       
        $this->view->render('control_panel/admin/orders');
        
    }

    function orderDetails($id){

        $this->view->title = 'Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/myOrderDetails">Orders</a> <i class="fas fa-angle-right"></i> Order Details';
        $this->view->deliveryStaffList = $this->model->getDeliveryStaffList();
      //  print_r($this->view->deliveryStaffList);
        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->imageList = $this->model->getImages();
       
        $this->view->render('control_panel/admin/order_details');
        
    }

    function assignedOrders(){

        $this->view->title = 'Assigned Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Assigned Orders';

        $this->view->render('control_panel/delivery/orders');
        
    }

    function assignedOrderDetails(){

        $this->view->title = 'Assigned Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/assignedOrderDetails">Assigned Orders</a> <i class="fas fa-angle-right"></i> Assigned Order Details';

        $this->view->render('control_panel/delivery/order_details');
        
    }

    function history(){

        $this->view->title = 'History';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> History';

        $this->view->render('control_panel/delivery/history');

    }

    function historyDetails(){

        $this->view->title = 'History Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/historyDetails">History</a> <i class="fas fa-angle-right"></i> History Details';

        $this->view->render('control_panel/delivery/history_details');

    }

}