<?php require 'views/header_dashboard.php'; ?>


<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Edit Inventory</h2>
        </div>
        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>products/addVarient" id="addFrom" class="hidden-form" enctype="multipart/form-data" method="post">

            <div class="row-top">
                <input type="text" id="product_id" name="product_id" hidden>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Color</label><br>
                        <input id="color" type="text" name="color" placeholder="#12ab87" data-helper="Colors" onfocusout="validateColors()">
                        <span class="popuptext"></span>
                        <br>

                    </div>


                </div>
                <div class="col-3">
                <?php if($this->product[0]['name']=='Couple'){
                ?>
                    <div class="helper-text">
                        <label>Size for Couple</label><br><select id="size-couple" name="size-couple">
                            <option value="0">Select</option>
                            <option value="XS-G">Gents-XS</option>
                            <option value="S-G">Gents-S</option>
                            <option value="M-G">Gents-M</option>
                            <option value="L-G">Gents-L</option>
                            <option value="XL-G">Gents-XL</option>
                            <option value="XXL-G">Gents-XXL</option>
                            <option value="XS-W">Ladies-XS</option>
                            <option value="S-W">Ladies-S</option>
                            <option value="M-W">Ladies-M</option>
                            <option value="L-W">Ladies-L</option>
                            <option value="XL-W">Ladies-XL</option>
                            <option value="XXL-W">Ladies-XXL</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>
                    <!-- <div class="helper-text">
                        <label>Size for Ladies</label><br><select id="size-l" name="size-l">
                            <option value="0">Select</option>

                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>--> <?php } else{ 
                        ?>
                        <div class="helper-text">
                        <label>Size</label><br><select id="size" name="size">
                            <option value="0">Select</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>
                    <?php
                    }
?>
                </div>
                
                <div class="col-3">
                    <div class="helper-text">
                        <label>Quantity</label><br><input id="quantity" type="text" name="quantity" data-helper="Quantity" onfocusout="validateQuantity()">
                        <input name="product_id" value="<?php echo $this->product[0]['product_id'];?>" hidden>
                        <span class="popuptext"></span>
                        <br>
                    </div>
                </div>
            </div>

            <div class="center-btn">
                <button type="submit" class="btn">Add New Varient</button>
            </div>
        </form>

                    </div>


        
</div>
</div>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/edit_inventory_form_validation.js"></script>
<?php require 'views/footer_dashboard.php'; ?>