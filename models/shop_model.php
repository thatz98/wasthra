<?php
 
class Shop_Model extends Model{

    public function __construct(){

     	parent::__construct();
    }

    public function listProducts(){

    	return $this->db->listAll('product',array('product_id','product_name','product_description','is_featured','is_new'));
        
    }

    public function getProduct($id){

        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.product_description,product.is_new,inventory.qty,product_size.sizes,product_colors.colors,product_images.image
        FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id
        INNER JOIN product_size on product_size.product_id=product.product_id
        INNER JOIN product_colors on product_colors.product_id=product.product_id
        INNER JOIN product_images on product_images.product_id=product.product_id
         WHERE product.product_id='$id';");

        //$this->db->listWhere('product',array('product_id','product_name','product_description','is_featured','is_new','category_id','price_category_id','is_published'),"product_id='$id'");
    }

    public function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    public function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
    public function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }
    public function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }
    public function getCategories(){
        return $this->db->query("SELECT category.name,category.category_id
        FROM category ;");
    }
    public function getPriceCategories(){
        return $this->db->query("SELECT price_category.price_category_name,price_category.price_category_id
        FROM price_category ;");
    }
    public function getQty(){
        return $this->db->query("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");
    }

}