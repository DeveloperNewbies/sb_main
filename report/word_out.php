<?php
/**
 * Created by PhpStorm.
 * User: Alp
 * Date: 14.02.2019
 * Time: 21:00
 */

require_once ('word/index.php');
/*
$word_rep = new \PhpOffice\PhpWord\PhpWord();

$properties = $word_rep->getDocInfo();
$properties->setCreator('AY-SOFT');
$properties->setCompany('T.C SAGLİK BAKANLİGİ');
$properties->setTitle('Aile Hekimligi Hizmet Sozlesmesi');
$properties->setDescription('Sozlesme');
$properties->setCategory('Template');
$properties->setCreated(mktime(0, 0, 0, 3, 12, 2014));
$properties->setModified(mktime(0, 0, 0, 3, 14, 2014));
$properties->setSubject('Sozlesme');


$section = $word_rep->addSection();

*/


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


            $adres = $mquery->bring_adres ($query[4]);

            $variable[0] = ($query[5] == 0) ? "Gelmedi" : ($query[5] == 1) ? "Adres Seçimi Yaptı" : "Pas Geçti" ;
            $variable[1] = $query[1];
            $variable[2] = $query[2]["name"];
            $variable[3] = (isset($adres[1])) ? $adres[1] : "-";

            //op_number yapılan işlem sayısı
            $op_number = "11";
            $dr_tc = "DR1111";
            $dr_isim = "DR.Enes";
            $dr_brans = "PRATİSYEN";
            $dr_puan = "11111";
            $dr_adres = "Adana Kiremithane";
            //dr_no doktorun db deki sırası
            $dr_no = "111";
            $dr_tercih = "Seçti";
            $date_before = date('01-m-Y');
            $date_after = date("31-m-Y");

            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('sozlesme.docx');
            $templateProcessor->setValue('op-no', "".$op_number);
            $templateProcessor->setValue('dr-tc', "".$dr_tc);
            $templateProcessor->setValue('dr-isim', "".$dr_isim);
            $templateProcessor->setValue('dr-brans', "".$dr_brans);
            $templateProcessor->setValue('dr-puan', "".$dr_puan);
            $templateProcessor->setValue('dr-no', "".$dr_no);
            $templateProcessor->setValue('dr-adres', "".$dr_adres);
            $templateProcessor->setValue('dr-tercih', "".$dr_tercih);
            $templateProcessor->setValue('date-before', $date_before);
            $templateProcessor->setValue('date-after', $date_after);
            $templateProcessor->setValue('date-now', date("d-m-Y"));


            header('Content-Type: application/octet-stream');
            header("Content-Disposition: attachment; filename=sozlesme.docx");
            $templateProcessor->saveAs('php://output');


        }
    }
}else{
    echo "Hata";
}




?>