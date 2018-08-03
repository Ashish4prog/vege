-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 09:22 AM
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
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `sno` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `active` varchar(2) NOT NULL DEFAULT '0',
  `hash` varchar(32) NOT NULL,
  `mobile` varchar(12) NOT NULL DEFAULT '8982601240'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`sno`, `name`, `username`, `password`, `active`, `hash`, `mobile`) VALUES
(18, 'Divyansh Agrawal', 'agrawaldivyansh79@gmail.com', 'hellometh', '1', '55743cc0393b1cb4b8b37d09ae48d097', '7415241512'),
(17, 'suman thakur', 'embracingdestiny17@gmail.com', 'killerdi', '1', '6cdd60ea0045eb7a6ec44c54d29ed402', '9977591414'),
(16, 'Jyoti Patnaik', 'jyotipatnaik4@gmail.com', 'hellohello', '1', 'f7177163c833dff4b38fc8d2872f1ec6', '8109908036'),
(3, 'Pankaj thakur', 'pankaj.thakur28896@gmail.com', 'adminhu', '1', '4734ba6f3de83d861c3176a6273cac6d', '8982601240'),
(19, 'Pankaj Thakur', 'ptpthakur30@gmail.com', 'mylife', '1', '3b8a614226a953a8cd9526fca6fe9ba5', '8982601240'),
(13, 'Ashish', 'sahaashish42@gmail.com', 'a@g.cashish', '1', '85fc37b18c57097425b52fc7afbb6969', '8305888106');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `sno` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
