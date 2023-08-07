-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 02:41 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `classses`
--

CREATE TABLE `classses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classses`
--

INSERT INTO `classses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First', NULL, NULL),
(2, 'Second', NULL, NULL),
(3, 'Third', NULL, NULL),
(4, 'Fourth', NULL, NULL),
(5, 'Fifth', NULL, NULL),
(6, 'Sixth', NULL, NULL),
(7, 'Seventh', NULL, NULL),
(8, 'Eighth', NULL, NULL),
(9, 'Ninth', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class__teachers`
--

CREATE TABLE `class__teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class__teachers`
--

INSERT INTO `class__teachers` (`id`, `class_id`, `user_id`, `created_at`, `updated_at`, `subject_id`) VALUES
(1, 2, 2, '2023-07-04 08:16:59', '2023-07-04 08:16:59', 2),
(2, 1, 2, '2023-07-04 08:17:07', '2023-07-04 08:17:07', 2),
(3, 8, 3, '2023-07-04 08:17:53', '2023-07-04 08:17:53', 1),
(4, 7, 3, '2023-07-04 08:17:57', '2023-07-04 08:17:57', 1),
(5, 6, 4, '2023-07-04 08:18:39', '2023-07-04 08:18:39', 1),
(6, 5, 4, '2023-07-04 08:18:45', '2023-07-04 08:18:45', 1),
(7, 5, 5, '2023-07-04 08:19:19', '2023-07-04 08:19:19', 4),
(8, 6, 5, '2023-07-04 08:19:22', '2023-07-04 08:19:22', 4),
(9, 8, 6, '2023-07-04 08:19:44', '2023-07-04 08:19:44', 4),
(10, 7, 6, '2023-07-04 08:19:48', '2023-07-04 08:19:48', 4),
(11, 7, 7, '2023-07-04 08:20:15', '2023-07-04 08:20:15', 3),
(12, 8, 7, '2023-07-04 08:20:18', '2023-07-04 08:20:18', 3),
(13, 6, 7, '2023-07-04 08:20:22', '2023-07-04 08:20:22', 3),
(14, 5, 7, '2023-07-04 08:20:25', '2023-07-04 08:20:25', 3),
(15, 4, 7, '2023-07-04 08:20:27', '2023-07-04 08:20:27', 3),
(16, 4, 8, '2023-07-04 08:21:05', '2023-07-04 08:21:05', 2),
(17, 5, 8, '2023-07-04 08:21:12', '2023-07-04 08:21:12', 2),
(18, 6, 8, '2023-07-04 08:21:36', '2023-07-04 08:21:36', 2),
(19, 7, 8, '2023-07-04 08:21:39', '2023-07-04 08:21:39', 2),
(20, 8, 8, '2023-07-04 08:21:42', '2023-07-04 08:21:42', 2),
(21, 5, 9, '2023-07-04 08:22:03', '2023-07-04 08:22:03', 5),
(22, 6, 9, '2023-07-04 08:22:06', '2023-07-04 08:22:06', 5),
(23, 7, 9, '2023-07-04 08:22:09', '2023-07-04 08:22:09', 5),
(24, 8, 9, '2023-07-04 08:22:12', '2023-07-04 08:22:12', 5),
(25, 9, 10, '2023-07-04 08:22:40', '2023-07-04 08:22:40', 1),
(26, 9, 11, '2023-07-04 08:22:57', '2023-07-04 08:22:57', 3),
(27, 9, 12, '2023-07-04 08:23:13', '2023-07-04 08:23:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `full_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deserved_mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `quiz_id`, `student_id`, `full_mark`, `deserved_mark`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '35', '25', '2023-07-13 10:44:51', '2023-07-13 10:44:51'),
(2, 1, 2, '35', '5', '2023-07-13 10:47:33', '2023-07-13 10:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `mark_quizzes`
--

CREATE TABLE `mark_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `abuse` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mark_quizzes`
--

INSERT INTO `mark_quizzes` (`id`, `quiz_id`, `student_id`, `question_id`, `score`, `abuse`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 7, 25.00, '0', '2023-07-13', '2023-07-13 10:44:25', '2023-07-13 10:44:51'),
(2, 1, 14, 7, 5.00, '0', '2023-07-13', '2023-07-13 10:47:21', '2023-07-13 10:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2023_03_16_215035_create_classses_table', 1),
(22, '2023_03_16_215345_create_subjects_table', 1),
(23, '2023_03_16_215551_create_students_table', 1),
(24, '2023_03_16_215555_create_class__teachers_table', 1),
(25, '2023_03_16_215616_create_quizzes_table', 1),
(26, '2023_03_16_215638_create_marks_table', 1),
(27, '2023_03_19_191926_add_subject_id_to_class__teachers', 1),
(28, '2023_03_20_212930_create_orders_table', 1),
(29, '2023_03_22_123353_create_notifications_table', 1),
(30, '2023_03_27_111412_create_questions_table', 1),
(31, '2023_05_02_090057_create_mark_quizzes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0c8f1533-8cce-4e20-9587-d8c62b3e48ea', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 14, '{\"quiz_id\":5,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-03\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:07:22', '2023-07-16 08:07:22'),
('10e341d2-6b83-491f-ab37-9da18d914c74', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 41, '{\"quiz_id\":5,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-03\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:07:22', '2023-07-16 08:07:22'),
('11b89142-dce7-4959-828e-8856436b3c18', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 49, '{\"quiz_id\":2,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-07-18\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 05:12:47', '2023-07-16 05:12:47'),
('20f82ba8-c1f3-4d02-ad9c-367a9d76929d', 'App\\Notifications\\LinkQuizNotification', 'App\\Models\\User', 3, '{\"quiz_id\":3,\"message\":\"Your request is approve\",\"t1Class\":\"Seventh\",\"t1Subject\":\"Arabic\",\"date\":\"2023-07-18\",\"wishes\":\"\"}', NULL, '2023-07-16 08:03:15', '2023-07-16 08:03:15'),
('25a0fc03-5db2-40a7-bb28-e1b5c36b90f2', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 43, '{\"quiz_id\":4,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-02\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:05:54', '2023-07-16 08:05:54'),
('3ef988de-ea57-4e6d-8d4d-4d2b02f1a20d', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 49, '{\"quiz_id\":4,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-02\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:05:54', '2023-07-16 08:05:54'),
('43e2ed83-e2c5-4f57-aeb4-1805ec475e64', 'App\\Notifications\\publishQuizForsolveNotification', 'App\\Models\\User', 38, '{\"quiz_id\":1,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"\",\"message\":\"The quiz is ready for\",\"wishes\":\"Press to solve it\"}', NULL, '2023-07-13 10:43:17', '2023-07-13 10:43:17'),
('4b69a76c-5f97-4ea0-8a50-8c2c6a421cb6', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 37, '{\"quiz_id\":2,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-07-18\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 05:12:47', '2023-07-16 05:12:47'),
('660da421-41e3-47ec-96e6-87a4dadd4296', 'App\\Notifications\\NewQuizNotification', 'App\\Models\\User', 1, '{\"order_id\":4}', '2023-07-16 08:05:02', '2023-07-16 08:03:34', '2023-07-16 08:05:02'),
('7be65a24-ed23-4d0c-a7f3-f452d836d273', 'App\\Notifications\\publishQuizForsolveNotification', 'App\\Models\\User', 41, '{\"quiz_id\":1,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"\",\"message\":\"The quiz is ready for\",\"wishes\":\"Press to solve it\"}', NULL, '2023-07-13 10:43:17', '2023-07-13 10:43:17'),
('83a06ac7-d9ec-4fd5-a590-2dc5328ec7b8', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 13, '{\"quiz_id\":5,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-03\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:07:22', '2023-07-16 08:07:22'),
('897fdfab-753c-4d79-9f89-b44a2cff930a', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 38, '{\"quiz_id\":5,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-03\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:07:22', '2023-07-16 08:07:22'),
('9a8e16e0-d7cb-4236-9c6b-a55294960c2c', 'App\\Notifications\\LinkQuizNotification', 'App\\Models\\User', 3, '{\"quiz_id\":4,\"message\":\"Your request is approve\",\"t1Class\":\"Seventh\",\"t1Subject\":\"Arabic\",\"date\":\"2023-08-02\",\"wishes\":\"\"}', NULL, '2023-07-16 08:05:53', '2023-07-16 08:05:53'),
('a0f8b052-d4f4-4a85-a345-b90c6639f401', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 43, '{\"quiz_id\":2,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-07-18\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 05:12:47', '2023-07-16 05:12:47'),
('a0fa2bc2-7d79-419c-9750-18eba6b62938', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 49, '{\"quiz_id\":3,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-07-18\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:03:15', '2023-07-16 08:03:15'),
('cb24a221-e89f-476e-9ec1-ef72f0d13e36', 'App\\Notifications\\LinkQuizNotification', 'App\\Models\\User', 3, '{\"quiz_id\":2,\"message\":\"Your request is approve\",\"t1Class\":\"Seventh\",\"t1Subject\":\"Arabic\",\"date\":\"2023-07-18\",\"wishes\":\"\"}', NULL, '2023-07-16 05:12:46', '2023-07-16 05:12:46'),
('d017378b-5c9b-4c89-9d2f-160b618afc2a', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 37, '{\"quiz_id\":3,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-07-18\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:03:15', '2023-07-16 08:03:15'),
('d738ffda-9f28-4a07-bb60-1018eee35592', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 43, '{\"quiz_id\":3,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-07-18\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:03:15', '2023-07-16 08:03:15'),
('da4c38f8-52d5-4667-b7c2-3ffdc471ce6c', 'App\\Notifications\\publishQuizNotification', 'App\\Models\\User', 37, '{\"quiz_id\":4,\"teacher\":\"niveen ghneem\",\"subject\":\"Arabic\",\"date\":\"in date 2023-08-02\",\"message\":\"You are have a quiz for\",\"wishes\":\"Best Wishes\"}', NULL, '2023-07-16 08:05:54', '2023-07-16 08:05:54'),
('f2f0d6e2-643f-4018-b9ba-e5fa7caf1899', 'App\\Notifications\\LinkQuizNotification', 'App\\Models\\User', 3, '{\"quiz_id\":5,\"message\":\"Your request is approve\",\"t1Class\":\"Eighth\",\"t1Subject\":\"Arabic\",\"date\":\"2023-08-03\",\"wishes\":\"\"}', NULL, '2023-07-16 08:07:22', '2023-07-16 08:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_2` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_3` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `answer_1`, `answer_2`, `answer_3`, `right_answer`, `mark`, `created_at`, `updated_at`) VALUES
(1, 1, 'من مؤلف قصيدة \"سقى الله شاماً\"', 'البحتري', 'أبو البقاء البدري', 'زهير بين أبي سلمى', 'answer_3', '5', '2023-07-13 10:38:24', '2023-07-13 10:38:24'),
(2, 1, '(( تذكُّر الأيام الجميلة التي قضاها الشاعر في وطنه )) فكرة البيت', 'الأول', 'الثاني', 'الثالث', 'answer_3', '5', '2023-07-13 10:38:47', '2023-07-13 10:38:47'),
(3, 1, 'معاناة الشاعر في النص بسبب', 'الفقر', 'الجوع', 'المرض', 'answer_3', '5', '2023-07-13 10:39:09', '2023-07-13 10:39:09'),
(4, 1, 'الفكرة العامة للنص السابق', 'استمتاع الشاعر بغربته', 'وصف الشاعر جمال وطنه', 'تعلّق الشاعر بوطنه وأهله', 'answer_1', '5', '2023-07-13 10:40:29', '2023-07-13 10:40:29'),
(5, 1, '(( تذكّر الشاعر أيامه الجميلة في الشام )) فكرة البيت', 'الثاني', 'الأول', 'الرابع', 'answer_2', '5', '2023-07-13 10:41:02', '2023-07-13 10:41:02'),
(6, 1, 'الشعور العاطفي البارز في البيت الأول', 'الحزن', 'الألم', 'الافتخار', 'answer_3', '5', '2023-07-13 10:41:23', '2023-07-13 10:41:23'),
(7, 1, 'مفرد كلمة ( نُوَب ) الواردة في البيت الرابع', 'إنابة', 'نوائب', 'نائب', 'answer_2', '5', '2023-07-13 10:41:56', '2023-07-13 10:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_teacher_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `class_teacher_id`, `date`, `done`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-07-15', 1, '2023-07-13 10:29:19', '2023-07-13 10:43:16'),
(3, 4, '2023-07-18', 0, '2023-07-16 08:03:15', '2023-07-16 08:03:15'),
(4, 4, '2023-08-02', 0, '2023-07-16 08:05:53', '2023-07-16 08:05:53'),
(5, 3, '2023-08-03', 0, '2023-07-16 08:07:22', '2023-07-16 08:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `birth` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `class_id`, `birth`, `gender`, `created_at`, `updated_at`) VALUES
(1, 13, 8, '2015-08-19', 1, '2023-07-04 08:34:05', '2023-07-04 08:34:05'),
(2, 14, 8, '2017-05-22', 1, '2023-07-04 08:39:22', '2023-07-04 08:39:22'),
(4, 16, 1, '2017-12-24', 1, '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(5, 17, 1, '2017-10-22', 0, '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(6, 18, 1, '2017-07-27', 1, '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(7, 19, 1, '2017-06-26', 0, '2023-07-09 19:56:59', '2023-07-09 19:56:59'),
(8, 20, 1, '2017-07-27', 1, '2023-07-09 19:56:59', '2023-07-09 19:56:59'),
(9, 21, 1, '2017-06-16', 0, '2023-07-09 19:58:04', '2023-07-09 19:58:04'),
(10, 22, 1, '2017-08-07', 1, '2023-07-09 19:58:04', '2023-07-09 19:58:04'),
(11, 23, 1, '2017-10-29', 0, '2023-07-09 19:58:05', '2023-07-09 19:58:05'),
(12, 24, 1, '2017-07-09', 1, '2023-07-09 19:58:05', '2023-07-09 19:58:05'),
(13, 25, 1, '2017-02-15', 1, '2023-07-09 19:58:05', '2023-07-09 19:58:05'),
(14, 26, 2, '2016-09-29', 0, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(15, 27, 2, '2016-09-07', 1, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(16, 28, 2, '2016-03-24', 1, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(17, 29, 2, '2016-10-24', 0, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(18, 30, 2, '2016-11-20', 1, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(19, 31, 2, '2016-03-31', 0, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(20, 32, 2, '2016-05-04', 1, '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(21, 33, 2, '2016-12-16', 0, '2023-07-09 20:03:28', '2023-07-09 20:03:28'),
(22, 35, 5, '2015-08-14', 1, '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(23, 36, 9, '2008-07-31', 0, '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(24, 37, 7, '2012-06-05', 1, '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(25, 38, 8, '2014-11-27', 1, '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(26, 39, 3, '2009-12-01', 1, '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(27, 40, 5, '2013-09-30', 1, '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(28, 41, 8, '2013-09-12', 0, '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(29, 42, 4, '2008-05-08', 1, '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(30, 43, 7, '2011-01-24', 0, '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(31, 44, 5, '2015-04-21', 0, '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(32, 45, 4, '2008-04-18', 1, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(33, 46, 3, '2010-06-15', 1, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(34, 47, 6, '2011-07-16', 1, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(35, 48, 9, '2010-08-17', 1, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(36, 49, 7, '2011-11-25', 1, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(37, 50, 6, '2012-01-29', 0, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(38, 51, 9, '2014-12-01', 0, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(39, 52, 4, '2009-08-27', 1, '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(40, 53, 6, '2012-07-11', 1, '2023-07-09 20:09:47', '2023-07-09 20:09:47'),
(41, 54, 3, '2014-11-14', 0, '2023-07-09 20:09:47', '2023-07-09 20:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Arabic', NULL, NULL),
(2, 'English', NULL, NULL),
(3, 'French', NULL, NULL),
(4, 'Math', NULL, NULL),
(5, 'Science', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$boOzkD09VKMYmN4ACwwsde5GnGKsfK9QEPTwBkwzlkV6LZyY8Mtr2', NULL, 'admin', 'YfMIMzDlDaapqXub2sgtVdvQG4K8WxPL4D0f0Rrv9KLYyY81FxuRFHz0i9fC', NULL, NULL),
(2, 'taghreed halawa', 'taghreed@gmail.com', NULL, '$2y$10$ru1sFND/pH6GTVRxOv/qDupwDiODAxU5y6A22rwAqxWB.BNHzUJL.', '09933333333', 'manager', 'Bc5SMAKvvnWYSlBGGe6ZPGcwxaRFtosjCrzuTImMgXyJnM9mCKHYSbj6BQXN', '2023-07-04 08:16:59', '2023-07-04 08:16:59'),
(3, 'niveen ghneem', 'neven@gmail.com', NULL, '$2y$10$Q3.OL.Zebww0KGOongItRO4NGB1G79MajQVNkAdxLLIq1o/jowQfu', '09933333333', 'manager', NULL, '2023-07-04 08:17:53', '2023-07-04 08:17:53'),
(4, 'amani kamel', 'amani@gmail.com', NULL, '$2y$10$UbTIOBCZML7CYUa1QITz0.7L39CNjXWzzGFbdaVaF1rWN5z7YUNB6', '09933333333', 'manager', NULL, '2023-07-04 08:18:39', '2023-07-04 08:18:39'),
(5, 'ola hijazi', 'ola@gmail.com', NULL, '$2y$10$oZSaTlyOGWJPofS3PGYeYelMxd9BUm5d7hfcnW7d/FnY0FqI9eeNG', '09933333333', 'manager', NULL, '2023-07-04 08:19:19', '2023-07-04 08:19:19'),
(6, 'enas alqadi', 'enas@gmail.com', NULL, '$2y$10$wmn3sx8HT5WhQCn6mr6VPeYXA8OTBVMeMdEVkBh4.j5rVwI4Apuhq', '09933333333', 'manager', NULL, '2023-07-04 08:19:44', '2023-07-04 08:19:44'),
(7, 'tahani zakaria', 'tahani@gmail.com', NULL, '$2y$10$gpji4RLDbFEFuq/66TJN5eNDjS87DqglhZQSBiD6LfU02KIwT/WQO', '09933333333', 'manager', NULL, '2023-07-04 08:20:15', '2023-07-04 08:20:15'),
(8, ' nour aldarwish', 'nour@gmail.com', NULL, '$2y$10$bZekCqJUMG8dGA0iDR/rTuG/WoD6TeTb0/jgc/vzikhiWExODW/KK', '09933333333', 'manager', NULL, '2023-07-04 08:21:05', '2023-07-04 08:21:05'),
(9, 'manar dalati', 'manar@gmail.com', NULL, '$2y$10$qWYnOjampUDhHRCSDRm4i.OZsgpf2jOFf0VBs7pljvMVPbdUZi742', '09933333333', 'manager', NULL, '2023-07-04 08:22:03', '2023-07-04 08:22:03'),
(10, 'yousef', 'yousef@gmail.com', NULL, '$2y$10$S6lvXykoKehF.SCAqQ0kT.qje1TqSe7CEuURQ0ebg/1HZnqGv7dxa', '09933333333', 'manager', NULL, '2023-07-04 08:22:40', '2023-07-04 08:22:40'),
(11, 'amer', 'amer@gmail.com', NULL, '$2y$10$l.MFAG2HEcCq64T79bJW1erDnpoxd6HXFa9jUepc7EuYtp7/J2FAu', '09933333333', 'manager', NULL, '2023-07-04 08:22:57', '2023-07-04 08:22:57'),
(12, 'hassan', 'hasan@gmail.com', NULL, '$2y$10$6g7/Xl5chDv1zFLLjdO2Uu9vBJxY5FM051B0QGlMPnqK4VvfFMgf.', '09933333333', 'manager', NULL, '2023-07-04 08:23:13', '2023-07-04 08:23:13'),
(13, 'seba ghneem', 'seba@gmail.com', NULL, '$2y$10$NXp7W8XVWyplF1Yu8qJk4ea39EEpYeHrrocRDXKqJtMtivRsfSua2', '0933554455', 'user', NULL, '2023-07-04 08:34:04', '2023-07-04 08:34:04'),
(14, 'shaza rahmon', 'shaza@gmail.com', NULL, '$2y$10$XIZkAbQgYyK5IIkbgJvRsuzxmT9BdBkCeQmdIOk/GQSmsc/Ey6qJm', '096655442', 'user', NULL, '2023-07-04 08:39:22', '2023-07-04 08:39:22'),
(16, 'Nannie Schroeder', 'rbrown@example.net', '2023-07-09 19:56:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-925-262-7173', 'user', 'prfBMwipgd', '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(17, 'Candelario Auer', 'name.mitchell@example.net', '2023-07-09 19:56:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1 (619) 344-2675', 'user', 'VO7TzDQUYW', '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(18, 'Cody Weber', 'ebert.kaleigh@example.org', '2023-07-09 19:56:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1.818.670.9069', 'user', 'cslVkETobI', '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(19, 'Riley Breitenberg', 'ukihn@example.net', '2023-07-09 19:56:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-339-886-6980', 'user', 'U2C9jXf18X', '2023-07-09 19:56:58', '2023-07-09 19:56:58'),
(20, 'Susan Zulauf DDS', 'myron.macejkovic@example.net', '2023-07-09 19:56:58', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1-559-764-7248', 'user', '5MAvQCe7fs', '2023-07-09 19:56:59', '2023-07-09 19:56:59'),
(21, 'Jodie Auer', 'runolfsson.kristoffer@example.org', '2023-07-09 19:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '252-678-1346', 'user', 'VmQIruS9is', '2023-07-09 19:58:04', '2023-07-09 19:58:04'),
(22, 'Nellie Walker', 'jermey78@example.org', '2023-07-09 19:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1-248-820-7906', 'user', '1lXYDcFaK0', '2023-07-09 19:58:04', '2023-07-09 19:58:04'),
(23, 'Kiarra Wintheiser', 'astrid09@example.org', '2023-07-09 19:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '+1.848.775.5938', 'user', 'T9GyV1mN4a', '2023-07-09 19:58:04', '2023-07-09 19:58:04'),
(24, 'Courtney Luettgen', 'darrel.terry@example.org', '2023-07-09 19:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '484.221.0412', 'user', 'r5cZsCZYQt', '2023-07-09 19:58:05', '2023-07-09 19:58:05'),
(25, 'Demetrius Konopelski', 'tianna17@example.org', '2023-07-09 19:58:04', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '404-670-3112', 'user', 'ReJ7664Tbp', '2023-07-09 19:58:05', '2023-07-09 19:58:05'),
(26, 'Marcus Johnson', 'jacobi.kyleigh@example.org', '2023-07-09 20:03:27', '123456789', '+1-502-698-9960', 'user', 'ZnfzzItLyK', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(27, 'Dylan Towne DDS', 'camylle76@example.net', '2023-07-09 20:03:27', '123456789', '212.898.3158', 'user', 'DisTMg7jLt', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(28, 'Prof. Isaac Labadie V', 'lonny02@example.com', '2023-07-09 20:03:27', '123456789', '210-734-9884', 'user', 'Jf1niaYfPV', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(29, 'Prof. Moises Reichert III', 'rowe.brant@example.net', '2023-07-09 20:03:27', '123456789', '959.290.4719', 'user', 'd5RWo4SioH', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(30, 'Linwood Kuhlman', 'gretchen97@example.net', '2023-07-09 20:03:27', '123456789', '(463) 720-3514', 'user', 'AYdDIthobn', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(31, 'Prof. Gavin Will III', 'chowe@example.com', '2023-07-09 20:03:27', '123456789', '559.982.1899', 'user', 'RLxOj6fMNo', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(32, 'Hope Kreiger', 'jennifer.mcglynn@example.net', '2023-07-09 20:03:27', '123456789', '1-678-405-9333', 'user', 'G9TNLAxt8J', '2023-07-09 20:03:27', '2023-07-09 20:03:27'),
(33, 'Paxton Hauck', 'marcelino70@example.org', '2023-07-09 20:03:27', '123456789', '+1 (802) 374-0465', 'user', 'XuD6PqKaXC', '2023-07-09 20:03:28', '2023-07-09 20:03:28'),
(34, 'Lurline Schroeder', 'qhickle@example.com', '2023-07-09 20:09:11', '$2y$10$mhay0NY19yoNhO4GJKVP0eEknP15S0QPOrzh9bhtN8DsD6cZwRTAK', '+1-512-324-5742', 'user', 'imroszQH61', '2023-07-09 20:09:15', '2023-07-09 20:09:15'),
(35, 'Dr. Ova Lindgren', 'ustokes@example.net', '2023-07-09 20:09:39', '$2y$10$RLrDmIxSSFoZkVjwgs8lFenIy8mxpDl6Lae8cG6QUFHXVVJMki1Tm', '+1-520-581-2084', 'user', 'AZWcHuT4Xr', '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(36, 'Zoila Orn', 'vrippin@example.net', '2023-07-09 20:09:40', '$2y$10$oVq3oTbzjSBEMo0abCO9w.aSp.YfSM0O5mV/8PRJIUvo3HXQOW5Vm', '(678) 948-4628', 'user', '5FOrLA2LLD', '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(37, 'Hester Mertz PhD', 'icasper@example.net', '2023-07-09 20:09:40', '$2y$10$e0SXMecMbAKftH7zLGCC8ut7WZpyCl4l6JJXTIqgGol6BAXheYlIC', '662.913.5232', 'user', 'XRRnS3Z5i8', '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(38, 'Grayce Block', 'elijah.okuneva@example.com', '2023-07-09 20:09:40', '$2y$10$Xs2KjfYKSNFHl0/Mke4c7uoTXSOTBCU4usiL9p/YQ.EFKaw2pgk0i', '+1-229-876-0081', 'user', 'oETA05yoVr', '2023-07-09 20:09:44', '2023-07-09 20:09:44'),
(39, 'Maci Bogisich PhD', 'mohr.elza@example.net', '2023-07-09 20:09:40', '$2y$10$D8Srjz0mWWcFAF7L7TuLuuBflVJHFbRmobc/HepyT9hoZyXqFbROK', '+1-419-237-0549', 'user', '2jMuTfIJOi', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(40, 'Prof. Marlon Dooley DDS', 'clemmie72@example.org', '2023-07-09 20:09:41', '$2y$10$ULrtWPb94WAqHR3I.l9zNuG8ovFk.et6UH6e6UvkTuclQ7RCsd.xm', '307.658.5768', 'user', 'UHGuJQeC7E', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(41, 'Maurice Fisher', 'frederique.quigley@example.org', '2023-07-09 20:09:41', '$2y$10$CP05FBAo6jhO6Lo4urLy.uVPUnWA8coYDXEjtq.TgPFVET2cPWQ/u', '+1-520-261-4403', 'user', 'ehDfNIomft', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(42, 'Bryce Emmerich', 'kzulauf@example.org', '2023-07-09 20:09:41', '$2y$10$4qNk1Qqyvjl1OeMGlZ0YFO4ufZkB0lu9HfKBWgxOeMFPQa2wxh6x2', '347.474.6457', 'user', 'rJmPjylA4k', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(43, 'Prof. Brandt Jakubowski', 'reagan94@example.net', '2023-07-09 20:09:41', '$2y$10$ggLSw4wzIrHezQiK5.csW.6faibiUUBaAxNlrqwbk1HMsR5/mwapa', '+1 (832) 738-4028', 'user', 'SZAP93uSY1', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(44, 'Mrs. Vesta Schulist', 'mcglynn.ashly@example.com', '2023-07-09 20:09:41', '$2y$10$1VYy9t2.PK8J8N3vkv7NTeqy34h6qpWXqRKVh8qz7qHgvSvy/P9PW', '+1 (931) 481-6999', 'user', 'dkfCRClLPI', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(45, 'Enola Paucek I', 'jacynthe57@example.net', '2023-07-09 20:09:42', '$2y$10$jmjt/dqB.zEh/NsYWhw7Derr6V30KRcJQ9lzi8ZXd23dvrl.T4Wwe', '+15753807390', 'user', 'jbbjxDIWcL', '2023-07-09 20:09:45', '2023-07-09 20:09:45'),
(46, 'Marielle Blanda', 'blick.deontae@example.net', '2023-07-09 20:09:42', '$2y$10$pMVdCCMdad3oA6IQttnmne7vfaXcVexk3QmjQrB3g.vp9tCFeFGpW', '+17549371748', 'user', 'Ee35UiSEip', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(47, 'Dr. Foster Bode', 'konopelski.nettie@example.org', '2023-07-09 20:09:42', '$2y$10$oVbUHsNG46cs7DaT/dBLfewvieQcbipLOFXOCTQ9RqsJlv09SHPYa', '626.248.9494', 'user', 'gbPXPoBVrT', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(48, 'Destiney Bogan I', 'quigley.elta@example.com', '2023-07-09 20:09:42', '$2y$10$PAu7BqO85uToYmX5XRi5g.WzDyf8/A.IgLaJL66f97Vuo8QWGMd1i', '+1 (435) 538-3792', 'user', 'Gnb376TfxL', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(49, 'Jaron Anderson', 'hilda41@example.org', '2023-07-09 20:09:42', '$2y$10$bP4uIo23h1DKKVj05NrdYuJgGNzMFkSOMA9FOF1PDDWoPHz3h.YxC', '380.308.2367', 'user', '2OzAhZV2dD', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(50, 'Freida Davis III', 'bins.gerhard@example.org', '2023-07-09 20:09:43', '$2y$10$23Mspu40aDcrOofikiuRl.0c0RjogH.7WEvdYOr1KVSymIBX9gw/u', '+1-458-722-2693', 'user', 'f4HVPDEyBd', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(51, 'Lupe Labadie', 'vcollins@example.net', '2023-07-09 20:09:43', '$2y$10$icRTebUqZ7JfMa.hns4zzO3YMF01LWlXo1hdaSfKOVLaIKTAjYkw.', '1-240-982-7643', 'user', 'Rj947wKLsl', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(52, 'Kaden Johns', 'jules23@example.com', '2023-07-09 20:09:43', '$2y$10$VYSNYVTUSKrqt/Cbn0BjLu/dWaDLNRcTIqRop4.QFFwyt0QqohIgm', '+1 (570) 341-3173', 'user', 'G6biTdnDqkXqvOywHT11pF0qZMkRpQjBsD7uLSKM9hESJYm1jrSmDAnJL3HY', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(53, 'Stefan Hermann', 'jimmy23@example.net', '2023-07-09 20:09:43', '$2y$10$0OrbIuPBsISiEc6VP9qWf.bljmr93fAebD.i5D16kSziS5zuU86b.', '+1-309-827-4320', 'user', 'm10iqVhmRT', '2023-07-09 20:09:46', '2023-07-09 20:09:46'),
(54, 'Eldora Kilback', 'kgoldner@example.com', '2023-07-09 20:09:43', '$2y$10$5LO9hK7vCYoejQY00bYfY.jPK7z47TaY6E0xBooRrzNHj5qEO4T1q', '+1 (563) 945-7159', 'user', 'UM7rJMmm8IatVodQ1qQnf18NYguCg4g777i73pgVYrsNlyHeOceoVFOlLdUG', '2023-07-09 20:09:47', '2023-07-09 20:09:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classses`
--
ALTER TABLE `classses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class__teachers`
--
ALTER TABLE `class__teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class__teachers_class_id_foreign` (`class_id`),
  ADD KEY `class__teachers_user_id_foreign` (`user_id`),
  ADD KEY `class__teachers_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_quiz_id_foreign` (`quiz_id`),
  ADD KEY `marks_student_id_foreign` (`student_id`);

--
-- Indexes for table `mark_quizzes`
--
ALTER TABLE `mark_quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mark_quizzes_quiz_id_foreign` (`quiz_id`),
  ADD KEY `mark_quizzes_student_id_foreign` (`student_id`),
  ADD KEY `mark_quizzes_question_id_foreign` (`question_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_class_teacher_id_foreign` (`class_teacher_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_class_teacher_id_foreign` (`class_teacher_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `classses`
--
ALTER TABLE `classses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `class__teachers`
--
ALTER TABLE `class__teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mark_quizzes`
--
ALTER TABLE `mark_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class__teachers`
--
ALTER TABLE `class__teachers`
  ADD CONSTRAINT `class__teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classses` (`id`),
  ADD CONSTRAINT `class__teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `class__teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `mark_quizzes`
--
ALTER TABLE `mark_quizzes`
  ADD CONSTRAINT `mark_quizzes_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_quizzes_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mark_quizzes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_class_teacher_id_foreign` FOREIGN KEY (`class_teacher_id`) REFERENCES `class__teachers` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_class_teacher_id_foreign` FOREIGN KEY (`class_teacher_id`) REFERENCES `class__teachers` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classses` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
