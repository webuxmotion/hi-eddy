-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: starter-kit-mysql-app:3306
-- Generation Time: May 20, 2022 at 09:50 PM
-- Server version: 5.7.38
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter_kit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `base` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `code`, `title`, `base`) VALUES
(1, 'uk', 'Ukrainian', '1'),
(2, 'en', 'English', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `slug` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `slug`) VALUES
(1, 'create-simple-html-page'),
(2, 'download-code-editor');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_description`
--

CREATE TABLE `lesson_description` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `meta_keywords` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson_description`
--

INSERT INTO `lesson_description` (`id`, `language_id`, `lesson_id`, `title`, `meta_description`, `meta_keywords`) VALUES
(1, 1, 1, 'Створюємо просту web-сторінку', 'Створюємо просту web-сторінку', 'Проста web-сторінка'),
(2, 2, 1, 'Create simple web-page', 'Create simple web-page', 'Simple web-page'),
(3, 1, 2, 'Завантажуємо редактор коду', 'Завантажуємо редактор коду', 'Редактор коду'),
(4, 2, 2, 'Download code editor', 'Download code editor', 'Code editor');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_pin`
--

CREATE TABLE `lesson_pin` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `firstName` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `telegram` varchar(256) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_description`
--
ALTER TABLE `lesson_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_pin`
--
ALTER TABLE `lesson_pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson_description`
--
ALTER TABLE `lesson_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lesson_pin`
--
ALTER TABLE `lesson_pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
