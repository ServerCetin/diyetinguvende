-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 01:56 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diyetinguvende`
--

-- --------------------------------------------------------

--
-- Table structure for table `cinsiyet`
--

CREATE TABLE `cinsiyet` (
  `Id` int(11) NOT NULL,
  `CinsiyetAd` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `cinsiyet`
--

INSERT INTO `cinsiyet` (`Id`, `CinsiyetAd`) VALUES
(1, 'Kadın'),
(2, 'Erkek');

-- --------------------------------------------------------

--
-- Table structure for table `destek`
--

CREATE TABLE `destek` (
  `Id` int(11) NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `Sorun` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `SorunKategoriId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `destek`
--

INSERT INTO `destek` (`Id`, `GonderenId`, `Sorun`, `SorunKategoriId`) VALUES
(16, 3, 'Wakannai yo', 3),
(22, 5, 'wakatta', 3),
(23, 5, 'wakatta', 2),
(24, 5, 'Cool desu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `destekkategori`
--

CREATE TABLE `destekkategori` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `destekkategori`
--

INSERT INTO `destekkategori` (`Id`, `Ad`) VALUES
(1, 'Teknik Sorunlar'),
(2, 'Bağlantı Sorunları'),
(3, 'Güvenlik Sorunları');

-- --------------------------------------------------------

--
-- Table structure for table `diyettablosatir`
--

CREATE TABLE `diyettablosatir` (
  `Id` int(11) NOT NULL,
  `ProgramGunId` int(11) NOT NULL,
  `DiyetTabloId` int(11) NOT NULL,
  `Aciklama` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `GunSira` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `diyettablosatir`
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
(252, 7, 11, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `diyettablosu`
--

CREATE TABLE `diyettablosu` (
  `Id` int(11) NOT NULL,
  `TabloAdi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TabloAciklamasi` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `DiyetisyenId` int(11) NOT NULL,
  `TabloTarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `diyettablosu`
--

INSERT INTO `diyettablosu` (`Id`, `TabloAdi`, `TabloAciklamasi`, `DiyetisyenId`, `TabloTarih`) VALUES
(10, 'Ölüm', 'üç nokta', 3, '2020-01-09'),
(11, 'Öldürmeyen', 'gğncellencek bir tablo örneği', 3, '2020-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `hastabilgi`
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
-- Dumping data for table `hastabilgi`
--

INSERT INTO `hastabilgi` (`Id`, `KullaniciId`, `Boy`, `Kilo`, `YagOrani`, `DiyetisyenId`, `DiyetTabloId`, `SporTabloId`, `KocId`) VALUES
(7, 36, 0, 0, 0, 3, 11, 1, 5),
(8, 37, 0, 12, 0, 3, 10, NULL, NULL),
(9, 38, 0, 0, 0, NULL, NULL, NULL, NULL),
(10, 39, 0, 0, 0, NULL, NULL, NULL, NULL),
(11, 40, 0, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kullanici`
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
-- Dumping data for table `kullanici`
--

INSERT INTO `kullanici` (`Id`, `CinsiyetId`, `Ad`, `Soyad`, `DogumTarih`, `KullaniciAdi`, `Email`, `TelefonNo`, `Sifre`, `KullaniciTurId`) VALUES
(3, 2, 'Server', 'ÇETİN', '2019-12-17', 'server', 'merhaba@servercetin.com', '05434434343', '123', 1),
(5, 2, 'Semih', 'Hatıl', '2019-12-10', 'semih', 'semihhatil@gmail.com', '05551312315', '123', 2),
(36, 2, 'Arda', 'ÇEKEM', '2019-12-10', 'arda', 'ardacakem@yahoo.com', '05423123414', '123', 3),
(37, 1, 'Gözde', 'ÇETİNKAYA', '2019-12-12', 'gözde', 'gözde@gmail.com', '05315135219', '123', 3),
(38, 2, 'Tolgahan', 'ACAR', '2019-12-11', 'tolgahan', 'info@tolgahanacar.net', '08109413150', '123', 3),
(39, 2, 'Server', 'Çetin', '2020-01-01', 'admin', 'admin@dg.com', '222222', '123', 4),
(40, 2, 'Server', 'Çetin', '2020-01-01', 'admin2', 'admin2@dg.com', '2222223', '1234', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kullanicimesaj`
--

CREATE TABLE `kullanicimesaj` (
  `Id` int(11) NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `AlanId` int(11) NOT NULL,
  `Mesaj` varchar(400) COLLATE utf8mb4_turkish_ci NOT NULL,
  `GonderilmeTarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `kullanicimesaj`
--

INSERT INTO `kullanicimesaj` (`Id`, `GonderenId`, `AlanId`, `Mesaj`, `GonderilmeTarihi`) VALUES
(1, 5, 3, '2x2 = 4', '2020-01-09 02:09:12'),
(2, 3, 5, 'ilk mesaj h.o', '2020-01-09 23:07:14'),
(3, 3, 5, 'ikinci mesaj', '2020-01-09 23:08:30'),
(4, 3, 37, '2', '2020-01-09 23:11:25'),
(5, 3, 37, '2', '2020-01-09 23:11:28'),
(6, 3, 37, 'das', '2020-01-09 23:11:56'),
(7, 3, 37, '3', '2020-01-09 23:12:33'),
(8, 3, 36, '2', '2020-01-09 23:14:25'),
(9, 3, 36, '2', '2020-01-09 23:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `kullanicitur`
--

CREATE TABLE `kullanicitur` (
  `Id` int(11) NOT NULL,
  `TurAd` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `kullanicitur`
--

INSERT INTO `kullanicitur` (`Id`, `TurAd`) VALUES
(1, 'Diyetisyen'),
(2, 'Spor Hocası'),
(3, 'Kullanıcı'),
(4, 'Yönetici');

-- --------------------------------------------------------

--
-- Table structure for table `programgun`
--

CREATE TABLE `programgun` (
  `Id` int(11) NOT NULL,
  `Gun` varchar(9) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `programgun`
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
-- Table structure for table `sportablosatir`
--

CREATE TABLE `sportablosatir` (
  `Id` int(11) NOT NULL,
  `ProgramGunId` int(11) NOT NULL,
  `SporTabloId` int(11) NOT NULL,
  `Aciklama` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sportablosu`
--

CREATE TABLE `sportablosu` (
  `Id` int(11) NOT NULL,
  `TabloAdi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `TabloAciklamasi` varchar(120) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `KocId` int(11) NOT NULL,
  `TabloTarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `sportablosu`
--

INSERT INTO `sportablosu` (`Id`, `TabloAdi`, `TabloAciklamasi`, `KocId`, `TabloTarih`) VALUES
(1, 'Spor table', 'acsada', 5, '2019-12-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cinsiyet`
--
ALTER TABLE `cinsiyet`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `destek`
--
ALTER TABLE `destek`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Destek` (`GonderenId`),
  ADD KEY `FK_Destek2` (`SorunKategoriId`);

--
-- Indexes for table `destekkategori`
--
ALTER TABLE `destekkategori`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `diyettablosatir`
--
ALTER TABLE `diyettablosatir`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_DiyetTabloSatir` (`ProgramGunId`),
  ADD KEY `FK_DiyetTabloSatir2` (`DiyetTabloId`);

--
-- Indexes for table `diyettablosu`
--
ALTER TABLE `diyettablosu`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_DiyetTablosu` (`DiyetisyenId`);

--
-- Indexes for table `hastabilgi`
--
ALTER TABLE `hastabilgi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_HastaBilgi` (`KullaniciId`),
  ADD KEY `FK_HastaBilgi2` (`DiyetisyenId`),
  ADD KEY `FK_HastaBilgi3` (`KocId`),
  ADD KEY `FK_HastaBilgi4` (`DiyetTabloId`),
  ADD KEY `FK_HastaBilgi5` (`SporTabloId`);

--
-- Indexes for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `U_Kullanici` (`TelefonNo`),
  ADD UNIQUE KEY `U_Kullanici2` (`KullaniciAdi`),
  ADD UNIQUE KEY `U_Kullanici3` (`Email`),
  ADD KEY `FK_Kullanici` (`CinsiyetId`),
  ADD KEY `FK_Kullanici2` (`KullaniciTurId`);

--
-- Indexes for table `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `F_UserMessage` (`GonderenId`),
  ADD KEY `F_UserMessage2` (`AlanId`);

--
-- Indexes for table `kullanicitur`
--
ALTER TABLE `kullanicitur`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `programgun`
--
ALTER TABLE `programgun`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sportablosatir`
--
ALTER TABLE `sportablosatir`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SporTabloSatir` (`ProgramGunId`),
  ADD KEY `FK_SporTabloSatir2` (`SporTabloId`);

--
-- Indexes for table `sportablosu`
--
ALTER TABLE `sportablosu`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SporTablosu` (`KocId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cinsiyet`
--
ALTER TABLE `cinsiyet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `destek`
--
ALTER TABLE `destek`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `destekkategori`
--
ALTER TABLE `destekkategori`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diyettablosatir`
--
ALTER TABLE `diyettablosatir`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `diyettablosu`
--
ALTER TABLE `diyettablosu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hastabilgi`
--
ALTER TABLE `hastabilgi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kullanicitur`
--
ALTER TABLE `kullanicitur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programgun`
--
ALTER TABLE `programgun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sportablosatir`
--
ALTER TABLE `sportablosatir`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sportablosu`
--
ALTER TABLE `sportablosu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destek`
--
ALTER TABLE `destek`
  ADD CONSTRAINT `FK_Destek` FOREIGN KEY (`GonderenId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_Destek2` FOREIGN KEY (`SorunKategoriId`) REFERENCES `destekkategori` (`Id`);

--
-- Constraints for table `diyettablosatir`
--
ALTER TABLE `diyettablosatir`
  ADD CONSTRAINT `FK_DiyetTabloSatir` FOREIGN KEY (`ProgramGunId`) REFERENCES `programgun` (`Id`),
  ADD CONSTRAINT `FK_DiyetTabloSatir2` FOREIGN KEY (`DiyetTabloId`) REFERENCES `diyettablosu` (`Id`);

--
-- Constraints for table `diyettablosu`
--
ALTER TABLE `diyettablosu`
  ADD CONSTRAINT `FK_DiyetTablosu` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`);

--
-- Constraints for table `hastabilgi`
--
ALTER TABLE `hastabilgi`
  ADD CONSTRAINT `FK_HastaBilgi` FOREIGN KEY (`KullaniciId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi2` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi3` FOREIGN KEY (`KocId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi4` FOREIGN KEY (`DiyetTabloId`) REFERENCES `diyettablosu` (`Id`),
  ADD CONSTRAINT `FK_HastaBilgi5` FOREIGN KEY (`SporTabloId`) REFERENCES `sportablosu` (`Id`);

--
-- Constraints for table `kullanici`
--
ALTER TABLE `kullanici`
  ADD CONSTRAINT `FK_Kullanici` FOREIGN KEY (`CinsiyetId`) REFERENCES `cinsiyet` (`Id`),
  ADD CONSTRAINT `FK_Kullanici2` FOREIGN KEY (`KullaniciTurId`) REFERENCES `kullanicitur` (`Id`);

--
-- Constraints for table `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  ADD CONSTRAINT `F_UserMessage` FOREIGN KEY (`GonderenId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `F_UserMessage2` FOREIGN KEY (`AlanId`) REFERENCES `kullanici` (`Id`);

--
-- Constraints for table `sportablosatir`
--
ALTER TABLE `sportablosatir`
  ADD CONSTRAINT `FK_SporTabloSatir` FOREIGN KEY (`ProgramGunId`) REFERENCES `programgun` (`Id`),
  ADD CONSTRAINT `FK_SporTabloSatir2` FOREIGN KEY (`SporTabloId`) REFERENCES `sportablosu` (`Id`);

--
-- Constraints for table `sportablosu`
--
ALTER TABLE `sportablosu`
  ADD CONSTRAINT `FK_SporTablosu` FOREIGN KEY (`KocId`) REFERENCES `kullanici` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
