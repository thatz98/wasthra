<link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/bag_dropdown.css">
<div id="transparent-overlay" style="display: none;">
<div class="cart-drop-container" id="cart-drop-container" style="display: none;" onclick="closeOverlay()" >
  <div class="shopping-cart">
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">3</span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span id=""><?php echo number_format($this->subtotal,2,'.','');?></span>
      </div>
    </div> <!--end shopping-cart-header -->

  <ul class="shopping-cart-items">
      <!-- <li class="clearfix">
        <img src="<?php ; ?>public/images/product-1.jpg" alt="item1" />
        <span class="item-name">Sony DSC-RX100M III</span>
        <span class="item-price">$849.99</span>
        <span class="item-quantity">Qty: 01</span>
      </li>

      <li class="clearfix">
        <img src="<?php ; ?>public/images/product-2.jpg" alt="item1" />
        <span class="item-name">KS Automatic Mechanic...</span>
        <span class="item-price">$1,249.99</span>
        <span class="item-quantity">Qty: 01</span>
      </li>

      <li class="clearfix">
        <img src="<?php ; ?>public/images/product-3.jpg" alt="item1" />
        <span class="item-name">Kindle, 6" Glare-Free To...</span>
        <span class="item-price">$129.99</span>
        <span class="item-quantity">Qty: 01</span>
      </li>
  -->
      <?php 
      $this->subtotal=0.00;   
      foreach ( Session::get('cartData') as $cartDetails ): ?>
        <li class="clearfix">
        
                      <?php foreach ($this->imageList as $image){
                        if($cartDetails['product_id']==$image['product_id']){?>
                            <img src="<?php echo URL.$image['image']?>" width="50px" height="50px">
                            <?php 
                            break;
                        }
                        }?>
               <span class="item-name">
                       <?php 
                               $this->productPrice=0.00;
                               
                               foreach ($this->qtyList as $qty){
                                if($qty['product_id']==$cartDetails['product_id']){
                                    $this->productPrice=$qty['product_price'];
                                    echo $qty['product_name'];
                                }
                            } 
            
                          //       foreach ($this->qtyList as $catName){
                          //          // if($priceCategoryID==$catName['price_category_id']){
                          //               $this->productPrice=$catName['product_price'];
                          //           }
                          // //  }
                            ?>
                </span>           
                        <div>
                            <span class="item-price">LKR <span id="item-price"><?php echo $this->productPrice;?></span></span>                      
                            <span class="item-quantity">Qty:<span id="item-qty"> <?php echo $cartDetails['item_qty']; ?></span></span>
                        </div>    
        </li>
      <?php
            
             $this->subtotal+=($cartDetails['item_qty']*$this->productPrice);

    endforeach;?>
  </ul>

<div class="row" style="margin: 0;">
  <a href="<?php echo URL;?>cart" class="btn drop-btn">View Cart</a>
  <a href="<?php echo URL;?>checkout" class="btn drop-btn">Checkout</a>
</div>
    
  </div> <!--end shopping-cart -->
</div>
</div>

<script type="text/javascript">
  function bagDown(){
   var container = document.getElementById("cart-drop-container");
   var overlay = document.getElementById("transparent-overlay");

   if(container.style.display === "none"){
    container.style.display = "inline-block";
    overlay.style.display = "inline";
   } else{
    container.style.display = "none";
    overlay.style.display = "none";
   }
 }

 function closeOverlay(){
  bagDown();
 }


 </script>