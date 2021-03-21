<?php require 'views/header_dashboard.php'; ?>

<?php require 'views/control_panel/delivery/update_status.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Order Details</h2><br>
    </div>
    <div class="row-top">
        <div class="col-2">
            <div class="box-container" >
                <h3>Items</h3>
                <?php $this->subtotal=0.00;?>
                <table class="order-list order-items">

                <?php $subTotal=0; 
                    foreach($this->orderInfo as $details){$this->productname=''; 
                        $subTotal+=$details['product_price']*$details['item_qty'];
                        ?>

                <?php foreach ($this->allInfo as $order_Details):?>
                    <tr>
                     <td>
                       <img src="<?php echo URL.$order_Details['image'];?>" width="50px" height="50px">
                     </td>
                     
                        <td class="order-details">
                            <h4><?php echo $order_Details['product_name'];?></h4>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $order_Details['item_color']; ?>"></span>
                                <label class="input-data">Size:<?php echo $order_Details['item_size']; ?></label>
                                <label class="input-data">Qty: <?php echo $order_Details['item_qty']; ?></label>
                            </div>
                        </td>
                        
                    </tr>
                    <?php endforeach; ?>
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
                            <?php foreach ($this->order_Summary as $summary_details): ?>
                             <h4>Order ID:<?php echo $summary_details['order_id']; ?></h4>
                             <h5>Date: <?php echo $summary_details['date']; ?>   Time: <?php echo $summary_details['time']; ?></h5>
                             <h5>Payment Method:<?php echo $summary_details['payment_method']; ?></h5>
                            
                            
                             <?php $status=$this->orderDetails[0]['order_status']; $color='';
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
                                    case 'Cancelled':
                                        $color='e22525';
                                        $status='Cancelled';
                                        break;    
                                    }?>

                                    <h5>Order Status: <span style="color: #<?php echo $color?>"><?php echo $status?></span></h5>
                                        
                               <!-- <?php endforeach; ?> -->
                        </div>
                        <div class="col-2" style="min-width: 0;">
                            <a href="#updateStatus" class="btn">Update Status</a>
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
                                <?php foreach ($this->deliveryInfo as $delivery_Info):?>
                                <label class="address">
                                    To:<br>
                                    <?php echo $delivery_Info['first_name']; ?> <?php echo $delivery_Info['last_name']; ?><br>
                                    <?php echo $delivery_Info['address_line_1']; ?><br>
                                    <?php echo $delivery_Info['address_line_2']; ?><br>
                                    <?php echo $delivery_Info['address_line_3']; ?><br>
                                    <?php echo $delivery_Info['city']; ?><br>
                                    <?php echo $delivery_Info['postal_code']; ?>
                                </label>
                            <?php endforeach; ?>
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                    <label class="address">
                                    Expected Delivery Date: 05/05/2020<br><br>
                                    Assinged deliver: Not set<br>
                                </label>
                                <a href="#" class="btn">Use Maps</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'views/footer.php'; ?>