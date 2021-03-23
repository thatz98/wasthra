<?php
 
class Products_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function listProducts(){

    	return $this->db->select('product',array('product_id','product_name','product_description','is_featured','is_new'));
        
    }

    function getProduct($id) {

        $data = $this->db->query("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
        product.is_featured, category.name, GROUP_CONCAT(DISTINCT product_images.image) as product_images, 
        GROUP_CONCAT(DISTINCT inventory.size) as product_sizes, GROUP_CONCAT(DISTINCT inventory.color) as product_colors, 
        inventory.qty, price_category.product_price, 
        price_category.price_category_name, category.name, AVG(review.rate) AS review_rate  FROM product
         LEFT JOIN inventory ON product.product_id=inventory.product_id
         INNER JOIN category ON product.category_id=category.category_id
         INNER JOIN price_category ON product.price_category_id=price_category.price_category_id
         INNER JOIN product_images ON product.product_id=product_images.product_id
         LEFT JOIN review on review.product_id=product.product_id 
         WHERE product.product_id='$id'
         GROUP BY product.product_id");

        foreach ($data as $key => $value) {
            $data[$key]['product_images'] = explode(',', $data[$key]['product_images']);
            $data[$key]['product_sizes'] = explode(',', $data[$key]['product_sizes']);
            $data[$key]['product_colors'] = explode(',', $data[$key]['product_colors']);
        }

        return $data;
    }

    function getAllProducts() {

        $data = $this->db->query("SELECT product.product_id, product.product_name, product.product_description, product.is_published, product.is_new, 
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
        return $this->db->query("SELECT price_category.product_price,category.name,product.is_published,product.product_id,
        product.product_name,product.is_featured,product.is_new
		FROM product         
        INNER JOIN category on category.category_id=product.category_id
        INNER JOIN price_category on price_category.price_category_id=product.price_category_id;");
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
        FROM inventory WHERE is_deleted='no' ;");
    }
    function getQtyByID($id){
        return $this->db->query("SELECT inventory.qty
        FROM inventory WHERE inventory.product_id='$id';");
    }
    function getSizesByID($id){
        return $this->db->query("SELECT product_size.sizes 
        FROM product_size WHERE product_size.product_id='$id';");
    }
    function getImagesByID($id){
        return $this->db->query("SELECT product_images.image 
        FROM product_images WHERE product_images.product_id='$id';");
    }

    function getProductCount(){

        return $this->db->query("SELECT COUNT(product_id) FROM product WHERE is_deleted='no'; ");

    }


    function create($data,$imageList){

        $this->db->insert('product',array(
            'product_id' => $data['product_id'],
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'is_featured' => $data['is_featured'],
            'is_new' => $data['is_new'],
            'is_published' => $data['is_published'],
            'meta_product_name' => $data['meta_product_name'],
            'meta_product_desc' => $data['meta_product_desc']));

        $category=$data['category'];
        $product_id=$data['product_id'];
        $price_category=$data['price_category'];
        $this->db->queryExecuteOnly("UPDATE product SET product.category_id=(SELECT category_id FROM category WHERE category.name='$category' ) WHERE product.product_id='$product_id' ");
        $this->db->queryExecuteOnly("UPDATE product SET product.price_category_id=(SELECT price_category_id FROM price_category WHERE price_category.price_category_name='$price_category' ) WHERE product.product_id='$product_id' ");

        
        foreach($imageList as $img){

            $m="public/images/products/";
            $m.=$img;
            if($m=='public/images/products/'){
            break;
            }
            $this->db->queryExecuteOnly("INSERT INTO product_images (product_images.product_id,product_images.image) VALUES ('$product_id','$m')");
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
        return $this->db->query("SELECT review.product_id,review.user_id,customer.first_name,customer.last_name,review.rate,review.review_text,review.date,review.time,review.review_id, GROUP_CONCAT(DISTINCT review_image.image) as review_images FROM review
        INNER JOIN customer ON review.user_id=customer.user_id
        LEFT JOIN review_image ON review_image.review_id=review.review_id
        WHERE review.product_id='$id' AND review.is_deleted='no'
        GROUP BY review.review_id");
    }


    function update($data,$imageList,$prevImageList){
        $previous_id=$data['prev_id'];
        $this->db->update('product',array(
            'product_id' => $data['product_id'],
            'product_name' => $data['product_name'],
            'product_description' => $data['product_description'],
            'is_featured' => $data['is_featured'],
            'is_new' => $data['is_new'],
            'is_published' => $data['is_published'],
            'meta_product_name' => $data['meta_product_name'],
            'meta_product_desc' => $data['meta_product_desc']),
            "product_id = :prev_id",array('prev_id'=>$data['prev_id']));

            $category=$data['category'];
            $product_id=$data['product_id'];
            $price_category=$data['price_category'];
            $this->db->queryExecuteOnly("UPDATE product SET product.category_id=(SELECT category_id FROM category WHERE category.name='$category' ) WHERE product.product_id='$product_id' ");
            $this->db->queryExecuteOnly("UPDATE product SET product.price_category_id=(SELECT price_category_id FROM price_category WHERE price_category.price_category_name='$price_category' ) WHERE product.product_id='$product_id' ");

           
            $this->db->delete('product_images',"product_id=:previous_id",array('previous_id'=>$previous_id));
            
            foreach($imageList as $img){
                $m="public/images/products/";
                $m.=$img;
                echo $m;
                if($m=='public/images/products/'){
                break;
                }
                $this->db->queryExecuteOnly("INSERT INTO product_images (product_images.product_id,product_images.image) VALUES ('$product_id','$m')");
                
            }

            foreach($prevImageList as $img){
                if($img==''){
                break;
                }

                $this->db->queryExecuteOnly("INSERT INTO product_images (product_images.product_id,product_images.image) VALUES ('$product_id','$img')");
                
            }


      

    }

    function updateVariant($data, $product_id, $inventory_id){

        $prevColor = $data['prev_color'];
        $newColor = $data['color'];
        $prevSize = $data['prev_size'];
        $newSize = $data['size'];
        $qty = $data['qty'];
        $this->db->queryExecuteOnly("UPDATE inventory SET inventory.color='$newColor',inventory.qty=$qty,inventory.size='$newSize'
        WHERE inventory.inventory_id='$inventory_id'");

        $this->db->queryExecuteOnly("UPDATE product_colors SET product_colors.colors='$newColor' WHERE product_colors.product_id='$product_id'
         AND product_colors.colors='$prevColor'");
        
        $this->db->queryExecuteOnly("UPDATE product_size SET product_size.sizes='$newSize' WHERE product_size.product_id='$product_id'
         AND product_size.sizes='$prevSize'");

    }

    function getVarientDetails($id){

        return $this->db->query("SELECT is_deleted,inventory_id,color,size,qty FROM inventory WHERE product_id='$id'");

    }

    function delete($id){
        
            $this->db->queryExecuteOnly("UPDATE product SET product.is_deleted='yes' WHERE product.product_id='$id'");
        
    }

    function deleteVariant($id){
        
            $this->db->queryExecuteOnly("DELETE FROM inventory WHERE inventory.inventory_id='$id'");
        
    }
    function deleteImage($id,$name){
        
        $this->db->queryExecuteOnly("DELETE FROM product_images WHERE product_id='$id' AND image='$name'");

    }

    function getPublishedCount(){
        return $this->db->selectOneWhere('product',array('COUNT(product_id)'),"is_published=:status",array('status'=>'yes'))['COUNT(product_id)'];;
    }
    function getReorderCount(){
        return $this->db->selectOneWhere('inventory',array('COUNT(product_id)'),"qty<=reorder_level",array())['COUNT(product_id)'];
    }
    function getOutStockCount(){
        return $this->db->selectOneWhere('inventory',array('COUNT(product_id)'),"qty=:qty",array('qty='=>0))['COUNT(product_id)'];
    }

    function getQtyCount($id){

        return $this->db->query("SELECT SUM(inventory.qty) FROM inventory WHERE inventory.product_id='$id' AND inventory.is_deleted='no' ");

    }

    function getVariantByID($id){

        return $this->db->query("SELECT inventory_id,color,size,qty FROM inventory WHERE inventory_id='$id'");

    }



}