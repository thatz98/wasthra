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

                <?php $this->subtotal=0.00;
                    foreach ($this->orderItems as $order_items ): ?>
                    <tr>

                        <td><?php foreach ($this->imageList as $image){
                              if($order_items['product_id']==$image['product_id']){?>
                                   <img src="<?php echo URL.$image['image']?>" width="50px" height="50px">
                            <?php 
                            break;
                          }
                         }?>
                        </td>

                       <td class="order-details">
                            <h4><?php 
                                $this->productPrice=0.00;
                                foreach ($this->qtyList as $qty){
                                    if($qty['product_id']==$order_items['product_id']){
                                        $this->productPrice=$qty['product_price'];
                                        echo $qty['product_name'];
                                    }
                                } 

                          ?>

                            </h4>  
                            <h5><?php echo $this->productPrice;?></h5>

                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: <?php echo $order_items['item_color']; ?>"></span>
                                <label class="input-data">Size: <?php echo $order_items['item_size']; ?></label>
                                <label class="input-data">Qty: <?php echo $order_items['item_qty']; ?></label>
                            </div>

                        </td>

                    </tr>

                   <?php $this->subtotal+=($order_items['item_qty']*$this->productPrice);
                   endforeach; ?>

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
                            <h4>Order ID: <?php echo $order_items['order_id']; ?> </h4>
                            <h5>Date: <?php echo $order_items['date']; ?>    Time: <?php echo $order_items['time']; ?> </h5>
                            <h5>Payment Method: <?php echo $this->payMethod[0][1]?></h5>
                            <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> New</h5>
                            </div>
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
                            <td>LKR <span id="subtotal"><?php echo number_format($this->subtotal,2,'.','');?></span></td>  
                            <div id="sub-display">
                            </div>
                        </tr>

                        <tr>
                         

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
                                    Assiged deliver: Not set<br>
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










<!-- <tr>
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
                    </tr>
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