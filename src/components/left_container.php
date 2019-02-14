<style>
.label{

    font-size:100%;
}

</style>
<aside class="sm-side">
    <div class="user-head">
        <?php require_once ($rota."src/components/head_left_title.php")?>
    </div>
    <ul class="inbox-nav inbox-divider">
          <?php foreach ($all_doctor as $value){
              $doctor_var = json_decode ($value["doctor_var"],JSON_UNESCAPED_UNICODE);
              $name = $doctor_var["name"];
              $puan = $doctor_var["started_date"];
              $selection = $value["doctor_selection"];
              if($selection == 0)
                  $selection = "<span class=\"label label-danger pull-right\">Gelmedi</span>";
              else if($selection == 1)
                  $selection = "<span  class=\"label label-success pull-right\">Adres seçildi</span>";
              else if($selection == 2)
                  $selection = "<span class=\"label label-warning pull-right\">Pas geçti</span>";

              $adres = $mquery->bring_adres ($value["doctor_old_place"]);
              ?>


<li class="<?php echo ($value['doctor_id'] == $url) ? 'active' : '' ; ?>">
                  <a href="index.php?url=<?=$value['doctor_id']?>"><?=$value["must"]?> <?=$name?> <?=$selection?> </a>
                  

              </li>
          <?php } ?>
      </ul>
</aside>
