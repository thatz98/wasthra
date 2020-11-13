<div id="message" class="overlay">
    <div class="popup message-popup">
        <div class="row-right">
            <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        </div>
        <div class="row">
            <div class="content">
                <?php if (isset($_GET['error'])) {
                    switch ($_GET['error']) {
                        case 'accountExists':
                            $msg = 'Account on the entered
                            email already exists, try login!';
                            break;
                        case 'anotherAccountExists':
                            $msg = 'Account on the entered
                            email already exists in another account, try different!';
                            break;
                        case 'loggedAlready':
                            $msg = 'You have already logged
                            in! Log out first if you want to login to a different account.';
                            break;
                        case 'wrongPwd':
                            $msg = 'Incorrect password! Try
                            again or click forgot password to reset.';
                            break;
                        case 'noAccount':
                            $msg = 'Account does not exist!
                            Check your username or Sign up to get one.';
                            break;
                            case 'notVerified':
                                if(isset($_GET['username'])){
                                    $msg = 'Your account has not been verified! Please verfiy the account with the link which has been sent to your email.</p>
                                    <p>Click <a href="'.URL.'login/resendVerificationEmail/'.$_GET['username'].'">here</a> to resend the mail.';
                                }
                                break;
                                
                    } ?>
                        <p class="error"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $msg; ?></p>
                    <?php 
                } else if (isset($_GET['success'])) {
                    
                    switch ($_GET['success']) {
                    case 'signUp':
                        $msg = 'Your account has been made, <br />
                        Please verify it by clicking the activation link
                        that has been send to your email...';
                        break;
                    case 'itemAddedToCart':
                        $msg = 'Item added to cart successfully...';
                        break;
                        case 'accountVerfied':
                            $msg = 'Your acount has been verfied successfully, you can now login with you email and password.';
                            break;
                            case 'resentVerification':
                                $msg = 'Then verfication link has been resent to your email address successfully, <br />
                                Please verify it by clicking the link.';
                                break;
                } ?>
                        <p class="success"><i class="fa fa-check" aria-hidden="true"></i> <?php echo $msg; ?></p>
                <?php } ?>
            </div>
        </div>

    </div>
</div>