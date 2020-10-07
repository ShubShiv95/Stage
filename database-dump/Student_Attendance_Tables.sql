-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 09:21 PM
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
  `attendance_status` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `attendance_remarks` varchar(100) DEFAULT NULL,
  `prev_attendance_status` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `prev_attendance_remarks` varchar(100) DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `sms_sent_status` tinyint(1) DEFAULT 0,
  `whatsapp_sent_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_details_table`
--

INSERT INTO `attendance_details_table` (`Attendance_Id`, `student_id`, `attendance_status`, `attendance_remarks`, `prev_attendance_status`, `prev_attendance_remarks`, `School_Id`, `sms_sent_status`, `whatsapp_sent_status`) VALUES
(1, 'STUD20201', 'PRESENT', 'Present', 'PRESENT', 'Present', 1, 0, 0),
(1, 'STUD20202', 'LATE', 'LATE', 'ABSENT', NULL, 1, 0, 0),
(1, 'STUD20203', 'HALFDAY', 'halfday', 'ABSENT', 'absent', 1, 0, 0),
(1, 'STUD20206', 'ABSENT', 'Abscent', 'ABSENT', 'Abscent', 1, 0, 0),
(2, 'STUD20201', 'LATE', 'Present', 'PRESENT', 'Present', 1, 0, 0),
(2, 'STUD20202', 'PRESENT', 'late', 'LATE', 'late', 1, 0, 0),
(2, 'STUD20203', 'ABSENT', 'absent', 'HALFDAY', 'half day request by parent', 1, 0, 0),
(2, 'STUD20206', 'ABSENT', 'Abscent', 'ABSENT', 'Abscent', 1, 0, 0),
(3, 'STUD20201', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(3, 'STUD20202', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(3, 'STUD20203', 'LATE', '', 'LATE', '', 1, 0, 0),
(3, 'STUD20206', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(4, 'STUD20201', 'PRESENT', 'Present', 'PRESENT', 'Present', 1, 0, 0),
(4, 'STUD20202', 'LATE', 'late', 'LATE', 'late', 1, 0, 0),
(4, 'STUD20203', 'HALFDAY', 'half day request by parent', 'HALFDAY', 'half day request by parent', 1, 0, 0),
(4, 'STUD20206', 'ABSENT', 'Abscent', 'ABSENT', 'Abscent', 1, 0, 0),
(5, 'STUD20201', 'PRESENT', 'Present', 'PRESENT', 'Present', 1, 0, 0),
(5, 'STUD20202', 'LATE', 'late', 'LATE', 'late', 1, 0, 0),
(5, 'STUD20203', 'HALFDAY', 'half day request by parent', 'HALFDAY', 'half day request by parent', 1, 0, 0),
(5, 'STUD20206', 'HALFDAY', 'has come after first half', 'HALFDAY', 'has come after first half', 1, 0, 0),
(6, 'STUD20204', 'PRESENT', 'Present', 'PRESENT', 'Present', 1, 0, 0),
(7, 'STUD20204', 'PRESENT', 'Present', 'ABSENT', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_master_table`
--

CREATE TABLE `attendance_master_table` (
  `Attendance_id` mediumint(8) UNSIGNED NOT NULL,
  `Class_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Class_Sec_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `doa` date DEFAULT NULL,
  `period` tinyint(2) NOT NULL,
  `attendance_taken_by` varchar(100) DEFAULT NULL,
  `total_absent` int(2) DEFAULT NULL,
  `total_present` int(2) DEFAULT NULL,
  `total_halfday` int(2) DEFAULT NULL,
  `total_late` int(2) DEFAULT NULL,
  `sms_status` tinyint(1) NOT NULL DEFAULT 0,
  `whatsapp_status` tinyint(1) NOT NULL DEFAULT 0,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `locked` tinyint(1) DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `smsflag` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_master_table`
--

INSERT INTO `attendance_master_table` (`Attendance_id`, `Class_id`, `Class_Sec_id`, `doa`, `period`, `attendance_taken_by`, `total_absent`, `total_present`, `total_halfday`, `total_late`, `sms_status`, `whatsapp_status`, `School_Id`, `locked`, `created_on`, `smsflag`) VALUES
(1, 1, 1, '2020-10-03', 1, 'admin', 1, 3, 1, 1, 0, 0, 1, 0, '2020-10-03 20:33:39', 0),
(2, 1, 1, '2020-10-03', 2, 'admin', 2, 2, 0, 1, 0, 0, 1, 0, '2020-10-03 20:04:57', 0),
(3, 1, 1, '2020-10-01', 1, 'admin', 1, 3, 1, 1, 0, 0, 1, 0, '2020-10-03 20:41:12', 0),
(4, 1, 1, '2020-10-06', 1, 'admin', 1, 3, 1, 1, 0, 0, 1, 0, '2020-10-06 12:16:47', 0),
(5, 1, 1, '2020-10-06', 2, 'admin', 0, 4, 2, 1, 0, 0, 1, 0, '2020-10-06 12:19:39', 0),
(6, 2, 2, '2020-10-06', 1, 'admin', 0, 1, 0, 0, 0, 0, 1, 0, '2020-10-06 12:26:00', 0),
(7, 2, 2, '2020-10-06', 2, 'admin', 0, 1, 0, 0, 0, 0, 1, 0, '2020-10-06 12:26:59', 0);

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
  ADD PRIMARY KEY (`Attendance_id`),
  ADD UNIQUE KEY `Class_Sec_id` (`Class_Sec_id`,`doa`,`period`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_master_table`
--
ALTER TABLE `attendance_master_table`
  MODIFY `Attendance_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
