-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 07:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `activity_id` int(10) NOT NULL,
  `activity_name` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `uploaded_on`, `admin_id`) VALUES
(8, '82.jpg', '2023-08-22 14:06:21', 0),
(9, '81.jpg', '2023-08-22 14:06:41', 0),
(10, '80.jpg', '2023-08-22 14:07:01', 0),
(11, '79.jpg', '2023-08-22 14:07:07', 0),
(12, '78.jpg', '2023-08-22 14:07:14', 0),
(13, '77.jpg', '2023-08-22 14:07:54', 0),
(14, '76.jpg', '2023-08-22 14:08:05', 0),
(15, '75.jpg', '2023-08-22 14:08:13', 0),
(16, '74.jpg', '2023-08-22 14:08:18', 0),
(17, '73.jpg', '2023-08-22 14:08:25', 0),
(18, '72.jpg', '2023-08-22 14:08:32', 0),
(19, '71.jpg', '2023-08-22 14:08:37', 0),
(20, '70.jpg', '2023-08-22 14:08:43', 0),
(21, '69.jpg', '2023-08-22 14:08:50', 0),
(22, '68.jpg', '2023-08-22 14:08:58', 0),
(23, '67.jpg', '2023-08-22 14:09:04', 0),
(24, '66.jpg', '2023-08-22 14:09:12', 0),
(25, '64.jpg', '2023-08-22 14:09:20', 0),
(26, '63.jpg', '2023-08-22 14:09:45', 0),
(27, '62.jpg', '2023-08-22 14:09:51', 0),
(28, '61.jpg', '2023-08-22 14:09:56', 0),
(29, '60.jpg', '2023-08-22 14:10:07', 0),
(30, '59.jpg', '2023-08-22 14:10:15', 0),
(31, '58.jpg', '2023-08-22 14:10:24', 0),
(32, '57.jpg', '2023-08-22 14:10:33', 0),
(33, '56.jpg', '2023-08-22 14:10:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `advertise_id` int(10) NOT NULL,
  `advertise_name` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`advertise_id`, `advertise_name`, `uploaded_on`, `admin_id`) VALUES
