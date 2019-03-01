<?php
/**
 * Created by PhpStorm.
 * User: Alp
 * Date: 19.02.2019
 * Time: 15:51
 */


$durum = true ;
if(isset($_POST["add_ok"]))
{
    require_once ("../../db/query.php");
    $query = new Query();
      //donem ekleme
      $all_donem = $query->all_donem ();
      if(count ($all_donem) == 0 ){
          $donem_must = 1;
      }else{
          $donem_must = $all_donem[count ($all_donem)-1]["id"];
      }

    if(is_numeric($_POST["tc"]))
    $tc =(Strlen($_POST["tc"]) == 11) ? $_POST["tc"] : false  ;
     else
         $durum = false;

    if(Strlen($_POST["username"]) > 0)
      $username = $_POST["username"] ;
    else
         $durum = false ;

         if(Strlen($_POST["sicil"])>0)
           $sicil = $_POST["sicil"];
         else
           $durum = false;


    if(isset($_POST["status"]))
        $durum = $_POST["status"];
    else
        $durum = false ;

    if(Strlen($_POST["caption"]) > 0)
        $caption = $_POST["caption"];
    else
        $durum = false ;

    if(is_numeric($_POST["hizmet_puan"]))
       $puan = (Strlen($_POST["hizmet_puan"]) > 0 ) ? $_POST["hizmet_puan"] :  false;
    else
         $durum = false;

    if (isset($_POST["tsm"]))
      $tsm = $_POST["tsm"] ;
    else
         $durum = false;

     if (isset($_POST["asm"]))
      $asm = $_POST["asm"] ;
    else
      $durum = false;

    if(isset($_POST["before_date"]))
      $before_date = $_POST["before_date"];
    else
         $durum = false ;

    if (isset($_POST["bend"]))
      $bend = $_POST["bend"];
    else
        $durum = false ;


    if($durum == true){
        $hizmet_puan = $puan ;

        $adres_var = array(
            "adres"=>$asm,
            "asm"=>$asm,
            "tsm"=>$tsm,
        );

        $all_doc = $query->all_doctor ();

        if(count ($all_doc) == 0 )
            $must = 1;
        else
        $must = $all_doc[count ($all_doc)-1]["must"]+1;

        $adres_id = $query->create_adres($adres_var , $must , $donem_must);
        $var = array (
            "name"=>$username,
            "started_date"=>"",
            "tc"=>$tc,
            "brans"=>$caption,
            "kadro_yer"=>$durum,
            "ahb"=>"",
            "sicil"=>"",
            "contrat_date"=>$before_date,
            "bend"=>$bend,
            "sicil"=>$sicil,
            "before_address"=>$adres_id
        );

        $ad_con = $query->create_doctor($var ,$hizmet_puan ,  $adres_id , $must , $donem_must);
    }else{
        echo "Geçerli Bilgiler giriniz ! ";
    }
}




?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doktor Ekleme</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <style>
        @media(min-width: 768px) {
            .field-label-responsive {
                padding-top: .5rem;
                text-align: right;
            }
        }
    </style>
</head>
<div class="container">
        <?php if(isset($ad_con) && $ad_con == true){ ?>
            <div class="alert alert-success">
        <strong><?=$username?></strong> Doktor eklendi.
        </div>
        <?php } ?>
    <form class="form-horizontal" method="post" action="./doctor" >
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="display-4">Yeni Doktor Ekle</h1>
                <hr>

            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Sicil No</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="sicil" class="form-control"
                               placeholder="Sicil Nuamarsı" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >T.C</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input name="tc" type="number" class="form-control"
                               placeholder="T.C" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Adı Soyadı</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="username" class="form-control"
                               placeholder="Ad Soyad" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Kadro Yeri</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="status" class="form-control"
                               placeholder="Kadro Yeri" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Ünvanı</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="caption" class="form-control"
                               placeholder="Ünvanı" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Hizmet Puanı</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="hizmet_puan" class="form-control"
                               placeholder="Hizmet Puanı" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >İlçe Sağlık Müdürlüğü TSM Adı</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="tsm" class="form-control"
                               placeholder="TSM ADI" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >ASM</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">

                        </div>
                        <input type="text" name="asm" class="form-control"
                               placeholder="ASM ADI" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Önceki Söz. Tarihi</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"></div>
                        <input type="date" name="before_date" class="form-control"
                               placeholder="Sözleşme Tarihi" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label >Bend Seç</label>
            </div>

            <div class="col-md-6 ml-5">
                <div class="dropdown">

                    <select name="bend">
                        <option class="dropdown-item" value="">Bend Seç</option>
                        <option class="dropdown-item" value="a">A</option>
                        <option class="dropdown-item" value="a1">A1</option>
                        <option class="dropdown-item" value="b1">B1</option>
                        <option class="dropdown-item" value="b2">B2</option>
                        <option class="dropdown-item" value="c">C</option>
                        <option class="dropdown-item" value="d">D</option>
                    </select>
                    <hr>

                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-success" name="add_ok" value="Kayıt Ol">
                <!-- <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Kayıt Ol</button> -->
            </div>
        </div>
    </form>
</div>
</body>
</html>
