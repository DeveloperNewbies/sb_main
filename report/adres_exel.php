<!DOCTYPE html>
<html>
<body>

<form action="./adresekle" method="post" enctype="multipart/form-data">
    Adres ekle
    <input type="file" name="item-image-" id="fileToUpload">
    <input type="submit" value="Kaydet" name="submit">
</form>

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

$dr_val = array();

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
    $adres_var = array(
        "adres"=>(isset($item[2])) ? $item[2] : "-",
        "asm"=>(isset($item[2])) ? $item[2] : "-",
        "tsm"=>(isset($item[1])) ? $item[1] : "-",
        "birim_code"=>(isset($item[3])) ? $item[3] : "-",
        "kadro"=>(isset($item[12])) ? $item[12] : "-"
    );

     $query->create_adres($adres_var , "0");
 }
}



  
    ?>