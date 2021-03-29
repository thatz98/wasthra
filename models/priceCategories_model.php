<?php

class PriceCategories_Model extends Model{

    function __construct(){

     	parent::__construct();
    
    }
   
    /**
     * listPricecat
     *
     * @return void
     */
    function listPricecat(){

        return $this->db->select('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'));
        
    }
        
    /**
     * getPriceCategory
     *
     * @param  mixed $id
     * @return void
     */
    function getPriceCategory($id){
     
        return $this->db->selectOneWhere('price_category',array('price_category_id','price_category_name','production_cost','add_market_price','discount'),"price_category_id=:id",array('id'=>$id));
   
    }
    
    /**
     * getPriceCategoryCount
     *
     * @param  mixed $status
     * @return void
     */
    function getPriceCategoryCount($status){

        return $this->db->selectOneWhere('price_category',array('COUNT(price_category_id)'),"is_deleted=:status",array('status'=>$status))['COUNT(price_category_id)'];
        
    }
    
    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    function create($data){

        $this->db->insert('price_category',array(
           'price_category_id' => $data['price_category_id'],
           'price_category_name' => $data['price_category_name'],
           'user_id' => Session::get('userData')['user_id'],
           'add_market_price' => $data['add_market_price'],
           'production_cost' => $data['production_cost'],
           'discount' => $data['discount'],
           'product_price' =>((floatval($data['production_cost'])+floatval($data['add_market_price']))*(100-floatval($data['discount']))/100)
           ));

    }
    
    /**
     * update
     *
     * @param  mixed $data
     * @return void
     */
    function update($data){
        
        $this->db->update('price_category',array(
            'price_category_id' => $data['price_category_id'],
            'price_category_name' => $data['price_category_name'],
            'user_id' => Session::get('$userData')['user_id'],
            'add_market_price' => $data['add_market_price'],
            'production_cost' => $data['production_cost'],
            'discount' => $data['discount'],
            'product_price' => ((floatval($data['production_cost'])+floatval($data['add_market_price']))*(100-floatval($data['discount']))/100)),"price_category_id = :prev_id",array('prev_id'=>$data['prev_id']));

     }
     
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    function delete($id){

         $this->db->delete('price_category',"price_category_id=:id",array('id'=>$id));

    }

 


}

