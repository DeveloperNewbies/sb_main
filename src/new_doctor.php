<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 12.02.2019
 * Time: 16:20
 */

//tüm doktor verilerini al
$all_doctor = $mquery->all_doctor ();
if(isset($_POST["new_doctor"])){
    $id = $_POST["tc"];
    $var = array(
            "name"=>$_POST["name"],
           "started_date"=>$_POST["started_date"]
    );
    $num = $all_doctor[count ($all_doctor)-1]["must"]+1;
    if($mquery->create_doctor ($num,$id,$var) === false)
        echo "Kayıt yapılmadı";

}
//(güncel) tüm doktor verilerini al
$all_doctor = $mquery->all_doctor ();

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
                <h3>Yeni Doktor Ekle</h3>
            </div>
            <div class="inbox-body">
                <form method="post" action="index.php?new=doctor">
                    <input type="text" placeholder="Ad soyad" name="name">
                    <input type="number" placeholder="TC" name="tc">
                    <input type="number" placeholder="Göreve başlama tarihi" name="started_date">
                    <input type="submit" name="new_doctor" value="Ekle">
                </form>
            </div>
        </aside>
    </div>
</div>

</body>
</html>
