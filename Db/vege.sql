-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 02:43 AM
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
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`) VALUES
(1, ' Laxmi Nagar Sabji Market ', 'Laxmi Nagar, Supela\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.210718, 81.348419),
(2, 'Garib Navab Sabji Bazar', 'Krishna Nagar, Supela\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.209518, 81.348999),
(3, 'Ravi Super Market', 'Laxmi Nagar, Supela\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.211124, 81.348320),
(4, 'Shyaam Sabji Dukaan', 'Laxmi Nagar, Supela\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.210445, 81.348579),
(5, 'Battis Eker Sabji Market', '32 Acre, Housing Board I.E. Bhilai, Chhattisgarh, India 490026', 21.228409, 81.373901),
(6, 'Gopal Sabji Bazar', '32 Acre, Housing Board I.E. Bhilai, Chhattisgarh, India 490026', 21.228548, 81.373505),
(7, 'New Market', 'Jawahar Nagar\r\nBhilai, Chhattisgarh 490022\r\nIndia', 21.223391, 81.367126),
(8, 'Aapna Bazar', 'Jawahar Nagar\r\nBhilai, Chhattisgarh 490022\r\nIndia', 21.223240, 81.367111),
(9, 'hari Sabji Dukaan', 'Jawahar Nagar\r\nBhilai, Chhattisgarh 490022\r\nIndia', 21.222340, 81.366165),
(10, 'Santushti kirana store', 'Kurud Rd\r\nI/E, MP Housing Board Colony\r\nBhilai, Chhattisgarh 490026\r\nIndia', 21.231102, 81.366570),
(11, 'Tuesday Market', 'Kohka\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.227568, 81.342461),
(12, 'BIGPITARA Online Grocery Store', 'GK INSTITUTE OF TECHNOLOGY, KURUD ROAD KOHKA\r\nKohka\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.226883, 81.343956),
(13, 'Theluram ki dukaan', 'Bajrang Para, Kohka\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.224848, 81.338959),
(14, 'Karma Bhavan bazar', 'Bajrang Para, Kohka\r\nBhilai, Chhattisgarh 490023\r\nIndia', 21.223680, 81.338783);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`sno`, `name`, `username`, `password`, `active`, `hash`, `mobile`) VALUES
(23, 'Divyansh Agrawal', 'agrawaldivyansh79@gmail.com', 'hellodv', '1', '07cdfd23373b17c6b337251c22b7ea57', '7415241512'),
(17, 'suman thakur', 'embracingdestiny17@gmail.com', 'killerdi', '1', '6cdd60ea0045eb7a6ec44c54d29ed402', '9977591414'),
(20, 'Harshit Kapoor', 'harshitkapoor15@gmail.com', 'harshit@1', '1', 'ab817c9349cf9c4f6877e1894a1faa00', '9770449751'),
(22, 'Jyoti Patnaik', 'jyotipatnaik4@gmail.com', 'jyotipatnaik', '1', 'b6d767d2f8ed5d21a44b0e5886680cb9', '8109908036'),
(26, 'kjsatao', 'kjsatao@gmail.com', 'abcdefg', '1', '287e03db1d99e0ec2edb90d079e142f3', '9977591414'),
(3, 'Pankaj thakur', 'pankaj.thakur28896@gmail.com', 'adminhu', '1', '4734ba6f3de83d861c3176a6273cac6d', '8982601240'),
(27, 'PANKAJ THAKUR', 'ptpthakur30@gmail.com', 'mylife', '1', '470e7a4f017a5476afb7eeb3f8b96f9b', '8982601240'),
(32, 'Ashish saha', 'sahaashish42@gmail.com', '9691415707', '1', '96da2f590cd7246bbde0051047b0d6f7', '8305888106'),
(29, 'Purnendu thakur', 'thakurpinto@gmail.com', 'purnendu', '1', 'fec8d47d412bcbeece3d9128ae855a7a', '9977591414'),
(28, 'Dolly Verma', 'vermadolly154@gmail.com', 'whatup', '1', '7f1171a78ce0780a2142a6eb7bc4f3c8', '7898400621');

-- --------------------------------------------------------

--
-- Table structure for table `vegetables`
--

CREATE TABLE IF NOT EXISTS `vegetables` (
  `name` varchar(50) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `cod` int(2) NOT NULL,
  `chopped` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vegetables`
