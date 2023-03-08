-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 07:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missingmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admid`, `fname`, `lname`, `oname`, `gender`, `email`, `pnumber`, `password`) VALUES
(1, 'Aggrey', 'Kiprop', 'James', 'Male', 'aggreykiprop60@gmail.com', '', '$2y$10$eeZ/qF1K.Gms4apP3/sMyOgHgidlFukzqbLnDZXgEox/T0oDfruba'),
(2, 'test', '123', '', 'Female', 'test123@developer.com', '', '$2y$10$tT8lvEH/dSl52uZFOPWtqu8iEggmTU.KgvMBz2opcwwuxYBAD045.'),
(3, 'test', '456', '', 'Male', 'test456@developer.com', '', '$2y$10$5QKZwzwsCozu1t80K03PmeFf2IXKrkLFDit5BBoHUpqyXJTq8s9Dm'),
(4, 'test', '789', '', 'Female', 'test789@developer.com', '', '$2y$10$cAJLycKj6yBvQES6iNoP0uv4uPkA2PKul5.ntbOMNklO7ZS9QTh.u'),
(5, 'Aggrey', 'Kiprop', '', 'Male', 'aggreyjames2@gmail.com', '+254700641473', '$2y$10$DdvyFkLnoL4.5UuePOlYAuJE5el/MvX514f5IQfAQ1NPJi2PotvFq');

-- --------------------------------------------------------

--
-- Table structure for table `examcoordinators`
--

CREATE TABLE `examcoordinators` (
  `myschid` int(11) NOT NULL,
  `school` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examcoordinators`
--

INSERT INTO `examcoordinators` (`myschid`, `school`, `email`, `pnumber`, `password`) VALUES
(3, 1, 'sci@maseno.ac.ke', '+254795882390', '$2y$10$zQ1GFNSpou/VfTMT9.EsW.UFq683/BxGg.42/r/u4d5f21Dx.beNu'),
(4, 2, 'med@maseno.ac.ke', '+254795882389', '$2y$10$/nD8OWVBwCsEFUYTxDt4sOd8uvq/fFiU3kK7/OvhShbs2Wi9325Ga');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `school` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecid`, `fname`, `lname`, `oname`, `gender`, `school`, `email`, `pnumber`, `password`) VALUES
(1, 'Aggrey', 'Kiprop', 'James', 'Male', '1', 'aggreykiprop60@gmail.com', '', '$2y$10$wgVRtIpJkYwAsQutggb83eEFz35c8iQfUjo/yxVyFF4AuxGFnxOsW'),
(2, 'Kevin', 'Otieno', '', 'Male', '2', 'kevino@gmail.com', '', '$2y$10$9uUlv8aOXn0sYzj8rxs7EOcEYu9ybLVZt2ukIBzIFbODqYukxYeTu'),
(3, 'test', '123', '', 'Female', '2', 'test123@developer.com', '', '$2y$10$sRamx2Tz9tyuEVnziX77wO.ObJ1neudKmjWrPZIzMRY9T7qn4uB.a'),
(4, 'Jenny', 'White', '', 'Female', '1', 'jennywhite@gmail.com', '', '$2y$10$S6oFvnUO5cqkcfL6K6DKFeNk9QMDFYEHslKquJJ/sGtBNSvJoZavK'),
(6, 'Aggrey', 'Kiprop', '', 'Male', '1', 'aggreyjames92@gmail.com', '', '$2y$10$rn4OmHHhWzhf07UGAMAPOuLDq0ykPDPN502mGcx/yUfeyYG4DsdiG'),
(9, 'Aggrey', 'Kiprop', '', 'Male', '1', 'aggreyjames2@gmail.com', '+254700641473', '$2y$10$m6ZI1IuypLuRu9tElC6Fau8QI3URL2QC4L8gMt5qoPcC8uU6997py');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mrkid` int(11) NOT NULL,
  `yearofexam` int(11) NOT NULL,
  `unitname` int(11) NOT NULL,
  `lecid` int(11) NOT NULL,
  `stmrkid` int(11) NOT NULL,
  `stdschid` int(11) NOT NULL,
  `cats` varchar(255) NOT NULL,
  `exams` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `marksstatus` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mrkid`, `yearofexam`, `unitname`, `lecid`, `stmrkid`, `stdschid`, `cats`, `exams`, `total`, `grade`, `marksstatus`) VALUES
(23, 2, 1, 1, 1, 1, '23', '55', '78', 'A', 2),
(24, 3, 4, 1, 1, 1, '30', '60', '90', 'A', 2),
(25, 1, 7, 4, 1, 1, '23', '55', '78', 'A', 2),
(26, 4, 6, 4, 1, 1, '23', '55', '78', 'A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schlid` int(11) NOT NULL,
  `schname` varchar(255) NOT NULL,
  `schcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schlid`, `schname`, `schcode`) VALUES
