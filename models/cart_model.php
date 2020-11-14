<?php 

class Cart_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }
    
    public function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    public function listCart(){
        return $this->db->listAll('cart_item',array('product_id','item_qty','item_color','item_size'));
    }
    
    public function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }

    public function getCatName(){
        return $this->db->query("SELECT price_category.price_category_name,price_category.price_category_id,.price_category.product_price
        FROM price_category;");
    }

    public function getPriceCatIdProducts(){
        return $this->db->query("SELECT product.price_category_id,product.product_id,product.product_name
        FROM product ;");
    }

    public function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }

    public function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
   
    public function listUserCart(){
        $userId=Session::get('userId');
        $cartId=$this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
        $id=$cartId[0]['cart_id'];
    //  print_r($id);
        return $this->db->query("SELECT cart_item.product_id,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size
        FROM cart_item WHERE cart_item.cart_id='$id';");
    

    }

    function getDeliveryCharges(){
        return $this->db->listAll('delivery_charges','*');
    }


    public function create($data){

        $userId=Session::get('userId');
        $cartId=$this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
        $this->db->insert('cart_item',array(
           'product_id' => $data['product_id'],
           'cart_id' => $cartId[0]['cart_id'],
           'item_qty' => $data['item_qty'],
           'item_color' => $data['item_color'],      
           'item_size' => $data['item_size']
          
          ));

                        $id = $cartId[0]['cart_id'];
                        //  print_r($id);
                        $cartData = $this->db->query("SELECT cart_item.product_id,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size
                    FROM cart_item WHERE cart_item.cart_id='$id';");
                        Session::set('cartCount', count($cartData));
                        Session::set('cartData', $cartData);
         
        
    }

    public function update($data){
        $itemId = $data['item_id'];
        $this->db->update('cart_item',array(
           'item_qty' => $data['item_qty'],
           'item_color' => $data['item_color'],      
           'item_size' => $data['item_size']
          
          ),"item_id=$itemId");
          $userId = Session::get('userId');
          $cartId = $this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
          $id = $cartId[0]['cart_id'];
          //  print_r($id);
          $cartData = $this->db->query("SELECT cart_item.product_id,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size
      FROM cart_item WHERE cart_item.cart_id='$id';");
          Session::set('cartCount', count($cartData));
          Session::set('cartData', $cartData);
    }


     public function delete($id){

        $this->db->delete('cart_item',"product_id='$id'");
        $userId = Session::get('userId');
        $cartId = $this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
        $id = $cartId[0]['cart_id'];
        //  print_r($id);
        $cartData = $this->db->query("SELECT cart_item.product_id,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size
    FROM cart_item WHERE cart_item.cart_id='$id';");
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
   }



}

?>