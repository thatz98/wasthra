<?php

class DeliveryCharges_Model extends Model{

    function __construct(){
         parent::__construct();
         
    }
  /*
     * Display all   delivery charges 
     *
     * 
     */
    function listDeliveryCharges(){
   
    	return $this->db->select('delivery_charges',array('city','delivery_fee'));
        
    }
    
    /*
     * Display a relvent delivery charge 
     *
     * 
     */ 
    function getDeliveryCharges($id){
   

        return $this->db->selectOneWhere('delivery_charges',array('city','delivery_fee'),"city=:id",array('id'=>$id));

    }

     /*
     * Get city count for result search
     *
     * 
     */
    function getCityCount(){

   
        return $this->db->select('delivery_charges',array('COUNT(delivery_charges.city)'));

    }


    /*
     * Create  a new delivery charge
     *
     * 
     */
    function create($data){
 
        $this->db->insert('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']));

    }

    /*
     * Update a  delivery charge
     *
     * 
     */
    function update($data){
  
        $this->db->update('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']),"city = :prev_city",array('prev_city'=>$data['prev_city']));

    }

     /*
     * Delete a  delivery charge
     *
     * 
     */
    function delete($id){

        $this->db->delete('delivery_charges',"city=:city",array('city'=>$id));

    }



}

?>