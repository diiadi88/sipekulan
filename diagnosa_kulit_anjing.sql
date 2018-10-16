-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 03:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnosa_kulit_anjing`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `path` varchar(50) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `path`, `id_penyakit`) VALUES
(1, '1,2,3,4,5,6,7,8,9,10,11', 1),
(2, '12,13,14,15,16,17', 2),
(3, '3,18,19,20,21,22,23,25,80', 3),
(4, '19,26,27,28,29,30,31,32,33,34', 4),
(5, '2,6,15,35,36', 5),
(6, '6,34,36,37,38,39,40,41,42', 6),
(7, '22,30,44,45,46,84', 7),
(8, '0,6,0,34,36,37,38,39,40,41,42,0', 6),
(9, '0,6,0,0,47,48,49,50,51,52,0', 8),
(10, '0,0,19,3,18,20,21,22,23,24,25,80,0', 3),
(11, '0,0,0,15,12,13,14,16,17,0', 2),
(12, '0,0,0,15,0,60,26,61,84,0', 10),
(13, '0,0,0,15,0,66,1,26,61,62,63,64,65,0', 11),
(15, '0,0,0,0,30,43,44,45,46,84,0', 7),
(16, '0,0,0,0,0,53,54,55,56,57,58,59,81,82,83,0', 9),
(17, '0,0,0,0,0,0,76,33,77,78,79,0', 14);

-- --------------------------------------------------------

--
-- Table structure for table `aturan_baru`
--

CREATE TABLE `aturan_baru` (
  `id_aturan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan_baru`
--

INSERT INTO `aturan_baru` (`id_aturan`, `id_gejala`, `id_penyakit`) VALUES
(1, 12, 1),
(2, 18, 1),
(3, 22, 1),
(4, 23, 1),
(12, 12, 2),
(13, 18, 2),
(14, 12, 3),
(15, 18, 3),
(16, 22, 3),
(17, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aturan_dinamis`
--

CREATE TABLE `aturan_dinamis` (
  `id` int(11) NOT NULL,
  `path` varchar(50) NOT NULL,
  `acuan` varchar(20) NOT NULL,
  `prioritas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan_dinamis`
--

INSERT INTO `aturan_dinamis` (`id`, `path`, `acuan`, `prioritas`) VALUES
(1, '37,88,89,37,62,0', '26', 1),
(2, '2,47,0', '25', 2),
(3, '87,86,0', '23', 3),
(4, '43,0', '22', 4),
(5, '28,0', '27', 5);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `kategori` enum('bentuk luka','kondisi anjing','lingkungan','daerah','luka di kulit') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `kategori`) VALUES
(1, 'Kulit Bernanah', 'luka di kulit'),
(2, 'Kulit Kemerahan', 'luka di kulit'),
(3, 'Adanya Pembengkakan', 'luka di kulit'),
(4, 'Luka Menimbulkan bau', 'luka di kulit'),
(5, 'Anjing yang sedang hamil', 'kondisi anjing'),
(6, 'Lingkungan yang lembab', 'lingkungan'),
(7, 'Lingkungan yang kotor', 'lingkungan'),
(8, 'Lingkungan yang berdebu', 'lingkungan'),
(9, 'Terjadi di daerah lipatan leher', 'daerah'),
(10, 'Terjadi di daerah lipatan bibir', 'daerah'),
(11, 'Terjadi di daerah lipatan wajah', 'daerah'),
(12, 'Adanya bulatan kecil dan berair', 'bentuk luka'),
(13, 'Terkelupasnya kulit bagian lapisan luar', 'luka di kulit'),
(14, 'Lingkungan tempat tinggal lebih dari satu anjing', 'lingkungan'),
(15, 'Usia anjing dibawah satu tahun', 'kondisi anjing'),
(16, 'Asupan makanan yang kurang bergizi', 'kondisi anjing'),
(17, 'Terjadi di daerah ketiak anjing', 'daerah'),
(18, 'Mengalami nyeri dan pincang pada daerah kaki', 'bentuk luka'),
(19, 'Mengalami erithema interdigital', 'luka di kulit'),
(20, 'Mengalami pustula', 'luka di kulit'),
(21, 'Mengalami papula', 'luka di kulit'),
(22, 'Mengalami nodul', 'bentuk luka'),
(23, 'Mengalami bulla hemoragik', 'bentuk luka'),
(24, 'Mengalami fistula', ''),
(25, 'Mengalami ulkus', ''),
(26, 'mengalami alopesia', ''),
(27, 'Mengalami pruritus akut', ''),
(28, 'Sering menjilat atau mengunyah atau menggosok tubuhnya sendiri', 'kondisi anjing'),
(29, 'Lingkungan dengan cuaca panas', 'lingkungan'),
(30, 'Anjing berbulu tebal dan panjang', 'kondisi anjing'),
(31, 'Terjadi di daerah ekor', 'daerah'),
(32, 'Terjadi di daerah paha', 'daerah'),
(33, 'Terjadi di daerah leher', 'daerah'),
(34, 'Terjadi di daerah wajah', 'daerah'),
(35, 'Adanya bentuk lingkaran kemerahan pada kulit', 'bentuk luka'),
(36, 'Mengalami kerontokan pada daerah luka', 'kondisi anjing'),
(37, 'Kulit berkerak', 'luka di kulit'),
(38, 'Kulit berubah menjadi kehitaman', 'luka di kulit'),
(39, 'alergi makanan endokrinopati', 'kondisi anjing'),
(40, 'Terjadi di daerah telinga', 'daerah'),
(41, 'Terjadi di daerah bokong', 'daerah'),
(42, 'Terjadi di daerah kulit lembab', 'daerah'),
(43, 'Adanya benjolan', 'bentuk luka'),
(44, 'Adanya koreng', 'luka di kulit'),
(45, 'Anjing berbulu pendek', 'kondisi anjing'),
(46, 'Bulu yang kusam', 'kondisi anjing'),
(47, 'Adanya luka terbuka dangkal pada kulit', 'luka di kulit'),
(48, 'Adanya plak keabuan dan tepi kemerahan', 'bentuk luka'),
(49, 'Adanya kikisan pada kulit', 'luka di kulit'),
(50, 'Adanya eksudat', 'bentuk luka'),
(51, 'Kulit kering', 'bentuk luka'),
(52, 'Luka pada kuku', 'luka di kulit'),
(53, 'Adanya leleran nasal', 'kondisi anjing'),
(54, 'Terjadi depresi', 'kondisi anjing'),
(55, 'adanya anoreksia', 'kondisi anjing'),
(56, 'demam', 'kondisi anjing'),
(57, 'konjungtivitis', 'kondisi anjing'),
(58, 'batuk', 'kondisi anjing'),
(59, 'diare', 'kondisi anjing'),
(60, 'usia anjing 3-6 bulan', 'kondisi anjing'),
(61, 'Perubahan warna kulit menjadi gelap', 'bentuk luka'),
(62, 'Adanya komedo', 'kondisi anjing'),
(63, 'Adanya Scale', 'kondisi anjing'),
(64, 'Adanya kelenjar pada kulit', 'bentuk luka'),
(65, 'Adanya sellulitis', 'luka di kulit'),
(66, 'Usia anjing 3-18 bulan', 'kondisi anjing'),
(67, 'Mengalami krusta', ''),
(68, 'Terjadi di daerah siku pinggir telinga', 'daerah'),
(69, 'Terjadi di daerah perut', 'daerah'),
(70, 'terjadi di daerah dada bagian ventral', 'daerah'),
(71, 'Terjadi penurunan berat badan', 'kondisi anjing'),
(72, 'Iritasi kulit ringan', 'luka di kulit'),
(73, 'Adanya pinjal berukuran kecil dan bersayap', 'bentuk luka'),
(74, 'Terjadi di daerah dorsal kepala dan ekor', 'daerah'),
(75, 'terjadi di daerah panggul', 'daerah'),
(76, 'adanya infestasi caplak', 'bentuk luka'),
(77, 'terjadi di daerah kepala', 'daerah'),
(78, 'Terjadi di daerah bahu', 'daerah'),
(79, 'Terjadi di daerah pubis', 'daerah'),
(80, 'Tempat tinggal yang sering tergenang air', 'lingkungan'),
(81, 'Kulit basah dan kemerahan', 'bentuk luka'),
(82, 'Kulit berbau busuk', 'bentuk luka'),
(83, 'terjadi di daerah kaki', 'daerah'),
(84, 'Mengalami kerontokan', 'kondisi anjing'),
(85, 'luka berdiameter 1 cm', 'bentuk luka'),
(86, 'benjolan berisi nanah', 'bentuk luka'),
(87, 'adanya benjolan berdiameter lebih dar 0.5 cm', 'bentuk luka'),
(88, 'permukaan kulit yang terlihat tanpa rambut', 'bentuk luka'),
(89, 'turunnya nafsu makan', 'kondisi anjing');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `jenis_anjing` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `keluhan` text NOT NULL,
  `tanggal_diagnosa` date NOT NULL,
  `hasil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pemilik`, `jenis_anjing`, `jenis_kelamin`, `keluhan`, `tanggal_diagnosa`, `hasil`) VALUES
