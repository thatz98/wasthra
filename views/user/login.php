<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a9d2e1253.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>

<body>
    
    <div id="signup=success" class="overlay">
    <div class="popup">
        <a href="<?php echo URL ?>login"><i class="fa fa-times-circle"></i></a>
        <div class="content">
            Your account has been made, <br /> Please verify it by clicking the activation link that has been send to your email...
        </div>
    </div>
</div> 
    <div class="header-plain">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="<?php echo URL; ?>">Home</a></li>
                        <li><a href="<?php echo URL; ?>shop">Shop</a></li>
                        <li><a href="<?php echo URL; ?>contact">Contact Us</a></li>
                        <?php if(Session::get('loggedIn')!==true): ?>
                            
                            <li><a href="<?php echo URL; ?>login">Login/Signup</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <?php if(Session::get('loggedIn')==true): ?>
                            <div class="user-box">
                                <div class="user-info"><p>Hi, Admin!</p></div>
                                <a class="user-box-btn" href="#profile-card">
                                    <i class="fa fa-user-circle-o fa-2x"></i>
                                </a>
                            </div>
                <?php endif; ?>
                
                <a class="bag" href="#" id="bag" onclick="bagDown()"><i class="fa fa-shopping-bag fa-2x"></i><span class="badge">3</span></a>
                <img src="<?php echo URL; ?>public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
<?php require 'views/shop/cart_dropdown.php'; ?>
  
        <div class="login">
            <div class="login-form-cont">
                <div class="form sign-in">
                    <h2>Welcome back,</h2>
                    <div class="form-inner-container" >
                        <form action="<?php echo URL; ?>login/run" id="loginForm" method="post" novalidate>
                            <div class="row">
                                <div style="text-align: center;">
                                    <label>Username/Email</label><br>
                                    <input type="text" name="username" onfocusout="validateUsername()" id="username">
                                    <div class="helper-text"><span></span></div>
                                    <label>Password</label><br>
                                    <input type="password" name="password" onfocusout="validateLoginPassword()" id="login_password">
                                    <div class="helper-text"><span></span></div>
                                </div>
                            </div>
                            <button type="submit" class="btn">Login</button>
                            <div class="forget-password">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sub-cont">
                    <div class="img">
                        <div class="img__text m--up">
                            <h2>New here?</h2>
                            <p>Sign up and discover great amount of new opportunities!</p>
                        </div>
                        <div class="img__text m--in">
                            <h2>One of us?</h2>
                            <p>If you already has an account, just sign in. We've missed you!</p>
                        </div>
                        <div class="img__btn">
                            <span class="m--up t-btn">Sign Up</span>
                            <span class="m--in">Login</span>
                        </div>
                    </div>
                    <div class="form sign-up">
                        <h2>Time to feel like home,</h2>
                        <div class="form-inner-container" >
                            <form action="<?php echo URL; ?>login/signup" id="regForm" method="post" novalidate>
                                <div class="row-top">
                                    <div class="col-2" style="text-align: center;">
                                        <label>First Name</label><br>
                                        <input type="text" name="first_name" data-helper="First Name" onfocusout="validateFirstName()" id="first_name">
                                        <div class="helper-text"><span></span></div>
                                        <label>Mobile Number</label><br>
                                        <input type="text" name="contact_no" data-helper="Mobile No." placeholder="07XXXXXXXX" onfocusout="validateContactNo()" id="contact_no">
                                        <div class="helper-text"><span></span></div>
                                        <label>Password : </label><br>
                                        <input type="password" name="password" data-helper="Password" onfocusout="validatePassword()" id="password">
                                        <div class="helper-text"><span></span></div>
                                        <label>Confirm Password</label><br>
                                        <input type="password" name="conf_password" onfocusout="validateConfirmPassword()" id="conf_password">
                                        <div class="helper-text"><span></span></div>
                                    </div>
                                    <div class="col-2" style="text-align: center;">
                                        <label>Last Name</label><br>
                                        <input type="text" name="last_name" data-helper="Last Name" onfocusout="validateLastName()" id="last_name">
                                        <div class="helper-text"><span></span></div>
                                        <label>Email</label><br>
                                        <input type="email" name="email" data-helper="Email" onfocusout="validateEmail()" id="email">
                                        <div class="helper-text"><span></span></div>
                                        <label>Gender</label><br>
                                        <select name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option></select><div class="helper-text"><span></span></div>
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn">Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<script type="text/javascript" src="<?php echo URL ?>public/js/toggle_login.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/login_form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/signup_form_validation.js"></script>

<?php require 'views/footer.php'; ?>
