<?php

class Wishlist_Model extends Model{

    function __construct(){

         parent::__construct();
         
    }


    
    function getAllProducts() {

        //get all products 

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name,wishlist.user_id,wishlist.product_id, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         INNER JOIN wishlist on product.product_id=wishlist.product_id
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


    
    function getProduct($id) {

        //get a related product from the product id


        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name,wishlist.user_id,wishlist.product_id, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         INNER JOIN wishlist on product.product_id=wishlist.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.product_id=:id
         GROUP BY product.product_id",array('id'=>$id));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;


    }



    function getwishlistDetails(){

        
        return $this->db->runQuery("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,
        product.is_featured,product.is_new,inventory.qty,wishlist.user_id,wishlist.product_id
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id
        INNER JOIN wishlist on product.product_id=wishlist.product_id ;");


    }

    
    function getwishlistImages(){


        return $this->db->runQuery("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN wishlist on product_images.product_id=wishlist.product_id;");


    }


    function getAllDetails(){

        
        return $this->db->runQuery("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");


    }


    function getImages(){


        return $this->db->runQuery("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");

        
    }


    function getSizes(){


        return $this->db->runQuery("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");


    }


    function getColors(){


        return $this->db->runQuery("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");


    }


    function getQty(){


        return $this->db->runQuery("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");


    }


    function create($id){


        $userId=Session::get('userId');
        $this->db->insert('wishlist',array(
           'product_id' => $id,
           'user_id' => $userId
             
          ));

           
    }



    function delete($id){


        $this->db->delete('wishlist',"product_id=:id",array('id'=>$id));


   }



   function getDeliveryCharges(){


    return $this->db->select('delivery_charges','*');


}






}
