<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Wasthra</title>
<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a9d2e1253.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="">Home</a></li>
                        <li><a href="">Shop</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact Us</a></li>
                        <?php if(Session::get('loggedIn')==true): ?>
                            <li><a href="<?php echo URL; ?>login/logout">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo URL; ?>login">Login/Signup</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <img src="<?php echo URL; ?>public/images/cart.png" width="30px" height="30px">
                <img src="<?php echo URL; ?>public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
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