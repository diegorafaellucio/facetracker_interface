<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 12);
        // Title
        $this->Cell(0, 10, utf8_decode('Relatório de Frequência'), 0, 0, 'C');
        // Line break
        $this->Ln(20);

        $this->SetFont('arial','B',10);

        $w = array(96, 96, 280, 45);

        $this->Cell($w[0],15,"Detectada","0","0","C");
        $this->Cell($w[1],15,"Cadastrada","0","0","C");
        $this->Cell($w[2],15,utf8_decode("Nome"),"0","0","C");
        $this->Cell($w[3],15,utf8_decode("Acerto"),"0","0","C");
        $this->Ln();

    }

// Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function imageCenterCell($file, $x, $y, $w, $h)
    {
        if (!file_exists($file)) {
            $this->Error('File does not exist: ' . $file);
        } else {
            list($width, $height) = getimagesize($file);
            $ratio = $width / $height;
            $zoneRatio = $w / $h;
            // Same Ratio, put the image in the cell
            if ($ratio == $zoneRatio) {
                $this->Image($file, $x, $y, $w, $h);
            }
            // Image is vertical and cell is horizontal
            if ($ratio < $zoneRatio) {
                $neww = $h * $ratio;
                $newx = $x + (($w - $neww) / 2);
                $this->Image($file, $newx, $y, $neww);
            }
            // Image is horizontal and cell is vertical
            if ($ratio > $zoneRatio) {
                $newh = $w / $ratio;
                $newy = $y + (($h - $newh) / 2);
                $this->Image($file, $x, $newy, $w);
            }
        }
    }
}
