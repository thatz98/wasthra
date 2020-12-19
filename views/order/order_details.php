<?php require 'views/header.php'; ?>
<?php require 'views/order/cancel_order_popup.php'; ?>
<?php require 'views/order/request_return_popup.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Order Details</h2><br>
    </div>
    <div class="row-top">
        <div class="col-2">
            <div class="box-container" >
                <h3>Items</h3>
                <table class="order-list order-items">
                <?php $subTotal=0;
                    foreach($this->orderDetails as $details){?>
                    <tr>
                        <?php foreach($this->imageList as $image){
                            if($image['product_id']==$details['product_id']){
                                $ordID='';
                                $ordID=$details['order_id']?>
                        <td><img src="<?php echo URL.$image['image']?>"></td><?php break;}}?>
                        <td class="order-details">
                        <?php foreach($this->qtyList as $product){
                                if ($product['product_id']==$details['product_id']){?>
                            
                            <h4>
                                <?php echo $product['price_category_name']?>
                            </h4>
                            <h5><?php $subTotal+=$product['product_price']*$details['item_qty']; 
                                    echo $product['product_price']?></h5>
                                <?php }}?>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $details['item_color']?>"></span>
                                <label class="input-data">Size: <?php echo $details['item_size']?></label>
                                <label class="input-data">Qty: <?php echo $details['item_qty']?></label>
                            </div>
                        </td>
                    </tr>
                <?php }?>

                </table>     
            </div>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="box-container" >
                    <h3>Summary</h3>
                    <div class="summary-info">
                        <div class="row">
                            <div class="col-2" style="min-width: 0;">
                            <h4>Order ID: <?php echo($this->orderList[0][0])?></h4>
                            <h5>Date: <?php echo($this->orderList[0][1])?>    Time: <?php echo($this->orderList[0][2])?></h5>
                            <h5>Payment Method: <?php if($this->payMethod[0][1]=='cashOnDelivery')echo 'Cash On Delivery';?></h5><br>
                            <h5>Order Status: </h5>
                            <h5 style="color: #04CBE0"> <?php echo $this->orderList[0][3]?></h5>
                        </div>
                        <div class="col-2" style="min-width: 0;">
                        <?php if($this->orderList[0][3]=='new'){?>
                            <a href="#cancelOrder" class="btn">Request to Cancel</a>
                            <?php } 
                            
                                elseif($this->orderList[0][3]=='delivered'){?>
                                <a href="#requestReturn" class="btn">Request to Return</a>
                                <?php } 
                                
                                else{}?>

                        </div>
                        </div>
                        
                    </div>
                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>LKR <?php echo number_format($subTotal,2,'.','');?></td>
                            </tr>
                            <tr>
                                <td>Delivery chargers</td>
                                <td>LKR -</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR <?php echo number_format($subTotal,2,'.','');?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box-container">
                    <div class="delivery-info">
                        <div class="row">
                            <h3>Delivery Info</h3>
                        </div>
                        <div class="row">
                            <div class="col-2" style="min-width: 0;">
                                <label class="address">
                                    To:<br>
                                    <?php echo Session::get('userData')['first_name']?> <?php echo Session::get('userData')['last_name']?><br>
                                    <?php echo $this->addressDetails[0][3]?><br>
                                    <?php echo $this->addressDetails[0][4]?><br>
                                    <?php echo $this->addressDetails[0][5]?><br>
                                    City :<?php echo $this->addressDetails[0][6]?><br>
                                    Postal Code :<?php echo $this->addressDetails[0][2]?>
                                </label>
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                    <label class="address">
                                    Delivery Staff Details<br>
                                    <?php $data=$this->deliveryDetails; 
                                    if(!empty($data)){?>
                                    <?php if($this->orderList[0][3]=='delivered'){?>
                                    Delivered Date: <?php echo $this->deliveryDetails[0][3]?><br><br>
                                    Delivered By: <?php echo $this->memberDetails[0][1]?> <?php echo $this->memberDetails[0][2]?><br>
                                    <?php } 
                                    
                                        else{?>
                                    Expected Delivery Date: <?php echo $this->deliveryDetails[0][4]?><br><br>
                                    Delivery Will Be Completed By: <?php echo $this->memberDetails[0][1]?> <?php echo $this->memberDetails[0][2]?><br>
                                    <?php }?>
                                    <?php }
                                    else{?>

                                    Expected Delivery Date: Not Set<br><br>
                                    Delivery Will Be Completed By: Not Assigned<br>
                                    
                                    <?php }?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>