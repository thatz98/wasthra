<div id="addToCartPopupIndex" class="overlay">
    <?php if (isset($_GET['id'])){
                foreach($this->qtyList as $qty){
                    if($qty['product_id']==$_GET['id']){
                        $this->productPopup = array_slice($qty, 0,count($qty));
                        break;
                    }
    }
} ?>
    <div class="popup" style="padding:30px;">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">

                <?php foreach ($this->imageList as $image){
                        if($this->productPopup['product_id']==$image['product_id']){?>
                <img src="<?php echo URL.$image['image']?>" id="product-img">
                <?php
                            break; 
                        }
                    }?>
                <div class="gallery-row">
                    <?php $single_images = array();
                        $iid=0;
                        foreach ($this->imageList as $image){
                            if(in_array($image['image'],$single_images)){
                                continue;
                            }else if($this->productPopup['product_id']==$image['product_id']){
                                    $single_images[] .= $image['image'];
                            $iid += 1;?>
                    <div class="gallery-col">
                        <img src="<?php echo URL.$image['image']?>" id="<?php echo $iid?>"
                            onclick="swapImage('<?php echo $iid?>')" width="100%" class="gallery-img">
                    </div>
                    <?php 
                        }
                        
                    }?>


                </div>

            </div>
            <div class="col-2" style="text-align: center;">
                <h2 style="margin-top: 5px;"><?php echo $this->productPopup['product_name']?></h2>
                <h4>LKR <?php echo $this->productPopup['product_price']?></h4><br>
                <form action="<?php echo URL; ?>cart/addToCart" method="post" id="addToCartForm">
                    <label class="text-label">Select Color</label>
                    <div class="colors">
                        <?php foreach ($this->colorList as $color){
                        if($this->productPopup['product_id']==$color['product_id']){?>
                        <label class="color-container">
                            <input type="radio" name="color" value="<?php echo $color['colors']?>" required>
                            <span class="checkmark" style="background-color: <?php echo $color['colors']?>"></span>
                        </label>
                        <?php }
                    } ?>
                    </div><br>
                    <label class="text-label">Select Size</label>
                    <div class="sizes">
                        <?php 
                        $catName=$this->productPopup['name'];
                        $single_sizes_gents = array('XS-G','S-G','M-G','L-G','XL-G');
                        $single_sizes_ladies = array('XS-W','S-W','M-W','L-W','XL-W');
                        if($catName!="Couple"){
                            foreach ($this->sizeList as $size){
                                
                            if($this->productPopup['product_id']==$size['product_id']){?>
                            <label class="size-container">
                                <input type="radio" name="size" value="<?php echo $size['sizes']?>" required>
                                <span class="checkbox"><?php echo $size['sizes']?></span>
                            </label>
                            <?php
                            }
                        } 
                    }else{?>
                        <p>Gents Sizes:</p>
                        <br>
                        <?php  

                        foreach ($this->sizeList as $size){
                        
                            if($this->productPopup['product_id']==$size['product_id']){
                                if(in_array($size['sizes'],$single_sizes_gents)){?>
                            <label class="size-container">
                                <input type="radio" name="size1" value="<?php echo $size['sizes']?>" required>
                                <span class="checkbox"><?php echo rtrim($size['sizes'],"-G")?></span>
                            </label>
                            <?php
                            }
                        }
                        } 

                        ?>
                        <p>Ladies Sizes:</p>
                        <br>
                        <?php  

                        foreach ($this->sizeList as $size){
                        
                            if($this->productPopup['product_id']==$size['product_id']){
                                if(in_array($size['sizes'],$single_sizes_ladies)){?>
                            <label class="size-container">
                                <input type="radio" name="size2" value="<?php echo $size['sizes']?>" required>
                                <span class="checkbox"><?php echo rtrim($size['sizes'],"-W")?></span>
                            </label>
                            <?php
                            }
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
                    <input type="text" name="screen-size" id="screensize" hidden>
                    <input type="text" name="prod_id" value="<?php echo $this->productPopup['product_id']?>" hidden>
                    <input type="text" name="prev_url" value="<?php if(isset($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER'];}?>" hidden>
                    <button type="submit" class="btn">Add to Cart</a>

                </form>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
