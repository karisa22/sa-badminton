-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 06:11 PM
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
(6, 'court 6', '7.jpg', 0);

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
(2, 'เงินสด'),
(3, 'qrcode'),
(4, 'บัตรเครดิต');

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
(3, 'ก่อน 5 โมงเย็น', 100.00, '2024-01-01 17:57:56', '2025-01-01 17:57:56', 0);

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
(2, 'member'),
(3, 'silver'),
(4, 'gold');

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
(2, 1, 1, '2024-01-01 18:07:37', '2024-01-02 18:07:37', 2, NULL, 3, 100.00, NULL, '2024-01-01 18:07:37', NULL, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_payment`
--

CREATE TABLE `t_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL COMMENT '50-2400',
  `image_name` varchar(50) NOT NULL,
  `paid_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` int(11) NOT NULL COMMENT 't_user',
  `del` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

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
(1, 'super_admin', '0818188216', 'admin', 'ac9689e2272427085e35b9d3e3e8bed88cb3434828b43b86fc0596cad4c6e270', 1, '7.jpg', '2024-01-01 17:12:08', '2024-01-01 17:12:08', 1, 1, 0);

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
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `m_image`
--
ALTER TABLE `m_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_payment_type`
--
ALTER TABLE `m_payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_promotion`
--
ALTER TABLE `m_promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user_type`
--
ALTER TABLE `m_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_activity`
--
ALTER TABLE `t_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_booking`
--
ALTER TABLE `t_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_payment`
--
ALTER TABLE `t_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_activity`
--
ALTER TABLE `t_activity`
  ADD CONSTRAINT `t_activity_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `m_image` (`activity_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;