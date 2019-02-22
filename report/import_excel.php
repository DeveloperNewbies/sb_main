<!DOCTYPE html>
<html>
    <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
<body>

<div class="container">
	<form id="fileUploadForm" 
    action="./aktar"
      enctype="multipart/form-data" method="post">
    <fieldset>
        <div class="form-horizontal">
            <div class="form-group">
                <div class="row">
                <label class="control-label col-md-2 text-right" for="filename"><span> Doktorlar dosyasını ekleyiniz </span></label>
                <div class="col-md-10">
                    <div class="input-group">
                        <input type="file" id="uploadedFile" name="item-image-" class="form-control form-control-sm" >
                        <div class="input-group-btn">
                            <input type="submit" value="Kaydet" name="submit" class="rounded-0 btn btn-primary">
                        </div>
                    </div>
                </div>
                </div>
            </div>                        
        </div>
    </fieldset>
</form>
</div>


</body>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: Alp
 * Date: 17.02.2019
 * Time: 02:25
 */

if(isset($_POST['submit']))
{
    $file;
    $expensions= array("xls","xlsx");
    $img_counter = 0;
        if (file_exists($_FILES['item-image-']['tmp_name']) && is_uploaded_file($_FILES['item-image-']['tmp_name'])) {
            $errors = array();
            $file_name = $_FILES['item-image-']['name'];
            $file_size = $_FILES['item-image-']['size'];
            $file_tmp = $_FILES['item-image-']['tmp_name'];
            $tmp = explode('.', $_FILES[('item-image-')]['name']);
            $file_ext = strtolower(end($tmp));

            if (in_array($file_ext, $expensions) === false) {
                array_push($errors, $file_name . " Farklı Uzantılar Kabul Edilemez, Lütfen XLS yada XLSX Dosyası Yükleyin.");
            }

            if ($file_size > 4194304) {
                array_push($errors, $file_name . " Dosya Boyutu 4 MB Aşamaz");
            }

            if (empty($errors) == true) {
                echo "Yükleme Başarılı";
                $file = $file_tmp;
                move_uploaded_file($file_tmp, "uploads/example.xlsx");
            }
        }else
        {
            $img_counter++;
        }


        
// including library to the code
require_once ('excel/Classes/PHPExcel/IOFactory.php');
require_once("../db/query.php");

$inputFileName = 'uploads/example.xlsx';

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $xls = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}
// Setting an active sheet
$xls->setActiveSheetIndex(0);

// Getting the active sheet into the object of class Spreadsheet_Excel_Writer_Worksheet representing the worksheet
$sheet = $xls->getActiveSheet();
// getHighestRow - the method returning the highest row in a worksheet;

$dr_val = array(
        /*
         * array(
         *
         *
         *      <th>Sıra NO</th>
                <th>Bulunduğu Bent</th>
                <th>ÖNCEKİ SÖZ.TARİHİ</th>
                <th>T.C.</th>
                <th>ADI SOYADI</th>
                <th>DURUMU</th>
                <th>ÜNVANI</th>
                <th>HİZMET PUANI</th>
                <th>İLÇE SAĞLIK MÜDÜRLÜĞÜ/TSM ADI</th>
                <th>ASM ADI</th>
                <th>BİRİM KODU</th>
                <th>KADRO YERİ</th>
                 *
         * )
         * */
);

for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
    if($sheet->getCellByColumnAndRow(0, $i)->getValue() == "")
        break;

    array_push($dr_val, array());
    $nColumn = PHPExcel_Cell::columnIndexFromString($sheet->getHighestColumn());
    for ($j = 0; $j < $nColumn; $j++) {
        $value = $sheet->getCellByColumnAndRow($j, $i)->getValue();
        // we add data to the DB using sql query.
        array_push($dr_val[$i-2], ($value=="")?"-":$value);
    }
    
}

        $query = new Query();

        foreach ($dr_val as $item){ 
           

            $hizmet_puan = $item[4] ;

            $all_doc = $query->all_doctor ();

            if(count ($all_doc) == 0 )
                $must = 1;
            else

            $must = $all_doc[count ($all_doc)-1]["must"]+1;

            if($item[8] != "-"){
                $adres_var = array(
                    "adres"=>(isset($item[9])) ? $item[9] : "-",
                    "asm"=>(isset($item[9])) ? $item[9] : "-",
                    "tsm"=>(isset($item[8])) ? $item[8] : "-",
                    "birim_code"=>(isset($item[11])) ? $item[11] : "-",
                    "kadro"=>(isset($item[12])) ? $item[12] : "-"
                );

                $adres_id = $query->create_adres($adres_var , $must);
                
            }

            $var = array (
                "name"=>(isset($item[3])) ? $item[3] : "-",
                "started_date"=>"",
                "tc"=>(isset($item[2])) ? $item[2] : "-",
                "brans"=>(isset($item[5])) ? $item[5] : "-",
                "status"=>"-",
                "ahb"=>"",
                "sicil"=>(isset($item[1])) ? $item[1] : "-",
                "contrat_date"=>(isset($item[7])) ? $item[7] : "-",
                "bend"=>(isset($item[6])) ? $item[6] : "-",
                "before_address"=>(isset($adres_id)) ? $adres_id : "-"
            );
            

          
            $query->create_doctor($var ,$hizmet_puan , (isset( $adres_id)) ?  $adres_id : 0 , $must);
            unset($adres_id );
        }
        
}
  
    ?>