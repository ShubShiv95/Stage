-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 12:03 PM
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
-- Table structure for table `admission_enquiry_table`
--

CREATE TABLE `admission_enquiry_table` (
  `AEID` int(11) NOT NULL,
  `STUDENT_NAME` varchar(100) NOT NULL,
  `ENQUIRER_NAME` varchar(100) NOT NULL,
  `ENQUIRER_RELATION` enum('SELF','FATHER','MOTHER','BROTHER','SISTER','UNCLE','AUNTY','GRAND FATHER','GRAND MOTHER','NEIGHBOUR','OTHERS') NOT NULL,
  `MOBILE_NO` varchar(10) NOT NULL,
  `EMAIL_ID` varchar(100) NOT NULL,
  `LOCALITY_ID` smallint(6) NOT NULL,
  `CLASS_ID` tinyint(4) NOT NULL,
  `SESSION` varchar(10) NOT NULL,
  `LEAD_ID` tinyint(4) NOT NULL,
  `ENQUIRY_STATUS` varchar(100) NOT NULL,
  `REMARKS` varchar(100) NOT NULL,
  `SIBLING` enum('YES','NO') NOT NULL,
  `STUDENT_ID` varchar(20) NOT NULL,
  `MOBILE_VERIFIED` enum('YES','NO') NOT NULL,
  `CREATED_ON` datetime NOT NULL,
  `CREATED_BY` varchar(20) NOT NULL,
  `SCHOOL_ID` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TO STORE ADMISSION ENQUIRY DETAILS';

--
-- Dumping data for table `admission_enquiry_table`
--

INSERT INTO `admission_enquiry_table` (`AEID`, `STUDENT_NAME`, `ENQUIRER_NAME`, `ENQUIRER_RELATION`, `MOBILE_NO`, `EMAIL_ID`, `LOCALITY_ID`, `CLASS_ID`, `SESSION`, `LEAD_ID`, `ENQUIRY_STATUS`, `REMARKS`, `SIBLING`, `STUDENT_ID`, `MOBILE_VERIFIED`, `CREATED_ON`, `CREATED_BY`, `SCHOOL_ID`) VALUES
(1, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'TEST@GMAIL.COM', 0, 0, '2021', 0, '', 'remarks', 'NO', '', 'YES', '0000-00-00 00:00:00', 'Mithun', 1),
(2, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'TEST@GMAIL.COM', 0, 0, '2021', 0, '', 'remarks', 'NO', '', 'YES', '0000-00-00 00:00:00', 'Mithun', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_master_table`
--

CREATE TABLE `class_master_table` (
  `class_id` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `class_no` int(3) DEFAULT NULL,
  `class_name` varchar(50) DEFAULT NULL,
  `stream` int(1) DEFAULT 0,
  `next_class_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Booklist_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Enabled` mediumint(1) DEFAULT 1,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_master_table`
--

INSERT INTO `class_master_table` (`class_id`, `class_no`, `class_name`, `stream`, `next_class_id`, `Booklist_Id`, `School_Id`, `DOC`, `Enabled`, `updated_by`) VALUES
(1, -2, 'K.G. 1', 0, 3, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(2, -1, 'K.G  2', 0, 5, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(3, 0, 'All Classes', 0, 0, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(4, 1, 'One', 0, 6, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(5, 2, 'Two', 0, 7, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(6, 3, 'Three', 0, 8, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(7, 4, 'Four', 0, 9, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(8, 5, 'Five', 0, 10, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(9, 6, 'Six', 0, 11, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(10, 7, 'Seven', 0, 12, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(11, 8, 'Eight', 0, 13, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(12, 9, 'Nine', 0, 14, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(13, 10, 'Ten', 0, 0, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(14, 11, 'Eleven', 1, 18, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(15, 11, 'Eleven', 2, 19, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(16, 11, 'Eleven', 3, 20, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(17, 12, 'Twelve', 1, 0, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(18, 12, 'Twelve', 2, 0, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(19, 12, 'Twelve', 3, 0, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(20, 11, 'Eleven', 4, 22, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com'),
(21, 12, 'Twelve', 4, 0, NULL, 1, '2016-12-30 05:23:15', 1, 'mukherjee.mit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `class_section_table`
--

CREATE TABLE `class_section_table` (
  `Class_Sec_Id` mediumint(8) UNSIGNED NOT NULL,
  `Class_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Section` char(1) DEFAULT NULL,
  `max_rollno` int(3) DEFAULT NULL,
  `Room_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Enabled` mediumint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_section_table`
--

INSERT INTO `class_section_table` (`Class_Sec_Id`, `Class_Id`, `Section`, `max_rollno`, `Room_Id`, `School_Id`, `DOC`, `Enabled`) VALUES
(1, 1, 'A', 80, NULL, 1, '2016-12-30 05:23:37', 1),
(2, 2, 'A', 80, NULL, 1, '2016-12-30 05:23:37', 1),
(3, 4, 'A', 60, NULL, 1, '2016-12-30 05:23:37', 1),
(4, 4, 'B', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(5, 5, 'A', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(6, 6, 'A', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(7, 6, 'B', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(8, 7, 'A', 60, NULL, 1, '2016-12-30 05:23:37', 1),
(9, 7, 'B', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(10, 8, 'A', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(11, 8, 'B', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(12, 9, 'A', 60, NULL, 1, '2016-12-30 05:23:37', 1),
(13, 9, 'B', 80, NULL, 1, '2016-12-30 05:23:37', 1),
(14, 10, 'A', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(15, 10, 'B', 70, NULL, 1, '2016-12-30 05:23:37', 1),
(16, 11, 'A', 80, NULL, 1, '2016-12-30 05:23:37', 1),
(17, 12, 'A', 60, NULL, 1, '2016-12-30 05:23:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_stream_table`
--

CREATE TABLE `class_stream_table` (
  `stream_id` int(2) DEFAULT NULL,
  `stream` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_stream_table`
--

INSERT INTO `class_stream_table` (`stream_id`, `stream`) VALUES
(1, 'Science Biology'),
(2, 'Science Maths'),
(3, 'Commerce'),
(4, 'Arts'),
(0, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_master_table`
--

CREATE TABLE `employee_master_table` (
  `Employee_Id` mediumint(8) UNSIGNED NOT NULL,
  `Type_Id` mediumint(2) DEFAULT NULL,
  `Employee_Grade` varchar(10) DEFAULT NULL,
  `Login_id` varchar(100) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `login_grade` int(2) DEFAULT 0,
  `login_enabled` tinyint(1) DEFAULT 1,
  `Employee_Name` varchar(150) DEFAULT NULL,
  `Employee_Address` varchar(200) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `Mob_Number` varchar(10) DEFAULT NULL,
  `Blood_Group` char(3) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Sex` char(5) DEFAULT NULL,
  `Aadhar_Number` varchar(100) DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Enabled` mediumint(1) DEFAULT 1,
  `authorized` tinyint(1) DEFAULT 0,
  `authorized_by` varchar(100) DEFAULT '0',
  `shift_start_hour` time DEFAULT NULL,
  `shift_end_hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_master_table`
--

INSERT INTO `employee_master_table` (`Employee_Id`, `Type_Id`, `Employee_Grade`, `Login_id`, `password`, `login_grade`, `login_enabled`, `Employee_Name`, `Employee_Address`, `DOJ`, `Mob_Number`, `Blood_Group`, `DOB`, `Sex`, `Aadhar_Number`, `School_Id`, `Enabled`, `authorized`, `authorized_by`, `shift_start_hour`, `shift_end_hour`) VALUES
(1, 1, NULL, 'mukherjee.mit@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 8, 1, 'Mithun Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(2, 2, NULL, 'imbibeinfosystem@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 6, 1, 'Imbibe Infosystem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(3, 3, NULL, 'chaitan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Chaitan Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(4, 3, NULL, 'bhagat@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Bhagat Pandey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(5, 3, NULL, 'asha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Asha Tyagi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(6, 3, NULL, 'varun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Varun Kumar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(7, 3, NULL, 'mukesh@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Mukesh Sinha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(8, 3, NULL, 'tarun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Tarun Thapar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(9, 3, NULL, 'pinky@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Pinky Banerjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(10, 3, NULL, 'dali@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Dali Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(11, 3, NULL, 'mithun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, 'Mithun Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(12, 3, NULL, 'ashok@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Ashok Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(13, 1, NULL, 'abc@def.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'abcdef', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(14, NULL, NULL, 'test1', '12345', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0', NULL, NULL),
(15, NULL, NULL, 'test2', '12345', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0', NULL, NULL),
(18, NULL, NULL, 'test3', '12345', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '0', NULL, NULL),
(19, NULL, NULL, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Mithun Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(20, NULL, NULL, 'testadmin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(21, NULL, NULL, 'admintst2', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(22, NULL, NULL, 'varun', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '0', NULL, NULL),
(27, NULL, NULL, 'mukherjee.mit', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `LID` int(11) NOT NULL,
  `LOGIN_ID` varchar(100) NOT NULL,
  `PASSWORD` varchar(512) NOT NULL,
  `LOGIN_TYPE` enum('STUDENT','PARENT','STAFF','') NOT NULL,
  `LOGIN_STATUS` tinyint(1) NOT NULL,
  `MOBILE_NO` char(10) NOT NULL,
  `OTP` char(6) NOT NULL,
  `LOGIN_TIME` datetime NOT NULL,
  `LOGIN_FAILED_COUNT` tinyint(4) NOT NULL,
  `ENABLED` tinyint(1) NOT NULL,
  `CREATED_BY` varchar(100) NOT NULL,
  `CREATED_ON` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `SCHOOL_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_class_details`
--

CREATE TABLE `student_class_details` (
  `scd_id` mediumint(8) UNSIGNED NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `class_id` mediumint(9) DEFAULT NULL,
  `class_no` int(3) DEFAULT NULL,
  `stream` int(1) DEFAULT NULL,
  `class_sec_id` mediumint(9) DEFAULT NULL,
  `rollno` int(2) DEFAULT NULL,
  `session_start_year` year(4) DEFAULT NULL,
  `session_end_year` year(4) DEFAULT NULL,
  `cjd` date DEFAULT NULL,
  `cjd_remarks` varchar(100) DEFAULT NULL,
  `cld` date DEFAULT NULL,
  `cld_remarks` varchar(100) DEFAULT NULL,
  `promoted` tinyint(1) DEFAULT 0,
  `promoted_remarks` varchar(100) DEFAULT NULL,
  `promotion_updatedby` varchar(100) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `school_id` mediumint(9) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class_details`
--

INSERT INTO `student_class_details` (`scd_id`, `student_id`, `class_id`, `class_no`, `stream`, `class_sec_id`, `rollno`, `session_start_year`, `session_end_year`, `cjd`, `cjd_remarks`, `cld`, `cld_remarks`, `promoted`, `promoted_remarks`, `promotion_updatedby`, `enabled`, `school_id`, `remarks`) VALUES
(1, 'STUD20151', 1, -3, 0, 1, 1, 2015, 2016, '2016-02-07', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(2, 'STUD20152', 2, -2, 0, 10, 1, 2015, 2016, '2016-02-08', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(3, 'STUD20153', 1, -3, 0, 1, 2, 2015, 2016, '2016-02-08', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(4, 'STUD20154', 1, -3, 0, 1, 3, 2015, 2016, '2016-04-06', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(5, 'STUD20155', 1, -3, 0, 1, 4, 2015, 2016, '2016-04-06', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(6, 'STUD20156', 1, -3, 0, 1, 5, 2015, 2016, '2016-05-14', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(7, 'STUD20157', 2, -2, 0, 3, 1, 2015, 2016, '2016-12-17', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(8, 'STUD20158', 1, -2, 0, 1, 6, 2015, 2016, '2020-07-11', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_master_table`
--

CREATE TABLE `student_master_table` (
  `sid` mediumint(8) UNSIGNED NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Student_Name` varchar(150) DEFAULT NULL,
  `join_year` year(4) DEFAULT NULL,
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
  `Student_Mob_No` varchar(10) DEFAULT NULL,
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

INSERT INTO `student_master_table` (`sid`, `Student_Id`, `Student_Name`, `join_year`, `session_start_year`, `session_end_year`, `DOB`, `gender`, `religion`, `caste`, `Blood_Group`, `Body_Id_Mark`, `left_eye_vision`, `right_eye_vision`, `Hearing`, `genetic_disease`, `class_id`, `Class_Sec_ID`, `Roll_Number`, `Class_Designation`, `School_Designation`, `School_Id`, `Father_Name`, `father_education`, `father_occupation`, `father_income`, `Mother_Name`, `mother_education`, `mother_occupation`, `mother_income`, `Father_Mob_No`, `Mother_Mob_No`, `Home_Lan_No`, `Student_Mob_No`, `Local_Address`, `Permanent_Address`, `Local_Gurdian_Name`, `Local_Gurdian_Mob_No`, `Local_Gurdian_Relationship`, `Father_Mailid`, `Mother_Mailid`, `Local_Gurdian_Mailid`, `Student_Mailid`, `aadhar_no`, `sjd`, `sld`, `transport`, `enabled`, `created_on`, `addmission_taken`, `new_student`, `create_outstanding`, `bsl`) VALUES
(1, 'STUD20151', 'TEST2 NURSARY A', 2015, 2015, 2016, '1988-01-14', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 1, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9031549315', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2016-02-07', NULL, NULL, 1, '2016-02-07 16:34:11', 1, 0, 0, 1),
(2, 'STUD20152', 'TEST1 LKG B', 2015, 2015, 2016, '1988-01-13', '2', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 2, 10, 1, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2016-02-08', NULL, NULL, 1, '2016-02-07 18:31:51', 1, 0, 0, 1),
(3, 'STUD20153', 'TEST2 NURSARY A', 2015, 2015, 2016, '1988-01-13', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 2, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2016-02-08', NULL, NULL, 1, '2016-02-08 08:26:53', 1, 0, 0, 1),
(4, 'STUD20154', 'TEST2 NURSARY A', 2015, 2015, 2016, '1988-01-14', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 3, NULL, NULL, 1, 'fdja fkj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9871901007', NULL, NULL, NULL, 'dsfj asljfl', NULL, NULL, NULL, NULL, 'fljals@abc.com', NULL, NULL, NULL, NULL, '2016-04-06', NULL, NULL, 1, '2016-04-06 16:41:29', 1, 0, 0, 1),
(5, 'STUD20155', 'TEST1 LKG A', 2015, 2015, 2016, '1988-01-27', '1', 2, 2, '1', NULL, NULL, NULL, NULL, 0, 1, 1, 4, NULL, NULL, 1, 'dsfk jajf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8888888888', NULL, NULL, NULL, 'ksdjflkajf sjaflj lfjl', NULL, NULL, NULL, NULL, 'fdjsda ljfl@abc.com', NULL, NULL, NULL, NULL, '2016-04-06', NULL, NULL, 1, '2016-04-06 16:42:37', 1, 0, 0, 1),
(6, 'STUD20156', 'Mithun', 2015, 2015, 2016, '1988-01-15', '1', 2, 1, '2', NULL, NULL, NULL, NULL, 0, 1, 1, 5, NULL, NULL, 1, 'jdsa;lfkjalj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', NULL, NULL, NULL, 'jdsfj;laj', NULL, NULL, NULL, NULL, 'falkjasl@abc.com', NULL, NULL, NULL, NULL, '2016-05-14', NULL, NULL, 1, '2016-05-14 10:30:52', 1, 0, 0, 1),
(7, 'STUD20157', 'dgdfgdsf', 2015, 2015, 2016, '1988-01-14', '1', 2, 1, '1', NULL, NULL, NULL, NULL, 0, 2, 3, 1, NULL, NULL, 1, 'jkfjsda;lk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9999999999', NULL, NULL, NULL, 'jghjgjgjgjgjgjh', NULL, NULL, NULL, NULL, 'jfdljasj@abc.com', NULL, NULL, NULL, NULL, '2016-12-17', NULL, NULL, 1, '2016-12-17 08:18:46', 1, 0, 0, 1),
(8, 'STUD20158', '', 2015, 2015, 2016, '0000-00-00', '0', 0, 0, '0', NULL, NULL, NULL, NULL, 0, 1, 1, 6, NULL, NULL, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2020-07-11', NULL, NULL, 1, '2020-07-10 20:37:17', 1, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_enquiry_table`
--
ALTER TABLE `admission_enquiry_table`
  ADD PRIMARY KEY (`AEID`);

--
-- Indexes for table `class_master_table`
--
ALTER TABLE `class_master_table`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `Booklist_Id` (`Booklist_Id`);

--
-- Indexes for table `class_section_table`
--
ALTER TABLE `class_section_table`
  ADD PRIMARY KEY (`Class_Sec_Id`),
  ADD KEY `Class_Id` (`Class_Id`),
  ADD KEY `Room_Id` (`Room_Id`);

--
-- Indexes for table `employee_master_table`
--
ALTER TABLE `employee_master_table`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD UNIQUE KEY `login_id_unique` (`Login_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`LID`),
  ADD UNIQUE KEY `LOGINID_UNIQUE` (`LOGIN_ID`);

--
-- Indexes for table `student_class_details`
--
ALTER TABLE `student_class_details`
  ADD PRIMARY KEY (`scd_id`),
  ADD UNIQUE KEY `composite_unique` (`class_id`,`class_sec_id`,`rollno`,`session_start_year`,`session_end_year`),
  ADD UNIQUE KEY `student_class_details_composite_unique` (`class_id`,`class_sec_id`,`rollno`,`session_start_year`,`session_end_year`);

--
-- Indexes for table `student_master_table`
--
ALTER TABLE `student_master_table`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `Student_Id` (`Student_Id`),
  ADD UNIQUE KEY `Student_Id_3` (`Student_Id`),
  ADD KEY `Class_Sec_ID` (`Class_Sec_ID`),
  ADD KEY `Student_Id_2` (`Student_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_enquiry_table`
--
ALTER TABLE `admission_enquiry_table`
  MODIFY `AEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
