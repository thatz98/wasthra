<?php
 
class Products_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function listProducts(){

    	return $this->db->select('product',array('product_id','product_name','product_description','is_featured','is_new'));
        
    }

    function getProduct($id) {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
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

    function getAllProducts() {

        $data = $this->db->runQuery("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
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

    function getAllDetails(){
        return $this->db->runQuery("SELECT price_category.product_price,category.name,product.is_published,product.product_id,
        product.product_name,product.is_featured,product.is_new
		FROM product         
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
    }

    function getSizes(){
        return $this->db->runQuery("SELECT product_size.sizes,product_size.product_id 
        FROM product_size INNER JOIN product on product_size.product_id=product.product_id;");
    }
    function getImages(){
        return $this->db->runQuery("SELECT product_images.image,product_images.product_id
        FROM product_images INNER JOIN product on product_images.product_id=product.product_id;");
    }
    function getColors(){
        return $this->db->runQuery("SELECT product_colors.colors,product_colors.product_id
        FROM product_colors INNER JOIN product on product_colors.product_id=product.product_id;");
    }
    function getCategories(){
        return $this->db->select('category',array('name','category_id'));
    }
    function getPriceCategories(){
        return $this->db->select('price_category',array('price_category_name','price_category_id'));
    }
    function getQty(){
        return $this->db->selectWhere('inventory',array('product_id','qty'),"is_deleted='no'");
    }
    function getQtyByID($id){
        return $this->db->selectWhere('inventory',array('qty'),"product_id=:id",array('id'=>$id));
    }

    function getProductCount(){

        return $this->db->selectWhere('product',array('COUNT(product_id)'), "is_deleted='no'");

    }


    function create($data,$imageList){
        $category=$this->db->selectOneWhere('category',array('category_id'), "name=:category",array('category'=>$data['category']));
        $price_category=$this->db->selectOneWhere('price_category',array('price_category_id'), "price_category_name=:category",array('category'=>$data['price_category']));

        $this->db->insert('product',array(
            'product_id' => $data['product_id'],
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'is_featured' => $data['is_featured'],
            'is_new' => $data['is_new'],
            'is_published' => $data['is_published'],
            'category_id' => $category['category_id'],
            'price_category_id' => $price_category['price_category_id'],
            'meta_product_name' => $data['meta_product_name'],
            'meta_product_desc' => $data['meta_product_desc']));
        
        foreach($imageList as $img){

            $m="public/images/products/";
            $m.=$img;
            if($m=='public/images/products/'){
            break;
            }
            $this->db->insert('product_images', array('product_id'=>$data['product_id'],'image'=>$m));
        }
    }

    function addVarient($data,$size){

        $this->db->insert('inventory',array(
            'product_id' => $data['product_id'],
            'color' => $data['color'],
            'size' => $size,
            'qty' => $data['qty'],
            ));

            $this->db->insert('product_colors',array(
                'product_id' => $data['product_id'],
                'colors' => $data['color'],
                ));

            $this->db->insert('product_size',array(
                'product_id' => $data['product_id'],
                'sizes' => $size,
                ));
    }

    function getReviewDetails($id) {
        return $this->db->runQuery("SELECT review.product_id,review.user_id,customer.first_name,customer.last_name,review.rate,review.review_text,review.date,review.time,review.review_id, GROUP_CONCAT(DISTINCT review_image.image) as review_images FROM review
        INNER JOIN customer ON review.user_id=customer.user_id
        LEFT JOIN review_image ON review_image.review_id=review.review_id
        WHERE review.product_id=:id AND review.is_deleted='no'
        GROUP BY review.review_id",array('id'=>$id));
    }


    function update($data,$imageList,$prevImageList){
        $previous_id=$data['prev_id'];
        
        $category=$this->db->selectOneWhere('category',array('category_id'), "name=:category",array('category'=>$data['category']));
        $price_category=$this->db->selectOneWhere('price_category',array('price_category_id'), "price_category_name=:category",array('category'=>$data['price_category']));

        $this->db->update('product',array(
            'product_id' => $data['product_id'],
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'is_featured' => $data['is_featured'],
            'is_new' => $data['is_new'],
            'category_id' => $category['category_id'],
            'price_category_id' => $price_category['price_category_id'],
            'is_published' => $data['is_published'],
            'meta_product_name' => $data['meta_product_name'],
            'meta_product_desc' => $data['meta_product_desc']),
            "product_id = :prev_id",array('prev_id'=>$data['prev_id']));
           
            $this->db->delete('product_images',"product_id=:previous_id",array('previous_id'=>$previous_id));
            
            foreach($imageList as $img){
                $m="public/images/products/";
                $m.=$img;
                echo $m;
                if($m=='public/images/products/'){
                break;
                }
                $this->db->insert('product_images', array('product_id'=>$data['product_id'],'image'=>$m));
                
            }

            foreach($prevImageList as $img){
                if($img==''){
                break;
                }

                $this->db->insert('product_images', array('product_id'=>$data['product_id'],'image'=>$img));
                
            }


      

    }

    function updateVariant($data, $product_id, $inventory_id){

        $this->db->update('inventory',array('color'=>$data['color'],'qty'=>$data['qty'],'size'=>$data['size']),
        "inventory_id=:inventory_id",array('inventory_id'=>$inventory_id));

    }

    function getVarientDetails($id){

        return $this->db->selectWhere('inventory',array('is_deleted','inventory_id','color','size','qty'), "product_id=:id",array('id'=>$id));
    }

    function delete($id){
        
            $this->db->update('product',array('is_deleted'=>'yes'), "product_id=:id",array('id'=>$id));
        
    }

    function deleteVariant($id){
        
            $this->db->delete('inventory', 'inventory_id=:id',array('id'=>$id));
        
    }
    function deleteImage($id,$name){
        
        $this->db->delete('product_images','product_id=:id AND image=:name',array('id'=>$id,'name'=>$name));

    }

    function getPublishedCount(){
        return $this->db->selectOneWhere('product',array('COUNT(product_id)'),"is_published=:status",array('status'=>'yes'))['COUNT(product_id)'];
    }
    function getReorderCount(){
        return $this->db->selectOneWhere('inventory',array('COUNT(product_id)'),"qty<=reorder_level")['COUNT(product_id)'];
    }
    function getOutStockCount(){
        return $this->db->selectOneWhere('inventory',array('COUNT(product_id)'),"qty=:qty",array('qty'=>'0'))['COUNT(product_id)'];
    }

    function getQtyCount($id){

        return $this->db->selectWhere('inventory',array('SUM(inventory.qty)'),"product_id=:id AND inventory.is_deleted='no'",array('id'=>$id));

    }

    function getVariantByID($id){

        return $this->db->selectWhere('inventory',array('inventory_id','color','size','qty'),'inventory_id=:id',array('id'=>$id));

    }



}