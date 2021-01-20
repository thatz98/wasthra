<?php

class PriceCategories_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function listPricecat(){
        return $this->db->listAll('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'));
        
    }
    
    function getPriceCategory($id){

        return $this->db->listWhere('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'),"price_category_id='$id'");
     }

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

    function update($data){
        
        $this->db->update('price_category',array(
            'price_category_id' => $data['price_category_id'],
            'price_category_name' => $data['price_category_name'],
            'user_id' => Session::get('$userData')['user_id'],
            'add_market_price' => $data['add_market_price'],
            'production_cost' => $data['production_cost'],
            'discount' => $data['discount'],
            'product_price' => $data['product_price']),"price_category_id = '{$data['prev_id']}'");

     }

 
    function delete($id){

         $this->db->delete('price_category',"price_category_id='$id'");

    }

    function getPriceCategoryCount($status){

        return $this->db->listWhere('price_category',array('COUNT(price_category_id)'),"is_deleted='$status'")['COUNT(price_category_id)'];
        
    }


}

