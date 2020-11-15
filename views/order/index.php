<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">My Orders</h2><br>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list" style="min-width: 70%">
                       <tr>
                           <td class="order-details"><h4>ORDER ID: ORD0001</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                           <td> <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> New</h5>
                              </div>
                            </td>
                            
                           <td><a href="<?php echo URL;?>orders/myOrderDetails" class="btn table-btn">View Order</a></td>
                       </tr>
                       <tr>
                           <td class="order-details"><h4>ORDER ID: ORD0002</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5>
                            </td>
                           <td> <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> New</h5>
                              </div>
                            </td>
                           <td><a href="<?php echo URL;?>orders/myOrderDetails" class="btn table-btn">View Order</a></td>
                       </tr>
                       <tr>
                           <td class="order-details"><h4>ORDER ID: ORD0003</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5>
                            </td>
                           <td> <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> New</h5>
                              </div>
                            </td>
                           <td><a href="<?php echo URL;?>orders/myOrderDetails" class="btn table-btn">View Order</a></td>
                       </tr>
                   </table>     
                    </div>

</div>

 </div>

<?php require 'views/footer.php'; ?>