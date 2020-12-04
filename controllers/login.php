<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Display login page
     *
     * @return void
     */
    function index() {
        $this->view->render('user/login');
    }

    /**
     * Display login page when the customer clicks on the cart without having logged in
     *
     * @return void
     */
    function cartRequireLogin() {
        $this->view->render('user/login');
    }

    /**
     * Login the user to the system
     *
     * @return void
     */
    function run() {
        $this->model->run();
    }

    /**
     * Logout the user from the system
     *
     * @return void
     */
    function logout() {
        Session::destroy();
        header('location: ../');
        exit;
    }

    /**
     * Sign up customer to the system
     *
     * @return void
     */
    function signup() {

        if (!$this->model->checkAccountExist($_POST['email'])) {
            $token = $this->generateRandomString(97);
            $data = array();
            $data['first_name'] = $_POST['first_name'];
            $data['last_name'] = $_POST['last_name'];
            $data['gender'] = $_POST['gender'];
            $data['email'] = $_POST['email'];
            $data['contact_no'] = $_POST['contact_no'];
            $data['username'] = $_POST['email'];
            $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data['user_status'] = 'new';
            $data['user_type'] = 'customer';
            $data['token'] = $token;

            $this->model->signup($data);

            if ($this->sendVerficationEmail($data['email'], $token)) {
                header('location: ../login?success=signUp#message');
            } else {
                header('location: ../login?error=somethingWrong#message');
            }
        } else {
            header('Location: ./?error=accountExists#message');
        }
    }

    /**
     * Send verification email after sign up
     *
     * @param  mixed $to Email address of the new registered customer
     * @param  mixed $token Used to identify the user
     * @return void
     */
    function sendVerficationEmail($to, $token) {
        $verificationUrl = '<a href="' . URL . 'login/verifyAccount/' . $to . '/' . $token . '">here</a>';
        $emailBody = 'Hi, <br>To verfiy your account, click ' . $verificationUrl;
        $subject = 'Verify Account';
        $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
        if (mail($to, $subject, $emailBody, $header)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Resend the verification email
     *
     * @param  mixed $username Email address of the user
     * @return void
     */
    function resendVerificationEmail($username) {
        $token = $this->generateRandomString(97);
        $this->model->updateToken($username, $token);
        $this->sendVerficationEmail($username, $token);
        header('Location: ' . URL . 'login?success=resentVerification#message');
    }

    /**
     * Verify the account once the user click on the verification link which has been sent to the mail
     *
     * @param  mixed $username Email address of the user
     * @param  mixed $token Token which has been generated while sending the verification mail
     * @return void
     */
    function verifyAccount($username, $token) {
        if ($this->model->checkVerifyToken($username, $token)) {
            $this->model->verifyAccount($username);
            header('Location: ' . URL . 'login?success=accountVerfied#message');
        } else {
            header('Location: ' . URL . 'login?error=incorrectToken#message');
        }
    }

    /**
     * Handles initial forgot password process
     *
     * @return void
     */
    function forgotPassword() {
        $username = $_POST['check_username'];
        if ($this->model->checkAccountExist($username)) {
            $token = $this->generateRandomString(97);
            $this->model->createRecord($username, $token);
            $this->sendResetPasswordEmail($username, $token);
        } else {
            // sleep for 2 seconds to mimic email sending duration
            sleep(2);
        }
    }

    /**
     * Send password reset email to the user
     *
     * @param  mixed $to Email address of the user that request password reset
     * @param  mixed $token Generated to identify the user when he clicks the reset link
     * @return void
     */
    function sendResetPasswordEmail($to, $token) {
        $resetUrl = '<a href="' . URL . 'login/resetPassword/' . $to . '/' . $token . '">here</a>';
        $emailBody = 'Hi, </br>To reset your password, click ' . $resetUrl;
        $subject = 'Reset Password';
        $header = "From: group15s2202@gmail.com\r\nContent-Type: text/html;";
        if (mail($to, $subject, $emailBody, $header)) {
            header('Location: ' . URL . 'login?success=resetLinkSent#message');
        } else {
            header('Location: ' . URL . 'login?error=mailNotSent#message');
        }
    }

    /**
     * Validate the link and display the password reset page
     *
     * @param  mixed $username Email address of the user
     * @param  mixed $token Token which has been sent to the user with the email
     * @return void
     */
    function resetPassword($username, $token) {
        if ($this->model->checkToken($username, $token)) {
            $this->view->username = $username;
            $this->view->render('user/reset_password');
        } else {
            header('Location: ' . URL . 'login?error=incorrectToken#message');
        }
    }

    /**
     * Update the existing password
     *
     * @return void
     */
    function updatePassword() {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        $this->model->updatePassword($data);

        header('Location: ' . URL . 'login?success=pwdChanged#message');
    }

    /*
    function getRandomString(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
    */

    /**
     * Generate a random string
     *
     * @param  mixed $length Length of the string that need to be generated
     * @return void
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
