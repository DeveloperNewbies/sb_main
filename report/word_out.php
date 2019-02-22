<?php
/**
 * Created by PhpStorm.
 * User: Alp
 * Date: 14.02.2019
 * Time: 21:00
 */


require_once ('word/index.php');

$rota ="";
$global_adres ="localhost";
require_once ( $rota . "../db/query.php" );
$mquery = new Query();




if(isset($_GET["write"])){
    $url = $_GET["write"];

    $doctor = $mquery->bring_doctor ($url);
    if($doctor !== false){
        $adres = $mquery->bring_adres ($doctor[0]["doctor_old_place"]);
        if($adres !== false){
            //op_number yapılan işlem sayısı
            $op_number = "11";
            $dr_tc = $doctor[0]["doctor_var"]["tc"];
            $dr_isim = $doctor[0]["doctor_var"]["name"];
            $dr_brans = $doctor[0]["doctor_var"]["brans"];
            $dr_started = ($doctor[0]["doctor_var"]["started_date"] != "") ? $doctor[0]["doctor_var"]["started_date"] : "-";

            if($adres[0]['address']['adres'] != "")
            {
                $dr_oldplace = $adres[0]['address']['adres'];
            }else
                {
                    $dr_oldplace = "-";
                }
            $dr_puan = $doctor[0]["hizmet_puan"];
            $dr_adres = $adres[0]["address"]["adres"];
            //dr_no doktorun db deki sırası
            $dr_no = $doctor[0]["must"];
            if($doctor[0]["doctor_selection"] == 0)
                $dr_tercih ="-";
            else if($doctor[0]["doctor_selection"] == 1)
                $dr_tercih ="Adres Seçimi Yaptı";
            else if($doctor[0]["doctor_selection"] == 2)
                $dr_tercih = "Pas Geçti";
            else if($doctor[0]["doctor_selection"] == 3)
                $dr_tercih = "Gelmedi";
            $date_before = date('01-m-Y');
            $date_after = date("31-m-Y", strtotime('+2 years'));

            if($dr_started == "-")
            {
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
            }else
                {
                    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('zeyilname.docx');

                    $templateProcessor->setValue('dr-isim', "".$dr_isim);
                    $templateProcessor->setValue('dr-started', "".$dr_started);
                    $templateProcessor->setValue('dr-oldplace', "".$dr_oldplace);
                    $templateProcessor->setValue('dr-adres', "".$dr_adres);
                    $templateProcessor->setValue('date-now', date("d-m-Y"));

                    header('Content-Type: application/octet-stream');
                    header("Content-Disposition: attachment; filename=zeyilname.docx");
                    $templateProcessor->saveAs('php://output');
                }


        }

    }
}else{
    echo "Hata";
}




?>