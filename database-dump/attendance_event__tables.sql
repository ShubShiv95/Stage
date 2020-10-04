-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 03:47 PM
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
-- Table structure for table `attendance_details_table`
--

CREATE TABLE `attendance_details_table` (
  `Attendance_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `period1` enum('PRESENT','LATE','HALFDAY','ABSCENT') DEFAULT NULL,
  `period1_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period2` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period2_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period3` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period3_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period4` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period4_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period5` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period5_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period6` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period6_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period7` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period7_attendance_taken_by` varchar(100) DEFAULT NULL,
  `period8` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `period8_attendance_taken_by` varchar(100) DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `abscent_informed` tinyint(1) DEFAULT 0,
  `remarks` varchar(256) DEFAULT NULL,
  `sms_sent_status` tinyint(1) DEFAULT 0,
  `whatsapp_sent_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_details_table`
--

INSERT INTO `attendance_details_table` (`Attendance_Id`, `student_id`, `period1`, `period1_attendance_taken_by`, `period2`, `period2_attendance_taken_by`, `period3`, `period3_attendance_taken_by`, `period4`, `period4_attendance_taken_by`, `period5`, `period5_attendance_taken_by`, `period6`, `period6_attendance_taken_by`, `period7`, `period7_attendance_taken_by`, `period8`, `period8_attendance_taken_by`, `School_Id`, `updated_by`, `abscent_informed`, `remarks`, `sms_sent_status`, `whatsapp_sent_status`) VALUES
(12, 'STUD20201', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0),
(12, 'STUD20202', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0),
(12, 'STUD20203', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0),
(13, 'STUD20201', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0),
(13, 'STUD20202', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0),
(13, 'STUD20203', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0),
(13, 'STUD20206', '', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 'PRESENT', NULL, 1, 'admin', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_master_table`
--

CREATE TABLE `attendance_master_table` (
  `Attendance_id` mediumint(8) UNSIGNED NOT NULL,
  `Class_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Class_Sec_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `total_abscent` int(2) DEFAULT NULL,
  `total_present` int(2) DEFAULT NULL,
  `Updated_by` varchar(100) DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `locked` tinyint(1) DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `smsflag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_master_table`
--

INSERT INTO `attendance_master_table` (`Attendance_id`, `Class_id`, `Class_Sec_id`, `doa`, `total_abscent`, `total_present`, `Updated_by`, `School_Id`, `locked`, `created_on`, `smsflag`) VALUES
(12, 1, 1, '2020-09-05', 0, 3, 'admin', 1, 1, '2020-09-06 07:37:16', 0),
(13, 1, 1, '2020-09-15', 0, 4, 'admin', 1, 1, '2020-09-15 20:38:59', 0);

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
-- Indexes for table `attendance_details_table`
--
ALTER TABLE `attendance_details_table`
  ADD KEY `Attendance_Id` (`Attendance_Id`);

--
-- Indexes for table `attendance_master_table`
--
ALTER TABLE `attendance_master_table`
  ADD PRIMARY KEY (`Attendance_id`);

--
-- Indexes for table `event_calender_master`
--
ALTER TABLE `event_calender_master`
  ADD PRIMARY KEY (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_master_table`
--
ALTER TABLE `attendance_master_table`
  MODIFY `Attendance_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
