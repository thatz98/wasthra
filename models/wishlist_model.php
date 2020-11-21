<?php

class Wishlist_Model extends Model{

    function __construct(){

         parent::__construct();
         
    }

    function getwishlistDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty,wishlist.user_id,wishlist.product_id
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id
        INNER JOIN wishlist on product.product_id=wishlist.product_id ;");

    }

    
    function getwishlistImages(){

        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN wishlist on product_images.product_id=wishlist.product_id;");

    }


    function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");

    }

    function getImages(){

        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
        
    }

    function getSizes(){

        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");

    }

    function getColors(){

        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");

    }

    function getQty(){

        return $this->db->query("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");

    }

    // function listUserWishlist(){
    //     $userId=Session::get('userId');
    //     $productId=$this->db->query("SELECT product_id FROM wishlist WHERE wishlist.user_id='$userId'");
    //     $id=$productId[2]['product_id'];
    //     print_r($id);
    //     return $this->db->query("SELECT product.product_id,product.product_name,product.is_featured,product.is_new,product.is_published, price_category.product_price
    //     FROM product INNER JOIN price_category on price_category.price_category_id=product.price_category_id
    //     WHERE product.product_id='$id';");
      
    // }

    function create($id){

        $userId=Session::get('userId');
        $this->db->insert('wishlist',array(
           'product_id' => $id,
           'user_id' => $userId
             
          ));
           
    }

    function delete($id){

        $this->db->delete('wishlist',"product_id='$id'");

   }






}
