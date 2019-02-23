-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Şub 2019, 22:09:56
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
  `doctor_selection` text COLLATE utf8_turkish_ci NOT NULL COMMENT 'doktor durumu seçim yapıp yapmadığı'
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
-- Tablo döküm verisi `log_save`
--

INSERT INTO `log_save` (`count`, `user_ip`, `tip`, `date`) VALUES
(39, '0', '97375931 id li adres eklendi', '2019-02-22 20:04:38'),
(40, '0', '1 id li doktor istendi', '2019-02-22 20:04:38'),
(41, '0', '83401888 id li adres eklendi', '2019-02-22 20:04:38'),
(42, '0', '2 id li doktor istendi', '2019-02-22 20:04:38'),
(43, '0', '3 id li doktor istendi', '2019-02-22 20:04:38'),
(44, '0', '4 id li doktor istendi', '2019-02-22 20:04:38'),
(45, '0', '44284062 id li adres eklendi', '2019-02-22 20:04:38'),
(46, '0', '5 id li doktor istendi', '2019-02-22 20:04:38'),
(47, '0', '85412543 id li adres eklendi', '2019-02-22 20:04:50'),
(48, '0', '52817816 id li adres eklendi', '2019-02-22 20:04:50'),
(49, '0', '58799684 id li adres eklendi', '2019-02-22 20:04:50'),
(50, '0', '90287767 id li adres eklendi', '2019-02-22 20:04:50'),
(51, '0', '19360465 id li adres eklendi', '2019-02-22 20:04:50'),
(52, '0', '24068127 id li adres eklendi', '2019-02-22 20:04:50'),
(53, '0', '3 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:05:50'),
(54, '0', '3 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:05:50'),
(55, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:05:50'),
(56, '0', '3 id li doktorun adresi 19360465 olarak değişti ', '2019-02-22 20:05:50'),
(57, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:32:45'),
(58, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:33:58'),
(59, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:36:40'),
(60, '0', '3 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:36:40'),
(61, '0', '3 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:36:40'),
(62, '0', '24068127 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:36:40'),
(63, '0', '3 id li doktorun adresi 24068127 olarak değişti ', '2019-02-22 20:36:40'),
(64, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:36:43'),
(65, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:38:51'),
(66, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:39:52'),
(67, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:41:22'),
(68, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:42:48'),
(69, '0', '24068127 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:45:18'),
(70, '0', '3 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:45:19'),
(71, '0', '3 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:45:19'),
(72, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:45:19'),
(73, '0', '3 id li doktorun adresi 19360465 olarak değişti ', '2019-02-22 20:45:19'),
(74, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:45:23'),
(75, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:46:51'),
(76, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:47:23'),
(77, '0', '3 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:47:23'),
(78, '0', '3 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:47:23'),
(79, '0', '52817816 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:47:23'),
(80, '0', '3 id li doktorun adresi 52817816 olarak değişti ', '2019-02-22 20:47:23'),
(81, '0', '52817816 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:48:07'),
(82, '0', '3 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:48:07'),
(83, '0', '3 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:48:07'),
(84, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:48:07'),
(85, '0', '3 id li doktorun adresi 19360465 olarak değişti ', '2019-02-22 20:48:08'),
(86, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:48:20'),
(87, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:48:49'),
(88, '0', '3 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:48:49'),
(89, '0', '3 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:48:49'),
(90, '0', '24068127 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:48:49'),
(91, '0', '3 id li doktorun adresi 24068127 olarak değişti ', '2019-02-22 20:48:49'),
(92, '0', '3 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:48:52'),
(93, '0', '4 id li doktorun doctor_old_place sütunu güncellendi', '2019-02-22 20:50:55'),
(94, '0', '4 id li doktorun doctor_selection sütunu güncellendi', '2019-02-22 20:50:55'),
(95, '0', '19360465 id li adresin  adres_select sütunu güncellendi', '2019-02-22 20:50:55'),
(96, '0', '4 id li doktorun adresi 19360465 olarak değişti ', '2019-02-22 20:50:55'),
(97, '0', '4 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:51:00'),
(98, '0', '1 id li doktorun doctor_var sütunu güncellendi', '2019-02-22 20:51:23');

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
  ADD PRIMARY KEY (`count`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `log_save`
--
ALTER TABLE `log_save`
  MODIFY `count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
