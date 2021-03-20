<?php
 
class Inventory_Model extends Model{

        function __construct(){
            parent::__construct();
        }

        function listInventoryDetials(){

            //return $this->db->listAll('inventory',array('product_id','qty','reorder_qty','reorder_level','color','size'));
            return $this->db->query("SELECT product_id,qty,reorder_qty,reorder_level,color,size FROM inventory WHERE is_deleted='no' ORDER BY product_id");
            
        }

        function getInventory($id){

            return $this->db->listWhere('inventory',array('product_id','qty','reorder_qty','reorder_level','size','color'),"product_id='$id'");
        }

        function update($data){
            $color=$data['color'];
            $size=$data['size'];
            $pid=$data['product_id'];
            $level=$data['reorder_level'];
            $qty=$data['reorder_qty'];
            $this->db->queryExecuteOnly("UPDATE inventory SET inventory.reorder_level='$level',inventory.reorder_qty='$qty' 
            WHERE inventory.product_id='$pid' AND inventory.color='$color' AND inventory.size='$size'");
            // $this->db->update('inventory',array(
            //     'reorder_level' => $data['reorder_level'],
            //     'reorder_qty' => $data['reorder_qty'],),"product_id = '{$data['product_id']}'");
        }

        function getProductCount(){

            return $this->db->query("SELECT COUNT(inventory.product_id) FROM inventory WHERE is_deleted='no'; ");
    
        }

    }

        


?>