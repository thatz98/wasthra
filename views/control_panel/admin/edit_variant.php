<?php require 'views/header_dashboard.php'; ?>


<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Edit Variant</h2>
    </div>
    <div class="center-content">

        <form action="<?php echo URL; ?>products/updateVariant" id="addFrom" class="hidden-form" enctype="multipart/form-data" method="post">

            <div class="row-top">
                <input type="text" id="product_id" name="product_id" hidden>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Color</label><br>
                        <input id="Color" type="text" value="<?php echo $this->varients[0]['color']; ?>" name="color" placeholder="#12ab87" data-helper="Colors" onfocusout="validateColors()">
                        <span class="popuptext"></span>
                        <br>

                    </div>


                </div>
                <div class="col-3">
                    <?php if ($this->product[0]['name'] == 'Couple') {
                    ?>
                        <div class="helper-text">
                            <label>Size for Couple</label><br><select id="size" name="size-couple">
                                <option value="0">Select</option>
                                <option value="XS-G" <?php if ($this->varients[0]['size'] == "XS-G") {
                                                            echo "selected=\"selected\"";
                                                        } ?>>Gents-XS</option>
                                <option value="S-G" <?php if ($this->varients[0]['size'] == "S-G") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>Gents-S</option>
                                <option value="M-G" <?php if ($this->varients[0]['size'] == "M-G") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>Gents-M</option>
                                <option value="L-G" <?php if ($this->varients[0]['size'] == "L-G") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>Gents-L</option>
                                <option value="XL-G" <?php if ($this->varients[0]['size'] == "XL-G") {
                                                            echo "selected=\"selected\"";
                                                        } ?>>Gents-XL</option>
                                <option value="XXL-G" <?php if ($this->varients[0]['size'] == "XXL-G") {
                                                            echo "selected=\"selected\"";
                                                        } ?>>Gents-XXL</option>
                                <option value="XS-W" <?php if ($this->varients[0]['size'] == "XS-W") {
                                                            echo "selected=\"selected\"";
                                                        } ?>>Ladies-XS</option>
                                <option value="S-W" <?php if ($this->varients[0]['size'] == "S-W") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>Ladies-S</option>
                                <option value="M-W" <?php if ($this->varients[0]['size'] == "M-W") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>Ladies-M</option>
                                <option value="L-W" <?php if ($this->varients[0]['size'] == "L-W") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>Ladies-L</option>
                                <option value="XL-W" <?php if ($this->varients[0]['size'] == "XL-W") {
                                                            echo "selected=\"selected\"";
                                                        } ?>>Ladies-XL</option>
                                <option value="XXL-W" <?php if ($this->varients[0]['size'] == "XXL-W") {
                                                            echo "selected=\"selected\"";
                                                        } ?>>Ladies-XXL</option>
                            </select>
                            <span class="popuptext"></span>
                            

                        </div>
                    <?php } else {
                    ?>
                        <div class="helper-text">
                            <label>Size</label><br><select id="size" name="size">
                                <option value="0">Select</option>
                                <option value="XS" <?php if ($this->varients[0]['size'] == "XS") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>XS</option>
                                <option value="S" <?php if ($this->varients[0]['size'] == "S") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>S</option>
                                <option value="M" <?php if ($this->varients[0]['size'] == "M") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>M</option>
                                <option value="L" <?php if ($this->varients[0]['size'] == "L") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>L</option>
                                <option value="XL" <?php if ($this->varients[0]['size'] == "XL") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>XL</option>
                                <option value="XXL" <?php if ($this->varients[0]['size'] == "XXL") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>XXL</option>
                            </select>
                            <span class="popuptext"></span>
                            

                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-3">
                    <div class="helper-text">
                        <label>Quantity</label><br><input id="Quantity" value="<?php echo $this->varients[0]['qty']; ?>" type="text" name="quantity" data-helper="Quantity" onfocusout="validateQuantity()">
                        
                        <span class="popuptext"></span>
                        
                    </div>
                </div>
                <input name="product_id" value="<?php echo $this->product[0]['product_id']; ?>" hidden>
                        <input name="inventory_id" value="<?php echo $this->varients[0]['inventory_id']; ?>" hidden>
                        <input name="prev_color" value="<?php echo $this->varients[0]['color']; ?>" hidden>
                        <input name="prev_size" value="<?php echo $this->varients[0]['size']; ?>" hidden>
            </div>

            <div class="center-btn">
                <button type="submit" class="btn">Update</button>
                <a href="<?php echo URL ?>products/productDetails/<?php echo $this->product[0]['product_id']; ?>" class="btn btn-grey">Cancel</a>
            </div>
        </form>





    </div>
</div>
<script type="text/javascript" src="/public/js/form_validation.js"></script>
<script type="text/javascript" src="/util/form/edit_variant_form_validation.js"></script>
<?php require 'views/footer_dashboard.php'; ?>