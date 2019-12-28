-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ara 2019, 12:31:40
-- Sunucu sürümü: 10.4.10-MariaDB
-- PHP Sürümü: 7.1.33

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
  `CinsiyetAd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Sorun` varchar(250) NOT NULL,
  `SorunKategoriId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `destek`
--

INSERT INTO `destek` (`Id`, `GonderenId`, `Sorun`, `SorunKategoriId`) VALUES
(10, 1, 'dads', 1),
(11, 1, '2. ticket', 1),
(12, 1, 'adasd', 1),
(13, 1, 'asdasd', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destekkategori`
--

CREATE TABLE `destekkategori` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(30) NOT NULL,
  `Aciklama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `destekkategori`
--

INSERT INTO `destekkategori` (`Id`, `Ad`, `Aciklama`) VALUES
(1, 'Teknik Sorunlar', 'Sitede gördüğünüz açık veya sorunlarda bu seçeneği seçmelisiniz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diyetyemek`
--

CREATE TABLE `diyetyemek` (
  `Id` int(11) NOT NULL,
  `YiyecekId` int(11) NOT NULL,
  `YiyecekMiktarId` int(11) DEFAULT NULL,
  `HastaId` int(11) NOT NULL,
  `DiyetisyenId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `diyetyemeksaat`
--

CREATE TABLE `diyetyemeksaat` (
  `Id` int(11) NOT NULL,
  `DiyetYemekId` int(11) NOT NULL,
  `ProgramGunSaatId` int(11) NOT NULL,
  `HastaDiyetId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastabilgi`
--

CREATE TABLE `hastabilgi` (
  `Id` int(11) NOT NULL,
  `KullaniciId` int(11) DEFAULT NULL,
  `Boy` int(11) NOT NULL,
  `Kilo` float NOT NULL,
  `YagOrani` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `hastabilgi`
--

INSERT INTO `hastabilgi` (`Id`, `KullaniciId`, `Boy`, `Kilo`, `YagOrani`) VALUES
(1, 36, 10, 10, 10),
(2, 38, 0, 0, 0),
(3, 40, 0, 0, 0),
(4, 44, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastadiyet`
--

CREATE TABLE `hastadiyet` (
  `Id` int(11) NOT NULL,
  `HastaId` int(11) NOT NULL,
  `DiyetisyenId` int(11) NOT NULL,
  `DiyetisyenNot` varchar(500) DEFAULT NULL,
  `DiyetBaslangic` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hastaspor`
--

CREATE TABLE `hastaspor` (
  `Id` int(11) NOT NULL,
  `HastaId` int(11) NOT NULL,
  `HocaId` int(11) NOT NULL,
  `HocaNot` varchar(500) DEFAULT NULL,
  `ProgramBaslangic` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `Id` int(11) NOT NULL,
  `CinsiyetId` int(11) NOT NULL,
  `Ad` varchar(30) NOT NULL,
  `Soyad` varchar(30) NOT NULL,
  `DogumTarih` date NOT NULL,
  `KullaniciAdi` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `TelefonNo` varchar(15) NOT NULL,
  `Sifre` varchar(150) NOT NULL,
  `KullaniciTurId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`Id`, `CinsiyetId`, `Ad`, `Soyad`, `DogumTarih`, `KullaniciAdi`, `Email`, `TelefonNo`, `Sifre`, `KullaniciTurId`) VALUES
(1, 1, 'Server123', 'ÇETİN', '2019-12-04', 'server', 'server1', '1231saadads', '123', 1),
(3, 1, 'Gözde', 'Çetinkaya', '2019-12-05', 'gozde', 'asdfsadsa', '12321asdad', '123', 3),
(5, 2, 'Yunus', 'Erdemir', '2019-12-12', 'ys', 'feno_yunus@hotmail.com', '123sesa', '123', 3),
(6, 2, 'Semih', 'Hatıl', '2019-12-19', 'semihh', 'semih@gmail.com', '1231das', '12345', 2),
(7, 1, 'Gözde', 'Çetinkaya', '2019-12-26', 'sfgdsfg', 'feno_yuneeus@hotmail.com', '12312121232', '123', 3),
(8, 2, 'ka', 'aj', '2019-12-19', 'sa1', 'feno_yunadus@hotmail.com', '1232222', '123', 3),
(9, 2, 'Gözde', 'Çetinkaya', '2019-12-11', 'sdfsdf2', 'feno_yunu2s@hotmail.com', '11', '123', 3),
(10, 1, 'Gözde', 'Çetinkaya', '2019-01-17', 'ass', 'feno_yuneeus@hotmail.com', '6565656', '123', 3),
(28, 2, 'dsdsad', 'sadsad', '2019-12-19', 'sadasdsa', 'asdasda', '2132131', 'sadadsa', 3),
(32, 1, 'Gözde', 'Çetinkaya', '2019-12-05', 'sfgdsf545g', 'feno333_yunus@hotmail.com', '123154654621212', '54545', 2),
(36, 2, 'dada', 'adsda', '2019-12-10', 'adda', 'adada', '1111', 'asdda', 3),
(38, 1, 'Gözde', 'csd', '2019-12-02', 'wewe', 'gozdecetinkaeeeya2@gmail.com', '4436547567', '2323', 3),
(40, 2, 'asd', 'adsasd', '2019-12-12', '123', 'ddadas', '12211', '123', 3),
(41, 1, 'Gözde', 'Çetinkaya', '2019-12-11', 'gozde12', 'gozdecetinkaya2@gmail.com', '35464565676', '12345', 1),
(43, 1, 'Gözde', 'Çetinkaya', '2019-12-12', 'g123', 'gozdecetinkay2@gmail.com', '32435345', 'gozs', 1),
(44, 2, 'Semih', 'Hatıl', '2019-11-06', 'semihhatil', 'semih@gmail.com', '68768686868', '123456', 3),
(45, 1, 'Semih', 'Hatıl', '2019-12-04', 'semih34', 'semihhhh@gmal.com', '534645645', '1233333', 2),
(46, 1, 'Gözde', 'ff', '2019-12-10', 'gozde456', 'rgfd@', '656565656', '567', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicimesaj`
--

CREATE TABLE `kullanicimesaj` (
  `Id` int(11) NOT NULL,
  `GonderenId` int(11) NOT NULL,
  `AlanId` int(11) NOT NULL,
  `Mesaj` varchar(400) NOT NULL,
  `GonderilmeTarihi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicitur`
--

CREATE TABLE `kullanicitur` (
  `Id` int(11) NOT NULL,
  `TurAd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicitur`
--

INSERT INTO `kullanicitur` (`Id`, `TurAd`) VALUES
(1, 'Diyetisyen'),
(2, 'Spor Hocası'),
(3, 'Kullanıcı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programgun`
--

CREATE TABLE `programgun` (
  `Id` int(11) NOT NULL,
  `Gun` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Tablo için tablo yapısı `programgunsaat`
--

CREATE TABLE `programgunsaat` (
  `Id` int(11) NOT NULL,
  `ProgramSaatId` int(11) NOT NULL,
  `ProgramGunId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programsaat`
--

CREATE TABLE `programsaat` (
  `Id` int(11) NOT NULL,
  `Saat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sporhareket`
--

CREATE TABLE `sporhareket` (
  `Id` int(11) NOT NULL,
  `HastaId` int(11) NOT NULL,
  `SporTuruId` int(11) NOT NULL,
  `DiyetisyenId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sporhareketsaat`
--

CREATE TABLE `sporhareketsaat` (
  `Id` int(11) NOT NULL,
  `SporHareketId` int(11) NOT NULL,
  `ProgramGunSaatId` int(11) NOT NULL,
  `HastaSporId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sporturu`
--

CREATE TABLE `sporturu` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(20) NOT NULL,
  `Aciklama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sporturu`
--

INSERT INTO `sporturu` (`Id`, `Ad`, `Aciklama`) VALUES
(1, 'Şınav', 'Şınav ellerin omuz hizasında tutulduğu yerde aşağı yukarı kalkma hareketidir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yiyecek`
--

CREATE TABLE `yiyecek` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `TurId` int(11) NOT NULL,
  `Kalori` int(11) NOT NULL,
  `Protein` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yiyecekmiktar`
--

CREATE TABLE `yiyecekmiktar` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yiyecekmiktar`
--

INSERT INTO `yiyecekmiktar` (`Id`, `Ad`) VALUES
(1, 'Gram'),
(2, 'Kilo'),
(3, 'Tabak'),
(4, 'Kaşık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yiyecekturu`
--

CREATE TABLE `yiyecekturu` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Tablo için indeksler `diyetyemek`
--
ALTER TABLE `diyetyemek`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_DiyetYemek` (`YiyecekId`),
  ADD KEY `FK_DiyetYemek2` (`YiyecekMiktarId`),
  ADD KEY `FK_DiyetYemek3` (`HastaId`),
  ADD KEY `FK_DiyetYemek4` (`DiyetisyenId`);

--
-- Tablo için indeksler `diyetyemeksaat`
--
ALTER TABLE `diyetyemeksaat`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_DiyetYemekSaat` (`DiyetYemekId`),
  ADD KEY `FK_DiyetYemekSaat2` (`ProgramGunSaatId`),
  ADD KEY `FK_DiyetYemekSaat3` (`HastaDiyetId`);

--
-- Tablo için indeksler `hastabilgi`
--
ALTER TABLE `hastabilgi`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `hastadiyet`
--
ALTER TABLE `hastadiyet`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_HastaDiyet` (`HastaId`),
  ADD KEY `FK_HastaDiyet2` (`DiyetisyenId`);

--
-- Tablo için indeksler `hastaspor`
--
ALTER TABLE `hastaspor`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_HastaSpor` (`HastaId`),
  ADD KEY `FK_HastaSpor2` (`HocaId`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `U_Kullanici` (`TelefonNo`),
  ADD UNIQUE KEY `U_Kullanici2` (`KullaniciAdi`),
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
-- Tablo için indeksler `programgunsaat`
--
ALTER TABLE `programgunsaat`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_ProgramGunSaat` (`ProgramSaatId`),
  ADD KEY `FK_ProgramGunSaat2` (`ProgramGunId`);

--
-- Tablo için indeksler `programsaat`
--
ALTER TABLE `programsaat`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `sporhareket`
--
ALTER TABLE `sporhareket`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SporHareket` (`SporTuruId`),
  ADD KEY `FK_SporHareket2` (`HastaId`),
  ADD KEY `FK_SporHareket3` (`DiyetisyenId`);

--
-- Tablo için indeksler `sporhareketsaat`
--
ALTER TABLE `sporhareketsaat`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SporHareketSaat` (`SporHareketId`),
  ADD KEY `FK_SporHareketSaat2` (`ProgramGunSaatId`),
  ADD KEY `FK_SporHareketSaat3` (`HastaSporId`);

--
-- Tablo için indeksler `sporturu`
--
ALTER TABLE `sporturu`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `yiyecek`
--
ALTER TABLE `yiyecek`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Yiyecek` (`TurId`);

--
-- Tablo için indeksler `yiyecekmiktar`
--
ALTER TABLE `yiyecekmiktar`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `yiyecekturu`
--
ALTER TABLE `yiyecekturu`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cinsiyet`
--
ALTER TABLE `cinsiyet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `destek`
--
ALTER TABLE `destek`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `destekkategori`
--
ALTER TABLE `destekkategori`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `diyetyemek`
--
ALTER TABLE `diyetyemek`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `diyetyemeksaat`
--
ALTER TABLE `diyetyemeksaat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `hastabilgi`
--
ALTER TABLE `hastabilgi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `hastadiyet`
--
ALTER TABLE `hastadiyet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `hastaspor`
--
ALTER TABLE `hastaspor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicimesaj`
--
ALTER TABLE `kullanicimesaj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicitur`
--
ALTER TABLE `kullanicitur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `programgun`
--
ALTER TABLE `programgun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `programgunsaat`
--
ALTER TABLE `programgunsaat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `programsaat`
--
ALTER TABLE `programsaat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sporhareket`
--
ALTER TABLE `sporhareket`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sporhareketsaat`
--
ALTER TABLE `sporhareketsaat`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sporturu`
--
ALTER TABLE `sporturu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yiyecek`
--
ALTER TABLE `yiyecek`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `yiyecekmiktar`
--
ALTER TABLE `yiyecekmiktar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `yiyecekturu`
--
ALTER TABLE `yiyecekturu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `destek`
--
ALTER TABLE `destek`
  ADD CONSTRAINT `FK_Destek` FOREIGN KEY (`GonderenId`) REFERENCES `cinsiyet` (`Id`),
  ADD CONSTRAINT `FK_Destek2` FOREIGN KEY (`SorunKategoriId`) REFERENCES `destekkategori` (`Id`);

--
-- Tablo kısıtlamaları `diyetyemek`
--
ALTER TABLE `diyetyemek`
  ADD CONSTRAINT `FK_DiyetYemek` FOREIGN KEY (`YiyecekId`) REFERENCES `yiyecek` (`Id`),
  ADD CONSTRAINT `FK_DiyetYemek2` FOREIGN KEY (`YiyecekMiktarId`) REFERENCES `yiyecekmiktar` (`Id`),
  ADD CONSTRAINT `FK_DiyetYemek3` FOREIGN KEY (`HastaId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_DiyetYemek4` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`);

--
-- Tablo kısıtlamaları `diyetyemeksaat`
--
ALTER TABLE `diyetyemeksaat`
  ADD CONSTRAINT `FK_DiyetYemekSaat` FOREIGN KEY (`DiyetYemekId`) REFERENCES `diyetyemek` (`Id`),
  ADD CONSTRAINT `FK_DiyetYemekSaat2` FOREIGN KEY (`ProgramGunSaatId`) REFERENCES `programgunsaat` (`Id`),
  ADD CONSTRAINT `FK_DiyetYemekSaat3` FOREIGN KEY (`HastaDiyetId`) REFERENCES `hastadiyet` (`Id`);

--
-- Tablo kısıtlamaları `hastadiyet`
--
ALTER TABLE `hastadiyet`
  ADD CONSTRAINT `FK_HastaDiyet` FOREIGN KEY (`HastaId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaDiyet2` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`);

--
-- Tablo kısıtlamaları `hastaspor`
--
ALTER TABLE `hastaspor`
  ADD CONSTRAINT `FK_HastaSpor` FOREIGN KEY (`HastaId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_HastaSpor2` FOREIGN KEY (`HocaId`) REFERENCES `kullanici` (`Id`);

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
-- Tablo kısıtlamaları `programgunsaat`
--
ALTER TABLE `programgunsaat`
  ADD CONSTRAINT `FK_ProgramGunSaat` FOREIGN KEY (`ProgramSaatId`) REFERENCES `programsaat` (`Id`),
  ADD CONSTRAINT `FK_ProgramGunSaat2` FOREIGN KEY (`ProgramGunId`) REFERENCES `programgun` (`Id`);

--
-- Tablo kısıtlamaları `sporhareket`
--
ALTER TABLE `sporhareket`
  ADD CONSTRAINT `FK_SporHareket` FOREIGN KEY (`SporTuruId`) REFERENCES `sporturu` (`Id`),
  ADD CONSTRAINT `FK_SporHareket2` FOREIGN KEY (`HastaId`) REFERENCES `kullanici` (`Id`),
  ADD CONSTRAINT `FK_SporHareket3` FOREIGN KEY (`DiyetisyenId`) REFERENCES `kullanici` (`Id`);

--
-- Tablo kısıtlamaları `sporhareketsaat`
--
ALTER TABLE `sporhareketsaat`
  ADD CONSTRAINT `FK_SporHareketSaat` FOREIGN KEY (`SporHareketId`) REFERENCES `sporhareket` (`Id`),
  ADD CONSTRAINT `FK_SporHareketSaat2` FOREIGN KEY (`ProgramGunSaatId`) REFERENCES `programgunsaat` (`Id`),
  ADD CONSTRAINT `FK_SporHareketSaat3` FOREIGN KEY (`HastaSporId`) REFERENCES `hastaspor` (`Id`);

--
-- Tablo kısıtlamaları `yiyecek`
--
ALTER TABLE `yiyecek`
  ADD CONSTRAINT `FK_Yiyecek` FOREIGN KEY (`TurId`) REFERENCES `yiyecekturu` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