(30, 'dika', 'adda', 'Betina', 'adsd', '2018-06-27', ''),
(31, '', '', 'Jantan', '', '2018-06-28', ''),
(32, 'asddadas', 'daa', 'Betina', 'asdd', '2018-06-29', '');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(12) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `cara_penanganan` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `cara_penanganan`, `foto`) VALUES
(1, 'Pyoderma', '', ''),
(2, 'Impetigo', '', ''),
(3, 'Bacterical Pododermatitis', '', ''),
(4, 'Pyotraumatic Dermatitis', '', ''),
(5, 'Ringworm', '', ''),
(6, 'Malassezia', '', ''),
(7, 'Folliculitis', '', ''),
(8, 'Candidiasis', '', ''),
(9, 'Canine distemper', '', ''),
(10, 'Canine Demodicosis Local', '', ''),
(11, 'Canine Demodicosis General', '', ''),
(12, 'Canine Scabies', '', ''),
(13, 'Flea Dermatitis', '', ''),
(14, 'Tick Dermatitis', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Administrator','Guest') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fullname`, `password`, `role`) VALUES
('adi', 'Adi Novianto', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `working_memory`
--

CREATE TABLE `working_memory` (
  `id_working_memory` int(11) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_memory`
--

INSERT INTO `working_memory` (`id_working_memory`, `path`) VALUES
(1, '12,18,22,23,50,80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `penyakit` (`id_penyakit`);

--
-- Indexes for table `aturan_baru`
--
ALTER TABLE `aturan_baru`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `aturan_dinamis`
--
ALTER TABLE `aturan_dinamis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `working_memory`
--
ALTER TABLE `working_memory`
  ADD PRIMARY KEY (`id_working_memory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aturan_baru`
--
ALTER TABLE `aturan_baru`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `aturan_dinamis`
--
ALTER TABLE `aturan_dinamis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `working_memory`
--
ALTER TABLE `working_memory`
  MODIFY `id_working_memory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
