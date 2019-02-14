<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 12.02.2019
 * Time: 16:20
 */


$rota ="";
$db_name ="saglik_bak";
$global_adres ="localhost";

require_once ( $rota . "db/query.php" );
require_once ( $rota . "class/function.php" );

$mquery = new Query($db_name);

if(isset($_GET["write"])){
    if($_GET["write"] == "all"){
        echo "tüm kullanıcıların çıktısı";
    }else{
        $id = $_GET["write"];
        echo $id ." adlı kullanıcının çıktısı";
    }
}

if(isset($_GET["new"])){

    $new_add = $_GET["new"] ;

    switch ($new_add){
        case "doctor":
           require_once ($rota."src/new_doctor.php");
            break;
        case "adres":
         require_once ($rota ."src/new_adres.php");
            break;
    }
    exit;
}

if(isset($_GET["url"])) {
    $url = $_GET["url"];
    require_once ($rota."src/adres/all_adres.php");
    exit;
}

require_once ($rota."src/doctor/all_doctor.php");
exit;

?>
