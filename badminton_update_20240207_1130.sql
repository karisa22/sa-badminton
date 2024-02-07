-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 05:28 PM
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
-- Database: `badminton2`
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
(1, 'court 1', '7.jpg', 0),
(2, 'court 2', '7.jpg', 0),
(3, 'court 3', '7.jpg', 0),
(4, 'court 4', '7.jpg', 0),
(5, 'court 5', '7.jpg', 0),
(6, 'court 6', '7.jpg', 0),
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
(27, '5.jpg', 2, '2024-02-05 16:31:30', '2024-02-05 16:31:30', 15, 15),
(28, '4.jpg', 2, '2024-02-05 16:31:43', '2024-02-05 16:31:43', 15, 15),
(29, '113.jpg', 2, '2024-02-05 16:34:09', '2024-02-05 16:34:09', 15, 15),
(30, '112.jpg', 2, '2024-02-05 16:34:33', '2024-02-05 16:34:33', 15, 15),
(31, '96.jpg', 2, '2024-02-05 16:34:56', '2024-02-05 16:34:56', 15, 15),
(32, '68.jpg', 2, '2024-02-05 16:40:55', '2024-02-05 16:40:55', 15, 15),
(33, '69.jpg', 2, '2024-02-05 16:41:21', '2024-02-05 16:41:21', 15, 15);

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
(61, 24, 1, '2024-02-09 14:00:00', '2024-02-09 16:00:00', 2, 38, 1, 200.00, NULL, '2024-02-07 21:36:49', '2024-02-07 21:42:36', 24, 24, 0),
(62, 24, 1, '2024-02-08 20:00:00', '2024-02-08 21:00:00', 1, 39, 2, 150.00, NULL, '2024-02-07 21:47:22', '2024-02-07 21:59:02', 24, 1, 0),
(63, 25, 2, '2024-02-08 20:00:00', '2024-02-08 22:00:00', 2, 40, 1, 300.00, NULL, '2024-02-07 21:51:24', '2024-02-07 21:51:41', 25, 25, 0),
(64, 1, 1, '2024-02-07 12:00:00', '2024-02-07 14:00:00', 2, NULL, 1, 200.00, NULL, '2024-02-07 22:01:56', '2024-02-07 22:02:29', 1, 1, 0),
(65, 1, 1, '2024-02-06 12:00:00', '2024-02-06 14:00:00', 2, 41, 2, 200.00, NULL, '2024-02-06 22:01:56', '2024-02-06 22:02:29', 1, 1, 0);

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
(38, 200.00, '', '2024-02-07 21:42:36', '2024-02-07 21:42:36', 24, 0),
(39, 150.00, '423147624_2635298469971931_5604287683910361855_n.jpg', '2024-02-07 21:47:50', '2024-02-07 21:47:50', 24, 0),
(40, 300.00, '', '2024-02-07 21:51:41', '2024-02-07 21:51:41', 25, 0),
(41, 200.00, '', '2024-02-07 22:02:25', '2024-02-07 22:02:25', 1, 0);

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
(27, 'delete', '0919199218', 'delete', 'f931c308fc5b60b421c09969912839dff2776957d98b8d2f91c554ed8fc80f78', 2, NULL, '2024-02-07 23:18:23', '2024-02-07 23:18:23', 0, 0, 1);

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `t_payment`
--
ALTER TABLE `t_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
CREATE DEFINER=`root`@`localhost` EVENT `AutoCancelBooking` ON SCHEDULE EVERY 1 DAY STARTS '2024-01-20 00:00:00' ON COMPLETION PRESERVE ENABLE DO UPDATE t_booking SET booking_status = '3' WHERE booking_status = '1'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
