-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 06, 2023 at 09:30 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-uppgift`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` varchar(6) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `country`) VALUES
('0af10f', 'nyaste', 'nytt'),
('14787d', 'Testar', 'Testar'),
('2a1883', 'Charlie', 'Spain'),
('2feef0', 'nytt', 'nytt'),
('399a76', 'Brian', 'Denmark'),
('52cffc', 'Henry', 'Sweden'),
('5f1d22', 'Peter', 'USA'),
('841e35', 'Taylor', 'United Kingdom'),
('9b1649', 'Sanne', 'Denmark'),
('9b16b0', 'Benjamin', 'Portugal'),
('acce89', 'Agnes', 'Portugal'),
('b1ad4f', 'Matthew', 'United Kingdom'),
('dd4554', 'Köra igen', 'Sweden'),
('e280da', 'Lovisa', 'USA'),
('e6ba89', 'Sanna', 'Sweden'),
('ecc21c', 'Sarah', 'USA'),
('ee3637', 'Mirabelle', 'Spain'),
('ef19d3', 'Olof', 'Norway'),
('fd34a7', 'Test', 'Testar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
