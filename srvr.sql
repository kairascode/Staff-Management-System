-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2020 at 10:22 AM
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
-- Database: `srvr`
--

-- --------------------------------------------------------

--
-- Table structure for table `atumiri`
--

DROP TABLE IF EXISTS `atumiri`;
CREATE TABLE IF NOT EXISTS `atumiri` (
  `no` int(2) NOT NULL AUTO_INCREMENT,
  `member` varchar(35) NOT NULL,
  `loginKey` varchar(255) NOT NULL,
  `memtyp` int(2) DEFAULT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`no`),
  UNIQUE KEY `loginKey` (`loginKey`),
  KEY `member` (`member`,`memtyp`,`lastlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atumiri`
--

INSERT INTO `atumiri` (`no`, `member`, `loginKey`, `memtyp`, `lastlogin`) VALUES
(3, 'sysadmin', 'eed57216df3731106517ccaf5da2122d', 30, '2016-07-06 16:37:54'),
(7, 'zuru', 'f54a7587259feb65e4d0a8b1ae597d4f', 30, '2016-08-02 11:56:39'),
(8, 'git', '64b2b6d12bfe4baae7dad3d018f8cbf6b0e7a044', 30, '2020-04-27 09:39:53'),
(9, 'registry', 'f687604ae801bc390ff2b07bd9ad7ace07f30862', 20, '2020-04-27 09:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `countys`
--

DROP TABLE IF EXISTS `countys`;
CREATE TABLE IF NOT EXISTS `countys` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL,
  `scounty` varchar(255) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `cname` (`cname`),
  KEY `cname_2` (`cname`),
  KEY `scounty` (`scounty`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countys`
--

INSERT INTO `countys` (`no`, `cname`, `scounty`) VALUES
(1, 'NAKURU', ''),
(2, 'BARINGO', ''),
(3, 'NAROK', ''),
(4, 'BOMET', ''),
(5, 'KERICHO', ''),
(6, 'LAIKIPIA', ''),
(7, 'SAMBURU', '');

-- --------------------------------------------------------

--
-- Table structure for table `nakuru`
--

DROP TABLE IF EXISTS `nakuru`;
CREATE TABLE IF NOT EXISTS `nakuru` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `scounty` varchar(255) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `scounty` (`scounty`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nakuru`
--

INSERT INTO `nakuru` (`no`, `scounty`) VALUES
(6, 'GILGIL'),
(8, 'KURESOI'),
(10, 'KURESOI NORTH'),
(9, 'KURESOI SOUTH'),
(5, 'MOLO'),
(11, 'NAIVASHA'),
(12, 'NAKURU NORTH'),
(1, 'NAKURU TOWN EAST'),
(2, 'NAKURU TOWN WEST'),
(4, 'NJORO'),
(3, 'RONGAI'),
(7, 'SUBUKIA');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `pfno` int(10) NOT NULL,
  `id_no` varchar(8) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `jgroup` varchar(4) NOT NULL,
  `hacademic` varchar(25) NOT NULL,
  `pq` varchar(255) NOT NULL,
  `tos` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `dofa` date NOT NULL,
  `doca` date NOT NULL,
  `station` varchar(2555) NOT NULL,
  `scounty` varchar(255) NOT NULL,
  `hcounty` varchar(35) NOT NULL,
  `contact` int(10) NOT NULL,
  `drecorded` date NOT NULL,
  `recordedBy` varchar(35) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `status` varchar(55) NOT NULL,
  PRIMARY KEY (`pfno`),
  KEY `id_no` (`id_no`,`sname`,`sex`,`designation`,`jgroup`,`hacademic`,`tos`,`dob`,`dofa`,`doca`,`station`(767),`scounty`),
  KEY `scounty` (`scounty`),
  KEY `status` (`status`),
  KEY `pq` (`pq`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
