-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 05:47 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_class_teacher`
--

CREATE TABLE `assign_class_teacher` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_class_teacher`
--

INSERT INTO `assign_class_teacher` (`id`, `class_id`, `teacher_id`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 0, 0, 1, '2024-05-17 15:34:22', '2024-05-18 14:25:46'),
(2, 1, 18, 0, 0, 1, '2024-05-18 14:28:45', '2024-05-18 14:28:45'),
(3, 18, NULL, 0, 0, 1, '2024-05-18 14:33:14', '2024-05-18 14:51:19'),
(11, 3, 2, 0, 0, 1, '2024-07-17 07:21:06', '2024-07-17 07:21:06');

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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not read, 1: read',
  `created_date` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `file`, `status`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 'hi', NULL, 0, 1720164545, '2024-07-05 07:29:05', '2024-07-05 07:29:05'),
(2, 1, 18, 'bro', NULL, 0, 1720191340, '2024-07-05 14:55:40', '2024-07-05 14:55:40'),
(3, 1, 18, 's', NULL, 0, 1720191449, '2024-07-05 14:57:29', '2024-07-05 14:57:29'),
(4, 1, 18, 'alo', NULL, 0, 1720193678, '2024-07-05 15:34:38', '2024-07-05 15:34:38'),
(5, 1, 18, 'alo', NULL, 0, 1720193682, '2024-07-05 15:34:42', '2024-07-05 15:34:42'),
(6, 1, 18, 'alo', NULL, 0, 1720193685, '2024-07-05 15:34:45', '2024-07-05 15:34:45'),
(7, 1, 18, 'alo', NULL, 0, 1720193824, '2024-07-05 15:37:04', '2024-07-05 15:37:04'),
(8, 1, 18, 'chao', NULL, 0, 1720193832, '2024-07-05 15:37:12', '2024-07-05 15:37:12'),
(9, 1, 18, 'chao', NULL, 0, 1720193841, '2024-07-05 15:37:21', '2024-07-05 15:37:21'),
(10, 1, 18, 'hey', NULL, 0, 1720193910, '2024-07-05 15:38:30', '2024-07-05 15:38:30'),
(11, 1, 18, 'hey', NULL, 0, 1720193915, '2024-07-05 15:38:35', '2024-07-05 15:38:35'),
(12, 1, 18, 'hey', NULL, 0, 1720193929, '2024-07-05 15:38:49', '2024-07-05 15:38:49'),
(13, 1, 18, 'hu', NULL, 0, 1720194628, '2024-07-05 15:50:28', '2024-07-05 15:50:28'),
(14, 1, 18, 'hjkkjhk', NULL, 0, 1720194684, '2024-07-05 15:51:24', '2024-07-05 15:51:24'),
(15, 1, 18, 'hjkkjhk', NULL, 0, 1720194691, '2024-07-05 15:51:31', '2024-07-05 15:51:31'),
(16, 1, 18, 'hjkkjhk', NULL, 0, 1720194692, '2024-07-05 15:51:32', '2024-07-05 15:51:32'),
(17, 1, 19, 'hu', NULL, 1, 1720252614, '2024-07-06 07:56:54', '2024-07-10 15:09:27'),
(18, 1, 19, 'bro', NULL, 1, 1720252786, '2024-07-06 07:59:46', '2024-07-10 15:09:27'),
(19, 1, 19, 'ga', NULL, 1, 1720253798, '2024-07-06 08:16:38', '2024-07-10 15:09:27'),
(20, 1, 19, 'hello', NULL, 1, 1720253810, '2024-07-06 08:16:50', '2024-07-10 15:09:27'),
(21, 1, 19, 'cai', NULL, 1, 1720253819, '2024-07-06 08:16:59', '2024-07-10 15:09:27'),
(22, 1, 19, 'brasf', NULL, 1, 1720253938, '2024-07-06 08:18:58', '2024-07-10 15:09:27'),
(23, 1, 19, 'j', NULL, 1, 1720253993, '2024-07-06 08:19:53', '2024-07-10 15:09:27'),
(24, 1, 19, 'asdas', NULL, 1, 1720254046, '2024-07-06 08:20:46', '2024-07-10 15:09:27'),
(25, 1, 19, 'hwll', NULL, 1, 1720623131, '2024-07-10 14:52:11', '2024-07-10 15:09:27'),
(26, 1, 19, 'jsdkfsdf', NULL, 1, 1720708642, '2024-07-11 14:37:22', '2024-07-13 14:33:42'),
(27, 1, 19, 'ds', NULL, 1, 1720708665, '2024-07-11 14:37:45', '2024-07-13 14:33:42'),
(28, 1, 19, 'chào', NULL, 1, 1720779862, '2024-07-12 10:24:22', '2024-07-13 14:33:42'),
(29, 19, 1, 'dfd', NULL, 1, 1720881236, '2024-07-13 14:33:56', '2024-07-13 14:34:16'),
(30, 1, 19, 'bro\r\nfds', NULL, 0, 1720948672, '2024-07-14 09:17:52', '2024-07-14 09:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: active, 1: inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not, 1: yes',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `amount`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Class1', 100, 0, 0, 1, '2024-04-29 16:19:27', '2024-07-17 07:15:43'),
(2, 'B', 0, 0, 1, 1, '2024-04-29 16:37:26', '2024-04-29 16:37:39'),
(3, 'Class2', 100, 0, 0, 1, '2024-05-02 17:29:36', '2024-07-17 07:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 2, 1, 0, 0, '2024-05-03 06:19:50', '2024-05-03 06:19:59'),
(10, 1, 1, 1, 0, 0, '2024-05-16 17:44:24', '2024-05-16 17:44:24'),
(11, 1, 3, 1, 0, 0, '2024-05-16 17:44:24', '2024-05-16 17:44:24'),
(12, 3, 1, 1, 0, 0, '2024-05-16 17:44:38', '2024-05-16 17:44:38'),
(13, 3, 2, 1, 0, 0, '2024-05-16 17:44:38', '2024-05-16 17:44:38'),
(14, 3, 3, 1, 0, 0, '2024-05-16 17:44:38', '2024-05-16 17:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_timetable`
--

CREATE TABLE `class_subject_timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_subject_timetable`
--

INSERT INTO `class_subject_timetable` (`id`, `class_id`, `subject_id`, `week_id`, `start_time`, `end_time`, `room_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '01:02', '12:02', '1', '2024-05-22 07:59:37', '2024-05-22 07:59:37'),
(2, 1, 2, 1, '01:02', '12:03', '2', '2024-05-24 17:08:08', '2024-05-24 17:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(3000) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `note`, `created_by`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Exam1', 'test1', 1, 0, '2024-05-27 09:25:05', '2024-05-27 09:39:25'),
(2, 'Exam2', 'test2', 1, 0, '2024-05-27 09:49:44', '2024-07-17 07:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `start_time` varchar(25) DEFAULT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `room_number` varchar(25) DEFAULT NULL,
  `full_marks` varchar(255) DEFAULT NULL,
  `passing_mark` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_id`, `class_id`, `subject_id`, `exam_date`, `start_time`, `end_time`, `room_number`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2024-05-29', '01:02', '16:02', '1', '40', '30', 1, '2024-05-28 08:11:34', '2024-05-28 08:11:34');

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
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `class_id`, `subject_id`, `homework_date`, `submission_date`, `document_file`, `description`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-06-27', '2024-06-27', '20240626041933xikv9rbspsysn525kdnl.pdf', '<p>11111111</p>', 0, 1, '2024-06-26 04:19:33', '2024-06-27 07:37:11'),
(2, 3, 3, '2024-06-26', '2024-06-27', '20240626022706x3ljslmp9ngmnq3ch2sd.pdf', '<p>abcdefasdsadasdas</p>', 1, 1, '2024-06-26 14:27:06', '2024-06-26 14:39:07'),
(3, 3, 3, '2024-06-27', '2024-06-29', '202406260259176lwiuzaykucs83ssozcs.pdf', '<p>csafdsvcvcv</p>', 0, 1, '2024-06-26 14:59:17', '2024-06-27 07:36:51'),
(4, 1, 3, '2024-06-27', '2024-06-29', '20240626035613jz84j4v0u6r7fvrhwnf2.pdf', '<p>fsdfsdfsduhuhuh</p>', 0, 18, '2024-06-26 15:56:13', '2024-06-27 07:10:26'),
(5, 1, 2, '2024-06-28', '2024-06-29', '20240627041852rfknsbg1i9damb9ict9q.pdf', '<p>ddjsfhjdhsjfhsdjhfjshfjshdjfhsdjfhjshfds</p>', 1, 1, '2024-06-27 04:18:52', '2024-06-27 07:10:02'),
(6, 3, 2, '2024-06-28', '2024-06-28', NULL, '<p>kskksajkdjas</p>', 1, 1, '2024-06-27 07:10:47', '2024-06-27 07:11:16'),
(7, 1, 2, '2024-06-27', '2024-06-27', '20240627073734kjn1ghse0ai1vf43rtvu.pdf', '<p>hello</p>', 0, 1, '2024-06-27 07:37:34', '2024-06-27 07:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `homework_submit`
--

CREATE TABLE `homework_submit` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homework_submit`
--

INSERT INTO `homework_submit` (`id`, `homework_id`, `student_id`, `description`, `document_file`, `created_at`, `updated_at`) VALUES
(1, 7, 19, '<p>submited</p>', '20240627090517aztybzvcscecuxrskqqo.pdf', '2024-06-27 09:05:17', '2024-06-27 09:05:17');

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
-- Table structure for table `marks_grade`
--

CREATE TABLE `marks_grade` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `percent_from` int(11) NOT NULL DEFAULT 0,
  `percent_to` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_grade`
--

INSERT INTO `marks_grade` (`id`, `name`, `percent_from`, `percent_to`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'A', 85, 100, 1, '2024-06-15 09:06:52', '2024-06-15 09:37:01'),
(6, 'B', 70, 84, 1, '2024-06-15 09:37:25', '2024-06-15 09:37:25'),
(7, 'C', 55, 69, 1, '2024-06-15 09:38:08', '2024-06-15 09:38:08'),
(8, 'D', 40, 54, 1, '2024-06-15 09:38:27', '2024-06-15 09:38:27'),
(9, 'F', 0, 39, 1, '2024-06-15 09:38:46', '2024-06-15 09:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `marks_register`
--

CREATE TABLE `marks_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `class_work` int(11) NOT NULL DEFAULT 0,
  `home_work` int(11) NOT NULL DEFAULT 0,
  `test_work` int(11) NOT NULL DEFAULT 0,
  `exam` int(11) NOT NULL DEFAULT 0,
  `full_marks` int(11) NOT NULL DEFAULT 0,
  `passing_mark` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks_register`
--

INSERT INTO `marks_register` (`id`, `student_id`, `exam_id`, `class_id`, `subject_id`, `class_work`, `home_work`, `test_work`, `exam`, `full_marks`, `passing_mark`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 19, 1, 1, 3, 8, 9, 9, 8, 40, 30, 1, '2024-06-09 03:11:21', '2024-06-13 13:56:24'),
(2, 17, 1, 1, 3, 9, 9, 9, 9, 40, 30, 1, '2024-06-11 14:27:31', '2024-06-13 13:56:38'),
(3, 14, 1, 1, 3, 8, 8, 8, 8, 40, 30, 1, '2024-06-11 14:32:15', '2024-06-13 13:56:43');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_board`
--

CREATE TABLE `notice_board` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board`
--

INSERT INTO `notice_board` (`id`, `title`, `notice_date`, `publish_date`, `message`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'title1', '2024-06-22', '2024-06-23', '<p>abcdef</p>', 1, '2024-06-22 08:53:08', '2024-07-17 07:23:12'),
(4, 'title2', '2024-06-18', '2024-06-20', '<p>scdsfsdfs</p>', 1, '2024-06-22 13:47:52', '2024-07-17 07:23:19'),
(5, 'title3', '2024-06-23', '2024-06-23', '<p>qqqqqqq</p>', 1, '2024-06-23 16:03:03', '2024-07-17 07:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `notice_board_message`
--

CREATE TABLE `notice_board_message` (
  `id` int(11) NOT NULL,
  `notice_board_id` int(11) DEFAULT NULL,
  `message_to` int(11) DEFAULT NULL COMMENT 'user type',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_board_message`
--

INSERT INTO `notice_board_message` (`id`, `notice_board_id`, `message_to`, `created_at`, `updated_at`) VALUES
(23, 2, 3, '2024-07-17 07:23:12', '2024-07-17 07:23:12'),
(24, 2, 4, '2024-07-17 07:23:12', '2024-07-17 07:23:12'),
(25, 2, 2, '2024-07-17 07:23:12', '2024-07-17 07:23:12'),
(26, 4, 3, '2024-07-17 07:23:19', '2024-07-17 07:23:19'),
(27, 4, 2, '2024-07-17 07:23:19', '2024-07-17 07:23:19'),
(28, 5, 3, '2024-07-17 07:23:24', '2024-07-17 07:23:24'),
(29, 5, 4, '2024-07-17 07:23:24', '2024-07-17 07:23:24'),
(30, 5, 2, '2024-07-17 07:23:24', '2024-07-17 07:23:24');

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
('oWd5C44KkLTcHQQSudrahpp2YHDn5SE5UR0zNd6B', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0EwcG9SaUNqeGUzdmR1ZU5Jd3JyVnlEZ2VoeDZsVDd1eDVwNTBmRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvU2Nob29sLU1hbmFnZW1lbnQtU3lzdGVtIjt9fQ==', 1721231090);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `exam_description` text DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `fevicon_icon` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `school_name`, `exam_description`, `paypal_email`, `logo`, `fevicon_icon`, `created_at`, `updated_at`) VALUES
(1, 'Phenikaa University', '', '', '202407030736221tcbnce8ky.jpg', '20240703073622rndb6qxvizlxluqywb8j.jpg', '2024-06-29 22:26:09', '2024-07-14 16:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_add_fees`
--

CREATE TABLE `student_add_fees` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `total_amount` int(11) DEFAULT 0,
  `paid_amount` int(11) DEFAULT 0,
  `remaining_amount` int(11) DEFAULT 0,
  `payment_type` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `is_payment` tinyint(4) NOT NULL DEFAULT 0,
  `payment_data` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_add_fees`
--

INSERT INTO `student_add_fees` (`id`, `student_id`, `class_id`, `total_amount`, `paid_amount`, `remaining_amount`, `payment_type`, `remark`, `is_payment`, `payment_data`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 19, 1, 100, 1, 99, 'Cash', NULL, 1, NULL, 1, '2024-06-30 14:23:03', '2024-06-30 14:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `attendance_type` int(11) DEFAULT NULL COMMENT '1=Present, 2=Late, 3=Absent, 4=Half Day',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `class_id`, `attendance_date`, `student_id`, `attendance_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-18', 19, 1, 1, '2024-06-18 08:23:07', '2024-06-18 08:23:07'),
(2, 1, '2024-06-18', 17, 2, 1, '2024-06-18 08:23:15', '2024-06-18 08:23:15'),
(3, 1, '2024-06-18', 14, 4, 1, '2024-06-18 08:23:22', '2024-06-18 08:23:29'),
(4, 1, '2024-06-20', 19, 1, 18, '2024-06-20 14:42:49', '2024-06-20 14:42:49'),
(5, 1, '2024-06-20', 17, 1, 18, '2024-06-20 14:42:53', '2024-06-20 14:42:53'),
(6, 1, '2024-06-20', 14, 1, 18, '2024-06-20 14:42:56', '2024-06-20 14:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: active, 1: inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not, 1: yes',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `created_by`, `type`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Subject1', 1, 'Theory', 0, 0, '2024-04-29 17:20:06', '2024-07-17 07:16:02'),
(2, 'Subject2', 1, 'Practical', 0, 0, '2024-04-30 09:05:43', '2024-07-17 07:16:38'),
(3, 'Subject3', 1, 'Practical', 0, 0, '2024-05-02 17:29:28', '2024-07-17 07:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admission_number` varchar(50) DEFAULT NULL,
  `roll_number` varchar(50) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1: admin, 2: teacher, 3: student, 4: parent',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not deleted, 1: deleted',
  `status` tinyint(4) DEFAULT 0 COMMENT '0: active, 1: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `mobile_number`, `admission_date`, `profile_pic`, `blood_group`, `height`, `weight`, `occupation`, `marital_status`, `address`, `permanent_address`, `qualification`, `work_experience`, `note`, `user_type`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', NULL, 'admin@gmail.com', NULL, '$2y$12$bFFdJmn6O1QOWlMFZRNTS.LUPiPddsYR0d/Z6OaFJi8SViLLcmE6m', '8aAzjDZCWh2jhBEYRIBxvQiF4uAfCihZ2atDYluDNgxIEHtRl5C219ufY6i5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '202407030355348cfbg3civxsxbhns174n.jpg', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, NULL, '2024-07-17 08:41:36'),
(2, NULL, 'Teacher', NULL, 'teacher@gmail.com', NULL, '$2y$12$PSWdjymPKOYRRNGBSy7GqOGJcbsXOasM5LRm.StcSbH3qd0M.jdcq', '5Qa8np9LcZK9BJxnJVdmaqS40rzn0GjWWBhBj0T0BMqyClZKg18AFjChNxgB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, NULL, NULL),
(3, NULL, 'Student', NULL, 'student@gmail.com', NULL, '$2y$12$PSWdjymPKOYRRNGBSy7GqOGJcbsXOasM5LRm.StcSbH3qd0M.jdcq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, NULL, NULL),
(4, NULL, 'Parent', NULL, 'parent@gmail.com', NULL, '$2y$12$PSWdjymPKOYRRNGBSy7GqOGJcbsXOasM5LRm.StcSbH3qd0M.jdcq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 4, 0, 0, NULL, NULL),
(11, NULL, 'Quan', 'Ho', 'quan@gmail.com', NULL, '$2y$12$69B/o3pXYCOL89Yj7kSn2uUYqXhXJMiDCyb5Y1c6.KvebAjBpKJ/e', NULL, '1', '2024-01-17', 1, 'Male', '2024-05-06', '1', 'dsaddas', '1111111111', '2024-05-21', '20240505014406xc3uoxgin0huge1n6fhl.jpg', '2024-04-30', '1', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, '2024-05-04 08:06:59', '2024-05-07 02:30:16'),
(12, NULL, 'Parent', '2', 'parent2@gmail.com', NULL, '$2y$12$0pBaMVEIxAZLqZXgTNpt6ug5wSxvya4oLgmWt47Xv2dij9aTuBjE.', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '111111111', NULL, '20240507092946ukuswoqm1xkbcssi8zjm.jpg', NULL, NULL, NULL, 'qwdq', NULL, 'aaa', NULL, NULL, NULL, NULL, 4, 0, 0, '2024-05-07 02:29:46', '2024-07-17 00:15:09'),
(13, NULL, 'qq111', 'aa', 'parent123@gmail.com', NULL, '$2y$12$upr4K2xbyq58dwHJKTs8ZuB2FNw7mbH9KDGYA7F8lNHqiHjMI3iKG', NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '111111111', NULL, '20240507093152k4s9694gt3wovdkvj8cs.png', NULL, NULL, NULL, 'aaa', NULL, 'vvv', NULL, NULL, NULL, NULL, 4, 1, 0, '2024-05-07 02:31:53', '2024-05-07 02:57:23'),
(14, 15, 'Student', '3', 'student3@gmail.com', NULL, '$2y$12$54eRreh62pvnoM0Z5Sgur.XJHf3sY9rB.TMeUdP5xeY8eHc9iwdo.', NULL, '11', '2024-02-14', 1, 'Female', '2024-05-12', '1', 'sdsdsd', '111111111', '2024-03-05', '20240508053544mvf1brbqe3pswqxzcytb.jpg', 'sađasd', '11', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2024-05-08 10:35:45', '2024-07-17 00:14:30'),
(15, NULL, 'Parent', '1', 'parent1@gmail.com', NULL, '$2y$12$upd/FE1tS6h21D81wz8aF.Q18IkKvoLpFLc5ikYbMFAbR/TpxCtci', NULL, NULL, NULL, NULL, 'Female', NULL, '', '', '111111111', NULL, '20240508060535jlsjm529xpcxixizsybb.jpg', '', '', '', 'qwdq', NULL, 'aa', NULL, NULL, NULL, NULL, 4, 0, 0, '2024-05-08 11:05:35', '2024-07-17 08:43:45'),
(16, NULL, 's', 's', 's@gmail.com', NULL, '$2y$12$zzZF/AxQ4FdPU9FF0LGfQ.2j6t385sQvpxlcr87JmdafsGtZwp53C', NULL, '1', '2024-05-10', 1, 'Female', '2024-05-15', '1', 'sdsdsd', '1111111111', '2024-05-23', '20240511015853ubgglobqcqu0vz2j8hkb.png', 'sađasd', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, '2024-05-11 06:57:28', '2024-05-11 06:59:40'),
(17, 15, 'Student', '2', 'student2@gmail.com', NULL, '$2y$12$Onr5QY9Vo/zdBb967VxUBe4/m20FZja8l4IWJvwxtZr18ZG/oJYsi', NULL, '1', '2024-05-10', 1, 'Male', '2024-07-04', '', 'fdsf', '1111111111', '2024-05-09', NULL, 'sađasd', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2024-05-11 07:00:34', '2024-07-17 00:13:51'),
(18, NULL, 'Teacher', '1', 'teacher1@gmail.com', NULL, '$2y$12$xEW8Gcb52imfFKtF7ujGOu3x/hHKI3/2pw0DETR4n3lOXLmv49I6C', NULL, NULL, NULL, NULL, 'Male', '2024-01-10', NULL, NULL, '1111111111', '2024-05-12', '20240513020304bqczornuyvfwcgfb7nzf.jpg', NULL, NULL, NULL, NULL, 'Test', 'test', 'test', 'test', 'test', 'test', 2, 0, 0, '2024-05-13 06:43:17', '2024-07-17 08:42:34'),
(19, 15, 'Student', '1', 'student1@gmail.com', NULL, '$2y$12$ORCzdxsEVnWep.7SLIQsnOH8ODsAksvhcUznY2.1YfResjvlejjTG', NULL, '1', '1', 1, 'Female', '2024-05-14', 'test', 'test', '1111111111', '2024-05-29', '20240522022713zvjut1lqhrpcamivzvon.webp', 'test', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2024-05-22 07:27:13', '2024-07-17 08:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fullcalendar_day` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `fullcalendar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 1, NULL, NULL),
(2, 'Tuesday', 2, NULL, NULL),
(3, 'Wednesday', 3, NULL, NULL),
(4, 'Thursday', 4, NULL, NULL),
(5, 'Friday', 5, NULL, NULL),
(6, 'Saturday', 6, NULL, NULL),
(7, 'Sunday', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homework_submit`
--
ALTER TABLE `homework_submit`
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
-- Indexes for table `marks_grade`
--
ALTER TABLE `marks_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks_register`
--
ALTER TABLE `marks_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board`
--
ALTER TABLE `notice_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_class_teacher`
--
ALTER TABLE `assign_class_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `class_subject_timetable`
--
ALTER TABLE `class_subject_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `homework_submit`
--
ALTER TABLE `homework_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks_grade`
--
ALTER TABLE `marks_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marks_register`
--
ALTER TABLE `marks_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice_board`
--
ALTER TABLE `notice_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notice_board_message`
--
ALTER TABLE `notice_board_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_add_fees`
--
ALTER TABLE `student_add_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
