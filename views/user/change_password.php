<div id="change-password" class="overlay">
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">


            <div class="col-2" style="text-align: center;">
                <form action="" method="post">
                <label>Current Password</label><br>
                    <input class="text-center" type="password" name="current_password" onfocusout="validatePassword()" id="current_password" data-helper="Current Password"><div class="helper-text"><span></span></div>
                    <label>New Password</label><br>
                    <input class="text-center" type="password" name="new_password" onfocusout="validatePassword()" id="new_password"><div class="helper-text"><span></span></div>
                    <label>Confirm Password</label><br>
                    <input class="text-center" type="password" name="new_password" onfocusout="validateConfirmPassword()" id="confirm_password"><div class="helper-text"><span></span></div>
                
                <button type="submit" class="btn">Save Changes</button>
            </form>
            </div>
        </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo URL?>public/js/form_validation.js"></script>