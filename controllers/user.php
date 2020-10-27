<?php

class User extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
    	$this->view->userList = $this->model->listUsers();
        
   	    $this->view->render('dashboard/admin/user');
    }

    function create(){
    	$data = array();
    	$data['nic'] = $_POST['nic'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['username'] = $_POST['email'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['user_status'] = 'new';
        $data['user_type'] = $_POST['user_type'];

        $this->model->create($data);
        header('location: '.URL.'user');
    }

    function edit($id){
        $this->view->user = $this->model->getUser($id);
        $this->view->render('dashboard/admin/edit_user');
    }

    function editSave(){
    	$data = array();
    	$data['nic'] = $_POST['nic'];
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['username'] = $_POST['email'];
        $data['user_status'] = $_POST['user_status'];
        $data['user_type'] = $_POST['user_type'];

        $this->model->update($data);
        header('location: '.URL.'user');
    }

    function delete($id){
        $this->model->delete($id);
        header('location: '.URL.'user');
    }
}
