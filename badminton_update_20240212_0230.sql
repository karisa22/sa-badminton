-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 08:33 PM
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
-- Table structure for table `m_court`
--

CREATE TABLE `m_court` (
  `court_id` int(11) NOT NULL,
  `court_name` varchar(255) NOT NULL,
  `court_image` varchar(32) NOT NULL COMMENT 'm_image',
  `court_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `m_court`
--

INSERT INTO `m_court` (`court_id`, `court_name`, `court_image`, `court_status`) VALUES
(1, 'court 1', 'court_1.jpg', 0),
(2, 'court 2', 'court_2.jpg', 0),
(3, 'court 3', 'court_3.jpg', 0),
(4, 'court 4', 'court_4.jpg', 0),
(5, 'court 5', 'court_5.jpg', 0),
(6, 'court 6', 'court_6.jpg', 0),
(17, 'แสนสุข', 'high.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_image`
--

CREATE TABLE `m_image` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(32) NOT NULL,
  `activity_id` int(11) NOT NULL COMMENT 't_activity',
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 'user_id',
  `edit_by` int(11) NOT NULL COMMENT 'user_id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `m_image`
--

INSERT INTO `m_image` (`image_id`, `image_name`, `activity_id`, `create_date`, `edit_date`, `create_by`, `edit_by`) VALUES
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
(31, '96.jpg', 2, '2024-02-05 16:34:56', '2024-02-05 16:34:56', 15, 15),
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
(69, '33.JPG', 4, '2024-02-12 00:21:15', '2024-02-12 00:21:15', 26, 26);

-- --------------------------------------------------------

--
-- Table structure for table `m_payment_type`
--

CREATE TABLE `m_payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `m_payment_type`
--

INSERT INTO `m_payment_type` (`payment_type_id`, `payment_type_name`) VALUES
(1, 'เงินโอน'),
(2, 'เงินสด');

-- --------------------------------------------------------

--
-- Table structure for table `m_promotion`
--

CREATE TABLE `m_promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(255) NOT NULL,
  `promotion_price` decimal(10,2) NOT NULL,
  `promotion_start_time` datetime NOT NULL,
  `promotion_end_time` datetime NOT NULL,
  `del` tinyint(1) NOT NULL COMMENT '0:active , 1 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `m_promotion`
--

INSERT INTO `m_promotion` (`promotion_id`, `promotion_name`, `promotion_price`, `promotion_start_time`, `promotion_end_time`, `del`) VALUES
(3, 'ก่อน 5 โมงเย็น', 100.00, '2024-01-01 00:00:00', '2024-01-01 17:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `m_user_type`
--

CREATE TABLE `m_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `m_user_type`
--

INSERT INTO `m_user_type` (`user_type_id`, `user_type_name`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `t_activity`
--

CREATE TABLE `t_activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_desc` varchar(1024) NOT NULL,
  `activity_start_time` datetime NOT NULL,
  `activity_end_time` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL,
  `edit_by` int(11) NOT NULL,
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `t_activity`
--

INSERT INTO `t_activity` (`activity_id`, `activity_name`, `activity_desc`, `activity_start_time`, `activity_end_time`, `create_date`, `edit_date`, `create_by`, `edit_by`, `del`) VALUES
(2, 'advertise', 'advertise', '2024-01-20 17:14:12', '2025-01-20 17:14:12', '2024-01-20 17:14:12', '2024-01-20 17:14:12', 0, 0, 0),
(3, 'activity', 'activity', '2024-01-20 17:24:58', '2025-01-20 23:24:59', '2024-01-20 17:24:58', '2024-01-20 17:24:58', 0, 0, 0),
(4, 'facilities', 'facilities', '2024-01-20 17:29:12', '2025-01-20 17:29:12', '2024-01-20 17:29:12', '2024-01-20 17:29:12', 0, 0, 0),
(5, 'rules', 'rules', '2024-01-20 17:33:58', '2099-01-20 17:33:58', '2024-01-20 17:33:58', '2024-01-20 17:33:58', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_booking`
--

CREATE TABLE `t_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 't_user',
  `court_id` int(11) NOT NULL COMMENT 'm_court',
  `booking_start_time` datetime NOT NULL,
  `booking_end_time` datetime NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT NULL COMMENT 't_payment',
  `booking_status` tinyint(4) NOT NULL DEFAULT 1,
  `booking_amount` decimal(10,2) NOT NULL,
  `promotion_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `edit_by` int(11) DEFAULT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `t_booking`
--

INSERT INTO `t_booking` (`booking_id`, `user_id`, `court_id`, `booking_start_time`, `booking_end_time`, `payment_type_id`, `payment_id`, `booking_status`, `booking_amount`, `promotion_id`, `create_date`, `edit_date`, `create_by`, `edit_by`, `del`) VALUES
(70, 1, 6, '2024-02-12 12:00:00', '2024-02-12 14:00:00', 2, NULL, 1, 200.00, NULL, '2024-02-10 00:23:13', NULL, 1, 1, 0),
(71, 1, 6, '2024-02-12 12:00:00', '2024-02-12 14:00:00', 2, NULL, 1, 200.00, NULL, '2024-02-10 00:23:15', NULL, 1, 1, 0),
(72, 26, 4, '2024-02-11 17:30:00', '2024-02-11 18:30:00', 2, 45, 2, 150.00, NULL, '2024-02-11 16:56:38', '2024-02-11 17:25:47', 26, 26, 0),
(73, 31, 1, '2024-02-12 15:00:00', '2024-02-12 16:00:00', 2, 48, 2, 100.00, NULL, '2024-02-12 01:23:37', '2024-02-12 01:40:01', 31, 26, 0),
(74, 31, 2, '2024-02-13 17:00:00', '2024-02-13 18:30:00', 1, 47, 2, 150.00, NULL, '2024-02-12 01:24:21', '2024-02-12 01:40:10', 31, 26, 0),
(75, 31, 5, '2024-02-14 18:00:00', '2024-02-14 19:30:00', 1, 46, 2, 225.00, NULL, '2024-02-12 01:25:03', '2024-02-12 01:40:31', 31, 26, 0),
(76, 31, 1, '2024-02-12 13:00:00', '2024-02-12 14:00:00', 2, 49, 3, 100.00, NULL, '2024-02-12 01:28:45', '2024-02-12 01:28:55', 31, 31, 0),
(77, 32, 1, '2024-02-13 14:00:00', '2024-02-13 15:00:00', 1, 50, 2, 100.00, NULL, '2024-02-12 01:29:46', '2024-02-12 01:41:09', 32, 26, 0),
(78, 32, 1, '2024-02-14 19:00:00', '2024-02-14 21:00:00', 1, 51, 2, 300.00, NULL, '2024-02-12 01:30:06', '2024-02-12 01:41:20', 32, 26, 0),
(79, 32, 1, '2024-02-12 20:00:00', '2024-02-12 20:30:00', 2, 52, 3, 75.00, NULL, '2024-02-12 01:30:28', '2024-02-12 01:32:09', 32, 32, 0),
(80, 32, 3, '2024-02-14 14:00:00', '2024-02-14 14:30:00', 2, 53, 2, 50.00, NULL, '2024-02-12 01:31:03', '2024-02-12 01:41:41', 32, 26, 0),
(81, 32, 2, '2024-02-14 14:00:00', '2024-02-14 15:00:00', 2, 54, 2, 100.00, NULL, '2024-02-12 01:31:28', '2024-02-12 01:41:48', 32, 26, 0),
(82, 30, 1, '2024-02-14 18:00:00', '2024-02-14 19:00:00', 2, 55, 3, 150.00, NULL, '2024-02-12 01:33:32', '2024-02-12 01:36:10', 30, 30, 0),
(83, 30, 4, '2024-02-13 18:00:00', '2024-02-13 19:30:00', 1, 60, 2, 225.00, NULL, '2024-02-12 01:33:56', '2024-02-12 01:42:14', 30, 26, 0),
(84, 30, 5, '2024-02-13 17:00:00', '2024-02-13 18:00:00', 1, 59, 3, 100.00, NULL, '2024-02-12 01:34:18', '2024-02-12 01:37:35', 30, 30, 0),
(85, 30, 5, '2024-02-13 16:00:00', '2024-02-13 16:30:00', 1, 58, 3, 50.00, NULL, '2024-02-12 01:34:43', '2024-02-12 01:37:18', 30, 30, 0),
(86, 30, 5, '2024-02-13 14:00:00', '2024-02-13 15:30:00', 2, 57, 2, 150.00, NULL, '2024-02-12 01:35:07', '2024-02-12 01:42:39', 30, 26, 0),
(87, 30, 3, '2024-02-14 12:00:00', '2024-02-14 13:30:00', 1, 56, 2, 150.00, NULL, '2024-02-12 01:35:54', '2024-02-12 01:42:46', 30, 26, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_payment`
--

CREATE TABLE `t_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL COMMENT '50-2400',
  `image_name` varchar(200) NOT NULL,
  `paid_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `t_payment`
--

INSERT INTO `t_payment` (`payment_id`, `payment_amount`, `image_name`, `paid_date`, `create_date`, `create_by`, `del`) VALUES
(45, 150.00, '', '2024-02-11 16:57:33', '2024-02-11 16:57:33', 26, 0),
(46, 225.00, '', '2024-02-12 01:26:05', '2024-02-12 01:26:05', 31, 0),
(47, 150.00, 'DBE83723-0EF2-4049-94E6-C7466997ED3D.jpg', '2024-02-12 01:27:32', '2024-02-12 01:27:32', 31, 0),
(48, 100.00, '', '2024-02-12 01:27:45', '2024-02-12 01:27:45', 31, 0),
(49, 100.00, '', '2024-02-12 01:28:55', '2024-02-12 01:28:55', 31, 0),
(50, 100.00, '8E5CA5DE-50F4-49D8-BB88-97EDAA2CCE73.jpg', '2024-02-12 01:31:44', '2024-02-12 01:31:44', 32, 0),
(51, 300.00, '1C8212B4-F7BF-4384-9241-12CE754937B7.jpg', '2024-02-12 01:32:00', '2024-02-12 01:32:00', 32, 0),
(52, 75.00, '', '2024-02-12 01:32:09', '2024-02-12 01:32:09', 32, 0),
(53, 50.00, '', '2024-02-12 01:32:18', '2024-02-12 01:32:18', 32, 0),
(54, 100.00, '', '2024-02-12 01:32:26', '2024-02-12 01:32:26', 32, 0),
(55, 150.00, '1C8212B4-F7BF-4384-9241-12CE754937B7.jpg', '2024-02-12 01:36:10', '2024-02-12 01:36:10', 30, 0),
(56, 150.00, '3BCC35B7-25E4-42E3-9816-CB5E1F454F77.jpg', '2024-02-12 01:36:27', '2024-02-12 01:36:27', 30, 0),
(57, 150.00, '1C8212B4-F7BF-4384-9241-12CE754937B7.jpg', '2024-02-12 01:36:45', '2024-02-12 01:36:45', 30, 0),
(58, 50.00, '0A931A78-49F0-42C6-B6A2-E9099CD4037B.jpg', '2024-02-12 01:37:18', '2024-02-12 01:37:18', 30, 0),
(59, 100.00, 'DBE83723-0EF2-4049-94E6-C7466997ED3D.jpg', '2024-02-12 01:37:35', '2024-02-12 01:37:35', 30, 0),
(60, 225.00, '8E5CA5DE-50F4-49D8-BB88-97EDAA2CCE73.jpg', '2024-02-12 01:37:50', '2024-02-12 01:37:50', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_tel` varchar(32) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT 'm_user_type',
  `image_name` varchar(50) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `edit_date` datetime DEFAULT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `edit_by` int(11) DEFAULT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_name`, `user_tel`, `user_username`, `user_password`, `user_type`, `image_name`, `create_date`, `edit_date`, `create_by`, `edit_by`, `del`) VALUES
(1, 'super_admin', '0818188216', 'admin', 'ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270', 1, '7.jpg', '2024-01-01 17:12:08', '2024-01-01 17:12:08', 1, 1, 0),
(24, 'karisa', '0812223333', 'karisa', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, NULL, '2024-02-07 21:29:36', '2024-02-07 21:29:36', 0, 0, 0),
(25, 'saichon', '0808188211', 'saichon', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, NULL, '2024-02-07 21:49:27', '2024-02-07 21:49:27', 0, 0, 0),
(26, 'switch', '0606166214', 'switch', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, NULL, '2024-02-07 22:04:40', '2024-02-07 22:04:40', 1, 1, 0),
(27, 'delete', '0919199218', 'delete', 'f931c308fc5b60b421c09969912839dff2776957d98b8d2f91c554ed8fc80f78', 2, NULL, '2024-02-07 23:18:23', '2024-02-07 23:18:23', 0, 0, 1),
(28, 'Kodchamon', '0852365412', 'katai', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, NULL, '2024-02-07 23:37:26', '2024-02-07 23:37:26', 0, 0, 0),
(29, 'test', '0901112222', 'test', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 2, NULL, '2024-02-08 00:46:09', '2024-02-08 00:46:09', 0, 0, 1),
(30, 'Ongsa', '0856321456', 'ongsa', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, NULL, '2024-02-12 01:20:24', '2024-02-12 01:20:24', 0, 0, 0),
(31, 'Guide', '0854236517', 'guide', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, NULL, '2024-02-12 01:21:55', '2024-02-12 01:21:55', 0, 0, 0),
(32, 'Fern', '0874521563', 'fern', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, NULL, '2024-02-12 01:22:25', '2024-02-12 01:22:25', 0, 0, 0),
(33, 'Admin Ongsa', '0985365212', 'admin_ongsa', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, NULL, '2024-02-12 01:46:05', '2024-02-12 01:46:05', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_court`
--
ALTER TABLE `m_court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `m_image`
--
ALTER TABLE `m_image`
  ADD PRIMARY KEY (`image_id`,`activity_id`) USING BTREE,
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `m_payment_type`
--
ALTER TABLE `m_payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `m_promotion`
--
ALTER TABLE `m_promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `m_user_type`
--
ALTER TABLE `m_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `t_activity`
--
ALTER TABLE `t_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `t_booking`
--
ALTER TABLE `t_booking`
  ADD PRIMARY KEY (`booking_id`,`user_id`,`court_id`,`payment_type_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_type_id` (`payment_type_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `promotion_id` (`promotion_id`),
  ADD KEY `court_id` (`court_id`);

--
-- Indexes for table `t_payment`
--
ALTER TABLE `t_payment`
  ADD PRIMARY KEY (`payment_id`) USING BTREE;

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`,`user_type`) USING BTREE,
  ADD KEY `user_type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_court`
--
ALTER TABLE `m_court`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_image`
--
ALTER TABLE `m_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `m_payment_type`
--
ALTER TABLE `m_payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_promotion`
--
ALTER TABLE `m_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_user_type`
--
ALTER TABLE `m_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_activity`
--
ALTER TABLE `t_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_booking`
--
ALTER TABLE `t_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `t_payment`
--
ALTER TABLE `t_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_image`
--
ALTER TABLE `m_image`
  ADD CONSTRAINT `m_image_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `t_activity` (`activity_id`);

--
-- Constraints for table `t_booking`
--
ALTER TABLE `t_booking`
  ADD CONSTRAINT `t_booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`),
  ADD CONSTRAINT `t_booking_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `t_payment` (`payment_id`),
  ADD CONSTRAINT `t_booking_ibfk_4` FOREIGN KEY (`promotion_id`) REFERENCES `m_promotion` (`promotion_id`),
  ADD CONSTRAINT `t_booking_ibfk_5` FOREIGN KEY (`court_id`) REFERENCES `m_court` (`court_id`),
  ADD CONSTRAINT `t_booking_ibfk_6` FOREIGN KEY (`payment_type_id`) REFERENCES `m_payment_type` (`payment_type_id`);

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `m_user_type` (`user_type_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `AutoCancelBooking` ON SCHEDULE EVERY 1 DAY STARTS '2024-01-20 00:00:00' ON COMPLETION PRESERVE ENABLE DO UPDATE t_booking SET booking_status = '3' WHERE booking_status = '1' AND payment_id IS NULL$$

CREATE DEFINER=`root`@`localhost` EVENT `Test30MAutoCancel` ON SCHEDULE EVERY 30 MINUTE STARTS '2024-01-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE t_booking SET booking_status = '3' WHERE booking_status = '1' AND payment_id IS NULL$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
