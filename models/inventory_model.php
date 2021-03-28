<?php
 
class Inventory_Model extends Model{

        function __construct(){
            parent::__construct();
        }

        function listInventoryDetials(){

            return $this->db->selectWhere('inventory', array('product_id','qty','reorder_qty','reorder_level','color','size'),"is_deleted='no' ORDER BY product_id");
            
        }

        function getInventory($id,$size,$colorPass){
            $color='#'.$colorPass;
            
            return $this->db->selectOneWhere('inventory',array('product_id','qty','reorder_qty','reorder_level','size','color'),
            "product_id=:id AND size=:size AND color=:color",array('id'=>$id,'size'=>$size,'color'=>$color));
        }

        function update($data){
            
             $this->db->update('inventory',array(
                 'reorder_level' => $data['reorder_level'],
                 'reorder_qty' => $data['reorder_qty'],),
                 "inventory.product_id=:pid AND color=:color AND size=:size",
                array('pid'=>$data['product_id'],'color'=>$data['color'],'size'=>$data['size']));
        }

        function getProductCount(){

            return $this->db->selectWhere('inventory',array('COUNT(inventory.product_id)'),"is_deleted='no'");
    
        }

    }
