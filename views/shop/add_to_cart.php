<div id="cart" class="overlay">
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL ?>public/images/product-1.jpg" id="product-img">
            <div class="gallery-row">
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-1.jpg" class="gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-2.jpg" class="gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-3.jpg" class="gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-4.jpg" class="gallery-img">
                    </div>

            </div>
                <h2 style="margin-top: 5px;">Red Printed T-Shirt by HRX </h2>
                <h4>LKR 800.00</h4>
            </div>
            <div class="col-2" style="text-align: center;">
                <form action="" method="post">
                <label class="text-label">Select Color</label>
                <div class="colors">
                   <label class="color-container">
                <input type="radio" name="color">
                <span class="checkmark" style="background-color: #59FF37"></span>
                </label>
                <label class="color-container">
                <input type="radio" name="color">
                <span class="checkmark" style="background-color: #3D5BF2"></span>
                </label>
                <label class="color-container">
                <input type="radio" name="color">
                <span class="checkmark" style="background-color: #F23DE5"></span>
                </label> 
                </div><br>
                <label class="text-label">Select Size</label>
                <div class="sizes">
                <label class="size-container">
                <input type="radio" name="size">
                <span class="checkbox">S</span>
                </label>
                <label class="size-container">
                <input type="radio" name="size">
                <span class="checkbox">M</span>
                </label>
                <label class="size-container">
                <input type="radio" name="size">
                <span class="checkbox">L</span>
                </label>
</div><br>
                <label class="text-label">Select Quantity</label>
                <div class="quantity">
                                                <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="1">
                                                <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>

                <button type="submit" class="btn">Add to Cart</button>
            </form>
            </div>
        </div>
        </div>
        <div class="row">
            
    </div>
    </div>
