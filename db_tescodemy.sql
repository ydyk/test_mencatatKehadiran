-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 07:08 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tescodemy`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` varchar(11) NOT NULL,
  `id_class` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `id_class`, `name`, `phone`, `created_at`, `updated_at`) VALUES
('084d368d97b', '04fdb5ggc0a', 'yogasfa', '081287565375', '2019-04-05 19:06:04', '2019-04-05 19:06:04'),
('227e8ad3a58', '04fdv524c0a', 'lina', '081287563075', '2019-04-05 18:35:15', '2019-04-05 18:35:15'),
('2aade3ed277', '04fddf24e0a', 'yoga', '081287563075', '2019-04-05 18:15:57', '2019-04-05 18:15:57'),
('4fc2cec07f9', '04fdb524c0a', 'yogas', '081287563075', '2019-04-05 18:23:55', '2019-04-05 18:23:55'),
('d4f06143a46', '04fdb524c0a', 'Apoy', '085640343867', '2019-04-05 16:36:56', '2019-04-05 16:36:56'),
('e3de90ce94d', '04fdb524c0a', 'Rahend', '081287563075', '2019-04-05 16:38:10', '2019-04-05 16:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` varchar(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_time` datetime NOT NULL,
  `room` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_time`, `room`, `created_at`, `updated_at`) VALUES
('04fdb524c0a', 'Basic Golang (Part II)', '2018-10-26 10:00:00', '2A', '2019-04-05 16:26:39', '2019-04-05 16:26:39'),
('65e59b02402', 'Basic Golang', '2018-10-25 10:00:00', '1A', '2019-04-05 16:26:35', '2019-04-05 16:26:35'),
('8e9caf4205a', 'Basic Golang (Part II3)', '2018-10-26 10:00:00', '2V', '2019-04-05 19:00:50', '2019-04-05 19:00:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
