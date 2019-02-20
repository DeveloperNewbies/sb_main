<style>
.label{

    font-size:100%;
}

</style>
<aside class="sm-side" id="test321">
    <div class="user-head">
        <?php require_once ($rota."src/components/head_left_title.php")?>
    </div>
<div class="col-md-1"></div>
    <div class="btn-group btn-group-lg">
        <td> <button class="btn btn-primary" >Sıra Bekleyenler</button>   </td>
        <td>  <button class="btn btn-warning" >Pas  Geçenler</button>  </td>
        <td>  <button class="btn btn-danger" >Gelmeyenler </button> </td>
        <td>  <button class="btn btn-success" >Adres Seçenler</button>  </td>
   </div>
   <ul class="inbox-nav inbox-divider">
       <?php
       foreach ($all_doctor as $value) {
           $name = $value["doctor_var"]["name"];
           $puan = $value["doctor_var"]["started_date"];
           $selection = $value["doctor_selection"];
           if(isset($value["doctor_old_place"]))
               $doctor_old_adres = $mquery->bring_adres ($value["doctor_old_place"]);
           else
               $doctor_old_adres = "-";

           if ( $_SESSION["secim"] == 0 ) {
               if ( $selection != 1 ) {
                   ?>
                   <li class="<?php echo ( $value['doctor_id'] == $url ) ? 'active' : ''; ?>">
                       <a href="<?= $value['doctor_id'] ?>"><?= $value["must"] ?>- <?= $name ?>  <span style="float: right;"><?=$doctor_old_adres[0]["address"]["adres"]?></span> </a>
                   </li>
                   <?php
               }
           } else if ( $_SESSION["secim"] == $selection ) {
               ?>

               <li class="<?php echo ( $value['doctor_id'] == $url ) ? 'active' : ''; ?>">
                   <a href="<?= $value['doctor_id'] ?>"><?= $value["must"] ?> - <?= $name ?> </a>
               </li>
               <?php
           }
       }
                ?>
   </ul>
</aside>
