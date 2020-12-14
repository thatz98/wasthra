<?php
 
class Shop_Model extends Model{

    function __construct(){

     	parent::__construct();
    }

    function listProducts(){

    	return $this->db->listAll('product',array('product_id','product_name','product_description','is_featured','is_new'));
        
    }

    function getProduct($id){

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

    function getProductName($id){
        return $this->db->query("SELECT product_id,product_name FROM product WHERE product_id='$id';");
    }

    function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty,AVG(review.rate) AS review_rate 
        FROM product 
        INNER JOIN inventory ON product.product_id=inventory.product_id 
        INNER JOIN category on category.category_id=product.category_id 
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id 
        LEFT JOIN review on review.product_id=product.product_id GROUP BY product_id;");
    }

    function getAllDetailsBy($field,$value){
        if($field=='color'){
            return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty,AVG(review.rate) AS review_rate 
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            INNER JOIN product_colors on product_colors.product_id=product.product_id
            LEFT JOIN review on review.product_id=product.product_id
            WHERE product_colors.colors='$value'
            GROUP BY product_id;");
        } else if($field=='size'){
            return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty,AVG(review.rate) AS review_rate 
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            INNER JOIN product_size on product_size.product_id=product.product_id
            LEFT JOIN review on review.product_id=product.product_id
            WHERE product_size.sizes='$value';
            GROUP BY product_id");
        } else if($field=='category'){
            return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty,AVG(review.rate) AS review_rate 
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            LEFT JOIN review on review.product_id=product.product_id
            WHERE category.name='$value'
            GROUP BY product_id;");
        }
        
    }

    

    function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
    function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }
    function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }
    function getCategories(){
        return $this->db->query("SELECT category.name,category.category_id
        FROM category ;");
    }
    function getPriceCategories(){
        return $this->db->query("SELECT price_category.price_category_name,price_category.price_category_id
        FROM price_category ;");
    }
    function getQty(){
        return $this->db->query("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");
    }

    function addReview($data,$date,$time,$imageList){
        $this->db->insert('review',array(
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id'],
            'rate' => $data['rating'],
            'review_text' => $data['comment'], 
            'date' => $date,
            'time' => $time,     
           
           ));
        $product_id = $data['product_id'];
        $user_id = $data['user_id'];
        $rate = $data['rating'];
        $review_id =  $this->db->query("SELECT review.review_id
        FROM review WHERE review.product_id='$product_id' AND review.user_id='$user_id' AND review.date='$date' AND review.time='$time' ;");
        
        $rID=$review_id[0][0];
        print_r($imageList);
        foreach($imageList as $img){
            if($img==''){
            break;
            }
            $m="public/images/Review_images/";
            $m.=$img;
            echo $m;

            $this->db->queryExecuteOnly("INSERT INTO review_image (review_image.review_id,review_image.image) VALUES ('$rID','$m')");
        }
        
    }

    function reviewDetails($id){
        return $this->db->query("SELECT review.product_id,review.user_id,customer.first_name,customer.last_name,review.rate,review.review_text,review.date,review.time,review.review_id FROM review INNER JOIN customer ON review.user_id=customer.user_id WHERE review.product_id='$id' AND review.is_deleted='no'");
    }

    function reviewImages(){
        return $this->db->query("SELECT review_image.image,review_image.review_id FROM review_image ");
    }

    function deleteReview($id){
        $this->db->update('review',array('is_deleted' => 'yes'), "review_id='$id'");
    }

    function create($data){

        $this->db->insert( 'delivery_address' , array(
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'address_line_3' => $data['address_line_3'],
            'city' => $data['city'],
            'postal_code' => $data['postal_code'],
            'user_id' => Session::get('userId')
        ));
    }

    function getAddressId($data){
        $userId = Session::get('userId');
        $postal_code = $data['postal_code'];
        $address_line_1 = $data['address_line_1'];
        $address_line_2 = $data['address_line_2'];
        $address_line_3 = $data['address_line_3'];
        $city = $data['city'];
        return $this->db->query("SELECT address_id FROM delivery_address WHERE user_id='$userId' AND postal_code='$postal_code'
        AND city='$city' AND address_line_1='$address_line_1' AND address_line_2='$address_line_2' AND address_line_3='$address_line_3' ");
    }

    function placeOrder($date,$time,$orderID,$payMethod,$aId,$comment){
        $this->db->insert( 'orders' , array(
            'order_id' => $orderID,
            'order_status' => 'new',
            'is_deleted' => 'no',
            'date' => $date,
            'time' => $time,
            'delivery_comment' => $comment, 
        ));
        
        $this->db->insert( 'payment' , array(
            'order_id' => $orderID,
            'payment_method' => $payMethod,
            'is_deleted' => 'no',
            'payment_status' => 'pending',
        ));


        $userId=Session::get('userId');
        $cartId=$this->db->query("SELECT cart_id FROM shopping_cart WHERE shopping_cart.user_id='$userId'");
        $cartIdActual=$cartId[0][0];
        $cartItems = $this->db->query("SELECT * FROM cart_item WHERE cart_item.cart_id='$cartIdActual'");
        foreach ($cartItems as $item){
            $this->db->insert( 'order_item' , array(
                'order_id' => $orderID,
                'product_id' => $item['product_id'],
                'item_size' => $item['item_size'],
                'item_qty' => $item['item_qty'],
                'item_color' => $item['item_color'],
                'is_deleted' => 'no', 
            ));
        }
        echo $orderID;
        echo $aId;
        echo $cartIdActual;
        echo $userId;
        $this->db->insert( 'checkout' , array(
            'order_id' => $orderID,
            'address_id' => $aId,
            'cart_id' => $cartIdActual,
            'user_id' => $userId,
        ));
    }
}