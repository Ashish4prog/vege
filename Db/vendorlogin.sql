-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 12:10 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vege`
--

-- --------------------------------------------------------

--
-- Table structure for table `vendorlogin`
--

CREATE TABLE IF NOT EXISTS `vendorlogin` (
  `Sno` int(4) NOT NULL,
  `shopname` varchar(30) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobile` varchar(12) NOT NULL DEFAULT '8305888106',
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `password` varchar(16) NOT NULL,
  `active` varchar(2) DEFAULT '0',
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendorlogin`
--

INSERT INTO `vendorlogin` (`Sno`, `shopname`, `firstname`, `lastname`, `mobile`, `username`, `address`, `city`, `state`, `pincode`, `password`, `active`, `hash`) VALUES
(0, 'Kuch Bhi', 'Ashish', 'Saha', '8305888106', 'sahaashish42@gmail.com', 'EWS-115, 32 Acre, Housing Board, I.E.', 'Bhilai', 'Chhattisgarh', 490026, 'a@g.cashish', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vendorlogin`
--
ALTER TABLE `vendorlogin`
  ADD UNIQUE KEY `Sno` (`Sno`), ADD UNIQUE KEY `Sno_2` (`Sno`), ADD KEY `username` (`username`), ADD KEY `username_2` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
