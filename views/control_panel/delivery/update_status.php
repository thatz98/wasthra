<div id="updateStatus" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>

        <div class="row">
            <form action="<?php echo URL; ?>orders/updateOrderDeliveryStatus" id="updateFrom"
                enctype="multipart/form-data" method="post">
                <div class="col-2">
                        
                        <div class="">
                            <label>Update Status</label><br><br>
                            <input type="text" name="order_id" value="<?php echo $this->orderDetails['order_id']?>" style="display:none">   
                            <select name="order_status">
                               <option value="In Transit" <?php if($this->orderDetails['order_status']=='In Transit') echo "selected=\"selected\"";?>>In Transit</option>
                               <option value="Delivered" <?php if($this->orderDetails['order_status']=='Delivered') echo "selected=\"selected\"";?>>Delivered</option>
                               <option value="Cancelled" <?php if($this->orderDetails['order_status']=='Cancelled') echo "selected=\"selected\"";?>>Cancelled</option>
                               <option value="Cancelled" <?php if($this->orderDetails['order_status']=='Delivery Failed') echo "selected=\"selected\"";?>>Delivery Failed</option>
                            </select>
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
                    <button type="submit" class="btn">Submit</button>
                </div>
                    </form>
                </div>
            </div>
</div>
