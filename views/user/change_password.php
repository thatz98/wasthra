<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Change Password</h2>
    </div>
    </br>
    <div class="center-content">
        <form class="" method="post">
            <label>Current Password : </label><br>
            <input type="text" name="current_password"><br>

            <label>New Password : </label><br>
            <input type="password" name="new_password"><br>

            <label>Confirm Password : </label><br>
            <input type="password" name="confirm_password"><br>

            <div class="center-btn">
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</div>