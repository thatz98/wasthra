<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2>Edit Inventory</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>inventory/editSave/" id="editFrom" method="post">
                        <div class="row">
                            <div class="col-2 pad-l-55">
                            <input type="text" name="product_id" value="<?php echo $this->getInventory['product_id']?>" hidden>   
                            <label>Reorder Level : </label><br>
                            <input type="text" name="reorder_level"  value="<?php echo $this->getInventory['reorder_level'] ?>"><br><br>
                           
                    
                        </div>
                        <div class="col-2 pad-l-55" >
                            <label>Reorder Quantity : </label><br><input type="text" name="reorder_quantity" id="category_name" value="<?php echo $this->getInventory['reorder_qty'] ?>"><br><br>
                        
                        </div>
                    </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>inventory" class="btn btn-grey">Cancel</a>
                        </div>
                    </form>

                    </div>

        
</div>
</div>
<?php require 'views/footer_dashboard.php'; ?>