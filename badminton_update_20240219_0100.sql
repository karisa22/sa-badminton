-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 06:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badminton`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_desc` varchar(1024) NOT NULL,
  `activity_type_id` int(11) NOT NULL,
  `activity_type_name` varchar(255) NOT NULL,
  `activity_start_time` datetime NOT NULL,
  `activity_end_time` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `edit_by` int(11) NOT NULL,
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_desc`, `activity_type_id`, `activity_type_name`, `activity_start_time`, `activity_end_time`, `create_date`, `edit_date`, `create_by`, `edit_by`, `del`) VALUES
(2, 'news', 'ข่าวทั่วไป', 2, 'advertise', '2024-01-20 17:14:12', '2035-01-01 17:14:12', '2024-01-20 17:14:12', '2024-01-20 17:14:12', 0, 0, 0),
(3, 'activity', 'กิจกรรมทั่วไป', 3, 'activity', '2024-01-20 17:24:58', '2035-01-01 23:24:59', '2024-01-20 17:24:58', '2024-01-20 17:24:58', 0, 0, 0),
(4, 'facilities', 'สิ่งอำนวยความสะดวก', 4, 'facilities', '2024-01-20 17:29:12', '2035-01-01 17:29:12', '2024-01-20 17:29:12', '2024-01-20 17:29:12', 0, 0, 0),
(5, 'rules', 'ประกาศกฎการใช้งานสนามแบต', 5, 'rules', '2024-01-20 17:33:58', '2099-01-20 17:33:58', '2024-01-20 17:33:58', '2024-01-20 17:33:58', 0, 0, 0),
(6, 'New Year 2024', 'แจ้งวันหยุด 29-31 ธันวาและ 1 มกรา', 2, 'advertise', '2024-01-01 17:14:12', '2025-01-20 17:14:12', '2024-01-20 17:14:12', '2024-02-19 00:14:41', 0, 1, 0),
(16, 'กิจกรรมตรุษจีน', 'กิจกรรมวันตรุษจีน ประจำปี 2567', 3, 'activity', '2024-02-19 00:01:00', '2024-02-19 03:00:00', '2024-02-19 00:02:19', '2024-02-19 00:08:45', 33, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 't_user',
  `court_id` int(11) NOT NULL COMMENT 'm_court',
  `booking_start_time` datetime NOT NULL,
  `booking_end_time` datetime NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_type_name` varchar(255) NOT NULL,
  `payment_id` int(11) DEFAULT NULL COMMENT 't_payment',
  `booking_status` tinyint(4) NOT NULL DEFAULT 1,
  `booking_price` decimal(10,2) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `edit_by` int(11) DEFAULT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `court_id`, `booking_start_time`, `booking_end_time`, `payment_type_id`, `payment_type_name`, `payment_id`, `booking_status`, `booking_price`, `promotion_id`, `create_date`, `edit_date`, `create_by`, `edit_by`, `del`) VALUES
