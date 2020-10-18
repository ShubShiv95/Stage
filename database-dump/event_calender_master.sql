-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 09:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_calender_master`
--

CREATE TABLE `event_calender_master` (
  `event_id` mediumint(8) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `off_day` date DEFAULT NULL,
  `program_name` varchar(100) DEFAULT NULL,
  `student_off` tinyint(1) DEFAULT NULL,
  `teacher_off` tinyint(1) DEFAULT NULL,
  `otherstaff_off` tinyint(1) DEFAULT NULL,
  `from_class_no` int(3) DEFAULT NULL,
  `to_class_no` int(3) DEFAULT NULL,
  `school_id` mediumint(9) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_calender_master`
--

INSERT INTO `event_calender_master` (`event_id`, `start_date`, `end_date`, `off_day`, `program_name`, `student_off`, `teacher_off`, `otherstaff_off`, `from_class_no`, `to_class_no`, `school_id`, `updated_by`, `updated_on`) VALUES
(0, '2020-08-27', '2020-08-28', NULL, '15th August School day holiday', 1, 1, 1, 0, 0, 1, 'admin', '2020-08-23 14:35:00'),
(1, '2015-02-05', '2015-02-05', NULL, 'holiday', 1, 1, 1, 0, 0, 1, 'mukherjee.mit@gmail.com', '2015-02-28 07:06:42'),
(2, '2015-02-19', '2015-02-21', NULL, 'Festival Days', 1, 0, 0, 0, 0, 1, 'mukherjee.mit@gmail.com', '2015-02-28 07:10:46'),
(3, '2015-02-23', '2015-02-24', NULL, 'Festival Days', 1, 0, 0, -3, -1, 1, 'mukherjee.mit@gmail.com', '2015-02-28 07:11:24'),
(4, '2015-02-22', '2015-02-25', NULL, ' Festival Days', 0, 1, 1, 0, 0, 1, 'mukherjee.mit@gmail.com', '2015-02-28 17:23:20'),
(5, '2016-12-29', '2017-01-01', NULL, 'Chrismas Holidays', 1, 1, 1, 0, 0, 1, 'mukherjee.mit@gmail.com', '2016-12-28 15:08:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_calender_master`
--
ALTER TABLE `event_calender_master`
  ADD PRIMARY KEY (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
