<?php require 'views/header_dashboard.php'; ?>


<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Edit Inventory</h2>
    </div>
    <div class="center-content">
        <div class="form-container">
            <form action="<?php echo URL; ?>inventory/editSave/" id="editFrom" method="post">
                <div class="row">
                    <div class="col-2">
                        <input type="text" name="product_id" value="<?php echo $this->getInventory['product_id'] ?>" hidden>
                        <input type="text" name="size" value="<?php echo $this->getInventory['size'] ?>" hidden>
                        <input type="text" name="color" value="<?php echo $this->getInventory['color'] ?>" hidden>
                        <div class="helper-text">
                            <label>Reorder Level</label><br>
                            <input type="text" id="reorder_level" name="reorder_level" placeholder="not set" value="<?php echo $this->getInventory['reorder_level'] ?>" data-helper="Reorder Level" onfocusout="validateReorderLevel()">
                            <span class="popuptext"></span><br><br>

                        </div>

                    </div>
                    <div class="col-2">
                        <div class="helper-text">
                            <label>Reorder Quantity</label><br>
                            <input placeholder="not set" type="text" name="reorder_quantity" id="reorder_quantity" value="<?php echo $this->getInventory['reorder_qty'] ?>" data-helper="Reorder Quantity" onfocusout="validateReorderQuantity()">
                            <span class="popuptext"></span><br><br>

                        </div>
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
<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/edit_inventory_form_validation.js"></script>
<?php require 'views/footer_dashboard.php'; ?>