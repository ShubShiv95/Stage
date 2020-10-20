-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 10:29 PM
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
-- Database: `smserp`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_master_table`
--

CREATE TABLE `student_master_table` (
  `sid` mediumint(8) UNSIGNED NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Student_Name` varchar(150) DEFAULT NULL,
  `join_year` year(4) DEFAULT NULL,
  `session` varchar(9) NOT NULL,
  `session_start_year` int(4) DEFAULT NULL,
  `session_end_year` int(4) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `religion` tinyint(1) DEFAULT NULL,
  `caste` int(1) DEFAULT NULL,
  `Blood_Group` char(3) DEFAULT NULL,
  `Body_Id_Mark` varchar(100) DEFAULT NULL,
  `left_eye_vision` varchar(5) DEFAULT NULL,
  `right_eye_vision` varchar(5) DEFAULT NULL,
  `Hearing` enum('L','S','N') DEFAULT NULL,
  `genetic_disease` int(3) DEFAULT 0,
  `class_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Class_Sec_ID` mediumint(8) UNSIGNED DEFAULT NULL,
  `Roll_Number` mediumint(8) UNSIGNED DEFAULT NULL,
  `Class_Designation` varchar(50) DEFAULT NULL,
  `School_Designation` varchar(50) DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Father_Name` varchar(150) DEFAULT NULL,
  `father_education` tinyint(1) DEFAULT NULL,
  `father_occupation` tinyint(1) DEFAULT NULL,
  `father_income` int(1) DEFAULT NULL,
  `Mother_Name` varchar(150) DEFAULT NULL,
  `mother_education` tinyint(1) DEFAULT NULL,
  `mother_occupation` tinyint(1) DEFAULT NULL,
  `mother_income` int(1) DEFAULT NULL,
  `Father_Mob_No` varchar(10) DEFAULT NULL,
  `Mother_Mob_No` varchar(10) DEFAULT NULL,
  `Home_Lan_No` varchar(10) DEFAULT NULL,
  `sms_number` varchar(10) DEFAULT NULL,
  `whatsapp_number` varchar(10) NOT NULL,
  `Local_Address` varchar(150) DEFAULT NULL,
  `Permanent_Address` varchar(150) DEFAULT NULL,
  `Local_Gurdian_Name` varchar(150) DEFAULT NULL,
  `Local_Gurdian_Mob_No` varchar(10) DEFAULT NULL,
  `Local_Gurdian_Relationship` varchar(50) DEFAULT NULL,
  `Father_Mailid` varchar(100) DEFAULT NULL,
  `Mother_Mailid` varchar(100) DEFAULT NULL,
  `Local_Gurdian_Mailid` varchar(100) DEFAULT NULL,
  `Student_Mailid` varchar(100) DEFAULT NULL,
  `aadhar_no` varchar(50) DEFAULT NULL,
  `sjd` date DEFAULT NULL,
  `sld` date DEFAULT NULL,
  `transport` tinyint(1) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `addmission_taken` tinyint(1) DEFAULT 0,
  `new_student` tinyint(1) DEFAULT 1,
  `create_outstanding` tinyint(1) DEFAULT 0,
  `bsl` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master_table`
--

