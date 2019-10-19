-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2019 at 02:44 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='admini';

-- --------------------------------------------------------

--
-- Table structure for table `azili`
--

DROP TABLE IF EXISTS `azili`;
CREATE TABLE IF NOT EXISTS `azili` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `mesto` text COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `azili`
--

INSERT INTO `azili` (`id`, `naziv`, `mesto`, `adresa`, `telefon`, `email`, `opis`, `slika`) VALUES
(36, 'azil1', 'azil1', 'azil1', '123456', 'azil1@azil1.rs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tempor, orci vel venenatis scelerisque, leo massa laoreet elit, at condimentum ligula sem at nisi. Nullam volutpat quam mauris, in sodales arcu egestas at.  ', 0x7068702f617a696c692f646f67322e6a7067),
(37, 'azil 4 ', 'azil 4 ', 'azil 4 ', '123456', 'azil4@azil4.rs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tempor, orci vel venenatis scelerisque, leo massa laoreet elit, at condimentum ligula sem at nisi. Nullam volutpat quam mauris, in sodales arcu egestas at.                     ', 0x7068702f617a696c692f646f67322e6a7067),
(38, 'azil5', 'azil5', 'azil5', '123456', 'azil5@azil5.rs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tempor, orci vel venenatis scelerisque, leo massa laoreet elit, at condimentum ligula sem at nisi. Nullam volutpat quam mauris, in sodales arcu egestas at.           ', 0x7068702f617a696c692f646f67332e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(78, ''),
(79, ''),
(80, ''),
(81, '');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dog_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dog_breed` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dog_age` tinyint(4) NOT NULL,
  `dog_color` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dog_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='data about dogs';

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

DROP TABLE IF EXISTS `pwdreset`;
CREATE TABLE IF NOT EXISTS `pwdreset` (
  `pwdResetId` int(11) NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetSelector` text COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetToken` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pwdResetExpires` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rand_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `lastname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `created`, `modified`) VALUES
(121, '123', '123', 'novi3@novi.com', '$2y$10$N8u9KakyAE3JoV8mzIkevuzqtXR.UecDKkWJ2fZSGnHoQuSPjRkmW', '2019-10-12 16:56:08', '2019-10-12 16:56:08'),
(122, '1213565', '1213565', '1213565@1213565.com', '$2y$10$ZLFgGLxAOtuwFv5cTkVpVelh6grQ9.XUCQ6UnWqww1vJI1ZGW2u/S', '2019-10-12 17:00:07', '2019-10-12 17:00:07'),
(124, 'test', 'test', 'test@test.rs', '$2y$10$0DQUdSngbNtX8BYZ3Ea/seEp8E/XcyBvK.KDQrQFKDNNSBt1g3BZK', '2019-10-12 17:12:46', '2019-10-12 17:12:46'),
(125, 'Dalibor', 'Kalember', 'daliborkl@yahoo.com', '$2y$10$HPIXMi.uiWHQGme/Jxg77engQqSdfbmb/E.iGvC1gZvRQUwDw8Q/O', '2019-10-13 10:56:14', '2019-10-13 10:56:14'),
(126, '123456', '123456', '123456@123456.com', '$2y$10$CHP0slstdN68tKVeFc76Q.H2wCyy/s/s14Ud6O6rGGdqDiVcTbLZq', '2019-10-13 11:07:52', '2019-10-13 11:07:52'),
(127, 'tra', 'tra', 'tra@tra.com', '$2y$10$CDNE.RvCe56eMAINhlgFWu4PhMYsGzppmEEzEwWvGVmbBPttFaMMm', '2019-10-13 11:12:50', '2019-10-13 11:12:50'),
(128, 'daca', 'daca', 'daca@daca.rs', '$2y$10$M.GWzp5GDlX7n2sQajOHo.CkfOMhZIPlgwRwMoQbPYUvO01APhLMq', '2019-10-14 19:38:37', '2019-10-14 19:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `veterinarske_stanice`
--

DROP TABLE IF EXISTS `veterinarske_stanice`;
CREATE TABLE IF NOT EXISTS `veterinarske_stanice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL,
  `mesto` text COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slika` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `veterinarske_stanice`
--

INSERT INTO `veterinarske_stanice` (`id`, `naziv`, `mesto`, `adresa`, `telefon`, `email`, `opis`, `slika`) VALUES
(1, 'dfsd', 'sdgsd', 'gsdgf', 'dsgsg', 'sdfds@GSGDF.rs', '                                   xfgdfg ', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(2, 'test', 'test', 'test', '0123456', 'test@test.ts', '                        lorem ipsum            ', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(3, 'test', 'test', 'test', '0123456', 'test@test.ts', '                        lorem ipsum            ', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(4, 'Vet1', 'vet1', 'vet1', '011111111', 'vet1@vet.ts', '                                    sgsdfahghgsh', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(5, 'Vet1', 'vet1', 'vet1', '011111111', 'vet1@vet.ts', '                                    sgsdfahghgsh', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(6, 'vet3', 'vet3', 'vet3', '245464', 'vet3@vet3.rs', '                                    vet3', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(7, 'vet3', 'vet3', 'vet3', '245464', 'vet3@vet3.rs', '                                    vet3', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(8, 'vet4', 'vet3', 'vet3', '245464', 'vet3@vet3.rs', '                                    vet3', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(9, 'vet5', 'vet5', 'vet5', '543456546', 'vet5@vet5.rs', '                    vet5                ', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f33336238363966393036313965383137363364626631666363633839366438642d2d6c696f6e2d6c6f676f2d6d6f6465726e2d6c6f676f2e6a7067),
(10, 'vet6', 'vet6', 'vet6', '011234', 'vet6@vet6.rs', '                                    zdsgsdtgdfs', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f64656661756c742d7665746572696e6172792d646f63746f72732d322e6a7067),
(11, 'vet7', 'vet7', 'vet7', '04254', 'vet7@vet7.rs', '                                    ', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f),
(12, 'vet6', 'vet6', 'vet6', '011234', 'vet6@vet6.rs', '                                    zdsgsdtgdfs', 0x61646d696e2f7665746572696e6172736b655f7374616e6963652f64656661756c742d7665746572696e6172792d646f63746f72732d322e6a7067);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
