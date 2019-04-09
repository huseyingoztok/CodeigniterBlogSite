-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 08:02 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `article_seo` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `content` text COLLATE utf8_turkish_ci NOT NULL,
  `image_url` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `view_count` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `isDraft` bit(1) NOT NULL,
  `isDeleted` bit(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Id`, `title`, `article_seo`, `content`, `image_url`, `view_count`, `author_id`, `category_id`, `isDraft`, `isDeleted`, `createdAt`, `modifiedAt`) VALUES
(1, 'Kotlin Ders 1', 'kotlin-ders-1', 'Kotlin Ders 1 i&ccedil;erik', 'deneme.png', 0, 1, 5, b'0', b'1', '2018-12-25 00:00:00', '2018-12-19 07:16:18'),
(2, '1kotlin 2 ve açıklamalar', '1kotlin-2-ve-aciklamalar', 'Kotlin Ders 2 i&ccedil;erik sayfalama', '5c14478720df0polygon-1920x1080-4k-5k-wallpaper-android-wallpaper-waves-background-3521.jpg', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-19 07:16:05'),
(3, 'kotlin 3 devam', 'kotlin-3-devam', 'Kotlin Ders 3 i&ccedil;erik mvc design', '5c14489cd5753polygon-1080x1920-4k-5k-wallpaper-android-wallpaper-waves-background-3521.jpg', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-18 14:19:11'),
(4, 'kotlin 4', 'kotlin-4', 'Kotlin Ders 4 içerik', 'deneme4.png', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(5, 'kotlin 5', 'kotlin-5', 'Kotlin Ders 5 içerik', 'deneme5.png', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(6, 'kotlin 6', 'kotlin-6', 'Kotlin Ders 6 içerik', 'deneme6.png', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(7, 'kotlin 7', 'kotlin-7', 'Kotlin Ders 7 içerik', 'deneme7.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(8, 'kotlin 8', 'kotlin-8', 'Kotlin Ders 8 içerik', 'deneme8.png', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(9, 'kotlin 9', 'kotlin-9', 'Kotlin Ders 9 içerik', 'deneme9.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(10, 'kotlin 10', 'kotlin-10', 'Kotlin Ders 10 içerik', 'deneme10.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(11, 'kotlin 11', 'kotlin-11', 'Kotlin Ders 11 içerik', 'deneme11.png', 0, 1, 5, b'0', b'1', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(12, 'kotlin 12', 'kotlin-12', 'Kotlin Ders 12 içerik', 'deneme12.png', 1, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(13, 'kotlin 13', 'kotlin-13', 'Kotlin Ders 13 içerik', 'deneme13.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(14, 'kotlin 14', 'kotlin-14', 'Kotlin Ders 14 içerik', 'deneme14.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(15, 'kotlin 15', 'kotlin-15', 'Kotlin Ders 15 içerik', 'deneme15.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(16, 'kotlin 16', 'kotlin-16', 'Kotlin Ders 16 içerik', 'deneme16.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(17, 'kotlin 17', 'kotlin-17', 'Kotlin Ders 17 içerik', 'deneme17.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(18, 'kotlin 18', 'kotlin-18', 'Kotlin Ders 18 içerik', 'deneme18.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:54', '2018-12-13 23:11:54'),
(19, 'kotlin 19', 'kotlin-19', 'Kotlin Ders 19 içerik', 'deneme19.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(20, 'kotlin 20', 'kotlin-20', 'Kotlin Ders 20 içerik', 'deneme20.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(21, 'kotlin 21', 'kotlin-21', 'Kotlin Ders 21 içerik', 'deneme21.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(22, 'kotlin 22', 'kotlin-22', 'Kotlin Ders 22 içerik', 'deneme22.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(23, 'kotlin 23', 'kotlin-23', 'Kotlin Ders 23 içerik', 'deneme23.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(24, 'kotlin 24', 'kotlin-24', 'Kotlin Ders 24 içerik', 'deneme24.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(25, 'kotlin 25', 'kotlin-25', 'Kotlin Ders 25 içerik', 'deneme25.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(26, 'kotlin 26', 'kotlin-26', 'Kotlin Ders 26 içerik', 'deneme26.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(27, 'kotlin 27', 'kotlin-27', 'Kotlin Ders 27 içerik', 'deneme27.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(28, 'kotlin 28', 'kotlin-28', 'Kotlin Ders 28 içerik', 'deneme28.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(29, 'kotlin 29', 'kotlin-29', 'Kotlin Ders 29 içerik', 'deneme29.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(30, 'kotlin 30', 'kotlin-30', 'Kotlin Ders 30 içerik', 'deneme30.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(31, 'kotlin 31', 'kotlin-31', 'Kotlin Ders 31 içerik', 'deneme31.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(32, 'kotlin 32', 'kotlin-32', 'Kotlin Ders 32 içerik', 'deneme32.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(33, 'kotlin 33', 'kotlin-33', 'Kotlin Ders 33 içerik', 'deneme33.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(34, 'kotlin 34', 'kotlin-34', 'Kotlin Ders 34 içerik', 'deneme34.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(35, 'kotlin 35', 'kotlin-35', 'Kotlin Ders 35 içerik', 'deneme35.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(36, 'kotlin 36', 'kotlin-36', 'Kotlin Ders 36 içerik', 'deneme36.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(37, 'kotlin 37', 'kotlin-37', 'Kotlin Ders 37 içerik', 'deneme37.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(38, 'kotlin 38', 'kotlin-38', 'Kotlin Ders 38 içerik', 'deneme38.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(39, 'kotlin 39', 'kotlin-39', 'Kotlin Ders 39 içerik', 'deneme39.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(40, 'kotlin 40', 'kotlin-40', 'Kotlin Ders 40 içerik', 'deneme40.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(41, 'kotlin 41', 'kotlin-41', 'Kotlin Ders 41 içerik', 'deneme41.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:55', '2018-12-13 23:11:55'),
(42, 'kotlin 42', 'kotlin-42', 'Kotlin Ders 42 içerik', 'deneme42.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(43, 'kotlin 43', 'kotlin-43', 'Kotlin Ders 43 içerik', 'deneme43.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(44, 'kotlin 44', 'kotlin-44', 'Kotlin Ders 44 içerik', 'deneme44.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(45, 'kotlin 45', 'kotlin-45', 'Kotlin Ders 45 içerik', 'deneme45.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(46, 'kotlin 46', 'kotlin-46', 'Kotlin Ders 46 içerik', 'deneme46.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(47, 'kotlin 47', 'kotlin-47', 'Kotlin Ders 47 içerik', 'deneme47.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(48, 'kotlin 48', 'kotlin-48', 'Kotlin Ders 48 içerik', 'deneme48.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(49, 'kotlin 49', 'kotlin-49', 'Kotlin Ders 49 içerik', 'deneme49.png', 0, 1, 5, b'0', b'0', '2018-12-13 23:11:56', '2018-12-13 23:11:56'),
(50, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 1, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(51, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(52, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(53, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(54, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(55, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(56, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(57, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(58, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(59, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(60, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(61, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(62, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(63, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(64, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(65, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(66, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(67, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(68, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(69, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(70, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(71, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(72, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(73, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(74, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(75, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(76, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(77, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(78, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(79, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(80, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(81, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(82, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(83, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(84, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(85, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(86, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(87, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(88, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(89, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(90, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(91, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(92, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(93, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(94, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(95, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(96, 'Java 49', 'java-49', 'Java Ders 49 içerik', 'deneme49.png', 0, 1, 4, b'0', b'0', '2018-12-13 23:15:06', '2018-12-13 23:15:06'),
(97, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:17:33', '2018-12-13 23:17:33'),
(98, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(99, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(100, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(101, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(102, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(103, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(104, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(105, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(106, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(107, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(108, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(109, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(110, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(111, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(112, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(113, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(114, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(115, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(116, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(117, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(118, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(119, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(120, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(121, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(122, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(123, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(124, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(125, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(126, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(127, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(128, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(129, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(130, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(131, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(132, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(133, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(134, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(135, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(136, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(137, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(138, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(139, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(140, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(141, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(142, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(143, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(144, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(145, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(146, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(147, 'Cisco Routers 49', 'cisco-routers-49', 'Cisco Routers Ders 49 içerik', 'deneme49.png', 0, 1, 6, b'0', b'0', '2018-12-13 23:18:37', '2018-12-13 23:18:37'),
(148, 'Cisco Switching 0', 'cisco-switching-0', 'Cisco Switching Ders 0 içerik', 'deneme0.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:27', '2018-12-13 23:19:27'),
(149, 'Cisco Switching 1', 'cisco-switching-1', 'Cisco Switching Ders 1 içerik', 'deneme1.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(150, 'Cisco Switching 2', 'cisco-switching-2', 'Cisco Switching Ders 2 içerik', 'deneme2.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(151, 'Cisco Switching 3', 'cisco-switching-3', 'Cisco Switching Ders 3 içerik', 'deneme3.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(152, 'Cisco Switching 4', 'cisco-switching-4', 'Cisco Switching Ders 4 içerik', 'deneme4.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(153, 'Cisco Switching 5', 'cisco-switching-5', 'Cisco Switching Ders 5 içerik', 'deneme5.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(154, 'Cisco Switching 6', 'cisco-switching-6', 'Cisco Switching Ders 6 içerik', 'deneme6.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(155, 'Cisco Switching 7', 'cisco-switching-7', 'Cisco Switching Ders 7 içerik', 'deneme7.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(156, 'Cisco Switching 8', 'cisco-switching-8', 'Cisco Switching Ders 8 içerik', 'deneme8.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(157, 'Cisco Switching 9', 'cisco-switching-9', 'Cisco Switching Ders 9 içerik', 'deneme9.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(158, 'Cisco Switching 10', 'cisco-switching-10', 'Cisco Switching Ders 10 içerik', 'deneme10.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(159, 'Cisco Switching 11', 'cisco-switching-11', 'Cisco Switching Ders 11 içerik', 'deneme11.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(160, 'Cisco Switching 12', 'cisco-switching-12', 'Cisco Switching Ders 12 içerik', 'deneme12.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(161, 'Cisco Switching 13', 'cisco-switching-13', 'Cisco Switching Ders 13 içerik', 'deneme13.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(162, 'Cisco Switching 14', 'cisco-switching-14', 'Cisco Switching Ders 14 içerik', 'deneme14.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(163, 'Cisco Switching 15', 'cisco-switching-15', 'Cisco Switching Ders 15 içerik', 'deneme15.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(164, 'Cisco Switching 16', 'cisco-switching-16', 'Cisco Switching Ders 16 içerik', 'deneme16.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(165, 'Cisco Switching 17', 'cisco-switching-17', 'Cisco Switching Ders 17 içerik', 'deneme17.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(166, 'Cisco Switching 18', 'cisco-switching-18', 'Cisco Switching Ders 18 içerik', 'deneme18.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(167, 'Cisco Switching 19', 'cisco-switching-19', 'Cisco Switching Ders 19 içerik', 'deneme19.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(168, 'Cisco Switching 20', 'cisco-switching-20', 'Cisco Switching Ders 20 içerik', 'deneme20.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(169, 'Cisco Switching 21', 'cisco-switching-21', 'Cisco Switching Ders 21 içerik', 'deneme21.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:28', '2018-12-13 23:19:28'),
(170, 'Cisco Switching 22', 'cisco-switching-22', 'Cisco Switching Ders 22 içerik', 'deneme22.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(171, 'Cisco Switching 23', 'cisco-switching-23', 'Cisco Switching Ders 23 içerik', 'deneme23.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(172, 'Cisco Switching 24', 'cisco-switching-24', 'Cisco Switching Ders 24 içerik', 'deneme24.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(173, 'Cisco Switching 25', 'cisco-switching-25', 'Cisco Switching Ders 25 içerik', 'deneme25.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(174, 'Cisco Switching 26', 'cisco-switching-26', 'Cisco Switching Ders 26 içerik', 'deneme26.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(175, 'Cisco Switching 27', 'cisco-switching-27', 'Cisco Switching Ders 27 içerik', 'deneme27.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(176, 'Cisco Switching 28', 'cisco-switching-28', 'Cisco Switching Ders 28 içerik', 'deneme28.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(177, 'Cisco Switching 29', 'cisco-switching-29', 'Cisco Switching Ders 29 içerik', 'deneme29.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(178, 'Cisco Switching 30', 'cisco-switching-30', 'Cisco Switching Ders 30 içerik', 'deneme30.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(179, 'Cisco Switching 31', 'cisco-switching-31', 'Cisco Switching Ders 31 içerik', 'deneme31.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(180, 'Cisco Switching 32', 'cisco-switching-32', 'Cisco Switching Ders 32 içerik', 'deneme32.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(181, 'Cisco Switching 33', 'cisco-switching-33', 'Cisco Switching Ders 33 içerik', 'deneme33.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(182, 'Cisco Switching 34', 'cisco-switching-34', 'Cisco Switching Ders 34 içerik', 'deneme34.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(183, 'Cisco Switching 35', 'cisco-switching-35', 'Cisco Switching Ders 35 içerik', 'deneme35.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(184, 'Cisco Switching 36', 'cisco-switching-36', 'Cisco Switching Ders 36 içerik', 'deneme36.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(185, 'Cisco Switching 37', 'cisco-switching-37', 'Cisco Switching Ders 37 içerik', 'deneme37.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(186, 'Cisco Switching 38', 'cisco-switching-38', 'Cisco Switching Ders 38 içerik', 'deneme38.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(187, 'Cisco Switching 39', 'cisco-switching-39', 'Cisco Switching Ders 39 içerik', 'deneme39.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(188, 'Cisco Switching 40', 'cisco-switching-40', 'Cisco Switching Ders 40 içerik', 'deneme40.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(189, 'Cisco Switching 41', 'cisco-switching-41', 'Cisco Switching Ders 41 içerik', 'deneme41.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(190, 'Cisco Switching 42', 'cisco-switching-42', 'Cisco Switching Ders 42 içerik', 'deneme42.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(191, 'Cisco Switching 43', 'cisco-switching-43', 'Cisco Switching Ders 43 içerik', 'deneme43.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(192, 'Cisco Switching 44', 'cisco-switching-44', 'Cisco Switching Ders 44 içerik', 'deneme44.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(193, 'Cisco Switching 45', 'cisco-switching-45', 'Cisco Switching Ders 45 içerik', 'deneme45.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(194, 'Cisco Switching 46', 'cisco-switching-46', 'Cisco Switching Ders 46 içerik', 'deneme46.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(195, 'Cisco Switching 47', 'cisco-switching-47', 'Cisco Switching Ders 47 içerik', 'deneme47.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(196, 'Cisco Switching 48', 'cisco-switching-48', 'Cisco Switching Ders 48 içerik', 'deneme48.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(197, 'Cisco Switching 49', 'cisco-switching-49', 'Cisco Switching Ders 49 içerik', 'deneme49.png', 0, 1, 7, b'0', b'0', '2018-12-13 23:19:29', '2018-12-13 23:19:29'),
(198, 'Java İçin Yeni Makale', 'java-icin-yeni-makale', 'Java İ&ccedil;in Yeni Makale İ&ccedil;erik', '5c12e6c84d9dc163813.png', 2, 1, 4, b'0', b'0', '2018-12-14 00:10:00', '2018-12-14 00:10:00'),
(199, '1Cisco Switch Son', '1cisco-switch-son', '1Cisco Switch Son i&ccedil;erik', '5c13a202749c1download.jpg', 0, 1, 6, b'0', b'0', '2018-12-14 13:15:53', '2018-12-14 13:29:11'),
(200, 'HashMap', 'hashmap', 'HashMap i&ccedil;erik', '5c13a29ae87daimages.png', 1, 1, 5, b'0', b'0', '2018-12-14 13:31:09', '2018-12-14 13:31:22'),
(201, 'Cisco Switcesss', 'cisco-switcesss', 'Cisco Switcesss i&ccedil;erik', '5c13a2de60b8bdefaultwoman.png', 0, 1, 5, b'0', b'0', '2018-12-14 13:32:30', '2018-12-14 13:32:30'),
(202, 'asdasd', 'asdasd', 'fdgdfgdfg', '5c13a3577236bdefaultwoman.png', 0, 1, 7, b'0', b'0', '2018-12-14 13:34:15', '2018-12-14 13:34:31'),
(203, 'Kotlin ile son etiket deneme', 'kotlin-ile-son-etiket-deneme', 'Kotlin ile son etiket deneme i&ccedil;erik', '5c13b0be5d3c430523722-0101ba56-9bef-11e7-929c-8843369c5d44.png', 0, 1, 5, b'0', b'0', '2018-12-14 14:31:42', '2018-12-14 14:31:42'),
(204, 'Kotlin ile son etiket deneme', 'kotlin-ile-son-etiket-deneme', 'Kotlin ile son etiket deneme i&ccedil;erik', '5c13b137b1d5e30523722-0101ba56-9bef-11e7-929c-8843369c5d44.png', 0, 1, 5, b'0', b'0', '2018-12-14 14:33:43', '2018-12-14 14:33:43'),
(205, 'Cisco Etiket Deneme', 'cisco-etiket-deneme', 'Cisco Etiket Deneme i&ccedil;erik', '5c13b19608ce5logo.png', 0, 1, 6, b'0', b'0', '2018-12-14 14:35:18', '2018-12-14 14:35:18'),
(206, 'Javacılar Kahve içer mi?', 'javacilar-kahve-icer-mi', 'Tabiki de i&ccedil;erler hem de hayvan gibi i&ccedil;erler.', '5c1400277c35bchatbubble_logo.jpg', 12, 1, 4, b'0', b'0', '2018-12-14 19:37:10', '2018-12-14 20:10:31'),
(207, 'İlk yazım', 'ilk-yazim', 'İlk yazım i&ccedil;erik', 'default_thumb.png', 1, 1, 8, b'0', b'0', '2018-12-15 01:20:03', '2018-12-15 01:20:03'),
(208, 'Static Routing 1', 'static-routing-1', 'ip rout dest-ip-add dest-submask vsvs.', '5c14f5956faedlogo_launcher.jpeg', 1, 1, 6, b'0', b'0', '2018-12-15 13:37:41', '2018-12-15 13:38:36'),
(209, 'Java İle Hello World', 'java-ile-hello-world', 'Selamlar Javada Tipler ile ilgili yazımla karşınızdayım.\r\n<pre>\r\n<code>public class PrimitiveParameters\r\n{	\r\n	public static void main(String[] args)\r\n	{	go();\r\n	}\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	public static void moreParameters(int a, int b)\r\n	{	System.out.println(\"in method moreParameters. a: \" + a + \" b: \" + b);\r\n		a = a * b;\r\n		b = 12;\r\n		System.out.println(\"in method moreParameters. a: \" + a + \" b: \" + b);\r\n		falseSwap(b,a);\r\n		System.out.println(\"in method moreParameters. a: \" + a + \" b: \" + b);	\r\n	}\r\n}</code></pre>\r\nYazımı burada noktalarken kendinize iyi bakmanız dileğimle', '5c1508d20d1181_7kqu2b7ksmpj45g4x1_dka.jpeg', 1, 1, 4, b'0', b'1', '2018-12-15 14:59:46', '2018-12-15 15:08:30'),
(210, 'Java Deneme makalesi', 'java-deneme-makalesi', 'Deneme\r\n <!--?php $this--->load-&gt;view(&quot;category_tags_v/content&quot;) ?&gt;\r\n <!--?php $this--->load-&gt;view(&quot;category_tags_v/content&quot;) ?&gt;\r\n <!--?php $this--->load-&gt;view(&quot;category_tags_v/content&quot;) ?&gt;\r\n <!--?php $this--->load-&gt;view(&quot;category_tags_v/content&quot;) ?&gt;\r\n <!--?php $this--->load-&gt;view(&quot;category_tags_v/content&quot;) ?&gt;\r\n <!--?php $this--->load-&gt;view(&quot;category_tags_v/content&quot;) ?&gt;\r\nsağlıcakla kalın', '5c150b698b7bd1_7kqu2b7ksmpj45g4x1_dka.jpeg', 2, 1, 4, b'0', b'0', '2018-12-15 15:10:49', '2018-12-15 15:12:23'),
(211, 'Kotlin ArrayList', 'kotlin-arraylist', 'Selamlar Yazılarıma kotlin ile devam ediyorum\r\n<pre>\r\n<code> println(\"Dizi boyutunu giriniz :\")\r\n    var arraySize= readLine()!!.toInt()\r\n    println()\r\n    var myArray=Array&lt;Int&gt;(arraySize){0}\r\n\r\n\r\n    for (indis in 0..myArray.size-1)\r\n    {\r\n        print(\"${indis+1}. sayiyi giriniz :\")\r\n        myArray[indis]= readLine()!!.toInt()\r\n        println()\r\n    }\r\n\r\n\r\n print(\"Dizinin boyutunu giriniz :\")\r\n    var boyut = readLine()!!.toInt()\r\n\r\n    var dizi = Array&lt;Int&gt;(boyut) { 0 }\r\n\r\n    for (i in 0..dizi.size - 1)\r\n    {\r\n        print(\"${i+1}. eleman :\")\r\n        dizi[i]= readLine()!!.toInt()\r\n        println()\r\n        dizi[i]=faktorialCalc(dizi[i])\r\n    }</code></pre>\r\nSağlıcakla kalın', '5c150f351f32030523722-0101ba56-9bef-11e7-929c-8843369c5d44.png', 0, 1, 5, b'0', b'0', '2018-12-15 15:27:01', '2018-12-15 15:27:01'),
(212, 'java deneme', 'java-deneme', '<pre>\r\nprint(&quot;Dizinin boyutunu giriniz :&quot;)\r\n    var boyut = readLine()!!.toInt()\r\n\r\n    var dizi = Array&lt;Int&gt;(boyut) { 0 }\r\n\r\n    for (i in 0..dizi.size - 1)\r\n    {\r\n        print(&quot;${i+1}. eleman :&quot;)\r\n        dizi[i]= readLine()!!.toInt()\r\n        println()\r\n        dizi[i]=faktorialCalc(dizi[i])\r\n    }</pre>', 'default_thumb.png', 2, 1, 4, b'0', b'0', '2018-12-15 16:10:13', '2018-12-15 16:10:13'),
(213, 'Kotline Giriş', 'kotline-giris', '<pre>\r\nprint(&quot;Dizinin boyutunu giriniz :&quot;)\r\n    var boyut = readLine()!!.toInt()\r\n\r\n    var dizi = Array&lt;Int&gt;(boyut) { 0 }\r\n\r\n    for (i in 0..dizi.size - 1)\r\n    {\r\n        print(&quot;${i+1}. eleman :&quot;)\r\n        dizi[i]= readLine()!!.toInt()\r\n        println()\r\n        dizi[i]=faktorialCalc(dizi[i])\r\n    }\r\n\r\nprint(&quot;Dizinin boyutunu giriniz :&quot;)\r\n    var boyut = readLine()!!.toInt()\r\n\r\n    var dizi = Array&lt;Int&gt;(boyut) { 0 }\r\n\r\n    for (i in 0..dizi.size - 1)\r\n    {\r\n        print(&quot;${i+1}. eleman :&quot;)\r\n        dizi[i]= readLine()!!.toInt()\r\n        println()\r\n        dizi[i]=faktorialCalc(dizi[i])\r\n    }</pre>', 'default_thumb.png', 0, 1, 4, b'0', b'0', '2018-12-15 17:47:50', '2018-12-15 17:47:50'),
(214, 'java ile 24 saat', 'java-ile-24-saat', '<pre>\r\npackage com.company;\r\n\r\nimport java.util.ArrayList;\r\nimport java.util.Arrays;\r\n\r\npublic class Main {\r\n\r\n    public static void main(String[] args) {\r\n\r\n        int[] dizi={1,6,3,8,9,2};\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println(&quot;Dizinin boyutu :&quot;+dizi.length);\r\n        Arrays.sort(dizi);\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println();\r\n        /*ArrayList&lt;Integer&gt; myList=new ArrayList&lt;Integer&gt;();\r\n\r\n        int randomArraySize= (int) Math.round(Math.random()*50);\r\n\r\n\r\n        for (int i=0;i&lt;randomArraySize;i++){\r\n            myList.add((int)Math.round(Math.random()*30));\r\n        }\r\n\r\n\r\n        System.out.println(&quot;Rastgele Dizinin Boyutu :&quot;+myList.size());\r\n\r\n        System.out.println(&quot;Dizinin elemanları&quot;);\r\n        for (int i:myList){\r\n            System.out.println(i);\r\n        }\r\n\r\n        myList.add(17); //Listeye 17 elemanı eklendi\r\n\r\n        for (int i:myList){\r\n            System.out.println(i);\r\n        }\r\n\r\n        myList.remove(myList.size()-1); //Son eleman silindi\r\n\r\n        System.out.println(myList.indexOf(22)); // Dizide 22 varsa indexini d&ouml;nderecek yoksa -1 d&ouml;nderecek metod\r\n        System.out.println(&quot;Dizinin son hali ........&quot;);\r\n        for (int i:myList)\r\n            System.out.println(i);*/\r\n\r\n    }\r\n}\r\n</pre>', 'default_thumb.png', 1, 1, 4, b'0', b'0', '2018-12-15 18:13:42', '2018-12-15 18:13:42'),
(215, 'asdasdfgdfg', 'asdasdfgdfg', '<pre>\r\npackage com.company;\r\n\r\nimport java.util.ArrayList;\r\nimport java.util.Arrays;\r\n\r\npublic class Main {\r\n\r\n    public static void main(String[] args) {\r\n\r\n        int[] dizi={1,6,3,8,9,2};\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println(&quot;Dizinin boyutu :&quot;+dizi.length);\r\n        Arrays.sort(dizi);\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println();\r\n        /*ArrayList&lt;Integer&gt; myList=new ArrayList&lt;Integer&gt;();\r\n\r\n        int randomArraySize= (int) Math.round(Math.random()*50);\r\n\r\n\r\n        for (int i=0;i&lt;randomArraySize;i++){\r\n            myList.add((int)Math.round(Math.random()*30));\r\n        }\r\n\r\n\r\n        System.out.println(&quot;Rastgele Dizinin Boyutu :&quot;+myList.size());\r\n\r\n        System.out.println(&quot;Dizinin elemanları&quot;);\r\n        for (int i:myList){\r\n            System.out.println(i);\r\n        }\r\n\r\n        myList.add(17); //Listeye 17 elemanı eklendi\r\n\r\n        for (int i:myList){\r\n            System.out.println(i);\r\n        }\r\n\r\n        myList.remove(myList.size()-1); //Son eleman silindi\r\n\r\n        System.out.println(myList.indexOf(22)); // Dizide 22 varsa indexini d&ouml;nderecek yoksa -1 d&ouml;nderecek metod\r\n        System.out.println(&quot;Dizinin son hali ........&quot;);\r\n        for (int i:myList)\r\n            System.out.println(i);*/\r\n\r\n    }\r\n}\r\n</pre>', 'default_thumb.png', 1, 1, 4, b'0', b'0', '2018-12-15 18:35:12', '2018-12-15 18:35:12'),
(216, 'saaaaaaaaaaaa', 'saaaaaaaaaaaa', '<pre class=\"brush:java;\">\r\n<code/>\r\n\r\npackage com.company;\r\n\r\nimport java.util.ArrayList;\r\nimport java.util.Arrays;\r\n\r\npublic class Main {\r\n\r\n    public static void main(String[] args) {\r\n\r\n        int[] dizi={1,6,3,8,9,2};\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println(&amp;quot;Dizinin boyutu :&amp;quot;+dizi.length);\r\n        Arrays.sort(dizi);\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println();\r\n        /*ArrayList myList=new ArrayList();\r\n\r\n        int randomArraySize= (int) Math.round(Math.random()*50);\r\n\r\n\r\n        for (int i=0;i<code/></pre>', 'default_thumb.png', 3, 1, 4, b'0', b'0', '2018-12-15 18:42:29', '2018-12-15 18:42:29'),
(217, 'Deneme Java', 'deneme-java', '<pre class=\"brush:java;\">\r\npackage com.company;\r\n\r\nimport java.util.ArrayList;\r\nimport java.util.Arrays;\r\n\r\npublic class Main {\r\n\r\n    public static void main(String[] args) {\r\n\r\n        int[] dizi={1,6,3,8,9,2};\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println(&quot;Dizinin boyutu :&quot;+dizi.length);\r\n        Arrays.sort(dizi);\r\n        for (int i:dizi){\r\n            System.out.println(i);\r\n        }\r\n        System.out.println();\r\n        ArrayList myList=new ArrayList();\r\n\r\n        int randomArraySize= (int) Math.round(Math.random()*50);\r\n\r\n\r\n        for (int i=0;i</pre>', '5c1546e47442330523722-0101ba56-9bef-11e7-929c-8843369c5d44.png', 4, 1, 4, b'0', b'0', '2018-12-15 19:24:36', '2018-12-15 19:27:15'),
(218, 'Sql Öğreniyorum', 'sql-ogreniyorum', 'Herkese selamlar Bu g&uuml;nki yazıma &ccedil;eşitli sql komutları ile başlamak istiyorum.\r\n<pre class=\"brush:sql;\">\r\n--SELECT column_name(s)\r\n--FROM table_name\r\n--WHERE column_1 = value_1\r\n  AND column_2 = value_2;\r\n\r\n--SELECT column_name,\r\n  CASE\r\n    WHEN condition THEN &amp;#39;Result_1&amp;#39;\r\n    WHEN condition THEN &amp;#39;Result_2&amp;#39;\r\n    ELSE &amp;#39;Result_3&amp;#39;\r\n  END\r\n--FROM table_name;\r\n\r\n\r\n--selam nasılsın</pre>\r\n<br />\r\n<br />\r\n<br />\r\nSsğlıcaklar kalın hayırlı g&uuml;nler dilerim', 'default_thumb.png', 11, 1, 4, b'0', b'0', '2018-12-15 19:43:52', '2018-12-16 11:07:23'),
(219, 'sadasdasd', 'sadasdasd', 'asdasd sdfdf', 'default_thumb.png', 4, 1, 4, b'0', b'0', '2018-12-16 12:38:26', '2018-12-16 12:38:26'),
(220, 'asdasdfgdfgdg', 'asdasdfgdfgdg', 'fgdfgdfg', 'default_thumb.png', 13, 1, 4, b'0', b'0', '2018-12-16 12:48:59', '2018-12-16 12:48:59'),
(221, 'Javaa Coding', 'javaa-coding', 'Deneme&nbsp;', '5c167cc4bc4641_7kqu2b7ksmpj45g4x1_dka.jpeg', 57, 1, 4, b'0', b'0', '2018-12-16 17:26:44', '2018-12-16 17:26:44'),
(222, 'Deneme alert', 'deneme-alert', 'Deneme alert i&ccedil;erik<br />\r\n<br />\r\n&nbsp;\r\n<pre class=\"brush:java;\">\r\npackage com.company;\r\n\r\npublic class Main {\r\n\r\n    public static void main(String[] args) {\r\n\r\n\r\n        /*ExtrasOfHamburger[] extrasOfHamburgers=new ExtrasOfHamburger[4];\r\n        extrasOfHamburgers[0]=new ExtrasOfHamburger(&quot;Ket&ccedil;ap&quot;,2.5);\r\n        extrasOfHamburgers[1]=new ExtrasOfHamburger(&quot;Mayonez&quot;,3.5);\r\n        extrasOfHamburgers[2]=new ExtrasOfHamburger(&quot;Barbek&uuml; Sos&quot;,6.5);\r\n        extrasOfHamburgers[3]=new ExtrasOfHamburger(&quot;Bufalo Sos&quot;,4.5);\r\n\r\n        PureHamburger pureHamburger=new PureHamburger(extrasOfHamburgers,&quot;Kepekli&quot;,&quot;Kırmızı Et&quot;);\r\n\r\n        System.out.println(pureHamburger.finalOrderInfo());\r\n\r\n        System.out.println(&quot;******************************************************************\\n\\n&quot;);\r\n\r\n        ExtrasOfHamburger[] extrasOfHamburgers2=new ExtrasOfHamburger[6];\r\n        extrasOfHamburgers2[0]=new ExtrasOfHamburger(&quot;Ket&ccedil;ap&quot;,2.5);\r\n        extrasOfHamburgers2[1]=new ExtrasOfHamburger(&quot;Mayonez&quot;,3.5);\r\n        extrasOfHamburgers2[2]=new ExtrasOfHamburger(&quot;Barbek&uuml; Sos&quot;,6.5);\r\n        extrasOfHamburgers2[3]=new ExtrasOfHamburger(&quot;Bufalo Sos&quot;,4.5);\r\n        extrasOfHamburgers2[4]=new ExtrasOfHamburger(&quot;Sarımsak Sos&quot;,3.5);\r\n        extrasOfHamburgers2[5]=new ExtrasOfHamburger(&quot;Soğan Sos&quot;,1.5);\r\n\r\n        HealthyHamburger healthyHamburger=new HealthyHamburger(extrasOfHamburgers2);\r\n\r\n        System.out.println(healthyHamburger.finalOrderInfo());*/\r\n\r\n        FatherHamburger fatherHamburger=new FatherHamburger(&quot;Kola&quot;);\r\n\r\n        System.out.println(fatherHamburger.finalOrderInfo());\r\n\r\n\r\n    }\r\n}\r\n</pre>\r\nBir sonraki yazıda g&ouml;r&uuml;şmek dileğiyle sağlıcakla kalın...', 'default_thumb.png', 9, 1, 6, b'0', b'0', '2018-12-19 07:02:52', '2018-12-19 07:02:52'),
(223, 'sdfsdf', 'sdfsdf', 'asdasdasdfdg dfgdfgdfg', 'default_thumb.png', 15, 1, 4, b'0', b'0', '2018-12-19 07:05:03', '2018-12-19 07:05:03');
INSERT INTO `article` (`Id`, `title`, `article_seo`, `content`, `image_url`, `view_count`, `author_id`, `category_id`, `isDraft`, `isDeleted`, `createdAt`, `modifiedAt`) VALUES
(224, 'Java ile ilgili yazım', 'java-ile-ilgili-yazim', 'Yinelenen bir sayfa i&ccedil;eriğinin okuyucunun dikkatini dağıttığı bilinen bir ger&ccedil;ektir. Lorem Ipsum kullanmanın amacı, s&uuml;rekli &#39;buraya metin gelecek, buraya metin gelecek&#39; yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda bir&ccedil;ok masa&uuml;st&uuml; yayıncılık paketi ve web sayfa d&uuml;zenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında &#39;lorem ipsum&#39; anahtar s&ouml;zc&uuml;kleri ile arama yapıldığında hen&uuml;z tasarım aşamasında olan &ccedil;ok sayıda site listelenir. Yıllar i&ccedil;inde, bazen kazara, bazen bilin&ccedil;li olarak (&ouml;rneğin mizah katılarak), &ccedil;eşitli s&uuml;r&uuml;mleri geliştirilmiştir.&nbsp;Yinelenen bir sayfa i&ccedil;eriğinin okuyucunun dikkatini dağıttığı bilinen bir ger&ccedil;ektir. Lorem Ipsum kullanmanın amacı, s&uuml;rekli &#39;buraya metin gelecek, buraya metin gelecek&#39; yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda bir&ccedil;ok masa&uuml;st&uuml; yayıncılık paketi ve web sayfa d&uuml;zenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında &#39;lorem ipsum&#39; anahtar s&ouml;zc&uuml;kleri ile arama yapıldığında hen&uuml;z tasarım aşamasında olan &ccedil;ok sayıda site listelenir. Yıllar i&ccedil;inde, bazen kazara, bazen bilin&ccedil;li olarak (&ouml;rneğin mizah katılarak), &ccedil;eşitli s&uuml;r&uuml;mleri geliştirilmiştir.&nbsp;Yinelenen bir sayfa i&ccedil;eriğinin okuyucunun dikkatini dağıttığı bilinen bir ger&ccedil;ektir. Lorem Ipsum kullanmanın amacı, s&uuml;rekli &#39;buraya metin gelecek, buraya metin gelecek&#39; yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda bir&ccedil;ok masa&uuml;st&uuml; yayıncılık paketi ve web sayfa d&uuml;zenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında &#39;lorem ipsum&#39; anahtar s&ouml;zc&uuml;kleri ile arama yapıldığında hen&uuml;z tasarım aşamasında olan &ccedil;ok sayıda site listelenir. Yıllar i&ccedil;inde, bazen kazara, bazen bilin&ccedil;li olarak (&ouml;rneğin mizah katılarak), &ccedil;eşitli s&uuml;r&uuml;mleri geliştirilmiştir.\r\n<pre class=\"brush:java;\">\r\npackage com.company;\r\n\r\n\r\nimport com.sun.deploy.perf.PerfRollup;\r\n\r\nimport java.util.Scanner;\r\n\r\npublic class Menu {\r\n\r\n    public void menuListele() {\r\n\r\n        System.out.println(&quot;Kayıt Listelemek i&ccedil;in         ---&gt; 1&quot;);\r\n        System.out.println(&quot;Kayıt Eklemek i&ccedil;in            ---&gt; 2&quot;);\r\n        System.out.println(&quot;Kayıt G&uuml;ncellemek i&ccedil;in        ---&gt; 3&quot;);\r\n        System.out.println(&quot;Kayıt Silmek İ&ccedil;in             ---&gt; 4&quot;);\r\n        System.out.println(&quot;&Ccedil;ıkış Yapmak i&ccedil;in             ---&gt; 5&quot;);\r\n        System.out.println(&quot;Men&uuml;y&uuml; Tekrar Listelemek İ&ccedil;in ---&gt; 6&quot;);\r\n        System.out.print(&quot;Se&ccedil;imininiz                    ---&gt; &quot;);\r\n        Scanner scanner=new Scanner(System.in);\r\n        int secim=scanner.nextInt();\r\n        doProcess(secim);\r\n    }\r\n\r\n    private void doProcess(int secim) {\r\n        Rehber rehber = new Rehber();\r\n        Person p = new Person();\r\n        Person person=new Person();\r\n        switch (secim) {\r\n            case 1:\r\n                rehber.listPerson();\r\n                break;\r\n            case 2:\r\n                person = p.createPerson();\r\n                int res=rehber.addPerson(person);\r\n                if (res==1){\r\n                    System.out.println(person.getName()+&quot; Başarıyla Eklendi&quot;);\r\n                }else if (res==0){\r\n                    System.out.println(&quot;Kayıt Eklenirken Bir Hata Oluştu&quot;);\r\n                }else{\r\n                    System.out.println(&quot;Eklenen Kişiyle Aynı İsimde Bir Kayıt Var L&uuml;tfen İsmi değiştiriniz...&quot;);\r\n                }\r\n                break;\r\n            case 3:\r\n                String currName=p.findPersonByName();\r\n                person = p.createPerson();\r\n                if (rehber.updatePerson(currName,person)){\r\n                    System.out.println(&quot;G&uuml;ncelleme Başarıyla Yapıldı.&quot;);\r\n                }else{\r\n                    System.out.println(&quot;G&uuml;ncelleme Yapılırken Bir Hata Oluştu&quot;);\r\n                }\r\n                break;\r\n            case 4:\r\n                int result=rehber.removePerson(p.findPersonByName());\r\n                if (result==1){\r\n                    System.out.println(&quot;Kişi Başarıyla Silindi.&quot;);\r\n                }else if (result==0){\r\n                    System.out.println(&quot;Kişi Silinirken Hata.&quot;);\r\n                }else{\r\n                    System.out.println(&quot;Kişi Bulunamadı&quot;);\r\n                }\r\n                break;\r\n            case 5:\r\n                System.out.println(&quot;&Ccedil;ıkış Yaptınız ...&quot;);\r\n                break;\r\n            case 6:\r\n                menuListele();\r\n                break;\r\n            default:\r\n                System.out.println(&quot;Menude Olmayan Bir Se&ccedil;enek Se&ccedil;tiniz&quot;);\r\n                break;\r\n        }\r\n        System.out.println(&quot;********************************&quot;);\r\n        System.out.println(&quot;********************************&quot;);\r\n\r\n        while (secim!=5){\r\n            menuListele();\r\n        }\r\n\r\n    }\r\n}\r\n</pre>\r\n<br />\r\nYinelenen bir sayfa i&ccedil;eriğinin okuyucunun dikkatini dağıttığı bilinen bir ger&ccedil;ektir. Lorem Ipsum kullanmanın amacı, s&uuml;rekli &#39;buraya metin gelecek, buraya metin gelecek&#39; yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda bir&ccedil;ok masa&uuml;st&uuml; yayıncılık paketi ve web sayfa d&uuml;zenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında &#39;lorem ipsum&#39; anahtar s&ouml;zc&uuml;kleri ile arama yapıldığında hen&uuml;z tasarım aşamasında olan &ccedil;ok sayıda site listelenir. Yıllar i&ccedil;inde, bazen kazara, bazen bilin&ccedil;li olarak (&ouml;rneğin mizah katılarak), &ccedil;eşitli s&uuml;r&uuml;mleri geliştirilmiştir.Yinelenen bir sayfa i&ccedil;eriğinin okuyucunun dikkatini dağıttığı bilinen bir ger&ccedil;ektir. Lorem Ipsum kullanmanın amacı, s&uuml;rekli &#39;buraya metin gelecek, buraya metin gelecek&#39; yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda bir&ccedil;ok masa&uuml;st&uuml; yayıncılık paketi ve web sayfa d&uuml;zenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında &#39;lorem ipsum&#39; anahtar s&ouml;zc&uuml;kleri ile arama yapıldığında hen&uuml;z tasarım aşamasında olan &ccedil;ok sayıda site listelenir. Yıllar i&ccedil;inde, bazen kazara, bazen bilin&ccedil;li olarak (&ouml;rneğin mizah katılarak), &ccedil;eşitli s&uuml;r&uuml;mleri geliştirilmiştir.', '7DBF8DBC-D6FB-8D4C-2509-56AA7DDCB100data_warehouse_architecture.jpg', 21, 1, 4, b'0', b'0', '2018-12-22 15:02:17', '2018-12-22 15:02:17'),
(225, 'cvbcvb', 'cvbcvb', '<pre class=\"brush:java;\">\r\npackage com.company;\r\n\r\n\r\nimport com.sun.deploy.perf.PerfRollup;\r\n\r\nimport java.util.Scanner;\r\n\r\npublic class Menu {\r\n\r\n    public void menuListele() {\r\n\r\n        System.out.println(&quot;Kayıt Listelemek i&ccedil;in         ---&gt; 1&quot;);\r\n        System.out.println(&quot;Kayıt Eklemek i&ccedil;in            ---&gt; 2&quot;);\r\n        System.out.println(&quot;Kayıt G&uuml;ncellemek i&ccedil;in        ---&gt; 3&quot;);\r\n        System.out.println(&quot;Kayıt Silmek İ&ccedil;in             ---&gt; 4&quot;);\r\n        System.out.println(&quot;&Ccedil;ıkış Yapmak i&ccedil;in             ---&gt; 5&quot;);\r\n        System.out.println(&quot;Men&uuml;y&uuml; Tekrar Listelemek İ&ccedil;in ---&gt; 6&quot;);\r\n        System.out.print(&quot;Se&ccedil;imininiz                    ---&gt; &quot;);\r\n        Scanner scanner=new Scanner(System.in);\r\n        int secim=scanner.nextInt();\r\n        doProcess(secim);\r\n    }\r\n\r\n    private void doProcess(int secim) {\r\n        Rehber rehber = new Rehber();\r\n        Person p = new Person();\r\n        Person person=new Person();\r\n        switch (secim) {\r\n            case 1:\r\n                rehber.listPerson();\r\n                break;\r\n            case 2:\r\n                person = p.createPerson();\r\n                int res=rehber.addPerson(person);\r\n                if (res==1){\r\n                    System.out.println(person.getName()+&quot; Başarıyla Eklendi&quot;);\r\n                }else if (res==0){\r\n                    System.out.println(&quot;Kayıt Eklenirken Bir Hata Oluştu&quot;);\r\n                }else{\r\n                    System.out.println(&quot;Eklenen Kişiyle Aynı İsimde Bir Kayıt Var L&uuml;tfen İsmi değiştiriniz...&quot;);\r\n                }\r\n                break;\r\n            case 3:\r\n                String currName=p.findPersonByName();\r\n                person = p.createPerson();\r\n                if (rehber.updatePerson(currName,person)){\r\n                    System.out.println(&quot;G&uuml;ncelleme Başarıyla Yapıldı.&quot;);\r\n                }else{\r\n                    System.out.println(&quot;G&uuml;ncelleme Yapılırken Bir Hata Oluştu&quot;);\r\n                }\r\n                break;\r\n            case 4:\r\n                int result=rehber.removePerson(p.findPersonByName());\r\n                if (result==1){\r\n                    System.out.println(&quot;Kişi Başarıyla Silindi.&quot;);\r\n                }else if (result==0){\r\n                    System.out.println(&quot;Kişi Silinirken Hata.&quot;);\r\n                }else{\r\n                    System.out.println(&quot;Kişi Bulunamadı&quot;);\r\n                }\r\n                break;\r\n            case 5:\r\n                System.out.println(&quot;&Ccedil;ıkış Yaptınız ...&quot;);\r\n                break;\r\n            case 6:\r\n                menuListele();\r\n                break;\r\n            default:\r\n                System.out.println(&quot;Menude Olmayan Bir Se&ccedil;enek Se&ccedil;tiniz&quot;);\r\n                break;\r\n        }\r\n        System.out.println(&quot;********************************&quot;);\r\n        System.out.println(&quot;********************************&quot;);\r\n\r\n        while (secim!=5){\r\n            menuListele();\r\n        }\r\n\r\n    }\r\n}\r\n</pre>\r\n<img alt=\"\" src=\"/CodeIgniterProjects/BlogSitesi/panel/assets/ckeditor/kcfinder/upload/images/aboutpage.PNG\" style=\"height:484px; width:900px\" />', 'default_thumb.png', 88, 1, 4, b'0', b'0', '2018-12-22 15:20:27', '2018-12-22 15:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `articlestags`
--

CREATE TABLE `articlestags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `articlestags`
--

INSERT INTO `articlestags` (`article_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(205, 3),
(205, 4),
(205, 5),
(206, 6),
(206, 7),
(206, 8),
(206, 9),
(206, 10),
(3, 12),
(208, 13),
(209, 14),
(210, 15),
(218, 16),
(221, 17),
(1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Id` int(11) NOT NULL,
  `fullName` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `userName` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `authorImage` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `about` text COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `guid` varchar(36) COLLATE utf8_turkish_ci NOT NULL,
  `role` bit(1) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDeleted` bit(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` datetime NOT NULL,
  `modifiedBy` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Id`, `fullName`, `userName`, `email`, `authorImage`, `about`, `password`, `guid`, `role`, `isActive`, `isDeleted`, `createdAt`, `modifiedAt`, `modifiedBy`) VALUES
(1, 'Hüseyin GÖZTOK', 'huseyin.goztok', 'huseyin.goztok@gmail.com', '5c12d07d103fbhuseyin.jpg', '4 Mayis 1995 yilinda Sanliurfada dogdum. Ilk&ouml;gretimimi Sanliurfada Cengiztopel I.&Ouml;.O. da, Orta okulu Ziyaettin Akbulut I.&Ouml;.O da, Liseyi Merkez Sanliurfa Anadolu Lisesinde ve &Uuml;niversiteyi Erciyes &Uuml;niversitesinde Bilgisayar m&uuml;hendisligi okuyarak tamamladim. Bu siteyi kurmamdaki genel ama&ccedil; ihtiya&ccedil; duydugum seylere baska meslektaslarimin ya da bu konuda &ccedil;alismalar yapan insanlarin ihtiya&ccedil; duyabilecegi d&uuml;s&uuml;ncesi ve ilerde bir g&uuml;n baktigimda kendi adima bir nevi hatira defteri mahiyetinde olacak olmasi. Umarim siteyi olusturma amacima ve hedeflerime ulasir ve yazilarim siz degerli okuyucularin begenisini kazanir.', '202cb962ac59075b964b07152d234b70', '5c18383acdd38', b'1', b'1', b'0', '2018-12-25 00:00:00', '2018-12-19 12:35:39', 'Hüseyin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `maincategory_id` int(11) DEFAULT NULL,
  `category_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `seo_url` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDeleted` bit(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` datetime NOT NULL,
  `modifiedBy` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `maincategory_id`, `category_name`, `seo_url`, `priority`, `isActive`, `isDeleted`, `createdAt`, `modifiedAt`, `modifiedBy`) VALUES
(1, NULL, 'Kategoriler', 'kategoriler', 1, b'1', b'0', '2018-12-19 09:42:29', '2018-12-19 09:42:29', 'Hüseyin GÖZTOK'),
(2, 1, 'Yazılım', 'yazilim', 1, b'1', b'0', '2018-12-19 10:13:11', '2018-12-19 10:13:11', 'Hüseyin GÖZTOK'),
(3, 1, 'Donanım', 'donanim', 2, b'1', b'0', '2018-12-25 00:00:00', '2018-12-18 00:00:00', 'Hüseyin'),
(4, 2, 'Java', 'java', 1, b'1', b'0', '2018-12-25 00:00:00', '2018-12-14 00:00:00', 'Hüseyin'),
(5, 2, 'Kotlin', 'kotlin', 2, b'1', b'0', '2018-12-25 00:00:00', '2018-12-18 00:00:00', 'Hüseyin'),
(6, 3, 'Cisco Routers', 'cisco-routers', 1, b'1', b'0', '2018-12-25 00:00:00', '2018-12-14 00:00:00', 'Hüseyin'),
(7, 3, 'Cisco Switches', 'cisco-switches', 3, b'1', b'1', '2018-12-14 23:17:24', '2018-12-14 23:17:24', 'Hüseyin GÖZTOK'),
(8, 2, 'Deneme Yazılım', 'deneme-yazilim', 7, b'1', b'1', '2018-12-14 23:20:20', '2018-12-14 23:20:20', 'Hüseyin GÖZTOK'),
(9, 1, 'Google', 'google', 8, b'1', b'0', '2018-12-19 09:52:33', '2018-12-19 09:52:33', 'Hüseyin GÖZTOK'),
(10, NULL, 'Web Tasarım', 'web-tasarim', 9, b'1', b'1', '2018-12-19 10:03:09', '2018-12-19 10:03:09', 'Hüseyin GÖZTOK'),
(11, 1, 'Deneme', 'deneme', 10, b'1', b'0', '2018-12-19 10:12:25', '2018-12-19 10:12:25', 'Hüseyin GÖZTOK');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `isDeleted` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Id`, `article_id`, `member_id`, `parent_comment_id`, `content`, `createdAt`, `isDeleted`) VALUES
(1, 225, 1, NULL, 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok s', '2018-12-02 00:00:00', b'0'),
(2, 225, 7, 1, 'asdasdasdasd', '2018-12-12 00:00:00', b'0'),
(3, 225, 6, 1, 'Yinelenen okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok s', '2018-12-15 00:00:00', b'0'),
(4, 225, 3, 1, 'okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak', '2018-12-23 00:00:00', b'0'),
(5, 225, 3, NULL, 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok s', '2018-12-18 00:00:00', b'0'),
(6, 225, 7, 5, 'sda asda dfgdf gdfxvcxv xcvxcv', '2018-12-24 00:00:00', b'0'),
(7, 224, 3, NULL, 'asd g fcsfdgsdf asdasd  dfgfg a sdasd asdzxczxc fdsfsdf', '2018-12-24 01:40:00', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `Id` int(11) NOT NULL,
  `host` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `protocol` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `port` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `_from` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `send_title` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` bit(1) NOT NULL,
  `isDeleted` bit(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` datetime NOT NULL,
  `modifiedBy` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`Id`, `host`, `protocol`, `port`, `_from`, `password`, `send_title`, `isActive`, `isDeleted`, `createdAt`, `modifiedAt`, `modifiedBy`) VALUES
(1, 'ssl://smtp.gmail.com', 'smtp', '465', 'sharebookwebapp@gmail.com', 'portakal56', 'Spagetti Blog Sitesi', b'1', b'0', '2018-12-18 00:00:00', '2018-12-14 13:39:01', 'Hüseyin'),
(2, 'Host', 'Protocol', 'Port', 'hasan.goztok@gmail.com', '123123', 'Mail Başlıkhhh', b'1', b'1', '0000-00-00 00:00:00', '2018-12-19 07:33:39', 'Hüseyin'),
(3, 'Host2', 'Protocol2', 'Port2', 'hasan.goztok2@gmail.com', '4297f44b13955235245b2497399d7a93', 'Mail Başlık2', b'1', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Hüseyin');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Id` int(11) NOT NULL,
  `user_name` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `img_url` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `guid` varchar(36) COLLATE utf8_turkish_ci NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `modifiedAt` datetime NOT NULL,
  `isBlocked` bit(1) NOT NULL DEFAULT b'0',
  `isActive` bit(1) NOT NULL DEFAULT b'0',
  `isDeleted` bit(1) NOT NULL DEFAULT b'0',
  `modifiedBy` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Id`, `user_name`, `password`, `email`, `name`, `surname`, `img_url`, `guid`, `ip_address`, `createdAt`, `modifiedAt`, `isBlocked`, `isActive`, `isDeleted`, `modifiedBy`) VALUES
(1, 'huseyinovic', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'o4660570@nwytg.net', '', '', '', 'AB53EB85-F794-C02E-ACE8-4DA436F21A93', '', '2018-12-19 23:08:10', '2018-12-19 23:08:10', b'0', b'1', b'0', 'huseyinovic'),
(2, 'ahmedovic', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'huseyin.goztok@outlok.com', '', '', '', 'B7910C17-DBEC-EA28-7607-ADEA0E7D0BB8', '', '2018-12-19 23:10:31', '2018-12-19 23:10:31', b'0', b'0', b'0', 'ahmedovic'),
(3, 'ahmedovic2', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'huseyin.goztok@gmail.com', '', '', '', '2EE233D5-F5DF-AB11-1AE2-F4F2B3A0AF31', '', '2018-12-19 23:12:50', '2018-12-19 23:12:50', b'0', b'1', b'0', 'ahmedovic2'),
(4, 'huseyinovic3', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'husyngztk@gmail.com', '', '', '', 'FF3E1B9A-094C-14F5-ADDB-CEEDC69CF83B', '', '2018-12-19 23:21:26', '2018-12-19 23:21:26', b'0', b'0', b'0', 'huseyinovic3'),
(5, 'huseyinovic5', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'o4662104@nwytg.net', '', '', '', 'F1139396-47E2-1171-14EC-E9CEF80E820E', '', '2018-12-19 23:36:04', '2018-12-19 23:36:04', b'0', b'1', b'0', 'huseyinovic5'),
(6, 'huseyinovic6', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'o4691510@nwytg.net', '', '', '', 'B6FBC5AE-B72A-EF1E-3DF6-D297E42CD1FA', '', '2018-12-20 06:25:25', '2018-12-20 06:25:25', b'0', b'1', b'0', 'huseyinovic6'),
(7, 'HuseYinoviC_6', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'o4697776@nwytg.net', '', '', '', 'ECAE1CE7-C51A-0197-FD6F-B6013A146B6D', '::1', '2018-12-20 07:05:41', '2018-12-20 07:05:41', b'0', b'1', b'0', 'HuseYinoviC_6'),
(8, 'huseyin', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'o4701352@nwytg.net', '', '', '', '13A25B4B-D974-8D0D-3128-83F5828CBF9D', '::1', '2018-12-20 07:27:30', '2018-12-20 07:27:30', b'0', b'1', b'0', 'huseyin'),
(9, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'e10adc3949ba59abbe56e057f20f883e', 'huseyin.goztok56@gmail.com', '', '', '', '74F83D65-11BB-458D-5FCE-2D225C76B25F', '::1', '2018-12-20 11:16:53', '2018-12-20 11:16:53', b'0', b'0', b'0', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(10, 'CilginYazar', 'fed20cc19da8dfcf8ddfecc0f59923b8', 'o5083747@nwytg.net', '', '', '', 'A858E4D6-4CE5-4F20-9B43-55DF8C904EC0', '::1', '2018-12-22 00:58:24', '2018-12-22 00:58:24', b'0', b'1', b'0', 'CilginYazar'),
(11, 'DenemeYazar', '4297f44b13955235245b2497399d7a93', 'o5085151@nwytg.net', '', '', '', '4121B850-D005-E233-8D2F-7FD550B76DB0', '::1', '2018-12-22 01:15:00', '2018-12-22 01:33:56', b'0', b'1', b'0', 'DenemeYazar');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Id` int(1) NOT NULL,
  `site_name` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `linkedin` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(45) COLLATE utf8_turkish_ci NOT NULL,
  `favicon` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `footer` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Id`, `site_name`, `phone`, `mail`, `twitter`, `facebook`, `linkedin`, `instagram`, `favicon`, `footer`) VALUES
(1, 'ShareBook', '+90 507 188 83 17', 'huseyin.goztok@gmail.com', 'https://twitter.com/HuseyinGoztok', 'https://www.facebook.com/hsyngztk', 'https://www.linkedin.com/in/huseyingoztok/', 'https://www.instagram.com/huseyingoztok/', '5c18c06cb6086favicon.png', 'Copyright © <b>ShapagettiBlog</b> Tüm Hakları Saklıdır.');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `Id` int(11) NOT NULL,
  `tag_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `tag_seo` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `isDeleted` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`Id`, `tag_name`, `tag_seo`, `isDeleted`) VALUES
(1, 'Kotlin', 'kotlin', b'0'),
(2, 'Yazılım', 'yazilim', b'0'),
(3, 'Cisco', 'cisco', b'0'),
(4, 'Router', 'router', b'0'),
(5, 'Dynamic Protocols', 'dynamic-protocols', b'0'),
(6, 'Kahve', 'kahve', b'0'),
(7, 'Sohbet', 'sohbet', b'0'),
(8, 'Muhabbet', 'muhabbet', b'0'),
(9, 'C#', 'csharp', b'0'),
(10, 'OOP', 'oop', b'0'),
(11, 'Sayfalama', 'sayfalama', b'0'),
(12, 'mvc deneme', 'mvc', b'0'),
(13, 'Static Routing', 'static-routing', b'0'),
(14, 'Primitive', 'primitive', b'0'),
(15, 'php', 'php', b'0'),
(16, 'Sql', 'sql', b'0'),
(17, 'java', 'java', b'0'),
(18, 'aaa ddd', 'aaa', b'0'),
(19, 'Yeni tag', 'yenitag', b'0'),
(20, 'Son tag', 'sontag', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_author_id` (`author_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `articlestags`
--
ALTER TABLE `articlestags`
  ADD KEY `fk_article_id` (`article_id`),
  ADD KEY `fk_tag_id` (`tag_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`Id`),
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`Id`);

--
-- Constraints for table `articlestags`
--
ALTER TABLE `articlestags`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`Id`),
  ADD CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`Id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`Id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
