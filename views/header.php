<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
   <!---- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> ----->
    <script src="<?php echo URL ?>public/js/libs/maps.js"></script>
    <script src="<?php echo URL ?>public/js/libs/jquery.min.js"></script>
    <script src="<?php echo URL ?>public/js/libs/fontawesome.js"></script>
</head>

<body>
<?php if(Session::get('loggedIn')==true){
    require 'views/user/profile_card.php';
} ?>
    

    <div class="header-plain">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                
                <nav>
                    <ul id="menuItems">
                    <li><div class="search-bar">
                    <form onsubmit="event.preventDefault();" role="search">
                        <input id="search" type="search" placeholder="Search..." autofocus required />
                        <button type="submit"><i class="fa fa-search"></i></button>    
                    </form>
                </div></li>
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
            
        </div>
    </div>
