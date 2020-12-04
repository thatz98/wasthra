<?php

    class Orders_Model extends Model{

    function __construct(){
        parent::__construct();
    }

    function getDeliveryStaffList(){

        return $this->db->listAll('delivery_staff',array('user_id','first_name','last_name'));
    }

    function getAllDetails(){
            
        return $this->db->query("SELECT price_category.price_category_name,price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
        FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }

    function getOrders(){
        return $this->db->query("SELECT * FROM orders");
    }

    function getMyOrder($id){
        return $this->db->query("SELECT * FROM orders WHERE order_id='$id'");
    }

    function getOrderDetails($id){
        return $this->db->query("SELECT * FROM order_item WHERE order_id='$id'");
    }

    function getPayDetails($id){
        return $this->db->query("SELECT * FROM payment WHERE order_id='$id'");
    }
}