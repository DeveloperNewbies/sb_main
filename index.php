<?php
$rota ="";
$db_name ="saglik_bak";
$global_adres ="localhost";

require_once ( $rota . "db/query.php" );


$mquery = new Query($db_name);
$all_doctor = $mquery->all_doctor ();
$all_adres = $mquery->all_adres ();

if(isset($_GET["url"])) {
    $url = $_GET["url"];
    $doctor_val = $mquery->bring_doctor ($url);

    $doctor_variable = $mquery->bring_doctor ( $url );

    if($doctor_variable === false){
        echo "Kullanıcı veya adres bulunamadı";
        exit;
    }


    if ( isset( $_GET["durum"] ) ) {
        //doktor durumu değişir ise
        if ( $_GET["durum"] == "pas" ) {
            $mquery->update_doctor ( $url , "doctor_selection" , $durum );
        } else if ( $_GET["durum"] == "gelmedi" ) {
             $mquery->update_doctor ( $url , "doctor_selection" , $durum ) ;
        }

    }else if(isset($_GET["adres"])){
        $adres = $_GET["adres"];
        if($doctor_variable[4] !=0){
            $mquery->update_doctor ( $url , "doctor_old_place" , $adres );
            $mquery->update_doctor ( $url , "doctor_selection" , 1 );
            $mquery->update_adres ( $adres , "adres_select" , 0 );
            $mquery->update_adres ( $doctor_variable[4] , "adres_select" , 0 );
        }else{
            $mquery->update_adres ( $adres , "adres_select" , $url );
            $mquery->update_doctor ( $url , "doctor_old_place" , $adres );
            $mquery->update_doctor ( $url , "doctor_selection" , 1 );
        }

    }

    //seçili olan adres var ise ata
    if ( isset( $doctor_variable[4] ) )
        $old_adres = $mquery->bring_adres ( $doctor_variable[4] );


    //tüm doktor verilerini al
    $all_doctor = $mquery->all_doctor ();
    //tüm boş adres verilerini al
    $all_adres = $mquery->all_adres ();
}

 ?>
<?php require_once ($rota . "src/components/head.php");?>
<body>
<div class="container" style="margin-top: 20px ; margin-bottom: 20px;">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <?php   require_once ($rota."src/components/left_container.php") ; ?>
        <?php   require_once ($rota."src/components/right_container.php") ; ?>
    </div>
</div>

</body>
</html>