(1, 'School of Computing and Informatics', 'SCI'),
(2, 'School of Medicine', 'MED'),
(3, 'School of Education', 'SoE'),
(4, 'School of Business', 'SoB'),
(6, 'School of Engineering', 'SoEng');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `regnumber` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `fname`, `lname`, `oname`, `gender`, `regnumber`, `year`, `school`, `email`, `pnumber`, `password`) VALUES
(1, 'Aggrey', 'Kiprop', 'James', 'Male', 'CIM/00035/019', '1', '1', 'aggreykiprop60@gmail.com', '', '$2y$10$CnrDBgq.3ozGuufmUhLSfeMRZsGwxNCzt/HJtqJlD5QBRcIAZx/bG'),
(2, 'Jane', 'Nafula', 'Nekesa', 'Female', 'MED/00034/020', '1', '2', 'nafulaj@yahoo.com', '', '$2y$10$sv.O.8pBIEGRVdVRdvuB1.1UI433/mW4pbaZTl5RbyWUbElNo9S4O'),
(3, 'Collins', 'Nyabuto', 'Otoyo', 'Male', 'MED/01010/020', '1', '2', 'cnyabuto@gmail.com', '', '$2y$10$mf.4PRJCATZS8YolycMVRO0UIFv5MdkMuahHPVbfLLdbtP2RHLMX.'),
(4, 'Kevin', 'Nafula', 'Wekesa', 'Male', 'MED/01220/019', '1', '2', 'knafula@gmai.com', '', '$2y$10$RX8PJJB2sn3j9DI1fvvRhOzKmZ13pfXj4c29AybDYRADuViUNtmEa'),
(5, 'Jane', 'White', 'Nekesa', 'Female', 'CIM/00111/019', '1', '1', 'janewn@yahoo.com', '', '$2y$10$/P9VBz4z4nx37H2wHlY8i.wCzAFvVhzVLHXHegEYnUAUjbhevUAme'),
(8, 'Aggrey', 'Kiprop', '', 'Male', 'CIM/00036/019', '3', '1', 'aggreyjames92@gmail.com', '', '$2y$10$ZE2qRdBeMYC0ia2N/fcQc.US6c5VxMoNQXspydCyt5H9lPcKA5yne'),
(9, 'Aggrey', 'Kiprop', '', 'Male', 'CIM/00037/019', '4', '1', 'aggreyjames@gmail.com', '+25471234545', '$2y$10$LknEc4CGevk6d3uBtW5PS.Bzo2O6CiN9fX1oTRDWAbHNPT.zaFAsy'),
(10, 'Aggrey', 'Kiprop', '', 'Male', 'MED/02122/020', '3', '2', 'aggreyjames22@gmail.com', '+254700641474', '$2y$10$q8A7mg686AMQg6FBgrwZRuXBOnv8.H6h3ETMrHsYwciX6oI862OuS');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitid` int(11) NOT NULL,
  `unitname` varchar(255) NOT NULL,
  `unitcode` varchar(255) NOT NULL,
  `yroffered` int(11) NOT NULL,
  `schooloff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitid`, `unitname`, `unitcode`, `yroffered`, `schooloff`) VALUES
(1, 'Web Design and Development', 'CIM 210', 2, 1),
(4, 'Internet Based Programming (JavaScript)', 'CIM 322', 3, 1),
(5, 'Organizational Processes I', 'CIM 201', 2, 1),
(6, 'Operations Management', 'CIM 202', 2, 1),
(7, 'Computer Networks', 'CIM 203', 2, 1),
(8, 'Medical test', 'MED 102', 1, 2),
(9, 'Industrial Attachment', 'CIM 316', 3, 1),
(10, 'Data Structurers and Algorithms', 'CIM 212', 2, 1),
(13, 'Software Engineering', 'CIM 409', 4, 1),
(14, 'CIM 407', 'Business Intelligence', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `yrofstudy`
--

CREATE TABLE `yrofstudy` (
  `yrid` int(11) NOT NULL,
  `yrname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `yrofstudy`
--

INSERT INTO `yrofstudy` (`yrid`, `yrname`) VALUES
(1, 'Year 1'),
(2, 'Year 2'),
(3, 'Year 3'),
(4, 'Year 4'),
(5, 'Year 5'),
(6, 'Year 6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admid`);

--
-- Indexes for table `examcoordinators`
--
ALTER TABLE `examcoordinators`
  ADD PRIMARY KEY (`myschid`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mrkid`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schlid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stid`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `yrofstudy`
--
ALTER TABLE `yrofstudy`
  ADD PRIMARY KEY (`yrid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `examcoordinators`
--
ALTER TABLE `examcoordinators`
  MODIFY `myschid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mrkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schlid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unitid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `yrofstudy`
--
ALTER TABLE `yrofstudy`
  MODIFY `yrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
