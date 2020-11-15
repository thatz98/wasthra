<?php

class Wishlist_Model extends Model{

    public function __construct(){

         parent::__construct();
         
    }

    public function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id
        INNER JOIN wishlist on product.product_id=wishlist.product_id ;");
    }

    
    public function getImages(){

        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN wishlist on product_images.product_id=wishlist.product_id;");

    }

    public function getSizes(){

        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");

    }

    public function getColors(){

        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");

    }

    public function getQty(){

        return $this->db->query("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");

    }

    public function create($id){

        $userId=Session::get('userId');
        $this->db->insert('wishlist',array(
           'product_id' => $id,
           'user_id' => $userId
             
          ));
           
    }

    public function delete($id){

        $this->db->delete('wishlist',"product_id='$id'");

   }






}
