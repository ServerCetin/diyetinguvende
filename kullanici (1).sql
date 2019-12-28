-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Ara 2019, 12:21:24
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

--
-- Dökümü yapılmış tablolar için indeksler
--

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
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kullanici`
--
ALTER TABLE `kullanici`
  ADD CONSTRAINT `FK_Kullanici` FOREIGN KEY (`CinsiyetId`) REFERENCES `cinsiyet` (`Id`),
  ADD CONSTRAINT `FK_Kullanici2` FOREIGN KEY (`KullaniciTurId`) REFERENCES `kullanicitur` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
