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
    <link rel="stylesheet" href="/public/css/libs/font-awesome.min.css">
    <script src="/public/js/libs/fontawesome.js"></script>
    <script src="/public/js/libs/jquery.min.js"></script>
</head>

<body>
<?php require 'views/error/error_popup.php';?>
  
    <div class="header-plain">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="/public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="<?php echo URL; ?>">Home</a></li>
                        <li><a href="<?php echo URL; ?>shop">Shop</a></li>
                        <li><a href="<?php echo URL; ?>contact">Contact Us</a></li>
                    </ul>
                </nav>
                
                <img src="/public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>

        <div class="row">


            <div class="col-2" style="text-align: center;">
                <form action="<?php echo URL;?>login/updatePassword" method="post" id="resetForm">
                    <label>New Password</label><br>
                    <input class="text-center" type="password" name="new_password" onfocusout="validateNewPassword()" id="new_password" data-helper="Password"><div class="helper-text"><span></span></div>
                    <label>Confirm Password</label><br>
                    <input class="text-center" type="password" name="confirm_new_password" onfocusout="validateConfirmNewPassword()" id="confirm_new_password"><div class="helper-text"><span></span></div>
                    <input type="text" value="<?php echo $this->username;?>" name="username" hidden>
                <button type="submit" class="btn">Save Changes</button>
            </form>
            </div>
        </div>
        </div>
    </div>

<script type="text/javascript" src="public/js/form_validation.js"></script>
<script type="text/javascript" src="util/form/reset_form_validation.js"></script>

<?php require 'views/footer.php'; ?>