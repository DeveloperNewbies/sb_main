-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 13 Şub 2019, 21:14:42
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
  `adres_select` mediumtext COLLATE utf8_turkish_ci NOT NULL COMMENT 'adresi seçen doktor id si',
  `adres_status` varchar(100) COLLATE utf8_turkish_ci NOT NULL COMMENT 'adresi durumu seçili olup olmadığı'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adres`
--

INSERT INTO `adres` (`id`, `address`, `adres_select`, `adres_status`) VALUES
(64989651, 'Pemiller mahallesi', '0', '0'),
(63863155, 'Aydınlar Mahallesi', '54276834619', '1'),
(58946444, 'Köşebaşı Mahallesi', '0', '0'),
(24653723, 'Adana kovabaşı mahallesi', '0', '0'),
(65896245, 'düzüçi sağlık ocağı', '0', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctor`
--

CREATE TABLE `doctor` (
  `must` int(11) NOT NULL COMMENT 'sıralaması',
  `doctor_id` bigint(11) DEFAULT NULL COMMENT 'doktor id si',
  `doctor_var` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'json doktor verileri',
  `doctor_place_id` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktorun seçim yaptığı adres id si',
  `doctor_old_place` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'seki adres id si',
  `doctor_selection` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktor durumu seçim yapıp yapmadığı'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doctor`
--

INSERT INTO `doctor` (`must`, `doctor_id`, `doctor_var`, `doctor_place_id`, `doctor_old_place`, `doctor_selection`) VALUES
(0, 54276834619, '{\"name\":\"Alparslan İlbey\",\"started_date\":\"2012\"}', '0', '63863155', '2'),
(1, 89828031892, '{\"name\":\"Mehmet Tuna\",\"started_date\":\"2015\"}', '0', '0', '0'),
(2, 80357797802, '{\"name\":\"Enes Budak\",\"started_date\":\"2002\"}', '0', '0', '1'),
(3, 82359681311, '{\"name\":\"Ahmet Çavuş\",\"started_date\":\"2014\"}', '0', '0', '0'),
(4, 14525632541, '{\"name\":\"Süleyman Tuna\",\"started_date\":\"2018\"}', '0', '0', '0'),
(5, 14532457852, '{\"name\":\"Süleyman çavuş\",\"started_date\":\"2010\"}', '0', '0', '0'),
(6, 14520120120, '{\"name\":\"Mehmet Çavuş\",\"started_date\":\"2000\"}', '0', '0', '0');

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
