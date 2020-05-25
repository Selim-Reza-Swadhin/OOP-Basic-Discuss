-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 04:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(11) NOT NULL,
  `account_number` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `current_balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `account_number`, `customer_name`, `account_type`, `current_balance`) VALUES
(1, 2147483641, 'Niton', 'Saving', 11500),
(2, 2147483642, 'Eather', 'Current', 65000),
(3, 2147483643, 'selim', 'Saving', 21000),
(4, 2147483644, 'Swadhin', 'Current', 19500),
(5, 2147483645, 'zannat', 'Saving', 1200),
(8, 2147483647, 'hamidul', 'Current', 11111),
(9, 2147483647, 'hamidul', 'Current', 11111),
(10, 2147483647, 'bithy', 'Saving', 12101),
(11, 2147483647, 'bithy', 'Saving', 12601),
(12, 2147483647, 'bithy', 'Saving', 12101),
(13, 2147483645, 'jamal', 'Current', 12345),
(14, 2147483645, 'jamal', 'Current', 12345),
(15, 2147483645, 'jamal', 'Current', 12345),
(16, 2147483645, 'jamal', 'Current', 11845);

-- --------------------------------------------------------

--
-- Table structure for table `account_ledger`
--

CREATE TABLE `account_ledger` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `trnx_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `particulars` varchar(255) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_ledger`
--

INSERT INTO `account_ledger` (`id`, `account_id`, `trnx_date`, `particulars`, `debit`, `credit`) VALUES
(1, 4, '2020-05-13 12:24:23', 'Fund Transfer to 3', 0, 10000),
(2, 3, '2020-05-13 12:24:23', 'Fund Transfer to 4', 10000, 0),
(3, 2, '2020-05-13 12:24:46', 'Fund Transfer to 1', 0, 500),
(4, 1, '2020-05-13 12:24:46', 'Fund Transfer to 2', 500, 0),
(5, 2, '2020-05-13 20:20:32', 'Fund Transfer to 4', 0, 500),
(6, 4, '2020-05-13 20:20:32', 'Fund Transfer to 2', 500, 0),
(7, 2, '2020-05-13 20:22:47', 'Fund Transfer to 4', 0, 500),
(8, 4, '2020-05-13 20:22:47', 'Fund Transfer to 2', 500, 0),
(9, 2, '2020-05-13 20:23:01', 'Fund Transfer to 4', 0, 500),
(10, 4, '2020-05-13 20:23:01', 'Fund Transfer to 2', 500, 0),
(11, 16, '2020-05-13 22:03:43', 'Fund Transfer to 11', 0, 500),
(12, 11, '2020-05-13 22:03:43', 'Fund Transfer to 16', 500, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_ledger`
--
ALTER TABLE `account_ledger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `account_ledger`
--
ALTER TABLE `account_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
