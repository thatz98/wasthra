<?php require 'views/header.php'; ?>
<?php require 'views/order/cancel_order_popup.php'; ?>
<?php require 'views/order/request_return_popup.php'; ?>
<?php require 'views/order/addReview.php'; ?>

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
                    foreach($this->orderDetails as $details){$this->productname=''; ?>
                    <tr>
                        
                        <td><img src="<?php echo URL.$details['image']?>"></td>
                        <td class="order-details">
                         
                            <h4>
                                <?php  echo $details['product_name'];?>
                            </h4>

                            <h5><?php $subTotal+=$details['product_price']*$details['item_qty']; 
                                    echo $details['product_price']?>
                            </h5>

                                <?php ?>
                            
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $details['item_color']?>"></span>
                                <label class="input-data">Size: <?php echo $details['item_size']?></label>
                                <label class="input-data">Qty: <?php echo $details['item_qty']?></label>
                            </div>
                            
                            <div style='float: left;'>
                                <?php if($this->allDetails[0][3]=='Completed' || $this->allDetails[0][3]=='Returned'){?>
                                <a href="<?php echo '?id='.$details['product_id']?>#addReview" class="btn">Review Product</a>
                                <?php }?>
                            
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
                            <h4>Order ID: <?php echo($this->allDetails[0][0])?></h4>
                            <h5>Date: <?php echo($this->allDetails[0][1])?>    Time: <?php echo($this->allDetails[0][2])?></h5>
                            <h5>Payment Method: <?php 
                            if($this->allDetails[0][4]=='cashOnDelivery'){
                                echo 'Cash On Delivery';
                            }
                            else{
                                echo 'Online';
                            }?></h5>
                            <h5>Payment Status: <?php echo $this->allDetails[0][5]?></h5>
                            
                            <?php $status=$this->allDetails[0][3]; $color='';
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
                        <?php if($this->allDetails[0][3]=='New'){?>
                            <a href="#cancelOrder" class="btn">Request to Cancel</a>
                            <a href="<?php echo URL.'orders/trackMyOrder/'.$this->allDetails[0][0]?>" class="btn">Track Order</a>
                            <?php } 
                            
                                elseif($this->allDetails[0][3]=='Delivered'){?>
                                <a href="#requestReturn" class="btn">Request to Return</a>
                                <?php } 
                                
                                elseif($this->allDetails[0][3]=='Completed'){?>
                                    <a href="<?php echo URL.'orders/trackMyOrder/'.$this->allDetails[0][0]?>" class="btn">Track Order</a>
                                    <?php } 

                                else{?>
                                    <a href="<?php echo URL.'orders/trackMyOrder/'.$this->allDetails[0][0]?>" class="btn">Track Order</a>
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
                                        if($delivery['city']==$this->allDetails[0][11]){
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
                                    <?php echo $this->allDetails[0][7]?><br>
                                    <?php echo $this->allDetails[0][8]?><br>
                                    <?php echo $this->allDetails[0][9]?><br>
                                    City :<?php echo $this->allDetails[0][11]?><br>
                                    Postal Code :<?php echo $this->allDetails[0][10]?>
                                </label>
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                    <label class="address">
                                    Delivery Staff Details<br>
                                    <?php $data=$this->allDetails[0][14]; 
                                    if(!empty($data)){?>
                                    <?php if($this->allDetails[0][3]=='Delivered' || $this->allDetails[0][3]=='Delivered'){?>
                                    Delivered Date: <?php echo $this->allDetails[0][12]?><br><br>
                                    Delivered By: <?php echo $this->allDetails[0][15]?> <?php echo $this->allDetails[0][16]?><br>
                                    <?php } 
                                    
                                        else{?>
                                    Expected Delivery Date: <?php echo $this->allDetails[0][13]?><br><br>
                                    Delivery Will Be Completed By: <?php echo $this->allDetails[0][15]?> <?php echo $this->allDetails[0][16]?><br>
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
