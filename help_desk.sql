-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 08:23 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_desk`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_table`
--

CREATE TABLE `accept_table` (
  `accept_id` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accept_table`
--

INSERT INTO `accept_table` (`accept_id`, `receiver_name`, `donor_name`, `status`) VALUES
(5, 'akib123', '', 'Accepted'),
(8, 'mahamudun013', 'mukut123', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('hassan013', 'hassan013');

-- --------------------------------------------------------

--
-- Table structure for table `apply_table`
--

CREATE TABLE `apply_table` (
  `a_id` int(11) NOT NULL,
  `applicant_name` varchar(100) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_table`
--

INSERT INTO `apply_table` (`a_id`, `applicant_name`, `donor_name`, `product_type`, `product_name`) VALUES
(2, 'akib123', 'mahamudun013', 'Books', 'Let us C++'),
(6, 'mahamudun013', 'mukut123', 'Financial aid', '12000 TK'),
(7, 'mahamudun013', 'akib123', 'Electrical equipment', 'Calculator'),
(9, 'mahamudun013', 'mukut123', 'Financial aid', '12000 TK');

-- --------------------------------------------------------

--
-- Table structure for table `donor_table`
--

CREATE TABLE `donor_table` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `product_type` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `file` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_table`
--

INSERT INTO `donor_table` (`id`, `name`, `username`, `product_type`, `product_name`, `address`, `city`, `zip`, `phone_number`, `email`, `file`) VALUES
(1, 'Md. Mahamudun Hassan', 'mahamudun013', 'Books', 'Let us C++', 'Badda,Dhaka-1212', 'Dhaka', '1212', '01850969739', 'mahamudun013@gmail.com', 0x4c65745f55735f432b2b2e6a7067),
(4, 'Akib Hassan', 'akib123', 'Electrical equipment', 'Calculator', 'Malibag,Dhaka-1230', 'Dhaka', '1230', '01600000000', 'akib123@gmail.com', 0x6361722e6a7067),
(5, 'Mukut Hassan', 'mukut123', 'Financial aid', '12000 TK', 'Aftabnagar, Dhaka-1213', 'Dhaka', '1213', '01555555555', 'mukut123@gmail.com', 0x6361722e6a7067),
(6, 'Al Faruk', 'faruk123', 'Medical Equipment', 'wheel chair', 'Uttara, Dhaka-1240', 'Dhaka', '1240', '01511111111', 'faruk123@gmail.com', 0x6361722e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `u_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`u_id`, `name`, `username`, `password`, `confirm_password`, `gender`, `phone_number`, `email`) VALUES
(1, 'Md.Mahamudun Hassan', 'mahamudun013', 'mahamudun013', 'mahamudun013', 'Male', '01850969739', 'mahamudun013@gmail.com'),
(4, 'Akib Hassan', 'akib123', 'akib123', 'akib123', 'male', '01600000000', 'akib123@gmail.com'),
(5, 'Mukut Hassan', 'mukut123', 'mukut123', 'mukut123', 'male', '01555555555', 'mukut123@gmail.com'),
(6, 'Al Faruk', 'faruk123', 'faruk123', 'faruk123', 'male', '01511111111', 'faruk123@gmail.com'),
(8, 'Hasib', 'hasib123', 'hasib123', 'hasib123', 'male', '01955555555', 'hasib123@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_table`
--
ALTER TABLE `accept_table`
  ADD PRIMARY KEY (`accept_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `apply_table`
--
ALTER TABLE `apply_table`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `donor_table`
--
ALTER TABLE `donor_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_table`
--
ALTER TABLE `accept_table`
  MODIFY `accept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `apply_table`
--
ALTER TABLE `apply_table`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donor_table`
--
ALTER TABLE `donor_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