--

INSERT INTO `vegetables` (`name`, `vname`, `quantity`, `price`, `cod`, `chopped`) VALUES
('ashish', 'Onion', 500, 20, 0, 1),
('ashish', 'Potato', 500, 10, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `usrname` varchar(32) CHARACTER SET utf8 NOT NULL,
  `mail_id` varchar(32) CHARACTER SET utf8 NOT NULL,
  `contact` int(10) DEFAULT NULL,
  `pass` varchar(32) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `active` int(2) NOT NULL,
  `hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendorlogin`
--

CREATE TABLE IF NOT EXISTS `vendorlogin` (
  `Sno` smallint(10) NOT NULL,
  `shopname` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL DEFAULT '8305888106',
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `password` varchar(16) NOT NULL,
  `active` varchar(2) DEFAULT '0',
  `hash` varchar(32) NOT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendorlogin`
--

INSERT INTO `vendorlogin` (`Sno`, `shopname`, `name`, `mobile`, `username`, `address`, `city`, `state`, `pincode`, `password`, `active`, `hash`, `latitude`, `longitude`) VALUES
(11, 'ZeroDaDhaba', 'Ashish Saha', '8305888106', 'sahaashish42@gmail.com', 'Housing Board', 'Bhilai', 'chhattisgarh', 490026, 'ashish', '1', '69adc1e107f7f7d035d7baf04342e1ca', '21.2318556', '81.3715626'),
(12, 'Jyoti vegmart', 'Jyoti Patnaik', '8109908036', 'ashishsaha4prog@gmail.com', 'farid nagar', 'bhilai', 'chhattisgarh', 490023, 'ashishsaha', '1', '9b70e8fe62e40c570a322f1b0b659098', '21.2163685', '81.3433792'),
(13, 'DevilAngel', 'PANKAJ THAKUR', '8982601240', 'ptpthakur30@gmail.com', 'kripal nagar', 'bhilai', 'chhattisgarh', 490023, 'mylife', '1', '34ed066df378efacc9b924ec161e7639', '21.2194658', '81.3461292');

-- --------------------------------------------------------

--
-- Table structure for table `vend_veggie`
--

CREATE TABLE IF NOT EXISTS `vend_veggie` (
  `vendor` varchar(50) NOT NULL,
  `vegetable` varchar(30) NOT NULL,
  `price` double(10,2) NOT NULL,
  `stock` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vend_veggie`
--

INSERT INTO `vend_veggie` (`vendor`, `vegetable`, `price`, `stock`) VALUES
('He', '12', 12.00, 12),
('He', '12', 12.00, 12),
('He', '12', 12.00, 12),
('He', '12', 12.00, 12),
('He', '12', 12.00, 12),
('He', '12', 12.00, 12),
('ptpthakur30', 'banana', 12.00, 12),
('ptpthakur30', 'cabbage', 50.00, 20),
('ptpthakur30', 'ladyfinger', 12.00, 90),
('ptpthakur30', 'cucumber', 80.00, 1221),
('ptpthakur30', 'galka', 50.00, 30),
('ptpthakur30', 'papaya', 59.00, 30),
('ptpthakur30', 'tinda', 60.00, 13),
('ptpthakur30', 'onion', 12.00, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `vegetables`
--
ALTER TABLE `vegetables`
  ADD PRIMARY KEY (`name`,`vname`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`usrname`);

--
-- Indexes for table `vendorlogin`
--
ALTER TABLE `vendorlogin`
  ADD UNIQUE KEY `Sno` (`Sno`), ADD UNIQUE KEY `Sno_2` (`Sno`), ADD KEY `username` (`username`), ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `vendorlogin`
--
ALTER TABLE `vendorlogin`
  MODIFY `Sno` smallint(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
