-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2021 at 12:53 PM
-- Server version: 5.7.33
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CREATED_BY` varchar(20) NOT NULL,
  `SCHOOL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TO STORE ADMISSION ENQUIRY DETAILS';

--
-- Dumping data for table `admission_enquiry_table`
--

INSERT INTO `admission_enquiry_table` (`AEID`, `STUDENT_NAME`, `ENQUIRER_NAME`, `ENQUIRER_RELATION`, `MOBILE_NO`, `EMAIL_ID`, `LOCALITY_ID`, `Class`, `SESSION`, `LEAD_ID`, `ENQUIRY_STATUS`, `REMARKS`, `SIBLING`, `STUDENT_ID`, `MOBILE_VERIFIED`, `FOLLOWUP_DATE`, `CREATED_ON`, `CREATED_BY`, `SCHOOL_ID`) VALUES
(1, 'Mithun', 'suman', '', '8709321740', 'mmukh79@gmail.com', 2, '', '2020-2021', 3, 'PROCESSING', 'Testing', 'NO', '', '', '2020-12-09', '2020-12-08 20:01:08', 'admin', 1);

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
(1, 1, ' This is in testing mode.  Work WIP.', '2020-12-08 20:01:08', '2020-12-10', 'admin', 1),
(2, 1, 'Second Note.', '2020-12-08 20:01:56', '2020-12-10', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admission_master_documents`
--

CREATE TABLE `admission_master_documents` (
  `Doc_Id` mediumint(8) UNSIGNED NOT NULL,
  `Student_Id` mediumint(8) UNSIGNED NOT NULL,
  `Document_Name` varchar(60) NOT NULL,
  `Document_Type` varchar(40) NOT NULL,
  `Enabled` tinyint(1) DEFAULT '1',
  `School_Id` int(11) DEFAULT NULL,
  `Updated_By` varchar(100) DEFAULT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admission_master_table`
--

CREATE TABLE `admission_master_table` (
  `Admission_Id` int(10) UNSIGNED NOT NULL,
  `School_Admission_Id` int(11) DEFAULT NULL,
  `Is_Admited` enum('Yes','No') DEFAULT 'No',
  `School_Id` mediumint(8) NOT NULL,
  `Session` varchar(9) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Class_Id` smallint(8) UNSIGNED DEFAULT NULL,
  `Stream` enum('SCIENCE','COMMERCE','ARTS','GENERAL') NOT NULL,
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

INSERT INTO `admission_master_table` (`Admission_Id`, `School_Admission_Id`, `Is_Admited`, `School_Id`, `Session`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Stream`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`) VALUES
(202010, 202010, 'Yes', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/202010_AdmissionDocs/a2942800b73328580f2088e3d23f4780.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/202010_AdmissionDocs/3f7dc90d69231c9c7b72096befcb2197.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/202010_AdmissionDocs/03cf6c1f1aedf6787b74cd07b4c0dd6a.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020100, 2020100, 'No', 1, '2020-2021', 'Sunil', 'Tejpratap', 'Kulkarni', 5, '', 'MALE', '2015-11-04', 5, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '985642547880', 'AdmissionDocuments/2020100_AdmissionDocs/c59610a010e9ccc09928dfeb18fb6275.jpg', 'mscv school', 'Hindi', 'ICSE', 5, 'alankeshwar  nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815301', '8329755178', 'alankeshwar nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815301', '8329755178', '', 0, '', '', '', 0, '', '', 'Tejpratap Kulkarni', 'Graduate', 'Armed Forces', '', '', '', 'Bokaro', 'jharkhand', 'India', '815301', 'tk112@gmail.com', '8329755178', '12 lakh', '869742135694', 'No', 'AdmissionDocuments/2020100_AdmissionDocs/ef4807ac58e5e3c382fcd40faf74b61b.jpg', 'Priya kulkarni', 'Graduate', 'Doctor', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'pk112@gmail.com', '8329755178', '25 lakh', '986522697452', '0', 'AdmissionDocuments/2020100_AdmissionDocs/9f3a645ef75434b73434d0519e072274.jpg', 'Other', ' ', '', 'Self', '', NULL, '8329755178', '8329755178', 'tk112@gmail.com'),
(2020000001, 2020000001, 'Yes', 1, '2020-2021', 'Abhishek', 'Kumar', 'Singh', 8, '', 'MALE', '2000-01-01', 21, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '123456789123', NULL, 'Mont Bretia', 'English', 'CBSE', 7, ' Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4845688659', ' Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4845688659', '', 0, '', '', '', 0, '', '', 'Anil Kumar', 'Intermediate', 'Other', 'Plumber', 'Tata', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'anil@gmail.com', '4692658545', '90000', '', 'No', NULL, 'Sarita Devi', 'Non-Matric', 'Other', 'House Wife', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sarita@gmail.com', '2149642165', '', '234913246419', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '2149642165', '2149642165', 'anil@gmail.com'),
(2020000002, 2020000002, 'Yes', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000002_AdmissionDocs/28af6ad6cda41a1d0add36a9ceb36762.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000002_AdmissionDocs/9c62171a96ca43ad1a90e978b3159381.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000002_AdmissionDocs/b4fea5dfc0b80cbb74d20ee2d29ee039.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000003, 2020000003, 'Yes', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000003_AdmissionDocs/efcd4e0d6b4062fb1ef875a41f540703.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000003_AdmissionDocs/78671482b0221b2eae65802d1d8e1ae5.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000003_AdmissionDocs/648dcf778f4b822090d62cbeb6805a41.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000004, 2020000004, 'Yes', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000004_AdmissionDocs/52ba0e6c7916566063583dd3bed61513.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000004_AdmissionDocs/23b1fcbe1e4b34dd0b7baeaa6e15329d.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000004_AdmissionDocs/20cf6b94d1074ef0e84d1525d7f33f0e.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000005, 2020000005, 'No', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000005_AdmissionDocs/7b4ce6bcb37e72689efb4f9024dc75f6.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000005_AdmissionDocs/518a1aeb378ba0feaebb830aaae3454a.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000005_AdmissionDocs/4d0e72d4a61fac9c246ec9e2abf001db.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000006, 2020000006, 'No', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000006_AdmissionDocs/49173cba82da4191a341b931f1993258.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000006_AdmissionDocs/9760b883e559c537363913c524b66930.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000006_AdmissionDocs/97de3f239fb9de6f0539762f534d249d.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000007, 2020000007, 'No', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000007_AdmissionDocs/49173cba82da4191a341b931f1993258.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000007_AdmissionDocs/9760b883e559c537363913c524b66930.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000007_AdmissionDocs/97de3f239fb9de6f0539762f534d249d.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000008, 2020000008, 'No', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000008_AdmissionDocs/0fa041c975d9919773a0911188694a64.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000008_AdmissionDocs/640ec1bc3dc06c2f08f172ba8660898d.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000008_AdmissionDocs/4259823cacc828d1029c79ef14a4941e.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000009, 2020000009, 'No', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000009_AdmissionDocs/d742cb755ee28229e2f343751c9de413.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000009_AdmissionDocs/cf21c8c8e30d4560ae03f8a9874a8428.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000009_AdmissionDocs/186036659bee169a61dcc264e309e049.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000011, 2020000011, 'No', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000011_AdmissionDocs/ea0ee5281bee397bae9b83ee064ff5e9.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000011_AdmissionDocs/21176a12b2f34d99ba2109ad030a723e.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000011_AdmissionDocs/8f3cbfd287a7b0c6be42a85afb328c38.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000012, 2020000012, 'Yes', 1, '2020-2021', 'Riya', 'Raj', 'singh', 17, 'SCIENCE', 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000012_AdmissionDocs/9399531deb0e228377ce8cf00bcb1ba1.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', '5 lakh', '888525960251', 'No', 'AdmissionDocuments/2020000012_AdmissionDocs/a3e4491206c97789480ea50e9cf5bf77.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', '5 lakh', '888525960258', '0', 'AdmissionDocuments/2020000012_AdmissionDocs/c98cd09ae9184ed3d6080d84d241a7d6.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com'),
(2020000013, 2020000013, 'No', 1, '2020-2021', 'Sonam', 'Kumari', 'Singh', 8, '', 'FEMALE', '2017-02-01', 3, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', '', '241846474616', NULL, '', 'Hindi', '', 0, ' Bokaro Chas', 'India', 'Jharkhand', ' Bokaro ', '826002', '9638521471', ' Bokaro Chas', 'India', 'Jharkhand', ' Bokaro ', '826002', '9638521471', '2020000001', 8, '', '', '', 0, '', '', 'Arun Kumar', 'Matriculation', 'Business', 'Manager', 'Ma tata Hardware', 'bokaro', 'Bokaro', 'Jharkhand', 'India', '826001', 'arun@gmail.com', '9638521471', '80000', '321654789456', 'No', NULL, 'Rani Devi', 'Non-Matric', 'Other', '', '', 'Bokaro', 'Bokaro', 'Jharkhand', 'India', '826001', '', '', '', '123454545454', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9638521471', '9638521471', 'arun@gmail.com'),
(2020000014, 2020000014, 'No', 1, '2020-2021', 'Rahul', 'Kumar', 'Choudhary', 8, '', 'MALE', '2018-02-08', 2, 'GENERAL', 2, 1, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '345962564194', 'AdmissionDocuments/2020000014_AdmissionDocs/ffb50bdbc9a91d98df6d4718a336ce1d.jpg', 'Ideal English Academy', 'English', 'CBSE', 7, 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '7894564531', 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '7894564531', '', 0, '', '', '', 0, '', '', 'Suresh Kumar', 'Matriculation', 'Doctor', 'Doctor', 'Health', 'Bokaro Chas', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '7894564531', '120000', '132348412156', 'No', NULL, 'Arti Devi', 'Matriculation', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'arti@gmail.com', '7894564531', '', '524924165165', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '7894564531', '7894564531', 'suresh@gmail.com'),
(2020000015, 2020000015, 'No', 1, '2020-2021', 'Ajay', 'Kumar', 'Ram', 8, '', 'MALE', '2016-06-03', 4, 'SC', 3, 3, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '521496406574', NULL, 'Ideal English Academy', 'Hindi', 'CBSE', 7, ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '826002', '3241946210', ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '826002', '3241946210', '', 0, '', '', '', 0, '', '', 'Sohan Ram', 'Non-Matric', 'Private Sec. Employee', 'Labour', 'Private', 'Bokaro', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '3241946210', '75000', '241926412641', 'No', NULL, 'Manju Devi', 'Non-Matric', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '3241946210', '', '524598264296', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3241946210', '3241946210', 'sohan@gmail.com'),
(2020000016, 2020000016, 'No', 1, '2020-2021', 'Robin ', 'Kumar', 'Pushp', 8, '', 'MALE', '2013-02-14', 7, 'GENERAL', 1, 4, '2020-2021', 'Tamil', 'Buddhist', 'INDIAN', 'B-Negative', '625714965419', NULL, '', 'Hindi', '', 0, 'Barmasia Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1234567897', 'Barmasia Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1234567897', '', 0, '', '', '', 0, '', '', 'Ashok Jha', 'Graduate', 'Private Sec. Employee', 'Reporter', 'Bhaskar', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1234567897', '100000', '325412641634', 'No', NULL, 'Puja Devi', 'Graduate', 'Other', 'Teacher', 'School', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1234567897', '100000', '524192634163', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1234567897', '1234567897', 'robin@gmail.com'),
(2020000017, 2020000017, 'No', 1, '2020-2021', 'Rajesh', 'Ramesh', 'sahu', 17, 'GENERAL', 'MALE', '2018-01-03', 3, 'ST', 2, 1, '2020-2021', 'English', 'Hindu', 'INDIAN', 'A-Negative', '456932569865', 'AdmissionDocuments/2020000017_AdmissionDocs/729129de32f19d3047b5c31ddfa2cc5e.jpg', 'yps holy school', 'Hindi', '', 17, 'krishna nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993215', 'krishna nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993215', '2020000011', 17, '', '', '', 0, '', '', 'Ramesh', 'Intermediate', 'Other', '', '', '', 'bokaro', 'jharkhand', 'india', '815306', 'rs112@gmail.com', '8925993216', '6 lakh', '123565982145', 'No', 'AdmissionDocuments/2020000017_AdmissionDocs/69f989508b10e58da051f78fbd5a6799.jpg', 'rohini', 'Post Graduate', '', '', '', 'krishna nager,bokaro ', 'bokaro', 'jharkhand', 'india', '815306', 'rs1122@gmail.com', '8925993216', '7 lakh', '125624517896', '0', 'AdmissionDocuments/2020000017_AdmissionDocs/f71eafcb30687c92cce299f23ca9b921.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993215', '8625993215', 'rs112@gmail.com'),
(2020000018, 2020000018, 'No', 1, '2020-2021', 'Kartik', 'Kumar', 'Yadav', 8, '', 'MALE', '2012-09-14', 8, 'SC', 2, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'O-Positive', '321498654198', 'AdmissionDocuments/2020000018_AdmissionDocs/295b7fb6020c5c2109192d8f6a88a70d.jpeg', 'Orient Public', 'Hindi', '', 7, 'Ara Bihar', 'India', 'Bihar', 'Aara', '826007', '6549874565', 'Ara Bihar', 'India', 'Bihar', 'Aara', '826007', '6549874565', '', 0, '', '', '', 0, '', '', 'Shankar Yadav', 'PHD', 'Other', 'Manager', '', 'Bihar', 'Aara', 'Bihar', 'India', '826007', 'Shankar@gmail.com', '6549874565', '1500000', '361492643106', 'No', NULL, 'Sanju Devi', 'Other', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '6549874565', '100000', '625496424964', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6549874565', '6549874565', 'shankar@gmail.com'),
(2020000019, 2020000019, 'No', 1, '2020-2021', 'Chandan ', 'Kumar ', 'Yadav', 9, '', 'MALE', '2012-03-16', 8, 'SC', 2, 4, '2020-2021', 'Oriya', 'Jain', 'INDIAN', 'O-Positive', '325149264129', NULL, 'St anthony', 'Hindi', '', 8, 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1254125412', 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1254125412', '', 0, '', '', '', 0, '', '', 'Shiv Yadav', 'Graduate', 'Other', 'Driver', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1254125412', '1200000', '324960169416', 'No', NULL, 'Arti Devi', 'Other', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1254125412', '321111', '145719601613', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1254125412', '1254125412', 'chandan@gmail.com'),
(2020000020, 2020000020, 'No', 1, '2020-2021', 'Rakesh', 'harshit', 'sharma', 17, '', 'MALE', '2018-02-04', 2, 'GENERAL', 3, 1, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'B-Positive', '256898651458', 'AdmissionDocuments/2020000020_AdmissionDocs/d62c5a918279cc04c975520bf4048455.jpg', 'RSGK holy school', 'Hindi', 'ICSE', 17, 'hanuman nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993219', 'hanuman nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993219', '', 0, '', '', '', 0, '', '', 'Harshit sharma', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'hs112@gmail.com', '8925993219', '10 lakh', '215489657845', 'Yes', 'AdmissionDocuments/2020000020_AdmissionDocs/510a442a896dcfc563b1e25d80898a5f.jpg', 'Nutan sharma', 'Intermediate', '', '', '', 'hanuman nager,bokaro steel', 'Bokaro', 'jharkhand', 'India', '815306', 'ns112@gmail.com', '8925993219', '2 lakh', '895632569865', '0', 'AdmissionDocuments/2020000020_AdmissionDocs/bbab72eaca69f74b85db9c4798e98dd0.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993219', '8625993219', 'hs112@gmail.com'),
(2020000021, 2020000021, 'No', 1, '2020-2021', 'Rajpal', 'Kumar', 'Sharma', 9, '', 'MALE', '2011-11-15', 9, 'ST', 2, 4, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', 'A-Positive', '517406516136', NULL, 'Mont Bretia', 'Hindi', 'ICSE', 8, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4564556465', 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4564556465', '', 0, '', '', '', 0, '', '', 'Rajiv Sharma', 'PHD', 'Other', 'Teacher', 'Denobili', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '4564556465', '90000', '241906319641', 'No', NULL, 'Rani Devi', 'Graduate', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '4564556465', '352461', '365275209634', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '4564556465', '4564556465', 'rajpal@gmail.com'),
(2020000022, 2020000022, 'No', 1, '2020-2021', 'Rajpal', 'Kumar', 'Sharma', 9, '', 'MALE', '2011-11-15', 9, 'ST', 2, 4, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', 'A-Positive', '517406516136', NULL, 'Mont Bretia', 'Hindi', 'ICSE', 8, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4564556465', 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4564556465', '', 0, '', '', '', 0, '', '', 'Rajiv Sharma', 'PHD', 'Other', 'Teacher', 'Denobili', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '4564556465', '90000', '241906319641', 'No', NULL, 'Rani Devi', 'Graduate', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '4564556465', '352461', '365275209634', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '4564556465', '4564556465', 'rajpal@gmail.com'),
(2020000023, 2020000023, 'No', 1, '2020-2021', 'Manisha', 'Mohit', 'Sharma', 17, '', 'FEMALE', '2018-06-04', 0, 'ST', 2, 1, '2020-2021', 'Gujrati', 'Buddhist', 'INDIAN', 'O-Positive', '598614528759', 'AdmissionDocuments/2020000023_AdmissionDocs/4e2475083bc2e55e7d25a0276bc60205.jpg', 'RSGK holy school', 'English', 'CBSE', 17, 'carmel nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993210', 'carmel nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993210', '', 0, '', '', '', 0, '', '', 'Mohit sharma', 'Post Graduate', 'Business', '', '', '', 'Bokaro', 'jharkhand', 'India', '815301', 'ms112@gmail.com', '8925993210', '15 lakh', '569878951258', 'No', 'AdmissionDocuments/2020000023_AdmissionDocs/00dc09af5ed1b2433785a6096e54fd40.jpg', 'seema sharma', 'Non-Matric', 'Other', '', '', 'carmel nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815301', 'ss112@gmail.com', '8925993210', '5 lakh', '965878542563', '0', 'AdmissionDocuments/2020000023_AdmissionDocs/d2cd0b4b1a031a1fb02cc4ebbaf6ebef.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993210', '8625993210', 'ms112@gmail.com'),
(2020000024, 2020000024, 'No', 1, '2020-2021', 'Govinda', 'Kumari', 'Dhawan', 9, '', 'MALE', '2011-02-09', 9, 'GENERAL', 1, 1, '2020-2021', 'Hindi', 'Other', 'INDIAN', 'O-Positive', '241964019461', NULL, 'Abc Paathshala', 'English', 'CBSE', 8, 'Bokaro Steel City', 'India', 'Jharkhand', 'Bokaro', '826002', '', 'Bokaro Steel City', 'India', 'Jharkhand', 'Bokaro', '826002', '', '', 0, '', '', '', 0, '', '', 'Raj Kumar', 'Graduate', 'Other', 'Actor', 'Bollywood', 'Mumbai', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '5246416466', '100000', '521496421964', 'No', NULL, 'Sridevi', 'Graduate', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '5246416466', '100000', '517429061296', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '5246416466', '5246416466', 'govinda@gmail.com'),
(2020000025, 2020000025, 'No', 1, '2020-2021', 'Rekha', 'Kumari', 'Rajak', 9, '', 'FEMALE', '2010-10-15', 10, 'ST', 3, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '324906109641', NULL, 'Ideal English Academy', 'Hindi', 'ICSE', 8, 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '4564563217', 'Bokaro Chas', 'India', 'Jharkhand', 'Dhanbad', '826001', '4564563217', '', 0, '', '', '', 0, '', '', 'Sunil Rajak', 'Graduate', 'Doctor', 'Doctor', 'Asarfi', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '4564563217', '321020', '514906190616', 'No', NULL, 'Ruby Devi', 'PHD', 'Doctor', 'Doctor', 'Asarfi', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '4564563217', '321021', '352140631064', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '4564563217', '4564563217', 'rekha@gmail.com'),
(2020000026, 2020000026, 'No', 1, '2020-2021', 'Shagun', 'Kumari', 'Mahto', 9, '', 'FEMALE', '2010-04-14', 10, 'GENERAL', 1, 3, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'AB-Negative', '627419064190', NULL, 'Denobili', 'Bengali', 'ICSE', 8, 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6547896547', 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6547896547', '', 0, '', '', '', 0, '', '', 'Nirmal Mahto', 'Graduate', 'Business', 'Business', 'Shree Hari Generator', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '6547896547', '120000', '', 'No', NULL, 'Pramila Mahto', '', '', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '6547896547', '', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6547896547', '6547896547', ''),
(2020000027, 2020000027, 'No', 1, '2020-2021', 'Shagun', 'Kumari', 'Mahto', 9, '', 'FEMALE', '2010-04-14', 10, 'GENERAL', 1, 3, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'AB-Negative', '627419064190', NULL, 'Denobili', 'Bengali', 'ICSE', 8, 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6547896547', 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6547896547', '', 0, '', '', '', 0, '', '', 'Nirmal Mahto', 'Graduate', 'Business', 'Business', 'Shree Hari Generator', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '6547896547', '120000', '362524964219', 'No', NULL, 'Pramila Mahto', 'Graduate', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '6547896547', '1200000', '624719264012', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6547896547', '6547896547', 'shagun@gmail.com'),
(2020000028, 2020000028, 'No', 1, '2020-2021', 'shweta', 'Anand', 'Mehta', 17, '', 'FEMALE', '2018-01-05', 3, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Jain', 'INDIAN', '', '259869856983', 'AdmissionDocuments/2020000028_AdmissionDocs/c33b65faa5bf44090106707d50989af4.jpg', 'mscv school', 'English', 'CBSE', 17, 'darda nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815311', '8625993209', 'darda nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815311', '8625993209', '', 0, '', '', '', 0, '', '', 'Anand mehta', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'dhanbad', 'jharkhand', 'India', '815311', 'Am112@gmail.com', '8925993209', '20 lakh', '598678598569', 'No', 'AdmissionDocuments/2020000028_AdmissionDocs/ddc4dd2e3952dcb58008be9e953d14ba.jpg', 'Sujata mehta', 'Graduate', 'Doctor', '', '', 'darda nager,dhanbad', 'giridih', 'jharkhand', 'India', '815311', 'sm112@gmail.com', '8925993216', '25 lakh', '896589596598', '0', 'AdmissionDocuments/2020000028_AdmissionDocs/6bde6c33435b9d0e3dfa693a878c2f9c.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993215', '8625993215', 'am112@gmail.com'),
(2020000029, 2020000029, 'No', 1, '2020-2021', 'Abhishek', 'Ravindra', 'Singh', 17, '', 'MALE', '2018-01-20', 0, 'GENERAL', 1, 1, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Negative', '598648712589', 'AdmissionDocuments/2020000029_AdmissionDocs/db9c95b50affb8f0331711b8abfd5172.jpg', 'RSGK holy school', 'Hindi', 'CBSE', 17, 'krishna nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '', 'krishna nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '', '', 0, '', '', '', 0, '', '', 'Ravindra singh', '', '', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'as112@gmail.com', '8925993220', '20 lakh', '598647125986', 'No', 'AdmissionDocuments/2020000029_AdmissionDocs/896cc734c86aabebea7b95b633b54472.jpg', 'Rajni singh', '', '', '', '', 'krishna nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'rs1112@gmail.com', '8925993208', '25 lakh', '698547126589', '0', 'AdmissionDocuments/2020000029_AdmissionDocs/1f3235962a558a1fdfb72daecaceef3a.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993208', '8625993208', 'rs1112@gmail.com'),
(2020000030, 2020000030, 'Yes', 1, '2020-2021', 'Sachin', 'Ramesh', 'shetty', 16, '', 'MALE', '2017-01-13', 4, 'SC', 2, 3, '2020-2021', 'Malayalam', 'Hindu', 'INDIAN', 'A-Positive', '658974512599', 'AdmissionDocuments/2020000030_AdmissionDocs/b4a76614c2e81713206387bb9d2e7787.jpg', 'RSGK holy school', '', '', 16, 'krishna nager,boakro', 'India', 'jharkhand', 'bokaro', '815306', '8625993299', 'krishna nager,boakro', 'India', 'jharkhand', 'bokaro', '815306', '8625993299', '', 0, '', '', '', 0, '', '', 'Ramesh shetty', 'Matriculation', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs112@gmail.com', '8925993299', '12 lakh', '552698745598', 'No', 'AdmissionDocuments/2020000030_AdmissionDocs/f00f7983702812da3abc22189853f724.jpg', 'Menka shetty', 'Non-Matric', 'Other', '', '', 'krishna nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'ms11112@gmail.com', '8925993299', '2 lakh', '888522525252', '0', 'AdmissionDocuments/2020000030_AdmissionDocs/84d140c79c8d50e4e777586cc66bc41f.jpg', 'Other', 'krishna nager,bokaro steel', 'Rakesh shetty', 'Aunt', '8625996211', NULL, '8625996211', '8625996211', 'ms11112@gmail.com'),
(2020000031, 2020000031, 'No', 1, '2020-2021', 'Dharmendra', 'kamlesh', 'yadav', 16, '', 'MALE', '2017-01-27', 3, 'SC', 3, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '225998459855', 'AdmissionDocuments/2020000031_AdmissionDocs/acbd326fa1e7e31855fb31a75623f07d.jpg', 'yps holy school', 'Hindi', 'CBSE', 16, 'gaytri nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993255', 'gaytri nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993255', '', 0, '', '', '', 0, '', '', 'Kamlesh yadav', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'km555@gmail.com', '8625993255', '15 lakh', '', 'No', 'AdmissionDocuments/2020000031_AdmissionDocs/654eed13735c4090ba3231d48df7553a.jpg', 'Kanchan yadav', 'Graduate', 'Business', '', '', 'Gaytri nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'km555@gmail.com', '8625993255', '12 lakh', '259855668855', '0', 'AdmissionDocuments/2020000031_AdmissionDocs/7510f5b4ca470a0739bd8e5c80866734.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993255', '8625993255', 'km555@gmail.com'),
(2020000032, 2020000032, 'No', 1, '2020-2021', 'Lalit ', 'Ashok', 'Kothari', 16, '', 'MALE', '2017-01-11', 4, 'GENERAL', 1, 1, '2020-2021', 'Hindi', 'Jain', 'INDIAN', 'O-Positive', '589885566589', 'AdmissionDocuments/2020000032_AdmissionDocs/b2d1e578c7a0f9e05866734830ce40dc.jpg', 'mscv school', '', 'ICSE', 16, 'Shastri nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993555', 'Shastri nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993555', '', 0, '', '', '', 0, '', '', 'Ashok kothari', 'Other', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'ak00712@gmail.com', '8625993555', '25 lakh', '259845878556', 'No', 'AdmissionDocuments/2020000032_AdmissionDocs/67de2f09a37675b389235c0d871b3694.jpg', 'Minakshi kothari', '', '', '', '', 'Shastri nager,bokaro steel', 'Bokaro', 'jharkhand', 'India', '815301', 'mk0312@gmail.com', '8625993555', '', '598412255785', '0', 'AdmissionDocuments/2020000032_AdmissionDocs/a6c88f0defa77e9167f8aaa633080389.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993555', '8625993555', 'ak00712@gmail.com'),
(2020000033, 2020000033, 'No', 1, '2020-2021', 'vivek ', 'Motiram', 'Kumbhare', 16, '', 'MALE', '2016-01-28', 4, 'ST', 2, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '698569847512', 'AdmissionDocuments/2020000033_AdmissionDocs/03a38e77e0d3ec35e884b896afc73797.jpg', 'honey holy school', '', '', 16, 'Shiv nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993111', 'Shiv nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993111', '', 0, '', '', '', 0, '', '', 'Motiram kumbhare', 'Graduate', 'Doctor', '', '', '', 'dhanbad', 'jharkhand', 'India', '815306', 'mk00712@gmail.com', '8625993111', '12 lakh', '254879545688', 'No', 'AdmissionDocuments/2020000033_AdmissionDocs/a60e9603fc88c995059a3d3c40e94734.jpg', 'Monika kumbhare', 'Graduate', 'Doctor', '', '', '', 'dhanbad', 'jharkhand', 'India', '815306', 'mk112@gmail.com', '8625993111', '7 lakh', '598471553982', '0', 'AdmissionDocuments/2020000033_AdmissionDocs/16cd456fa98f962b3269c8335bdb65ad.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993111', '8625993111', 'mk112@gmail.com'),
(2020000034, 2020000034, 'No', 1, '2020-2021', 'Rahid', 'Israil', 'Ansari', 16, '', 'MALE', '2016-01-22', 4, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Muslim', 'INDIAN', 'B-Positive', '589874584785', 'AdmissionDocuments/2020000034_AdmissionDocs/9cf3aa4e9b1e69aaf564df861771d284.jpg', 'yps holy school', 'Hindi', '', 16, 'Ali nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993100', 'Ali nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8625993100', '', 0, '', '', '', 0, '', '', 'Israil Ansari', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'Is112@gmail.com', '8625993100', '12 lakh', '254178965369', 'No', 'AdmissionDocuments/2020000034_AdmissionDocs/d34133eecd7170c19da383a568cee654.jpg', 'Alisha Ansari', 'Other', 'Other', '', '', 'krishna nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'as112@gmail.com', '8625993100', '5 lakh', '221458759985', '0', 'AdmissionDocuments/2020000034_AdmissionDocs/b99be37575f00bbd2b5d8140e333bbe6.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993100', '8625993100', 'as112@gmail.com'),
(2020000035, 2020000035, 'No', 1, '2020-2021', 'Ashok', 'Lalit', 'Kothari', 16, '', 'MALE', '2016-11-14', 4, 'GENERAL', 1, 2, '2020-2021', 'Kannada', 'Jain', 'INDIAN', 'A-Positive', '598424455861', 'AdmissionDocuments/2020000035_AdmissionDocs/f5308f062f91d833949ce82b15f77a5c.jpg', 'honey holy school', 'Hindi', 'ICSE', 16, 'Shastri nager,bokaro chas', 'India', 'jharkhand', 'bokaro', '815306', '8625993999', 'Shastri nager,bokaro chas', 'India', 'jharkhand', 'bokaro', '815306', '8625993999', '', 0, '', '', '', 0, '', '', 'Lalit kothari', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'lk00712@gmail.com', '8625993999', '12 lakh', '748598136548', 'No', 'AdmissionDocuments/2020000035_AdmissionDocs/8b72a7412ede1dd801abf4daf9031fed.jpg', 'kamla kothari', 'Matriculation', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'kk112@gmail.com', '8625993999', '7 lakh', '569841254785', '0', 'AdmissionDocuments/2020000035_AdmissionDocs/147f624ab96dbdfab28df386be1beced.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993999', '8625993999', 'kk112@gmail.com'),
(2020000036, 2020000036, 'No', 1, '2020-2021', 'Rohan', 'Rajesh', 'Solanki', 1, '', 'MALE', '2017-08-15', 3, 'SC', 3, 1, '2020-2021', 'Hindi', 'Sikh', 'INDIAN', 'A-Positive', '659874589321', 'AdmissionDocuments/2020000036_AdmissionDocs/6683e51b949332d1068e0204e8475eac.jpg', 'yps holy school', 'Hindi', '', 1, 'Tejpratap nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '9923940356', 'Tejpratap nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '9923940356', '', 0, '', '', '', 0, '', '', 'Rajesh solanki', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs0912@gmail.com', '9923940356', '15 lakh', '659845871255', 'No', 'AdmissionDocuments/2020000036_AdmissionDocs/e9d44a53de0b0f6016464642e2e41711.jpg', 'Rekha solanki', 'Graduate', 'Doctor', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs112@gmail.com', '9923940356', '12 lakh', '', '0', 'AdmissionDocuments/2020000036_AdmissionDocs/2cb096d4a85f7668b6bb4814eb399d35.jpg', 'Other', ' ', '', 'Self', '', NULL, '9923940356', '9923940356', 'rs0912@gmail.com'),
(2020000037, 2020000037, 'No', 1, '2020-2021', 'Roshan', 'Dipak', 'Shukla', 1, '', 'MALE', '2017-11-23', 0, 'ST', 2, 2, '2020-2021', 'Hindi', 'Sikh', 'INDIAN', 'A-Positive', '685974589512', 'AdmissionDocuments/2020000037_AdmissionDocs/03396a41a2202531b84cf1bcdcb34cb7.jpg', 'RSGK holy school', 'Hindi', 'CBSE', 1, 'durga nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815301', '9923940355', 'durga nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815301', '9923940355', '', 0, '', '', '', 0, '', '', 'Dipak shukla', 'Intermediate', 'Other', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'ds112@gmail.com', '9923940355', '5 lakh', '956847851256', 'Yes', 'AdmissionDocuments/2020000037_AdmissionDocs/0ac5402a359fe696912aa476edf76385.jpg', 'Mitali shukla', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs112@gmail.com', '9923940355', '12 lakh', '988457795236', '0', 'AdmissionDocuments/2020000037_AdmissionDocs/dc9619e1dd83e4c64a33ae621d2afb75.jpg', 'Other', ' ', '', 'Self', '', NULL, '9923940355', '9923940355', 'ds112@gmail.com'),
(2020000038, 2020000038, 'No', 1, '2020-2021', 'Suraj', 'Kumar', 'Sharma', 10, '', 'MALE', '2000-02-02', 20, 'GENERAL', 1, 1, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '318941069416', NULL, 'Ideal English Academy', 'Hindi', 'CBSE', 9, 'Hirapur Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6549649641', 'Hirapur Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6549649641', '', 0, '', '', '', 0, '', '', 'Raju Sharma', 'Non-Matric', 'Public/PSU Sec. Employee', 'Driver', 'Railway', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '6549649641', '321000', '527490619616', 'No', NULL, 'Sonu Devi', '', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suraj@gmail.com', '6549649641', '321000', '354984194616', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6549649641', '6549649641', 'suraj@gmail.com'),
(2020000039, 2020000039, 'No', 1, '2020-2021', 'Md', 'Irshad', 'Ansari', 10, '', 'MALE', '2000-02-17', 20, 'GENERAL', 2, 3, '2020-2021', 'Hindi', 'Muslim', 'INDIAN', 'A-Positive', '649841846416', NULL, 'Mont Bretia', 'Hindi', 'CBSE', 9, ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '826002', '6565656210', ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '826002', '6565656210', '', 0, '', '', '', 0, '', '', 'Md Iqbal Ansari', 'Non-Matric', 'Business', 'Hardware', 'Private', 'Bokaro Chas', 'Dhanbad', 'Jharkhand', 'India', '826001', 'irshad@gmail.com', '6565656210', '120000', '354964169416', 'No', NULL, 'Nazma Khatoon', 'Non-Matric', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'irshad@gmail.com', '6565656210', '120000', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6565656210', '6565656210', 'irshad@gmail.com'),
(2020000040, 2020000040, 'No', 1, '2020-2021', 'manoj', 'mahesh', 'Shukla', 1, '', 'MALE', '2017-01-23', 3, 'ST', 2, 2, '2020-2021', 'Hindi', 'Jain', 'INDIAN', 'A-Positive', '685974589513', 'AdmissionDocuments/2020000040_AdmissionDocs/b6862260d92e20a94813d8321e9d91ce.jpg', 'mscv school', 'Hindi', 'CBSE', 1, 'durga nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815301', '9923940111', 'durga nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815301', '9923940111', '', 0, '', '', '', 0, '', '', 'Mahesh shukla', 'Graduate', 'Engineer', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'ms112@gmail.com', '9923940111', '5 lakh', '956847851254', 'Yes', 'AdmissionDocuments/2020000040_AdmissionDocs/68a47395e6dfbe19cc262017352b3c6e.jpg', 'Mira shukla', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'ms112@gmail.com', '9923940111', '12 lakh', '988457795237', '0', 'AdmissionDocuments/2020000040_AdmissionDocs/e61f49ed6036212823474b23a5dbd151.jpg', 'Other', ' ', '', 'Self', '', NULL, '9923940111', '9923940111', 'ms112@gmail.com'),
(2020000041, 2020000041, 'No', 1, '2020-2021', 'Md', 'Najibul', 'Ansari', 10, '', 'MALE', '1999-10-14', 21, 'GENERAL', 2, 3, '2020-2021', 'Hindi', 'Muslim', 'INDIAN', 'AB-Negative', '649841846416', NULL, 'Denobili', 'Hindi', 'ICSE', 9, ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '826002', '6565656210', 'Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826002', '3265656562', '', 0, '', '', '', 0, '', '', 'Md Alimuddin Ansari', 'Non-Matric', 'Business', 'Builder', 'Private', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'Najibul@gmail.com', '3265656562', '320000', '354361349631', 'No', NULL, 'Fatima Khatoon', 'Non-Matric', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'Najibul@gmail.com', '3265656562', '120000', '359461306413', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3265656562', '3265656562', 'Najibul@gmail.com'),
(2020000042, 2020000042, 'No', 1, '2020-2021', 'Srikant', '', 'Manik', 10, '', 'MALE', '1999-07-14', 21, 'GENERAL', 1, 2, '2020-2021', 'Kannada', 'Hindu', 'INDIAN', 'B-Positive', '362641613613', NULL, 'Mont Bretia', '', 'CBSE', 9, ' Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826003', '1065656210', 'Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826002', '1065656210', '', 0, '', '', '', 0, '', '', 'Surya Manik', 'Non-Matric', 'Public/PSU Sec. Employee', 'Clerk', 'Private', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826003', 'Surya@gmail.com', '1065656210', '320100', '354361349631', 'No', NULL, 'Praveen Kumari', 'Intermediate', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826003', 'Surya@gmail.com', '1065656210', '320100', '319846106310', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1065656210', '1065656210', 'Surya@gmail.com'),
(2020000043, 2020000043, 'No', 1, '2020-2021', 'Saurabh', 'Manish', 'Trivedi', 1, '', 'MALE', '2016-11-24', 4, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '986547812545', 'AdmissionDocuments/2020000043_AdmissionDocs/0434206328f6b1b0f849fa67bdbecd03.jpg', 'yps holy school', 'Hindi', 'CBSE', 1, 'arjun nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993288', 'arjun nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993288', '', 0, '', '', '', 0, '', '', 'Manish Trivedi', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'Mt00712@gmail.com', '8625993288', '10 lakh', '659874512658', 'No', 'AdmissionDocuments/2020000043_AdmissionDocs/479f166d830c62e57eab78c896ef4fd5.jpg', 'Rozi trivedi', 'Graduate', 'Business', '', '', 'Shastri nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'rt112@gmail.com', '8625993288', '12 lakh', '986544175886', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '8625993288', '8625993288', 'rt112@gmail.com'),
(2020000044, 2020000044, 'No', 1, '2020-2021', 'Mukesh', 'Rajesh', 'MIsal', 1, '', 'MALE', '2016-01-24', 4, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '986547812542', 'AdmissionDocuments/2020000044_AdmissionDocs/398da856482df9362812b4dff383cd12.jpg', 'yps holy school', 'Hindi', 'CBSE', 1, 'krishn kunj nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993281', 'krishn kunj nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993281', '', 0, '', '', '', 0, '', '', 'Rajesh misal', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rm00712@gmail.com', '8625993281', '10 lakh', '659874512654', 'No', 'AdmissionDocuments/2020000044_AdmissionDocs/76d3ac7bc6fbe85072a19d6f73cb0578.jpg', 'Suverna misal', 'Graduate', 'Business', '', '', 'Shastri nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'rt112@gmail.com', '8625993281', '12 lakh', '986544175886', '0', 'AdmissionDocuments/2020000044_AdmissionDocs/5ff22915308eb06c88151f9682e7681b.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993281', '8625993281', 'rm112@gmail.com'),
(2020000045, 2020000045, 'No', 1, '2020-2021', 'Roshni', 'Rajesh', 'Sharma', 1, '', 'FEMALE', '2016-01-12', 4, 'ST', 2, 4, '2020-2021', 'Hindi', 'Jain', 'INDIAN', 'AB-Negative', '986547812533', 'AdmissionDocuments/2020000045_AdmissionDocs/4395c3d65b235d6b2be471137a464f9c.jpg', 'mscv school', 'Hindi', '', 1, 'Radhe nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993211', 'Radhe nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993211', '', 0, '', '', '', 0, '', '', 'Rajesh Sharma', 'Graduate', 'Engineer', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs00712@gmail.com', '8625993211', '10 lakh', '659874512644', 'No', 'AdmissionDocuments/2020000045_AdmissionDocs/fb8d3b41256fd63c00e98b1165af0ee5.jpg', 'Laxmi sharma', 'Post Graduate', '', '', '', 'Shastri nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'ls112@gmail.com', '8625993281', '12 lakh', '986544175886', '0', 'AdmissionDocuments/2020000045_AdmissionDocs/ab3018859b3b0f680f35765b1cbfc819.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993211', '8625993211', 'rs00712@gmail.com'),
(2020000046, 2020000046, 'No', 1, '2020-2021', 'Rajni', 'Sushant', 'Agrawal', 2, '', 'FEMALE', '2016-01-12', 4, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Jain', 'INDIAN', 'AB-Negative', '986545812533', 'AdmissionDocuments/2020000046_AdmissionDocs/8c754b54011d3615ed89ed3151595609.jpg', 'mscv school', 'English', 'CBSE', 2, 'Pratap nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993200', 'Pratap nager,dhanbad', 'India', 'jharkhand', 'dhanbad', '815306', '8625993200', '', 0, '', '', '', 0, '', '', 'Sushant agrawal', 'Graduate', 'Engineer', '', '', '', 'dhanbad', 'jharkhand', 'India', '815306', 'sa00712@gmail.com', '8625993200', '10 lakh', '659864512644', 'No', 'AdmissionDocuments/2020000046_AdmissionDocs/482d4a4297d01c5bf3d43cd1c986a953.jpg', 'Sonali agrrawal', 'Post Graduate', '', '', '', 'Shastri nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'ls112@gmail.com', '8625993200', '12 lakh', '986544174886', '0', 'AdmissionDocuments/2020000046_AdmissionDocs/50e8d8cd349c1058a8050c4fcba6e36d.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993200', '8625993200', 'sa00712@gmail.com');
INSERT INTO `admission_master_table` (`Admission_Id`, `School_Admission_Id`, `Is_Admited`, `School_Id`, `Session`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Stream`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`) VALUES
(2020000047, 2020000047, 'No', 1, '2020-2021', 'Ritesh', 'Nikesh', 'Agrawal', 2, '', 'MALE', '2015-01-11', 6, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '986545612533', 'AdmissionDocuments/2020000047_AdmissionDocs/9b75c2b9e9f86c2f1e9b016b19c99e81.jpg', 'mscv school', 'English', 'CBSE', 2, 'darda nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '8625993100', 'darda nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '8625993100', '', 0, '', '', '', 0, '', '', 'Nikesh agrawal', 'Graduate', 'Private Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'na00712@gmail.com', '8625993100', '10 lakh', '679864512644', 'No', 'AdmissionDocuments/2020000047_AdmissionDocs/c527e943159217b120b4990bd350b0f9.jpg', 'Sonali agrrawal', 'Graduate', '', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'sa112@gmail.com', '8625993100', '7 lakh', '986544074886', '0', 'AdmissionDocuments/2020000047_AdmissionDocs/2f3b3d4993d0fb781153f51856d43803.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993100', '8625993100', 'na00712@gmail.com'),
(2020000048, 2020000048, 'No', 1, '2020-2021', 'Rajan', 'Kumari', 'Thakur', 10, '', 'MALE', '2001-08-29', 19, 'GENERAL', 2, 2, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', 'A-Positive', '336554163416', NULL, 'Denobili', 'English', 'ICSE', 9, 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '3333366665', 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '3333366665', '', 0, '', '', '', 0, '', '', 'Anup Thakur', 'PHD', 'Other', 'Professor', 'SSLNT', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '3333366665', '40000', '349613063106', 'No', NULL, 'Ranju Devi', 'Graduate', 'Other', 'House Wife', '', 'Bokaro Chas', 'Bokaro', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '3333366665', '', '336666959595', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3333366665', '3333366665', 'rajan@gmail.com'),
(2020000049, 2020000049, 'No', 1, '2020-2021', 'Sweta', 'Kumari', 'Thakur', 10, '', 'FEMALE', '2001-07-03', 19, 'GENERAL', 2, 2, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', 'B-Negative', '121584125152', NULL, 'Denobili', 'English', 'ICSE', 9, 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '3333366665', 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '3333366665', '', 0, '', '', '', 0, '', '', 'Anup Thakur', 'PHD', 'Other', 'Professor', 'SSLNT', '', 'Dhanbad', 'Jharkhand', 'India', '826002', 'sweta@gmail.com', '3333366665', '40000', '349613063106', 'No', NULL, 'Ranju Devi', 'Graduate', 'Other', 'House Wife', '', 'Bokaro Chas', 'Bokaro', 'Jharkhand', 'India', '826001', 'sweta@gmail.com', '3333366665', '', '336666959595', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3333366665', '3333366665', 'sweta@gmail.com'),
(2020000050, 2020000050, 'No', 1, '2020-2021', 'Anu', 'Kumar', 'Kumari', 11, '', 'FEMALE', '2001-04-25', 19, 'ST', 0, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'AB-Negative', '259641941396', NULL, 'Ideal English Academy', 'Hindi', '', 10, 'Hirapur Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '3232323231', 'Hirapur Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '3232323231', '', 0, '', '', '', 0, '', '', 'Sonu Kumar', 'Non-Matric', 'Other', 'Pliumber', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'assasas@gmail.com', '3232323231', '96000', '219864196541', 'No', NULL, 'Soni Kumari', 'Non-Matric', 'Other', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'assasas@gmail.com', '3232323231', '360000', '336496416310', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3232323231', '3232323231', 'assasas@gmail.com'),
(2020000051, 2020000051, 'No', 1, '2020-2021', 'Pritesh', 'Soham', 'Tripathi', 2, '', 'MALE', '2015-02-11', 6, 'GENERAL', 2, 2, '2020-2021', 'Gujrati', 'Jain', 'INDIAN', '', '956545612533', 'AdmissionDocuments/2020000051_AdmissionDocs/1aefbdcce59f1af2f973ba3b3a97ab06.jpg', 'mscv school', 'English', 'CBSE', 2, 'Sudharshan nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '8625993101', 'darda nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '8625993101', '', 0, '', '', '', 0, '', '', 'Soham Tripathi', 'Graduate', 'Doctor', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'st00712@gmail.com', '8625993101', '30 lakh', '779864512644', 'Yes', 'AdmissionDocuments/2020000051_AdmissionDocs/49fdd17a53672843a31b6c9d99828c92.jpg', 'Sakshi Tripathi', 'Graduate', '', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'st112@gmail.com', '8625993101', '7 lakh', '986544074886', '0', 'AdmissionDocuments/2020000051_AdmissionDocs/eacbbbf502ea834082831f7d6eb3f15d.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993101', '8625993101', 'st00712@gmail.com'),
(2020000052, 2020000052, 'No', 1, '2020-2021', 'Moni', 'Kumar', 'Kumari', 11, '', 'FEMALE', '2001-03-16', 19, 'SC', 0, 1, '2020-2021', 'Punjabi', 'Hindu', 'INDIAN', 'A-Negative', '121321321321', NULL, 'Mont Bretia', 'Hindi', '', 10, 'Bokaro Steel City', 'India', 'Jharkhand', 'Dhanbad', '826001', '1141414522', 'Bokaro Steel City', 'India', 'Jharkhand', 'Dhanbad', '826001', '1141414522', '', 0, '', '', '', 0, '', '', 'Monu Kumar', 'Intermediate', 'Armed Forces', 'Leutenant', 'CISF', 'DELHI', 'DELHI', 'Jharkhand', 'India', '826006', 'moni@gmail.com', '1141414522', '196000', '967419865431', 'No', NULL, 'Soni Kumari', 'Graduate', 'Other', 'Teacher', 'BSF', 'Bokaro Steel City', 'Bokaro Steel City', 'Jharkhand', 'India', '826001', 'moni@gmail.com', '1141414522', '360000', '608326410653', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1141414522', '1141414522', 'moni@gmail.com'),
(2020000053, 2020000053, 'No', 1, '2020-2021', 'Rohit', 'Ranjan', 'Rana', 2, '', 'MALE', '2015-08-11', 6, 'GENERAL', 1, 2, '2020-2021', 'Tamil', 'Hindu', 'INDIAN', '', '956545612523', 'AdmissionDocuments/2020000053_AdmissionDocs/b4bb5425a57a56f0d9b6e6dfdba4cbbf.jpg', 'mscv school', 'English', 'CBSE', 2, 'raja mohan nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '8625993201', 'raja mohan nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '8625993201', '', 0, '', '', '', 0, '', '', 'Ranjan Rana', 'Graduate', 'Doctor', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'rr00712@gmail.com', '8625993201', '30 lakh', '779864512624', 'Yes', 'AdmissionDocuments/2020000053_AdmissionDocs/61f408b1a429c31965ea4aa444dbe97e.jpg', 'Ronita Rana', 'Graduate', '', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rr112@gmail.com', '8625993101', '7 lakh', '986544074886', '0', 'AdmissionDocuments/2020000053_AdmissionDocs/12de332cf697719a962ef37c78eb2d73.jpg', 'Other', ' ', '', 'Self', '', NULL, '8625993201', '8625993201', 'rr00712@gmail.com'),
(2020000054, 2020000054, 'No', 1, '2020-2021', 'Sajan ', 'Kumar', 'Gurung', 11, '', 'MALE', '2001-10-19', 19, 'ST', 3, 4, '2020-2021', 'Hindi', 'Buddhist', 'OTHERS', 'B-Negative', '333338888888', NULL, 'Academy', 'Hindi', '', 10, ' Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1112212122', ' Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1112212122', '', 0, '', '', '', 0, '', '', 'Sanoj Gurung', '', 'Other', 'Guard', 'School', 'Dhanbad', 'Dhanbad', 'Delhi', 'India', '321001', 'sajan@gmail.com', '1112212122', '120000', '653241926530', 'No', NULL, 'Renu Kumari', 'Matriculation', 'Engineer', 'House Wife', 'dsfsfs', 'Bokaro Chas', 'Bokaro', 'Bihar', 'India', '3251151', 'sajan@gmail.com', '1112212122', '313132', '632574106532', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1112212122', '1112212122', 'sajan@gmail.com'),
(2020000055, 2020000055, 'No', 1, '2020-2021', 'Mangesh', 'Jagmohan', 'Dikshit', 2, '', 'MALE', '2015-08-10', 5, 'ST', 2, 2, '2020-2021', 'Kannada', 'Hindu', 'INDIAN', 'B-Positive', '956548612523', 'AdmissionDocuments/2020000055_AdmissionDocs/d283baa1336d2f072ee75acd05aae36a.jpg', 'RSGK holy school', 'English', 'CBSE', 2, 'station road nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '9625993201', 'station road nager,bokaro chas', 'India', 'jharkhand', 'Bokaro', '815306', '9625993201', '', 0, '', '', '', 0, '', '', 'Jagmohan Dikshit', 'Graduate', 'Doctor', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'jd00712@gmail.com', '8625993201', '30 lakh', '779864512624', 'Yes', 'AdmissionDocuments/2020000055_AdmissionDocs/e7359be65fca193a9402209485ffe5fb.jpg', 'Ronita Rana', 'Graduate', 'Engineer', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rr112@gmail.com', '9625993101', '12 lakh', '986544074886', '0', 'AdmissionDocuments/2020000055_AdmissionDocs/73ed25b4bb850144981e828de077620a.jpg', 'Other', ' ', '', 'Self', '', NULL, '9625993101', '9625993101', 'jd00712@gmail.com'),
(2020000056, 2020000056, 'No', 1, '2020-2021', 'Suresh', 'Mohan', 'Yadav', 2, '', 'MALE', '2015-08-10', 5, 'ST', 2, 3, '2020-2021', 'Kannada', 'Hindu', 'INDIAN', 'B-Positive', '856548612523', 'AdmissionDocuments/2020000056_AdmissionDocs/abd0a417f02e3c8302fb085b9a91b798.jpg', 'RSGK holy school', 'Bengali', '', 2, 'Majid road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9925993201', 'Majid road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9925993201', '', 0, '', '', '', 0, '', '', 'Mohan Yadav', 'Graduate', 'Private Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'my00712@gmail.com', '9925993201', '15 lakh', '779864512624', 'Yes', 'AdmissionDocuments/2020000056_AdmissionDocs/ab7353aa31086bb9be33c12059e23ee0.jpg', 'Suleksha Yadav', 'Graduate', 'Engineer', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'sy112@gmail.com', '9925993201', '12 lakh', '986544074886', '0', 'AdmissionDocuments/2020000056_AdmissionDocs/badbf8f8d9d0c41ff1e2206c0f99d189.jpg', 'Other', ' ', '', 'Self', '', NULL, '9925993201', '9925993201', 'my00712@gmail.com'),
(2020000057, 2020000057, 'No', 1, '2020-2021', 'Salil', 'Kumari', 'Solanki', 11, '', 'MALE', '2001-05-09', 19, 'GENERAL', 0, 3, '2020-2021', 'Hindi', 'Jain', 'INDIAN', '', '356237416252', NULL, 'Mont Bretia', 'Hindi', 'ICSE', 10, ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '815456', '1252521429', ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '815456', '1252521429', '', 0, '', '', '', 0, '', '', 'Suraj Solanki', 'Non-Matric', 'Private Sec. Employee', 'Driver', '', '', 'Bokaro', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1252521429', '120000', '251746234106', 'No', NULL, 'Sonu Devi', 'Matriculation', 'Other', 'House Wife', 'sdgsdgs', 'Bokaro ', 'Bokaro', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1252521429', '321000', '502714265243', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1252521429', '1252521429', 'salil@gmail.com'),
(2020000058, 2020000058, 'No', 1, '2020-2021', 'Sunil', 'Jitendra', 'Dravid', 4, '', 'MALE', '2014-08-10', 6, 'GENERAL', 1, 3, '2020-2021', 'English', 'Christian', 'INDIAN', 'B-Positive', '856548602523', 'AdmissionDocuments/2020000058_AdmissionDocs/0d64354451bc935d15bf4d839842fb25.jpg', 'RSGK holy school', 'English', 'CBSE', 4, 'Durga road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9928993201', 'Majid road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9928993201', '', 0, '', '', '', 0, '', '', 'Jitendra Dravid', 'Graduate', 'Private Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'jd01712@gmail.com', '9928993201', '15 lakh', '779864502624', 'Yes', 'AdmissionDocuments/2020000058_AdmissionDocs/f0985b53583556e74fb98f94ecadd4cd.jpg', 'Suleksha Dravid', 'Graduate', 'Engineer', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'sd112@gmail.com', '9928993201', '12 lakh', '986544074986', '0', 'AdmissionDocuments/2020000058_AdmissionDocs/9eb26fb06fb469dc272def1f1353e54a.jpg', 'Other', ' ', '', 'Self', '', NULL, '9928993201', '9928993201', 'jd01712@gmail.com'),
(2020000059, 2020000059, 'No', 1, '2020-2021', 'VIshkha', 'Kumari', 'Solanki', 11, '', 'FEMALE', '2001-05-10', 19, 'GENERAL', 0, 3, '2020-2021', 'Hindi', 'Jain', 'INDIAN', '', '639274641063', NULL, 'Mont Bretia', 'Hindi', 'ICSE', 10, ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '815456', '1252521429', ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '815456', '1252521429', '', 0, '', '', '', 0, '', '', 'Suraj Solanki', 'Non-Matric', 'Private Sec. Employee', 'Driver', '', '', 'Bokaro', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1252521429', '120000', '251746234106', 'No', NULL, 'Sonu Devi', 'Matriculation', 'Other', 'House Wife', 'sdgsdgs', 'Bokaro ', 'Bokaro', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1252521429', '321000', '502714265243', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1252521429', '1252521429', 'salil@gmail.com'),
(2020000060, 2020000060, 'No', 1, '2020-2021', 'VIshkha', 'Kumari', 'Solanki', 11, '', 'FEMALE', '2001-05-10', 19, 'GENERAL', 0, 3, '2020-2021', 'Hindi', 'Jain', 'INDIAN', '', '639274641063', NULL, 'Mont Bretia', 'Hindi', 'ICSE', 10, ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '815456', '1252521429', ' Bokaro Sec1', 'India', 'Jharkhand', 'Bokaro', '815456', '1252521429', '2020000057', 10, 'A', '', '', 0, '', '', 'Suraj Solanki', 'Non-Matric', 'Private Sec. Employee', 'Driver', '', '', 'Bokaro', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1252521429', '120000', '251274160531', 'No', NULL, 'Sonu Devi', 'Matriculation', 'Other', 'House Wife', 'sdgsdgs', 'Bokaro ', 'Bokaro', 'Jharkhand', 'India', '826001', 'Vishkha@gmail.com', '1252521429', '321000', '502714265243', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1252521429', '1252521429', 'Vishkha@gmail.com'),
(2020000061, 2020000061, 'No', 1, '2020-2021', 'Mahesh', 'Rahul', 'Solanke', 4, '', 'MALE', '2014-08-15', 6, 'ST', 2, 3, '2020-2021', 'English', 'Hindu', 'INDIAN', 'B-Positive', '853548602523', 'AdmissionDocuments/2020000061_AdmissionDocs/ffbacfe7b5daf94f94e5e37bfd8c1373.jpg', 'RSGK holy school', 'English', 'CBSE', 4, 'hutti bazar road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9928903201', 'hutti bazar road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9928903201', '', 0, '', '', '', 0, '', '', 'Rahul Solanke', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'rs101712@gmail.com', '9928903201', '15 lakh', '779864502629', 'Yes', 'AdmissionDocuments/2020000061_AdmissionDocs/0f3a2484b11088757557ca7aa3bd1ec0.jpg', 'Rakhi Solanke', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs03112@gmail.com', '9928993201', '8 lakh', '986544074966', '0', 'AdmissionDocuments/2020000061_AdmissionDocs/35a286d566f4c0c060a60ce000a57a3c.jpg', 'Other', ' ', '', 'Self', '', NULL, '9928903201', '9928903201', 'rs101712@gmail.com'),
(2020000062, 2020000062, 'No', 1, '2020-2021', 'Raju', 'Kumar', 'Gorai', 11, '', 'MALE', '2003-05-07', 17, 'SC', 2, 4, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'B-Positive', '682574216503', NULL, 'Denobili', '', 'ICSE', 10, ' Hirapur Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '2121212365', ' Hirapur Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '2121212365', '', 0, '', '', '', 0, '', '', 'Anoop Gorai', 'PHD', 'Engineer', 'Engineer', 'Tesla', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826002', 'rraju@gmail.com', '2121212365', '321000', '257146503.16', 'No', NULL, 'AKira Gorai', 'Non-Matric', 'Other', 'House Wife', 'sdgsdgs', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'rraju@gmail.com', '2121212365', '321000', '352746530432', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '2121212365', '2121212365', 'rraju@gmail.com'),
(2020000063, 2020000063, 'No', 1, '2020-2021', 'Chandan', 'Ramesh', 'Sharma', 4, '', 'MALE', '2014-12-15', 6, 'ST', 2, 3, '2020-2021', 'English', 'Hindu', 'INDIAN', 'B-Positive', '853548601523', 'AdmissionDocuments/2020000063_AdmissionDocs/3f62ae77cf9e46d230eaab8c43c0f61d.jpg', 'RSGK holy school', 'English', 'CBSE', 4, 'dhanbad road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9928103201', 'dhanbad road nager,bokaro sec1', 'India', 'jharkhand', 'Bokaro', '815306', '9928103201', '', 0, '', '', '', 0, '', '', 'Ramesh sharma', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'rs1101712@gmail.com', '9928103201', '15 lakh', '779864552629', 'Yes', 'AdmissionDocuments/2020000063_AdmissionDocs/ad0ce329d3f8e038ca0ce96b193478a8.jpg', 'Shital Sharma', 'Graduate', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'ss03112@gmail.com', '9928103201', '8 lakh', '986544054966', '0', 'AdmissionDocuments/2020000063_AdmissionDocs/1acd46f97ae0eb8dcaa7470ce68868a3.jpg', 'Other', ' ', '', 'Self', '', NULL, '9928903201', '9928903201', 'rs1101712@gmail.com'),
(2020000064, 2020000064, 'No', 1, '2020-2021', 'Rehan', 'Kumar', 'Singh', 11, '', 'MALE', '2003-09-07', 17, 'ST', 2, 4, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'B-Positive', '682574416503', NULL, 'Denobili', '', 'ICSE', 10, ' Ajanta Para Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '2121278465', ' Ajanta Para Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '2121278465', '', 0, '', '', '', 0, '', '', 'Rahul Gorai', 'PHD', 'Engineer', 'Engineer', 'Tesla', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826002', 'rra565ju@gmail.com', '2121278465', '321000', '257145465416', 'No', NULL, 'AKira Gorai', 'Non-Matric', 'Other', 'House Wife', 'sdgsdgs', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'rraju@gmail.com', '2121278465', '321000', '352746530432', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '2121278465', '2121278465', 'rraj34263u@gmail.com'),
(2020000065, 2020000065, 'No', 1, '2020-2021', 'Ajju', 'Bhai', 'Bhai', 12, '', 'MALE', '2003-03-13', 17, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'A-Positive', '354165321023', NULL, 'Ideal English Academy', 'Hindi', 'ICSE', 11, ' Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1292521429', ' Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1292521429', '', 0, '', '', '', 0, '', '', 'Raju Sharma', '', '', '', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1292521429', '', '51416035.163', 'No', NULL, '', '', '', '', '', 'Barmasia Dhnbad', '', '', '', '', '', '1292521429', '', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1292521429', '1292521429', ''),
(2020000066, 2020000066, 'No', 1, '2020-2021', 'Ajju', 'Bhai', 'Bhai', 12, '', 'MALE', '2003-03-13', 17, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'A-Positive', '354165321023', NULL, 'Ideal English Academy', 'Hindi', 'ICSE', 11, ' Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1292521429', ' Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1292521429', '', 0, '', '', '', 0, '', '', 'Raju Sharma', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1292521429', '80000', '514160357163', 'No', NULL, 'Ranju Devi', 'Matriculation', 'Doctor', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '1292521429', '321000', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1292521429', '1292521429', 'bfdbhdf@gmail.com'),
(2020000067, 2020000067, 'No', 1, '2020-2021', 'Gaju', '', 'Ram', 12, '', 'MALE', '2003-07-13', 17, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Jain', 'INDIAN', 'A-Positive', '235063542106', NULL, 'Ideal English Academy', 'Hindi', 'ICSE', 11, 'Bokaro', 'India', 'Jharkhand', 'Dhanbad', '8260777', '3652464166', 'Bokaro', 'India', 'Jharkhand', 'Dhanbad', '8260777', '3652464166', '', 0, '', '', '', 0, '', '', 'Sam Kumar', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'Jharkhand', 'India', '8260778878', 'sam@gmail.com', '3652464166', '80007', '514160787163', 'No', NULL, 'Anish Devi', 'Matriculation', 'Doctor', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'suresh@gmail.com', '3652464166', '321000', '658241634103', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3652464166', '3652464166', 'bfdbhdf@gmail.com'),
(2020000068, 2020000068, 'No', 1, '2020-2021', 'Gaju', '', 'Ram', 12, '', 'MALE', '2003-07-13', 17, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Jain', 'INDIAN', 'A-Positive', '235063542106', NULL, 'Ideal English Academy', 'Hindi', 'ICSE', 11, 'Bokaro', 'India', 'Jharkhand', 'Dhanbad', '8260777', '3652464166', 'Bokaro', 'India', 'Jharkhand', 'Dhanbad', '8260777', '3652464166', '', 0, '', '', '', 0, '', '', 'Sam Kumar', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'Jharkhand', 'India', '8260778878', 'sam@gmail.com', '3652464166', '80007', '514160787163', 'No', NULL, 'Anish Devi', 'Post Graduate', '', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sam@gmail.com', '3652464166', '321000', '658241634103', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3652464166', '3652464166', 'sam@gmail.com'),
(2020000069, 2020000069, 'No', 1, '2020-2021', 'Umer', 'Afjal', 'khan', 4, '', 'MALE', '2015-01-06', 6, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Muslim', 'INDIAN', 'A-Positive', '987653987535', NULL, 'honey holly school', 'English', 'CBSE', 4, '1234\\r\\nCarmel school,bokaro', 'india', 'JHARKHAND', 'bokaro', '815306', '8725993211', '1234\\r\\nCarmel school,bokaro', 'india', 'JHARKHAND', 'bokaro', '815306', '8725993211', '', 0, '', '', '', 0, '', '', 'Afjal khan', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'JHARKHAND', 'india', '815306', 'Ak00812@gmail.com', '8725993211', '10 lakh', '976407656999', 'No', NULL, 'Aliya khan', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'Jharkhand', '', '815306', 'Ak0912@gmail.com', '8725993211', '10 lakh', '976408753145', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '8725993211', '8725993211', 'Ak0912@gmail.com'),
(2020000070, 2020000070, 'No', 1, '2020-2021', 'Hritik', 'Raj', 'singh', 4, '', 'MALE', '2015-01-09', 6, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '965112487568', 'AdmissionDocuments/2020000070_AdmissionDocs/6c0df13720ed8bf31e0e526814b5d50f.jpg', 'yps holy school', 'Hindi', '', 4, 'Vishal nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8025993215', 'Vishal nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8025993215', '', 0, '', '', '', 0, '', '', 'Raj singh', 'Graduate', 'Business', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'rss112@gmail.com', '8025993215', '10 lakh', '598457412565', 'No', 'AdmissionDocuments/2020000070_AdmissionDocs/ed631bf472602c6a0c5725966f96f241.jpg', 'Nisha singh', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'Ns112@gmail.com', '8025993215', '7 lakh', '568745892236', '0', 'AdmissionDocuments/2020000070_AdmissionDocs/10aabc34f105829391ec2452b5c63205.jpg', 'Other', ' ', '', 'Self', '', NULL, '8025993215', '8025993215', 'rss112@gmail.com'),
(2020000071, 2020000071, 'No', 1, '2020-2021', 'Pratik', 'Mohan', 'Rathod', 4, '', 'MALE', '2015-03-09', 5, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '965312487568', 'AdmissionDocuments/2020000071_AdmissionDocs/38a6e94b20501f3151ff081a3251926f.jpg', 'yps holy school', 'Hindi', '', 4, 'sweet nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8025993295', 'sweet nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '8025993295', '', 0, '', '', '', 0, '', '', 'Mohan Rathore', 'Post Graduate', 'Public/PSU Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'Mr112@gmail.com', '8025993295', '10 lakh', '598457412565', 'No', 'AdmissionDocuments/2020000071_AdmissionDocs/1d82f4bb008fbd07f6c8597bf08ef0b7.jpg', 'Mina Rathod', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'ms112@gmail.com', '8025993295', '7 lakh', '569745892236', '0', 'AdmissionDocuments/2020000071_AdmissionDocs/1f67cfca0771ac8bb505cdccf3a1fd80.jpg', 'Other', ' ', '', 'Self', '', NULL, '8025993295', '8025993295', 'Mr112@gmail.com'),
(2020000072, 2020000072, 'No', 1, '2020-2021', 'Pratap', 'Rohan', 'Sharma', 5, '', 'MALE', '2015-11-09', 5, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '965312487568', 'AdmissionDocuments/2020000072_AdmissionDocs/43df257ed5376da538f890d506cda9f1.jpg', 'yps holy school', 'Hindi', '', 5, 'ali nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '9025993295', 'ali nager,bokaro steel', 'India', 'jharkhand', 'bokaro', '815306', '9025993295', '', 0, '', '', '', 0, '', '', 'Rohan Sharma', 'Post Graduate', 'Public/PSU Sec. Employee', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'rsr112@gmail.com', '9025993295', '10 lakh', '598457412564', 'No', 'AdmissionDocuments/2020000072_AdmissionDocs/b9a7f7c2bf3337a6795ea8e4e757ca6d.jpg', 'Lovly sharma', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'ls112@gmail.com', '9025993295', '7 lakh', '565745892236', '0', 'AdmissionDocuments/2020000072_AdmissionDocs/8f603f26bd474bc4e0c0daddc6e6b046.jpg', 'Other', ' ', '', 'Self', '', NULL, '9025993295', '9025993295', 'rsr112@gmail.com'),
(2020000073, 2020000073, 'No', 1, '2020-2021', 'Sonali', 'Kumari', 'Dubey', 12, '', 'FEMALE', '1998-01-13', 23, 'GENERAL', 0, 0, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'AB-Negative', '652643196341', 'AdmissionDocuments/2020000073_AdmissionDocs/b872b2ead377e753295e07f8b31418f8.jpg', 'Denobili', 'Hindi', 'ICSE', 11, ' Loco Tank Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6565614521', ' Loco Tank Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6565614521', '', 0, '', '', '', 0, '', '', 'Vikram Choubey', 'Graduate', 'Doctor', 'Doctor', 'Tata', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sonali@gmail.com', '6565614521', '321000', '352174965043', 'No', 'AdmissionDocuments/2020000073_AdmissionDocs/d14d364faa3cc07388b09fe45d567713.jpeg', 'Mata Rani', 'Non-Matric', 'Business', 'House Wife', '', 'Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sonali@gmail.com', '6565614521', '321000', '325714063163', '0', 'AdmissionDocuments/2020000073_AdmissionDocs/daa1ab07216ed4efcd23e4cf54f2cf66.jpeg', 'Other', ' ', '', 'Self', '', NULL, '6565614521', '6565614521', 'sonali@gmail.com'),
(2020000074, 2020000074, 'No', 1, '2020-2021', 'Monali', 'Kumari', 'Dubey', 12, '', 'FEMALE', '1996-01-13', 25, 'GENERAL', 0, 0, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '122643196341', 'AdmissionDocuments/2020000074_AdmissionDocs/7321d4ac86e0b3df5dd7ca9bcb7d52be.jpg', 'Denobili', 'Hindi', 'ICSE', 11, ' Loco Tank Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6565614521', ' Loco Tank Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6565614521', '2020000073', 12, '', '', '', 0, '', '', 'Vikram Choubey', 'Graduate', 'Doctor', 'Doctor', 'Tata', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'Monali@gmail.com', '6565614521', '321000', '352174965043', 'No', 'AdmissionDocuments/2020000074_AdmissionDocs/0584fccaafae1efd4f897680bbc1829e.jpeg', 'Mata Rani', 'Non-Matric', 'Business', 'House Wife', '', 'Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'Monali@gmail.com', '6565614521', '321000', '325714063163', '0', 'AdmissionDocuments/2020000074_AdmissionDocs/3c71163cd5c5512f55641eea80fc345b.jpeg', 'Other', ' ', '', 'Self', '', NULL, '6565614521', '6565614521', 'Monali@gmail.com'),
(2020000075, 2020000075, 'No', 1, '2020-2021', 'Gopi', 'vishal', 'Rajak', 5, '', 'MALE', '2015-02-01', 5, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '976437885467', NULL, 'honey holly school', 'Hindi', '', 5, ' beda nager,dhanbad', 'India', 'JHARKHAND', 'Dhanbad', '815306', '9923940327', ' beda nager,dhanbad', 'India', 'JHARKHAND', 'Dhanbad', '815306', '9923940327', '', 0, '', '', '', 0, '', '', 'Vishal Rajak', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'vr00812@gmail.com', '9923940327', '10 lakh', '897087597764', 'No', NULL, 'Shweta Rajak', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'Ap912@gmail.com', '9923940327', '10 lakh', '978697508543', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9923940327', '9923940327', 'vr00812@gmail.com'),
(2020000076, 2020000076, 'No', 1, '2020-2021', 'Md', 'Suleman', 'Ansari', 12, '', 'MALE', '1998-01-21', 22, 'ST', 2, 3, '2020-2021', 'Hindi', 'Muslim', 'INDIAN', 'O-Positive', '254310631634', NULL, 'Ideal English Academy', 'Hindi', 'CBSE', 12, 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '5456463161', 'Bokaro Chas', 'India', 'Jharkhand', 'Bokaro', '826002', '5456463161', '', 0, '', '', '', 0, '', '', 'Md Irshad Ansari', 'Post Graduate', 'Private Sec. Employee', 'Driver', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'irshad111@gmail.com', '5456463161', '90000', '362563416053', 'No', NULL, 'Fatma BIBI', 'Graduate', '', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'irshad111@gmail.com', '5456463161', '321000', '31657246.534', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '5456463161', '5456463161', 'irshad111@gmail.com'),
(2020000077, 2020000077, 'No', 1, '2020-2021', 'Kamlesh', 'Sushil', 'shukla', 5, '', 'MALE', '2015-12-01', 5, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '976437885468', NULL, 'honey holly school', 'Hindi', '', 5, ' christian nager,dhanbad', 'India', 'JHARKHAND', 'Dhanbad', '815306', '9923940328', ' christian nager,dhanbad', 'India', 'JHARKHAND', 'Dhanbad', '815306', '9923940328', '', 0, '', '', '', 0, '', '', 'Sushil Shukla', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'ss00812@gmail.com', '9923940328', '10 lakh', '897087597769', 'No', NULL, 'Ronita shukla', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'rs912@gmail.com', '9923940328', '10 lakh', '978697508549', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9923940328', '9923940328', 'vr00812@gmail.com'),
(2020000078, 2020000078, 'No', 1, '2020-2021', 'Md', 'Razak', 'Ansari', 13, '', 'MALE', '1992-01-21', 28, 'SC', 2, 4, '2020-2021', 'Punjabi', 'Muslim', 'INDIAN', 'A-Negative', '523741064301', NULL, 'Ideal English Academy', 'Hindi', 'CBSE', 12, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826009', '3256463161', 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826009', '3256463161', '', 0, '', '', '', 0, '', '', 'Md Abdul Ansari', 'Matriculation', 'Armed Forces', 'Army', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'razak39749@gmail.com', '3256463161', '900003', '325412179643', 'No', NULL, 'Roshan BIBI', 'Non-Matric', 'Other', 'House Wife', '', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'razak39749@gmail.com', '3256463161', '123123', '628549649641', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3256463161', '3256463161', 'razak39749@gmail.com'),
(2020000079, 2020000079, 'No', 1, '2020-2021', 'Sri', 'SOnu', 'Sood', 13, '', 'MALE', '1996-01-21', 24, 'GENERAL', 1, 4, '2020-2021', 'Punjabi', 'Hindu', 'INDIAN', 'AB-Negative', '257249603416', NULL, 'Mont Bretia', 'English', '', 12, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826009', '0156463161', 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826009', '0156463161', '', 0, '', '', '', 0, '', '', 'Srikant Manik', 'Post Graduate', 'Doctor', 'Doctor', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sonu39749@gmail.com', '0156463161', '123546', '111412179643', 'No', NULL, 'Roshani Kumari', 'PHD', 'Engineer', 'House Wife', '', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sonu39749@gmail.com', '0156463161', '123123', '958549649641', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '0156463161', '0156463161', 'sonu39749@gmail.com'),
(2020000080, 2020000080, 'No', 1, '2020-2021', 'Raveena', 'Kumari', 'Tondon', 13, '', 'FEMALE', '1999-01-21', 21, 'SC', 3, 1, '2020-2021', 'Kannada', 'Jain', 'INDIAN', '', '321549603416', NULL, 'Mont Bretia', 'English', '', 12, 'Bokaro Steel City', 'India', 'Jharkhand', 'Bokaro', '826009', '9856463161', 'Bokaro Steel City', 'India', 'Jharkhand', 'Bokaro', '826009', '9856463161', '', 0, '', '', '', 0, '', '', 'Anil Kumar', 'Non-Matric', 'Business', 'Business', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'rt39749@gmail.com', '9856463161', '123546', '652412179643', 'No', NULL, 'Sulekha Tondon', 'Graduate', '', 'House Wife', '', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'rt39749@gmail.com', '9856463161', '300000', '958549649641', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9856463161', '9856463161', 'rt39749@gmail.com'),
(2020000081, 2020000081, 'No', 1, '2020-2021', 'Puja', 'Kumari', 'Singh', 13, '', 'FEMALE', '1997-01-21', 23, 'ST', 1, 4, '2020-2021', 'Punjabi', 'Hindu', 'INDIAN', '', '332946106826', NULL, 'Ideal English Academy', 'English', 'ICSE', 12, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826030', '4736463161', 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826030', '4736463161', '', 0, '', '', '', 0, '', '', 'Suresh Kumar', 'Graduate', 'Public/PSU Sec. Employee', 'Business', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sda2749@gmail.com', '4736463161', '123546', '628674016431', 'No', NULL, 'Rani Singh', 'Non-Matric', 'Doctor', 'House Wife', '', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826003', 'sda2749@gmail.com', '4736463161', '300000', '321459649641', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '4736463161', '4736463161', 'sda2749@gmail.com'),
(2020000082, 2020000082, 'No', 1, '2020-2021', 'Rajesh', 'Kumari', 'Rawani', 13, '', 'MALE', '1998-01-23', 22, 'SC', 2, 3, '2020-2021', 'Tamil', 'Hindu', 'INDIAN', 'B-Negative', '241096134163', NULL, 'Denobili', 'Hindi', 'ICSE', 12, ' Barmasia Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '6541264165', ' Barmasia Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '6541264165', '', 0, '', '', '', 0, '', '', 'Anik Rawani', 'Matriculation', 'Business', 'Plumber', '', '', 'Dhanbad', 'Jharkhand', 'India', '826063', 'r12r12@gmail.com', '6541264165', '40000', '642162416464', 'No', NULL, 'Renu Rawani', 'Post Graduate', 'Engineer', 'House Wife', '', 'Bokaro Chas', 'Bokaro', 'Jharkhand', 'India', '826001', 'r12r12@gmail.com', '6541264165', '321000', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6541264165', '6541264165', 'r12r12@gmail.com'),
(2020000083, 2020000083, 'No', 1, '2020-2021', 'Pankaj', '', 'Rawani', 13, '', 'MALE', '1997-01-23', 23, 'SC', 2, 3, '2020-2021', 'Tamil', 'Hindu', 'INDIAN', '', '342966134163', NULL, 'Denobili', 'Hindi', 'ICSE', 12, ' Barmasia Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '6541264165', ' Barmasia Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '6541264165', '', 0, '', '', '', 0, '', '', 'Anik Rawani', 'Matriculation', 'Business', 'Plumber', '', '', 'Dhanbad', 'Jharkhand', 'India', '826063', 'pj12r12@gmail.com', '6541264165', '40000', '642162416464', 'No', NULL, 'Renu Rawani', 'Post Graduate', 'Engineer', 'House Wife', '', 'Bokaro Chas', 'Bokaro', 'Jharkhand', 'India', '826001', 'pj12r12@gmail.com', '6541264165', '321000', '518250623106', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6541264165', '6541264165', 'pj12r12@gmail.com'),
(2020000084, 2020000084, 'No', 1, '2020-2021', 'Moti', '', 'Babu', 14, 'COMMERCE', 'MALE', '1999-02-09', 21, 'ST', 2, 2, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', 'A-Positive', '527926419641', NULL, 'Mont Bretia', 'Hindi', 'CBSE', 13, ' ', '', '', '', '', '', 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '3261263', '2041061655', '', 0, '', '', '', 0, '', '', 'Ram Babu ', 'Matriculation', 'Doctor', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'moti@gmail.com', '2041061655', '', '365274906416', 'No', NULL, 'Sulekha Devi', 'Matriculation', 'Engineer', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'moti@gmail.com', '2041061655', '', '362419641632', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '2041061655', '2041061655', 'moti@gmail.com'),
(2020000085, 2020000085, 'No', 1, '2020-2021', 'Akhilesh', 'Kumar', 'Yadav', 14, 'GENERAL', 'MALE', '1992-02-26', 28, 'ST', 2, 2, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'B-Negative', '356926419641', NULL, 'Mont Bretia', 'Hindi', 'CBSE', 13, 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '1216061655', 'Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '3261263', '1216061655', '', 0, '', '', '', 0, '', '', 'Ram Babu ', 'Matriculation', 'Doctor', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'moti@gmail.com', '1216061655', '', '365274906416', 'No', NULL, 'Sulekha Devi', 'Matriculation', 'Engineer', '', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'moti@gmail.com', '1216061655', '', '362419641632', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1216061655', '1216061655', 'moti@gmail.com'),
(2020000086, 2020000086, 'No', 1, '2020-2021', 'Vikku', 'Kumari', 'Lala', 14, 'ARTS', 'MALE', '2000-05-17', 20, 'ST', 2, 2, '2020-2021', 'Marathi', 'Jain', 'OTHERS', 'B-Positive', '254316034163', NULL, '', 'Hindi', '', 0, ' Barmasia Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '5465141653', ' Barmasia Bokaro', 'India', 'Jharkhand', 'Dhanbad', '3261263', '5465141653', '', 0, '', '', '', 0, '', '', 'Sanjay Kaka', 'Non-Matric', 'Business', 'Doctor', 'Ma tata Hardware', 'Barmasia Dhnbad', 'Bokaro', 'Jharkhand', 'India', '8514623', 'vikky@gmail.com', '5465141653', '321000', '325430961406', 'No', NULL, 'Leela Devi', 'Non-Matric', 'Engineer', 'House Wife', '', 'Bokaro Chas', 'Dhanbad', 'Jharkhand', 'India', '826001', 'vikky@gmail.com', '5465141653', '120000', '266741726416', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '5465141653', '5465141653', 'vikky@gmail.com'),
(2020000087, 2020000087, 'No', 1, '2020-2021', 'Sanoj', 'Kumari', 'Lala', 14, 'SCIENCE', 'MALE', '2005-05-17', 15, 'SC', 1, 4, '2020-2021', 'Marathi', 'Jain', 'OTHERS', 'B-Positive', '313136034163', NULL, 'Denobili', 'Hindi', 'ICSE', 13, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826002', '1212561212', ' Barmasia Bokaro', 'India', 'Jharkhand', 'Dhanbad', '3261263', '1212561212', '', 0, '', '', '', 0, '', '', 'Ratilal Rawani', 'Non-Matric', 'Public/PSU Sec. Employee', 'Professor', 'Railway', 'Barmasia Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '8514623', 'sanojy@gmail.com', '1212561212', '21000', '241261961406', 'No', NULL, 'Leela Devi', 'Matriculation', 'Armed Forces', 'House Wife', 'Ma Tata', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sanojy@gmail.com', '1212561212', '120000', '325941726416', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '1212561212', '1212561212', 'sanojy@gmail.com'),
(2020000088, 2020000088, 'No', 1, '2020-2021', 'Priti', 'Kumari', 'Singh', 14, 'SCIENCE', 'FEMALE', '1998-02-11', 22, 'ST', 3, 3, '2020-2021', 'Punjabi', 'Sikh', 'OTHERS', 'AB-Negative', '352430163163', NULL, 'DAV', 'Hindi', '', 13, ' Bokaro Sec 1', 'India', 'Jharkhand', 'Bokaro', '828109', '3216549871', ' Bokaro Sec 1', 'India', 'Jharkhand', 'Bokaro', '826001', '3216549871', '', 0, '', '', '', 0, '', '', 'Himanshu Singh', 'Graduate', 'Business', 'Manager', 'Ma tata Hardware', '', 'Bokaro', 'Jharkhand', 'India', '8281069', 'ps123@gmail.com', '3216549871', '90000', '325416053413', 'No', NULL, 'Simpi Devi', '', '', '', '', 'Bokaro Chas', 'Dhanbad', 'Jharkhand', 'India', '828109', 'ps123@gmail.com', '3216549871', '', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3216549871', '3216549871', 'ps123@gmail.com'),
(2020000089, 2020000089, 'No', 1, '2020-2021', 'Priti', 'Kumari', 'Singh', 14, 'SCIENCE', 'FEMALE', '1998-02-11', 22, 'ST', 3, 3, '2020-2021', 'Punjabi', 'Sikh', 'OTHERS', 'AB-Negative', '352430163163', NULL, 'DAV', 'Hindi', '', 13, ' Bokaro Sec 1', 'India', 'Jharkhand', 'Bokaro', '828109', '3216549871', ' Bokaro Sec 1', 'India', 'Jharkhand', 'Bokaro', '826001', '3216549871', '', 0, '', '', '', 0, '', '', 'Himanshu Singh', 'Graduate', 'Business', 'Manager', 'Ma tata Hardware', '', 'Bokaro', 'Jharkhand', 'India', '8281069', 'ps123@gmail.com', '3216549871', '90000', '325416053413', 'No', NULL, 'Simpi Devi', '', '', '', '', 'Bokaro Chas', 'Dhanbad', 'Jharkhand', 'India', '828109', 'ps123@gmail.com', '3216549871', '', '3+5.2+.236.2', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3216549871', '3216549871', 'ps123@gmail.com'),
(2020000090, 2020000090, 'No', 1, '2020-2021', 'Priti', 'Kumari', 'Singh', 14, 'SCIENCE', 'FEMALE', '1998-02-11', 22, 'ST', 3, 3, '2020-2021', 'Punjabi', 'Sikh', 'OTHERS', 'AB-Negative', '352430163163', NULL, 'DAV', 'Hindi', '', 13, ' Bokaro Sec 1', 'India', 'Jharkhand', 'Bokaro', '828109', '3216549871', ' Bokaro Sec 1', 'India', 'Jharkhand', 'Bokaro', '826001', '3216549871', '', 0, '', '', '', 0, '', '', 'Himanshu Singh', 'Graduate', 'Business', 'Manager', 'Ma tata Hardware', '', 'Bokaro', 'Jharkhand', 'India', '8281069', 'ps123@gmail.com', '3216549871', '90000', '325416053413', 'No', NULL, 'Simpi Devi', '', '', 'House Wife', 'sdgsdgs', 'Bokaro Chas', 'Dhanbad', 'Jharkhand', 'India', '828109', 'ps123@gmail.com', '3216549871', '321000', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3216549871', '3216549871', 'ps123@gmail.com'),
(2020000091, 2020000091, 'No', 1, '2020-2021', 'Shreetej', 'Kumar', 'Mahato', 14, 'COMMERCE', 'MALE', '1998-02-28', 22, 'SC', 2, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Negative', '602836410631', NULL, 'DAV', '', '', 13, ' Barmasia Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '3213213213', ' Barmasia Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '3213213213', '', 0, '', '', '', 0, '', '', 'Dharu Mahato', 'Non-Matric', 'Business', 'Railway', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'srtm@gmail.com', '3213213213', '', '628674106431', 'No', NULL, 'Bharti Devi', 'Post Graduate', 'Engineer', 'House Wife', '', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'srtm@gmail.com', '3213213213', '321000', '153241603163', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3213213213', '3213213213', 'srtm@gmail.com'),
(2020000092, 2020000092, 'No', 1, '2020-2021', 'Shruti', '', 'Mahato', 15, 'SCIENCE', 'FEMALE', '1997-02-28', 23, 'ST', 1, 1, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Negative', '777746410631', NULL, 'Ideal English Academy', 'English', 'CBSE', 14, 'Hill Colony Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '8245645', '9632513213', ' Barmasia Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '9632513213', '', 0, '', '', '', 0, '', '', 'Suku Mahato', 'Matriculation', 'Doctor', 'Driver', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'okjm45@gmail.com', '9632513213', '40000', '627410106431', 'No', NULL, 'Meena Devi', 'Matriculation', 'Business', 'House Wife', 'tata', 'Barmasia Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'okjm45@gmail.com', '9632513213', '321000', '632341603163', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9632513213', '9632513213', 'okjm45@gmail.com'),
(2020000093, 2020000093, 'No', 1, '2020-2021', 'Chotan', 'Kumari', 'Gujjar', 15, 'ARTS', 'MALE', '1997-10-22', 23, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', '', '628430163131', 'AdmissionDocuments/2020000093_AdmissionDocs/53eb3732b68d8ab7e4f5deeb8dbc6459.jpg', 'Dav', 'Hindi', '', 14, ' CHas Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '4444465651', ' CHas Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '4444465651', '', 0, '', '', '', 0, '', '', 'Sartaj Gujjar', 'Non-Matric', 'Other', 'Farmer', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'gujjar@gmail.com', '4444465651', '10000', '324160313.10', 'No', NULL, '', '', '', '', '', 'Dhanbad', '', '', '', '', 'gujjar@gmail.com', '4444465651', '', '', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '4444465651', '4444465651', 'gujjar@gmail.com'),
(2020000094, 2020000094, 'No', 1, '2020-2021', 'Chotan', 'Kumari', 'Gujjar', 15, 'ARTS', 'MALE', '1997-10-22', 23, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Buddhist', 'INDIAN', '', '628430163131', 'AdmissionDocuments/2020000094_AdmissionDocs/d0b706e497445df9f5beb0d31a836da5.jpg', 'Dav', 'Hindi', '', 14, ' CHas Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '4444465651', ' CHas Bokaro', 'India', 'Jharkhand', 'Bokaro', '826002', '4444465651', '', 0, '', '', '', 0, '', '', 'Sartaj Gujjar', 'Non-Matric', 'Other', 'Farmer', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'gujjar@gmail.com', '4444465651', '10000', '324160314164', 'No', 'AdmissionDocuments/2020000094_AdmissionDocs/679f350ae8b7aed966ed6285a4fb58d4.jpeg', 'Sapna gujjar', 'Graduate', 'Other', 'House Wife', '', 'Bokaro', 'Bokaro', 'Jharkhand', 'India', '826001', 'gujjar@gmail.com', '4444465651', '10000', '632454165024', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '4444465651', '4444465651', 'gujjar@gmail.com'),
(2020000095, 2020000095, 'No', 1, '2020-2021', 'Yash', 'Kumar', 'Thakur', 15, 'SCIENCE', 'MALE', '1998-10-22', 22, 'GENERAL', 1, 4, '2020-2021', 'English', 'Jain', 'INDIAN', 'B-Negative', '324603163131', 'AdmissionDocuments/2020000095_AdmissionDocs/74ae3e060b75312c71d5f1c9ae89b93a.jpg', 'Dav', 'Hindi', '', 14, 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826002', '6665565641', 'Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '6665565641', '', 0, '', '', '', 0, '', '', 'Bipin Thakur', 'Matriculation', 'Public/PSU Sec. Employee', 'Reporter', '', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'tjakur2@gmail.com', '6665565641', '20000', '656160314164', 'No', 'AdmissionDocuments/2020000095_AdmissionDocs/2235a49f7cd99d0d7966c8ad6cf9c245.jpeg', 'Harshita Thakur', 'Graduate', 'Other', 'House Wife', '', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'tjakur2@gmail.com', '6665565641', '20000', '365254165024', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '6665565641', '6665565641', 'tjakur2@gmail.com'),
(2020000096, 2020000096, 'No', 1, '2020-2021', 'Manish', 'Kumar', 'Roy', 15, 'ARTS', 'MALE', '1997-10-08', 23, 'SC', 2, 1, '2020-2021', 'English', 'Sikh', 'INDIAN', 'B-Negative', '897603163131', 'AdmissionDocuments/2020000096_AdmissionDocs/bdd8beeda3106f147009f9e7657bdf49.jpg', 'Ideal English Academy', '', 'ICSE', 14, 'Bokaro Steel City', 'India', 'Jharkhand', 'Bokaro', '826002', '3236519856', 'Bokaro Steel City', 'India', 'Jharkhand', 'Bokaro', '826002', '3236519856', '', 0, '', '', '', 0, '', '', 'Rijhum Kumar', 'Post Graduate', 'Business', 'Business', '', 'Bokaro Chas', 'Bokaro', 'Jharkhand', 'India', '826001', 'mmm1r2@gmail.com', '3236519856', '20000', '656160319613', 'Yes', 'AdmissionDocuments/2020000096_AdmissionDocs/456a01594eb82fa3e457b3f11341c652.jpeg', 'Sneha Bharti', 'Matriculation', 'Other', 'Beauty parlor', '', 'Bokaro Chas', 'Bokaro', 'Jharkhand', 'India', '826001', 'mmm1r2@gmail.com', '3236519856', '50000', '625274665024', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '3236519856', '3236519856', 'mmm1r2@gmail.com'),
(2020000097, 2020000097, 'No', 1, '2020-2021', 'Niraj', 'Pratap', 'Awasthi', 5, '', 'MALE', '2015-12-30', 5, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '985642547889', 'AdmissionDocuments/2020000097_AdmissionDocs/2a3600709ad336d3fb9d3bd1dde5263c.jpg', 'mscv school', 'Hindi', 'ICSE', 5, 'Suvarnal nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815301', '8329755177', 'Suvarnal nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815301', '8329755177', '', 0, '', '', '', 0, '', '', 'Pratap Awasthi', 'Post Graduate', 'Business', '', '', '', 'Bokaro', 'jharkhand', 'India', '815301', 'pa112@gmail.com', '8329755177', '12 lakh', '869742135684', 'No', 'AdmissionDocuments/2020000097_AdmissionDocs/c65909a6d61b939e7db5b642c423e86b.jpg', 'Anushka Awasthi', 'Graduate', 'Doctor', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'aa112@gmail.com', '8329755177', '25 lakh', '984522697452', '0', 'AdmissionDocuments/2020000097_AdmissionDocs/4c346757efc9aad281d31c78ba7321b7.jpg', 'Other', ' ', '', 'Self', '', NULL, '8329755177', '8329755177', 'pa112@gmail.com'),
(2020000098, 2020000098, 'No', 1, '2020-2021', 'Nitesh', 'Kumar', 'Pandit', 15, '', 'MALE', '1997-06-20', 23, 'ST', 2, 2, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'A-Positive', '325406301643', NULL, 'Rajkiya School', 'Hindi', '', 14, ' Bihar Patna', 'India', 'Bihar', 'Patna', '789456', '9608050251', ' Bihar Patna', 'India', 'Bihar', 'Patna', '789456', '9608050251', '', 0, '', '', '', 0, '', '', 'Prem Pandit', 'Non-Matric', 'Doctor', 'Driver', '', '', 'Dhanbad', 'Bihar', 'India', '789456', 'nk1ku1@gmail.com', '9608050251', '90000', '615421065321', 'No', NULL, 'Renu Pandit', 'Graduate', '', 'House Wife', '', 'Bihar', 'Patna', 'Bihar', '', '', 'nk1ku1@gmail.com', '9608050251', '321000', '356746547964', '0', NULL, 'Other', ' ', '', 'Self', '', NULL, '9608050251', '9608050251', 'nk1ku1@gmail.com');
INSERT INTO `admission_master_table` (`Admission_Id`, `School_Admission_Id`, `Is_Admited`, `School_Id`, `Session`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Stream`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`) VALUES
(2020000099, 2020000099, 'No', 1, '2020-2021', 'Samresh', 'Kumar', 'Guha', 15, '', 'MALE', '1997-08-20', 23, 'ST', 2, 4, '2020-2021', 'Hindi', 'Christian', 'INDIAN', 'A-Positive', '359461311643', NULL, 'Mont Bretia', '', 'ICSE', 14, 'Cmri Dhanbad', 'India', 'Bihar', 'Dhanbad', '789456', '3321310251', 'Cmri Dhanbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '3321310251', '', 0, '', '', '', 0, '', '', 'Kanu Guha', 'Graduate', 'Public/PSU Sec. Employee', 'Driver', 'Ma tata Hardware', 'Dhnbad', 'Dhanbad', 'Jharkhand', 'India', '789456', 'sam4231@gmail.com', '3321310251', '150000', '979466465321', 'No', NULL, 'Lajwanti Guha', 'Graduate', '', 'House Wife', '', 'Bihar', 'Patna', 'Bihar', 'India', '651456', 'sam4231@gmail.com', '3321310251', '321000', '968744547964', '0', 'AdmissionDocuments/2020000099_AdmissionDocs/928070b7add8592249656422397dfcb5.jpeg', 'Other', ' ', '', 'Self', '', NULL, '3321310251', '3321310251', 'sam4231@gmail.com'),
(2020000101, 2020000101, 'No', 1, '2020-2021', 'Anuj', 'Ranjan', 'Mahto', 5, '', 'MALE', '2015-12-04', 5, 'ST', 2, 2, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '989642547880', 'AdmissionDocuments/2020000101_AdmissionDocs/94d2efa37d27db7f51ccf8374032a0ea.jpg', 'mscv school', 'Hindi', 'ICSE', 5, 'Pritam nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815306', '9329755178', 'Pritam nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815306', '9329755178', '', 0, '', '', '', 0, '', '', 'Ranjan Mahto', 'Graduate', 'Armed Forces', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'rm112@gmail.com', '9329755178', '12 lakh', '869792135694', 'No', 'AdmissionDocuments/2020000101_AdmissionDocs/e75da2d66dede83688d65307d0d4a186.jpg', 'Aishwarya Mahto', 'Graduate', 'Doctor', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'am112@gmail.com', '9329755178', '25 lakh', '986522997452', '0', 'AdmissionDocuments/2020000101_AdmissionDocs/54c697bc9ab403994f093b21ee4c710c.jpg', 'Other', ' ', '', 'Self', '', NULL, '9329755178', '9329755178', 'rm112@gmail.com'),
(2020000102, 2020000102, 'No', 1, '2020-2021', 'Anis', 'Sehgal', 'Khan', 6, '', 'MALE', '2015-12-08', 5, 'GENERAL', 1, 2, '2020-2021', 'Hindi', 'Muslim', 'INDIAN', 'A-Positive', '989692547880', 'AdmissionDocuments/2020000102_AdmissionDocs/219f2bf053326f927f039cab90272b1e.jpg', 'honey holy school', 'English', 'CBSE', 6, 'mehandi nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815306', '9329755188', 'mehandi nager,bokaro steel', 'India', 'jharkhand', 'Bokaro', '815306', '9329755188', '', 0, '', '', '', 0, '', '', 'Sehgal Khan', 'Graduate', 'Engineer', '', '', '', 'Bokaro', 'jharkhand', 'India', '815306', 'sk112@gmail.com', '9329755188', '15 lakh', '869792135094', 'No', 'AdmissionDocuments/2020000102_AdmissionDocs/d43057796e464935026f85d583d297d8.jpg', 'Khushi khan', 'Graduate', 'Doctor', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'am112@gmail.com', '9329755188', '25 lakh', '980522997452', '0', 'AdmissionDocuments/2020000102_AdmissionDocs/2981fd969814acc45148e21d377d9613.jpg', 'Other', ' ', '', 'Self', '', NULL, '9329755188', '9329755188', 'sk112@gmail.com'),
(2020000103, 2020000103, 'No', 1, '2020-2021', 'Manoj', 'Rohit', 'Singh', 6, '', 'MALE', '2013-12-08', 7, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Sikh', 'INDIAN', 'O-Negative', '989692547800', 'AdmissionDocuments/2020000103_AdmissionDocs/e185e9dc46f69115923c1e1918ec86fa.jpg', 'honey holy school', 'English', 'CBSE', 6, 'msthii nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9929755188', 'msthii nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9929755188', '', 0, '', '', '', 0, '', '', 'Rohit Singh', 'Post Graduate', 'Private Sec. Employee', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'rss112@gmail.com', '9929755188', '16 lakh', '869792035094', 'No', 'AdmissionDocuments/2020000103_AdmissionDocs/469cafaef73196ee33dab0c12ada276e.jpg', 'Neha Singh', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'nss112@gmail.com', '9929755188', '15 lakh', '980522997452', '0', 'AdmissionDocuments/2020000103_AdmissionDocs/e0e84d120dfb7d8f39ce3f3c52e8d2bf.jpg', 'Other', ' ', '', 'Self', '', NULL, '9929755188', '9929755188', 'rss112@gmail.com'),
(2020000104, 2020000104, 'No', 1, '2020-2021', 'Lokesh', 'Sujit', 'Shukla', 6, '', 'MALE', '2014-12-08', 6, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989612547800', 'AdmissionDocuments/2020000104_AdmissionDocs/7a852c56bb25bb747bdf0cd5eebc6429.jpg', 'RSGK holy school', 'English', '', 6, 'ram nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9929755189', 'ram nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9929755189', '', 0, '', '', '', 0, '', '', 'Sujit Shukla', 'Post Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'ss112@gmail.com', '9929755188', '16 lakh', '860792035094', 'No', 'AdmissionDocuments/2020000104_AdmissionDocs/3fa57ed58faab24af91b9dcb27c0daf1.jpg', 'Pushpa Shukla', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'ps112@gmail.com', '9929755188', '15 lakh', '980521997452', '0', 'AdmissionDocuments/2020000104_AdmissionDocs/69ec0f7031e0e31223d09b5259823ffb.jpg', 'Other', ' ', '', 'Self', '', NULL, '9929755189', '9929755189', 'ss112@gmail.com'),
(2020000105, 2020000105, 'No', 1, '2020-2021', 'Raju', 'Akash', 'Jaiswaal', 6, '', 'MALE', '2014-11-08', 6, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989612537800', 'AdmissionDocuments/2020000105_AdmissionDocs/afd70fa291a262139cd866f3e8295921.jpg', 'RSGK holy school', 'English', '', 6, 'Roshan nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9909755189', 'Roshan nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9909755189', '', 0, '', '', '', 0, '', '', 'Akash Jaiswaal', 'Matriculation', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'aj112@gmail.com', '9909755189', '6 lakh', '860792035094', 'No', 'AdmissionDocuments/2020000105_AdmissionDocs/758ab3718920669c6f81b1a259573afc.jpg', 'Priyanka Jaiswaal', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'ps112@gmail.com', '9909755189', '15 lakh', '980521927452', '0', 'AdmissionDocuments/2020000105_AdmissionDocs/d2e57edfd49d737f3a15bebdbd824122.jpg', 'Other', ' ', '', 'Self', '', NULL, '9909755189', '9909755189', 'aj112@gmail.com'),
(2020000106, 2020000106, 'No', 1, '2020-2021', 'Teju', 'Pranay', 'Dikshit', 6, '', 'MALE', '2014-01-07', 7, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989612037800', 'AdmissionDocuments/2020000106_AdmissionDocs/13263070b8aa4557a89b9e1abb1d2215.jpg', 'RSGK holy school', 'English', '', 6, 'durga nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9909755089', 'durga nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9909755089', '', 0, '', '', '', 0, '', '', 'Pranay Dikshit', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'pd112@gmail.com', '9909755089', '6 lakh', '860792035024', 'No', 'AdmissionDocuments/2020000106_AdmissionDocs/afd18e5d1a824b7a2b8ba745a44c1d52.jpg', 'Anu Dikshit', 'Non-Matric', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'ad112@gmail.com', '9909755089', '3 lakh', '980521907452', '0', 'AdmissionDocuments/2020000106_AdmissionDocs/df067e5314aaecd00eea1e4c6a21e4dc.jpg', 'Other', ' ', '', 'Self', '', NULL, '9909755089', '9909755089', 'pd112@gmail.com'),
(2020000107, 2020000107, 'No', 1, '2020-2021', 'Ashish', 'Sumit', 'Raut', 6, '', 'MALE', '2014-02-07', 6, 'ST', 3, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Negative', '989602037800', 'AdmissionDocuments/2020000107_AdmissionDocs/5e4303718bb9eb74223521f4aa0b0f41.jpg', 'RSGK holy school', '', '', 6, 'Mandi nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9909155089', 'Mandi nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9909155089', '', 0, '', '', '', 0, '', '', 'Sumit Raut', 'PHD', 'Public/PSU Sec. Employee', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'sr2112@gmail.com', '9909155089', '6 lakh', '860792015014', 'No', 'AdmissionDocuments/2020000107_AdmissionDocs/6c7cd9d3cbb8da252a682c3543e85652.jpg', 'Anjali Raut', 'Non-Matric', '', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'arr112@gmail.com', '9909155089', '3 lakh', '981521907452', '0', 'AdmissionDocuments/2020000107_AdmissionDocs/976d9e328b2639089e5e9de090ca7878.jpg', 'Other', ' ', '', 'Self', '', NULL, '9909155089', '9909155089', 'sr2112@gmail.com'),
(2020000108, 2020000108, 'No', 1, '2020-2021', 'Niranjan', 'Awesh', 'Ganguly', 7, '', 'MALE', '2012-02-07', 8, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989602037800', 'AdmissionDocuments/2020000108_AdmissionDocs/ccdbef8348bf4be144f84df029cdd58c.jpg', 'RSGK holy school', 'Hindi', 'CBSE', 7, 'shastri nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999155089', 'shastri nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999155089', '', 0, '', '', '', 0, '', '', 'Awesh Ganguly', 'Graduate', 'Armed Forces', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'ag112@gmail.com', '9999155089', '6 lakh', '861792015014', 'No', 'AdmissionDocuments/2020000108_AdmissionDocs/a647db704fc68e0e736d233b2193e80c.jpg', 'Rama ganguly', 'Non-Matric', '', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'rg112@gmail.com', '9999155089', '3 lakh', '981521907402', '0', 'AdmissionDocuments/2020000108_AdmissionDocs/64137d393690b4084d7bc8eb2b827088.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999155089', '9999155089', 'ag112@gmail.com'),
(2020000109, 2020000109, 'No', 1, '2020-2021', 'Nikesh', 'Mukesh', 'Yadav', 7, '', 'MALE', '2012-03-07', 8, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989602037100', 'AdmissionDocuments/2020000109_AdmissionDocs/014c2213304233faa73e3dbf23a892a6.jpg', 'RSGK holy school', 'Hindi', '', 7, 'Lajpat nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855089', 'Lajpat nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855089', '', 0, '', '', '', 0, '', '', 'Mukesh Yadav', 'Graduate', 'Doctor', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'my112@gmail.com', '9999855089', '26 lakh', '861791015014', 'No', 'AdmissionDocuments/2020000109_AdmissionDocs/a7278890b25101f22c29bd56065357a0.jpg', 'Mukesh Yadav', 'Graduate', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'my112@gmail.com', '9999855089', '8 lakh', '981521977402', '0', 'AdmissionDocuments/2020000109_AdmissionDocs/fb900ae6a8bdfdb5cb9b1a6cb0b88c01.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999855089', '9999855089', 'my112@gmail.com'),
(2020000110, 2020000110, 'No', 1, '2020-2021', 'Nikesh', 'Mukesh', 'Yadav', 7, '', 'MALE', '2012-03-07', 8, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989602037100', 'AdmissionDocuments/2020000110_AdmissionDocs/823b07ce029948747b8844bf61108f86.jpg', 'RSGK holy school', 'Hindi', '', 7, 'Lajpat nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855089', 'Lajpat nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855089', '', 0, '', '', '', 0, '', '', 'Mukesh Yadav', 'Graduate', 'Doctor', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'my112@gmail.com', '9999855089', '26 lakh', '861791015014', 'No', 'AdmissionDocuments/2020000110_AdmissionDocs/33b54203250281e8bc065d16c389d311.jpg', 'Mukesh Yadav', 'Graduate', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'my112@gmail.com', '9999855089', '8 lakh', '981521977402', '0', 'AdmissionDocuments/2020000110_AdmissionDocs/af0bca2247951738be02602f8cf274b4.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999855089', '9999855089', 'my112@gmail.com'),
(2020000111, 2020000111, 'No', 1, '2020-2021', 'Pranjal', 'jai', 'Sharma', 7, '', 'MALE', '2012-07-07', 8, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '989612037100', 'AdmissionDocuments/2020000111_AdmissionDocs/25c25a9218f2630308a4fb567baa32d7.jpg', 'RSGK holy school', 'Hindi', '', 7, 'shiv nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855081', 'shiv nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855081', '', 0, '', '', '', 0, '', '', 'Jai Sharma', 'Graduate', 'Doctor', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'js112@gmail.com', '9999855081', '26 lakh', '861791015114', 'No', 'AdmissionDocuments/2020000111_AdmissionDocs/a73364a1c254237c783d506196047711.jpg', 'Sonal Sharma', 'Graduate', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'sss112@gmail.com', '9999855081', '8 lakh', '981521971402', '0', 'AdmissionDocuments/2020000111_AdmissionDocs/943e5059254b83e23ab3e1cc2d9fa1fd.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999855081', '9999855081', 'js112@gmail.com'),
(2020000112, 2020000112, 'No', 1, '2020-2021', 'Pikesh', 'Mithun', 'Rai', 7, '', 'MALE', '2012-06-07', 8, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '989010037100', 'AdmissionDocuments/2020000112_AdmissionDocs/5d3e530ac773dffc6ddfdb78edc7fcc5.jpg', 'RSGK holy school', 'Hindi', '', 7, 'Roy nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855011', 'Roy nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855011', '', 0, '', '', '', 0, '', '', 'Mithun Rai', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'mr112@gmail.com', '9999855011', '16 lakh', '891791015114', 'No', 'AdmissionDocuments/2020000112_AdmissionDocs/e46a42c17cbc65a2b30a5809d03af8c7.jpg', 'Anuja Rai', 'Graduate', 'Other', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'arr112@gmail.com', '9999855011', '8 lakh', '991521971402', '0', 'AdmissionDocuments/2020000112_AdmissionDocs/75a48dea97bdd521cee4e3c1fecceac5.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999855011', '9999855011', 'mr112@gmail.com'),
(2020000113, 2020000113, 'No', 1, '2020-2021', 'Anand', 'Suraj', 'Verma', 7, '', 'MALE', '2011-06-07', 9, 'ST', 2, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '989010037110', 'AdmissionDocuments/2020000113_AdmissionDocs/a518173dafd23a7046808f410840dd92.jpg', 'yps holy school', 'English', 'CBSE', 7, 'Kawar nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855111', 'Kawar nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855111', '', 0, '', '', '', 0, '', '', 'Suraj Verma', 'Graduate', 'Engineer', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'sv112@gmail.com', '9999855111', '16 lakh', '891791015111', 'No', 'AdmissionDocuments/2020000113_AdmissionDocs/31dc506c069e25cf3be1868d78db0b6f.jpg', 'Shruti Verma', 'Graduate', 'Other', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'svr112@gmail.com', '9999855111', '8 lakh', '991521971112', '0', 'AdmissionDocuments/2020000113_AdmissionDocs/6ff758a2a868eaef8786f8551092cfbe.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999855111', '9999855111', 'sv112@gmail.com'),
(2020000114, 2020000114, 'No', 1, '2020-2021', 'Shubham', 'Rajiv', 'Kashyap', 7, '', 'MALE', '2011-06-11', 9, 'ST', 2, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'B-Positive', '989011137110', 'AdmissionDocuments/2020000114_AdmissionDocs/2103554ed928ef1aca0aaa73bed77704.jpg', 'yps holy school', 'English', 'CBSE', 7, 'keshav nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855011', 'keshav nager,Dhanbad', 'India', 'jharkhand', 'Dhanbad', '815306', '9999855011', '', 0, '', '', '', 0, '', '', 'Rajiv Kashyap', 'Graduate', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'rk112@gmail.com', '9999855011', '16 lakh', '891791915111', 'No', 'AdmissionDocuments/2020000114_AdmissionDocs/9e1e206d252b48cc01a38bfc52c50ade.jpg', 'Shruti Verma', 'Graduate', 'Business', '', '', '', 'Dhanbad', 'jharkhand', 'India', '815306', 'svr112@gmail.com', '9999855111', '9 lakh', '991821971112', '0', 'AdmissionDocuments/2020000114_AdmissionDocs/704ea6055a1fcac68f1e7b0ece921fda.jpg', 'Other', ' ', '', 'Self', '', NULL, '9999855011', '9999855011', 'rk112@gmail.com');

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
  `SMS_Sent_Status` tinyint(1) DEFAULT '0',
  `Whatsapp_Sent_Status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_details_table`
--

INSERT INTO `attendance_details_table` (`Attendance_Details_Id`, `Attendance_Id`, `Student_Id`, `Attendance_Status`, `Attendance_Remarks`, `Prev_Attendance_Status`, `Prev_Attendance_Remarks`, `School_Id`, `SMS_Sent_Status`, `Whatsapp_Sent_Status`) VALUES
(1, 1, '61/2020', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(2, 1, '60/2020', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(3, 1, '64/2020', 'ABSENT', '', 'ABSENT', '', 1, 0, 0),
(4, 1, '65/2020', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(5, 1, '66/2020', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(6, 1, '68/2020', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(7, 1, '51/2020', 'PRESENT', '', 'PRESENT', '', 1, 0, 0),
(8, 1, '71/2020', 'PRESENT', '', 'PRESENT', '', 1, 0, 0);

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
  `SMS_Status` tinyint(1) NOT NULL DEFAULT '0',
  `Session` varchar(10) NOT NULL,
  `Whatsapp_Status` tinyint(1) NOT NULL DEFAULT '0',
  `School_Id` int(8) NOT NULL,
  `Locked` tinyint(1) NOT NULL DEFAULT '0',
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Attendance_Status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance_master_table`
--

INSERT INTO `attendance_master_table` (`Attendance_Id`, `Class_Id`, `Class_Sec_Id`, `DOA`, `Period`, `Attendance_Taken_By`, `Total_Absent`, `Total_Present`, `Total_Halfday`, `Total_Late`, `SMS_Status`, `Session`, `Whatsapp_Status`, `School_Id`, `Locked`, `Created_On`, `Attendance_Status`) VALUES
(1, 17, 28, '2020-12-09', 1, 'admin', 2, 6, 0, 0, 0, '', 0, 1, 0, '2020-12-08 20:29:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank_master_table`
--

CREATE TABLE `bank_master_table` (
  `Bank_Id` int(11) NOT NULL,
  `Bank_Name` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_master_table`
--

INSERT INTO `bank_master_table` (`Bank_Id`, `Bank_Name`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'State Bank of India', 1, 'admin', '2021-01-05 13:25:27'),
(2, 'ICICI Bank', 1, 'admin', '2021-01-05 13:25:27');

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
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
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
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Enabled` mediumint(1) DEFAULT '1'
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

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_list_table`
--

CREATE TABLE `class_subject_list_table` (
  `CSL_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_syllabus_table`
--

CREATE TABLE `class_syllabus_table` (
  `Class_Syllabus_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Subject_Id` int(20) NOT NULL,
  `Filename` varchar(512) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_syllabus_table`
--

INSERT INTO `class_syllabus_table` (`Class_Syllabus_Id`, `Class_Id`, `Subject_Id`, `Filename`, `Session`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 17, 1, '39857d095693275e0a975132ad3c9d39.pdf', '2020-2021', 1, 1, 'admin', '2021-01-12 10:43:50'),
(2, 17, 1, 'asyyyasda.jpg', '2020-21', 0, 1, 'admin', '2021-01-12 16:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `class_time_table`
--

CREATE TABLE `class_time_table` (
  `Class_Routine_Id` int(11) NOT NULL,
  `Class_Sec_Id` int(11) NOT NULL,
  `Staff_Id` varchar(20) NOT NULL,
  `filename` varchar(512) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_time_table`
--

INSERT INTO `class_time_table` (`Class_Routine_Id`, `Class_Sec_Id`, `Staff_Id`, `filename`, `Session`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 28, '', '3bf2649fd5c0b8fedc7faf5c65810252.pdf', '2020-2021', 1, 1, 'admin', '2021-01-12 16:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `close_user_group_details`
--

CREATE TABLE `close_user_group_details` (
  `CUGD_Id` bigint(20) NOT NULL DEFAULT '0',
  `CUG_Id` int(11) NOT NULL,
  `User_Name` varchar(300) NOT NULL,
  `SMS_Contact_No` varchar(10) NOT NULL,
  `Whatsapp_Contact_No` varchar(12) NOT NULL,
  `User_Type` enum('STUDENT','STAFF','OTHERS','') NOT NULL,
  `User_Id` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '0',
  `School_Id` int(11) NOT NULL,
  `Updated_by` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `concession_detail_table`
--

CREATE TABLE `concession_detail_table` (
  `Concession_Detail_Id` int(11) NOT NULL,
  `Concession_Id` int(11) NOT NULL,
  `Fee_Head_Id` int(11) NOT NULL,
  `Concession_Percent` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concession_detail_table`
--

INSERT INTO `concession_detail_table` (`Concession_Detail_Id`, `Concession_Id`, `Fee_Head_Id`, `Concession_Percent`, `Session`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(2, 1, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(3, 1, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(4, 1, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(5, 1, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(6, 1, 14, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(7, 1, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(8, 1, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(9, 1, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(10, 1, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(11, 1, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(12, 1, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(13, 1, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:02:37'),
(14, 2, 12, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(15, 2, 1, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(16, 2, 9, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(17, 2, 3, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(18, 2, 10, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(19, 2, 14, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(20, 2, 5, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(21, 2, 11, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(22, 2, 7, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(23, 2, 8, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(24, 2, 6, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(25, 2, 4, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(26, 2, 2, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:10:56'),
(27, 3, 12, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(28, 3, 1, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(29, 3, 9, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(30, 3, 3, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(31, 3, 10, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(32, 3, 14, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(33, 3, 5, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(34, 3, 11, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(35, 3, 7, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(36, 3, 8, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(37, 3, 6, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(38, 3, 4, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49'),
(39, 3, 2, 50, '2020-2021', 1, 1, 'admin', '2021-01-19 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `concession_master_table`
--

CREATE TABLE `concession_master_table` (
  `Concession_Id` int(11) NOT NULL,
  `Concession_Name` varchar(100) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concession_master_table`
--

INSERT INTO `concession_master_table` (`Concession_Id`, `Concession_Name`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'General Student', 1, 1, 'admin', '2021-01-19 10:09:37'),
(2, 'BPL Students', 1, 1, 'admin', '2021-01-19 10:10:55'),
(3, 'Staff Ward Students', 1, 1, 'admin', '2021-01-19 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `department_master_table`
--

CREATE TABLE `department_master_table` (
  `Dept_Id` int(5) NOT NULL,
  `Dept_Name` varchar(100) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Enabled` int(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation_master_table`
--

INSERT INTO `designation_master_table` (`Desig_Id`, `Designation`, `Remarks`, `Dept_Id`, `School_Id`, `Enabled`, `Created_By`, `Created_On`) VALUES
(1, 'HOD', '', 1, 1, 1, 'ADMIN', '2020-12-08 23:10:38'),
(2, 'FACULTY', '', 2, 1, 1, 'ADMIN', '2020-12-08 23:10:38');

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
  `login_grade` int(2) DEFAULT '0',
  `login_enabled` tinyint(1) DEFAULT '1',
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
  `Enabled` mediumint(1) DEFAULT '1',
  `authorized` tinyint(1) DEFAULT '0',
  `authorized_by` varchar(100) DEFAULT '0',
  `shift_start_hour` time DEFAULT NULL,
  `shift_end_hour` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_advance_table`
--

CREATE TABLE `fee_advance_table` (
  `FA_Id` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Advance_Amount` int(11) NOT NULL,
  `Advance_Date` date NOT NULL,
  `Source_Recept_No` varchar(10) DEFAULT NULL,
  `Adjusted` tinyint(1) NOT NULL DEFAULT '0',
  `Advance_Adjust_Date` date NOT NULL,
  `Adjusted_Recept_No` varchar(10) DEFAULT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_cheque_table`
--

CREATE TABLE `fee_cheque_table` (
  `FC_Id` int(11) NOT NULL,
  `Cheque_Number` varchar(10) NOT NULL,
  `Cheque_Date` date NOT NULL,
  `Bank_Id` int(11) NOT NULL,
  `Cheque_Amount` int(11) NOT NULL,
  `Cheque_Given_Date` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Recept_No` varchar(10) NOT NULL,
  `Bounced` tinyint(1) NOT NULL DEFAULT '0',
  `Bounce_Charge` int(11) NOT NULL,
  `Adjusted` tinyint(1) NOT NULL DEFAULT '0',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_group_class_list`
--

CREATE TABLE `fee_group_class_list` (
  `FGCL_Id` int(11) NOT NULL,
  `FG_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Stream` varchar(50) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_group_class_list`
--

INSERT INTO `fee_group_class_list` (`FGCL_Id`, `FG_Id`, `Class_Id`, `Stream`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 17, 'General', 1, 1, 'admin', '2021-01-19 09:26:24'),
(2, 1, 16, 'General', 1, 1, 'admin', '2021-01-19 09:26:24'),
(3, 2, 17, 'General', 1, 1, 'admin', '2021-01-19 09:27:14'),
(4, 2, 16, 'General', 1, 1, 'admin', '2021-01-19 09:27:14'),
(5, 3, 1, 'General', 1, 1, 'admin', '2021-01-19 09:27:37'),
(6, 3, 2, 'General', 1, 1, 'admin', '2021-01-19 09:27:37'),
(7, 4, 1, 'General', 1, 1, 'admin', '2021-01-19 09:27:40'),
(8, 4, 2, 'General', 1, 1, 'admin', '2021-01-19 09:27:40'),
(9, 5, 4, 'General', 1, 1, 'admin', '2021-01-19 09:28:10'),
(10, 5, 5, 'General', 1, 1, 'admin', '2021-01-19 09:28:10'),
(11, 6, 4, 'General', 1, 1, 'admin', '2021-01-19 09:28:19'),
(12, 6, 5, 'General', 1, 1, 'admin', '2021-01-19 09:28:19'),
(13, 7, 6, 'General', 1, 1, 'admin', '2021-01-19 09:28:38'),
(14, 7, 7, 'General', 1, 1, 'admin', '2021-01-19 09:28:38'),
(15, 8, 6, 'General', 1, 1, 'admin', '2021-01-19 09:28:47'),
(16, 8, 7, 'General', 1, 1, 'admin', '2021-01-19 09:28:47'),
(17, 9, 8, 'General', 1, 1, 'admin', '2021-01-19 09:29:04'),
(18, 9, 9, 'General', 1, 1, 'admin', '2021-01-19 09:29:04'),
(19, 10, 8, 'General', 1, 1, 'admin', '2021-01-19 09:29:14'),
(20, 10, 9, 'General', 1, 1, 'admin', '2021-01-19 09:29:14'),
(21, 11, 10, 'General', 1, 1, 'admin', '2021-01-19 09:29:31'),
(22, 11, 11, 'General', 1, 1, 'admin', '2021-01-19 09:29:31'),
(23, 12, 10, 'General', 1, 1, 'admin', '2021-01-19 09:29:40'),
(24, 12, 11, 'General', 1, 1, 'admin', '2021-01-19 09:29:40'),
(25, 13, 12, 'General', 1, 1, 'admin', '2021-01-19 09:30:02'),
(26, 14, 12, 'General', 1, 1, 'admin', '2021-01-19 09:30:13'),
(27, 15, 13, 'General', 1, 1, 'admin', '2021-01-19 09:30:27'),
(28, 16, 13, 'General', 1, 1, 'admin', '2021-01-19 09:30:37'),
(29, 17, 14, 'Science', 1, 1, 'admin', '2021-01-19 09:31:20'),
(30, 18, 14, 'Commerce', 1, 1, 'admin', '2021-01-19 09:49:59'),
(31, 19, 14, 'Arts', 1, 1, 'admin', '2021-01-19 09:50:24'),
(32, 20, 14, 'Science', 1, 1, 'admin', '2021-01-19 09:50:56'),
(33, 21, 14, 'Commerce', 1, 1, 'admin', '2021-01-19 09:50:59'),
(34, 22, 14, 'Arts', 1, 1, 'admin', '2021-01-19 09:51:01'),
(35, 23, 15, 'Science', 1, 1, 'admin', '2021-01-19 09:54:19'),
(36, 24, 15, 'Commerce', 1, 1, 'admin', '2021-01-19 09:54:39'),
(37, 25, 15, 'Arts', 1, 1, 'admin', '2021-01-19 09:54:48'),
(38, 26, 15, 'Science', 1, 1, 'admin', '2021-01-19 09:55:07'),
(39, 27, 15, 'Commerce', 1, 1, 'admin', '2021-01-19 09:55:17'),
(40, 28, 15, 'Arts', 1, 1, 'admin', '2021-01-19 09:55:23'),
(41, 29, 0, 'NULL', 1, 1, 'admin', '2021-01-19 10:29:51'),
(42, 30, 0, 'NULL', 1, 1, 'admin', '2021-01-19 10:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `fee_group_table`
--

CREATE TABLE `fee_group_table` (
  `FG_Id` int(11) NOT NULL,
  `FG_Name` varchar(100) NOT NULL,
  `Fee_Group_Type` enum('Regular','Transport') NOT NULL,
  `Fee_Account_Type` enum('School-Fee','Transport-Fee') NOT NULL,
  `Student_Type` enum('Existing','New') NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_group_table`
--

INSERT INTO `fee_group_table` (`FG_Id`, `FG_Name`, `Fee_Group_Type`, `Fee_Account_Type`, `Student_Type`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'PreNur-Nursery 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:26:24'),
(2, 'PreNur-Nursery 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:38:43'),
(3, 'LKG-UKG 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:27:37'),
(4, 'LKG-UKG 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:40:34'),
(5, '1-2 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:28:10'),
(6, '1-2 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:28:18'),
(7, '3-4 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:28:38'),
(8, '3-4 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:28:47'),
(9, '5-6 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:29:04'),
(10, '5-6 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:29:14'),
(11, '7-8 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:29:31'),
(12, '7-8 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:29:40'),
(13, '9 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:30:02'),
(14, '9 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:30:13'),
(15, '10 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:30:27'),
(16, '10 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:30:37'),
(17, '11-Science 2020-2021-Exisging Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:51:36'),
(18, '11-Commerce 2020-2021-Exisging Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:51:50'),
(19, '11-ARTS 2020-2021-Exisging Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:50:24'),
(20, '11-Science 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:52:01'),
(21, '11-Commerce 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:52:09'),
(22, '11-ARTS 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:51:01'),
(23, '12-Science 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:54:19'),
(24, '12-Commerce 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:54:39'),
(25, '12-Arts 2020-2021-New Student', 'Regular', 'School-Fee', 'New', 1, 1, 'admin', '2021-01-19 09:54:48'),
(26, '12-Science 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:55:07'),
(27, '12-Commerce 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:55:17'),
(28, '12-Arts 2020-2021-Existing Student', 'Regular', 'School-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 09:55:23'),
(29, 'Transport Fee New Students', 'Transport', 'Transport-Fee', 'New', 1, 1, 'admin', '2021-01-19 10:30:50'),
(30, 'Transport Fee Existing Students', 'Transport', 'Transport-Fee', 'Existing', 1, 1, 'admin', '2021-01-19 10:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `fee_head_table`
--

CREATE TABLE `fee_head_table` (
  `Fee_Head_Id` int(11) NOT NULL,
  `Fee_Head_Name` varchar(100) NOT NULL,
  `Fee_Head_Type` enum('Monthly','Bi-Monthly','Quarterly','Half-Yearly','Annually') NOT NULL,
  `Fee_Type` enum('Regular','Transport') NOT NULL,
  `Fee_Print_Lable` varchar(50) NOT NULL,
  `Refundable` tinyint(1) NOT NULL DEFAULT '0',
  `Tax_Benifit` tinyint(1) NOT NULL DEFAULT '0',
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_head_table`
--

INSERT INTO `fee_head_table` (`Fee_Head_Id`, `Fee_Head_Name`, `Fee_Head_Type`, `Fee_Type`, `Fee_Print_Lable`, `Refundable`, `Tax_Benifit`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'Admission Fees', 'Monthly', 'Regular', 'Adm Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:09:34'),
(2, 'Tuition Fees', 'Monthly', 'Regular', 'Tui Fee', 0, 1, 1, 1, 'admin', '2021-01-19 09:09:44'),
(3, 'Annual Charges', 'Monthly', 'Regular', 'Annual Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:08:26'),
(4, 'Sports Fees', 'Monthly', 'Regular', 'Sports Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:08:42'),
(5, 'Computer Fees', 'Monthly', 'Regular', 'Comp Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:09:25'),
(6, 'Smart Class Fees', 'Monthly', 'Regular', 'SmtCls Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:10:24'),
(7, 'Library Fees', 'Monthly', 'Regular', 'Lib Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:10:38'),
(8, 'Newspaper Fees', 'Monthly', 'Regular', 'Nws Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:10:59'),
(9, 'Amalgamated Funds', 'Monthly', 'Regular', 'Amalg Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:11:13'),
(10, 'Building Funds', 'Monthly', 'Regular', 'Build Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:11:31'),
(11, 'Development Charges', 'Monthly', 'Regular', 'Devlp Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:11:56'),
(12, 'Activity Fees', 'Monthly', 'Regular', 'Acvt Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:12:18'),
(13, 'Transport Fee', 'Monthly', 'Transport', 'Bus Fee', 0, 0, 1, 1, 'admin', '2021-01-19 09:12:44'),
(14, 'Caution Fee', 'Monthly', 'Regular', 'Cau Fee', 1, 0, 1, 1, 'admin', '2021-01-19 09:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `fee_on_demand`
--

CREATE TABLE `fee_on_demand` (
  `FOD_Id` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Fee_Head_Id` int(11) NOT NULL,
  `Fee_Head_Name` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Apply_Date` date NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Pay_Status` enum('Paid','Unpaid') NOT NULL,
  `Recept_No` varchar(10) NOT NULL,
  `School_id` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_payment_details`
--

CREATE TABLE `fee_payment_details` (
  `FPD_Id` int(11) NOT NULL,
  `FP_Id` int(11) NOT NULL,
  `Paymode` varchar(50) NOT NULL,
  `Instrument_No` varchar(50) NOT NULL,
  `Instrument_Date` date DEFAULT NULL,
  `Bank_Id` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Service_Charges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_payment_master`
--

CREATE TABLE `fee_payment_master` (
  `FP_Id` int(11) NOT NULL,
  `Recept_No` varchar(10) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Due_Amount` int(11) NOT NULL,
  `Paid_Amount` int(11) NOT NULL,
  `Late_Fee` int(11) NOT NULL,
  `Ree_Adm_Fee` int(11) NOT NULL,
  `On_Demand_Fee` int(11) NOT NULL,
  `Chq_Bon_Amount` int(11) NOT NULL,
  `Advance_Adjusted` int(11) NOT NULL,
  `Discount_Amount` int(11) NOT NULL,
  `Advance_Amount` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure_table`
--

CREATE TABLE `fee_structure_table` (
  `FS_Id` int(11) NOT NULL,
  `FG_Id` int(11) NOT NULL,
  `Fee_Head_Id` int(11) NOT NULL,
  `Fee_Installment_Type` int(11) NOT NULL,
  `Installment_Id` int(11) NOT NULL,
  `Fee_Amount` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_structure_table`
--

INSERT INTO `fee_structure_table` (`FS_Id`, `FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Session`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 2, 1, 1, 1, 5000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(2, 2, 1, 1, 2, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(3, 2, 1, 1, 3, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(4, 2, 1, 1, 4, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(5, 2, 1, 1, 5, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(6, 2, 1, 1, 6, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(7, 2, 1, 1, 7, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(8, 2, 1, 1, 8, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(9, 2, 1, 1, 9, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(10, 2, 1, 1, 10, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(11, 2, 1, 1, 11, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(12, 2, 1, 1, 12, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(13, 2, 2, 2, 1, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(14, 2, 2, 2, 2, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(15, 2, 2, 2, 3, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(16, 2, 2, 2, 4, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(17, 2, 2, 2, 5, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(18, 2, 2, 2, 6, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(19, 2, 2, 2, 7, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(20, 2, 2, 2, 8, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(21, 2, 2, 2, 9, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(22, 2, 2, 2, 10, 1000, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(23, 2, 2, 2, 11, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(24, 2, 2, 2, 12, 0, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(25, 2, 3, 2, 1, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(26, 2, 3, 2, 2, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(27, 2, 3, 2, 3, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(28, 2, 3, 2, 4, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(29, 2, 3, 2, 5, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(30, 2, 3, 2, 6, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(31, 2, 3, 2, 7, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(32, 2, 3, 2, 8, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(33, 2, 3, 2, 9, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(34, 2, 3, 2, 10, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(35, 2, 3, 2, 11, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(36, 2, 3, 2, 12, 700, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(37, 2, 5, 2, 1, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(38, 2, 5, 2, 2, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(39, 2, 5, 2, 3, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(40, 2, 5, 2, 4, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(41, 2, 5, 2, 5, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(42, 2, 5, 2, 6, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(43, 2, 5, 2, 7, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(44, 2, 5, 2, 8, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(45, 2, 5, 2, 9, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(46, 2, 5, 2, 10, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(47, 2, 5, 2, 11, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(48, 2, 5, 2, 12, 500, '2020-2021', 1, 1, 'admin', '2020-12-27 21:53:57'),
(49, 11, 4, 0, 1, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(50, 11, 4, 0, 2, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(51, 11, 4, 0, 3, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(52, 11, 4, 0, 4, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(53, 11, 4, 0, 5, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(54, 11, 4, 0, 6, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(55, 11, 4, 0, 7, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(56, 11, 4, 0, 8, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(57, 11, 4, 0, 9, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(58, 11, 4, 0, 10, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(59, 11, 4, 0, 11, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(60, 11, 4, 0, 12, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:50:10'),
(61, 3, 4, 0, 1, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(62, 3, 4, 0, 2, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(63, 3, 4, 0, 3, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(64, 3, 4, 0, 4, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(65, 3, 4, 0, 5, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(66, 3, 4, 0, 6, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(67, 3, 4, 0, 7, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(68, 3, 4, 0, 8, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(69, 3, 4, 0, 9, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(70, 3, 4, 0, 10, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(71, 3, 4, 0, 11, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(72, 3, 4, 0, 12, 1, '2020-2021', 1, 1, 'admin', '2020-12-29 10:54:40'),
(73, 1, 1, 1, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(74, 1, 1, 1, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(75, 1, 1, 1, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(76, 1, 1, 1, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(77, 1, 1, 1, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(78, 1, 1, 1, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(79, 1, 1, 1, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(80, 1, 1, 1, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(81, 1, 1, 1, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(82, 1, 1, 1, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:12'),
(83, 1, 1, 1, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(84, 1, 1, 1, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(85, 1, 2, 0, 1, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(86, 1, 2, 0, 2, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(87, 1, 2, 0, 3, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(88, 1, 2, 0, 4, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(89, 1, 2, 0, 5, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(90, 1, 2, 0, 6, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(91, 1, 2, 0, 7, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(92, 1, 2, 0, 8, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(93, 1, 2, 0, 9, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(94, 1, 2, 0, 10, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(95, 1, 2, 0, 11, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(96, 1, 2, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(97, 1, 3, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(98, 1, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(99, 1, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(100, 1, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(101, 1, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(102, 1, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(103, 1, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(104, 1, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(105, 1, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(106, 1, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(107, 1, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(108, 1, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(109, 1, 4, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(110, 1, 4, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(111, 1, 4, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(112, 1, 4, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(113, 1, 4, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(114, 1, 4, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(115, 1, 4, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(116, 1, 4, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(117, 1, 4, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(118, 1, 4, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(119, 1, 4, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(120, 1, 4, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(121, 1, 5, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(122, 1, 5, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(123, 1, 5, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(124, 1, 5, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(125, 1, 5, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(126, 1, 5, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(127, 1, 5, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(128, 1, 5, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(129, 1, 5, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(130, 1, 5, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(131, 1, 5, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(132, 1, 5, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(133, 1, 6, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(134, 1, 6, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(135, 1, 6, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(136, 1, 6, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(137, 1, 6, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(138, 1, 6, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(139, 1, 6, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(140, 1, 6, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(141, 1, 6, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(142, 1, 6, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(143, 1, 6, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(144, 1, 6, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(145, 1, 7, 0, 1, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(146, 1, 7, 0, 2, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(147, 1, 7, 0, 3, 99, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(148, 1, 7, 0, 4, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(149, 1, 7, 0, 5, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(150, 1, 7, 0, 6, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(151, 1, 7, 0, 7, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(152, 1, 7, 0, 8, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(153, 1, 7, 0, 9, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(154, 1, 7, 0, 10, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(155, 1, 7, 0, 11, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(156, 1, 7, 0, 12, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(157, 1, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(158, 1, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(159, 1, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(160, 1, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(161, 1, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(162, 1, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(163, 1, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(164, 1, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(165, 1, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(166, 1, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(167, 1, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(168, 1, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(169, 1, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(170, 1, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(171, 1, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(172, 1, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(173, 1, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(174, 1, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(175, 1, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(176, 1, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(177, 1, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(178, 1, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(179, 1, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(180, 1, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(181, 1, 10, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(182, 1, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(183, 1, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(184, 1, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(185, 1, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(186, 1, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(187, 1, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(188, 1, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(189, 1, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(190, 1, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(191, 1, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(192, 1, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(193, 1, 11, 0, 1, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(194, 1, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(195, 1, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(196, 1, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(197, 1, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(198, 1, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(199, 1, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(200, 1, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(201, 1, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(202, 1, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(203, 1, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(204, 1, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(205, 1, 12, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(206, 1, 12, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(207, 1, 12, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(208, 1, 12, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(209, 1, 12, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(210, 1, 12, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(211, 1, 12, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(212, 1, 12, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(213, 1, 12, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(214, 1, 12, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(215, 1, 12, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(216, 1, 12, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(217, 1, 14, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(218, 1, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(219, 1, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(220, 1, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(221, 1, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(222, 1, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(223, 1, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(224, 1, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(225, 1, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(226, 1, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(227, 1, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(228, 1, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:19:13'),
(229, 5, 1, 1, 1, 7000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(230, 5, 1, 1, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(231, 5, 1, 1, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(232, 5, 1, 1, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(233, 5, 1, 1, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(234, 5, 1, 1, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(235, 5, 1, 1, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(236, 5, 1, 1, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(237, 5, 1, 1, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(238, 5, 1, 1, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(239, 5, 1, 1, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(240, 5, 1, 1, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(241, 5, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(242, 5, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(243, 5, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(244, 5, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(245, 5, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(246, 5, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(247, 5, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(248, 5, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(249, 5, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(250, 5, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(251, 5, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(252, 5, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(253, 5, 3, 0, 1, 3000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(254, 5, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(255, 5, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(256, 5, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(257, 5, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(258, 5, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(259, 5, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(260, 5, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(261, 5, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(262, 5, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(263, 5, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(264, 5, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(265, 5, 4, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(266, 5, 4, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(267, 5, 4, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(268, 5, 4, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(269, 5, 4, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(270, 5, 4, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(271, 5, 4, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(272, 5, 4, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(273, 5, 4, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(274, 5, 4, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(275, 5, 4, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(276, 5, 4, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(277, 5, 5, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(278, 5, 5, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(279, 5, 5, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(280, 5, 5, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(281, 5, 5, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(282, 5, 5, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(283, 5, 5, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(284, 5, 5, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(285, 5, 5, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(286, 5, 5, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(287, 5, 5, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(288, 5, 5, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(289, 5, 6, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(290, 5, 6, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(291, 5, 6, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(292, 5, 6, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(293, 5, 6, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(294, 5, 6, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(295, 5, 6, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(296, 5, 6, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(297, 5, 6, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(298, 5, 6, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(299, 5, 6, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(300, 5, 6, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(301, 5, 7, 0, 1, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(302, 5, 7, 0, 2, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(303, 5, 7, 0, 3, 99, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(304, 5, 7, 0, 4, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(305, 5, 7, 0, 5, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(306, 5, 7, 0, 6, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(307, 5, 7, 0, 7, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(308, 5, 7, 0, 8, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(309, 5, 7, 0, 9, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(310, 5, 7, 0, 10, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(311, 5, 7, 0, 11, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(312, 5, 7, 0, 12, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(313, 5, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(314, 5, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(315, 5, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(316, 5, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(317, 5, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(318, 5, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(319, 5, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(320, 5, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(321, 5, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(322, 5, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(323, 5, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(324, 5, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(325, 5, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(326, 5, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(327, 5, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(328, 5, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(329, 5, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(330, 5, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(331, 5, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(332, 5, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(333, 5, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(334, 5, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(335, 5, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(336, 5, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(337, 5, 10, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(338, 5, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(339, 5, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(340, 5, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(341, 5, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(342, 5, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(343, 5, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(344, 5, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(345, 5, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(346, 5, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(347, 5, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(348, 5, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(349, 5, 11, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(350, 5, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(351, 5, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(352, 5, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(353, 5, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(354, 5, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(355, 5, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(356, 5, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(357, 5, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(358, 5, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(359, 5, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(360, 5, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(361, 5, 12, 0, 1, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(362, 5, 12, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(363, 5, 12, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(364, 5, 12, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(365, 5, 12, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(366, 5, 12, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(367, 5, 12, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(368, 5, 12, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(369, 5, 12, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(370, 5, 12, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(371, 5, 12, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(372, 5, 12, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(373, 5, 14, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(374, 5, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(375, 5, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(376, 5, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(377, 5, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(378, 5, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(379, 5, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(380, 5, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(381, 5, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(382, 5, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(383, 5, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(384, 5, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:26:19'),
(385, 6, 1, 1, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(386, 6, 1, 1, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(387, 6, 1, 1, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(388, 6, 1, 1, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(389, 6, 1, 1, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(390, 6, 1, 1, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(391, 6, 1, 1, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(392, 6, 1, 1, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(393, 6, 1, 1, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(394, 6, 1, 1, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(395, 6, 1, 1, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(396, 6, 1, 1, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(397, 6, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(398, 6, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(399, 6, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(400, 6, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(401, 6, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(402, 6, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(403, 6, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(404, 6, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(405, 6, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(406, 6, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(407, 6, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(408, 6, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(409, 6, 3, 0, 1, 3000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(410, 6, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(411, 6, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(412, 6, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(413, 6, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(414, 6, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(415, 6, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(416, 6, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(417, 6, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(418, 6, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(419, 6, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(420, 6, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(421, 6, 4, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(422, 6, 4, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(423, 6, 4, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(424, 6, 4, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(425, 6, 4, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(426, 6, 4, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(427, 6, 4, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(428, 6, 4, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(429, 6, 4, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(430, 6, 4, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(431, 6, 4, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(432, 6, 4, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(433, 6, 5, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(434, 6, 5, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(435, 6, 5, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(436, 6, 5, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(437, 6, 5, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(438, 6, 5, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(439, 6, 5, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(440, 6, 5, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(441, 6, 5, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(442, 6, 5, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(443, 6, 5, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(444, 6, 5, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(445, 6, 6, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(446, 6, 6, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(447, 6, 6, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(448, 6, 6, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(449, 6, 6, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(450, 6, 6, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(451, 6, 6, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(452, 6, 6, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(453, 6, 6, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(454, 6, 6, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(455, 6, 6, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(456, 6, 6, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(457, 6, 7, 0, 1, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(458, 6, 7, 0, 2, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(459, 6, 7, 0, 3, 99, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(460, 6, 7, 0, 4, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(461, 6, 7, 0, 5, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(462, 6, 7, 0, 6, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(463, 6, 7, 0, 7, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(464, 6, 7, 0, 8, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(465, 6, 7, 0, 9, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(466, 6, 7, 0, 10, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(467, 6, 7, 0, 11, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(468, 6, 7, 0, 12, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(469, 6, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(470, 6, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(471, 6, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(472, 6, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(473, 6, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(474, 6, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(475, 6, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(476, 6, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(477, 6, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(478, 6, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(479, 6, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(480, 6, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(481, 6, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(482, 6, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(483, 6, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(484, 6, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(485, 6, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(486, 6, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(487, 6, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(488, 6, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(489, 6, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(490, 6, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(491, 6, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(492, 6, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(493, 6, 10, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(494, 6, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(495, 6, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(496, 6, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(497, 6, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(498, 6, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(499, 6, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(500, 6, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(501, 6, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(502, 6, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(503, 6, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(504, 6, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(505, 6, 11, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(506, 6, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(507, 6, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(508, 6, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(509, 6, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(510, 6, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(511, 6, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(512, 6, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(513, 6, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(514, 6, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(515, 6, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(516, 6, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(517, 6, 12, 0, 1, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(518, 6, 12, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(519, 6, 12, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(520, 6, 12, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(521, 6, 12, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(522, 6, 12, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(523, 6, 12, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(524, 6, 12, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(525, 6, 12, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(526, 6, 12, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(527, 6, 12, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(528, 6, 12, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(529, 6, 14, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(530, 6, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(531, 6, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(532, 6, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(533, 6, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(534, 6, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(535, 6, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(536, 6, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(537, 6, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(538, 6, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(539, 6, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(540, 6, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:09'),
(541, 4, 1, 1, 1, 3000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(542, 4, 1, 1, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(543, 4, 1, 1, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(544, 4, 1, 1, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(545, 4, 1, 1, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(546, 4, 1, 1, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(547, 4, 1, 1, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(548, 4, 1, 1, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(549, 4, 1, 1, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(550, 4, 1, 1, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(551, 4, 1, 1, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(552, 4, 1, 1, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(553, 4, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(554, 4, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(555, 4, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(556, 4, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(557, 4, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(558, 4, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(559, 4, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(560, 4, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(561, 4, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(562, 4, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(563, 4, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(564, 4, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(565, 4, 3, 0, 1, 3000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(566, 4, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(567, 4, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(568, 4, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(569, 4, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(570, 4, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(571, 4, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(572, 4, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(573, 4, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(574, 4, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(575, 4, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(576, 4, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(577, 4, 4, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(578, 4, 4, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(579, 4, 4, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(580, 4, 4, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(581, 4, 4, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(582, 4, 4, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(583, 4, 4, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(584, 4, 4, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(585, 4, 4, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(586, 4, 4, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(587, 4, 4, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(588, 4, 4, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(589, 4, 5, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(590, 4, 5, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(591, 4, 5, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(592, 4, 5, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(593, 4, 5, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(594, 4, 5, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(595, 4, 5, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(596, 4, 5, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(597, 4, 5, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(598, 4, 5, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(599, 4, 5, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(600, 4, 5, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(601, 4, 6, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(602, 4, 6, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(603, 4, 6, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(604, 4, 6, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(605, 4, 6, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(606, 4, 6, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(607, 4, 6, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(608, 4, 6, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(609, 4, 6, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(610, 4, 6, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(611, 4, 6, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(612, 4, 6, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(613, 4, 7, 0, 1, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(614, 4, 7, 0, 2, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(615, 4, 7, 0, 3, 99, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(616, 4, 7, 0, 4, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(617, 4, 7, 0, 5, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(618, 4, 7, 0, 6, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(619, 4, 7, 0, 7, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(620, 4, 7, 0, 8, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(621, 4, 7, 0, 9, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(622, 4, 7, 0, 10, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(623, 4, 7, 0, 11, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(624, 4, 7, 0, 12, 100, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(625, 4, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(626, 4, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(627, 4, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(628, 4, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(629, 4, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(630, 4, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(631, 4, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(632, 4, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(633, 4, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(634, 4, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(635, 4, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(636, 4, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(637, 4, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(638, 4, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(639, 4, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(640, 4, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(641, 4, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(642, 4, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(643, 4, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(644, 4, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(645, 4, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(646, 4, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(647, 4, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(648, 4, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(649, 4, 10, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(650, 4, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(651, 4, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(652, 4, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(653, 4, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(654, 4, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(655, 4, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(656, 4, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(657, 4, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(658, 4, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(659, 4, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(660, 4, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(661, 4, 11, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(662, 4, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(663, 4, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(664, 4, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(665, 4, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(666, 4, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(667, 4, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(668, 4, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(669, 4, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(670, 4, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(671, 4, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(672, 4, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(673, 4, 12, 0, 1, 1000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(674, 4, 12, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(675, 4, 12, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(676, 4, 12, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(677, 4, 12, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(678, 4, 12, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(679, 4, 12, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(680, 4, 12, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(681, 4, 12, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(682, 4, 12, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(683, 4, 12, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(684, 4, 12, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(685, 4, 14, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(686, 4, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(687, 4, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(688, 4, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(689, 4, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42');
INSERT INTO `fee_structure_table` (`FS_Id`, `FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Session`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(690, 4, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(691, 4, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(692, 4, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(693, 4, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(694, 4, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(695, 4, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(696, 4, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:27:42'),
(697, 30, 13, 0, 1, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(698, 30, 13, 0, 2, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(699, 30, 13, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(700, 30, 13, 0, 4, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(701, 30, 13, 0, 5, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(702, 30, 13, 0, 6, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(703, 30, 13, 0, 7, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(704, 30, 13, 0, 8, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(705, 30, 13, 0, 9, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(706, 30, 13, 0, 10, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(707, 30, 13, 0, 11, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(708, 30, 13, 0, 12, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:33'),
(709, 29, 13, 0, 1, 2, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(710, 29, 13, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(711, 29, 13, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(712, 29, 13, 0, 4, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(713, 29, 13, 0, 5, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(714, 29, 13, 0, 6, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(715, 29, 13, 0, 7, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(716, 29, 13, 0, 8, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(717, 29, 13, 0, 9, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(718, 29, 13, 0, 10, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(719, 29, 13, 0, 11, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(720, 29, 13, 0, 12, 1, '2020-2021', 1, 1, 'admin', '2021-01-19 10:31:44'),
(721, 8, 1, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(722, 8, 1, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(723, 8, 1, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(724, 8, 1, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(725, 8, 1, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(726, 8, 1, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(727, 8, 1, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(728, 8, 1, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(729, 8, 1, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(730, 8, 1, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(731, 8, 1, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(732, 8, 1, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(733, 8, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(734, 8, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(735, 8, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(736, 8, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(737, 8, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(738, 8, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(739, 8, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(740, 8, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(741, 8, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(742, 8, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(743, 8, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(744, 8, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(745, 8, 3, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(746, 8, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(747, 8, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(748, 8, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(749, 8, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(750, 8, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(751, 8, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(752, 8, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(753, 8, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(754, 8, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(755, 8, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(756, 8, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(757, 8, 4, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(758, 8, 4, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(759, 8, 4, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(760, 8, 4, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(761, 8, 4, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(762, 8, 4, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(763, 8, 4, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(764, 8, 4, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(765, 8, 4, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(766, 8, 4, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(767, 8, 4, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(768, 8, 4, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(769, 8, 5, 0, 1, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(770, 8, 5, 0, 2, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(771, 8, 5, 0, 3, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(772, 8, 5, 0, 4, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(773, 8, 5, 0, 5, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(774, 8, 5, 0, 6, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(775, 8, 5, 0, 7, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(776, 8, 5, 0, 8, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(777, 8, 5, 0, 9, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(778, 8, 5, 0, 10, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(779, 8, 5, 0, 11, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(780, 8, 5, 0, 12, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(781, 8, 6, 0, 1, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(782, 8, 6, 0, 2, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(783, 8, 6, 0, 3, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(784, 8, 6, 0, 4, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(785, 8, 6, 0, 5, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(786, 8, 6, 0, 6, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(787, 8, 6, 0, 7, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(788, 8, 6, 0, 8, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(789, 8, 6, 0, 9, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(790, 8, 6, 0, 10, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(791, 8, 6, 0, 11, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(792, 8, 6, 0, 12, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(793, 8, 7, 0, 1, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(794, 8, 7, 0, 2, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(795, 8, 7, 0, 3, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(796, 8, 7, 0, 4, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(797, 8, 7, 0, 5, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(798, 8, 7, 0, 6, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(799, 8, 7, 0, 7, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(800, 8, 7, 0, 8, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(801, 8, 7, 0, 9, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(802, 8, 7, 0, 10, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(803, 8, 7, 0, 11, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(804, 8, 7, 0, 12, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(805, 8, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(806, 8, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(807, 8, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(808, 8, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(809, 8, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(810, 8, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(811, 8, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(812, 8, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(813, 8, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(814, 8, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(815, 8, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(816, 8, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(817, 8, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(818, 8, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(819, 8, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(820, 8, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(821, 8, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(822, 8, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(823, 8, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(824, 8, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(825, 8, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(826, 8, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(827, 8, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(828, 8, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(829, 8, 10, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(830, 8, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(831, 8, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(832, 8, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(833, 8, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(834, 8, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(835, 8, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(836, 8, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(837, 8, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(838, 8, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(839, 8, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(840, 8, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(841, 8, 11, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(842, 8, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(843, 8, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(844, 8, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(845, 8, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(846, 8, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(847, 8, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(848, 8, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(849, 8, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(850, 8, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(851, 8, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(852, 8, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(853, 8, 12, 0, 1, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(854, 8, 12, 0, 2, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(855, 8, 12, 0, 3, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(856, 8, 12, 0, 4, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(857, 8, 12, 0, 5, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(858, 8, 12, 0, 6, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(859, 8, 12, 0, 7, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(860, 8, 12, 0, 8, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(861, 8, 12, 0, 9, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(862, 8, 12, 0, 10, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(863, 8, 12, 0, 11, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(864, 8, 12, 0, 12, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(865, 8, 14, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(866, 8, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(867, 8, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(868, 8, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(869, 8, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(870, 8, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(871, 8, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(872, 8, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(873, 8, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(874, 8, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(875, 8, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(876, 8, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:09:14'),
(877, 9, 1, 0, 1, 7000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(878, 9, 1, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(879, 9, 1, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(880, 9, 1, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(881, 9, 1, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(882, 9, 1, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(883, 9, 1, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(884, 9, 1, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(885, 9, 1, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(886, 9, 1, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(887, 9, 1, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(888, 9, 1, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(889, 9, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(890, 9, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(891, 9, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(892, 9, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(893, 9, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(894, 9, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(895, 9, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(896, 9, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(897, 9, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(898, 9, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(899, 9, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(900, 9, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(901, 9, 3, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(902, 9, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(903, 9, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(904, 9, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(905, 9, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(906, 9, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(907, 9, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(908, 9, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(909, 9, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(910, 9, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(911, 9, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(912, 9, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(913, 9, 4, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(914, 9, 4, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(915, 9, 4, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(916, 9, 4, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(917, 9, 4, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(918, 9, 4, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(919, 9, 4, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(920, 9, 4, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(921, 9, 4, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(922, 9, 4, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(923, 9, 4, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(924, 9, 4, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(925, 9, 5, 0, 1, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(926, 9, 5, 0, 2, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(927, 9, 5, 0, 3, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(928, 9, 5, 0, 4, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(929, 9, 5, 0, 5, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(930, 9, 5, 0, 6, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(931, 9, 5, 0, 7, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(932, 9, 5, 0, 8, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(933, 9, 5, 0, 9, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(934, 9, 5, 0, 10, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(935, 9, 5, 0, 11, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(936, 9, 5, 0, 12, 600, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(937, 9, 6, 0, 1, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(938, 9, 6, 0, 2, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(939, 9, 6, 0, 3, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(940, 9, 6, 0, 4, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(941, 9, 6, 0, 5, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(942, 9, 6, 0, 6, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(943, 9, 6, 0, 7, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(944, 9, 6, 0, 8, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(945, 9, 6, 0, 9, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(946, 9, 6, 0, 10, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(947, 9, 6, 0, 11, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(948, 9, 6, 0, 12, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(949, 9, 7, 0, 1, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(950, 9, 7, 0, 2, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(951, 9, 7, 0, 3, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(952, 9, 7, 0, 4, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(953, 9, 7, 0, 5, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(954, 9, 7, 0, 6, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(955, 9, 7, 0, 7, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(956, 9, 7, 0, 8, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(957, 9, 7, 0, 9, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(958, 9, 7, 0, 10, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(959, 9, 7, 0, 11, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(960, 9, 7, 0, 12, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(961, 9, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(962, 9, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(963, 9, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(964, 9, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(965, 9, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(966, 9, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(967, 9, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(968, 9, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(969, 9, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(970, 9, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(971, 9, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(972, 9, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(973, 9, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(974, 9, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(975, 9, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(976, 9, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(977, 9, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(978, 9, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(979, 9, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(980, 9, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(981, 9, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(982, 9, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(983, 9, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(984, 9, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(985, 9, 10, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(986, 9, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(987, 9, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(988, 9, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(989, 9, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(990, 9, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(991, 9, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(992, 9, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(993, 9, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(994, 9, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(995, 9, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(996, 9, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(997, 9, 11, 0, 1, 4500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(998, 9, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(999, 9, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1000, 9, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1001, 9, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1002, 9, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1003, 9, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1004, 9, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1005, 9, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1006, 9, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1007, 9, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1008, 9, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1009, 9, 12, 0, 1, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1010, 9, 12, 0, 2, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1011, 9, 12, 0, 3, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1012, 9, 12, 0, 4, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1013, 9, 12, 0, 5, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1014, 9, 12, 0, 6, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1015, 9, 12, 0, 7, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1016, 9, 12, 0, 8, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1017, 9, 12, 0, 9, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1018, 9, 12, 0, 10, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1019, 9, 12, 0, 11, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1020, 9, 12, 0, 12, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1021, 9, 14, 0, 1, 6000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1022, 9, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1023, 9, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1024, 9, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1025, 9, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1026, 9, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1027, 9, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1028, 9, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1029, 9, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1030, 9, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1031, 9, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1032, 9, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:10:47'),
(1033, 12, 1, 0, 1, 7000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1034, 12, 1, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1035, 12, 1, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1036, 12, 1, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1037, 12, 1, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1038, 12, 1, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1039, 12, 1, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1040, 12, 1, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1041, 12, 1, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1042, 12, 1, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1043, 12, 1, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1044, 12, 1, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1045, 12, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1046, 12, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1047, 12, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1048, 12, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1049, 12, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1050, 12, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1051, 12, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1052, 12, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1053, 12, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1054, 12, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1055, 12, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1056, 12, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1057, 12, 3, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1058, 12, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1059, 12, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1060, 12, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1061, 12, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1062, 12, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1063, 12, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1064, 12, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1065, 12, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1066, 12, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1067, 12, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1068, 12, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1069, 12, 4, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1070, 12, 4, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1071, 12, 4, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1072, 12, 4, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1073, 12, 4, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1074, 12, 4, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1075, 12, 4, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1076, 12, 4, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1077, 12, 4, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1078, 12, 4, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1079, 12, 4, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1080, 12, 4, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1081, 12, 5, 0, 1, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1082, 12, 5, 0, 2, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1083, 12, 5, 0, 3, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1084, 12, 5, 0, 4, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1085, 12, 5, 0, 5, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1086, 12, 5, 0, 6, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1087, 12, 5, 0, 7, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1088, 12, 5, 0, 8, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1089, 12, 5, 0, 9, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1090, 12, 5, 0, 10, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1091, 12, 5, 0, 11, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1092, 12, 5, 0, 12, 800, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1093, 12, 6, 0, 1, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1094, 12, 6, 0, 2, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1095, 12, 6, 0, 3, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1096, 12, 6, 0, 4, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1097, 12, 6, 0, 5, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1098, 12, 6, 0, 6, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1099, 12, 6, 0, 7, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1100, 12, 6, 0, 8, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1101, 12, 6, 0, 9, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1102, 12, 6, 0, 10, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1103, 12, 6, 0, 11, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1104, 12, 6, 0, 12, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1105, 12, 7, 0, 1, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1106, 12, 7, 0, 2, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1107, 12, 7, 0, 3, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1108, 12, 7, 0, 4, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1109, 12, 7, 0, 5, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1110, 12, 7, 0, 6, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1111, 12, 7, 0, 7, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1112, 12, 7, 0, 8, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1113, 12, 7, 0, 9, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1114, 12, 7, 0, 10, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1115, 12, 7, 0, 11, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1116, 12, 7, 0, 12, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1117, 12, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1118, 12, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1119, 12, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1120, 12, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1121, 12, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1122, 12, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1123, 12, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1124, 12, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1125, 12, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1126, 12, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1127, 12, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1128, 12, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1129, 12, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1130, 12, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1131, 12, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1132, 12, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1133, 12, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1134, 12, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1135, 12, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1136, 12, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1137, 12, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1138, 12, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1139, 12, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1140, 12, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1141, 12, 10, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1142, 12, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1143, 12, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1144, 12, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1145, 12, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1146, 12, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1147, 12, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1148, 12, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1149, 12, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1150, 12, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1151, 12, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1152, 12, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1153, 12, 11, 0, 1, 4500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1154, 12, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1155, 12, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1156, 12, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1157, 12, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1158, 12, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1159, 12, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1160, 12, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1161, 12, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1162, 12, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1163, 12, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1164, 12, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1165, 12, 12, 0, 1, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1166, 12, 12, 0, 2, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1167, 12, 12, 0, 3, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1168, 12, 12, 0, 4, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1169, 12, 12, 0, 5, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1170, 12, 12, 0, 6, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1171, 12, 12, 0, 7, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1172, 12, 12, 0, 8, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1173, 12, 12, 0, 9, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1174, 12, 12, 0, 10, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1175, 12, 12, 0, 11, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1176, 12, 12, 0, 12, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1177, 12, 14, 0, 1, 6000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1178, 12, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1179, 12, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1180, 12, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1181, 12, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1182, 12, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1183, 12, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1184, 12, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1185, 12, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1186, 12, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1187, 12, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1188, 12, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:12:02'),
(1189, 10, 1, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1190, 10, 1, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1191, 10, 1, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1192, 10, 1, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1193, 10, 1, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1194, 10, 1, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1195, 10, 1, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1196, 10, 1, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1197, 10, 1, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1198, 10, 1, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1199, 10, 1, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1200, 10, 1, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1201, 10, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1202, 10, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1203, 10, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1204, 10, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1205, 10, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1206, 10, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1207, 10, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1208, 10, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1209, 10, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1210, 10, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1211, 10, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1212, 10, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1213, 10, 3, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1214, 10, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1215, 10, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1216, 10, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1217, 10, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1218, 10, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1219, 10, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1220, 10, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1221, 10, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1222, 10, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1223, 10, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1224, 10, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1225, 10, 4, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1226, 10, 4, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1227, 10, 4, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1228, 10, 4, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1229, 10, 4, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1230, 10, 4, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1231, 10, 4, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1232, 10, 4, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1233, 10, 4, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1234, 10, 4, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1235, 10, 4, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1236, 10, 4, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1237, 10, 5, 0, 1, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1238, 10, 5, 0, 2, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1239, 10, 5, 0, 3, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1240, 10, 5, 0, 4, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1241, 10, 5, 0, 5, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1242, 10, 5, 0, 6, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1243, 10, 5, 0, 7, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1244, 10, 5, 0, 8, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1245, 10, 5, 0, 9, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1246, 10, 5, 0, 10, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1247, 10, 5, 0, 11, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1248, 10, 5, 0, 12, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1249, 10, 6, 0, 1, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1250, 10, 6, 0, 2, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1251, 10, 6, 0, 3, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1252, 10, 6, 0, 4, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1253, 10, 6, 0, 5, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1254, 10, 6, 0, 6, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1255, 10, 6, 0, 7, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1256, 10, 6, 0, 8, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1257, 10, 6, 0, 9, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1258, 10, 6, 0, 10, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1259, 10, 6, 0, 11, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1260, 10, 6, 0, 12, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1261, 10, 7, 0, 1, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1262, 10, 7, 0, 2, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1263, 10, 7, 0, 3, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1264, 10, 7, 0, 4, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1265, 10, 7, 0, 5, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1266, 10, 7, 0, 6, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1267, 10, 7, 0, 7, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1268, 10, 7, 0, 8, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1269, 10, 7, 0, 9, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1270, 10, 7, 0, 10, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1271, 10, 7, 0, 11, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1272, 10, 7, 0, 12, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1273, 10, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1274, 10, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1275, 10, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1276, 10, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1277, 10, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1278, 10, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1279, 10, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1280, 10, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1281, 10, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1282, 10, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1283, 10, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1284, 10, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1285, 10, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1286, 10, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1287, 10, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1288, 10, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1289, 10, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1290, 10, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1291, 10, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1292, 10, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1293, 10, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1294, 10, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1295, 10, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1296, 10, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1297, 10, 10, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1298, 10, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1299, 10, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1300, 10, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1301, 10, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1302, 10, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1303, 10, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1304, 10, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1305, 10, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1306, 10, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1307, 10, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1308, 10, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1309, 10, 11, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1310, 10, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1311, 10, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1312, 10, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1313, 10, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1314, 10, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1315, 10, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1316, 10, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1317, 10, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1318, 10, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1319, 10, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1320, 10, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1321, 10, 12, 0, 1, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1322, 10, 12, 0, 2, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1323, 10, 12, 0, 3, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1324, 10, 12, 0, 4, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1325, 10, 12, 0, 5, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1326, 10, 12, 0, 6, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1327, 10, 12, 0, 7, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1328, 10, 12, 0, 8, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1329, 10, 12, 0, 9, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1330, 10, 12, 0, 10, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1331, 10, 12, 0, 11, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1332, 10, 12, 0, 12, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1333, 10, 14, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1334, 10, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1335, 10, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1336, 10, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1337, 10, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1338, 10, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1339, 10, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1340, 10, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1341, 10, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1342, 10, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1343, 10, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1344, 10, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:15:32'),
(1345, 7, 1, 0, 1, 5000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1346, 7, 1, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1347, 7, 1, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1348, 7, 1, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1349, 7, 1, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1350, 7, 1, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1351, 7, 1, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1352, 7, 1, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1353, 7, 1, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1354, 7, 1, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1355, 7, 1, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1356, 7, 1, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1357, 7, 2, 0, 1, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1358, 7, 2, 0, 2, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1359, 7, 2, 0, 3, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1360, 7, 2, 0, 4, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1361, 7, 2, 0, 5, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1362, 7, 2, 0, 6, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1363, 7, 2, 0, 7, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1364, 7, 2, 0, 8, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1365, 7, 2, 0, 9, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06');
INSERT INTO `fee_structure_table` (`FS_Id`, `FG_Id`, `Fee_Head_Id`, `Fee_Installment_Type`, `Installment_Id`, `Fee_Amount`, `Session`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1366, 7, 2, 0, 10, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1367, 7, 2, 0, 11, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1368, 7, 2, 0, 12, 2000, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1369, 7, 3, 0, 1, 3500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1370, 7, 3, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1371, 7, 3, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1372, 7, 3, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1373, 7, 3, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1374, 7, 3, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1375, 7, 3, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1376, 7, 3, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1377, 7, 3, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1378, 7, 3, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1379, 7, 3, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1380, 7, 3, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1381, 7, 4, 0, 1, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1382, 7, 4, 0, 2, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1383, 7, 4, 0, 3, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1384, 7, 4, 0, 4, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1385, 7, 4, 0, 5, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1386, 7, 4, 0, 6, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1387, 7, 4, 0, 7, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1388, 7, 4, 0, 8, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1389, 7, 4, 0, 9, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1390, 7, 4, 0, 10, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1391, 7, 4, 0, 11, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1392, 7, 4, 0, 12, 500, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1393, 7, 5, 0, 1, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1394, 7, 5, 0, 2, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1395, 7, 5, 0, 3, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1396, 7, 5, 0, 4, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1397, 7, 5, 0, 5, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1398, 7, 5, 0, 6, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1399, 7, 5, 0, 7, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1400, 7, 5, 0, 8, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1401, 7, 5, 0, 9, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1402, 7, 5, 0, 10, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1403, 7, 5, 0, 11, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1404, 7, 5, 0, 12, 550, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1405, 7, 6, 0, 1, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1406, 7, 6, 0, 2, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1407, 7, 6, 0, 3, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1408, 7, 6, 0, 4, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1409, 7, 6, 0, 5, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1410, 7, 6, 0, 6, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1411, 7, 6, 0, 7, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1412, 7, 6, 0, 8, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1413, 7, 6, 0, 9, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1414, 7, 6, 0, 10, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1415, 7, 6, 0, 11, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1416, 7, 6, 0, 12, 400, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1417, 7, 7, 0, 1, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1418, 7, 7, 0, 2, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1419, 7, 7, 0, 3, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1420, 7, 7, 0, 4, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1421, 7, 7, 0, 5, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1422, 7, 7, 0, 6, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1423, 7, 7, 0, 7, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1424, 7, 7, 0, 8, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1425, 7, 7, 0, 9, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1426, 7, 7, 0, 10, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1427, 7, 7, 0, 11, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1428, 7, 7, 0, 12, 300, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1429, 7, 8, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1430, 7, 8, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1431, 7, 8, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1432, 7, 8, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1433, 7, 8, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1434, 7, 8, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1435, 7, 8, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1436, 7, 8, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1437, 7, 8, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1438, 7, 8, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1439, 7, 8, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1440, 7, 8, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1441, 7, 9, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1442, 7, 9, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1443, 7, 9, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1444, 7, 9, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1445, 7, 9, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1446, 7, 9, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1447, 7, 9, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1448, 7, 9, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1449, 7, 9, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1450, 7, 9, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1451, 7, 9, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1452, 7, 9, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1453, 7, 10, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1454, 7, 10, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1455, 7, 10, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1456, 7, 10, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1457, 7, 10, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1458, 7, 10, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1459, 7, 10, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1460, 7, 10, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1461, 7, 10, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1462, 7, 10, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1463, 7, 10, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1464, 7, 10, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1465, 7, 11, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1466, 7, 11, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1467, 7, 11, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1468, 7, 11, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1469, 7, 11, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1470, 7, 11, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1471, 7, 11, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1472, 7, 11, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1473, 7, 11, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1474, 7, 11, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1475, 7, 11, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1476, 7, 11, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1477, 7, 12, 0, 1, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1478, 7, 12, 0, 2, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1479, 7, 12, 0, 3, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1480, 7, 12, 0, 4, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1481, 7, 12, 0, 5, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1482, 7, 12, 0, 6, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1483, 7, 12, 0, 7, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1484, 7, 12, 0, 8, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1485, 7, 12, 0, 9, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1486, 7, 12, 0, 10, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1487, 7, 12, 0, 11, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1488, 7, 12, 0, 12, 250, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1489, 7, 14, 0, 1, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1490, 7, 14, 0, 2, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1491, 7, 14, 0, 3, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1492, 7, 14, 0, 4, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1493, 7, 14, 0, 5, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1494, 7, 14, 0, 6, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1495, 7, 14, 0, 7, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1496, 7, 14, 0, 8, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1497, 7, 14, 0, 9, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1498, 7, 14, 0, 10, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1499, 7, 14, 0, 11, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06'),
(1500, 7, 14, 0, 12, 0, '2020-2021', 1, 1, 'admin', '2021-01-19 20:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `installment_master_table`
--

CREATE TABLE `installment_master_table` (
  `Installment_Id` int(11) NOT NULL,
  `Installment_Name` varchar(50) NOT NULL,
  `Installment_Month` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `installment_master_table`
--

INSERT INTO `installment_master_table` (`Installment_Id`, `Installment_Name`, `Installment_Month`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 'Apr', 4, 1, 1, 'admin', '2020-12-09 19:15:58'),
(2, 'May', 5, 1, 1, 'admin', '2020-12-09 19:15:58'),
(3, 'Jun', 6, 1, 1, 'admin', '2020-12-09 19:15:58'),
(4, 'Jul', 7, 1, 1, 'admin', '2020-12-09 19:15:58'),
(5, 'Aug', 8, 1, 1, 'admin', '2020-12-09 19:15:58'),
(6, 'Sep', 9, 1, 1, 'admin', '2020-12-09 19:15:58'),
(7, 'Oct', 10, 1, 1, 'admin', '2020-12-09 19:15:58'),
(8, 'Nov', 11, 1, 1, 'admin', '2020-12-09 19:15:58'),
(9, 'Dec', 12, 1, 1, 'admin', '2020-12-09 19:15:58'),
(10, 'Jan', 1, 1, 1, 'admin', '2020-12-09 19:15:58'),
(11, 'Feb', 2, 1, 1, 'admin', '2020-12-09 19:15:58'),
(12, 'Mar', 3, 1, 1, 'admin', '2020-12-09 19:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `lead_source_table`
--

CREATE TABLE `lead_source_table` (
  `leadid` int(11) DEFAULT NULL,
  `lead_source_name` varchar(100) DEFAULT NULL,
  `school_id` smallint(6) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SCHOOL_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`LID`, `LOGIN_ID`, `PASSWORD`, `LOGIN_TYPE`, `LOGIN_STATUS`, `MOBILE_NO`, `OTP`, `LOGIN_TIME`, `LOGIN_FAILED_COUNT`, `ENABLED`, `CREATED_BY`, `CREATED_ON`, `SCHOOL_ID`) VALUES
(1, 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'STAFF', 1, '8709321740', '', '2021-01-21 12:40:22', 0, 1, 'admin', '2021-01-21 07:10:22', 1),
(2, 'shubham', '8cb2237d0679ca88db6464eac60da96345513964', 'STAFF', 1, '8709321740', '', '2021-01-21 12:40:35', 0, 1, 'admin', '2021-01-21 07:10:35', 1),
(3, 'rahul', '8cb2237d0679ca88db6464eac60da96345513964', 'STAFF', 1, '8709321740', '', '2021-01-20 14:33:58', 0, 1, 'admin', '2021-01-20 09:03:58', 1),
(4, 'student2', '8cb2237d0679ca88db6464eac60da96345513964', 'STUDENT', 1, '8709321740', '', '2020-11-29 02:54:34', 0, 1, 'admin', '2020-11-28 21:24:34', 1);

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
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `View_Status` tinyint(1) NOT NULL DEFAULT '0',
  `User_Type` enum('STUDENT','STAFF','OTHERS') NOT NULL,
  `User_Id` varchar(100) DEFAULT NULL,
  `Group_Id` int(11) DEFAULT NULL COMMENT 'THIS COLUMN I0S USED TO STORE CLASS_SECTION_ID OR DEPARTMENT_ID OR CUG_GROUP_ID FOR THE RECORDS WHICH BELONGS TO GROUP MESSAGING PROCESS.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_details_table`
--

INSERT INTO `message_details_table` (`MD_Id`, `Message_Id`, `Message`, `Mobile_Number`, `Delivery_Date`, `Delivery_Status`, `View_Status`, `User_Type`, `User_Id`, `Group_Id`) VALUES
(77, 1, '', '8789600180', '0000-00-00 00:00:00', 0, 0, 'STUDENT', '61/2020', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message_master_table`
--

CREATE TABLE `message_master_table` (
  `Message_Id` bigint(20) UNSIGNED NOT NULL,
  `Message_Category` enum('Attendance','Fee','Transport','Notice','Communication') NOT NULL,
  `Message_Title` varchar(200) NOT NULL,
  `Message` varchar(800) DEFAULT NULL,
  `Message_Date` datetime NOT NULL,
  `Message_Type` enum('SMS','Whatsapp') DEFAULT NULL,
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_master_table`
--

INSERT INTO `message_master_table` (`Message_Id`, `Message_Category`, `Message_Title`, `Message`, `Message_Date`, `Message_Type`, `School_Id`, `Created_By`, `Created_On`) VALUES
(1, 'Communication', 'DSFGFD GAF', 'DS ASD DSA', '2020-12-09 00:04:00', 'SMS', 1, 'admin', '2020-12-08 23:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `message_user_group_table`
--

CREATE TABLE `message_user_group_table` (
  `User_Type_Id` int(11) NOT NULL,
  `User_Type` varchar(100) NOT NULL,
  `Individual_Select_Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Group_Select_Enabled` int(11) NOT NULL DEFAULT '1',
  `CUG_Enabled` tinyint(1) NOT NULL COMMENT 'IT DEFINES IF THE GROUP WILL BE DISPLAYED IN CUG CREATION FORM OR NOT. 1 TO DISPLAY AND 0 TO HIDE.',
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Publish_In_Web` tinyint(1) NOT NULL DEFAULT '0',
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_class_attendance`
--

CREATE TABLE `online_class_attendance` (
  `OLCA_Id` int(11) NOT NULL,
  `OLC_Id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `Attendance_Status` enum('PRESENT','ABSENT') NOT NULL,
  `User_Type` varchar(20) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_class_attendance`
--

INSERT INTO `online_class_attendance` (`OLCA_Id`, `OLC_Id`, `Student_Id`, `Attendance_Status`, `User_Type`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 6, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(2, 1, 7, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(3, 1, 11, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(4, 1, 18, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(5, 1, 23, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(6, 1, 27, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(7, 1, 29, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(8, 1, 34, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(9, 1, 35, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(10, 1, 40, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(11, 1, 41, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(12, 1, 42, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(13, 1, 44, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(14, 1, 45, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(15, 1, 47, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(16, 1, 48, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(17, 1, 49, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(18, 1, 50, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(19, 1, 52, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(20, 1, 53, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(21, 1, 54, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(22, 1, 55, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(23, 1, 57, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(24, 1, 59, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(25, 1, 62, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(26, 1, 67, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(27, 1, 69, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(28, 1, 70, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(29, 1, 13, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(30, 1, 15, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(31, 1, 46, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28'),
(32, 1, 2, 'ABSENT', 'admin', 1, 'admin', '2020-12-11 18:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `online_class_table`
--

CREATE TABLE `online_class_table` (
  `OLC_Id` int(11) NOT NULL,
  `Set_Id` int(11) NOT NULL,
  `Class_Topic` varchar(100) NOT NULL,
  `Class_Description` text NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Class_Sec_Id` int(11) NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `Class_Type` enum('Zoom','Google-Meet') NOT NULL,
  `Start_date` datetime NOT NULL,
  `End_Date` datetime NOT NULL,
  `Class_Duration` int(11) NOT NULL,
  `URL` varchar(1000) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_class_table`
--

INSERT INTO `online_class_table` (`OLC_Id`, `Set_Id`, `Class_Topic`, `Class_Description`, `Class_Id`, `Class_Sec_Id`, `Subject_Id`, `Staff_Id`, `Class_Type`, `Start_date`, `End_Date`, `Class_Duration`, `URL`, `School_Id`, `Enabled`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 'Online Class Link', '  dasd as da dadsd asdsadsadsadsadsadsadasdadsd asasd asd', 16, 27, 1, 2, 'Zoom', '2020-12-11 23:37:00', '2020-12-13 23:37:00', 8, 'https://meet.google.com/mes-kdds-bck', 1, 1, 'admin', '2020-12-13 06:25:15');

-- --------------------------------------------------------

--
-- Table structure for table `paymode_master_table`
--

CREATE TABLE `paymode_master_table` (
  `Paymode_Id` int(11) NOT NULL,
  `Paymode_Name` varchar(50) NOT NULL,
  `Service_Percent` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymode_master_table`
--

INSERT INTO `paymode_master_table` (`Paymode_Id`, `Paymode_Name`, `Service_Percent`, `Enabled`) VALUES
(1, 'Cash', 0, 1),
(2, 'Cheque', 0, 1),
(3, 'Credit Card', 2, 1),
(4, 'Debit Card', 2, 1),
(5, 'Demand Draft', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_master_table`
--

CREATE TABLE `school_master_table` (
  `school_id` mediumint(8) UNSIGNED NOT NULL,
  `school_code` varchar(3) NOT NULL,
  `school_name` varchar(200) DEFAULT NULL,
  `School_Header_Line1` varchar(100) NOT NULL,
  `School_Header_Line2` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(6) NOT NULL,
  `district_id` int(5) UNSIGNED DEFAULT NULL,
  `business_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `start_year` year(4) DEFAULT NULL,
  `session` varchar(10) NOT NULL,
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
  `addmission_status` tinyint(1) DEFAULT '0',
  `opening_balance` float(12,2) DEFAULT NULL,
  `closing_balance` float(12,2) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT '0',
  `conf_flag` tinyint(1) DEFAULT '0',
  `created_by` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_master_table`
--

INSERT INTO `school_master_table` (`school_id`, `school_code`, `school_name`, `School_Header_Line1`, `School_Header_Line2`, `area`, `city`, `zip_code`, `district_id`, `business_id`, `start_year`, `session`, `end_year`, `start_month`, `end_month`, `start_date`, `end_date`, `next_start_year`, `next_end_year`, `next_start_month`, `next_end_month`, `next_start_date`, `next_end_date`, `current_addmission`, `addmission_status`, `opening_balance`, `closing_balance`, `updated_on`, `updated_by`, `enabled`, `conf_flag`, `created_by`, `created_on`) VALUES
(1, 'ABC', 'The ABC PAATHSHALA', '', '', 'BARI CO-OPERATIVE', 'Bokaro Steel City', '', 2, 1, 2020, '2020-2021', 2021, 4, 3, '2020-04-01', '2021-03-31', 2021, 2022, 4, 3, '2021-04-01', '2022-03-31', 2020, 1, NULL, NULL, '2021-01-18 07:23:31', 'mukherjee.mit@gmail.com', 1, 1, NULL, NULL);

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
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `Default_Session` varchar(10) NOT NULL,
  `Default_Start_Year` int(4) DEFAULT NULL,
  `Default_End_Year` int(4) DEFAULT NULL,
  `School_Id` int(5) DEFAULT '1',
  `Enabled` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_master_table`
--

INSERT INTO `staff_master_table` (`Staff_Id`, `Staff_Name`, `Gender`, `Contact_No`, `Staff_Email`, `Category`, `Department`, `Designation_Id`, `Alt_Contact_No`, `Address`, `City`, `District`, `State`, `Fathers_Or_Husband_Name`, `DOB`, `Blood_Group`, `Qualification`, `Experience`, `DOJ`, `Job_Status`, `Bank_Account_No`, `Bank_Name`, `Bank_Branch`, `Bank_IFSC`, `PAN_No`, `Aadhar_No`, `UAN_No`, `PF_Acc_No`, `ESI_Acc_No`, `Role`, `Login_Id`, `Default_Session`, `Default_Start_Year`, `Default_End_Year`, `School_Id`, `Enabled`) VALUES
('1', 'Shubham', 'MALE', '1111111111', 'saff1@gmail1.com', 'Non-Teaching', 2, 2, '1234567881', 'jharkhand1', 'Jharkhand11', '4', '4', 'test father name11', '2020-11-13', 'o-', 'test qualification-', 1, '2020-11-05', '', 'testbankacc11111', 'test bank name111', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', 'shubham', '2020-2021', NULL, NULL, 1, 1),
('2', 'Sushil Tripathi', 'MALE', '9801301878', 'SMSVENTURE2020@GMAIL.COM', 'Teaching', 2, 1, '234353345', 'sgfdfgdgd ', 'dfgdgdg', '1', '2', 'sdfdfs', '1980-10-10', 'sfs', 'fdsfs', 10, '2020-11-02', 'fdgdgdgfds', '', '345353', 'Gfgdfg', 'dgdgd', 'gdgdfg', 'bfhfgghf', 'ddgdgd', 'sdggfd', 'ssgd', 'ADMIN', 'admin', '2020-2021', 2020, 2021, 1, 1),
('3', 'Rahul', 'MALE', '1111111111', 'saff1@gmail1.com', 'Teaching', 2, 2, '1234567881', 'jharkhand1', 'Jharkhand11', '4', '4', 'test father name11', '2020-11-13', 'o-', 'test qualification-', 1, '2020-11-05', '', 'testbankacc11111', 'test bank name111', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', 'rahul', '2020-2021', NULL, NULL, 1, 1),
('4', 'Test Staff1', 'MALE', '1234567890', 'saff2@gmail.com', 'Teaching', 2, 1, '1234567890', 'bbsr', 'bhubaneswar', '2', '3', 'test father name1', '2020-11-10', 'o+', 'test qualification', 3, '2020-11-04', '3', 'testaccno1', 'test bank name1', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', '', '2020-2021', NULL, NULL, 1, 0),
('5', 'Test Staff1111', 'MALE', '1111111111', 'saff1@gmail1.com', 'Teaching', 2, 2, '1234567881', 'jharkhand1', 'Jharkhand11', '4', '4', 'test father name11', '2020-11-13', 'o-', 'test qualification-', 1, '2020-11-05', '', 'testbankacc11111', 'test bank name111', 'tst branch1', 'test ifsc code1', 'testpan no1', 'testadhar1', 'testuan no1', 'testpfacc1', 'testesino1', 'ADMIN', '', '2020-2021', NULL, NULL, 1, 1),
('6', 'Hari Murari Sharma', 'MALE', '8709321740', NULL, '', 0, 0, '8709321740', '24 shivaji marg\r\nnajafgarh road', 'dhanbad', '1', '1', 'Shankar Sharma', '2020-12-15', 'o+', 'bsc', 2, '2020-12-13', '2145646', '', 'sdfaf dasf', 'dfasdfsfasf', 'dfdd4444d', 'adsss3456f', '123456789009', 'sfasfasfasfasf', 'fsdafasfas', 'sadfadsfasfas', NULL, NULL, '', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_class_details`
--

CREATE TABLE `student_class_details` (
  `Student_Details_Id` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Student_Type` enum('Existing','New') NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Class_No` int(11) DEFAULT NULL,
  `Class_Sec_Id` int(11) DEFAULT NULL,
  `Stream` enum('SCIENCE','COMMERCE','ARTS','GENERAL') NOT NULL,
  `Roll_No` int(11) DEFAULT NULL,
  `Session` varchar(10) NOT NULL,
  `Session_Start_Year` int(4) NOT NULL,
  `Session_End_Year` int(4) NOT NULL,
  `Regular_FG_Id` int(11) DEFAULT NULL,
  `Transport_FG_Id` int(11) DEFAULT NULL,
  `Concession_Id` int(11) DEFAULT NULL,
  `CJD` date DEFAULT NULL,
  `CJD_Remarks` varchar(100) DEFAULT NULL,
  `CLD` date DEFAULT NULL,
  `CLD_Remarks` varchar(100) DEFAULT NULL,
  `Promoted` tinyint(1) NOT NULL DEFAULT '0',
  `Promoted_Remarks` varchar(100) DEFAULT NULL,
  `Promotion_UpdatedBy` varchar(100) DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class_details`
--

INSERT INTO `student_class_details` (`Student_Details_Id`, `Student_Id`, `Student_Type`, `Class_Id`, `Class_No`, `Class_Sec_Id`, `Stream`, `Roll_No`, `Session`, `Session_Start_Year`, `Session_End_Year`, `Regular_FG_Id`, `Transport_FG_Id`, `Concession_Id`, `CJD`, `CJD_Remarks`, `CLD`, `CLD_Remarks`, `Promoted`, `Promoted_Remarks`, `Promotion_UpdatedBy`, `Enabled`, `School_Id`, `Remarks`, `Updated_By`, `Updated_On`) VALUES
(1, '2020000001', 'New', 8, 5, 1, '', NULL, '2020-2021', 2020, 2021, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-19 11:17:22'),
(2, '2020000002', 'New', 17, -4, 1, 'SCIENCE', NULL, '2020-2021', 2020, 2021, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-19 11:30:11'),
(3, '2020000003', 'New', 17, -4, 1, 'SCIENCE', NULL, '2020-2021', 2020, 2021, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-19 20:36:37'),
(4, '2020000004', 'New', 17, -4, 1, 'SCIENCE', NULL, '2020-2021', 2020, 2021, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-19 20:37:16'),
(5, '2020000005', 'New', 17, -4, 1, 'SCIENCE', NULL, '2020-2021', 2020, 2021, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-19 20:42:01'),
(6, '2020000006', 'New', 17, -4, 1, 'SCIENCE', NULL, '2020-2021', 2020, 2021, NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-20 06:17:55'),
(7, '2020000007', 'New', 16, -3, 1, '', NULL, '2020-2021', 2020, 2021, NULL, NULL, 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, 'STAFF', '2021-01-21 07:22:57');

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
  `promoted` tinyint(1) DEFAULT '0',
  `promoted_remarks` varchar(100) DEFAULT NULL,
  `promotion_updatedby` varchar(100) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `school_id` mediumint(9) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_details`
--

CREATE TABLE `student_fee_details` (
  `SFD_Id` int(11) NOT NULL,
  `SFM_Id` int(11) NOT NULL,
  `FG_Id` int(11) NOT NULL,
  `Fee_Head_Id` int(11) NOT NULL,
  `Fee_Installment_Type` int(11) NOT NULL,
  `Installment_Id` int(11) NOT NULL,
  `Fee_Amount` int(11) NOT NULL,
  `Concession_Amount` int(11) NOT NULL,
  `Concession_Id` int(11) NOT NULL,
  `Pay_Status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_master`
--

CREATE TABLE `student_fee_master` (
  `SFM_Id` int(11) NOT NULL,
  `FG_Id` int(11) NOT NULL,
  `Installment_Id` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Fee_Due_Date` date DEFAULT NULL,
  `Pay_Status` enum('Paid','Due','Unpaid') NOT NULL,
  `Paid_Amount` int(11) NOT NULL,
  `Paid_Amount_Date` date NOT NULL,
  `Late_Fee_Amount` int(11) NOT NULL,
  `Recept_No` varchar(10) NOT NULL,
  `Due_Amount` int(11) NOT NULL,
  `Due_Pay_Date` date NOT NULL,
  `Due_Recept_No` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Installment_Month` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_details`
--

CREATE TABLE `student_leave_details` (
  `Leave_Details_Id` int(11) NOT NULL,
  `Leave_Id` int(11) NOT NULL,
  `Leave_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_master`
--

CREATE TABLE `student_leave_master` (
  `Leave_Id` int(11) NOT NULL,
  `Student_Id` varchar(20) NOT NULL,
  `leave_reason` enum('Seek','Family-Function','Bereavement','Others') NOT NULL,
  `filename` date NOT NULL,
  `Application_Date` date NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_master_table`
--

CREATE TABLE `student_master_table` (
  `Student_Id` varchar(20) NOT NULL,
  `Image_Folder_Id` int(11) DEFAULT NULL,
  `Admission_Id` varchar(10) DEFAULT NULL,
  `School_Adm_No` varchar(20) DEFAULT NULL,
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
  `Mother_Tongue` varchar(100) DEFAULT NULL,
  `Religion` varchar(100) DEFAULT NULL,
  `Nationality` enum('INDIAN','OTHERS') DEFAULT NULL,
  `Blood_Group` enum('AB-Negative','B-Negative','AB-P	ositive','A-Negative','O-Negative','B-Positive','A-Positive','O-Positive') DEFAULT NULL,
  `Aadhar_No` varchar(12) DEFAULT NULL,
  `Student_Image` varchar(512) DEFAULT NULL,
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
  `Student_Reff_Login_Id` varchar(20) DEFAULT NULL,
  `Parent_Reff_Login_Id` varchar(20) DEFAULT NULL,
  `Enabled` tinyint(1) DEFAULT '1',
  `Is_Blocked` tinyint(1) NOT NULL DEFAULT '0',
  `Block_Remarks` text NOT NULL,
  `Doc_Upload_1` varchar(300) DEFAULT NULL,
  `Doc_Upload_2` varchar(300) DEFAULT NULL,
  `Doc_Upload_3` varchar(300) DEFAULT NULL,
  `Doc_Upload_4` varchar(300) DEFAULT NULL,
  `Doc_Upload_5` varchar(300) DEFAULT NULL,
  `Doc_Upload_6` varchar(300) DEFAULT NULL,
  `Doc_Upload_7` varchar(300) DEFAULT NULL,
  `Doc_Upload_8` varchar(300) DEFAULT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_master_table`
--

INSERT INTO `student_master_table` (`Student_Id`, `Image_Folder_Id`, `Admission_Id`, `School_Adm_No`, `School_Id`, `Session`, `Session_Start_Year`, `Session_End_Year`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Class_Sec_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_1_Class`, `Sibling_1_Section`, `Sibling_1_RollNo`, `Sibling_2_Student_Id`, `Sibling_2_Class`, `Sibling_2_Section`, `Sibling_2_RollNo`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`, `Student_Reff_Login_Id`, `Parent_Reff_Login_Id`, `Enabled`, `Is_Blocked`, `Block_Remarks`, `Doc_Upload_1`, `Doc_Upload_2`, `Doc_Upload_3`, `Doc_Upload_4`, `Doc_Upload_5`, `Doc_Upload_6`, `Doc_Upload_7`, `Doc_Upload_8`, `Updated_By`, `Updated_On`) VALUES
('2020000001', 2020000001, '2020000001', 'S61', 1, '2020-2021', 2020, 2021, 'Abhishek', 'Kumar', 'Singh', 8, 0, 'MALE', '2000-01-01', 21, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', 'A-Positive', '123456789123', NULL, 'Mont Bretia', 'English', 'CBSE', 7, ' Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4845688659', ' Barmasia Dhnbad', 'India', 'Jharkhand', 'Dhanbad', '826001', '4845688659', '', 0, '0', 0, '0', 0, '0', 0, 'Anil Kumar', 'Intermediate', 'Other', 'Plumber', 'Tata', 'Dhanbad', 'Dhanbad', 'Jharkhand', 'India', '826001', 'anil@gmail.com', '4692658545', 90000, '', 'No', NULL, 'Sarita Devi', 'Non-Matric', 'Other', 'House Wife', '', '', 'Dhanbad', 'Jharkhand', 'India', '826001', 'sarita@gmail.com', '2149642165', 0, '234913246419', '', NULL, '', ' ', '', '', '', NULL, '2149642165', '2149642165', 'anil@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-19 11:17:22'),
('2020000002', 2020000002, '2020000012', '2020000012', 1, '2020-2021', 2020, 2021, 'Riya', 'Raj', 'singh', 17, 0, 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000012_AdmissionDocs/9399531deb0e228377ce8cf00bcb1ba1.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '0', 0, '0', 0, '0', 0, 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', 5, '888525960251', 'No', 'AdmissionDocuments/2020000012_AdmissionDocs/a3e4491206c97789480ea50e9cf5bf77.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', 5, '888525960258', '', 'AdmissionDocuments/2020000012_AdmissionDocs/c98cd09ae9184ed3d6080d84d241a7d6.jpg', '', ' ', '', '', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-19 11:30:11'),
('2020000003', 2020000003, '202010', '', 1, '2020-2021', 2020, 2021, 'Riya', 'Raj', 'singh', 17, 0, 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/202010_AdmissionDocs/a2942800b73328580f2088e3d23f4780.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '0', 0, '0', 0, '0', 0, 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', 5, '888525960251', 'No', 'AdmissionDocuments/202010_AdmissionDocs/3f7dc90d69231c9c7b72096befcb2197.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', 5, '888525960258', '', 'AdmissionDocuments/202010_AdmissionDocs/03cf6c1f1aedf6787b74cd07b4c0dd6a.jpg', '', ' ', '', '', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-19 20:36:37'),
('2020000004', 2020000004, '2020000002', '', 1, '2020-2021', 2020, 2021, 'Riya', 'Raj', 'singh', 17, 0, 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000002_AdmissionDocs/28af6ad6cda41a1d0add36a9ceb36762.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '0', 0, '0', 0, '0', 0, 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', 5, '888525960251', 'No', 'AdmissionDocuments/2020000002_AdmissionDocs/9c62171a96ca43ad1a90e978b3159381.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', 5, '888525960258', '', 'AdmissionDocuments/2020000002_AdmissionDocs/b4fea5dfc0b80cbb74d20ee2d29ee039.jpg', '', ' ', '', '', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-19 20:37:16'),
('2020000005', 2020000005, '2020000003', '', 1, '2020-2021', 2020, 2021, 'Riya', 'Raj', 'singh', 17, 0, 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000003_AdmissionDocs/efcd4e0d6b4062fb1ef875a41f540703.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '0', 0, '0', 0, '0', 0, 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', 5, '888525960251', 'No', 'AdmissionDocuments/2020000003_AdmissionDocs/78671482b0221b2eae65802d1d8e1ae5.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', 5, '888525960258', '', 'AdmissionDocuments/2020000003_AdmissionDocs/648dcf778f4b822090d62cbeb6805a41.jpg', '', ' ', '', '', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-19 20:42:01'),
('2020000006', 2020000006, '2020000004', 'Pnr1', 1, '2020-2021', 2020, 2021, 'Riya', 'Raj', 'singh', 17, 0, 'MALE', '2018-12-07', 2, 'GENERAL', 1, 4, '2020-2021', 'Hindi', 'Hindu', 'INDIAN', '', '888525960256', 'AdmissionDocuments/2020000004_AdmissionDocs/52ba0e6c7916566063583dd3bed61513.jpg', 'honey holy school', 'English', 'CBSE', 17, ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', ' anand nager,giridih', 'india', 'jharkhand', 'giridih', '815301', '8625993214', '', 0, '0', 0, '0', 0, '0', 0, 'Raj singh', 'Graduate', 'Engineer', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs12@gmail.com', '8925993211', 5, '888525960251', 'No', 'AdmissionDocuments/2020000004_AdmissionDocs/23b1fcbe1e4b34dd0b7baeaa6e15329d.jpg', 'rashmi', 'Graduate', 'Other', '', '', '', 'giridih', 'jharkhand', 'india', '815301', 'rs112@gmail.com', '8925993210', 5, '888525960258', '', 'AdmissionDocuments/2020000004_AdmissionDocs/20cf6b94d1074ef0e84d1525d7f33f0e.jpg', '', ' ', '', '', '', NULL, '8625993211', '8625993211', 'rs29886@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-20 06:17:55'),
('2020000007', 2020000007, '2020000030', '', 1, '2020-2021', 2020, 2021, 'Sachin', 'Ramesh', 'shetty', 16, 0, 'MALE', '2017-01-13', 4, 'SC', 2, 3, '2020-2021', 'Malayalam', 'Hindu', 'INDIAN', 'A-Positive', '658974512599', 'AdmissionDocuments/2020000030_AdmissionDocs/b4a76614c2e81713206387bb9d2e7787.jpg', 'RSGK holy school', '', '', 16, 'krishna nager,boakro', 'India', 'jharkhand', 'bokaro', '815306', '8625993299', 'krishna nager,boakro', 'India', 'jharkhand', 'bokaro', '815306', '8625993299', '', 0, '0', 0, '0', 0, '0', 0, 'Ramesh shetty', 'Matriculation', 'Business', '', '', '', 'bokaro', 'jharkhand', 'India', '815306', 'rs112@gmail.com', '8925993299', 12, '552698745598', 'No', 'AdmissionDocuments/2020000030_AdmissionDocs/f00f7983702812da3abc22189853f724.jpg', 'Menka shetty', 'Non-Matric', 'Other', '', '', 'krishna nager,bokaro steel', 'bokaro', 'jharkhand', 'India', '815306', 'ms11112@gmail.com', '8925993299', 2, '888522525252', '', 'AdmissionDocuments/2020000030_AdmissionDocs/84d140c79c8d50e4e777586cc66bc41f.jpg', '', 'krishna nager,bokaro steel', 'Rakesh shetty', 'Aunt', '8625996211', NULL, '8625996211', '8625996211', 'ms11112@gmail.com', 'NULL', 'NULL', 1, 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'STAFF', '2021-01-21 07:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `subject_master_table`
--

CREATE TABLE `subject_master_table` (
  `Subject_Id` int(11) NOT NULL,
  `Subject_Name` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_master_table`
--

INSERT INTO `subject_master_table` (`Subject_Id`, `Subject_Name`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'English', 1, 1, 'admin', '2020-12-12 15:18:46'),
(2, 'Hindi', 1, 1, 'admin', '2020-12-12 15:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `task_allocation_list_table`
--

CREATE TABLE `task_allocation_list_table` (
  `TAL_Id` int(11) NOT NULL,
  `Task_Id` int(11) NOT NULL,
  `Allocated_Reff_Id` int(11) NOT NULL COMMENT 'section Id',
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_allocation_list_table`
--

INSERT INTO `task_allocation_list_table` (`TAL_Id`, `Task_Id`, `Allocated_Reff_Id`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 28, 1, 1, 'admin', '2021-01-01 20:53:00'),
(2, 2, 28, 1, 1, 'admin', '2021-01-01 22:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `task_file_upload`
--

CREATE TABLE `task_file_upload` (
  `Task_File_Id` int(11) NOT NULL,
  `Task_Id` int(11) NOT NULL,
  `Upload_Type` enum('File','Link') NOT NULL,
  `Upload_Name` varchar(512) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_file_upload`
--

INSERT INTO `task_file_upload` (`Task_File_Id`, `Task_Id`, `Upload_Type`, `Upload_Name`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 1, 'File', 'Assignments/509a0285573b9a81d975989fa2f06bf7.jpg', 1, 1, 'admin', '2021-01-01 20:53:10'),
(2, 1, 'File', 'Assignments/2b1330a2f0c3e48686103f8aa13d59c6.pdf', 1, 1, 'admin', '2021-01-01 20:53:31'),
(3, 1, 'File', 'Assignments/4e71fb6893b09476f7aa4e13c096162d.docx', 1, 1, 'admin', '2021-01-01 20:53:49'),
(4, 1, 'File', 'Assignments/81148057e014276d649726f65f2f868f.xlsx', 1, 1, 'admin', '2021-01-01 20:54:29'),
(5, 1, 'Link', 'https://www.youtube.com/watch?v=8fJy_j0h8oU&ab_channel=SoothingRelaxation', 1, 1, 'admin', '2021-01-01 20:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `task_master_table`
--

CREATE TABLE `task_master_table` (
  `Task_Id` int(11) NOT NULL,
  `Task_Name` varchar(100) NOT NULL,
  `Task_Type` enum('Assignment','Project','Home Work') NOT NULL,
  `Task_Desc` varchar(500) NOT NULL,
  `Created_On` date DEFAULT NULL,
  `Is_Submmisable` enum('Yes','No') NOT NULL,
  `Last_Submissable_Date` date NOT NULL,
  `Subject_Id` int(11) NOT NULL,
  `Refference_Type` enum('Teacher','Student','Others') NOT NULL DEFAULT 'Student',
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_master_table`
--

INSERT INTO `task_master_table` (`Task_Id`, `Task_Name`, `Task_Type`, `Task_Desc`, `Created_On`, `Is_Submmisable`, `Last_Submissable_Date`, `Subject_Id`, `Refference_Type`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'myschool', 'Home Work', 'MYSCHOOL TESTING', NULL, 'Yes', '2021-01-02', 1, 'Student', 1, 1, 'admin', '2021-01-01 20:53:00'),
(2, 'Mithun', 'Assignment', 'daswefdsfswdfsd', NULL, 'Yes', '2021-01-02', 1, 'Student', 1, 1, 'admin', '2021-01-01 22:22:11');

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
  `Obtained_Marks` int(11) NOT NULL DEFAULT '0',
  `Is_Verified` enum('Yes','No') NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(5) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_time_table`
--

CREATE TABLE `teacher_time_table` (
  `Teacher_Routine_Id` int(11) NOT NULL,
  `Staff_Id` varchar(20) NOT NULL,
  `Filename` varchar(512) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transport_buswise_message_table`
--

CREATE TABLE `transport_buswise_message_table` (
  `Bus_Message_Id` int(11) NOT NULL,
  `Vehicle_Id` int(11) NOT NULL,
  `Message` varchar(640) NOT NULL,
  `Message_Date` datetime NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transport_driver_table`
--

CREATE TABLE `transport_driver_table` (
  `Driver_Id` int(11) NOT NULL,
  `Staff_Id` int(11) NOT NULL,
  `Liscence_No` varchar(100) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_driver_table`
--

INSERT INTO `transport_driver_table` (`Driver_Id`, `Staff_Id`, `Liscence_No`, `Remarks`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 1, '98989asdsadadd', ' ada ad ad d a a a assd sdsd sa as sadasd a', 1, 1, 'admin', '2021-01-12 05:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `transport_routewise_message_table`
--

CREATE TABLE `transport_routewise_message_table` (
  `Bus_Message_Id` int(11) NOT NULL,
  `Route_Id` int(11) NOT NULL,
  `Message` varchar(640) NOT NULL,
  `Message_Date` datetime NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transport_route_charge_table`
--

CREATE TABLE `transport_route_charge_table` (
  `TRCT_Id` int(11) NOT NULL,
  `Route_Id` int(11) NOT NULL,
  `Charges` int(11) NOT NULL,
  `Session` varchar(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_route_charge_table`
--

INSERT INTO `transport_route_charge_table` (`TRCT_Id`, `Route_Id`, `Charges`, `Session`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 6, 800, '2020', 1, 1, 'admin', '2021-01-12 11:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `transport_route_table`
--

CREATE TABLE `transport_route_table` (
  `Route_Id` int(11) NOT NULL,
  `Route_Name` varchar(100) NOT NULL,
  `Route_Description` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_route_table`
--

INSERT INTO `transport_route_table` (`Route_Id`, `Route_Name`, `Route_Description`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'Jharia Road', 'Towards Jharia Area', 1, 1, 'admin', '2020-12-26 18:52:03'),
(2, 'Bhuli Road', 'Towards Bhuli Area', 1, 1, 'admin', '2020-12-26 18:52:32'),
(3, 'Gobindpur Road', 'Towards Gobindpur Area', 1, 1, 'admin', '2020-12-26 18:52:52'),
(4, 'Hirapur Area', 'Towards Hirapur, Dhanbad Area', 1, 1, 'admin', '2020-12-26 18:53:35'),
(5, 'Manaitand Area', 'Towards Maniitand, Dhanbad Area', 1, 1, 'admin', '2020-12-26 18:53:47'),
(6, 'Bankmore Area', 'Towards Bankmore, Dhanbad Area', 1, 1, 'admin', '2020-12-26 18:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `transport_stopage_table`
--

CREATE TABLE `transport_stopage_table` (
  `Stopage_Id` int(11) NOT NULL,
  `Stopage_Name` varchar(100) NOT NULL,
  `Stopage_No` int(11) NOT NULL,
  `Stopage_Address` varchar(100) NOT NULL,
  `Route_Id` int(11) NOT NULL,
  `Distance` int(11) NOT NULL,
  `Pickup_Time` time NOT NULL,
  `Drop_Time` time NOT NULL,
  `Charges` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_stopage_table`
--

INSERT INTO `transport_stopage_table` (`Stopage_Id`, `Stopage_Name`, `Stopage_No`, `Stopage_Address`, `Route_Id`, `Distance`, `Pickup_Time`, `Drop_Time`, `Charges`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'Municipality Office ', 1, 'Municipality Office, Bank More, Dhanbad, Near Rajendra Market', 6, 5, '08:30:00', '14:30:00', 550, 1, 1, 'admin', '2020-12-26 19:03:27'),
(2, 'Gurudwara More', 2, 'Gurudwara, Bank More, Dhanbad', 5, 6, '08:35:00', '14:35:00', 550, 1, 1, 'admin', '2021-01-13 11:24:47'),
(3, 'Signature Tower', 3, 'Signature Tower, Katrash Road, ,Bank More, Dhanbad', 6, 7, '08:45:00', '14:45:00', 600, 1, 1, 'admin', '2020-12-26 19:06:34'),
(4, 'Godhar More', 4, 'Godhar More, Katrash Road, ,Bank More, Dhanbad', 6, 7, '08:55:00', '14:55:00', 700, 1, 1, 'admin', '2020-12-26 19:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `transport_student_map_table`
--

CREATE TABLE `transport_student_map_table` (
  `TSM_Id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `Session` varchar(10) NOT NULL,
  `Pickup_Stopage_Id` int(11) NOT NULL,
  `Drop_Stopage_Id` int(11) NOT NULL,
  `Different_drop` tinyint(1) NOT NULL DEFAULT '0',
  `Charges` int(100) NOT NULL,
  `Updated_By` int(11) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_student_map_table`
--

INSERT INTO `transport_student_map_table` (`TSM_Id`, `Student_Id`, `Session`, `Pickup_Stopage_Id`, `Drop_Stopage_Id`, `Different_drop`, `Charges`, `Updated_By`, `Updated_On`) VALUES
(1, 11, '2020-2021', 4, 1, 0, 0, 0, '2021-01-13 13:31:07'),
(2, 2020000080, '2020-2021', 4, 4, 0, 0, 0, '2021-01-19 07:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicle_document`
--

CREATE TABLE `transport_vehicle_document` (
  `Vehicle_Doc_Id` int(11) NOT NULL,
  `Vehicle_Id` int(11) NOT NULL,
  `Document_Type_Id` varchar(100) NOT NULL,
  `Filename` varchar(512) NOT NULL,
  `Valid_Date` date DEFAULT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_vehicle_document`
--

INSERT INTO `transport_vehicle_document` (`Vehicle_Doc_Id`, `Vehicle_Id`, `Document_Type_Id`, `Filename`, `Valid_Date`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 4, 'Fitness', '0a332f4cb44a4821663e28918faed86b.pdf', NULL, 1, 1, 'admin', '2021-01-13 06:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicle_driver_table`
--

CREATE TABLE `transport_vehicle_driver_table` (
  `TVDT_Id` int(11) NOT NULL,
  `Vehicle_Id` int(11) NOT NULL,
  `Driver_Id` int(11) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_vehicle_driver_table`
--

INSERT INTO `transport_vehicle_driver_table` (`TVDT_Id`, `Vehicle_Id`, `Driver_Id`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 6, 1, 1, 1, 'admin', '2021-01-12 11:13:26'),
(2, 5, 1, 1, 1, 'admin', '2021-01-12 11:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `transport_vehicle_table`
--

CREATE TABLE `transport_vehicle_table` (
  `Vehicle_Id` int(11) NOT NULL,
  `Vehicle_Reg_No` varchar(100) NOT NULL,
  `Vehicle_No` int(11) NOT NULL,
  `Vehicle_Type` varchar(100) NOT NULL,
  `Vehicle_Capacity` int(11) NOT NULL,
  `Route_Id` int(11) NOT NULL,
  `IMEI_No` varchar(100) NOT NULL,
  `SIM_No` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Updated_By` varchar(100) NOT NULL,
  `Updated_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transport_vehicle_table`
--

INSERT INTO `transport_vehicle_table` (`Vehicle_Id`, `Vehicle_Reg_No`, `Vehicle_No`, `Vehicle_Type`, `Vehicle_Capacity`, `Route_Id`, `IMEI_No`, `SIM_No`, `Enabled`, `School_Id`, `Updated_By`, `Updated_On`) VALUES
(1, 'JH 10C 2147', 1, 'Bus', 60, 6, '1', '1', 1, 1, 'admin', '2020-12-26 18:58:10'),
(2, 'JH 10C 5878', 2, 'Bus', 60, 5, '2', '2', 1, 1, 'admin', '2020-12-26 18:58:33'),
(3, 'JH 10C 2794', 3, 'Bus', 60, 4, '3', '3', 1, 1, 'admin', '2020-12-26 18:59:41'),
(4, 'JH 10C 6542', 4, 'Bus', 60, 3, '4', '4', 1, 1, 'admin', '2020-12-26 18:59:57'),
(5, 'JH 10C 5214', 5, 'Bus', 60, 2, '5', '5', 1, 1, 'admin', '2020-12-26 19:00:13'),
(6, 'JH 10C 3173', 6, 'Bus', 60, 1, '6', '6', 1, 1, 'admin', '2020-12-26 19:00:32');

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
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `School_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_enquiry_table`
--

INSERT INTO `visitor_enquiry_table` (`VE_Id`, `Visitor_Type_Id`, `Visitor_Name`, `Contact_No`, `Company_Name`, `Visit_Purpose_Id`, `Location`, `Person_To_Meet`, `No_Of_Person`, `Date_Of_Visit`, `In_Time`, `Out_Time`, `Note`, `Created_By`, `Created_On`, `School_Id`) VALUES
(1, 2, 'suman', '8709321740', 'NA', 1, 'Ranchi', '0', 2, '2020-12-09', '01:36:00', NULL, 'dad fdsafdas fdasfasdfsdafasd fas', 'admin', '2020-12-08 20:06:57', 1),
(2, 1, 'suman', '8709321740', 'ABC Company', 1, 'Ranchi', '0', 1, '2020-12-09', '01:45:00', NULL, 'sfdsf dsafdsafdasdas', 'admin', '2020-12-08 20:15:53', 1),
(3, 1, 'suman', '8709321740', 'Dr. J. K. Sinha International School of Learning', 1, 'Ranchi', '0', 1, '2020-12-09', '01:46:00', NULL, 'as fds fdasf dasfs', 'admin', '2020-12-08 20:16:19', 1),
(4, 3, 'suman', '8709321740', 'ABC Company', 4, 'Ranchi', '0', 2, '2020-12-09', '01:47:00', NULL, 'df dfgfdgg dfs ', 'admin', '2020-12-08 20:17:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_type_master`
--

CREATE TABLE `visitor_type_master` (
  `VT_Id` tinyint(4) NOT NULL,
  `Visitor_Type` varchar(100) NOT NULL,
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `Enabled` tinyint(1) NOT NULL DEFAULT '1',
  `School_Id` int(11) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_On` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  ADD PRIMARY KEY (`Admission_Id`);

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
-- Indexes for table `class_syllabus_table`
--
ALTER TABLE `class_syllabus_table`
  ADD PRIMARY KEY (`Class_Syllabus_Id`);

--
-- Indexes for table `class_time_table`
--
ALTER TABLE `class_time_table`
  ADD PRIMARY KEY (`Class_Routine_Id`);

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
-- Indexes for table `concession_master_table`
--
ALTER TABLE `concession_master_table`
  ADD PRIMARY KEY (`Concession_Id`);

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
-- Indexes for table `fee_advance_table`
--
ALTER TABLE `fee_advance_table`
  ADD PRIMARY KEY (`FA_Id`);

--
-- Indexes for table `fee_cheque_table`
--
ALTER TABLE `fee_cheque_table`
  ADD PRIMARY KEY (`FC_Id`);

--
-- Indexes for table `fee_group_table`
--
ALTER TABLE `fee_group_table`
  ADD PRIMARY KEY (`FG_Id`);

--
-- Indexes for table `fee_head_table`
--
ALTER TABLE `fee_head_table`
  ADD PRIMARY KEY (`Fee_Head_Id`);

--
-- Indexes for table `fee_payment_details`
--
ALTER TABLE `fee_payment_details`
  ADD PRIMARY KEY (`FPD_Id`);

--
-- Indexes for table `fee_payment_master`
--
ALTER TABLE `fee_payment_master`
  ADD PRIMARY KEY (`FP_Id`);

--
-- Indexes for table `fee_structure_table`
--
ALTER TABLE `fee_structure_table`
  ADD PRIMARY KEY (`FS_Id`);

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
-- Indexes for table `online_class_attendance`
--
ALTER TABLE `online_class_attendance`
  ADD PRIMARY KEY (`OLCA_Id`);

--
-- Indexes for table `online_class_table`
--
ALTER TABLE `online_class_table`
  ADD PRIMARY KEY (`OLC_Id`);

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
-- Indexes for table `student_fee_master`
--
ALTER TABLE `student_fee_master`
  ADD PRIMARY KEY (`SFM_Id`);

--
-- Indexes for table `student_master_table`
--
ALTER TABLE `student_master_table`
  ADD PRIMARY KEY (`Student_Id`),
  ADD UNIQUE KEY `Student_Id` (`Student_Id`),
  ADD UNIQUE KEY `Image_Folder_Id` (`Image_Folder_Id`);

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
-- Indexes for table `teacher_time_table`
--
ALTER TABLE `teacher_time_table`
  ADD PRIMARY KEY (`Teacher_Routine_Id`);

--
-- Indexes for table `transport_driver_table`
--
ALTER TABLE `transport_driver_table`
  ADD PRIMARY KEY (`Driver_Id`);

--
-- Indexes for table `transport_route_charge_table`
--
ALTER TABLE `transport_route_charge_table`
  ADD PRIMARY KEY (`TRCT_Id`);

--
-- Indexes for table `transport_route_table`
--
ALTER TABLE `transport_route_table`
  ADD PRIMARY KEY (`Route_Id`);

--
-- Indexes for table `transport_stopage_table`
--
ALTER TABLE `transport_stopage_table`
  ADD PRIMARY KEY (`Stopage_Id`);

--
-- Indexes for table `transport_vehicle_document`
--
ALTER TABLE `transport_vehicle_document`
  ADD PRIMARY KEY (`Vehicle_Doc_Id`);

--
-- Indexes for table `transport_vehicle_driver_table`
--
ALTER TABLE `transport_vehicle_driver_table`
  ADD PRIMARY KEY (`TVDT_Id`);

--
-- Indexes for table `transport_vehicle_table`
--
ALTER TABLE `transport_vehicle_table`
  ADD PRIMARY KEY (`Vehicle_Id`);

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
  MODIFY `Attendance_Details_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_table`
--
ALTER TABLE `login_table`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message_details_table`
--
ALTER TABLE `message_details_table`
  MODIFY `MD_Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `visitor_enquiry_table`
--
ALTER TABLE `visitor_enquiry_table`
  MODIFY `VE_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
