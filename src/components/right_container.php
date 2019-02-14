<style>
    body{
        font-size:20px;
    }
</style>
<aside class="lg-side">
    <?php if(isset($doctor_val)){?>
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
                                    <?php if(isset($old_adres[1])){ ?>
                                        <th scope="col"> Seçili Olan Adres : <?=$old_adres[1]?></th>

                                    <?php }else{ ?>
                                        <th scope="col"> Adres seçimi yapmalısınız </th>
                                    <?php }?>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >

                                    <td><?=$doctor_val[2]["name"]?> </td>

                                    <td><?=$doctor_val[1]?></td>
                                    <td scope="col">145236 </td>

                                </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>
            </div>


            <a href="<?=$rota."pdf/index.php"?>?write=<?=$url?>"> <button class="btn btn-success">Çıktı Al</button></a>
            <a href="<?=$rota."pdf/index.php"?>?write=all"><button class="btn btn-danger">Tüm Doktorların Çıktısı</button></a>
        </div>
    <?php }?>

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
                                <?php if(isset($old_adres[1])){ ?>
                                    <th scope="col"> Seçili Olan Adres </th>
                                <?php }else{ ?>
                                    <th scope="col"> Adres seçimi yapmalısınız </th>
                                <?php }?>
                            </tr>
                            </thead>
                            <tbody>
                            <tr >
                                <td><?php echo (isset($doctor_variable[2]["name"])) ? $doctor_variable[2]["name"] : "-"?> </td>

                                <td><?php echo (isset($doctor_variable[1])) ? $doctor_variable[1] : "-"?></td>
                                <td scope="col"><?php echo (isset($doctor_variable[3])) ? $doctor_variable[3] : "-"?> </td>
                                <td><?php echo (isset($old_adres[1])) ? $old_adres[1] : ""?></td>

                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>


            </div>
        </div>


        <a href="<?=$rota."pdf/index.php"?>?write=<?=$url?>"> <button class="btn btn-success">Çıktı Al</button></a>
        <a href="<?=$rota."pdf/index.php"?>?write=all"><button class="btn btn-danger">Tüm Doktorların Çıktısı</button></a>
    </div>
    <div class="inbox-body">
        <table class="table table-inbox table-hover">
            <tbody>
            <td class="view-message dont-show">Sıra   Adres</td>
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