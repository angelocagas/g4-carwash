-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 04:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_tbl`
--

CREATE TABLE `customers_tbl` (
  `id` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `customername` varchar(50) NOT NULL,
  `cartype` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `charge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_tbl`
--

INSERT INTO `customers_tbl` (`id`, `date`, `customername`, `cartype`, `service`, `charge`) VALUES
(1, '2022-06-24', 'Henry', 'SUV', 'Wash With Wax', '150'),
(2, '2022-06-24', 'John', 'SUV', 'Full Wash', '300'),
(3, '2022-06-23', 'test', 'SUV', 'Wash With Wax', '150'),
(4, '2022-06-14', 'test2', 'SUV', 'Under Wash', '200');

-- --------------------------------------------------------

--
-- Table structure for table `date_tbl`
--

CREATE TABLE `date_tbl` (
  `id` int(11) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `cash` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `date_tbl`
--

INSERT INTO `date_tbl` (`id`, `date`, `cash`) VALUES
(1, '2022-06-24', 5000),
(2, '2022-06-23', 500),
(3, '2022-06-01', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

CREATE TABLE `services_tbl` (
  `id` int(11) NOT NULL,
  `service` varchar(45) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`id`, `service`, `price`) VALUES
(1, 'Wash', 100),
(2, 'Wash With Wax', 150),
(3, 'Under Wash', 200),
(4, 'Full Wash', 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers_tbl`
--
ALTER TABLE `customers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_tbl`
--
ALTER TABLE `date_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_tbl`
--
ALTER TABLE `services_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers_tbl`
--
ALTER TABLE `customers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `date_tbl`
--
ALTER TABLE `date_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services_tbl`
--
ALTER TABLE `services_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
