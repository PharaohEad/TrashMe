-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 04:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_trashme`
--

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `complains` text NOT NULL,
  `accident_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `id_users`, `complains`, `accident_date`) VALUES
(5, 16, 'anjay', '2021-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_bill`
--

CREATE TABLE `monthly_bill` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `payment` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monthly_bill`
--

INSERT INTO `monthly_bill` (`id`, `id_users`, `payment`, `date`) VALUES
(1, 1, 1500, '2021-06-01'),
(2, 16, 1500, '2021-06-02'),
(3, 16, 15000, '2021-05-07'),
(4, 16, 150000, '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_log`
--

CREATE TABLE `pickup_log` (
  `id` int(11) NOT NULL,
  `pickup_dates` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_process`
--

CREATE TABLE `pickup_process` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `pickup_date_req` date NOT NULL,
  `estimate_date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `tipe_sampah` varchar(30) NOT NULL,
  `id_petugas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickup_process`
--

INSERT INTO `pickup_process` (`id`, `id_users`, `pickup_date_req`, `estimate_date`, `status`, `tipe_sampah`, `id_petugas`) VALUES
(5, 16, '2021-06-16', '2021-06-17', 'requested', 'anogarnik', ''),
(6, 16, '2021-06-12', '2021-06-13', 'success', 'organik', ''),
(7, 16, '2021-06-02', '2021-06-03', 'requested', 'logam', '19');

-- --------------------------------------------------------

--
-- Table structure for table `trashtype`
--

CREATE TABLE `trashtype` (
  `id` int(11) NOT NULL,
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conf_password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_pict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `conf_password`, `name`, `address`, `phone_num`, `role_id`, `profile_pict`) VALUES
(16, 'fakhriramadhan233@gmail.com', '$2y$10$F9TPd/QiEfMyYyS2/Rd5v.qY29W8LN39UsQAqY2Xg6arhFi0CQ7vO', '$2y$10$jqoJu0VEuKAONIUQMy3WT.ZHkWWRgeuNgA1xeQ8BTzKDEKAYHMJxW', 'tet', 'Jalan H. Iming No.11 Rt04 Rw02', '087875031998', 3, 'default.jpg'),
(18, 'admin@gmail.com', '$2y$10$Q/UFvN9bHuHQvvL3fxB96upxdGRe6sTtea3rmL6S3lGPvzI1jEPUa', '$2y$10$qbpxTD3ShQ4BbnOZf3OeZOOe.n41FGs5LRT.3yBCop.m4yQKbJIDS', 'admin', 'admin', '123', 1, 'default.jpg'),
(19, 'petugas1@gmail.com', '$2y$10$6iNLbJEaHrxs9y17h422v.Kwy4mcsxv0k6q2zz5gSH76MP97Nc03.', '$2y$10$uDotO4kl56DQSB4KZsVD1OZtIaxfN27OVfJaYfL.sao0QguzJVHQi', 'petugas1', 'petugas1', '123', 2, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_bill`
--
ALTER TABLE `monthly_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_log`
--
ALTER TABLE `pickup_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_process`
--
ALTER TABLE `pickup_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trashtype`
--
ALTER TABLE `trashtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `monthly_bill`
--
ALTER TABLE `monthly_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pickup_log`
--
ALTER TABLE `pickup_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_process`
--
ALTER TABLE `pickup_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trashtype`
--
ALTER TABLE `trashtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
