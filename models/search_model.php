<?php

class Search_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function liveSearch($term) {
        $term = metaphone($term);
        $vowels = array("A", "E", "I", "O", "U");
        $term = str_replace($vowels, "", $term);
        return $this->db->query("SELECT * FROM product INNER JOIN category ON category.category_id=product.category_id INNER JOIN product_images ON product.product_id=product_images.product_id WHERE MATCH (meta_product_name,meta_product_desc) AGAINST ('$term*' IN BOOLEAN MODE) GROUP BY product.product_id;");
    }

    function getProductName($id) {
        return $this->db->query("SELECT product_id,product_name FROM product WHERE product_id='$id';");
    }

    function searchByKeyword($keyword) {
        if($keyword){
            $term = metaphone($keyword);
            $vowels = array("A", "E", "I", "O", "U");
            $term = str_replace($vowels, "", $term);
            $query = "SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
            product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
            GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
            inventory.qty, price_category.product_price, 
            price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
             LEFT JOIN inventory ON product.product_id=inventory.product_id
             INNER JOIN category ON product.category_id=category.category_id
             INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
             INNER JOIN product_images ON product.product_id=product_images.product_id
             LEFT JOIN review on review.product_id=product.product_id
            WHERE product.is_published='yes'
            AND MATCH (meta_product_name,meta_product_desc) AGAINST ('$term*' IN BOOLEAN MODE) GROUP BY product.product_id";
        } else{
            $query = "SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
            product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
            GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
            inventory.qty, price_category.product_price, 
            price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
             LEFT JOIN inventory ON product.product_id=inventory.product_id
             INNER JOIN category ON product.category_id=category.category_id
             INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
             INNER JOIN product_images ON product.product_id=product_images.product_id
             LEFT JOIN review on review.product_id=product.product_id
            WHERE product.is_published='yes'
            GROUP BY product.product_id";
        }
        


        $data = $this->db->query($query);

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    function getAllDetailsByMultipleFilters($filters) {

        if(isset($filters['keyword']) && !empty($filters['keyword'])){
            $term = metaphone($filters['keyword']);
        $vowels = array("A", "E", "I", "O", "U");
        $term = str_replace($vowels, "", $term);

        $query = "SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id
        WHERE product.is_published='yes'
            AND MATCH (meta_product_name,meta_product_desc) AGAINST ('$term*' IN BOOLEAN MODE) AND";
        } else{
            $query = "SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id
        WHERE product.is_published='yes' AND";
        }
        if (isset($filters['color'])) {
            $query .= " inventory.color='{$filters['color']}' AND";
        }
        if (isset($filters['size'])) {
            $query .= " inventory.size='{$filters['size']}' AND";
        }
        if (isset($filters['category'])) {
            $query .= " category.name='{$filters['category']}' AND";
        }

        $query = rtrim($query, ' AND');

        $query .= " GROUP BY product.product_id;";

        $data = $this->db->query($query);

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    function getSizes() {
        return $this->db->query("SELECT DISTINCT inventory.size as sizes
        FROM inventory;");
    }

    function getColors() {
        return $this->db->query("SELECT DISTINCT inventory.color as colors
        FROM inventory;");
    }
    function getCategories() {
        return $this->db->query("SELECT category.name,category.category_id
        FROM category ;");
    }
}
