<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Assigned Orders</h2><br>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list">
                   
                    <?php if(empty($this->orderList)){echo "No Assigned Orders";}
                          else
                          { 
                            foreach ($this->orderList as $order): ?>
                       <tr>
                           
                           <td class="order-details"><h4>ORDER ID:<?php echo $order['order_id']; ?></h4>
                            <h5>Date: <?php echo $order['date']; ?></h5>
                            </td>
                            <td class="order-messages">
                              <div class="oder-status">
                                <h5>Order Type: </h5>
                                <h5 style="color: #04CBE0"> Delivery</h5><br>
                              </div>
                              <div class="oder-date">
                                <h5>Expected Delivery Date: </h5>
                                <h5 style="color: #04CBE0"><?php echo $order['expected_delivery_date'] ; ?> </h5>
                              </div>
                            </td>
                           <td><a href="<?php echo URL;?>orders/assignedOrderDetails/<?php echo $order['order_id']; ?>" class="btn table-btn">View Order</a></td>
                       </tr>
                       <?php endforeach;} ?>
                   </table>     
                    </div>

</div>

 </div>

<?php require 'views/footer_dashboard.php'; ?>