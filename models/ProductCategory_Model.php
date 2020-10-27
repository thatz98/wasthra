<?php

class ProductCategory_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function listProductcat(){

    	return $this->db->listAll('category',array('category_id','name'));
        

    }

    public function getProductcat($id){

        return $this->db->listWhere('category',array('product_id','name'),"category_id='$id'");
    }

    public function create($data){

        $this->db->insert('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name']));
    }

    public function update($data){

        $this->db->update('user',array(
            'nic' => $data['nic'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'username' => $data['email'],
            'contact_no' => $data['contact_no'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type']),"nic = '{$data['nic']}'");

    }

    public function delete($id){
        $data = $this->db->delete('category',"category_id='$id'");

    }




}