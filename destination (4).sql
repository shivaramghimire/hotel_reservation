-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 01:20 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `destination`
--

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE IF NOT EXISTS `health_tips` (
  `sno` int(34) DEFAULT NULL,
  `information` text NOT NULL,
  `diseases` text NOT NULL,
  `hospitals` text NOT NULL,
  `image` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`sno`, `information`, `diseases`, `hospitals`, `image`) VALUES
(1, 'The region is very cold and windy. Also due to the lack of rain the climate is very dry. s', 'Dehydration is likely to be the ca', 'the nearest hospitals are ', ''),
(2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'fgkjdfjgndkjfg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `sno` int(30) NOT NULL,
  `name` varchar(34) DEFAULT NULL,
  `pic` varchar(34) DEFAULT NULL,
  `info` varchar(88) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`sno`, `name`, `pic`, `info`) VALUES
(1, 'Mustang', 'mustang.jpg', 'The desert of nepal with extra ordinary sceneries....You will love it!'),
(2, 'Sagarmatha', 'sagarmatha.jpg', 'Sagarmatha is heighest peak in the world! Listed in one of natural heritage of world it '),
(3, 'Annapurna', 'annapurna.jpg', 'The most dangerous trekking site of nepal'),
(4, 'Pokhara', 'pokhara.jpg', 'City of lakes'),
(5, 'Chitwan', 'chitwan.jpg', 'One horn Rhino,leopards,tigers,elephant saphari'),
(6, 'Lumbini', 'lumbini.jpg', 'Birth place of Buddha'),
(7, 'kathmandu', 'kathmandu.jpg', 'Durbar squares..Capital of nepal');

-- --------------------------------------------------------

--
-- Table structure for table `location_information`
--

CREATE TABLE IF NOT EXISTS `location_information` (
  `sno` int(34) DEFAULT NULL,
  `climate` varchar(40) DEFAULT NULL,
  `clothing` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `sno` int(34) DEFAULT NULL,
  `medicine` varchar(34) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`sno`, `medicine`) VALUES
(1, 'citamol'),
(1, 'dettol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`sno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
