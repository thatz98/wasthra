<?php require 'views/header_dashboard.php'; ?>

<?php require 'views/control_panel/delivery/update_order_status.php'; ?>
<?php require 'views/control_panel/delivery/update_payment_status.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Order Details</h2><br>
    </div>
    <div class="row-top">
        <div class="col-2">
            <div class="box-container">
                <h3>Items</h3>
                <?php $this->subtotal = 0.00; ?>
                <table class="order-list order-items">

                    <?php $subTotal = 0;
                    foreach ($this->orderItems as $item) {
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo URL . $item['image']; ?>" width="50px" height="50px">
                            </td>

                            <td class="order-details">
                                <h4><?php echo $item['product_name']; ?></h4>
                                <h5><?php $subTotal += $item['product_price'] * $item['item_qty'];
                                    echo $item['product_price'] ?></h5>
                                <?php ?>
                                <div class="item-input">
                                    <label>Color:</label><span class="color-dot" style="background-color: <?php echo $item['item_color'].';'; if($item['item_color']=='#fff' || $item['item_color']=='#fffff') echo 'border: 0.5px solid #000;'; ?>"></span>
                                    <label class="input-data">Size:<?php echo $item['item_size']; ?></label>
                                    <label class="input-data">Qty: <?php echo $item['item_qty']; ?></label>
                                </div>
                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="col-2">
            <div class="row">
                <div class="box-container">
                    <h3>Summary</h3>
                    <div class="summary-info">

                        <div class="row">

                            <div class="col-2" style="min-width: 0;">
                                <h4>Order ID:<?php echo $this->orderDetails['order_id']; ?></h4>
                                <h5>Date: <?php echo $this->orderDetails['date']; ?> Time: <?php echo $this->orderDetails['time']; ?></h5>
                                <h5>Payment Method:<?php echo $this->orderDetails['payment_method']; ?></h5>


                                <?php $status = $this->orderDetails['order_status'];
                                $color = '';
                                switch ($status) {
                                    case 'New':
                                        $color = '04CBE0';
                                        $status = 'New';
                                        break;
                                    case 'In Transit':
                                        $color = '18ea32';
                                        $status = 'In Transit';
                                        break;
                                    case 'Delivered':
                                        $color = 'd1af15';
                                        $status = 'Delivered';
                                        break;
                                    case 'Cancelled':
                                        $color = 'e22525';
                                        $status = 'Cancelled';
                                        break;
                                } ?>

                                <h5>Order Status: <span style="color: #<?php echo $color ?>"><?php echo $status ?></span></h5>

                                <?php $status = $this->orderDetails['payment_status'];
                                $color = '';
                                switch ($status) {
                                    case 'successfull':
                                        $color = 'd1af15';
                                        $status = 'successful';
                                        break;
                                    case 'pending':
                                        $color = '18ea32';
                                        $status = 'Pending';
                                        break;
                                } ?>
                                <h5>Payment Status: <span style="color: #<?php echo $color ?>"><?php echo $status ?></span></h5>
                                <h5>Comments:<?php echo $this->orderDetails['delivery_comment']; ?></h5>

                            </div>
                            <div class="col-2" style="min-width: 0;">
                                <div class="row">
                                    <a href="#updateOrderStatus" class="btn">Update Order Status</a>
                                </div>
                                <div class="row">
                                    <a href="#updatePaymentStatus" class="btn">Update Payment Status</a>
                                </div>

                            </div>
                            <div></div>

                        </div>

                    </div>
                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>LKR <?php echo number_format($subTotal, 2, '.', ''); ?></td>
                            </tr>
                            <tr>
                                <td>Delivery chargers</td>

                                <td>LKR <?php echo number_format($this->orderDetails['delivery_fee'], 2, '.', ''); ?></td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR <?php echo number_format($subTotal + $this->orderDetails['delivery_fee'], 2, '.', ''); ?></td>
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
                                    <?php echo $this->orderDetails['customer_first_name']; ?> <?php echo $this->orderDetails['customer_last_name']; ?><br>
                                    <?php echo $this->orderDetails['address_line_1']; ?><br>
                                    <?php echo $this->orderDetails['address_line_2']; ?><br>
                                    <?php echo $this->orderDetails['address_line_3']; ?><br>
                                    <?php echo $this->orderDetails['city']; ?><br>
                                    <?php echo $this->orderDetails['postal_code']; ?><br>
                                    <?php echo $this->orderDetails['customer_phone']; ?>
                                </label>
                            </div>
                            <div class="col-2" style="min-width: 0;">
                                <label class="address">
                                    Expected Delivery Date: <?php echo $this->orderDetails['expected_delivery_date']; ?><br><br>
                                    Assinged deliver: <?php echo Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name']; ?><br>
                                </label>
                                <a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $this->orderDetails['latitude'] . ',' . $this->orderDetails['longitude']; ?>" class="btn">Use Maps</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'views/footer.php'; ?>