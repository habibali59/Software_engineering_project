-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 03:15 PM
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
-- Database: `quiz_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `complete`
--

CREATE TABLE `complete` (
  `id` int(11) NOT NULL,
  `GRADE` int(11) NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complete`
--

INSERT INTO `complete` (`id`, `GRADE`, `STATUS`) VALUES
(1, 80, 'pass'),
(2, 10, 'pass'),
(3, 80, 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `meterals`
--

CREATE TABLE `meterals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meterals`
--

INSERT INTO `meterals` (`id`, `name`, `add_date`) VALUES
(2, 'Data_Structures_and_Algorithms', '2020-02-01 21:00:00'),
(3, 'Data_Structures_and_Algorithms', '2024-05-05 19:12:35'),
(6, 'Programming', '2024-05-06 12:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `no` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `meteral` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`no`, `fname`, `meteral`) VALUES
(50, 'habeb', 3),
(53, 'habeb', 3),
(60, 'ammar', 2),
(64, 'ammar', 2),
(70, 'ammar', 6),
(80, 'ammar', 2),
(81, 'ammar', 2),
(100, 'habeb', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `F_name` varchar(25) NOT NULL,
  `L_name` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `creation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `F_name`, `L_name`, `email`, `password`, `role`, `creation`) VALUES
(2, 'ammar', 'abbas', 'ammar@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 765943299, '2024-05-03 07:50:22'),
(3, 'habeb', 'ali', 'habeb@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1234567890, '2024-05-06 11:45:08'),
(4, 'karar', 'hayder', 'karar@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 2147483647, '2024-05-06 12:52:00'),
(5, 'sajad', 'sabah', 'sajad@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 2147483647, '2024-05-06 12:52:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complete`
--
ALTER TABLE `complete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meterals`
--
ALTER TABLE `meterals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_quiz_meteral` (`meteral`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complete`
--
ALTER TABLE `complete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meterals`
--
ALTER TABLE `meterals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_quiz_meteral` FOREIGN KEY (`meteral`) REFERENCES `meterals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
