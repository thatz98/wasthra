<?php
 
class Shop_Model extends Model{

    public function __construct(){

     	parent::__construct();
    }

    public function listProducts(){

    	return $this->db->listAll('product',array('product_id','product_name','product_description','is_featured','is_new'));
        
    }

    public function getProduct($id){

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

    public function getProductName($id){
        return $this->db->query("SELECT product_id,product_name FROM product WHERE product_id='$id';");
    }

    public function getAllDetails(){
        
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
		FROM product INNER JOIN inventory ON product.product_id=inventory.product_id
        
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    public function getAllDetailsBy($field,$value){
        if($field=='color'){
            return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            INNER JOIN product_colors on product_colors.product_id=product.product_id
            WHERE product_colors.colors='$value';");
        } else if($field=='size'){
            return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            INNER JOIN product_size on product_size.product_id=product.product_id
            WHERE product_size.sizes='$value';");
        } else if($field=='category'){
            return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,product.product_name,product.is_featured,product.is_new,inventory.qty
            FROM product INNER JOIN inventory ON product.product_id=inventory.product_id  
            INNER JOIN category on category.category_id=product.category_id
            INNER JOIN price_category on price_category.price_category_id=product.price_category_id
            WHERE category.name='$value';");
        }
        
    }

    

    public function getSizes(){
        return $this->db->query("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
    public function getImages(){
        return $this->db->query("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }
    public function getColors(){
        return $this->db->query("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }
    public function getCategories(){
        return $this->db->query("SELECT category.name,category.category_id
        FROM category ;");
    }
    public function getPriceCategories(){
        return $this->db->query("SELECT price_category.price_category_name,price_category.price_category_id
        FROM price_category ;");
    }
    public function getQty(){
        return $this->db->query("SELECT inventory.product_id,inventory.qty
        FROM inventory ;");
    }

    public function addReview($data,$date,$time,$imageList){
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

    public function reviewDetails($id){
        return $this->db->query("SELECT review.product_id,review.user_id,customer.first_name,customer.last_name,review.rate,review.review_text,review.date,review.time,review.review_id FROM review INNER JOIN customer ON review.user_id=customer.user_id WHERE review.product_id='$id' ");
    }

}