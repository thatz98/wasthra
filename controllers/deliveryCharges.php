<?php

class DeliveryCharges extends Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Diplay the delivery charge page
     *
     * @return void
     */
    function index() {
        $this->view->title = 'Delivery Charges';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i>Delivery Charges';

        $this->view->deliverycharges = $this->model->listDeliveryCharges();
        $this->view->render('control_panel/owner/delivery_charges');
    }

    /**
     * Add new delivery charge
     *
     * @return void
     */
    function create() {

        $data = array();
        $data['city'] = $_POST['city'];
        $data['delivery_fee'] = $_POST['delivery_fee'];

        $this->model->create($data);
        header('location: ' . URL . 'deliveryCharges');
    }

    /**
     * Display edit delivery charge page
     *
     * @param  mixed $id Id of the delivery charge that need to be updated
     * @return void
     */
    function edit($id) {
        $this->view->title = 'Delivery Charges';
        $this->view->breadcumb = '<a href="' . URL . '">Home</a> <i class="fas fa-angle-right"></i> <a href="' . URL . 'controlPanel">Control Panel</a> <i class="fas fa-angle-right"></i><a href="' . URL . 'deliveryCharges">Delivery Charges</a> <i class="fas fa-angle-right"></i>Edit Delivery Charges';

        $this->view->getcharges = $this->model->getDeliveryCharges($id);
        $this->view->render('control_panel/owner/edit_delivery_charges');
    }

    /**
     * Update delivery charges
     *
     * @return void
     */
    function editSave() {

        $data = array();
        $data['prev_city'] = $_POST['prev_city'];
        $data['city'] = $_POST['city'];
        $data['delivery_fee'] = $_POST['delivery_fee'];

        $this->model->update($data);
        header('location: ' . URL . 'deliveryCharges');
    }


    /**
     * Delete existing delivery charge
     *
     * @param  mixed $id Id of the charge that need to be deleted
     * @return void
     */
    function delete($id) {

        $this->model->delete($id);
        header('location:' . URL . 'deliveryCharges');
    }
}
