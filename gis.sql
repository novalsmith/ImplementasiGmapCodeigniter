-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Agu 2017 pada 02.18
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`id_add` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `AtributGambar` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `address`
--

INSERT INTO `address` (`id_add`, `name`, `posisi`, `AtributGambar`) VALUES
(1, 'Nginden', '-7.292302, 112.776926', 'file_1503117755.jpg'),
(2, 'Klampis', '-7.283987, 112.772373', 'file_1503117741.jpg'),
(3, 'Semolowaru', '-7.301481,112.779269', 'file_1503117610.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa`
--

CREATE TABLE IF NOT EXISTS `analisa` (
`id_analisa` int(5) NOT NULL,
  `id_add` int(5) NOT NULL,
  `rb` varchar(5) NOT NULL,
  `lk` varchar(5) NOT NULL,
  `ga` varchar(5) NOT NULL,
  `max` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `analisa`
--

INSERT INTO `analisa` (`id_analisa`, `id_add`, `rb`, `lk`, `ga`, `max`) VALUES
(2, 1, '3', '2', '2', 7),
(3, 2, '3', '3', '3', 9),
(4, 3, '2', '2', '2', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `geocoding`
--

CREATE TABLE IF NOT EXISTS `geocoding` (
`id_geo` int(5) NOT NULL,
  `id_add` int(10) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data untuk tabel `geocoding`
--

INSERT INTO `geocoding` (`id_geo`, `id_add`, `lat`, `long`) VALUES
(25, 1, '-7.291068', '112.775152'),
(26, 1, '-7.295133', '112.775013'),
(27, 1, '-7.295644', '112.778564'),
(28, 1, '-7.291228', '112.778339'),
(29, 1, '-7.291068', '112.775152'),
(30, 2, '-7.282780', '112.771898'),
(31, 2, '-7.283025', '112.773464'),
(32, 2, '-7.285249', '112.773196'),
(33, 2, '-7.285079', '112.771608'),
(34, 2, '-7.282780', '112.771898'),
(35, 3, '-7.295642', '112.772934'),
(36, 3, '-7.295961', '112.786410'),
(37, 3, '-7.303964', '112.786410'),
(38, 3, '-7.304603', '112.776582'),
(39, 3, '-7.307625', '112.776239'),
(40, 3, '-7.306433', '112.773363'),
(41, 3, '-7.295642', '112.772934');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_tempat`
--

CREATE TABLE IF NOT EXISTS `nama_tempat` (
`id_nama_tempat` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `gambar` blob NOT NULL,
  `ket_nama_tempat` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data untuk tabel `nama_tempat`
--

INSERT INTO `nama_tempat` (`id_nama_tempat`, `nama`, `lat`, `long`, `gambar`, `ket_nama_tempat`) VALUES
(1, 'Semolowaru', '-7.304390', '112.790079', 0x67616d6261722e6a7067, 'examples testing'),
(2, 'Semolowaru', '-7.300133', '112.791163', 0x67616d6261722e6a7067, 'examples testing'),
(3, 'Semolowaru', '-7.299910', '112.790658', 0x67616d6261722e6a7067, 'examples testing'),
(4, 'Semolowaru', '-7.299846', '112.789875', 0x67616d6261722e6a7067, 'examples testing'),
(5, 'Semolowaru', '-7.299346', '112.787965', 0x67616d6261722e6a7067, 'examples testing'),
(6, 'Semolowaru', '-7.301431', '112.787515', 0x67616d6261722e6a7067, 'examples testing'),
(7, 'Semolowaru', '-7.302070', '112.787418', 0x67616d6261722e6a7067, 'examples testing'),
(8, 'Semolowaru', '-7.301752', '112.785837', 0x67616d6261722e6a7067, 'examples testing'),
(9, 'Semolowaru', '-7.299155', '112.785740', 0x67616d6261722e6a7067, 'examples testing'),
(10, 'Semolowaru', '-7.299113', '112.786352', 0x67616d6261722e6a7067, 'examples testing'),
(11, 'Semolowaru', '-7.295973', '112.786459', 0x67616d6261722e6a7067, 'examples testing'),
(12, 'Semolowaru', '-7.295787', '112.782301', 0x67616d6261722e6a7067, 'examples testing'),
(13, 'Semolowaru', '-7.295244', '112.782312', 0x67616d6261722e6a7067, 'examples testing'),
(14, 'Semolowaru', '-7.295148', '112.781937', 0x67616d6261722e6a7067, 'examples testing'),
(15, 'Semolowaru', '-7.294457', '112.781947', 0x67616d6261722e6a7067, 'examples testing'),
(16, 'Semolowaru', '-7.292286', '112.780574', 0x67616d6261722e6a7067, 'examples testing'),
(17, 'Semolowaru', '-7.295393', '112.780445', 0x67616d6261722e6a7067, 'examples testing'),
(18, 'Semolowaru', '-7.295425', '112.780971', 0x67616d6261722e6a7067, 'examples testing'),
(19, 'Semolowaru', '-7.295840', '112.781025', 0x67616d6261722e6a7067, 'examples testing'),
(20, 'Semolowaru', '-7.295798', '112.779662', 0x67616d6261722e6a7067, 'examples testing'),
(21, 'Semolowaru', '-7.296355', '112.779629', 0x67616d6261722e6a7067, 'examples testing'),
(22, 'Semolowaru', '-7.295940', '112.777086', 0x67616d6261722e6a7067, 'examples testing'),
(23, 'Semolowaru', '-7.295855', '112.777076', 0x67616d6261722e6a7067, 'examples testing'),
(24, 'Semolowaru', '-7.295546', '112.775541', 0x67616d6261722e6a7067, 'examples testing'),
(25, 'Semolowaru', '-7.295600', '112.773739', 0x67616d6261722e6a7067, 'examples testing'),
(26, 'Semolowaru', '-7.295663', '112.772945', 0x67616d6261722e6a7067, 'examples testing'),
(27, 'Semolowaru', '-7.300037', '112.772409', 0x67616d6261722e6a7067, 'examples testing'),
(28, 'Semolowaru', '-7.300069', '112.772591', 0x67616d6261722e6a7067, 'examples testing'),
(29, 'Semolowaru', '-7.302623', '112.772183', 0x67616d6261722e6a7067, 'examples testing'),
(30, 'Semolowaru', '-7.305720', '112.772773', 0x67616d6261722e6a7067, 'examples testing'),
(31, 'Semolowaru', '-7.306508', '112.773385', 0x67616d6261722e6a7067, 'examples testing'),
(32, 'Semolowaru', '-7.306539', '112.774061', 0x67616d6261722e6a7067, 'examples testing'),
(33, 'Semolowaru', '-7.307263', '112.775069', 0x67616d6261722e6a7067, 'examples testing'),
(34, 'Semolowaru', '-7.307763', '112.776228', 0x67616d6261722e6a7067, 'examples testing'),
(35, 'Semolowaru', '-7.304635', '112.776518', 0x67616d6261722e6a7067, 'examples testing'),
(36, 'Semolowaru', '-7.304738', '112.782713', 0x67616d6261722e6a7067, 'examples testing'),
(37, 'Semolowaru', '-7.303738', '112.782789', 0x67616d6261722e6a7067, 'examples testing'),
(38, 'Semolowaru', '-7.303951', '112.787166', 0x67616d6261722e6a7067, 'examples testing'),
(39, 'Semolowaru', '-7.303749', '112.787220', 0x67616d6261722e6a7067, 'examples testing'),
(40, 'Semolowaru', '-7.304387', '112.790073', 0x67616d6261722e6a7067, 'examples testing'),
(41, 'Semolowaru', '-7.304390', '112.790079', 0x67616d6261722e6a7067, 'examples testing'),
(42, 'Menur Pumpungan', '-7.300026', '112.772393', 0x67616d6261722e6a7067, '-7.300026,112.772393'),
(43, 'Menur Pumpungan', '-7.289269', '112.772201', 0x67616d6261722e6a7067, '-7.289269,112.772201'),
(44, 'Menur Pumpungan', '-7.289396', '112.770823', 0x67616d6261722e6a7067, '-7.289396,112.770823'),
(45, 'Menur Pumpungan', '-7.285903', '112.771385', 0x67616d6261722e6a7067, '-7.285903,112.771385'),
(46, 'Menur Pumpungan', '-7.285903', '112.771385', 0x67616d6261722e6a7067, '-7.285903,112.771385'),
(47, 'Menur Pumpungan', '-7.285751', '112.769598', 0x67616d6261722e6a7067, '-7.285751,112.769598'),
(48, 'Menur Pumpungan', '-7.285219', '112.769675', 0x67616d6261722e6a7067, '-7.285219,112.769675'),
(49, 'Menur Pumpungan', '-7.284991', '112.766562', 0x67616d6261722e6a7067, '-7.284991,112.766562'),
(50, 'Menur Pumpungan', '-7.285346', '112.765056', 0x67616d6261722e6a7067, '-7.285346,112.765056'),
(51, 'Menur Pumpungan', '-7.289143', '112.763015', 0x67616d6261722e6a7067, '-7.289143,112.763015'),
(52, 'Menur Pumpungan', '-7.299166', '112.761994', 0x67616d6261722e6a7067, '-7.299166,112.761994'),
(53, 'Menur Pumpungan', '-7.300026', '112.772393', 0x67616d6261722e6a7067, '-7.300026,112.772393'),
(54, 'Gebang Putih', '-7.287435', '112.789647', 0x67616d6261722e6a7067, 'examples testing'),
(55, 'Gebang Putih', '-7.275792', '112.789819', 0x67616d6261722e6a7067, 'examples testing'),
(56, 'Gebang Putih', '-7.276931', '112.783800', 0x67616d6261722e6a7067, 'examples testing'),
(57, 'Gebang Putih', '-7.280134', '112.784358', 0x67616d6261722e6a7067, 'examples testing'),
(58, 'Gebang Putih', '-7.279985', '112.785645', 0x67616d6261722e6a7067, 'examples testing'),
(59, 'Gebang Putih', '-7.281816', '112.785538', 0x67616d6261722e6a7067, 'examples testing'),
(60, 'Gebang Putih', '-7.281826', '112.785731', 0x67616d6261722e6a7067, 'examples testing'),
(61, 'Gebang Putih', '-7.284189', '112.785141', 0x67616d6261722e6a7067, 'examples testing'),
(62, 'Gebang Putih', '-7.284498', '112.781804', 0x67616d6261722e6a7067, 'examples testing'),
(63, 'Gebang Putih', '-7.287844', '112.781534', 0x67616d6261722e6a7067, 'examples testing'),
(64, 'Gebang Putih', '-7.288084', '112.782995', 0x67616d6261722e6a7067, 'examples testing'),
(65, 'Gebang Putih', '-7.287871', '112.783285', 0x67616d6261722e6a7067, 'examples testing'),
(66, 'Gebang Putih', '-7.287871', '112.783285', 0x67616d6261722e6a7067, 'examples testing'),
(67, 'Gebang Putih', '-7.287680', '112.784776', 0x67616d6261722e6a7067, 'examples testing'),
(68, 'Gebang Putih', '-7.287435', '112.789647', 0x67616d6261722e6a7067, 'examples testing'),
(69, 'Klampis Ngasem', '-7.295908', '112.785800', 0x67616d6261722e6a7067, 'examples testing'),
(70, 'Klampis Ngasem', '-7.293333', '112.785907', 0x67616d6261722e6a7067, 'examples testing'),
(71, 'Klampis Ngasem', '-7.293184', '112.784169', 0x67616d6261722e6a7067, 'examples testing'),
(72, 'Klampis Ngasem', '-7.292929', '112.783354', 0x67616d6261722e6a7067, 'examples testing'),
(73, 'Klampis Ngasem', '-7.291247', '112.783482', 0x67616d6261722e6a7067, 'examples testing'),
(74, 'Klampis Ngasem', '-7.291162', '112.782495', 0x67616d6261722e6a7067, 'examples testing'),
(75, 'Klampis Ngasem', '-7.290162', '112.782538', 0x67616d6261722e6a7067, 'examples testing'),
(76, 'Klampis Ngasem', '-7.290119', '112.782281', 0x67616d6261722e6a7067, 'examples testing'),
(77, 'Klampis Ngasem', '-7.289459', '112.782302', 0x67616d6261722e6a7067, 'examples testing'),
(78, 'Klampis Ngasem', '-7.289395', '112.781487', 0x67616d6261722e6a7067, 'examples testing'),
(79, 'Klampis Ngasem', '-7.282563', '112.781809', 0x67616d6261722e6a7067, 'examples testing'),
(80, 'Klampis Ngasem', '-7.282584', '112.781401', 0x67616d6261722e6a7067, 'examples testing'),
(81, 'Klampis Ngasem', '-7.281967', '112.781401', 0x67616d6261722e6a7067, 'examples testing'),
(82, 'Klampis Ngasem', '-7.282180', '112.776466', 0x67616d6261722e6a7067, 'examples testing'),
(83, 'Klampis Ngasem', '-7.281137', '112.770522', 0x67616d6261722e6a7067, 'examples testing'),
(84, 'Klampis Ngasem', '-7.284053', '112.769535', 0x67616d6261722e6a7067, 'examples testing'),
(85, 'Klampis Ngasem', '-7.283989', '112.768741', 0x67616d6261722e6a7067, 'examples testing'),
(86, 'Klampis Ngasem', '-7.284351', '112.768762', 0x67616d6261722e6a7067, 'examples testing'),
(87, 'Klampis Ngasem', '-7.284351', '112.768762', 0x67616d6261722e6a7067, 'examples testing'),
(88, 'Klampis Ngasem', '-7.284330', '112.768376', 0x67616d6261722e6a7067, 'examples testing'),
(89, 'Klampis Ngasem', '-7.285075', '112.768333', 0x67616d6261722e6a7067, 'examples testing'),
(90, 'Klampis Ngasem', '-7.285245', '112.769664', 0x67616d6261722e6a7067, 'examples testing'),
(91, 'Klampis Ngasem', '-7.285777', '112.769599', 0x67616d6261722e6a7067, 'examples testing'),
(92, 'Klampis Ngasem', '-7.285905', '112.771423', 0x67616d6261722e6a7067, 'examples testing'),
(93, 'Klampis Ngasem', '-7.284990', '112.771552', 0x67616d6261722e6a7067, 'examples testing'),
(94, 'Klampis Ngasem', '-7.285330', '112.773590', 0x67616d6261722e6a7067, 'examples testing'),
(95, 'Klampis Ngasem', '-7.289268', '112.772303', 0x67616d6261722e6a7067, 'examples testing'),
(96, 'Klampis Ngasem', '-7.295632', '112.772925', 0x67616d6261722e6a7067, 'examples testing'),
(97, 'Klampis Ngasem', '"7.296355', '"', 0x31322e37373935393920, 'gambar.jpg'),
(98, 'Klampis Ngasem', '-7.295802', '112.780006', 0x67616d6261722e6a7067, 'examples testing'),
(99, 'Klampis Ngasem', '-7.295844', '112.780907', 0x67616d6261722e6a7067, 'examples testing'),
(100, 'Klampis Ngasem', '-7.295398', '112.780757', 0x67616d6261722e6a7067, 'examples testing'),
(101, 'Klampis Ngasem', '-7.292311', '112.780564', 0x67616d6261722e6a7067, 'examples testing'),
(102, 'Klampis Ngasem', '-7.292396', '112.781186', 0x67616d6261722e6a7067, 'examples testing'),
(103, 'Klampis Ngasem', '-7.295121', '112.781937', 0x67616d6261722e6a7067, 'examples testing'),
(104, 'Klampis Ngasem', '-7.295259', '112.782334', 0x67616d6261722e6a7067, 'examples testing'),
(105, 'Klampis Ngasem', '-7.295770', '112.782302', 0x67616d6261722e6a7067, 'examples testing'),
(106, 'Klampis Ngasem', '-7.295908', '112.785800', 0x67616d6261722e6a7067, 'examples testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`id_add`);

--
-- Indexes for table `analisa`
--
ALTER TABLE `analisa`
 ADD PRIMARY KEY (`id_analisa`), ADD KEY `id_add` (`id_add`);

--
-- Indexes for table `geocoding`
--
ALTER TABLE `geocoding`
 ADD PRIMARY KEY (`id_geo`), ADD KEY `id_add` (`id_add`);

--
-- Indexes for table `nama_tempat`
--
ALTER TABLE `nama_tempat`
 ADD PRIMARY KEY (`id_nama_tempat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
MODIFY `id_add` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `analisa`
--
ALTER TABLE `analisa`
MODIFY `id_analisa` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `geocoding`
--
ALTER TABLE `geocoding`
MODIFY `id_geo` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `nama_tempat`
--
ALTER TABLE `nama_tempat`
MODIFY `id_nama_tempat` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `analisa`
--
ALTER TABLE `analisa`
ADD CONSTRAINT `relationsAddss` FOREIGN KEY (`id_add`) REFERENCES `address` (`id_add`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `geocoding`
--
ALTER TABLE `geocoding`
ADD CONSTRAINT `relationsAdd` FOREIGN KEY (`id_add`) REFERENCES `address` (`id_add`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
