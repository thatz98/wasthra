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
                               <option value="New" <?php if($this->orderItems[0]['order_status']=='New') echo "selected=\"selected\"";?>>New</option>
                               <option value="Assigned for delivery"  <?php if($this->orderItems[0]['order_status']=='Assigned for delivery') echo "selected=\"selected\"";?>>Assigned for delivery</option>
                               <option value="In transit" <?php if($this->orderItems[0]['order_status']=='In transit') echo "selected=\"selected\"";?>>In transit</option>
                               <option value="Out for Delivery" <?php if($this->orderItems[0]['order_status']=='Out for Delivery') echo "selected=\"selected\"";?>>Out for Delivery</option>
                               <option value="delivered" <?php if($this->orderItems[0]['order_status']=='delivered') echo "selected=\"selected\"";?>>Delivered</option>
                               <option value="Delivery failed" <?php if($this->orderItems[0]['order_status']=='Delivery failed') echo "selected=\"selected\"";?>>Delivery failed</option>
                               <option value="Closed" <?php if($this->orderItems[0]['order_status']=='Closed') echo "selected=\"selected\"";?>>Closed</option>
                               <option value="Cancelled" <?php if($this->orderItems[0]['order_status']=='Cancelled') echo "selected=\"selected\"";?>>Cancelled</option>
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