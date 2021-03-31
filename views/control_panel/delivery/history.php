<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">History</h2><br>
    </div>
    <div class="row-top">
        <div class="order-container" >
                   <table class="order-list">
                   <?php $count=0; if(empty($this->orderList)){echo "No Assigned Orders";}
                          else
                          { 
                            foreach ($this->orderList as $order): 
                              $count++;
                            if($count==3){
                              echo "2 orders delted";
                              break;}?>
                       <tr>
                           
                           <td class="order-details"><h4>ORDER ID: <?php echo $order['order_id']?></h4>
                            <h5>Date: <?php echo $order['date']?></h5>
                            <td class="order-messages">
                              <div class="oder-status">
                                <h5>Order Type: </h5>
                                <h5 style="color: #04CBE0"> <?php if($order['return_id']!=NULL) echo 'Return'; else echo 'Delivery';?></h5><br>
                              </div>
                              <div class="oder-date">
                                <h5>Delivered Date: </h5>
                                <h5 style="color: #04CBE0"> <?php echo $order['actual_delivery_date']?></h5>
                              </div>
                            </td>
                           <td><a href="<?php echo URL;?>orders/historyDetails/<?php echo $order['order_id']; ?> " class="btn table-btn">View Details</a></td>
                       </tr>
                       <?php endforeach;} ?>
                       
                   </table>     
         </div>

</div>

 </div>

<?php require 'views/footer_dashboard.php'; ?>