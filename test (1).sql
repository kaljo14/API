-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2022 at 11:21 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tag_color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `tag_color`) VALUES
(1, 'Food priducts', 'red'),
(2, 'Dairy products', 'blue'),
(3, 'Vegetables', 'green'),
(4, 'Sanitary products', 'purple');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`) VALUES
(2, 'To buy cheese'),
(3, 'To buy tomatoes'),
(4, 'To buy celery'),
(5, 'To buy laundry detergent'),
(6, 'To buy toilet paper'),
(7, 'To by apple'),
(13, 'To buy chocolate'),
(31, 'To buy Seafood'),
(33, 'To buy Brown rice'),
(34, 'To buy Barbecue sauce'),
(35, 'To buy rice'),
(55, 'To buy olives'),
(98, 'To buy Crackers');

-- --------------------------------------------------------

--
-- Table structure for table `task_relationship`
--

CREATE TABLE `task_relationship` (
  `tsr_id` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_relationship`
--

INSERT INTO `task_relationship` (`tsr_id`, `id`, `task_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(6, 2, 2),
(7, 3, 3),
(8, 3, 4),
(9, 4, 5),
(10, 4, 6),
(14, 1, 33),
(15, 1, 34),
(16, 1, 35),
(24, 1, 98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `task_relationship`
--
ALTER TABLE `task_relationship`
  ADD PRIMARY KEY (`tsr_id`),
  ADD KEY `id` (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `task_relationship`
--
ALTER TABLE `task_relationship`
  MODIFY `tsr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task_relationship`
--
ALTER TABLE `task_relationship`
  ADD CONSTRAINT `task_relationship_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_relationship_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
