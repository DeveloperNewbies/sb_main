<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 19.02.2019
 * Time: 18:23
 */

$durum = true ;
if(isset($_POST["sub"])){

    require_once ("../../db/query.php");
    $query = new Query();

    print_r($_POST);

    if(isset($_POST["tsm"]))
        $tsm = $_POST["tsm"];
    else
        $durum = false ;

    if(isset($_POST["asm"]))
        $asm = $_POST["asm"];
    else
        $durum = false;

    if(isset($_POST["ahb"]))
        $ahb = $_POST["ahb"];
    else
        $durum = false ;

    if($durum == true ){

        $var = array(
            "adres"=>$asm ,
            "ilce"=> "",
            "asm"=>$asm,
            "müdürlük"=>$tsm,
            "birim"=>"",
            "dhy"=>0,
            "ahb"=>$ahb
        );
        $query->create_adres ($var);
    }else echo "Hatalı Bilgiler Girdiniz ? ";
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adres Ekleme</title>
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
    <form class="form-horizontal" method="post" action="adres" >
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="display-4">Yeni Adres Ekle</h1>
                <hr>

            </div>
        </div>

        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">TSM ADI </label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"></div>
                        <input type="text" name="tsm" class="form-control"
                               placeholder="TSM ADI" required autofocus>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">ASM ADI </label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"></div>
                        <input type="text"  name="asm" class="form-control"
                               placeholder="ASM ADI" required autofocus>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">AHB KODU </label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"></div>
                        <input type="text" name="ahb" class="form-control"
                               placeholder="AHB KODU" required autofocus>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-success" name="sub" value="Adresi Ekle">
            </div>
        </div>
    </form>
</div>
</body>
</html>
