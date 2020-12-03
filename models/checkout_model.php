<?php

class Checkout_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    // function create($data){

    //     $this->db->insert( 'delivery_address' , array(
    //         'address_line_1' => $data['address_line_1'],
    //         'address_line_2' => $data['address_line_2'],
    //         'address_line_3' => $data['address_line_3'],
    //         'city' => $data['city'],
    //         'user_id' => Session::get('userId')
    //     ));
    // }

    // function getAllDetails(){
        
    //     return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
    //     FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
    //     INNER JOIN category on category.category_id=product.category_id
    //     INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    // }
    
    // function getImages(){
    //     return $this->db->query("SELECT product_images.image,product_images.product_id
    //     FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    // }
}
?>