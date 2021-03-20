<?php

class ContactUs extends Controller {
    
    function __construct() {

        parent::__construct();
    }
    
    /**
     * Diplay the contact us page
     *
     * @return void
     */
    function index() {
        
        $this->view->title = 'Contact Us';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> Contact Us';
        $this->view->deliveryCharges = $this->model->getDeliveryCharges();

        $this->view->render('user/contactUS');
    }

    function contact(){

        $header = "From: group15s2202@gmail.com\r\nContent-Type:text/html;";
        $msg = "Name: ".$_POST['first_name']. ' ' .$_POST['last_name'] . " Mobile No: ". $_POST['contact_no'] . " Email: " . $_POST['email']  
        . " Message: " .$_POST['message'];
        $subject = 'Message from the user';
        $reciever = 'group15s2202@gmail.com';
        mail($reciever, $subject, $msg, $header);
        header('location: ' . URL . 'contactUS');
    }
}
