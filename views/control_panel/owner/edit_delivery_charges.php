<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">

    <div class="row">
        <h2 class="title title-min">Edit Delivery Charge</h2>
    </div>

        <div class="center-content">
        <div class="form-container" >
            <form action="<?php echo URL; ?>deliveryCharges/editSave/" id="editFrom" method="post">
                        <div class="row">

                            <div class="col-2">

                              <input type="text" name="prev_city" value="<?php echo $this->getcharges['city']?>" style="display:none">   
                              <label>City</label><br><input type="text" name="city" id="city" value="<?php echo $this->getcharges['city'] ?>"><br><br>
                           
                           </div>

                            <div class="col-2" >

                              <label>Delivery Fee</label><br><input type="text" name="delivery_fee" id="delivery_fee" value="<?php echo $this->getcharges['delivery_fee'] ?>"><br><br>
                        
                           </div>

                       </div>
                        
                        <div class="center-content">
                            <button type="submit" class="btn">Update</button>
                            <a href="<?php echo URL ?>deliveryCharges" class="btn btn-grey">Cancel</a>
                        </div>
            </form>

        </div>  
        </div>
        

</div>

<?php require 'views/footer_dashboard.php'; ?>