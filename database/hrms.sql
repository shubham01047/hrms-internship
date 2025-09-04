-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `punch_in` text DEFAULT NULL,
  `punch_in_remarks` text DEFAULT NULL,
  `punch_out` text DEFAULT NULL,
  `punch_out_remarks` text DEFAULT NULL,
  `total_working_hours` time DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `punch_in_again` text DEFAULT NULL,
  `punch_in_again_remarks` text DEFAULT NULL,
  `punch_out_again` text DEFAULT NULL,
  `punch_out_again_remarks` text DEFAULT NULL,
  `overtime_working_hours` time DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `location_type` enum('Home','Company') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `date`, `punch_in`, `punch_in_remarks`, `punch_out`, `punch_out_remarks`, `total_working_hours`, `created_at`, `updated_at`, `deleted_at`, `punch_in_again`, `punch_in_again_remarks`, `punch_out_again`, `punch_out_again_remarks`, `overtime_working_hours`, `latitude`, `longitude`, `location_type`) VALUES
(44, 7, '2025-07-31', '2025-07-31 19:04:20', NULL, NULL, NULL, NULL, '2025-07-31 19:04:20', '2025-07-31 19:04:20', NULL, NULL, NULL, NULL, NULL, '00:00:00', NULL, NULL, NULL),
(45, 7, '2025-08-01', '2025-08-01 14:01:27', NULL, '2025-08-01 14:17:28', NULL, '00:16:01', '2025-08-01 14:01:27', '2025-08-01 14:17:28', NULL, NULL, NULL, NULL, NULL, '00:00:00', NULL, NULL, NULL),
(69, 8, '2025-08-01', '2025-08-01 20:22:37', NULL, '2025-08-01 20:22:55', 'out', '00:00:18', '2025-08-01 20:22:37', '2025-08-01 20:30:46', NULL, '2025-08-01 20:30:41', NULL, '2025-08-01 20:30:46', 'aaaa', '00:00:05', NULL, NULL, NULL),
(80, 7, '2025-08-02', '2025-08-02 16:25:15', 'punch in', '2025-08-02 16:25:29', 'punchout', '00:00:14', '2025-08-02 16:25:15', '2025-08-02 16:26:36', NULL, '2025-08-02 16:26:33', NULL, '2025-08-02 16:26:36', NULL, '00:00:36', NULL, NULL, NULL),
(82, 7, '2025-08-04', '2025-08-04 22:12:27', 'Got up late...', '2025-08-04 22:13:15', 'Finished my work', '00:00:48', '2025-08-04 22:12:27', '2025-08-08 17:38:56', NULL, '2025-08-04 22:14:21', 'Another bug', '2025-08-04 22:14:34', 'Done for day', '00:00:47', NULL, NULL, NULL),
(83, 7, '2025-08-08', '2025-08-08 17:39:08', 'Punchin', '2025-08-08 18:08:49', 'out', '00:29:41', '2025-08-08 17:39:08', '2025-08-08 18:08:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 7, '2025-08-10', '2025-08-10 13:49:02', 'Got up late.', '2025-08-10 13:50:08', 'Got some appointment', '00:01:06', '2025-08-10 13:49:02', '2025-08-10 13:50:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 7, '2025-08-11', '2025-08-11 20:05:06', NULL, '2025-08-11 20:05:50', NULL, '00:00:44', '2025-08-11 20:05:06', '2025-08-11 20:05:50', NULL, NULL, NULL, NULL, NULL, NULL, '15.6224308', '73.8811644', 'Home'),
(90, 7, '2025-08-20', '2025-08-13 15:11:50', NULL, '2025-08-13 15:11:55', NULL, '07:00:05', '2025-08-13 15:11:50', '2025-08-19 21:09:56', NULL, NULL, NULL, NULL, NULL, NULL, '15.6224161', '73.8811619', 'Company'),
(91, 6, '2025-08-13', '2025-08-13 15:20:04', 'Starting work', '2025-08-13 15:25:14', 'Finished work', '00:05:10', '2025-08-13 15:20:04', '2025-08-13 15:27:17', NULL, '2025-08-13 15:26:21', 'Working overtime', '2025-08-13 15:27:17', 'Done overtime', '00:00:56', '15.4995', '73.8278', 'Company'),
(92, NULL, '2025-08-18', '2025-08-18 13:18:34', 'Starting work with postman', NULL, NULL, NULL, '2025-08-18 13:18:35', '2025-08-19 20:58:13', NULL, NULL, NULL, NULL, NULL, NULL, '15.4995', '73.8278', 'Company'),
(93, 7, '2025-08-19', '2025-08-19 09:24:05', 'late due to traffic', '2025-08-19 19:06:31', NULL, '04:11:26', '2025-08-19 15:55:05', '2025-08-20 11:06:10', NULL, '2025-08-19 20:48:30', NULL, '2025-08-19 20:48:34', '7t', '00:00:04', '15.6224257', '73.8811267', 'Company'),
(94, 7, '2025-08-21', '2025-08-21 12:29:30', NULL, '2025-08-21 12:29:43', NULL, '09:00:13', '2025-08-21 12:29:30', '2025-08-21 12:31:23', NULL, NULL, NULL, NULL, NULL, NULL, '15.6224363', '73.8811448', 'Company'),
(95, 7, '2025-08-25', '2025-08-25 12:06:32', NULL, '2025-08-25 12:37:22', NULL, '00:30:50', '2025-08-25 12:06:32', '2025-08-25 12:37:22', NULL, NULL, NULL, NULL, NULL, NULL, '15.6305', '73.8108', 'Home'),
(96, 6, '2025-09-02', '2025-09-02 18:42:33', 'Starting work with postman', '2025-09-02 18:43:03', 'Finished work', '00:00:30', '2025-09-02 18:42:33', '2025-09-02 18:44:35', NULL, '2025-09-02 18:44:18', 'Working overtime', '2025-09-02 18:44:35', 'Done overtime', '00:00:17', '15.4995', '73.8278', 'Company'),
(98, 7, '2025-09-03', '2025-09-03 9:29:47', NULL, '2025-09-02 18:43:03', NULL, '00:30:50', '2025-09-03 11:57:47', '2025-09-04 14:30:11', NULL, NULL, NULL, NULL, NULL, NULL, '15.6223919', '73.881157', 'Company'),
(99, 6, '2025-09-04', '2025-09-04 14:30:40', NULL, '2025-09-04 14:31:01', NULL, '07:02:21', '2025-09-04 14:30:40', '2025-09-04 14:31:35', NULL, NULL, NULL, NULL, NULL, NULL, '15.6223627', '73.8811543', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `breaks`
--

CREATE TABLE `breaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `break_type` varchar(50) DEFAULT NULL,
  `break_start` text DEFAULT NULL,
  `break_end` text DEFAULT NULL,
  `total_break_time` time DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breaks`
--

INSERT INTO `breaks` (`id`, `attendance_id`, `break_type`, `break_start`, `break_end`, `total_break_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(42, 45, 'Morning Tea', '14:12:47', '14:12:57', '00:00:10', '2025-08-01 14:12:47', '2025-08-01 14:12:57', NULL),
(43, 45, 'Lunch', '14:13:21', '14:13:24', '00:00:03', '2025-08-01 14:13:21', '2025-08-01 14:13:24', NULL),
(44, NULL, 'Morning Tea', '14:43:39', '14:44:33', '00:00:54', '2025-08-01 14:43:39', '2025-08-01 14:44:33', NULL),
(45, NULL, 'Morning Tea', '15:17:31', '15:17:42', '00:00:11', '2025-08-01 15:17:31', '2025-08-01 15:17:42', NULL),
(46, NULL, 'Lunch', '15:17:51', '15:17:55', '00:00:04', '2025-08-01 15:17:51', '2025-08-01 15:17:55', NULL),
(47, NULL, 'Evening Tea', '15:20:15', '15:20:36', '00:00:21', '2025-08-01 15:20:15', '2025-08-01 15:20:36', NULL),
(48, NULL, 'Custom', '15:20:46', '15:20:52', '00:00:06', '2025-08-01 15:20:46', '2025-08-01 15:20:52', NULL),
(49, NULL, 'Morning Tea', '15:22:35', '15:24:46', '00:02:11', '2025-08-01 15:22:35', '2025-08-01 15:24:46', NULL),
(50, NULL, 'Morning Tea', '15:25:19', '15:25:29', '00:00:10', '2025-08-01 15:25:19', '2025-08-01 15:25:29', NULL),
(51, NULL, 'Lunch', '15:58:36', '15:58:41', '00:00:05', '2025-08-01 15:58:36', '2025-08-01 15:58:41', NULL),
(52, NULL, 'Evening Tea', '15:58:49', '15:59:00', '00:00:11', '2025-08-01 15:58:49', '2025-08-01 15:59:00', NULL),
(53, NULL, 'Custom', '15:59:09', '15:59:19', '00:00:10', '2025-08-01 15:59:09', '2025-08-01 15:59:19', NULL),
(54, NULL, 'Morning Tea', '16:00:06', '16:00:16', '00:00:10', '2025-08-01 16:00:06', '2025-08-01 16:00:16', NULL),
(55, NULL, 'Morning Tea', '16:02:58', '16:03:32', '00:00:34', '2025-08-01 16:02:58', '2025-08-01 16:03:32', NULL),
(56, NULL, 'Lunch', '16:03:37', '16:03:45', '00:00:08', '2025-08-01 16:03:37', '2025-08-01 16:03:45', NULL),
(57, NULL, 'Evening Tea', '16:03:56', '16:04:02', '00:00:06', '2025-08-01 16:03:56', '2025-08-01 16:04:02', NULL),
(58, NULL, 'Morning Tea', '16:04:40', '16:04:44', '00:00:04', '2025-08-01 16:04:40', '2025-08-01 16:04:44', NULL),
(59, NULL, 'Lunch', '16:15:16', '16:15:25', '00:00:09', '2025-08-01 16:15:16', '2025-08-01 16:15:25', NULL),
(60, NULL, 'Morning Tea', '16:18:12', '16:18:17', '00:00:05', '2025-08-01 16:18:12', '2025-08-01 16:18:17', NULL),
(61, NULL, 'Lunch', '16:19:36', '16:19:40', '00:00:04', '2025-08-01 16:19:36', '2025-08-01 16:19:40', NULL),
(62, NULL, 'Evening Tea', '16:19:43', '16:19:47', '00:00:04', '2025-08-01 16:19:43', '2025-08-01 16:19:47', NULL),
(63, NULL, 'Morning Tea', '16:24:31', '16:24:35', '00:00:04', '2025-08-01 16:24:31', '2025-08-01 16:24:35', NULL),
(64, NULL, 'Lunch', '16:24:47', '16:24:55', '00:00:08', '2025-08-01 16:24:47', '2025-08-01 16:24:55', NULL),
(65, NULL, 'Evening Tea', '16:25:22', '16:25:27', '00:00:05', '2025-08-01 16:25:22', '2025-08-01 16:25:27', NULL),
(66, NULL, 'Custom', '16:25:39', '16:25:43', '00:00:04', '2025-08-01 16:25:39', '2025-08-01 16:25:43', NULL),
(67, NULL, 'Morning Tea', '16:34:40', '16:34:45', '00:00:05', '2025-08-01 16:34:40', '2025-08-01 16:34:45', NULL),
(68, NULL, 'Morning Tea', '16:35:37', '16:35:48', '00:00:11', '2025-08-01 16:35:37', '2025-08-01 16:35:48', NULL),
(69, NULL, 'Morning Tea', '16:36:54', '16:36:58', '00:00:04', '2025-08-01 16:36:54', '2025-08-01 16:36:58', NULL),
(70, NULL, 'Lunch', '16:37:15', '16:37:22', '00:00:07', '2025-08-01 16:37:15', '2025-08-01 16:37:22', NULL),
(71, NULL, 'Morning Tea', '16:38:40', '16:38:45', '00:00:05', '2025-08-01 16:38:40', '2025-08-01 16:38:45', NULL),
(72, NULL, 'Morning Tea', '16:46:58', '16:47:02', '00:00:04', '2025-08-01 16:46:58', '2025-08-01 16:47:02', NULL),
(73, NULL, 'Lunch', '16:47:31', '16:47:36', '00:00:05', '2025-08-01 16:47:31', '2025-08-01 16:47:36', NULL),
(74, NULL, 'Evening Tea', '16:47:47', '16:47:54', '00:00:07', '2025-08-01 16:47:47', '2025-08-01 16:47:54', NULL),
(75, NULL, 'Morning Tea', '16:50:22', '16:50:28', '00:00:06', '2025-08-01 16:50:22', '2025-08-01 16:50:28', NULL),
(76, NULL, 'Morning Tea', '16:51:20', '16:51:24', '00:00:04', '2025-08-01 16:51:20', '2025-08-01 16:51:24', NULL),
(77, NULL, 'Morning Tea', '17:15:29', '17:15:34', '00:00:05', '2025-08-01 17:15:29', '2025-08-01 17:15:34', NULL),
(78, NULL, 'Morning Tea', '17:53:00', '17:53:06', '00:00:06', '2025-08-01 17:53:00', '2025-08-01 17:53:06', NULL),
(79, NULL, 'Lunch', '18:01:54', '18:01:57', '00:00:03', '2025-08-01 18:01:54', '2025-08-01 18:01:57', NULL),
(80, NULL, 'Morning Tea', '18:02:02', '18:02:14', '00:00:12', '2025-08-01 18:02:02', '2025-08-01 18:02:14', NULL),
(81, NULL, 'Morning Tea', '18:21:18', '18:21:28', '00:00:10', '2025-08-01 18:21:18', '2025-08-01 18:21:28', NULL),
(82, NULL, 'Lunch', '18:21:35', '18:21:43', '00:00:08', '2025-08-01 18:21:35', '2025-08-01 18:21:43', NULL),
(83, NULL, 'Evening Tea', '18:21:56', '18:22:02', '00:00:06', '2025-08-01 18:21:56', '2025-08-01 18:22:02', NULL),
(84, NULL, 'Custom', '18:22:10', '18:22:20', '00:00:10', '2025-08-01 18:22:10', '2025-08-01 18:22:20', NULL),
(85, NULL, 'Morning Tea', '18:54:22', '18:54:28', '00:00:06', '2025-08-01 18:54:22', '2025-08-01 18:54:28', NULL),
(86, NULL, 'Morning Tea', '13:09:55', '13:10:02', '00:00:07', '2025-08-02 13:09:55', '2025-08-02 13:10:02', NULL),
(87, NULL, 'Morning Tea', '16:14:31', '16:14:39', '00:00:08', '2025-08-02 16:14:31', '2025-08-02 16:14:39', NULL),
(88, NULL, 'Lunch', '16:16:28', '16:16:35', '00:00:07', '2025-08-02 16:16:28', '2025-08-02 16:16:35', NULL),
(89, NULL, 'Morning Tea', '16:22:25', '16:22:30', '00:00:05', '2025-08-02 16:22:25', '2025-08-02 16:22:30', NULL),
(90, NULL, 'Morning Tea', '18:03:48', '18:03:57', '00:00:09', '2025-08-04 18:03:48', '2025-08-04 18:03:57', NULL),
(91, NULL, 'Lunch', '18:04:02', '18:04:10', '00:00:08', '2025-08-04 18:04:02', '2025-08-04 18:04:10', NULL),
(92, NULL, 'Evening Tea', '18:04:15', '18:04:27', '00:00:12', '2025-08-04 18:04:15', '2025-08-04 18:04:27', NULL),
(93, 82, 'Evening Tea', '22:12:50', '22:12:57', '00:00:07', '2025-08-04 22:12:50', '2025-08-04 22:12:57', NULL),
(94, 83, 'Morning Tea', '17:56:25', '17:56:35', '00:00:10', '2025-08-08 17:56:25', '2025-08-08 17:56:35', NULL),
(95, 83, 'Lunch', '17:56:39', '17:56:48', '00:00:09', '2025-08-08 17:56:39', '2025-08-08 17:56:48', NULL),
(96, 83, 'Evening Tea', '17:56:54', '17:57:00', '00:00:06', '2025-08-08 17:56:54', '2025-08-08 17:57:00', NULL),
(97, 83, 'Custom', '17:57:05', '18:08:41', '00:11:36', '2025-08-08 17:57:05', '2025-08-08 18:08:41', NULL),
(98, 84, 'Morning Tea', '13:49:09', '13:49:16', '00:00:07', '2025-08-10 13:49:09', '2025-08-10 13:49:16', NULL),
(99, 84, 'Lunch', '13:49:21', '13:49:29', '00:00:08', '2025-08-10 13:49:21', '2025-08-10 13:49:29', NULL),
(100, 84, 'Evening Tea', '13:49:32', '13:49:40', '00:00:08', '2025-08-10 13:49:32', '2025-08-10 13:49:40', NULL),
(101, 84, 'Custom', '13:49:43', '13:49:49', '00:00:06', '2025-08-10 13:49:43', '2025-08-10 13:49:49', NULL),
(102, 91, 'Lunch', '15:23:16', '15:24:34', '00:01:18', '2025-08-13 15:23:16', '2025-08-13 15:24:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_description` text DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `navbar_color` varchar(255) DEFAULT NULL,
  `sidebar_color` varchar(255) DEFAULT NULL,
  `primary_color` varchar(255) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `footer_color` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) NOT NULL DEFAULT 'HRMS',
  `timings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`timings`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `company_name`, `company_description`, `company_logo`, `navbar_color`, `sidebar_color`, `primary_color`, `text_color`, `footer_color`, `system_title`, `timings`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Demerg Systems India', 'Software company in Panaji, Goa.', 'logo.png', '#c2c2c2', '#1d3c72', '#ffffff', '#e0e6ef', '#22417f', 'HRMS', '[{\"day_from\":\"monday\",\"day_to\":\"friday\",\"start\":\"09:00\",\"end\":\"18:00\"}]', '2025-08-18 18:17:35', '2025-08-25 11:49:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `type` enum('national','company','event','festival') NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `title`, `date`, `type`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casually', '2025-07-28', 'company', 'Enjoy bro', '2025-07-27 19:22:13', '2025-07-28 10:46:34', NULL),
(9, 'Ganesh Chaturthi', '2025-08-27', 'festival', 'Ganesh Chaturthi Holidays', '2025-08-21 12:54:19', '2025-08-21 12:54:19', NULL),
(10, 'Ganesh Chaturthi', '2025-08-28', 'festival', 'Ganesh Chaturthi', '2025-08-21 12:54:31', '2025-08-21 12:54:31', NULL),
(11, 'Gandhi Jayanti', '2025-10-02', 'national', 'Gandhi Jayanti Holiday', '2025-08-21 12:55:09', '2025-08-21 12:55:09', NULL),
(12, 'Dussehra', '2025-10-02', 'festival', 'Dussehra  (Vijaya Dashmi)', '2025-08-21 12:56:04', '2025-08-21 12:56:04', NULL),
(13, 'Diwali', '2025-10-20', 'festival', 'Diwali', '2025-08-21 12:56:34', '2025-08-21 12:56:34', NULL),
(14, 'Feast of St.Fransis Xavier', '2025-12-03', 'festival', 'Feast of St.Fransis Xavier Holiday', '2025-08-21 12:57:33', '2025-08-21 12:57:33', NULL),
(15, 'Goa Liberation Day', '2025-12-19', 'national', 'Goa Liberation Day Holiday', '2025-08-21 12:58:08', '2025-08-21 12:58:08', NULL),
(16, 'Christmas Day', '2025-12-25', 'festival', 'Christmas Day Holiday', '2025-08-21 12:58:37', '2025-08-21 12:58:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `leave_type_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `proof_sick` varchar(255) DEFAULT NULL,
  `applied_on` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_type_id`, `start_date`, `end_date`, `reason`, `status`, `proof_sick`, `applied_on`, `approved_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 1, '2025-07-25', '2025-07-31', 'seedhzdsthadghjadghadghj', 'Approved', NULL, '2025-07-23 07:27:07', 6, '2025-07-23 07:27:07', '2025-07-23 07:29:06', NULL),
