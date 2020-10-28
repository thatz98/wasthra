<?php

class PriceCategories_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function listPricecat(){
        return $this->db->listAll('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'));
        
    }
    
    public function getPriceCategory($id){

        return $this->db->listWhere('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'),"price_category_id='$id'");
     }

    public function create($data){

        $this->db->insert('price_category',array(
           'price_category_id' => $data['price_category_id'],
           'price_category_name' => $data['price_category_name'],
           'nic' => Session::get('nic'),
           'add_market_price' => $data['add_market_price'],
           'production_cost' => $data['production_cost'],
           'discount' => $data['discount'],
          // 'product_price' => floatval($data['production_cost'])+floatval($data['add_market_price'])-floatval($data['discount'])
           ));

    }

    public function update($data){
        
        $this->db->update('price_category',array(
            'price_category_id' => $data['price_category_id'],
            'price_category_name' => $data['price_category_name'],
            'nic' => Session::get('nic'),
            'add_market_price' => $data['add_market_price'],
            'production_cost' => $data['production_cost'],
            'discount' => $data['discount'],
            'product_price' => $data['product_price']),"price_category_id = '{$data['prev_id']}'");

     }

    public function delete($id){

         $this->db->delete('price_category',"price_category_id='$id'");

    }




}

