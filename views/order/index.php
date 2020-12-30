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

                           <?php $status=$orders['order_status']; $color='';
                                switch($status){
                                    case 'new':
                                        $color='04CBE0';
                                        $status='New';
                                        break;
                                    case 'inTransit':
                                        $color='e22525';
                                        $status='In Transit';
                                        break;
                                    case 'delivered':
                                        $color='d1af15';
                                        $status='Delivered';
                                        break;
                                    case 'deliveryFailed':
                                        $color='31d115';
                                        $status='Delivery Failed';
                                        break;
                                    case 'closed':
                                        $color='d115cb';
                                        $status='Closed';
                                        break;
                                    case 'cancelled':
                                        $color='18ea32';
                                        $status='Cancelled';
                                        break;
                                    case 'returned':
                                        $color='0710de';
                                        $status='Returned';
                                        break;
                                    case 'requestToReturn':
                                        $color='de7207';
                                        $status='Requested to Return';
                                        break;
                                    case 'requestToClose':
                                        $color='999b4f';
                                        $status='Requested to Close';
                                        break;
                                    case 'processing':
                                        $color='b79ce7';
                                        $status='Processing';
                                        break;}?>

                            <h5>Order Status: <span style="color: #<?php echo $color?>"><?php echo $status?></span></h5>
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