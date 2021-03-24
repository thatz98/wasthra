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
                    foreach($this->orderItems as $item){$this->productname=''; ?>
                    <tr>
                        
                        <td><img src="<?php echo URL.$item['image']?>"></td>
                        <td class="order-details">
                         
                            <h4>
                                <?php  echo $item['product_name'];?>
                            </h4>
                            <h5><?php $subTotal+=$item['product_price']*$item['item_qty']; 
                                    echo $item['product_price']?></h5>
                                <?php ?>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $item['item_color']?>"></span>
                                <label class="input-data">Size: <?php echo $item['item_size']?></label>
                                <label class="input-data">Qty: <?php echo $item['item_qty']?></label>
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
                            <h4>Order ID: <?php echo($this->orderDetails['order_id'])?></h4>
                            <h5>Date: <?php echo($this->orderDetails['date'])?>    Time: <?php echo($this->orderDetails['time'])?></h5>
                            <h5>Payment Method: <?php 
                            if($this->orderDetails['payment_method']=='cashOnDelivery'){
                                echo 'Cash On Delivery';
                            }
                            else{
                                echo 'Online';
                            }?></h5>
                            <h5>Payment Status: <?php echo $this->orderDetails['payment_status']?></h5>
                            
                            <?php $status=$this->orderDetails['order_status']; $color='';
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
                               <div class="row">
                               <a href="#updateOrderStatus" class="btn">Update Status</a>
                               </div>
                               <div class="row">
                               <a href="<?php echo URL;?>report/generateInvoice/<?php echo $this->orderDetails['order_id'];?>" class="btn">Generate Invoice</a>
                               </div>
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
                                <td>LKR <?php echo number_format($this->orderDetails['delivery_fee'],2,'.','');?></td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR <?php echo number_format($subTotal+$this->orderDetails['delivery_fee'],2,'.','');?></td>
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
                                    <?php echo $this->orderDetails['address_line_1']?><br>
                                    <?php echo $this->orderDetails['address_line_2']?><br>
                                    <?php echo $this->orderDetails['address_line_3']?><br>
                                    City :<?php echo $this->orderDetails['city']?><br>
                                    Postal Code :<?php echo $this->orderDetails['postal_code']?>
                                </label>
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                    <label class="address">
                                    Expected Delivery Date: <?php 
                                                                   if($this->orderDetails['delivery_id']!=NULL){
                                                                         echo $this->orderDetails['expected_delivery_date'];
                                                                    }else{?>
                                                                         Not Set 
                                                                    <?php }?>
                                                                               <br><br>
                                   
                                <?php  
                                         if($this->orderDetails['delivery_id']!=NULL){ ?>
                                   
                                    Assiged deliver: <?php echo $this->orderDetails['first_name'].' '.$this->orderDetails['last_name']?><br>
                                <?php }
                                        else{?>
                                    Assiged deliver: Not Set<br>  
                                <?php }?>
                                
                                </label>
                              <?php  if($this->orderDetails['delivery_id']==NULL){ ?>
                                <a href="#assignDeliverySraff" class="btn">Assign Delivery</a>
                                <?php } else{?>
                                <a href="?update=true#assignDeliverySraff" class="btn">Re-assign Delivery</a>
                              <?php  }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php require 'views/footer.php'; ?>























                            