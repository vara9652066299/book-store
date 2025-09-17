-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 06:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vidya_dhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin User', 'admin@gmail.com', 'admin@123', 9898989898);

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `book_cat` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`id`, `seeker_id`, `donor_id`, `book_cat`, `book_name`, `status`) VALUES
(1, 1, 1, '1', 'C Language', 0),
(2, 2, 3, '3', 'Class 10 Science', 1),
(3, 1, 4, '2', 'Class 12 Accounts', 0),
(4, 2, 2, '3', 'Class 12 Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Programming Languages'),
(2, 'Accounts'),
(3, 'Science'),
(4, 'NCERT Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `donated_books`
--

CREATE TABLE `donated_books` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donated_books`
--

INSERT INTO `donated_books` (`id`, `donor_id`, `cat_id`, `book_name`, `quantity`, `date`, `status`) VALUES
(1, 1, 1, 'C Language', 1, '2023-12-09 17:26:40', 1),
(2, 2, 1, 'C Language', 1, '2023-12-10 03:39:36', 1),
(3, 3, 3, 'Class 10 Science', 1, '2023-12-10 11:26:08', 1),
(4, 4, 2, 'Class 12 Accounts', 1, '2023-12-12 02:03:11', 1),
(5, 2, 3, 'Class 12 Science', 1, '2023-12-16 04:09:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `password`, `mobile`, `address`, `status`) VALUES
(1, 'Test Donor', 'test-donor@gmail.com', 'test@123', 9999999999, 'Test Donor Address goes here.', 1),
(2, 'Rohit Sharma', 'rohit.sharma@gmail.com', 'rohit@123', 8888888888, '54 Mayur Vihar, Jaipur Rajasthan.', 1),
(3, 'Nick John', 'john@gmail.com', 'john@123', 9898989898, '75 Uttam Vihar, Gali No - 2 Uttar Pradesh', 0),
(4, 'Ashok Kumar', 'ashok@gmail.com', 'ashok@123', 9999999999, '145 F1 Shiv Vihar Colony, Tonk, Rajasthan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seekers`
--

CREATE TABLE `seekers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seekers`
--

INSERT INTO `seekers` (`id`, `name`, `email`, `password`, `mobile`, `address`, `status`) VALUES
(1, 'Test Seeker', 'test_seeker@gmail.com', 'test@123', 9898989898, 'Address of test seeker goes here.', 1),
(2, 'Shivi Pathak', 'shivi.pathak@gmail.com', 'shivi@123', 9999999998, 'Gali No 12, Prem Vihar, Uttar Pradesh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `donated_books`
--
ALTER TABLE `donated_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seekers`
--
ALTER TABLE `seekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donated_books`
--
ALTER TABLE `donated_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seekers`
--
ALTER TABLE `seekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
