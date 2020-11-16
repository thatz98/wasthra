<div id="updateOrderStatus" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <form action="<?php echo URL; ?>order/updateOrderStatus" id="updateOrderStatusForm" method="post">
                <div class="row" style="margin-top:30px;">
                    <div class="col-2">
                        <div class="">
                            <label>Select the Status</label><br><br>

                            <select name="assigned_deliver">
                                <?php $this->statuses=array('New','Assigned for delivery','In transit','Delivered','Delivery failed','Closed','Cancelled');
                            foreach($this->statuses as $status){?>
                                <option value="<?php echo $status;?>">
                                    <?php echo $status;?>
                                    </opttion>
                                    <?php   }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn">Update</button>
                </div>
                <br>
            </form>

        </div>

    </div>
</div>