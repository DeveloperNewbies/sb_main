<?php
//require_once ("C_pdf.php");


require('php-pdf/fpdf.php');

class PDF extends FPDF
{

	var $y0;
	public $chapter_table = array("DURUMU","TC", "AD SOYAD", "ADRES");


	function Header()
	{
		//Page header
		global $title;
		global $date;
		global $time ;

		$this->SetFont('Arial','',13);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(255,255,255);

		$this->SetY (5);
		$this->SetX(170);
		$this->Cell(30,7,$date,0,1,'C',true);

		$this->SetFont('Arial','',17);
		$w=$this->GetStringWidth($title)+6;
		$this->SetX((210-$w)/2);
		//$this->SetDrawColor(0,80,180);
		//$this->SetFillColor(230,230,0);
		$this->SetTextColor(0,0,0);
		//$this->SetLineWidth(1);
		$this->Cell($w,9,$this->coverUTF8($title),0,1,'C',true);
		$this->Ln(10);
		//Save ordinate
		$this->y0=$this->GetY();
	}

	function Footer()
	{
		//Page footer
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->SetTextColor(128);
		$this->Cell(0,10,'Sayfa '.$this->PageNo(),0,0,'C');
	}



	function ChapterTitle($label , $variable)
	{
		//Title
		$this->SetFont('Arial','',12);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(255,255,255);
		$x_space = 30;
		$this->SetY (50);

			for ($m = 0 ; $m < count ($label) ; $m++){

				$this->SetX($x_space);
				$this->Cell(0,6,$this->coverUTF8($label[$m])." : ".$this->coverUTF8($variable[$m]),0,1,'',true);
			}

			$this->SetY (100);
			$this->SetX(40);
			$this->Cell(0,6,"imza",0,1,'',true);


		$this->Ln(4);
		//Save ordinate
		$this->y0=$this->GetY();
	}

	function ChapterBody($variable)
	{
		//Title
		$this->SetFont('Arial','',12);
		$this->SetTextColor(0,0,0);
		$this->SetFillColor(255,255,255);
		$x_space = 30;
		$this->SetY (50);

		for ($m = 0 ; $m < count ($this->chapter_table) ; $m++){

			$this->SetX($x_space);
			$this->Cell(0,6,$this->coverUTF8($this->chapter_table[$m])." : ".$this->coverUTF8($variable[$m]),0,1,'',true);
		}
	}

	function PrintChapter($var)
	{
		$this->AddFont('Arial','','arial.php');
		//Add chapter
		$this->AddPage();
		$this->ChapterTitle($this->chapter_table,$var);
		//$this->ChapterBody($file);
	}

	function coverUTF8($text)
	{
		$this->SetFont('Arial','',12);
		$this->SetFillColor(255,255,255);
		$text = iconv('utf-8', 'ISO-8859-9', $text);
		return $text;
	}

}

$rota ="../";
$db_name ="saglik_bak";
$global_adres ="localhost";
require_once ( $rota . "db/query.php" );
require_once ( $rota . "class/function.php" );
$mquery = new Query($db_name);

/////////////////////////////////////////////////////
/// pdf in
$pdf=new PDF();
$title='Ay-soft';

if(isset($_GET["write"])){
	$url = $_GET["write"];
	if($url == "all"){

	}else{
		$query = $mquery->bring_doctor ($url);
		if($query !==false){
			$adres = $mquery->bring_adres ($query[4]);

			$variable[0] = ($query[5] == 0) ? "Gelmedi" : ($query[5] == 1) ? "Adres Seçimi Yaptı" : "Pas Geçti" ;
			$variable[1] = $query[1];
			$variable[2] = $query[2]["name"];
            $variable[3] = (isset($adres[1])) ? $adres[1] : "-";
			$date = date("d/m/Y");
			$time = date("H.m");
			$pdf->SetTitle($title);
			$pdf->SetAuthor('Ay-soft');
			$pdf->PrintChapter($variable);
			$pdf->Output();

		}
	}
}else{
	echo "Hata";
}
?>
