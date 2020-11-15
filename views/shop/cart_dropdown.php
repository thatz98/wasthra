<link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/bag_dropdown.css">
<div id="transparent-overlay" style="display: none;" onclick="closeOverlay()">
</div>
<div class="cart-drop-container" id="cart-drop-container" style="display: none;" >
  <div class="shopping-cart">
    <div class="row" style="display: block;">
      
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-bag cart-icon"></i>

      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span id="total-display"></span>

      </div>
      </div>
    </div> <!--end shopping-cart-header -->

  <ul class="shopping-cart-items" style="max-height: 320px;overflow-y: auto;">
      
      <?php if((Session::get('cartCount'))){
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
<input id="totalPriceValue" value="<?php echo 'LKR '.number_format($this->subtotal,2,'.','');?>" hidden>
<div class="row" style="margin: 0;">
  <a href="<?php echo URL;?>cart" class="btn drop-btn">View Cart</a>
  <a href="<?php echo URL;?>checkout" class="btn drop-btn">Checkout</a>
</div>
  <?php } else{
    ?> <p> No items in the cart</p>
    <?php
  }?>
    
  </div> <!--end shopping-cart -->
</div>


<script type="text/javascript">

$(document).ready(function() {
  $("#total-display").text($("#totalPriceValue").val());
    });

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