<?php

class Shop_Model extends Model {

    function __construct() {

        parent::__construct();
    }

    /**
     * listProducts
     *
     * @return void
     */
    function listProducts() {

        return $this->db->select('product', array('product_id', 'product_name', 'product_description', 'is_featured', 'is_new'));
    }

    /**
     * getProduct
     *
     * @param  mixed $id
     * @return void
     */
    function getProduct($id) {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        SUM(inventory.qty) as qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.product_id=:id
         GROUP BY product.product_id", array('id' => $id));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    /**
     * getProductName
     *
     * @param  mixed $id
     * @return void
     */
    function getProductName($id) {
        return $this->db->selectWhere('product', array('product_id', 'product_name'), 'product_id=:id', array('id' => $id));
    }

    /**
     * getAllDetails
     *
     * @return void
     */
    function getAllDetails() {

        return $this->db->runQuery("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,SUM(inventory.qty) as qty,AVG(review.rate) AS review_rate 
        FROM product 
        INNER JOIN inventory ON product.product_id=inventory.product_id 
        INNER JOIN category on category.category_id=product.category_id 
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id 
        LEFT JOIN review on review.product_id=product.product_id GROUP BY product_id;");
    }

    /**
     * getSizes
     *
     * @param  mixed $productId
     * @param  mixed $color
     * @return void
     */
    function getSizes($productId, $color) {

        return $this->db->selectWhere('inventory', '*', "product_id=:productId AND color=:color", array('productId' => $productId, 'color' => $color));
    }

    /**
     * getQtys
     *
     * @param  mixed $productId
     * @param  mixed $color
     * @param  mixed $size
     * @return void
     */
    function getQtys($productId, $color, $size) {

        return $this->db->selectWhere('inventory', array('qty'), "product_id=:productId AND color=:color AND size=:size", array('productId' => $productId, 'color' => $color, 'size' => $size));
    }

    /**
     * getCoupleQtys
     *
     * @param  mixed $productId
     * @param  mixed $color
     * @param  mixed $size1
     * @param  mixed $size2
     * @return void
     */
    function getCoupleQtys($productId, $color, $size1, $size2) {

        $res1 = $this->db->selectWhere('inventory', array('qty'), "product_id=:productId AND color=:color AND size=:size", array('productId' => $productId, 'color' => $color, 'size' => $size1));

        $res2 = $this->db->selectWhere('inventory', array('qty'), "product_id=:productId AND color=:color AND size=:size", array('productId' => $productId, 'color' => $color, 'size' => $size2));

        if ($res1[0]['qty'] >= $res2[0]['qty']) {
            return $res2;
        } else {
            return $res1;
        }
    }

    /**
     * getImages
     *
     * @return void
     */
    function getImages() {
        return $this->db->runQuery("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }

    /**
     * getAllSizes
     *
     * @return void
     */
    function getAllSizes() {

        return $this->db->select('inventory', array('DISTINCT size'));
    }

    /**
     * getAllColors
     *
     * @return void
     */
    function getAllColors() {
        return $this->db->select('inventory', array('DISTINCT color'));
    }

    /**
     * getAllCategories
     *
     * @return void
     */
    function getAllCategories() {

        return $this->db->select('category', array('name', 'category_id'));
    }

    /**
     * getPriceCategories
     *
     * @return void
     */
    function getPriceCategories() {

        return $this->db->select('price_category', array('price_category_name', 'price_category_id'));
    }

    /**
     * getQty
     *
     * @return void
     */
    function getQty() {

        return $this->db->select('inventory', array('product_id', 'qty'));
    }

    /**
     * getFeaturedProducts
     *
     * @return void
     */
    function getFeaturedProducts() {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        SUM(inventory.qty) as qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.is_published='yes' AND product.is_featured='yes'
         GROUP BY product.product_id
         LIMIT 4");

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    /**
     * addReview
     *
     * @param  mixed $data
     * @param  mixed $date
     * @param  mixed $time
     * @param  mixed $imageList
     * @return void
     */
    function addReview($data, $date, $time, $imageList) {
        $this->db->insert('review', array(
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id'],
            'rate' => $data['rating'],
            'review_text' => $data['comment'],
            'date' => $date,
            'time' => $time,

        ));
        $product_id = $data['product_id'];
        $user_id = $data['user_id'];

        $review_id = $this->db->selectOneWhere('review', array('review_id'), "product_id=:product_id AND user_id=:user_id AND date=:date AND time=:time", array('product_id' => $product_id, 'user_id' => $user_id, 'date' => $date, 'time' => $time));

        print_r($imageList);
        foreach ($imageList as $img) {
            if ($img == '') {
                break;
            }
            $m = "public/images/Review_images/";
            $m .= $img;
            echo $m;

            $this->db->insert('review_image', array('review_id' => $review_id[0], 'image' => $m));
        }
    }

    /**
     * getReviewDetails
     *
     * @param  mixed $id
     * @return void
     */
    function getReviewDetails($id) {
        $data = $this->db->runQuery("SELECT review.product_id,review.user_id,customer.first_name,customer.last_name,review.rate,review.review_text,review.date,review.time,review.review_id, GROUP_CONCAT(DISTINCT review_image.image) as review_images FROM review
        INNER JOIN customer ON review.user_id=customer.user_id
        LEFT JOIN review_image ON review_image.review_id=review.review_id
        WHERE review.product_id=:id AND review.is_deleted='no'
        GROUP BY review.review_id", array('id' => $id));

        foreach ($data as $key => $value) {
            $data[$key]['review_images'] = explode(',', $data[$key]['review_images']);
        }

        return $data;
    }

    /**
     * reviewImages
     *
     * @return void
     */
    function reviewImages() {

        return $this->db->select('review_image', array('image', 'review_id'));
    }

    /**
     * deleteReview
     *
     * @param  mixed $id
     * @return void
     */
    function deleteReview($id) {
        $this->db->delete('review', "review_id=:review_id", array('review_id' => $id));
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    function create($data) {

        $this->db->insert('delivery_address', array(
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'address_line_3' => $data['address_line_3'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'longitude' => $data['longtitude'],
            'latitude' => $data['latitude'],
            'user_id' => Session::get('userId')
        ));
    }

    /**
     * getAddressId
     *
     * @param  mixed $data
     * @return void
     */
    function getAddressId($data) {
        $userId = Session::get('userId');

        return $this->db->selectWhere('delivery_address', array('address_id'), "user_id=:userId AND postal_code=:postal_code
        AND city=:city AND address_line_1=:address_line_1 AND address_line_2=:address_line_2 AND address_line_3=:address_line_3", array(
            'userId' => $userId, 'postal_code' => $data['postal_code'],
            'city' => $data['city'], 'address_line_1' => $data['address_line_1'], 'address_line_2' => $data['address_line_2'], 'address_line_3' => $data['address_line_3']
        ));
    }

    /**
     * placeOrder
     *
     * @param  mixed $date
     * @param  mixed $time
     * @param  mixed $orderID
     * @param  mixed $payMethod
     * @param  mixed $aId
     * @param  mixed $comment
     * @param  mixed $buyNow
     * @return void
     */
    function placeOrder($date, $time, $orderID, $payMethod, $aId, $comment, $buyNow) {
        $this->db->insert('orders', array(
            'order_id' => $orderID,
            'order_status' => 'new',
            'is_deleted' => 'no',
            'date' => $date,
            'time' => $time,
            'delivery_comment' => $comment,
        ));

        $this->db->insert('payment', array(
            'order_id' => $orderID,
            'payment_method' => $payMethod,
            'is_deleted' => 'no',
            'payment_status' => 'pending',
        ));
        $userId = Session::get('userId');

        $cart = $this->db->selectOneWhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));
        $cartId = $cart['cart_id'];
        if ($buyNow == 'false') {

            $cartItems = $this->db->selectWhere('cart_item', '*', 'cart_id=:cartId', array('cartId' => $cartId));
            foreach ($cartItems as $item) {
                $this->db->insert('order_item', array(
                    'order_id' => $orderID,
                    'product_id' => $item['product_id'],
                    'item_size' => $item['item_size'],
                    'item_qty' => $item['item_qty'],
                    'item_color' => $item['item_color'],
                    'is_deleted' => 'no',
                ));
                $id = $item['product_id'];
                $color = $item['item_color'];
                $size = $item['item_size'];
                $qty = $item['item_qty'];
                $this->db->queryExecuteOnly("UPDATE inventory SET inventory.qty=(SELECT inventory.qty FROM inventory 
                WHERE inventory.product_id='$id' AND 
                inventory.color='$color' AND inventory.size='$size')-$qty WHERE inventory.product_id='$id' AND inventory.color='$color' AND 
                inventory.size='$size'");
                
                //modification in viva
               
                $qtyData = $this->db->query("SELECT qty,reorder_qty,supplier_email FROM inventory WHERE product_id='$id' AND size='$size' AND color='$color' ");
                
                $quantity = $qtyData[0]['qty'];
                $reorderLevel =  $qtyData[0]['reorder_qty'];
                


                if($quantity<$reorderLevel){
                    $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
                    $msg = "Reorder required in ".$id. " Size:" .$size ."color:" .$color;
                    $subject = 'Message from the admin of wasthra';
                    $reciever = $qtyData[0]['supplier_email'];
                    mail($reciever, $subject, $msg, $header);
                    
                }

            }
        } else {
            $this->db->insert('order_item', array(
                'order_id' => $orderID,
                'product_id' => Session::get('buyNowData')['product_id'],
                'item_size' => Session::get('buyNowData')['item_size'],
                'item_qty' => Session::get('buyNowData')['item_qty'],
                'item_color' => Session::get('buyNowData')['item_color'],
                'is_deleted' => 'no',
            ));
            $id = Session::get('buyNowData')['product_id'];
            $color = Session::get('buyNowData')['item_color'];
            $size = Session::get('buyNowData')['item_size'];
            $qty = Session::get('buyNowData')['item_qty'];
            $this->db->queryExecuteOnly("UPDATE inventory SET inventory.qty=(SELECT inventory.qty FROM inventory 
                WHERE inventory.product_id='$id' AND 
                inventory.color='$color' AND inventory.size='$size')-$qty WHERE inventory.product_id='$id' AND inventory.color='$color' AND 
                inventory.size='$size'");
        }

        $this->db->insert('checkout', array(
            'order_id' => $orderID,
            'address_id' => $aId,
            'cart_id' => $cartId,
            'user_id' => $userId,
        ));

        $this->db->insert('order_tracking', array(
            'order_id' => $orderID,
        ));

        $this->db->runQuery('UPDATE order_tracking SET ordered=CURRENT_TIMESTAMP() WHERE order_id=:orderId', array('orderId' => $orderID));
    }

    /**
     * deleteCartItems
     *
     * @return void
     */
    function deleteCartItems() {
        $userId = Session::get('userId');
        $cart = $this->db->selectOneWhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));
        $cartId = $cart['cart_id'];
        $this->db->delete('cart_item', 'cart_id=:cartId', array('cartId' => $cartId));
    }

    /**
     * getDeliveryCharges
     *
     * @return void
     */
    function getDeliveryCharges() {
        return $this->db->select('delivery_charges', '*');
    }

    /**
     * getProductList
     *
     * @return void
     */
    function getProductList() {
        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        SUM(inventory.qty) as qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.is_published='yes'
         GROUP BY product.product_id");

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    /**
     * getProductListBy
     *
     * @param  mixed $field
     * @param  mixed $value
     * @return void
     */
    function getProductListBy($field, $value) {
        if ($field == 'color') {
            $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
            product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
            GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
            SUM(inventory.qty) as qty, price_category.product_price, 
            price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
             LEFT JOIN inventory ON product.product_id=inventory.product_id
             INNER JOIN category ON product.category_id=category.category_id
             INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
             INNER JOIN product_images ON product.product_id=product_images.product_id
             LEFT JOIN review on review.product_id=product.product_id 
             WHERE inventory.color=:value AND product.is_published='yes'
             GROUP BY product.product_id;", array('value' => $value));
        } else if ($field == 'size') {
            $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
            product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
            GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
            SUM(inventory.qty) as qty, price_category.product_price, 
            price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
             LEFT JOIN inventory ON product.product_id=inventory.product_id
             INNER JOIN category ON product.category_id=category.category_id
             INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
             INNER JOIN product_images ON product.product_id=product_images.product_id
             LEFT JOIN review on review.product_id=product.product_id 
             WHERE inventory.size=:value AND product.is_published='yes'
             GROUP BY product.product_id;", array('value' => $value));
        } else if ($field == 'category') {
            $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
            product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
            GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
            SUM(inventory.qty) as qty, price_category.product_price, 
            price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
             LEFT JOIN inventory ON product.product_id=inventory.product_id
             INNER JOIN category ON product.category_id=category.category_id
             INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
             INNER JOIN product_images ON product.product_id=product_images.product_id
             LEFT JOIN review on review.product_id=product.product_id 
             WHERE category.name=:value AND product.is_published='yes'
             GROUP BY product.product_id;", array('value' => $value));
        }

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    /**
     * getAllOrderDetails
     *
     * @param  mixed $id
     * @return void
     */
    function getAllOrderDetails($id) {

        return $this->db->query("SELECT orders.order_id,orders.date,orders.time,orders.order_status,payment.payment_method,payment.payment_status,GROUP_CONCAT(product.product_name) as product_name,
        checkout.address_id,delivery_address.address_line_1,delivery_address.address_line_2,delivery_address.address_line_3,
        delivery_address.postal_code,delivery_address.city,delivery.actual_delivery_date,delivery.expected_delivery_date,delivery.delivery_status,
        SUM(order_item.item_qty*price_category.product_price)+delivery_charges.delivery_fee as total_amount,customer.first_name as customer_first_name,
        customer.last_name as customer_last_name,customer.email as customer_email,
        customer.contact_no as customer_phone,
        delivery_staff.first_name,delivery_staff.last_name FROM orders INNER JOIN payment ON payment.order_id=orders.order_id 
        INNER JOIN checkout ON orders.order_id=checkout.order_id 
        INNER JOIN customer ON checkout.user_id=customer.user_id
        INNER JOIN delivery_address ON checkout.address_id=delivery_address.address_id
        INNER JOIN delivery_charges ON delivery_address.city=delivery_charges.city
        INNER JOIN order_item ON order_item.order_id=orders.order_id 
        INNER JOIN product ON product.product_id=order_item.product_id
        INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
        LEFT JOIN delivery ON delivery.order_id=orders.order_id 
        LEFT JOIN delivery_staff ON delivery.user_id=delivery_staff.user_id WHERE orders.order_id='$id' GROUP BY orders.order_id");
    }
}
