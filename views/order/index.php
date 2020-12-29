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
                            <?php $product=array();
                                    $price=0;
                                    foreach($this->reqDetailList as $req){
                                        if($req['order_id']==$orders['order_id']){
                                            $price+=$req['product_price']*$req['item_qty'];
                                        }
                                    }

                            ?>
                            <h5>Total Price: <?php echo number_format($price,2,'.',''); $price=0;?></h5></td>
                           <td> <div class="oder-status">

                                <?php if($orders['order_status']=='new'){?>
                                <h5>Order Status: </h5><h5 style="color: #04CBE0">New</h5>
                            <?php } 
                                elseif($orders['order_status']=='outForDelivery'){?>
                                    <h5>Order Status: </h5><h5 style="color: #2539e2">Out for Delivery</h5>
                            <?php }
                                elseif($orders['order_status']=='inTransit'){?>
                                    <h5>Order Status: </h5><h5 style="color: #e22525">In Transcit</h5>
                            <?php }
                                elseif($orders['order_status']=='delivered'){?>
                                    <h5>Order Status: </h5><h5 style="color: #d1af15">Delivered</h5>
                            <?php }
                                elseif($orders['order_status']=='deliveryFailed'){?>
                                    <h5>Order Status: </h5><h5 style="color: #31d115">Delivery Failed</h5>
                            <?php }
                                elseif($orders['order_status']=='closed'){?>
                                    <h5>Order Status: </h5><h5 style="color: #d115cb">Closed</h5>
                            <?php }
                                elseif($orders['order_status']=='cancelled'){?>
                                    <h5>Order Status: </h5><h5 style="color: #18ea32">Cancelled</h5>
                            <?php }
                                elseif($orders['order_status']=='returned'){?>
                                    <h5>Order Status: </h5><h5 style="color: #0710de">Returned</h5>
                            <?php }
                                elseif($orders['order_status']=='requestToReturn'){?>
                                    <h5>Order Status: </h5><h5 style="color: #de7207">Requested to Return</h5>
                            <?php }
                                 elseif($orders['order_status']=='requestToClose'){?>
                                    <h5>Order Status: </h5><h5 style="color: #999b4f">Requested to Close</h5>
                            <?php }
                                elseif($orders['order_status']=='processing'){?>
                                    <h5>Order Status: </h5><h5 style="color: #b79ce7">Processing</h5>
                            <?php }?>
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