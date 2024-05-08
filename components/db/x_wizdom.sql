-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2024 at 05:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `x_wizdom`
--

-- --------------------------------------------------------

--
-- Table structure for table `Marks`
--

CREATE TABLE `Marks` (
  `Trainee_Id` int(11) DEFAULT NULL,
  `Trade_Id` int(11) DEFAULT NULL,
  `Module_Name` varchar(100) DEFAULT NULL,
  `Formative_Assessment` decimal(5,2) DEFAULT 0.00,
  `Summative_Assessment` decimal(5,2) DEFAULT 0.00,
  `Total_Marks` decimal(6,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Marks`
--

INSERT INTO `Marks` (`Trainee_Id`, `Trade_Id`, `Module_Name`, `Formative_Assessment`, `Summative_Assessment`, `Total_Marks`) VALUES
(3, 3, 'Math', 30.00, 43.00, 73.00),
(4, 3, 'Math', 10.00, 7.00, 17.00),
(5, 4, 'Math', 0.00, 0.00, 0.00),
(3, 3, 'physics', 40.00, 20.00, 60.00),
(4, 3, 'physics', 0.00, 0.00, 0.00),
(2, 2, 'Math', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `Trade`
--

CREATE TABLE `Trade` (
  `Trade_Id` int(11) NOT NULL,
  `Trade_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Trade`
--

INSERT INTO `Trade` (`Trade_Id`, `Trade_Name`) VALUES
(3, 'ICT'),
(2, 'Information Technology and communication'),
(5, 'MAS'),
(4, 'MLM');

-- --------------------------------------------------------

--
-- Table structure for table `Trainees`
--

CREATE TABLE `Trainees` (
  `Trainee_Id` int(11) NOT NULL,
  `FirstNames` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Trade_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Trainees`
--

INSERT INTO `Trainees` (`Trainee_Id`, `FirstNames`, `LastName`, `Gender`, `Trade_Id`) VALUES
(2, 'merci', 'Manzi', 'Male', 2),
(3, 'Paccy', 'Umutoni', 'Female', 3),
(4, 'Kevin', 'Uwase', 'Male', 3),
(5, 'Adolfe', 'KWizera', 'Male', 4),
(6, 'Christian', 'Muhire', 'Male', 5);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `User_Id` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`User_Id`, `UserName`, `Password`) VALUES
(2, 'x', 'passx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Marks`
--
ALTER TABLE `Marks`
  ADD KEY `Trainee_Id` (`Trainee_Id`),
  ADD KEY `Trade_Id` (`Trade_Id`);

--
-- Indexes for table `Trade`
--
ALTER TABLE `Trade`
  ADD PRIMARY KEY (`Trade_Id`),
  ADD UNIQUE KEY `Trade_Name` (`Trade_Name`);

--
-- Indexes for table `Trainees`
--
ALTER TABLE `Trainees`
  ADD PRIMARY KEY (`Trainee_Id`),
  ADD KEY `Trade_Id` (`Trade_Id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Trade`
--
ALTER TABLE `Trade`
  MODIFY `Trade_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Trainees`
--
ALTER TABLE `Trainees`
  MODIFY `Trainee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Marks`
--
ALTER TABLE `Marks`
  ADD CONSTRAINT `Marks_ibfk_1` FOREIGN KEY (`Trainee_Id`) REFERENCES `Trainees` (`Trainee_Id`),
  ADD CONSTRAINT `Marks_ibfk_2` FOREIGN KEY (`Trade_Id`) REFERENCES `Trade` (`Trade_Id`);

--
-- Constraints for table `Trainees`
--
ALTER TABLE `Trainees`
  ADD CONSTRAINT `Trainees_ibfk_1` FOREIGN KEY (`Trade_Id`) REFERENCES `Trade` (`Trade_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
