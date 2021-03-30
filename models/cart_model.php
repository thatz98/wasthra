<?php

class Cart_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * getAllProducts
     *
     * @return void
     */
    function getAllProducts()
    {
        $cart = $this->db->selectOnewhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => Session::get('userId')));

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, AVG(review.rate) AS review_rate,cart_item.item_id,cart_item.item_qty,cart_item.item_color,cart_item.item_size  FROM product
         INNER JOIN cart_item ON cart_item.product_id=product.product_id
         INNER JOIN shopping_cart ON cart_item.cart_id=shopping_cart.cart_id
         INNER JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.is_deleted='no' AND shopping_cart.cart_id=:cartId 
         GROUP BY cart_item.item_id", array('cartId' => $cart['cart_id']));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }
    
    /**
     * listUserCart
     *
     * @return void
     */
    function listUserCart()
    {

        $userId = Session::get('userId');
        $cart = $this->db->selectOneWhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));

        return $cartData = $this->db->selectWhere('cart_item', array('product_id', 'item_id', 'item_qty', 'item_color', 'item_size'), 'cart_id=:id', array('id' => $cart['cart_id']));
    }
    
    /**
     * getDeliveryCharges
     *
     * @return void
     */
    function getDeliveryCharges()
    {

        return $this->db->select('delivery_charges', '*');
    }

    
    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    function create($data)
    {

        $userId = Session::get('userId');
        $cart = $this->db->selectOnewhere('shopping_cart', array('cart_id'), 'user_id=:userId', array('userId' => $userId));
        $this->db->insert('cart_item', array(
            'product_id' => $data['product_id'],
            'cart_id' => $cart['cart_id'],
            'item_qty' => $data['item_qty'],
            'item_color' => $data['item_color'],
            'item_size' => $data['item_size']
        ));

        $cartData = $this->getCartItems($userId);
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }
    
    /**
     * update
     *
     * @param  mixed $data
     * @return void
     */
    function update($data)
    {

        $itemId = $data['item_id'];
        $this->db->update('cart_item', array(
            'item_qty' => $data['item_qty'],
            'item_color' => $data['item_color'],
            'item_size' => $data['item_size']

        ), "item_id=:itemId", array('itemId' => $itemId));
        $userId = Session::get('userId');
        $userId = Session::get('userId');
        $cartData = $this->db->getCartItems($userId);
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }

    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    function delete($id)
    {

        $this->db->delete('cart_item', "item_id=:item_id", array('item_id' => $id));

        $userId = Session::get('userId');
        $cartData = $this->db->getCartItems($userId);
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }


    function getCartItems($userId)
    {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, 
     GROUP_CONCAT(DISTINCT product_images.image) 
     as product_images, price_category.product_price, cart_item.item_qty, cart_item.item_color, cart_item.item_size  
     FROM product
     INNER JOIN cart_item ON cart_item.product_id=product.product_id
     INNER JOIN shopping_cart ON shopping_cart.cart_id=cart_item.cart_id
     INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
     INNER JOIN product_images ON product.product_id=product_images.product_id
     WHERE shopping_cart.user_id=:userId
     GROUP BY cart_item.item_id", array('userId' => $userId));

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
        }

        return $data;
    }
    
    /**
     * getProductPriceById
     *
     * @param  mixed $id
     * @return void
     */
    function getProductPriceById($id)
    {
        return $this->db->runQuery('SELECT price_category.product_price FROM price_category INNER JOIN product 
        ON product.price_category_id=price_category.price_category_id WHERE product.product_id=:id', array('id' => $id));
    }
    
    /**
     * updateCartQuantity
     *
     * @param  mixed $data
     * @param  mixed $oldQty
     * @return void
     */
    function updateCartQuantity($data, $oldQty)
    {
        $id = $data['product_id'];
        $color = $data['item_color'];
        $size = $data['item_size'];
        $qty = $data['item_qty'];
        $this->db->queryExecuteOnly("UPDATE cart_item SET cart_item.item_qty=$qty+$oldQty WHERE cart_item.product_id='$id' AND 
        cart_item.item_size='$size' AND cart_item.item_color='$color'");
        $cartData = $this->getCartItems(Session::get('userId'));
        Session::set('cartCount', count($cartData));
        Session::set('cartData', $cartData);
    }
}
