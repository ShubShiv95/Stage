-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2020 at 11:22 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solvethe_dev`
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
  `LOCALITY_ID` int(11) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `SESSION` varchar(10) NOT NULL,
  `LEAD_ID` int(11) NOT NULL,
  `ENQUIRY_STATUS` enum('PENDING','PROCESSING','CONVERTED','CLOSED') NOT NULL,
  `REMARKS` varchar(100) NOT NULL,
  `SIBLING` enum('YES','NO') NOT NULL,
  `STUDENT_ID` varchar(20) NOT NULL,
  `MOBILE_VERIFIED` enum('YES','NO') NOT NULL,
  `FOLLOWUP_DATE` date NOT NULL,
  `CREATED_ON` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CREATED_BY` varchar(20) NOT NULL,
  `SCHOOL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TO STORE ADMISSION ENQUIRY DETAILS';

--
-- Dumping data for table `admission_enquiry_table`
--

INSERT INTO `admission_enquiry_table` (`AEID`, `STUDENT_NAME`, `ENQUIRER_NAME`, `ENQUIRER_RELATION`, `MOBILE_NO`, `EMAIL_ID`, `LOCALITY_ID`, `Class`, `SESSION`, `LEAD_ID`, `ENQUIRY_STATUS`, `REMARKS`, `SIBLING`, `STUDENT_ID`, `MOBILE_VERIFIED`, `FOLLOWUP_DATE`, `CREATED_ON`, `CREATED_BY`, `SCHOOL_ID`) VALUES
(1, 'Mithun', 'Mithun', '', '8709321740', 'abc@def.com', 1, 'K.G. 1', '2019-2020', 2, 'PROCESSING', ' fdg dfs gdfgdfs gdfg dfdf gdfgddf df d', 'NO', '', '', '2020-11-16', '2020-11-18 09:40:05', 'admin', 1),
(2, 'Sky School', 'Mithun', 'GRAND MOTHER', '8709321740', 'rohitkosra1992@gmail.com', 2, 'XI - Science', '2020-2021', 2, 'PROCESSING', 'xdfb gfh gfhgfhhfggfhdgfh', 'YES', '', '', '2020-11-16', '2020-11-15 13:59:24', 'admin', 1),
(3, 'Mithun', 'Mithun', '', '8709321740', 'TEST@GMAIL.COM', 1, 'K.G  2', '2020-2021', 3, 'PENDING', ' ett etr re rt weew ', 'YES', '', '', '2020-11-17', '2020-11-15 14:06:03', 'admin', 1),
(4, 'Mithun', 'Mithun', '', '8709321740', 'csingh890@gmail.com', 1, 'K.G. 1', '2020-2021', 3, 'PENDING', 'dsfgf dfs gdfs gsdfgdfsg', 'NO', '', '', '2020-11-17', '2020-11-15 19:22:55', 'admin', 1),
(5, 'Mithun', 'Mithun', '', '8709321740', 'Mukherjee.mit@gmail.com', 1, 'K.G. 1', '2020-2021', 2, 'PENDING', 'dsaf ass', 'NO', '', '', '2020-11-17', '2020-11-15 19:29:09', 'admin', 1),
(6, 'Mithun', 'Mithun', '', '8527659409', 'TEST@GMAIL.COM', 1, 'K.G. 1', '2020-2021', 4, 'PENDING', ' dsfdasf das fdas', 'NO', '', '', '2020-11-17', '2020-11-15 19:31:13', 'admin', 1),
(7, 'Mithun', 'Mithun', '', '9891898219', 'rohitkosra1992@gmail.com', 3, 'K.G. 1', '2020-2021', 1, 'PENDING', ' ffasa', 'NO', '', '', '2020-11-17', '2020-11-15 20:01:23', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission_followup_note`
--

