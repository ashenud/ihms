-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.1.101
-- Generation Time: Nov 22, 2020 at 08:27 PM
-- Server version: 10.4.15-MariaDB-1:10.4.15+maria~bionic-log
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihms`
--

-- --------------------------------------------------------

--
-- Table structure for table `babies`
--

CREATE TABLE `babies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baby_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baby_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baby_dob` date NOT NULL,
  `baby_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` date NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_age` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `babies`
--

INSERT INTO `babies` (`id`, `baby_id`, `baby_first_name`, `baby_last_name`, `baby_dob`, `baby_gender`, `register_date`, `midwife_id`, `mother_nic`, `mother_age`, `status`, `created_at`, `updated_at`) VALUES
(1, '001/01/2020/1000', 'Ama', 'Charuni', '2020-01-03', 'F', '2020-08-12', 'midwife1', '920000000', 27, 1, NULL, NULL),
(2, '001/02/2018/1000', 'Hasitha', 'Bhagya', '2018-02-02', 'M', '2020-08-11', 'midwife1', '920000000', 25, 1, NULL, NULL),
(3, '001/02/2020/1000', 'Samith', 'Chandula', '2020-02-06', 'M', '2020-08-12', 'midwife1', '950000000', 25, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `birth_details`
--

CREATE TABLE `birth_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_weight` double(8,2) NOT NULL,
  `birth_length` double(8,2) NOT NULL,
  `health_states` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apgar1` tinyint(4) NOT NULL,
  `apgar2` tinyint(4) NOT NULL,
  `apgar3` tinyint(4) NOT NULL,
  `circumference_of_head` double(8,2) NOT NULL,
  `vitamin_K_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eye_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `milk_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `birth_details`
--

INSERT INTO `birth_details` (`id`, `baby_id`, `midwife_id`, `birth_weight`, `birth_length`, `health_states`, `apgar1`, `apgar2`, `apgar3`, `circumference_of_head`, `vitamin_K_status`, `eye_contact`, `milk_position`, `created_at`, `updated_at`) VALUES
(1, '001/02/2018/1000', 'midwife1', 4.00, 50.00, 'Good', 1, 2, 1, 28.00, 'Yes', 'Normal', 'Cradle position', NULL, NULL),
(2, '001/01/2020/1000', 'midwife1', 2.20, 50.00, 'Good', 2, 1, 1, 24.00, 'Yes', 'Good', 'Cross-cradle position', NULL, NULL),
(3, '001/02/2020/1000', 'midwife1', 5.50, 45.00, 'Good', 0, 2, 0, 25.00, 'No', 'Good', 'Cradle position', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gn_division` int(11) DEFAULT NULL,
  `moh_division` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `doctor_name`, `gn_division`, `moh_division`, `status`, `created_at`, `updated_at`) VALUES
