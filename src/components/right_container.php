<style>
    body{
        font-size:20px;
    }
</style>
<aside class="lg-side">
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
            <a href="<?=$rota."demo_dr/../report/word_out.php"?>?write=<?=$url?>"> <button class="btn btn-success">Çıktı Al</button></a>
            <?php } ?>
            <a href="<?=$rota."demo_dr/../report/report_excel.php"?>"><button class="btn btn-danger">Tüm Doktorların Çıktısı</button></a>
        </div>
    <div class="inbox-body">
        <table class="table table-inbox table-hover">
            <tbody>
            <td class="view-message dont-show">Sıra   Adres</td>
            <td class="view-message"> </td>
            <td class="view-message inbox-small-cells"></td>
            <td class="view-message text-right">
                <?php if(isset($url)){ ?>
                <a href="index.php?url=<?=$url?>&durum=pas"> <button class="btn btn-warning">PAS</button></a>
                <a href="index.php?url=<?=$url?>&durum=gelmedi"><button class="btn btn-danger">GELMEDİ</button></a>
                <?php }?>
            </td>

            <?php
            $m = 1;
            foreach ($all_adres as $result){?>

                <tr class="" id ="<?=$result["id"]?>" >
                    <td class="view-message dont-show"><?=$m?>- <?=$result["address"]["adres"]?></td>
                    <td class="view-message"></td>
                    <td class="view-message inbox-small-cells"></td>
                    <td class="view-message text-right">
                     <?php if(isset($url)){ ?>
                        <a href="index.php?url=<?=$url?>&adres=<?=$result["id"]?>"><button class="btn btn-success">SEÇ</button></a>
                        <?php } ?>
                    </td>
                </tr>
                <?php $m++ ; } ?>
            </tbody>
        </table>
    </div>
</aside>