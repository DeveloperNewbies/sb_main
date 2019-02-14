<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 13.02.2019
 * Time: 20:24
 */

$all_adres = $mquery->all_adres ();


if(isset($_POST["new_adres"])){
    $id =rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
    $adres = $_POST["adres"];
    $adres_select = 0 ;
    $adres_status = 0 ;

    if($mquery->create_adres ($id,$adres,$adres_select,$adres_status)  === false)
        echo "Kayıt yapılmadı";

}
//(güncel) tüm doktor verilerini al
$all_adres = $mquery->all_adres ();

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
                <?php for ($var = 0 ; $var < count ($all_adres);){
                          $adres_name = $all_adres[$var]["address"];
                    ?>

                    <li class="">
                       <?=++$var?>- <?=$adres_name?>

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
                <h3>Yeni Adres Ekle</h3>
            </div>
            <div class="inbox-body">
                <form method="post" action="index.php?new=adres">
                    <input type="text" placeholder="Adres" name="adres">
                    <input type="submit" name="new_adres" value="Ekle">
                </form>
            </div>
        </aside>
    </div>
</div>

</body>
</html>
