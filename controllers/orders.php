<?php

class Orders extends Controller {

    function __construct() {
        parent::__construct();

        // check whether the user is logged in
        Authenticate::handleLogin();
    }

    /**
     * Display customer's orders
     *
     * @return void
     */
    function myOrders() {

        // restrict access to only customers
        Authenticate::customerOnly();

        $this->view->title = 'My Orders';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> My Orders';

        $this->view->orderList = $this->model->getMyOrderList();


        $this->view->render('order/index');
    }

    /**
     * Display customer's selected order details
     *
     * @param  mixed $id Id of the order
     * @return void
     */
    function myOrderDetails($id) {

        // restrict access to only customers
        Authenticate::customerOnly();

        $this->view->title = 'My Order Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'orders/myOrders">My Orders</a> <i class="fas fa-angle-right"></i>My Order Details';

        $this->view->orderDetails = $this->model->getOrderDetails($id)[0];
        $this->view->orderItems = $this->model->getOrderItems($id);

        $this->view->render('order/order_details');
    }

    /**
     * Display all the orders to admin
     *
     * @return void
     */
    function orderDashboard() {

        // restrict access to only admin and owner
        Authenticate::adminAuth();

        $this->view->title = 'Orders';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Orders';

        if (isset($_GET['filter'])) {
            switch ($_GET['filter']) {
                case 'new':
                    $this->view->orderList = $this->model->getOrderList('New');
                    break;
                case 'pendingDeliveries':
                    $this->view->orderList = $this->model->getOrderList('Out for Delivery');
                    break;
                case 'pendingReturns':
                    $this->view->orderList = $this->model->getOrderList('Requested to Return');
                    break;
                case 'total':
                    $this->view->orderList = $this->model->getOrderList();
                    break;
            }
        } else {
            $this->view->orderList = $this->model->getOrderList();
        }


        $this->view->newOrderCount = $this->model->orderCount('new');
        $this->view->pendingDeliveryCount = $this->model->orderCount('pendingDeliveries');
        $this->view->pendingReturnCount = $this->model->orderCount('pendingReturns');
        $this->view->totalCount = $this->model->orderCount('total');

        $this->view->render('control_panel/admin/orders');
    }

    /**
     * Display the details of a selected order
     *
     * @param  mixed $id Id of the selected order
     * @return void
     */
    function orderDetails($id) {

        // restrict access to only admin and owner
        Authenticate::adminAuth();

        $this->view->title = 'Order Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'orders/orderDashboard">Orders</a> <i class="fas fa-angle-right"></i> Order Details';

        $this->view->deliveryStaffList = $this->model->getDeliveryStaffList();

        $this->view->orderDetails = $this->model->getOrderDetails($id)[0];
        $this->view->orderItems = $this->model->getOrderItems($id);

        $this->view->render('control_panel/admin/order_details');
    }

    /**
     * Display the tracking information for the selected order
     *
     * @param  mixed $id Id of the order to be tracked
     * @return void
     */
    function trackMyOrder($id) {
        $this->view->title = 'Track Order';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'orders/myOrders">My Orders</a> <i class="fas fa-angle-right"></i> Track My Order';

        $this->view->track = $this->model->getTrackingInfo($id);
        $this->view->render('order/track_order');
    }

    /**
     * Display assigned orders to the delivery staff
     *
     * @return void
     */
    function assignedOrders() {

        // restrict access to only delivery staff
        Authenticate::deliveryAuth();

        $this->view->title = 'Assigned Orders';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> Assigned Orders';

        $this->view->orderList = $this->model->getAssignedOrderList();


        $this->view->render('control_panel/delivery/orders');
    }

    /**
     * Display details of the selected assigned order
     *
     * @param  mixed $id Id of the order that is selected
     * @return void
     */
    function assignedOrderDetails($id) {

        // restrict access to only delivery staff
        Authenticate::deliveryAuth();

        $this->view->title = 'Assigned Order Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'orders/assignedOrders">Assigned Orders</a> <i class="fas fa-angle-right"></i> Assigned Order Details';

        $this->view->orderDetails = $this->model->getOrderDetails($id)[0];
        $this->view->orderItems = $this->model->getOrderItems($id);

        $this->view->render('control_panel/delivery/order_details');
    }

    /**
     * Display order history to the delivery staff
     *
     * @return void
     */
    function history() {

        // restrict access to only delivery staff
        Authenticate::deliveryAuth();

        $this->view->title = 'History';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i> History';

        $this->view->orderList = $this->model->getPerformedOrderList();

        $this->view->render('control_panel/delivery/history');
    }

    function historyDetails($id) {

        // restrict access to only delivery staff
        Authenticate::deliveryAuth();

        $this->view->title = 'History Details';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'orders/history">History</a> <i class="fas fa-angle-right"></i> History Details';

        $this->view->orderDetails = $this->model->getOrderDetails($id)[0];
        $this->view->orderItems = $this->model->getOrderItems($id);

        $this->view->render('control_panel/delivery/history_details');
    }

