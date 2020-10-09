<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a9d2e1253.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-plain">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Users</a></li>
                        <li><a href="">Orders</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">Product Categories</a></li>
                        <li><a href="">Reports</a></li>
                        <?php if(Session::get('loggedIn')==true): ?>
                            <li><a href="<?php echo URL; ?>login/logout">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo URL; ?>login">Login/Signup</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <img src="images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>
            
        </div>
    </div>