(2, 6, 1, '2025-07-17', '2025-07-24', 'sdfgbsdthsdghswfg', 'Approved', NULL, '2025-07-23 09:33:21', 6, '2025-07-23 09:33:21', '2025-07-23 09:33:42', NULL),
(3, 6, 1, '2025-07-24', '2025-07-31', 'dfbdbdfbdfbdf', 'Approved', NULL, '2025-07-23 12:35:22', 6, '2025-07-23 12:35:22', '2025-07-23 12:35:46', NULL),
(4, 6, 1, '2025-07-24', '2025-07-25', 'fhjdrfhf', 'Rejected', NULL, '2025-07-24 08:05:16', 6, '2025-07-24 08:05:16', '2025-07-24 09:55:29', NULL),
(5, 6, 2, '2025-08-01', '2025-08-03', 'Vacation', 'Rejected', NULL, '2025-07-24 09:16:51', 9, '2025-07-24 09:16:51', '2025-07-24 09:54:04', NULL),
(6, 6, 1, '2025-08-01', '2025-08-03', 'maja', 'Approved', NULL, '2025-07-24 09:45:03', 9, '2025-07-24 09:45:03', '2025-07-24 09:53:44', NULL),
(7, 6, 2, '2025-07-25', '2025-07-26', 'adfcaSDFASDFASDFSDF', 'Approved', NULL, '2025-07-24 11:10:24', 6, '2025-07-24 11:10:24', '2025-07-24 11:15:18', NULL),
(8, 6, 1, '2025-08-01', '2025-08-03', 'Vacation', 'Approved', NULL, '2025-07-27 18:15:24', 6, '2025-07-27 18:15:24', '2025-07-27 18:49:19', NULL),
(9, 6, 2, '2025-08-05', '2025-08-06', 'Marriage', 'Rejected', NULL, '2025-07-27 18:16:14', 6, '2025-07-27 18:16:14', '2025-07-27 18:29:23', NULL),
(10, 6, 1, '2025-08-08', '2025-08-09', 'NOt feeling well...', 'Approved', NULL, '2025-08-02 12:52:12', 6, '2025-08-02 12:52:12', '2025-08-02 12:54:50', NULL),
(11, 6, 2, '2025-08-09', '2025-08-09', 'Casually', 'Rejected', NULL, '2025-08-02 12:54:11', 6, '2025-08-02 12:54:11', '2025-08-02 12:55:19', NULL),
(12, 6, 1, '2025-08-09', '2025-08-09', 'Not feeling well,wont be ablee to work.', 'Approved', NULL, '2025-08-08 12:54:03', 6, '2025-08-08 12:54:03', '2025-08-08 13:11:30', NULL),
(13, 6, 3, '2025-08-09', '2025-08-11', 'sss', 'Rejected', NULL, '2025-08-08 13:04:29', 6, '2025-08-08 13:04:29', '2025-08-08 13:15:12', NULL),
(14, 6, 3, '2025-08-09', '2025-08-09', 'sss', 'Approved', NULL, '2025-08-08 13:22:09', 6, '2025-08-08 13:22:09', '2025-08-08 13:22:14', NULL),
(15, 6, 2, '2025-08-16', '2025-08-16', 'ssssssssssss', 'Approved', NULL, '2025-08-08 13:23:08', 6, '2025-08-08 13:23:08', '2025-08-08 13:23:14', NULL),
(16, 6, 2, '2025-08-16', '2025-08-16', 'ukftukftui', 'Approved', NULL, '2025-08-08 13:27:20', 6, '2025-08-08 13:27:20', '2025-08-08 13:27:28', NULL),
(17, 6, 2, '2025-08-09', '2025-08-09', 'yjr', 'Approved', NULL, '2025-08-08 13:33:58', 6, '2025-08-08 13:33:58', '2025-08-08 13:34:06', NULL),
(18, 6, 6, '2025-08-09', '2025-08-09', 'sa', 'Approved', NULL, '2025-08-08 13:35:08', 6, '2025-08-08 13:35:08', '2025-08-08 13:35:13', NULL),
(19, 6, 6, '2025-08-11', '2025-08-15', 'sssssssssssssssssssssss', 'Rejected', NULL, '2025-08-08 13:35:54', 6, '2025-08-08 13:35:54', '2025-08-08 13:36:03', NULL),
(21, 7, 5, '2025-08-20', '2025-08-20', 'Ganesh (reject this)', 'Approved', NULL, '2025-08-20 15:35:21', 6, '2025-08-13 15:35:21', '2025-08-19 22:06:31', NULL),
(22, 7, 1, '2025-08-20', '2025-08-20', 'aaaaaaaaa', 'Pending', NULL, '2025-08-20 17:53:14', NULL, '2025-08-20 17:53:14', '2025-08-20 17:53:14', NULL),
(23, 7, 1, '2025-08-20', '2025-08-21', 'testing laeave documen', 'Pending', NULL, '2025-08-20 18:05:37', NULL, '2025-08-20 18:05:37', '2025-08-20 18:05:37', NULL),
(24, 7, 1, '2025-08-28', '2025-08-30', 'testing sickleave', 'Pending', NULL, '2025-08-20 18:09:40', NULL, '2025-08-20 18:09:40', '2025-08-20 18:09:40', NULL),
(25, 7, 1, '2025-08-20', '2025-08-23', 'Testing sick leave', 'Pending', 'sick_proofs/qqQnykmF63JvFbHTVsGDm99C6yXTN2Hulc1elxS6.jpg', '2025-08-20 18:16:39', NULL, '2025-08-20 18:16:39', '2025-08-20 18:16:39', NULL),
(26, 6, 1, '2025-08-25', '2025-08-28', 'aaa', 'Pending', NULL, '2025-08-25 11:51:20', NULL, '2025-08-25 11:51:20', '2025-08-25 11:51:20', NULL),
(27, 6, 2, '2025-08-25', '2025-08-30', 'sss', 'Pending', NULL, '2025-08-25 21:22:23', NULL, '2025-08-25 21:22:23', '2025-08-25 21:22:23', NULL),
(28, 6, 1, '2025-08-25', '2025-09-01', 'ss', 'Pending', NULL, '2025-08-25 21:22:42', NULL, '2025-08-25 21:22:42', '2025-08-25 21:22:42', NULL),
(29, 6, 1, '2025-08-25', '2025-08-29', 'w', 'Pending', NULL, '2025-08-25 21:24:05', NULL, '2025-08-25 21:24:05', '2025-08-25 21:24:05', NULL),
(30, 7, 1, '2025-08-25', '2025-09-06', 'qqq', 'Pending', NULL, '2025-08-25 21:40:27', NULL, '2025-08-25 21:40:27', '2025-08-25 21:40:27', NULL),
(31, 6, 1, '2025-08-26', '2025-09-02', 'testing sick leave validation', 'Pending', 'sick_proofs/h46CqepiEJhCS7YqDZa3JtqKNXVrD0gxUxQElX0l.png', '2025-08-26 00:12:02', NULL, '2025-08-26 00:12:02', '2025-08-26 00:12:02', NULL),
(32, 6, 6, '2025-09-02', '2025-09-19', 'tyj', 'Pending', NULL, '2025-09-02 21:05:53', NULL, '2025-09-02 21:05:53', '2025-09-02 21:05:53', NULL),
(33, 6, 1, '2025-09-02', '2025-09-03', 's', 'Pending', NULL, '2025-09-02 21:08:25', NULL, '2025-09-02 21:08:25', '2025-09-02 21:08:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sick Leave', 'Leave for illness', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL),
(2, 'Casual Leave', 'Personal short leave', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL),
(3, 'Annual Leave', 'Earned paid leave', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL),
(4, 'Bereavement Leave', 'For family loss/funeral', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL),
(5, 'Unpaid Leave', 'Without salary', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL),
(6, 'Marriage Leave', 'For personal wedding', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL),
(7, 'Study Leave', 'For exams or education.', '2025-07-23 07:26:41', '2025-08-08 12:42:27', NULL),
(9, 'aa', 'aa', '2025-08-06 15:36:11', '2025-08-06 15:38:30', '2025-08-06 15:38:30'),
(10, '//', NULL, '2025-08-08 12:31:50', '2025-08-08 12:31:56', '2025-08-08 12:31:56'),
(11, 'temp', 'tempfxvbdf', '2025-08-08 12:43:49', '2025-08-13 16:25:38', '2025-08-13 16:25:38'),
(12, 'Updated Postman Leave', 'Leave for Postman', '2025-08-13 16:21:30', '2025-08-13 16:23:38', NULL),
(13, 'Updated Postman Leavess', 'Leave for Postman', '2025-09-02 19:15:16', '2025-09-02 19:16:28', '2025-09-02 19:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '0001_01_01_000000_create_users_table', 1),
(20, '0001_01_01_000001_create_cache_table', 1),
(21, '0001_01_01_000002_create_jobs_table', 1),
(22, '2025_07_16_054502_create_attendance_table', 1),
(23, '2025_07_16_055453_create_breaks_table', 1),
(24, '2025_07_16_062259_create_holidays_table', 1),
(25, '2025_07_16_062356_create_leaves_table', 1),
(26, '2025_07_16_063027_create_leave_types_table', 1),
(27, '2025_07_16_063207_create_notifications_table', 1),
(28, '2025_07_16_063325_create_projects_table', 1),
(29, '2025_07_16_063444_create_project_members_table', 1),
(30, '2025_07_16_063756_create_session_logs_table', 1),
(31, '2025_07_16_064001_create_tasks_table', 1),
(32, '2025_07_16_064119_create_task_comments_table', 1),
(33, '2025_07_16_064302_create_timesheets_table', 1),
(34, '2025_07_16_090544_create_companies_table', 1),
(35, '2025_07_16_113922_create_company_profile_table', 1),
(36, '2025_07_17_081603_create_permission_tables', 1),
(37, '2025_07_19_063411_create_employees_table', 2),
(38, '2025_07_24_062036_create_personal_access_tokens_table', 3),
(39, '2025_07_26_154435_create_personal_access_tokens_table', 4),
(40, '2025_07_26_161003_create_personal_access_tokens_table', 5),
(41, '2025_07_26_162602_create_personal_access_tokens_table', 6),
(42, '2025_07_26_110836_create_personal_access_tokens_table', 7),
(43, '2025_07_26_171325_create_personal_access_tokens_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 12),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 21),
(6, 'App\\Models\\User', 23),
(6, 'App\\Models\\User', 24),
(12, 'App\\Models\\User', 6),
(14, 'App\\Models\\User', 19),
(15, 'App\\Models\\User', 10),
(15, 'App\\Models\\User', 20),
(15, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('7d0278be-d5e5-4e55-977b-dff45dbf5524', 'App\\Notifications\\PunchInReminderNotification', 'App\\Models\\User', 6, '{\"message\":\"Reminder: Please punch in for today.\",\"url\":\"http:\\/\\/localhost:8000\\/attendance\"}', '2025-08-12 11:05:46', '2025-08-12 11:05:05', '2025-08-12 11:05:46'),
('945bcf14-e489-4aaa-98b3-9a52d8f5a6df', 'App\\Notifications\\PunchInReminderNotification', 'App\\Models\\User', 10, '{\"message\":\"Reminder: Please punch in for today.\",\"url\":\"http:\\/\\/localhost:8000\\/attendance\"}', NULL, '2025-08-12 10:41:50', '2025-08-12 10:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `hra` decimal(10,2) NOT NULL,
  `allowances` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `pf_amount` decimal(10,2) NOT NULL,
  `esi_amount` decimal(10,2) NOT NULL,
  `gross_salary` decimal(10,2) NOT NULL,
  `net_salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `user_id`, `month`, `basic`, `hra`, `allowances`, `tax_amount`, `pf_amount`, `esi_amount`, `gross_salary`, `net_salary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 6, 'Aug, 2025', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-12 07:07:49', '2025-08-12 07:15:07', '2025-08-12 07:15:07'),
(14, 7, 'Aug, 2025', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-12 07:07:49', '2025-08-12 07:15:07', '2025-08-12 07:15:07'),
(16, 8, 'Aug, 2025', 20000.00, 5000.00, 40000.00, 1000.00, 800.00, 1200.00, 65000.00, 62000.00, '2025-08-12 07:10:09', '2025-08-12 07:14:51', '2025-08-12 07:14:51'),
(17, 6, 'Aug, 2025', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-12 14:05:34', '2025-08-12 14:05:45', '2025-08-12 14:05:45'),
(18, 7, 'Aug, 2025', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-12 14:05:34', '2025-08-12 14:05:38', '2025-08-12 14:05:38'),
(19, 8, 'Aug, 2025', 20000.00, 5000.00, 40000.00, 1000.00, 800.00, 1200.00, 65000.00, 62000.00, '2025-08-12 14:05:34', '2025-08-12 14:05:48', '2025-08-12 14:05:48'),
(20, 7, 'Aug, 2025', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-12 14:05:41', '2025-08-12 14:05:50', '2025-08-12 14:05:50'),
(21, 6, '2025-08', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-18 07:57:43', '2025-08-18 08:09:28', '2025-08-18 08:09:28'),
(22, 6, '2025-08', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-18 08:09:43', '2025-08-18 08:13:24', '2025-08-18 08:13:24'),
(23, 7, '2025-08', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-18 08:09:43', '2025-08-18 08:30:06', '2025-08-18 08:30:06'),
(24, 8, '2025-08', 20000.00, 5000.00, 40000.00, 1000.00, 800.00, 1200.00, 65000.00, 62000.00, '2025-08-18 08:09:43', '2025-08-18 08:30:06', '2025-08-18 08:30:06'),
(25, 6, '2025-09', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-18 08:13:01', '2025-08-18 08:30:06', '2025-08-18 08:30:06'),
(26, 7, '2025-09', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-18 08:13:01', '2025-08-18 08:30:06', '2025-08-18 08:30:06'),
(27, 8, '2025-09', 20000.00, 5000.00, 40000.00, 1000.00, 800.00, 1200.00, 65000.00, 62000.00, '2025-08-18 08:13:01', '2025-08-18 08:30:06', '2025-08-18 08:30:06'),
(28, 6, '2025-09', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-18 08:40:34', '2025-08-18 14:58:24', '2025-08-18 14:58:24'),
(29, 7, '2025-09', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-18 08:40:34', '2025-08-18 14:59:20', '2025-08-18 14:59:20'),
(30, 8, '2025-09', 20000.00, 5000.00, 40000.00, 1000.00, 800.00, 1200.00, 65000.00, 62000.00, '2025-08-18 08:40:34', '2025-08-18 14:59:25', '2025-08-18 14:59:25'),
(31, 6, 'Aug, 2025', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-08-18 14:56:47', '2025-08-25 15:58:59', NULL),
(32, 7, 'Aug, 2025', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-25 15:58:59', '2025-08-25 15:58:59', NULL),
(33, 8, 'Aug, 2025', 20000.00, 5000.00, 40000.00, 1000.00, 800.00, 1200.00, 65000.00, 62000.00, '2025-08-25 15:58:59', '2025-08-25 15:59:13', '2025-08-25 15:59:13'),
(34, 6, '2025-08', 40000.00, 5000.00, 6000.00, 2000.00, 2800.00, 3600.00, 51000.00, 42600.00, '2025-09-04 09:19:59', '2025-09-04 09:19:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'create employee', 'web', '2025-07-17 04:17:59', '2025-07-20 07:15:08'),
(7, 'delete employee', 'web', '2025-07-17 07:16:26', '2025-07-20 07:15:16'),
(8, 'view employee', 'web', '2025-07-17 08:52:00', '2025-07-20 07:15:20'),
(9, 'view roles', 'web', '2025-07-17 08:52:27', '2025-07-20 07:15:26'),
(10, 'create roles', 'web', '2025-07-17 08:52:39', '2025-07-20 07:15:01'),
(11, 'delete roles', 'web', '2025-07-17 08:52:49', '2025-07-20 07:14:56'),
(12, 'edit roles', 'web', '2025-07-17 08:52:57', '2025-07-20 07:14:51'),
(13, 'edit employee', 'web', '2025-07-20 06:10:57', '2025-07-20 07:14:46'),
(14, 'view users', 'web', '2025-07-20 06:12:06', '2025-07-20 07:14:39'),
(15, 'edit users', 'web', '2025-07-20 06:12:15', '2025-07-20 06:44:34'),
(16, 'view permissions', 'web', '2025-07-20 06:12:28', '2025-07-20 06:44:45'),
(17, 'create permissions', 'web', '2025-07-20 06:12:45', '2025-07-20 06:44:57'),
(18, 'edit permissions', 'web', '2025-07-20 06:12:55', '2025-07-20 06:44:23'),
(19, 'delete permissions', 'web', '2025-07-20 06:13:12', '2025-07-20 06:44:11'),
(23, 'apply leave', 'web', '2025-07-23 01:53:45', '2025-07-23 01:53:45'),
(24, 'view all leaves', 'web', '2025-07-23 01:53:53', '2025-07-23 01:54:00'),
(25, 'approve leave', 'web', '2025-07-23 01:54:08', '2025-07-23 01:54:08'),
(26, 'attendance report', 'web', '2025-07-25 10:00:06', '2025-07-25 10:00:06'),
(27, 'create holiday', 'web', '2025-07-27 14:00:32', '2025-07-27 14:00:32'),
(28, 'delete holiday', 'web', '2025-07-27 14:06:43', '2025-07-27 14:06:43'),
(29, 'create project', 'web', '2025-07-30 13:46:10', '2025-07-30 13:46:10'),
(30, 'view project', 'web', '2025-07-30 13:46:21', '2025-07-30 13:46:21'),
(31, 'edit project', 'web', '2025-07-30 14:11:01', '2025-07-30 14:11:01'),
(32, 'delete project', 'web', '2025-07-30 14:11:09', '2025-07-30 14:11:09'),
(33, 'create task', 'web', '2025-07-31 14:02:58', '2025-07-31 14:02:58'),
(34, 'delete task', 'web', '2025-07-31 14:03:06', '2025-07-31 14:03:06'),
(35, 'edit task', 'web', '2025-07-31 14:03:14', '2025-07-31 14:03:14'),
(36, 'approve timesheet', 'web', '2025-07-31 14:11:48', '2025-07-31 14:11:48'),
(37, 'reject timesheet', 'web', '2025-07-31 14:11:58', '2025-07-31 14:11:58'),
(38, 'create timesheet', 'web', '2025-08-01 07:42:46', '2025-08-01 07:42:46'),
(39, 'edit timesheet', 'web', '2025-08-01 07:42:59', '2025-08-01 07:42:59'),
(40, 'view timesheet', 'web', '2025-08-01 07:51:52', '2025-08-01 07:51:52'),
(41, 'create leave type', 'web', '2025-08-06 10:13:38', '2025-08-06 10:13:38'),
(42, 'edit leave type', 'web', '2025-08-06 10:13:49', '2025-08-06 10:13:49'),
(43, 'view leave type', 'web', '2025-08-06 10:13:59', '2025-08-06 10:13:59'),
(44, 'delete leave type', 'web', '2025-08-06 10:14:12', '2025-08-06 10:14:12'),
(46, 'postman permission updated', 'web', '2025-08-16 15:23:14', '2025-08-16 16:00:13'),
(54, 'edit company', 'web', '2025-08-18 14:25:14', '2025-08-18 14:25:14'),
(55, 'view salary structure', 'web', '2025-08-18 14:30:43', '2025-08-18 14:30:43'),
(56, 'create salary structure', 'web', '2025-08-18 14:30:51', '2025-08-18 14:30:51'),
(57, 'generate payroll', 'web', '2025-08-18 14:35:27', '2025-08-18 14:35:27'),
(58, 'generate all payrolls', 'web', '2025-08-18 14:35:35', '2025-08-18 14:35:35'),
(59, 'delete all payrolls', 'web', '2025-08-18 14:35:46', '2025-08-18 14:35:46'),
(60, 'delete payroll', 'web', '2025-08-18 14:35:55', '2025-08-18 14:35:55'),
(61, 'view payroll', 'web', '2025-08-18 14:51:45', '2025-08-18 14:51:45'),
(62, 'view all payrolls', 'web', '2025-08-18 14:51:54', '2025-08-18 14:51:54'),
(63, 'view project budget', 'web', '2025-08-25 07:10:17', '2025-08-25 07:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 6, 'auth_token', '7170765d73c3e3cb9b6fbe313b9372eb3020e4988073702e6334351ab75ef48f', '[\"*\"]', '2025-07-26 13:35:37', NULL, '2025-07-26 13:29:01', '2025-07-26 13:35:37'),
(3, 'App\\Models\\User', 6, 'auth_token', '1324b12019072149a48994f68be577386eecce12e81e7c20d6deb01de56746e3', '[\"*\"]', '2025-07-26 13:43:26', NULL, '2025-07-26 13:36:44', '2025-07-26 13:43:26'),
(4, 'App\\Models\\User', 12, 'auth_token', 'd8ef9cb2e492bd2890787aaa9f0c9d263e551d6918ebea05894749442f5c9abd', '[\"*\"]', NULL, NULL, '2025-07-26 13:44:10', '2025-07-26 13:44:10'),
(6, 'App\\Models\\User', 6, 'auth_token', '8edf741f4d17bc6052f5f6db771ff19d48447154617bc2935b2a0a5b2abeb0c0', '[\"*\"]', NULL, NULL, '2025-07-27 12:08:48', '2025-07-27 12:08:48'),
(7, 'App\\Models\\User', 6, 'auth_token', '7e592279bd91844298296e4d43f94a924b6f069ccbbcd7b15af847e3e259ddfc', '[\"*\"]', NULL, NULL, '2025-07-27 13:24:34', '2025-07-27 13:24:34'),
(8, 'App\\Models\\User', 6, 'auth_token', '7d9c333a17a32f2e2770b0ed63a525bb694cb27d346e836187464c669138424d', '[\"*\"]', NULL, NULL, '2025-07-27 13:27:16', '2025-07-27 13:27:16'),
(9, 'App\\Models\\User', 6, 'auth_token', '9fb10c47d2bb55481c99eee4776203bc9594b60f71449cd68c5917c44ad72d8d', '[\"*\"]', '2025-07-27 13:59:27', NULL, '2025-07-27 13:56:10', '2025-07-27 13:59:27'),
(10, 'App\\Models\\User', 6, 'auth_token', '21dffc1aa187a642d7f78e01b9506ca14d0327ce61e4ee108b9b96893a2bb5f8', '[\"*\"]', NULL, NULL, '2025-08-12 06:08:51', '2025-08-12 06:08:51'),
(12, 'App\\Models\\User', 6, 'auth_token', '2cb979955082b140d446dcf9ca180617ec42072eebea96d017bc8d1faea8720c', '[\"*\"]', NULL, NULL, '2025-08-13 10:58:02', '2025-08-13 10:58:02'),
(13, 'App\\Models\\User', 16, 'auth_token', 'd5fa17910b17eed8551fa355fb4fe3c257d840c1a7c1770c53a86d34af1b0fb4', '[\"*\"]', '2025-08-14 07:49:34', NULL, '2025-08-14 07:46:46', '2025-08-14 07:49:34'),
(14, 'App\\Models\\User', 6, 'auth_token', '8682a3941241e062fb150d6fe0538eef3552df1eb2fb2099d06bef24d9746e50', '[\"*\"]', '2025-09-02 13:32:28', NULL, '2025-08-16 14:43:29', '2025-09-02 13:32:28'),
(15, 'App\\Models\\User', 6, 'auth_token', 'eff577b43b0a0058465a54485d2fef59c2d7a481a3772b44ea604bfbfb777170', '[\"*\"]', '2025-08-18 08:40:34', NULL, '2025-08-18 05:47:35', '2025-08-18 08:40:34'),
(17, 'App\\Models\\User', 6, 'auth_token', 'a9f1185f5b0961289197ca6cfdc716303eb25d609ad0501025f12d908c34c07d', '[\"*\"]', '2025-09-02 13:14:35', NULL, '2025-09-02 13:10:31', '2025-09-02 13:14:35'),
(18, 'App\\Models\\User', 6, 'auth_token', '4d8b6f3787c06c64f6e842275d3a11fad3d67c0bd370ac081fd3d52897bbc556', '[\"*\"]', '2025-09-02 13:36:01', NULL, '2025-09-02 13:28:41', '2025-09-02 13:36:01'),
(19, 'App\\Models\\User', 6, 'auth_token', '83e0a30c4652b9ee68b7cb8609136b6842587ed2911d77aa6662ff3a0651fc48', '[\"*\"]', '2025-09-02 13:46:28', NULL, '2025-09-02 13:39:57', '2025-09-02 13:46:28'),
(20, 'App\\Models\\User', 6, 'auth_token', '9d5668ce1d84561bff4a7f03012da58cadedc82082f9f59031f0d8c4518c955f', '[\"*\"]', '2025-09-02 13:53:45', NULL, '2025-09-02 13:51:17', '2025-09-02 13:53:45'),
(21, 'App\\Models\\User', 6, 'auth_token', '2c8d4a67247e6c4777791cecd4783cc6397d82d5ba4d2884f901130beccd2f92', '[\"*\"]', '2025-09-04 04:26:56', NULL, '2025-09-04 04:26:48', '2025-09-04 04:26:56'),
(22, 'App\\Models\\User', 6, 'auth_token', 'ce9825529ac478b18c1efef7ff9b44973bacb314a9dc507395a77d58aaba7c65', '[\"*\"]', '2025-09-04 04:43:49', NULL, '2025-09-04 04:41:40', '2025-09-04 04:43:49'),
(23, 'App\\Models\\User', 6, 'auth_token', 'bdd2f84be1fe4721788b4a7b9aa1909877f4096fe4914aaf11edb9b0e71d2673', '[\"*\"]', '2025-09-04 06:55:21', NULL, '2025-09-04 06:54:28', '2025-09-04 06:55:21'),
(24, 'App\\Models\\User', 6, 'auth_token', '18170b57d7fd0406fefb942d0c9cfadd240e760fc752b129d8f24e2f080a2b6c', '[\"*\"]', '2025-09-04 09:08:06', NULL, '2025-09-04 09:07:37', '2025-09-04 09:08:06'),
(25, 'App\\Models\\User', 6, 'auth_token', '646fb71c825d571a3e7a2bffd850f9a2144a98c41010e312bef847c50535a558', '[\"*\"]', NULL, NULL, '2025-09-04 09:08:54', '2025-09-04 09:08:54'),
(26, 'App\\Models\\User', 6, 'auth_token', 'c0e5e1a65b92d92fdc3322429129f37c089b3099e793b42af4db62002d52e246', '[\"*\"]', '2025-09-04 09:11:45', NULL, '2025-09-04 09:11:14', '2025-09-04 09:11:45'),
(27, 'App\\Models\\User', 6, 'auth_token', '1f325580bd61757cdf66f10fd98726c3af4bfe8ca42482968831a7c0e268fde2', '[\"*\"]', '2025-09-04 09:20:39', NULL, '2025-09-04 09:19:52', '2025-09-04 09:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `client_name` varchar(100) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('To-Do','In Progress','On Hold','Done') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `client_name`, `budget`, `deadline`, `status`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'HRMS', 'Demerg', 45000.00, '2025-09-04', 'Done', 'HRMS HUman Resource  Management System', '2025-07-30 11:06:18', '2025-09-03 11:29:05', NULL),
(15, 'test project', 'Demerg', 70000.00, '2025-09-06', NULL, 'Demo Projecta', '2025-08-04 22:02:20', '2025-08-04 22:04:45', NULL),
(16, 'HRMS Postman updated', 'Postman Corp', 60000.00, '2025-09-27', NULL, 'HRMS updated', '2025-08-18 11:24:24', '2025-08-19 22:30:55', NULL),
(17, 'Postman', 'Postman', 50000.00, '2025-08-23', NULL, 'Upgrade HRMS system', '2025-08-18 11:28:34', '2025-08-19 22:30:58', NULL),
(18, 'Chartjs', 'kishan', 20000.00, '2025-11-30', NULL, 'makes chard/graph view', '2025-08-20 11:32:17', '2025-08-20 11:36:40', NULL),
(19, 'test', 'fv', 2122.00, '2025-08-28', NULL, 'fsdvsdfv', '2025-08-20 13:01:22', '2025-08-20 13:01:22', NULL),
(20, 'TEst mail', 'demerg', 40000.00, '2025-10-09', 'To-Do', 'sadasdasdas', '2025-09-04 11:20:02', '2025-09-04 11:20:02', NULL),
(21, 'ete', 'sdghdsgh', 5555555.00, '2025-10-03', 'In Progress', 'thsthdth', '2025-09-04 11:21:54', '2025-09-04 11:21:54', NULL),
(22, 'ete', 'sdghdsgh', 5555555.00, '2025-10-03', 'In Progress', 'thsthdth', '2025-09-04 11:26:50', '2025-09-04 11:31:38', '2025-09-04 11:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`project_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 6, '2025-09-02 22:03:58', '2025-09-02 22:03:58', NULL),
(9, 7, '2025-08-04 22:10:42', '2025-08-04 22:10:42', NULL),
(9, 8, '2025-08-04 22:10:42', '2025-08-04 22:10:42', NULL),
(10, 6, '2025-07-30 19:18:55', '2025-07-30 19:18:55', NULL),
(10, 7, '2025-07-30 19:37:34', '2025-07-30 19:37:34', NULL),
(10, 8, '2025-07-30 19:37:34', '2025-07-30 19:37:34', NULL),
(11, 6, '2025-07-30 19:20:08', '2025-07-30 19:20:08', NULL),
(11, 7, '2025-07-30 19:20:08', '2025-07-30 19:20:08', NULL),
(11, 8, '2025-07-30 19:20:08', '2025-07-30 19:20:08', NULL),
(11, 9, '2025-07-30 19:20:08', '2025-07-30 19:20:08', NULL),
(12, 12, '2025-07-30 19:23:43', '2025-07-30 19:23:43', NULL),
(12, 13, '2025-07-30 19:23:43', '2025-07-30 19:23:43', NULL),
(13, 6, '2025-07-30 19:24:44', '2025-07-30 19:24:44', NULL),
(14, 9, '2025-08-02 12:59:01', '2025-08-02 12:59:01', NULL),
(15, 7, '2025-08-04 22:04:45', '2025-08-04 22:04:45', NULL),
(16, 7, '2025-08-18 11:24:24', '2025-08-20 11:29:42', NULL),
(17, 6, '2025-08-18 11:28:34', '2025-08-18 11:28:34', NULL),
(17, 7, '2025-08-18 11:28:34', '2025-08-18 11:28:34', NULL),
(18, 7, '2025-08-20 11:32:57', '2025-08-20 11:32:57', NULL),
(19, 7, '2025-08-20 13:01:22', '2025-08-20 13:01:22', NULL),
(20, 6, '2025-09-04 11:20:02', '2025-09-04 11:20:02', NULL),
(20, 7, '2025-09-04 11:20:02', '2025-09-04 11:20:02', NULL),
(20, 8, '2025-09-04 11:20:02', '2025-09-04 11:20:02', NULL),
(20, 9, '2025-09-04 11:20:02', '2025-09-04 11:20:02', NULL),
(21, 6, '2025-09-04 11:21:54', '2025-09-04 11:21:54', NULL),
(21, 7, '2025-09-04 11:21:54', '2025-09-04 11:21:54', NULL),
(21, 8, '2025-09-04 11:21:54', '2025-09-04 11:21:54', NULL),
(21, 9, '2025-09-04 11:21:54', '2025-09-04 11:21:54', NULL),
(22, 6, '2025-09-04 11:26:50', '2025-09-04 11:26:50', NULL),
(22, 7, '2025-09-04 11:26:50', '2025-09-04 11:26:50', NULL),
(22, 8, '2025-09-04 11:26:50', '2025-09-04 11:26:50', NULL),
(22, 9, '2025-09-04 11:26:50', '2025-09-04 11:26:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Manager', 'web', '2025-07-17 08:39:29', '2025-07-17 08:39:29'),
(4, 'Admin', 'web', '2025-07-17 08:53:11', '2025-07-17 08:53:11'),
(5, 'Human Resource', 'web', '2025-07-18 03:21:17', '2025-07-18 03:21:17'),
(6, 'Employee', 'web', '2025-07-18 03:21:43', '2025-07-18 03:21:43'),
(11, 'Team Lead', 'web', '2025-08-12 09:34:13', '2025-08-13 05:24:58'),
(12, 'Superadmin', 'web', '2025-08-13 05:05:30', '2025-08-13 05:13:49'),
(14, 'Trainee', 'web', '2025-08-25 06:43:03', '2025-08-25 06:43:03'),
(15, 'Intern', 'web', '2025-08-25 06:51:56', '2025-08-25 06:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 4),
(7, 4),
(8, 4),
(8, 6),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(13, 6),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(23, 4),
(23, 5),
(23, 6),
(24, 4),
(24, 6),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(30, 6),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(38, 6),
(39, 4),
(39, 6),
(40, 4),
(40, 6),
(41, 4),
(42, 4),
(43, 4),
(44, 4);

-- --------------------------------------------------------

--
-- Table structure for table `salary_structures`
--

CREATE TABLE `salary_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `hra` decimal(10,2) NOT NULL,
  `allowances` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(5,2) NOT NULL DEFAULT 0.00,
  `pf` decimal(5,2) NOT NULL DEFAULT 0.00,
  `esi` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_structures`
--

INSERT INTO `salary_structures` (`id`, `user_id`, `basic`, `hra`, `allowances`, `tax`, `pf`, `esi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 6, 40000.00, 5000.00, 6000.00, 5.00, 7.00, 9.00, '2025-08-12 06:54:27', '2025-08-12 06:54:27', NULL),
(4, 7, 3000.00, 5000.00, 4000.00, 6.00, 8.00, 10.00, '2025-08-12 06:54:52', '2025-08-12 06:54:52', NULL),
(5, 8, 20000.00, 5000.00, 40000.00, 5.00, 4.00, 6.00, '2025-08-12 07:05:33', '2025-08-12 07:05:33', NULL),
(6, 8, 35000.00, 5000.00, 2000.00, 15.00, 18.00, 5.00, '2025-08-18 07:39:00', '2025-08-18 07:41:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BstKfZHlrUv11s7nR4UwwNqJVh2FTExkGB1SgvTw', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaDVUTkM1S0ZKbENJTUs5Qzg5OXE5SU5YQzFPSUkxN3AwSjNXQmJNZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1756734523);

-- --------------------------------------------------------

--
-- Table structure for table `session_logs`
--

CREATE TABLE `session_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `device_info` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `priority` enum('Low','Medium','High','Urgent') DEFAULT NULL,
  `status` enum('To-Do','In Progress','On Hold','Done') DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `hours_assigned` decimal(5,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `title`, `description`, `priority`, `status`, `due_date`, `hours_assigned`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 9, 'User Authentication', 'User login/loguyt,update profile,view details,deletee profile', 'Low', 'Done', '2025-09-03', 8.18, '2025-07-30 12:53:09', '2025-09-04 16:01:49', NULL),
(14, 9, 'Dashbord Page', 'Create view for Admin,HR,Manager,Employee to redirecet to theri respective pages when logedinn.', 'High', 'Done', '2025-08-06', 3.50, '2025-07-30 12:57:15', '2025-09-04 16:06:58', NULL),
(17, 9, 'Roles and Permission', 'Roles and Permission system in hRMS for Admin,manager,hr and employee', 'Urgent', 'In Progress', '2025-08-17', 12.00, '2025-07-30 14:20:01', '2025-08-20 13:24:53', NULL),
(22, 16, 'Create login ui upgrate', 'Frontend api', 'Medium', 'In Progress', '2025-08-22', 2.50, '2025-08-18 11:38:32', '2025-08-20 13:25:02', NULL),
(23, 16, 'Create login ui', 'Frontend login page', 'High', 'To-Do', '2025-08-26', 7.00, '2025-08-18 11:41:18', '2025-08-20 13:25:12', NULL),
(25, 9, 'testing hours assigned', 'testing hours assigned', 'High', 'To-Do', '2025-08-22', 25.00, '2025-08-20 21:18:33', '2025-08-20 21:18:33', NULL),
(26, 21, 'wewfasf', 'asdvasdvasd', 'Medium', 'To-Do', '2025-09-17', 5.50, '2025-09-04 11:32:11', '2025-09-04 11:38:22', '2025-09-04 11:38:22'),
(27, 21, 'wewfasf', 'asdvasdvasd', 'Medium', 'To-Do', '2025-09-17', 5.50, '2025-09-04 11:33:50', '2025-09-04 11:38:25', '2025-09-04 11:38:25'),
(28, 21, 'wewfasf', 'asdvasdvasd', 'Medium', 'To-Do', '2025-09-17', 5.50, '2025-09-04 11:34:13', '2025-09-04 11:38:19', '2025-09-04 11:38:19'),
(29, 21, 'tyik', 'tuyj', 'Medium', 'To-Do', '2025-09-19', 2.50, '2025-09-04 11:35:49', '2025-09-04 11:38:16', '2025-09-04 11:38:16'),
(30, 21, 'tyik', 'tuyj', 'Medium', 'To-Do', '2025-09-19', 2.50, '2025-09-04 11:37:10', '2025-09-04 11:38:11', '2025-09-04 11:38:11'),
(31, 21, 'sadasdasda', 'sdasdasdasdasdasd', 'Medium', 'To-Do', '2025-10-07', 3.00, '2025-09-04 11:38:47', '2025-09-04 11:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_comments`
--

INSERT INTO `task_comments` (`id`, `task_id`, `user_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 13, 6, 'Create using Laravel Breeze.', '2025-07-30 17:49:43', '2025-07-30 17:49:43', NULL),
(2, 13, 6, 'ok', '2025-07-30 17:51:01', '2025-07-30 17:51:01', NULL),
(4, 13, 7, 'Dwepam', '2025-07-31 19:29:35', '2025-07-31 19:29:35', NULL),
(5, 13, 7, 'Done with user authentication', '2025-07-31 19:39:36', '2025-07-31 19:39:36', NULL),
(6, 13, 6, 'ok ill check...', '2025-07-31 19:39:57', '2025-07-31 19:39:57', NULL),
(7, 13, 6, 'Start with dashboard page designing each seperate for Admin,HR,Manager and employee.', '2025-08-01 13:57:37', '2025-08-01 13:57:37', NULL),
(8, 13, 7, 'ok  sir ill start', '2025-08-01 13:58:15', '2025-08-01 13:58:15', NULL),
(9, 13, 6, 'qwqwqwqw', '2025-08-02 13:01:08', '2025-08-02 13:01:08', NULL),
(10, 22, 6, 'We need to complete this by todayy.', '2025-08-18 11:46:15', '2025-08-18 11:46:15', NULL),
(11, 13, 7, 'hmm', '2025-08-25 12:09:17', '2025-08-25 12:09:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_members`
--

CREATE TABLE `task_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_members`
--

INSERT INTO `task_members` (`id`, `task_id`, `user_id`, `created_at`, `updated_at`) VALUES
(13, 13, 7, NULL, NULL),
(14, 14, 7, NULL, NULL),
(17, 17, 7, NULL, NULL),
(22, 22, 7, NULL, NULL),
(23, 23, 7, NULL, NULL),
(24, 24, 7, NULL, NULL),
(25, 24, 8, NULL, NULL),
(26, 25, 7, NULL, NULL),
(28, 13, 8, NULL, NULL),
(29, 14, 8, NULL, NULL),
(30, 17, 8, NULL, NULL),
(31, 25, 8, NULL, NULL),
(32, 13, 6, NULL, NULL),
(53, 31, 6, NULL, NULL),
(54, 31, 7, NULL, NULL),
(55, 31, 8, NULL, NULL),
(56, 31, 9, NULL, NULL),
(57, 14, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hours_worked` decimal(5,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Submitted','Approved','Rejected') NOT NULL DEFAULT 'Submitted',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timesheets`
--

INSERT INTO `timesheets` (`id`, `user_id`, `task_id`, `project_id`, `date`, `hours_worked`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 13, 9, '2025-07-30', 3.00, 'Finding....', 'Rejected', '2025-07-30 18:41:51', '2025-09-02 21:53:07', NULL),
(2, 6, 13, 9, '2025-07-30', 2.00, 'fsdfdf', 'Rejected', '2025-07-30 18:45:47', '2025-09-02 21:54:41', NULL),
(3, 6, 13, 9, '2025-07-31', 0.02, '22sdfsdf', 'Approved', '2025-07-31 18:10:47', '2025-09-02 21:47:17', NULL),
(4, 7, 13, 9, '2025-07-31', 2.02, 'sss', 'Submitted', '2025-07-31 18:24:10', '2025-08-08 16:24:39', NULL),
(5, 7, 13, 9, '2025-07-31', 1.28, 'sss', 'Rejected', '2025-07-31 18:25:24', '2025-08-09 18:20:34', NULL),
(6, 7, 13, 9, '2025-07-31', 0.03, 'ss', 'Submitted', '2025-07-31 18:29:18', '2025-08-08 16:24:28', NULL),
(7, 7, 13, 9, '2025-07-31', 1.03, 'ss', 'Submitted', '2025-07-31 19:03:06', '2025-08-08 16:24:44', NULL),
(8, 7, 13, 9, '2025-07-31', 0.03, 's', 'Rejected', '2025-07-31 19:03:42', '2025-08-20 21:20:23', NULL),
(9, 7, 13, 9, '2025-07-31', 12.00, 'sdcsdfgrerrrrrrrrrrrrrsfg', 'Rejected', '2025-07-31 19:04:39', '2025-08-20 21:20:25', NULL),
(10, 6, 17, 9, '2025-08-04', 12.00, 'Done for today...', 'Rejected', '2025-08-04 22:06:30', '2025-08-08 16:24:51', NULL),
(11, 6, 22, 16, '2025-08-18', 7.50, 'Worked on ui screens', 'Approved', '2025-08-18 11:52:38', '2025-08-18 12:32:49', NULL),
(12, 6, 22, 16, '2025-08-18', 5.50, 'Worked on dashboard screens', 'Rejected', '2025-08-18 12:20:58', '2025-08-18 12:32:53', NULL),
(14, 6, 22, 16, '2025-08-18', 5.50, 'Worked on dashboard screens testsss', 'Submitted', '2025-08-18 12:37:04', '2025-08-18 12:37:04', NULL),
(15, 7, 17, NULL, '2025-08-25', 0.51, 'gg', 'Submitted', '2025-08-25 12:39:43', '2025-08-25 12:39:43', NULL),
(16, 6, 13, NULL, '2025-09-02', 1.01, 'sdfghjadgjsadgjsdgjsgdfj', 'Submitted', '2025-09-02 21:19:56', '2025-09-02 21:19:56', NULL),
(17, 6, 13, NULL, '2025-09-02', 0.01, 'xfyjdsfjy', 'Submitted', '2025-09-02 21:20:27', '2025-09-02 21:20:27', NULL),
(18, 6, 13, NULL, '2025-09-02', 0.01, 'asfasdads', 'Submitted', '2025-09-02 21:28:08', '2025-09-02 21:28:08', NULL),
(19, 6, 13, NULL, '2025-09-02', 0.01, 'ghgggggggggggggggggggggggggggggggggggggg', 'Submitted', '2025-09-02 21:32:43', '2025-09-02 21:32:43', NULL),
(20, 6, 13, NULL, '2025-09-02', 0.01, 'ghgggggggggggggggggggggggggggggggggggggg', 'Rejected', '2025-09-02 21:33:57', '2025-09-02 21:57:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female','others') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `contact_number` bigint(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `employment_type` enum('Full-Time','Part-Time','Intern','Trainee','Contract') DEFAULT NULL,
  `status` enum('active','inactive','terminated') DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `aadhar_card` varchar(255) DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `leave_balance` int(11) DEFAULT 12,
  `face_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `date_of_birth`, `contact_number`, `address`, `city`, `state`, `country`, `pin_code`, `joining_date`, `employment_type`, `status`, `resume`, `aadhar_card`, `pan_card`, `leave_balance`, `face_image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Shivam Bandekar', 'shivambandekar44@gmail.com', '$2y$12$DF9IP9X0wcgKuw1ru6IleOgAnjdH4copZ//q5njgbmarjessYoFq2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2025-07-19 00:50:59', '2025-08-13 10:08:18', NULL),
(7, 'Shubham Chodankar', 'employee01@example.com', '$2y$12$/RghM8b7qNTgra/BXnYquO7aiy2J9OtNnzOvqm4NFonRpg9SktD0O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, '2025-07-20 07:20:43', '2025-07-20 07:20:43', NULL),
(8, 'Viren Viren', 'employee03@example.com', '$2y$12$U9XsQLYIx3u9mgs/ENoYReDPJWuEzVn4O4y.pIKgeowfmuuQPs3hG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, '2025-07-21 05:33:25', '2025-08-01 09:11:38', NULL),
(9, 'Dwepam Gain', 'manager@example.com', '$2y$12$z61E7b5gyzxRbsbgIEjlR.GhcIOV6c.ofRZ1gIdr7lnLf/XVlRQFG', 'male', '2025-07-27', 5245454545, 'sterrt', 'asdf', 'sdasd', 'asdf', '102120', '1222-12-12', 'Full-Time', 'active', 'uploads/resumes/8LjDGyqw5MRrFykZUKMGSNez4wcmXoBGQih8ju2k.pdf', 'uploads/aadhar/XzQ6oJbJFdgNB3qKOS07BKUR4SW9w8sebFue0l1s.pdf', 'uploads/pan/Bq1o8UWAiFNxhGmERyJuEWttxAGq1LJr5yb65whF.pdf', 12, NULL, NULL, '2025-07-21 05:34:03', '2025-08-31 10:43:13', NULL),
(24, 'dg dgb', 'shivambandekadgsdgr44@gmail.com', '$2y$12$/pSBZhEHR9PtvXy100mrBuMYCv1Uv1bMuqIjzW4.n7lTN4SqdhF1W', 'male', '2025-03-30', 3242545245, 'asdfg', 'dsfgsdfg', 'sdfgdfg', 'sdfgsdfg', '452345', '2025-09-03', 'Full-Time', 'active', NULL, NULL, NULL, NULL, 'faces/face_1756976666.png', NULL, '2025-09-04 07:57:32', '2025-09-04 09:04:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_user_id_index` (`user_id`);

--
-- Indexes for table `breaks`
--
ALTER TABLE `breaks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breaks_attendance_id_index` (`attendance_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_user_id_index` (`user_id`),
  ADD KEY `leaves_leave_type_id_index` (`leave_type_id`),
  ADD KEY `leaves_approved_by_index` (`approved_by`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_types_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `project_members_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_structures`
--
ALTER TABLE `salary_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_structures_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `session_logs`
--
ALTER TABLE `session_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_logs_user_id_index` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_index` (`project_id`);

--
-- Indexes for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_comments_task_id_index` (`task_id`),
  ADD KEY `task_comments_user_id_index` (`user_id`);

--
-- Indexes for table `task_members`
--
ALTER TABLE `task_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timesheets_user_id_index` (`user_id`),
  ADD KEY `timesheets_task_id_index` (`task_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `breaks`
--
ALTER TABLE `breaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `salary_structures`
--
ALTER TABLE `salary_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `session_logs`
--
ALTER TABLE `session_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_members`
--
ALTER TABLE `task_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `breaks`
--
ALTER TABLE `breaks`
  ADD CONSTRAINT `breaks_attendance_id_foreign` FOREIGN KEY (`attendance_id`) REFERENCES `attendance` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salary_structures`
--
ALTER TABLE `salary_structures`
  ADD CONSTRAINT `salary_structures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD CONSTRAINT `timesheets_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
