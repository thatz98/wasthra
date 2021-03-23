<div id="updateOrderStatus" class="overlay">
 <!--update order delivery status -->

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <form action="<?php echo URL; ?>orders/updateOrderStatus" id="updateOrderStatusForm" method="post">
                <div class="row" style="margin-top:30px;">
                    <div class="col-2">
                        <div class="">

                            <label>Select the Status</label><br><br>
                            <input type="text" name="order_id" value="<?php echo $this->orderDetails['order_id']?>" style="display:none">   
                            <select name="order_status">
                               <option value="New" <?php if($this->orderDetails['order_status']=='New') echo "selected=\"selected\"";?>>New</option>
                               <option value="Processing"  <?php if($this->orderDetails['order_status']=='Processing') echo "selected=\"selected\"";?>>Processing</option>
                               <option value="Out for Delivery" <?php if($this->orderDetails['order_status']=='Out for Delivery') echo "selected=\"selected\"";?>>Out for Delivery</option>
                               <option value="In Transit" <?php if($this->orderDetails['order_status']=='In Transit') echo "selected=\"selected\"";?>>In Transit</option>
                               <option value="Delivered" <?php if($this->orderDetails['order_status']=='Delivered') echo "selected=\"selected\"";?>>Delivered</option>
                               <option value="Delivery Failed" <?php if($this->orderDetails['order_status']=='Delivery Failed') echo "selected=\"selected\"";?>>Delivery Failed</option>
                               <option value="Requested to Return" <?php if($this->orderDetails['order_status']=='Requested to Return') echo "selected=\"selected\"";?>>Requested to Return</option>
                               <option value="Requested to Cancel" <?php if($this->orderDetails['order_status']=='Requested to Cancel') echo "selected=\"selected\"";?>>Requested to Cancel</option>
                               <option value="Completed" <?php if($this->orderDetails['order_status']=='Completed') echo "selected=\"selected\"";?>>Completed</option>
                               <option value="Cancelled" <?php if($this->orderDetails['order_status']=='Cancelled') echo "selected=\"selected\"";?>>Cancelled</option>
                               <option value="Returned" <?php if($this->orderDetails['order_status']=='Returned') echo "selected=\"selected\"";?>>Returned</option>
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
