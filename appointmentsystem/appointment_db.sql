-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 11:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timeofappointment` text COLLATE utf8_unicode_ci NOT NULL,
  `confirmation` tinytext COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Not yet confirmed',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `sex` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sun` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `mon` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `tue` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `wed` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `thu` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `fri` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `sat` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '—',
  `bio` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `workAuthorize` text COLLATE utf8_unicode_ci NOT NULL,
  `workexp` text COLLATE utf8_unicode_ci NOT NULL,
  `residency` text COLLATE utf8_unicode_ci NOT NULL,
  `internship` text COLLATE utf8_unicode_ci NOT NULL,
  `medschool` text COLLATE utf8_unicode_ci NOT NULL,
  `license` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `boardCert` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `otherCert` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `workHistory` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `specialization` text COLLATE utf8_unicode_ci NOT NULL,
  `pwd` longtext COLLATE utf8_unicode_ci NOT NULL,
  `imgname` text COLLATE utf8_unicode_ci NOT NULL,
  `imgstatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `sex`, `status`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`, `bio`, `workAuthorize`, `workexp`, `residency`, `internship`, `medschool`, `license`, `boardCert`, `otherCert`, `workHistory`, `specialization`, `pwd`, `imgname`, `imgstatus`) VALUES
(1, 'Dr. Janella Reyes', 'Female', 0, '8:00 - 12:00 AM', '1:00 - 4:00 PM', '—', '1:00 - 4:00 PM', '—', '1:00 - 4:00 PM', '—', 'Masters Degree in Medicine. Practitioner as Pediatrics Doctor in St. Hospital', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', '12 years of work experience ', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Lorem ipsum dolor sit amet, consectetur adipiscing...', 'Pediatrics', '$2y$10$duCLU2NDdXHGBV5tzFgdSeGwRvZOoich65Mrb8PYD0yVDivMi88Uq', 'profile1_1598355602.jpg', 0),
(2, 'Dr. Jasmine Santos', 'Female', 0, '—', '8:00 - 12:00 AM', '—', '1:00 -4:00 PM', '—', '8:00 - 12:00 AM', '10:00 - 12:00 AM', 'Emergency Medicine and Pediatrics. Top Notcher of NMAT Test Philippines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '8 years of work experience ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Pediatrics', '$2y$10$eHVVeg6t0hfVkNZgILglweomPeI6PsC4hfZvu4ZSKjDFi7uK33Hw.', 'profile2_1598355383.jpg', 0),
(3, 'Dr. Rowena Reyes', 'Female', 0, '—', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 12:00 PM', 'Highest GPA of Licensure Examination in 4 Different Countries as Physical Therapist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '12 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris.', 'Physical Therapist', '$2y$10$4gu0v4UCZkm1PxeYbzb/EuA4dB9hESxb8nvE9ORvT/8Ufp2Jx1RL2', 'profile3_1598355407.jpg', 0),
(4, 'Dr. Maricar Cruz', 'Female', 0, '—', '—', '1:00 - 4:00 PM', '1:00 - 4:00 PM', '—', '1:00 - 4:00 PM', '—', 'Certified Opthalmologiest. Goverment Doctor for 10 years', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '18 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Opthalmologist', '$2y$10$Fk1SPXDapDGzNEyo3Vi9hecZ1z2A2yaWSa5OBw7dxqQV8HHqeafiK', 'profile4_1598355434.jpg', 0),
(5, 'Dr. Christian Ocampo', 'Male', 0, '—', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', '8:00 AM - 5:00 PM', 'Philippine Licensure Examination Top 10 List. Certified Physical Therapist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '6 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Physical Therapist', '$2y$10$SYOBAtC9S44nP7BQ/V.l.erd5ZJzaXIghiiWyot9eWXdd4Wc82KQS', 'profile5_1598355454.jpg', 0),
(6, 'Dr. Gabriel Santos', 'Male', 0, '1:00 - 3:00 PM', '12:00 - 3:00 PM', '12:00 - 3:00 PM', '—', '12:00 - 3:00 PM', '—', '12:00 - 3:00 PM', 'Orthopedic Surgeon. Chief Doctor at St. Hospital Philippines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '7 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Orthopedics', '$2y$10$Ft3uo564cZiFT47zVMtSte2.WxETp6uCfG./06yV5Cv9fw3MIY6jq', 'profile6_1598355498.jpg', 0),
(7, 'Dr. Jessica Smith', 'Female', 0, '12:00 - 3:00 PM', '8:00 - 11:00 AM', '8:00 - 11:00 AM', '8:00 - 11:00 AM', '—', '8:00 - 11:00 AM', '—', 'Obstetrics-gynecology. Medical and Surgical Skilled.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '15 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'OB-Gyn', '$2y$10$6i9Gu/.L3jDPePbipLH7xunKHBZdJJxyeWNCBDS2g43GchtpOyzky', 'profile7_1598355532.jpg', 0),
(8, 'Dr. Danilo Garcia', 'Male', 0, '—', '—', '10:00 - 2:00 PM', '—', '10:00 - 2:00 PM', '—', '10:00 - 2:00 PM', 'PhD in Internal Medicine and a Resident Doctor of Sum City', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '6 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Pediatrics', '$2y$10$yLT.4OydiosvSiv8pwBjhuVaMc9yYv8D7JJYcTTpEsZ5UyVD3jDjW', 'profile8_1598355557.jpg', 0),
(9, 'Dr. Ramil Torres', 'Male', 0, '—', '1:00 - 4:00 PM', '—', '1:00 - 4:00 PM', '—', '8:00 - 11:00 AM', '12:00 - 2:00 PM', 'Total of 2 PhDs in Internal Medicine and Emergency Medicine', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', '5 years of work experience', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ac ullamcorper orci, rhoncus consectetur mauris. ', 'ENT - HNS', '$2y$10$VOgUysR5HClXWHUaeV/dbeQbmphSPH156n3zKjJ0HEpgEm3v6Nvl6', 'profile9_1598355586.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `imgname` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_client`
--

CREATE TABLE `user_client` (
  `id` int(11) NOT NULL,
  `fname` text COLLATE utf8_unicode_ci NOT NULL,
  `lname` text COLLATE utf8_unicode_ci NOT NULL,
  `mname` text COLLATE utf8_unicode_ci NOT NULL,
  `uid` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `sex` text COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL,
  `allergy` text COLLATE utf8_unicode_ci NOT NULL,
  `disable` text COLLATE utf8_unicode_ci NOT NULL,
  `pwd` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_client`
--
ALTER TABLE `user_client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_client`
--
ALTER TABLE `user_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
