<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Assigned Orders</h2><br>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list">
                    <?php foreach ($this->orderList as $order_list): ?>
                       <tr>
                           <td><img src="<?php echo URL?>public/images/product-1.jpg"></td>
                           <td class="order-details"><h4>ORDER ID:<?php echo $order_list['order_id']; ?></h4>
                            <h5>Date: <?php echo $order_list['date']; ?></h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages">
                              <div class="oder-status">
                                <h5>Order Type: </h5>
                                <h5 style="color: #04CBE0"> Delivery</h5><br>
                              </div>
                              <div class="oder-date">
                                <h5>Expected Delivery Date: </h5>
                                <h5 style="color: #04CBE0"><?php echo $order_list['expected_delivery_date'] ; ?> </h5>
                              </div>
                            </td>
                           <td><a href="<?php echo URL;?>orders/assignedOrderDetails/<?php echo $order_list['order_id']; ?>" class="btn table-btn">View Order</a></td>
                       </tr>
                       <?php endforeach; ?>
                   </table>     
                    </div>

</div>

 </div>

<?php require 'views/footer_dashboard.php'; ?>