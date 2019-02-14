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

                                <th scope="col">Adı</th>
                                <th scope="col">Göreve Başlama Tarihi</th>
                                
                                <th scope="col">T.C</th>
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
                               
                                <td><?=$doctor_val[2]["started_date"]?></td>

                                <td><?=$doctor_val[1]?></td>
                                
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
    <?php }else{ ?>
    <div class="inbox-head">
        <h4>Doktor: -</h4>
        <h5>Görev Başlama Tarihi: -</h5>
        <h5>Tc: -</h5>
        <?php if(isset($old_adres[1])){ ?>
            <h5>Seçili Olan Adres: <?=$old_adres[1]?>  </h5>
        <?php }else{ ?>
            <h5>Adres seçimi yapmalısınız</h5>
        <?php }?>
        <a href="<?=$rota."pdf/index.php"?>?write=all"><button class="btn btn-danger">Tüm Doktorların Çıktısı</button></a>
    </div>
    <?php } ?>
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
