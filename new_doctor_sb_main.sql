-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Şub 2019, 20:38:32
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
  `id` int(11) DEFAULT NULL COMMENT 'adrese özel id',
  `address` mediumtext COLLATE utf8_turkish_ci NOT NULL COMMENT 'adres içeriği',
  `adres_select` mediumtext COLLATE utf8_turkish_ci NOT NULL COMMENT 'adresi seçen doktor id si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`id`, `address`, `adres_select`) VALUES
(7273, '{\"adres\":\"ÇUKUROVA ASM\",\"ilce\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"asm\":\"ÇUKUROVA ASM\",\"müdürlük\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.01.107\",\"dhy\":\"0\"}', '1'),
(8791, '{\"adres\":\"YALIMEREZ ASM\",\"ilce\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"asm\":\"YALIMEREZ ASM\",\"müdürlük\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.04.094\",\"dhy\":\"0\"}', '2'),
(6517, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '3'),
(3517, '{\"adres\":\"ADANA DEVLET HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA DEVLET HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '4'),
(9645, '{\"adres\":\"YÜREĞİR DEVLET HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"YÜREĞİR DEVLET HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '5'),
(9776, '{\"adres\":\"ADANA ŞEHİR HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA ŞEHİR HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '6'),
(6121, '{\"adres\":\"ADANA ŞEHİR HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA ŞEHİR HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '7'),
(2334, '{\"adres\":\"ADANA ŞEHİR HASTANESİ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA ŞEHİR HASTANESİ\",\"birim\":\"\",\"dhy\":\"0\"}', '8'),
(7836, '{\"adres\":\"BAHÇEŞEHİR ASM\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.006\",\"dhy\":\"0\"}', '9'),
(1227, '{\"adres\":\"BAHÇEŞEHİR ASM\",\"ilce\":\"\",\"asm\":\"İNCİRCİ ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.07.002\",\"dhy\":\"0\"}', '10'),
(6898, '{\"adres\":\"CEYHAN 3 NOLU ASM\",\"ilce\":\"\",\"asm\":\"CEYHAN 3 NOLU ASM\",\"müdürlük\":\"CEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.06.031\",\"dhy\":\"0\"}', '11'),
(7551, '{\"adres\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"ALADAĞ İLÇE DEVLET HASTANESİ \",\"birim\":\"01.05.002\",\"dhy\":\"0\"}', '12'),
(8860, '{\"adres\":\"SALBAŞ ASM\",\"ilce\":\"\",\"asm\":\"SALBAŞ ASM\",\"müdürlük\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.01.059\",\"dhy\":\"0\"}', '13'),
(7683, '{\"adres\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"FEKE İLÇE DEVLET HASTANESİ \",\"birim\":\"01.07.004\",\"dhy\":\"0\"}', '14'),
(2716, '{\"adres\":\"SOLAKLI ASM\",\"ilce\":\"\",\"asm\":\"SOLAKLI ASM\",\"müdürlük\":\"YÜREĞİR İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.04.118\",\"dhy\":\"0\"}', '15'),
(9622, '{\"adres\":\"BERKER GÜLAÇTI ASM\",\"ilce\":\"\",\"asm\":\"BERKER GÜLAÇTI ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.011\",\"dhy\":\"0\"}', '16'),
(6591, '{\"adres\":\"BERKER GÜLAÇTI ASM\",\"ilce\":\"\",\"asm\":\"BERKER GÜLAÇTI ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.013\",\"dhy\":\"0\"}', '17'),
(5576, '{\"adres\":\"UÇAK ASM\",\"ilce\":\"\",\"asm\":\"UÇAK ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.250\",\"dhy\":\"0\"}', '18'),
(3421, '{\"adres\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"ALADAĞ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"ALADAĞ İLÇE DEVLET HASTANESİ \",\"birim\":\"01.05.001\",\"dhy\":\"0\"}', '19'),
(5334, '{\"adres\":\"TUFANBEYLİ MERKEZ ASM\",\"ilce\":\"\",\"asm\":\"TUFANBEYLİ MERKEZ ASM\",\"müdürlük\":\"TUFANBEYLİ TSM\",\"birim\":\"01.14.001\",\"dhy\":\"0\"}', '20'),
(6726, '{\"adres\":\"SAMİYE NADİYE ERDEM\",\"ilce\":\"\",\"asm\":\"SAMİYE NADİYE ERDEM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.157\",\"dhy\":\"0\"}', '21'),
(7013, '{\"adres\":\"SULUCA ASM\",\"ilce\":\"\",\"asm\":\"SULUCA ASM\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.029\",\"dhy\":\"0\"}', '22'),
(8605, '{\"adres\":\"MEHMET TÜMER ASM\",\"ilce\":\"\",\"asm\":\"MEHMET TÜMER ASM\",\"müdürlük\":\"İMAMOĞLU TSM\",\"birim\":\"01.08.006\",\"dhy\":\"0\"}', '23'),
(9228, '{\"adres\":\"MEHMET TÜMER ASM\",\"ilce\":\"\",\"asm\":\"MEHMET TÜMER ASM\",\"müdürlük\":\"İMAMOĞLU TSM\",\"birim\":\"01.08.005\",\"dhy\":\"0\"}', '24'),
(6538, '{\"adres\":\"KÜRKÇÜLER CEZA EVLERİ  AİLE SAĞLIĞI MERKEZİ\",\"ilce\":\"\",\"asm\":\"KÜRKÇÜLER CEZA EVLERİ  AİLE SAĞLIĞI MERKEZİ\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.031\",\"dhy\":\"0\"}', '25'),
(2013, '{\"adres\":\"YEŞİLYURT ASM\",\"ilce\":\"\",\"asm\":\"YEŞİLYURT ASM\",\"müdürlük\":\"SEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.03.204\",\"dhy\":\"0\"}', '26'),
(5023, '{\"adres\":\"YENİYAYLA ASM\",\"ilce\":\"\",\"asm\":\"YENİYAYLA ASM\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.030\",\"dhy\":\"0\"}', '27'),
(1637, '{\"adres\":\"ÇUKUROVA ASM\",\"ilce\":\"\",\"asm\":\"ÇUKUROVA ASM\",\"müdürlük\":\"ÇUKUROVA İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.01.108\",\"dhy\":\"0\"}', '28'),
(4338, '{\"adres\":\"KÜRKÇÜLER CEZA EVLERİ 2 NOLU  AİLE SAĞLIĞI MERKEZİ\",\"ilce\":\"\",\"asm\":\"KÜRKÇÜLER CEZA EVLERİ 2 NOLU  AİLE SAĞLIĞI MERKEZİ\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.045\",\"dhy\":\"0\"}', '29'),
(8611, '{\"adres\":\"SAİMBEYLİ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"SAİMBEYLİ ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"SAİMBEYLİ ŞEHİT UZMAN ÇAVUŞ ADEM AMBARCI İLÇE DEVLET HASTANESİ \",\"birim\":\"01.13.005\",\"dhy\":\"0\"}', '30'),
(9014, '{\"adres\":\"FEVZİYE ÖZÇELİK ASM\",\"ilce\":\"\",\"asm\":\"FEVZİYE ÖZÇELİK ASM\",\"müdürlük\":\"CEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.06.012\",\"dhy\":\"0\"}', '31'),
(7579, '{\"adres\":\"KÖSRELİ ASM\",\"ilce\":\"\",\"asm\":\"KÖSRELİ ASM\",\"müdürlük\":\"CEYHAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.06.025\",\"dhy\":\"0\"}', '32'),
(6543, '{\"adres\":\"BEYCELİ ASM\",\"ilce\":\"\",\"asm\":\"BEYCELİ ASM\",\"müdürlük\":\"SARIÇAM İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.02.044\",\"dhy\":\"0\"}', '33'),
(3344, '{\"adres\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"ilce\":\"\",\"asm\":\"FEKE ENTEGRE SAĞLIK HİZMETİ VEREN MERKEZ\",\"müdürlük\":\"FEKE İLÇE DEVLET HASTANESİ \",\"birim\":\"01.07.006\",\"dhy\":\"0\"}', '34'),
(6658, '{\"adres\":\"TAVŞANTEPE ASM\",\"ilce\":\"\",\"asm\":\"TAVŞANTEPE ASM\",\"müdürlük\":\"KOZAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.11.040\",\"dhy\":\"0\"}', '35'),
(3567, '{\"adres\":\"TEPECİKÖREN ASM\",\"ilce\":\"\",\"asm\":\"TEPECİKÖREN ASM\",\"müdürlük\":\"KOZAN İLÇE SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"01.11.028\",\"dhy\":\"0\"}', '36'),
(3045, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '37'),
(8308, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '38'),
(6660, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '39'),
(9215, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '40'),
(6870, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '41'),
(8869, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '42'),
(4657, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '43'),
(9478, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '44'),
(9944, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '45'),
(9795, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '46'),
(7682, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '47'),
(5076, '{\"adres\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"ilce\":\"\",\"asm\":\"\",\"müdürlük\":\"ADANA İL SAĞLIK MÜDÜRLÜĞÜ\",\"birim\":\"\",\"dhy\":\"0\"}', '48');

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
(1, 1, '{\"name\":\"GÜLFİDE ÇELİKTAŞ\",\"started_date\":\"\",\"tc\":\"18358122572\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR99808\"}', '17249.01', '7273', '0'),
(2, 2, '{\"name\":\"GİZEM ERDOĞDU\",\"started_date\":\"\",\"tc\":\"11278388738\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR136895\"}', '6702.07', '8791', '0'),
(3, 3, '{\"name\":\"MERYEM SOLAK KARABÖRK\",\"started_date\":\"\",\"tc\":\"28730574714\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR89586\"}', '27242.98', '6517', '0'),
(4, 4, '{\"name\":\"FÜSUN DEMİRÖZ GÜNDOĞAN\",\"started_date\":\"\",\"tc\":\"20470101588\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR60108\"}', '27230.00', '3517', '0'),
(5, 5, '{\"name\":\"AYÇELEN AYŞE TOPLARİŞLETEN\",\"started_date\":\"\",\"tc\":\"21613038396\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR99809\"}', '19250.16', '9645', '0'),
(6, 6, '{\"name\":\"MEHMET NEDİM TIRAŞ\",\"started_date\":\"\",\"tc\":\"26483649574\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR144665\"}', '7659.33', '9776', '0'),
(7, 7, '{\"name\":\"ASLIHAN FİDANCI\",\"started_date\":\"\",\"tc\":\"29822536030\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR117014\"}', '6767.00', '6121', '0'),
(8, 8, '{\"name\":\"SEVAL ARKIN\",\"started_date\":\"\",\"tc\":\"43777972354\",\"brans\":\"AİLE HEKİMLİĞİ UZMANI\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR166977\"}', '5461.17', '2334', '0'),
(9, 9, '{\"name\":\"AHMET UÇAR\",\"started_date\":\"\",\"tc\":\"18808088540\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR20687\"}', '41320.56', '7836', '0'),
(10, 10, '{\"name\":\"HASAN KESER\",\"started_date\":\"\",\"tc\":\"14275259476\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR59870\"}', '40247.84', '1227', '0'),
(11, 11, '{\"name\":\"MUSTAFA KARAT\",\"started_date\":\"\",\"tc\":\"18232141002\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR55187\"}', '39095.77', '6898', '0'),
(12, 12, '{\"name\":\"GÜLDANE ÇELEBİ\",\"started_date\":\"\",\"tc\":\"13138353658\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR114197\"}', '37205.68', '7551', '0'),
(13, 13, '{\"name\":\"NAMIK MİTAT KUŞDEMİR\",\"started_date\":\"\",\"tc\":\"22855029890\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR51797\"}', '31911.34', '8860', '0'),
(14, 14, '{\"name\":\"KÜRŞAT ÖZCAN KARACA\",\"started_date\":\"\",\"tc\":\"19895461698\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR145710\"}', '31340.54', '7683', '0'),
(15, 15, '{\"name\":\"FİLİZ SERİNTÜRK\",\"started_date\":\"\",\"tc\":\"15415242396\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR49622\"}', '30007.04', '2716', '0'),
(16, 16, '{\"name\":\"EROL SİYER\",\"started_date\":\"\",\"tc\":\"13435310224\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR62748\"}', '29972.82', '9622', '0'),
(17, 17, '{\"name\":\"ŞERİFE GÜNGÖR\",\"started_date\":\"\",\"tc\":\"36931654142\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR57757\"}', '29645.26', '6591', '0'),
(18, 18, '{\"name\":\"METİN DEMİR\",\"started_date\":\"\",\"tc\":\"57220316466\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR59072\"}', '29613.42', '5576', '0'),
(19, 19, '{\"name\":\"HARUN ERKAN AYTEKİN\",\"started_date\":\"\",\"tc\":\"18700172668\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR95798\"}', '28718.91', '3421', '0'),
(20, 20, '{\"name\":\"HASAN ATAL\",\"started_date\":\"\",\"tc\":\"14890224224\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR143865\"}', '26147.79', '5334', '0'),
(21, 21, '{\"name\":\"AHMET HIZLI\",\"started_date\":\"\",\"tc\":\"34549000320\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR75104\"}', '25805.07', '6726', '0'),
(22, 22, '{\"name\":\"ZERRİN TAYFUR\",\"started_date\":\"\",\"tc\":\"42499024846\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR70715\"}', '25795.50', '7013', '0'),
(23, 23, '{\"name\":\"ALİ HAKAN GÖK\",\"started_date\":\"\",\"tc\":\"33631725752\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR89127\"}', '25258.92', '8605', '0'),
(24, 24, '{\"name\":\"AYŞE KESİK\",\"started_date\":\"\",\"tc\":\"18965069420\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR93295\"}', '22453.75', '9228', '0'),
(25, 25, '{\"name\":\"NİHAT KORKUT BAYSAL\",\"started_date\":\"\",\"tc\":\"13828248332\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR84937\"}', '22449.01', '6538', '0'),
(26, 26, '{\"name\":\"HURİYE SEVGİLİ CURABAZ\",\"started_date\":\"\",\"tc\":\"27830606394\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR91483\"}', '22145.00', '2013', '0'),
(27, 27, '{\"name\":\"HARUN KAYA\",\"started_date\":\"\",\"tc\":\"15172222822\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR126065\"}', '21038.64', '5023', '0'),
(28, 28, '{\"name\":\"UMUT TOKMAK\",\"started_date\":\"\",\"tc\":\"29146882134\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR101963\"}', '20130.74', '1637', '0'),
(29, 29, '{\"name\":\"EBRU BAYSAL\",\"started_date\":\"\",\"tc\":\"21548128360\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR88808\"}', '19700.25', '4338', '0'),
(30, 30, '{\"name\":\"AYHAN KAVUKLUCA\",\"started_date\":\"\",\"tc\":\"11521350772\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR136498\"}', '19532.31', '8611', '0'),
(31, 31, '{\"name\":\"OSMAN SARI\",\"started_date\":\"\",\"tc\":\"51718131388\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR118788\"}', '18098.84', '9014', '0'),
(32, 32, '{\"name\":\"HANİFE SAMSA\",\"started_date\":\"\",\"tc\":\"16762192532\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR111849\"}', '17874.69', '7579', '0'),
(33, 33, '{\"name\":\"BETÜL ALTUNÖZ\",\"started_date\":\"\",\"tc\":\"17312266918\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR107796\"}', '15810.21', '6543', '0'),
(34, 34, '{\"name\":\"ERHAN YILMAZ\",\"started_date\":\"\",\"tc\":\"12685373690\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR127349\"}', '14618.72', '3344', '0'),
(35, 35, '{\"name\":\"GÖKHAN İŞÇİ\",\"started_date\":\"\",\"tc\":\"16618155384\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR139613\"}', '11878.25', '6658', '0'),
(36, 36, '{\"name\":\"SERHAT YİĞİT\",\"started_date\":\"\",\"tc\":\"18655115192\",\"brans\":\"AİLE HEKİMİ\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR168378\"}', '9637.01', '3567', '0'),
(37, 37, '{\"name\":\"İBRAHİM DEMİRHAN\",\"started_date\":\"\",\"tc\":\"30961783636\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR80875\"}', '31314.94', '3045', '0'),
(38, 38, '{\"name\":\"ÜMİT ÖZCAN\",\"started_date\":\"\",\"tc\":\"37108910504\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR76851\"}', '23073.78', '8308', '0'),
(39, 39, '{\"name\":\"ASAF BOYAM\",\"started_date\":\"\",\"tc\":\"37108910504\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR78332\"}', '22647.66', '6660', '0'),
(40, 40, '{\"name\":\"İBRAHİM BERBEROĞLU\",\"started_date\":\"\",\"tc\":\"10451344462\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR135677\"}', '20706.17', '9215', '0'),
(41, 41, '{\"name\":\"ÇİĞDEM AFŞER\",\"started_date\":\"\",\"tc\":\"10517445928\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR131823\"}', '18379.07', '6870', '0'),
(42, 42, '{\"name\":\"RIDVAN KURTGÖZ\",\"started_date\":\"\",\"tc\":\"10597357142\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR122443\"}', '14775.99', '8869', '0'),
(43, 43, '{\"name\":\"HÜSEM EFE\",\"started_date\":\"\",\"tc\":\"14440256804\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR128124\"}', '14457.83', '4657', '0'),
(44, 44, '{\"name\":\"BURCU VARLI BAZ\",\"started_date\":\"\",\"tc\":\"33500417474\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR118376\"}', '13648.24', '9478', '0'),
(45, 45, '{\"name\":\"SERKAN YILDIRIM\",\"started_date\":\"\",\"tc\":\"12589342846\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR92026\"}', '10532.28', '9944', '0'),
(46, 46, '{\"name\":\"EBRU KAYA\",\"started_date\":\"\",\"tc\":\"20693427496\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR143180\"}', '10521.94', '9795', '0'),
(47, 47, '{\"name\":\"BURAK AY\",\"started_date\":\"\",\"tc\":\"48337017452\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR171453\"}', '5866.68', '7682', '0'),
(48, 48, '{\"name\":\"BAHAR ÖZGÜZEL\",\"started_date\":\"\",\"tc\":\"19210152348\",\"brans\":\"\",\"ahb\":\"\",\"asm\":\"\",\"tsm\":\"\",\"sicil\":\"DR179242\"}', '5854.70', '5076', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doctor`
--
ALTER TABLE `doctor`
  ADD UNIQUE KEY `id` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
