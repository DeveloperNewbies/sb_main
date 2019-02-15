<?php
/**
 * Created by PhpStorm.
 * User: Alp
 * Date: 14.02.2019
 * Time: 19:17
 */

/** kullandigimiz kutuphane cagiriliyor */
include 'excel/Classes/PHPExcel/IOFactory.php';

$rota ="";
require_once ( $rota . "../db/query.php" );
$mquery = new Query();
$all_doctor = $mquery->all_doctor ();


// Excel Değişkeni ile Classımızı başlatıyoruz.
$Excel = new PHPExcel();

// Oluşturacağımız Excel Dosyasının ayarlarını yapıyoruz.
// Bu bilgiler O kadar önenli değil kafanıza göre doldurabilirsiniz.
$Excel->getProperties()->setCreator("Admin")
    ->setLastModifiedBy("Admin")
    ->setTitle("Musteri Bilgi Listesi")
    ->setSubject("Musteri Bilgi Listesi")
    ->setDescription("Musteri Bilgi Listesi")
    ->setKeywords("Tam Liste")
    ->setCategory("Tam Liste");

//Excel Dosyasının Sayfasını Adını Belirliyoruz
$Excel->getActiveSheet()->setTitle('Sayfa1');

$ord = ord('A');

$info_text = array(
    "Sıra NO",
    "Hekim T.C",
    "Ad Soyad",
    "Branş",
    "H.Puani",
    "Tercihi",
    "Ahb",
    "Asm",
    "Tsm",
    "İlce",
    "İslem Zamani"
);

for ($m = 0 ; $m < count ($all_doctor) ; $m++){
    $content[$m][0] = $all_doctor[$m]["must"];
    $content[$m][1] = $all_doctor[$m]["doctor_var"]["tc"];
    $content[$m][2] = $all_doctor[$m]["doctor_var"]["name"];
    $content[$m][3] = $all_doctor[$m]["doctor_var"]["brans"];
    $content[$m][4] = $all_doctor[$m]["hizmet_puan"];
       if($all_doctor[$m]["doctor_selection"] == 0)
         $content[$m][5] ="Gelmedi";
       else if($all_doctor[$m]["doctor_selection"] == 1)
           $content[$m][5] ="Adres Seçimi Yaptı";
       else if($all_doctor[$m]["doctor_selection"] == 2)
           $content[$m][5] = "Pas Geçti";
    $content[$m][6] = $all_doctor[$m]["doctor_var"]["ahb"];
    $content[$m][7] = $all_doctor[$m]["doctor_var"]["asm"];
    $content[$m][8] = $all_doctor[$m]["doctor_var"]["tsm"];
    if($all_doctor[$m]["doctor_old_place"] != 0){
        $adres = $mquery->bring_adres ($all_doctor[$m]["doctor_old_place"]);
        $adres = $adres[0]["address"]["adres"];
    }else{
        $adres = "-";
    }
    $content[$m][9] = $adres;
    $content[$m][10] = "".date('d-m-Y');

}

for($i = 0; $i < count($info_text); $i++)
{
    $Excel->getActiveSheet()->setCellValue(chr(($ord+$i)).'1', ''.$info_text[$i]);
}


$tur = 2;//her tursa bir alt satira gececegimiz icin sayac kullanıcaz
$offset = 0;
for($i = 0; $i < count($content); $i++)
{
    for($j = 0; $j < count($content[$i]); $j++)
    {

        $Excel->getActiveSheet()->setCellValue(chr(($ord+$offset))."$tur", $content[$i][$j]);
        $offset++;
    }
    $offset = 0;
    $tur++;
}

//olusturulan excel dosyası kaydediliyor
$Kaydet = PHPExcel_IOFactory::createWriter($Excel, 'Excel5');


header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=bilgi_cikisi.xls");

$Kaydet->save('php://output');



?>