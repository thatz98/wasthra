<?php require 'views/header.php'; ?>
<script type="text/javascript" src="public/js/form_validation.js"></script>
<!--------account -------->
    
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="public/images/image1.png" width="100%">
            </div>
            <div class="col-2">
                <div class="login-form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="indicator">
                    </div>
                    <form action="<?php echo URL; ?>login/run" id="loginForm" method="post">
                        <input type="text" placeholder="Username" name="username">
                        <input type="password" placeholder="Password" name="password">
                        <button type="submit" class="btn">Login</button><br>
                        <a href="">Forgot password</a>
                    </form>
                    <form action="<?php echo URL; ?>login/signup" id="regForm" method="post">
                        <input type="text" placeholder="First Name" name="first_name" onfocusout="validateFirstName()">
                        <input type="text" placeholder="Last Name" name="last_name" onfocusout="validateLastName()">
                        <input type="text" placeholder="NIC" name="nic" onfocusout="validateNIC()">
                        <input type="email" placeholder="Email" name="email" onfocusout="validateEmail()">
                        <input type="text" placeholder="Mobile Number" name="contact_no" onfocusout="validateContactNo()">
                        <input type="text" placeholder="Gender" name="gender" onfocusout="validateFirstName()">
                        <input type="password" placeholder="Password" name="password" onfocusout="validatePassword()">
                        <input type="password" placeholder="Confirm Password" name="conf_password" onfocusout="validateConfPassword()">
                        <button type="submit" class="btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="public/js/toggle_login.js"></script>

<?php require 'views/footer.php'; ?>