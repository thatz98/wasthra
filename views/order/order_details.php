<?php require 'views/header.php'; ?>


<div class="small-container">
    <div class="row">
        <h2 class="title">Order Details</h2><br>
    </div>
    <div class="row-top">
        <div class="col-2">
            <div class="box-container" >
                <h3>Items</h3>
                <table class="order-list order-items">
                <?php foreach($this->orderDetails as $details){?>
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
                            <h5><?php echo $product['product_price']?></h5>
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
                            <h5>Payment Method: <?php echo $this->payMethod[0][1]?></h5><br>
                        </div>
                        <div class="col-2" style="min-width: 0;">
                            <a href="#" class="btn">Request to Return</a>
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
                                    Date: 05/05/2020<br><br>
                                    Delivered By: FIrst Name Last Name<br>
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