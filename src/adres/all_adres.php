<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 12.02.2019
 * Time: 16:20
 */

if(isset($_GET["url"])) {
    $url = $_GET["url"];

    $doctor_variable = $mquery->bring_doctor ( $url );

        if($doctor_variable === false){
            echo "Kullanıcı veya adres bulunamadı";
            exit;
        }

    //seçili olan adres var ise ata
    if ( isset( $doctor_variable[4] ) )
        $old_adres = $mquery->bring_adres ( $doctor_variable[4] );

    if ( isset( $_GET["durum"] ) ) {
        //doktor durumu değişir ise
        if ( $_GET["durum"] == "pas" ) {
            $durum = 2;
        } else if ( $_GET["durum"] == "gelmedi" ) {
            $durum = 0;
        }
        if ( $durum == 0 ) {
            //git doktorun durumunu değiştir
            if ( $mquery->update_doctor ( $url , "doctor_selection" , $durum ) === true ) {
               echo "Durum değiştirildi";
            }
        } else if ( $durum == 2 ) {
            $mquery->update_doctor ( $url , "doctor_selection" , $durum );
        }

    }else if(isset($_GET["adres"])){
        $adres = $_GET["adres"];
        if($doctor_variable[4] !=0){
            $mquery->update_adres ( $doctor_variable[4] , "adres_select" , 0 );
            $mquery->update_adres ( $doctor_variable[4] , "adres_status" , 0 );
            $mquery->update_doctor ( $url , "doctor_old_place" , $adres );
            $mquery->update_doctor ( $url , "doctor_selection" , 1 );
            $mquery->update_adres ( $adres , "adres_select" , $url );
            $mquery->update_adres ( $adres , "adres_status" , 1 );
        }else{
            $mquery->update_adres ( $adres , "adres_select" , $url );
            $mquery->update_adres ( $adres , "adres_status" , 1 );
            $mquery->update_doctor ( $url , "doctor_old_place" , $adres );
            $mquery->update_doctor ( $url , "doctor_selection" , 1 );
        }

    }
    //seçili olan adres var ise ata
    if ( isset( $old_adres ) )
        $old_adres = $mquery->bring_adres ( $doctor_variable[4] );


    //tüm doktor verilerini al
    $all_doctor = $mquery->all_doctor ();
    //tüm boş adres verilerini al
    $all_adres = $mquery->all_adres ();
}else{
    header("location: index.php");
}


?>

<?php require_once($rota."src/components/head.php"); ?>
<body>
<div class="container" style="margin-top: 20px ; margin-bottom: 20px;">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="sm-side">
            <div class="user-head">
                <!-- <a class="inbox-avatar" href="javascript:;">
                    <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                </a> -->
                <?php require_once ($rota."src/components/head_left_title.php")?>

            </div>
            <!-- <div class="inbox-body">
                <a href="#myModal" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                    Doktorları göster
                </a>
            </div>-->
            <ul class="inbox-nav inbox-divider">
                <?php foreach ($all_doctor as $value){
                     $doctor_var = json_decode ($value["doctor_var"],JSON_UNESCAPED_UNICODE);
                        $name = $doctor_var["name"];
                        $puan = $doctor_var["started_date"];
                        $selection = $value["doctor_selection"];
                        if($selection == 0)
                            $selection = "<span class=\"label label-danger pull-right\">Gelmedi</span>";
                        else if($selection == 1)
                            $selection = "<span class=\"label label-success pull-right\">Adres seçimi yaptı</span>";
                        else if($selection == 2)
                            $selection = "<span class=\"label label-warning pull-right\">Pas geçti</span>";

                        $adres = $mquery->bring_adres ($value["doctor_old_place"]);
                        ?>


                <li class="<?php echo ($value['doctor_id'] == $url) ? 'active' : '' ; ?>">
                    <a href="index.php?url=<?=$value['doctor_id']?>"><?=$value["must"]?>- <?=$name?> <?=$selection?></a>

                </li>
                <?php }?>

            </ul>

            <!--
                        <div class="inbox-body text-center">
                            <div class="btn-group">
                                <a class="btn mini btn-primary" href="javascript:;">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a class="btn mini btn-success" href="javascript:;">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a class="btn mini btn-info" href="javascript:;">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </div>
                        </div>
            -->
        </aside>
        <aside class="lg-side" >
            <div class="inbox-head">
                   <h4>Doktor: <?=$doctor_variable[2]["name"]?>  </h4>
                   <h5>Görev Başlama Tarihi: <?=$doctor_variable[2]["started_date"]?></h5>
                   <h5>Tc: <?=$doctor_variable[1]?></h5>
                <?php if(isset($old_adres[1])){ ?>
                   <h5>Seçili Olan Adres: <?=$old_adres[1]?>  </h5>
                    <?php }else{ ?>
                    <h5>Adres seçimi yapmalısınız</h5>
                <?php }?>
                <a href="<?=$rota."pdf/index.php"?>?write=<?=$url?>"> <button class="btn btn-success">Çıktı Al</button></a>
                <a href="<?=$rota."pdf/index.php"?>?write=all"><button class="btn btn-danger">Tüm Doktorların Çıktısı</button></a>
            </div>
            <div class="inbox-body">
                <table class="table table-inbox table-hover">
                    <tbody>
                    <td class="view-message dont-show">Adres</td>
                    <td class="view-message"> </td>
                    <td class="view-message inbox-small-cells"></td>
                    <td class="view-message text-right">
                        <a href="index.php?url=<?=$url?>&durum=pas"> <button class="btn btn-warning">PAS</button></a>
                        <a href="index.php?url=<?=$url?>&durum=gelmedi"><button class="btn btn-danger">GELMEDİ</button></a>
                    </td>
                    <?php
                    $m = 1;
                    foreach ($all_adres as $result){?>

                        <tr class="" id ="<?=$result["id"]?>" >
                            <td class="view-message dont-show"><?=$m?>- <?=$result["address"]?></td>
                            <td class="view-message"></td>
                            <td class="view-message inbox-small-cells"></td>
                            <td class="view-message text-right">
                                <a href="index.php?url=<?=$url?>&adres=<?=$result["id"]?>"><button class="btn btn-success">SEÇ</button></a>
                            </td>
                        </tr>
                    <?php $m++ ; } ?>
                    </tbody>
                </table>
            </div>
        </aside>
    </div>
</div>

</body>
</html>
