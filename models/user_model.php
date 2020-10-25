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


        $customers = $this->db->query("SELECT customer.nic,customer.first_name,customer.last_name,customer.gender,customer.email,customer.contact_no,customer.user_status,login.user_type FROM customer INNER JOIN login ON customer.nic=login.nic");
         $admins = $this->db->query("SELECT admin.nic,admin.first_name,admin.last_name,admin.gender,admin.email,admin.contact_no,admin.user_status,login.user_type FROM admin INNER JOIN login ON admin.nic=login.nic");
         $owners = $this->db->query("SELECT admin.nic,owner.first_name,owner.last_name,owner.gender,owner.email,owner.contact_no,owner.user_status,login.user_type FROM owner INNER JOIN login ON owner.nic=login.nic");
         $deliveryStaffs = $this->db->query("SELECT delivery_staff.nic,delivery_staff.first_name,delivery_staff.last_name,delivery_staff.gender,delivery_staff.email,delivery_staff.contact_no,delivery_staff.user_status,login.user_type FROM delivery_staff INNER JOIN login ON delivery_staff.nic=login.nic");

      return array_merge($customers,$admins,$owners,$deliveryStaffs);

    }

    public function getUser($id){

        return $this->db->listWhere('user',array('nic','first_name','last_name','gender','email','contact_no','user_status','user_type'),"nic='$id'");
    }

    public function create($data){

        $this->db->insert('user',array(
            'nic' => $data['nic'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => $data['password'],
            'contact_no' => $data['contact_no'],
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