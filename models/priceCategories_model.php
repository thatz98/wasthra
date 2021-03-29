<?php

class PriceCategories_Model extends Model{

    function __construct(){

     	parent::__construct();
    
    }

     /* get the 
        price category list*/
    function listPricecat(){

        return $this->db->select('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'));
        
    }
    
       /*return required row 
        based on price_category_id*/ 
    function getPriceCategory($id){
     
        return $this->db->selectOneWhere('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'),"price_category_id=:id",array('id'=>$id));
   
    }

      /* get the
         price category  count*/ 
    function getPriceCategoryCount($status){

        return $this->db->selectOneWhere('price_category',array('COUNT(price_category_id)'),"is_deleted=:status",array('status'=>$status))['COUNT(price_category_id)'];
        
    }

    /**
     * Add new price category
     *
     * 
     */

    function create($data){

        $this->db->insert('price_category',array(
           'price_category_id' => $data['price_category_id'],
           'price_category_name' => $data['price_category_name'],
           'user_id' => Session::get('userData')['user_id'],
           'add_market_price' => $data['add_market_price'],
           'production_cost' => $data['production_cost'],
           'discount' => $data['discount'],
           'product_price' => floatval($data['production_cost'])+floatval($data['add_market_price'])-floatval($data['discount'])
           ));

    }

    

    /**
     * Update the existing price category
     *
     * 
     */

    function update($data){
        
        $this->db->update('price_category',array(
            'price_category_id' => $data['price_category_id'],
            'price_category_name' => $data['price_category_name'],
            'user_id' => Session::get('$userData')['user_id'],
            'add_market_price' => $data['add_market_price'],
            'production_cost' => $data['production_cost'],
            'discount' => $data['discount'],
            'product_price' => $data['product_price']),"price_category_id = :prev_id",array('prev_id'=>$data['prev_id']));

     }

    /**
     * Delete existing price category
     *
     * 
     */
 
    function delete($id){

         $this->db->delete('price_category',"price_category_id=:id",array('id'=>$id));

    }

 


}

