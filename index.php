<?php
$rota ="";
require_once ( $rota . "db/query.php" );
$mquery = new Query();

if(isset($_GET["url"])) {
    $url = $_GET["url"];

    if ( isset( $_GET["durum"] ) )
        $mquery->doctor_durum ($url , $_GET["durum"]);

    if(isset($_GET["adres"]))
        $mquery->doctor_adres ($url,$_GET["adres"]);


    $doctor_variable = $mquery->bring_doctor ( $url );
    if($doctor_variable[0]["doctor_old_place"]!=0)
        $old_adres = $mquery->bring_adres ($doctor_variable[0]["doctor_old_place"]);
}

$all_doctor = $mquery->all_doctor ();
$all_adres = $mquery->all_adres ();

 ?>
<?php require_once ($rota . "src/components/head.php");?>
<body>
<div >
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <?php   require_once ($rota."src/components/left_container.php") ; ?>
        <?php   require_once ($rota."src/components/right_container.php") ; ?>
    </div>
</div>

</body>
</html>
