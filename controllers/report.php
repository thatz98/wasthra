<?php

class Report extends Controller{

    function __construct()
    {
        parent::__construct();
    
    }

    function generateReport(){
        PDFGenerator::init();
    }
}
