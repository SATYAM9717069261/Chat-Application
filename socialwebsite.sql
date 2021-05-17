-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 04:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

CREATE TABLE `profile_pic` (
  `Email` varchar(50) DEFAULT NULL,
  `pas` varchar(50) DEFAULT NULL,
  `Phone` varchar(10) DEFAULT NULL,
  `Profile_pic` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`Email`, `pas`, `Phone`, `Profile_pic`) VALUES
('satyam.mandal.77@gmail.com', 'S123', '9717069261', 'default_pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `Name` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Picture` text NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`Name`, `Email`, `Phone`, `Picture`, `Gender`, `DOB`, `Password`) VALUES
('Satyam', 'satyam.mandal.77@gmail.com', '9717069261', 'satyam.mandal.77@gmail.com46939717069261', 'Male', '2017-05-13', 'S123');

-- --------------------------------------------------------

--
-- Table structure for table `satyam8047`
--

CREATE TABLE `satyam8047` (
  `S_No` int(11) NOT NULL,
  `friendlist` text,
  `chat_table_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `Friend_table_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `id`, `Friend_table_Name`) VALUES
('Satyam', 'satyam.mandal.77@gmail.com', 'Satyam8047');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `satyam8047`
--
ALTER TABLE `satyam8047`
  ADD PRIMARY KEY (`S_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `satyam8047`
--
ALTER TABLE `satyam8047`
  MODIFY `S_No` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
