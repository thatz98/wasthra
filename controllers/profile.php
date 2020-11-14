<?php

class Profile extends Controller{

    function __construct()
    {
        parent::__construct();
        
    }

function editProfile(){
    	$data = array();
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['username'] = $_POST['email'];
        $data['user_type'] = $_POST['user_type'];
        $data['user_id'] = $_POST['user_id'];
        $data['login_id'] = $_POST['login_id'];
        
        

        if(!$this->model->checkExistsWhere($data['username'],$data['login_id'])){
            
            $this->model->updateProfile($data);
            if($data['user_type']=='customer'){
                $addressData = array();
        $addressData['user_id'] = $_POST['user_id'];
        $addressData['address_id'] = $_POST['address_id'];
        $addressData['address_line_1'] = $_POST['address_line_1'];
        $addressData['address_line_2'] = $_POST['address_line_2'];
        $addressData['address_line_3'] = $_POST['address_line_3'];
        $addressData['city'] = $_POST['city'];
        $addressData['postal_code'] = $_POST['postal_code'];
                $this->model->updateAddress($addressData);
            }
            header('location: '.URL.'');
        } else{
        header('location: '.URL.'?error=anotherAccountExists#edit-profile#message');
        }
        
    }

    function changePassword(){
        $prev_url = $_POST['prev_url'];
        if (empty($prev_url)) {
            $prev_url = URL;
        }
        $data = array();
        $data['current_password'] = $_POST['current_password'];
        $data['new_password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $data['prev_url'] = $prev_url;


        $this->model->changePassword($data);
    }

    function addNewAddress(){
        $addressData = array();
        $addressData['user_id'] = Session::get('userData')['user_id'];
        $addressData['address_line_1'] = $_POST['address_line_1'];
        $addressData['address_line_2'] = $_POST['address_line_2'];
        $addressData['address_line_3'] = $_POST['address_line_3'];
        $addressData['city'] = $_POST['city'];
        $addressData['postal_code'] = $_POST['postal_code'];
        $this->model->addNewAddress($addressData);
        if(!empty($_POST['prev_url'])){
            header('Location: '.$_POST['prev_url'].'#profile-card');
        } else{
            header('Location: '.URL.'#profile-card');
        }
        
    }
}