<?php

class Report_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function getOrderItems($id) {
        return $this->db->query("SELECT order_item.order_id, order_item.product_id,product.product_name,order_item.item_size,order_item.item_color,
        order_item.item_qty,price_category.product_price,order_item.item_qty*price_category.product_price as line_total, product_images.image FROM `order_item` INNER JOIN product 
        ON product.product_id=order_item.product_id INNER JOIN price_category ON price_category.price_category_id=product.price_category_id 
        INNER JOIN product_images ON order_item.product_id=product_images.product_id WHERE order_item.order_id='$id' GROUP BY order_item.product_id ");
    }

    function getOrderInfo($id) {
        return $this->db->query("SELECT orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,
        checkout.address_id,delivery_address.address_line_1,delivery_address.address_line_2,delivery_address.address_line_3,
        delivery_address.postal_code,delivery_address.city,customer.first_name,customer.last_name,customer.email,customer.contact_no FROM orders 
        INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id
        INNER JOIN customer ON checkout.user_id=customer.user_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id  
         WHERE orders.order_id='$id' GROUP BY orders.order_id ");
    }

    function getInventoryData(){
        return $this->db->query("SELECT inventory.product_id,inventory.qty,inventory.reorder_qty,inventory.reorder_level,inventory.color,inventory.size,product.product_name FROM inventory
        INNER JOIN product ON product.product_id=inventory.product_id WHERE product.is_deleted='no' ORDER BY product_id");
    }
}
