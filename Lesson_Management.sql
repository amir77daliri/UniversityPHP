-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 03:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `l_id` int(10) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `teacher` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `capacity` int(10) NOT NULL,
  `img_url` varchar(500) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول دروس';

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`l_id`, `name`, `teacher`, `capacity`, `img_url`) VALUES
(8, 'ریاضی 1', 'کرم زاده', 29, 'ریاضی 1.jfif'),
(9, 'ریاضی 2', 'کرم زاده', 25, 'زیاضی 2.jfif'),
(10, 'ریاضی مهندسی', 'زعیم باشی', 30, 'مهندسی.jfif'),
(11, 'کارگاه تخصصی 4', 'سهرابی', 30, 'کارگاه 4.jfif'),
(12, 'کارگاه تخصصی 2', 'سهرابی', 25, 'کارگاه 2.jfif'),
(13, 'فیزیک 1', 'نیکونژاد', 39, 'فیزیک 1.jfif'),
(14, 'فیزیک 2', 'نیکونژاد', 40, 'فیزیک 2.jfif'),
(15, 'معادلات دیفرانسیل', 'زعیم باشی', 35, 'دیفرانسیل.jfif'),
(16, 'جبر خطی', 'بساق زاده', 30, 'جبر خطی.jfif'),
(17, 'سیگنال', 'بساق زاده', 40, 'سیگنال.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `username` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `fullname` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `is_teacher` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='جدول کاربران سایت';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `fullname`, `email`, `password`, `is_teacher`) VALUES
(1, 'امیر دلیری77', 'امیرحسین', 'amir@test.com', 'Amir1377', 1),
(3, 'محمد', 'محمد اکبری', 'mohammad@test.com', 'Amir1377', 0),
(4, 'سهرابی', 'سکینه سهرابی', 'sohrabi@test.com', 'Amir1377', 1),
(5, 'بساق زاده', 'علیرضا بساق زاده', 'Alireza@test.com', 'Amir1377', 1),
(6, 'رضا نیکونژاد', 'نیکونژاد', 'reza@test.com', 'Amir1377', 1),
(7, 'زعیم باشی', 'علی زعیم باشی', 'ali@test.com', 'Amir1377', 1),
(8, 'کرم زاده', 'اشرف کرم زاده', 'ashraf@test.com', 'Amir1377', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson`
--

CREATE TABLE `user_lesson` (
  `user_lesson_id` int(7) NOT NULL,
  `user_fk` int(10) NOT NULL,
  `lesson_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user_lesson`
--

INSERT INTO `user_lesson` (`user_lesson_id`, `user_fk`, `lesson_fk`) VALUES
(7, 3, 13),
(8, 3, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`l_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`,`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_lesson`
--
ALTER TABLE `user_lesson`
  ADD PRIMARY KEY (`user_lesson_id`),
  ADD KEY `user_fk` (`user_fk`),
  ADD KEY `lesson_fk` (`lesson_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `l_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_lesson`
--
ALTER TABLE `user_lesson`
  MODIFY `user_lesson_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_lesson`
--
ALTER TABLE `user_lesson`
  ADD CONSTRAINT `user_lesson_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_lesson_ibfk_2` FOREIGN KEY (`lesson_fk`) REFERENCES `lesson` (`l_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
