<div id="message" class="overlay">
    <div class="popup message-popup">
        <div class="row-right">
            <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="row">
            <div class="content">
                <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'accountExists') { ?>
                        <p class="error">Account on the entered email already exists, try login!</p>
                    <?php } else if ($_GET['error'] == 'anotherAccountExists') { ?>
                        <p class="error">Account on the entered email already exists in another account, try different!</p>
                    <?php } else if ($_GET['error'] == 'loggedAlready') { ?>
                        <p class="error">You have already logged in! Log out first if you want to login to a different account.</p>
                    <?php } else if ($_GET['error'] == 'wrongPwd') { ?>
                        <p class="error">Incorrect password! Try again or click forgot password to reset.</p>
                    <?php } else if ($_GET['error'] == 'noAccount') { ?>
                        <p class="error">Account does not exist! Check your username or Sign up to get one.</p>
                    <?php }
                } else if (isset($_GET['success'])) {
                    if ($_GET['success'] == 'signUp') { ?>
                        <p class="sucess">Your account has been made, <br /> Please verify it by clicking the activation link
                            that has been send to your email...</p>
                <?php } else {
                        header('location: ./#');
                    }
                } ?>
            </div>
        </div>

    </div>
</div>