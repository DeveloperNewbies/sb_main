<?php
session_start();
$rota ="";
require_once ( $rota . "db/query.php" );
$mquery = new Query();

$site_name = "localhost";

    
$url = (isset($_SESSION["url"])) ? $_SESSION["url"] : 1 ;

    if ( isset( $_GET["durum"] ) )
        $mquery->doctor_durum ($url , $_GET["durum"]);
    
    if(isset($_GET["adres"]) && is_numeric ($_GET["adres"]))
        $mquery->doctor_adres ($url,$_GET["adres"]);
    
    
    if($mquery->bring_doctor ( $url ) != false )
        if($doctor_variable[0]["doctor_old_place"]!=0)
            $old_adres = $mquery->bring_adres ($doctor_variable[0]["doctor_old_place"]);
        

        if(isset($_GET["secim"])){
    $_SESSION["secim"] = trim($_GET["secim"]);
    } else{
        if(!isset($_SESSION["secim"]))
            $_SESSION["secim"] = 0;
    }

$all_doctor = $mquery->all_doctor ();
$all_adres = $mquery->all_adres ();

$doctor_select_num = $mquery->doctor_var_num();

?>
<?php require_once ($rota . "src/components/head.php");?>

<body id="page-top" class="sidebar-toggled">
    <div id="wrapper">
        <?php require_once("src/components/left_menu.php"); ?>
        <?php require_once("src/content.php"); ?>
    </div>
  
</body>
</html>
