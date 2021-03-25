<?php

class Report extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

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

    function generateInvoice($id)
    {
        $this->pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

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

        $this->orderInfo = $this->model->getOrderInfo($id);
        $this->orderItems = $this->model->getOrderItems($id);
        // $this->pdf->writeHTML($html, true, false, true, false, '');
        $this->pdf->SetFont('helvetica', 'B', 22);
        $this->pdf->Ln(15);
        $this->pdf->Cell(0, 3, 'INVOICE', 0, 1, 'C');
        $this->pdf->SetFont('helvetica', 'B', 18);
        $this->pdf->Ln(5);
        $this->pdf->Cell(0, 3, 'ORDER: #' . $this->orderInfo[0]['order_id'], 0, 1, 'R');
        $this->pdf->SetFont('helvetica', '', 12);
        $this->pdf->Cell(0, 3, 'Issued On: ' . $this->orderInfo[0]['date'], 0, 1, 'R');
        $this->pdf->Cell(0, 3, 'Payment Method: ' . $this->orderInfo[0]['payment_method'], 0, 1, 'R');
        $this->pdf->Cell(0, 3, 'Payment Status: ' . $this->orderInfo[0]['payment_status'], 0, 1, 'R');
        $this->pdf->Ln(5);
        $this->pdf->Cell(0, 3, 'Customer: ' . $this->orderInfo[0]['first_name'] . ' ' . $this->orderInfo[0]['last_name'], 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Address: ' . $this->orderInfo[0]['address_line_1'] . ', ' . $this->orderInfo[0]['address_line_2'] . ', ' . $this->orderInfo[0]['address_line_3'], 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'City: ' . $this->orderInfo[0]['city'], 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Postal code: ' . $this->orderInfo[0]['postal_code'], 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Email: ' . $this->orderInfo[0]['email'], 0, 1, 'L');
        $this->pdf->Cell(0, 3, 'Contact No.: ' . $this->orderInfo[0]['contact_no'], 0, 1, 'L');
        $this->pdf->Ln(15);


        $tbl = <<<EOD
        <table border="1" cellpadding="2" style="width:100%; text-align:center;">
        <tr>
         <th style="font-weight:bold;">Item Name</th>
         <th style="font-weight:bold;">Color</th>
         <th style="font-weight:bold;">Size</th>
         <th style="font-weight:bold;">Qty</th>
         <th style="font-weight:bold;">Item Price</th>
         <th style="font-weight:bold;">Line Total</th>
        </tr>
        EOD;

        foreach ($this->orderItems as $item) {
            $tbl .= <<<EOD
            <tr>
         <td>{$item['product_name']}</td>
         <td>{$item['item_color']}</td>
         <td>{$item['item_size']}</td>
         <td>{$item['item_qty']}</td>
         <td style="text-align:right;">{$item['product_price']}</td>
         <td style="text-align:right;">{$item['line_total']}</td>
        </tr>
        EOD;
        }
        $tbl .= <<<EOD
        <tr style="font-weight:bold;">
         <td colspan="5">TOTAL</td>
         <td style="text-align:right;">2345.00</td>
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

    function generateInventoryReport()
    {
        $this->pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

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
        $this->pdf->SetMargins(PDF_MARGIN_LEFT, 45, PDF_MARGIN_RIGHT);
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

        $this->inventoryData = $this->model->getInventoryData();

        // $this->pdf->writeHTML($html, true, false, true, false, '');
        $this->pdf->SetFont('helvetica', 'B', 22);

        $this->pdf->Cell(0, 3, 'Inventory Report', 0, 1, 'C');
        $this->pdf->SetFont('helvetica', 'B', 15);
        $this->pdf->Cell(0, 3, 'as of ' . date("h:i:sa Y-m-d"), 0, 1, 'C');
        $this->pdf->Ln(5);
        $this->pdf->SetFont('helvetica', '', 12);
        $this->pdf->Cell(0, 3, 'Generated On: ' . date("Y-m-d"), 0, 1, 'R');
        $this->pdf->Cell(0, 3, 'At: ' . date("h:i:sa"), 0, 1, 'R');
        $this->pdf->Cell(0, 3, 'By: ' . Session::get('userData')['first_name'] . ' ' . Session::get('userData')['last_name'], 0, 1, 'R');

        $this->pdf->Ln(15);


        $tbl = <<<EOD
        <table border="1" cellpadding="2" style="width:100%; text-align:center;">
        <tr>
         <th style="font-weight:bold;">Product Id</th>
         <th style="font-weight:bold;">Product Name</th>
         <th style="font-weight:bold;">Color</th>
         <th style="font-weight:bold;">Size</th>
         <th style="font-weight:bold;">Qty</th>
         <th style="font-weight:bold;">Reorder Level</th>
         <th style="font-weight:bold;">Reorder Qty</th>
        </tr>
        EOD;

        foreach ($this->inventoryData as $inventory) {
            $tbl .= <<<EOD
            <tr>
                <td>{$inventory['product_id']}</td>
                <td>{$inventory['product_name']}</td>
                <td>{$inventory['color']}</td>
                <td>{$inventory['size']}</td>
                <td>{$inventory['qty']}</td>
                <td><?php if(empty({$inventory['reorder_level']})){
                    echo 'not set';
                } else{
                    echo {$inventory['reorder_level']}; 
                    }?></td>
                <td><?php if(empty({$inventory['reorder_qty']})){
                    echo 'not set';
                } else{
                    echo {$inventory['reorder_qty']}; 
                    }?></td>                
            
            </tr>
            EOD;
        }
        $tbl .= "</table>";




        $this->pdf->writeHTML($tbl, true, false, false, false, '');


        // Close and output PDF document
        $this->pdf->Output('example_001.pdf', 'I');
    }
}

