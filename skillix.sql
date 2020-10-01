-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 12:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillix`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_registration`
--

CREATE TABLE `company_registration` (
  `Id` int(20) NOT NULL,
  `Company_Name` varchar(20) NOT NULL,
  `Job_Category` varchar(50) NOT NULL,
  `Number` bigint(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `About_us` varchar(50) NOT NULL,
  `Logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_registration`
--

INSERT INTO `company_registration` (`Id`, `Company_Name`, `Job_Category`, `Number`, `Email`, `Password`, `About_us`, `Logo`) VALUES
(1, 'Skillix', 'Python', 8758745738, 'skillix007@gmail.com', 'Skillix123', 'Best Company to Find Your Dream Job.', 'h1.jpg'),
(2, 'BMW', 'Mechanical Engineer', 7283947790, 'hjp1238@gmail.com', 'Skillix1234', 'Best Car Company to buy.', 'h2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_registration`
--

CREATE TABLE `employee_registration` (
  `id` int(20) NOT NULL,
  `Employee_Name` varchar(50) NOT NULL,
  `Number` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Field` varchar(20) NOT NULL,
  `Skill` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Resume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_registration`
--

INSERT INTO `employee_registration` (`id`, `Employee_Name`, `Number`, `Email`, `Password`, `Field`, `Skill`, `Status`, `Resume`) VALUES
(1, 'Hardik Parmar', 9428739212, 'hardikjp10@gmail.com', 'Hardik123', 'Techinical Field', 'Java', 'Experienced Person', 'h1.jpg'),
(2, 'Divya Bagul', 7283947790, 'divyapbagul@gmail.com', 'Divya123', 'Techinical Field', 'CSS', 'Fresher', 'h2.jpg'),
(3, 'Shivam Pawar', 9727510766, 'shivampawar0014@gmail.com', 'Shivam123', 'Techinical Field', 'PHP', 'Fresher', 'h3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_registration`
--
ALTER TABLE `company_registration`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `employee_registration`
--
ALTER TABLE `employee_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_registration`
--
ALTER TABLE `company_registration`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_registration`
--
ALTER TABLE `employee_registration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
