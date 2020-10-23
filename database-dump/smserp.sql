-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2020 at 10:58 AM
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
  `ENQUIRY_STATUS` enum('PENDING','PROCESSING','CONVERTED','CLOSED') NOT NULL,
  `REMARKS` varchar(100) NOT NULL,
  `SIBLING` enum('YES','NO') NOT NULL,
  `STUDENT_ID` varchar(20) NOT NULL,
  `MOBILE_VERIFIED` enum('YES','NO') NOT NULL,
  `FOLLOWUP_DATE` date NOT NULL,
  `CREATED_ON` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CREATED_BY` varchar(20) NOT NULL,
  `SCHOOL_ID` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TO STORE ADMISSION ENQUIRY DETAILS';

--
-- Dumping data for table `admission_enquiry_table`
--

INSERT INTO `admission_enquiry_table` (`AEID`, `STUDENT_NAME`, `ENQUIRER_NAME`, `ENQUIRER_RELATION`, `MOBILE_NO`, `EMAIL_ID`, `LOCALITY_ID`, `CLASS_ID`, `SESSION`, `LEAD_ID`, `ENQUIRY_STATUS`, `REMARKS`, `SIBLING`, `STUDENT_ID`, `MOBILE_VERIFIED`, `FOLLOWUP_DATE`, `CREATED_ON`, `CREATED_BY`, `SCHOOL_ID`) VALUES
(15, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'csingh890@gmail.com', 1, 1, '2020-2021', 2, 'PENDING', '', 'YES', '', 'YES', '2020-08-18', '2020-08-17 18:30:00', 'Mithun', 1),
(16, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'csingh890@gmail.com', 1, 1, '2020-2021', 2, 'PENDING', '', 'YES', '', 'YES', '2020-08-18', '2020-08-17 18:30:00', 'Mithun', 1),
(17, 'Mithun', 'UMA Mukherjee', 'MOTHER', '8709321740', 'csingh890@gmail.com', 1, 1, '2020-2021', 2, 'PENDING', '', 'YES', '', 'YES', '2020-08-18', '2020-08-17 18:30:00', 'Mithun', 1),
(18, 'Mithun', 'UMA Mukherjee', 'MOTHER', '8709321740', 'csingh890@gmail.com', 1, 1, '2020-2021', 2, 'PENDING', '', 'YES', '', 'YES', '2020-08-18', '2020-08-17 18:30:00', 'Mithun', 1),
(19, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'Mukherjee.mit@gmail.com', 1, 2, '2020-2021', 3, 'PENDING', '', 'YES', '', 'YES', '2020-08-22', '2020-08-19 18:30:00', 'Mithun', 1),
(20, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'Mukherjee.mit@gmail.com', 1, 2, '2020-2021', 3, 'PENDING', '', 'YES', '', 'YES', '2020-08-22', '2020-08-19 18:30:00', 'Mithun', 1),
(21, 'Sky School', 'Mithun', 'UNCLE', '9999999999', 'abc@def.com', 3, 4, '2020-2021', 4, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-19 18:30:00', 'Mithun', 1),
(22, 'Sky School', 'Mithun', 'UNCLE', '9999999999', 'abc@def.com', 3, 4, '2020-2021', 4, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-19 18:30:00', 'Mithun', 1),
(23, 'Sky School', 'Mithun', 'UNCLE', '9999999999', 'abc@def.com', 3, 4, '2020-2021', 4, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-19 18:30:00', 'Mithun', 1),
(24, 'Sky School', 'Mithun', 'UNCLE', '9999999999', 'abc@def.com', 3, 4, '2020-2021', 4, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-19 18:30:00', 'Mithun', 1),
(25, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'abc@def.com', 1, 1, '2020-2021', 3, 'PENDING', '', 'YES', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(26, 'Mithun', 'Mithun', 'FATHER', '8709321740', 'abc@def.com', 1, 1, '2020-2021', 3, 'PENDING', '', 'YES', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(27, 'myschool', 'Mithun', 'NEIGHBOUR', '9999999999', 'abc@def.com', 0, 0, '', 2, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(28, 'Test', 'Test Enq', 'SISTER', '8888888888', 'TEST@GMAIL.COM', 2, 21, '2020-2021', 2, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(29, 'Test', 'Test Enq', 'SISTER', '8888888888', 'TEST@GMAIL.COM', 2, 21, '2020-2021', 2, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(30, 'test new', 'test enq new', 'SISTER', '8709321740', 'TEST@GMAIL.COM', 1, 1, '2020-2021', 2, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(31, 'test new', 'test enq new', 'SISTER', '8709321740', 'TEST@GMAIL.COM', 1, 1, '2020-2021', 2, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(32, 'newtest', 'newtest enq', 'FATHER', '8709321740', 'TEST@GMAIL.COM', 1, 2, '2020-2021', 5, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(33, 'newtest', 'newtest enq', 'FATHER', '8709321740', 'TEST@GMAIL.COM', 1, 2, '2020-2021', 5, 'PENDING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(34, 'testing name', 'testing name', 'MOTHER', '5478478541', 'rohitkosra1992@gmail.com', 1, 1, '2020-2021', 2, 'PENDING', '', 'YES', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(35, 'testing name', 'testing name', 'MOTHER', '5478478541', 'rohitkosra1992@gmail.com', 1, 1, '2020-2021', 2, 'PENDING', '', 'YES', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(36, 'finaltest', 'finaltest', 'FATHER', '8709321740', 'Mukherjee.mit@gmail.com', 1, 1, '2020-2021', 2, 'PROCESSING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(37, 'finaltestfinal', 'finaltestfinal', 'FATHER', '8709321740', 'Mukherjee.mit@gmail.com', 1, 1, '2020-2021', 2, 'PROCESSING', '', 'NO', '', 'YES', '2020-08-31', '2020-08-20 18:30:00', 'Mithun', 1),
(38, 'Sushil Kumar', 'Mithun Mukherhjee', 'NEIGHBOUR', '8709321740', 'TEST@GMAIL.COM', 1, 20, '2020-2021', 8, 'PROCESSING', '', 'NO', '', 'YES', '2020-08-22', '2020-08-21 18:30:00', 'Mithun', 1),
(39, 'Sushil Kumar', 'Mithun Mukherhjee', 'NEIGHBOUR', '8709321740', 'TEST@GMAIL.COM', 1, 20, '2020-2021', 8, 'PENDING', '', 'NO', '', 'YES', '2020-08-22', '2020-08-21 18:30:00', 'Mithun', 1),
(40, 'Rohit', 'Rohit', 'FATHER', '9891898219', 'rohitkosra1992@gmail.com', 1, 1, '2020-2021', 1, 'PENDING', '', 'YES', '', 'YES', '2020-08-31', '0000-00-00 00:00:00', 'admin', 1),
(41, 'Rohit', 'Rohit', 'FATHER', '9891898219', 'rohitkosra1992@gmail.com', 1, 1, '2020-2021', 1, 'PENDING', '', 'YES', '', 'YES', '2020-08-31', '2020-08-22 18:45:46', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission_followup_note`
--

