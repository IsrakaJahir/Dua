-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 08:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dua_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `duas`
--

CREATE TABLE `duas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `repeat_count` int(11) NOT NULL,
  `set_id` int(11) DEFAULT NULL,
  `meaning` varchar(500) NOT NULL,
  `Dua` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duas`
--

INSERT INTO `duas` (`id`, `title`, `repeat_count`, `set_id`, `meaning`, `Dua`) VALUES
(1, 'all', 20, NULL, 'allahu', 'ALLAHU'),
(2, 'rememver', 10, NULL, 'starting y the name of allah', 'ismillah'),
(3, 'alllaaahhh', 2, NULL, '', 'allah'),
(5, 'Help', 100, NULL, 'There is none worthy of Worship besides You, You are far exalted and above all weaknesses, Surely, I am from among the wrongdoers', 'La Ilaha Illa Anta Subhanaka Inni Kuntu Minaz Zalimin '),
(6, 'Seeking Forgiveness', 100, NULL, 'I ask for forgiveness.', 'Astaghfirul lah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duas`
--
ALTER TABLE `duas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_set_id` (`set_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duas`
--
ALTER TABLE `duas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `duas`
--
ALTER TABLE `duas`
  ADD CONSTRAINT `fk_set_id` FOREIGN KEY (`set_id`) REFERENCES `dua_sets` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
