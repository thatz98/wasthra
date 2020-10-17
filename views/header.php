<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzSnah4pBNvwR3PN53ZaezSBUmNGNuf3U&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <script src="https://kit.fontawesome.com/9a9d2e1253.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-plain">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                <div class="search-bar">
<form onsubmit="event.preventDefault();" role="search">
  <input id="search" type="search" placeholder="Search..." autofocus required />
  <button type="submit"><i class="fa fa-search"></i></button>    
</form>
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
                
                <a class="bag" href=""><i class="fa fa-shopping-bag fa-2x"></i></a>
                <img src="<?php echo URL; ?>public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
            
        </div>
    </div>
