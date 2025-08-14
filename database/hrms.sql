-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2025 at 11:42 AM
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
(90, 7, '2025-08-13', '2025-08-13 15:11:50', NULL, '2025-08-13 15:11:55', NULL, '00:00:05', '2025-08-13 15:11:50', '2025-08-13 15:11:55', NULL, NULL, NULL, NULL, NULL, NULL, '15.6224161', '73.8811619', 'Company');

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
(101, 84, 'Custom', '13:49:43', '13:49:49', '00:00:06', '2025-08-10 13:49:43', '2025-08-10 13:49:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('demergsystemsgoaindia-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:36:{i:0;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"create employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:1;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"delete employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:2;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:13:\"view employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:3;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"view roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:4;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:5;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:6;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"edit roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:7;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:13:\"edit employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:8;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:10:\"view users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:9;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"edit users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:10;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:16:\"view permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:11;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:18:\"create permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:12;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:16:\"edit permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:13;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:18:\"delete permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:14;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:11:\"apply leave\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:15;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"view all leaves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:16;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"approve leave\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:17;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:17:\"attendance report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:18;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"create holiday\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:19;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:14:\"delete holiday\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:20;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:14:\"create project\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:21;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:12:\"view project\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:22;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:12:\"edit project\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:23;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"delete project\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:24;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:11:\"create task\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:25;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:11:\"delete task\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:26;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:9:\"edit task\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:27;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:17:\"approve timesheet\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:28;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:16:\"reject timesheet\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:29;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:16:\"create timesheet\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:30;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:14:\"edit timesheet\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:31;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:14:\"view timesheet\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:32;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:17:\"create leave type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:33;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:15:\"edit leave type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:34;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:15:\"view leave type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:35;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:17:\"delete leave type\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:8:\"Employee\";s:1:\"c\";s:3:\"web\";}}}', 1755164447);

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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `system_title` varchar(255) NOT NULL DEFAULT 'HRMS',
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `description`, `system_title`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Demerg Company', 'Human Resource Management System', 'HRMS', 'images/logo.png', '2025-07-18 00:33:03', '2025-07-20 23:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_description` text DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_default_colour` varchar(255) DEFAULT NULL,
  `system_title` varchar(255) NOT NULL DEFAULT 'HRMS',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `employment_type` enum('full_time','part_time','intern') NOT NULL DEFAULT 'full_time',
  `status` enum('active','inactive','terminated') NOT NULL DEFAULT 'active',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `id_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `gender`, `date_of_birth`, `email`, `phone`, `address`, `city`, `state`, `postal_code`, `country`, `joining_date`, `employment_type`, `status`, `user_id`, `resume`, `id_proof`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shubham Chodankar', NULL, NULL, 'employee01@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', 7, NULL, NULL, '2025-07-31 10:22:18', '2025-07-31 10:22:18', NULL),
(2, 'Shivam Bandekar', NULL, NULL, 'employee02@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', 10, NULL, NULL, '2025-07-31 10:22:18', '2025-07-31 10:22:18', NULL),
(11, 'Viren Viren', NULL, NULL, 'employee03@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', 8, NULL, NULL, '2025-08-02 18:19:28', '2025-08-02 18:22:07', NULL);

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
(6, 'Addidtioin', '2025-08-05', 'national', NULL, '2025-08-02 12:47:10', '2025-08-02 12:47:10', NULL);

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
  `applied_on` datetime NOT NULL DEFAULT current_timestamp(),
  `approved_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_type_id`, `start_date`, `end_date`, `reason`, `status`, `applied_on`, `approved_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 1, '2025-07-25', '2025-07-31', 'seedhzdsthadghjadghadghj', 'Approved', '2025-07-23 07:27:07', 6, '2025-07-23 07:27:07', '2025-07-23 07:29:06', NULL),
(2, 6, 1, '2025-07-17', '2025-07-24', 'sdfgbsdthsdghswfg', 'Approved', '2025-07-23 09:33:21', 6, '2025-07-23 09:33:21', '2025-07-23 09:33:42', NULL),
(3, 6, 1, '2025-07-24', '2025-07-31', 'dfbdbdfbdfbdf', 'Approved', '2025-07-23 12:35:22', 6, '2025-07-23 12:35:22', '2025-07-23 12:35:46', NULL),
(4, 6, 1, '2025-07-24', '2025-07-25', 'fhjdrfhf', 'Rejected', '2025-07-24 08:05:16', 6, '2025-07-24 08:05:16', '2025-07-24 09:55:29', NULL),
(5, 6, 2, '2025-08-01', '2025-08-03', 'Vacation', 'Rejected', '2025-07-24 09:16:51', 9, '2025-07-24 09:16:51', '2025-07-24 09:54:04', NULL),
(6, 6, 1, '2025-08-01', '2025-08-03', 'maja', 'Approved', '2025-07-24 09:45:03', 9, '2025-07-24 09:45:03', '2025-07-24 09:53:44', NULL),
(7, 6, 2, '2025-07-25', '2025-07-26', 'adfcaSDFASDFASDFSDF', 'Approved', '2025-07-24 11:10:24', 6, '2025-07-24 11:10:24', '2025-07-24 11:15:18', NULL),
(8, 6, 1, '2025-08-01', '2025-08-03', 'Vacation', 'Approved', '2025-07-27 18:15:24', 6, '2025-07-27 18:15:24', '2025-07-27 18:49:19', NULL),
(9, 6, 2, '2025-08-05', '2025-08-06', 'Marriage', 'Rejected', '2025-07-27 18:16:14', 6, '2025-07-27 18:16:14', '2025-07-27 18:29:23', NULL),
(10, 6, 1, '2025-08-08', '2025-08-09', 'NOt feeling well...', 'Approved', '2025-08-02 12:52:12', 6, '2025-08-02 12:52:12', '2025-08-02 12:54:50', NULL),
(11, 6, 2, '2025-08-09', '2025-08-09', 'Casually', 'Rejected', '2025-08-02 12:54:11', 6, '2025-08-02 12:54:11', '2025-08-02 12:55:19', NULL),
(12, 6, 1, '2025-08-09', '2025-08-09', 'Not feeling well,wont be ablee to work.', 'Approved', '2025-08-08 12:54:03', 6, '2025-08-08 12:54:03', '2025-08-08 13:11:30', NULL),
(13, 6, 3, '2025-08-09', '2025-08-11', 'sss', 'Rejected', '2025-08-08 13:04:29', 6, '2025-08-08 13:04:29', '2025-08-08 13:15:12', NULL),
(14, 6, 3, '2025-08-09', '2025-08-09', 'sss', 'Approved', '2025-08-08 13:22:09', 6, '2025-08-08 13:22:09', '2025-08-08 13:22:14', NULL),
(15, 6, 2, '2025-08-16', '2025-08-16', 'ssssssssssss', 'Approved', '2025-08-08 13:23:08', 6, '2025-08-08 13:23:08', '2025-08-08 13:23:14', NULL),
(16, 6, 2, '2025-08-16', '2025-08-16', 'ukftukftui', 'Approved', '2025-08-08 13:27:20', 6, '2025-08-08 13:27:20', '2025-08-08 13:27:28', NULL),
(17, 6, 2, '2025-08-09', '2025-08-09', 'yjr', 'Approved', '2025-08-08 13:33:58', 6, '2025-08-08 13:33:58', '2025-08-08 13:34:06', NULL),
(18, 6, 6, '2025-08-09', '2025-08-09', 'sa', 'Approved', '2025-08-08 13:35:08', 6, '2025-08-08 13:35:08', '2025-08-08 13:35:13', NULL),
(19, 6, 6, '2025-08-11', '2025-08-15', 'sssssssssssssssssssssss', 'Rejected', '2025-08-08 13:35:54', 6, '2025-08-08 13:35:54', '2025-08-08 13:36:03', NULL);

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
(11, 'temp', 'tempfxvbdf', '2025-08-08 12:43:49', '2025-08-08 12:44:05', '2025-08-08 12:44:05');

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
(6, 'App\\Models\\User', 10),
(12, 'App\\Models\\User', 6);

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
(20, 7, 'Aug, 2025', 3000.00, 5000.00, 4000.00, 180.00, 240.00, 300.00, 12000.00, 11280.00, '2025-08-12 14:05:41', '2025-08-12 14:05:50', '2025-08-12 14:05:50');

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
(44, 'delete leave type', 'web', '2025-08-06 10:14:12', '2025-08-06 10:14:12');

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
(10, 'App\\Models\\User', 6, 'auth_token', '21dffc1aa187a642d7f78e01b9506ca14d0327ce61e4ee108b9b96893a2bb5f8', '[\"*\"]', NULL, NULL, '2025-08-12 06:08:51', '2025-08-12 06:08:51');

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
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `client_name`, `budget`, `deadline`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'HRMS', 'Demerg', 45000.00, '2025-08-09', 'HRMS HUman Resource  Management System', '2025-07-30 11:06:18', '2025-07-30 11:07:57', NULL),
(10, 'temp', 'temp', 323232.00, '2025-07-31', 'temptemptemptemptempsssdxghdfhgfdgh', '2025-07-30 19:18:55', '2025-08-02 12:58:34', NULL),
(11, 'aaaaa', 'aaa', 454545.00, '2025-08-08', 'aaaaaaaaaaaa', '2025-07-30 19:20:08', '2025-07-30 19:37:26', '2025-07-30 19:37:26'),
(12, 'shivam', 'shivam', 2121212.00, '2025-08-09', 'shivamshivamshivamshivamshivamshivamshivam', '2025-07-30 19:23:43', '2025-07-30 19:36:14', '2025-07-30 19:36:14'),
(14, 'hsdgh', 'sdtfgsd', 34.00, '2025-09-06', 'fydyjy', '2025-08-02 12:59:01', '2025-08-02 12:59:07', '2025-08-02 12:59:07'),
(15, 'test project', 'Demerg', 70000.00, '2025-09-06', 'Demo Projecta', '2025-08-04 22:02:20', '2025-08-04 22:04:45', NULL);

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
(9, 7, '2025-08-04 22:10:42', '2025-08-04 22:10:42', NULL),
(9, 8, '2025-08-04 22:10:42', '2025-08-04 22:10:42', NULL),
(9, 10, '2025-08-04 22:10:52', '2025-08-04 22:10:52', NULL),
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
(15, 7, '2025-08-04 22:04:45', '2025-08-04 22:04:45', NULL);

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
(12, 'Superadmin', 'web', '2025-08-13 05:05:30', '2025-08-13 05:13:49');

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
(5, 8, 20000.00, 5000.00, 40000.00, 5.00, 4.00, 6.00, '2025-08-12 07:05:33', '2025-08-12 07:05:33', NULL);

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
('FyQoP8Prq68bibEd3nEia713ISRl7GJxs1cwTzaB', NULL, '127.0.0.1', 'PostmanRuntime/7.45.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQW5hSkV1WjZ3WFJlcXNpMVRUN2YzOEJlZER0WXVNWVhRSXg1WnNWMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1755077938),
('QkZPcJulDYHRFtelb38i4Mc1UDEhVRFwz4z0gQwy', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidXFtUUZCbzJCT3FkandweXY1eXphZjhXRlJxWXlZQkpSVGFobzBlMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZS9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1755078115);

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `title`, `description`, `priority`, `status`, `due_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 9, 'User Authentication', 'User login/loguyt,update profile,view details,deletee profile', 'Low', 'Done', '2025-07-31', '2025-07-30 12:53:09', '2025-07-31 19:40:21', NULL),
(14, 9, 'Dashbord Page', 'Create view for Admin,HR,Manager,Employee to redirecet to theri respective pages when logedinn.', 'High', 'To-Do', '2025-08-06', '2025-07-30 12:57:15', '2025-07-30 12:57:15', NULL),
(16, 9, 'dfdf', 'sdfsdfs', 'Low', 'On Hold', '2025-08-07', '2025-07-30 13:11:05', '2025-07-30 14:18:45', '2025-07-30 14:18:45'),
(17, 9, 'Roles and Permission', 'Roles and Permission system in hRMS for Admin,manager,hr and employee', 'Urgent', 'In Progress', '2025-08-08', '2025-07-30 14:20:01', '2025-08-02 12:59:52', NULL),
(18, 9, 'E', 'E', 'Low', 'To-Do', '2025-07-31', '2025-07-30 14:51:18', '2025-07-30 14:51:24', '2025-07-30 14:51:24'),
(19, 9, '35y', '6', 'Low', 'To-Do', '2025-07-31', '2025-07-30 15:09:26', '2025-07-30 15:09:32', '2025-07-30 15:09:32'),
(20, 9, 'dsfdtghegd', 'gerg', 'Low', 'In Progress', '2025-08-08', '2025-08-02 12:59:27', '2025-08-02 12:59:41', '2025-08-02 12:59:41'),
(21, NULL, 'Test Task Deadline', NULL, NULL, NULL, '2025-08-13', '2025-08-12 19:20:07', '2025-08-12 19:22:23', NULL);

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
(9, 13, 6, 'qwqwqwqw', '2025-08-02 13:01:08', '2025-08-02 13:01:08', NULL);

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
(18, 21, 6, NULL, NULL),
(19, 21, 6, NULL, NULL);

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
(1, 6, 13, 9, '2025-07-30', 3.00, 'Finding....', 'Rejected', '2025-07-30 18:41:51', '2025-08-08 16:24:21', NULL),
(2, 6, 13, 9, '2025-07-30', 2.00, 'fsdfdf', 'Rejected', '2025-07-30 18:45:47', '2025-08-08 16:24:26', NULL),
(3, 6, 13, 9, '2025-07-31', 0.02, '22sdfsdf', 'Submitted', '2025-07-31 18:10:47', '2025-08-08 16:24:36', NULL),
(4, 7, 13, 9, '2025-07-31', 2.02, 'sss', 'Submitted', '2025-07-31 18:24:10', '2025-08-08 16:24:39', NULL),
(5, 7, 13, 9, '2025-07-31', 1.28, 'sss', 'Rejected', '2025-07-31 18:25:24', '2025-08-09 18:20:34', NULL),
(6, 7, 13, 9, '2025-07-31', 0.03, 'ss', 'Submitted', '2025-07-31 18:29:18', '2025-08-08 16:24:28', NULL),
(7, 7, 13, 9, '2025-07-31', 1.03, 'ss', 'Submitted', '2025-07-31 19:03:06', '2025-08-08 16:24:44', NULL),
(8, 7, 13, 9, '2025-07-31', 0.03, 's', 'Approved', '2025-07-31 19:03:42', '2025-08-08 16:24:46', NULL),
(9, 7, 13, 9, '2025-07-31', 12.00, 'sdcsdfgrerrrrrrrrrrrrrsfg', 'Approved', '2025-07-31 19:04:39', '2025-08-08 16:24:48', NULL),
(10, 6, 17, 9, '2025-08-04', 12.00, 'Done for today...', 'Rejected', '2025-08-04 22:06:30', '2025-08-08 16:24:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `leave_balance` int(11) DEFAULT 12,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `leave_balance`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Shivam Bandekar', 'shivambandekar44@gmail.com', '$2y$12$DF9IP9X0wcgKuw1ru6IleOgAnjdH4copZ//q5njgbmarjessYoFq2', 1, NULL, '2025-07-19 00:50:59', '2025-08-08 08:05:13', NULL),
(7, 'Shubham Chodankar', 'employee01@example.com', '$2y$12$/RghM8b7qNTgra/BXnYquO7aiy2J9OtNnzOvqm4NFonRpg9SktD0O', 12, NULL, '2025-07-20 07:20:43', '2025-07-20 07:20:43', NULL),
(8, 'Viren Viren', 'employee03@example.com', '$2y$12$U9XsQLYIx3u9mgs/ENoYReDPJWuEzVn4O4y.pIKgeowfmuuQPs3hG', 12, NULL, '2025-07-21 05:33:25', '2025-08-01 09:11:38', NULL),
(9, 'Dwepam Gain', 'manager@example.com', '$2y$12$z61E7b5gyzxRbsbgIEjlR.GhcIOV6c.ofRZ1gIdr7lnLf/XVlRQFG', 12, NULL, '2025-07-21 05:34:03', '2025-07-21 05:34:03', NULL),
(10, 'Shivam Bandekar', 'employee02@example.com', '$2y$12$ElO9XjycCuF8LCd3g39xiOq8y42Q4ic/jNN59tU7Dh3HeFTF0KqvC', 12, NULL, '2025-07-25 00:43:38', '2025-07-26 07:28:10', NULL),
(12, 'test updated', 'test@example.com', '$2y$12$JL.hBkbMdijwOWmC80/wA.aP5/jM/6PZzPsWO4x5pesfZdIirUNFe', 12, NULL, '2025-07-26 13:40:20', '2025-07-26 13:43:26', '2025-07-26 19:13:26'),
(14, 'Shivam Test', '23lco04@aitdgoa.edu.in', '$2y$12$UCYDVU0iP8ixAW1zxWI0ROfCQRXBmVlsBoCUozsYZIrMCiI0iwNXG', 12, NULL, '2025-08-13 06:20:05', '2025-08-13 06:20:05', NULL);

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_user_id_unique` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `breaks`
--
ALTER TABLE `breaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary_structures`
--
ALTER TABLE `salary_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session_logs`
--
ALTER TABLE `session_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task_members`
--
ALTER TABLE `task_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_user_employee` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
