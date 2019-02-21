<?php
session_start();
$rota ="../";
require_once ( $rota . "db/query.php" );
$mquery = new Query();

$site_name = "localhost";

    if(isset($_GET["url"])) {
       $_SESSION["url"] = $_GET["url"];
        $doctor_variable = $mquery->bring_doctor ( $_SESSION["url"] );
        $result = $doctor_variable[0];
        if($result["doctor_old_place"] != 0 ){
            $res_adres = $mquery->bring_adres ($result["doctor_old_place"])[0];
            $result["adres"] = $res_adres["address"]["adres"];
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;
    }else{
        if(!isset($_SESSION["url"])){
            echo "hata";
            exit;
        }

        $doctor_variable = $mquery->bring_doctor ( $_SESSION["url"] );
        $result = $doctor_variable[0];
        if($result["doctor_old_place"] != 0 ){
            $res_adres = $mquery->bring_adres ($result["doctor_old_place"])[0];
            $result["adres"] = $res_adres["address"]["adres"];
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit;

    }


?>