<?php

class Checkout_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function create($data){

        $this->db->insert( 'delivery_address' , array(
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'address_line_3' => $data['address_line_3'],
            'city' => $data['city'],
            'user_id' => Session::get('userId')
        ));
    }
}
?>