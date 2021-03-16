<?php

class ProductCategories_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function listProductcat(){

    	return $this->db->listAll('category',array('category_id','name'));
        

    }

    function getProductcat($id){

        return $this->db->listWhere('category',array('category_id','name'),"category_id='$id'");
    }

    function create($data){

        $this->db->insert('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name']));
    }

    function update($data){

        $this->db->update('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name'],),"category_id = '{$data['prev_id']}'");
    }

    function delete($id){
        $data = $this->db->delete('category',"category_id='$id'");

    }

    function getProductCategoryCount($status){

        return $this->db->listWhere('price_category',array('COUNT(price_category_id)'),"is_deleted='$status'")['COUNT(price_category_id)'];
        
    }




}