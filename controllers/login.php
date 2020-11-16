<?php

class Login extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index(){
            $this->view->render('user/login');
    }

    function cartRequireLogin(){
        $this->view->render('user/login');
    }

    function run(){
    	$this->model->run();
    }

    function logout(){
        	Session::destroy();
        	header('location: ../');
        	exit;
    }

    function signup(){

        if(!$this->model->checkAccountExist($_POST['email'])){
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
            
            if($this->sendVerficationEmail($data['email'], $token)){
                header('location: ../login?success=signUp#message');
            } else{
                header('location: ../login?error=somethingWrong#message');
            }

        } else{
            header('Location: ./?error=accountExists#message');
        }
        
    }

    function sendVerficationEmail($to, $token)
    {
        $verificationUrl = '<a href="'.URL.'login/verifyAccount/'.$to.'/'.$token.'">here</a>';
        $emailBody = 'Hi, <br>To verfiy your account, click ' . $verificationUrl;
        $subject = 'Verify Account';
        $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
        if(mail($to, $subject, $emailBody, $header)){
            return true;
        } else{
            return false;
        }
    }

    function resendVerificationEmail($username){
        $token = $this->generateRandomString(97);
        $this->model->updateToken($username,$token);
        $this->sendVerficationEmail($username,$token);
        header('Location: '.URL.'login?success=resentVerification#message');
    }

    function verifyAccount($username, $token)
    {
        if($this->model->checkVerifyToken($username,$token)){
            $this->model->verifyAccount($username);
            header('Location: '.URL.'login?success=accountVerfied#message');
        } else{
            header('Location: '.URL.'login?error=incorrectToken#message');
        }
    }

    function changePassword(){
        $this->view->render('user/change_password');
    }

    function forgotPassword(){
        $username = $_POST['check_username'];
            if($this->model->checkAccountExist($username)){
                $token = $this->generateRandomString(97);
                $this->model->createRecord($username, $token);
                $this->sendResetPasswordEmail($username, $token);
            } else {
                // the input username is invalid
                // do not display a message saying 'username as invalid'
                // that is a security issue. Instead,
                // sleep for 2 seconds to mimic email sending duration
                sleep(2);
            }
        }
        // whatever be the case, show the same message for security purposes

    function sendResetPasswordEmail($to, $token)
    {
        $resetUrl = '<a href="'.URL.'login/resetPassword/'.$to.'/'.$token.'">here</a>';
        $emailBody = 'Hi, </br>To reset your password, click ' . $resetUrl;
        $subject = 'Reset Password';
        $header = "From: group15s2202@gmail.com\r\nContent-Type: text/html;";
        if(mail($to, $subject, $emailBody, $header)){
            header('Location: '.URL.'login?success=resetLinkSent#message');
        } else{
            header('Location: '.URL.'login?error=mailNotSent#message');
        }
    }

    function resetPassword($username,$token)
    {
        if($this->model->checkToken($username,$token)){
            $this->view->username = $username;
            $this->view->render('user/reset_password');
        } else{
            header('Location: '.URL.'login?error=incorrectToken#message');
        }

    }

    function updatePassword()
    {
        $data = array();
        $data['username'] = $_POST['username'];
        $data['password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        $this->model->updatePassword($data);

        header('Location: '.URL.'login?success=pwdChanged#message');

    }

    /**
     * use this function if you have PHP version 7 or greater
     * else use the below fuction generateRandomString
     *
     * @param int $length
     * @param string $keyspace
     * @throws \RangeException
     * @return string
     */
    function getRandomString(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string
    {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++ $i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    /**
     * this generates predictable random strings.
     * So the best
     * option is to use the above function getRandomString
     * and to use that, you need PHP 7 or above
     *
     * @param number $length
     * @return string
     */
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i ++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


}