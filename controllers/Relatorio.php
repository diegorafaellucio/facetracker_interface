<?php


class RelatorioController extends MainController
{

    public function index()
    {
        $this->title = 'Relatório';


        $modeloFace = $this->load_model('face');


        require ABSPATH . '/views/_includes/header.php';

        require ABSPATH . '/views/_includes/menu.php';

        require ABSPATH . '/views/relatorio/view.php';

        require ABSPATH . '/views/_includes/footer.php';
    }


    public function content($data)
    {
        $modeloFace = $this->load_model('face');

        $date_params = explode("-", $data[0]);

        echo $modeloFace->getRelItens($date_params);


    }

    public function view($data)
    {

        require ABSPATH . '/classes/fpdf/custom_fpdf.php';

        $modeloFace = $this->load_model('face');

        $date_params = explode("-", $data[0]);

        $query = $modeloFace->getRelElements($date_params);

        $w = array(96, 96, 280, 45);

        $pdf = new PDF("P", "pt", "A4");

        $pdf->AliasNbPages();

        $pdf->AddPage();


        $pdf->SetFillColor(224, 235, 255);

        $fill = false;

        $page_limit = 0;


        $pdf->SetFont('arial', '', 10);

        foreach ($query as $row) {

            if ($page_limit == 12) {
                $pdf->AddPage();
                $page_limit = 0;

            }

            $page_limit++;

            $image_path = ABSPATH . "/views/_images/faces/" . $row['face_path'];
            $person_path = ABSPATH . "/views/_images/faces/" . $row['face_path'];


            $pdf->Cell($w[0], 60, $pdf->Image($image_path, $pdf->GetX() + 30, $pdf->GetY() + 10, 33.78), "0", "0", "C");
            $pdf->Cell($w[1], 60, $pdf->Image($person_path, $pdf->GetX() + 30, $pdf->GetY() + 10, 33.78), "0", "0", "C");
            $pdf->Cell($w[2], 60, utf8_decode($row["nome"]), "0", "0", "L");

            $pdf->Cell($w[3], 60, utf8_decode($row["percentual_de_acerto"]), "0", "1", "R");

            $pdf->Line(50, $pdf->GetY(), 545, $pdf->GetY()); // 50mm from each edge

            $fill = !$fill;


        }


        $pdf->Output();


    }


    public function video($data)
    {

        require ABSPATH . '/classes/fpdf/custom_fpdf.php';

        $modeloFace = $this->load_model('face');

        $query = $modeloFace->getRelVideoElements($data[0]);

        $w = array(96, 96, 280, 45);

        $pdf = new PDF("P", "pt", "A4");

        $pdf->AliasNbPages();

        $pdf->AddPage();


        $pdf->SetFillColor(224, 235, 255);

        $fill = false;

        $page_limit = 0;


        $pdf->SetFont('arial', '', 10);

        foreach ($query as $row) {

            if ($page_limit == 12) {
                $pdf->AddPage();
                $page_limit = 0;

            }

            $page_limit++;

            $image_path = ABSPATH . "/views/_images/faces/" . $row['face_path'];
            $person_path = ABSPATH . "/views/_images/faces/" . $row['face_path'];


            $pdf->Cell($w[0], 60, $pdf->Image($image_path, $pdf->GetX() + 30, $pdf->GetY() + 10, 33.78), "0", "0", "C");
            $pdf->Cell($w[1], 60, $pdf->Image($person_path, $pdf->GetX() + 30, $pdf->GetY() + 10, 33.78), "0", "0", "C");
            $pdf->Cell($w[2], 60, utf8_decode($row["nome"]), "0", "0", "L");

            $pdf->Cell($w[3], 60, utf8_decode($row["percentual_de_acerto"]), "0", "1", "R");

            $pdf->Line(50, $pdf->GetY(), 545, $pdf->GetY()); // 50mm from each edge

            $fill = !$fill;


        }


        $pdf->Output();


    }




}
