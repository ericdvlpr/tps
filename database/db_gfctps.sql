-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 11:07 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gfctps`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_id`, `name`, `address`, `contact_number`) VALUES
(1, 5304, 'Test', 'tesad', 2147483647),
(2, 2705, 'qweqwewq1', 'tweqewqe', 123123123),
(3, 5627, 'Christian Dioneda', 'Sorsogon', 2147483647),
(4, 9134, 'Joshua Valzado', 'Daraga, Albay', 2147483647),
(5, 6705, 'try', 'try', 98765432);

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `address` text NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_delivered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateofdelivery` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `delivery_id`, `order_id`, `customer_name`, `address`, `employee_id`, `date_delivered`, `dateofdelivery`, `status`) VALUES
(1, 138, 4056, 'Test', 'tesad', 514, '2018-01-17 20:10:00', '2018-01-18', 1),
(2, 3915, 4056, 'Test', 'tesad', 514, '2018-01-17 20:10:00', '2018-01-18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `user_acct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `employee_name`, `address`, `gender`, `birthday`, `user_acct`) VALUES
(24, 514, 'Joel Arroyo', 'PUROK ROSE UBALIW', 'M', '1998-04-25', 1),
(45, 4073, 'Nikko Arroyo', 'Donsol Legazpi', 'M', '2017-12-10', 1),
(46, 8910, 'Teste', '12retwet', 'M', '2017-12-14', 1),
(47, 2860, 'Clark Santos', 'Camalig', 'M', '1999-03-02', 1),
(48, 8704, 'Michael Marciales', 'Legazpi City', 'M', '1990-05-29', 0),
(49, 2359, 'Ezekiel Vibar', 'Palanog, Camalig, Albay', 'M', '2000-02-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `contact_number` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `product_id`, `address`, `contact_number`, `order_quantity`, `status`) VALUES
(1, 4056, 5304, 7965, 'tesad', 2147483647, 1, 1),
(2, 621, 5627, 6254, 'Sorsogon', 2147483647, 511, 0),
(3, 6204, 5627, 6254, 'sorsogon', 2147483647, 500, 0),
(4, 7813, 2705, 6254, 'sorsogon', 9876543, 5, 0),
(5, 1693, 5627, 6254, 'sorsogon', 87654, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `description`, `quantity`) VALUES
(1, 7965, 'tres', 'testat', 150),
(2, 6254, 'pozzolan', 'Quick Dry Cement', 933);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `assigned` date NOT NULL,
  `due` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_id`, `subject`, `description`, `assigned`, `due`, `employee_id`, `status`) VALUES
(1, 9245, 'testt', 'tets', '2017-12-18', '2017-12-19', 4073, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `access` int(11) NOT NULL,
  `assign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `access`, `assign`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 0, 0),
(4, 'secretary', '827ccb0eea8a706c4c34a16891f84e7b', 1, 8910),
(5, 'employee1', 'e10adc3949ba59abbe56e057f20f883e', 2, 514),
(6, 'employee2', 'e10adc3949ba59abbe56e057f20f883e', 2, 4073),
(7, 'employee3', 'e10adc3949ba59abbe56e057f20f883e', 3, 2860);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
