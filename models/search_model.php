<?php
 
class Search_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function liveSearch($term){
            $term = metaphone($term);
            $vowels = array("A", "E", "I", "O", "U");
            $term = str_replace($vowels, "", $term);
            return $this->db->query("SELECT * FROM product INNER JOIN category ON category.category_id=product.category_id INNER JOIN product_images ON product.product_id=product_images.product_id WHERE MATCH (meta_product_name,meta_product_desc) AGAINST ('$term*' IN BOOLEAN MODE) GROUP BY product.product_id;");
    }

    function getProductName($id){
        return $this->db->query("SELECT product_id,product_name FROM product WHERE product_id='$id';");
    }

    function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    function getAllDetailsByMultipleFilters($filters){
            $query = "SELECT DISTINCT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            INNER JOIN product_colors on product_colors.product_id=product.product_id
            INNER JOIN product_size on product_size.product_id=product.product_id
            WHERE product.product_name LIKE '%{$filters['keyword']}%' AND";
            
            if(isset($filters['color'])){
                $query .= " product_colors.colors='{$filters['color']}' AND";
            }
            if(isset($filters['size'])){
                $query .= " product_size.sizes='{$filters['size']}' AND";
            }
            if(isset($filters['category'])){
                $query .= " category.name='{$filters['category']}' AND";
            }
            
            $query = rtrim($query,' AND');

            return $this->db->query("$query");
        
    }

    

    function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
    function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }
    function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }
    function getCategories(){
        return $this->db->query("SELECT category.name,category.category_id
        FROM category ;");
    }
    function getPriceCategories(){
        return $this->db->query("SELECT price_category.price_category_name,price_category.price_category_id
        FROM price_category ;");
    }
    function getQty(){
        return $this->db->query("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");
    }

    

}