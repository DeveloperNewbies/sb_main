-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Şub 2019, 17:16:07
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `saglik_bak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adres`
--

CREATE TABLE `adres` (
  `id` int(11) NOT NULL COMMENT 'adrese özel id',
  `address` mediumtext COLLATE utf8_turkish_ci NOT NULL COMMENT 'adres içeriği',
  `adres_select` mediumtext COLLATE utf8_turkish_ci NOT NULL COMMENT 'adresi seçen doktor id si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`id`, `address`, `adres_select`) VALUES
(1227, '{\"adres\":\"BAHÇEŞEHİR ASM\",\"ilce\":\"\",\"asm\":\"İNCİRCİ ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.07.002\",\"dhy\":\"0\"}', '0'),
(1637, '{\"adres\":\"ÇUKUROVA ASM\",\"ilce\":\"\",\"asm\":\"ÇUKUROVA ASM\",\"müdürlük\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.01.108\",\"dhy\":\"0\"}', '28'),
(2013, '{\"adres\":\"YEŞİLYURT ASM\",\"ilce\":\"\",\"asm\":\"YEŞİLYURT ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.204\",\"dhy\":\"0\"}', '26'),
(2334, '{\"adres\":\"ADANA ŞEHİR HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA ŞEHİR HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '5'),
(2716, '{\"adres\":\"SOLAKLI ASM\",\"ilce\":\"\",\"asm\":\"SOLAKLI ASM\",\"müdürlük\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.04.118\",\"dhy\":\"0\"}', '15'),
(3045, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '37'),
(3344, '{\"adres\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"FEKE İLÇE DEVLET HASTANESİ \",\"birim\":\"01.07.006\",\"dhy\":\"0\"}', '34'),
(3421, '{\"adres\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"ALADAĞ İLÇE DEVLET HASTANESİ \",\"birim\":\"01.05.001\",\"dhy\":\"0\"}', '19'),
(3517, '{\"adres\":\"ADANA DEVLET HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA DEVLET HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '4'),
(3553, '{\"adres\":\" MERKEZ 6 NOLU ASM\",\"ilce\":\"\",\"asm\":\" MERKEZ 6 NOLU ASM\",\"tsm\":\"KOZAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"müdürlük\":\"KOZAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\",\"ahb\":\"01.11.044\"}', '7'),
(3567, '{\"adres\":\"TEPECİKÖREN ASM\",\"ilce\":\"\",\"asm\":\"TEPECİKÖREN ASM\",\"müdürlük\":\"KOZAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.11.028\",\"dhy\":\"0\"}', '36'),
(3596, '{\"adres\":\"KÜRKÇÜLER CEZAEVLERİ 2 NOLU ASM\",\"ilce\":\"\",\"asm\":\"KÜRKÇÜLER CEZAEVLERİ 2 NOLU ASM\",\"tsm\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\",\"ahb\":\" 01.02.050\"}', '6'),
(3970, '{\"adres\":\"DAĞLIOĞLU ASM\",\"ilce\":\"\",\"asm\":\"DAĞLIOĞLU ASM\",\"tsm\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\",\"ahb\":\"01.03.263\"}', '16'),
(4161, '{\"adres\":\"AFETEVLERİ ASM\",\"ilce\":\"\",\"asm\":\"AFETEVLERİ ASM\",\"tsm\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"müdürlük\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\",\"ahb\":\"01.04.002\"}', '20'),
(4338, '{\"adres\":\"KÜRKÇÜLER CEZA EVLERİ 2 NOLU  AİLE SAĞLIĞI MERKEZİ\",\"ilce\":\"\",\"asm\":\"KÜRKÇÜLER CEZA EVLERİ 2 NOLU  AİLE SAĞLIĞI MERKEZİ\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.045\",\"dhy\":\"0\"}', '29'),
(4657, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '43'),
(5023, '{\"adres\":\"YENİYAYLA ASM\",\"ilce\":\"\",\"asm\":\"YENİYAYLA ASM\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.030\",\"dhy\":\"0\"}', '27'),
(5076, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '48'),
(5316, '{\"adres\":\" DADALOĞLU ASM\",\"ilce\":\"\",\"asm\":\" DADALOĞLU ASM\",\"tsm\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"müdürlük\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\",\"ahb\":\"01.04.129\"}', '21'),
(5334, '{\"adres\":\"TUFANBEYLİ MERKEZ ASM\",\"ilce\":\"\",\"asm\":\"TUFANBEYLİ MERKEZ ASM\",\"müdürlük\":\"TUFANBEYLİ TSM\",\"birim\":\"01.14.001\",\"dhy\":\"0\"}', '40'),
(5576, '{\"adres\":\"UÇAK ASM\",\"ilce\":\"\",\"asm\":\"UÇAK ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.250\",\"dhy\":\"0\"}', '18'),
(6121, '{\"adres\":\"ADANA ŞEHİR HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA ŞEHİR HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '2'),
(6517, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '3'),
(6538, '{\"adres\":\"KÜRKÇÜLER CEZA EVLERİ  AİLE SAĞLIĞI MERKEZİ\",\"ilce\":\"\",\"asm\":\"KÜRKÇÜLER CEZA EVLERİ  AİLE SAĞLIĞI MERKEZİ\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.031\",\"dhy\":\"0\"}', '25'),
(6543, '{\"adres\":\"BEYCELİ ASM\",\"ilce\":\"\",\"asm\":\"BEYCELİ ASM\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.044\",\"dhy\":\"0\"}', '0'),
(6591, '{\"adres\":\"BERKER GÜLAÇTI ASM\",\"ilce\":\"\",\"asm\":\"BERKER GÜLAÇTI ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.013\",\"dhy\":\"0\"}', '0'),
(6658, '{\"adres\":\"TAVŞANTEPE ASM\",\"ilce\":\"\",\"asm\":\"TAVŞANTEPE ASM\",\"müdürlük\":\"KOZAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.11.040\",\"dhy\":\"0\"}', '35'),
(6660, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '39'),
(6726, '{\"adres\":\"SAMİYE NADİYE ERDEM\",\"ilce\":\"\",\"asm\":\"SAMİYE NADİYE ERDEM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.157\",\"dhy\":\"0\"}', '4'),
(6870, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '41'),
(6898, '{\"adres\":\"CEYHAN 3 NOLU ASM\",\"ilce\":\"\",\"asm\":\"CEYHAN 3 NOLU ASM\",\"müdürlük\":\"CEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.06.031\",\"dhy\":\"0\"}', '11'),
(7013, '{\"adres\":\"SULUCA ASM\",\"ilce\":\"\",\"asm\":\"SULUCA ASM\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.029\",\"dhy\":\"0\"}', '22'),
(7273, '{\"adres\":\"ÇUKUROVA ASM\",\"ilce\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"asm\":\"ÇUKUROVA ASM\",\"müdürlük\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.01.107\",\"dhy\":\"0\"}', '0'),
(7551, '{\"adres\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"ALADAĞ İLÇE DEVLET HASTANESİ \",\"birim\":\"01.05.002\",\"dhy\":\"0\"}', '0'),
(7579, '{\"adres\":\"KÖSRELİ ASM\",\"ilce\":\"\",\"asm\":\"KÖSRELİ ASM\",\"müdürlük\":\"CEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.06.025\",\"dhy\":\"0\"}', '32'),
(7682, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '47'),
(7683, '{\"adres\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"FEKE İLÇE DEVLET HASTANESİ \",\"birim\":\"01.07.004\",\"dhy\":\"0\"}', '14'),
(7836, '{\"adres\":\"BAHÇEŞEHİR ASM\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.006\",\"dhy\":\"0\"}', '9'),
(8308, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '38'),
(8605, '{\"adres\":\"MEHMET TÜMER ASM\",\"ilce\":\"\",\"asm\":\"MEHMET TÜMER ASM\",\"müdürlük\":\"İMAMOĞLU TSM\",\"birim\":\"01.08.006\",\"dhy\":\"0\"}', '23'),
(8611, '{\"adres\":\"SAİMBEYLİ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"SAİMBEYLİ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"SAİMBEYLİ ŞEHİT UZMAN ÇAVUŞ ADEM AMBARCI İLÇE DEVLET HASTANESİ \",\"birim\":\"01.13.005\",\"dhy\":\"0\"}', '30'),
(8791, '{\"adres\":\"YALIMEREZ ASM\",\"ilce\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"asm\":\"YALIMEREZ ASM\",\"müdürlük\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.04.094\",\"dhy\":\"0\"}', '0'),
(8860, '{\"adres\":\"SALBAŞ ASM\",\"ilce\":\"\",\"asm\":\"SALBAŞ ASM\",\"müdürlük\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.01.059\",\"dhy\":\"0\"}', '13'),
(8869, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '42'),
(9014, '{\"adres\":\"FEVZİYE ÖZÇELİK ASM\",\"ilce\":\"\",\"asm\":\"FEVZİYE ÖZÇELİK ASM\",\"müdürlük\":\"CEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.06.012\",\"dhy\":\"0\"}', '31'),
(9215, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '0'),
(9228, '{\"adres\":\"MEHMET TÜMER ASM\",\"ilce\":\"\",\"asm\":\"MEHMET TÜMER ASM\",\"müdürlük\":\"İMAMOĞLU TSM\",\"birim\":\"01.08.005\",\"dhy\":\"0\"}', '24'),
(9478, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '44'),
(9622, '{\"adres\":\"BERKER GÜLAÇTI ASM\",\"ilce\":\"\",\"asm\":\"BERKER GÜLAÇTI ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.011\",\"dhy\":\"0\"}', '0'),
(9645, '{\"adres\":\"YÜREĞİR DEVLET HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"YÜREĞİR DEVLET HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '0'),
(9776, '{\"adres\":\"ADANA ŞEHİR HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA ŞEHİR HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '0'),
(9795, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '46'),
(9944, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '45'),
(9995, '{\"adres\":\"UÇAK ASM\",\"ilce\":\"\",\"asm\":\"UÇAK ASM\",\"tsm\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\",\"ahb\":\"01.03.250\"}', '17'),
(94428088, '{\"adres\":\"ellek sağlık ocağı\",\"ilce\":\"\",\"asm\":\"ellek sağlık ocağı\",\"müdürlük\":\"Ellek müdürlük\",\"birim\":\"\",\"dhy\":0,\"ahb\":\"3424\"}', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctor`
--

CREATE TABLE `doctor` (
  `must` int(11) NOT NULL COMMENT 'sıralaması',
  `doctor_id` bigint(11) DEFAULT NULL COMMENT 'doktor id si',
  `doctor_var` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'json doktor verileri',
  `hizmet_puan` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktor hizmet puanı',
  `doctor_old_place` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'seki adres id si',
  `doctor_selection` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktor durumu seçim yapıp yapmadığı'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doctor`
--

INSERT INTO `doctor` (`must`, `doctor_id`, `doctor_var`, `hizmet_puan`, `doctor_old_place`, `doctor_selection`) VALUES
(1, 1, '{\"name\":\"GÜLFİDE ÇELİKTAŞ\",\"started_date\":\"\",\"tc\":\"18358122572\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR99808\"}', '17249.01', '3553', '3'),
(2, 2, '{\"name\":\"GİZEM ERDOĞDU\",\"started_date\":\"\",\"tc\":\"11278388738\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR136895\"}', '6702.07', '6121', '3'),
(3, 3, '{\"name\":\"MERYEM SOLAK KARABÖRK\",\"started_date\":\"\",\"tc\":\"28730574714\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR89586\"}', '27242.98', '6517', '1'),
(4, 4, '{\"name\":\"FÜSUN DEMİRÖZ GÜNDOĞAN\",\"started_date\":\"\",\"tc\":\"20470101588\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR60108\"}', '27230.00', '6726', '1'),
(5, 5, '{\"name\":\"AYÇELEN AYŞE TOPLARİŞLETEN\",\"started_date\":\"\",\"tc\":\"21613038396\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR99809\"}', '19250.16', '2334', '1'),
(6, 6, '{\"name\":\"MEHMET NEDİM TIRAŞ\",\"started_date\":\"\",\"tc\":\"26483649574\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR144665\"}', '7659.33', '3596', '1'),
(7, 7, '{\"name\":\"ASLIHAN FİDANCI\",\"started_date\":\"\",\"tc\":\"29822536030\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR117014\"}', '6767.00', '3553', '2'),
(8, 8, '{\"name\":\"SEVAL ARKIN\",\"started_date\":\"\",\"tc\":\"43777972354\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR166977\"}', '5461.17', '3970', '1'),
(9, 9, '{\"name\":\"AHMET UÇAR\",\"started_date\":\"\",\"tc\":\"18808088540\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR20687\"}', '41320.56', '7836', '3'),
(10, 10, '{\"name\":\"HASAN KESER\",\"started_date\":\"\",\"tc\":\"14275259476\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR59870\"}', '40247.84', '2334', '2'),
(11, 11, '{\"name\":\"MUSTAFA KARAT\",\"started_date\":\"\",\"tc\":\"18232141002\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR55187\"}', '39095.77', '6898', '1'),
(12, 12, '{\"name\":\"GÜLDANE ÇELEBİ\",\"started_date\":\"\",\"tc\":\"13138353658\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR114197\"}', '37205.68', '1227', '1'),
(13, 13, '{\"name\":\"NAMIK MİTAT KUŞDEMİR\",\"started_date\":\"\",\"tc\":\"22855029890\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR51797\"}', '31911.34', '8860', '3'),
(14, 14, '{\"name\":\"KÜRŞAT ÖZCAN KARACA\",\"started_date\":\"\",\"tc\":\"19895461698\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR145710\"}', '31340.54', '7683', '3'),
(15, 15, '{\"name\":\"FİLİZ SERİNTÜRK\",\"started_date\":\"\",\"tc\":\"15415242396\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR49622\"}', '30007.04', '2716', '2'),
(16, 16, '{\"name\":\"EROL SİYER\",\"started_date\":\"\",\"tc\":\"13435310224\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR62748\"}', '29972.82', '3970', '1'),
(17, 17, '{\"name\":\"ŞERİFE GÜNGÖR\",\"started_date\":\"\",\"tc\":\"36931654142\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR57757\"}', '29645.26', '9995', '1'),
(18, 18, '{\"name\":\"METİN DEMİR\",\"started_date\":\"\",\"tc\":\"57220316466\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR59072\"}', '29613.42', '5576', '3'),
(19, 19, '{\"name\":\"HARUN ERKAN AYTEKİN\",\"started_date\":\"\",\"tc\":\"18700172668\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR95798\"}', '28718.91', '3421', '3'),
(20, 20, '{\"name\":\"HASAN ATAL\",\"started_date\":\"\",\"tc\":\"14890224224\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR143865\"}', '26147.79', '4161', '1'),
(21, 21, '{\"name\":\"AHMET HIZLI\",\"started_date\":\"\",\"tc\":\"34549000320\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR75104\"}', '25805.07', '5316', '3'),
(22, 22, '{\"name\":\"ZERRİN TAYFUR\",\"started_date\":\"\",\"tc\":\"42499024846\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR70715\"}', '25795.50', '7013', '2'),
(23, 23, '{\"name\":\"ALİ HAKAN GÖK\",\"started_date\":\"\",\"tc\":\"33631725752\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR89127\"}', '25258.92', '8605', '2'),
(24, 24, '{\"name\":\"AYŞE KESİK\",\"started_date\":\"\",\"tc\":\"18965069420\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR93295\"}', '22453.75', '9228', '2'),
(25, 25, '{\"name\":\"NİHAT KORKUT BAYSAL\",\"started_date\":\"\",\"tc\":\"13828248332\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR84937\"}', '22449.01', '6538', '2'),
(26, 26, '{\"name\":\"HURİYE SEVGİLİ CURABAZ\",\"started_date\":\"\",\"tc\":\"27830606394\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR91483\"}', '22145.00', '2013', '3'),
(27, 27, '{\"name\":\"HARUN KAYA\",\"started_date\":\"\",\"tc\":\"15172222822\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR126065\"}', '21038.64', '5023', '2'),
(28, 28, '{\"name\":\"UMUT TOKMAK\",\"started_date\":\"\",\"tc\":\"29146882134\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR101963\"}', '20130.74', '1637', '2'),
(29, 29, '{\"name\":\"EBRU BAYSAL\",\"started_date\":\"\",\"tc\":\"21548128360\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR88808\"}', '19700.25', '4338', '2'),
(30, 30, '{\"name\":\"AYHAN KAVUKLUCA\",\"started_date\":\"\",\"tc\":\"11521350772\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR136498\"}', '19532.31', '8611', '2'),
(31, 31, '{\"name\":\"OSMAN SARI\",\"started_date\":\"\",\"tc\":\"51718131388\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR118788\"}', '18098.84', '9014', '2'),
(32, 32, '{\"name\":\"HANİFE SAMSA\",\"started_date\":\"\",\"tc\":\"16762192532\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR111849\"}', '17874.69', '7579', '1'),
(33, 33, '{\"name\":\"BETÜL ALTUNÖZ\",\"started_date\":\"\",\"tc\":\"17312266918\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR107796\"}', '15810.21', '6543', '1'),
(34, 34, '{\"name\":\"ERHAN YILMAZ\",\"started_date\":\"\",\"tc\":\"12685373690\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR127349\"}', '14618.72', '3344', '2'),
(35, 35, '{\"name\":\"GÖKHAN İŞÇİ\",\"started_date\":\"\",\"tc\":\"16618155384\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR139613\"}', '11878.25', '6658', '2'),
(36, 36, '{\"name\":\"SERHAT YİĞİT\",\"started_date\":\"\",\"tc\":\"18655115192\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR168378\"}', '9637.01', '3567', '3'),
(37, 37, '{\"name\":\"İBRAHİM DEMİRHAN\",\"started_date\":\"\",\"tc\":\"30961783636\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR80875\"}', '31314.94', '3045', '2'),
(38, 38, '{\"name\":\"ÜMİT ÖZCAN\",\"started_date\":\"\",\"tc\":\"37108910504\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR76851\"}', '23073.78', '8308', '2'),
(39, 39, '{\"name\":\"ASAF BOYAM\",\"started_date\":\"\",\"tc\":\"37108910504\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR78332\"}', '22647.66', '6660', '3'),
(40, 40, '{\"name\":\"İBRAHİM BERBEROĞLU\",\"started_date\":\"\",\"tc\":\"10451344462\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR135677\"}', '20706.17', '5334', '1'),
(41, 41, '{\"name\":\"ÇİĞDEM AFŞER\",\"started_date\":\"\",\"tc\":\"10517445928\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR131823\"}', '18379.07', '6870', '0'),
(42, 42, '{\"name\":\"RIDVAN KURTGÖZ\",\"started_date\":\"\",\"tc\":\"10597357142\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR122443\"}', '14775.99', '8869', '0'),
(43, 43, '{\"name\":\"HÜSEM EFE\",\"started_date\":\"\",\"tc\":\"14440256804\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR128124\"}', '14457.83', '4657', '0'),
(44, 44, '{\"name\":\"BURCU VARLI BAZ\",\"started_date\":\"\",\"tc\":\"33500417474\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR118376\"}', '13648.24', '9478', '0'),
(45, 45, '{\"name\":\"SERKAN YILDIRIM\",\"started_date\":\"\",\"tc\":\"12589342846\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR92026\"}', '10532.28', '9944', '0'),
(46, 46, '{\"name\":\"EBRU KAYA\",\"started_date\":\"\",\"tc\":\"20693427496\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR143180\"}', '10521.94', '9795', '0'),
(47, 47, '{\"name\":\"BURAK AY\",\"started_date\":\"\",\"tc\":\"48337017452\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR171453\"}', '5866.68', '7682', '0'),
(48, 48, '{\"name\":\"BAHAR ÖZGÜZEL\",\"started_date\":\"\",\"tc\":\"19210152348\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR179242\"}', '5854.70', '5076', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log_save`
--

CREATE TABLE `log_save` (
  `id` int(11) NOT NULL,
  `tip` text COLLATE utf8_turkish_ci NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `islem_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `log_save`
--

INSERT INTO `log_save` (`id`, `tip`, `user_ip`, `islem_date`) VALUES
(211, '17 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-20 20:50:12'),
(212, '17 id li doktorun durumu 2 olarak değişti', '0', '2019-02-20 20:50:12'),
(213, '6591 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-20 22:25:47'),
(214, '17 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-20 22:25:47'),
(215, '17 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-20 22:25:47'),
(216, '9995 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-20 22:25:47'),
(217, '17 id li doktorun adresi 9995 olarak değişti ', '0', '2019-02-20 22:25:47'),
(218, '18 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:09:08'),
(219, '18 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 00:09:08'),
(220, '18 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:09:19'),
(221, '18 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 00:09:19'),
(222, '19 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:13:03'),
(223, '19 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 00:13:03'),
(224, '19 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:13:09'),
(225, '19 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 00:13:09'),
(226, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:47:40'),
(227, '20 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:47:40'),
(228, '20 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:47:40'),
(229, '4161 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:47:40'),
(230, '20 id li doktorun adresi 4161 olarak değişti ', '0', '2019-02-21 00:47:40'),
(231, '6726 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:47:55'),
(232, '21 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:47:55'),
(233, '21 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:47:55'),
(234, '5316 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:47:55'),
(235, '21 id li doktorun adresi 5316 olarak değişti ', '0', '2019-02-21 00:47:55'),
(236, '21 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:49:05'),
(237, '21 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 00:49:05'),
(238, '94428088 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:49:12'),
(239, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:49:12'),
(240, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:49:12'),
(241, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:49:12'),
(242, '2 id li doktorun adresi 5334 olarak değişti ', '0', '2019-02-21 00:49:12'),
(243, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:50:27'),
(244, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:50:27'),
(245, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:50:27'),
(246, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:50:27'),
(247, '2 id li doktorun adresi 6121 olarak değişti ', '0', '2019-02-21 00:50:27'),
(248, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:50:39'),
(249, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:50:39'),
(250, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:50:39'),
(251, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:50:39'),
(252, '2 id li doktorun adresi 5334 olarak değişti ', '0', '2019-02-21 00:50:39'),
(253, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:51:49'),
(254, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:51:49'),
(255, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:51:49'),
(256, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:51:49'),
(257, '2 id li doktorun adresi 6121 olarak değişti ', '0', '2019-02-21 00:51:49'),
(258, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:54:27'),
(259, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:54:27'),
(260, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:54:27'),
(261, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:54:27'),
(262, '2 id li doktorun adresi 5334 olarak değişti ', '0', '2019-02-21 00:54:27'),
(263, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:55:17'),
(264, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:55:17'),
(265, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:55:18'),
(266, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:55:18'),
(267, '2 id li doktorun adresi 6121 olarak değişti ', '0', '2019-02-21 00:55:18'),
(268, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:55:28'),
(269, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:55:28'),
(270, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:55:28'),
(271, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:55:28'),
(272, '2 id li doktorun adresi 5334 olarak değişti ', '0', '2019-02-21 00:55:28'),
(273, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:57:34'),
(274, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:57:34'),
(275, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:57:34'),
(276, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:57:34'),
(277, '2 id li doktorun adresi 6121 olarak değişti ', '0', '2019-02-21 00:57:34'),
(278, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:57:43'),
(279, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 00:57:43'),
(280, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 00:57:43'),
(281, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 00:57:43'),
(282, '2 id li doktorun adresi 5334 olarak değişti ', '0', '2019-02-21 00:57:43'),
(283, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 01:17:27'),
(284, '2 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 01:17:27'),
(285, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 01:17:27'),
(286, '6121 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 01:17:27'),
(287, '2 id li doktorun adresi 6121 olarak değişti ', '0', '2019-02-21 01:17:27'),
(288, '35 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 08:53:03'),
(289, '35 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 08:53:03'),
(290, '22 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 08:53:09'),
(291, '22 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 08:53:09'),
(292, '23 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:00:52'),
(293, '23 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:00:52'),
(294, '24 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:01:04'),
(295, '24 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:01:04'),
(296, '25 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:07:06'),
(297, '25 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:07:06'),
(298, '26 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:07:24'),
(299, '26 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:07:24'),
(300, '26 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:07:26'),
(301, '26 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 09:07:26'),
(302, '27 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:09:05'),
(303, '27 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:09:05'),
(304, '28 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:11:24'),
(305, '28 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:11:24'),
(306, '29 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:11:34'),
(307, '29 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:11:34'),
(308, '1 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:12:31'),
(309, '1 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:12:31'),
(310, '1 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:12:36'),
(311, '1 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:12:36'),
(312, '1 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:12:37'),
(313, '1 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 09:12:37'),
(314, '9 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:12:43'),
(315, '9 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:12:43'),
(316, '9 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:12:44'),
(317, '9 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:12:44'),
(318, '9 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:12:46'),
(319, '9 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 09:12:46'),
(320, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:14:52'),
(321, '13 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:14:52'),
(322, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:43'),
(323, '13 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:43'),
(324, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:43'),
(325, '13 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:43'),
(326, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:44'),
(327, '13 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:44'),
(328, '15 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:49'),
(329, '15 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:49'),
(330, '15 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:50'),
(331, '15 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:50'),
(332, '21 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:53'),
(333, '21 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:53'),
(334, '21 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:54'),
(335, '21 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:54'),
(336, '21 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:15:54'),
(337, '21 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:15:54'),
(338, '21 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:16:00'),
(339, '21 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 09:16:00'),
(340, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:17:12'),
(341, '13 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:17:12'),
(342, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:17:14'),
(343, '13 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:17:14'),
(344, '13 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:17:14'),
(345, '13 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 09:17:14'),
(346, '30 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:20:46'),
(347, '30 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:20:46'),
(348, '31 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 09:20:54'),
(349, '31 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 09:20:54'),
(350, '6543 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 10:20:44'),
(351, '33 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 10:20:44'),
(352, ' id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 10:20:44'),
(353, '33 id li doktorun adresi  olarak değişti ', '0', '2019-02-21 10:20:44'),
(354, '7579 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 10:21:03'),
(355, '32 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 10:21:03'),
(356, '32 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 10:21:03'),
(357, '7579 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 10:21:03'),
(358, '32 id li doktorun adresi 7579 olarak değişti ', '0', '2019-02-21 10:21:03'),
(359, '38 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:13:56'),
(360, '38 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 11:13:56'),
(361, '34 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:14:00'),
(362, '34 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 11:14:00'),
(363, '36 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:14:07'),
(364, '36 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 11:14:07'),
(365, '37 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:36:31'),
(366, '37 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 11:36:31'),
(367, '39 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:36:35'),
(368, '39 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 11:36:35'),
(369, '9215 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 11:36:45'),
(370, '40 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 11:36:45'),
(371, '40 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:36:45'),
(372, '5334 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 11:36:45'),
(373, '40 id li doktorun adresi 5334 olarak değişti ', '0', '2019-02-21 11:36:45'),
(374, '10 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:56:40'),
(375, '10 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 11:56:40'),
(376, '2 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:56:42'),
(377, '2 id li doktorun durumu 3 olarak değişti', '0', '2019-02-21 11:56:42'),
(378, '6517 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 11:56:46'),
(379, '3 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 11:56:46'),
(380, '3 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:56:46'),
(381, '6543 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 11:56:46'),
(382, '3 id li doktorun adresi 6543 olarak değişti ', '0', '2019-02-21 11:56:46'),
(383, '6543 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 11:56:59'),
(384, '3 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 11:56:59'),
(385, '3 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 11:56:59'),
(386, '6591 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 11:56:59'),
(387, '3 id li doktorun adresi 6591 olarak değişti ', '0', '2019-02-21 11:56:59'),
(388, '6591 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 12:03:46'),
(389, '3 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 12:03:46'),
(390, '3 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 12:03:46'),
(391, '6517 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 12:03:46'),
(392, '3 id li doktorun adresi 6517 olarak değişti ', '0', '2019-02-21 12:03:46'),
(393, '3553 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 12:04:24'),
(394, '4 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 12:04:24'),
(395, '4 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 12:04:24'),
(396, '6726 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 12:04:24'),
(397, '4 id li doktorun adresi 6726 olarak değişti ', '0', '2019-02-21 12:04:24'),
(398, '1227 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 13:19:41'),
(399, '7 id li doktorun doctor_old_place sütunu güncellendi', '0', '2019-02-21 13:19:41'),
(400, '7 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 13:19:41'),
(401, '3553 id li adresin  adres_select sütunu güncellendi', '0', '2019-02-21 13:19:41'),
(402, '7 id li doktorun adresi 3553 olarak değişti ', '0', '2019-02-21 13:19:41'),
(403, '7 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 13:19:48'),
(404, '7 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 13:19:48'),
(405, '7 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 13:19:56'),
(406, '7 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 13:19:56'),
(407, '7 id li doktorun doctor_selection sütunu güncellendi', '0', '2019-02-21 13:20:00'),
(408, '7 id li doktorun durumu 2 olarak değişti', '0', '2019-02-21 13:20:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `doctor`
--
ALTER TABLE `doctor`
  ADD UNIQUE KEY `id` (`doctor_id`);

--
-- Tablo için indeksler `log_save`
--
ALTER TABLE `log_save`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `log_save`
--
ALTER TABLE `log_save`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