    /**
     * Update the status of the order
     *
     * @return void
     */
    function updateOrderStatus() {
        // restrict access to only delivery staff
        Authenticate::adminAuth();

        $data = array();
        $data['order_id'] = $_POST['order_id'];
        $data['order_status'] = $_POST['order_status'];


        Logs::writeApplicationLog('Update Order Status', 'Attemting', Session::get('userData')['email'], $data);
        $this->model->update($data);
        Logs::writeApplicationLog('Order Status Updated', 'Successfull', Session::get('userData')['email'], $data);

        if ($data['order_status'] == 'Cancelled') {
            $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
            $msg = "ORDER ID:" . $data['order_id'] . ' successfully cancelled';
            $subject = 'Your request about canceling an order';
            $reciever = Session::get('userData')['email'];
            mail($reciever, $subject, $msg, $header);
        } elseif ($data['order_status'] == 'Returned') {
            $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
            $msg = 'Your order successfully returned';
            $subject = 'Your request about returning an order';
            $reciever = Session::get('userData')['email'];
            mail($reciever, $subject, $msg, $header);
        }
        header('location: ' . URL . "orders/orderDetails/{$data['order_id']}");
    }

    /**
     * Update delivery status of the order
     *
     * @return void
     */
    function updateOrderDeliveryStatus() {

        // restrict access to only delivery staff
        Authenticate::deliveryAuth();

        $data = array();
        $data['order_id'] = $_POST['order_id'];
        $data['order_status'] = $_POST['order_status'];


        Logs::writeApplicationLog('Update Delivery Status', 'Attemting', Session::get('userData')['email'], $data);
        $this->model->update($data);
        Logs::writeApplicationLog('Delivery Status Updated', 'Successfull', Session::get('userData')['email'], $data);

        header('location: ' . URL . "orders/assignedOrderDetails/{$data['order_id']}");
    }
    
    /**
     * updatePaymentStatus
     *
     * @return void
     */
    function updatePaymentStatus() {
        // restrict access to only delivery staff
        Authenticate::deliveryAuth();

        $data = array();
        $data['order_id'] = $_POST['order_id'];
        $data['payment_status'] = $_POST['payment_status'];


        Logs::writeApplicationLog('Update Payment Status', 'Attemting', Session::get('userData')['email'], $data);
        $this->model->updatePaymentStatus($data);
        Logs::writeApplicationLog('Payment Status Updated', 'Successfull', Session::get('userData')['email'], $data);

        header('location: ' . URL . "orders/assignedOrderDetails/{$data['order_id']}");
    }


    /**
     * Create a delivery for an order
     *
     * @return void
     */
    function createDelivery($flag = false) {
        // restrict access to only admin
        Authenticate::adminAuth();

        $data = array();
        $data['user_id'] = $_POST['assigned_deliver'];
        $data['order_id'] = $_POST['order_id'];


        if ($flag == 'update') {
            Logs::writeApplicationLog('Re-assign Deliver', 'Attemting', Session::get('userData')['email'], $data);
            $this->model->updateDeliver($data);
            Logs::writeApplicationLog('Deliver Re-assigned', 'Successfull', Session::get('userData')['email'], $data);
        } else {
            Logs::writeApplicationLog('Assign Deliver', 'Attemting', Session::get('userData')['email'], $data);
            $this->model->create($data);
            Logs::writeApplicationLog('Deliver assigned', 'Successfull', Session::get('userData')['email'], $data);
        }




        //  print_r($data);
        header("location: " . URL . "orders/orderDetails/{$data['order_id']}");
    }

    /**
     * Cancel an order
     *
     * @return void
     */
    function cancelOrder() {
        
        // restrict access to only customers
        Authenticate::customerOnly();

        $comment = $_POST['cancel_comment'];
        $id = $_POST['order_id'];
        $this->model->cancelOrder($comment, $id);
        $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
        $msg = "ORDER ID:" . $id . '<br>Cancel comment:' . $comment;
        $subject = 'Cancel Request from: ' . Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name'];
        $reciever = 'group15s2202@gmail.com';
        mail($reciever, $subject, $msg, $header);
        header('Location: ' . URL . 'orders/myOrderDetails/' . $id);
    }

    /**
     * Return an order
     *
     * @return void
     */
    function returnOrder() {

        // restrict access to only customers
        Authenticate::customerOnly();

        $comment = $_POST['return_comment'];
        $id = $_POST['order_id'];
        $this->model->returnOrder($comment, $id);
        $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
        $msg = "ORDER ID:" . $id . '<br>Return comment:' . $comment;
        $subject = 'Return Request from: ' . Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name'];
        $reciever = 'group15s2202@gmail.com';
        mail($reciever, $subject, $msg, $header);
        header('Location: ' . URL . 'orders/myOrderDetails/' . $id);
    }
}
