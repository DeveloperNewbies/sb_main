-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Şub 2019, 19:01:52
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
(81251283, 'Ellek kasabası TSM', '69918187790'),
(51914253, 'Düziçi TSM', '0'),
(74167839, 'Adana Seyhan Mahallesi', '0'),
(62358289, 'İskenderun Kovabaşı TSM', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctor`
--

CREATE TABLE `doctor` (
  `must` int(11) NOT NULL COMMENT 'sıralaması',
  `doctor_id` bigint(11) DEFAULT NULL COMMENT 'doktor id si',
  `doctor_var` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'json doktor verileri',
  `hizmet_puan` int(11) NOT NULL COMMENT 'doktor hizmet puanı',
  `doctor_old_place` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'seki adres id si',
  `doctor_selection` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktor durumu seçim yapıp yapmadığı'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `doctor`
--

INSERT INTO `doctor` (`must`, `doctor_id`, `doctor_var`, `hizmet_puan`, `doctor_old_place`, `doctor_selection`) VALUES
(0, 69918187790, '{\"name\":\"Ahmet Çavuş\",\"started_date\":\"2009\"}', 0, '81251283', '1'),
(1, 44194028479, '{\"name\":\"Enes Budak\",\"started_date\":\"2002\"}', 0, '0', '0'),
(2, 41339595302, '{\"name\":\"Mehmet Tuna\",\"started_date\":\"2003\"}', 0, '0', '0'),
(3, 88741893395, '{\"name\":\"Alparslan İlbey\",\"started_date\":\"2018\"}', 0, '0', '0');

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