(1, '55.jpg', '2023-08-22 15:27:46', 0),
(2, '54.jpg', '2023-08-22 15:27:56', 0),
(4, '18.jpg', '2023-08-22 15:29:04', 0),
(5, '53.jpg', '2023-08-22 15:29:21', 0),
(6, '52.jpg', '2023-08-22 15:29:32', 0),
(8, '5.jpg', '2023-08-22 15:30:20', 0),
(9, '4.jpg', '2023-08-22 15:30:28', 0),
(10, '51.jpg', '2023-08-22 15:30:41', 0),
(11, '17.jpg', '2023-08-22 15:30:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `booking_date` datetime(6) NOT NULL,
  `booking_status` bit(50) NOT NULL,
  `court_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `contact_img` varchar(50) DEFAULT NULL,
  `contact_textbox` text NOT NULL,
  `admin_id` int(10) NOT NULL,
  `title_contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE `court` (
  `court_id` int(10) NOT NULL,
  `court_name` varchar(100) NOT NULL,
  `court_time` datetime(6) NOT NULL,
  `court_status` bit(50) NOT NULL,
  `court_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courtimage`
--

CREATE TABLE `courtimage` (
  `courtimage_id` int(10) NOT NULL,
  `courtimage_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courtimage`
--

INSERT INTO `courtimage` (`courtimage_id`, `courtimage_name`, `uploaded_on`, `admin_id`) VALUES
(1, '49.jpg', '2023-08-22 14:34:11', 0),
(2, '48.jpg', '2023-08-22 14:34:17', 0),
(3, '47.jpg', '2023-08-22 14:34:23', 0),
(4, '46.jpg', '2023-08-22 14:34:29', 0),
(5, '50.jpg', '2023-08-22 14:34:36', 0),
(6, '45.jpg', '2023-08-22 14:34:48', 0),
(7, '44.jpg', '2023-08-22 14:34:55', 0),
(8, '14.jpg', '2023-08-22 14:35:01', 0),
(9, '15.jpg', '2023-08-22 14:35:13', 0),
(10, '13.jpg', '2023-08-22 14:35:20', 0),
(11, '12.jpg', '2023-08-22 14:35:27', 0),
(12, '10.jpg', '2023-08-22 14:35:39', 0),
(13, '8.jpg', '2023-08-22 14:35:45', 0),
(14, '7.jpg', '2023-08-22 14:35:54', 0),
(15, '28.jpg', '2023-08-22 14:36:09', 0),
(17, '3.jpg', '2023-08-22 14:37:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `court_tb`
--

CREATE TABLE `court_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facilities_id` int(10) NOT NULL,
  `facilities_name` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facilities_id`, `facilities_name`, `uploaded_on`, `admin_id`) VALUES
(6, '39.jpg', '2023-08-22 15:19:23', 0),
(7, '38.jpg', '2023-08-22 15:19:27', 0),
(8, '37.jpg', '2023-08-22 15:19:32', 0),
(9, '43 (2).jpg', '2023-08-22 15:19:39', 0),
(10, '43 (1).jpg', '2023-08-22 15:19:46', 0),
(11, '41.jpg', '2023-08-22 15:19:53', 0),
(12, '40.jpg', '2023-08-22 15:20:01', 0),
(13, '36.jpg', '2023-08-22 15:20:12', 0),
(14, '35.jpg', '2023-08-22 15:20:21', 0),
(15, '29.jpg', '2023-08-22 15:20:30', 0),
(16, '30.jpg', '2023-08-22 15:20:36', 0),
(17, '31.jpg', '2023-08-22 15:20:43', 0),
(18, '32.jpg', '2023-08-22 15:20:49', 0),
(19, '34.jpg', '2023-08-22 15:20:58', 0),
(20, '33.jpg', '2023-08-22 15:21:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(10) NOT NULL,
  `income_date` date NOT NULL,
  `income_total` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `tel`, `username`, `password`, `status`) VALUES
(8, 'admin', 'test', 123456789, 'admin', '123', 'admin'),
(9, 'admin2', 'test2', 2136544789, 'admin2', '123', 'admin'),
(10, 'admin3', 'test', 215478963, 'admin3', '123', 'admin'),
(14, 'admin4', 'test', 565464056, 'admin4', '123', 'admin'),
(15, 'admin5', 'test', 2147483647, 'admin5', '123', 'admin'),
(16, 'admin6', 'test', 2147483647, 'admin6', '123', 'admin'),
(17, 'user', 'test', 824544115, 'user', '123', 'user'),
(18, 'user2', 'test', 82544555, 'user2', '123', 'user'),
(29, 'admin7', 'Test', 2147483647, 'admin7', '123', 'admin'),
(31, 'admin9', 'Test', 825456325, 'admin9', '123', 'admin'),
(33, 'admin9', 'Test', 82534368, 'admin-a', '789', 'admin'),
(34, 'admin10', 'Test', 82545657, 'admin-b', '789', 'admin'),
(35, '', '456', 12548453, 'ฟฟฟฟ', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(10) NOT NULL,
  `booking_id` int(10) NOT NULL,
  `pay_date` datetime(6) NOT NULL,
  `pay_status` bit(50) NOT NULL,
  `pay_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rules_id` int(10) NOT NULL,
  `rules_name` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rules_id`, `rules_name`, `uploaded_on`, `admin_id`) VALUES
(1, '87.jpg', '2023-08-22 16:25:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetable_id` int(10) NOT NULL,
  `court_id` int(10) NOT NULL,
  `timetable_status` bit(50) NOT NULL,
  `timetable_time` time(6) NOT NULL,
  `timetable_date` date NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_firstname` varchar(100) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_tel` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = admin\r\n2 = user\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_tel`, `user_name`, `user_pass`, `status`) VALUES
(2, 'Risa', 'two', 123415648, 'risat', '123', 2),
(3, 'Karisa', 'Cho', 852365412, 'karisa', '123', 2),
(4, 'Ongsa', 't2', 22222222, 'ongsa', '2209', 2),
(5, 'Kodchamon', 'Rit', 215488896, 'katai', '123', 2),
(6, 'risa', 'testt', 82565454, 'risa', '123', 2),
(7, 'กริษา', 'ชลศิริวานิช', 825554447, 'risa.ong', '123', 2),
(11, 'คนน่ารัก', 'มักใจร้าย', 214588777, 'Kodnaruk', '123', 2),
(12, 'aaaaa', 't1', 2147483647, 'a1', '123', 2),
(13, 'Test123', 'Test', 825497613, 'test123', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`advertise_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `courtimage`
--
ALTER TABLE `courtimage`
  ADD PRIMARY KEY (`courtimage_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facilities_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rules_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `advertise_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `court`
--
ALTER TABLE `court`
  MODIFY `court_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courtimage`
--
ALTER TABLE `courtimage`
  MODIFY `courtimage_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facilities_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rules_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetable_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
