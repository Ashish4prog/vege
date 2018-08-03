-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 08:24 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'tomato', 'tomato.jpg', 40.00),
(2, 'brinjal', 'brinjal.jpg', 40.00),
(3, 'potato', 'potato.jpg', 20.00),
(4, 'cauliflower', 'cauliflower.jpg', 14.00),
(5, 'ladyfinger', 'ladyfinger.jpg', 20.00),
(6, 'onion', 'onion.jpeg', 45.00),
(7, 'muli', 'muli.jpg', 30.00),
(8, 'cucumber', 'cucumber.jpg', 20.00),
(9, 'beans', 'beans.jpg', 40.00),
(10, 'carrot', 'carrot.jpg', 30.00),
(11, 'kaddu', 'kaddu.jpg', 16.00),
(12, 'karela', 'karela.jpg', 40.00),
(13, 'galka', 'galka.jpg', 24.00),
(14, 'jackfruit', 'jackfruit.jpg', 30.00),
(15, 'drum stick', 'drum stick.jpg', 40.00),
(16, 'beetroot', 'beetroot.jpg', 50.00),
(17, 'banana', 'banana.jpg', 35.00),
(18, 'cabbage', 'cabbage.jpg', 16.00),
(19, 'parval', 'parval.jpg', 30.00),
(20, 'papaya', 'papaya.jpg', 20.00),
(21, 'lauki', 'lauki.jpg', 24.00),
(22, 'capcicum', 'capcicum.jpg', 40.00),
(23, 'sweet potato', 'sweet potato.jpg', 30.00),
(24, 'tinda', 'tinda.jpg', 40.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
