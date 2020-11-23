<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">History</h2><br>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list">
                       <tr>
                           <td><img src="<?php echo URL?>public/images/product-1.jpg"></td>
                           <td class="order-details"><h4>ORDER ID: ORD0001</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages">
                              <div class="oder-status">
                                <h5>Order Type: </h5>
                                <h5 style="color: #04CBE0"> Delivery</h5><br>
                              </div>
                              <div class="oder-date">
                                <h5>Delivered Date: </h5>
                                <h5 style="color: #04CBE0"> 24/05/2020</h5>
                              </div>
                            </td>
                           <td><a href="<?php echo URL;?>orders/historyDetails" class="btn table-btn">View Details</a></td>
                       </tr>
                       <tr>
                           <td><img src="public/images/product-2.jpg"></td>
                           <td class="order-details"><h4>ORDER ID: ORD0002</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages"><h4>Message </h4>
                            <h5>Message</h5>
                            <h5>message</h5></td>
                           <td><a href="<?php echo URL;?>orders/historyDetails" class="btn table-btn">View Details</a></td>
                       </tr>
                       <tr>
                           <td><img src="public/images/product-3.jpg"></td>
                           <td class="order-details"><h4>ORDER ID: ORD0003</h4>
                            <h5>Date: 10/05/2020</h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                            <td class="order-messages"><h4>Message </h4>
                            <h5>Message</h5>
                            <h5>message</h5></td>
                           <td><a href="<?php echo URL;?>orders/historyDetails" class="btn table-btn">View Details</a></td>
                       </tr>
                   </table>     
                    </div>

</div>

 </div>

<?php require 'views/footer_dashboard.php'; ?>