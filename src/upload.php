<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 18:45
 */

$rota ="";
$db_name ="saglik_bak";

require_once ($rota."db/query.php");
require_once ($rota."class/function.php");

$mquery = new Query($db_name);
$sira = 0;
$name = 1;
$tc = 2;
$görev = 3;
$görev_start = 4;


if(isset($_POST["gönder"])){
    $file =  $_FILES["dosya"]["name"];

    $exel_data = array();
    if(ext ($file) == "xls"){
        require_once ($rota."class/SimpleXLS.php");

        if ( $xls = SimpleXLS::parse($file) ) {
            $exel_data= $xls->rows() ;
        } else {
            echo SimpleXLS::parseError();
        }

    }else if(ext ($file) == "xlsx"){
        require_once ($rota."class/SimpleXLSX.php");

        if ( $xlsx = SimpleXLSX::parse($file) ) {
            $exel_data = $xlsx->rows() ;
        } else {
            echo SimpleXLSX::parseError();
        }
    }

    for($var = 0 ; $var < count($exel_data); $var){
        $doctor_var = array(
            "name"=>$exel_data[$var][$name],
            "tc"=>$exel_data[$var][$tc],
            "görev"=>$exel_data[$var][$görev],
            "görev_started"=>$exel_data[$var][$görev_start]
        );
        if($mquery->create_doctor ($var,$doctor_var,"","",0)==true){
            echo "başarılı";
        }else echo "hata";
    }



}


?>

<form action="index.php" method="post" enctype="multipart/form-data">
    <select name="islem">
        <option value="doctor">Doktor ekleme</option>
        <option value="adres">Adres ekleme</option>
    </select>
    <input type="file" name="dosya" />
    <input type="submit" name="gönder" value="Gönder" />
</form>
<a href="/src/doctor/all_doctor.php"><button class="label label-danger pull-right">Doktor adres seçimine git</button></a>