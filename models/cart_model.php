<?php 

class Cart_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }
    
    public function listCart(){
        return $this->db->listAll('cart_item',array('product_id','item_qty','item_color','item_size'));
    }
    
    public function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }


    public function create($data){

        $userId=Session::get('user_id');
        $cartId=$this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
        
        $this->db->insert('cart_item',array(
           'product_id' => $data['product_id'],
           'cart_id' => $cartId['cart_id'],
           'item_qty' => $data['item_qty'],
           'item_color' => $data['item_color'],      
           'item_size' => $data['item_size']
          
          ));
         
        
    }

}

?>