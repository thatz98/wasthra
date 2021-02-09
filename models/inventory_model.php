<?php
 
class Inventory_Model extends Model{

        function __construct(){
            parent::__construct();
        }

        function listInventoryDetials(){

            return $this->db->listAll('inventory',array('product_id','qty','reorder_qty','reorder_level','color','size'));
            
        }

        function getInventory($id){

            return $this->db->listWhere('inventory',array('product_id','qty','reorder_qty','reorder_level'),"product_id='$id'");
        }

        function update($data){

            $this->db->update('inventory',array(
                'reorder_level' => $data['reorder_level'],
                'reorder_qty' => $data['reorder_qty'],),"product_id = '{$data['product_id']}'");
        }

        
}

?>