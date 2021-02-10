-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 08:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlinzileo`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidences`
--

CREATE TABLE `incidences` (
  `id` int(11) NOT NULL,
  `camera_location` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incidences`
--

INSERT INTO `incidences` (`id`, `camera_location`, `created_at`, `updated_at`) VALUES
(1, 'Main Gate', '2021-02-10 05:01:06', '2021-02-10 05:17:54'),
(2, 'Kitchen', '2021-02-10 05:01:06', '2021-02-10 05:17:54'),
(3, 'The Chui Hall', '2021-02-10 02:18:03', '2021-02-10 02:18:03'),
(4, 'The main gate camera', '2021-02-10 06:51:34', '2021-02-10 06:51:34'),
(5, 'The Main kitchen', '2021-02-10 07:20:03', '2021-02-10 07:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `on_duty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnels`
--

INSERT INTO `personnels` (`id`, `name`, `contact`, `email`, `on_duty`, `created_at`, `updated_at`) VALUES
(1, 'Ian Mwenda', '0714678909', 'sirianmwenda@gmail.com', 1, '2021-02-10 02:17:05', '2021-02-10 02:17:05'),
(3, 'Damaris Waema', '071456337', 'damaris.waema@gmail.com', 1, '2021-02-10 07:23:41', '2021-02-10 07:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_operational` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `name`, `contact`, `email`, `created_at`, `updated_at`, `is_operational`) VALUES
(1, 'Muthaiga Station', '0714678909', 'sirianmwenda@gmail.com', '2021-02-10 02:16:07', '2021-02-10 02:16:07', 1),
(3, 'Juja Station', '0714678908', 'damaris.waema@gmail.com', '2021-02-10 07:23:19', '2021-02-10 07:23:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Ian Mwenda', 'sirianmwenda@gmail.com', '$2y$10$20TsEpcAXkN8TM10m5QujuYoPMXq9SBzQwMun/EuyIDN0AgFrxSR6', 1, '2021-02-10 01:58:27', '2021-02-10 01:58:27'),
(2, 'Damaris Waema', 'damaris.waema@jkuat.ac.ke', '$2y$10$AzTXkzu6q2Q2qX0MSRdltuUyXJ8zjhUy4VL.aEB6JhjnbyIPp6XSK', 1, '2021-02-10 06:48:10', '2021-02-10 06:48:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incidences`
--
ALTER TABLE `incidences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
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
-- AUTO_INCREMENT for table `incidences`
--
ALTER TABLE `incidences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
