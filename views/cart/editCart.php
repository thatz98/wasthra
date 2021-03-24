<div id="updateCartPopup" class="overlay">
    <?php if (isset($_GET['id'])){
                foreach($this->cartItems as $item){
                    if($item['product_id']==$_GET['id']){
                        $this->productPopup = array_slice($item, 0,count($item));
                        break;
                    }
    }
} ?>
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL . $this->productPopup['product_images'][0]; ?>" id="product-img-p">
                <div class="gallery-row">
                    <?php
                    $iid = 30;
                    foreach ($this->productPopup['product_images'] as $image) {
                            $iid += 1;?>
                    <div class="gallery-col">
                        <img src="<?php echo URL . $image; ?>" id="<?php echo $iid ?>"
                            onclick="swapImageP('<?php echo $iid ?>')" width="100%" class="gallery-img">
                    </div>
                    <?php
                        }
                    
                    if ($this->productPopup['name'] == 'Gents') : ?>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/gents.png" id="sizeC"
                            onclick="swapImageP('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : if ($this->productPopup['name'] == 'Ladies') : ?>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/ladies.png" id="sizeCL"
                            onclick="swapImageP('sizeCL')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : ?>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/gents.png" id="sizeC"
                            onclick="swapImageP('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/ladies.png" id="sizeCL"
                            onclick="swapImageP('sizeCL')" width="100%" class="view-gallery-img">
                    </div>
                    <?php endif;
                    endif; ?>

                </div>

            </div>
            <div class="col-2" style="text-align: center;">
                <h2 style="margin-top: 5px;"><?php echo $this->productPopup['product_name'] ?> </h2>
                <h4>LKR <?php echo $this->productPopup['product_price'] ?></h4><br>
                <form action="<?php echo URL; ?>cart/updateCartItem/<?php echo $this->productPopup['item_id'];?>" method="post">
                    <label class="text-label">Select Color</label>
                    <div class="colors">
                        <?php
                        foreach ($this->productPopup['product_colors'] as $color) {?>
                        <label class="color-container">
                            <input type="radio" name="colorC" value="<?php echo $color ?>" <?php if($this->productPopup['item_color']==$color) echo 'checked';?> required>
                            <span class="checkmark" style="background-color: <?php echo $color ?>"></span>
                        </label>
                        <?php
                            } ?>


                    </div><br>

                    <?php
                    $catName = $this->productPopup['name'];
                    if ($catName != "Couple") { ?>
                    <label class="text-label">Select Size</label>
                    <br>
                    <div class="sizes" id="sizeCommonC">
                    <div class="empty-result"><label class="empty-checkbox" >Select color!</label></div>
                    </div>
                    <?php
                    } else { ?>
                    <label class="text-label">Select Size for Gent</label>
                    <br>
                    <div class="sizes" id="sizeGentsC">
                    <div class="empty-result"><label class="empty-checkbox" >Select color!</label></div>
                    </div>

                    <br>
                    <label class="text-label">Select Size for Lady</label>
                    <br>
                    <div class="sizes" id="sizeLadiesC">
                    <div class="empty-result"><label class="empty-checkbox" >Select color!</label></div>
                    </div>

                    <?php  } ?>

                    <br>
                    <label class="text-label">Select Quantity</label>
                    <div class="quantity" id="quantitydivC">
                    <div class="empty-result"><label class="empty-checkbox" >Select size!</label></div>
                    </div>
                    <input type="text" name="prod_idC" value="<?php echo $this->productPopup['product_id'] ?>" hidden>
                    <input type="text" id="prevSize" value="<?php echo $this->productPopup['item_size'] ?>" hidden>
                    <input type="text" id="prevQty" value="<?php echo $this->productPopup['item_qty'] ?>" hidden>
                    <input type="text" id="catC" value="<?php echo $this->productPopup['name'] ?>" hidden>
                    <input type="text" name="prev_url" value="<?php if (isset($_SERVER['HTTP_REFERER'])) {
                                                                    echo $_SERVER['HTTP_REFERER'];
                                                                } ?>" hidden>
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>

<script type="text/javascript" src="/wasthra/public/js/varient_handler_for_edit_cart.js"></script>