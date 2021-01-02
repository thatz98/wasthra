<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Orders</h2><br>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>report" class="btn">Generate Report</a>
    </div>
    <div class="row">
        <div class="col-3 fit-size">
            <div class="min-card">
                <div class="row">
                    <h3>New Orders</h3>
                </div>
                <div class="row">
                    <h1><?php echo $this->newOrderCount;?></h1>
                </div>
            </div>
        </div>
        <div class="col-3 fit-size">
            <div class="min-card">
                <div class="row">
                    <h3>Pending Deliveries</h3>
                </div>
                <div class="row">
                    <h1><?php echo ($this->processCount+$this->outForDeliveryCount);?></h1>
                </div>
            </div>
        </div>
        <div class="col-3 fit-size">
            <div class="min-card">
                <div class="row">
                    <h3>Pending Returns</h3>
                </div>
                <div class="row">
                    <h1><?php echo $this->pendingReturnCount;?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row-top">
        <div class="order-container" style="min-width: 70%">
            <table class="order-list">
               
            <?php foreach ($this->orderList as $order_list ): ?>
                <tr>

                    <td class="order-details">
                        <h4>ORDER ID:<?php echo $order_list['order_id']; ?></h4>
                        <h5>Date: <?php echo $order_list['date']; ?></h5>
                       
                        <?php $product=array();
                                    $price=0;
                                    foreach($this->reqDetailList as $req){
                                        if($req['order_id']==$order_list['order_id']){
                                            $price+=$req['product_price']*$req['item_qty'];
                                        }
                                    }

                            ?>

                           <?php $fee=0;$city='';
                                foreach ($this->cities as $delivery_city){
                                    if($delivery_city['order_id']==$order_list['order_id']){
                                        $city=$delivery_city['city'];
                                    }
                                }?>

                            <?php 
                                foreach ($this->deliveryCharges as $deliveryFee){
                                    if($deliveryFee['city']==$city){
                                        $fee=$deliveryFee['delivery_fee'];
                                        $price+=$fee;
                                    }
                                }
                            ?>    

                        <h5>Total Price: <?php echo number_format($price,2,'.',''); $price=0;?></h5>
                    </td>
                    <td class="order-messages">
                        <div class="oder-status">

                            <?php $status=$order_list['order_status']; $color='';
                                switch($status){
                                    case 'New':
                                        $color='04CBE0';
                                        $status='New';
                                        break;
                                    case 'In Transit':
                                        $color='e22525';
                                        $status='In Transit';
                                        break;
                                    case 'Delivered':
                                        $color='d1af15';
                                        $status='Delivered';
                                        break;
                                    case 'Delivery Failed':
                                        $color='31d115';
                                        $status='Delivery Failed';
                                        break;
                                    case 'Completed':
                                        $color='d115cb';
                                        $status='Completed';
                                        break;
                                    case 'Cancelled':
                                        $color='18ea32';
                                        $status='Cancelled';
                                        break;
                                    case 'Returned':
                                        $color='0710de';
                                        $status='Returned';
                                        break;
                                    case 'Requested to Return':
                                        $color='de7207';
                                        $status='Requested to Return';
                                        break;
                                    case 'Requested to Cancel':
                                        $color='999b4f';
                                        $status='Requested to Cancel';
                                        break;
                                    case 'Processing':
                                        $color='b79ce7';
                                        $status='Processing';
                                        break;}?>

                            <h5>Order Status: <span style="color: #<?php echo $color?>"><?php echo $status?></span></h5>
                        </div>

                        <?php $data=$this->deliveryList; 
                                         if(!empty($data)){ ?>
                        <div class="order-note">
                            <li style="color: red;">Delivery is set</li>
                        </div>
                        <?php }
                                        else{?>
                        <div class="order-note">
                            <li style="color: red;">No delivery is set</li>
                        </div>

                        <?php }?>
                    </td>
                    <td><a href="<?php echo URL ?>orders/orderDetails/<?php echo $order_list['order_id']; ?>" class="btn table-btn">View Order</a></td>
                </tr>
            
            <?php endforeach; ?>

            </table>
        </div>

    </div>

</div>

<?php require 'views/footer_dashboard.php'; ?>




