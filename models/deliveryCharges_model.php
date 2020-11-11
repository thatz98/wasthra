<?php

class DeliveryCharges_Model extends Model{

    public function __construct(){
         parent::__construct();
         
    }

    public function listDeliveryCharges(){

    	return $this->db->listAll('delivery_charges',array('city','delivery_fee'));
        
    }
    
    public function getDeliveryCharges($id){

        return $this->db->listWhere('delivery_charges',array('city','delivery_fee'),"city='$id'");

    }

    public function create($data){

        $this->db->insert('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']));

    }

    public function update($data){

        $this->db->update('delivery_charges',array(
            'city' => $data['city'],
            'delivery_fee' => $data['delivery_fee']),"city = '{$data['prev_city']}'");

    }

    public function delete($id){

        $this->db->delete('delivery_charges',"city='$id'");

    }

}