<div id="change-password" class="overlay">
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row" style="margin-top: 20px;">


            <div class="col-2" style="text-align: center;">
                <form action="<?php echo URL ?>profile/changePassword" method="post" id="changeFrom">

                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Current Password</label><br>
                                <input type="password" name="current_password" data-helper="Current Password" onfocusout="validateOldPassword()" id="current_password">
                                <span class="popuptext"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>New Password</label><br>
                                <input type="password" name="new_password" data-helper="New Password" onfocusout="validateNewPassword()" id="new_password">
                                <span class="popuptext"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Confirm Password</label><br>
                                <input type="password" name="conf_new_password" data-helper="Confirm New Password" onfocusout="validateConfirmNewPassword()" id="confirm_new_password">
                                <span class="popuptext"></span>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="prev_url" value="<?php if (isset($_SERVER['HTTP_REFERER'])) {
                                                                    echo $_SERVER['HTTP_REFERER'];
                                                                } ?>" hidden>
                    <button type="submit" class="btn">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/js/form_validation.js"></script>
<script type="text/javascript" src="/util/form/change_password_form_validation.js"></script>