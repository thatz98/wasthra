<div id="forgotPassword" class="overlay">
    <div class="popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <div class="col-2" style="text-align: center;">
                <form action="<?php echo URL;?>login/forgotPassword" id="forgot-password" method="post">
                <label>Username/Email</label><br>
                    <input class="text-center" type="text" name="check_username" onfocusout="validateForgotPasswordUsername()" id="check_username" data-helper="Username"><div class="helper-text"><span></span></div>
                <button type="submit" class="btn">Send Reset Link</button>
            </form>
            </div>
        </div>
        </div>
    </div>
<script type="text/javascript" src="<?php echo URL?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL?>util/form/forgot_password_form_validation.js"></script>