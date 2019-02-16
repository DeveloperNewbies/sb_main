<style>
    body{
        font-size:20px;
    }
</style>
<aside class="lg-side" id="test123">
        <div class="inbox-head">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table  ">
                                <thead>
                                <tr>
                                    <th scope="col">Ad Soyad</th>
                                    <th scope="col">T.C</th>
                                    <th scope="col">Hizmet Puanı </th>
                                    <?php if(isset($old_adres[0]["address"]["adres"])){ ?>
                                        <th scope="col"> Seçili Olan Adres :</th>
                                    <?php }else{ ?>
                                        <th scope="col"> Adres seçimi yapmalısınız </th>
                                    <?php }?>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?=(isset($doctor_variable)) ? $doctor_variable[0]["doctor_var"]["name"] : "-"?> </td>

                                    <td><?=(isset($doctor_variable)) ? $doctor_variable[0]["doctor_var"]["tc"] : "-"?></td>
                                    <td scope="col"><?=(isset($doctor_variable)) ?  $doctor_variable[0]["hizmet_puan"] :"-"?> </td>
                                    <?php if(isset($old_adres[0]["address"]["adres"])){ ?>
                                     <td> <?=$old_adres[0]["address"]["adres"]?></td>
                                    <?php } ?>
                                </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>
            </div>


           <?php if(isset($url)){ ?>
            <a href="/write/<?=$url?>"> <button class="btn btn-success">Çıktı Al</button></a>
            <?php } ?>
            <a href="all/all""><button class="btn btn-danger">Tüm Doktorların Çıktısı</button></a>
        </div>
    <div class="inbox-body">
        <table class="table table-inbox table-hover">
            <tbody>
            <td class="view-message dont-show">Sıra   Adres</td>
            <td class="view-message"> </td>
            <td class="view-message inbox-small-cells"></td>
            <td class="view-message text-right">
                <?php if(isset($url)){ ?>

                <?php }?>
            </td>

            <?php
            $m = 1;
            foreach ($all_adres as $result){?>

                <tr class="" id ="<?=$result["id"]?>" data-toggle="modal" onclick="addClick(<?=$url?>, <?=$result["id"]?>);" data-target = "#selectionMenu">
                    <td class="view-message dont-show"><?=$m?>- <?=$result["address"]["adres"]?></td>
                    <td class="view-message"></td>
                    <td class="view-message inbox-small-cells"></td>
                    <td class="view-message text-right">
                    </td>
                </tr>
                <?php $m++ ; } ?>
            </tbody>
        </table>
    </div>
</aside>
<div class="modal" tabindex="-1" role="dialog" id="selectionMenu">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Seçiminizi Yapın</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a data-dismiss="modal" data-toggle="modal" href="#resultMenu"><button type="button" data-target="#resultMenu" id="secim_yapar" class="btn btn-primary">Seçim Yap</button></a>
                <button data-dismiss="modal" id="secim_pas" class="btn btn-warning">PAS</button>
                <button id="secim_gelmedi" data-dismiss="modal" class="btn btn-danger">GELMEDİ</button>

            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="resultMenu">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Çıktı Alma Ekranı</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?=$rota."demo_dr/../report/word_out.php"?>?write=<?=$url?>"><button type="button" id="cikti" class="btn btn-primary">Çıktı Al</button></a>
            </div>
        </div>
    </div>
</div>
<!-- Burası Jquery İle Refresh Sorununu Çözdüğümüz yer. -->
<script>
    function addClick(url, adres) {
        $("#secim_yapar").unbind("click");
        $("#secim_yapar").on("click", function(){ tryelse(url, adres); });
        $("#secim_pas").unbind("click");
        $("#secim_pas").on("click", function(){ tryelse1(url, "pas"); });
        $("#secim_gelmedi").unbind("click");
        $("#secim_gelmedi").on("click", function(){ tryelse1(url, "gelmedi"); });
    }
    function tryelse(url, id) {
        $.get("index.php", {"url": url, "adres": id}, function (returnData, status) {
            //alert('Status ' + status + ' The server said ' + returnData);
            //$('#test123123').detach();
            $('#test123').replaceWith($(returnData).find("#test123"));
            $('#test321').replaceWith($(returnData).find("#test321"));
        });
    }
    function tryelse1(url, id) {
        $.get("index.php", {"url": url, "durum": id}, function (returnData, status) {
            //alert('Status ' + status + ' The server said ' + returnData);
            //$('#test123123').detach();
            $('#test321').replaceWith($(returnData).find("#test321"));
        });
    }

</script>