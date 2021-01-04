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
                                if ($product['product_id']==$details['product_id']){$product_id=$product['product_id'];?>
                            
                            <h4>
                                <?php echo $product['product_name']?>
                            </h4>
                            <h5><?php $subTotal+=$product['product_price']*$details['item_qty']; 
                                    echo $product['product_price']?></h5>
                                <?php }}?>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $details['item_color']?>"></span>
                                <label class="input-data">Size: <?php echo $details['item_size']?></label>
                                <label class="input-data">Qty: <?php echo $details['item_qty']?></label>
                            </div>
                            <div style='float: left;'>
                            <a href="<?php echo URL; ?>shop/submitReview/<?php echo $product_id?>" class="btn">Review Product</a>
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
                            
                            <?php $status=$this->orderList[0][3]; $color='';
                                switch($status){
                                    case 'New':
                                        $color='04CBE0';
                                        $status='New';
                                        break;
                                    case 'In Transit':
                                        $color='18ea32';
                                        $status='In Transit';
                                        break;
                                    case 'Delivered':
                                        $color='d1af15';
                                        $status='Delivered';
                                        break;
                                    case 'Delivery Failed':
                                        $color='31d115';
                                        $status='Delivery Failed';
                                        break;
                                    case 'Completed':
                                        $color='d115cb';
                                        $status='Completed';
                                        break;
                                    case 'Cancelled':
                                        $color='e22525';
                                        $status='Cancelled';
                                        break;
                                    case 'Returned':
                                        $color='0710de';
                                        $status='Returned';
                                        break;
                                    case 'Requested to Return':
                                        $color='de7207';
                                        $status='Requested to Return';
                                        break;
                                    case 'Requested to Cancel':
                                        $color='999b4f';
                                        $status='Requested to Cancel';
                                        break;
                                    case 'Processing':
                                        $color='b79ce7';
                                        $status='Processing';
                                        break;
                                    case 'Out for Delivery':
                                        $color='45d2b4';
                                        $status='Out for Delivery';
                                        break;}?>

                            <h5>Order Status: <span style="color: #<?php echo $color?>"><?php echo $status?></span></h5>
                            
                        </div>
                        <div class="col-2" style="min-width: 0;">
                        <?php if($this->orderList[0][3]=='New'){?>
                            <a href="#cancelOrder" class="btn">Request to Cancel</a>
                            <a href="#" class="btn">Track Order</a>
                            <?php } 
                            
                                elseif($this->orderList[0][3]=='Delivered'){?>
                                <a href="#requestReturn" class="btn">Request to Return</a>
                                <?php } 
                                
                                elseif($this->orderList[0][3]=='Completed'){?>
                                    <a href="#" class="btn">Track Order</a>
                                    <?php } 

                                else{?>
                                    <a href="#" class="btn">Track Order</a>
                                    <?php }?>

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
                                
                                <?php $fee=0;
                                    foreach ($this->deliveryCharges as $delivery){
                                        if($delivery['city']==$this->addressDetails[0][6]){
                                            $fee=$delivery['delivery_fee'];
                                            $subTotal+=$fee;
                                        }
                                    }?>
                                <td>LKR <?php echo number_format($fee,2,'.','');?></td>
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
                                    <?php if($this->orderList[0][3]=='Delivered' || $this->orderList[0][3]=='Delivered'){?>
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