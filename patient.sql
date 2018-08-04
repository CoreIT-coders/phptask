-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2018 at 02:27 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient`
--

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

DROP TABLE IF EXISTS `count`;
CREATE TABLE IF NOT EXISTS `count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(3) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `patient` int(11) DEFAULT NULL,
  `search` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id`, `admin`, `user`, `patient`, `search`) VALUES
(1, 1, NULL, NULL, NULL),
(2, NULL, NULL, 1, NULL),
(3, NULL, 1, NULL, NULL),
(4, NULL, 1, NULL, NULL),
(5, NULL, 1, NULL, NULL),
(6, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

DROP TABLE IF EXISTS `navbar`;
CREATE TABLE IF NOT EXISTS `navbar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `item` text CHARACTER SET utf8 NOT NULL,
  `rank` int(3) NOT NULL,
  `visb` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `item`, `rank`, `visb`) VALUES
(1, 'Home', 1, 1),
(2, 'Add New Patient', 2, 1),
(3, 'Search For Patient', 3, 1),
(4, 'Delete Users', 5, 2),
(6, 'Add Admin', 7, 2),
(7, 'Delete Admins', 8, 3),
(8, 'Profile', 9, 3),
(10, 'Admin Area', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `User` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `disease` varchar(200) NOT NULL,
  `state` varchar(30) NOT NULL,
  `birthdate` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `User`, `fullname`, `disease`, `state`, `birthdate`) VALUES
(1, 'Rami Salm', 'salm mahammed', 'canser', 'baghdad', '1970-1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `admin` int(1) NOT NULL,
  `Date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `pass`, `admin`, `Date`) VALUES
(1, 'Rami Salm', 'alijaf@yahoo.com', 'Rami Salm', '$2y$12$YRpxK9rtu1i6qzkHoU3INedCVuqOqCnkp4vodkYLJXbfsMH4hx5aG', 1, '2018-08-02 12:06:57'),
(15, 'jhon', 'jhon@email.com', 'jhon lopez', '$2y$12$JDnmyuw5msG7JeKfEPyO2e/QR7zm6jMA/0C/wDXBZzsKkKZ.AQyXu', 0, '2018-08-04 11:55:56'),
(16, 'david', 'david@email.com', 'David Gonzalez', '$2y$12$lqAbay/hYE4/F90ZkoD1x.nnA69KqhOJG.O6pgU.YNcpLCK08oImm', 0, '2018-08-04 11:56:56'),
(17, 'michael', 'michael@email.com', 'Michael Garcia', '$2y$12$Ak7Hz0V/np2HP3e0wYsTxueGteflGZy3HblCqUcU3hLZQMsM4lvzK', 0, '2018-08-04 11:57:56'),
(18, 'chris', 'chris@email.com', 'Chris ', '$2y$12$dK8.Ip.FvEWNBev3LxZPsuSlR19UcfzJGdwiwy4M812crqIZjXqsu', 0, '2018-08-04 11:59:46');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
