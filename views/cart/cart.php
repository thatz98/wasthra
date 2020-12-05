<?php require 'views/header.php'; ?>
<?php require 'views/cart/editCart.php'; ?>
 
<div class="small-container">
    <div class="row">
        <h2 class="title">Cart</h2><br>
    </div>
    <div class="row-top"> 
        <div class="col-60p">
            <div class="box-container" >
                <table class="order-list">

                    <?php $this->subtotal=0.00;
                    foreach ($this->userCart as $cartDetails ): ?>
                    <tr>
                      <td><?php foreach ($this->imageList as $image){
                        if($cartDetails['product_id']==$image['product_id']){?>
                            <img src="<?php echo $image['image']?>" width="50px" height="50px">
                            <?php 
                            break;
                        }
                        }?></td>
                       <td class="order-details">
                            <h4><?php 
                                $this->productPrice=0.00;
                                foreach ($this->qtyList as $qty){
                                    if($qty['product_id']==$cartDetails['product_id']){
                                        $this->productPrice=$qty['product_price'];
                                        echo $qty['product_name'];
                                    }
                                } 

                            ?>
                            </h4>  
                            <h5><?php echo $this->productPrice;?></h5>     
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: <?php echo $cartDetails['item_color']; ?>"></span>
                                <label class="input-data">Size: <?php echo $cartDetails['item_size']; ?></label>
                                <label class="input-data">Qty: <?php echo $cartDetails['item_qty']; ?></label>
                            </div>
                        </td>

                        <td>
                            <a href="<?php echo '?id='.$cartDetails['product_id'].'&item='.$cartDetails['item_id'].'&color='.str_replace('#','',$cartDetails['item_color']).'&qty='.$cartDetails['item_qty'].'&size='.$cartDetails['item_size']?>#updateCartPopup" class="btn table-btn">Update</a>
                            <a href="<?php echo URL ?>cart/delete/<?php echo $cartDetails['item_id'] ?>" class="btn table-btn">Remove</a>
                        </td>
                    </tr>
                    
                    <?php $this->subtotal+=($cartDetails['item_qty']*$this->productPrice);
                endforeach;?>
                </table>     
            </div>
        </div>
        <div class="col-40p">
            <div class="row">
            <div class="box-container" >
                <div class="total-price">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td>LKR <span id="subtotal"><?php echo number_format($this->subtotal,2,'.','');?></span></td>  
                            <div id="sub-display">
                            </div>
                        </tr>
                        <tr>
                            <td>
                                <label style="font-size:11px;">Select the city to get the estimated delivery fee</label>
                            </td>
                            <td> 
                                <select style="padding: 5px;font-size:12px;background:transparent;" onchange="document.getElementById('dCharges').innerHTML=this.value;calculateDelivery();">
                                    <option value="0">Select</option>
                                <?php foreach($this->deliveryCharges as $deliveryCharges){?>
                                        <option value="<?php echo $deliveryCharges['delivery_fee'];?>"><?php echo $deliveryCharges['city'];?></option>
                                  <?php  }?>
                                </select>
                        
                        </td>
                        </tr>
                        <tr>
                            <td>Delivery chargers</td>
                            <td>LKR <span id="dCharges">-</span></td>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td>LKR <span id="totalPrice"><?php echo number_format($this->subtotal,2,'.','');?></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo URL;?>shop/checkout" class="btn">Proceed to Checkout >></a>
        </div>
        </div>
    </div>
</div>
<script>
    function calculateDelivery(){
        
        var dCharges = parseFloat(document.getElementById('dCharges').innerHTML);
        var subtotal = parseFloat(document.getElementById('subtotal').innerHTML);
        document.getElementById('totalPrice').innerHTML=(dCharges+subtotal).toFixed(2);
    }
</script>

<?php require 'views/footer.php'; ?>
  