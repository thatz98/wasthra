<div id="addToCartPopup" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL . $this->product[0]['product_images'][0]; ?>" id="product-img-p">
                <div class="gallery-row">
                    <?php
                    $iid = 10;
                    foreach ($this->product[0]['product_images'] as $image) {
                            $iid += 1;?>
                    <div class="gallery-col">
                        <img src="<?php echo URL . $image; ?>" id="<?php echo $iid ?>"
                            onclick="swapImageP('<?php echo $iid ?>')" width="100%" class="gallery-img">
                    </div>
                    <?php
                        }
                    
                    if ($this->product[0]['name'] == 'Gents') : ?>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/size_charts/gents.png" id="sizeC"
                            onclick="swapImageP('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : if ($this->product[0]['name'] == 'Ladies') : ?>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/size_charts/ladies.png" id="sizeCL"
                            onclick="swapImageP('sizeCL')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : ?>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/size_charts/gents.png" id="sizeC"
                            onclick="swapImageP('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/size_charts/ladies.png" id="sizeCL"
                            onclick="swapImageP('sizeCL')" width="100%" class="view-gallery-img">
                    </div>
                    <?php endif;
                    endif; ?>

                </div>

            </div>
            <div class="col-2" style="text-align: center;">
                <h2 style="margin-top: 5px;"><?php echo $this->product[0]['product_name'] ?> </h2>
                <h4>LKR <?php echo $this->product[0]['product_price'] ?></h4><br>
                <form action="<?php echo URL; ?>cart/addToCart" method="post">
                    <label class="text-label">Select Color</label>
                    <div class="colors">
                        <?php
                        foreach ($this->product[0]['product_colors'] as $color) {?>
                        <label class="color-container">
                            <input type="radio" name="color" value="<?php echo $color ?>" required>
                            <span class="checkmark" style="background-color: <?php echo $color ?>"></span>
                        </label>
                        <?php
                            } ?>


                    </div><br>

                    <?php
                    $catName = $this->product[0]['name'];
                    $single_sizes_gents = array('XS-G', 'S-G', 'M-G', 'L-G', 'XL-G');
                    $single_sizes_ladies = array('XS-W', 'S-W', 'M-W', 'L-W', 'XL-W');
                    if ($catName != "Couple") { ?>
                    <label class="text-label">Select Size</label>
                    <br>
                    <div class="sizes">
                        <?php
                            foreach ($this->product[0]['product_sizes'] as $size) {?>
                        <label class="size-container">
                            <input type="radio" name="size" value="<?php echo $size ?>" required>
                            <span class="checkbox"><?php echo $size ?></span>

                        </label>
                        <?php
                                }
                             ?>
                    </div>
                    <?php
                    } else { ?>
                    <label class="text-label">Select Size for Gent</label>
                    <br>
                    <div class="sizes">
                        <?php
                            foreach ($this->product[0]['product_sizes'] as $size) {
                                if (in_array($size, $single_sizes_ladies)) {
                                    continue;
                                } else {
                                    $single_sizes_ladies[] .= $size; ?>
                        <label class="size-container">
                            <input type="radio" name="size2" value="<?php echo $size ?>" required>
                            <span class="checkbox"><?php echo rtrim($size, "-G") ?></span>

                        </label>
                        <?php
                                }
                            } ?>
                    </div>
                    <br>
                    <label class="text-label">Select Size for Lady</label>
                    <br>
                    <div class="sizes">
                        <?php
                            foreach ($this->product[0]['product_sizes'] as $size) {
                                if (in_array($size, $single_sizes_gents)) {
                                    continue;
                                } else {
                                    $single_sizes_gents[] .= $size; ?>
                        <label class="size-container">
                            <input type="radio" name="size1" value="<?php echo $size ?>" required>
                            <span class="checkbox"><?php echo rtrim($size, "-W") ?></span>

                        </label>
                        <?php
                                }
                            } ?>
                    </div>
                    <?php  } ?>

                    <br>
                    <label class="text-label">Select Quantity</label>
                    <div class="quantity">
                        <span class="qty-minus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                class="fa fa-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity"
                            value="1">
                        <span class="qty-plus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" name="prod_id" value="<?php echo $this->product[0]['product_id'] ?>" hidden>
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