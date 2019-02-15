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
            $dr_puan = $doctor[0]["hizmet_puan"];
            $dr_adres = $adres[0]["address"]["adres"];
            //dr_no doktorun db deki sırası
            $dr_no = $doctor[0]["must"];
            $dr_tercih = $doctor[0]["doctor_selection"];
            $date_before = date('01-m-Y');
            $date_after = date("31-m-Y", strtotime('+2 years'));

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