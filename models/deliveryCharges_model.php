<?php

class DeliveryCharges_Model extends Model{

    function __construct(){
         parent::__construct();
         
    }

    function listDeliveryCharges(){

    	return $this->db->listAll('delivery_charges',array('city','delivery_fee'));
        
    }
    
    function getDeliveryCharges($id){

        return $this->db->listWhere('delivery_charges',array('city','delivery_fee'),"city='$id'");

    }

    function create($data){

        $this->db->insert('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']));

    }

    function update($data){

        $this->db->update('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']),"city = '{$data['prev_city']}'");

    }

    function delete($id){

        $this->db->delete('delivery_charges',"city='$id'");

    }

}