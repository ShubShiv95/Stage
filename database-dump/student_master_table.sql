-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2020 at 01:59 PM
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
-- Table structure for table `student_master_table`
--

CREATE TABLE `student_master_table` (
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
