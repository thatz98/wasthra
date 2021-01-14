<?php 

class Cart_Model extends Model{

    function __construct(){
     	parent::__construct();
    }
    
    function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    function listCart(){
        return $this->db->listAll('cart_item',array('product_id','item_qty','item_color','item_size'));
    }
    
    function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }

    function getCatName(){
        return $this->db->query("SELECT price_category.price_category_name,price_category.price_category_id,.price_category.product_price
        FROM price_category;");
    }

    function getPriceCatIdProducts(){
        return $this->db->query("SELECT product.price_category_id,product.product_id,product.product_name
        FROM product ;");
    }

    function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }

    function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
   
    function listUserCart(){
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


    function create($data){

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
                        $cartData = $this->getCartItems($userId);
                        Session::set('cartCount', count($cartData));
                        Session::set('cartData', $cartData);
         
        
    }

    function update($data){
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


     function delete($id){

        $this->db->delete('cart_item',"item_id='$id'");

        $userId = Session::get('userId');
        $cartId = $this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
        $id = $cartId[0]['cart_id'];
        //  print_r($id);
        $cartData = $this->db->query("SELECT cart_item.product_id,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size
        FROM cart_item WHERE cart_item.cart_id='$id';");
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
   }


   function getCartItems($userId) {
    $data = $this->db->query("SELECT product.product_id, product.product_name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, price_category.product_price, cart_item.item_qty, cart_item.item_color, cart_item.item_size  FROM product
     INNER JOIN cart_item ON cart_item.product_id=product.product_id
     INNER JOIN shopping_cart ON shopping_cart.cart_id=cart_item.cart_id
     INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
     INNER JOIN product_images ON product.product_id=product_images.product_id
     WHERE shopping_cart.user_id='$userId'
     GROUP BY product.product_id");

    foreach ($data as $key => $value) {
        $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
    }

    return $data;
}
}

?>