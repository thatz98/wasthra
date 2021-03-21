<?php

class DeliveryCharges_Model extends Model{

    function __construct(){
         parent::__construct();
         
    }

    function listDeliveryCharges(){
     /*
     * Display all   delivery charges 
     *
     * 
     */

    	return $this->db->listAll('delivery_charges',array('city','delivery_fee'));
        
    }
    
    function getDeliveryCharges($id){

    /*
     * Display a relvent delivery charge 
     *
     * 
     */    

        return $this->db->listWhere('delivery_charges',array('city','delivery_fee'),"city='$id'");

    }

    function create($data){
     /*
     * Create  a new delivery charge
     *
     * 
     */

        $this->db->insert('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']));

    }

    function update($data){
     /*
     * Update a  delivery charge
     *
     * 
     */
        $this->db->update('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']),"city = '{$data['prev_city']}'");

    }

    function delete($id){

     /*
     * Delete a  delivery charge
     *
     * 
     */
        $this->db->delete('delivery_charges',"city='$id'");

    }

    function getCityCount(){

     /*
     * Get city count for result search
     *
     * 
     */
        return $this->db->query("SELECT COUNT(delivery_charges.city) FROM delivery_charges ; ");

    }


}