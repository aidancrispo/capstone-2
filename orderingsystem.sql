-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 09:15 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ACNTS_ID` bigint(20) NOT NULL,
  `ACNTS_UName` varchar(30) NOT NULL,
  `ACNTS_Password` varchar(30) NOT NULL,
  `ACNTS_Role` varchar(20) DEFAULT 'Customer',
  `ACNTS_LoginFirst` bit(1) NOT NULL DEFAULT b'1',
  `ACNTS_Status` varchar(10) NOT NULL DEFAULT 'Active',
  `Date_Inactive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ACNTS_ID`, `ACNTS_UName`, `ACNTS_Password`, `ACNTS_Role`, `ACNTS_LoginFirst`, `ACNTS_Status`, `Date_Inactive`) VALUES
(1129, 'emp', 'emp', 'Employee', b'1', 'Active', '0000-00-00'),
(1130, 'admin', 'admin', 'Admin', b'1', 'Active', '0000-00-00'),
(1151, 'rbnr', 'rbnr', 'Customer', b'0', 'Active', '0000-00-00'),
(1152, 'luis', 'luis', 'Customer', b'0', 'Active', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `contactusmessages`
--

CREATE TABLE `contactusmessages` (
  `CU_ID` bigint(20) NOT NULL,
  `CU_Name` varchar(50) NOT NULL,
  `CU_Email` varchar(50) NOT NULL,
  `CU_ContactNo` bigint(15) UNSIGNED NOT NULL,
  `CU_concern` varchar(30) NOT NULL,
  `CU_ordrnum` int(30) NOT NULL,
  `CU_Message` varchar(500) NOT NULL,
  `CU_DateTimeR` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CU_Status` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactusmessages`
--

INSERT INTO `contactusmessages` (`CU_ID`, `CU_Name`, `CU_Email`, `CU_ContactNo`, `CU_concern`, `CU_ordrnum`, `CU_Message`, `CU_DateTimeR`, `CU_Status`) VALUES
(1, 'Aidan Crispo', 'mikemikecrispo@gmail.com', 9271363827, '', 0, 'Nice website', '2019-02-09 16:18:56', 'Resolved'),
(3, 'Ralph BIll Reyes', 'ralphbillreyess@gmail.com', 9777016352, 'OnHold', 0, 'testing', '2019-03-24 19:14:34', 'Pending'),
(4, 'Ralph BIll Reyes', 'ralphbillreyess@gmail.com', 9777016352, 'Cancel', 1059, 'TESTING', '2019-03-24 20:51:45', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` bigint(20) NOT NULL,
  `ACNTS_ID` bigint(20) NOT NULL,
  `CUST_Name` text NOT NULL,
  `CUST_ContactNO` bigint(15) UNSIGNED NOT NULL,
  `CUST_Address` varchar(150) NOT NULL,
  `CUST_Email` varchar(50) NOT NULL,
  `CUST_Status` varchar(10) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `ACNTS_ID`, `CUST_Name`, `CUST_ContactNO`, `CUST_Address`, `CUST_Email`, `CUST_Status`) VALUES
(48, 1151, 'Ralph BIll Reyes', 9777016352, 'Block 4 Lot 34 Gumamela St. Springville garden cavite', 'ralphbillreyess@gmail.com', 'Active'),
(49, 1152, 'Luis Buenaventura', 9271383838383, 'Pilar', 'luis@luis.com', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_ID` bigint(20) NOT NULL,
  `EMP_Name` text NOT NULL,
  `EMP_BDate` date NOT NULL,
  `EMP_Gender` text NOT NULL,
  `EMP_Address` varchar(150) NOT NULL,
  `EMP_ContactNO` bigint(15) NOT NULL,
  `EMP_Email` varchar(50) NOT NULL,
  `ACNTS_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `EMP_Name`, `EMP_BDate`, `EMP_Gender`, `EMP_Address`, `EMP_ContactNO`, `EMP_Email`, `ACNTS_ID`) VALUES
