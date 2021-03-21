<?php

class Report extends Controller{

    function __construct()
    {
        parent::__construct();
    
    }

    function index(){
        $this->pdf = new PDF('p','mm', 'A4', true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor(Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name']);
        $this->pdf->SetTitle('Report');
        $this->pdf->SetSubject('TCPDF Tutorial');
        $this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $this->pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name'] . "\nWasthra Online Shopping", array(0, 64, 255), array(0, 64, 128));
        $this->pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $this->pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $this->pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $this->pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $this->pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        $this->pdf->AddPage();

        // ---------------------------------------------------------

        // Close and output PDF document
        $this->pdf->Output('example_001.pdf', 'I');
    }

    function generateInvoice(){
        $this->pdf = new PDF('p','mm', 'A4', true, 'UTF-8', false);

        $this->pdf->SetCreator(PDF_CREATOR);
        $this->pdf->SetAuthor(Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name']);
        $this->pdf->SetTitle('Invoice');
        $this->pdf->SetSubject('TCPDF Tutorial');
        $this->pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $this->pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name'] . "\nWasthra Online Shopping", array(0, 64, 255), array(0, 64, 128));
        $this->pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $this->pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $this->pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $this->pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $this->pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $this->pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $this->pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $this->pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $this->pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $this->pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $this->pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        $this->pdf->AddPage();

        // ---------------------------------------------------------
        // $html = file_get_contents('./views/order/invoice.php');
        
        // $this->pdf->writeHTML($html, true, false, true, false, '');
        $this->pdf->SetFont('helvetica', 'B', 22);
        $this->pdf->Ln(15);
        $this->pdf->Cell(0, 3, 'INVOICE', 0, 1, 'C');
        $this->pdf->SetFont('helvetica', 'B', 18);
        $this->pdf->Ln(5);
        $this->pdf->Cell(0, 3, 'ORDER: #001', 0, 1, 'R');
        $this->pdf->SetFont('helvetica', '', 12);
        $this->pdf->Cell(0, 3, 'Issued On:', 0, 1, 'R');
        $this->pdf->Cell(0, 3, 'Payment Method:', 0, 1, 'R');
        $this->pdf->Cell(0, 3, 'Payment Status:', 0, 1, 'R');
        $this->pdf->Ln(5);
        $this->pdf->Cell(0, 3, 'First Name Last Name', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Address Line 1', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Address Line 2', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Address Line 3', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'City', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Postal Code', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Email', 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Contact No.', 0, 1, 'L');
        $this->pdf->Ln(15);

        $tbl = <<<EOD
        <table border="1" cellpadding="2" style="width:100%; text-align:center;">
        <tr>
         <th style="font-weight:bold;">Item Name</th>
         <th style="font-weight:bold;">Color</th>
         <th style="font-weight:bold;">Size</th>
         <th style="font-weight:bold;">Qty</th>
         <th style="font-weight:bold;">Item Price</th>
         <th style="font-weight:bold;">Sub Total</th>
        </tr>
        <tr>
         <td>Curve Neck Left Hand</td>
         <td>Red</td>
         <td>M</td>
         <td>4</td>
         <td style="text-align:right;">678.00</td>
         <td style="text-align:right;">2345.00</td>
        </tr>
        <tr>
         <td>Curve Neck</td>
         <td>Red</td>
         <td>M</td>
         <td>4</td>
         <td>678.00</td>
         <td>2345.00</td>
        </tr>
        <tr>
         <td>Curve Neck</td>
         <td>Red</td>
         <td>M</td>
         <td>4</td>
         <td>678.00</td>
         <td>2345.00</td>
        </tr>
        <tr>
         <td>Curve Neck</td>
         <td>Red</td>
         <td>M</td>
         <td>4</td>
         <td>678.00</td>
         <td>2345.00</td>
        </tr>
        <tr style="font-weight:bold;">
         <td colspan="5">TOTAL</td>
         <td>2345.00</td>
        </tr>
       </table>
       EOD;

       $this->pdf->writeHTML($tbl, true, false, false, false, '');

       $this->pdf->Ln(15);
       $this->pdf->SetFont('helvetica', '', 12);
        $this->pdf->Cell(0, 3, 'Thank you for your business!', 0, 1, 'C');
        $this->pdf->Cell(0, 3, 'Please feel free to contact us if you have any queries.', 0, 1, 'C');
        

        // Close and output PDF document
        $this->pdf->Output('example_001.pdf', 'I');
    }

    function display(){
        $this->view->render('order/invoice');
    }
}
