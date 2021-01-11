<?php
 
class Index_Model extends Model{

    function __construct(){

     	parent::__construct();
    }

    function getFeaturedProducts(){
        
        $data = $this->db->query("SELECT product.product_id, product.product_name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, GROUP_CONCAT(DISTINCT product_size.sizes) as product_sizes, GROUP_CONCAT(DISTINCT product_colors.colors) as product_colors, inventory.qty, price_category.product_price, category.name, AVG(review.rate) AS review_rate  FROM product
         INNER JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         INNER JOIN product_size ON product.product_id=product_size.product_id
         INNER JOIN product_colors ON product.product_id=product_colors.product_id
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

    function getNewProducts(){
        
        $data = $this->db->query("SELECT product.product_id, product.product_name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, GROUP_CONCAT(DISTINCT product_size.sizes) as product_sizes, GROUP_CONCAT(DISTINCT product_colors.colors) as product_colors, inventory.qty, price_category.product_price, category.name, AVG(review.rate) AS review_rate  FROM product
         INNER JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         INNER JOIN product_size ON product.product_id=product_size.product_id
         INNER JOIN product_colors ON product.product_id=product_colors.product_id
         LEFT JOIN review on review.product_id=product.product_id
         WHERE product.is_published='yes' AND product.is_new='yes'
         GROUP BY product.product_id
         LIMIT 8");

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    function getCityList(){
        return $this->db->listAll('delivery_charges',array('city'));
    }

    function getDeliveryCharges(){
        return $this->db->listAll('delivery_charges','*');
    }
}