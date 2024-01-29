-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 23, 2023 at 06:50 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `properties_home`
--

drop Database if exists properties_home;
create database properties_home;
use properties_home;

-- --------------------------------------------------------

--
-- Table structure for table `applicationstatus`
--

CREATE TABLE `applicationstatus` (
  `id` int(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `applicationstatus`
--

INSERT INTO `applicationstatus` (`id`, `status`) VALUES
(1, 'Accept'),
(2, 'under consideration'),
(3, 'declined');

-- --------------------------------------------------------

--
-- Table structure for table `homeowner`
--

CREATE TABLE `homeowner` (
  `id` int(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email_address` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeowner`
--

INSERT INTO `homeowner` (`id`, `name`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Sarah', 538584757, 'sarah@gmail.com', '$2y$10$HRoSHUYviiqvlAPaPp4Xc.ucfW0i34VlAdbdQC5Z26DBAE6OpdLIW'),
(2, 'Dana', 5483746, 'dana@gmail.com', '$2y$10$1K1ivHxZjsXwcX42P1Bbou09T8JQUAWUerNlCzhbVPeYVPRMLDLmG'),
(3, 'Salah', 576435432, 'salah@gmail.com', '$2y$10$PS3oo8D/nqcttfTbbHAAk.Tl4uoUU8sf.HNlnD2uJ2vVdOuLdWpBe'),
(8, 'Nouf', 35743545, 'Nouf@gmail.com', '$2y$10$ONOL0kOHvG3b0tmB39VQ1eQU8Fl3lsgchIVhnAcuydVrRLQav1xzW'),
(9, 'Lama', 35743545, 'Lama@gmail.com', '$2y$10$ghyzv4myuVeMO8rbbcwjFeJObgSupJ5c8dcAxFTCqd136wJ/Kecpm'),
(10, 'Mohamad', 35743545, 'Mohamad@gmail.com', '$2y$10$bAF/jxSTHmcqQcZagiJgu.mOv7QEPCcSkZ4JgWqXam7uFXUk5FEKa');

-- --------------------------------------------------------

--
-- Table structure for table `homeseeker`
--

CREATE TABLE `homeseeker` (
  `id` int(1) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `family_members` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `job` varchar(40) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `homeseeker`
--

INSERT INTO `homeseeker` (`id`, `first_name`, `last_name`, `age`, `family_members`, `income`, `job`, `phone_number`, `email_address`, `password`) VALUES
(1, 'Ahamd', 'khalid', 25, 4, 1000, 'Office manager', 543765439, 'ahmad@gmail.com', '$2y$10$wvUv8ZqPNEtHLCxgBw.voOlEL051PN.XwbtEN0DxHfrbQ./INMC5e'),
(2, 'Lama', 'Muhammad', 32, 4, 8500, 'Writer', 543876543, 'lama@gmail.com', '$2y$10$3ZSWzImFVUB3ZkuGd/UXSuA01q1N.VcEuAQbKaEQAwIXl9gX1uwxa'),
(3, 'Fatima', 'hamad', 43, 5, 13000, 'Project manager', 564876543, 'Fatima@gmail.com', '$2y$10$.TwxhjXDUU7SBTTDmaBMNeQsUqybZBtyj5yXj6GEbjW0Tzvc4o3Pa'),
(10, 'Hamad', 'Ahmed', 34, 2, 30000, 'HR', 987657, 'Hamad@gmail.com', '$2y$10$kLU2/EAktKB9vd07LBFUA.T/T.6I78u9frAdNXc3WvC5EzzLcJZkG'),
(11, 'Ziyad', 'Hamad', 54, 5, 40000, 'ceo', 456789, 'Ziyad@gmail.com', '$2y$10$s/q.kaCY5jqz5oJAjAH7MeQ.EegbP1YCSsN8uPVPI7c6RkCmOuYia'),
(12, 'Nora', 'Hamad', 34, 2, 40000, 'doctors', 45446789, 'Nora@gmail.com', '$2y$10$N3lDwtk6lR4OgfPCYvnV7O3aUTzVLcT0plHbFQtM/mIOezYWTT0We');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(1) NOT NULL,
  `homeowner_id` int(11) NOT NULL,
  `property_category_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rooms` int(11) NOT NULL,
  `rent_cost` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `max_tenants` int(11) NOT NULL,
  `description` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `homeowner_id`, `property_category_id`, `name`, `rooms`, `rent_cost`, `location`, `max_tenants`, `description`) VALUES
(6, 8, 3, 'Dream home', 5, 5000, 'Alolya , Riyadh', 1, '5 rooms'),
(7, 9, 2, 'Apart8', 4, 3000, 'Alolya , Riyadh', 1, '4 rooms'),
(8, 9, 1, 'Dream villa', 5, 3500, 'Alolya , Riyadh', 1, '5 rooms'),
(9, 8, 3, 'MyPlace', 7, 4500, 'Alolya , Riyadh', 2, '7 rooms'),
(11, 9, 3, 'MySpace', 7, 3500, 'Alolya , Riyadh', 2, '7 rooms , kitchen'),
(12, 9, 1, 'Villa200', 5, 6000, 'Alolya , Riyadh', 1, '5 rooms , bathrooms'),
(13, 10, 3, 'MyHome', 6, 3500, 'Alolya , Riyadh', 1, '6 rooms , outdoor'),
(16, 10, 2, 'Apart101', 4, 4000, 'Alolya , Riyadh', 1, 'On third floor'),
(17, 10, 1, 'Villa2', 8, 8000, 'Alolya , Riyadh', 2, 'Three floor , 8 rooms');

-- --------------------------------------------------------

--
-- Table structure for table `propertycategory`
--

CREATE TABLE `propertycategory` (
  `id` int(1) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertycategory`
--

INSERT INTO `propertycategory` (`id`, `category`) VALUES
(1, 'Villa'),
(2, 'Apartment'),
(3, 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `propertyimage`
--

CREATE TABLE `propertyimage` (
  `id` int(1) NOT NULL,
  `property_id` int(11) NOT NULL,
  `path` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `propertyimage`
--

INSERT INTO `propertyimage` (`id`, `property_id`, `path`) VALUES
(1, 4, '646caadd36b41.jpg'),
(2, 5, '646cab8d76dae.jpg'),
(3, 6, '646cac5f2fff3.jpg'),
(4, 7, '646cb936bd192.jpg'),
(5, 8, '646cd39cda8c3.jpg'),
(6, 9, '646cd47294511.png'),
(7, 11, '646cd71c27120.jpg'),
(8, 12, '646cd81bde523.jpg'),
(9, 13, '646d086de17a3.jpg'),
(10, 16, '646d094e6ebd9.jpg'),
(11, 17, '646d0a892a4d6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rentalapplication`
--

CREATE TABLE `rentalapplication` (
  `id` int(1) NOT NULL,
  `property_id` int(11) NOT NULL,
  `home_seeker_id` int(11) NOT NULL,
  `application_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentalapplication`
--

INSERT INTO `rentalapplication` (`id`, `property_id`, `home_seeker_id`, `application_status_id`) VALUES
(1, 1, 3, 2),
(2, 2, 2, 1),
(3, 3, 1, 3),
(4, 1, 10, 2),
(5, 2, 10, 2),
(6, 1, 10, 2),
(7, 6, 10, 3),
(8, 7, 10, 1),
(9, 6, 11, 1),
(11, 12, 11, 3),
(12, 7, 11, 2),
(13, 9, 10, 2),
(14, 12, 10, 2),
(15, 6, 12, 2),
(16, 16, 12, 2),
(17, 11, 12, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationstatus`
--
ALTER TABLE `applicationstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeowner`
--
ALTER TABLE `homeowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeseeker`
--
ALTER TABLE `homeseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeowner_id` (`homeowner_id`),
  ADD KEY `property_category_id` (`property_category_id`);

--
-- Indexes for table `propertycategory`
--
ALTER TABLE `propertycategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertyimage`
--
ALTER TABLE `propertyimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `home_seeker_id` (`home_seeker_id`),
  ADD KEY `application_status_id` (`application_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationstatus`
--
ALTER TABLE `applicationstatus`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homeowner`
--
ALTER TABLE `homeowner`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `homeseeker`
--
ALTER TABLE `homeseeker`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `propertycategory`
--
ALTER TABLE `propertycategory`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `propertyimage`
--
ALTER TABLE `propertyimage`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rentalapplication`
--
ALTER TABLE `rentalapplication`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
