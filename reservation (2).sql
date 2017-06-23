-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 05:24 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `organizationID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`organizationID`, `adminID`, `userName`, `password`) VALUES
(1, 1, 'admin', '0192023a7bbd73250516f069df18b500'),
(3, 2, 'heritage', '8e6657a1751f0058d02aa807552778b8'),
(4, 3, 'greenland', '21232f297a57a5a743894a0e4a801fc3'),
(5, 4, 'Gautam Manandhar', '0192023a7bbd73250516f069df18b500'),
(6, 5, 'bear', '893b56e3cfe153fb770a120b83bac20c'),
(7, 6, 'dream', '8812662dcf3e5db0247c0f85909363fc'),
(8, 7, 'dreamland', '0379187826ec11bbb8f5b6722c735bbc'),
(9, 8, 'sagarmatha', '2f1157cdad63b7035e5252880bf6f9cc'),
(10, 9, 'everest', 'de0480c5cfd34a78b10286c77faa8631'),
(11, 10, 'yeti', '4e563b71ca562d5731ad94a208fa0af5'),
(12, 11, 'smith', 'a66e44736e753d4533746ced572ca821'),
(13, 12, 'sunny', '533c5ba8368075db8f6ef201546bd71a'),
(14, 13, 'dragon', '8621ffdbc5698829397d97767ac13db3'),
(15, 14, 'alka', 'b31aca9874a6c0f36fe19115f8ce777c'),
(16, 15, 'jomsom', '51f826ce222a586e6a4737879a9385c0'),
(17, 16, 'buddha', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE IF NOT EXISTS `booking_details` (
  `organizationID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `bookedDate` date NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `typeOfRoom` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `canceledDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`organizationID`, `bookingID`, `email`, `roomNo`, `bookedDate`, `checkin`, `checkout`, `typeOfRoom`, `status`, `canceledDate`) VALUES
(5, 14, 'user@test.com', 1, '2015-08-02', '2015-08-17', '2015-08-22', 'Simple', 'active', NULL),
(16, 15, 'user@test.com', 200, '2015-08-02', '2015-08-04', '2015-08-15', 'STANDARD', 'active', NULL),
(10, 16, 'bhupesh.stha@gmail.com', 221, '2015-08-02', '2015-08-04', '2015-08-13', 'NORMAL', 'active', NULL),
(8, 17, 'sudin.mdr@gmail.com', 126, '2015-08-03', '2015-08-04', '2015-08-19', 'SIMPLE', 'active', NULL),
(17, 18, 'user@test.com', 202, '2015-08-03', '2015-08-06', '2015-08-22', 'Medium', 'canceled', '2015-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `organizationID` int(11) NOT NULL,
  `feedbackID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `feedback` text NOT NULL,
  `sentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `organizationID` int(11) NOT NULL,
  `offerID` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`organizationID`, `offerID`, `start`, `end`, `details`) VALUES
(3, 1, '2015-08-01', '2015-08-10', '20% Discount on Suite Rooms'),
(5, 2, '2015-08-13', '2015-08-28', '25% discount on the occasion of dashain festival'),
(17, 3, '2015-08-01', '2015-08-19', '10% discount for newly married couples'),
(10, 4, '2015-08-05', '2015-08-12', '15% off for students');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `organizationID` int(11) NOT NULL,
  `organization_name` varchar(30) NOT NULL,
  `organization_location` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `phone1` bigint(11) NOT NULL DEFAULT '0',
  `pan_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`organizationID`, `organization_name`, `organization_location`, `phone`, `phone1`, `pan_no`) VALUES
