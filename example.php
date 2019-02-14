<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 12.02.2019
 * Time: 15:13
 */

$rota ="";
$db_name ="saglik_bak";

require_once ($rota."db/query.php");
require_once ($rota."class/function.php");


$mquery = new Query($db_name);

$name = array(
    "Ahmet Çavuş",
    "Enes Budak",
    "Mehmet Tuna",
    "Alparslan İlbey"
);
$adres = array(
    "Ellek kasabası TSM",
    "Düziçi TSM",
    "Adana Seyhan Mahallesi",
    "İskenderun Kovabaşı TSM",
);
function RandomString()
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}
$mehmet = 0;
    $id_num = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    $var = array("name"=>$name[$mehmet],"started_date"=>"20".rand(0,1).rand(0,9));
    $doctor_old_place = rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
    $doctor_selection = "0" ;
    $status ="0";


    if($mquery->create_doctor ($mehmet,$id_num,$var,"0",$doctor_old_place,"1") )
        echo "doktor kaydı başarılı <br>";
    else{
        echo "kayıt başarısız";
        exit;
    }




    if($mquery->create_adres ($doctor_old_place,$adres[$mehmet],$id_num,"1") == true)
        echo "adres kaydı başarılı <br>";
    else
        echo "kayıt başarısız";


?>