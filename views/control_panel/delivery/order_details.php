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
                <table class="order-list order-items">
                     
                    <tr>
                    <td>
                    <?php foreach ($this->product_Image as $getImage):?>
                        <img src="<?php echo URL.$getImage['image'] ?>> 
                    <?php endforeach;?> 
                    </td> 
                    <?php foreach ($this->orderDetails as $order_Details):?>  
                        <td class="order-details">
                            <h4>Red Colored Curve Neck</h4>
                            <h5>LKR 800.00</h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color:<?php echo $order_Details['item_color']; ?>"></span>
                                <label class="input-data">Size:<?php echo $order_Details['item_size']; ?></label>
                                <label class="input-data">Qty: <?php echo $order_Details['item_qty']; ?></label>
                            </div>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                
                    <!-- <tr>
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
                    </tr>
                    <tr>
                        <td><img src="<?php  ?>public/images/products/product_img_5.jpg"></td>
                        <td class="order-details">
                            <h4>Red Colored Curve Neck</h4>
                            <h5>LKR 800.00</h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: #59FF37"></span>
                                <label class="input-data">Size: M</label>
                                <label class="input-data">Qty: 1</label>
                            </div>
                        </td>
                    </tr> -->
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
                            <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"><?php echo $summary_details['order_status']; ?></h5>
                              </div>
                               <?php endforeach; ?>
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
                                    Assiged deliver: Not set<br>
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