<?php

class GenerateReport extends Controller {

    function __construct() {

        parent::__construct();
        // restrict access to the admin only
        Authenticate::adminAuth();
    }

    function index() {

        $this->view->render('control_panel/owner/generate_report');
    }

}