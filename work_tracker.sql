-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2025 at 09:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `work_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `status`) VALUES
(1, 'RPA', 'Automation job applying tool', ''),
(2, 'test1', 'et', ''),
(3, 'Test2', 'test2', ''),
(4, 'TEst3', 'test3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `project_id`, `assigned_to`, `status`, `due_date`) VALUES
(1, 'Model', 'create model users', 2, 1, 'in_progress', '2025-08-06'),
(14, 'Task 1', 'This is the description for task 1', 1, 2, 'pending', '2025-08-07'),
(15, 'Task 2', 'This is the description for task 2', 2, 1, 'in_progress', '2025-08-08'),
(16, 'Task 3', 'This is the description for task 3', 1, 1, 'in_progress', '2025-08-09'),
(17, 'Task 4', 'This is the description for task 4', 1, 1, 'in_progress', '2025-08-10'),
(18, 'Task 5', 'This is the description for task 5', 2, 3, 'completed', '2025-08-11'),
(19, 'Task 6', 'This is the description for task 6', 1, 2, 'pending', '2025-08-12'),
(20, 'Task 7', 'This is the description for task 7', 3, 2, 'in_progress', '2025-08-13'),
(21, 'Task 8', 'This is the description for task 8', 2, 3, 'completed', '2025-08-14'),
(22, 'Task 9', 'This is the description for task 9', 1, 2, 'completed', '2025-08-15'),
(23, 'Task 10', 'This is the description for task 10', 3, 1, 'completed', '2025-08-16'),
(24, 'Task 11', 'This is the description for task 11', 3, 1, 'pending', '2025-08-17'),
(25, 'Task 12', 'This is the description for task 12', 2, 3, 'pending', '2025-08-18'),
(26, 'Task 13', 'This is the description for task 13', 2, 2, 'in_progress', '2025-08-19'),
(27, 'Task 14', 'This is the description for task 14', 3, 2, 'completed', '2025-08-20'),
(29, 'Task 16', 'This is the description for task 16', 2, 2, 'in_progress', '2025-08-22'),
(30, 'Task 17', 'This is the description for task 17', 1, 2, 'completed', '2025-08-23'),
(31, 'Task 18', 'This is the description for task 18', 2, 2, 'completed', '2025-08-24'),
(32, 'Task 19', 'This is the description for task 19', 3, 2, 'completed', '2025-08-25'),
(33, 'Task 20', 'This is the description for task 20', 3, 2, 'pending', '2025-08-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Haris', 'asdf@gmail.com', '$2y$10$FPHYz9DP48S1yqYf1R0/v.VKhf6udCh5Z8J4ftTEskRwA0MCSFTJW'),
(2, 'Mad', 'mad@gmail.com', '$2y$10$Ku64e7XpRCH.4BDConv/1OXgffRXDXQUmogWQx4JmpIgWY4cuBK0C'),
(3, 'nad', 'nad@gmail.com', '$2y$10$qsUyq1rXsGQ0dTfxOr7jme9dNT/mHtyuzmI4uFZuPFx0oJjD/y2JO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
