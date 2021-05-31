-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 03:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arifaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_dates`
--

CREATE TABLE `payment_dates` (
  `payment_id` int(32) NOT NULL,
  `payment_month` int(11) NOT NULL,
  `paymentyear` year(4) NOT NULL,
  `worker_id` int(11) NOT NULL,
  `regular` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_dates`
--

INSERT INTO `payment_dates` (`payment_id`, `payment_month`, `paymentyear`, `worker_id`, `regular`, `overtime`, `balance`, `created_at`) VALUES
(2, 1, 2019, 1, 8, 1, 850, '2019-01-06 13:48:53'),
(3, 1, 2019, 2, 5, 1, 688, '2019-01-06 13:48:53'),
(4, 1, 2019, 3, 3, 1, 525, '2019-01-06 13:48:53'),
(5, 1, 2019, 5, 3, 3, 788, '2019-01-06 13:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `salarylevel`
--

CREATE TABLE `salarylevel` (
  `salarylevel_id` int(32) NOT NULL,
  `level` int(32) NOT NULL,
  `salary` int(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarylevel`
--

INSERT INTO `salarylevel` (`salarylevel_id`, `level`, `salary`, `created_at`) VALUES
(1, 1, 200, '2018-12-26 21:50:12'),
(2, 2, 250, '2018-12-26 21:50:42'),
(3, 3, 300, '2018-12-27 21:46:52'),
(4, 4, 350, '2018-12-29 20:58:18'),
(5, 5, 380, '2019-01-07 01:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`) VALUES
(1, 'khalid', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2018-12-23 03:22:43'),
(2, 'malek', 'zobayer@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2018-12-23 03:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `worker_fname` varchar(255) NOT NULL,
  `worker_mname` varchar(255) NOT NULL,
  `worker_caddress` varchar(255) NOT NULL,
  `worker_paddress` varchar(255) NOT NULL,
  `worker_contactno` varchar(255) NOT NULL,
  `salarylevel_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_name`, `nid`, `worker_fname`, `worker_mname`, `worker_caddress`, `worker_paddress`, `worker_contactno`, `salarylevel_id`, `created_at`) VALUES
(1, 'Begum jan', '123456788', 'korimullah', 'fatema', 'dhaka', 'dhaka', '1900000000', 1, '2018-12-23 03:32:48'),
(2, 'fatema Khatun', '123456788456456', 'korimulla', 'fatema', 'pariatur. Excepteur sint occaecat cupidatat non', 'dhaka', '1753300000', 2, '2018-12-23 03:33:53'),
(3, 'mizan Soudagor', '102901212', 'atik', 'atika', 'skjacbiwuerycbqwiue wiuqe yiquwey', 'iucyqiuw uqxw uiruqweyt ukweyt', '909090909', 3, '2018-12-23 14:52:10'),
(5, 'Ashraful makhiza', '01920192122', 'pola makhiza', 'maiya makhiza', 'mokhapur', 'agortola', '01290382947', 4, '2018-12-24 11:18:30'),
(7, 'Arifa Sultana', '12233445656', 'ashraful Alam', 'Mahiya mahi', 'poland', 'uganda', '12121212', 5, '2019-01-06 19:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `worktime`
--

CREATE TABLE `worktime` (
  `workers_id` int(11) NOT NULL,
  `regulartime` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `date` date NOT NULL,
  `included` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worktime`
--

INSERT INTO `worktime` (`workers_id`, `regulartime`, `overtime`, `date`, `included`) VALUES
(1, 2, 1, '2019-01-04', 1),
(2, 2, 1, '2019-01-04', 1),
(3, 1, 1, '2019-01-04', 1),
(2, 1, 0, '2019-01-04', 1),
(5, 1, 0, '2019-01-04', 1),
(5, 0, 3, '2019-01-04', 1),
(1, 2, 0, '2019-01-05', 1),
(1, 2, 0, '2019-01-05', 1),
(1, 2, 0, '2019-01-05', 1),
(2, 2, 0, '2019-01-05', 1),
(3, 2, 0, '2019-01-05', 1),
(5, 2, 0, '2019-01-05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_dates`
--
ALTER TABLE `payment_dates`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `worker_id` (`worker_id`);

--
-- Indexes for table `salarylevel`
--
ALTER TABLE `salarylevel`
  ADD PRIMARY KEY (`salarylevel_id`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD KEY `salarylevel_id` (`salarylevel_id`);

--
-- Indexes for table `worktime`
--
ALTER TABLE `worktime`
  ADD KEY `workers_id` (`workers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_dates`
--
ALTER TABLE `payment_dates`
  MODIFY `payment_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salarylevel`
--
ALTER TABLE `salarylevel`
  MODIFY `salarylevel_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_dates`
--
ALTER TABLE `payment_dates`
  ADD CONSTRAINT `payment_dates_ibfk_1` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`worker_id`);

--
-- Constraints for table `workers`
--
ALTER TABLE `workers`
  ADD CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`salarylevel_id`) REFERENCES `salarylevel` (`salarylevel_id`);

--
-- Constraints for table `worktime`
--
ALTER TABLE `worktime`
  ADD CONSTRAINT `worktime_ibfk_1` FOREIGN KEY (`workers_id`) REFERENCES `workers` (`worker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
