<?php

class Wishlist_Model extends Model {

    function __construct() {

        parent::__construct();
    }

    function getAllProductsInWishlist() {

        //get all products 

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name,wishlist.user_id,wishlist.product_id, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        SUM(inventory.qty) as qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
        INNER JOIN wishlist on product.product_id=wishlist.product_id
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.is_deleted='no' AND wishlist.user_id=:userId
         GROUP BY product.product_id", array('userId' => Session::get('userId')));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }


    function create($id) {


        $userId = Session::get('userId');
        $this->db->insert('wishlist', array(
            'product_id' => $id,
            'user_id' => $userId
        ));
    }



    function delete($id) {


        $this->db->delete('wishlist', "product_id=:id", array('id' => $id));
    }
}
