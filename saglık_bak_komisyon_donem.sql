-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Şub 2019, 09:29:11
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
  `adres_select` mediumtext COLLATE utf8_turkish_ci NOT NULL COMMENT 'adresi seçen doktor id si',
  `donem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctor`
--

CREATE TABLE `doctor` (
  `must` int(11) NOT NULL COMMENT 'sıralaması',
  `doctor_id` bigint(11) DEFAULT NULL COMMENT 'doktor id si',
  `doctor_var` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'json doktor verileri',
  `hizmet_puan` float NOT NULL COMMENT 'doktor hizmet puanı',
  `doctor_old_place` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'seki adres id si',
  `doctor_selection` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktor durumu seçim yapıp yapmadığı',
  `donem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donem_var`
--

CREATE TABLE `donem_var` (
  `id` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `dn_name` varchar(60) COLLATE utf8_turkish_ci DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `komisyon_üye`
--

CREATE TABLE `komisyon_üye` (
  `id` int(11) NOT NULL,
  `name` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `dönem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log_save`
--

CREATE TABLE `log_save` (
  `count` int(11) NOT NULL,
  `user_ip` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `tip` text COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
-- Tablo için indeksler `donem_var`
--
ALTER TABLE `donem_var`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `komisyon_üye`
--
ALTER TABLE `komisyon_üye`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `log_save`
--
ALTER TABLE `log_save`
  ADD PRIMARY KEY (`count`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `komisyon_üye`
--
ALTER TABLE `komisyon_üye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=953480;

--
-- Tablo için AUTO_INCREMENT değeri `log_save`
--
ALTER TABLE `log_save`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=525;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
