-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 06:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `shp_administrators`
--

CREATE TABLE `shp_administrators` (
  `admin_record` double NOT NULL,
  `admin_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` enum('active','deactive','ban','') COLLATE utf8_unicode_ci NOT NULL,
  `admin_levels` enum('admin','manager','users','') COLLATE utf8_unicode_ci NOT NULL,
  `admin_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_password` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_hint` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shp_administrators`
--

INSERT INTO `shp_administrators` (`admin_record`, `admin_id`, `admin_fullname`, `admin_email`, `admin_status`, `admin_levels`, `admin_createdate`, `admin_password`, `admin_hint`) VALUES
(1, 'AD202405272306411716826622', 'Admin Administrators', 'tossapol.c@dru.ac.th', 'active', 'admin', '2024-05-27 16:06:41', 'eyJlbWFpbCI6InN5YmVyaWEuaHVneUBnbWFpbC5jb20iLCJjcmVhdGVkYXRlIjoiMjAyNC0wNS0xMCAwODoyNzowNy4wMDAwMDAifQ==,eyJlbWFpbCI6InRvc3NhcG9sLmNAZHJ1LmFjLnRoIiwicHdkIjoiZXlKd2QyUWlPaUowWlhOMEluMD0ifQ==', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `shp_logs`
--

CREATE TABLE `shp_logs` (
  `logs_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `logs_events` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `logs_action` enum('create','read','update','delete','search') COLLATE utf8_unicode_ci NOT NULL,
  `logs_token` text COLLATE utf8_unicode_ci NOT NULL,
  `logs_useragent` text COLLATE utf8_unicode_ci NOT NULL,
  `logs_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `logs_platform` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `logs_ga` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shp_members`
--

CREATE TABLE `shp_members` (
  `mem_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Members ID',
  `mem_fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Full Name',
  `mem_createdate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Create DateTime',
  `mem_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email Confirm',
  `mem_status` enum('active','deactive','ban','') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Status Using',
  `mem_telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Telephone Confirm',
  `mem_lastupdate` timestamp NULL DEFAULT NULL COMMENT 'Last Update Time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shp_members`
--

INSERT INTO `shp_members` (`mem_id`, `mem_fullname`, `mem_createdate`, `mem_email`, `mem_status`, `mem_telephone`, `mem_lastupdate`) VALUES
('1111', 'Test 1111', '2024-05-12 16:03:24', 'tset@email.com', '', 'xxx-xxx-xxxx', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shp_products`
--

CREATE TABLE `shp_products` (
  `pd_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pd_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pd_text` text COLLATE utf8_unicode_ci NOT NULL,
  `pd_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pd_lastupdate` timestamp NULL DEFAULT NULL,
  `pd_status` enum('active','deactive','ban','cancel') COLLATE utf8_unicode_ci NOT NULL,
  `pd_owner` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pd_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shp_registers`
--

CREATE TABLE `shp_registers` (
  `reg_record` double NOT NULL,
  `reg_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `reg_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `reg_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `reg_status` enum('deactive','active','ban','cancel') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'deactive',
  `reg_token` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_telephone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shp_uploads`
--

CREATE TABLE `shp_uploads` (
  `ul_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ul_filename` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ul_createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ul_reference` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ul_token` int(11) NOT NULL,
  `ul_mimetype` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ul_status` enum('active','deactive','ban','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shp_administrators`
--
ALTER TABLE `shp_administrators`
  ADD PRIMARY KEY (`admin_record`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_email` (`admin_email`);

--
-- Indexes for table `shp_logs`
--
ALTER TABLE `shp_logs`
  ADD KEY `logs_token` (`logs_token`(1024)),
  ADD KEY `logs_action` (`logs_action`),
  ADD KEY `logs_address` (`logs_address`);

--
-- Indexes for table `shp_members`
--
ALTER TABLE `shp_members`
  ADD PRIMARY KEY (`mem_id`),
  ADD KEY `mem_email` (`mem_email`),
  ADD KEY `mem_telephone` (`mem_telephone`);

--
-- Indexes for table `shp_products`
--
ALTER TABLE `shp_products`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `pd_owner` (`pd_owner`),
  ADD KEY `pd_status` (`pd_status`);

--
-- Indexes for table `shp_registers`
--
ALTER TABLE `shp_registers`
  ADD PRIMARY KEY (`reg_record`),
  ADD KEY `reg_email` (`reg_email`),
  ADD KEY `reg_telephone` (`reg_telephone`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `shp_uploads`
--
ALTER TABLE `shp_uploads`
  ADD PRIMARY KEY (`ul_id`),
  ADD KEY `ul_status` (`ul_status`),
  ADD KEY `ul_token` (`ul_token`),
  ADD KEY `ul_reference` (`ul_reference`),
  ADD KEY `ul_filename` (`ul_filename`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shp_administrators`
--
ALTER TABLE `shp_administrators`
  MODIFY `admin_record` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
