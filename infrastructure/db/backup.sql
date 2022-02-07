-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Nov 09, 2021 at 01:31 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `author` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `author`, `title`, `description`, `date`, `image`) VALUES
(39, '1', '1', '1', '2021-11-01', 'apple.png'),
(40, '34', '231', 'erwerasdf', '2021-11-17', 'banner.jpg'),
(41, '43434', '5234234', 'ersafsdfasdf', '2021-11-02', 'banner.jpg'),
(42, '231231231', '123123213', '123123123123', '2021-11-21', 'apple.png'),
(43, '342', 'rertert', 'dfgdsfcvxbxc', '2021-11-12', 'google.png'),
(44, 'dfgvcx', 'xvcbfrg', 'cdfbcvbdfg', '2021-11-05', 'google.png'),
(45, 'rt', 'cv', 'xcvb', '2021-11-21', 'apple.png'),
(46, '213', '34', '2342', '2021-11-15', 'apple.png'),
(47, 'xcvfd', 'ewrewqre', 'dfgdfg', '2021-11-30', 'apple.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(10, '1', '1@1.com', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