INSERT INTO `student_master_table` (`sid`, `Student_Id`, `Student_Name`, `join_year`, `session`, `session_start_year`, `session_end_year`, `DOB`, `gender`, `religion`, `caste`, `Blood_Group`, `Body_Id_Mark`, `left_eye_vision`, `right_eye_vision`, `Hearing`, `genetic_disease`, `class_id`, `Class_Sec_ID`, `Roll_Number`, `Class_Designation`, `School_Designation`, `School_Id`, `Father_Name`, `father_education`, `father_occupation`, `father_income`, `Mother_Name`, `mother_education`, `mother_occupation`, `mother_income`, `Father_Mob_No`, `Mother_Mob_No`, `Home_Lan_No`, `sms_number`, `whatsapp_number`, `Local_Address`, `Permanent_Address`, `Local_Gurdian_Name`, `Local_Gurdian_Mob_No`, `Local_Gurdian_Relationship`, `Father_Mailid`, `Mother_Mailid`, `Local_Gurdian_Mailid`, `Student_Mailid`, `aadhar_no`, `sjd`, `sld`, `transport`, `enabled`, `created_on`, `addmission_taken`, `new_student`, `create_outstanding`, `bsl`) VALUES
(1, 'STUD20151', 'Ramchandra Chandra Vaishkayear', 2015, '2020-2021', 2015, 2016, '1988-01-14', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 1, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9031549315', NULL, NULL, '8709321740', '8709321740', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2016-02-07', NULL, NULL, 1, '2020-10-14 18:31:10', 1, 0, 0, 1),
(2, 'STUD20152', 'TEST1 LKG B', 2015, '2020-2021', 2015, 2016, '1988-01-13', '2', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 2, 10, 1, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '8709321740', '8709321740', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2016-02-08', NULL, NULL, 1, '2020-09-10 21:37:39', 1, 0, 0, 1),
(3, 'STUD20153', 'TEST2 NURSARY A', 2015, '2020-2021', 2015, 2016, '1988-01-13', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 2, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '8709321740', '8709321740', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2016-02-08', NULL, NULL, 1, '2020-09-10 21:37:39', 1, 0, 0, 1),
(4, 'STUD20154', 'TEST2 NURSARY A', 2015, '2020-2021', 2015, 2016, '1988-01-14', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 3, NULL, NULL, 1, 'fdja fkj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9871901007', NULL, NULL, '8709321740', '8709321740', 'dsfj asljfl', NULL, NULL, NULL, NULL, 'fljals@abc.com', NULL, NULL, NULL, NULL, '2016-04-06', NULL, NULL, 1, '2020-09-10 21:37:39', 1, 0, 0, 1),
(5, 'STUD20155', 'TEST1 LKG A', 2015, '2020-2021', 2015, 2016, '1988-01-27', '1', 2, 2, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 4, NULL, NULL, 1, 'dsfk jajf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8888888888', NULL, NULL, '8709321740', '8709321740', 'ksdjflkajf sjaflj lfjl', NULL, NULL, NULL, NULL, 'fdjsda ljfl@abc.com', NULL, NULL, NULL, NULL, '2016-04-06', NULL, NULL, 1, '2020-09-10 21:37:39', 1, 0, 0, 1),
(6, 'STUD20156', 'Mithun', 2015, '2020-2021', 2015, 2016, '1988-01-15', '1', 2, 1, '2', NULL, NULL, NULL, NULL, 0, 1, 1, 5, NULL, NULL, 1, 'jdsa;lfkjalj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', NULL, NULL, '8709321740', '8709321740', 'jdsfj;laj', NULL, NULL, NULL, NULL, 'falkjasl@abc.com', NULL, NULL, NULL, NULL, '2016-05-14', NULL, NULL, 1, '2020-09-10 21:37:39', 1, 0, 0, 1),
(7, 'STUD20157', 'dgdfgdsf', 2015, '2020-2021', 2015, 2016, '1988-01-14', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 2, 3, 1, NULL, NULL, 1, 'jkfjsda;lk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', NULL, NULL, '8709321740', '8709321740', 'jghjgjgjgjgjgjh', NULL, NULL, NULL, NULL, 'jfdljasj@abc.com', NULL, NULL, NULL, NULL, '2016-12-17', NULL, NULL, 1, '2020-09-10 21:37:39', 1, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_master_table`
--
ALTER TABLE `student_master_table`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `Student_Id` (`Student_Id`),
  ADD UNIQUE KEY `Student_Id_3` (`Student_Id`),
  ADD KEY `Class_Sec_ID` (`Class_Sec_ID`),
  ADD KEY `Student_Id_2` (`Student_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
