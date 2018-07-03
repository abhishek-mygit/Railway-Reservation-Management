-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 06:21 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railbook`
--

CREATE DATABASE IF NOT EXISTS RailBook;
USE RailBook;

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `train_id` varchar(10) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registered_member`
--

CREATE TABLE `registered_member` (
  `email_id` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `pswd` text NOT NULL,
  `dob` date NOT NULL,
  `phone_no` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_member`
--

INSERT INTO `registered_member` (`email_id`, `name`, `pswd`, `dob`, `phone_no`) VALUES
('abc@gmail.com', 'abc', '202cb962ac59075b964b07152d234b70', '1998-01-01', 987654321),
('aravindhan.rocz@gmail.com', 'Aravindhan', 'e10adc3949ba59abbe56e057f20f883e', '1998-06-14', 987654321);

-- --------------------------------------------------------

--
-- Table structure for table `temp_member`
--

CREATE TABLE `temp_member` (
  `randkey` varchar(64) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `pswd` text NOT NULL,
  `dob` date NOT NULL,
  `phone_no` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` varchar(10) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `time` time NOT NULL,
  `max_cap` int(11) NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `start`, `end`, `time`, `max_cap`, `fare`) VALUES
('A001', 'Chennai', 'Delhi', '08:00:00', 200, 400),
('A002', 'Chennai', 'Trichy', '09:00:00', 200, 150),
('A003', 'Chennai', 'Madurai', '10:00:00', 200, 200);

-- --------------------------------------------------------

--
-- Table structure for table `train_cap`
--

CREATE TABLE `train_cap` (
  `train_id` varchar(10) NOT NULL,
  `cap_rem` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_cap`
--

INSERT INTO `train_cap` (`train_id`, `cap_rem`, `date`) VALUES
('A001', 200, '2017-01-01'),
('A002', 200, '2017-01-01'),
('A003', 200, '2017-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_member`
--
ALTER TABLE `registered_member`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `temp_member`
--
ALTER TABLE `temp_member`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_cap`
--
ALTER TABLE `train_cap`
  ADD KEY `fk` (`train_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `train_cap`
--
ALTER TABLE `train_cap`
  ADD CONSTRAINT `fk` FOREIGN KEY (`train_id`) REFERENCES `train` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
