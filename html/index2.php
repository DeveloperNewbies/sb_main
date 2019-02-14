<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 13.02.2019
 * Time: 19:42
 */
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doktor- Adres seçimi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</head>

<body>

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover ">
                    <thead>
                    <tr>

                        <th scope="col">Sıra No</th>
                        <th scope="col">Ad-Soyad</th>
                        <th scope="col">Göreve başlama tarihi</th>
                        <th scope="col">TC</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <th scope="row">1</th>
                        <td><?=$doctor_variable[2]["name"]?></td>
                        <td><?=$doctor_variable[2]["started_date"]?></td>
                        <td><?=$doctor_variable[1]?></td>
                    </tr>


                    </tbody>
                </table>

            </div>
        </div>


    </div>
</div>






<div>

    <div class="row">
        <div class="col-lg-3">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered  ">

                    <thead class="thead-dark  table-sm ">
                    <tr>
                        <th>
                            <label class="form-checkbox">
                                <input type="checkbox">
                                <i class="form-icon"></i>
                            </label>
                        </th>
                        <th>Sıra No</th>
                        <th>Ad-Soyad</th>
                        <th>Göreve Baş. Tarihi</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($all_doctor as $value){
                        $doctor_var = json_decode ($value["doctor_var"],JSON_UNESCAPED_UNICODE);
                        $name = $doctor_var["name"];
                        $st_date = $doctor_var["started_date"];
                        $selection = $value["doctor_selection"];
                        ?>
                        <tr id="<?=$value["doctor_id"]?>">
                            <th>
                                <label class="form-checkbox">
                                    <input type="checkbox" >
                                    <i class="form-icon"></i>
                                </label>
                            </th>
                            <td scope="row"><?=$value["must"]?></td>
                            <td><?=$name?></td>
                            <td><?=$st_date?></td>
                        </tr>
                    <?php } ?>
                    </tbody>


                </table>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">

                    <thead class="thead-dark table-sm ">
                    <tr>

                        <th class="col"></th>
                        <th class="col">No</th>

                        <th class="col" style="width:125%"> Adres</th>
                        <th class="col"> Seçen Doktor </th>
                        <th class="col">YERİ SEÇ</th>
                        <th class="col">PAS</th>
                        <th class="col">GELMEDİ</th>

                    </tr>
                    </thead>


                    <tbody>
                    <?php for ($var = 0; $var < count ($all_adres);$var++){
                        $select_adres_to_doctor=$mquery->bring_doctor ($all_adres[$var]["adres_select"]);
                        $d_name =$select_adres_to_doctor[2]["name"];
                        ?>
                        <tr id ="<?=$all_adres[$var]["id"]?>">

                            <th>
                                <label class="form-checkbox">
                                    <input type="checkbox" >
                                    <i class="form-icon"></i>
                                </label>
                            </th>

                            <th scope="row">1</th>
                            <td><?=$all_adres[$var]["address"]?></td>
                            <td><?=$d_name?></td>
                            <td> <button class="btn btn-success">SEÇ</button> </td>
                            <td><button class="btn btn-warning">PAS</button></td>
                            <td><button class="btn btn-danger">GELMEDİ</button></td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>
</div>

<div id="app">

    <p></p>

</div>



<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script src="script.js"></script>


</body>

</html>

