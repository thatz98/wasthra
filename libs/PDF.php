<?php

require_once('TCPDF-main/tcpdf.php');

class PDF extends TCPDF {
    public function Header() {
        $imageFile = K_PATH_IMAGES . 'tcpdf_logo.png';
        $this->image(
            $imageFile,
            30,
            10,
            40,
            '',
            'PNG',
            '',
            'T',
            false,
            300,
            '',
            false,
            false,
            0,
            false,
            false,
            false
        );
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 12);  //Font name,style,size
        $this->Cell(189, 5, 'Wasthra Online Shopping', 0, 1, 'C');  //total width of A4
        $this->SetFont('helvetica', '', 8);
        $this->Cell(189, 3, '3D, 3rd Lane, Wewala, Horana', 0, 1, 'C');
        $this->Cell(189, 3, 'wasthraofz@gmail.com', 0, 1, 'C');
        $this->Cell(189, 3, '0777 373 88 77', 0, 1, 'C');
        $this->Ln(2);
        $this->SetFont('helvetica', 'B', 11);
        $this->Cell(20, 1, '___________________________________________________________________________________', 0, 0);
        
        $this->Ln(2);
    }

    public function Footer() {
        $this->SetFont('helvetica', 'B', 11);
        $this->SetY(-19);
        $this->Ln(2);
        $this->Cell(20, 1, '___________________________________________________________________________________', 0, 0);
        $this->Ln(2);
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}
