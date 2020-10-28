<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
   <!--- <link rel="stylesheet" href="<?php echo URL; ?>public/css/canvas.css"> --->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a9d2e1253.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php if(Session::get('loggedIn')==true){
    require 'views/user/profile_card.php';
} ?>
 <!---   <aside class="canvas">
  
</aside> --->
    <div class="header">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL;?>public/images/logo.png" width="125px">
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
                
                <a class="bag" href="#" id="bag" onclick="bagDown()"><i class="fa fa-shopping-bag fa-2x"></i><span class="badge">3</span></a>
                
                <img src="<?php echo URL; ?>public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
            <?php require 'views/shop/cart_dropdown.php'; ?>
            <div class="row">
                <div class="col-2">
                    <h1>It's all about <br>clothing!</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. A praesentium aspernatur molestias
                        dolor eius inventore voluptatem nostrum consequuntur dolorem. <br>Vero tempore deserunt hic
                        laboriosam eligendi eos maiores ad. Consequuntur, ipsum.</p>
                    <a href="" class="btn">Shop Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="<?php echo URL; ?>public/images/image1.png">
                </div>
            </div>
        </div>
    </div>