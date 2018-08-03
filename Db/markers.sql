-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 03:00 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