CREATE TABLE `admission_followup_note` (
  `NOTEID` int(11) NOT NULL,
  `AEID` int(11) DEFAULT NULL,
  `NOTE` varchar(200) DEFAULT NULL,
  `NOTE_DATE` timestamp NULL DEFAULT NULL,
  `FOLLOWUP_DATE` date DEFAULT NULL,
  `CREATED_BY` varchar(100) DEFAULT NULL,
  `SCHOOL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_followup_note`
--

INSERT INTO `admission_followup_note` (`NOTEID`, `AEID`, `NOTE`, `NOTE_DATE`, `FOLLOWUP_DATE`, `CREATED_BY`, `SCHOOL_ID`) VALUES
(1, 1, ' DSFAS FDS SDS DAS', '2020-10-29 18:30:00', '2020-10-30', 'admin', 1),
(2, NULL, NULL, '2020-10-31 10:14:20', NULL, 'admin', 1),
(3, 1, ' s d dsfdsf dsfds fds ds dsds ds ds dsds fdsa ', '2020-10-31 10:16:41', '2020-10-30', 'admin', 1),
(4, 2, 'WORK IN PROGRESS. WILL COME SOON', '2020-11-01 19:54:47', '2020-11-01', 'admin', 1),
(5, 2, ' F ADFADS FS FDASF SDA ASF ASFAS FAS FASF ASDFSD F\r\n DASFDAS FADS F;ASDJ;FLA DJSLJASDL;FJAS;LDJFLASD JFLDASJLJASD FLJASDFLDJAS LJASLFAS\r\n DSFKFJASFJ ASLJFLS DJAF;LASDJ\r\nS FJASJF;LASJF;LJASFLJSDA FLJSA', '2020-11-01 19:55:46', '2020-11-01', 'admin', 1),
(6, 4, ' yrdygf dgdf gsgdfs ds', '2020-11-06 18:31:11', '2020-11-06', 'admin', 1),
(7, 6, '\r\nWe are looking into this.', '2020-11-07 05:09:31', '2020-11-07', 'admin', 1),
(8, 6, ' The candidate is interested.', '2020-11-07 05:10:04', '2020-11-07', 'admin', 1),
(9, 6, ' The student has taken admission. ', '2020-11-07 05:10:50', '2020-11-07', 'admin', 1),
(10, 1, ' d dasf as dsa fs das dfasdsa fdas as a', '2020-11-08 04:03:45', '2020-11-10', 'admin', 1),
(11, 8, '  We are working on this.\r\n\r\nThanks and Regards,\r\nMithun', '2020-11-10 12:41:52', '2020-11-10', 'admin', 1),
(12, 8, 'Second Note', '2020-11-11 20:16:44', '2020-11-13', 'admin', 1),
(13, 11, ' this is in testing process;.', '2020-11-12 21:06:13', '2020-11-14', 'admin', 1),
(14, 2, ' af dsfafasfaafasfas', '2020-11-15 13:59:24', '2020-11-16', 'admin', 1),
(15, 2, 'Testing note', '2020-11-15 13:59:43', '2020-11-16', 'admin', 1),
(16, 1, ' New Follow up by Suman Dutta', '2020-11-18 09:37:43', '2020-11-19', 'admin', 1),
(17, 1, ' My new follow up -Suman', '2020-11-18 09:40:05', '2020-11-20', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission_master_documents`
--

CREATE TABLE `admission_master_documents` (
  `Doc_Id` mediumint(8) UNSIGNED NOT NULL,
  `Student_Id` mediumint(8) UNSIGNED NOT NULL,
  `Document_Name` varchar(60) NOT NULL,
  `Document_Type` varchar(40) NOT NULL,
  `Enabled` tinyint(1) DEFAULT 1,
  `School_Id` int(11) DEFAULT NULL,
  `Updated_By` varchar(100) DEFAULT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_master_documents`
--

INSERT INTO `admission_master_documents` (`Doc_Id`, `Student_Id`, `Document_Name`, `Document_Type`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 3, '3_AdmissionDocs/4e2ad9b8188e1a7551e670a43f5f4085.jpg', 'Aadhar', 1, NULL, NULL, '2020-11-14 08:53:42'),
(2, 100, '100_AdmissionDocs/7431a832468488f20884248ae4d40b73.pdf', 'Aadhar', 1, NULL, NULL, '2020-11-14 08:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `admission_master_table`
--

CREATE TABLE `admission_master_table` (
  `Admission_Id` mediumint(8) UNSIGNED NOT NULL,
  `School_Admission_Id` varchar(10) DEFAULT NULL,
  `Is_Admited` enum('Yes','No') DEFAULT 'No',
  `School_Id` mediumint(8) NOT NULL,
  `Session` varchar(9) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Class_Id` smallint(8) UNSIGNED DEFAULT NULL,
  `Gender` enum('MALE','FEMALE','OTHER') DEFAULT 'MALE',
  `DOB` date NOT NULL,
  `Age` tinyint(3) UNSIGNED DEFAULT NULL,
  `Social_Category` enum('GENERAL','SC','ST','OBC') DEFAULT 'GENERAL',
  `Discount_Category` smallint(6) DEFAULT NULL,
  `Locality` smallint(6) DEFAULT NULL,
  `Academic_Session` varchar(9) DEFAULT NULL,
  `Mother_Tongue` varchar(100) DEFAULT NULL,
  `Religion` varchar(100) DEFAULT NULL,
  `Nationality` enum('INDIAN','OTHERS') DEFAULT NULL,
  `Blood_Group` enum('AB-Negative','B-Negative','AB-P	ositive','A-Negative','O-Negative','B-Positive','A-Positive','O-Positive') DEFAULT NULL,
  `Aadhar_No` varchar(12) DEFAULT NULL,
  `Student_Image` varchar(100) DEFAULT NULL,
  `Prev_School_Name` varchar(100) DEFAULT NULL,
  `Prev_School_Medium` enum('English','Hindi','Others','Bengali') DEFAULT NULL,
  `Prev_School_Board` enum('CBSE','ICSE','OTHERS') DEFAULT NULL,
  `Prev_School_Class` smallint(6) DEFAULT NULL,
  `Comm_Address` varchar(100) DEFAULT NULL,
  `Comm_Add_Country` varchar(50) DEFAULT NULL,
  `Comm_Add_State` varchar(50) DEFAULT NULL,
  `Comm_Add_City_Dist` varchar(50) DEFAULT NULL,
  `Comm_Add_Pincode` varchar(10) DEFAULT NULL,
  `Comm_Add_ContactNo` varchar(12) DEFAULT NULL,
  `Resid_Address` varchar(100) DEFAULT NULL,
  `Resid_Add_Country` varchar(50) DEFAULT NULL,
  `Resid_Add_State` varchar(50) DEFAULT NULL,
  `Resid_Add_City_Dist` varchar(50) DEFAULT NULL,
  `Resid_Add_Pincode` varchar(10) DEFAULT NULL,
  `Resid_Add_ContactNo` varchar(12) DEFAULT NULL,
  `Sibling_1_Student_Id` varchar(20) DEFAULT NULL,
  `Sibling_1_Class` smallint(6) DEFAULT NULL,
  `Sibling_1_Section` varchar(50) DEFAULT NULL,
  `Sibling_1_RollNo` varchar(10) DEFAULT NULL,
  `Sibling_2_Student_Id` varchar(100) DEFAULT NULL,
  `Sibling_2_Class` smallint(6) DEFAULT NULL,
  `Sibling_2_Section` varchar(50) DEFAULT NULL,
  `Sibling_2_RollNo` varchar(8) DEFAULT NULL,
  `Father_Name` varchar(150) DEFAULT NULL,
  `Father_Qualification` enum('Non-Matric','Matriculation','Intermediate','Graduate','Post Graduate','PHD','Other') DEFAULT NULL,
  `Father_Occupation` enum('Private Sec. Employee','Public/PSU Sec. Employee','Business','Doctor','Armed Forces','Lawyer','Engineer','Other') DEFAULT NULL,
  `Father_Designation` varchar(100) DEFAULT NULL,
  `Father_Org_Name` varchar(100) DEFAULT NULL,
  `Father_Org_Add` varchar(100) DEFAULT NULL,
  `Father_City` varchar(100) DEFAULT NULL,
  `Father_State` varchar(100) DEFAULT NULL,
  `Father_Country` varchar(100) DEFAULT NULL,
  `Father_Pincode` varchar(10) DEFAULT NULL,
  `Father_Email` varchar(100) DEFAULT NULL,
  `Father_Contact_No` varchar(12) DEFAULT NULL,
  `Father_Annual_Income` varchar(10) DEFAULT NULL,
  `Father_Aadhar_Card` varchar(12) DEFAULT NULL,
  `Father_Alumni` varchar(5) DEFAULT NULL,
  `Father_Image` varchar(100) DEFAULT NULL,
  `Mother_Name` varchar(150) DEFAULT NULL,
  `Mother_Qualification` enum('Non-Matric','Matriculation','Intermediate','Graduate','Post Graduate','PHD','Other') DEFAULT NULL,
  `Mother_Occupation` enum('Private Sec. Emp','Public/PSU Sec. Emp','Business','Doctor','Armed Forces','Lawyer','Engineer','Other') DEFAULT NULL,
  `Mother_Designation` varchar(100) DEFAULT NULL,
  `Mother_Org_Name` varchar(100) DEFAULT NULL,
  `Mother_Org_Add` varchar(100) DEFAULT NULL,
  `Mother_City` varchar(100) DEFAULT NULL,
  `Mother_State` varchar(100) DEFAULT NULL,
  `Mother_Country` varchar(100) DEFAULT NULL,
  `Mother_Pincode` varchar(10) DEFAULT NULL,
  `Mother_Email` varchar(100) DEFAULT NULL,
  `Mother_Contact_No` varchar(12) DEFAULT NULL,
  `Mother_Annual_Income` varchar(10) DEFAULT NULL,
  `Mother_Aadhar_Card` varchar(12) DEFAULT NULL,
  `Mother_Alumni` varchar(10) DEFAULT NULL,
  `Mother_Image` varchar(100) DEFAULT NULL,
  `Gurdian_Type` enum('Father','Mother','Other') DEFAULT 'Father',
  `Guardian_Address` varchar(150) DEFAULT NULL,
  `Guardian_Name` varchar(100) DEFAULT NULL,
  `Guardian_Relation` enum('Uncle','Aunt','Grand Father','Grand Mother','Friend','Other','Self') DEFAULT NULL,
  `Guardian_Contact_No` varchar(12) DEFAULT NULL,
  `Guardian_Image` varchar(100) DEFAULT NULL,
  `SMS_Contact_No` varchar(12) NOT NULL,
  `Whatsapp_Contact_No` varchar(12) DEFAULT NULL,
  `Email_Id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_master_table`
--

INSERT INTO `admission_master_table` (`Admission_Id`, `School_Admission_Id`, `Is_Admited`, `School_Id`, `Session`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`) VALUES
(1, 'DPS20201', 'No', 200, '2020-2021', 'Vishal ', '', 'Sinha', 4, 'MALE', '2014-01-02', 6, 'GENERAL', 5, 1, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', 'KLJLKJ2E2300', NULL, 'ISL', 'English', 'CBSE', 2, ' BOKARO STEEL CITY, CITY CENTER', 'India', 'CA', 'Bokaro Steel City', '8324241', '98899234232', ' ', '', '', '', '', '', 'STUD234242', 1, 'Delhi', '11', 'STUD090000', 7, 'Delhi', '12', 'Sunil Ch. Sinha', 'Graduate', 'Public/PSU Sec. Employee', '', '', '', '', '', '', '', '', '', '', '', 'Yes', NULL, 'Usha Sinha', 'Other', 'Other', '', '', '', '', '', '', '', '', '', '', '', '0', NULL, 'Other', ' ', '', 'Grand Father', '', NULL, '9899898999', '9824243222', 'vishal@gmail.com'),
(2, 'DPS20202', 'No', 200, '2020-2021', 'Vishal 2', '', 'Sinha', 4, 'MALE', '2014-01-02', 6, 'GENERAL', 5, 1, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', 'KLJLKJ2E2300', NULL, 'ISL', 'English', 'CBSE', 2, ' BOKARO STEEL CITY, CITY CENTER', 'India', 'CA', 'Bokaro Steel City', '8324241', '98899234232', ' ', '', '', '', '', '', 'STUD234242', 1, 'Delhi', '11', 'STUD090000', 7, 'Delhi', '12', 'Sunil Ch. Sinha', 'Graduate', 'Public/PSU Sec. Employee', '', '', '', '', '', '', '', '', '', '', '', 'Yes', NULL, 'Usha Sinha', 'Other', 'Other', '', '', '', '', '', '', '', '', '', '', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9899898999', '9824243222', 'vishal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details_table`
--

CREATE TABLE `attendance_details_table` (
  `Attendance_Details_Id` int(10) UNSIGNED NOT NULL,
  `Attendance_Id` int(11) DEFAULT NULL,
  `Student_Id` varchar(20) DEFAULT NULL,
  `Attendance_Status` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `Attendance_Remarks` varchar(100) DEFAULT NULL,
  `Prev_Attendance_Status` enum('PRESENT','LATE','HALFDAY','ABSENT') DEFAULT NULL,
  `Prev_Attendance_Remarks` varchar(100) DEFAULT NULL,
  `School_Id` int(10) UNSIGNED DEFAULT NULL,
  `SMS_Sent_Status` tinyint(1) DEFAULT 0,
  `Whatsapp_Sent_Status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_details_table`
--

INSERT INTO `attendance_details_table` (`Attendance_Details_Id`, `Attendance_Id`, `Student_Id`, `Attendance_Status`, `Attendance_Remarks`, `Prev_Attendance_Status`, `Prev_Attendance_Remarks`, `School_Id`, `SMS_Sent_Status`, `Whatsapp_Sent_Status`) VALUES
(135, 1, 'STUD202001', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(136, 1, 'STUD202002', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(137, 1, 'STUD202003', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(138, 1, 'STUD202004', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(139, 1, 'STUD202005', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(140, 1, 'STUD202006', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(141, 1, 'STUD202007', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(142, 1, 'STUD202008', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(143, 1, 'STUD202009', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(144, 1, 'STUD202010', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(145, 1, 'STUD202011', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(146, 2, 'STUD202001', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(147, 2, 'STUD202002', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(148, 2, 'STUD202003', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(149, 2, 'STUD202004', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(150, 2, 'STUD202005', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(151, 2, 'STUD202006', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(152, 2, 'STUD202007', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(153, 2, 'STUD202008', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(154, 2, 'STUD202009', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(155, 2, 'STUD202010', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(156, 2, 'STUD202011', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(157, 3, 'STUD202001', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(158, 3, 'STUD202002', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(159, 3, 'STUD202003', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(160, 3, 'STUD202004', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(161, 3, 'STUD202005', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(162, 3, 'STUD202006', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(163, 3, 'STUD202007', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(164, 3, 'STUD202008', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(165, 3, 'STUD202009', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(166, 3, 'STUD202010', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(167, 3, 'STUD202011', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(168, 4, 'STUD202001', 'LATE', '', 'LATE', '', 1, 0, 0),
(169, 4, 'STUD202002', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(170, 4, 'STUD202003', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(171, 4, 'STUD202004', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(172, 4, 'STUD202005', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(173, 4, 'STUD202006', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(174, 4, 'STUD202007', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(175, 4, 'STUD202008', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(176, 4, 'STUD202009', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(177, 4, 'STUD202010', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(178, 4, 'STUD202011', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(179, 5, 'STUD202001', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(180, 5, 'STUD202002', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(181, 5, 'STUD202003', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(182, 5, 'STUD202004', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(183, 5, 'STUD202005', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(184, 5, 'STUD202006', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(185, 5, 'STUD202007', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(186, 5, 'STUD202008', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(187, 5, 'STUD202009', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(188, 5, 'STUD202010', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(189, 5, 'STUD202011', 'PRESENT', '', 'PRESENT', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_master_table`
--

CREATE TABLE `attendance_master_table` (
  `Attendance_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Class_Sec_Id` int(11) NOT NULL,
  `DOA` date DEFAULT NULL,
  `Period` tinyint(2) NOT NULL,
  `Attendance_Taken_By` varchar(100) DEFAULT NULL,
  `Total_Absent` int(2) NOT NULL,
  `Total_Present` int(2) NOT NULL,
  `Total_Halfday` int(2) NOT NULL,
  `Total_Late` int(2) NOT NULL,
  `SMS_Status` tinyint(1) NOT NULL DEFAULT 0,
  `Whatsapp_Status` tinyint(1) NOT NULL DEFAULT 0,
  `School_Id` int(8) NOT NULL,
  `Locked` tinyint(1) NOT NULL DEFAULT 0,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Attendance_Status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_master_table`
--

INSERT INTO `attendance_master_table` (`Attendance_Id`, `Class_Id`, `Class_Sec_Id`, `DOA`, `Period`, `Attendance_Taken_By`, `Total_Absent`, `Total_Present`, `Total_Halfday`, `Total_Late`, `SMS_Status`, `Whatsapp_Status`, `School_Id`, `Locked`, `Created_On`, `Attendance_Status`) VALUES
(1, 1, 1, '2020-11-10', 1, 'admin', 4, 7, 0, 0, 0, 0, 1, 0, '2020-11-17 21:17:50', 1),
(2, 1, 1, '2020-11-18', 1, 'admin', 1, 10, 1, 0, 0, 0, 1, 0, '2020-11-17 22:09:29', 1),
(3, 1, 1, '2020-11-17', 1, 'admin', 2, 9, 0, 0, 0, 0, 1, 0, '2020-11-17 22:51:22', 1),
(4, 1, 1, '2020-11-09', 1, 'admin', 2, 9, 1, 1, 0, 0, 1, 0, '2020-11-18 10:29:09', 1),
(5, 1, 1, '2020-11-16', 1, 'admin', 2, 9, 0, 0, 0, 0, 1, 0, '2020-11-18 10:32:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_master_table`
--

CREATE TABLE `class_master_table` (
  `Class_Id` int(11) NOT NULL,
  `Class_No` int(11) NOT NULL,
  `Class_Name` varchar(50) NOT NULL,
  `Next_Class_Id` int(11) DEFAULT NULL,
  `Booklist_Id` int(11) DEFAULT NULL,
  `School_Id` int(11) NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `updated_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_master_table`
--

INSERT INTO `class_master_table` (`Class_Id`, `Class_No`, `Class_Name`, `Next_Class_Id`, `Booklist_Id`, `School_Id`, `DOC`, `Enabled`, `updated_by`) VALUES
(0, 0, 'All Classes', 0, NULL, 1, '2020-09-09 19:06:35', 1, 'mukherjee.mit@gmail.com'),
(1, -2, 'LKG', 2, NULL, 1, '2020-11-25 11:30:14', 1, 'mukherjee.mit@gmail.com'),
(2, -1, 'UKG', 4, NULL, 1, '2020-11-25 11:30:19', 1, 'mukherjee.mit@gmail.com'),
(4, 1, 'I', 5, NULL, 1, '2020-09-04 20:34:04', 1, 'mukherjee.mit@gmail.com'),
(5, 2, 'II', 6, NULL, 1, '2020-09-04 20:34:09', 1, 'mukherjee.mit@gmail.com'),
(6, 3, 'III', 7, NULL, 1, '2020-09-04 20:34:13', 1, 'mukherjee.mit@gmail.com'),
(7, 4, 'IV', 8, NULL, 1, '2020-09-04 20:34:19', 1, 'mukherjee.mit@gmail.com'),
(8, 5, 'V', 9, NULL, 1, '2020-09-04 20:36:45', 1, 'mukherjee.mit@gmail.com'),
(9, 6, 'VI', 10, NULL, 1, '2020-09-04 20:34:28', 1, 'mukherjee.mit@gmail.com'),
(10, 7, 'VII', 11, NULL, 1, '2020-09-04 20:34:32', 1, 'mukherjee.mit@gmail.com'),
(11, 8, 'VIII', 12, NULL, 1, '2020-09-04 20:34:40', 1, 'mukherjee.mit@gmail.com'),
(12, 9, 'IX', 13, NULL, 1, '2020-09-04 20:34:52', 1, 'mukherjee.mit@gmail.com'),
(13, 10, 'X', 14, NULL, 1, '2020-09-04 20:34:57', 1, 'mukherjee.mit@gmail.com'),
(14, 11, 'XI', 15, NULL, 1, '2020-09-04 20:35:03', 1, 'mukherjee.mit@gmail.com'),
(15, 12, 'XII', 16, NULL, 1, '2020-09-04 20:35:09', 1, 'mukherjee.mit@gmail.com'),
(16, -3, 'Nursery', -2, NULL, 1, '2020-11-25 11:33:54', 1, ''),
(17, -4, 'Pre/Nursery', -3, NULL, 1, '2020-11-25 13:51:24', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `class_section_table`
--

CREATE TABLE `class_section_table` (
  `Class_Sec_Id` mediumint(8) UNSIGNED NOT NULL,
  `Class_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Section` char(1) DEFAULT NULL,
  `Stream` enum('SCIENCE','COMMERCE','ARTS','GENERAL') NOT NULL,
  `Max_Rollno` int(11) DEFAULT NULL,
  `Room_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `School_Id` int(10) UNSIGNED DEFAULT NULL,
  `DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Enabled` mediumint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_section_table`
--

INSERT INTO `class_section_table` (`Class_Sec_Id`, `Class_Id`, `Section`, `Stream`, `Max_Rollno`, `Room_Id`, `School_Id`, `DOC`, `Enabled`) VALUES
(1, 1, 'A', 'GENERAL', 80, NULL, 1, '2020-08-31 20:22:46', 1),
(2, 2, 'A', 'GENERAL', 80, NULL, 1, '2020-08-31 20:22:50', 1),
(3, 4, 'A', 'GENERAL', 60, NULL, 1, '2020-08-31 20:22:54', 1),
(4, 4, 'B', 'GENERAL', 70, NULL, 1, '2020-08-31 20:22:58', 1),
(5, 5, 'A', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:03', 1),
(6, 6, 'A', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:08', 1),
(7, 6, 'B', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:13', 1),
(8, 7, 'A', 'GENERAL', 60, NULL, 1, '2020-08-31 20:23:18', 1),
(9, 7, 'B', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:23', 1),
(10, 8, 'A', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:27', 1),
(11, 8, 'B', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:32', 1),
(12, 9, 'A', 'GENERAL', 60, NULL, 1, '2020-08-31 20:23:37', 1),
(13, 9, 'B', 'GENERAL', 80, NULL, 1, '2020-08-31 20:23:42', 1),
(14, 10, 'A', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:47', 1),
(15, 10, 'B', 'GENERAL', 70, NULL, 1, '2020-08-31 20:23:51', 1),
(16, 11, 'A', 'GENERAL', 80, NULL, 1, '2020-08-31 20:23:56', 1),
(17, 12, 'A', 'GENERAL', 60, NULL, 1, '2020-08-31 20:24:00', 1),
(18, 4, 'C', 'GENERAL', 40, NULL, 1, '2020-09-11 20:51:51', 1),
(19, 4, 'D', 'GENERAL', 40, NULL, 1, '2020-09-11 20:51:53', 1),
(20, 4, 'E', 'GENERAL', 40, NULL, 1, '2020-09-11 20:51:54', 1),
(21, 4, 'F', 'GENERAL', 40, NULL, 1, '2020-09-11 20:51:56', 1),
(22, 4, 'G', 'GENERAL', 40, NULL, 1, '2020-09-11 20:51:58', 1),
(23, 4, 'H', 'GENERAL', 40, NULL, 1, '2020-09-11 20:51:59', 1),
(24, 4, 'I', 'GENERAL', 40, NULL, 1, '2020-09-11 20:52:01', 1),
(25, 4, 'J', 'GENERAL', 40, NULL, 1, '2020-09-11 20:52:02', 1),
(26, 4, 'K', 'GENERAL', 40, NULL, 1, '2020-09-11 20:52:08', 1),
(27, 16, 'A', 'GENERAL', 60, NULL, 1, '2020-11-25 11:37:04', 1),
(28, 17, 'A', 'GENERAL', 60, NULL, 1, '2020-11-25 11:37:04', 1);

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
-- Table structure for table `class_subject_list_table`
--

CREATE TABLE `class_subject_list_table` (
  `CSL_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `close_user_group_details`
--

CREATE TABLE `close_user_group_details` (
  `CUGD_Id` bigint(20) NOT NULL DEFAULT 0,
  `CUG_Id` int(11) NOT NULL,
  `User_Name` varchar(300) NOT NULL,
  `SMS_Contact_No` varchar(10) NOT NULL,
  `Whatsapp_Contact_No` varchar(12) NOT NULL,
  `User_Type` enum('STUDENT','STAFF','OTHERS','') NOT NULL,
  `User_Id` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 0,
  `School_Id` int(11) NOT NULL,
  `Updated_by` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `close_user_group_details`
--

INSERT INTO `close_user_group_details` (`CUGD_Id`, `CUG_Id`, `User_Name`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `User_Type`, `User_Id`, `Enabled`, `School_Id`, `Updated_by`, `Updated_On`) VALUES
(1, 1, 'Ravi3  Kishan3', '9899395627', '', 'STUDENT', 'STUD202001', 1, 1, 'admin', '2020-11-16 19:41:19'),
(2, 1, 'Ravi4  Kishan4', '9899395627', '', 'STUDENT', 'STUD202002', 1, 1, 'admin', '2020-11-16 19:41:19'),
(3, 1, 'Ravi5  Kishan5', '9899395627', '', 'STUDENT', 'STUD202003', 1, 1, 'admin', '2020-11-16 19:41:19'),
(4, 1, 'Ravi6  Kishan6', '9899395627', '', 'STUDENT', 'STUD202004', 1, 1, 'admin', '2020-11-16 19:41:19'),
(5, 1, 'Amit Sinha', '8709321740', '8709321740', 'STAFF', '14', 1, 1, 'admin', '2020-11-16 19:41:19'),
(6, 1, 'Arvind Sharma', '8709321740', '8709321740', 'STAFF', '22', 1, 1, 'admin', '2020-11-16 19:41:19'),
(7, 2, 'Bhagat Pandey', '8709321740', '8709321740', 'STAFF', '4', 1, 1, 'admin', '2020-11-18 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `close_user_group_master`
--

CREATE TABLE `close_user_group_master` (
  `CUG_Id` int(11) NOT NULL,
  `CUG_Name` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `close_user_group_master`
--

INSERT INTO `close_user_group_master` (`CUG_Id`, `CUG_Name`, `Enabled`, `School_Id`, `Created_By`, `Created_On`) VALUES
(1, 'Test CUG-001', 1, 1, 'admin', '2020-11-16 19:41:19'),
(2, 'CUG123456788', 1, 1, 'admin', '2020-11-18 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `department_master_table`
--

CREATE TABLE `department_master_table` (
  `Dept_Id` int(5) NOT NULL,
  `Dept_Name` varchar(100) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Enabled` int(1) NOT NULL DEFAULT 1,
  `School_Id` int(11) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_master_table`
--

INSERT INTO `department_master_table` (`Dept_Id`, `Dept_Name`, `Remarks`, `Enabled`, `School_Id`, `Created_On`, `Created_By`) VALUES
(1, 'Accounts Department', 'Accounts Department', 1, 1, '2020-11-01 12:28:07', 'admin'),
(2, 'Management', 'Management Department', 1, 1, '2020-11-01 12:29:51', 'admin'),
(3, 'Science Department-New', 'Science Department', 1, 1, '2020-11-01 12:29:51', 'admin'),
(4, 'Commerce Department', 'Commerce Department', 1, 1, '2020-11-01 12:29:51', 'admin'),
(5, 'Arts Department', 'Arts Department', 1, 1, '2020-11-01 12:29:51', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `designation_master_table`
--

CREATE TABLE `designation_master_table` (
  `Desig_Id` int(5) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Dept_Id` int(5) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` int(1) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master_table`
--

CREATE TABLE `employee_master_table` (
  `Employee_Id` int(8) UNSIGNED NOT NULL,
  `Type_Id` mediumint(2) DEFAULT NULL,
  `Dept_Id` int(5) DEFAULT NULL,
  `Employee_Grade` varchar(10) DEFAULT NULL,
  `Login_id` varchar(100) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `login_grade` int(2) DEFAULT 0,
  `login_enabled` tinyint(1) DEFAULT 1,
  `Employee_Name` varchar(150) DEFAULT NULL,
  `Employee_Address` varchar(200) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `Mob_Number` varchar(10) DEFAULT NULL,
  `SMS_Contact_No` varchar(10) NOT NULL,
  `Whatsapp_Contact_No` varchar(10) NOT NULL,
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

INSERT INTO `employee_master_table` (`Employee_Id`, `Type_Id`, `Dept_Id`, `Employee_Grade`, `Login_id`, `password`, `login_grade`, `login_enabled`, `Employee_Name`, `Employee_Address`, `DOJ`, `Mob_Number`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Blood_Group`, `DOB`, `Sex`, `Aadhar_Number`, `School_Id`, `Enabled`, `authorized`, `authorized_by`, `shift_start_hour`, `shift_end_hour`) VALUES
(1, 1, 1, NULL, 'mukherjee.mit@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 8, 1, 'Mithun Mukherjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(2, 2, 1, NULL, 'imbibeinfosystem@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 6, 1, 'Suman dutt', NULL, NULL, '8709321740', '9899395627', '9899395627', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(3, 3, 2, NULL, 'chaitan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Chaitan Mishra', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(4, 3, 2, NULL, 'bhagat@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Bhagat Pandey', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(5, 3, 3, NULL, 'asha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Asha Tyagi', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(6, 3, 4, NULL, 'varun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Varun Kumar', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(7, 3, 5, NULL, 'mukesh@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Mukesh Sinha', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(8, 3, 4, NULL, 'tarun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Tarun Thapar', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(9, 3, 5, NULL, 'pinky@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Pinky Banerjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(10, 3, 1, NULL, 'dali@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Dali Mukherjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(11, 3, 4, NULL, 'mithun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, 'Mithun Mukherjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(12, 3, 1, NULL, 'ashok@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Ashok Mishra', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(13, 1, 1, NULL, 'abc@def.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'abcdef', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(14, NULL, 1, NULL, 'test1', '12345', 1, 1, 'Amit Sinha', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(15, NULL, 1, NULL, 'test2', '12345', 1, 1, 'Rohan Verma', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(18, NULL, 1, NULL, 'test3', '12345', 1, 1, 'Ravi kant', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(19, NULL, 1, NULL, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Sushil Tripathi', NULL, NULL, '8709321740', '9801301878', '9801301878', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(20, NULL, 1, NULL, 'testadmin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Ashok Singh', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(21, NULL, 1, NULL, 'admintst2', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Ram Lal', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(22, NULL, 1, NULL, 'varun', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 1, 'Arvind Sharma', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(27, NULL, 1, NULL, 'mukherjee.mit', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Gautam Dubey', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(28, 1, 1, NULL, NULL, NULL, 0, 1, 'Test1', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(30, 1, 1, NULL, NULL, NULL, 0, 1, 'Test2', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(31, 1, 1, NULL, NULL, NULL, 0, 1, 'Test3', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(32, 1, 1, NULL, NULL, NULL, 0, 1, 'Test4', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(33, 1, 1, NULL, NULL, NULL, 0, 1, 'Test5', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(34, 1, 1, NULL, NULL, NULL, 0, 1, 'Test6', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(35, 1, 1, NULL, NULL, NULL, 0, 1, 'Test7', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(36, 1, 1, NULL, NULL, NULL, 0, 1, 'Test8', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(37, 1, 1, NULL, NULL, NULL, 0, 1, 'Test9', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(38, 1, 1, NULL, NULL, NULL, 0, 1, 'Test10', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(39, 1, 1, NULL, NULL, NULL, 0, 1, 'Tes11', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(40, 1, 1, NULL, NULL, NULL, 0, 1, 'Test12', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(41, 1, 1, NULL, NULL, NULL, 0, 1, 'Test13', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(42, 1, 1, NULL, NULL, NULL, 0, 1, 'Test14', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(43, 1, 1, NULL, NULL, NULL, 0, 1, 'Test15', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL);

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
(0, '2020-10-22', '2020-10-28', NULL, 'Durga Puja 2020', 1, 1, 1, 0, 0, 1, 'admin', '2020-10-14 14:14:11'),
(1, '2015-02-05', '2015-02-05', NULL, 'holiday', 1, 1, 1, 0, 0, 1, 'mukherjee.mit@gmail.com', '2015-02-28 07:06:42'),
(2, '2015-02-19', '2015-02-21', NULL, 'Festival Days', 1, 0, 0, 0, 0, 1, 'mukherjee.mit@gmail.com', '2015-02-28 07:10:46'),
(3, '2015-02-23', '2015-02-24', NULL, 'Festival Days', 1, 0, 0, -3, -1, 1, 'mukherjee.mit@gmail.com', '2015-02-28 07:11:24'),
(4, '2015-02-22', '2015-02-25', NULL, ' Festival Days', 0, 1, 1, 0, 0, 1, 'mukherjee.mit@gmail.com', '2015-02-28 17:23:20'),
(5, '2016-12-29', '2020-10-10', NULL, 'Chrismas Holidays', 1, 1, 1, 0, 0, 1, 'mukherjee.mit@gmail.com', '2020-10-14 14:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `lead_source_table`
--

CREATE TABLE `lead_source_table` (
  `leadid` int(11) DEFAULT NULL,
  `lead_source_name` varchar(100) DEFAULT NULL,
  `school_id` smallint(6) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_source_table`
--

INSERT INTO `lead_source_table` (`leadid`, `lead_source_name`, `school_id`, `updated_by`, `updated_on`) VALUES
(1, 'Announcements', 1, 'admin', '2020-08-17 10:22:17'),
(2, 'Banners and Handbills', 1, 'admin', '2020-08-17 10:22:17'),
(3, 'Google', 1, 'admin', '2020-08-17 10:22:17'),
(4, 'Youtube', 1, 'admin', '2020-08-17 10:22:17'),
(5, 'School Website', 1, 'admin', '2020-08-17 10:22:17'),
(6, 'School Teacher', 1, 'admin', '2020-08-17 10:22:17'),
(7, 'Marketting Person', 1, 'admin', '2020-08-17 10:22:17'),
(8, 'Marketting campaign', 1, 'admin', '2020-08-17 10:22:17'),
(9, 'From School Students', 1, 'admin', '2020-08-17 10:22:17'),
(10, 'From Friends', 1, 'admin', '2020-08-17 10:22:17');

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
-- Table structure for table `marketting_location_table`
--

CREATE TABLE `marketting_location_table` (
  `locationid` int(11) DEFAULT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `longitude` decimal(10,0) DEFAULT NULL,
  `latitude` decimal(10,0) DEFAULT NULL,
  `school_id` smallint(6) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketting_location_table`
--

INSERT INTO `marketting_location_table` (`locationid`, `location_name`, `longitude`, `latitude`, `school_id`, `updated_by`, `updated_on`) VALUES
(1, 'Hirapur', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(2, 'Koyla Nagar', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(3, 'Chiragora', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(4, 'Binod Nagar', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(5, 'Rangatand', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(6, 'Dhaiya', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(7, 'ISMr', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(8, 'Steel Gate', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(9, 'Saraidhela', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(10, 'Sastri Nagar', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34'),
(11, 'Baliapur', NULL, NULL, 1, 'admin', '2020-08-17 09:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `message_details_table`
--

CREATE TABLE `message_details_table` (
  `MD_Id` bigint(20) UNSIGNED NOT NULL,
  `Message_Id` bigint(20) UNSIGNED NOT NULL,
  `Message` varchar(800) NOT NULL,
  `Mobile_Number` varchar(10) NOT NULL,
  `Delivery_Date` datetime NOT NULL,
  `Delivery_Status` tinyint(1) NOT NULL,
  `View_Status` tinyint(1) NOT NULL DEFAULT 0,
  `User_Type` enum('STUDENT','STAFF','OTHERS') NOT NULL,
  `User_Id` varchar(100) DEFAULT NULL,
  `Group_Id` int(11) DEFAULT NULL COMMENT 'THIS COLUMN I0S USED TO STORE CLASS_SECTION_ID OR DEPARTMENT_ID OR CUG_GROUP_ID FOR THE RECORDS WHICH BELONGS TO GROUP MESSAGING PROCESS.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_details_table`
--

INSERT INTO `message_details_table` (`MD_Id`, `Message_Id`, `Message`, `Mobile_Number`, `Delivery_Date`, `Delivery_Status`, `View_Status`, `User_Type`, `User_Id`, `Group_Id`) VALUES
(1, 1, '', '8709321740', '0000-00-00 00:00:00', 1, 0, 'STUDENT', 'STUD20155', NULL),
(2, 1, '', '8709321740', '0000-00-00 00:00:00', 1, 0, 'STUDENT', 'STUD20156', NULL),
(3, 8, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(4, 8, '', '1236547892', '0000-00-00 00:00:00', 0, 0, '', '1236547892', NULL),
(5, 8, '', '3214568794', '0000-00-00 00:00:00', 0, 0, '', '3214568794', NULL),
(6, 9, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(7, 9, '', '1236547892', '0000-00-00 00:00:00', 0, 0, '', '1236547892', NULL),
(8, 9, '', '3214568794', '0000-00-00 00:00:00', 0, 0, '', '3214568794', NULL),
(9, 10, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(10, 10, '', '1236547892', '0000-00-00 00:00:00', 0, 0, '', '1236547892', NULL),
(11, 10, '', '3214568794', '0000-00-00 00:00:00', 0, 0, '', '3214568794', NULL),
(12, 11, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20151', NULL),
(13, 11, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20153', NULL),
(14, 12, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20151', NULL),
(15, 12, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20153', NULL),
(16, 13, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202001', NULL),
(17, 13, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202003', NULL),
(18, 13, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202004', NULL),
(19, 13, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202005', NULL),
(20, 14, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202001', NULL),
(21, 14, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202003', NULL),
(22, 15, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', NULL, NULL),
(23, 15, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', NULL, NULL),
(24, 15, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', NULL, NULL),
(25, 16, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', NULL, NULL),
(26, 16, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', NULL, NULL),
(27, 17, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '4', NULL),
(28, 17, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '3', NULL),
(29, 18, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '4', NULL),
(30, 18, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '3', NULL),
(31, 19, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '5', NULL),
(32, 20, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202001', NULL),
(33, 20, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202003', NULL),
(34, 20, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202004', NULL),
(35, 20, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202005', NULL),
(36, 21, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '13', NULL),
(37, 21, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '12', NULL),
(38, 21, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '20', NULL),
(39, 22, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202001', NULL),
(40, 22, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202003', NULL),
(41, 22, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202004', NULL),
(42, 22, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202005', NULL),
(43, 23, '', '8709321740', '0000-00-00 00:00:00', 0, 0, '', '8709321740', NULL),
(44, 23, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(45, 24, '', '7894561230', '0000-00-00 00:00:00', 0, 0, '', '7894561230', NULL),
(46, 25, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202001', NULL),
(47, 25, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202003', NULL),
(48, 25, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202004', NULL),
(49, 25, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202005', NULL),
(50, 26, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(51, 27, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(52, 28, '', '1234567800', '0000-00-00 00:00:00', 0, 0, '', '1234567800', NULL),
(53, 29, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(54, 30, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202004', NULL),
(55, 30, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202005', NULL),
(56, 30, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202006', NULL),
(57, 30, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202008', NULL),
(58, 31, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '13', NULL),
(59, 31, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '14', NULL),
(60, 31, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '22', NULL),
(61, 31, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '12', NULL),
(62, 32, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(63, 33, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202004', NULL),
(64, 33, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202005', NULL),
(65, 33, '', '9899395627', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD202006', NULL),
(66, 34, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '13', NULL),
(67, 34, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '14', NULL),
(68, 34, '', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STAFF', '22', NULL),
(69, 35, '', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_master_table`
--

CREATE TABLE `message_master_table` (
  `Message_Id` bigint(20) UNSIGNED NOT NULL,
  `Message_Category` enum('Attendance','Fee','Transport','Notice') NOT NULL,
  `Message_Title` varchar(200) NOT NULL,
  `Message` varchar(800) DEFAULT NULL,
  `Message_Date` datetime NOT NULL,
  `Message_Type` enum('SMS','Whatsapp') DEFAULT NULL,
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_master_table`
--

INSERT INTO `message_master_table` (`Message_Id`, `Message_Category`, `Message_Title`, `Message`, `Message_Date`, `Message_Type`, `School_Id`, `Created_By`, `Created_On`) VALUES
(1, 'Attendance', ' fdasf safas f', 'asdf asdf dasfdasf das', '2020-09-11 17:25:00', '', 1, 'admin', '2020-09-11 15:25:52'),
(2, 'Attendance', 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:55:00', '', 1, 'admin', '2020-09-11 17:55:14'),
(3, 'Attendance', 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:58:00', '', 1, 'admin', '2020-09-11 17:58:39'),
(4, 'Attendance', 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:59:00', '', 1, 'admin', '2020-09-11 17:59:38'),
(5, 'Attendance', 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:59:00', '', 1, 'admin', '2020-09-11 17:59:52'),
(6, 'Attendance', 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 20:09:00', '', 1, 'admin', '2020-09-11 18:09:16'),
(7, 'Attendance', 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 20:10:00', '', 1, 'admin', '2020-09-11 18:10:29'),
(8, 'Attendance', 'other number message', 'test to other number message.', '2020-09-11 20:18:00', '', 1, 'admin', '2020-09-11 18:18:16'),
(9, 'Attendance', 'other number message', 'test to other number message.', '2020-09-11 21:18:00', '', 1, 'admin', '2020-09-11 19:18:48'),
(10, 'Attendance', 'other number message', 'test to other number message.', '2020-09-11 21:18:00', '', 1, 'admin', '2020-09-11 19:18:58'),
(11, 'Attendance', 'other number message', 'test to other number message.', '2020-09-11 21:19:00', '', 1, 'admin', '2020-09-11 19:19:27'),
(12, 'Attendance', 'other number message', 'test to other number message.', '2020-09-11 21:58:00', '', 1, 'admin', '2020-09-11 19:58:49'),
(13, 'Attendance', 'test sms', 'this is test sms', '2020-11-30 15:58:00', '', 1, 'admin', '2020-11-01 14:58:19'),
(14, 'Attendance', 'fdas dsf ', ' asf afa fsd s ', '2020-11-30 17:30:00', '', 1, 'admin', '2020-11-01 16:30:54'),
(15, 'Attendance', 'fdas dsf ', ' asf afa fsd s ', '2020-11-30 17:31:00', '', 1, 'admin', '2020-11-01 16:31:06'),
(16, 'Attendance', 'fdas dsf ', ' asf afa fsd s ', '2020-11-30 17:38:00', '', 1, 'admin', '2020-11-01 16:38:19'),
(17, 'Attendance', 'das fadsf sdfs', ' f sf sfasd sd a', '2020-11-30 17:49:00', '', 1, 'admin', '2020-11-01 16:49:00'),
(18, 'Attendance', 'das fadsf sdfs', ' f sf sfasd sd a', '2020-11-30 17:49:00', '', 1, 'admin', '2020-11-01 16:49:04'),
(19, 'Attendance', 'das fadsf sdfs', ' f sf sfasd sd a', '2020-11-30 19:07:00', '', 1, 'admin', '2020-11-01 18:07:08'),
(20, 'Attendance', ' FG DFGSF DGS', '  DFSGDFSG DS GDFSGSDFDFS', '2020-11-30 20:49:00', '', 1, 'admin', '2020-11-01 19:49:06'),
(21, 'Attendance', ' FG DFGSF DGS', '  DFSGDFSG DS GDFSGSDFDFS', '2020-11-30 20:49:00', '', 1, 'admin', '2020-11-01 19:49:19'),
(22, 'Attendance', ' dffaf a', '  dasfa fs', '2020-11-09 17:31:00', '', 1, 'admin', '2020-11-08 16:31:28'),
(23, 'Attendance', 'd das fads fads', ' fdas fdas fdas fs', '2020-11-08 17:36:00', '', 1, 'admin', '2020-11-08 16:36:05'),
(24, 'Attendance', 'das fdasfasd as', ' d  fdsf asf', '2020-11-09 17:52:00', '', 1, 'admin', '2020-11-08 16:52:08'),
(25, 'Attendance', 'test1', 'test1 message', '2020-11-10 14:08:00', '', 1, 'admin', '2020-11-10 13:08:34'),
(26, 'Attendance', 'ds fdasf ds', ' fdsfds sdaasd', '2020-11-10 21:06:00', '', 1, 'admin', '2020-11-10 20:06:09'),
(27, 'Attendance', 'dff dasf', 'das fdsafds fdasdfas', '2020-11-10 21:09:00', '', 1, 'admin', '2020-11-10 20:09:21'),
(28, 'Attendance', 'AS DFDS FDAS', 'F DS FDAS FDSAFDAS ', '2020-11-10 21:10:00', '', 1, 'admin', '2020-11-10 20:10:42'),
(29, 'Attendance', 'DFDA F AS', 'DS FDAS FDAS', '2020-11-10 21:11:00', '', 1, 'admin', '2020-11-10 20:11:42'),
(30, 'Attendance', 'df sdfdsaf', 'dsafasdfsadf', '2020-11-11 21:17:00', '', 1, 'admin', '2020-11-11 20:17:22'),
(31, 'Attendance', 'd fdasfdasfdsa', 'ds fdsafadsfdsadsf', '2020-11-11 21:17:00', '', 1, 'admin', '2020-11-11 20:17:54'),
(32, 'Attendance', 'f sdfsdfa', 'sdfsadfadsfads', '2020-11-11 21:18:00', '', 1, 'admin', '2020-11-11 20:18:36'),
(33, 'Attendance', 'test sms and whatsapp msg', 'df dsfsfasfsf saf', '2020-11-16 20:10:00', '', 1, 'admin', '2020-11-16 19:10:29'),
(34, 'Attendance', 'test sms and whatsapp msg', 'fasdf dsfasf', '2020-11-16 20:13:00', '', 1, 'admin', '2020-11-16 19:13:03'),
(35, 'Attendance', 'test sms and whatsapp msg', 'adfs s fsas f', '2020-11-16 20:13:00', '', 1, 'admin', '2020-11-16 19:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `message_user_group_table`
--

CREATE TABLE `message_user_group_table` (
  `User_Type_Id` int(11) NOT NULL,
  `User_Type` varchar(100) NOT NULL,
  `Individual_Select_Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `Group_Select_Enabled` int(11) NOT NULL DEFAULT 1,
  `CUG_Enabled` tinyint(1) NOT NULL COMMENT 'IT DEFINES IF THE GROUP WILL BE DISPLAYED IN CUG CREATION FORM OR NOT. 1 TO DISPLAY AND 0 TO HIDE.',
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_user_group_table`
--

INSERT INTO `message_user_group_table` (`User_Type_Id`, `User_Type`, `Individual_Select_Enabled`, `Group_Select_Enabled`, `CUG_Enabled`, `Enabled`, `School_Id`, `Created_By`, `Created_On`) VALUES
(1, 'Student', 1, 1, 1, 1, 1, 'admin', '2020-09-10 22:19:28'),
(2, 'School Staff', 1, 1, 1, 1, 1, 'admin', '2020-09-10 22:19:21'),
(3, 'Close User Group', 0, 1, 0, 1, 1, 'admin', '2020-09-11 16:37:48'),
(4, 'Entire School', 0, 1, 0, 1, 1, 'admin', '2020-09-08 21:16:03'),
(5, 'Others', 1, 0, 0, 1, 1, 'admin', '2020-09-08 21:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `notice_list_table`
--

CREATE TABLE `notice_list_table` (
  `Notice_List_Id` int(11) NOT NULL,
  `Notice_Id` int(11) NOT NULL,
  `Reff_Type` enum('ClassId','DepartmentId') NOT NULL,
  `Reff_Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_list_table`
--

INSERT INTO `notice_list_table` (`Notice_List_Id`, `Notice_Id`, `Reff_Type`, `Reff_Id`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 'ClassId', 0, 1, 1, 'admin', '2020-11-21 17:42:30'),
(2, 1, 'ClassId', 1, 1, 1, 'admin', '2020-11-21 17:42:30'),
(3, 1, 'ClassId', 2, 1, 1, 'admin', '2020-11-21 17:42:30'),
(4, 1, 'ClassId', 4, 1, 1, 'admin', '2020-11-21 17:42:30'),
(5, 1, 'ClassId', 5, 1, 1, 'admin', '2020-11-21 17:42:30'),
(6, 1, 'ClassId', 6, 1, 1, 'admin', '2020-11-21 17:42:30'),
(7, 1, 'ClassId', 7, 1, 1, 'admin', '2020-11-21 17:42:30'),
(8, 1, 'ClassId', 8, 1, 1, 'admin', '2020-11-21 17:42:30'),
(9, 1, 'ClassId', 9, 1, 1, 'admin', '2020-11-21 17:42:30'),
(10, 1, 'ClassId', 10, 1, 1, 'admin', '2020-11-21 17:42:30'),
(11, 1, 'ClassId', 11, 1, 1, 'admin', '2020-11-21 17:42:30'),
(12, 1, 'ClassId', 12, 1, 1, 'admin', '2020-11-21 17:42:30'),
(13, 1, 'ClassId', 13, 1, 1, 'admin', '2020-11-21 17:42:30'),
(14, 1, 'ClassId', 14, 1, 1, 'admin', '2020-11-21 17:42:30'),
(15, 1, 'ClassId', 15, 1, 1, 'admin', '2020-11-21 17:42:30'),
(16, 2, 'ClassId', 0, 1, 1, 'admin', '2020-11-21 17:43:08'),
(17, 2, 'ClassId', 1, 1, 1, 'admin', '2020-11-21 17:43:08'),
(18, 2, 'ClassId', 2, 1, 1, 'admin', '2020-11-21 17:43:08'),
(19, 2, 'ClassId', 4, 1, 1, 'admin', '2020-11-21 17:43:08'),
(20, 2, 'ClassId', 5, 1, 1, 'admin', '2020-11-21 17:43:08'),
(21, 2, 'ClassId', 6, 1, 1, 'admin', '2020-11-21 17:43:08'),
(22, 2, 'ClassId', 7, 1, 1, 'admin', '2020-11-21 17:43:08'),
(23, 2, 'ClassId', 8, 1, 1, 'admin', '2020-11-21 17:43:08'),
(24, 2, 'ClassId', 9, 1, 1, 'admin', '2020-11-21 17:43:08'),
(25, 2, 'ClassId', 10, 1, 1, 'admin', '2020-11-21 17:43:08'),
(26, 2, 'ClassId', 11, 1, 1, 'admin', '2020-11-21 17:43:08'),
(27, 2, 'ClassId', 12, 1, 1, 'admin', '2020-11-21 17:43:08'),
(28, 2, 'ClassId', 13, 1, 1, 'admin', '2020-11-21 17:43:08'),
(29, 2, 'ClassId', 14, 1, 1, 'admin', '2020-11-21 17:43:08'),
(30, 2, 'ClassId', 15, 1, 1, 'admin', '2020-11-21 17:43:08'),
(31, 2, 'DepartmentId', 1, 1, 1, 'admin', '2020-11-21 17:43:08'),
(32, 2, 'DepartmentId', 2, 1, 1, 'admin', '2020-11-21 17:43:08'),
(33, 2, 'DepartmentId', 3, 1, 1, 'admin', '2020-11-21 17:43:08'),
(34, 2, 'DepartmentId', 4, 1, 1, 'admin', '2020-11-21 17:43:08'),
(35, 2, 'DepartmentId', 5, 1, 1, 'admin', '2020-11-21 17:43:08'),
(36, 3, 'DepartmentId', 1, 1, 1, 'admin', '2020-11-21 17:43:29'),
(37, 3, 'DepartmentId', 5, 1, 1, 'admin', '2020-11-21 17:43:29'),
(38, 3, 'DepartmentId', 4, 1, 1, 'admin', '2020-11-21 17:43:29'),
(39, 3, 'DepartmentId', 2, 1, 1, 'admin', '2020-11-21 17:43:29'),
(40, 3, 'DepartmentId', 3, 1, 1, 'admin', '2020-11-21 17:43:29'),
(41, 4, 'DepartmentId', 1, 1, 1, 'admin', '2020-11-23 07:12:59'),
(42, 4, 'DepartmentId', 5, 1, 1, 'admin', '2020-11-23 07:12:59'),
(43, 4, 'DepartmentId', 4, 1, 1, 'admin', '2020-11-23 07:12:59'),
(44, 4, 'DepartmentId', 2, 1, 1, 'admin', '2020-11-23 07:12:59'),
(45, 4, 'DepartmentId', 3, 1, 1, 'admin', '2020-11-23 07:12:59'),
(46, 5, 'ClassId', 0, 1, 1, 'admin', '2020-11-23 07:16:49'),
(47, 5, 'ClassId', 1, 1, 1, 'admin', '2020-11-23 07:16:49'),
(48, 5, 'ClassId', 2, 1, 1, 'admin', '2020-11-23 07:16:49'),
(49, 5, 'ClassId', 4, 1, 1, 'admin', '2020-11-23 07:16:49'),
(50, 5, 'ClassId', 5, 1, 1, 'admin', '2020-11-23 07:16:49'),
(51, 5, 'ClassId', 6, 1, 1, 'admin', '2020-11-23 07:16:49'),
(52, 5, 'ClassId', 7, 1, 1, 'admin', '2020-11-23 07:16:49'),
(53, 5, 'ClassId', 8, 1, 1, 'admin', '2020-11-23 07:16:49'),
(54, 5, 'ClassId', 9, 1, 1, 'admin', '2020-11-23 07:16:49'),
(55, 5, 'ClassId', 10, 1, 1, 'admin', '2020-11-23 07:16:49'),
(56, 5, 'ClassId', 11, 1, 1, 'admin', '2020-11-23 07:16:49'),
(57, 5, 'ClassId', 12, 1, 1, 'admin', '2020-11-23 07:16:49'),
(58, 5, 'ClassId', 13, 1, 1, 'admin', '2020-11-23 07:16:49'),
(59, 5, 'ClassId', 14, 1, 1, 'admin', '2020-11-23 07:16:49'),
(60, 5, 'ClassId', 15, 1, 1, 'admin', '2020-11-23 07:16:49'),
(61, 6, 'ClassId', 1, 1, 1, 'admin', '2020-11-23 08:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `notice_master_table`
--

CREATE TABLE `notice_master_table` (
  `Notice_Id` int(11) NOT NULL,
  `Notice_Title` varchar(200) NOT NULL,
  `Notice_Type` enum('Notice','Circular') NOT NULL,
  `Notice_Description` varchar(1000) NOT NULL,
  `Filename` varchar(512) NOT NULL,
  `Filepath` varchar(512) NOT NULL,
  `Publish_In_Web` tinyint(1) NOT NULL DEFAULT 0,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_master_table`
--

INSERT INTO `notice_master_table` (`Notice_Id`, `Notice_Title`, `Notice_Type`, `Notice_Description`, `Filename`, `Filepath`, `Publish_In_Web`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'this is notice for all stuidents', 'Circular', '<p>sad dd sd s dssdsadsd d</p>\r\n', 'cf9d424b719b05f2272e4f08d1196864.jpg', './app_images/notices', 1, 1, 1, 'admin', '2020-11-21 17:42:30'),
(2, 'this is notice for all stuidents and staffs', 'Circular', '', '9dfe920d833540f364e2d623dea354e4.jpg', './app_images/notices', 1, 1, 1, 'admin', '2020-11-21 17:43:08'),
(3, 'this is notice for all staffs', 'Circular', '', '0b7d6567d69ed7206e166236dc9b27a2.jpg', './app_images/notices', 1, 1, 1, 'admin', '2020-11-21 17:43:29'),
(4, 'This is a new title', 'Notice', 'This is detail of the notice.', 'NULL', 'NULL', 1, 1, 1, 'admin', '2020-11-23 07:12:59'),
(5, 'This is 2nd title', 'Circular', 'SOme details', 'NULL', 'NULL', 0, 1, 1, 'admin', '2020-11-23 07:16:49'),
(6, 'This is 3rd Notice - SD', 'Notice', 'This is the Test Details.', '268bc4845bbefec306002954a07c1215.jpg', './app_images/notices', 1, 1, 1, 'admin', '2020-11-23 08:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `school_master_table`
--

CREATE TABLE `school_master_table` (
  `school_id` mediumint(8) UNSIGNED NOT NULL,
  `school_code` varchar(3) NOT NULL,
  `school_name` varchar(200) DEFAULT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `district_id` int(5) UNSIGNED DEFAULT NULL,
  `business_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `end_year` year(4) DEFAULT NULL,
  `start_month` int(2) DEFAULT NULL,
  `end_month` int(2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `next_start_year` year(4) DEFAULT NULL,
  `next_end_year` year(4) DEFAULT NULL,
  `next_start_month` int(2) DEFAULT NULL,
  `next_end_month` int(2) DEFAULT NULL,
  `next_start_date` date DEFAULT NULL,
  `next_end_date` date DEFAULT NULL,
  `current_addmission` year(4) DEFAULT NULL,
  `addmission_status` tinyint(1) DEFAULT 0,
  `opening_balance` float(12,2) DEFAULT NULL,
  `closing_balance` float(12,2) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(100) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT 0,
  `conf_flag` tinyint(1) DEFAULT 0,
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_master_table`
--

INSERT INTO `school_master_table` (`school_id`, `school_code`, `school_name`, `area`, `city`, `zip_code`, `district_id`, `business_id`, `start_year`, `end_year`, `start_month`, `end_month`, `start_date`, `end_date`, `next_start_year`, `next_end_year`, `next_start_month`, `next_end_month`, `next_start_date`, `next_end_date`, `current_addmission`, `addmission_status`, `opening_balance`, `closing_balance`, `updated_on`, `updated_by`, `enabled`, `conf_flag`, `created_by`, `created_on`) VALUES
(1, 'ABC', 'The ABC PAATHSHALA', 'BARI CO-OPERATIVE', 'Bokaro Steel City', '', 2, 1, 2020, 2021, 4, 3, '2020-04-01', '2021-03-31', 2021, 2022, 4, 3, '2021-04-01', '2022-03-31', 2020, 1, NULL, NULL, '2020-08-31 14:14:13', 'mukherjee.mit@gmail.com', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance_table`
--

CREATE TABLE `staff_attendance_table` (
  `Attendance_Id` int(11) NOT NULL,
  `Attendance_Date` date NOT NULL,
  `Staff_Id` varchar(20) NOT NULL,
  `Attendance_Status` enum('Present','Absent','Late','Off') NOT NULL,
  `In_Time` datetime NOT NULL,
  `Out_Time` tinyint(4) NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_document_table`
--

CREATE TABLE `staff_document_table` (
  `Document_Id` int(11) NOT NULL,
  `Document_Name` varchar(100) NOT NULL,
  `File_Name` varchar(100) NOT NULL,
  `File_Path` varchar(200) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` int(11) DEFAULT NULL,
  `Updated_By` varchar(50) DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_document_table`
--

INSERT INTO `staff_document_table` (`Document_Id`, `Document_Name`, `File_Name`, `File_Path`, `Staff_Id`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'PAN', 'f58ea8caad18367dedb363f0844ef79b.jpg', './app_images/staff_documents/1_documents', 1, 1, 1, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_master_table`
--

CREATE TABLE `staff_master_table` (
  `Staff_Id` varchar(20) NOT NULL,
  `Staff_Name` varchar(100) NOT NULL,
  `Gender` enum('MALE','FEMALE','OTHER','') NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `Staff_Email` varchar(255) DEFAULT NULL,
  `Category` enum('Teaching','Non-Teaching','Both') DEFAULT NULL,
  `Department` int(5) DEFAULT NULL,
  `Designation_Id` int(5) DEFAULT NULL,
  `Alt_Contact_No` varchar(10) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `Fathers_Or_Husband_Name` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Blood_Group` varchar(15) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `Experience` int(5) DEFAULT NULL,
  `DOJ` date DEFAULT NULL,
  `Job_Status` varchar(50) DEFAULT NULL,
  `Bank_Account_No` varchar(50) DEFAULT NULL,
  `Bank_Name` varchar(100) DEFAULT NULL,
  `Bank_Branch` varchar(200) DEFAULT NULL,
  `Bank_IFSC` varchar(50) DEFAULT NULL,
  `PAN_No` varchar(50) DEFAULT NULL,
  `Aadhar_No` varchar(50) DEFAULT NULL,
  `UAN_No` varchar(50) DEFAULT NULL,
  `PF_Acc_No` varchar(50) DEFAULT NULL,
  `ESI_Acc_No` varchar(50) DEFAULT NULL,
  `Role` enum('ADMIN','PRINCIPAL') DEFAULT NULL,
  `Login_Id` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `School_Id` int(5) DEFAULT 1,
  `Enabled` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_master_table`
--

INSERT INTO `staff_master_table` (`Staff_Id`, `Staff_Name`, `Gender`, `Contact_No`, `Staff_Email`, `Category`, `Department`, `Designation_Id`, `Alt_Contact_No`, `Address`, `City`, `District`, `State`, `Fathers_Or_Husband_Name`, `DOB`, `Blood_Group`, `Qualification`, `Experience`, `DOJ`, `Job_Status`, `Bank_Account_No`, `Bank_Name`, `Bank_Branch`, `Bank_IFSC`, `PAN_No`, `Aadhar_No`, `UAN_No`, `PF_Acc_No`, `ESI_Acc_No`, `Role`, `Login_Id`, `password`, `School_Id`, `Enabled`) VALUES
('1', 'Test Staff1111', 'MALE', '1111111111', 'saff1@gmail1.com', 'Teaching', 2, 2, '1234567881', 'jharkhand1', 'Jharkhand11', '4', '4', 'test father name11', '2020-11-13', 'o-', 'test qualification-', 1, '2020-11-05', '', 'testbankacc11111', 'test bank name111', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', 'teststaff111', '12345', 1, 1),
('2', 'Suman', 'MALE', '4564564646', NULL, 'Teaching', 2, 1, '234353345', 'sgfdfgdgd ', 'dfgdgdg', '1', '2', 'sdfdfs', '1980-10-10', 'sfs', 'fdsfs', 10, '2020-11-02', 'fdgdgdgfds', '', '345353', 'Gfgdfg', 'dgdgd', 'gdgdfg', 'bfhfgghf', 'ddgdgd', 'sdggfd', 'ssgd', NULL, NULL, NULL, 1, 1),
('3', 'Test Staff1111', 'MALE', '1111111111', 'saff1@gmail1.com', 'Teaching', 2, 2, '1234567881', 'jharkhand1', 'Jharkhand11', '4', '4', 'test father name11', '2020-11-13', 'o-', 'test qualification-', 1, '2020-11-05', '', 'testbankacc11111', 'test bank name111', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', 'teststaff111', '12345', 1, 1),
('4', 'Test Staff1', 'MALE', '1234567890', 'saff2@gmail.com', 'Teaching', 2, 1, '1234567890', 'bbsr', 'bhubaneswar', '2', '3', 'test father name1', '2020-11-10', 'o+', 'test qualification', 3, '2020-11-04', '3', 'testaccno1', 'test bank name1', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', 'teststaff1', '1234567', 1, 0),
('5', 'Test Staff1111', 'MALE', '1111111111', 'saff1@gmail1.com', 'Teaching', 2, 2, '1234567881', 'jharkhand1', 'Jharkhand11', '4', '4', 'test father name11', '2020-11-13', 'o-', 'test qualification-', 1, '2020-11-05', '', 'testbankacc11111', 'test bank name111', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', 'teststaff111', '12345', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_class_details`
--

CREATE TABLE `student_class_details` (
  `Student_Details_Id` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Class_No` int(11) DEFAULT NULL,
  `Class_Sec_Id` int(11) DEFAULT NULL,
  `Roll_No` int(11) DEFAULT NULL,
  `Session` varchar(10) NOT NULL,
  `Session_Start_Year` int(4) NOT NULL,
  `Session_End_Year` int(4) NOT NULL,
  `CJD` date DEFAULT NULL,
  `CJD_Remarks` varchar(100) DEFAULT NULL,
  `CLD` date DEFAULT NULL,
  `CLD_Remarks` varchar(100) DEFAULT NULL,
  `Promoted` tinyint(1) NOT NULL DEFAULT 0,
  `Promoted_Remarks` varchar(100) DEFAULT NULL,
  `Promotion_UpdatedBy` varchar(100) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(11) NOT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class_details`
--

INSERT INTO `student_class_details` (`Student_Details_Id`, `Student_Id`, `Class_Id`, `Class_No`, `Class_Sec_Id`, `Roll_No`, `Session`, `Session_Start_Year`, `Session_End_Year`, `CJD`, `CJD_Remarks`, `CLD`, `CLD_Remarks`, `Promoted`, `Promoted_Remarks`, `Promotion_UpdatedBy`, `Enabled`, `School_Id`, `Remarks`, `Updated_By`, `Updated_On`) VALUES
(1, 'STUD202001', 1, -2, 1, 1, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 18:52:04'),
(2, 'STUD202002', 1, -2, 1, 2, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:04:54'),
(3, 'STUD202003', 1, -2, 1, 3, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:04:54'),
(4, 'STUD202004', 1, -2, 1, 4, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(5, 'STUD202005', 1, -2, 1, 5, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(6, 'STUD202006', 1, -2, 1, 6, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(7, 'STUD202007', 1, -2, 1, 7, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(8, 'STUD202008', 1, -2, 1, 8, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(9, 'STUD202009', 1, -2, 1, 9, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(10, 'STUD202010', 1, -2, 1, 10, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(11, 'STUD202011', 1, -2, 1, 11, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-16 19:05:33'),
(12, '156/2018', 2, 0, 2, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(13, '120/2018', 2, 0, 2, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(14, '150/2018', 2, 0, 2, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(15, '108/2018', 2, 0, 2, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(16, '143/2018', 2, 0, 2, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(17, '58/2020', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(18, '019/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(19, '020/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(20, '121/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(21, '191/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(22, '132/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(23, '174/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(24, '194/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(25, '002/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(26, '030/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(27, '038/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(28, '025/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(29, '110/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(30, '004/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(31, '176/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(32, '107/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(33, '028/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(34, '187/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(35, '56/2020', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(36, '63/2020', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(37, '173/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(38, '170/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(39, '014/2019', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(40, '140/2018', 1, 0, 1, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(41, '027/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(42, '040/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(43, '034/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(44, '035/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(45, '057/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(46, '055/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(47, '011/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(48, '007/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(49, '029/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(50, '006/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(51, '062/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(52, '018/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(53, '023/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(54, '067/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(55, '069/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(56, '059/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(57, '070/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(58, '052/2020', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(59, '047/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(60, '048/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(61, '045/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(62, '041/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(63, '049/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(64, '050/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(65, '044/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(66, '053/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(67, '054/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(68, '042/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(69, '15/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(70, '46/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(71, '13/2019', 16, 0, 27, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(72, '61/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(73, '60/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(74, '64/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(75, '65/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(76, '66/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(77, '68/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(78, '51/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49'),
(79, '71/2020', 17, 0, 28, NULL, '2020-2021', 2020, 2020, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'admin', '2020-11-25 13:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_details_old`
--

CREATE TABLE `student_class_details_old` (
  `scd_id` mediumint(8) UNSIGNED NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `class_id` mediumint(9) DEFAULT NULL,
  `class_no` int(3) DEFAULT NULL,
  `class_sec_id` mediumint(9) DEFAULT NULL,
  `rollno` int(2) DEFAULT NULL,
  `session` varchar(9) NOT NULL,
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
-- Dumping data for table `student_class_details_old`
--

INSERT INTO `student_class_details_old` (`scd_id`, `student_id`, `class_id`, `class_no`, `class_sec_id`, `rollno`, `session`, `session_start_year`, `session_end_year`, `cjd`, `cjd_remarks`, `cld`, `cld_remarks`, `promoted`, `promoted_remarks`, `promotion_updatedby`, `enabled`, `school_id`, `remarks`) VALUES
(1, 'STUD202001', 1, -3, 1, 1, '2020-2021', 2020, 2021, '2020-02-07', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(2, 'STUD202002', 2, -2, 1, 7, '2020-2021', 2020, 2021, '2020-02-08', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(3, 'STUD202003', 1, -3, 1, 2, '2020-2021', 2020, 2021, '2020-02-08', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(4, 'STUD202004', 1, -3, 1, 3, '2020-2021', 2020, 2021, '2020-04-06', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(5, 'STUD202005', 1, -3, 1, 4, '2020-2021', 2020, 2021, '2020-04-06', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(6, 'STUD202006', 1, -3, 1, 5, '2020-2021', 2020, 2021, '2020-05-14', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(7, 'STUD202007', 2, -2, 0, 1, '2020-2021', 2020, 2021, '2020-12-17', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(8, 'STUD202008', 1, -2, 1, 6, '2020-2021', 2020, 2021, '2020-07-11', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(9, 'STUD202009', 1, -3, 1, 9, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(10, 'STUD202010', 1, -3, 1, 10, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(11, 'STUD202011', 1, -3, 1, 11, '2020-2021', 2020, 2021, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_master_table`
--

CREATE TABLE `student_master_table` (
  `Student_Id` varchar(20) NOT NULL,
  `Admission_Id` mediumint(8) DEFAULT NULL,
  `School_Id` mediumint(8) NOT NULL,
  `Session` varchar(9) NOT NULL,
  `Session_Start_Year` int(4) DEFAULT NULL,
  `Session_End_Year` int(4) DEFAULT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Class_Id` smallint(8) UNSIGNED NOT NULL,
  `Class_Sec_Id` smallint(8) UNSIGNED DEFAULT NULL,
  `Gender` enum('FEMALE','MALE') DEFAULT NULL,
  `DOB` date NOT NULL,
  `Age` tinyint(3) UNSIGNED DEFAULT NULL,
  `Social_Category` enum('GENERAL','SC','ST','OBC') DEFAULT 'GENERAL',
  `Discount_Category` smallint(6) DEFAULT NULL,
  `Locality` smallint(6) DEFAULT NULL,
  `Academic_Session` varchar(9) DEFAULT NULL,
  `Mother_Tongue` smallint(3) UNSIGNED DEFAULT NULL,
  `Religion` smallint(5) UNSIGNED DEFAULT NULL,
  `Nationality` enum('INDIAN','OTHERS') DEFAULT NULL,
  `Blood_Group` enum('AB-Negative','B-Negative','AB-P	ositive','A-Negative','O-Negative','B-Positive','A-Positive','O-Positive') DEFAULT NULL,
  `Aadhar_No` varchar(12) DEFAULT NULL,
  `Student_Image` varchar(100) DEFAULT NULL,
  `Prev_School_Name` varchar(100) DEFAULT NULL,
  `Prev_School_Medium` enum('English','Hindi','Others','Bengali') DEFAULT NULL,
  `Prev_School_Board` enum('CBSE','ICSE','OTHERS') DEFAULT NULL,
  `Prev_School_Class` smallint(6) DEFAULT NULL,
  `Comm_Address` varchar(100) DEFAULT NULL,
  `Comm_Add_Country` varchar(50) DEFAULT NULL,
  `Comm_Add_State` varchar(50) DEFAULT NULL,
  `Comm_Add_City_Dist` varchar(50) DEFAULT NULL,
  `Comm_Add_Pincode` varchar(10) DEFAULT NULL,
  `Comm_Add_ContactNo` varchar(12) DEFAULT NULL,
  `Resid_Address` varchar(100) DEFAULT NULL,
  `Resid_Add_Country` varchar(50) DEFAULT NULL,
  `Resid_Add_State` varchar(50) DEFAULT NULL,
  `Resid_Add_City_Dist` varchar(50) DEFAULT NULL,
  `Resid_Add_Pincode` varchar(10) DEFAULT NULL,
  `Resid_Add_ContactNo` varchar(12) DEFAULT NULL,
  `Sibling_1_Student_Id` varchar(20) DEFAULT NULL,
  `Sibling_1_Class` smallint(6) DEFAULT NULL,
  `Sibling_1_Section` varchar(3) DEFAULT NULL,
  `Sibling_1_RollNo` mediumint(8) DEFAULT NULL,
  `Sibling_2_Student_Id` varchar(20) DEFAULT NULL,
  `Sibling_2_Class` smallint(6) DEFAULT NULL,
  `Sibling_2_Section` varchar(3) DEFAULT NULL,
  `Sibling_2_RollNo` mediumint(8) DEFAULT NULL,
  `Father_Name` varchar(150) DEFAULT NULL,
  `Father_Qualification` enum('Non-Matric','Matriculation','Intermediate','Graduate','Post Graduate','PHD','Other') DEFAULT NULL,
  `Father_Occupation` enum('Private Sec. Employee','Public/PSU Sec. Employee','Business','Doctor','Armed Forces','Lawyer','Engineer','Other') DEFAULT NULL,
  `Father_Designation` varchar(100) DEFAULT NULL,
  `Father_Org_Name` varchar(100) DEFAULT NULL,
  `Father_Org_Add` varchar(100) DEFAULT NULL,
  `Father_City` varchar(100) DEFAULT NULL,
  `Father_State` varchar(100) DEFAULT NULL,
  `Father_Country` varchar(100) DEFAULT NULL,
  `Father_Pincode` varchar(10) DEFAULT NULL,
  `Father_Email` varchar(100) DEFAULT NULL,
  `Father_Contact_No` varchar(12) DEFAULT NULL,
  `Father_Annual_Income` int(10) DEFAULT NULL,
  `Father_Aadhar_Card` varchar(12) DEFAULT NULL,
  `Father_Alumni` enum('Yes','No') DEFAULT NULL,
  `Father_Image` varchar(100) DEFAULT NULL,
  `Mother_Name` varchar(150) DEFAULT NULL,
  `Mother_Qualification` enum('Non-Matric','Matriculation','Intermediate','Graduate','Post Graduate','PHD','Other') DEFAULT NULL,
  `Mother_Occupation` enum('Private Sec. Emp','Public/PSU Sec. Emp','Business','Doctor','Armed Forces','Lawyer','Engineer','Other') DEFAULT NULL,
  `Mother_Designation` varchar(100) DEFAULT NULL,
  `Mother_Org_Name` varchar(100) DEFAULT NULL,
  `Mother_Org_Add` varchar(100) DEFAULT NULL,
  `Mother_City` varchar(100) DEFAULT NULL,
  `Mother_State` varchar(100) DEFAULT NULL,
  `Mother_Country` varchar(100) DEFAULT NULL,
  `Mother_Pincode` varchar(10) DEFAULT NULL,
  `Mother_Email` varchar(100) DEFAULT NULL,
  `Mother_Contact_No` varchar(12) DEFAULT NULL,
  `Mother_Annual_Income` int(10) DEFAULT NULL,
  `Mother_Aadhar_Card` varchar(12) DEFAULT NULL,
  `Mother_Alumni` enum('Yes','No') DEFAULT NULL,
  `Mother_Image` varchar(100) DEFAULT NULL,
  `Gurdian_Type` enum('Father','Mother','Other') DEFAULT 'Father',
  `Guardian_Address` varchar(150) DEFAULT NULL,
  `Guardian_Name` varchar(100) DEFAULT NULL,
  `Guardian_Relation` enum('Uncle','Aunt','Grand Father','Grand Mother','Friend','Other') DEFAULT NULL,
  `Guardian_Contact_No` varchar(12) DEFAULT NULL,
  `Guardian_Image` varchar(100) DEFAULT NULL,
  `SMS_Contact_No` varchar(12) NOT NULL,
  `Whatsapp_Contact_No` varchar(12) DEFAULT NULL,
  `Email_Id` varchar(100) DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT 1,
  `Doc_Upload_1` varchar(300) DEFAULT NULL,
  `Doc_Upload_2` varchar(300) DEFAULT NULL,
  `Doc_Upload_3` varchar(300) DEFAULT NULL,
  `Doc_Upload_4` varchar(300) DEFAULT NULL,
  `Doc_Upload_5` varchar(300) DEFAULT NULL,
  `Doc_Upload_6` varchar(300) DEFAULT NULL,
  `Doc_Upload_7` varchar(300) DEFAULT NULL,
  `Doc_Upload_8` varchar(300) DEFAULT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_master_table`
--

INSERT INTO `student_master_table` (`Student_Id`, `Admission_Id`, `School_Id`, `Session`, `Session_Start_Year`, `Session_End_Year`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Class_Sec_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`, `Enabled`, `Doc_Upload_1`, `Doc_Upload_2`, `Doc_Upload_3`, `Doc_Upload_4`, `Doc_Upload_5`, `Doc_Upload_6`, `Doc_Upload_7`, `Doc_Upload_8`, `Updated_By`, `Updated_On`) VALUES
('002/2019', NULL, 1, '2020-2021', 2020, 2020, 'AYUSH', '', 'TIWARI', 1, 1, 'MALE', '2015-10-07', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. ALOK TIWARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NEHA TIWARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8210937374', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('004/2019', NULL, 1, '2020-2021', 2020, 2020, 'AZLAAN ', '', 'PERWEZ', 1, 1, 'MALE', '2016-10-21', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SHAHANSHAH PERWEZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAGUFTA PERWEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7004312632', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('006/2019', NULL, 1, '2020-2021', 2020, 2020, 'ARCHIN ', '', 'GHOSH', 16, 27, 'MALE', '2015-11-20', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. AMIT GHOSH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MOUSUMI GHOSH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9903357276', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('007/2019', NULL, 1, '2020-2021', 2020, 2020, 'AARSH', '', 'THAKUR', 16, 27, 'MALE', '2016-07-26', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. ANUPAM THAKUR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JYOTI KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8051110009', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('011/2019', NULL, 1, '2020-2021', 2020, 2020, 'PARNIKA ', '', 'VERMA', 16, 27, 'FEMALE', '2016-05-28', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. KRIPA SHANKAR VERMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'POONAM VERMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8651038564', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('014/2019', NULL, 1, '2020-2021', 2020, 2020, 'KAMRAN ', '', 'HASAN', 1, 1, 'MALE', '2015-04-24', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MD. HASNAIN SIDDIQUE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZEENAT AFROZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '6205111547', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('018/2019', NULL, 1, '2020-2021', 2020, 2020, 'MD. ASAD', '', '', 16, 27, 'MALE', '2016-05-23', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SABIR KHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BABY TARANA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7667347931', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('019/2019', NULL, 1, '2020-2021', 2020, 2020, 'HASSAN', '', 'RAZA', 1, 1, 'MALE', '2015-04-24', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MD. SARFARAZ SIDDIQUE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NAZIYA ARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8271817596', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('020/2019', NULL, 1, '2020-2021', 2020, 2020, 'KHUZAIMA ', '', 'ZIYA', 1, 1, 'FEMALE', '2016-03-10', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. S.M. ZAFARUDDIN EHSAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MOJASSAM AFROZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9472702465', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('023/2019', NULL, 1, '2020-2021', 2020, 2020, 'SHIVANSH ', '', 'KUMAR', 16, 27, 'MALE', '2015-09-23', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SUNIL KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KANTI DEVI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7493893521', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('025/2019', NULL, 1, '2020-2021', 2020, 2020, 'VIKRAM', '', 'JEET', 1, 1, 'MALE', '2015-06-02', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. VISWAKARMA KR. ASWATHAMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHUNNI DEVI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8709692826', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('027/2019', NULL, 1, '2020-2021', 2020, 2020, 'RIDDHI ', '', 'KUMARI', 16, 27, 'FEMALE', '2017-06-25', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. RAKESH KUMAR SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PINKI KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9304066649', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('028/2019', NULL, 1, '2020-2021', 2020, 2020, 'SANIDHYA', 'KUMAR', 'SINGH', 1, 1, 'MALE', '2015-06-29', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. NAGENDRA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SAVITA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8797935300', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('029/2019', NULL, 1, '2020-2021', 2020, 2020, 'AQSA ', '', 'AKHTAR', 16, 27, 'FEMALE', '2016-09-28', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SIBLI AKHTAR ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZEENAT PERWEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7352049042', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('030/2019', NULL, 1, '2020-2021', 2020, 2020, 'ROCHAK', 'KUMAR', 'SINGH', 1, 1, 'MALE', '2016-09-04', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SONU KUMAR SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KHUSHBU SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8221451612', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('034/2019', NULL, 1, '2020-2021', 2020, 2020, 'GULAM ', 'HUSSAIN', '', 16, 27, 'MALE', '2015-12-08', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. GULAM MUSTAFA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SOGRA PERWEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7870340179', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('035/2019', NULL, 1, '2020-2021', 2020, 2020, 'GULAM ', 'HASSAN', '', 16, 27, 'MALE', '2015-12-08', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr. GULAM MUSTAFA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SOGRA PERWEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7870340179', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('038/2019', NULL, 1, '2020-2021', 2020, 2020, 'AASTHA', '', 'SINGH', 1, 1, 'FEMALE', '2015-08-04', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SHAILAENDRA PRASAD SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JULEE SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9262926475', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('040/2019', NULL, 1, '2020-2021', 2020, 2020, 'KRITI', '', 'GUPTA', 16, 27, 'FEMALE', '2016-04-13', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SANTOSH KUMAR GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GEETA GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9308525365', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('041/2019', NULL, 1, '2020-2021', 2020, 2020, 'LAVANI', '', '', 16, 27, 'FEMALE', '2017-03-31', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR AMIT LAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SONI KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7903598559', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('042/2019', NULL, 1, '2020-2021', 2020, 2020, 'AMRENDRA', '', 'PRABHAKAR', 16, 27, 'MALE', '2016-12-15', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. MRITUNJAY PRABHAKAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ISHA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9430102894', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('044/2019', NULL, 1, '2020-2021', 2020, 2020, 'AARAV', '', '', 16, 27, 'MALE', '2016-11-02', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR AMRENDRA KR. SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUSHMA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8092831439', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('045/2019', NULL, 1, '2020-2021', 2020, 2020, 'NAYAN ', '', 'KUMAR', 16, 27, 'MALE', '2016-08-12', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR KAILASH MAHATO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REKHA DEVI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8757009583', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('047/2019', NULL, 1, '2020-2021', 2020, 2020, 'GAURAV ', '', 'BHARDWAJ', 16, 27, 'MALE', '2016-11-09', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR PREM PRAKASH KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RANI KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9470715719', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('048/2019', NULL, 1, '2020-2021', 2020, 2020, 'PRIYANSHI ', '', 'LAHRE', 16, 27, 'FEMALE', '2016-08-02', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR GURUDAYAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MONA LAHRE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8651002357', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('049/2019', NULL, 1, '2020-2021', 2020, 2020, 'HARSHITA', '', 'MARANDI', 16, 27, 'FEMALE', '2016-10-20', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR AJAY MARANDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUMITRA HEMBARAM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '6205262309', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('050/2019', NULL, 1, '2020-2021', 2020, 2020, 'SHAURYA ', '', 'KUMAR', 16, 27, 'MALE', '2016-06-15', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR SONU KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NEHA RAY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8709939772', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('052/2020', NULL, 1, '2020-2021', 2020, 2020, 'ARUSH ', '', 'EKKA', 16, 27, 'MALE', '2017-02-13', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SUNIL EKKA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANURADHA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8002804831', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('053/2019', NULL, 1, '2020-2021', 2020, 2020, 'RIDDHI ', '', 'KUMARI', 16, 27, 'FEMALE', '2016-08-15', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR ALOK KR CHATURVEDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRATIMA CHATURVEDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9031757578', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('054/2019', NULL, 1, '2020-2021', 2020, 2020, 'SIDDHI ', '', 'KUMARI', 16, 27, 'FEMALE', '2016-08-15', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR ALOK KR CHATURVEDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRATIMA CHATURVEDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9031757578', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('055/2020', NULL, 1, '2020-2021', 2020, 2020, 'ANJALI ', '', 'KUMARI', 16, 27, 'FEMALE', '2017-03-01', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. ANIL KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SONI KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9608289805', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('057/2020', NULL, 1, '2020-2021', 2020, 2020, 'RISHAV ', '', 'PATEL', 16, 27, 'MALE', '2016-06-27', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. JAI PRAKASH CHOUDHARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RITU KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '6203156953', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('059/2020', NULL, 1, '2020-2021', 2020, 2020, 'AAFIYA ', '', 'NOOR', 16, 27, 'FEMALE', '2016-08-01', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. NURUL HAQUE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RUHI PERWEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7909003815', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('062/2020', NULL, 1, '2020-2021', 2020, 2020, 'SWASTIK', '', '', 16, 27, 'MALE', '2015-11-08', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. RAJ KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUMAN KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7488776449', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('067/2020', NULL, 1, '2020-2021', 2020, 2020, 'ARPITA ', '', 'RANI', 16, 27, 'FEMALE', '2016-06-14', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. RAVI RANJAN KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SANGITA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '6204160628', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('069/2020', NULL, 1, '2020-2021', 2020, 2020, 'ANNAYA RAJ', '', '', 16, 27, 'FEMALE', '2016-12-24', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. MUKESH KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JULI KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '6203676545', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('070/2020', NULL, 1, '2020-2021', 2020, 2020, 'SHIVA ', '', 'MURMU', 16, 27, 'MALE', '2015-12-25', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SOMSHAND MURMU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RANO BASKEY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9113136379', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('107/2018', NULL, 1, '2020-2021', 2020, 2020, 'VAIBHAV', '', 'TIWARI', 1, 1, 'MALE', '2015-05-25', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. RAVI SHANKAR TIWARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NITU TIWARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9471562455', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('108/2018', NULL, 1, '2020-2021', 2020, 2020, 'YASHMEEN', '', 'KHATOON', 2, 2, 'FEMALE', '2013-08-20', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. ISLAM ANSARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FANIZA FATMA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8210706374', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('110/2018', NULL, 1, '2020-2021', 2020, 2020, 'SHRADHA', '', 'BESRA', 1, 1, 'FEMALE', '2015-12-17', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. RAHUL BESRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RANO BESRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9431787779', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('120/2018', NULL, 1, '2020-2021', 2020, 2020, 'WAQUAR', '', 'AHMAD', 2, 2, 'MALE', '2015-01-20', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. NISHAT AHMAD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SUFIYA KHATOON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9431608170', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('121/2018', NULL, 1, '2020-2021', 2020, 2020, 'RAUNAQ ', '', 'SINGH', 1, 1, 'MALE', '2015-07-04', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. RANDHIR SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BEAUTY SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9934323045', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('13/2019', NULL, 1, '2020-2021', 2020, 2020, 'RAYAN', 'RATNA', '', 16, 27, 'MALE', '2015-09-07', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR RAUSHAN RATNA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SARITA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9386770001', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('132/2018', NULL, 1, '2020-2021', 2020, 2020, 'ARYAN', '', 'SINGH', 1, 1, 'MALE', '2015-07-18', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. MANISH KUMAR SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMITA PARASHAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8102026355', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('140/2018', NULL, 1, '2020-2021', 2020, 2020, 'AYUSH', '', 'KUMARI', 1, 1, 'MALE', '2016-05-17', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. AGHNU DAS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MUSHKAN DEVI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8210203932', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('143/2018', NULL, 1, '2020-2021', 2020, 2020, 'SHAURYVEER', 'PRATAP', 'SINGH', 2, 2, 'MALE', '2015-01-16', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SHAURABH KUMAR SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANITA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9125491254', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('15/2019', NULL, 1, '2020-2021', 2020, 2020, 'RADHIKA ', '', 'SONI', 16, 27, 'FEMALE', '2016-04-15', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. PRAMOD KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RENU KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7488917081', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('150/2018', NULL, 1, '2020-2021', 2020, 2020, 'MD. SAAD', '', 'AMMAR', 2, 2, 'MALE', '2015-06-28', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. FAIYAZ AHMAD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'HALIMA KHATOON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8969678328', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('156/2018', NULL, 1, '2020-2021', 2020, 2021, 'SAMRIDDHI ', 'KUMARI', 'MISHRA', 2, 2, 'FEMALE', '2016-06-10', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SARBJEET MISHRA ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANURADHA MISHRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8409492529', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('170/2018', NULL, 1, '2020-2021', 2020, 2020, 'RISHIKA ', '', 'RANI', 1, 1, 'FEMALE', '2015-05-04', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. DHANAMJAY KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SAROJ KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8319634836', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('173/2018', NULL, 1, '2020-2021', 2020, 2020, 'SHIVAM', 'KUMAR', 'SINGH', 1, 1, 'MALE', '2015-09-01', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. NITESH KUMAR SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MALA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8651537811', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('174/2018', NULL, 1, '2020-2021', 2020, 2020, 'JANVI ', '', 'GUPTA', 1, 1, 'FEMALE', '2016-03-04', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. SUJIT GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'POOJA GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9431380810', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('176/2018', NULL, 1, '2020-2021', 2020, 2020, 'YASIYA ', '', 'NOORI', 1, 1, 'FEMALE', '2016-09-03', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MD. GULAM HASSNAIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RUKHSANA KHATOON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7992269551', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('187/2018', NULL, 1, '2020-2021', 2020, 2020, 'NANDANI', '', 'KUMARI', 1, 1, 'FEMALE', '2015-11-23', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. NAVEEN KR. PATHAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SANJANA PATHAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9631640807', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('191/2018', NULL, 1, '2020-2021', 2020, 2020, 'SHAURYA', 'PRATAP', 'SINGH', 1, 1, 'MALE', '2015-11-08', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR.RANJEET KR. SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANAMIKA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7257929848', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('194/2018', NULL, 1, '2020-2021', 2020, 2020, 'JAHNVI', '', 'SHRI', 1, 1, 'FEMALE', '2016-03-13', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. BIRENDRA SWANSI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SONALI SURYA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8674867399', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('46/2019', NULL, 1, '2020-2021', 2020, 2020, 'PIHU ', '', 'KUMARI', 16, 27, 'FEMALE', '2016-04-13', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. ASHWANI KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHANDHYA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '6207860894', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('51/2020', NULL, 1, '2020-2021', 2020, 2020, 'ANKUSH', '', 'GUPTA', 17, 28, 'MALE', '2017-10-04', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. AMARNATH GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KHUSHBOO GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9682587960', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('56/2020', NULL, 1, '2020-2021', 2020, 2020, 'RIFA ', '', 'FATMA', 1, 1, 'FEMALE', '2016-08-05', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. HASAN RAZA ANSARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHAHAR BANU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7717798435', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('58/2020', NULL, 1, '2020-2021', 2020, 2020, 'ABDUL', 'WAHID', 'JAMAAL', 1, 1, 'MALE', '2016-06-20', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MD. NASIM AKMAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AFSA PARVEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9430300448', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('60/2020', NULL, 1, '2020-2021', 2020, 2020, 'SHAJAR ', 'RAZA', 'KHAN', 17, 28, 'MALE', '2018-03-10', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. GULAM SARWAR KHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AFIYA KHATOON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9334050176', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('61/2020', NULL, 1, '2020-2021', 2020, 2020, 'HARSHIT ', '', 'GUPTA', 17, 28, 'MALE', '2018-10-02', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. PRAMOD KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RUPA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8789600180', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('63/2020', NULL, 1, '2020-2021', 2020, 2020, 'SWASTIK ', '', 'KUMARI', 1, 1, 'MALE', '2016-04-25', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. DILIP KUMAR NAVEEN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CHANDA KUMARI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '7781011612', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('64/2020', NULL, 1, '2020-2021', 2020, 2020, 'ALISHBAH ', '', 'KHAN', 17, 28, 'FEMALE', '2017-08-02', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. KAMALUDDIN KHAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SITARA KHATOON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9572548692', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('65/2020', NULL, 1, '2020-2021', 2020, 2020, 'SHAURYA', 'PRATAP', 'SINGH', 17, 28, 'MALE', '2017-02-25', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. CHANDAN SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANAMIKA SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9304812602', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('66/2020', NULL, 1, '2020-2021', 2020, 2020, 'SAMRAT ', '', 'SINGH', 17, 28, 'MALE', '2017-07-15', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. KAUSHAL KISHORE SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LOVELY SINGH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '834040810', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('68/2020', NULL, 1, '2020-2021', 2020, 2020, 'ISHIKA ', 'RANI', '', 17, 28, 'FEMALE', '2017-07-08', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. NAVIN KUMAR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANISHA SINHA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '9155413773', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('71/2020', NULL, 1, '2020-2021', 2020, 2020, 'RUDRA', '', 'GUPTA', 17, 28, 'MALE', '2017-08-25', NULL, 'GENERAL', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MR. DIPAK KUMAR GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SHILA GUPTA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, '', NULL, NULL, NULL, '8210071349', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-11-25 13:51:49'),
('STUD202001', NULL, 1, '2020-2021', 2020, 2021, 'Ravi3', NULL, 'Kishan3', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202002', NULL, 1, '2020-2021', 2020, 2021, 'Ravi4', NULL, 'Kishan4', 5, 1, 'FEMALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202003', NULL, 1, '2020-2021', 2020, 2021, 'Ravi5', NULL, 'Kishan5', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00');
INSERT INTO `student_master_table` (`Student_Id`, `Admission_Id`, `School_Id`, `Session`, `Session_Start_Year`, `Session_End_Year`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Class_Sec_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`, `Enabled`, `Doc_Upload_1`, `Doc_Upload_2`, `Doc_Upload_3`, `Doc_Upload_4`, `Doc_Upload_5`, `Doc_Upload_6`, `Doc_Upload_7`, `Doc_Upload_8`, `Updated_By`, `Updated_On`) VALUES
('STUD202004', NULL, 1, '2020-2021', 2020, 2021, 'Ravi6', NULL, 'Kishan6', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202005', NULL, 1, '2020-2021', 2020, 2021, 'Ravi7', NULL, 'Kishan7', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202006', NULL, 1, '2020-2021', 2020, 2021, 'Ravi8', NULL, 'Kishan8', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202007', NULL, 1, '2020-2021', 2020, 2021, 'Ravi9', NULL, 'Kishan9', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202008', NULL, 1, '2020-2021', 2020, 2021, 'Ravi10', NULL, 'Kishan10', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202009', NULL, 1, '2020-2021', 2020, 2021, 'Ravi11', NULL, 'Kishan11', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202010', NULL, 1, '2020-2021', 2020, 2021, 'Ravi12', NULL, 'Kishan12', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202011', NULL, 1, '2020-2021', 2020, 2021, 'Ravi13', NULL, 'Kishan13', 5, 1, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-10-22 09:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master_table`
--

CREATE TABLE `subject_master_table` (
  `Subject_Id` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_master_table`
--

INSERT INTO `subject_master_table` (`Subject_Id`, `Subject_Name`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'English', 1, 1, 'ADMIN', '2020-11-19 08:59:26'),
(2, 'Hindi', 1, 1, 'ADMIN', '2020-11-19 08:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `task_allocation_list_table`
--

CREATE TABLE `task_allocation_list_table` (
  `TAL_Id` int(11) NOT NULL,
  `Task_Id` int(11) NOT NULL,
  `Allocated_Reff_Id` int(11) NOT NULL COMMENT 'section Id',
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_allocation_list_table`
--

INSERT INTO `task_allocation_list_table` (`TAL_Id`, `Task_Id`, `Allocated_Reff_Id`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 3, 1, 1, 'admin', '2020-11-20 10:07:49'),
(2, 1, 4, 1, 1, 'admin', '2020-11-20 10:07:49'),
(3, 2, 1, 1, 1, 'admin', '2020-11-21 08:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `task_file_upload`
--

CREATE TABLE `task_file_upload` (
  `Task_File_Id` int(11) NOT NULL,
  `Task_Id` int(11) NOT NULL,
  `Upload_Type` enum('File','Link') NOT NULL,
  `Upload_Name` varchar(512) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_file_upload`
--

INSERT INTO `task_file_upload` (`Task_File_Id`, `Task_Id`, `Upload_Type`, `Upload_Name`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 'File', 'Assignments/ac2cc5a9063198dcc4d068c61babadcb.sql', 1, 1, 'admin', '2020-11-19 09:15:53'),
(2, 2, 'File', 'Assignments/9a3ecccd92874ef08d06707bc3002035.jpg', 1, 1, 'admin', '2020-11-21 08:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `task_master_table`
--

CREATE TABLE `task_master_table` (
  `Task_Id` int(11) NOT NULL,
  `Task_Name` varchar(100) NOT NULL,
  `Task_Type` enum('Assignment','Project','Home Work') NOT NULL,
  `Task_Desc` varchar(500) NOT NULL,
  `Is_Submmisable` enum('Yes','No') NOT NULL,
  `Last_Submissable_Date` date NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Refference_Type` enum('Teacher','Student','Others') NOT NULL DEFAULT 'Student',
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_master_table`
--

INSERT INTO `task_master_table` (`Task_Id`, `Task_Name`, `Task_Type`, `Task_Desc`, `Is_Submmisable`, `Last_Submissable_Date`, `Subject_Id`, `Refference_Type`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'Some Topic', 'Assignment', 'DScrioption', 'Yes', '2020-11-19', 1, 'Teacher', 1, 1, 'admin', '2020-11-19 09:13:37'),
(2, 'Assignment-Suman', 'Assignment', 'This is a new assignment.', 'Yes', '2020-11-30', 1, 'Teacher', 1, 1, 'admin', '2020-11-21 08:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `task_submit_file_table`
--

CREATE TABLE `task_submit_file_table` (
  `TSF_Id` int(11) NOT NULL,
  `Task_Submit_Id` int(11) NOT NULL,
  `File_Path` varchar(256) NOT NULL,
  `File_Name` varchar(512) NOT NULL,
  `Task_Note` varchar(1000) NOT NULL COMMENT 'Work Note provided by the candidate.',
  `Task_Remarks` varchar(256) NOT NULL COMMENT 'Remarks Note provided by the checker.',
  `Obtained_Marks` int(11) NOT NULL DEFAULT 0,
  `Is_Verified` enum('Yes','No') NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task_submit_table`
--

CREATE TABLE `task_submit_table` (
  `Task_Submit_Id` int(11) NOT NULL,
  `Refference_Id` varchar(20) NOT NULL,
  `Task_Id` int(11) NOT NULL,
  `Is_Verified` enum('Yes','No') NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_subject_map_table`
--

CREATE TABLE `teacher_class_subject_map_table` (
  `TCSM_Id` int(11) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `Class_Section_Id` int(11) NOT NULL,
  `Period` int(3) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_enquiry_table`
--

CREATE TABLE `visitor_enquiry_table` (
  `VE_Id` int(11) NOT NULL,
  `Visitor_Type_Id` int(11) NOT NULL,
  `Visitor_Name` varchar(100) NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Visit_Purpose_Id` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Person_To_Meet` varchar(100) NOT NULL,
  `No_Of_Person` tinyint(4) NOT NULL,
  `Date_Of_Visit` date NOT NULL,
  `In_Time` time NOT NULL,
  `Out_Time` time DEFAULT NULL,
  `Note` varchar(100) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `School_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_enquiry_table`
--

INSERT INTO `visitor_enquiry_table` (`VE_Id`, `Visitor_Type_Id`, `Visitor_Name`, `Contact_No`, `Company_Name`, `Visit_Purpose_Id`, `Location`, `Person_To_Meet`, `No_Of_Person`, `Date_Of_Visit`, `In_Time`, `Out_Time`, `Note`, `Created_By`, `Created_On`, `School_Id`) VALUES
(1, 1, 'suman', '8709321740', 'ABC Company', 0, 'Ranchi', '0', 1, '2020-11-16', '02:08:00', NULL, 'JHGKGK HGJH GJGKJ', 'admin', '2020-11-15 20:38:08', 1),
(2, 3, 'suman', '8709321740', 'ABC Company', 3, 'Ranchi', '0', 1, '2020-11-16', '02:13:00', '08:47:00', 'fhghf', 'admin', '2020-11-15 20:43:18', 1),
(3, 1, 'Mithun Mukherjee', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-11-17', '10:41:00', '01:05:00', 'df asfasasds a', 'admin', '2020-11-17 17:11:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_type_master`
--

CREATE TABLE `visitor_type_master` (
  `VT_Id` tinyint(4) NOT NULL,
  `Visitor_Type` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(11) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_type_master`
--

INSERT INTO `visitor_type_master` (`VT_Id`, `Visitor_Type`, `Enabled`, `School_Id`, `Created_On`, `Created_By`) VALUES
(1, 'Resume Submit', 1, 1, '2020-08-26 14:14:47', 'admin'),
(2, 'Parent', 1, 1, '2020-08-25 19:14:18', 'admin'),
(3, 'Publication House', 1, 1, '2020-08-25 19:14:18', 'admin'),
(4, 'Smart Class', 1, 1, '2020-08-25 19:14:18', 'admin'),
(5, 'Vendor', 1, 1, '2020-08-25 19:14:18', 'admin'),
(6, 'Others', 1, 1, '2020-08-25 19:14:18', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `visit_purpose_master`
--

CREATE TABLE `visit_purpose_master` (
  `VP_Id` int(11) NOT NULL,
  `Visitor_Purpose` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT 1,
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_purpose_master`
--

INSERT INTO `visit_purpose_master` (`VP_Id`, `Visitor_Purpose`, `Enabled`, `School_Id`, `Created_By`, `Created_On`) VALUES
(1, 'Principal Meet', 1, 1, 'admin', '2020-08-26 13:35:24'),
(2, 'For Child Lunch', 1, 1, 'admin', '2020-08-26 13:35:24'),
(3, 'Business Meet', 1, 1, 'admin', '2020-08-26 13:36:17'),
(4, 'Personal Meet', 1, 1, 'admin', '2020-08-26 13:36:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_enquiry_table`
--
ALTER TABLE `admission_enquiry_table`
  ADD PRIMARY KEY (`AEID`);

--
-- Indexes for table `admission_followup_note`
--
ALTER TABLE `admission_followup_note`
  ADD PRIMARY KEY (`NOTEID`);

--
-- Indexes for table `admission_master_table`
--
ALTER TABLE `admission_master_table`
  ADD PRIMARY KEY (`Admission_Id`),
  ADD UNIQUE KEY `School_Admission_Id` (`School_Admission_Id`);

--
-- Indexes for table `attendance_details_table`
--
ALTER TABLE `attendance_details_table`
  ADD PRIMARY KEY (`Attendance_Details_Id`),
  ADD KEY `Attendance_Id` (`Attendance_Id`);

--
-- Indexes for table `attendance_master_table`
--
ALTER TABLE `attendance_master_table`
  ADD PRIMARY KEY (`Attendance_Id`),
  ADD UNIQUE KEY `Class_Sec_id` (`Class_Sec_Id`,`DOA`,`Period`);

--
-- Indexes for table `class_master_table`
--
ALTER TABLE `class_master_table`
  ADD PRIMARY KEY (`Class_Id`),
  ADD KEY `Booklist_Id` (`Booklist_Id`);

--
-- Indexes for table `class_section_table`
--
ALTER TABLE `class_section_table`
  ADD PRIMARY KEY (`Class_Sec_Id`),
  ADD KEY `Class_Id` (`Class_Id`),
  ADD KEY `Room_Id` (`Room_Id`);

--
-- Indexes for table `close_user_group_details`
--
ALTER TABLE `close_user_group_details`
  ADD KEY `CUG_Id` (`CUG_Id`);

--
-- Indexes for table `close_user_group_master`
--
ALTER TABLE `close_user_group_master`
  ADD PRIMARY KEY (`CUG_Id`);

--
-- Indexes for table `department_master_table`
--
ALTER TABLE `department_master_table`
  ADD PRIMARY KEY (`Dept_Id`);

--
-- Indexes for table `employee_master_table`
--
ALTER TABLE `employee_master_table`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD UNIQUE KEY `login_id_unique` (`Login_id`);

--
-- Indexes for table `event_calender_master`
--
ALTER TABLE `event_calender_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`LID`),
  ADD UNIQUE KEY `LOGINID_UNIQUE` (`LOGIN_ID`);

--
-- Indexes for table `message_details_table`
--
ALTER TABLE `message_details_table`
  ADD PRIMARY KEY (`MD_Id`);

--
-- Indexes for table `message_master_table`
--
ALTER TABLE `message_master_table`
  ADD PRIMARY KEY (`Message_Id`);

--
-- Indexes for table `message_user_group_table`
--
ALTER TABLE `message_user_group_table`
  ADD PRIMARY KEY (`User_Type_Id`);

--
-- Indexes for table `notice_list_table`
--
ALTER TABLE `notice_list_table`
  ADD PRIMARY KEY (`Notice_List_Id`),
  ADD KEY `Notice_Id` (`Notice_Id`);

--
-- Indexes for table `notice_master_table`
--
ALTER TABLE `notice_master_table`
  ADD PRIMARY KEY (`Notice_Id`);

--
-- Indexes for table `school_master_table`
--
ALTER TABLE `school_master_table`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `school_id` (`school_id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `staff_attendance_table`
--
ALTER TABLE `staff_attendance_table`
  ADD PRIMARY KEY (`Attendance_Id`),
  ADD KEY `Staff_Id` (`Staff_Id`);

--
-- Indexes for table `staff_document_table`
--
ALTER TABLE `staff_document_table`
  ADD PRIMARY KEY (`Document_Id`);

--
-- Indexes for table `staff_master_table`
--
ALTER TABLE `staff_master_table`
  ADD PRIMARY KEY (`Staff_Id`);

--
-- Indexes for table `student_class_details`
--
ALTER TABLE `student_class_details`
  ADD PRIMARY KEY (`Student_Details_Id`);

--
-- Indexes for table `student_class_details_old`
--
ALTER TABLE `student_class_details_old`
  ADD PRIMARY KEY (`scd_id`),
  ADD UNIQUE KEY `composite_unique` (`class_id`,`class_sec_id`,`rollno`,`session_start_year`,`session_end_year`),
  ADD UNIQUE KEY `student_class_details_composite_unique` (`class_id`,`class_sec_id`,`rollno`,`session_start_year`,`session_end_year`);

--
-- Indexes for table `student_master_table`
--
ALTER TABLE `student_master_table`
  ADD PRIMARY KEY (`Student_Id`),
  ADD UNIQUE KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `task_allocation_list_table`
--
ALTER TABLE `task_allocation_list_table`
  ADD PRIMARY KEY (`TAL_Id`),
  ADD KEY `Task_Id` (`Task_Id`);

--
-- Indexes for table `task_file_upload`
--
ALTER TABLE `task_file_upload`
  ADD PRIMARY KEY (`Task_File_Id`),
  ADD KEY `Task_Id` (`Task_Id`);

--
-- Indexes for table `task_master_table`
--
ALTER TABLE `task_master_table`
  ADD PRIMARY KEY (`Task_Id`);

--
-- Indexes for table `task_submit_file_table`
--
ALTER TABLE `task_submit_file_table`
  ADD PRIMARY KEY (`TSF_Id`),
  ADD KEY `Task_Submit_Id` (`Task_Submit_Id`);

--
-- Indexes for table `task_submit_table`
--
ALTER TABLE `task_submit_table`
  ADD PRIMARY KEY (`Task_Submit_Id`),
  ADD KEY `Task_Id` (`Task_Id`);

--
-- Indexes for table `visitor_enquiry_table`
--
ALTER TABLE `visitor_enquiry_table`
  ADD PRIMARY KEY (`VE_Id`);

--
-- Indexes for table `visitor_type_master`
--
ALTER TABLE `visitor_type_master`
  ADD PRIMARY KEY (`VT_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_details_table`
--
ALTER TABLE `attendance_details_table`
  MODIFY `Attendance_Details_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_details_table`
--
ALTER TABLE `message_details_table`
  MODIFY `MD_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `visitor_enquiry_table`
--
ALTER TABLE `visitor_enquiry_table`
  MODIFY `VE_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `close_user_group_details`
--
ALTER TABLE `close_user_group_details`
  ADD CONSTRAINT `close_user_group_details_ibfk_1` FOREIGN KEY (`CUG_Id`) REFERENCES `close_user_group_master` (`CUG_Id`);

--
-- Constraints for table `staff_attendance_table`
--
ALTER TABLE `staff_attendance_table`
  ADD CONSTRAINT `staff_attendance_table_ibfk_1` FOREIGN KEY (`Staff_Id`) REFERENCES `staff_master_table` (`Staff_Id`);

--
-- Constraints for table `task_allocation_list_table`
--
ALTER TABLE `task_allocation_list_table`
  ADD CONSTRAINT `task_allocation_list_table_ibfk_1` FOREIGN KEY (`Task_Id`) REFERENCES `task_master_table` (`Task_Id`),
  ADD CONSTRAINT `task_allocation_list_table_ibfk_2` FOREIGN KEY (`Task_Id`) REFERENCES `task_master_table` (`Task_Id`);

--
-- Constraints for table `task_file_upload`
--
ALTER TABLE `task_file_upload`
  ADD CONSTRAINT `task_file_upload_ibfk_1` FOREIGN KEY (`Task_Id`) REFERENCES `task_master_table` (`Task_Id`);

--
-- Constraints for table `task_submit_file_table`
--
ALTER TABLE `task_submit_file_table`
  ADD CONSTRAINT `task_submit_file_table_ibfk_1` FOREIGN KEY (`Task_Submit_Id`) REFERENCES `task_master_table` (`Task_Id`),
  ADD CONSTRAINT `task_submit_file_table_ibfk_2` FOREIGN KEY (`Task_Submit_Id`) REFERENCES `task_submit_table` (`Task_Submit_Id`);

--
-- Constraints for table `task_submit_table`
--
ALTER TABLE `task_submit_table`
  ADD CONSTRAINT `task_submit_table_ibfk_1` FOREIGN KEY (`Task_Id`) REFERENCES `task_master_table` (`Task_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `message_master_table` CHANGE `Message_Category` `Message_Category` ENUM('Attendance','Fee','Transport','Notice','Communication') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;
ALTER TABLE `student_master_table` ADD `Student_Reff_Login_Id` VARCHAR(20) NOT NULL AFTER `Email_Id`;
ALTER TABLE `student_master_table` ADD `Parent_Reff_Login_Id` VARCHAR(20) NOT NULL AFTER `Student_Reff_Login_Id`;
ALTER TABLE `staff_master_table` CHANGE `Login_Id` `Staff_Reff_Login_Id` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `student_master_table` CHANGE `Student_Reff_Login_Id` `Student_Reff_Login_Id` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;
ALTER TABLE `student_master_table` CHANGE `Parent_Reff_Login_Id` `Parent_Reff_Login_Id` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL;
ALTER TABLE `staff_master_table` ADD `Default_Session` VARCHAR(10) NOT NULL AFTER `Staff_Reff_Login_Id`;
update staff_master_table set Default_Session='2020-2021';
ALTER TABLE `staff_master_table` DROP COLUMN PASSWORD;
ALTER TABLE `staff_master_table` ADD `Default_Start_Year` INT(4) NULL AFTER `Default_Session`, ADD `Default_End_Year` INT(4) NULL AFTER `Default_Start_Year`;
ALTER TABLE `school_master_table` ADD `session` VARCHAR(10) NOT NULL AFTER `start_year`;
ALTER TABLE `student_master_table` CHANGE `Student_Image` `Student_Image` VARCHAR(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;
ALTER TABLE `student_master_table` ADD `Image_Folder_Id` INT(11) NULL AFTER `Student_Id`, ADD UNIQUE (`Image_Folder_Id`);
ALTER TABLE `school_master_table` ADD `School_Header_Line1` VARCHAR(100) NOT NULL AFTER `school_name`, ADD `School_Header_Line2` VARCHAR(100) NOT NULL AFTER `School_Header_Line1`;