CREATE TABLE `admission_followup_note` (
  `NOTEID` int(11) NOT NULL,
  `AEID` int(11) DEFAULT NULL,
  `NOTE` varchar(200) DEFAULT NULL,
  `NOTE_DATE` date DEFAULT NULL,
  `FOLLOWUP_DATE` date DEFAULT NULL,
  `CREATED_BY` varchar(100) DEFAULT NULL,
  `SCHOOL_ID` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_followup_note`
--

INSERT INTO `admission_followup_note` (`NOTEID`, `AEID`, `NOTE`, `NOTE_DATE`, `FOLLOWUP_DATE`, `CREATED_BY`, `SCHOOL_ID`) VALUES
(1, 37, 'Called the person. Mobile is ringing but did not pickup the phone.  Will try next day.', '2020-07-14', '2020-08-22', 'admin', 1),
(2, 37, 'Called Him 2 times.  \r\nOn Second time the person replied and will come to school for further information.\r\n\r\nThanks and Regards,\r\nMithun', '2020-08-21', '2020-08-23', 'admin', 1),
(3, 36, 'called today.\r\n\r\nwill come tomorrow.', '2020-08-22', '2020-08-22', 'admin', 1),
(4, 38, 'Had Discussion with Sushil Kumar.\r\n\r\nHe will visit tomorrow.', '2020-08-22', '2020-08-24', 'admin', 1),
(5, 36, 'Got a Call from Sushil.  He is coming today.', '2020-08-22', '2020-08-25', 'admin', 1),
(6, 42, 'Talked to student\'s Father Mr. Ram Singh.  He is ready to take admission in our school.\r\nOn next followup date  call him to submit the documents.', '2020-08-31', '2020-09-03', 'admin', 1),
(7, 17, 'test', '2020-09-02', '2020-09-03', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission_master_table`
--

CREATE TABLE `admission_master_table` (
  `Admission_Id` mediumint(8) UNSIGNED NOT NULL,
  `School_Admission_Id` varchar(10) DEFAULT NULL,
  `School_Id` mediumint(8) NOT NULL,
  `Session` varchar(9) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Class_Id` smallint(8) UNSIGNED NOT NULL,
  `Gender` enum('MALE','FEMALE','OTHER') DEFAULT 'MALE',
  `DOB` date NOT NULL,
  `Age` tinyint(3) UNSIGNED DEFAULT NULL,
  `Social_Category` enum('GENERAL','SC','ST','OBC') DEFAULT 'GENERAL',
  `Discount_Category` smallint(6) DEFAULT NULL,
  `Locality` smallint(6) DEFAULT NULL,
  `Academic_Session` varchar(9) NOT NULL,
  `Mother_Tongue` smallint(3) UNSIGNED NOT NULL,
  `Religion` smallint(5) UNSIGNED NOT NULL,
  `Nationality` enum('INDIAN','OTHERS') NOT NULL,
  `Blood_Group` enum('AB-Negative','B-Negative','AB-P	ositive','A-Negative','O-Negative','B-Positive','A-Positive','O-Positive') DEFAULT NULL,
  `Aadhar_No` varchar(12) DEFAULT NULL,
  `Student_Image` varchar(100) DEFAULT NULL,
  `Prev_School_Name` varchar(100) DEFAULT NULL,
  `Prev_School_Medium` enum('English','Hindi','Others','Bengali') DEFAULT NULL,
  `Prev_School_Board` enum('CBSE','ICSE','OTHERS') DEFAULT NULL,
  `Prev_School_Class` smallint(6) DEFAULT NULL,
  `Comm_Address` varchar(100) NOT NULL,
  `Comm_Add_Country` varchar(50) NOT NULL,
  `Comm_Add_State` varchar(50) NOT NULL,
  `Comm_Add_City_Dist` varchar(50) NOT NULL,
  `Comm_Add_Pincode` varchar(10) NOT NULL,
  `Comm_Add_ContactNo` varchar(12) NOT NULL,
  `Resid_Address` varchar(100) NOT NULL,
  `Resid_Add_Country` varchar(50) NOT NULL,
  `Resid_Add_State` varchar(50) NOT NULL,
  `Resid_Add_City_Dist` varchar(50) NOT NULL,
  `Resid_Add_Pincode` varchar(10) NOT NULL,
  `Resid_Add_ContactNo` varchar(12) NOT NULL,
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
  `Father_Alumni` enum('Yes','No') NOT NULL,
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
  `Doc_Upload_1` varchar(300) NOT NULL,
  `Doc_Upload_2` varchar(300) NOT NULL,
  `Doc_Upload_3` varchar(300) NOT NULL,
  `Doc_Upload_4` varchar(300) NOT NULL,
  `Doc_Upload_5` varchar(300) NOT NULL,
  `Doc_Upload_6` varchar(300) NOT NULL,
  `Doc_Upload_7` varchar(300) NOT NULL,
  `Doc_Upload_8` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_master_table`
--

INSERT INTO `admission_master_table` (`Admission_Id`, `School_Admission_Id`, `School_Id`, `Session`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`, `Doc_Upload_1`, `Doc_Upload_2`, `Doc_Upload_3`, `Doc_Upload_4`, `Doc_Upload_5`, `Doc_Upload_6`, `Doc_Upload_7`, `Doc_Upload_8`) VALUES
(3, 'DPS20203', 200, '2020-2021', 'Sushil-2', 'K', 'Tripathi', 9, 'MALE', '2010-02-03', 0, 'GENERAL', 5, 0, '2020-2021', 0, 0, 'INDIAN', 'A-Positive', '', '', 'ISL', 'English', 'CBSE', 8, ' Comm Add', 'India', 'JH', 'Bokaro', '8201111', '9810304042', ' Reside Address', 'India', 'JH', 'Bokaro', '8201111', '9810090000', '', 15, '', 0, '', 15, '', 0, 'Mr Tripathi', 'Intermediate', 'Business', 'Business Ower', 'Personal', '', 'Bokaro', 'JH', 'India', '826001', '', '', 0, 'AKJLJ090', 'No', '', 'Mrs Tripathi', 'Matriculation', 'Other', 'Housewife', '', '', 'Bokaro', 'JH', 'India', '820111', '', '9810010102', 0, 'FDSFD42342', 'No', '', 'Other', ' ', '', 'Aunt', '', '', '9810104022', '9810330002', 'sd@gmail.com', 'Birth Certificate', 'Address Proof', 'Bonafied', 'CC', 'Bonafied', 'SLC', 'TC', ''),
(4, 'DPS20204', 200, '2020-2021', 'Ravi ', 'K', 'Bansal', 9, 'MALE', '2011-02-09', 9, 'GENERAL', 5, 2, '2020-2021', 0, 0, 'INDIAN', 'A-Positive', '', '', 'ISL', 'English', 'CBSE', 8, ' Comm Add', 'India', 'JH', 'Bokaro', '8201111', '9810304042', ' Reside Address', 'India', 'JH', 'Bokaro', '8201111', '9810090000', '', 15, '', 0, '', 15, '', 0, 'Mr Bansal', 'Intermediate', 'Business', 'Business Ower', 'Personal', '', 'Bokaro', 'JH', 'India', '826001', '', '', 0, 'AKJLJ090', 'No', '', 'Mrs Bansal', 'Matriculation', 'Other', 'Housewife', '', '', 'Bokaro', 'JH', 'India', '820111', '', '9810010102', 0, 'FDSFD42342', 'No', 'IMG_3321.JPG', 'Other', ' ', '', 'Aunt', '', '', '9810104022', '9810330002', 'sd@gmail.com', 'Birth Certificate', 'Address Proof', 'Bonafied', 'CC', 'Bonafied', 'SLC', 'TC', ''),
(99, NULL, 200, '2020-2021', 'Mithun', 'M Name', 'L Name', 5, 'MALE', '2020-09-09', 10, 'GENERAL', 15, 3, '10', 2, 3, 'INDIAN', 'B-Positive', 'DSDF2323', '', 'DPS', 'English', 'CBSE', 16, ' Comm Add', 'India', 'UP', 'Noida', '201301', '919899395627', ' Resid Address', 'India', 'UP', 'Noida', '201301', '919899395627', 'Stu2010', 6, 'B', 0, 'STU0001', 0, '', 0, 'R N DUTTA', 'PHD', 'Engineer', 'Sr Manager', 'RTD Ltd', 'Noida', 'Noida', 'UP', 'India', '201301', 'sdutta@gmail.com', '919899395627', 2000000, 'ABDF32242', 'Yes', '', 'KD', 'Non-Matric', 'Engineer', 'Housewife', 'NA', 'NA', 'Some city', 'UP', 'India', '201301', 'sd@abc.com', '011123456789', 20000, 'NCSDS00922', 'No', '', 'Other', ' ', '', 'Uncle', '', '', '919899395627', '919899395627', 'sdutta@gmail.com', '7^U.P^INDIA', '36^U.P^INDIA', '7^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA'),
(100, NULL, 200, '2020-2021', 'Suman', 'M Name', 'L Name', 1, 'MALE', '2020-09-01', 10, 'GENERAL', 10, 1, '10', 1, 1, 'INDIAN', 'A-Negative', 'DSDF2323', '', 'DPS', 'English', 'CBSE', 1, ' Comm Add', 'India', 'UP', 'Noida', '201301', '919899395627', ' Resid Add', 'India', 'UP', 'Noida', '201301', '919899395627', 'Stu2010', 5, 'A', 0, 'STU0001', 0, '', 0, 'R N DUTTA', 'Post Graduate', 'Engineer', 'Sr Manager', 'RTD Ltd', 'Noida', 'Noida', 'UP', 'India', '201301', 'sdutta@gmail.com', '919899395627', 2000000, 'ABDF32242', 'Yes', '', 'KD', 'Non-Matric', 'Engineer', 'Housewife', 'NA', 'NA', '', 'UP', 'India', '201301', 'sd@abc.com', '011123456789', 20000, 'NCSDS00922', 'No', '', 'Other', ' Address', 'Suman', 'Uncle', '9899395627', '', '919899395627', '919899395627', 'sdutta@gmail.com', '7^U.P^INDIA', '36^U.P^INDIA', '7^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA');

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
(1, 'STUD20151', 'PRESENT', 'present', 'PRESENT', 'present', 1, 0, 0),
(1, 'STUD20153', 'LATE', 'late', 'LATE', 'late', 1, 0, 0),
(1, 'STUD20154', 'HALFDAY', 'halfday', 'HALFDAY', 'halfday', 1, 0, 0),
(1, 'STUD20155', 'PRESENT', 'presnt', 'PRESENT', 'presnt', 1, 0, 0),
(1, 'STUD20156', 'ABSENT', 'absent', 'ABSENT', 'absent', 1, 0, 0),
(2, 'STUD20157', 'PRESENT', ' gadgad', 'PRESENT', ' gadgad', 1, 0, 0),
(3, 'STUD20151', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(3, 'STUD20153', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(3, 'STUD20154', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(3, 'STUD20155', 'LATE', '', 'LATE', '', 1, 0, 0),
(3, 'STUD20156', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(4, 'STUD20151', 'LATE', '', 'LATE', '', 1, 0, 0),
(4, 'STUD20153', 'LATE', '', 'LATE', '', 1, 0, 0),
(4, 'STUD20154', 'LATE', '', 'LATE', '', 1, 0, 0),
(4, 'STUD20155', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(4, 'STUD20156', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(5, 'STUD20151', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(5, 'STUD20153', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(5, 'STUD20154', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(5, 'STUD20155', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(5, 'STUD20156', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(6, 'STUD20151', 'PRESENT', 'present', 'PRESENT', 'present', 1, 0, 0),
(6, 'STUD20153', 'LATE', 'late', 'LATE', 'late', 1, 0, 0),
(6, 'STUD20154', 'HALFDAY', 'halfday', 'HALFDAY', 'halfday', 1, 0, 0),
(6, 'STUD20155', 'ABSENT', 'presnt', 'ABSENT', 'presnt', 1, 0, 0),
(6, 'STUD20156', 'ABSENT', 'absent', 'ABSENT', 'absent', 1, 0, 0),
(7, 'STUD20151', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(7, 'STUD20153', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(7, 'STUD20154', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(7, 'STUD20155', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(7, 'STUD20156', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(8, 'STUD20151', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(8, 'STUD20153', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(8, 'STUD20154', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(8, 'STUD20155', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(8, 'STUD20156', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(9, 'STUD20151', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(9, 'STUD20153', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(9, 'STUD20154', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(9, 'STUD20155', 'HALFDAY', '', 'HALFDAY', '', 1, 0, 0),
(9, 'STUD20156', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(10, 'STUD20151', 'LATE', '', 'LATE', '', 1, 0, 0),
(10, 'STUD20153', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(10, 'STUD20154', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(10, 'STUD20155', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(10, 'STUD20156', 'ABSENT', '', 'ABSENT', '', 1, 0, 0);

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
  `smsflag` tinyint(1) DEFAULT 0,
  `attendance_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_master_table`
--

INSERT INTO `attendance_master_table` (`Attendance_id`, `Class_id`, `Class_Sec_id`, `doa`, `period`, `attendance_taken_by`, `total_absent`, `total_present`, `total_halfday`, `total_late`, `sms_status`, `whatsapp_status`, `School_Id`, `locked`, `created_on`, `smsflag`, `attendance_status`) VALUES
(1, 1, 1, '2020-10-01', 1, 'admin', 1, 4, 1, 1, 0, 0, 1, 0, '2020-10-14 10:50:50', 0, 1),
(2, 4, 3, '2020-10-01', 1, 'admin', 0, 1, 0, 0, 1, 1, 1, 0, '2020-10-14 11:01:06', 1, 1),
(3, 1, 1, '2020-10-02', 1, 'admin', 1, 4, 1, 1, 0, 0, 1, 0, '2020-10-14 12:15:15', 0, 1),
(4, 1, 1, '2020-10-03', 1, 'admin', 1, 4, 0, 3, 0, 0, 1, 0, '2020-10-14 19:50:39', 0, 1),
(5, 1, 1, '2020-10-05', 1, 'admin', 0, 5, 0, 0, 0, 0, 1, 0, '2020-10-14 19:56:17', 0, 1),
(6, 1, 1, '2020-10-01', 2, 'admin', 2, 3, 1, 1, 0, 0, 1, 0, '2020-10-14 20:12:24', 0, 1),
(7, 1, 1, '2020-10-02', 2, 'admin', 1, 4, 2, 0, 0, 0, 1, 0, '2020-10-14 20:13:08', 0, 1),
(8, 1, 1, '2020-10-06', 1, 'admin', 2, 3, 1, 0, 0, 0, 1, 0, '2020-10-14 21:42:12', 0, 1),
(9, 1, 1, '2020-10-07', 1, 'admin', 2, 3, 1, 0, 0, 0, 1, 0, '2020-10-15 06:38:45', 0, 1),
(10, 1, 1, '2020-10-08', 1, 'admin', 2, 3, 0, 1, 0, 0, 1, 0, '2020-10-16 08:37:52', 0, 1);

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
(0, 0, 'All Classes', 0, 0, NULL, 1, '2020-09-09 19:06:35', 1, 'mukherjee.mit@gmail.com'),
(1, -2, 'K.G. 1', 0, 2, NULL, 1, '2020-09-04 20:33:41', 1, 'mukherjee.mit@gmail.com'),
(2, -1, 'K.G  2', 0, 4, NULL, 1, '2020-09-04 20:36:15', 1, 'mukherjee.mit@gmail.com'),
(4, 1, 'I', 0, 5, NULL, 1, '2020-09-04 20:34:04', 1, 'mukherjee.mit@gmail.com'),
(5, 2, 'II', 0, 6, NULL, 1, '2020-09-04 20:34:09', 1, 'mukherjee.mit@gmail.com'),
(6, 3, 'III', 0, 7, NULL, 1, '2020-09-04 20:34:13', 1, 'mukherjee.mit@gmail.com'),
(7, 4, 'IV', 0, 8, NULL, 1, '2020-09-04 20:34:19', 1, 'mukherjee.mit@gmail.com'),
(8, 5, 'V', 0, 9, NULL, 1, '2020-09-04 20:36:45', 1, 'mukherjee.mit@gmail.com'),
(9, 6, 'VI', 0, 10, NULL, 1, '2020-09-04 20:34:28', 1, 'mukherjee.mit@gmail.com'),
(10, 7, 'VII', 0, 11, NULL, 1, '2020-09-04 20:34:32', 1, 'mukherjee.mit@gmail.com'),
(11, 8, 'VIII', 0, 12, NULL, 1, '2020-09-04 20:34:40', 1, 'mukherjee.mit@gmail.com'),
(12, 9, 'IX', 0, 13, NULL, 1, '2020-09-04 20:34:52', 1, 'mukherjee.mit@gmail.com'),
(13, 10, 'X', 0, 14, NULL, 1, '2020-09-04 20:34:57', 1, 'mukherjee.mit@gmail.com'),
(14, 11, 'XI', 1, 15, NULL, 1, '2020-09-04 20:35:03', 1, 'mukherjee.mit@gmail.com'),
(15, 12, 'XII', 1, 16, NULL, 1, '2020-09-04 20:35:09', 1, 'mukherjee.mit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `class_section_table`
--

CREATE TABLE `class_section_table` (
  `Class_Sec_Id` mediumint(8) UNSIGNED NOT NULL,
  `Class_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `Section` char(1) DEFAULT NULL,
  `Stream` enum('SCIENCE','COMMERCE','ARTS','GENERAL') NOT NULL,
  `max_rollno` int(3) DEFAULT NULL,
  `Room_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `School_Id` mediumint(8) UNSIGNED DEFAULT NULL,
  `DOC` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Enabled` mediumint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_section_table`
--

INSERT INTO `class_section_table` (`Class_Sec_Id`, `Class_Id`, `Section`, `Stream`, `max_rollno`, `Room_Id`, `School_Id`, `DOC`, `Enabled`) VALUES
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
(26, 4, 'K', 'GENERAL', 40, NULL, 1, '2020-09-11 20:52:08', 1);

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
-- Table structure for table `close_user_group_details`
--

CREATE TABLE `close_user_group_details` (
  `cugdid` bigint(20) NOT NULL,
  `cugid` int(11) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `user_type` enum('STUDENT','STAFF','OTHERS','') NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `close_user_group_master`
--

CREATE TABLE `close_user_group_master` (
  `cugid` int(11) NOT NULL,
  `cug_name` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Department_Master_Table`
--

CREATE TABLE `Department_Master_Table` (
  `Dept_Id` int(5) NOT NULL,
  `Dept_Name` varchar(100) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Enabled` int(1) NOT NULL DEFAULT 1,
  `School_Id` int(5) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Created_By` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `designation_master_table`
--

CREATE TABLE `designation_master_table` (
  `Desig_Id` int(5) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Dept_Id` int(5) NOT NULL,
  `School_Id` int(8) NOT NULL,
  `Enabled` int(1) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master_table`
--

CREATE TABLE `employee_master_table` (
  `Employee_Id` mediumint(8) UNSIGNED NOT NULL,
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
  `sms_number` varchar(10) NOT NULL,
  `whatsapp_number` varchar(10) NOT NULL,
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

INSERT INTO `employee_master_table` (`Employee_Id`, `Type_Id`, `Dept_Id`, `Employee_Grade`, `Login_id`, `password`, `login_grade`, `login_enabled`, `Employee_Name`, `Employee_Address`, `DOJ`, `Mob_Number`, `sms_number`, `whatsapp_number`, `Blood_Group`, `DOB`, `Sex`, `Aadhar_Number`, `School_Id`, `Enabled`, `authorized`, `authorized_by`, `shift_start_hour`, `shift_end_hour`) VALUES
(1, 1, NULL, NULL, 'mukherjee.mit@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 8, 1, 'Mithun Mukherjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(2, 2, NULL, NULL, 'imbibeinfosystem@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 6, 1, 'Suman dutt', NULL, NULL, '8709321740', '9899395627', '9899395627', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(3, 3, NULL, NULL, 'chaitan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Chaitan Mishra', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(4, 3, NULL, NULL, 'bhagat@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Bhagat Pandey', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(5, 3, NULL, NULL, 'asha@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Asha Tyagi', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(6, 3, NULL, NULL, 'varun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Varun Kumar', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(7, 3, NULL, NULL, 'mukesh@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Mukesh Sinha', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(8, 3, NULL, NULL, 'tarun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Tarun Thapar', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(9, 3, NULL, NULL, 'pinky@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Pinky Banerjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(10, 3, NULL, NULL, 'dali@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Dali Mukherjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(11, 3, NULL, NULL, 'mithun@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 2, 1, 'Mithun Mukherjee', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(12, 3, NULL, NULL, 'ashok@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'Ashok Mishra', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(13, 1, NULL, NULL, 'abc@def.com', '8cb2237d0679ca88db6464eac60da96345513964', 0, 1, 'abcdef', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(14, NULL, NULL, NULL, 'test1', '12345', 1, 1, 'Amit Sinha', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, NULL, 1, 0, '0', NULL, NULL),
(15, NULL, NULL, NULL, 'test2', '12345', 1, 1, 'Rohan Verma', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, NULL, 1, 0, '0', NULL, NULL),
(18, NULL, NULL, NULL, 'test3', '12345', 1, 1, 'Ravi kant', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, NULL, 1, 0, '0', NULL, NULL),
(19, NULL, NULL, NULL, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Sushil Tripathi', NULL, NULL, '8709321740', '9801301878', '9801301878', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(20, NULL, NULL, NULL, 'testadmin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Ashok Singh', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(21, NULL, NULL, NULL, 'admintst2', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Ram Lal', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 1, 1, 0, '0', NULL, NULL),
(22, NULL, NULL, NULL, 'varun', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 1, 'Arvind Sharma', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 5, 1, 0, '0', NULL, NULL),
(27, NULL, NULL, NULL, 'mukherjee.mit', '8cb2237d0679ca88db6464eac60da96345513964', 1, 1, 'Gautam Dubey', NULL, NULL, '8709321740', '8709321740', '8709321740', NULL, NULL, NULL, NULL, 3, 1, 0, '0', NULL, NULL);

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
  `mdid` bigint(20) UNSIGNED NOT NULL,
  `mid` bigint(20) UNSIGNED NOT NULL,
  `sms_number` varchar(10) NOT NULL,
  `whatsapp_number` varchar(10) DEFAULT NULL,
  `date_of_delivery` datetime NOT NULL,
  `delivery_status` tinyint(1) NOT NULL,
  `whatsapp_view_status` tinyint(1) NOT NULL,
  `user_type` enum('STUDENT','STAFF','OTHERS') NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL COMMENT 'THIS COLUMN I0S USED TO STORE CLASS_SECTION_ID OR DEPARTMENT_ID OR CUG_GROUP_ID FOR THE RECORDS WHICH BELONGS TO GROUP MESSAGING PROCESS.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_details_table`
--

INSERT INTO `message_details_table` (`mdid`, `mid`, `sms_number`, `whatsapp_number`, `date_of_delivery`, `delivery_status`, `whatsapp_view_status`, `user_type`, `user_id`, `group_id`) VALUES
(1, 1, '8709321740', '8709321740', '0000-00-00 00:00:00', 1, 1, 'STUDENT', 'STUD20155', NULL),
(2, 1, '8709321740', '8709321740', '0000-00-00 00:00:00', 1, 1, 'STUDENT', 'STUD20156', NULL),
(3, 8, '1234567890', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(4, 8, '1236547892', '1236547892', '0000-00-00 00:00:00', 0, 0, '', '1236547892', NULL),
(5, 8, '3214568794', '3214568794', '0000-00-00 00:00:00', 0, 0, '', '3214568794', NULL),
(6, 9, '1234567890', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(7, 9, '1236547892', '1236547892', '0000-00-00 00:00:00', 0, 0, '', '1236547892', NULL),
(8, 9, '3214568794', '3214568794', '0000-00-00 00:00:00', 0, 0, '', '3214568794', NULL),
(9, 10, '1234567890', '1234567890', '0000-00-00 00:00:00', 0, 0, '', '1234567890', NULL),
(10, 10, '1236547892', '1236547892', '0000-00-00 00:00:00', 0, 0, '', '1236547892', NULL),
(11, 10, '3214568794', '3214568794', '0000-00-00 00:00:00', 0, 0, '', '3214568794', NULL),
(12, 11, '8709321740', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20151', NULL),
(13, 11, '8709321740', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20153', NULL),
(14, 12, '8709321740', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20151', NULL),
(15, 12, '8709321740', '8709321740', '0000-00-00 00:00:00', 0, 0, 'STUDENT', 'STUD20153', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_master_table`
--

CREATE TABLE `message_master_table` (
  `mid` bigint(20) UNSIGNED NOT NULL,
  `message_title` varchar(200) NOT NULL,
  `message` varchar(640) NOT NULL,
  `message_date` datetime NOT NULL,
  `sms` tinyint(1) NOT NULL,
  `whatsapp` tinyint(1) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_master_table`
--

INSERT INTO `message_master_table` (`mid`, `message_title`, `message`, `message_date`, `sms`, `whatsapp`, `school_id`, `created_by`, `created_on`) VALUES
(1, ' fdasf safas f', 'asdf asdf dasfdasf das', '2020-09-11 17:25:00', 1, 0, 1, 'admin', '2020-09-11 15:25:52'),
(2, 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:55:00', 1, 0, 1, 'admin', '2020-09-11 17:55:14'),
(3, 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:58:00', 1, 0, 1, 'admin', '2020-09-11 17:58:39'),
(4, 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:59:00', 1, 0, 1, 'admin', '2020-09-11 17:59:38'),
(5, 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 19:59:00', 1, 0, 1, 'admin', '2020-09-11 17:59:52'),
(6, 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 20:09:00', 1, 0, 1, 'admin', '2020-09-11 18:09:16'),
(7, 'asdfsf sadfsdafsa', 'dsasfdsafas', '2020-09-11 20:10:00', 1, 0, 1, 'admin', '2020-09-11 18:10:29'),
(8, 'other number message', 'test to other number message.', '2020-09-11 20:18:00', 1, 0, 1, 'admin', '2020-09-11 18:18:16'),
(9, 'other number message', 'test to other number message.', '2020-09-11 21:18:00', 1, 0, 1, 'admin', '2020-09-11 19:18:48'),
(10, 'other number message', 'test to other number message.', '2020-09-11 21:18:00', 1, 0, 1, 'admin', '2020-09-11 19:18:58'),
(11, 'other number message', 'test to other number message.', '2020-09-11 21:19:00', 1, 0, 1, 'admin', '2020-09-11 19:19:27'),
(12, 'other number message', 'test to other number message.', '2020-09-11 21:58:00', 1, 0, 1, 'admin', '2020-09-11 19:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `message_user_group_table`
--

CREATE TABLE `message_user_group_table` (
  `utype_id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `individual_select_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `group_select_enabled` int(11) NOT NULL DEFAULT 1,
  `cug_enabled` tinyint(1) NOT NULL COMMENT 'IT DEFINES IF THE GROUP WILL BE DISPLAYED IN CUG CREATION FORM OR NOT. 1 TO DISPLAY AND 0 TO HIDE.',
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `school_id` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_user_group_table`
--

INSERT INTO `message_user_group_table` (`utype_id`, `user_type`, `individual_select_enabled`, `group_select_enabled`, `cug_enabled`, `enabled`, `school_id`, `created_by`, `created_on`) VALUES
(1, 'Student', 1, 1, 1, 1, 1, 'admin', '2020-09-10 22:19:28'),
(2, 'School Staff', 1, 1, 1, 1, 1, 'admin', '2020-09-10 22:19:21'),
(3, 'Close User Group', 0, 1, 0, 1, 1, 'admin', '2020-09-11 16:37:48'),
(4, 'Entire School', 0, 1, 0, 1, 1, 'admin', '2020-09-08 21:16:03'),
(5, 'Others', 1, 0, 0, 1, 1, 'admin', '2020-09-08 21:16:22');

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
-- Table structure for table `staff_master_table`
--

CREATE TABLE `staff_master_table` (
  `Staff_Id` varchar(20) NOT NULL,
  `Staff_Name` varchar(100) NOT NULL,
  `Gender` enum('MALE','FEMALE','OTHER','') NOT NULL,
  `Contact_No` varchar(10) NOT NULL,
  `Category` enum('Teaching','Non-Teaching') NOT NULL,
  `Department` int(5) NOT NULL,
  `Designation_Id` int(5) NOT NULL,
  `Alt_Contact_No` varchar(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Fathers_Or_Husband_Name` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Blood_Group` varchar(15) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `Experience` int(5) NOT NULL,
  `DOJ` date NOT NULL,
  `Job_Status` varchar(50) NOT NULL,
  `Bank_Account_No` varchar(50) NOT NULL,
  `Bank_Name` varchar(100) NOT NULL,
  `Bank_Branch` varchar(200) NOT NULL,
  `Bank_IFSC` varchar(50) NOT NULL,
  `PAN_No` varchar(50) NOT NULL,
  `Aadhar_No` varchar(50) NOT NULL,
  `UAN_No` varchar(50) NOT NULL,
  `PF_Acc_No` varchar(50) NOT NULL,
  `ESI_Acc_No` varchar(50) NOT NULL
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
-- Dumping data for table `student_class_details`
--

INSERT INTO `student_class_details` (`scd_id`, `student_id`, `class_id`, `class_no`, `stream`, `class_sec_id`, `rollno`, `session`, `session_start_year`, `session_end_year`, `cjd`, `cjd_remarks`, `cld`, `cld_remarks`, `promoted`, `promoted_remarks`, `promotion_updatedby`, `enabled`, `school_id`, `remarks`) VALUES
(1, 'STUD20151', 1, -3, 0, 1, 1, '2020-2021', 2015, 2016, '2016-02-07', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(2, 'STUD20152', 2, -2, 0, 10, 1, '2020-2021', 2015, 2016, '2016-02-08', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(3, 'STUD20153', 1, -3, 0, 1, 2, '2020-2021', 2015, 2016, '2016-02-08', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(4, 'STUD20154', 1, -3, 0, 1, 3, '2020-2021', 2015, 2016, '2016-04-06', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(5, 'STUD20155', 1, -3, 0, 1, 4, '2020-2021', 2015, 2016, '2016-04-06', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(6, 'STUD20156', 1, -3, 0, 1, 5, '2020-2021', 2015, 2016, '2016-05-14', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(7, 'STUD20157', 2, -2, 0, 3, 1, '2020-2021', 2015, 2016, '2016-12-17', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL),
(8, 'STUD20158', 1, -2, 0, 1, 6, '2020-2021', 2015, 2016, '2020-07-11', NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL);

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
  `Gender` varchar(20) DEFAULT NULL,
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
('STUD202001', NULL, 100, '2020-2021', 2020, 2021, 'Ravi3', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202002', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202003', NULL, 100, '2020-2021', 2020, 2021, 'Ravi3', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202004', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202005', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202006', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202007', NULL, 100, '2020-2021', 2020, 2021, 'Ravi3', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202008', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202009', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202010', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Staff', '2020-10-22 00:00:00'),
('STUD202011', NULL, 100, '2020-2021', 2020, 2021, 'Ravi4', 'na', 'Kishan', 5, 0, 'MALE', '1998-11-09', NULL, 'GENERAL', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohan Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mrs Kishan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Father', NULL, 'NA', NULL, NULL, NULL, '9899395627', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '2020-10-22 09:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_master_table_new`
--

CREATE TABLE `student_master_table_new` (
  `Student_Master_Id` mediumint(8) UNSIGNED NOT NULL,
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
  `Gender` enum('MALE','FEMALE','OTHER') DEFAULT 'MALE',
  `DOB` date NOT NULL,
  `Age` tinyint(3) UNSIGNED DEFAULT NULL,
  `Social_Category` enum('GENERAL','SC','ST','OBC') DEFAULT 'GENERAL',
  `Discount_Category` smallint(6) DEFAULT NULL,
  `Locality` smallint(6) DEFAULT NULL,
  `Academic_Session` varchar(9) NOT NULL,
  `Mother_Tongue` smallint(3) UNSIGNED NOT NULL,
  `Religion` smallint(5) UNSIGNED NOT NULL,
  `Nationality` enum('INDIAN','OTHERS') NOT NULL,
  `Blood_Group` enum('AB-Negative','B-Negative','AB-P	ositive','A-Negative','O-Negative','B-Positive','A-Positive','O-Positive') DEFAULT NULL,
  `Aadhar_No` varchar(12) DEFAULT NULL,
  `Student_Image` varchar(100) DEFAULT NULL,
  `Prev_School_Name` varchar(100) DEFAULT NULL,
  `Prev_School_Medium` enum('English','Hindi','Others','Bengali') DEFAULT NULL,
  `Prev_School_Board` enum('CBSE','ICSE','OTHERS') DEFAULT NULL,
  `Prev_School_Class` smallint(6) DEFAULT NULL,
  `Comm_Address` varchar(100) NOT NULL,
  `Comm_Add_Country` varchar(50) NOT NULL,
  `Comm_Add_State` varchar(50) NOT NULL,
  `Comm_Add_City_Dist` varchar(50) NOT NULL,
  `Comm_Add_Pincode` varchar(10) NOT NULL,
  `Comm_Add_ContactNo` varchar(12) NOT NULL,
  `Resid_Address` varchar(100) NOT NULL,
  `Resid_Add_Country` varchar(50) NOT NULL,
  `Resid_Add_State` varchar(50) NOT NULL,
  `Resid_Add_City_Dist` varchar(50) NOT NULL,
  `Resid_Add_Pincode` varchar(10) NOT NULL,
  `Resid_Add_ContactNo` varchar(12) NOT NULL,
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
  `Father_Alumni` enum('Yes','No') NOT NULL,
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
  `Mother_Alumni` enum('Yes','No') NOT NULL,
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
  `Doc_Upload_1` varchar(300) NOT NULL,
  `Doc_Upload_2` varchar(300) NOT NULL,
  `Doc_Upload_3` varchar(300) NOT NULL,
  `Doc_Upload_4` varchar(300) NOT NULL,
  `Doc_Upload_5` varchar(300) NOT NULL,
  `Doc_Upload_6` varchar(300) NOT NULL,
  `Doc_Upload_7` varchar(300) NOT NULL,
  `Doc_Upload_8` varchar(300) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_enquiry_table`
--

CREATE TABLE `visitor_enquiry_table` (
  `veid` int(11) NOT NULL,
  `visitor_type_id` int(11) NOT NULL,
  `visitor_name` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `visit_purpose_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `person_to_meet` varchar(100) NOT NULL,
  `no_of_person` tinyint(4) NOT NULL,
  `date_of_visit` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time DEFAULT NULL,
  `note` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_enquiry_table`
--

INSERT INTO `visitor_enquiry_table` (`veid`, `visitor_type_id`, `visitor_name`, `contact_no`, `company_name`, `visit_purpose_id`, `location`, `person_to_meet`, `no_of_person`, `date_of_visit`, `in_time`, `out_time`, `note`, `created_by`, `created_on`, `school_id`) VALUES
(1, 1, 'Mithun Mukherjee', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-09-28', '12:00:00', NULL, 'sfg fdsg gf fdgdf', 'admin', '2020-09-27 18:30:20', 1),
(2, 1, 'Mithun Mukherjee', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-09-28', '12:17:00', NULL, 'dsgdffdsaf asd', 'admin', '2020-09-27 18:47:29', 1),
(3, 1, 'Mithun Mukherjee', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-09-28', '04:01:00', NULL, 'dsfdsfdsf ', 'admin', '2020-09-28 14:39:16', 1),
(4, 1, 'Mithun Mukherjee', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-09-28', '04:10:00', NULL, 'kjhkhkhk', 'admin', '2020-09-28 10:40:20', 1),
(5, 1, 'Mithun Mukherjee', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-09-28', '07:41:00', NULL, 'dasfsf s sd', 'admin', '2020-09-28 14:11:40', 1),
(6, 1, 'Mithun', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-09-28', '07:43:00', NULL, ' fds fdsaf a fadf', 'admin', '2020-09-28 14:13:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_type_master`
--

CREATE TABLE `visitor_type_master` (
  `vtid` tinyint(4) NOT NULL,
  `Visitor_Type` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `school_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_type_master`
--

INSERT INTO `visitor_type_master` (`vtid`, `Visitor_Type`, `enabled`, `school_id`, `created_on`, `created_by`) VALUES
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
  `vpid` int(11) NOT NULL,
  `visitor_purpose` varchar(100) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `school_id` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_purpose_master`
--

INSERT INTO `visit_purpose_master` (`vpid`, `visitor_purpose`, `enabled`, `school_id`, `created_by`, `created_on`) VALUES
(1, 'Principal Meet', 1, 1, 'admin', '2020-08-26 13:35:24'),
(2, 'For Child Lunch', 1, 1, 'admin', '2020-08-26 13:35:24'),
(3, 'Business Meet', 1, 1, 'admin', '2020-08-26 13:36:17'),
(4, 'Personal Meet', 1, 1, 'admin', '2020-08-26 13:36:17');

--
-- Indexes for dumped tables
--

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
  ADD KEY `Attendance_Id` (`Attendance_Id`);

--
-- Indexes for table `attendance_master_table`
--
ALTER TABLE `attendance_master_table`
  ADD PRIMARY KEY (`Attendance_id`),
  ADD UNIQUE KEY `Class_Sec_id` (`Class_Sec_id`,`doa`,`period`);

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
-- Indexes for table `close_user_group_details`
--
ALTER TABLE `close_user_group_details`
  ADD PRIMARY KEY (`cugdid`),
  ADD KEY `cugid` (`cugid`);

--
-- Indexes for table `close_user_group_master`
--
ALTER TABLE `close_user_group_master`
  ADD PRIMARY KEY (`cugid`);

--
-- Indexes for table `Department_Master_Table`
--
ALTER TABLE `Department_Master_Table`
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
  ADD PRIMARY KEY (`mdid`);

--
-- Indexes for table `message_master_table`
--
ALTER TABLE `message_master_table`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `message_user_group_table`
--
ALTER TABLE `message_user_group_table`
  ADD PRIMARY KEY (`utype_id`);

--
-- Indexes for table `school_master_table`
--
ALTER TABLE `school_master_table`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `school_id` (`school_id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `staff_master_table`
--
ALTER TABLE `staff_master_table`
  ADD PRIMARY KEY (`Staff_Id`),
  ADD UNIQUE KEY `Staff_Id` (`Staff_Id`);

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
  ADD PRIMARY KEY (`Student_Id`),
  ADD UNIQUE KEY `Student_Id` (`Student_Id`);

--
-- Indexes for table `visitor_enquiry_table`
--
ALTER TABLE `visitor_enquiry_table`
  ADD PRIMARY KEY (`veid`);

--
-- Indexes for table `visitor_type_master`
--
ALTER TABLE `visitor_type_master`
  ADD PRIMARY KEY (`vtid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_followup_note`
--
ALTER TABLE `admission_followup_note`
  MODIFY `NOTEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance_master_table`
--
ALTER TABLE `attendance_master_table`
  MODIFY `Attendance_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `close_user_group_details`
--
ALTER TABLE `close_user_group_details`
  MODIFY `cugdid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_details_table`
--
ALTER TABLE `message_details_table`
  MODIFY `mdid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `visitor_enquiry_table`
--
ALTER TABLE `visitor_enquiry_table`
  MODIFY `veid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `close_user_group_details`
--
ALTER TABLE `close_user_group_details`
  ADD CONSTRAINT `close_user_group_details_ibfk_1` FOREIGN KEY (`cugid`) REFERENCES `close_user_group_master` (`cugid`);

--
-- Constraints for table `employee_master_table`
--
ALTER TABLE `employee_master_table`
  ADD CONSTRAINT `employee_master_table_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `department_master_table` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
