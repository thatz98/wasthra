<!DOCTYPE html>
<html>
<?php if(Session::get('loggedIn')=='true'){
            header('location: '.URL.'?error=loggedAlready#message');
        }?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="/public/css/all.css">
    <link rel="stylesheet" href="/public/css/wave.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <link rel="stylesheet" href="/public/css/libs/font-awesome.min.css">
    <script src="/public/js/libs/fontawesome.js"></script>
    <script src="/public/js/libs/jquery.min.js"></script>
</head>

<body>
    <div id="preloader-overlay"></div>
    <div id="spinner"></div>
    <?php require 'views/error/error_popup.php';?>
    <?php require 'views/user/forgot_password.php';?>
    <div class="header-plain" id="header">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="/public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="<?php echo URL; ?>">Home</a></li>
                        <li><a href="<?php echo URL; ?>shop">Shop</a></li>
                        <li><a href="<?php echo URL; ?>contactUs">Contact Us</a></li>
                    </ul>
                </nav>

                <img src="/public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>

            <div class="login" id="desktop-login" hidden>
                <div class="login-form-cont">
                    <div class="form sign-in">
                        <?php if(isset($_GET['loginRequired']) && $_GET['loginRequired']=='true'){?>
                        <h3 style="color: #FF0000;text-align:center;font-weight:normal;"><i
                                class="fa fa-exclamation-triangle" aria-hidden="true"></i> You must login first!</h3>
                        <?php
                    } else{ ?>
                        <h2>Welcome back,</h2>
                        <?php  } ?>

                        <div class="form-inner-container">
                            <form action="<?php echo URL; ?>login/run" id="loginForm" method="post" novalidate>
                                <div class="row">
                                    <div style="text-align: center;">

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="helper-text">
                                                    <label>Username/Email</label><br>
                                                    <input type="text" name="username" data-helper="Username"
                                                        onfocusout="validateUsername()" id="username">
                                                    <span class="popuptext"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="helper-text">
                                                    <label>Password</label><br>
                                                    <input type="password" name="password" data-helper="Password"
                                                        onfocusout="validateLoginPassword()" id="login_password">
                                                    <span class="popuptext"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset($_GET['productId']) && isset($_GET['size']) && isset($_GET['qty']) && isset($_GET['color'])){?>
                                <input type="text" name="product_id" value="<?php echo $_GET['productId'];?>" hidden>
                                <input type="text" name="item_size" value="<?php echo $_GET['size'];?>" hidden>
                                <input type="text" name="item_color" value="<?php echo $_GET['color'];?>" hidden>
                                <input type="text" name="item_qty" value="<?php echo $_GET['qty'];?>" hidden>
                                <?php } ?>
                                <input type="text" name="prev_url"
                                    value="<?php if(isset($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER'];}?>"
                                    hidden>
                                <button type="submit" class="btn">Login</button>
                                <div class="forget-password">
                                    <a href="#forgotPassword">Forgot Password?</a>
                                </div>
                                <div class="social-login">
                        <div class="row">
                           <small>Or, Login with</small>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <a href=""><i class="fa fa-2x fa-facebook-square"></i></a>
                            <a href=""><i class="fa fa-2x fa-google-plus-square"></i></a>
                        </div>
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
                            <div class="form-inner-container">
                                <form action="<?php echo URL; ?>login/signup" id="regForm" method="post" novalidate>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>First Name</label><br>
                                                <input type="text" name="first_name" data-helper="First Name"
                                                    onfocusout="validateFirstName()" id="first_name">
                                                <span class="popuptext"></span>
                                            </div>
                                            <!---    <label>First Name</label><br>
                                        <input type="text" name="first_name" data-helper="First Name" onfocusout="validateFirstName()" id="first_name">
                                        <div class="helper-text"><span></span></div> ----->
                                        </div>
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Last Name</label><br>
                                                <input type="text" name="last_name" data-helper="Last Name"
                                                    onfocusout="validateLastName()" id="last_name">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Mobile Number</label><br>
                                                <input type="text" name="contact_no" data-helper="Mobile No."
                                                    placeholder="07XXXXXXXX" onfocusout="validateContactNo()"
                                                    id="contact_no">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Email</label><br>
                                                <input type="email" name="email" data-helper="Email"
                                                    onfocusout="validateEmail()" id="email">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            
                                            <div class="helper-text">
                                            <label>Password</label><br>
                                                <input type="password" name="password" data-helper="Password"
                                                    onfocusout="validatePassword()" id="password">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Confirm Password</label><br>
                                                <input type="password" name="conf_password"
                                                    onfocusout="validateConfirmPassword()" id="conf_password">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3" style="margin-bottom: 0;">
                                            <div class="helper-text">
                                                <label>Gender</label><br>
                                                <div class="radio-container" id="gender-radio">
                                                    <input type="radio" id="male" name="gender" value="male">
                                                    <label for="male">Male</label>
                                                    <input type="radio" id="female" name="gender" value="female">
                                                    <label for="female">Female</label>
                                                    <input type="radio" id="other" name="gender" value="other">
                                                    <label for="other">Other</label>
                                                </div>
                                                <!----<select name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select> ---->
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>

                                    </div>






                                    <button type="submit" class="btn">Sign Up</button>
                                    <div class="social-login">
                        <div class="row">
                           <small>Or, Signup with</small>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <a href=""><i class="fa fa-2x fa-facebook-square"></i></a>
                            <a href=""><i class="fa fa-2x fa-google-plus-square"></i></a>
                        </div>
                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container" id="mobile-login" hidden>
            <div class="row">
                <div class="col-2">
                    <div id="mobile-form-container">
                        <div class="mobile-form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Signup</span>
                            <hr id="indicator">

                        </div>
                        <form action="<?php echo URL; ?>login/run" id="loginForm_m" method="post" novalidate>
                            <div class="row">
                                <div class="row" style="text-align: center;">
                                    <?php if(isset($_GET['loginRequired']) && $_GET['loginRequired']=='true'){?>
                                    <h3 style="color: #FF0000;text-align:center;font-weight:normal;margin: 20px 0;"><i
                                            class="fa fa-exclamation-triangle" aria-hidden="true"></i> You must login
                                        first!</h3>
                                    <?php
                    } else{ ?>
                                    <h3 style="margin: 20px 0;">Welcome back,</h3>
                                    <?php  } ?>
                                </div>
                                    <div class="row">
                                            <div class="col-3">
                                                <div class="helper-text">
                                                    <label>Username/Email</label><br>
                                                    <input type="text" name="username" data-helper="Username"
                                                        onfocusout="validateUsernameM()" id="username_m">
                                                    <span class="popuptext"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="helper-text">
                                                    <label>Password</label><br>
                                                    <input type="password" name="password" data-helper="Password"
                                                        onfocusout="validateLoginPasswordM()" id="login_password_m">
                                                    <span class="popuptext"></span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            
                            <input type="text" name="prev_url"
                                value="<?php if(isset($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER'];}?>"
                                hidden>

                            <button type="submit" class="btn" style="margin-bottom: 10px;">Login</button>
                            <div class="forget-password">
                                <a href="#forgotPassword">Forgot Password?</a>
                            </div>
                            <div class="row">
                            <div class="social-login">
                        <div class="row">
                           <small>Or, Login with</small>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <a href=""><i class="fa fa-2x fa-facebook-square"></i></a>
                            <a href=""><i class="fa fa-2x fa-google-plus-square"></i></a>
                        </div>
                        </div>
                            </div>
                        </form>

                        <form action="<?php echo URL; ?>login/signup" id="regForm_m" method="post" novalidate>
                            <div class="row-top">
                                <div class="row" style="margin:10px 0 20px 0;">
                                    <h3>Time to feel like home,</h3>
                                </div>
                                <div class="row">
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>First Name</label><br>
                                                <input type="text" name="first_name" data-helper="First Name"
                                                    onfocusout="validateFirstNameM()" id="first_name_m">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                <div class="col-3">
                                            <div class="helper-text">
                                                <label>Last Name</label><br>
                                                <input type="text" name="last_name" data-helper="Last Name"
                                                    onfocusout="validateLastNameM()" id="last_name_m">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Mobile Number</label><br>
                                                <input type="text" name="contact_no" data-helper="Mobile No."
                                                    placeholder="07XXXXXXXX" onfocusout="validateContactNoM()"
                                                    id="contact_no_m">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Email</label><br>
                                                <input type="email" name="email" data-helper="Email"
                                                    onfocusout="validateEmailM()" id="email_m">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Gender</label><br>
                                                <div class="radio-container" id="gender-radio-m"><input type="radio"
                                                        id="male-m" name="gender" value="male">
                                                    <label for="male-m">Male</label>
                                                    <input type="radio" id="female-m" name="gender" value="female">
                                                    <label for="female-m">Female</label>
                                                    <input type="radio" id="other-m" name="gender" value="other">
                                                    <label for="other">Other</label>
                                                </div>
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label>Password : </label><br>
                                            <div class="helper-text">
                                                <input type="password" name="password" data-helper="Password"
                                                    onfocusout="validatePasswordM()" id="password_m">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-3">
                                            <div class="helper-text">
                                                <label>Confirm Password</label><br>
                                                <input type="password" name="conf_password"
                                                    onfocusout="validateConfirmPasswordM()" id="conf_password_m">
                                                <span class="popuptext"></span>
                                            </div>
                                        </div>
                                    </div>

                                    
                                <!----<div class="col-2" style="text-align: center;">
                                    <label>First Name</label><br>
                                    <input type="text" name="first_name" data-helper="First Name"
                                        onfocusout="validateFirstNameM()" id="first_name_m">
                                    <div class="helper-text"><span></span></div>
                                    <label>Last Name</label><br>
                                    <input type="text" name="last_name" data-helper="Last Name"
                                        onfocusout="validateLastNameM()" id="last_name_m">
                                    <div class="helper-text"><span></span></div>
                                    <label>Mobile Number</label><br>
                                    <input type="text" name="contact_no" data-helper="Mobile No."
                                        placeholder="07XXXXXXXX" onfocusout="validateContactNoM()" id="contact_no_m">
                                    <div class="helper-text"><span></span></div>
                                    <label>Email</label><br>
                                    <input type="email" name="email" data-helper="Email" onfocusout="validateEmailM()"
                                        id="email_m">
                                    <div class="helper-text"><span></span></div>
                                    <label>Gender</label><br>
                                    <div class="radio-container" id="gender-radio-m"><input type="radio"
                                                        id="male-m" name="gender" value="male">
                                                    <label for="male">Male</label>
                                                    <input type="radio" id="female-m" name="gender" value="female">
                                                    <label for="female">Female</label>
                                                    <input type="radio" id="other-m" name="gender" value="other">
                                                    <label for="other">Other</label>
                                                </div>
                                    <div class="helper-text"><span></span></div>
                                    <label>Password : </label><br>
                                    <input type="password" name="password" data-helper="Password"
                                        onfocusout="validatePasswordM()" id="password_m">
                                    <div class="helper-text"><span></span></div>
                                    <label>Confirm Password</label><br>
                                    <input type="password" name="conf_password" onfocusout="validateConfirmPasswordM()"
                                        id="conf_password_m">
                                    <div class="helper-text"><span></span></div>




                                </div>---->
                            </div>
                            <div class="row"><button type="submit" class="btn">Sign Up</button></div>
                            
                            <div class="row">
                            <div class="social-login">
                        <div class="row">
                           <small>Or, Signup with</small>
                        </div>
                        <div class="row" style="justify-content: center;">
                            <a href=""><i class="fa fa-2x fa-facebook-square"></i></a>
                            <a href=""><i class="fa fa-2x fa-google-plus-square"></i></a>
                        </div>
                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/public/js/preloader.js"></script>
    <script>
    var loginFormPane = document.getElementById("loginForm_m");
    var regFormPane = document.getElementById("regForm_m");
    var indicator = document.getElementById("indicator");
    var formContianer = document.getElementById("mobile-form-container");

    function register() {
        formContianer.style.height = "900px";
        regFormPane.style.transform = "translateX(-300px)";
        loginFormPane.style.transform = "translateX(-300px)";
        indicator.style.transform = "translateX(100px)";
    }

    function login() {
        formContianer.style.height = "470px";
        regFormPane.style.transform = "translateX(0px)";
        loginFormPane.style.transform = "translateX(0px)";
        indicator.style.transform = "translateX(0px)";
    }
    </script>

    <script type="text/javascript">
    $(window).on('load resize', function() {
        if ($(window).width() < 750) {
            $('#desktop-login').hide();
            $('#mobile-login').show();
        } else {
            $('#desktop-login').show();
            $('#mobile-login').hide();
        }
    });
    </script>

    <script type="text/javascript" src="/public/js/toggle_login.js"></script>
    <script type="text/javascript" src="/public/js/form_validation.js"></script>
    <script type="text/javascript" src="/util/form/login_form_validation.js"></script>
    <script type="text/javascript" src="/util/form/signup_form_validation.js"></script>

    <?php require 'views/footer.php'; ?>