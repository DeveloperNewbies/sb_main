<?php
/**
 * Created by PhpStorm.
 * User: Alp
 * Date: 14.02.2019
 * Time: 18:11
 */

require('pdf/php-pdf/fpdf.php');

class SBRep extends FPDF
{
    function Header()
    {

        // Yazı rengi ayarlanır
        $this->SetTextColor(0,0,140);

        // Satır 80 pixel içeriden başlasın
        $this->Cell(80);

        // Satıra yazı yazılır
        $this->Write (5, 'Doktor Onay');


        // 4 pixel aşağıda yeni satıra geç
        $this->Ln(4);

        // Satır 25 pixel içeriden başlasın
        $this->Cell(165);

        // Arial italic 8
        $this->SetFont('Arial','',10);
        // Yazı rengi ayarlanır
        $this->SetTextColor(0,70,80);
        // Satıra yazı yazılır
        $this->Write (0, ''.date("d-m-Y"));

    }


    function Content($content, $type)
    {

    }


    function Footer()
    {
        // 15 pıxel sayfa altından yukarıda başla
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Sayfa Numarası
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }


    function writeText($pad, $cell, $text, $txt_size, $r, $g, $b)
    {
        // Arial italic 8
        $this->SetFont('Arial','',$txt_size);
        //Yazıyı Utf-8 yapılır
        $text = iconv('utf-8', 'ISO-8859-9', $text);

        // Yazı rengi ayarlanır
        $this->SetTextColor($r,$g,$b);

        //Content Now Writed..

        $this->Cell($cell);

        $this->Write (0,$text);

        $this->Ln($pad);
    }


    function createPDF($content, $type)
    {
        // Sayfa altında numaraları göstermek için kullanılır
        $this->AliasNbPages();
        //Font Ayarlama
        $this->AddFont('Arial','','arial.php');
        $this->SetFont('Arial','',14);

        if($type == "single")
        {
            $this->AddPage();
        }elseif($type == "all")
        {
            $this->AddPage();
        }
        else
        {
            $this->AddPage('');
        }
        //Sayfa eklenir


        $this->Content($content, $type);


        $this->Output();
    }

}

$rota ="";
$db_name ="saglik_bak";
$global_adres ="localhost";
require_once ( $rota . "../db/query.php" );
$mquery = new Query($db_name);


if(isset($_GET["write"])){
    $url = $_GET["write"];
    if($url == "all"){

    }else{
        $query = $mquery->bring_doctor ($url);
        if($query !== false){

            $create_rep = new SBRep();

            $adres = $mquery->bring_adres ($query[4]);

            $variable[0] = ($query[5] == 0) ? "-" : ($query[5] == 1) ? "Adres Seçimi Yaptı" : ($query[5] == 2) ? "Pas Geçti" : "Gelmedi" ;
            $variable[1] = $query[1];
            $variable[2] = $query[2]["name"];
            $variable[3] = (isset($adres[1])) ? $adres[1] : "-";

            $create_rep->createPDF($variable, "single");


        }
    }
}else{
    echo "Hata";
}

?>