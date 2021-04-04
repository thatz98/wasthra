<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($this->title)) ? $this->title . ' | Wasthra' : 'Wasthra'; ?></title>
    <script src="/public/js/libs/fontawesome.js"></script>
    <link rel="stylesheet" href="/public/css/all.css">
    <link rel="stylesheet" href="/public/css/wave.css">
    <link rel="stylesheet" type="text/css" href="/public/css/bag_dropdown.css">
    <script src="/public/js/libs/jquery.min.js"></script>
</head>

<body>
    <div id="preloader-overlay"></div>
    <div id="spinner"></div>
    <?php if (Session::get('loggedIn') == true) {
        require 'views/user/profile_card.php';
    } ?>
    <?php require 'views/error/error_popup.php'; ?>
    <div class="header" id="header">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="/public/images/logo.png" width="125px">
                </div>

                <nav>
                    <ul id="menuItems">
                        <li>
                            <div class="search-bar">
                                <form action="<?php echo URL; ?>search/byMultiFilter" method="post">
                                    <input id="search" name="keyword" type="search" placeholder="Search..." autofocus required>

                                    <button type="submit"><i class="fa fa-search"></i></button>

                                </form>
                                <ul id="results" class="results">
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?php echo URL; ?>" class="<?php if (isset($this->title) && $this->title == 'Home') echo 'active'; ?>">Home</a></li>
                        <li><a href="<?php echo URL; ?>shop" class="<?php if (isset($this->title) && $this->title == 'Shop') echo 'active'; ?>">Shop</a></li>
                        <li><a href="<?php echo URL; ?>contactUS" class="<?php if (isset($this->title) && $this->title == 'Contact Us') echo 'active'; ?>">Contact Us</a></li>
                        <?php if (Session::get('loggedIn') !== true) : ?>
                            <li><a href="<?php echo URL; ?>login" onclick="passScreenSize()">Login/Signup</a></li>

                        <?php endif;
                        if (Session::get('loggedIn') == true && Session::get('userType') == 'customer') : ?>
                            <li><a href="<?php echo URL; ?>orders/myOrders" class="<?php if (isset($this->title) && $this->title == 'My Orders') echo 'active'; ?>">My Orders</a></li>
                            <li><a href="<?php echo URL; ?>wishlist" class="<?php if (isset($this->title) && $this->title == 'Wishlist') echo 'active'; ?>">Wishlist</a></li>
                        <?php endif;
                        if (Session::get('loggedIn') == true && Session::get('userType') !== 'customer') : ?>
                            <li><a href="<?php echo URL; ?>controlPanel">Control Panel</a></li>

                        <?php endif; ?>
                    </ul>
                </nav>

                <?php if (Session::get('loggedIn') == true) : ?>
                    <div class="user-box">
                        <div class="user-info">
                            <p>Hi, <?php echo Session::get('userData')['first_name'] ?>!</p>
                        </div>
                        <a class="user-box-btn" href="#profile-card">
                            <i class="fa fa-user-circle-o fa-2x"></i>
                        </a>
                    </div>
                <?php endif; ?>
                <a class="bag" id="mobile-search" href="<?php echo URL; ?>search/advancedSearch"><i class="fa fa-search"></i></a>
                <a class="bag" id="bag" <?php if (Session::get('loggedIn') == 'true') { ?>onclick="bagDown()" <?php if (Session::get('userType') != 'customer') {
                                                                                                                    echo 'hidden';
                                                                                                                }
                                                                                                            } else { ?>href="<?php echo URL; ?>login?loginRequired=true" <?php } ?>><i class="fa fa-shopping-bag fa-2x"></i><?php if ((Session::get('cartCount'))) {
                                                                                                                                                                                                                                echo '<span class="badge">' . Session::get('cartCount') . '</span>';
                                                                                                                                                                                                                            } ?></a>

                <img src="/public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
            <?php require 'views/shop/cart_dropdown.php'; ?>
            <div class="row">
                <div class="col-2">
                    <h1>It's all about <br>Tees!</h1>
                    <p>Are you the person who just wakes up, puts your T-shirt on and runs out of the house? <br>Or do you wake up an hour early - get your mental notes together, fix you a little coffee... prepare yourself for the day and try to do something really great? It begins with you.</p>
                    <a href="<?php echo URL; ?>shop" class="btn">Shop Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="/public/images/image1.png">
                </div>
            </div>
        </div>
    </div>
    <div class="loader"></div>
    <div class="area" id="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script type="text/javascript" src="/public/js/preloader_index.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#area').height(
        //         $('#header').height()
        //     );
        // });

        // $(document).load(function() {
        //     $('#area').height(
        //         $('#header').height()
        //     );
        // });

        // $(window).load(function() {
        //     $('#area').height(
        //         $('#header').height()
        //     );
        // });

        // $(window).ready(function() {
        //     $('#area').height(
        //         $('#header').height()
        //     );
        // });
        
        $(window).resize(function() {
            $('#area').height(
                $('#header').height()
            );
        });


        function passScreenSize() {
            var size = $(window).width();
            document.getElementById('screen-size').value = size;
            document.getElementById('login-redirect').submit();

        }
    </script>