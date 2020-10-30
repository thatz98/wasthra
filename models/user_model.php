<?php

class User_Model extends Model{

    public function __construct(){
     	parent::__construct();
    }

    public function listUsers(){

        $customers = array();
        $admins = array();
        $admins = array();
        $deliveryStaffs = array();


        $customers = $this->db->query("SELECT customer.user_id,customer.first_name,customer.last_name,customer.gender,customer.email,customer.contact_no,login.user_status,login.user_type FROM customer INNER JOIN login ON customer.login_id=login.login_id");
         $admins = $this->db->query("SELECT admin.user_id,admin.first_name,admin.last_name,admin.gender,admin.email,admin.contact_no,login.user_status,login.user_type FROM admin INNER JOIN login ON admin.login_id=login.login_id");
         $owners = $this->db->query("SELECT owner.user_id,owner.first_name,owner.last_name,owner.gender,owner.email,owner.contact_no,login.user_status,login.user_type FROM owner INNER JOIN login ON owner.login_id=login.login_id");
         $deliveryStaffs = $this->db->query("SELECT delivery_staff.user_id,delivery_staff.first_name,delivery_staff.last_name,delivery_staff.gender,delivery_staff.email,delivery_staff.contact_no,login.user_status,login.user_type FROM delivery_staff INNER JOIN login ON delivery_staff.login_id=login.login_id");

      return array_merge($customers,$admins,$owners,$deliveryStaffs);

    }

    public function getUser($id){

        return $this->db->query("SELECT customer.user_id,customer.first_name,customer.last_name,customer.gender,customer.email,customer.contact_no,login.user_status,login.user_type FROM customer INNER JOIN login ON customer.login_id=login.login_id WHERE customer.user_id='$id';");
    }

    public function create($data){

        $this->db->insert($data['user_type'],array(
            'nic' => $data['nic'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password'],
            'contact_no' => $data['contact_no'],
            'user_status' => $data['user_status']));

        $this->db->insert('login',array(
            'nic' => $data['nic'],
            'username' => $data['username'],
            'password' => $data['password'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type']));
    }


    public function update($data){

        $this->db->update('user',array(
            'nic' => $data['nic'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'username' => $data['email'],
            'contact_no' => $data['contact_no'],
            'user_status' => $data['user_status'],
            'user_type' => $data['user_type']),"nic = '{$data['nic']}'");

    }

    public function delete($id){
        $data = $this->db->listWhere('user',array('user_type'),"nic='$id'");

        if($data['user_type']=='owner'){
            return false;
        } else{
            $this->db->delete('user',"nic='$id'");
        }

    }




}