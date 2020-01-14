-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Oca 2020, 17:45:03
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `diyetinguvende`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cinsiyet`
--

CREATE TABLE `cinsiyet` (
  `Id` int(11) NOT NULL,
  `CinsiyetAd` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `cinsiyet`
--

INSERT INTO `cinsiyet` (`Id`, `CinsiyetAd`) VALUES
(1, 'Kadın'),
(2, 'Erkek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

CREATE TABLE `destek` (
  `Id` int(11) NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `Sorun` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SorunKategoriId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `destek`
--

INSERT INTO `destek` (`Id`, `GonderenId`, `Sorun`, `SorunKategoriId`) VALUES
(16, 3, 'Wakannai yo', 3),
(22, 5, 'wakatta', 3),
(23, 5, 'wakatta', 2),
(24, 5, 'Cool desu', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destekkategori`
--

CREATE TABLE `destekkategori` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `destekkategori`
--

INSERT INTO `destekkategori` (`Id`, `Ad`) VALUES
(1, 'Teknik Sorunlar'),
(2, 'Bağlantı Sorunları'),
(3, 'Güvenlik Sorunları');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diyettablosatir`
--

CREATE TABLE `diyettablosatir` (
  `Id` int(11) NOT NULL,
  `ProgramGunId` int(11) NOT NULL,
  `DiyetTabloId` int(11) NOT NULL,
  `Aciklama` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `GunSira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `diyettablosatir`
--

