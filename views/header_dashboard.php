<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/canvas.css">
    <script src="<?php echo URL ?>public/js/libs/fontawesome.js"></script>
    <script src="<?php echo URL ?>public/js/libs/jquery.min.js"></script>
</head>

<body>
<div id="message" class="overlay">
    <div class="popup">
        <a href="#"><i class="fa fa-times-circle"></i></a>
        <div class="content">
            Error: <?php if($_GET['error']=='usernameExists'){
                echo 'User name exists, please chose another';}?>!
        </div>
    </div>
</div>
    <div class="header-plain">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FFE8DA" fill-opacity="1" d="M0,224L26.7,218.7C53.3,213,107,203,160,181.3C213.3,160,267,128,320,128C373.3,128,427,160,480,154.7C533.3,149,587,107,640,106.7C693.3,107,747,149,800,144C853.3,139,907,85,960,74.7C1013.3,64,1067,96,1120,101.3C1173.3,107,1227,85,1280,101.3C1333.3,117,1387,171,1413,197.3L1440,224L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path></svg>
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                        <li><a href="<?php echo URL; ?>user">Users</a></li>
                        <li><a href="<?php echo URL; ?>orders">Orders</a></li>
                        <li><a href="<?php echo URL; ?>products">Products</a></li>
                        <li><a href="<?php echo URL; ?>productCategories">Product Categories</a></li>
                        
                    </ul>
                </nav>
                <?php if(Session::get('loggedIn')==true): ?>
                            <div class="user-box">
                                <div class="user-info"><p>Hi, <?php echo Session::get('firstName')?>!</p></div>
                                <a class="user-box-btn" href="#profile-card">
                                    <i class="fa fa-user-circle-o fa-2x"></i>
                                </a>
                            </div>
                <?php endif; ?>
                <img src="<?php echo URL; ?>public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
            
        </div>
    </div>
