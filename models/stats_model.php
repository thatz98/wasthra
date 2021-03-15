<?php

class Stats_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function getVisitorCount() {
        return $this->db->query("SELECT COUNT(*) FROM visitors;");
    }

    function getSalesCount() {
        return $this->db->query("SELECT COUNT(*) FROM orders;");
    }

    function getTotalOrderCount() {
        return $this->db->query("SELECT COUNT(*) FROM orders;");
    }

    function getRevenueAndCost() {

        return $this->db->query("SELECT SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
        INNER JOIN order_item ON orders.order_id=order_item.order_id
        INNER JOIN product on product.product_id = order_item.product_id
        INNER JOIN price_category on product.price_category_id = price_category.price_category_id");
    }

    function getTotalSalesPerCategory() {

        return $this->db->query("SELECT category.name as label,COUNT(category.category_id) as sales FROM orders
        INNER JOIN order_item ON orders.order_id=order_item.order_id
        INNER JOIN product on product.product_id = order_item.product_id
        INNER JOIN category on product.category_id = category.category_id
        GROUP by category.name");

    }

    function getTotalSalesPerCity() {

        $data =  $this->db->query("SELECT category.name as label,COUNT(category.category_id) as sales FROM checkout
        INNER JOIN delivery_address on checkout.address_id = delivery_address.address_id
        INNER JOIN category on product.category_id = category.category_id
        GROUP by category.name");

$cities = array();
$sales = array();
        foreach($data as $item){
            $cities += $item['city'];
            $sales += $item['sales'];
        }
        $result = array();
        $result['cities'] = implode(",",$cities);
        $result['sales'] = implode(",",$sales);
        return array($result['cities'],$result['sales']);

    }
}
