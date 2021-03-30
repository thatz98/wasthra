<?php

class Orders_Model extends Model {

    function __construct() {

        parent::__construct();
    }

    /**
     * get orders placed by the corresponding customer
     *
     * @return void
     */
    function getMyOrderList() {

        return $this->db->runQuery("SELECT SUM(order_item.item_qty*price_category.product_price)+delivery_charges.delivery_fee as total_amount,orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_charges.delivery_fee,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        delivery_staff.first_name,delivery_staff.last_name FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        INNER JOIN order_item ON order_item.order_id=orders.order_id
        INNER JOIN product ON product.product_id=order_item.product_id
        INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
        LEFT JOIN delivery ON delivery.order_id=orders.order_id 
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id
        WHERE checkout.user_id=:userId
        GROUP BY orders.order_id
        ORDER BY orders.order_id DESC", array('userId' => Session::get('userId')));
    }

    /**
     * get the items of the given order id
     *
     * @param  mixed $id
     * @return void
     */
    function getOrderItems($id) {

        return $this->db->runQuery("SELECT order_item.order_id, order_item.product_id,product.product_name,order_item.item_size,order_item.item_color,
        order_item.item_qty,price_category.product_price, product_images.image FROM `order_item` INNER JOIN product 
        ON product.product_id=order_item.product_id INNER JOIN price_category ON price_category.price_category_id=product.price_category_id 
        INNER JOIN product_images ON order_item.product_id=product_images.product_id WHERE order_item.order_id=:id GROUP BY order_item.item_id ", array('id' => $id));
    }

    /**
     * get the order details of the given id
     *
     * @param  mixed $id
     * @return void
     */
    function getOrderDetails($id) {

        return $this->db->runQuery("SELECT orders.order_id,orders.date,orders.time,orders.order_status,orders.delivery_comment,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_address.address_line_1,delivery_address.address_line_2,delivery_address.address_line_3,
        delivery_address.postal_code,delivery_address.city,delivery_address.longitude,delivery_address.latitude,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        delivery_staff.first_name,delivery_staff.last_name,delivery_charges.delivery_fee,delivery.delivery_id,customer.first_name as customer_first_name,
        customer.last_name as customer_last_name,
        customer.email as customer_email,
        customer.contact_no as customer_phone FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN customer ON checkout.user_id=customer.user_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id 
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        LEFT JOIN delivery ON delivery.order_id=orders.order_id 
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id WHERE orders.order_id=:id GROUP BY orders.order_id ", array('id' => $id));
    }

    /**
     * get the order list
     *
     * @param  mixed $filter
     * @return void
     */
    function getOrderList($filter = false) {

        if (!$filter) {
            return $this->db->runQuery("SELECT SUM(order_item.item_qty*price_category.product_price)+delivery_charges.delivery_fee as total_amount,orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_charges.delivery_fee,delivery.delivery_id,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        delivery_staff.first_name,delivery_staff.last_name,returns.return_id FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        INNER JOIN order_item ON order_item.order_id=orders.order_id
        INNER JOIN product ON product.product_id=order_item.product_id
        INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
        LEFT JOIN delivery ON delivery.order_id=orders.order_id
        LEFT JOIN returns ON returns.order_id=orders.order_id
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id
        GROUP BY orders.order_id
        ORDER BY orders.order_id DESC");
        } else {
            return $this->db->runQuery("SELECT SUM(order_item.item_qty*price_category.product_price)+delivery_charges.delivery_fee as total_amount,orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_charges.delivery_fee,delivery.delivery_id,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        delivery_staff.first_name,delivery_staff.last_name,returns.return_id FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        INNER JOIN order_item ON order_item.order_id=orders.order_id
        INNER JOIN product ON product.product_id=order_item.product_id
        INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
        LEFT JOIN delivery ON delivery.order_id=orders.order_id 
        LEFT JOIN returns ON returns.order_id=orders.order_id
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id
        WHERE orders.order_status=:status
        GROUP BY orders.order_id
        ORDER BY orders.order_id DESC", array('status' => $filter));
        }
    }

    /**
     * get order count
     *
     * @param  mixed $filter
     * @return void
     */
    function orderCount($filter) {
        switch ($filter) {
            case 'new':
                return $this->db->selectOneWhere('orders', array('COUNT(*)'), "order_status=:status", array('status' => 'New'))['COUNT(*)'];
                break;
            case 'pendingDeliveries':
                return $this->db->selectOneWhere('orders', array('COUNT(*)'), "order_status=:status", array('status' => 'Out for Delivery'))['COUNT(*)'];
                break;
            case 'pendingReturns':
                return $this->db->selectOneWhere('orders', array('COUNT(*)'), "order_status=:status", array('status' => 'Requested to Return'))['COUNT(*)'];
                break;
            case 'total':
                return $this->db->selectOne('orders', array('COUNT(*)'))['COUNT(*)'];
                break;
        }
    }

    /**
     * get list of delivery staff members
     *
     * @return void
     */
    function getDeliveryStaffList() {

        return $this->db->select('delivery_staff', array('user_id', 'first_name', 'last_name'));
    }


    /**
     * get orders assigned to the corresponding delivery staff
     *
     * @return void
     */
    function getAssignedOrderList() {

        return $this->db->runQuery("SELECT SUM(order_item.item_qty*price_category.product_price)+delivery_charges.delivery_fee as total_amount,orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_charges.delivery_fee,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        delivery_staff.first_name,delivery_staff.last_name,returns.return_id FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        INNER JOIN order_item ON order_item.order_id=orders.order_id
        INNER JOIN product ON product.product_id=order_item.product_id
        INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
        LEFT JOIN delivery ON delivery.order_id=orders.order_id 
        LEFT JOIN returns ON returns.order_id=orders.order_id
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id
        WHERE delivery.user_id=:userId AND order_status=:status1 OR order_status=:status2 OR order_status=:status3
        GROUP BY orders.order_id
        ORDER BY orders.order_id DESC", array('userId' => Session::get('userId'), 'status1' => 'Out for Delivery', 'status2' => 'In Transit', 'status3' => 'Delivery Failed'));
    }

    /**
     * get orders perfomer by the corresponding delivery staff
     *
     * @return void
     */
    function getPerformedOrderList() {

        return $this->db->runQuery("SELECT SUM(order_item.item_qty*price_category.product_price)+delivery_charges.delivery_fee as total_amount,orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_charges.delivery_fee,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        delivery_staff.first_name,delivery_staff.last_name,returns.return_id FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        INNER JOIN order_item ON order_item.order_id=orders.order_id
        INNER JOIN product ON product.product_id=order_item.product_id
        INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
        LEFT JOIN delivery ON delivery.order_id=orders.order_id 
        LEFT JOIN returns ON returns.order_id=orders.order_id
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id
        WHERE delivery.user_id=:userId AND order_status=:status1 OR order_status=:status2 OR order_status=:status3
        GROUP BY orders.order_id
        ORDER BY orders.order_id DESC", array('userId' => Session::get('userId'), 'status1' => 'Delivered', 'status2' => 'Returned', 'status3' => 'Completed'));
    }


    function update($data) {
        $orderId = $data['order_id'];
        $orderStatus = $data['order_status'];
        $this->db->queryExecuteOnly("UPDATE orders SET order_status='$orderStatus' WHERE order_id ='$orderId'");

        $this->trackingUpdate($orderId);
    }
    function updatePaymentStatus($data) {
        $orderId = $data['order_id'];
        $orderStatus = $data['payment_status'];
        $this->db->queryExecuteOnly("UPDATE payment SET payment_status='$orderStatus' WHERE order_id ='$orderId'");

    }

    function trackingUpdate($id) {
        $status = $this->db->query("SELECT order_status FROM orders WHERE order_id='$id'");
        if ($status[0]['order_status'] == 'Out for Delivery') {
            $this->db->query("UPDATE order_tracking SET processed = CURRENT_TIMESTAMP() WHERE order_id='$id'");
        } else if ($status[0]['order_status'] == 'In Transit') {
            $this->db->query("UPDATE order_tracking SET outForDelivery = CURRENT_TIMESTAMP(), inTransit = CURRENT_TIMESTAMP() WHERE order_id='$id'");
        } else if ($status[0]['order_status'] == 'Delivered') {
            $this->db->query("UPDATE order_tracking SET delivered = CURRENT_TIMESTAMP() WHERE order_id='$id'");
        }
    }

    function getTrackingInfo($id) {
        return $this->db->query("SELECT * FROM order_tracking WHERE order_id='$id'");
    }


    function create($data) {
        $orderId = $data['order_id'];
        $userId = $data['user_id'];
        $this->db->runQuery("INSERT into delivery(order_id,user_id,expected_delivery_date) VALUES('$orderId','$userId',DATE_ADD(CURDATE(),INTERVAL 5 DAY))");
        $this->db->update('orders', array('order_status' => 'Out for Delivery'), 'order_id=:order_id', array('order_id' => $data['order_id']));
        $this->trackingUpdate($data['order_id']);
    }

    function updateDeliver($data) {
       
        $this->db->update('delivery', array('user_id' => $data['user_id']), 'order_id=:order_id', array('order_id' => $data['order_id']));
    }


    function cancelOrder($comment, $id) {
        $this->db->queryExecuteOnly("UPDATE orders SET cancel_comment='$comment' WHERE order_id='$id'");
        $this->db->queryExecuteOnly("UPDATE orders SET order_status='Requested to Cancel' WHERE order_id='$id'");
    }

    function returnOrder($comment, $id) {
        $date = $this->db->query("SELECT actual_delivery_date FROM delivery WHERE order_id='$id'");
        $day = $date[0][0];
        $day = date('Y-m-d', strtotime($day . ' + 5 days'));
        $this->db->queryExecuteOnly("INSERT INTO returns (order_id,expected_return_date,return_comment) VALUES ('$id','$day','$comment')");
        $this->db->queryExecuteOnly("UPDATE orders SET order_status='Requested to Return' WHERE order_id='$id'");
    }


    function updatePayStatus($id) {

        $this->db->queryExecuteOnly("UPDATE payment SET payment_status='successfull' WHERE order_id='$id';");
        $this->model->deleteCartItems();
    }
}
