<?php

class Cart_Model extends Model {

    function __construct() {
        parent::__construct();
    }


    function getProduct($id) {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
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

    function getAllProducts() {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.is_deleted='no'
         GROUP BY product.product_id");

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }


    function getAllDetails() {

        return $this->db->runQuery("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    function listCart() {

        return $this->db->select('cart_item', array('product_id', 'item_qty', 'item_color', 'item_size'));
    }


    function getImages() {

        return $this->db->runQuery("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }

    function getCatName() {

        return $this->db->select('price_category', array('price_category_name', 'price_category_id', 'product_price'));
    }

    function getPriceCatIdProducts() {

        return $this->db->select('product', array('price_category_id', 'product_id', 'product_name'));
    }

    function getColors() {

        return $this->db->runQuery("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }

    function getSizes() {

        return $this->db->runQuery("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }

    function listUserCart() {

        $userId = Session::get('userId');
        $cart = $this->db->selectOneWhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));

        return $cartData = $this->db->selectWhere('cart_item', array('product_id', 'item_id', 'item_qty', 'item_color', 'item_size'), 'cart_id=:id', array('id' => $cart['cart_id']));
    }

    function getDeliveryCharges() {

        return $this->db->select('delivery_charges', '*');
    }


    function create($data) {

        $userId = Session::get('userId');
        $cart = $this->db->selectOnewhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));
        $this->db->insert('cart_item', array(
            'product_id' => $data['product_id'],
            'cart_id' => $cart['cart_id'],
            'item_qty' => $data['item_qty'],
            'item_color' => $data['item_color'],
            'item_size' => $data['item_size']
        ));

        $cartData = $this->getCartItems($userId);
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }

    function update($data) {

        $itemId = $data['item_id'];
        $this->db->update('cart_item', array(
            'item_qty' => $data['item_qty'],
            'item_color' => $data['item_color'],
            'item_size' => $data['item_size']

        ), "item_id=:itemId", array('itemId' => $itemId));
        $userId = Session::get('userId');
        $cart = $this->db->selectOneWhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));
        $cartData = $this->db->selectWhere('cart_item', array('product_id', 'item_id', 'item_qty', 'item_color', 'item_size'), 'cart_id=:id', array('id' => $cart['cart_id']));
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }


    function delete($id) {

        $this->db->delete('cart_item', "item_id=:item_id", array('item_id' => $id));

        $userId = Session::get('userId');
        $cart = $this->db->selectOneWhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));
        $cartData = $this->db->selectWhere('cart_item', array('product_id', 'item_id', 'item_qty', 'item_color', 'item_size'), 'cart_id=:id', array('id' => $cart['cart_id']));
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }


    function getCartItems($userId) {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, 
     GROUP_CONCAT(DISTINCT product_images.image) 
     as product_images, price_category.product_price, cart_item.item_qty, cart_item.item_color, cart_item.item_size  
     FROM product
     INNER JOIN cart_item ON cart_item.product_id=product.product_id
     INNER JOIN shopping_cart ON shopping_cart.cart_id=cart_item.cart_id
     INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
     INNER JOIN product_images ON product.product_id=product_images.product_id
     WHERE shopping_cart.user_id=:userId
     GROUP BY product.product_id",array('userId'=>$userId));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
        }

        return $data;
    }

    function getProductPriceById($id) {
        return $this->db->runQuery('SELECT price_category.product_price FROM price_category INNER JOIN product 
        ON product.price_category_id=price_category.price_category_id WHERE product.product_id=:id',array('id'=>$id));
    }
}
