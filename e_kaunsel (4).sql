-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2024 at 12:08 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_kaunsel`
--

-- --------------------------------------------------------

--
-- Table structure for table `borang_psikologi`
--

DROP TABLE IF EXISTS `borang_psikologi`;
CREATE TABLE IF NOT EXISTS `borang_psikologi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `re_order` int DEFAULT NULL,
  `soalan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `user_edit` int DEFAULT NULL,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borang_psikologi`
--

INSERT INTO `borang_psikologi` (`id`, `re_order`, `soalan`, `kategori`, `status`, `user_edit`, `time_add`, `time_edit`) VALUES
(4, 1, 'Saya rasa susah untuk bertenang', 1, 1, NULL, '2024-08-27 00:51:21', '2024-08-27 00:51:21'),
(5, 4, 'Saya sedar mulut saya rasa kering', 2, 1, NULL, '2024-08-27 01:04:12', '2024-08-27 01:04:12'),
(6, 3, 'Saya seolah-olah tidak dapat mengalami perasaan positif sama sekali', 3, 1, NULL, '2024-08-27 01:05:00', '2024-08-27 01:05:00'),
(7, 2, 'Saya mengalami kesukaran bernafas (contohnya, bernafas terlalu cepat, tercungap-cungap walaupun tidak melakukan aktiviti fizikal)', 2, 1, NULL, '2024-08-27 01:06:18', '2024-08-27 01:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `borang_psikologi_kategori`
--

DROP TABLE IF EXISTS `borang_psikologi_kategori`;
CREATE TABLE IF NOT EXISTS `borang_psikologi_kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `normal` int DEFAULT NULL,
  `ringan` int DEFAULT NULL,
  `sederhana` int DEFAULT NULL,
  `teruk` int DEFAULT NULL,
  `sangat_teruk` int DEFAULT NULL,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borang_psikologi_kategori`
--

INSERT INTO `borang_psikologi_kategori` (`id`, `nama_kategori`, `normal`, `ringan`, `sederhana`, `teruk`, `sangat_teruk`, `time_add`, `time_edit`) VALUES
(1, 'stress', 0, 8, 10, 14, 18, '2024-08-26 17:50:08', '2024-08-26 17:50:08'),
(2, 'kebimbangan', 0, 5, 7, 9, 11, '2024-08-26 23:57:36', '2024-08-26 23:57:36'),
(3, 'kemurungan', 0, 6, 8, 11, 15, '2024-08-26 17:50:19', '2024-08-26 17:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `kaunselor_jadual`
--

DROP TABLE IF EXISTS `kaunselor_jadual`;
CREATE TABLE IF NOT EXISTS `kaunselor_jadual` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `masalah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `event_status` tinyint(1) NOT NULL DEFAULT '1',
  `tarikh` date DEFAULT NULL,
  `masa_mula` datetime DEFAULT NULL,
  `masa_tamat` datetime DEFAULT NULL,
  `masa_mula2` datetime DEFAULT NULL,
  `masa_tamat2` datetime DEFAULT NULL,
  `kaunselor_id` int DEFAULT NULL,
  `sebab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `jenis` int DEFAULT NULL,
  `meeting_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `kaunselor_id` (`kaunselor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kaunselor_jadual`
--

INSERT INTO `kaunselor_jadual` (`id`, `user_id`, `masalah`, `event_status`, `tarikh`, `masa_mula`, `masa_tamat`, `masa_mula2`, `masa_tamat2`, `kaunselor_id`, `sebab`, `jenis`, `meeting_link`, `time_add`, `time_edit`) VALUES
(94, 6, 'asd', 2, '2024-09-18', '2024-09-27 05:23:00', '2024-09-28 20:55:00', '2024-09-27 08:31:07', NULL, NULL, NULL, 1, NULL, '2024-09-08 12:33:58', '2024-09-27 00:31:07'),
(95, 18, 'asd', 1, '2024-09-16', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-08 12:33:58', '2024-09-08 12:33:58'),
(98, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(116, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(117, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(118, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(119, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(120, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(121, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(122, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(123, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(124, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(125, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(126, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(127, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(128, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(129, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(130, 6, 'asdasd', 1, '2024-09-17', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20'),
(131, 6, 'asdasd', 1, '2024-09-18', NULL, NULL, NULL, NULL, NULL, '', 1, NULL, '2024-09-12 09:37:20', '2024-09-12 09:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth`
--

DROP TABLE IF EXISTS `oauth`;
CREATE TABLE IF NOT EXISTS `oauth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `access_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` int DEFAULT NULL,
  `ndp` int DEFAULT NULL,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `kp` int DEFAULT NULL,
  `jantina` int DEFAULT NULL,
  `agama` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kahwin` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangsa` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `ndp`, `nama`, `email`, `phone`, `kp`, `jantina`, `agama`, `status_kahwin`, `bangsa`, `image_url`, `password`, `time_add`, `time_edit`) VALUES
(6, 2, 12312321, 'Izmeer Aiman', 'saerahhassan603@gmail.com', 123213213, 21321312, 1, 'Lain-lain', 'Tidak Berkahwin', 'asdasd', 'gambar.png', 'a8f5f167f44f4964e6c998dee827110c', '2024-08-28 14:58:58', '2024-08-28 14:58:58'),
(7, 1, NULL, 'Izmeer Aiman', 'aa@gmail.com', 51511, 21321321, 1, 'Lain-lain', 'Tidak Berkahwin', 'asdasd', 'gambar.png', 'a8f5f167f44f4964e6c998dee827110c', '2024-08-28 14:58:58', '2024-08-28 14:58:58'),
(18, 2, 12312322, 'Izmeer Aiman', 'asddasdsa2@gmail.com', 1232132132, 213213122, 1, 'Lain-lain', 'Tidak Berkahwin', 'asdasd', 'gambar.png', 'a8f5f167f44f4964e6c998dee827110c', '2024-08-28 14:58:58', '2024-08-28 14:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_psikologi`
--

DROP TABLE IF EXISTS `user_psikologi`;
CREATE TABLE IF NOT EXISTS `user_psikologi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `jawapan_psikologi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keputusan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_psikologi`
--

INSERT INTO `user_psikologi` (`id`, `user_id`, `jawapan_psikologi`, `keputusan`, `time_add`, `time_edit`) VALUES
(9, 18, '[{\"5\":\"1\"},{\"4\":\"1\"},{\"6\":\"2\"},{\"7\":\"1\"}]', '[{\"kategori_id\":\"1\",\"value\":1},{\"kategori_id\":\"2\",\"value\":2},{\"kategori_id\":\"3\",\"value\":2}]', '2024-09-01 11:30:08', '2024-09-01 11:30:08'),
(10, 18, '[{\"5\":\"1\"},{\"4\":\"1\"},{\"6\":\"2\"},{\"7\":\"1\"}]', '[{\"kategori_id\":\"1\",\"value\":15},{\"kategori_id\":\"2\",\"value\":15},{\"kategori_id\":\"3\",\"value\":21}]', '2024-09-01 15:30:08', '2024-09-01 15:30:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borang_psikologi`
--
ALTER TABLE `borang_psikologi`
  ADD CONSTRAINT `borang_psikologi_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `borang_psikologi_kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `kaunselor_jadual`
--
ALTER TABLE `kaunselor_jadual`
  ADD CONSTRAINT `kaunselor_jadual_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `kaunselor_jadual_ibfk_2` FOREIGN KEY (`kaunselor_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_psikologi`
--
ALTER TABLE `user_psikologi`
  ADD CONSTRAINT `user_psikologi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
