<style>
.label{

    font-size:100%;
}

</style>
<aside class="sm-side" id="test321">
    <div class="user-head">
        <?php require_once ($rota."src/components/head_left_title.php")?>
    </div>

    
        <button onclick="refreshLeft('0')" class="btn btn-outline-primary" >Sıra Bekleyenler</button>   
        <button onclick="refreshLeft('2')" class="btn btn-outline-warning" >Pas  Geçenler</button>  
        <button onclick="refreshLeft('3')" class="btn btn-outline-danger" >Gelmeyenler </button> 
        <button onclick="refreshLeft('1')" class="btn btn-outline-success" >Adres Seçenler</button>  
  
    <ul class="inbox-nav inbox-divider">
        <?php
        foreach ($all_doctor as $value) {
            $name = $value["doctor_var"]["name"];
            $puan = $value["doctor_var"]["started_date"];
            $selection = $value["doctor_selection"];
            if ( $_SESSION["secim"] == 0 ) {
                if ( $selection != 1 ) {
                    ?>
                    <li class="<?php echo ( $value['doctor_id'] == $url ) ? 'active' : ''; ?>">
                        <a href="<?= $value['doctor_id'] ?>"><?= $value["must"] ?> - <?= $name ?> </a>
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
<script>
    function refreshLeft(url) {
        $.get("index.php", {"secim": url }, function (returnData, status) {
            //alert('Status ' + status + ' The server said ' + returnData);
            //$('#test123123').detach();
            $('#test321').replaceWith($(returnData).find("#test321"));
        });
    }
</script>