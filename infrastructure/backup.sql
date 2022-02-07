-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Nov 15, 2021 at 02:21 PM
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
(65, '7878', '78978', '9789', '2021-11-15', 'banner.jpg'),
(71, '45', '454', '123', '2021-11-14', 'warty-final-ubuntu.png'),
(74, 'trzre', 'ez', 'erz', '2021-11-08', 'hardy_wallpaper_uhd.png'),
(75, '45', '4545', '45', '2021-11-15', 'google.png'),
(77, '4545', '45', '45', '2021-11-14', 'brad-huchteman-stone-mountain.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
