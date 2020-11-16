<?php

class Orders_Model extends Model{

function __construct(){
     parent::__construct();
}

function getDeliveryStaffList(){

    return $this->db->listAll('delivery_staff',array('user_id','first_name','last_name'));
}
}