<div id="updateCartPopup" class="overlay" >
  <?php if (isset($_GET['id'])){
                foreach($this->qtyList as $qty){
                    if($qty['product_id']==$_GET['id']){
                        $this->productPopup = array_slice($qty, 0,count($qty));
                        break;
                    }
    }
} ?> 
    <div class="popup" style="max-width: 50%; padding:30px;">
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
                            <img src="<?php echo URL.$image['image']?>" id="<?php echo $iid?>" onclick="swapImage('<?php echo $iid?>')" width="100%" class="gallery-img">
                            </div>
                            <?php 
                        }
                        
                    }?>


            </div>
                <h2 style="margin-top: 5px;"><?php echo $this->productPopup['product_name']?></h2>
                <h4>LKR <?php echo $this->productPopup['product_price']?></h4>
            </div>
            <div class="col-2" style="text-align: center;">
                <form action="<?php echo URL; ?>cart/addToCart" method="post">
                <label class="text-label">Select Color</label>
                <div class="colors">
                    <?php foreach ($this->colorList as $color){
                        if($this->productPopup['product_id']==$color['product_id']){?>
                            <label class="color-container">
                            <input type="radio" name="color" value="<?php echo $color['colors']?>">
                            <span class="checkmark" style="background-color: <?php echo $color['colors']?>"></span>
                            </label>
                        <?php }
                    } ?>
                </div><br>
                <label class="text-label">Select Size</label>
                <div class="sizes">
                    <?php foreach ($this->sizeList as $size){
                        if($this->productPopup['product_id']==$size['product_id']){?>
                            <label class="size-container">
                <input type="radio" name="size" value="<?php echo $size['sizes']?>">
                <span class="checkbox"><?php echo $size['sizes']?></span>
                </label>
                             <?php
                        }
                    } ?>
            
</div><br>
                <label class="text-label">Select Quantity</label>
                <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="1">
                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>

                <button type="submit" class="btn">Update</button>
                <input type="text" name="prod_id" value="<?php echo $this->productPopup['product_id']?>" style="display:none">
            </form>
            </div>
        </div>
        </div>
        <div class="row">
            
    </div>
    </div>




