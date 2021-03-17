<div id="requestReturn" class="overlay">

    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>

        <div class="row">
            <form action="<?php echo URL; ?>orders/returnOrder" id="updateFrom"
                enctype="multipart/form-data" method="post">

                    <div class="row">
                <div class="col-2">
                <label>Reason to return</label>
                </div>
                </div>
                <div class="row">
                <textarea name="return_comment" id="" cols="20" rows="5"></textarea>
                </div>
                <input type="text" value="<?php echo $this->allDetails[0][0]?>" name="order_id" hidden>
                    <div class="row">
                    <button type="submit" class="btn">Submit</button>
                </div>
                    </form>
                </div>
            </div>
</div>
