<?php

class Stats_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function getVisitorCount($filter = false) {
        if ($filter) {
            return $this->db->query("SELECT COUNT(*) FROM visitors WHERE $filter;");
        } else {
            return $this->db->query("SELECT COUNT(*) FROM visitors;");
        }
    }

    function getDailyVisitorDistribution($filter = false) {
        if ($filter) {
            $data = $this->db->query("SELECT COUNT(*) as visitors,HOUR(time) as time FROM visitors WHERE $filter GROUP BY HOUR(time);");
        } else {
            $data = $this->db->query("SELECT COUNT(*) as visitors,HOUR(time) as time visitors GROUP BY HOUR(time);");
        }

        $hours = $this->hoursRange();

        foreach ($data as $item) {
            if ($item['time'] < 10) {
                $hour = '0' . $item['time'] . ':00';
            } else {
                $hour = $item['time'] . ':00';
            }

            foreach ($hours as $key => $value) {
                if ($key == $hour) {
                    $hours[$key] = $item['visitors'];
                }
            }
        }
        $result = array();
        $result['hours'] = "'";
        $result['hours'] .= implode("','", array_keys($hours));
        $result['hours'] .= "'";
        $result['visitors'] = implode(",", array_values($hours));

        return array($result['hours'], $result['visitors']);
    }

    function getWeeklyVisitorDistribution($filter = false) {
        if ($filter) {
            $data = $this->db->query("SELECT COUNT(*) as visitors, WEEKDAY(date) as day FROM visitors WHERE YEARWEEK(date,5) = YEARWEEK($filter,5) GROUP BY DATE(date);");
        } else {
            $data = $this->db->query("SELECT COUNT(*) as visitors, WEEKDAY(date) as day FROM visitors WHERE YEARWEEK(date,5) = YEARWEEK(CURDATE(),5) GROUP BY DATE(date);");
        }

        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $visitors = array_fill(0, 7, 0);

        foreach ($data as $item) {
            foreach ($days as $key => $value) {
                if ($key == $item['day']) {
                    $visitors[$key] = $item['visitors'];
                }
            }
        }

        $result = array();
        $result['days'] = "'";
        $result['days'] .= implode("','", $days);
        $result['days'] .= "'";
        $result['visitors'] = implode(",", $visitors);
        return array($result['days'], $result['visitors']);
    }

    function getMonthlyVisitorDistribution($filter = false) {
        if ($filter) {
            $data = $this->db->query("SELECT COUNT(*) as visitors,date FROM visitors WHERE MONTH(date) = MONTH($filter) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date;");
        } else {
            $data = $this->db->query("SELECT COUNT(*) as visitors,date FROM visitors WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date;");
        }

        $dates = range(1, 31);
        $visitors = array_fill(1, 31, 0);
        foreach ($data as $item) {
            $date = substr($item['date'], 8, 2);
            foreach ($dates as $d) {
                if ($d == $date) {
                    $visitors[$d] = $item['visitors'];
                }
            }
        }
        $result = array();
        $result['dates'] = implode(",", $dates);
        $result['visitors'] = implode(",", $visitors);
        return array($result['dates'], $result['visitors']);
    }

    function getYearlyVisitorDistribution($filter = false) {
        if ($filter) {
            $data = $this->db->query("SELECT COUNT(*) as visitors,MONTH(date) as month FROM visitors
            WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date);");
        } else {
            $data = $this->db->query("SELECT COUNT(*) as visitors,MONTH(date) as month FROM visitors 
            WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date);");
        }

        $months = array('January', 'Februray', 'March', 'April', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $visitors = array_fill(1, 12, 0);
        foreach ($data as $item) {
            foreach ($months as $key => $value) {
                if ($key == $item['month']) {
                    $visitors[$key] = $item['visitors'];
                }
            }
        }

        $result = array();
        $result['months'] = "'";
        $result['months'] .= implode("','", $months);
        $result['months'] .= "'";
        $result['visitors'] = implode(",", $visitors);
        return array($result['months'], $result['visitors']);
    }

    function getSalesCount($filter = false) {
        if ($filter) {
            return $this->db->query("SELECT SUM(order_item.item_qty) FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id WHERE $filter;");
        } else {
            return $this->db->query("SELECT SUM(order_item.item_qty) FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id;");
        }
    }

    function getTotalOrderCount($filter = false) {
        if ($filter) {
            return $this->db->query("SELECT COUNT(*) FROM orders WHERE $filter;");
        } else {
            return $this->db->query("SELECT COUNT(*) FROM orders;");
        }
    }

    function getRevenueAndCost($filter = false) {

        $query = "SELECT SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
        INNER JOIN order_item ON orders.order_id=order_item.order_id
        INNER JOIN product on product.product_id = order_item.product_id
        INNER JOIN price_category on product.price_category_id = price_category.price_category_id ";

        if ($filter) {
            $query .= "WHERE $filter;";
        }
        return $this->db->query($query);
    }

    function getTotalSalesPerCategory($filter = false) {

        $query = "SELECT category.name as label,COUNT(DISTINCT orders.order_id) as sales FROM orders
        INNER JOIN order_item ON orders.order_id=order_item.order_id
        INNER JOIN product on product.product_id = order_item.product_id
        INNER JOIN category on product.category_id = category.category_id ";

        if ($filter) {
            $query .= "WHERE $filter GROUP by category.name;";
        } else {
            $query .= "GROUP by category.name;";
        }
        return $this->db->query($query);
    }

    function getTotalSalesPerCity($filter = false) {

        $query =  "SELECT delivery_address.city as city,SUM(order_item.item_qty) as sales FROM checkout
        INNER JOIN orders ON orders.order_id=checkout.order_id
        INNER JOIN order_item ON checkout.order_id=order_item.order_id
        INNER JOIN delivery_address on checkout.address_id = delivery_address.address_id ";

        if ($filter) {
            $query .= "WHERE $filter GROUP by delivery_address.city;";
        } else {
            $query .= "GROUP by delivery_address.city;";
        }
        $data = $this->db->query($query);

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

    function getDailyOrderDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT HOUR(time) as time,COUNT(order_id) as orders FROM orders WHERE $filter
        GROUP BY HOUR(time)");
        } else {
            $data =  $this->db->query("SELECT HOUR(time) as time,COUNT(order_id) as orders FROM orders
        GROUP BY HOUR(time)");
        }
        // print_r($data);
        $hours = $this->hoursRange();

        foreach ($data as $item) {
            if ($item['time'] < 10) {
                $hour = '0' . $item['time'] . ':00';
            } else {
                $hour = $item['time'] . ':00';
            }

            foreach ($hours as $key => $value) {
                if ($key == $hour) {
                    $hours[$key] = $item['orders'];
                }
            }
        }
        $result = array();
        $result['hours'] = "'";
        $result['hours'] .= implode("','", array_keys($hours));
        $result['hours'] .= "'";
        $result['orders'] = implode(",", array_values($hours));

        return array($result['hours'], $result['orders']);
    }

    function getWeeklyOrderDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT WEEKDAY(date) as day,COUNT(order_id) as orders FROM orders 
        WHERE YEARWEEK(date,5) = YEARWEEK($filter,5) GROUP BY DATE(date)");
        } else {
            $data =  $this->db->query("SELECT WEEKDAY(date) as day,COUNT(order_id) as orders FROM orders 
        WHERE YEARWEEK(date,5) = YEARWEEK(CURDATE(),5) GROUP BY DATE(date)");
        }
        // print_r($data);
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $orders = array_fill(0, 7, 0);

        foreach ($data as $item) {
            foreach ($days as $key => $value) {
                if ($key == $item['day']) {
                    $orders[$key] = $item['orders'];
                }
            }
        }

        $result = array();
        $result['days'] = "'";
        $result['days'] .= implode("','", $days);
        $result['days'] .= "'";
        $result['orders'] = implode(",", $orders);
        return array($result['days'], $result['orders']);
    }

    function getMonthlyOrderDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT date,COUNT(order_id) as orders FROM orders
            WHERE MONTH(date) = MONTH($filter) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date ");
        } else {
            $data =  $this->db->query("SELECT date,COUNT(order_id) as orders FROM orders
            WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date ");
        }

        // print_r($data);
        $dates = range(1, 31);
        $orders = array_fill(1, 31, 0);
        foreach ($data as $item) {
            $date = substr($item['date'], 8, 2);
            foreach ($dates as $d) {
                if ($d == $date) {
                    $orders[$d] = $item['orders'];
                }
            }
        }
        $result = array();
        $result['dates'] = implode(",", $dates);
        $result['orders'] = implode(",", $orders);
        return array($result['dates'], $result['orders']);
    }

    function getYearlyOrderDistribution($filter = false) {

        $data =  $this->db->query("SELECT MONTH(date) as month,COUNT(order_id) as orders FROM orders 
        WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)");
        // print_r($data);
        $months = array('January', 'Februray', 'March', 'April', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $orders = array_fill(1, 12, 0);
        foreach ($data as $item) {
            foreach ($months as $key => $value) {
                if ($key == $item['month']) {
                    $orders[$key] = $item['orders'];
                }
            }
        }

        $result = array();
        $result['months'] = "'";
        $result['months'] .= implode("','", $months);
        $result['months'] .= "'";
        $result['orders'] = implode(",", $orders);
        return array($result['months'], $result['orders']);
    }

    function getDailySalesDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT HOUR(time) as time,SUM(order_item.item_qty) as sales FROM orders
            INNER JOIN order_item ON order_item.order_id=orders.order_id WHERE $filter
        GROUP BY HOUR(time)");
        } else {
            $data =  $this->db->query("SELECT HOUR(time) as time,SUM(order_item.item_qty) as sales FROM orders
            INNER JOIN order_item ON order_item.order_id=orders.order_id
        GROUP BY HOUR(time)");
        }
        // print_r($data);
        $hours = $this->hoursRange();

        foreach ($data as $item) {
            if ($item['time'] < 10) {
                $hour = '0' . $item['time'] . ':00';
            } else {
                $hour = $item['time'] . ':00';
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

    function getWeeklySalesDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT WEEKDAY(date) as day,SUM(order_item.item_qty) as sales FROM orders 
        INNER JOIN order_item ON order_item.order_id=orders.order_id WHERE YEARWEEK(date,5) = YEARWEEK($filter,5) GROUP BY DATE(date)");
        } else {
            $data =  $this->db->query("SELECT WEEKDAY(date) as day,SUM(order_item.item_qty) as sales FROM orders 
        INNER JOIN order_item ON order_item.order_id=orders.order_id WHERE YEARWEEK(date,5) = YEARWEEK(CURDATE(),5) GROUP BY DATE(date)");
        }
        // print_r($data);
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $sales = array_fill(0, 7, 0);

        foreach ($data as $item) {
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

    function getMonthlySalesDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT date,SUM(order_item.item_qty) as sales FROM orders
            INNER JOIN order_item ON order_item.order_id=orders.order_id WHERE MONTH(date) = MONTH($filter) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date ");
        } else {
            $data =  $this->db->query("SELECT date,SUM(order_item.item_qty) as sales FROM orders
            INNER JOIN order_item ON order_item.order_id=orders.order_id WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date ");
        }

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

    function getYearlySalesDistribution($filter = false) {

        $data =  $this->db->query("SELECT MONTH(date) as month,SUM(order_item.item_qty) as sales FROM orders 
        INNER JOIN order_item ON order_item.order_id=orders.order_id WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)");
        // print_r($data);
        $months = array('January', 'Februray', 'March', 'April', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $sales = array_fill(1, 12, 0);
        foreach ($data as $item) {
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

    function getDailyRevenueDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT HOUR(time) as time, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id
            INNER JOIN product on product.product_id = order_item.product_id
            INNER JOIN price_category on product.price_category_id = price_category.price_category_id
            WHERE $filter
        GROUP BY HOUR(time)");
        } else {
            $data =  $this->db->query("SELECT HOUR(time) as time, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id
            INNER JOIN product on product.product_id = order_item.product_id
            INNER JOIN price_category on product.price_category_id = price_category.price_category_id
        GROUP BY HOUR(time)");
        }
        // print_r($data);
        $hours = $this->hoursRange();
        $costHours = $this->hoursRange();
        $profitHours = $this->hoursRange();
        foreach ($data as $item) {
            if ($item['time'] < 10) {
                $hour = '0' . $item['time'] . ':00';
            } else {
                $hour = $item['time'] . ':00';
            }

            foreach ($hours as $key => $value) {
                if ($key == $hour) {
                    $hours[$key] = $item['revenue'];
                    $costHours[$key] = $item['cost'];
                    $profitHours[$key] = $item['revenue'] - $item['cost'];
                }
            }
        }
        $result = array();
        $result['hours'] = "'";
        $result['hours'] .= implode("','", array_keys($hours));
        $result['hours'] .= "'";
        $result['revenue'] = implode(",", array_values($hours));
        $result['cost'] = implode(",", array_values($costHours));
        $result['profit'] = implode(",", array_values($profitHours));

        return array($result['hours'], $result['revenue'],$result['cost'],$result['profit']);
    }

    function getWeeklyRevenueDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT WEEKDAY(date) as day, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id
            INNER JOIN product on product.product_id = order_item.product_id
            INNER JOIN price_category on product.price_category_id = price_category.price_category_id
        WHERE YEARWEEK(date,5) = YEARWEEK($filter,5) GROUP BY DATE(date)");
        } else {
            $data =  $this->db->query("SELECT WEEKDAY(date) as day, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id
            INNER JOIN product on product.product_id = order_item.product_id
            INNER JOIN price_category on product.price_category_id = price_category.price_category_id WHERE YEARWEEK(date,5) = YEARWEEK(CURDATE(),5) GROUP BY DATE(date)");
        }
        // print_r($data);
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $revenue = array_fill(0, 7, 0);
        $cost = array_fill(0, 7, 0);
        $profit = array_fill(0, 7, 0);
        foreach ($data as $item) {
            foreach ($days as $key => $value) {
                if ($key == $item['day']) {
                    $revenue[$key] = $item['revenue'];
                    $cost[$key] = $item['cost'];
                    $profit[$key] = $item['revenue'] - $item['revenue'];
                }
            }
        }

        $result = array();
        $result['days'] = "'";
        $result['days'] .= implode("','", $days);
        $result['days'] .= "'";
        $result['revenue'] = implode(",", $revenue);
        $result['cost'] = implode(",", $cost);
        $result['profit'] = implode(",", $profit);
        return array($result['days'], $result['revenue'],$result['cost'],$result['profit']);
    }

    function getMonthlyRevenueDistribution($filter = false) {

        if ($filter) {
            $data =  $this->db->query("SELECT date, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id
            INNER JOIN product on product.product_id = order_item.product_id
            INNER JOIN price_category on product.price_category_id = price_category.price_category_id WHERE MONTH(date) = MONTH($filter) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date ");
        } else {
            $data =  $this->db->query("SELECT date, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
            INNER JOIN order_item ON orders.order_id=order_item.order_id
            INNER JOIN product on product.product_id = order_item.product_id
            INNER JOIN price_category on product.price_category_id = price_category.price_category_id  WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())
            GROUP by date ");
        }

        // print_r($data);
        $dates = range(1, 31);
        $revenue = array_fill(1, 31, 0);
        $cost = array_fill(1, 31, 0);
        $profit = array_fill(1, 31, 0);
        foreach ($data as $item) {
            $date = substr($item['date'], 8, 2);
            foreach ($dates as $d) {
                if ($d == $date) {
                    $revenue[$d] = $item['revenue'];
                    $cost[$d] = $item['cost'];
                    $profit[$d] = $item['revenue'] - $item['revenue'];
                }
            }
        }
        $result = array();
        $result['dates'] = implode(",", $dates);
        $result['revenue'] = implode(",", $revenue);
        $result['cost'] = implode(",", $cost);
        $result['profit'] = implode(",", $profit);
        return array($result['dates'], $result['revenue'],$result['cost'],$result['profit']);
    }

    function getYearlyRevenueDistribution($filter = false) {

        $data =  $this->db->query("SELECT MONTH(date) as month, SUM(price_category.product_price*order_item.item_qty) as revenue,SUM(price_category.production_cost*order_item.item_qty) as cost FROM orders
        INNER JOIN order_item ON orders.order_id=order_item.order_id
        INNER JOIN product on product.product_id = order_item.product_id
        INNER JOIN price_category on product.price_category_id = price_category.price_category_id  WHERE YEAR(date) = YEAR(CURDATE()) GROUP BY MONTH(date)");
        // print_r($data);
        $months = array('January', 'Februray', 'March', 'April', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $revenue = array_fill(1, 12, 0);
        $cost = array_fill(1, 12, 0);
        $profit = array_fill(1, 12, 0);
        foreach ($data as $item) {
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
        $result['revenue'] = implode(",", $revenue);
        $result['cost'] = implode(",", $cost);
        $result['profit'] = implode(",", $profit);
        return array($result['months'],$result['revenue'],$result['cost'],$result['profit']);
    }



    function hoursRange($lower = 0, $upper = 86400, $step = 3600, $format = '') {
        $times = array();

        if (empty($format)) {
            $format = 'g:i a';
        }

        foreach (range($lower, $upper, $step) as $increment) {
            $increment = gmdate('H:i', $increment);


            $times[(string) $increment] = 0;
        }

        return $times;
    }
}