(1, 'hotel_lark', 'Kathmandu', 4215698, 9841632795, 9652147823),
(2, 'hotel_view_point', 'Pokhara', 6623175, 0, 7593146280),
(3, 'hotel_heritage', 'Bhaktapur', 6610325, 9851065712, 8561475922),
(4, 'hotel_greenland', 'Pokhara', 984123575, 1, 1111140),
(5, 'manandhar_khaja_ghar', 'Banepa', 9841389327, 11660894, 2568965255),
(6, 'hotel_bear_garden', 'Pokhara', 9843691524, 9813788537, 1811798),
(7, 'hotel_dream_pokhara', 'pokhara', 9841637248, 981390404, 1891244),
(8, 'hotel_dreamland', 'Pokhara', 9851235689, 9813253614, 5896123),
(9, 'hotel_sagarmatha', 'sagarmatha', 9851896214, 9808975628, 565231565),
(10, 'hotel_mt._everest', 'sagarmatha', 9849174307, 9808789535, 585103246),
(11, 'hotel_yeti', 'Sagarmatha', 9851234795, 9807658235, 369852147),
(12, 'hotel_smith', 'Sagarmatha', 9851896471, 9851056070, 9805390729),
(13, 'sunny_hotel', 'mustang', 9813050605, 9851024203, 692803156),
(14, 'hotel_dragon', 'mustang', 9851029873, 9841023598, 3698521466),
(15, 'alka_markopolo_hotel', 'mustang', 9841028500, 9813020202, 202058203),
(16, 'hotel_jomsom', 'mustang', 9851603030, 9813021232, 32023569),
(17, 'hotel_buddha', 'Lumbini', 9856320789, 1, 985147263);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `organizationID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `typeOfRoom` varchar(15) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` text NOT NULL,
  `available` tinyint(1) DEFAULT '0',
  `reserved` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`organizationID`, `roomID`, `typeOfRoom`, `rate`, `description`, `available`, `reserved`) VALUES
