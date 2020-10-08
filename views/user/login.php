<?php require 'views/header.php'; ?>

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
                        <input type="text" placeholder="First Name" name="first_name">
                        <input type="text" placeholder="Last Name" name="last_name">
                        <input type="text" placeholder="NIC" name="nic">
                        <input type="email" placeholder="Email" name="email">
                        <input type="text" placeholder="Mobile Number" name="contact_no">
                        <input type="text" placeholder="Gender" name="gender">
                        <input type="password" placeholder="Password" name="password">
                        <input type="password" placeholder="Confirm Password" name="conf_password">
                        <button type="submit" class="btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'public/js/toggle_login.js'; ?>

<?php require 'views/footer.php'; ?>