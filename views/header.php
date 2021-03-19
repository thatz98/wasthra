<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($this->title)) ? $this->title . ' | Wasthra' : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="/wasthra/public/css/all.css">
    <link rel="stylesheet" type="text/css" href="/wasthra/public/css/bag_dropdown.css">
    <link rel="stylesheet" href="/wasthra/public/css/libs/font-awesome.min.css">
    <script src="/wasthra/public/js/libs/jquery.min.js"></script>
    <script src="/wasthra/public/js/libs/fontawesome.js"></script>

</head>

<body>
    <div id="preloader-overlay"></div>
    <div id="spinner"></div>
    <?php if (Session::get('loggedIn') == true) {
        require 'views/user/profile_card.php';
    } ?>

    <?php require 'views/error/error_popup.php'; ?>
    <div class="header-plain" id="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFE8DA" fill-opacity="1" d="M0,224L26.7,218.7C53.3,213,107,203,160,181.3C213.3,160,267,128,320,128C373.3,128,427,160,480,154.7C533.3,149,587,107,640,106.7C693.3,107,747,149,800,144C853.3,139,907,85,960,74.7C1013.3,64,1067,96,1120,101.3C1173.3,107,1227,85,1280,101.3C1333.3,117,1387,171,1413,197.3L1440,224L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path>
        </svg>

        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="/wasthra/public/images/logo.png" width="125px">
                </div>

                <nav>
                    <ul id="menuItems">
                        <li>
                        <div class="search-bar">
                                <form action="<?php echo URL; ?>search/byMultiFilter" method="post">
                                    <input id="search" name="keyword" type="search" placeholder="Search..." autofocus required />
                                    
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
                            <li><a href="<?php echo URL; ?>login">Login/Signup</a></li>

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

                <a class="bag" id="bag" <?php if (Session::get('loggedIn') == 'true') { ?>onclick="bagDown()" <?php if (Session::get('userType') != 'customer') {
                                                                                                                echo 'hidden';
                                                                                                            }
                                                                                                        } else { ?>href="<?php echo URL; ?>login?loginRequired=true" <?php } ?>><i class="fa fa-shopping-bag fa-2x"></i><?php if ((Session::get('cartCount'))) {
                                                                                                                                                                                                                                                                                            echo '<span class="badge">' . Session::get('cartCount') . '</span>';
                                                                                                                                                                                                                                                                                        } ?></a>

                <img src="/wasthra/public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
            <?php require 'views/shop/cart_dropdown.php'; ?>

        </div>
        <div class="container">
            <div class="breadcumbs">
                <?php if (isset($this->breadcumb)) echo $this->breadcumb; ?>
            </div>

        </div>
    </div>

    <script type="text/javascript" src="/wasthra/public/js/preloader.js"></script>