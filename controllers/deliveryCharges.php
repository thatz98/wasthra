<?php

class DeliveryCharges extends Controller{
    
    function __construct()
    {
        parent::__construct();
        
    }

    function index(){
        
        $this->view->deliverycharges = $this->model->listDeliveryCharges();
        $this->view->render('dashboard/owner/delivery_charges');
        
    }

    function create(){

    	$data= array();
    	$data['city']= $_POST['city'];
    	$data['delivery_fee']=$_POST['delivery_fee'];

    	$this->model->create($data);
        header('location: '.URL.'deliveryCharges');
        
    }

    function edit($id){

        $this->view->getcharges = $this->model->getDeliveryCharges($id);
        $this->view->render('dashboard/owner/edit_delivery_charges');

     }
 
     function editSave(){

         $data = array();
         $data['prev_city'] = $_POST['prev_city'];
         $data['city'] = $_POST['city'];
         $data['delivery_fee'] = $_POST['delivery_fee'];
 
         $this->model->update($data);
         header('location: '.URL.'deliveryCharges');

     }
 

    function delete($id){

        $this->model->delete($id);
        header('location:'.URL.'deliveryCharges');

    }


}