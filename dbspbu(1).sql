-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Sep 2016 pada 10.34
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbspbu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adminis`
--

CREATE TABLE IF NOT EXISTS `adminis` (
`id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `adminis`
--

INSERT INTO `adminis` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
`idlokasi` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `oil` varchar(250) DEFAULT NULL,
  `fasilitas` varchar(250) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`idlokasi`, `nama`, `oil`, `fasilitas`, `alamat`, `lat`, `lng`, `gambar`) VALUES
(38, 'SPBU Cangkeh   ', 'Pertamax92, Solar, Premium, Bio Solar, Pertalite', 'CFC, ATM, Mushola, Toilet, Minimarket', 'Tj. Saba Pitameh Nan XX, Lubuk Begalung, Kota Padang, Sumatera Barat ', '-0.955202', '100.407478', 'IMG_20160720_180434_HDR.jpg'),
(37, 'SPBU Bandar Buat    ', 'Premium, Solar', ' Mushola, Toilet, ATM', 'Jl. Raya Indarung, Bandar Buat, Lubuk Kilangan, Padang, Sumatera Barat   ', '-0.949148', '100.434213', 'IMG_20160720_181506_HDR.jpg'),
(36, 'SPBU Pisang      ', 'Premium, Solar, Pertamax, Solar Non Subsidi', 'Mushola, Oli, Toilet', 'Jl. By Pass Pisang, Kec.PAUH, Kota Padang   ', '-0.9435436', '100.4003533', 'IMG_20160720_174909_HDR.jpg'),
(39, 'SPBU Indarung ', 'Premium, Solar, Pertamax, Pertalite', 'Mushola, Toilet, ATM', 'Indarung, Lubuk Kilangan, Kota Padang, Sumatera Barat', '-0.956453', '100.465074', 'IMG20160720183118.jpg'),
(40, 'SPBU Pasa Ambacang ', 'Pertamax, Premium, Biosolar, Pertalite', 'Mushola, ATM, Toilet, Elpiji', 'Ps. Ambacang, Kuranji, Kota Padang, Sumatera Barat', '-0.930692', '100.398301', 'IMG20160724171629.jpg'),
(41, 'SPBU Balai Baru ', 'Pertamax, Premium, BioSolar, Pertalite', 'Mushola, Toilet, CFC, ATM', 'Jl. Raya Balai Baru, Kalumbuk, Kuranji, Kota Padang, Sumatera Barat', '-0.912981', '100.397121', 'IMG20160724172518.jpg'),
(42, 'SPBU Aie Pacah ', 'Solar, Premium', 'Mushola, Toilet', 'Jl. Raya By Pass Simpang Pilakut, Aie Pacah, Koto Tangah, Kota Padang, Sumatera Barat', '-0.871859', '100.382582', 'IMG20160724173644.jpg'),
(43, 'SPBU Koto Pulai ', 'Premium, Solar, Pelumas Pertamina', 'Mushola, Toilet', 'Jl. Raya By Pass, Koto Pulai, Koto Tangah, Kota Padang, Sumatera Barat', '-0.840053', '100.358816', 'IMG20160724175408.jpg'),
(44, 'SPBU Lubuk Buaya ', 'Pertamax, Premium, Biosolar, Dexlite, Pertalite', 'Mushola, Toilet, Minimarket', 'No., Jl. Adinegoro No.17, Lubuk Buaya, Koto Tangah, Kota Padang, Sumatera Barat', '-0.815707', '100.320990', 'IMG20160724182331.jpg'),
(45, 'SPBU Adinegoro ', 'Pertamax, Premium, Biosolar', 'Mushola, Toilet, ATM', 'Jl. Adinegoro, Koto Tangah, Kota Padang, Sumatera Barat', '-0.844278', '100.331762', 'IMG20160724183251.jpg'),
(46, 'SPBU Tabing ', 'Pertamax92, Premium, Biosolar, Pertalite', 'Mushola, Minimarket, Toilet, ATM', 'Jl. Prof. Dr. Hamka, Parupuk Tabing, Koto Tangah, Kota Padang, Sumatera Barat', '-0.888792', '100.351561', 'IMG20160724190232.jpg'),
(47, 'SPBU S.Parman ', 'Pertamax92, Premium, Biosolar, Pertalite90', 'Mushola, Toilet, Minimarket', 'Jl. S. Parman, Padang Utara, Kota Padang, Sumatera Barat', '-0.905559', '100.350687', 'IMG20160724191223.jpg'),
(48, 'SPBU Khatib Sulaiman ', 'Pertamax92, Premium, Biosolar, Pertalite', ' Mushola, Toilet, Minimarket, KFC', 'Jalan Khatib Sulaiman, Ulak Karang Sel., Padang, Kota Padang, Sumatera Barat', '-0.910095', '100.354544', 'IMG20160724192257.jpg'),
(49, 'SPBU Lolong Belanti ', 'Pertamax92, Premium, Solar, Biosolar', 'Mushola, Toilet, Minimarket', ' Jl. Khatib Sulaiman, Lolong Belanti, Padang Utara, Kota Padang, Sumatera Barat', '-0.914901', '100.358027', 'IMG20160724193318.jpg'),
(50, 'SPBU Flamboyan Baru ', 'Pertamax92, Premium, Solar', 'Mushola, Toilet', ' Flamboyan Baru, Padang Bar., Kota Padang, Sumatera Barat', '-0.925452', '100.351329', 'IMG20160724194053.jpg'),
(51, 'SPBU Veteran ', 'Premium, Solar', ' Mushola, Toilet', 'JL. Veteran, No. 49, Purus, Padang Bar., Kota Padang, Sumatera Barat', '-0.937856', '100.354217', 'IMG20160724195207.jpg'),
(52, 'SPBU Berok Nipah ', 'Premium, Solar, Pertalite', 'Mushola, Toilet', ' Jalan Batang Arau , Berok Nipah, Padang Bar., Kota Padang, Sumatera Barat', '-0.965120', '100.357526', 'IMG20160724205131.jpg'),
(53, 'SPBU Ranah ', 'Premium, Biosolar, solar', ' Mushola, Toilet', 'Ranah Parak Rumbio, Padang Selatan, Ganting Parak Gadang, Padang, Kota Padang, Sumatera Barat', '-0.955687', '100.368033', 'IMG20160724205932.jpg'),
(54, 'SPBU Kubu Marapalam ', 'Pertamax92, Premium, Solar', 'Mushola, Toilet, ATM', 'Jl. Dr. Sutomo, Simpang Haru, Padang Tim., Kota Padang, Sumatera Barat', '-0.947414', '100.381125', 'IMG20160724211655.jpg'),
(55, 'SPBU Jati ', 'Pertamax92, Premium, Solar', ' Minimarket, Mushola, ATM, Toilet', ' Jl. Perintis Kemerdekaan, Jati Baru, Padang Tim., Kota Padang, Sumatera Barat', '-0.941337', '100.366083', 'IMG20160726193301.jpg'),
(56, 'SPBU Gn.Panggilun  ', 'Premium, Pertamax92, Solar, Pertalite', 'Toilet, Mushola, Elpiji', 'Jl. Gajah Mada, Gn. Pangilun, Nanggalo, Kota Padang, Sumatera Barat ', '-0.906151', '100.363486', 'IMG20160726195836.jpg'),
(57, 'SPBU Ampang ', 'Pertamax, Premium, Biosolar, Pertamina Dex ', 'Mushola, Toilet, ATM', 'Alai Parak Kopi, Padang Utara, Kota Padang, Sumatera Barat', '-0.924019', '100.372863', 'IMG20160726200821.jpg'),
(58, 'SPBU Sawahan ', 'Pertamax, Premium, Biosolar', 'Mushola, Toilet', ' Jl. Sawahan III, Sawahan, Padang Tim., Kota Padang, Sumatera Barat', '-0.944985', '100.370503', 'Screenshot_2016-07-24-21-25-56-81.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbspbu`
--

CREATE TABLE IF NOT EXISTS `tbspbu` (
  `idspbu` varchar(5) NOT NULL,
  `alamatspbu` varchar(500) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `gambarspbu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminis`
--
ALTER TABLE `adminis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
 ADD PRIMARY KEY (`idlokasi`);

--
-- Indexes for table `tbspbu`
--
ALTER TABLE `tbspbu`
 ADD PRIMARY KEY (`idspbu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminis`
--
ALTER TABLE `adminis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
MODIFY `idlokasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
