<div id="edit-profile" class="overlay">
    <div class="popup" style="overflow-x: hidden;">
        <div class="row-right">
            <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        </div>
        <form action="<?php echo URL; ?>profile/editProfile/<?php echo Session::get('userData')['user_id'] ?>"
            id="editProfileFrom" method="post">
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>First Name</label><br>
                        <input type="text" name="first_name" data-helper="First Name"
                            value="<?php echo Session::get('userData')['first_name'] ?>"
                            onfocusout="validateFirstName()" id="first_name">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Last Name</label><br>
                        <input type="text" name="last_name" data-helper="Last Name"
                            value="<?php echo Session::get('userData')['last_name'] ?>" onfocusout="validateLastName()"
                            id="last_name">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Mobile Number</label><br>
                        <input type="text" name="contact_no" data-helper="Mobile No."
                            value="<?php echo Session::get('userData')['contact_no'] ?>"
                            onfocusout="validateContactNo()" id="contact_no">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Email</label><br>
                        <input type="text" name="email" data-helper="First Name"
                            value="<?php echo Session::get('userData')['email'] ?>" onfocusout="validateEmail()"
                            id="email">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <?php if(Session::get('userType')=='customer'):?>
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Gender</label><br>
                        <select name="gender" value="<?php echo Session::get('userData')['gender'] ?>">
                            <option value="male"
                                <?php if(Session::get('userData')['gender']=='male') echo "selected=\"selected\"";?>>
                                Male
                            </option>
                            <option value="female"
                                <?php if(Session::get('userData')['gender']=='female') echo "selected=\"selected\"";?>>
                                Female</option>
                        </select>
                        <span class="popuptext"></span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="helper-text">
                        <label>City</label><br>
                        <input type="text" value="<?php if(isset(Session::get('addressData')['city'])){echo Session::get('addressData')['city'];} ?>" name="city" data-helper="City" onfocusout="validateCity()"
                            id="city">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Address Line 1</label><br>
                        <input type="text" name="address_line_1" data-helper="Address Line 1"
                            onfocusout="validateUpdateAddressLine1()" id="address_line_1_update"
                            value="<?php if(isset(Session::get('addressData')['address_line_1'])){echo Session::get('addressData')['address_line_1'];} ?>">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Address Line 2</label><br>
                        <input type="text" name="address_line_2" data-helper="Address Line 2"
                            onfocusout="validateUpdateAddressLine2()" id="address_line_2_update"
                            value="<?php if(isset(Session::get('addressData')['address_line_2'])){echo Session::get('addressData')['address_line_2'];} ?>">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Address Line 3</label><br>
                        <input type="text" name="address_line_3" data-helper="Address Line 3"
                            onfocusout="validateUpdateAddressLine3()" id="address_line_3_update"
                            value="<?php if(isset(Session::get('addressData')['address_line_3'])){echo Session::get('addressData')['address_line_3'];} ?>">
                        <span class="popuptext"></span>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Postal Code</label><br>
                        <input type="text" name="postal_code" data-helper="Postal Code"
                            onfocusout="validatePostalCode()" id="postal_code" value="<?php if(isset(Session::get('addressData')['postal_code'])){echo Session::get('addressData')['postal_code'];} ?>">
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col-3">
                    <div class="helper-text">
                        <label>Gender</label><br>
                        <select name="gender" value="<?php echo Session::get('userData')['gender'] ?>">
                            <option value="male"
                                <?php if(Session::get('userData')['gender']=='male') echo "selected=\"selected\"";?>>
                                Male
                            </option>
                            <option value="female"
                                <?php if(Session::get('userData')['gender']=='female') echo "selected=\"selected\"";?>>
                                Female</option>
                        </select>
                        <span class="popuptext"></span>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <input type="text" name="login_id" value="<?php echo Session::get('loginId')?>" hidden>
            <input type="text" name="user_id" value="<?php echo Session::get('userId')?>" hidden>
            <input type="text" name="user_type" value="<?php echo Session::get('userType')?>" hidden>
            <input type="text" name="address_id"
                value="<?php if(isset(Session::get('addressData')['address_id'])){echo Session::get('addressData')['address_id'];}?>"
                hidden>

            <div class="center-content">
                <button type="submit" class="btn">Update</button>
                <a href="#profile-card" class="btn btn-grey">Cancel</a>
            </div>
        </form>
    </div>
</div>