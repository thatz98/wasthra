<div id="change-password" class="overlay">
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">


            <div class="col-2" style="text-align: center;">
                <form action="<?php echo URL?>profile/changePassword" method="post" id="changeFrom">
                <label>Current Password</label><br>
                    <input class="text-center" type="password" name="current_password" onfocusout="validateOldPassword()" id="current_password" data-helper="Current Password">
                        <div class="helper-text"><span></span></div>
                    <label>New Password</label><br>
                    <input class="text-center" type="password" name="new_password" onfocusout="validateNewPassword()" id="new_password">
                        <div class="helper-text"><span></span></div>
                    <label>Confirm Password</label><br>
                    <input class="text-center" type="password" name="conf_new_password" onfocusout="validateConfirmNewPassword()" id="confirm_new_password">
                        <div class="helper-text"><span></span></div>
                    <input type="text" name="prev_url" value="<?php if(isset($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER'];}?>" hidden>
                <button type="submit" class="btn">Save Changes</button>
            </form>
            </div>
        </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo URL?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/change_password_form_validation.js"></script>