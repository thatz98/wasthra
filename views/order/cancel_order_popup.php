<div id="cancelOrder" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>

        <div class="row">
            <form action="<?php echo URL; ?>orders/cancelOrder" id="updateFrom"
                enctype="multipart/form-data" method="post">

                    <div class="row">
                <div class="col-2">
                <label>Reason to cancel</label>
                </div>
                <input type="text" value="<?php echo $this->orderDetails['order_id']?>" name="order_id" hidden>
                </div>
                <div class="row">
                <textarea name="cancel_comment" id="" cols="20" rows="5"></textarea>
                </div>
                    <div class="row">
                    <button type="submit" class="btn">Submit</button>
                </div>
                    </form>
                </div>
            </div>
</div>