INSERT INTO `diyettablosatir` (`Id`, `ProgramGunId`, `DiyetTabloId`, `Aciklama`, `GunSira`) VALUES
(169, 1, 10, '1', 1),
(170, 2, 10, 'q', 1),
(171, 3, 10, '1', 1),
(172, 4, 10, '12', 1),
(173, 5, 10, 's', 1),
(174, 6, 10, '1', 1),
(175, 7, 10, '33', 1),
(176, 1, 10, '2', 2),
(177, 2, 10, 'w', 2),
(178, 3, 10, '2', 2),
(179, 4, 10, '2', 2),
(180, 5, 10, '23', 2),
(181, 6, 10, '12', 2),
(182, 7, 10, '3', 2),
(183, 1, 10, '3', 3),
(184, 2, 10, 't', 3),
(185, 3, 10, 'yemk yeme', 3),
(186, 4, 10, 'x3', 3),
(187, 5, 10, '1', 3),
(188, 6, 10, '131', 3),
(189, 7, 10, '333', 3),
(190, 1, 10, '4', 4),
(191, 2, 10, 'y', 4),
(192, 3, 10, '4', 4),
(193, 4, 10, '4', 4),
(194, 5, 10, '24', 4),
(195, 6, 10, '31', 4),
(196, 7, 10, '3333', 4),
(197, 1, 10, '5', 5),
(198, 2, 10, 'u', 5),
(199, 3, 10, '5', 5),
(200, 4, 10, '5', 5),
(201, 5, 10, '26', 5),
(202, 6, 10, '41', 5),
(203, 7, 10, '33333', 5),
(204, 1, 10, '6', 6),
(205, 2, 10, 'ı', 6),
(206, 3, 10, '6', 6),
(207, 4, 10, 'sad6', 6),
(208, 5, 10, '27', 6),
(209, 6, 10, '411', 6),
(210, 7, 10, '333333', 6),
(211, 1, 11, 'baklava', 1),
(212, 2, 11, '', 1),
(213, 3, 11, '', 1),
(214, 4, 11, '', 1),
(215, 5, 11, '', 1),
(216, 6, 11, '', 1),
(217, 7, 11, '', 1),
(218, 1, 11, '', 2),
(219, 2, 11, '', 2),
(220, 3, 11, '', 2),
(221, 4, 11, '', 2),
(222, 5, 11, '', 2),
(223, 6, 11, '', 2),
(224, 7, 11, '', 2),
(225, 1, 11, '', 3),
(226, 2, 11, '', 3),
(227, 3, 11, '', 3),
(228, 4, 11, 'tulumba', 3),
(229, 5, 11, '', 3),
(230, 6, 11, '', 3),
(231, 7, 11, '', 3),
(232, 1, 11, '', 4),
(233, 2, 11, '', 4),
(234, 3, 11, '', 4),
(235, 4, 11, '', 4),
(236, 5, 11, '', 4),
(237, 6, 11, '', 4),
(238, 7, 11, '', 4),
(239, 1, 11, '', 5),
(240, 2, 11, '', 5),
(241, 3, 11, '', 5),
(242, 4, 11, '', 5),
(243, 5, 11, '', 5),
(244, 6, 11, '', 5),
(245, 7, 11, '', 5),
(246, 1, 11, '', 6),
(247, 2, 11, '', 6),
(248, 3, 11, '', 6),
(249, 4, 11, '', 6),
(250, 5, 11, '', 6),
(251, 6, 11, '', 6),
(252, 7, 11, '', 6),
(253, 1, 12, 'Kahvaltı', 1),
(254, 2, 12, 'Kahvaltı', 1),
(255, 3, 12, 'kahvaltı', 1),
(256, 4, 12, 'kahvaltı', 1),
(257, 5, 12, 'kahvaltı', 1),
(258, 6, 12, 'kahvaltı', 1),
(259, 7, 12, 'kahvaltı', 1),
(260, 1, 12, 'ara öğün', 2),
(261, 2, 12, 'ara öğün', 2),
(262, 3, 12, 'ara öğün', 2),
(263, 4, 12, 'ara öğün', 2),
(264, 5, 12, 'ara öğün', 2),
(265, 6, 12, 'ara öğün', 2),
(266, 7, 12, 'ara öğün', 2),
(267, 1, 12, 'Öğle Yemeği', 3),
(268, 2, 12, 'Öğle Yemeği', 3),
(269, 3, 12, 'Öğle Yemeği', 3),
(270, 4, 12, 'Öğle Yemeği', 3),
(271, 5, 12, 'Öğle Yemeği', 3),
(272, 6, 12, 'Öğle Yemeği', 3),
(273, 7, 12, 'Öğle Yemeği', 3),
(274, 1, 12, 'ara öğün', 4),
(275, 2, 12, 'ara öğün', 4),
(276, 3, 12, 'ara öğün', 4),
(277, 4, 12, 'ara öğün', 4),
(278, 5, 12, 'ara öğün', 4),
(279, 6, 12, 'ara öğün', 4),
(280, 7, 12, 'ara öğün', 4),
(281, 1, 12, 'Akşam Yemeği', 5),
(282, 2, 12, 'Akşam Yemeği', 5),
(283, 3, 12, 'Akşam Yemeği', 5),
(284, 4, 12, 'Akşam Yemeği', 5),
(285, 5, 12, 'Akşam Yemeği', 5),
(286, 6, 12, 'Akşam Yemeği', 5),
(287, 7, 12, 'Akşam Yemeği', 5),
(288, 1, 12, 'ara öğün', 6),
(289, 2, 12, 'ara öğün', 6),
(290, 3, 12, 'ara öğün', 6),
(291, 4, 12, 'ara öğün', 6),
(292, 5, 12, 'ara öğün', 6),
(293, 6, 12, 'ara öğün', 6),
(294, 7, 12, 'ara öğün', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diyettablosu`
--

CREATE TABLE `diyettablosu` (
  `Id` int(11) NOT NULL,
  `TabloAdi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TabloAciklamasi` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `DiyetisyenId` int(11) NOT NULL,
  `TabloTarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `diyettablosu`
--

INSERT INTO `diyettablosu` (`Id`, `TabloAdi`, `TabloAciklamasi`, `DiyetisyenId`, `TabloTarih`) VALUES
(10, 'Ölüm', 'üç nokta', 3, '2020-01-09'),
(11, 'Öldürmeyen', 'gğncellencek bir tablo örneği', 3, '2020-01-09'),
(12, 'Diyet Tablosu 2', 'Diyetinize uyun lütfen.', 3, '2020-01-14');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastabilgi`
--

CREATE TABLE `hastabilgi` (
  `Id` int(11) NOT NULL,
  `KullaniciId` int(11) NOT NULL,
  `Boy` int(11) NOT NULL,
  `Kilo` float NOT NULL,
  `YagOrani` float NOT NULL,
  `DiyetisyenId` int(11) DEFAULT NULL,
  `DiyetTabloId` int(11) DEFAULT NULL,
  `SporTabloId` int(11) DEFAULT NULL,
  `KocId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hastabilgi`
--

INSERT INTO `hastabilgi` (`Id`, `KullaniciId`, `Boy`, `Kilo`, `YagOrani`, `DiyetisyenId`, `DiyetTabloId`, `SporTabloId`, `KocId`) VALUES
(7, 36, 0, 50, 0, 3, 10, 1, 5),
(8, 37, 2, 55, 17, 3, 12, 5, 5),
(9, 38, 0, 0, 0, NULL, NULL, NULL, NULL),
(10, 39, 0, 0, 0, NULL, NULL, NULL, NULL),
(11, 40, 0, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `Id` int(11) NOT NULL,
  `CinsiyetId` int(11) NOT NULL,
  `Ad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Soyad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `DogumTarih` date NOT NULL,
  `KullaniciAdi` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TelefonNo` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Sifre` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `KullaniciTurId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`Id`, `CinsiyetId`, `Ad`, `Soyad`, `DogumTarih`, `KullaniciAdi`, `Email`, `TelefonNo`, `Sifre`, `KullaniciTurId`) VALUES
(3, 2, 'Server', 'ÇETİN', '2019-12-17', 'server', 'servercetin@hotmail.com', '05434434343', '123', 1),
(5, 2, 'Semih', 'Hatıl', '2019-12-10', 'semih', 'semihhatil@gmail.com', '05551312315', '123', 2),
(36, 2, 'Arda', 'ÇEKEM', '2019-12-10', 'arda', 'ardacakem@yahoo.com', '05423123414', '123', 3),
(37, 1, 'Gözde', 'ÇETİNKAYA', '2019-12-12', 'gözde', 'gözde@gmail.com', '05315135219', '123', 3),
(38, 2, 'Tolgahan', 'ACAR', '2019-12-11', 'tolgahan', 'info@tolgahanacar.net', '08109413150', '123', 3),
(39, 2, 'Server', 'Çetin', '2020-01-01', 'admin', 'admin@dg.com', '222222', '123', 4),
(40, 2, 'Server', 'Çetin', '2020-01-01', 'admin2', 'admin2@dg.com', '2222223', '1234', 3),
(41, 1, 'Selver', 'Çetin', '2019-12-31', 'server44', 'admisn@dg.com', '1', '123', 1),
(42, 2, '1', '2', '2020-01-01', '222server', '2@gail.com', '22222233', '2123', 2),
(43, 2, 'Kamil', 'Çetin', '2020-01-01', 'kamil', 'kamilcetin@gmail.com', '22222232', '123', 1),
(44, 1, 'aa', 'aa', '2020-01-02', 'aa', 'asa@', '435345', 'aa', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicimesaj`
--

CREATE TABLE `kullanicimesaj` (
  `Id` int(11) NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `AlanId` int(11) NOT NULL,
  `Mesaj` varchar(400) COLLATE utf8mb4_turkish_ci NOT NULL,
  `GonderilmeTarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicimesaj`
--

INSERT INTO `kullanicimesaj` (`Id`, `GonderenId`, `AlanId`, `Mesaj`, `GonderilmeTarihi`) VALUES
(57, 36, 3, 'Merhaba Server!', '2020-01-14 01:24:56'),
(58, 3, 36, 'Merhaba Arda!', '2020-01-14 01:25:24'),
(59, 5, 3, 'Selam!', '2020-01-14 02:39:15'),
(60, 5, 37, 'Merhaba Gözde', '2020-01-14 17:39:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicitur`
--

CREATE TABLE `kullanicitur` (
  `Id` int(11) NOT NULL,
  `TurAd` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicitur`
--

INSERT INTO `kullanicitur` (`Id`, `TurAd`) VALUES
(1, 'Diyetisyen'),
(2, 'Spor Hocası'),
(3, 'Kullanıcı'),
(4, 'Yönetici');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programgun`
--

CREATE TABLE `programgun` (
  `Id` int(11) NOT NULL,
  `Gun` varchar(9) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `programgun`
--

INSERT INTO `programgun` (`Id`, `Gun`) VALUES
(1, 'Pazartesi'),
(2, 'Salı'),
(3, 'Çarşamba'),
(4, 'Perşembe'),
(5, 'Cuma'),
(6, 'Cumartesi'),
(7, 'Pazar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sportablosatir`
--

CREATE TABLE `sportablosatir` (
  `Id` int(11) NOT NULL,
  `ProgramGunId` int(11) NOT NULL,
  `SporTabloId` int(11) NOT NULL,
  `Aciklama` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gunsira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sportablosatir`
--

INSERT INTO `sportablosatir` (`Id`, `ProgramGunId`, `SporTabloId`, `Aciklama`, `gunsira`) VALUES
(1, 1, 2, 'x', 0),
(2, 2, 2, '', 0),
(3, 3, 2, '', 0),
(4, 4, 2, '', 0),
(5, 5, 2, '', 0),
(6, 6, 2, 'k', 0),
(7, 7, 2, '', 0),
(8, 1, 2, 'x', 0),
(9, 2, 2, 'v', 0),
(10, 3, 2, '', 0),
(11, 4, 2, 'a', 0),
(12, 5, 2, '', 0),
(13, 6, 2, '', 0),
(14, 7, 2, 'lkj', 0),
(15, 1, 3, 'sda', 0),
(16, 2, 3, '', 0),
(17, 3, 3, '', 0),
(18, 4, 3, '', 0),
(19, 5, 3, '', 0),
(20, 6, 3, 'dada', 0),
(21, 7, 3, '', 0),
(22, 1, 3, '', 0),
(23, 2, 3, 'da', 0),
(24, 3, 3, '', 0),
(25, 4, 3, '', 0),
(26, 5, 3, 'a', 0),
(27, 6, 3, '', 0),
(28, 7, 3, 'adad', 0),
(29, 1, 3, 'ad', 0),
(30, 2, 3, 's', 0),
(31, 3, 3, 'g', 0),
(32, 4, 3, 'dad', 0),
(33, 5, 3, '', 0),
(34, 6, 3, '', 0),
(35, 7, 3, '', 0),
(36, 1, 3, 'sad', 0),
(37, 2, 3, '', 0),
(38, 3, 3, '', 0),
(39, 4, 3, '', 0),
(40, 5, 3, '2', 0),
(41, 6, 3, 'd2', 0),
(42, 7, 3, 'f', 0),
(43, 1, 3, 'dsa', 0),
(44, 2, 3, '', 0),
(45, 3, 3, '', 0),
(46, 4, 3, 'sda', 0),
(47, 5, 3, '1', 0),
(48, 6, 3, '', 0),
(49, 7, 3, '', 0),
(50, 1, 3, 'x', 0),
(51, 2, 3, '<', 0),
(52, 3, 3, 'a', 0),
(53, 4, 3, 'v', 0),
(54, 5, 3, 'v', 0),
(55, 6, 3, '', 0),
(56, 7, 3, 'f', 0),
(57, 1, 4, '21', 1),
(58, 2, 4, '3', 1),
(59, 3, 4, '4', 1),
(60, 4, 4, '2', 1),
(61, 5, 4, '1', 1),
(62, 6, 4, 'ds', 1),
(63, 7, 4, '5', 1),
(64, 1, 4, '', 2),
(65, 2, 4, 'dsa', 2),
(66, 3, 4, '', 2),
(67, 4, 4, '2', 2),
(68, 5, 4, '5f', 2),
(69, 6, 4, '', 2),
(70, 7, 4, '', 2),
(71, 1, 4, '', 3),
(72, 2, 4, '', 3),
(73, 3, 4, 'gac', 3),
(74, 4, 4, 'cc', 3),
(75, 5, 4, 'dddd', 3),
(76, 6, 4, '', 3),
(77, 7, 4, '5', 3),
(78, 1, 4, 'c', 4),
(79, 2, 4, 'da', 4),
(80, 3, 4, 'sa', 4),
(81, 4, 4, '', 4),
(82, 5, 4, '2a', 4),
(83, 6, 4, 'v', 4),
(84, 7, 4, '3333', 4),
(85, 1, 4, 'zx', 5),
(86, 2, 4, 'dsa', 5),
(87, 3, 4, 'sac', 5),
(88, 4, 4, 'xzc', 5),
(89, 5, 4, '1', 5),
(90, 6, 4, '', 5),
(91, 7, 4, '5', 5),
(92, 1, 4, 'zczx', 6),
(93, 2, 4, '<c', 6),
(94, 3, 4, 'a', 6),
(95, 4, 4, '', 6),
(96, 5, 4, 'sc', 6),
(97, 6, 4, 'ca', 6),
(98, 7, 4, '', 6),
(99, 1, 5, '50 Barfix', 1),
(100, 2, 5, '50 Barfix', 1),
(101, 3, 5, '20 Barfix', 1),
(102, 4, 5, '10 Barfix', 1),
(103, 5, 5, '50 Barfix', 1),
(104, 6, 5, '20 Barfix', 1),
(105, 7, 5, '40 Barfix', 1),
(106, 1, 5, '15 Mekik', 2),
(107, 2, 5, '15 Mekik', 2),
(108, 3, 5, '30 Mekik', 2),
(109, 4, 5, '55 Mekik', 2),
(110, 5, 5, '15 Mekik', 2),
(111, 6, 5, '25 Mekik', 2),
(112, 7, 5, '15 Mekik', 2),
(113, 1, 5, '', 3),
(114, 2, 5, '', 3),
(115, 3, 5, '', 3),
(116, 4, 5, '', 3),
(117, 5, 5, '', 3),
(118, 6, 5, '', 3),
(119, 7, 5, '', 3),
(120, 1, 5, '', 4),
(121, 2, 5, '', 4),
(122, 3, 5, '', 4),
(123, 4, 5, '', 4),
(124, 5, 5, '', 4),
(125, 6, 5, '', 4),
(126, 7, 5, '', 4),
(127, 1, 5, '', 5),
(128, 2, 5, '', 5),
(129, 3, 5, '', 5),
(130, 4, 5, '', 5),
(131, 5, 5, '', 5),
(132, 6, 5, '', 5),
(133, 7, 5, '', 5),
(134, 1, 5, '', 6),
(135, 2, 5, '', 6),
(136, 3, 5, '', 6),
(137, 4, 5, '', 6),
(138, 5, 5, '', 6),
(139, 6, 5, '', 6),
(140, 7, 5, '', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sportablosu`
--

CREATE TABLE `sportablosu` (
  `Id` int(11) NOT NULL,
  `TabloAdi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TabloAciklamasi` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `KocId` int(11) NOT NULL,
  `TabloTarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sportablosu`
--

INSERT INTO `sportablosu` (`Id`, `TabloAdi`, `TabloAciklamasi`, `KocId`, `TabloTarih`) VALUES
(1, 'Spor table', 'acsada', 5, '2019-12-03'),
(2, 'Fit planım', 'mükemmel bir plan', 5, '2020-01-14'),
(3, 'Düzgün plan', 'sdasdasdda', 5, '2020-01-14'),
(4, 'Ölüm v2', 'php öldürür', 5, '2020-01-14'),
(5, 'Egzersiz Tablosu', 'Egzersizlerinizi düzgün yapınız', 5, '2020-01-14');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cinsiyet`
--
ALTER TABLE `cinsiyet`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `destek`
--
ALTER TABLE `destek`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Destek` (`GonderenId`),
  ADD KEY `FK_Destek2` (`SorunKategoriId`);

--
-- Tablo için indeksler `destekkategori`
--
ALTER TABLE `destekkategori`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `diyettablosatir`
--
ALTER TABLE `diyettablosatir`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_DiyetTabloSatir` (`ProgramGunId`),
  ADD KEY `FK_DiyetTabloSatir2` (`DiyetTabloId`);

--
-- Tablo için indeksler `diyettablosu`
--
ALTER TABLE `diyettablosu`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_DiyetTablosu` (`DiyetisyenId`);

--
-- Tablo için indeksler `hastabilgi`
--
ALTER TABLE `hastabilgi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_HastaBilgi` (`KullaniciId`),
  ADD KEY `FK_HastaBilgi2` (`DiyetisyenId`),
  ADD KEY `FK_HastaBilgi3` (`KocId`),
  ADD KEY `FK_HastaBilgi4` (`DiyetTabloId`),
  ADD KEY `FK_HastaBilgi5` (`SporTabloId`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `U_Kullanici` (`TelefonNo`),
  ADD UNIQUE KEY `U_Kullanici2` (`KullaniciAdi`),
  ADD UNIQUE KEY `U_Kullanici3` (`Email`),
  ADD KEY `FK_Kullanici` (`CinsiyetId`),
  ADD KEY `FK_Kullanici2` (`KullaniciTurId`);

--
-- Tablo için indeksler `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `F_UserMessage` (`GonderenId`),
  ADD KEY `F_UserMessage2` (`AlanId`);

--
-- Tablo için indeksler `kullanicitur`
--
ALTER TABLE `kullanicitur`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `programgun`
--
ALTER TABLE `programgun`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `sportablosatir`
--
ALTER TABLE `sportablosatir`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SporTabloSatir` (`ProgramGunId`),
  ADD KEY `FK_SporTabloSatir2` (`SporTabloId`);

--
-- Tablo için indeksler `sportablosu`
--
ALTER TABLE `sportablosu`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SporTablosu` (`KocId`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cinsiyet`
--
ALTER TABLE `cinsiyet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `destek`
--
ALTER TABLE `destek`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `destekkategori`
--
ALTER TABLE `destekkategori`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `diyettablosatir`
--
ALTER TABLE `diyettablosatir`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- Tablo için AUTO_INCREMENT değeri `diyettablosu`
--
ALTER TABLE `diyettablosu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `hastabilgi`
--
ALTER TABLE `hastabilgi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicitur`
--
ALTER TABLE `kullanicitur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `programgun`
--
ALTER TABLE `programgun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sportablosatir`
--
ALTER TABLE `sportablosatir`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Tablo için AUTO_INCREMENT değeri `sportablosu`
--
ALTER TABLE `sportablosu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `destek`
--
ALTER TABLE `destek`
  ADD CONSTRAINT `FK_Destek` FOREIGN KEY (`GonderenId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_Destek2` FOREIGN KEY (`SorunKategoriId`) REFERENCES `destekkategori` (`Id`);

--
-- Tablo kısıtlamaları `diyettablosatir`
--
ALTER TABLE `diyettablosatir`
  ADD CONSTRAINT `FK_DiyetTabloSatir` FOREIGN KEY (`ProgramGunId`) REFERENCES `programgun` (`Id`),
  ADD CONSTRAINT `FK_DiyetTabloSatir2` FOREIGN KEY (`DiyetTabloId`) REFERENCES `diyettablosu` (`Id`);

--
-- Tablo kısıtlamaları `diyettablosu`
--
ALTER TABLE `diyettablosu`
  ADD CONSTRAINT `FK_DiyetTablosu` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`);

--
-- Tablo kısıtlamaları `hastabilgi`
--
ALTER TABLE `hastabilgi`
  ADD CONSTRAINT `FK_HastaBilgi` FOREIGN KEY (`KullaniciId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi2` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi3` FOREIGN KEY (`KocId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi4` FOREIGN KEY (`DiyetTabloId`) REFERENCES `diyettablosu` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi5` FOREIGN KEY (`SporTabloId`) REFERENCES `sportablosu` (`Id`);

--
-- Tablo kısıtlamaları `kullanici`
--
ALTER TABLE `kullanici`
  ADD CONSTRAINT `FK_Kullanici` FOREIGN KEY (`CinsiyetId`) REFERENCES `cinsiyet` (`Id`),
  ADD CONSTRAINT `FK_Kullanici2` FOREIGN KEY (`KullaniciTurId`) REFERENCES `kullanicitur` (`Id`);

--
-- Tablo kısıtlamaları `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  ADD CONSTRAINT `F_UserMessage` FOREIGN KEY (`GonderenId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `F_UserMessage2` FOREIGN KEY (`AlanId`) REFERENCES `kullanici` (`Id`);

--
-- Tablo kısıtlamaları `sportablosatir`
--
ALTER TABLE `sportablosatir`
  ADD CONSTRAINT `FK_SporTabloSatir` FOREIGN KEY (`ProgramGunId`) REFERENCES `programgun` (`Id`),
  ADD CONSTRAINT `FK_SporTabloSatir2` FOREIGN KEY (`SporTabloId`) REFERENCES `sportablosu` (`Id`);

--
-- Tablo kısıtlamaları `sportablosu`
--
ALTER TABLE `sportablosu`
  ADD CONSTRAINT `FK_SporTablosu` FOREIGN KEY (`KocId`) REFERENCES `kullanici` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
