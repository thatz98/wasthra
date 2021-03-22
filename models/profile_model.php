<?php

class Profile_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function checkExistsWhere($username,$loginId){
        $user = $this->db->selectOneWhere('login',array('username'),"username=:username AND login_id<>:loginId",array('username'=>$username,'loginId'=>$loginId));

        if($user){
            return true;
        } else{
            return false;
        }
    }
    
    function updateProfile($data){
        $this->db->update($data['user_type'],array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no']),"user_id = :user_id",array('user_id'=>$data['user_id']));

            $this->db->update('login',array('username' => $data['username']),"login_id = :login_id",array('login_id'=>$data['login_id']));

            Session::set('username', $data['username']);
            $loginId = Session::get('loginId');
            $userData = $this->db->selectOneWhere(Session::get('userType'), array('user_id', 'first_name', 'last_name', 'gender', 'contact_no', 'email'), "login_id = :login_id",array('login_id'=>$loginId));
            Session::set('userData', $userData);
    }

    function updateAddress($data){
        $userId = $data['user_id'];
        $addressExist = $this->db->selectOneWhere('delivery_address', array('address_id'), "user_id = :user_id",array('user_id'=>$userId));
        if(empty($addressExist)){
            $this->db->insert('delivery_address',array(
                'user_id' => $data['user_id'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'address_line_3' => $data['address_line_3'],
                'postal_code' => $data['postal_code'],
                'city' => $data['city']
            ));
        } else{
            $this->db->update('delivery_address',array(
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'address_line_3' => $data['address_line_3'],
                'postal_code' => $data['postal_code'],
                'city' => $data['city']),"address_id = :address_id",array('address_id'=>$data['address_id']));
        }
        $addressData = $this->db->selectOneWhere('delivery_address', array('address_id', 'postal_code', 'address_line_1', 'address_line_2', 'address_line_3', 'city'), "user_id=:user_id LIMIT 1",array('user_id'=>$userId));
        Session::set('addressData',$addressData);
    }

    function changePassword($data){
        $username = Session::get('username');

        $user = $this->db->selectOneWhere('login', array('password'), 'username=:username',array('username'=>$username));

        if ($user) {
            if (password_verify($data['current_password'], $user['password'])) {
                $this->db->update('login', array('password' => $data['new_password']), 'username=:username',array('username'=>$username));
                header('location: ' . $data['prev_url'].'?success=pwdChanged#message');
            } else{
                header('location: ' . $data['prev_url'].'?error=currentPwdIncorrect#message');
            }
        }
    }

    function addNewAddress($data){
            $this->db->insert('delivery_address',array(
                'user_id' => $data['user_id'],
                'address_line_1' => $data['address_line_1'],
                'address_line_2' => $data['address_line_2'],
                'address_line_3' => $data['address_line_3'],
                'city' => $data['city'],
                'postal_code' => $data['postal_code']
            ));
        $userId = Session::get('user_id');
        $addressData = $this->db->selectOneWhere('delivery_address', array('address_id', 'postal_code', 'address_line_1', 'address_line_2', 'address_line_3', 'city'), "user_id=:userId LIMIT 1",array('userId'=>$userId));
        Session::set('addressData',$addressData);
    }

}