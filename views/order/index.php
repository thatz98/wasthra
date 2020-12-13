<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">My Orders</h2><br>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list" style="min-width: 70%">
                      <?php foreach($this->orderList as $orders){
                        $uID = $orders['order_id'];
                        $uID = substr($uID,17);
                        if($uID==Session::get('userId')){

                        ?> 
                       <tr>
                           <td class="order-details"><h4><?php echo $orders['order_id']?></h4>
                            <h5>Date: <?php echo $orders['date']?></h5>
                            <h5>Total Price: LKR 2400.00</h5></td>
                           <td> <div class="oder-status">
                                <h5>Order Status: </h5>
                                <h5 style="color: #04CBE0"> <?php echo $orders['order_status']?></h5>
                              </div>
                            </td>
                            
                           <td><a href="<?php echo URL;?>orders/myOrderDetails/<?php echo $orders['order_id']?>" class="btn table-btn">View Order</a></td>
                       </tr>
                        <?php }}?>

                       </tr> 
                   </table>     
                    </div>

</div>

 </div>

<?php require 'views/footer.php'; ?>