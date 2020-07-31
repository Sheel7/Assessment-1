-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 30, 2020 at 02:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `title`, `date`, `starttime`, `endtime`) VALUES
(10, 'Birthday', '2020-08-03', '13:30:00', '16:30:00'),
(15, 'Reception', '2020-08-25', '06:00:00', '11:00:00'),
(11, 'Wedding', '2020-08-03', '11:00:00', '16:00:00'),
(12, 'Wedding', '2020-08-03', '16:00:00', '17:00:00'),
(13, 'Festival', '2020-08-03', '14:00:00', '19:00:00'),
(14, 'Festival', '2020-08-03', '19:00:00', '23:00:00'),
(16, 'Reception', '2020-08-25', '11:00:00', '16:00:00'),
(17, 'Reception', '2020-08-25', '16:00:00', '19:20:00'),
(18, 'Reception', '2020-08-31', '01:00:00', '06:00:00'),
(19, 'Reception', '2020-08-31', '06:00:00', '11:00:00'),
(20, 'Reception', '2020-08-31', '11:00:00', '16:00:00'),
(21, 'Reception', '2020-08-31', '16:00:00', '19:44:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
