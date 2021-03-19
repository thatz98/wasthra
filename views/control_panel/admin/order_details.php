<?php require 'views/header_dashboard.php'; ?>
<?php require 'views/control_panel/admin/order_status_popup.php'; ?>
<?php require 'views/control_panel/admin/assign_delivery_popup.php'; ?>
<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Order Details</h2><br>
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
                                    echo $details['product_price']?></h5>
                                <?php ?>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $details['item_color']?>"></span>
                                <label class="input-data">Size: <?php echo $details['item_size']?></label>
                                <label class="input-data">Qty: <?php echo $details['item_qty']?></label>
                            </div>
                            
                            <div style='float: left;'>
                                <?php if($this->allDetails[0][3]=='Completed' || $this->allDetails[0][3]=='Returned'){?>
                                <a href="<?php echo '?id='.$product_id?>#addReview" class="btn">Review Product</a>
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
                               <a href="#updateOrderStatus" class="btn">Update Status</a>
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
                                    <?php echo $this->customerDetails[0][2] ?> <?php echo $this->customerDetails[0][3] ?><br>
                                    <?php echo $this->addressDetails[0][3]?><br>
                                    <?php echo $this->addressDetails[0][4]?><br>
                                    <?php echo $this->addressDetails[0][5]?><br>
                                    City :<?php echo $this->addressDetails[0][6]?><br>
                                    Postal Code :<?php echo $this->addressDetails[0][2]?>

                                </label>
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                    <label class="address">
                                    Expected Delivery Date: 05/05/2020<br><br>
                                   
                                <?php $data=$this->deliveryDetails; 
                                         if(!empty($data)){ ?>
                                   
                                    Assiged deliver: <?php echo $this->memberDetails[0][1]?> <?php echo $this->memberDetails[0][2]?><br>
                                <?php }
                                        else{?>
                                    Assiged deliver: Not Set<br>  
                                <?php }?>
                                
                                </label>
                                <a href="#assignDeliverySraff" class="btn">Assign Delivery</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>










<!-- 
                    <tr>
                        <td><img src="<?php  ?>public/images/products/product_img_4.jpg"></td>
                        <td class="order-details">
                            <h4>Red Colored Curve Neck</h4>
                            <h5>LKR 800.00</h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: #59FF37"></span>
                                <label class="input-data">Size: M</label>
                                <label class="input-data">Qty: 1</label>
                            </div>
                        </td>


                            <tr>
                                <td>Subtotal</td>
                                <td>LKR 2400.00</td>
                            </tr>
                            <tr>
                                <td>Delivery chargers</td>
                                <td>LKR 2400.00</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR 2400.00</td>
                            </tr>








                            