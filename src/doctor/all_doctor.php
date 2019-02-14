<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 12.02.2019
 * Time: 16:20
 */

$result = $mquery->all_doctor ();

?>

<?php require_once($rota."src/components/head.php"); ?>
<body>
<div class="container">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <div class="mail-box">
        <aside class="sm-side">
            <div class="user-head">
                <!-- <a class="inbox-avatar" href="javascript:;">
                    <img  width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                </a> -->
                <?php require_once ($rota."src/components/head_left_title.php")?>

            </div>
             <div class="inbox-body">
                <a href="index.php?new=doctor" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                    Doktor Ekle
                </a>
            </div>
            <div class="inbox-body">
                <a href="index.php?new=adres" data-toggle="modal"  title="Compose"    class="btn btn-compose">
                    Adres Ekle
                </a>
            </div>
            <ul class=" inbox-nav inbox-divider">


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
        <aside class="lg-side">
            <div class="inbox-head">
                <h3>Doktorlar</h3>
            </div>
            <div class="inbox-body">
                <table class="table table-inbox table-hover">
                    <tbody>
                    <tr class="unread" >
                        <td class="view-message dont-show">Göreve başlama tarihi - doktor<span class="label label-success pull-right">Durum</span></td>
                        <td class="view-message">adres </td>
                        <td class="view-message inbox-small-cells"></td>
                        <td>Seçim Yap</td>

                    </tr>
                    <?php foreach($result as $value){
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

                            <tr class="adsww" >
                                <td class="view-message dont-show"><?=$puan?> - <?=$name?><?=$selection?></td>
                                <td class="view-message"><?php echo (isset($adres[1])) ? $adres[1] : "-"; ?> </td>
                                <td class="view-message inbox-small-cells"></td>
                                <td> <a href="index.php?url=<?=$value['doctor_id']?>"><button class="btn btn-success">Seçim Yap</button></a></td>
                            </tr>

                         <?php } ?>
                    </tbody>
                </table>
            </div>
        </aside>
    </div>
</div>

</body>
</html>
