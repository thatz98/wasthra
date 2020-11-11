<div id="addToCartPopup" class="overlay">
 
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL.$this->product[0]['image']; ?>" id="product-img-p">
            <div class="gallery-row">
                    <?php $single_images = array();
                    $iid=10;
                    foreach($this->product as $single){
                        if(in_array($single['image'],$single_images)){
                            continue;
                        }else{
                            $iid += 1;
                            $single_images[] .= $single['image'];?>
                            <div class="gallery-col">
                        <img src="<?php echo URL.$single['image']; ?>" id="<?php echo $iid?>" onclick="swapImageP('<?php echo $iid?>')" width="100%" class="gallery-img">
                    </div>
                            <?php
                        }
                    } ?>

            </div>
                
            </div>
            <div class="col-2" style="text-align: center;">
            <h2 style="margin-top: 5px;"><?php echo $this->product[0]['product_name']?> </h2>
                <h4>LKR <?php echo $this->product[0]['product_price']?></h4>
                <form action="<?php echo URL;?>cart/addToCart" method="post">
                <label class="text-label">Select Color</label>
                <div class="colors">
                    <?php $single_colors = array();
                    foreach($this->product as $single){
                        if(in_array($single['colors'],$single_colors)){
                            continue;
                        }else{
                            $single_colors[] .= $single['colors'];?>
                            <label class="color-container">
                <input type="radio" name="color" value="<?php echo $single['colors']?>" required>
                <span class="checkmark" style="background-color: <?php echo $single['colors']?>"></span>
                </label>
                             <?php
                        }
                    } ?>
                   
                
                </div><br>
                <label class="text-label">Select Size</label>
                <div class="sizes">
                    <?php 
                    $catName = $this->product[0][1];
                    $single_sizes = array();
                    $single_sizes_gents = array('XS-G','S-G','M-G','L-G','XL-G');
                    $single_sizes_ladies = array('XS-W','S-W','M-W','L-W','XL-W');
                    if($catName!="Couple"){
                    foreach($this->product as $single){
                        if(in_array($single['sizes'],$single_sizes)){
                            continue;
                        }else{
                            $single_sizes[] .= $single['sizes'];?>
                            <label class="size-container">
                <input type="radio" name="size" value="<?php echo $single['sizes']?>" required>
                <span class="checkbox"><?php echo $single['sizes']?></span>

                </label>
                             <?php
                        }
                    } 
                }else{?>
                    <p>Gents Sizes:</p>
                    <br>
                    <?php  
                    foreach($this->product as $single){
                        if(in_array($single['sizes'],$single_sizes_ladies)){
                            continue;
                        }else{
                            $single_sizes_ladies[] .= $single['sizes'];?>
                            <label class="size-container">
                <input type="radio" name="size2" value="<?php echo $single['sizes']?>" required>
                <span class="checkbox"><?php echo rtrim($single['sizes'],"-G")?></span>

                </label>
                             <?php
                        }
                    }?>
                    <br>
                    <p>Ladies Sizes:</p>
                    <br>
                    <?php  
                    foreach($this->product as $single){
                        if(in_array($single['sizes'],$single_sizes_gents)){
                            continue;
                        }else{
                            $single_sizes_gents[] .= $single['sizes'];?>
                            <label class="size-container">
                <input type="radio" name="size1" value="<?php echo $single['sizes']?>" required>
                <span class="checkbox"><?php echo rtrim($single['sizes'],"-W")?></span>

                </label>
                             <?php
                        }
                    }
                    
                }?>
            
</div><br>
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
                    <input type="text" name="prod_id" value="<?php echo $this->product[0]['product_id']?>" hidden>
                    <input type="text" name="prev_url" value="<?php if(isset($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER'];}?>" hidden>
                    <button type="submit" class="btn">Add to Cart</a>
            </form>
            </div>
        </div>
        </div>
        <div class="row">
            
    </div>
    </div>