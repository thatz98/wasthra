<div id="buyNowPopup" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL . $this->product[0]['product_images'][0]; ?>" id="product-img-b">
                <div class="gallery-row">
                    <?php
                    $iid = 20;
                    foreach ($this->product[0]['product_images'] as $image) {
                            $iid += 1;?>
                    <div class="gallery-col">
                        <img src="<?php echo URL . $image; ?>" id="<?php echo $iid ?>"
                            onclick="swapImageB('<?php echo $iid ?>')" width="100%" class="gallery-img">
                    </div>
                    <?php
                        }
                    
                    if ($this->product[0]['name'] == 'Gents') : ?>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/gents.png" id="sizeC"
                            onclick="swapImageB('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : if ($this->product[0]['name'] == 'Ladies') : ?>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/ladies.png" id="sizeCL"
                            onclick="swapImageB('sizeCL')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : ?>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/gents.png" id="sizeC"
                            onclick="swapImageB('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="/wasthra/public/images/size_charts/ladies.png" id="sizeCL"
                            onclick="swapImageB('sizeCL')" width="100%" class="view-gallery-img">
                    </div>
                    <?php endif;
                    endif; ?>

                </div>

            </div>
            <div class="col-2" style="text-align: center;">
                <h2 style="margin-top: 5px;"><?php echo $this->product[0]['product_name'] ?> </h2>
                <h4>LKR <?php echo $this->product[0]['product_price'] ?></h4><br>
                <form action="<?php echo URL; ?>cart/buyNow" method="post">
                    <label class="text-label">Select Color</label>
                    <div class="colors">
                        <?php
                        foreach ($this->product[0]['product_colors'] as $color) {?>
                        <label class="color-container">
                            <input type="radio" name="colorB" value="<?php echo $color ?>" required>
                            <span class="checkmark" style="background-color: <?php echo $color ?>"></span>
                        </label>
                        <?php
                            } ?>


                    </div><br>

                    <?php
                    $catName = $this->product[0]['name'];
                    if ($catName != "Couple") { ?>
                    <label class="text-label">Select Size</label>
                    <br>
                    <div class="sizes" id="sizeCommonB">
                    <div class="empty-result"><label class="empty-checkbox" >Select color!</label></div>
                    </div>
                    <?php
                    } else { ?>
                    <label class="text-label">Select Size for Gent</label>
                    <br>
                    <div class="sizes" id="sizeGentsB">
                    <div class="empty-result"><label class="empty-checkbox" >Select color!</label></div>
                    </div>

                    <br>
                    <label class="text-label">Select Size for Lady</label>
                    <br>
                    <div class="sizes" id="sizeLadiesB">
                    <div class="empty-result"><label class="empty-checkbox" >Select color!</label></div>
                    </div>

                    <?php  } ?>

                    <br>
                    <label class="text-label">Select Quantity</label>
                    <div class="quantity" id="quantitydivB">
                    <div class="empty-result"><label class="empty-checkbox" >Select size!</label></div>
                    </div>
                    <input type="text" name="prod_idB" value="<?php echo $this->product[0]['product_id'] ?>" hidden>
                    <input type="text" id="catB" value="<?php echo $this->product[0]['name'] ?>" hidden>
                    <input type="text" name="prev_urlB" value="<?php if (isset($_SERVER['HTTP_REFERER'])) {
                                                                    echo $_SERVER['HTTP_REFERER'];
                                                                } ?>" hidden>
                    <button id="buttonB" type="submit" class="btn">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>

<script type="text/javascript" src="/wasthra/public/js/varient_handler_for_buy_now.js"></script>