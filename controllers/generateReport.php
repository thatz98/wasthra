<?php

class GenerateReport extends Controller {

    function __construct() {

        parent::__construct();
    }

    function index() {

        $this->view->render('control_panel/owner/generate_report');
    }

}