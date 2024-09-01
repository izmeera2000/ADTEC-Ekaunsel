-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 30, 2024 at 03:46 PM
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
  `soalan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `user_edit` int DEFAULT NULL,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borang_psikologi`
--

INSERT INTO `borang_psikologi` (`id`, `re_order`, `soalan`, `kategori`, `status`, `user_edit`, `time_add`, `time_edit`) VALUES
(4, 1, 'Saya rasa susah untuk bertenang', 1, 1, NULL, '2024-08-27 00:51:21', '2024-08-27 00:51:21'),
(5, NULL, 'Saya sedar mulut saya rasa kering', 2, 1, NULL, '2024-08-27 01:04:12', '2024-08-27 01:04:12'),
(6, NULL, 'Saya seolah-olah tidak dapat mengalami perasaan positif sama sekali', 3, 1, NULL, '2024-08-27 01:05:00', '2024-08-27 01:05:00'),
(7, NULL, 'Saya mengalami kesukaran bernafas (contohnya, bernafas terlalu cepat, tercungap-cungap walaupun tidak melakukan aktiviti fizikal)', 2, 1, NULL, '2024-08-27 01:06:18', '2024-08-27 01:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `borang_psikologi_kategori`
--

DROP TABLE IF EXISTS `borang_psikologi_kategori`;
CREATE TABLE IF NOT EXISTS `borang_psikologi_kategori` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` text COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borang_psikologi_kategori`
--

INSERT INTO `borang_psikologi_kategori` (`id`, `nama_kategori`, `time_add`, `time_edit`) VALUES
(1, 'stress', '2024-08-26 17:50:08', '2024-08-26 17:50:08'),
(2, 'kebimbangan', '2024-08-26 23:57:36', '2024-08-26 23:57:36'),
(3, 'kemurungan', '2024-08-26 17:50:19', '2024-08-26 17:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `kaunselor_jadual`
--

DROP TABLE IF EXISTS `kaunselor_jadual`;
CREATE TABLE IF NOT EXISTS `kaunselor_jadual` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `masalah` text COLLATE utf8mb4_unicode_ci,
  `event_status` tinyint(1) NOT NULL DEFAULT '1',
  `tarikh` date DEFAULT NULL,
  `masa` time DEFAULT NULL,
  `kaunselor_id` int DEFAULT NULL,
  `sebab` text COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `kaunselor_id` (`kaunselor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kaunselor_jadual`
--

INSERT INTO `kaunselor_jadual` (`id`, `user_id`, `masalah`, `event_status`, `tarikh`, `masa`, `kaunselor_id`, `sebab`, `time_add`, `time_edit`) VALUES
(69, 6, 'asd', 1, '2024-08-19', NULL, NULL, NULL, '2024-08-29 23:42:03', '2024-08-29 23:42:03'),
(70, 6, 'asd', 1, '2024-08-20', NULL, NULL, NULL, '2024-08-29 23:42:06', '2024-08-29 23:42:06'),
(71, 6, 'asd', 1, '2024-08-21', NULL, NULL, NULL, '2024-08-29 23:48:45', '2024-08-29 23:48:45'),
(81, 6, 'asd', 1, '2024-08-22', NULL, NULL, NULL, '2024-08-30 10:56:39', '2024-08-30 10:56:39'),
(82, 6, 'asd', 0, '2024-08-23', NULL, NULL, NULL, '2024-08-30 10:57:09', '2024-08-30 10:57:09'),
(84, 1, 'waasd', 1, '2024-08-05', NULL, NULL, NULL, '2024-08-30 13:11:46', '2024-08-30 13:11:46');

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
  `agama` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kahwin` varchar(99) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangsa` varchar(99) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` text COLLATE utf8mb4_unicode_ci,
  `password` text COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `ndp`, `nama`, `email`, `phone`, `kp`, `jantina`, `agama`, `status_kahwin`, `bangsa`, `image_url`, `password`, `time_add`, `time_edit`) VALUES
(1, 1, 3212, 'asdasdasd', 'asdasd@gmail.com', 1123881290, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-26 18:22:52', '2024-08-26 18:22:52'),
(6, 2, 12312321, 'Izmeer Aiman', 'asddasdsa@gmail.com', 123213213, 21321312, 0, 'Lain-lain', 'Tidak Berkahwin', 'asdasd', 'gambar.png', 'a8f5f167f44f4964e6c998dee827110c', '2024-08-28 14:58:58', '2024-08-28 14:58:58'),
(7, 1, 321321, 'Izmeer Aiman', 'aa@gmail.com', 51511, 21321321, 0, 'Lain-lain', 'Tidak Berkahwin', 'asdasd', 'gambar.png', 'a8f5f167f44f4964e6c998dee827110c', '2024-08-28 14:58:58', '2024-08-28 14:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_psikologi`
--

DROP TABLE IF EXISTS `user_psikologi`;
CREATE TABLE IF NOT EXISTS `user_psikologi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `jawapan_psikologi` text COLLATE utf8mb4_unicode_ci,
  `keputusan` text COLLATE utf8mb4_unicode_ci,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
