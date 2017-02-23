-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 10:21 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmlite`
--
CREATE DATABASE IF NOT EXISTS `cmlite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cmlite`;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(8) NOT NULL,
  `class` varchar(8) NOT NULL,
  `alphabeth` varchar(1) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `years` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `alphabeth`, `dept`, `years`) VALUES
(2, 'XI', 'B', 'Rekayasa Perangkat Lunak', '2016 / 2017'),
(7, 'XI', 'B', 'Teknik Komputer dan Jaringan', '2016 / 2017'),
(9, 'XI', 'B', 'Agronomi', '2016 / 2017'),
(10, 'XII', 'B', 'Bisnis Management', '2016 / 2017'),
(11, 'XI', 'A', 'Kimia Industri', '2016 / 2017'),
(12, 'XI', 'A', 'Bisnis Management', '2016 / 2017');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(8) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class_id` int(8) NOT NULL,
  `nisn` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `email`, `class_id`, `nisn`) VALUES
(3, 'Muhammad Sultoni', 'tonyhazama4721@gmail.com', 2, 1918121270),
(4, 'Azzam Mujahidin Jauhari', 'azzammujari@gmail.com', 2, 2147483647),
(5, 'Jingga Bau', 'jinggaeek@eek.eek', 9, 12314151),
(6, 'Chicka kucing', 'meong21@memeng.ceow', 12, 123145),
(7, 'Cincin Permata', 'ringdiamond@pbnc.tai', 11, 1231415135),
(8, 'Denda Cherybelle', 'cherybuduk@borog.comber', 11, 12314),
(9, 'DENDASAMIAH', 'sumatri@eek.eek', 7, 12415),
(10, 'Somplak Tooth', 'soto@gigi.clok', 12, 12151215),
(11, 'Situmang', 'situ.mang@amang.com', 7, 12314),
(12, 'Joker', 'somedi@dukun.doeloe', 10, 12311415),
(13, 'Comosikun', 'comosikun@bau.eek', 12, 2147483647),
(14, 'soke', 'soke2@bau.eek', 2, 1245163),
(15, 'kili', 'kiling@gmail.co.jk', 11, 123432123),
(16, 'gduwgdkuw', 'soskdoakwok@cc.cc', 11, 2147483647),
(17, 'soku', 'songoku@comot.eek', 11, 123124124);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_students` (`class_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_students` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
