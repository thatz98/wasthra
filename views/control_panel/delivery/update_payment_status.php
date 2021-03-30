<div id="updatePaymentStatus" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>

        <div class="row">
            <form action="<?php echo URL; ?>orders/updatePaymentStatus" enctype="multipart/form-data" method="post">
                <div class="col-2">

                    <div class="">
                        <label>Update Payment Status</label><br><br>
                        <input type="text" name="order_id" value="<?php echo $this->orderDetails['order_id'] ?>" style="display:none">
                        <select name="payment_status">
                            <option value="successfull" <?php if ($this->orderDetails['payment_status'] == 'successfull') echo "selected=\"selected\""; ?>>Successful</option>
                            <option value="pending" <?php if ($this->orderDetails['payment_status'] == 'pending') echo "selected=\"selected\""; ?>>Pending</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>