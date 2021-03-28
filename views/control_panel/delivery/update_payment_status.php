<div id="updatePaymentStatus" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>

        <div class="row">
            <form action="<?php echo URL; ?>orders/updatePaymentStatus" id="updateFrom"
                enctype="multipart/form-data" method="post">
                <div class="col-2">
                        
                        <div class="">
                            <label>Update Status</label><br><br>
                            <input type="text" name="order_id" value="<?php echo $this->orderDetails['order_id']?>" style="display:none">   
                            <select name="payment_status">
                               <option value="successfull" <?php if($this->orderDetails['payment_status']=='successfull') echo "selected=\"selected\"";?>>Successful</option>
                               <option value="pending" <?php if($this->orderDetails['payment_status']=='pending') echo "selected=\"selected\"";?>>Pending</option>
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