(4, 'Aidan Michael A. Crispo', '1998-04-04', 'Male', 'Camella Homes Woodhills, San Pedro, Laguna', 9271363827, 'mikemikecrispo@gmail.com', 1129),
(6, 'Luis Buenaventura', '1998-04-28', 'Male', 'Pilar, Las Pinas, City', 9871239876, 'luis@gmail.com', 1139);

-- --------------------------------------------------------

--
-- Table structure for table `finalorders`
--

CREATE TABLE `finalorders` (
  `PO_NO` bigint(20) NOT NULL,
  `PROD_Name` varchar(255) NOT NULL,
  `ACNTS_ID` bigint(20) NOT NULL,
  `DatePurchased` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Quantity` char(11) NOT NULL,
  `Status` varchar(15) NOT NULL DEFAULT 'Pending',
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finalorders`
--

INSERT INTO `finalorders` (`PO_NO`, `PROD_Name`, `ACNTS_ID`, `DatePurchased`, `Quantity`, `Status`, `TotalPrice`) VALUES
(1052, 'Not Nice | Red', 1151, '2018-02-11 09:48:39', '4', 'Completed', 2600),
(1053, 'Not Nice | Maroon', 1151, '2018-01-11 09:48:55', '4', 'Completed', 2600),
(1054, 'Not Nice | Red', 1151, '2019-03-11 09:53:34', '1', 'Completed', 650),
(1055, 'Not Nice | Gray', 1151, '2019-02-11 09:53:48', '7', 'Completed', 4550),
(1056, 'Not Nice | Red', 1151, '2019-03-11 09:56:28', '1', 'Completed', 650),
(1057, 'Not Nice | Maroon', 1151, '2019-03-11 09:56:37', '2', 'Completed', 1300),
(1058, 'Not Nice x Bears | Black Shirt , Not Nice | Maroon', 1152, '2019-03-11 10:12:09', '10 | 3', 'Completed', 7450),
(1059, 'Not Nice | Red , Not Nice x Bears | Black Shirt , Not Nice | Maroon', 1151, '2019-03-11 10:24:16', '1 | 5 | 10', 'Pending', 9900);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` bigint(20) NOT NULL,
  `logdesc` varchar(255) NOT NULL,
  `ACNTS_ID` bigint(20) NOT NULL,
  `DateModified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `logdesc`, `ACNTS_ID`, `DateModified`) VALUES