(109, 1, 1, '2024-02-16 17:00:00', '2024-02-16 18:30:00', 1, '', 68, 1, 150.00, NULL, '2024-02-16 01:47:00', '2024-02-16 01:49:39', 1, 1, 0),
(110, 33, 1, '2024-02-17 15:00:00', '2024-02-17 17:00:00', 1, '', 65, 2, 200.00, NULL, '2024-02-16 01:47:17', '2024-02-16 01:49:22', 33, 1, 0),
(111, 1, 2, '2024-02-17 16:00:00', '2024-02-17 18:00:00', 1, '', 66, 2, 200.00, NULL, '2024-02-16 01:47:25', '2024-02-16 01:49:24', 1, 33, 0),
(112, 33, 1, '2024-02-17 12:00:00', '2024-02-17 14:00:00', 1, '', 67, 2, 200.00, NULL, '2024-02-16 01:48:18', '2024-02-16 01:49:41', 33, 33, 0),
(113, 33, 1, '2024-02-18 12:00:00', '2024-02-18 12:30:00', 1, '', 69, 1, 50.00, NULL, '2024-02-16 01:50:01', '2024-02-16 01:50:26', 33, 33, 0),
(114, 33, 1, '2024-02-18 17:00:00', '2024-02-18 18:30:00', 1, '', 70, 2, 150.00, NULL, '2024-02-16 01:50:10', '2024-02-16 01:50:32', 33, 33, 0),
(115, 33, 1, '2024-02-18 20:00:00', '2024-02-18 21:00:00', 1, '', NULL, 1, 150.00, NULL, '2024-02-16 01:50:19', NULL, 33, 33, 0),
(116, 1, 1, '2024-02-16 20:00:00', '2024-02-16 21:30:00', 1, '', NULL, 1, 225.00, NULL, '2024-02-16 01:50:27', NULL, 1, 1, 0),
(117, 33, 1, '2024-02-17 17:00:00', '2024-02-17 19:00:00', 1, '', NULL, 1, 200.00, NULL, '2024-02-16 01:51:54', NULL, 33, 33, 0),
(118, 1, 1, '2024-02-19 17:00:00', '2024-02-19 18:30:00', 1, 'เงินโอน', NULL, 1, 150.00, NULL, '2024-02-17 21:49:35', NULL, 1, 1, 0),
(119, 33, 2, '2024-02-20 17:00:00', '2024-02-20 18:00:00', 1, 'เงินโอน', 73, 1, 100.00, NULL, '2024-02-18 00:28:38', '2024-02-18 00:30:39', 33, 33, 0),
(120, 33, 1, '2024-02-19 20:00:00', '2024-02-19 21:30:00', 2, 'เงินสด', 72, 1, 225.00, NULL, '2024-02-18 00:29:04', '2024-02-18 00:30:23', 33, 33, 0),
(121, 33, 4, '2024-02-20 18:00:00', '2024-02-20 20:00:00', 2, 'เงินสด', 71, 1, 300.00, NULL, '2024-02-18 00:29:37', '2024-02-18 00:30:07', 33, 33, 0),
(122, 31, 1, '2024-02-20 12:00:00', '2024-02-20 14:00:00', 1, 'เงินโอน', 75, 1, 200.00, NULL, '2024-02-18 00:38:26', '2024-02-18 00:56:08', 31, 31, 0),
(123, 31, 3, '2024-02-20 15:00:00', '2024-02-20 17:00:00', 1, 'เงินโอน', 74, 1, 200.00, NULL, '2024-02-18 00:39:07', '2024-02-18 00:55:54', 31, 31, 0),
(124, 33, 1, '2024-02-19 12:00:00', '2024-02-19 14:00:00', 1, 'เงินโอน', NULL, 1, 200.00, NULL, '2024-02-18 01:15:17', NULL, 33, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` int(11) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `court_image` varchar(32) NOT NULL COMMENT 'm_image',
  `court_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `court`
--

INSERT INTO `court` (`court_id`, `court_name`, `court_image`, `court_status`) VALUES
(1, 'court 1', 'court_1.jpg', 0),
(2, 'court 2', 'court_2.jpg', 0),
(3, 'court 3', 'court_3.jpg', 0),
(4, 'court 4', 'court_4.jpg', 0),
(5, 'court 5', 'court_5.jpg', 0),
(6, 'court 6', 'court_6.jpg', 0),
(17, 'แสนสุข', 'high.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(32) NOT NULL,
  `activity_id` int(11) NOT NULL COMMENT 't_activity',
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 'user_id',
  `edit_by` int(11) NOT NULL COMMENT 'user_id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `image_name`, `activity_id`, `create_date`, `edit_date`, `create_by`, `edit_by`) VALUES
(3, '18.jpg', 2, '2024-01-20 17:21:34', '2024-01-20 17:21:34', 0, 0),
(6, '82.jpg', 3, '2024-01-20 17:25:34', '2024-01-20 17:25:34', 0, 0),
(7, '81.jpg', 3, '2024-01-20 17:25:49', '2024-01-20 17:25:49', 0, 0),
(8, '80.jpg', 3, '2024-01-20 17:26:03', '2024-01-20 17:26:03', 0, 0),
(9, '79.jpg', 3, '2024-01-20 17:26:14', '2024-01-20 17:26:14', 0, 0),
(10, '78.jpg', 3, '2024-01-20 17:26:37', '2024-01-20 17:26:37', 0, 0),
(11, '77.jpg', 3, '2024-01-20 17:26:52', '2024-01-20 17:26:52', 0, 0),
(12, '39.jpg', 4, '2024-01-20 17:29:34', '2024-01-20 17:29:34', 0, 0),
(14, '37.jpg', 4, '2024-01-20 17:30:10', '2024-01-20 17:30:10', 0, 0),
(15, '41.jpg', 4, '2024-01-20 17:30:21', '2024-01-20 17:30:21', 0, 0),
(16, '40.jpg', 4, '2024-01-20 17:30:33', '2024-01-20 17:30:33', 0, 0),
(17, '36.jpg', 4, '2024-01-20 17:30:45', '2024-01-20 17:30:45', 0, 0),
(18, '35.jpg', 4, '2024-01-20 17:30:58', '2024-01-20 17:30:58', 0, 0),
(19, '87.jpg', 5, '2024-01-20 17:34:36', '2024-01-20 17:34:36', 0, 0),
(24, '55.jpg', 2, '2024-02-05 16:16:53', '2024-02-05 16:16:53', 15, 15),
(25, '53.jpg', 2, '2024-02-05 16:18:30', '2024-02-05 16:18:30', 15, 15),
(26, '17.jpg', 2, '2024-02-05 16:19:18', '2024-02-05 16:19:18', 15, 15),
(29, '113.jpg', 2, '2024-02-05 16:34:09', '2024-02-05 16:34:09', 15, 15),
(31, '96.jpg', 6, '2024-02-05 16:34:56', '2024-02-05 16:34:56', 15, 15),
(32, '68.jpg', 2, '2024-02-05 16:40:55', '2024-02-05 16:40:55', 15, 15),
(33, '69.jpg', 2, '2024-02-05 16:41:21', '2024-02-05 16:41:21', 15, 15),
(35, '44.jpg', 3, '2024-02-11 21:46:38', '2024-02-11 21:46:38', 26, 26),
(36, '45.jpg', 3, '2024-02-11 21:46:53', '2024-02-11 21:46:53', 26, 26),
(37, '47.jpg', 3, '2024-02-11 21:47:08', '2024-02-11 21:47:08', 26, 26),
(38, '48.jpg', 3, '2024-02-11 21:47:23', '2024-02-11 21:47:23', 26, 26),
(39, '49.jpg', 3, '2024-02-11 21:47:36', '2024-02-11 21:47:36', 26, 26),
(40, '56.jpg', 3, '2024-02-11 21:48:09', '2024-02-11 21:48:09', 26, 26),
(41, '57.jpg', 3, '2024-02-11 21:48:21', '2024-02-11 21:48:21', 26, 26),
(42, '58.jpg', 3, '2024-02-11 21:48:32', '2024-02-11 21:48:32', 26, 26),
(43, '59.jpg', 3, '2024-02-11 21:48:42', '2024-02-11 21:48:42', 26, 26),
(45, '71.jpg', 3, '2024-02-11 21:49:39', '2024-02-11 21:49:39', 26, 26),
(46, '72.jpg', 3, '2024-02-11 21:49:49', '2024-02-11 21:49:49', 26, 26),
(47, '73.jpg', 3, '2024-02-11 21:50:05', '2024-02-11 21:50:05', 26, 26),
(48, '97.jpg', 3, '2024-02-11 21:50:55', '2024-02-11 21:50:55', 26, 26),
(49, '98.jpg', 3, '2024-02-11 21:51:06', '2024-02-11 21:51:06', 26, 26),
(50, '99.jpg', 3, '2024-02-11 21:51:19', '2024-02-11 21:51:19', 26, 26),
(52, '101.jpg', 3, '2024-02-11 21:52:50', '2024-02-11 21:52:50', 26, 26),
(53, '104.jpg', 3, '2024-02-11 21:53:03', '2024-02-11 21:53:03', 26, 26),
(54, '105.jpg', 3, '2024-02-11 21:53:21', '2024-02-11 21:53:21', 26, 26),
(55, '106.jpg', 3, '2024-02-11 21:53:32', '2024-02-11 21:53:32', 26, 26),
(56, '109.jpg', 3, '2024-02-11 21:53:49', '2024-02-11 21:53:49', 26, 26),
(57, '111.jpg', 3, '2024-02-11 21:54:04', '2024-02-11 21:54:04', 26, 26),
(59, '115.jpg', 3, '2024-02-11 21:54:34', '2024-02-11 21:54:34', 26, 26),
(60, '116.jpg', 3, '2024-02-11 21:54:45', '2024-02-11 21:54:45', 26, 26),
(62, '25.jpg', 4, '2024-02-12 00:01:03', '2024-02-12 00:01:03', 26, 26),
(65, '31.JPG', 4, '2024-02-12 00:14:15', '2024-02-12 00:14:15', 1, 1),
(66, '29.JPG', 4, '2024-02-12 00:17:02', '2024-02-12 00:17:02', 26, 26),
(67, '34.JPG', 4, '2024-02-12 00:17:50', '2024-02-12 00:17:50', 26, 26),
(68, '23.jpg', 4, '2024-02-12 00:19:48', '2024-02-12 00:19:48', 26, 26),
(69, '33.JPG', 4, '2024-02-12 00:21:15', '2024-02-12 00:21:15', 26, 26),
(70, 'lunar.jpg', 16, '2024-02-19 00:45:09', '2024-02-19 00:45:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `payment_type_name`) VALUES
(1, 'เงินโอน'),
(2, 'เงินสด');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `promotion_desc` varchar(255) NOT NULL,
  `promotion_price` decimal(10,2) NOT NULL,
  `promotion_start_time` datetime NOT NULL,
  `promotion_end_time` datetime NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `del` tinyint(1) NOT NULL COMMENT '0:active , 1 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_name`, `promotion_desc`, `promotion_price`, `promotion_start_time`, `promotion_end_time`, `create_date`, `del`) VALUES
(3, 'ก่อน 5 โมงเย็น', '', 100.00, '2024-01-01 00:00:00', '2024-01-01 17:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `payment_id` int(11) NOT NULL,
  `payment_price` decimal(10,2) NOT NULL COMMENT '50-2400',
  `image_name` varchar(200) NOT NULL,
  `paid_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`payment_id`, `payment_price`, `image_name`, `paid_date`, `create_date`, `create_by`, `del`) VALUES
(65, 200.00, '', '2024-02-16 01:48:49', '2024-02-16 01:48:49', 33, 0),
(66, 200.00, '', '2024-02-16 01:48:54', '2024-02-16 01:48:54', 33, 0),
(67, 200.00, '', '2024-02-16 01:49:36', '2024-02-16 01:49:36', 33, 0),
(68, 150.00, '', '2024-02-16 01:49:39', '2024-02-16 01:49:39', 33, 0),
(69, 50.00, '', '2024-02-16 01:50:26', '2024-02-16 01:50:26', 33, 0),
(70, 150.00, '', '2024-02-16 01:50:29', '2024-02-16 01:50:29', 33, 0),
(71, 300.00, '3BCC35B7-25E4-42E3-9816-CB5E1F454F77.jpg', '2024-02-18 00:30:07', '2024-02-18 00:30:07', 33, 0),
(72, 225.00, '8E5CA5DE-50F4-49D8-BB88-97EDAA2CCE73.jpg', '2024-02-18 00:30:23', '2024-02-18 00:30:23', 33, 0),
(73, 100.00, 'DBE83723-0EF2-4049-94E6-C7466997ED3D.jpg', '2024-02-18 00:30:39', '2024-02-18 00:30:39', 33, 0),
(74, 200.00, '8E5CA5DE-50F4-49D8-BB88-97EDAA2CCE73.jpg', '2024-02-18 00:55:54', '2024-02-18 00:55:54', 31, 0),
(75, 200.00, '11.jpg', '2024-02-18 00:56:08', '2024-02-18 00:56:08', 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_tel` varchar(32) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT 'm_user_type',
  `user_type_name` varchar(255) NOT NULL,
  `image_name` varchar(50) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `edit_by` int(11) DEFAULT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_tel`, `user_username`, `user_password`, `user_type`, `user_type_name`, `image_name`, `create_date`, `edit_date`, `create_by`, `edit_by`, `del`) VALUES
(1, 'super_admin', '0818188216', 'admin', 'ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270', 1, 'admin', '7.jpg', '2024-01-01 17:12:08', '2024-01-01 17:12:08', 1, 1, 0),
(24, 'karisa', '0812223333', 'karisa', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, 'member', NULL, '2024-02-07 21:29:36', '2024-02-07 21:29:36', 0, 0, 1),
(25, 'saichon', '0808188211', 'saichon', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, 'member', NULL, '2024-02-07 21:49:27', '2024-02-07 21:49:27', 0, 0, 0),
(26, 'switch', '0606166214', 'switch', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 'admin', NULL, '2024-02-07 22:04:40', '2024-02-07 22:04:40', 1, 1, 0),
(27, 'delete', '0919199218', 'delete', 'f931c308fc5b60b421c09969912839dff2776957d98b8d2f91c554ed8fc80f78', 2, 'member', NULL, '2024-02-07 23:18:23', '2024-02-07 23:18:23', 0, 0, 1),
(28, 'Kodchamon', '0852365412', 'katai', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'member', NULL, '2024-02-07 23:37:26', '2024-02-07 23:37:26', 0, 0, 0),
(29, 'test', '0901112222', 'test', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 2, 'member', NULL, '2024-02-08 00:46:09', '2024-02-08 00:46:09', 0, 0, 1),
(30, 'Ongsa', '0856321456', 'ongsa', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'member', NULL, '2024-02-12 01:20:24', '2024-02-12 01:20:24', 0, 0, 0),
(31, 'Guide', '0854236517', 'guide', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'member', NULL, '2024-02-12 01:21:55', '2024-02-12 01:21:55', 0, 0, 0),
(32, 'Fern', '0874521563', 'fern', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'member', NULL, '2024-02-12 01:22:25', '2024-02-12 01:22:25', 0, 0, 0),
(33, 'Admin Ongsa', '0985365212', 'admin_ongsa', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 'admin', NULL, '2024-02-12 01:46:05', '2024-02-12 01:46:05', 1, 1, 0),
(34, 'Piyachat', '0892781922', 'nan', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 'member', NULL, '2024-02-12 16:07:31', '2024-02-12 16:07:31', 0, 0, 0),
(35, 'boya', '0900001111', 'boya', '9e4633d8746b59a6aec1c82f2f7c49fc3e49ac70b6b3803f96752dff8c481af2', 2, 'member', NULL, '2024-02-13 17:16:44', '2024-02-13 17:16:44', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`,`user_id`,`court_id`,`payment_type_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_type_id` (`payment_type_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `promotion_id` (`promotion_id`),
  ADD KEY `court_id` (`court_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`,`activity_id`) USING BTREE,
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`payment_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`user_type`) USING BTREE,
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `receipt` (`payment_id`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`promotion_id`),
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`court_id`) REFERENCES `court` (`court_id`),
  ADD CONSTRAINT `booking_ibfk_6` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`user_type_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `AutoCancelBooking` ON SCHEDULE EVERY 1 DAY STARTS '2024-01-20 00:00:00' ON COMPLETION PRESERVE ENABLE DO UPDATE booking SET booking_status = '3' WHERE booking_status = '1' AND payment_id IS NULL$$

CREATE DEFINER=`root`@`localhost` EVENT `Test30MAutoCancel` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE booking SET booking_status = '3' WHERE booking_status = '1' AND payment_id IS NULL AND create_date <(NOW() - INTERVAL 30 MINUTE)$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
