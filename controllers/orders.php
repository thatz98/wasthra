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
        $this->view->addressDetails = $this->model->getAddressDetails($id);
        $this->view->deliveryDetails = $this->model->getDeliveryDetails($id);
        $this->view->memberDetails = $this->model->getMemberDetails($id);
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
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/orderDashboard">Orders</a> <i class="fas fa-angle-right"></i> Order Details';
        $this->view->deliveryStaffList = $this->model->getDeliveryStaffList();
    
        $this->view->qtyList = $this->model->getAllDetails();
        $this->view->imageList = $this->model->getImages();
        $this->view->orderItems = $this->model->getOrderItems($id);
        $this->view->addressDetails = $this->model->getAddressDetails($id);
        $this->view->customerDetails = $this->model->getCustomerDetails($id);
        $this->view->payMethod = $this->model->getPayDetails($id);
        
        $this->view->render('control_panel/admin/order_details');
        
    }

    function assignedOrders(){

        $this->view->title = 'Assigned Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Assigned Orders';
        $this->view->orderList = $this->model->assignedOrders();

        $this->view->render('control_panel/delivery/orders');
        
    }

    function assignedOrderDetails($id){

        $this->view->title = 'Assigned Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/assignedOrderDetails">Assigned Orders</a> <i class="fas fa-angle-right"></i> Assigned Order Details';
        $this->view->orderDetails = $this->model->assignedOrder_Details($id);
        $this->view->order_Summary = $this->model->assignedOrderSummary($id);
        $this->view->deliveryInfo = $this->model->assignedDeliveryInfo($id);

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

    function updateOrderStatus(){

        $this->view->orderList = $this->model->getAllOrders();
        $data = array();
        $data['order_id'] = $_POST['prev_id'];
        $data['order_status'] = $_POST['assigned_deliver'];

        $this->model->update($data);

        header('location: ' . URL . '');
    }

}