(26, 'Product Deleted PRODUCT ID: 21', 1129, '2018-03-20 21:16:54'),
(27, 'Product Deleted PRODUCT ID: 21', 1129, '2018-03-20 21:16:57'),
(28, 'Product Deleted PRODUCT ID: 21', 1129, '2018-03-20 21:17:00'),
(29, 'Product Deleted PRODUCT ID: 21', 1129, '2018-03-20 21:17:02'),
(30, 'Product Deleted PRODUCT ID: 21', 1129, '2018-03-20 21:17:04'),
(31, 'Product Deleted PRODUCT ID: 17', 1129, '2018-03-20 21:17:07'),
(32, 'Product Deleted PRODUCT ID: 18', 1129, '2018-03-20 21:17:11'),
(33, 'Product Deleted PRODUCT ID: 21', 1129, '2018-03-20 21:18:33'),
(34, 'Product Edited PRODUCT ID: 21', 1129, '2018-03-20 21:20:12'),
(35, 'Product Edited PRODUCT ID: 21', 1129, '2018-03-20 21:21:19'),
(36, 'Product Edited PRODUCT ID: 21', 1129, '2018-03-20 21:21:31'),
(37, 'Product Edited PRODUCT ID: 21', 1129, '2018-03-20 21:22:14'),
(38, 'Product Edited PRODUCT ID: 21', 1129, '2018-03-20 21:22:33'),
(39, 'Product Edited PRODUCT ID: 20', 1129, '2018-03-20 21:22:46'),
(40, 'Product Edited PRODUCT ID: 20', 1129, '2018-03-20 21:23:04'),
(41, 'Product Edited PRODUCT ID: 19', 1129, '2018-03-20 21:24:19'),
(42, 'Product Edited PRODUCT ID: 17', 1129, '2018-03-20 21:25:04'),
(43, 'INSERTED NEW ACCOUNT USER: test', 1130, '2018-03-20 22:19:17'),
(44, 'Order Status Processed ORDER ID: 1007', 1129, '2018-03-21 08:54:39'),
(45, 'Order Status Delivered ORDER ID: 1007', 1129, '2018-03-21 08:54:58'),
(46, 'Product Added PRODUCT NAME: Navy Blue Crew Neck Shirt', 1129, '2018-03-21 09:14:33'),
(47, 'INSERTED NEW ACCOUNT USER: ', 0, '2018-03-25 23:43:01'),
(48, 'INSERTED NEW ACCOUNT USER: mau', 1130, '2018-03-26 08:29:14'),
(49, 'INSERTED NEW ACCOUNT USER: uam', 1130, '2018-03-26 08:32:27'),
(50, 'Order Status Processed ORDER ID: 1010', 1129, '2018-03-26 08:46:35'),
(51, 'Order Status Processed ORDER ID: 1011', 1129, '2018-03-26 09:10:43'),
(52, 'Order Status Delivered ORDER ID: 1011', 1129, '2018-03-26 09:10:49'),
(53, 'Order Status Completed ORDER ID: 1011', 1129, '2018-03-26 09:10:53'),
(54, 'Order Status Processed ORDER ID: 1012', 1129, '2018-04-02 08:27:40'),
(55, 'Order Status Processed ORDER ID: 1013', 1129, '2018-04-02 09:03:24'),
(56, 'Order Status Delivered ORDER ID: 1013', 1129, '2018-04-02 09:03:31'),
(57, 'Order Status Processed ORDER ID: 1009', 1129, '2018-04-02 09:03:48'),
(58, 'Order Status Delivered ORDER ID: 1009', 1129, '2018-04-02 09:03:54'),
(59, 'Order Status Completed ORDER ID: 1009', 1129, '2018-04-02 09:04:01'),
(60, 'Order Status Processed ORDER ID: 1014', 1129, '2018-04-02 09:06:23'),
(61, 'Order Status Delivered ORDER ID: 1014', 1129, '2018-04-09 19:32:45'),
(62, 'Message Deleted CU_ID: 1', 1129, '2018-04-10 16:30:37'),
(63, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 16:32:28'),
(64, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 16:32:38'),
(65, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 16:32:53'),
(66, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 16:38:10'),
(67, 'Order Status Completed ORDER ID: 1014', 1129, '2018-04-10 16:39:13'),
(68, 'Order Status Processed ORDER ID: 1015', 1129, '2018-04-10 16:53:31'),
(69, 'Order Status Delivered ORDER ID: 1015', 1129, '2018-04-10 16:53:36'),
(70, 'Order Status Completed ORDER ID: 1015', 1129, '2018-04-10 16:53:41'),
(71, 'Order Status Delivered ORDER ID: 1012', 1129, '2018-04-10 16:54:45'),
(72, 'Order Status Returned ORDER ID: 1012', 1129, '2018-04-10 16:55:07'),
(73, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:48:05'),
(74, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:48:27'),
(75, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:53:16'),
(76, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:56:13'),
(77, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:56:24'),
(78, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:56:48'),
(79, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:57:44'),
(80, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:57:55'),
(81, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:58:36'),
(82, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 19:59:35'),
(83, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:02:57'),
(84, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:10:03'),
(85, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:10:08'),
(86, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:10:36'),
(87, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:11:18'),
(88, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:15:42'),
(89, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:16:28'),
(90, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:16:40'),
(91, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:16:54'),
(92, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:17:31'),
(93, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:17:50'),
(94, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:18:32'),
(95, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:18:49'),
(96, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-10 20:20:05'),
(97, 'Product Edited PRODUCT ID: 21', 1129, '2018-04-10 20:20:18'),
(98, 'Product Edited PRODUCT ID: 20', 1129, '2018-04-10 20:20:49'),
(99, 'Product Edited PRODUCT ID: 19', 1129, '2018-04-10 20:21:08'),
(100, 'Product Edited PRODUCT ID: 17', 1129, '2018-04-10 20:21:32'),
(101, 'ACCOUNT DE-ACTIVATED USER ID: 1131', 1130, '2018-04-10 20:25:21'),
(102, 'Order Status Processed ORDER ID: 1016', 1129, '2018-04-11 12:26:51'),
(103, 'Order Status Completed ORDER ID: 1016', 1129, '2018-04-11 12:26:57'),
(104, 'Order Status Processed ORDER ID: 1017', 1129, '2018-04-11 12:28:09'),
(105, 'Order Status Delivered ORDER ID: 1017', 1129, '2018-04-11 12:28:14'),
(106, 'Order Status Returned ORDER ID: 1017', 1129, '2018-04-11 12:28:23'),
(107, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-11 12:28:40'),
(108, 'PASSWORD RESSETED FOR USER ID: 1137', 1130, '2018-04-11 12:29:55'),
(109, 'Account activated FOR USER ID: 1131', 1130, '2018-04-11 12:31:07'),
(110, 'PASSWORD RESSETED FOR USER ID: 1131', 1130, '2018-04-11 12:32:04'),
(111, 'ACCOUNT DE-ACTIVATED USER ID: 1131', 1130, '2018-04-11 12:33:58'),
(112, 'Message Deleted CU_ID: 3', 1129, '2018-04-11 13:13:27'),
(113, 'Message Deleted CU_ID: 2', 1129, '2018-04-11 13:13:30'),
(114, 'Order Status Processed ORDER ID: 1018', 1129, '2018-04-11 19:12:05'),
(115, 'Order Status Delivered ORDER ID: 1018', 1129, '2018-04-11 19:12:09'),
(116, 'Order Status Returned ORDER ID: 1018', 1129, '2018-04-11 19:12:16'),
(117, 'Order Status Processed ORDER ID: 1019', 1129, '2018-04-11 19:13:16'),
(118, 'Order Status Delivered ORDER ID: 1019', 1129, '2018-04-11 19:13:24'),
(119, 'Order Status On Hold ORDER ID: 1019', 1129, '2018-04-11 19:13:30'),
(120, 'Order Status Completed ORDER ID: 1019', 1129, '2018-04-11 19:13:36'),
(121, 'Order Status Processed ORDER ID: 1020', 1129, '2018-04-11 19:14:16'),
(122, 'Order Status Delivered ORDER ID: 1020', 1129, '2018-04-11 19:14:41'),
(123, 'Order Status Completed ORDER ID: 1020', 1129, '2018-04-11 19:14:58'),
(124, 'Message Deleted CU_ID: 1', 1129, '2018-04-11 19:16:07'),
(125, 'Order Status Processed ORDER ID: 1021', 1129, '2018-04-11 19:33:40'),
(126, 'Order Status Delivered ORDER ID: 1021', 1129, '2018-04-11 19:33:47'),
(127, 'Order Status Returned ORDER ID: 1021', 1129, '2018-04-11 19:34:17'),
(128, 'Order Status Completed ORDER ID: 1021', 1129, '2018-04-11 19:34:28'),
(129, 'Message Deleted CU_ID: 2', 1129, '2018-04-11 19:35:38'),
(130, 'Message Deleted CU_ID: 3', 1129, '2018-04-11 19:36:19'),
(131, 'Order Status Processed ORDER ID: 1022', 1129, '2018-04-11 20:11:38'),
(132, 'Order Status Delivered ORDER ID: 1022', 1129, '2018-04-11 20:11:42'),
(133, 'Order Status On Hold ORDER ID: 1022', 1129, '2018-04-11 20:11:49'),
(134, 'Order Status Completed ORDER ID: 1022', 1129, '2018-04-11 20:12:06'),
(135, 'Product Edited PRODUCT ID: 22', 1129, '2018-04-13 16:30:43'),
(136, 'Product Edited PRODUCT ID: 17', 1129, '2018-04-13 16:30:57'),
(137, 'Product Added PRODUCT NAME: White Shorts with Gold Zipper', 1129, '2018-04-13 16:32:21'),
(138, 'Product Added PRODUCT NAME: Blue Shorts', 1129, '2018-04-13 16:34:10'),
(139, 'Product Edited PRODUCT ID: 24', 1129, '2018-04-13 16:34:23'),
(140, 'Product Added PRODUCT NAME: Maroon Shorts with White Stripes', 1129, '2018-04-13 16:35:52'),
(141, 'Product Added PRODUCT NAME: Maroon Shirt', 1129, '2018-04-13 16:36:48'),
(142, 'Product Added PRODUCT NAME: Blue Shirt', 1129, '2018-04-13 16:37:40'),
(143, 'Product Edited PRODUCT ID: 27', 1129, '2018-04-13 23:38:57'),
(144, 'Order Status Processed ORDER ID: 1024', 1129, '2018-04-14 00:08:25'),
(145, 'Order Status Delivered ORDER ID: 1024', 1129, '2018-04-14 00:09:27'),
(146, 'Order Status Returned ORDER ID: 1024', 1129, '2018-04-14 00:09:33'),
(147, 'Order Status Completed ORDER ID: 1024', 1129, '2018-04-14 00:09:38'),
(148, 'INSERTED NEW ACCOUNT USER: luis', 1130, '2018-04-14 01:53:02'),
(149, 'ACCOUNT DE-ACTIVATED USER ID: 1130', 1139, '2018-04-14 02:02:32'),
(150, 'Product Added PRODUCT NAME: Not Nice x Bears | Black Shirt', 1129, '2019-02-15 09:55:32'),
(151, 'Product Deleted PRODUCT ID: 19', 1129, '2019-02-15 09:58:21'),
(152, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-15 09:59:55'),
(153, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-15 10:01:43'),
(154, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-15 10:04:36'),
(155, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-15 10:05:16'),
(156, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-15 10:05:37'),
(157, 'Order Status Processed ORDER ID: 1037', 1129, '2019-02-19 14:31:26'),
(158, 'Product Added PRODUCT NAME: Not Nice | Maroon', 1129, '2019-02-19 15:10:20'),
(159, 'Product Deleted PRODUCT ID: 27', 1129, '2019-02-19 15:10:47'),
(160, 'Product Deleted PRODUCT ID: 26', 1129, '2019-02-19 15:10:52'),
(161, 'Product Deleted PRODUCT ID: 24', 1129, '2019-02-19 15:10:56'),
(162, 'Product Deleted PRODUCT ID: 25', 1129, '2019-02-19 15:10:59'),
(163, 'Product Deleted PRODUCT ID: 23', 1129, '2019-02-19 15:11:04'),
(164, 'Product Deleted PRODUCT ID: 22', 1129, '2019-02-19 15:11:07'),
(165, 'Product Deleted PRODUCT ID: 21', 1129, '2019-02-19 15:11:10'),
(166, 'Product Deleted PRODUCT ID: 20', 1129, '2019-02-19 15:11:14'),
(167, 'Product Deleted PRODUCT ID: 17', 1129, '2019-02-19 15:11:16'),
(168, 'Product Deleted PRODUCT ID: 17', 1129, '2019-02-19 15:11:18'),
(169, 'Product Deleted PRODUCT ID: 17', 1129, '2019-02-19 15:11:21'),
(170, 'Product Edited PRODUCT ID: 17', 1129, '2019-02-19 15:11:53'),
(171, 'Product Edited PRODUCT ID: 17', 1129, '2019-02-19 15:13:41'),
(172, 'Product Added PRODUCT NAME: Not Nice | Gray', 1129, '2019-02-19 23:59:43'),
(173, 'Product Added PRODUCT NAME: Not Nice x Bears | Gray Shirt', 1129, '2019-02-20 00:00:39'),
(174, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-20 00:01:34'),
(175, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-20 00:01:44'),
(176, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-20 00:05:31'),
(177, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-20 00:05:40'),
(178, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-20 00:05:47'),
(179, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-20 00:05:52'),
(180, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-20 00:06:20'),
(181, 'Product Edited PRODUCT ID: 28', 1129, '2019-02-20 00:06:29'),
(182, 'Product Added PRODUCT NAME: Not Nice | Black Ver. 1', 1129, '2019-02-24 00:10:18'),
(183, 'Product Added PRODUCT NAME: Not Nice | Black Ver. 2', 1129, '2019-02-24 00:10:38'),
(184, 'Product Added PRODUCT NAME: Not Nice | White Ver. 1', 1129, '2019-02-24 00:11:08'),
(185, 'Product Added PRODUCT NAME: Not Nice | White Ver. 2', 1129, '2019-02-24 00:11:27'),
(186, 'Product Added PRODUCT NAME: Not Nice | Yokunai', 1129, '2019-02-24 00:14:36'),
(187, 'Product Added PRODUCT NAME: Not Nice | Yokunai', 1129, '2019-02-24 00:15:04'),
(188, 'Product Edited PRODUCT ID: 35', 1129, '2019-02-24 00:16:56'),
(189, 'Product Edited PRODUCT ID: 35', 1129, '2019-02-24 00:17:48'),
(190, 'Product Edited PRODUCT ID: 35', 1129, '2019-02-24 00:17:50'),
(191, 'Product Edited PRODUCT ID: 34', 1129, '2019-02-24 00:18:21'),
(192, 'Product Edited PRODUCT ID: 33', 1129, '2019-02-24 00:18:37'),
(193, 'Product Edited PRODUCT ID: 32', 1129, '2019-02-24 00:18:45'),
(194, 'Product Edited PRODUCT ID: 30', 1129, '2019-02-24 00:19:07'),
(195, 'Product Edited PRODUCT ID: 17', 1129, '2019-02-24 00:19:48'),
(196, 'Product Edited PRODUCT ID: 17', 1129, '2019-02-24 00:26:11'),
(197, 'Product Edited PRODUCT ID: 34', 1129, '2019-02-24 00:26:28'),
(198, 'Product Edited PRODUCT ID: 32', 1129, '2019-02-24 00:27:18'),
(199, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-24 00:27:31'),
(200, 'Order Status Processed ORDER ID: 1038', 1129, '2019-02-24 10:39:29'),
(201, 'Order Status Processed ORDER ID: 1036', 1129, '2019-02-24 10:39:32'),
(202, 'Order Status Processed ORDER ID: 1025', 1129, '2019-02-24 10:39:34'),
(203, 'Order Status Delivered ORDER ID: 1025', 1129, '2019-02-24 10:39:37'),
(204, 'Order Status Completed ORDER ID: 1025', 1129, '2019-02-24 10:39:42'),
(205, 'Order Status Completed ORDER ID: 1036', 1129, '2019-02-24 10:39:45'),
(206, 'Order Status Completed ORDER ID: 1037', 1129, '2019-02-24 10:39:47'),
(207, 'Order Status Completed ORDER ID: 1038', 1129, '2019-02-24 10:39:51'),
(208, 'Order Status Processed ORDER ID: 1039', 1129, '2019-02-24 11:05:58'),
(209, 'Order Status Delivered ORDER ID: 1039', 1129, '2019-02-24 11:06:26'),
(210, 'Order Status Completed ORDER ID: 1039', 1129, '2019-02-24 11:06:30'),
(211, 'Order Status Processed ORDER ID: 1040', 1129, '2019-02-24 14:26:59'),
(212, 'Order Status Delivered ORDER ID: 1040', 1129, '2019-02-24 14:27:11'),
(213, 'Product Edited PRODUCT ID: 37', 1129, '2019-02-25 15:37:48'),
(214, 'Product Edited PRODUCT ID: 34', 1129, '2019-02-25 15:37:53'),
(215, 'Product Edited PRODUCT ID: 32', 1129, '2019-02-25 15:38:02'),
(216, 'Product Edited PRODUCT ID: 31', 1129, '2019-02-25 15:38:09'),
(217, 'Product Edited PRODUCT ID: 29', 1129, '2019-02-25 15:38:18'),
(218, 'Product Edited PRODUCT ID: 17', 1129, '2019-02-25 15:38:24'),
(219, 'Product Edited PRODUCT ID: 33', 1129, '2019-02-26 00:09:48'),
(220, 'Product Added PRODUCT NAME: Not Nice | Red Baseball Cap', 1129, '2019-02-26 00:12:42'),
(221, 'Product Added PRODUCT NAME: Not Nice | Black Baseball Cap', 1129, '2019-02-26 00:18:07'),
(222, 'Product Added PRODUCT NAME: Not Nice x Bears | Hair Pomade', 1129, '2019-02-26 00:21:50'),
(223, 'Product Edited PRODUCT ID: 36', 1129, '2019-02-26 01:07:36'),
(224, 'Order Status Processed ORDER ID: 1051', 1129, '2019-03-11 09:47:58'),
(225, 'Order Status Delivered ORDER ID: 1051', 1129, '2019-03-11 09:48:08'),
(226, 'Order Status Processed ORDER ID: 1052', 1129, '2019-03-11 09:49:13'),
(227, 'Order Status Delivered ORDER ID: 1052', 1129, '2019-03-11 09:49:19'),
(228, 'Order Status Completed ORDER ID: 1052', 1129, '2019-03-11 09:49:26'),
(229, 'Order Status Processed ORDER ID: 1053', 1129, '2019-03-11 09:49:31'),
(230, 'Order Status Delivered ORDER ID: 1053', 1129, '2019-03-11 09:49:39'),
(231, 'Order Status Completed ORDER ID: 1053', 1129, '2019-03-11 09:49:44'),
(232, 'Order Status Processed ORDER ID: 1058', 1129, '2019-03-11 10:15:46'),
(233, 'Order Status Delivered ORDER ID: 1058', 1129, '2019-03-11 10:15:58'),
(234, 'Order Status Completed ORDER ID: 1058', 1129, '2019-03-11 10:16:23'),
(235, 'Product Edited PRODUCT ID: 40', 1129, '2019-03-21 01:09:16'),
(236, 'Product Image Edited PRODUCT ID: 40', 1129, '2019-03-21 01:10:05'),
(237, 'Product Image Edited PRODUCT ID: 40', 1129, '2019-03-21 01:10:25'),
(238, 'Product Image Edited PRODUCT ID: 40', 1129, '2019-03-21 01:10:43'),
(239, 'Product Edited PRODUCT ID: 40', 1129, '2019-03-21 01:49:15'),
(240, 'Product Image Edited PRODUCT ID: 40', 1129, '2019-03-22 08:45:09'),
(241, 'Product Image Edited PRODUCT ID: 40', 1129, '2019-03-22 08:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `n` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `DET_ID` bigint(20) NOT NULL,
  `PROD_ID` bigint(20) NOT NULL,
  `ACNTS_ID` bigint(20) NOT NULL,
  `DatePurchased` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`DET_ID`, `PROD_ID`, `ACNTS_ID`, `DatePurchased`, `Quantity`) VALUES
(1, 17, 1151, '2019-03-24 18:49:57', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ORD_ID` bigint(20) NOT NULL,
  `ORD_PONo` bigint(20) NOT NULL,
  `PROD_ID` bigint(20) NOT NULL,
  `CUST_ID` bigint(20) NOT NULL,
  `ORD_Price` int(11) NOT NULL,
  `ORD_Quantity` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PROD_ID` bigint(20) NOT NULL,
  `PROD_Name` varchar(50) NOT NULL,
  `PROD_Price` decimal(10,2) NOT NULL,
  `PROD_Category` varchar(30) NOT NULL,
  `PROD_InStock` int(11) NOT NULL,
  `PROD_Img` varchar(500) NOT NULL,
  `PROD_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PROD_ID`, `PROD_Name`, `PROD_Price`, `PROD_Category`, `PROD_InStock`, `PROD_Img`, `PROD_Description`) VALUES
(17, 'Not Nice | Red', '650.00', 'Women', 1166, 'nn_redBlack.jpg', 'Basic Tee | 100% Cotton | Made in Philippines'),
(28, 'Not Nice x Bears | Black Shirt', '550.00', 'Men', 454, 'nn_bears1.jpg', 'A collaboration with Bears MNL | 100% Cotton | Made in Philippines'),
(29, 'Not Nice | Maroon', '650.00', 'Women', 77, 'nn_maroon2.jpg', 'With the official logo of Not Nice in front | 100% Cotton | Made in Philippines'),
(30, 'Not Nice | Gray', '650.00', 'Men', 80, 'nn_grayBlack.jpg', 'Basic Tee | 100% Cotton | Made in Philippines'),
(31, 'Not Nice x Bears | Gray Shirt', '650.00', 'Women', 118, 'nn_bears2.jpg', 'A collaboration with Bears MNL | 100% Cotton | Made in Philippines'),
(32, 'Not Nice | Black Ver. 1', '550.00', 'Women', 250, 'nn_BlackB.jpg', 'Basic Tee | 100% Cotton | Made in Philippines'),
(33, 'Not Nice | Black Ver. 2', '550.00', 'Men', 126, 'nn_BlackF.jpg', 'Basic Tee | 100% Cotton | Made in Philippines'),
(34, 'Not Nice | White Ver. 1', '550.00', 'Women', 150, 'nn_whiteB.jpg', 'Basic Tee | 100% Cotton | Made in Philippines'),
(35, 'Not Nice | White Ver. 2', '550.00', 'Men', 100, 'nn_WhiteF.jpg', 'Basic Tee | 100% Cotton | Made in Philippines'),
(36, 'Not Nice | Yokunai', '650.00', 'Men', 200, 'nn_yokunaiB.jpg', 'Japanese Tee | 100% Cotton | Made in Philippines'),
(37, 'Not Nice | Yokunai', '550.00', 'Women', 96, 'nn_yokunaiW.jpg', 'Japanese Tee | 100% Cotton | Made in Philippines'),
(38, 'Not Nice | Red Baseball Cap', '350.00', 'Accessories', 91, 'nn_capR.jpg', '100% Cotton | Free Size | Made in Philippines'),
(39, 'Not Nice | Black Baseball Cap', '350.00', 'Accessories', 100, 'nn_capB.jpg', '100% Cotton | Free Size | Made in Philippines'),
(40, 'Not Nice x Bears | Hair Pomade', '500.00', 'Accessories', 100, 'nn_bearsPom.jpg', 'Exclusively for Men | Premium formulated | Made in Philippines ');

-- --------------------------------------------------------

--
-- Table structure for table `returndb`
--

CREATE TABLE `returndb` (
  `PO_NO` bigint(20) NOT NULL,
  `PROD_Name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ACNTS_ID`),
  ADD UNIQUE KEY `ACNTS_UName` (`ACNTS_UName`),
  ADD UNIQUE KEY `ACNTS_UName_2` (`ACNTS_UName`),
  ADD UNIQUE KEY `ACNTS_UName_3` (`ACNTS_UName`);

--
-- Indexes for table `contactusmessages`
--
ALTER TABLE `contactusmessages`
  ADD PRIMARY KEY (`CU_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `finalorders`
--
ALTER TABLE `finalorders`
  ADD PRIMARY KEY (`PO_NO`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`DET_ID`),
  ADD KEY `PROD_ID` (`PROD_ID`),
  ADD KEY `ACNTS_ID` (`ACNTS_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ORD_ID`),
  ADD UNIQUE KEY `PROD_ID` (`PROD_ID`),
  ADD UNIQUE KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PROD_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ACNTS_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1153;

--
-- AUTO_INCREMENT for table `contactusmessages`
--
ALTER TABLE `contactusmessages`
  MODIFY `CU_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMP_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `finalorders`
--
ALTER TABLE `finalorders`
  MODIFY `PO_NO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1060;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `DET_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ORD_ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PROD_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`PROD_ID`) REFERENCES `products` (`PROD_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ACNTS_ID`) REFERENCES `accounts` (`ACNTS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
