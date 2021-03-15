<?php

class Stats_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function getVisitorCount($filter=false) {
        if($filter){
            return $this->db->query("SELECT COUNT(*) FROM visitors WHERE $filter;");
        }else{
            return $this->db->query("SELECT COUNT(*) FROM visitors;");
        }
    }

    function getSalesCount($filter=false) {
        if($filter){
        return $this->db->query("SELECT COUNT(*) FROM orders WHERE $filter;");
    }else{
        return $this->db->query("SELECT COUNT(*) FROM orders;");
        }
    }

    function getTotalOrderCount($filter=false) {
        if($filter){
            return $this->db->query("SELECT COUNT(*) FROM orders WHERE $filter;");
        }else{
            return $this->db->query("SELECT COUNT(*) FROM orders;");
            }
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

        $data =  $this->db->query("SELECT delivery_address.city as city,COUNT(checkout.order_id) as sales FROM checkout
        INNER JOIN delivery_address on checkout.address_id = delivery_address.address_id
        GROUP by delivery_address.city");

        $cities = array();
        $sales = array();
        foreach ($data as $item) {
            array_push($cities, '\'' . $item['city'] . '\'');
            array_push($sales, $item['sales']);
        }
        $result = array();
        $result['cities'] = implode(",", $cities);
        $result['sales'] = implode(",", $sales);
        return array($result['cities'], $result['sales']);
    }
    
    function getDailySalesDistribution() {

        $data =  $this->db->query("SELECT HOUR(time) as time,COUNT(order_id) as sales FROM orders
        GROUP BY HOUR(time)");
        // print_r($data);
        $hours = $this->hoursRange();
       
        foreach ($data as $item) {
            if($item['time'] <10){
                $hour = '0'.$item['time'].':00';
            } else{
                $hour = $item['time'].':00';

            }
            
            foreach ($hours as $key => $value) {
                if ($key == $hour) {
                    $hours[$key] = $item['sales'];
                }
            }
        }
        $result = array();
        $result['hours'] = "'";
        $result['hours'] .= implode("','", array_keys($hours));
        $result['hours'] .= "'";
        $result['sales'] = implode(",", array_values($hours));
       
        return array($result['hours'], $result['sales']);
    }

    function getWeeklySalesDistribution() {

        $data =  $this->db->query("SELECT WEEKDAY(date) as day,COUNT(order_id) as sales FROM orders 
        WHERE YEARWEEK(date,5) = YEARWEEK(CURDATE(),5) GROUP BY DATE(date)");
        // print_r($data);
        $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
        $sales = array_fill(0,7,0);
       
        foreach ($data as $item)  {     
            foreach ($days as $key => $value) {
                if ($key == $item['day']) {
                    $sales[$key] = $item['sales'];
                }
            }
        }

        $result = array();
        $result['days'] = "'";
        $result['days'] .= implode("','", $days);
        $result['days'] .= "'";
        $result['sales'] = implode(",", $sales);
        return array($result['days'], $result['sales']);
    }
    
    function getMonthlySalesDistribution() {

        $data =  $this->db->query("SELECT date,COUNT(order_id) as sales FROM orders
        GROUP by date");
        // print_r($data);
        $dates = range(1, 31);
        $sales = array_fill(1, 31, 0);
        foreach ($data as $item) {
            $date = substr($item['date'], 8, 2);
            foreach ($dates as $d) {
                if ($d == $date) {
                    $sales[$d] = $item['sales'];
                }
            }
        }
        $result = array();
        $result['dates'] = implode(",", $dates);
        $result['sales'] = implode(",", $sales);
        return array($result['dates'], $result['sales']);
    }

    function getYearlySalesDistribution() {

        $data =  $this->db->query("SELECT MONTH(date) as month,COUNT(order_id) as sales FROM orders 
        WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)");
        // print_r($data);
        $months = array('January','Februray','March','April','June','July','August','September','October','November','December');
        $sales = array_fill(1, 12, 0);
        foreach ($data as $item)  {     
            foreach ($months as $key => $value) {
                if ($key == $item['month']) {
                    $sales[$key] = $item['sales'];
                }
            }
        }

        $result = array();
        $result['months'] = "'";
        $result['months'] .= implode("','", $months);
        $result['months'] .= "'";
        $result['sales'] = implode(",", $sales);
        return array($result['months'], $result['sales']);
    }

    

    

    function hoursRange($lower = 0, $upper = 86400, $step = 3600, $format = '') {
        $times = array();

        if (empty($format)) {
            $format = 'g:i a';
        }

        foreach (range($lower, $upper, $step) as $increment) {
            $increment = gmdate('H:i', $increment);


            $times[(string) $increment] = 0 ;
        }

        return $times;
    }
}
