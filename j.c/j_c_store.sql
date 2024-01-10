-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 05:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `j.c store`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cat`
--

CREATE TABLE `add_cat` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_desc` text NOT NULL,
  `cat_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE `admin_reg` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`id`, `name`, `email`, `password`, `role`) VALUES
(4, 'shazil', 'shazil@gmail.com', '#sadia123', '1'),
(5, 'hamna', 'hamna@gmail.com', '$2y$10$AJOVcJ1DNQdUZ3VZy1QDCe/XhIGOB9iRN3fvJ1ai9UWi4jJlErF7i', ''),
(6, 'filza', 'filza@gmail.com', '$2y$10$3dDrr8IXnVFUCt3UZGU2X.Uy3jv73aZWGGzPSrr2snIXslYSYJFey', '2'),
(7, 'sadia', 'sadia@gmail.com', '$2y$10$kbKoMI/bBH1y6cQhJXJKoe9N0TIKgtSV6fkF7GXPqfSVjpN32.BWe', 'select role');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cat`
--
ALTER TABLE `add_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `admin_reg`
--
ALTER TABLE `admin_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cat`
--
ALTER TABLE `add_cat`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_reg`
--
ALTER TABLE `admin_reg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
