-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 07:43 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_master_table`
--
ALTER TABLE `employee_master_table`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD UNIQUE KEY `login_id_unique` (`Login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