(1, 1, 'SUITE', 1500, 'tv, attach bathroom', 2, 0),
(1, 2, 'STANDARD', 2500, 'LCD 42"TV with attach bathroom and telephone services', 1, 0),
(1, 3, 'NORMAL', 1200, '14" TV', 3, 0),
(3, 1, 'NORMAL', 1300, 'TV with attach bathroom', 2, 0),
(3, 2, 'STANDARD', 2300, '35" LCD TV with attach bathroom', 3, 0),
(3, 3, 'SUITE', 2000, 'TV, attach bathroom', 2, 0),
(4, 1, 'NORMAL', 1800, 'TV with attach bathroom', 1, 0),
(4, 2, 'STANDARD', 2600, '2 double bed with TV and attach bathroom', 2, 0),
(4, 3, 'SUITE', 2000, '2 single bed with TV and attach bathroom', 1, 0),
(5, 1, 'Simple', 800, 'Simple room with single bed only.', 4, 1),
(6, 1, 'NORMAL', 1500, '2 single bed with TV', 5, 0),
(6, 2, 'STANDARD', 2200, '2 double bed with TV and attach bathroom', 4, 0),
(6, 3, 'FAMILY ROOM', 2600, '2Double bed and 1 single bed with attach bathroom and TV\r\n', 2, 0),
(7, 1, 'NORMAL', 1400, '2 singe bed with attach bathroom\r\n', 7, 0),
(7, 2, 'STANDARD', 2300, '2 double bed with attach bathroom and TV\r\n', 3, 0),
(7, 3, 'FAMILY ROOM', 3000, '2 single bed and 2 double bed with attach bathroom and 2 TV\r\n', 2, 0),
(8, 1, 'SIMPLE', 1200, '1 Single bed and 1 double bed', 4, 1),
(8, 2, 'NORMAL', 1800, '2 Double bed with TV', 3, 0),
(8, 3, 'STANDARD', 2300, '2 double bed with TV and attach bathroom\r\n', 2, 0),
(8, 4, 'FAMILY ROOM', 3000, '2 Double bed and 2 Single bed with TV and attach bathroom', 4, 0),
(9, 1, 'SIMPLE', 1000, '2 Single bed', 4, 1),
(9, 2, 'NORMAL', 1500, '1 single bed and 1 double bed\r\n', 4, 0),
(9, 3, 'STANDARD', 2400, '2 Double bed and 1 single bed with attach bathroom', 2, 0),
(10, 1, 'SIMPLE', 1500, '2 Single bed', 3, 0),
(10, 2, 'NORMAL', 2000, '2 double bed with TV', 1, 1),
(10, 3, 'STANDARD', 2500, '2 double bed and 1 single bed with attach bathroom ', 2, 0),
(11, 1, 'SIMPLE', 1200, '2 Single bed', 4, 1),
(11, 2, 'NORMAL', 2000, '2double bed with attach bathroom', 2, 0),
(11, 3, 'STANDARD', 2700, '2 double bed and 1 Single bed with attach bathroom and TV', 4, 0),
(12, 1, 'SIMPLE', 1200, '2 single bed room with TV\r\n', 4, 1),
(12, 2, 'NORMAL', 1800, '2 Double bed', 2, 0),
(12, 3, 'STANDARD', 2500, '2 Double bed and 2 single bed with attach bathroom', 4, 0),
(12, 4, 'FAMILY ROOM', 3200, '2 double bed 2 Single bed with TV and attach bathroom', 3, 0),
(13, 1, 'SIMPLE', 1500, '2 Single bed', 4, 1),
(13, 2, 'NORMAL', 2000, '1 single and 1 double bed', 3, 0),
(13, 3, 'STANDARD', 3000, '3 Double bed with attach bathroom', 2, 0),
(14, 1, 'SIMPLE', 1500, '1 single and 1 double bed', 4, 1),
(14, 2, 'NORMAL', 2500, '2 Double bed with TV', 2, 0),
(14, 3, 'STANDARD', 3000, '2 Double bed and 2 Single bed with attach bathroom and TV', 4, 0),
(15, 1, 'SIMPLE', 1800, '2 Single bed with attach bathroom', 4, 1),
(15, 2, 'NORMAL', 2400, '2 double bed with attach bathroom', 2, 0),
(15, 3, 'STANDARD', 3000, '2 Double bed and a single bed with attach bathroom and TV', 3, 0),
(16, 1, 'SIMPLE', 1200, '2 Single bed', 4, 1),
(16, 2, 'NORMAL', 2000, '2 double bed', 2, 0),
(16, 3, 'STANDARD', 3000, '2 Double bed and a single bed with attach bathroom', 3, 1),
(17, 1, 'Low', 800, 'Simple room with TV', 1, 0),
(17, 2, 'Medium', 1500, 'Medium room with attached bathroom', 1, 0),
(17, 3, 'High', 2500, 'High class room with ac', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
  `organizationID` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `floorNo` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `roomID` int(11) NOT NULL,
  `loginID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`organizationID`, `roomNo`, `floorNo`, `checkin`, `checkout`, `status`, `roomID`, `loginID`) VALUES
(3, 101, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(3, 102, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(3, 109, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(3, 106, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(3, 110, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(3, 201, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(3, 203, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(1, 108, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(1, 107, 1, '2015-08-02', '2015-08-02', 0, 3, 0),
(1, 303, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(1, 301, 3, '2015-08-02', '2015-08-02', 0, 2, 0),
(1, 401, 4, '2015-08-02', '2015-08-02', 0, 1, 0),
(1, 405, 4, '2015-08-02', '2015-08-02', 0, 3, 0),
(4, 500, 5, '2015-08-02', '2015-08-02', 0, 1, 0),
(4, 403, 4, '2015-08-02', '2015-08-02', 0, 3, 0),
(4, 305, 3, '2015-08-02', '2015-08-02', 0, 2, 0),
(4, 215, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(5, 1, 1, '2015-08-17', '2015-08-22', 1, 1, 1),
(6, 125, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(6, 143, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(6, 140, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(6, 133, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(6, 108, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(6, 250, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(6, 235, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(6, 289, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(6, 299, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(6, 309, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(6, 357, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(7, 169, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 193, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 157, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 194, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 160, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 192, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 161, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(7, 277, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(7, 288, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(7, 259, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(7, 369, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(7, 358, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(8, 125, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(8, 126, 1, '2015-08-04', '2015-08-19', 1, 1, 4),
(8, 127, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(8, 128, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(8, 129, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(8, 236, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(8, 238, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(8, 252, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(8, 360, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(8, 389, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(8, 401, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(8, 405, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(8, 438, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(8, 487, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(9, 126, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(9, 128, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(9, 183, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(9, 145, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(9, 194, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(9, 258, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(9, 259, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(9, 235, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(9, 250, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(9, 359, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(9, 395, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(10, 103, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(10, 153, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(10, 149, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(10, 250, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(10, 221, 2, '2015-08-04', '2015-08-13', 1, 2, 3),
(10, 351, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(10, 238, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(11, 126, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(11, 189, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(11, 183, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(11, 286, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(11, 267, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(11, 361, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(11, 381, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(11, 321, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(11, 357, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(12, 123, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(12, 125, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(12, 128, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(12, 251, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(12, 299, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(12, 320, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(12, 396, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(12, 358, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(12, 394, 3, '2015-08-02', '2015-08-02', 0, 3, 0),
(12, 451, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(12, 489, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(12, 487, 4, '2015-08-02', '2015-08-02', 0, 4, 0),
(13, 136, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(13, 123, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(13, 159, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(13, 183, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(13, 289, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(13, 271, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(13, 231, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(13, 299, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(14, 120, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(14, 192, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(14, 256, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(14, 244, 2, '2015-08-02', '2015-08-02', 0, 2, 0),
(14, 230, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(14, 214, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(14, 215, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(14, 236, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(15, 191, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(15, 151, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(15, 121, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(15, 132, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(15, 177, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(15, 154, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(15, 256, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(15, 234, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(15, 218, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(16, 130, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(16, 132, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(16, 190, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(16, 135, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(16, 185, 1, '2015-08-02', '2015-08-02', 0, 2, 0),
(16, 232, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(16, 251, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(16, 238, 2, '2015-08-02', '2015-08-02', 0, 3, 0),
(16, 200, 2, '2015-08-04', '2015-08-15', 1, 3, 1),
(17, 110, 1, '2015-08-02', '2015-08-02', 0, 1, 0),
(17, 202, 2, '2015-08-03', '2015-08-03', 0, 2, 0),
(17, 303, 3, '2015-08-02', '2015-08-02', 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `serviceID` int(11) NOT NULL,
  `service_name` varchar(15) NOT NULL,
  `service_rate` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceID`, `service_name`, `service_rate`) VALUES
