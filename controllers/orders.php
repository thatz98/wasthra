<?php

class Orders extends Controller{

    function __construct(){
        parent::__construct();

    }
    
    /**
     * Display customer's orders
     *
     * @return void
     */
    function myOrders(){

        $this->view->title = 'My Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> My Orders';
        $this->view->qtyList =  $this->model->listAllOrderItemDetails();
        $this->view->orderList = $this->model->listAllOrders();
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->render('order/index');
        
    }
    
    /**
     * Display customer's selected order details
     *
     * @param  mixed $id Id of the order
     * @return void
     */
    function myOrderDetails($id){

        $this->view->title = 'My Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'orders/myOrders">My Orders</a> <i class="fas fa-angle-right"></i>My Order Details';
        $this->view->orderDetails = $this->model->getOrderDetails($id);
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->allDetails = $this->model->getAllOrderDetails($id);
        $this->view->render('order/order_details');

    }
    
    /**
     * Display all the orders to admin
     *
     * @return void
     */
    function orderDashboard(){

        $this->view->title = 'Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Orders';
      
        $this->view->qtyList =  $this->model->listAllOrderItemDetails();
        $this->view->orderList = $this->model->listAllOrders();
       // $this->view->orderList = $this->model->getAllOrders();
        $this->view->deliveryList = $this->model->getAllDelivery();
        $this->view->reqDetailList = $this->model->getRequiredDetails();
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->cities = $this->model->getCity();
        $this->view->newOrderCount = $this->model->orderCount('New');
        $this->view->processCount = $this->model->orderCount('Processing');
        $this->view->outForDeliveryCount = $this->model->orderCount('Out for Delivery');
        $this->view->pendingReturnCount = $this->model->orderCount('Requested to Return');
        $this->view->fullOrderCount = $this->model->orderCount('New')+
                                      $this->model->orderCount('In Transit')+$this->model->orderCount('Delivered')+
                                      $this->model->orderCount('Delivery Failed')+$this->model->orderCount('Completed')+
                                      $this->model->orderCount('Cancelled')+$this->model->orderCount('Returned')+
                                      $this->model->orderCount('Requested to Return')+$this->model->orderCount('Requested to Cancel')+
                                      $this->model->orderCount('Processing')+$this->model->orderCount('Out for Delivery');

        $this->view->render('control_panel/admin/orders');
        
    }
    
    /**
     * Display the details of a selected order
     *
     * @param  mixed $id Id of the selected order
     * @return void
     */
    function orderDetails($id){

        $this->view->title = 'Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/orderDashboard">Orders</a> <i class="fas fa-angle-right"></i> Order Details';
        $this->view->deliveryStaffList = $this->model->getDeliveryStaffList();
    
        $this->view->allDetails = $this->model->getAllOrderDetails($id);
        $this->view->orderDetails = $this->model->getOrderDetails($id);
        $this->view->imageList = $this->model->getImages();
        $this->view->addressDetails = $this->model->getAddressDetails($id);
        $this->view->customerDetails = $this->model->getCustomerDetails($id);
        $this->view->payMethod = $this->model->getPayDetails($id);
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->deliveryDetails = $this->model->getDeliveryDetails($id);
        $this->view->memberDetails = $this->model->getMemberDetails($id);
      
        $this->view->render('control_panel/admin/order_details');
        
    }
    
    /**
     * Display the tracking information for the selected order
     *
     * @param  mixed $id Id of the order to be tracked
     * @return void
     */
    function trackMyOrder($id){
        $this->view->title = 'Track Order';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/myOrders">My Orders</a> <i class="fas fa-angle-right"></i> Track My Order';
        
        $this->view->track = $this->model->getTrackingInfo($id);
        $this->view->render('order/track_order');
    }
    
    /**
     * Display assigned orders to the delivery staff
     *
     * @return void
     */
    function assignedOrders(){

        $this->view->title = 'Assigned Orders';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Assigned Orders';
        $this->view->orderList = $this->model->assignedOrders();
        

        $this->view->render('control_panel/delivery/orders');
        
    }
    
    /**
     * Display details of the selected assigned order
     *
     * @param  mixed $id Id of the order that is selected
     * @return void
     */
    function assignedOrderDetails($id){

        $this->view->title = 'Assigned Order Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/assignedOrderDetails">Assigned Orders</a> <i class="fas fa-angle-right"></i> Assigned Order Details';
        $this->view->orderDetails = $this->model->assignedOrder_Details($id);
        $this->view->order_Summary = $this->model->assignedOrderSummary($id);
        $this->view->deliveryInfo = $this->model->assignedDeliveryInfo($id);
        $this->view->imageList =  $this->model->getImages();
        $this->view->order_Details = $this->model->getOrderItems($id);
        $this->view->itemName = $this->model->getAllDetails();
        $this->view->allInfo = $this->model->getDeliveryInfo($id);
        $this->view->orderInfo = $this->model->getOrderDetails($id);
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();
        $this->view->allDetails = $this->model->getAllOrderDetails($id);

        $this->view->render('control_panel/delivery/order_details');
        
    }
    
    /**
     * Display order history to the delivery staff
     *
     * @return void
     */
    function history(){

        $this->view->title = 'History';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> History';
        $this->view->deliveryHistory = $this->model->history();

        $this->view->render('control_panel/delivery/history');

    }

    function historyDetails(){

        $this->view->title = 'History Details';
        $this->view->breadcumb = '<a href="'.URL.'">Home</a> <i class="fas fa-angle-right"></i> <a href="'.URL.'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="'.URL.'orders/historyDetails">History</a> <i class="fas fa-angle-right"></i> History Details';

        $this->view->render('control_panel/delivery/history_details');

    }
    
    /**
     * Update the status of the order
     *
     * @return void
     */
    function updateOrderStatus(){

        $this->view->orderList = $this->model->getAllOrders();
        $data = array();
        $data['order_id'] = $_POST['order_id'];
        $data['order_status'] = $_POST['order_status'];

        $this->model->update($data);


       header('location: ' . URL . "orders/orderDetails/{$data['order_id']}");
       
    }
    
    /**
     * Update delivery status of the order
     *
     * @return void
     */
    function updateOrderDeliveryStatus(){

        $this->view->orderList = $this->model->getAllOrders();
        $data = array();
        $data['order_id'] = $_POST['order_id'];
        $data['order_status'] = $_POST['order_status'];

        $this->model->update($data);

        header('location: ' . URL . "orders/assignedOrderDetails/{$data['order_id']}");
    }
    
    /**
     * Create a delivery for an order
     *
     * @return void
     */
    function createDelivery() {

        $data = array();
        $data['user_id'] = $_POST['assigned_deliver'];
        $data['order_id'] = $_POST['order_id'];

        $this->model->create($data);
      //  print_r($data);
        header("location: " . URL . "orders/orderDetails/{$data['order_id']}");
        
    }
    
    /**
     * Cancel an order
     *
     * @return void
     */
    function cancelOrder() {
        $comment = $_POST['cancel_comment'];
        $id = $_POST['order_id'];
        $this->model->cancelOrder($comment, $id);
        header('Location: ' . URL . 'orders/myOrderDetails/' . $id);
    }
    
    /**
     * Return an order
     *
     * @return void
     */
    function returnOrder() {
        $comment = $_POST['return_comment'];
        $id = $_POST['order_id'];
        $this->model->returnOrder($comment, $id);
        header('Location: ' . URL . 'orders/myOrderDetails/' . $id);
    }

}