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

<div class="container">
        <div class="row">
            <div class="col-2">
                <div id="mobile-form-container">
                    <div class="mobile-form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="indicator">
                        
                    </div>
                    <form action="<?php echo URL; ?>login/run" id="loginForm" method="post" novalidate>
                            <div class="row">
                                <div class="col-2" style="text-align: center;">
                                <div class="row" style="margin:10px 0 20px 0;"><h3>Time to feel like home,</h3></div>
                                    <label>Username/Email</label><br>
                                    <input type="text" name="username" onfocusout="validateUsername()" id="username">
                                    <div class="helper-text"><span></span></div>
                                    <label>Password</label><br>
                                    <input type="password" name="password" onfocusout="validatePassword()" id="login_password"><div class="helper-text"><span></span></div>
                                </div>
                            </div>
                            <button type="submit" class="btn">Login</button>
                            <div class="forget-password">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>

                    <form action="<?php echo URL; ?>login/signup" id="regForm" method="post" novalidate>
                                <div class="row-top">
                                    <div class="row" style="margin:10px 0 20px 0;"><h3>Time to feel like home,</h3></div>
                                    <div class="col-2" style="text-align: center;">
                                        <label>First Name</label><br>
                                        <input type="text" name="first_name" data-helper="First Name" onfocusout="validateFirstName()" id="first_name">
                                        <div class="helper-text"><span></span></div>
                                        <label>Last Name</label><br>
                                        <input type="text" name="last_name" data-helper="Last Name" onfocusout="validateLastName()" id="last_name">
                                        <div class="helper-text"><span></span></div>
                                        <label>Mobile Number</label><br>
                                        <input type="text" name="contact_no" data-helper="Mobile No." placeholder="07XXXXXXXX" onfocusout="validateContactNo()" id="contact_no">
                                        <div class="helper-text"><span></span></div>
                                        <label>Email</label><br>
                                        <input type="email" name="email" data-helper="Email" onfocusout="validateEmail()" id="email">
                                        <div class="helper-text"><span></span></div>
                                        <label>Gender</label><br>
                                        <select name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option></select><div class="helper-text"><span></span></div>
                                        <label>Password : </label><br>
                                        <input type="password" name="password" data-helper="Password" onfocusout="validatePassword()" id="password">
                                        <div class="helper-text"><span></span></div>
                                        <label>Confirm Password</label><br>
                                        <input type="password" name="conf_password" onfocusout="validateConfirmPassword()" id="conf_password">
                                        <div class="helper-text"><span></span></div>
                                    
                                        
                                        
                                        
                                    </div>
                                </div>
                                <button type="submit" class="btn">Sign Up</button>
                            </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    var usernameArray =  <?php echo json_encode($this->usernames); ?>;

    var loginFormPane = document.getElementById("loginForm");
        var regFormPane = document.getElementById("regForm");
        var indicator = document.getElementById("indicator");
        var formContianer = document.getElementById("mobile-form-container");
        function register(){
            formContianer.style.height= "800px";
            regFormPane.style.transform = "translateX(-300px)";
            loginFormPane.style.transform = "translateX(-300px)";
            indicator.style.transform = "translateX(100px)";
        }

        function login(){
            formContianer.style.height= "400px";
            regFormPane.style.transform = "translateX(0px)";
            loginFormPane.style.transform = "translateX(0px)";
            indicator.style.transform = "translateX(0px)";
        }
                </script>

<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/login_form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/signup_form_validation.js"></script>

<?php require 'views/footer.php'; ?>
