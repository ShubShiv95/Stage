-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2020 at 11:01 AM
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
-- Table structure for table `admission_master_table`
--

CREATE TABLE `admission_master_table` (
  `Admission_Id` mediumint(8) UNSIGNED NOT NULL,
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
  `Discount_Category` smallint(6) NOT NULL,
  `Locality` smallint(6) DEFAULT NULL,
  `Academic_Session` varchar(9) NOT NULL,
  `Mother_Tongue` smallint(3) UNSIGNED NOT NULL,
  `Religion` smallint(5) UNSIGNED NOT NULL,
  `Nationality` enum('INDIAN','OTHERS') NOT NULL,
  `Blood_Group` enum('AB-Negative','B-Negative','AB-P	ositive','A-Negative','O-Negative','B-Positive','A-Positive','O-Positive') DEFAULT NULL,
  `Aadhar_No` varchar(12) DEFAULT NULL,
  `Student_Image` varchar(100) DEFAULT NULL,
  `Prev_School_Name` varchar(100) DEFAULT NULL,
  `Prev_School_Medium` enum('English','Hindi','Others') DEFAULT NULL,
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
  `Sibling_1_Student_Id` varchar(20) NOT NULL,
  `Sibling_2_Student_Id` varchar(20) NOT NULL,
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

INSERT INTO `admission_master_table` (`Admission_Id`, `School_Id`, `Session`, `First_Name`, `Middle_Name`, `Last_Name`, `Class_Id`, `Gender`, `DOB`, `Age`, `Social_Category`, `Discount_Category`, `Locality`, `Academic_Session`, `Mother_Tongue`, `Religion`, `Nationality`, `Blood_Group`, `Aadhar_No`, `Student_Image`, `Prev_School_Name`, `Prev_School_Medium`, `Prev_School_Board`, `Prev_School_Class`, `Comm_Address`, `Comm_Add_Country`, `Comm_Add_State`, `Comm_Add_City_Dist`, `Comm_Add_Pincode`, `Comm_Add_ContactNo`, `Resid_Address`, `Resid_Add_Country`, `Resid_Add_State`, `Resid_Add_City_Dist`, `Resid_Add_Pincode`, `Resid_Add_ContactNo`, `Sibling_1_Student_Id`, `Sibling_2_Student_Id`, `Father_Name`, `Father_Qualification`, `Father_Occupation`, `Father_Designation`, `Father_Org_Name`, `Father_Org_Add`, `Father_City`, `Father_State`, `Father_Country`, `Father_Pincode`, `Father_Email`, `Father_Contact_No`, `Father_Annual_Income`, `Father_Aadhar_Card`, `Father_Alumni`, `Father_Image`, `Mother_Name`, `Mother_Qualification`, `Mother_Occupation`, `Mother_Designation`, `Mother_Org_Name`, `Mother_Org_Add`, `Mother_City`, `Mother_State`, `Mother_Country`, `Mother_Pincode`, `Mother_Email`, `Mother_Contact_No`, `Mother_Annual_Income`, `Mother_Aadhar_Card`, `Mother_Alumni`, `Mother_Image`, `Gurdian_Type`, `Guardian_Address`, `Guardian_Name`, `Guardian_Relation`, `Guardian_Contact_No`, `Guardian_Image`, `SMS_Contact_No`, `Whatsapp_Contact_No`, `Email_Id`, `Doc_Upload_1`, `Doc_Upload_2`, `Doc_Upload_3`, `Doc_Upload_4`, `Doc_Upload_5`, `Doc_Upload_6`, `Doc_Upload_7`, `Doc_Upload_8`) VALUES
(100, 200, '2020-2021', 'F Name', 'M Name', 'L Name', 1, 'MALE', '2020-09-01', 10, 'GENERAL', 0, 10, '10', 0, 6, 'INDIAN', 'AB-P	ositive', 'DSDF2323', '', 'DPS', 'English', 'CBSE', 16, ' Comm Add', 'India', 'UP', 'Noida', '201301', '919899395627', ' Resid Add', 'India', 'UP', 'Noida', '201301', '919899395627', 'Stu2010', 'STU0001', 'R N DUTTA', 'Non-Matric', 'Engineer', 'Sr Manager', 'RTD Ltd', 'Noida', 'Noida', 'UP', 'India', '201301', 'sdutta@gmail.com', '919899395627', 2000000, 'ABDF32242', 'Yes', '', 'KD', 'Non-Matric', 'Engineer', 'Housewife', 'NA', 'NA', '', 'UP', 'India', '201301', 'sd@abc.com', '011123456789', 20000, 'NCSDS00922', 'No', '', 'Other', ' Address', 'Suman', 'Uncle', '9899395627', '', '919899395627', '919899395627', 'sdutta@gmail.com', '7^U.P^INDIA', '36^U.P^INDIA', '7^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA', '36^U.P^INDIA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_master_table`
--
ALTER TABLE `admission_master_table`
  ADD PRIMARY KEY (`Admission_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
