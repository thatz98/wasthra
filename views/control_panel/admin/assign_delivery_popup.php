<div id="assignDeliverySraff" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <form action="<?php echo URL; ?>orders/create" id="AssignDeliverForm" method="post">
                <div class="row" style="margin-top:30px;">
                    <div class="col-2">
                        <div class="">
                            <label>Select the Deliver</label><br><br>

                            <select name="assigned_deliver">
                                <?php
                            foreach($this->deliveryStaffList as $deliveryPerson){?>
                                <option value="<?php echo $deliveryPerson['user_id'];?>">
                                    <?php echo $deliveryPerson['first_name'].' '.$deliveryPerson['last_name'];?>
                                    </opttion>
                                    <?php   }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                <input type="text" value="<?php echo  $this->orderItems[0][0]; ?>" name="order_id" hidden>
                    <button type="submit" class="btn">Assign</button>
                </div>
                <br>
            </form>

        </div>

    </div>
</div>