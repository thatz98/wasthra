<?php

class ProductCategories_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function listProductcat(){

    	return $this->db->select('category',array('category_id','name'));
        

    }

    function getProductcat($id){

        return $this->db->selectOneWhere('category',array('category_id','name'),"category_id=:id",array('id'=>$id));
    }

    function create($data){

        $this->db->insert('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name']));
    }

    function update($data){

        $this->db->update('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name'],),"category_id = :prev_id",array('prev_id'=>$data['prev_id']));
    }

    function delete($id){
        $data = $this->db->delete('category',"category_id=:id",array('id'=>$id));

    }

    function getProductCategoryCount($status){

        return $this->db->selectOneWhere('price_category',array('COUNT(price_category_id)'),"is_deleted=:status",array('status'=>$status))['COUNT(price_category_id)'];
        
    }




}