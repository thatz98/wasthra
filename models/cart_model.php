<?php 

class Cart_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }
    public function create($data){

        $this->db->insert('cart_item',array(
           'product_id' => $data['product_id'],
           'item_qty' => $data['item_qty'],
           'item_color' => $data['item_color'],      
           'item_size' => $data['item_size']
          
          ));
          $userId=Session::get('user_id');
          $cartId = $this->db->listWhere('shopping_cart',array('cart_id'),"user_id='$userId'"); 

          $this->db->insert('cart_item',array(
            'cart_id' => $cartId['cart_id']));
              
    }

}

?>