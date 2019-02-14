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
$db_name ="saglik_bak";
$global_adres ="localhost";
require_once ( $rota . "../db/query.php" );
$mquery = new Query($db_name);



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
    "Siparis NO: ",
    "Ad Soyad: ",
    "E-Mail: ",
    "Telefon Numarasi: ",
    "Adres: "
);

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
$Kaydet->save("bilgi_cikisi.xls");

//kullanıcı excel dosyasına yonlendiriliyor
header("location:bilgi_cikisi.xls");


?>