(1, 'doctor1', 'Dinsh Madushan', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_messages`
--

CREATE TABLE `doctor_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` int(11) NOT NULL DEFAULT 1 COMMENT '1-unread, 0-read',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active, 0-delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `growths`
--

CREATE TABLE `growths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `height` double(8,2) NOT NULL,
  `baby_age_in_months` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `growths`
--

INSERT INTO `growths` (`id`, `baby_id`, `midwife_id`, `weight`, `height`, `baby_age_in_months`, `date`, `created_at`, `updated_at`) VALUES
(1, '001/02/2018/1000', 'midwife1', 4.00, 50.00, 0, '2018-02-01 16:04:51', NULL, NULL),
(2, '001/02/2018/1000', 'midwife1', 4.30, 52.00, 1, '2018-03-06 16:17:37', NULL, NULL),
(3, '001/02/2018/1000', 'midwife1', 4.70, 56.00, 2, '2018-04-11 16:17:56', NULL, NULL),
(4, '001/02/2018/1000', 'midwife1', 5.80, 62.80, 3, '2018-05-10 16:28:09', NULL, NULL),
(5, '001/02/2018/1000', 'midwife1', 6.90, 64.00, 4, '2018-06-05 16:28:14', NULL, NULL),
(6, '001/02/2018/1000', 'midwife1', 8.10, 65.00, 5, '2018-07-09 16:28:18', NULL, NULL),
(7, '001/02/2018/1000', 'midwife1', 8.90, 67.00, 6, '2018-08-01 16:28:22', NULL, NULL),
(8, '001/02/2018/1000', 'midwife1', 9.50, 68.90, 7, '2018-09-11 16:28:28', NULL, NULL),
(9, '001/02/2018/1000', 'midwife1', 10.00, 70.00, 8, '2018-09-01 16:28:32', NULL, NULL),
(10, '001/02/2018/1000', 'midwife1', 9.80, 72.00, 9, '2018-10-04 16:28:36', NULL, NULL),
(11, '001/02/2018/1000', 'midwife1', 9.60, 73.10, 10, '2018-11-02 16:28:39', NULL, NULL),
(12, '001/02/2018/1000', 'midwife1', 10.40, 74.00, 11, '2018-12-07 16:28:44', NULL, NULL),
(13, '001/02/2018/1000', 'midwife1', 10.10, 75.00, 12, '2019-01-04 16:28:50', NULL, NULL),
(14, '001/02/2018/1000', 'midwife1', 10.30, 77.20, 13, '2019-02-11 16:28:56', NULL, NULL),
(15, '001/02/2018/1000', 'midwife1', 10.60, 78.00, 14, '2019-03-06 16:42:42', NULL, NULL),
(16, '001/02/2018/1000', 'midwife1', 11.10, 79.00, 15, '2019-04-11 16:29:27', NULL, NULL),
(17, '001/02/2018/1000', 'midwife1', 11.70, 80.10, 16, '2019-05-07 16:29:44', NULL, NULL),
(18, '001/02/2018/1000', 'midwife1', 12.30, 82.00, 17, '2019-06-03 16:29:13', NULL, NULL),
(19, '001/02/2018/1000', 'midwife1', 12.30, 82.90, 18, '2019-07-10 16:30:57', NULL, NULL),
(20, '001/02/2018/1000', 'midwife1', 12.80, 83.20, 19, '2019-08-11 16:31:43', NULL, NULL),
(21, '001/02/2018/1000', 'midwife1', 12.40, 84.00, 20, '2019-09-09 16:31:59', NULL, NULL),
(22, '001/02/2018/1000', 'midwife1', 12.20, 85.10, 21, '2019-10-05 16:32:44', NULL, NULL),
(23, '001/02/2018/1000', 'midwife1', 12.30, 86.30, 22, '2019-11-03 16:33:00', NULL, NULL),
(24, '001/02/2018/1000', 'midwife1', 12.50, 87.00, 23, '2019-12-07 16:34:14', NULL, NULL),
(25, '001/02/2018/1000', 'midwife1', 12.20, 88.40, 24, '2020-01-03 16:34:35', NULL, NULL),
(26, '001/02/2018/1000', 'midwife1', 12.60, 89.50, 25, '2020-02-04 16:47:08', NULL, NULL),
(27, '001/02/2018/1000', 'midwife1', 12.50, 90.20, 26, '2020-03-04 16:55:13', NULL, NULL),
(28, '001/02/2018/1000', 'midwife1', 12.80, 91.00, 27, '2020-04-13 16:55:21', NULL, NULL),
(29, '001/02/2018/1000', 'midwife1', 13.30, 92.50, 28, '2020-05-06 16:49:14', NULL, NULL),
(30, '001/02/2018/1000', 'midwife1', 13.70, 93.00, 29, '2020-06-08 16:52:27', NULL, NULL),
(31, '001/02/2018/1000', 'midwife1', 13.90, 93.70, 30, '2020-07-17 16:52:43', NULL, NULL),
(32, '001/02/2018/1000', 'midwife1', 14.30, 94.20, 31, '2020-08-01 16:52:58', NULL, NULL),
(33, '001/01/2020/1000', 'midwife1', 2.20, 50.00, 0, '2020-01-04 17:47:00', NULL, NULL),
(34, '001/01/2020/1000', 'midwife1', 2.60, 52.00, 1, '2020-02-02 17:47:45', NULL, NULL),
(35, '001/01/2020/1000', 'midwife1', 3.20, 53.50, 2, '2020-03-02 17:48:21', NULL, NULL),
(36, '001/01/2020/1000', 'midwife1', 3.90, 54.00, 3, '2020-04-11 17:48:57', NULL, NULL),
(37, '001/01/2020/1000', 'midwife1', 5.00, 58.00, 4, '2020-05-07 17:49:20', NULL, NULL),
(38, '001/01/2020/1000', 'midwife1', 4.80, 62.00, 5, '2020-06-08 17:49:49', NULL, NULL),
(39, '001/01/2020/1000', 'midwife1', 5.70, 63.50, 6, '2020-07-06 17:50:24', NULL, NULL),
(40, '001/01/2020/1000', 'midwife1', 6.40, 65.00, 7, '2020-08-11 17:53:46', NULL, NULL),
(41, '001/02/2020/1000', 'midwife1', 5.50, 45.00, 0, '2020-01-31 18:33:03', NULL, NULL),
(42, '001/02/2020/1000', 'midwife1', 6.10, 46.50, 1, '2020-03-03 18:40:13', NULL, NULL),
(43, '001/02/2020/1000', 'midwife1', 6.90, 48.00, 2, '2020-04-07 18:36:26', NULL, NULL),
(44, '001/02/2020/1000', 'midwife1', 7.80, 50.00, 3, '2020-05-02 18:36:41', NULL, NULL),
(45, '001/02/2020/1000', 'midwife1', 9.20, 51.00, 4, '2020-06-01 18:36:56', NULL, NULL),
(46, '001/02/2020/1000', 'midwife1', 10.10, 52.50, 5, '2020-06-30 18:37:54', NULL, NULL),
(47, '001/02/2020/1000', 'midwife1', 11.50, 55.00, 6, '2020-08-03 18:39:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `midwife_messages`
--

CREATE TABLE `midwife_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `read_status` int(11) NOT NULL DEFAULT 1 COMMENT '1-unread, 0-read',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-active, 0-delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `midwives`
--

CREATE TABLE `midwives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gn_division` int(11) DEFAULT NULL,
  `moh_division` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `midwives`
--

INSERT INTO `midwives` (`id`, `midwife_id`, `midwife_name`, `gn_division`, `moh_division`, `status`, `created_at`, `updated_at`) VALUES
(1, 'midwife1', 'Aruni Siriwardhana', 1, 1, 1, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_11_154123_create_doctors_table', 1),
(5, '2020_10_11_180541_create_sisters_table', 1),
(6, '2020_10_12_140203_create_babies_table', 1),
(7, '2020_10_12_141632_create_mothers_table', 1),
(8, '2020_10_12_142926_create_midwives_table', 1),
(9, '2020_10_13_143100_create_birth_details_table', 1),
(10, '2020_10_13_144102_create_growths_table', 1),
(11, '2020_10_14_171904_create_doctor_messages_table', 1),
(12, '2020_10_14_174101_create_midwife_messages_table', 1),
(13, '2020_10_15_185953_create_vaccine_dates_table', 1),
(14, '2020_10_15_195207_create_vacc2_months_table', 1),
(15, '2020_10_15_200138_create_vacc_births_table', 1),
(16, '2020_10_15_200213_create_vacc4_months_table', 1),
(17, '2020_10_15_200234_create_vacc6_months_table', 1),
(18, '2020_10_15_200248_create_vacc12_months_table', 1),
(19, '2020_10_15_200309_create_vacc18_months_table', 1),
(20, '2020_10_15_200418_create_vacc10_years_table', 1),
(21, '2020_10_15_200512_create_vacc5_years_table', 1),
(22, '2020_10_15_201221_create_vacc_others_table', 1),
(23, '2020_10_16_180920_create_vacc9_months_table', 1),
(24, '2020_10_16_181355_create_vacc3_years_table', 1),
(25, '2020_10_16_181624_create_vacc11_years_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mothers`
--

CREATE TABLE `mothers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mother_nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gn_division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moh_division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mothers`
--

INSERT INTO `mothers` (`id`, `mother_nic`, `mother_name`, `midwife_id`, `address`, `telephone`, `email`, `gn_division`, `moh_division`, `status`, `created_at`, `updated_at`) VALUES
(1, '920000000', 'Dilsha Udani', 'midwife1', 'Koulwewa, Narammala', '0700000000', 'priyasad994@gmail.com', '1', '1', 1, NULL, NULL),
(2, '950000000', 'Chandi Rupasinha', 'midwife1', 'Uhumiya, Narammala', '0710000000', 'mother2@ihms.com', '1', '1', 1, NULL, NULL);

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
-- Table structure for table `sisters`
--

CREATE TABLE `sisters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sister_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sister_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gn_division` int(11) DEFAULT NULL,
  `moh_division` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sisters`
--

INSERT INTO `sisters` (`id`, `sister_id`, `sister_name`, `gn_division`, `moh_division`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sister1', 'Dilini Lakmali', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `role`, `role_id`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '920000000', 'mother', 4, 'mother1@ihms.com', NULL, '$2y$12$soJwqhpkBK7UhZyboDTx9eEkho3qn0lL2VFscXRCoaM8K3HHMEhTa', 1, NULL, NULL, NULL),
(2, '950000000', 'mother', 4, 'mother2@ihms.com', NULL, '$2y$12$soJwqhpkBK7UhZyboDTx9eEkho3qn0lL2VFscXRCoaM8K3HHMEhTa', 1, NULL, NULL, NULL),
(3, 'admin1', 'admin', 5, 'admin@admin.com', NULL, '$2y$12$soJwqhpkBK7UhZyboDTx9eEkho3qn0lL2VFscXRCoaM8K3HHMEhTa', 1, NULL, NULL, NULL),
(4, 'doctor1', 'doctor', 1, 'doctor@ihms.com', NULL, '$2y$12$soJwqhpkBK7UhZyboDTx9eEkho3qn0lL2VFscXRCoaM8K3HHMEhTa', 1, NULL, NULL, NULL),
(5, 'midwife1', 'midwife', 3, 'midwife1@ihms.com', NULL, '$2y$12$soJwqhpkBK7UhZyboDTx9eEkho3qn0lL2VFscXRCoaM8K3HHMEhTa', 1, NULL, NULL, NULL),
(6, 'sister1', 'sister', 2, 'sister1@ihms.com', NULL, '$2y$12$soJwqhpkBK7UhZyboDTx9eEkho3qn0lL2VFscXRCoaM8K3HHMEhTa', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacc2_months`
--

CREATE TABLE `vacc2_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc3_years`
--

CREATE TABLE `vacc3_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc4_months`
--

CREATE TABLE `vacc4_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc5_years`
--

CREATE TABLE `vacc5_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc6_months`
--

CREATE TABLE `vacc6_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc9_months`
--

CREATE TABLE `vacc9_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc10_years`
--

CREATE TABLE `vacc10_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc11_years`
--

CREATE TABLE `vacc11_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc12_months`
--

CREATE TABLE `vacc12_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vacc18_months`
--

CREATE TABLE `vacc18_months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_dates`
--

CREATE TABLE `vaccine_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giving_date` date NOT NULL,
  `approvel_status` int(11) NOT NULL DEFAULT 0 COMMENT '1-approved, 0-not approved',
  `given_status` int(11) NOT NULL DEFAULT 0 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccine_dates`
--

INSERT INTO `vaccine_dates` (`id`, `baby_id`, `midwife_id`, `vac_id`, `vac_name`, `giving_date`, `approvel_status`, `given_status`, `created_at`, `updated_at`) VALUES
(1, '001/02/2018/1000', 'midwife1', 3, 'Pentavalent-1', '2018-08-12', 0, 0, NULL, NULL),
(2, '001/02/2018/1000', 'midwife1', 4, 'OPV-1', '2018-08-14', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacc_births`
--

CREATE TABLE `vacc_births` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scar` int(11) NOT NULL DEFAULT 0 COMMENT '1-yes, 0-no',
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacc_births`
--

INSERT INTO `vacc_births` (`id`, `baby_id`, `midwife_id`, `approved_doctor_id`, `vac_id`, `vac_name`, `date_given`, `batch_no`, `scar`, `side_effects`, `status`, `created_at`, `updated_at`) VALUES
(1, '001/02/2018/1000', 'midwife1', NULL, 1, 'BCG-1', '2018-02-02', 'EMZ1245', 0, NULL, 1, NULL, NULL),
(2, '001/01/2020/1000', 'midwife1', NULL, 1, 'BCG-1', '2020-01-04', 'EMZ1245', 0, NULL, 1, NULL, NULL),
(3, '001/01/2020/1000', 'midwife1', 'doctor1', 2, 'BCG-2', NULL, NULL, 0, NULL, 0, NULL, NULL),
(4, '001/02/2020/1000', 'midwife1', NULL, 1, 'BCG-1', '2020-02-06', 'EMZ1248', 0, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vacc_others`
--

CREATE TABLE `vacc_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `baby_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `midwife_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vac_id` int(11) NOT NULL,
  `vac_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_given` date DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side_effects` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1-given, 0-not given',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `babies`
--
ALTER TABLE `babies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `babies_baby_id_unique` (`baby_id`);

--
-- Indexes for table `birth_details`
--
ALTER TABLE `birth_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_doctor_id_unique` (`doctor_id`);

--
-- Indexes for table `doctor_messages`
--
ALTER TABLE `doctor_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `growths`
--
ALTER TABLE `growths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midwife_messages`
--
ALTER TABLE `midwife_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midwives`
--
ALTER TABLE `midwives`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `midwives_midwife_id_unique` (`midwife_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mothers`
--
ALTER TABLE `mothers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sisters`
--
ALTER TABLE `sisters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sisters_sister_id_unique` (`sister_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vacc2_months`
--
ALTER TABLE `vacc2_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc3_years`
--
ALTER TABLE `vacc3_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc4_months`
--
ALTER TABLE `vacc4_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc5_years`
--
ALTER TABLE `vacc5_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc6_months`
--
ALTER TABLE `vacc6_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc9_months`
--
ALTER TABLE `vacc9_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc10_years`
--
ALTER TABLE `vacc10_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc11_years`
--
ALTER TABLE `vacc11_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc12_months`
--
ALTER TABLE `vacc12_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc18_months`
--
ALTER TABLE `vacc18_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine_dates`
--
ALTER TABLE `vaccine_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc_births`
--
ALTER TABLE `vacc_births`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacc_others`
--
ALTER TABLE `vacc_others`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babies`
--
ALTER TABLE `babies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `birth_details`
--
ALTER TABLE `birth_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_messages`
--
ALTER TABLE `doctor_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `growths`
--
ALTER TABLE `growths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `midwife_messages`
--
ALTER TABLE `midwife_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `midwives`
--
ALTER TABLE `midwives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mothers`
--
ALTER TABLE `mothers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sisters`
--
ALTER TABLE `sisters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vacc2_months`
--
ALTER TABLE `vacc2_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc3_years`
--
ALTER TABLE `vacc3_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc4_months`
--
ALTER TABLE `vacc4_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc5_years`
--
ALTER TABLE `vacc5_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc6_months`
--
ALTER TABLE `vacc6_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc9_months`
--
ALTER TABLE `vacc9_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc10_years`
--
ALTER TABLE `vacc10_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc11_years`
--
ALTER TABLE `vacc11_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc12_months`
--
ALTER TABLE `vacc12_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacc18_months`
--
ALTER TABLE `vacc18_months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccine_dates`
--
ALTER TABLE `vaccine_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vacc_births`
--
ALTER TABLE `vacc_births`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacc_others`
--
ALTER TABLE `vacc_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
