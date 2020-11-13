<?php

class User_Model extends Model{

    function __construct(){
     	parent::__construct();
    }

    function listUsers(){

        $customers = array();
        $admins = array();
        $admins = array();
        $deliveryStaffs = array();


        $customers = $this->db->query("SELECT customer.user_id,customer.first_name,customer.last_name,customer.gender,customer.email,customer.contact_no,customer.is_deleted,login.user_status,login.user_type FROM customer INNER JOIN login ON customer.login_id=login.login_id");
         $admins = $this->db->query("SELECT admin.user_id,admin.first_name,admin.last_name,admin.gender,admin.email,admin.contact_no,admin.is_deleted,login.user_status,login.user_type FROM admin INNER JOIN login ON admin.login_id=login.login_id");
         $owners = $this->db->query("SELECT owner.user_id,owner.first_name,owner.last_name,owner.gender,owner.email,owner.contact_no,owner.is_deleted,login.user_status,login.user_type FROM owner INNER JOIN login ON owner.login_id=login.login_id");
         $deliveryStaffs = $this->db->query("SELECT delivery_staff.user_id,delivery_staff.first_name,delivery_staff.last_name,delivery_staff.gender,delivery_staff.email,delivery_staff.is_deleted,delivery_staff.contact_no,login.user_status,login.user_type FROM delivery_staff INNER JOIN login ON delivery_staff.login_id=login.login_id");

      return array_merge($customers,$admins,$owners,$deliveryStaffs);

    }

    function getUser($id,$type){

        if($type=='customer'){
            return $this->db->query("SELECT customer.user_id,customer.first_name,customer.last_name,customer.gender,customer.email,customer.contact_no,login.login_id,login.user_status,login.user_type FROM customer INNER JOIN login ON customer.login_id=login.login_id WHERE customer.user_id='$id';");
        } else if($type=='admin'){
            return $this->db->query("SELECT admin.user_id,admin.first_name,admin.last_name,admin.gender,admin.email,admin.contact_no,login.login_id,login.user_status,login.user_type FROM admin INNER JOIN login ON admin.login_id=login.login_id WHERE admin.user_id='$id';");
        }else if($type=='owner'){
            return $this->db->query("SELECT owner.user_id,owner.first_name,owner.last_name,owner.gender,owner.email,owner.contact_no,login.login_id,login.user_status,login.user_type FROM owner INNER JOIN login ON owner.login_id=login.login_id WHERE owner.user_id='$id';");
        }else if($type=='delivery_staff'){
            return $this->db->query("SELECT delivery_staff.user_id,delivery_staff.first_name,delivery_staff.last_name,delivery_staff.gender,delivery_staff.email,delivery_staff.contact_no,login.login_id,login.user_status,login.user_type FROM delivery_staff INNER JOIN login ON delivery_staff.login_id=login.login_id WHERE delivery_staff.user_id='$id';");
        }


        
    }

    function create($data){

        $this->db->insert('login',array(
            'username' => $data['username'],
            'password' => $data['password'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type']));
            
            $username = $data['username'];

        $login_id = $this->db->listWhere('login',array('login_id'),"username='$username'"); 

        $this->db->insert($data['user_type'],array(
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'contact_no' => $data['contact_no'],
            'login_id' => $login_id['login_id']
        ));
    }


    function update($data){

        if($data['user_type']==$data['prev_user_type']){
                $this->db->update($data['user_type'],array(
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'gender' => $data['gender'],
                    'email' => $data['email'],
                    'contact_no' => $data['contact_no']),"user_id = '{$data['user_id']}'");
        
                    $this->db->update('login',array('user_status' => $data['user_status'],'username' => $data['username']),"login_id = '{$data['login_id']}'");
            
        } else{    
            $this->db->insert($data['user_type'],array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'email' => $data['email'],
                'contact_no' => $data['contact_no'],
                'login_id' => $data['login_id']
            ));

            $this->db->update('login',array('user_type' => $data['user_type'],'user_status' => $data['user_status'],'username' => $data['username']),"login_id = '{$data['login_id']}'");

            $this->db->update($data['prev_user_type'],array('is_deleted' => 'yes'),"user_id = '{$data['user_id']}'");
        }
        
        
        

    }

    function checkExists($username){
        $user = $this->db->listWhere('login',array('username'),"username='$username'");

        if($user){
            return true;
        } else{
            return false;
        }
    }

function checkExistsWhere($username,$loginId){
        $user = $this->db->listWhere('login',array('username'),"username='$username' AND login_id<>$loginId");

        if($user){
            return true;
        } else{
            return false;
        }
    }

    function delete($userId,$userType){
        $data = $this->db->listWhere($userType,array('login_id'),"user_id='$userId'");

        if($userType=='owner'){
            return false;
        } else{
            $this->db->update('login',array('user_status' => 'blocked'),"login_id = '{$data['login_id']}'");
            $this->db->update($data['user_type'],array('is_deleted' => 'yes'),"user_id = '$userId'");
        }

    }

    




}