-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 12:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loanbay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `profile_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super_user` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `profile_image`, `password`, `is_super_user`, `remember_token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Amit', 'Chaurasia', 'amitc@technople.in', 7878787878, 'http://localhost:8000/storage/Amit1547706783.jpeg', '$2y$10$S.klfIpt0jczEE3XOXMJp.3ZWF0sJ1vgFGfAe39PZ3knDf0Zj7lCy', 1, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Amit', 'Prajapati', 'paraguser2', 7878787878, 'http://localhost:8000/storage/Amit1547706237.jpeg', '$2y$10$.NGnc4QhdnJcr8D3ymJ1V.WRL0s5z1LSP8fyg72Qj7BM7hLKqCNsq', 1, NULL, 1, '2019-01-17 06:19:00', '2019-01-17 06:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_list`
--

CREATE TABLE `contact_us_list` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_list`
--

INSERT INTO `contact_us_list` (`id`, `subject`, `contact_no`, `message`, `is_active`, `created_at`, `updated_at`, `full_name`, `email`) VALUES
(1, NULL, NULL, 'sa', 1, '2019-02-10 08:22:01', '2019-02-10 08:22:01', 'sdd', 'sachin@technople.in'),
(2, NULL, NULL, 'kk', 1, '2019-02-10 08:24:12', '2019-02-10 08:24:12', 'Amit', 'amitc@technople.in'),
(3, NULL, NULL, 'll', 1, '2019-02-10 08:24:54', '2019-02-10 08:24:54', 'G', 'gg@gg.ll'),
(4, NULL, NULL, 'ii', 1, '2019-02-10 08:26:00', '2019-02-10 08:26:00', 'ram', 'ram@technople.in'),
(5, 'Contact Us', NULL, 'hi', 1, '2019-02-10 08:45:53', '2019-02-10 08:45:53', 'aditya', 'aditya@technople.in'),
(6, 'Adi', 787878, 'Adi', 1, '2019-02-10 08:46:44', '2019-02-10 08:46:44', 'Adi', 'adi@technople.in'),
(7, 'sha', 474, 'ssha', 1, '2019-02-10 08:49:38', '2019-02-10 08:49:38', 'sha', 'sha@technople.in'),
(8, 'Test', 7474747417, 'Test', 1, '2019-02-10 09:00:39', '2019-02-10 09:00:39', 'test', 'test@test.com'),
(9, 'test2', 7888888, 'test2', 1, '2019-02-10 09:02:45', '2019-02-10 09:02:45', 'test2', 'test2@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `cpiui`
--

CREATE TABLE `cpiui` (
  `id` int(11) NOT NULL,
  `cpt_id` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `featuredimage` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpiui`
--