(1, 'swimming', 200),
(2, 'car_parking', 100),
(3, 'laundry', 100),
(4, 'seminar_hall', 300),
(5, 'massage', 200);

-- --------------------------------------------------------

--
-- Table structure for table `services_used`
--

CREATE TABLE IF NOT EXISTS `services_used` (
  `loginID` int(11) NOT NULL,
  `swimming` tinyint(1) DEFAULT '0',
  `car_parking` tinyint(1) DEFAULT '0',
  `laundry` tinyint(1) DEFAULT '0',
  `seminar_hall` tinyint(1) DEFAULT '0',
  `massage` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_used`
--

INSERT INTO `services_used` (`loginID`, `swimming`, `car_parking`, `laundry`, `seminar_hall`, `massage`) VALUES
(1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `loginID` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `card_holder` varchar(30) NOT NULL,
  `credit_card_number` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`loginID`, `firstName`, `lastName`, `email`, `phone`, `address`, `password`, `card_holder`, `credit_card_number`) VALUES
(1, 'User', 'Test', 'user@test.com', 9876543210, 'test', '6ad14ba9986e3615423dfca256d04e3f', 'User', 123456789),
(2, 'Admin', 'Test', 'admin@test.com', 1234567890, 'admin', '0192023a7bbd73250516f069df18b500', 'Admin', 987654321),
(3, 'Bhupesh', 'Shresthta', 'bhupesh.stha@gmail.com', 9860039851, 'Suryabinayak', '0192023a7bbd73250516f069df18b500', 'Bhupesh', 1924578931),
(4, 'Sudin', 'Manandhar', 'sudin.mdr@gmail.com', 9841235698, 'Banepa', '0192023a7bbd73250516f069df18b500', 'Sudean', 9854123654);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offerID`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organizationID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceID`), ADD UNIQUE KEY `service_name` (`service_name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
