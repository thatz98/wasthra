<?php

class ProductCategories_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function listProductcat(){

    	return $this->db->listAll('category',array('category_id','name'));
        

    }

    public function getProductcat($id){

        return $this->db->listWhere('category',array('category_id','name'),"category_id='$id'");
    }

    public function create($data){

        $this->db->insert('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name']));
    }

    public function update($data){

        $this->db->update('category',array(
            'category_id' => $data['category_id'],
            'name' => $data['name'],),"category_id = '{$data['prev_id']}'");
    }

    public function delete($id){
        $data = $this->db->delete('category',"category_id='$id'");

    }




}