-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2019 at 10:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `desc`, `category`) VALUES
(1, 'ASUS Z370', '1234', 'image/m1.jpg', 23000.00, '5X Protection III: Multiple hardware safeguards for all-round protection\r\nLED illumination: Lighting control for audio trace paths\r\nNative M.2: Lightning-fast storage speeds\r\nOne-stop controls: Media-acclaimed UEFI BIOS with EZ Flash 3', 'motherboard'),
(2, 'ASUS x560', '2234', 'image/m2.jpg', 27000.00, '5X Protection II – Advanced hardware safeguards for all-round protection\r\nDDR4 memory,NVMe support', 'motherboard'),
(3, 'ASUS ATX Z220', '3456', 'image/m3.jpg', 13000.00, 'AMD AM4 mATX motherboard with Aura Sync RGB header, DDR4 3200MHz, M.2, HDMI 2.0b, SATA 6Gbps and USB 3.1 Gen 2', 'motherboard'),
(4, 'ASUS H110', '2387', 'image/m4.jpg', 23000.00, 'AMD AM4 ATX motherboard with M.2 heatsink, DDR4 3600MHz, dual M.2, HDMI, SATA 6Gbps and USB 3.1 Gen 2 front-panel connector', 'motherboard'),
(5, 'ASUS PRIME X470', '9765', 'image/m5.jpg', 40000.00, 'Intel LGA 1151 ATX motherboard with OptiMem II, DDR4 4266 MHz, Dual M.2, HDMI, Intel Optane memory ready, SATA 6Gb/s, USB 3.1 Gen 2', 'motherboard'),
(6, 'ASUS ROG FX505DY', '7743', 'image/l1.jpg', 47000.00, '8gb RAM,Intel i7 7500k,gtx 1050', 'laptop'),
(7, 'ASUS S650', '8865', 'image/l2.jpg', 30000.00, '8gb RAM,Intel i5 7500k,AMD m4', 'laptop'),
(8, 'ASUS ROG', '86745', 'image/l3.jpg', 70000.00, '8gb RAM,Intel i5 8130,GTX 1060', 'laptop'),
(9, 'ASUS FX505DT', '3342', 'image/l4.jpg', 56900.00, '8gb RAM,Intel i7 7500k,GTX 1050', 'laptop'),
(10, 'ASUS FX570', '8650', 'image/l5.jpg', 67000.00, '8gb RAM,AMD RYZEN 5,gtx 1050', 'laptop'),
(11, 'ASUS GTX 1650', '54558', 'image/g1.jpg', 17000.00, '', 'graphics'),
(12, 'ASUS GTX 1050', '99558', 'image/g2.jpg', 13000.00, '', 'graphics'),
(13, 'ASUS GTX 1070', '59900', 'image/g3.jpg', 45000.00, '', 'graphics'),
(14, 'ASUS RTX 2080ti', '1', 'image/g4.jpg', 156000.00, '', 'graphics'),
(15, 'ASUS GTX 2060', '88976', 'image/g5.jpg', 23000.00, '', 'graphics'),
(16, 'ASUS MAX PRO M1', '77656', 'image/p1.jpg', 11000.00, '3GB RAM,16GB ROM,PROCESSOR SD 610', 'smartphone'),
(17, 'ASUS zENFONE 5Z', '87657', 'image/p2.jpg', 25000.00, '6GB RAM,64GB ROM,PROCESSOR SD 845', 'smartphone'),
(18, 'ASUS ZENFONE 6Z', '55463', 'image/p3.jpg', 33000.00, '8GB RAM,64GB ROM,PROCESSOR SD 855', 'smartphone'),
(19, 'ASUS ZENFONE MAX', '99085', 'image/p4.jpg', 17000.00, '3GB RAM,16GB ROM,PROCESSOR SD 610', 'smartphone'),
(20, 'ASUS ROG PHONE 2', '77896', 'image/p5.jpg', 56000.00, '8GB RAM,64GB ROM,PROCESSOR SD 855', 'smartphone'),
(21, 'ASUSVP228', '55674', 'image/monitor1.jpg', 28790.00, '21.5” Full HD monitor with 1ms (GTG) quick response time.\r\nASUS-exclusive GamePlus provides Crosshair and Timer function for better gaming experience\r\nNumber of Colors: 16.7M ; Response Time: 1ms ; Power Consumption: 100-240V, 50/60Hz', 'monitor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `pincode` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  PRIMARY KEY (`emailid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `emailid`, `password`, `contact`, `pincode`, `city`, `state`, `country`) VALUES
('parth', 'solanki', 'solanki.parth@hotmail.com', 'solanki@115', '7778014791', '387115', 'nadiad', 'gujarat', 'india'),
('parth', 'solanki', 'solanki@parth.com', 'solanki@115', '7778014791', '387001', 'nadiad', 'gujarat', 'India');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