INSERT INTO `cpiui` (`id`, `cpt_id`, `parent`, `title`, `description`, `attribute`, `slug`, `is_active`, `created_at`, `updated_at`, `featuredimage`) VALUES
(9, 1, NULL, 'Advisory Business', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'advisory-business', 1, '2019-02-09 06:56:02', '2019-02-09 06:56:02', 'http://localhost:8000/storage/Advisory Business1549689922.jpeg'),
(10, 1, NULL, 'Retail Loans', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'retail-loans', 1, '2019-02-09 06:56:56', '2019-02-09 06:56:56', 'http://localhost:8000/storage/Retail Loans1549689986.jpeg'),
(11, 1, NULL, 'Wealth Management', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'wealth-management', 1, '2019-02-09 06:56:21', '2019-02-09 06:56:21', 'http://localhost:8000/storage/Wealth Management1549690008.jpeg'),
(12, 1, NULL, 'Bulk Loans', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'bulk-loans', 1, '2019-02-09 06:55:19', '2019-02-09 06:55:19', 'http://localhost:8000/storage/Bulk Loans1549690055.jpeg'),
(13, 2, NULL, 'Client 1', '<p>Client 1</p>', 'null', 'client-1', 1, '2019-02-09 07:28:22', '2019-02-09 07:28:22', 'http://localhost:8000/storage/Client 11549697302.png'),
(14, 2, NULL, 'Client 2', '<p>Client 2</p>', 'null', 'client-2', 1, '2019-02-09 07:28:43', '2019-02-09 07:28:43', 'http://localhost:8000/storage/Client 21549697323.png'),
(15, 2, NULL, 'Client 3', '<p>Client 3</p>', 'null', 'client-3', 1, '2019-02-09 07:28:58', '2019-02-09 07:28:58', 'http://localhost:8000/storage/Client 31549697338.png'),
(16, 2, NULL, 'Client 4', '<p>Client 4</p>', 'null', 'client-4', 1, '2019-02-09 07:29:16', '2019-02-09 07:29:16', 'http://localhost:8000/storage/Client 41549697356.png'),
(17, 2, NULL, 'Client 5', '<p>Client 5</p>', 'null', 'client-5', 1, '2019-02-09 07:29:33', '2019-02-09 07:29:33', 'http://localhost:8000/storage/Client 51549697373.png'),
(18, 2, NULL, 'Client 6', '<p>Client 6</p>', 'null', 'client-6', 1, '2019-02-09 07:30:31', '2019-02-09 07:30:31', 'http://localhost:8000/storage/Client 61549697431.png'),
(19, 1, 12, 'Structured Finance', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'structured-finance', 1, '2019-02-09 09:47:10', '2019-02-09 09:47:10', 'http://localhost:8000/storage/Structured Finance1549702727.jpeg'),
(20, 1, 12, 'Term Loans', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'term-loans', 1, '2019-02-09 09:46:10', '2019-02-09 09:46:10', 'http://localhost:8000/storage/Term Loans1549702752.jpeg'),
(21, 1, 12, 'Project Finance', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'project-finance', 1, '2019-02-09 09:45:18', '2019-02-09 09:45:18', 'http://localhost:8000/storage/Project Finance1549702784.jpeg'),
(22, 1, 12, 'Business Loans', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'business-loans', 1, '2019-02-09 09:45:32', '2019-02-09 09:45:32', 'http://localhost:8000/storage/Business Loans1549702815.jpeg'),
(23, 1, 12, 'SMES Loans', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'smes-loans', 1, '2019-02-09 09:45:51', '2019-02-09 09:45:51', 'http://localhost:8000/storage/SMES Loans1549702844.jpeg'),
(24, 1, 12, 'Working Finance', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'working-finance', 1, '2019-02-09 09:47:44', '2019-02-09 09:47:44', 'http://localhost:8000/storage/Working Finance1549702870.jpeg'),
(25, 1, 12, 'Venture Capital', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'venture-capital', 1, '2019-02-09 09:46:31', '2019-02-09 09:46:31', 'http://localhost:8000/storage/Venture Capital1549702910.jpeg'),
(26, 1, 12, 'Private Equity', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>', 'null', 'private-equity', 1, '2019-02-09 09:44:59', '2019-02-09 09:44:59', 'http://localhost:8000/storage/Private Equity1549702941.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cpt`
--

CREATE TABLE `cpt` (
  `id` int(11) NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `attribute` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpt`
--

INSERT INTO `cpt` (`id`, `title`, `slug`, `is_active`, `created_at`, `updated_at`, `attribute`) VALUES
(1, 'Services', 'services', 1, '2019-02-09 05:24:35', '2019-02-09 05:24:35', '[]'),
(2, 'Partners', 'partners', 1, '2019-02-09 05:28:37', '2019-02-09 05:28:37', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `cptui_document_answer`
--

CREATE TABLE `cptui_document_answer` (
  `id` int(11) NOT NULL,
  `cptui_id` int(11) DEFAULT NULL,
  `questionaries_id` int(11) DEFAULT NULL,
  `document_url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cptui_document_link`
--

CREATE TABLE `cptui_document_link` (
  `id` int(11) NOT NULL,
  `cptui_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `type` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cptui_document_link`
--

INSERT INTO `cptui_document_link` (`id`, `cptui_id`, `document_id`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(17, 7, 1, '1', 1, '2019-01-28 07:24:37', '2019-01-28 07:24:37'),
(18, 8, 1, '1', 1, '2019-01-28 07:28:00', '2019-01-28 07:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `cptui_questionaries_answer`
--

CREATE TABLE `cptui_questionaries_answer` (
  `id` int(11) NOT NULL,
  `cptui_id` int(11) DEFAULT NULL,
  `questionaries_id` int(11) DEFAULT NULL,
  `questionaries_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cptui_questionaries_link`
--

CREATE TABLE `cptui_questionaries_link` (
  `id` int(11) NOT NULL,
  `cptui_id` int(11) DEFAULT NULL,
  `questionaries_id` int(11) DEFAULT NULL,
  `type` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cptui_questionaries_link`
--

INSERT INTO `cptui_questionaries_link` (`id`, `cptui_id`, `questionaries_id`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(19, 7, 2, '1', 1, '2019-01-28 07:24:37', '2019-01-28 07:24:37'),
(22, 8, 2, '1', 1, '2019-01-28 07:28:00', '2019-01-28 07:28:00'),
(23, 8, 1, '1', 1, '2019-01-28 07:28:00', '2019-01-28 07:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_banner`
--

CREATE TABLE `dashboard_banner` (
  `id` int(11) NOT NULL,
  `short_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `id` int(11) NOT NULL,
  `type` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_mandatory` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`id`, `type`, `is_active`, `created_at`, `updated_at`, `is_mandatory`) VALUES
(1, 'aadhar card', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 'hello', 1, '2019-01-24 05:22:24', '2019-01-24 05:22:24', '1'),
(3, 'driving license', 1, '2019-01-24 05:44:32', '2019-01-24 05:44:32', '0'),
(4, 'Lease Agreement', 1, '2019-01-24 05:45:37', '2019-01-24 05:45:37', '1'),
(5, 'bank pass book', 1, '2019-01-24 05:50:35', '2019-01-24 05:50:35', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_device_id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_users_device`
--

CREATE TABLE `notifications_users_device` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` longtext COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` longtext COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attributes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `meta_key`, `meta_title`, `meta_description`, `content`, `attributes`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'home', 'home', 'home', 'home', 'home', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Services', 'services', 'service', 'service', 'service', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'service', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'How it works', 'how-it-works', 'how-it-works', 'how-it-works', 'how-it-works', 'how-it-works', 'how-it-works', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Company', 'company', 'company', 'company', 'company', 'company', 'company', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Other Loans', 'other-loans', 'other-loans', 'other-loans', 'other-loans', 'other-loans', 'other-loans', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Contact Page', 'contact', 'contact', 'contact', 'contact', 'contct', 'contact', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'About Us', 'about-us', 'about-meta', 'about-title', 'about-desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'About Us Attrb', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questionaries`
--

CREATE TABLE `questionaries` (
  `id` int(11) NOT NULL,
  `question_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` longtext COLLATE utf8mb4_unicode_ci,
  `type` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `sequence` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_mandatory` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionaries`
--

INSERT INTO `questionaries` (`id`, `question_text`, `short_text`, `type`, `options`, `sequence`, `is_active`, `created_at`, `updated_at`, `parent`, `is_mandatory`) VALUES
(1, 'question text', 'short text', 'text', '', '1', 1, '0000-00-00 00:00:00', '2019-01-22 09:58:39', 1, '1'),
(2, 'sadsad', NULL, 'dropdown', '[\"1\",\"2\",\"3\"]', NULL, 1, '2019-01-22 09:07:29', '2019-01-22 09:07:29', NULL, '1'),
(3, 'ss', NULL, 'dropdown', '[\"1\",\"2\",\"3\"]', NULL, 1, '2019-01-22 10:00:28', '2019-01-22 10:00:56', NULL, '0'),
(4, 'hello world uu', NULL, 'dropdown', '5,6,7,8,9', NULL, 1, '2019-01-22 10:29:17', '2019-01-22 10:50:29', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `permission`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'admin', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'user', '{\"0\":\"sub-admin.index\",\"1\":\"sub-admin.create\",\"2\":\"sub-admin.show\"}', 1, '2019-01-22 10:57:55', '2019-01-22 10:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_role` int(11) DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` bigint(20) DEFAULT NULL,
  `location` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `aadhar_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `first_name`, `last_name`, `email`, `profile_image`, `contact_number`, `location`, `is_active`, `password`, `remember_token`, `created_at`, `updated_at`, `aadhar_no`, `pan_no`, `address`, `state`) VALUES
(2, NULL, 'Yogendra', 'BT', 'amitcw@technople.in', NULL, 7878787878, 'Mumbai', 1, '$2y$10$D9A.yYAo40RCaT2Wi1hzQOArUk6vJ8K3MDo1sDJFxvVsxtCTdIiza', NULL, '2019-01-21 09:24:30', NULL, 'aadhar', 'PAN', 'Address', 'state'),
(4, NULL, 'Yogendra', 'B', 'amitce@technople.in', 'http://localhost:8000/storage/Yogendra1548062840.jpeg', 7878787878, 'Mumbai', 1, '$2y$10$qm3APS4CECTeqGHCrRnhW.oMy2YVxNrPVn03ivYi7/VWD2NIhGC.y', NULL, '2019-01-21 09:27:20', NULL, 'aadhar', 'dd', 'dd', 'dd'),
(5, NULL, 'Amit', 'Chaurasia', 'amitc588@gmail.com', 'http://localhost:8000/storage/Amit1548067091.jpeg', 8585858585, 'vasai', 1, '$2y$12$WCVBklsuJVc8WYPpHektS.s4QD4r12fjtzGO2AtJWeR5M3ah42IyK', NULL, '2019-01-21 10:38:11', NULL, 'aadhar', 'pan', 'address', 'state'),
(6, NULL, 'ds', 'dsad', 'dharmendra@gmail.com', NULL, 8585858585, NULL, 1, '$2y$10$0p1LR18QY.U5E/k2ax0Wd.Mk17W1HqLacxxrKcsdpg.ANGXTPxSt.', NULL, '2019-02-09 12:58:20', NULL, NULL, 'dd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_attribute`
--

CREATE TABLE `user_attribute` (
  `id` int(11) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key_id` int(11) DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_detail`
--

CREATE TABLE `user_role_detail` (
  `id` int(11) NOT NULL,
  `users_role_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_detail_image`
--

CREATE TABLE `user_role_detail_image` (
  `id` int(11) NOT NULL,
  `user_role_detail_id` int(11) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7770088AD60322AC` (`role_id`),
  ADD KEY `IDX_7770088A642B8210` (`admin_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_list`
--
ALTER TABLE `contact_us_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpiui`
--
ALTER TABLE `cpiui`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_52AFFEFCBB2D1771` (`cpt_id`),
  ADD KEY `IDX_52AFFEFC3D8E604F` (`parent`);

--
-- Indexes for table `cpt`
--
ALTER TABLE `cpt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cptui_document_answer`
--
ALTER TABLE `cptui_document_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CD49A92BA9812CD9` (`cptui_id`),
  ADD KEY `IDX_CD49A92BE6A33FD1` (`questionaries_id`);

--
-- Indexes for table `cptui_document_link`
--
ALTER TABLE `cptui_document_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B286B806A9812CD9` (`cptui_id`),
  ADD KEY `IDX_B286B806C33F7837` (`document_id`);

--
-- Indexes for table `cptui_questionaries_answer`
--
ALTER TABLE `cptui_questionaries_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_72449CD4A9812CD9` (`cptui_id`),
  ADD KEY `IDX_72449CD4E6A33FD1` (`questionaries_id`);

--
-- Indexes for table `cptui_questionaries_link`
--
ALTER TABLE `cptui_questionaries_link`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EB134269A9812CD9` (`cptui_id`),
  ADD KEY `IDX_EB134269E6A33FD1` (`questionaries_id`);

--
-- Indexes for table `dashboard_banner`
--
ALTER TABLE `dashboard_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6000B0D3A76ED395` (`user_id`);

--
-- Indexes for table `notifications_users_device`
--
ALTER TABLE `notifications_users_device`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EDB0798BA76ED395` (`user_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_token_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_client_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_token_index` (`access_token_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionaries`
--
ALTER TABLE `questionaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_360D13C83D8E604F` (`parent`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  ADD KEY `IDX_1483A5E92DE8C6A3` (`user_role`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attribute`
--
ALTER TABLE `user_attribute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FA9A621F8E0E3CA6` (`user_role_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B1087D9EA76ED395` (`user_id`),
  ADD KEY `IDX_B1087D9ED145533` (`key_id`);

--
-- Indexes for table `user_role_detail`
--
ALTER TABLE `user_role_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2C3B57B726035666` (`users_role_id`);

--
-- Indexes for table `user_role_detail_image`
--
ALTER TABLE `user_role_detail_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D48418F1E2A10F3E` (`user_role_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_list`
--
ALTER TABLE `contact_us_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cpiui`
--
ALTER TABLE `cpiui`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cpt`
--
ALTER TABLE `cpt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cptui_document_answer`
--
ALTER TABLE `cptui_document_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cptui_document_link`
--
ALTER TABLE `cptui_document_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cptui_questionaries_answer`
--
ALTER TABLE `cptui_questionaries_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cptui_questionaries_link`
--
ALTER TABLE `cptui_questionaries_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dashboard_banner`
--
ALTER TABLE `dashboard_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications_users_device`
--
ALTER TABLE `notifications_users_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questionaries`
--
ALTER TABLE `questionaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_attribute`
--
ALTER TABLE `user_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_detail`
--
ALTER TABLE `user_role_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_detail_image`
--
ALTER TABLE `user_role_detail_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `FK_7770088A642B8210` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `FK_7770088AD60322AC` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `cpiui`
--
ALTER TABLE `cpiui`
  ADD CONSTRAINT `FK_52AFFEFC3D8E604F` FOREIGN KEY (`parent`) REFERENCES `cpiui` (`id`),
  ADD CONSTRAINT `FK_52AFFEFCBB2D1771` FOREIGN KEY (`cpt_id`) REFERENCES `cpt` (`id`);

--
-- Constraints for table `cptui_document_answer`
--
ALTER TABLE `cptui_document_answer`
  ADD CONSTRAINT `FK_CD49A92BA9812CD9` FOREIGN KEY (`cptui_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_CD49A92BE6A33FD1` FOREIGN KEY (`questionaries_id`) REFERENCES `questionaries` (`id`);

--
-- Constraints for table `cptui_document_link`
--
ALTER TABLE `cptui_document_link`
  ADD CONSTRAINT `FK_B286B806A9812CD9` FOREIGN KEY (`cptui_id`) REFERENCES `cpiui` (`id`),
  ADD CONSTRAINT `FK_B286B806C33F7837` FOREIGN KEY (`document_id`) REFERENCES `document_type` (`id`);

--
-- Constraints for table `cptui_questionaries_answer`
--
ALTER TABLE `cptui_questionaries_answer`
  ADD CONSTRAINT `FK_72449CD4E6A33FD1` FOREIGN KEY (`questionaries_id`) REFERENCES `questionaries` (`id`);

--
-- Constraints for table `cptui_questionaries_link`
--
ALTER TABLE `cptui_questionaries_link`
  ADD CONSTRAINT `FK_EB134269A9812CD9` FOREIGN KEY (`cptui_id`) REFERENCES `cpiui` (`id`),
  ADD CONSTRAINT `FK_EB134269E6A33FD1` FOREIGN KEY (`questionaries_id`) REFERENCES `questionaries` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_6000B0D3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `notifications_users_device`
--
ALTER TABLE `notifications_users_device`
  ADD CONSTRAINT `FK_EDB0798BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questionaries`
--
ALTER TABLE `questionaries`
  ADD CONSTRAINT `FK_360D13C83D8E604F` FOREIGN KEY (`parent`) REFERENCES `questionaries` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E92DE8C6A3` FOREIGN KEY (`user_role`) REFERENCES `users_role` (`id`);

--
-- Constraints for table `user_attribute`
--
ALTER TABLE `user_attribute`
  ADD CONSTRAINT `FK_FA9A621F8E0E3CA6` FOREIGN KEY (`user_role_id`) REFERENCES `users_role` (`id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `FK_B1087D9EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_B1087D9ED145533` FOREIGN KEY (`key_id`) REFERENCES `user_attribute` (`id`);

--
-- Constraints for table `user_role_detail`
--
ALTER TABLE `user_role_detail`
  ADD CONSTRAINT `FK_2C3B57B726035666` FOREIGN KEY (`users_role_id`) REFERENCES `users_role` (`id`);

--
-- Constraints for table `user_role_detail_image`
--
ALTER TABLE `user_role_detail_image`
  ADD CONSTRAINT `FK_D48418F1E2A10F3E` FOREIGN KEY (`user_role_detail_id`) REFERENCES `user_role_detail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
