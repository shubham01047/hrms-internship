-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2025 at 04:19 PM
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
  `punch_out` text DEFAULT NULL,
  `total_working_hours` time DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `date`, `punch_in`, `punch_out`, `total_working_hours`, `created_at`, `updated_at`, `deleted_at`) VALUES
(37, 7, '2025-07-26', '12:55:37', '12:55:56', '00:00:19', '2025-07-26 12:55:37', '2025-07-26 12:55:56', NULL),
(38, 6, '2025-07-27', '18:01:50', '18:04:46', '00:02:56', '2025-07-27 18:01:50', '2025-07-27 18:04:46', NULL),
(39, 7, '2025-07-27', '19:47:06', '19:47:14', '00:00:08', '2025-07-27 19:47:06', '2025-07-27 19:47:14', NULL);

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
(34, 37, 'Morning Tea', '12:55:41', '12:55:51', '00:00:10', '2025-07-26 12:55:41', '2025-07-26 12:55:51', NULL),
(35, 38, NULL, '18:03:09', '18:03:57', '00:00:48', '2025-07-27 18:03:09', '2025-07-27 18:03:57', NULL);

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
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:20:{i:0;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:15:\"create employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:1;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:15:\"delete employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:2;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:13:\"view employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:3;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:10:\"view roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:4;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:12:\"create roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:5;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"delete roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:6;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:10:\"edit roles\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:7;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:13:\"edit employee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:8;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:10:\"view users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:9;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:10:\"edit users\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:10;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:16:\"view permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:11;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:18:\"create permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:12;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:16:\"edit permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:13;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:18:\"delete permissions\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:14;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:11:\"apply leave\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:15;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:15:\"view all leaves\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:4;i:1;i:6;}}i:16;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:13:\"approve leave\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:17;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:17:\"attendance report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:18;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:14:\"create holiday\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:19;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:14:\"delete holiday\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:8:\"Employee\";s:1:\"c\";s:3:\"web\";}}}', 1753711806);

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
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `employment_type` enum('full_time','part_time','intern') NOT NULL DEFAULT 'full_time',
  `status` enum('active','inactive','terminated') NOT NULL DEFAULT 'active',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `id_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `email`, `phone`, `address`, `city`, `state`, `postal_code`, `country`, `joining_date`, `employment_type`, `status`, `user_id`, `resume`, `id_proof`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Shivam', 'Bandekar', NULL, NULL, 'shivam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', NULL, NULL, NULL, '2025-07-20 05:09:37', '2025-07-20 05:09:37', NULL),
(5, 'shubham', 'chodankar', NULL, NULL, 'shubham@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', NULL, NULL, NULL, '2025-07-20 05:25:53', '2025-07-20 05:25:53', NULL),
(7, 'Viren', 'Viren', NULL, NULL, 'hr@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', NULL, NULL, NULL, '2025-07-21 05:31:11', '2025-07-21 05:31:11', NULL),
(11, 'Dweepamz', 'Gain', NULL, NULL, 'manager@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'full_time', 'active', NULL, NULL, NULL, '2025-07-21 05:31:59', '2025-07-25 01:44:11', NULL);

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
  `type` enum('national','company','event') NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `title`, `date`, `type`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casually', '2025-07-28', 'company', 'Enjoy BKL', '2025-07-27 19:22:13', '2025-07-27 19:22:13', NULL);

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
(9, 6, 2, '2025-08-05', '2025-08-06', 'Marriage', 'Rejected', '2025-07-27 18:16:14', 6, '2025-07-27 18:16:14', '2025-07-27 18:29:23', NULL);

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
(7, 'Study Leave', 'For exams or education', '2025-07-23 07:26:41', '2025-07-23 07:26:41', NULL);

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
(4, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(28, 'delete holiday', 'web', '2025-07-27 14:06:43', '2025-07-27 14:06:43');

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
(9, 'App\\Models\\User', 6, 'auth_token', '9fb10c47d2bb55481c99eee4776203bc9594b60f71449cd68c5917c44ad72d8d', '[\"*\"]', '2025-07-27 13:59:27', NULL, '2025-07-27 13:56:10', '2025-07-27 13:59:27');

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
(6, 'Employee', 'web', '2025-07-18 03:21:43', '2025-07-18 03:21:43');

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
(28, 4);

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
('mMkmZY2qlzijAeGbCiB5Uqj5uRCZyZ2fSPwCDwsM', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzFSVlhESDZuTnp0MkhhNnE1YzlyenV2V2ZzbERZWkRCMjRpQmZ3RiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1753625839),
('WxPWXAIWOcsLUHYra57rz9YUbMe3AOk5Jg8UKAsY', NULL, '127.0.0.1', 'PostmanRuntime/7.44.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1JuNEFYV0NuWGFNa0Y3NE1icHlZZGZzek15NVZTSTNNQ1JBWW5XeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1753622846),
('Zyz20SP9VOgYbX4ZH1MB71fS5mghAehfCoNrnseO', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibXRMYXEwMVlOY1hEUzJJV2tvUXhjRElMbkdjdTNvMmIzUW4wUHdtZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbGlkYXlzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob2xpZGF5cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1753625411);

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
  `assigned_to` int(10) UNSIGNED DEFAULT NULL,
  `priority` enum('Low','Medium','High','Urgent') NOT NULL DEFAULT 'Medium',
  `status` enum('To-Do','In Progress','On Hold','Done') NOT NULL DEFAULT 'To-Do',
  `due_date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `commented_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timesheets`
--

CREATE TABLE `timesheets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `task_id` int(10) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hours_worked` decimal(5,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Submitted','Approved','Rejected') NOT NULL DEFAULT 'Submitted',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `leave_balance` int(11) DEFAULT 12,
  `google_id` varchar(255) DEFAULT NULL,
  `google_token` varchar(255) DEFAULT NULL,
  `google_refresh_token` varchar(255) DEFAULT NULL,
  `google_avatar` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `leave_balance`, `google_id`, `google_token`, `google_refresh_token`, `google_avatar`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Shivam Bandekar', 'admin@example.com', NULL, '$2y$12$DF9IP9X0wcgKuw1ru6IleOgAnjdH4copZ//q5njgbmarjessYoFq2', 10, NULL, NULL, NULL, NULL, NULL, '2025-07-19 00:50:59', '2025-07-27 13:19:19', NULL),
(7, 'Shubham Chodankar', 'employee01@example.com', NULL, '$2y$12$/RghM8b7qNTgra/BXnYquO7aiy2J9OtNnzOvqm4NFonRpg9SktD0O', 12, NULL, NULL, NULL, NULL, NULL, '2025-07-20 07:20:43', '2025-07-20 07:20:43', NULL),
(8, 'Viren Viren', 'hr@example.com', NULL, '$2y$12$U9XsQLYIx3u9mgs/ENoYReDPJWuEzVn4O4y.pIKgeowfmuuQPs3hG', 12, NULL, NULL, NULL, NULL, NULL, '2025-07-21 05:33:25', '2025-07-21 05:33:25', NULL),
(9, 'Dwepam Gain', 'manager@example.com', NULL, '$2y$12$z61E7b5gyzxRbsbgIEjlR.GhcIOV6c.ofRZ1gIdr7lnLf/XVlRQFG', 12, NULL, NULL, NULL, NULL, NULL, '2025-07-21 05:34:03', '2025-07-21 05:34:03', NULL),
(10, 'Shivam Bandekar', 'employee02@example.com', NULL, '$2y$12$ElO9XjycCuF8LCd3g39xiOq8y42Q4ic/jNN59tU7Dh3HeFTF0KqvC', 12, '103688976084377817309', 'ya29.A0AS3H6NwAhNbn7fxqHP6lyLfm2OFO3O3ENg6cXwvufC959LWj3E1jioe101DVvhjhAeY1m8eP5HAabNvnB3lgSWvEBtHWvEPrXfgL2WGsu9o2ezsS4ZKJIIVvd6uq79oIX-XryzPun9oyFXMDGyhTRKDK6X2M4iAQPSJvYtLql0yUhAXUTOOy7tGIJsxqQyHUhZ4xAv4laCgYKAS4SARUSFQHGX2MibzOf-CDnuRclyhbVrJ5-2w0207', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLSbFnq3HvKOw6HR3a96o58cTQpBq14QjKg_CtyYshr1dAAgAA=s96-c', NULL, '2025-07-25 00:43:38', '2025-07-26 07:28:10', NULL),
(11, 'Shivam Bandekar', 'shivambandekar44@gmail.com', NULL, '$2y$12$RXbwYWBA77sQzrOCy3Y2ze2o.7403N9fjRhayIS.FAGeW32zq4SN2', 12, NULL, NULL, NULL, NULL, 'ujjN0AuVOTQa2ccX4bhDzwDXQjgXgn7swpeIIP1E0Ip3QkrXB3OzBSd0xaM1', '2025-07-26 07:31:45', '2025-07-26 07:40:32', NULL),
(12, 'test updated', 'test@example.com', NULL, '$2y$12$JL.hBkbMdijwOWmC80/wA.aP5/jM/6PZzPsWO4x5pesfZdIirUNFe', 12, NULL, NULL, NULL, NULL, NULL, '2025-07-26 13:40:20', '2025-07-26 13:43:26', '2025-07-26 19:13:26'),
(13, 'updateTest postmanapi', 'postman@example.com', NULL, '$2y$12$8eCgbTIeXcOuv4Wk.XsStu6AZaKrowcp2.qPP98/5d768kuICFhz.', 12, NULL, NULL, NULL, NULL, NULL, '2025-07-27 12:05:59', '2025-07-27 12:10:05', '2025-07-27 17:40:05');

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
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

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
  ADD KEY `notifications_user_id_index` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD KEY `tasks_project_id_index` (`project_id`),
  ADD KEY `tasks_assigned_to_index` (`assigned_to`);

--
-- Indexes for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_comments_task_id_index` (`task_id`),
  ADD KEY `task_comments_user_id_index` (`user_id`);

--
-- Indexes for table `timesheets`
--
ALTER TABLE `timesheets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timesheets_user_id_index` (`user_id`),
  ADD KEY `timesheets_task_id_index` (`task_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `breaks`
--
ALTER TABLE `breaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timesheets`
--
ALTER TABLE `timesheets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
