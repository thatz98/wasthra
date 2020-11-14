<div id="updateCartPopup" class="overlay">
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
                        <img src="<?php echo URL.$image['image']?>" id="<?php echo $iid?>"
                            onclick="swapImage('<?php echo $iid?>')" width="100%" class="gallery-img">
                    </div>
                    <?php 
                        }
                        
                    }?>


                </div>
                <h2 style="margin-top: 5px;"><?php echo $this->productPopup['product_name']?></h2>
                <h4>LKR <?php echo $this->productPopup['product_price']?></h4>
            </div>
            <div class="col-2" style="text-align: center;">
                <form action="<?php echo URL; ?>cart/updateCartItem/<?php echo $_GET['item'];?>" method="post">
                    <label class="text-label">Select Color</label>
                    <div class="colors">
                        <?php foreach ($this->colorList as $color){
                        if($this->productPopup['product_id']==$color['product_id']){?>
                        <label class="color-container">
                            <?php if($color['colors']=='#'.$_GET['color']){
                                echo '<input type="radio" name="color" value="'.$color['colors'].'" checked>
                            <span class="checkmark" style="background-color:'.$color['colors'].'"></span>';
                            } else{
                                echo '<input type="radio" name="color" value="'.$color['colors'].'">
                            <span class="checkmark" style="background-color:'.$color['colors'].'"></span>';
                          }?>
                        </label>
                        <?php }
                    } ?>
                    </div><br>



                    <?php
                        $single_sizes_gents = array('XS-G','S-G','M-G','L-G','XL-G');
                        $single_sizes_ladies = array('XS-W','S-W','M-W','L-W','XL-W');
                        $catName=$this->productPopup['name']; 
                        if($catName!="Couple"){?>
                    <label class="text-label">Select Size</label><br>
                    <div class="sizes">
                        <?php foreach ($this->sizeList as $size){
                        if($this->productPopup['product_id']==$size['product_id']){

                        if($_GET['size']==$size['sizes']){
                                    echo '<label class="size-container"><input type="radio" name="size" value="'.$size['sizes'].'" checked>';
                                } else{
                                    echo '<label class="size-container"><input type="radio" name="size" value="'.$size['sizes'].'">';
                                }?>

                        <span class="checkbox"><?php echo $size['sizes']?></span>
                        </label>
                        <?php
                        }
                    }?>
                    </div>
                    <?php 
                }else{?>
                    <label class="text-label">Select Size for Gent</label>
                    <br>
                    <div class="sizes">
                        <?php
                    
                    foreach ($this->sizeList as $size){
                        $trimSize=rtrim($size['sizes'],"-G");
                        if($this->productPopup['product_id']==$size['product_id']){
                            if(in_array($size['sizes'],$single_sizes_gents)){
                        
                             if(strpos($_GET['size'],$size['sizes'])!==false){
                                    
<<<<<<< Updated upstream
                                    echo '<label class="size-container"><input type="radio" name="size2" value="'.$trimSize.'" checked>';
                                } else{
                                    echo '<label class="size-container"><input type="radio" name="size2" value="'.$trimSize.'">';
=======
                                    echo '<input type="radio" name="size2" value="'.$size['sizes'].'" checked>';
                                } else{
                                    echo '<input type="radio" name="size2" value="'.$size['sizes'].'">';
>>>>>>> Stashed changes
                                }?>

                            <span class="checkbox"><?php echo $trimSize?></span>
                        </label>
                        <?php
                            }
                        }
                    }?>
<br><br><br>
                        <label class="text-label">Select Size for Lady</label>
                        <br>
                        <div class="sizes">
                            <?php
                    
                    foreach ($this->sizeList as $size){
                        $trimSize=rtrim($size['sizes'],"-W");
                        if($this->productPopup['product_id']==$size['product_id']){
                            if(in_array($size['sizes'],$single_sizes_ladies)){
                                if(strpos($_GET['size'],$size['sizes'])!==false){
                                    
<<<<<<< Updated upstream
                                    echo '<label class="size-container"><input type="radio" name="size1" value="'.$trimSize.'" checked>';
                                } else{
                                    echo '<label class="size-container"><input type="radio" name="size1" value="'.$trimSize.'">';
=======
                                    echo '<input type="radio" name="size1" value="'.$size['sizes'].'" checked>';
                                } else{
                                    echo '<input type="radio" name="size1" value="'.$size['sizes'].'">';
>>>>>>> Stashed changes
                                }?>

                                <span class="checkbox"><?php echo $trimSize?></span>
                            </label>
                            <?php
                            }
                        }
                    }?>
                        </div>
                    </div>
                        <?php



                    }?>

                    <br>
                    <label class="text-label">Select Quantity</label>
                    <div class="quantity">
                        <span class="qty-minus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                class="fa fa-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity"
                            value="<?php echo $_GET['qty'];?>">
                        <span class="qty-plus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" name="prod_id" value="<?php echo $this->productPopup['product_id']?>" hidden>
                    <button type="submit" class="btn">Update</button>

                </form>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>