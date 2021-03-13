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
                                <div class="helper-text">
                                    <input type="text" name="prev_city" value="<?php echo $this->getcharges['city']?>" style="display:none">   
                                    <label>City</label><br>
                                    <input type="text" name="delivery_city" id="delivery_city" value="<?php echo $this->getcharges['city'] ?>"
                                    data-helper="City" onfocusout="validateDeliveryCity()">
                                    <span class="popuptext"></span>
                                </div><br><br>                          
                           </div>

                            <div class="col-2" >
                                <div class="helper-text">
                                    <label>Delivery Fee</label><br>
                                    <input type="text" name="delivery_fee" id="delivery_fee" value="<?php echo $this->getcharges['delivery_fee'] ?>"
                                    data-helper="Delivery Fee" onfocusout="validateDeliveryFee()">
                                    <span class="popuptext"></span>
                                </div><br><br>
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

<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/edit_delivery_charges_form_validation.js"></script>

<?php require 'views/footer_dashboard.php'; ?>