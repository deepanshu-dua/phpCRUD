-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 01:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `srno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `time stamp` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`srno`, `title`, `description`, `time stamp`) VALUES
(1, 'market', 'hey deepu please buys some food items fdsom market', '2023-03-26 10:39:08'),
(2, 'books', 'hey deepu please boy some self devlopment books for me from the book shop near bus stand', '2023-03-21 10:48:52'),
(4, 'aesdf', 'today is your testADSDF', '2023-03-26 02:41:26'),
(8, 'deepu', 'adsjhhdsnkldfa.snmda', '2023-03-24 10:11:02'),
(9, 'asfdg', 'safdgf', '2023-03-24 10:14:09'),
(10, 'asdfg', 'dsfag', '2023-03-24 10:45:07'),
(12, 'koijkh', 'p;olkjhb', '2023-03-25 19:24:38'),
(16, 'sfddgf', 'fsdagd', '2023-03-26 10:35:40'),
(17, 'qwdefrgthjdeepanshu', 'zdfxgchfzsdfxcdua', '2023-03-26 10:36:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
