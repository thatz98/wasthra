<div id="add-new-address" class="overlay">
    <div class="popup">
        <div class="row-right">
            <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        </div>
        <form action="<?php echo URL; ?>profile/addNewAddress"
            id="addNewAddressFrom" method="post">

            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Address Line 1</label><br>
                        <input type="text" name="address_line_1" data-helper="Address Line 1" onfocusout="validateAddressLine1()"
                            id="address_line_1">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Address Line 2</label><br>
                        <input type="text" name="address_line_2" data-helper="Address Line 2" onfocusout="validateAddressLine2()"
                            id="address_line_2">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Address Line 3</label><br>
                        <input type="text" name="address_line_3" data-helper="Address Line 3" onfocusout="validateAddressLine3()"
                            id="address_line_3">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>City</label><br>
                        <input type="text" name="city" data-helper="City" onfocusout="validateCity()"
                            id="city">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Postal Code</label><br>
                        <input type="text" name="postal_code" data-helper="Postal Code" onfocusout="validatePostalCode()"
                            id="postal_code">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <input type="text" name="prev_url"
                                    value="<?php if(isset($_SERVER['HTTP_REFERER'])){echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";}?>"
                                    hidden>
                
            <div class="center-content">
                <button type="submit" class="btn">Add New Address</button>
                <a href="#profile-card" class="btn btn-grey">Cancel</a>
            </div>
        </form>
    </div>
</div>