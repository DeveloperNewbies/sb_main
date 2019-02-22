<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content" id="body_body">

  
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mt-3 text-gray-800">Hekim Seçme-Yerleştirme Sistemi </h1>
     
    </div>

    <!-- Content Row -->
    <div class="row" id="refresh-card">

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-2 col-md-1 mb-4" onclick="refresh_doctor('0')" >
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Sırada Bekleyenler</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$doctor_select_num["0"]?></div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div  onclick="refresh_doctor('2')"  class="col-xl-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div  class="text-sm font-weight-bold text-success text-uppercase mb-4">Pas Geçenler</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$doctor_select_num["2"]?></div>
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-2 col-md-6 mb-4" onclick="refresh_doctor('3')">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Seçmeye Gelmeyenler</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$doctor_select_num["3"]?></div>
                  </div>
                  
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-2 col-md-6 mb-4" onclick="refresh_doctor('1')">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Tercih Yapanlar</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$doctor_select_num["1"]?></div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-5">
     
        <div class="card shadow mb-4">
       
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between" id="doctor_table">
          <?php if($doctor_variable != false){ ?>
            <h6 class="m-0 font-weight-bold text-primary" id="doctor_card_title"><?= $doctor_variable[0]["must"] ."-(". $doctor_variable[0]["doctor_var"]["brans"].") ". $doctor_variable[0]["doctor_var"]["name"] ?></h6>
         
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-print text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Doktor İşlemleri</div>
                <a id="doctor_link" class="dropdown-item" href="./write/<?=$doctor_variable[0]["doctor_id"]?>">Çıktı Al</a>

              </div>
            </div>
          </div>
          <!-- Card Body -->
      
              <div class="card-body ">
              <div id="tc"> T.C: <?= $doctor_variable[0]["doctor_var"]["tc"] ?>    </div>
              <div id="hizmet_puan">Hizmet Puanı: <?= $doctor_variable[0]["hizmet_puan"] ?></div>
              <div id="dc_adres">Seçili Adres: <?php echo ((isset($old_adres) ? $old_adres : false) != false ) ?  $old_adres[0]["address"]["adres"] : "-" ; ?></div>
              <?php }else{ ?>
                <div>Doktor Seçiniz ! </div>
              <?php } ?>
              </div>
             
        </div>
     
      </div>


      
    </div>
    
    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-7 col-lg-7">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Doktor Listesi</h6>
            <div class="dropdown no-arrow">
              <button class="btn btn-warning" onclick="doctor_secim('pas')" >PAS GEÇ</button>
             <button class="btn btn-danger" onclick="doctor_secim('gelmedi')" >GELMEDİ</button>
            
            </div>
          </div>
          <!-- Card Body -->
          <div class="card-body" id="doctor_body">
          <?php
            foreach ($all_doctor as $value) {
                $name = $value["doctor_var"]["name"];
                $selection = $value["doctor_selection"];
                if(isset($value["doctor_old_place"])){
                  $doctor_old_adres = $mquery->bring_adres ($value["doctor_old_place"]);
                  if($doctor_old_adres != false){
                    $doctor_old_adres = $doctor_old_adres[0]["address"]["adres"];
                  }else{
                    $doctor_old_adres = "-";
                  }
                  
                } else
                    $doctor_old_adres = "-";
                    if ( $_SESSION["secim"] == $selection ) {
                        $style = "background-color:dodgerblue ; color: white;";
               ?>

                <div class="text-sm hoverDiv" id="<?=$value["doctor_id"]?>" onclick="doctor_select('<?=$value['doctor_id']?>')" style="<?php echo ( $value['doctor_id'] == $url ) ? $style : ''; ?>">
                <?= $value["must"] ?> - <?= $name ?>   <span class="float-right"><?=$doctor_old_adres?></span> 
                </div>
    
                <?php
                 }
              }
              ?>
          </div>
        </div>
      </div>

      <!-- Pie Chart -->
      <div class="col-xl-5 col-lg-5" id="adres_table">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Adres Seçme</h6>
           
          </div>
          <!-- Card Body -->
          <div class="card-body" id="adres_body">
          <?php
            $m = 1;
            foreach ($all_adres as $result){?>
              <div class="text-lg hoverDiv" onclick="adres_select(<?=$result['id']?> , '<?=$result['address']['adres']?>' )" id ="<?=$result["id"]?>"><?=$m?>- <?=$result["address"]["adres"]?></div> 
              <?php $m++ ; } ?>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->
  

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php require_once("src/footer.php"); ?>

</div>

<script>
    function refresh_doctor(url) {
        $.get("index.php", {"secim": url }, function (returnData, status) {
            $('#doctor_body').replaceWith($(returnData).find("#doctor_body"));
        });
        $.get("index.php", {"": "" }, function (returnData, status) {
            $('#refresh-card').replaceWith($(returnData).find("#refresh-card"));
        });
    }

    function doctor_secim(durum) {
        $.get("index.php", {"durum": durum }, function (returnData, status) {
            $('#doctor_body').replaceWith($(returnData).find("#doctor_body"));
        });
        $.get("index.php", {"": "" }, function (returnData, status) {
            $('#refresh-card').replaceWith($(returnData).find("#refresh-card"));
        });
    }

   function adres_select (adres_id , adres_name) {
        swal({
            title: adres_name,
            text: "adresi seçmek için ok a tıklayın",
            icon: "success",
            buttons: true,
            dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) { 
                      swal("Adres seçildi", {
                        icon: "success",
                        }).then(
                          $.get("index.php", {"adres" : adres_id })
                     ).then(doctor_select("tuna")).then(
                      $.get("index.php", {"": "" }, function (returnData, status) {
                        $('#adres_body').replaceWith($(returnData).find("#adres_body"));
                    }) ).then(
                      $.get("index.php", {"": "" }, function (returnData, status) {
                        $('#refresh-card').replaceWith($(returnData).find("#refresh-card"));
                      }));
                } else {
                    swal("Adres seçilmedi !");
                }
            }
        );
       }

       
////////////////////
    function doctor_select(num){
      if(num == "tuna"){
        $.get("./json", {"":"" }, function (returnData, status) {
          let json = $.parseJSON(returnData);
           doctor_table(json,num);
           });
      }else{
        $.get("./json", {"url": num }, function (returnData, status) {
          let json = $.parseJSON(returnData);
           doctor_table(json,num);
           });
      }
    }

    function doctor_table(json,num){
      let brans = (json["doctor_var"]["brans"] === undefined) ? "-" : json["doctor_var"]["brans"];
      let doctor_table_title = json["must"]+"-"+"("+brans+") "+json["doctor_var"]["name"]; 
      let tc = "T.C: "+ json["doctor_var"]["tc"];
      let hizmet = "Hizmet Puanı:"+json["hizmet_puan"];
      let db_ad =  (json["adres"] === undefined) ? "-" : json["adres"];
      let adres = "Seçili Adres: "+ db_ad;

        $("#tc").html(tc);
        $("#doctor_card_title").html(doctor_table_title);
        $("#hizmet_puan").html(hizmet);
        $("#dc_adres").html(adres);

        $.get("index.php", {"":""}, function (returnData, status) {
              $('#doctor_body').replaceWith($(returnData).find("#doctor_body"));
          });
    
        $("#doctor_link").attr("href", "write/"+json["must"]);
    }
</script>

