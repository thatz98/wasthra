<div id="updateOrderStatus" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <form action="<?php echo URL; ?>orders/updateOrderStatus" id="updateOrderStatusForm" method="post">
                <div class="row" style="margin-top:30px;">
                    <div class="col-2">
                        <div class="">
                            <label>Select the Status</label><br><br>
                            <input type="text" name="prev_id" value="<?php echo $this->orderList['order_id']?>" style="display:none">   
                            <select name="assigned_deliver">
                               <option value="new" <?php if($this->orderItems[0]['order_status']=='new') echo "selected=\"selected\"";?>>New</option>
                               <option value="processing"  <?php if($this->orderItems[0]['order_status']=='processing') echo "selected=\"selected\"";?>>Processing</option>
                               <option value="outForDelivery" <?php if($this->orderItems[0]['order_status']=='outForDelivery') echo "selected=\"selected\"";?>>Out for Delivery</option>
                               <option value="inTransit" <?php if($this->orderItems[0]['order_status']=='inTransit') echo "selected=\"selected\"";?>>In Transit</option>
                               <option value="delivered" <?php if($this->orderItems[0]['order_status']=='delivered') echo "selected=\"selected\"";?>>Delivered</option>
                               <option value="deliveryFailed" <?php if($this->orderItems[0]['order_status']=='deliveryFailed') echo "selected=\"selected\"";?>>Delivery Failed</option>
                               <option value="requestToReturn" <?php if($this->orderItems[0]['order_status']=='requestToReturn') echo "selected=\"selected\"";?>>Request to Return</option>
                               <option value="requestToClose" <?php if($this->orderItems[0]['order_status']=='requestToClose') echo "selected=\"selected\"";?>>Request to Close</option>
                               <option value="closed" <?php if($this->orderItems[0]['order_status']=='closed') echo "selected=\"selected\"";?>>Closed</option>
                               <option value="cancelled" <?php if($this->orderItems[0]['order_status']=='cancelled') echo "selected=\"selected\"";?>>Cancelled</option>
                               <option value="returned" <?php if($this->orderItems[0]['order_status']=='returned') echo "selected=\"selected\"";?>>Returned</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-2">
                <label>Comments</label>
                </div>
                </div>
                <div class="row">
                <textarea name="" id="" cols="20" rows="5"></textarea>
                </div>
                <div class="row">
                    <button type="submit" class="btn">Update</button>
                </div>
                <br>
            </form>

        </div>

    </div>
</div>