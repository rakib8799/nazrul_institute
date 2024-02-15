-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 11:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jkkniu_nazrul_institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `details_en` longtext NOT NULL,
  `title_bd` varchar(255) NOT NULL,
  `details_bd` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title_en`, `details_en`, `title_bd`, `details_bd`, `created_at`, `updated_at`) VALUES
(1, 'Brief Introduction to the Institute of Nazrul Studies', '<p>National poet Kazi Nazrul Islam is a symbol of the&nbsp;spirit of the nation. His works have enriched Bengali literature and our lives. Nazrul literature is the charioteer for the development of purity, honesty, good intellect, and open mind in the Bengali mind. <strong>&quot;Jatiya Kabi Kazi Nazrul Islam University&quot;</strong>&nbsp;was established in 2006 in Nazrul memorial, Trishal. This university is conducting educational programs through 24 departments of 6 faculties and one institute.</p>\r\n\r\n<p><strong>&quot;Institute of Nazrul Studies&quot;</strong> was established in 2014 in Jatiya Kabi Kazi Nazrul Islam University to conduct research and academic activities on Nazrul life, literature, and music.&nbsp;</p>\r\n', 'ইন্সটিটিউট অব নজরুল স্টাডিজের সংক্ষিপ্ত পরিচিতি', '<p>জাতীয় কবি কাজী নজরুল ইসলাম জাতির চেতনার প্রতীক । তাঁর সৃষ্টি ও কর্ম বাংলা সাহিত্য এবং আমাদের জীবনকে করেছে ঋদ্ধ । বাঙালি মননে শুদ্ধতা, সততা, শুভবুদ্ধি ও মুক্তবুদ্ধি বিকাশে নজরুল-সাহিত্য সারথি স্বরূপ । নজরুল স্মৃতি বিজরিত ত্রিশালে ২০০৬ সালে প্রতিষ্ঠিত হয় <strong>&quot;জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়&quot;</strong> । এ বিশ্ববিদ্যালয় ০৬টি অনুষদে ২৪টি বিভাগ ও একটি ইন্সটিটিউটের মাধ্যমে শিক্ষা কার্যক্রম পরিচালনা করছে ।</p>\r\n\r\n<p>নজরুল জীবন, সাহিত্য ও সংগীত নিয়ে গবেষণা এবং একাডেমিক কার্যক্রম পরিচালনায়&nbsp;জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ে ২০১৪ সালে প্রতিষ্ঠিত হয়েছে <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> ।</p>\r\n', '2024-02-15 09:10:51', '2024-02-15 09:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'Mehedi Khan Rakib', 'mkrakib007@gmail.com', '$2y$10$/NUpv96/Nu7XyGIIs0xg9OXkoJwK8WWFcxwVNGEyLAmgFEgqprGYS', '2023-11-29 06:55:50', '2024-02-15 08:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `advisor_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `advisor_name`, `publisher_name`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(3, 'নজরুল প্রতিকৃতি চিত্র অ্যালবাম - কায়ার ছায়ায় নজরুল (২০২২)', 'অধ্যাপক ড. সৌমিত্র শেখর', 'মো. সাহাবউদ্দিন, নগরবাসী বর্মন, রাশেদুল আনাম', '6567610fc0c39.jpg', '', '2024-02-15 04:26:57', '2024-02-15 08:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `art_camp`
--

CREATE TABLE `art_camp` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art_camp`
--

INSERT INTO `art_camp` (`id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'নজরুল প্রতিকৃতি চিত্র : আর্ট-ক্যাম্প-২০১৮', '<p>নজরুল জন্মজয়ন্তী - ২০১৮ উপলক্ষে গত ১০মে ২০১৮খ্রি. তারিখে ইন্সটিটিউট অব নজরুল স্টাডিজ এবং চারুকলা বিভাগের যৌথ উদ্যোগে&nbsp;নজরুল প্রতিকৃতি চিত্র বিষয়ক <strong>&quot;নজরুল আর্ট ক্যাম্প&quot;</strong> অনুষ্ঠিত হয় । উক্ত আর্ট ক্যাম্পে চারুকলা বিভাগের ৩১জন শিক্ষার্থী অংশগ্রহণ করেন ।</p>\r\n', '65ce29f3c65cc.jpg,65ce29f3c67f7.jpg,65ce29f3c6a65.jpg', '2024-02-15 04:33:03', '2024-02-15 15:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `author_information`
--

CREATE TABLE `author_information` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `author_contact_no` varchar(11) NOT NULL,
  `author_password` varchar(255) NOT NULL,
  `author_role` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `verification_code` varchar(8) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`author_id`, `author_name`, `author_email`, `author_contact_no`, `author_password`, `author_role`, `image`, `verification_code`, `email_verified_at`, `updated_at`) VALUES
(2, 'Dr. Jannatul Ferdous', 'mkrcoding1998@gmail.com', '01727027277', '$2y$10$/u3FOMOtSe2H5ALZ0sqeteurrtfN9O93O1l4zkMTl6xurdWxkH.ci', 'Teacher', '6574d0f56c6d1.jpg', '330062', '2023-12-09 20:41:25', '2024-02-15 08:48:33'),
(3, 'MK Rakib', 'mkrakib328@gmail.com', '01727027277', '$2y$10$Dlcc/uxKDO/9YckRJiV6oOwzyDjHX2K9ev/B3pxgzW8J2h9YLNJvi', 'Student', '65cc4ff38e070.jpg', '154954', '2024-02-14 05:30:27', '2024-02-15 08:48:33'),
(4, 'Mehedi Khan', 'mkrdeveloper328@gmail.com', '01727027277', '$2y$10$.WRQ6TNSfh.J8LT/c94/SOtPVJWcuo8awrpw4VQosuY64jSe/vKIC', 'Student', 'NULL', '904899', '2023-12-09 20:33:09', '2024-02-15 08:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `title`, `details`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'আন্তর্জাতিক নজরুল কনফারেন্স - ২০১৭', '<p>নজরুল সেন্টার ফর সোস্যাল এণ্ড কালচারাল স্টাডিজ, কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারত এবং ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ - এর যৌথ উদ্যোগে&nbsp;কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারতে ২০১৭ সালের জুন মাসে অনুষ্ঠিত হয় তিন দিনব্যাপী <strong>&quot;আন্তর্জাতিক নজরুল কনফারেন্স&quot;</strong> । উক্ত কনফারেন্সে বাংলাদেশ ও ভারতের নজরুল বিশেষজ্ঞ ও গবেষকবৃন্দ অংশগ্রহণ করেন ।</p>\r\n', '6528e8ee36761.jpg', '', '2023-10-13 06:51:26', '2024-02-15 08:49:06'),
(2, 'গবেষকদের আন্তর্জাতিক কনফারেন্স - ২০১৯', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং নজরুল সেন্টার ফর সোস্যাল এন্ড কালচারাল স্টাডিজ,&nbsp;কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারত - এর মধ্যে দ্বিপাক্ষিক সমঝোতা চুক্তি Memorandum of Understanding (MoU) স্বাক্ষরিত হয় । উক্ত দ্বিপাক্ষিক&nbsp;সমঝোতা চুক্তির ধারাবাহিকতায়&nbsp;ইন্সটিটিউট অব নজরুল স্টাডিজ,&nbsp;জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়,&nbsp;ত্রিশাল, ময়মনসিংহ, বাংলাদেশ কর্তৃক আয়োজিত দুই বিশ্ববিদ্যালয়ের গবেষকদের নিয়ে <strong>&quot;উচ্চতর গবেষণা রীতি পদ্ধতি : নজরুল ও বাংলা সাহিত্য&quot;</strong> শীর্ষক কর্মশালা গত ২০ ফেব্রুয়ারি ২০১৯ খ্রি. তারিখে অনুষ্ঠিত হয় । উক্ত কনফারেন্সে ১০ জন পিএইচ.ডি. ১ জন এম.ফিল. এবং&nbsp;ইন্সটিটিউট অব নজরুল স্টাডিজ গবেষণা প্রকল্পের ১৪ জন গবেষক অংশগ্রহণ করেন ।</p>\r\n', '6528e8bf04004.jpg', '', '2023-10-13 06:50:39', '2024-02-15 08:49:06'),
(3, 'নজরুল জন্মজয়ন্তী উদযাপন', '<p>প্রতি বছর নজরুল জন্মজয়ন্তী উদযাপন উপলক্ষে জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় আয়োজিত সেমিনার, কনফারেন্স ও নজরুল পদক প্রদান অনুষ্ঠানে ইন্সটিটিউট অব নজরুল স্টাডিজ সহযোগিতা এবং গুরুত্বপূর্ণ ভূমিকা পালন করে আসছে ।</p>\r\n', '6528e8f51a9b5.jpg', '', '2023-10-13 06:51:33', '2024-02-15 08:49:06'),
(4, 'আন্তর্জাতিক নজরুল কনফারেন্স - ২০২২', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় কর্তৃক গত ০৮ জানুয়ারি ২০২৩ তারিখ রবিবার, দিনব্যাপী&nbsp;International Nazrul Conference on Global &nbsp;Realities of Nazrul Studies (নজরুল অধ্যয়নের বৈশ্বিক বাস্তবতা) শীর্ষক আন্তর্জাতিক নজরুল কনফারেন্সের আয়োজন করা হয়। উক্ত কনফারেন্সে যুক্তরাষ্ট্রের বিভিন্ন বিশ্ববিদ্যালয়ের ০৪ জন আন্তর্জাতিক পর্যায়ের নজরুল গবেষক উপস্থিত ছিলেন ।</p>\r\n', '6528e33276b81.jpg', '', '2023-10-13 06:26:58', '2024-02-15 08:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `location`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'ins.jkkniu@gmail.com', 'জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়নসিংহ - ২২২৪, বাংলাদেশ', 'ফোন: 0১৫৫৮৩৩৯৯৫৯', '2023-10-13 13:28:30', '2024-02-15 15:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'পরিচালক (দায়িত্বপ্রাপ্ত)', '2023-04-29 06:52:48', '2024-02-15 08:50:58'),
(2, 'অতিরিক্ত পরিচালক', '2023-04-29 06:53:44', '2024-02-15 08:50:58'),
(3, 'পার্সোনাল অফিসার', '2023-04-29 06:54:06', '2024-02-15 08:50:58'),
(4, 'কেয়ারটেকার', '2023-04-29 06:54:25', '2024-02-15 08:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `name`, `designation`, `duration`, `image`, `created_at`, `updated_at`) VALUES
(1, 'অধ্যাপক ড. মোহীত উল আলম', 'পরিচালক (দায়িত্বপ্রাপ্ত)', 'সেপ্টেম্বর ২০১৪ - ১২.০৮.২০১৭', '64ccfccd24030.jpg', '2023-08-04 13:27:41', '2024-02-15 08:51:39'),
(2, 'অধ্যাপক এ এম এম শামসুর রহমান', 'পরিচালক (দায়িত্বপ্রাপ্ত)', '১৩.০৮.২০১৭ - ১৩.১১.২০১৭', '64ccfcd5f261c.jpg', '2023-08-04 13:27:49', '2024-02-15 08:51:39'),
(3, 'অধ্যাপক ড. এ এইচ এম মোস্তাফিজুর রহমান', 'পরিচালক (দায়িত্বপ্রাপ্ত)', '১৮.১১.২০১৭ - ১৩.১১.২০২১', '64ccfcde44d3f.jpg', '2023-08-04 13:27:58', '2024-02-15 08:51:39'),
(4, 'অধ্যাপক ড. সৌমিত্র শেখর দে', 'পরিচালক (দায়িত্বপ্রাপ্ত)', '১৯.১২.২০২১ - চলমান', '64ccfce6e1ad7.jpg', '2023-08-04 13:28:06', '2024-02-15 08:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `director_message`
--

CREATE TABLE `director_message` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director_message`
--

INSERT INTO `director_message` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, 'বর্তমান ইন্সটিটিউট প্রধানের নাম (মেয়াদকালসহ)', '<p>বিশিষ্ট শিক্ষাবিদ, ভাষাবিদ, নজরুল অধ্যাপক, ঢাকা বিশ্ববিদ্যালয় নজরুল গবেষণা কেন্দ্রের সাবেক পরিচালক ও&nbsp;ঢাকা বিশ্ববিদ্যালয় বাংলা বিভাগের অধ্যাপক এবং জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের মাননীয় উপাচার্য অধ্যাপক ড. সৌমিত্র শেখর <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> - এর পরিচালক (দায়িত্বপ্রাপ্ত) । মেয়াদকাল ১৯.১২.২০২১ থেকে চলমান ।</p>\r\n', '2023-05-22 11:55:44', '2024-02-15 08:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `documentary`
--

CREATE TABLE `documentary` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `screenplay_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentary`
--

INSERT INTO `documentary` (`id`, `title`, `screenplay_name`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'চির-বিদ্রোহী (২০১৬)', 'তুহিন অবন্ত', '6528eb3c9f5b2.jpg', '', '2024-02-15 04:41:32', '2024-02-15 08:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `educational_activities`
--

CREATE TABLE `educational_activities` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_activities`
--

INSERT INTO `educational_activities` (`id`, `title`, `details`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'এম.ফিল. প্রোগ্রাম চালুকরণ', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; -&nbsp;</strong>এর পরিচালক (দায়িত্বপ্রাপ্ত) অধ্যাপক ড. সৌমিত্র শেখরের আন্তরিক উদ্যোগে ২০২২-২৩ শিক্ষাবর্ষ থেকে&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>- এ এম.ফিল. প্রোগ্রাম চালু করা হয়েছে ।</p>\r\n', '65ce1ddcc93ca.jpg', '', '2023-04-26 16:11:34', '2024-02-15 14:21:16'),
(2, 'নজরুল স্টাডিজ কোর্সের সিলেবাস প্রণয়ন', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ে সকল বিভাগে&nbsp;<strong>&quot;নজরুল স্টাডিজ&quot;</strong> আবশ্যিক কোর্স হিসেবে চালু রয়েছে । এই কোর্সের জন্য <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> কর্তৃক একটি অভিন্ন সিলেবাস প্রণয়ন করা হয়েছে ।</p>\r\n', '65ce1cbe9cb96.png', '', '2024-02-15 04:45:25', '2024-02-15 14:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'কলা', '2023-04-28 18:49:36', '2024-02-15 08:55:20'),
(2, 'বিজ্ঞান ও প্রকৌশল', '2023-12-08 21:15:55', '2024-02-15 08:55:20'),
(3, 'সামাজিক বিজ্ঞান', '2023-04-28 18:49:59', '2024-02-15 08:55:20'),
(4, 'ব্যবসায় প্রশাসন', '2023-04-28 18:50:09', '2024-02-15 08:55:20'),
(5, 'চারুকলা', '2023-04-28 18:50:25', '2024-02-15 08:55:20'),
(6, 'আইন', '2023-04-28 18:50:33', '2024-02-15 08:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `fiscal_year`, `created_at`, `updated_at`) VALUES
(1, '২০১৫-১৬', '2023-04-29 06:52:48', '2024-02-15 08:55:55'),
(2, '২০১৬-১৭', '2023-04-29 06:53:44', '2024-02-15 08:55:55'),
(3, '২০১৭-১৮', '2023-04-29 06:54:06', '2024-02-15 08:55:55'),
(4, '২০১৮-১৯', '2023-04-29 06:54:25', '2024-02-15 08:55:55'),
(5, '২০১৯-২০', '2023-04-29 06:54:43', '2024-02-15 08:55:55'),
(6, '২০২০-২১', '2023-04-29 06:55:00', '2024-02-15 08:55:55'),
(7, '২০২১-২২', '2023-04-29 06:55:20', '2024-02-15 08:55:55'),
(8, '২০২২-২৩', '2023-04-29 06:55:50', '2024-02-15 08:55:55'),
(9, '২০২৩-২8', '2023-10-13 07:26:58', '2024-02-15 08:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE `infrastructure` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'আন্তর্জাতিক পর্যায়ে গবেষণার সুযোগ সৃষ্টি বিষয়ক', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের মাননীয় উপাচার্য বিশিষ্ট নজরুল গবেষক অধ্যাপক ড. সৌমিত্র শেখর মহোদয়ের ঐকান্তিক চেষ্টায় ১০ তলা বিশিষ্ট একটি আধুনিক ইন্সটিটিউট ভবন নির্মাণ প্রক্রিয়াধীন । উক্ত ইন্সটিটিউট ভবন নির্মাণ কাজ সম্মন্ন হলে আন্তর্জাতিক পর্যায়ে গবেষণার সুযোগ সৃষ্টি হবে ।</p>\r\n', '65cd8bf57829c.jpg', '2024-02-15 03:59:53', '2024-02-15 08:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `institute_details`
--

CREATE TABLE `institute_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `founding_period` longtext NOT NULL,
  `aim` longtext NOT NULL,
  `target` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institute_details`
--

INSERT INTO `institute_details` (`id`, `name`, `founding_period`, `aim`, `target`, `created_at`, `updated_at`) VALUES
(1, 'ইন্সটিটিউট অব নজরুল স্টাডিজ', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ প্রতিষ্ঠিত হয় ২০১৪ খ্রিস্টাব্দে ।</p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলামের অমর স্মৃতি রক্ষা, তাঁর জীবন ও সাহিত্য, সংগীত ও সামগ্রিক অবদান সম্পর্কে পাঠদান, গবেষণা পরিচালনা, রচনাবলি সংগ্রহ, সংরক্ষণ, প্রকাশনা ও প্রচার এবং তাঁর ভাবমূর্তি দেশে-বিদেশে উজ্জ্বলরূপে তুলে ধরা <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>এর লক্ষ্য ।</p>\r\n', '<p>কাজী নজরুল ইসলামের জীবন, সাহিত্য ও সৃষ্টিকর্মকে স্মরণীয় করে রাখার জন্য&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>একটি প্রাতিষ্ঠানিক বা একাডেমিক পদক্ষেপ । বাংলা সাহিত্য, সংস্কৃতি ও সভ্যতার সমৃদ্ধি নির্মাণে কাজী নজরুল ইসলামের অবদান অবিস্মরণীয় এবং তা আমাদের জীবনের উত্তোরত্তর বিকাশের সঙ্গে অবিচ্ছেদ্য । তাই কাজী নজরুল ইসলামের জীবন, সাহিত্য ও সংগীত সংক্রান্ত উপকরণসমূহ সংগ্রহ, অনুশীলন, সংরক্ষণ, গবেষণা, প্রকাশনা ও শিক্ষা কার্যক্রম পরিচালনা দায়িত্ব পালন&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>এর উদ্দ্যেশ্য ।&nbsp;</p>\r\n', '2023-04-23 06:26:25', '2024-02-15 08:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `title`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'নজরুল বিষয়ক আন্তর্জাতিক গবেষণাপত্র : নজরুল-জার্নাল (১ম সংখ্যা) - ২০২১', '6528ea7d37a17.jpg', '6528eafe3a4dd.pdf', '2024-02-15 07:09:35', '2024-02-15 08:57:51'),
(2, 'নজরুল বিষয়ক আন্তর্জাতিক গবেষণাপত্র : নজরুল-জার্নাল (২য় সংখ্যা) - ২০২২', '6528ea967b81c.jpg', '65295312c68a1.pdf', '2024-02-15 07:09:43', '2024-02-15 08:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `details`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'গ্রন্থাগার স্থাপন বিষয়ক', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ - এ নজরুল রচনাসমগ্র, নজরুল জীবন ও সাহিত্য, সংগীত সম্পর্কিত গ্রন্থ এবং অন্যান্য সৃজনশীল গ্রন্থ, পত্র-পত্রিকা সমৃদ্ধ গ্রন্থাগার স্থাপন করা হয়েছে ।</p>\r\n', '65ce3dea5a919.jpg', '', '2024-02-15 05:21:39', '2024-02-15 16:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `memorandum`
--

CREATE TABLE `memorandum` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memorandum`
--

INSERT INTO `memorandum` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(1, '২৭.০৬.২০১৮ খ্রি. তারিখে দ্বিপাক্ষিক সমঝোতা চুক্তি', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং নজরুল সেন্টার ফর সোস্যাল এন্ড কালচারাল স্টাডিজ, কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারত - এর মধ্যে গত ২৭.০৬.২০১৮ খ্রি. তারিখে নজরুল জীবন ও কর্ম বিষয়ে গবেষণা এবং একাডেমিক কার্যক্রম পরিচালনার লক্ষ্যে <strong>দ্বিপাক্ষিক সমঝোতা চুক্তি</strong> <strong>Memorandum of Understanding (MoU)</strong> স্বাক্ষরিত হয় ।</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2024-02-15 05:30:16', '2024-02-15 08:59:20'),
(2, '১২.১১.২০১৯ খ্রি. তারিখ দ্বিপাক্ষিক সমঝোতা চুক্তি', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং Ferdowsi University of Mashhad, Iran - এর মধ্যে গত ১২.১১.২০১৯ খ্রি. তারিখ <strong>দ্বিপাক্ষিক সমঝোতা চুক্তি Memorandum of Understanding (MoU)</strong> &nbsp;স্বাক্ষরিত হয় । উক্ত দ্বি-পাক্ষিক সমঝোতা চুক্তিতে নজরুল জীবন ও কর্ম বিষয়ে গবেষণার সুযোগ রয়েছে ।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2024-02-15 05:29:50', '2024-02-15 08:59:20'),
(3, '০৩.০৮.২০২২ খ্রি. তারিখ দ্বিপাক্ষিক সমঝোতা চুক্তি', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং ডাউন টাউন বিশ্ববিদ্যালয়, আসাম, ভারত - এর মধ্যে গত ০৩.০৮.২০২২ খ্রি. তারিখ <strong>দ্বিপাক্ষিক সমঝোতা চুক্তি</strong> <strong>Memorandum of Understanding (MoU)</strong>&nbsp;স্বাক্ষরিত হয় । উক্ত দ্বি-পাক্ষিক সমঝোতা চুক্তিতে নজরুল জীবন ও কর্ম বিষয়ে গবেষণার সুযোগ রয়েছে ।</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2024-02-15 05:29:41', '2024-02-15 08:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `nazrul_scholarship`
--

CREATE TABLE `nazrul_scholarship` (
  `id` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `scholarship` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nazrul_scholarship`
--

INSERT INTO `nazrul_scholarship` (`id`, `faculty`, `scholarship`, `created_at`, `updated_at`) VALUES
(1, 'কলা', 'প্রমীলা', '2023-11-04 14:49:42', '2024-02-15 08:59:51'),
(2, 'বিজ্ঞান ও প্রযুক্তি', 'কাজী সব্যসাচী', '2023-04-28 19:13:05', '2024-02-15 08:59:51'),
(3, 'সামাজিক বিজ্ঞান', 'কাজী অনিরুদ্ধ', '2023-04-28 19:13:37', '2024-02-15 08:59:51'),
(4, 'ব্যবসায় প্রশাসন', 'বুলবুল', '2023-04-28 19:13:58', '2024-02-15 08:59:51'),
(5, 'চারুকলা', 'উমা কাজী', '2023-04-28 19:14:16', '2024-02-15 08:59:51'),
(6, 'আইন', 'কল্যাণী কাজী', '2023-04-28 19:14:45', '2024-02-15 08:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, '‘জাতীয় শুদ্ধাচার কৌশল ও বার্ষিক কর্মসম্পাদন চুক্তি’ বিষয়ক দিনব্যাপী প্রশিক্ষণ কর্মশালা', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের ভার্চুয়াল কনফারেন্স কক্ষে আজ ২০ ডিসেম্বর ২০২৩ তারিখ বুধবার &lsquo;জাতীয় শুদ্ধাচার কৌশল ও বার্ষিক কর্মসম্পাদন চুক্তি&rsquo; বিষয়ক দিনব্যাপী প্রশিক্ষণ কর্মশালা অনুষ্ঠিত হয়। প্রশিক্ষণ কর্মশালার উদ্বোধনী পর্বে বিশ্ববিদ্যালয়ের মাননীয় ভাইস-চ্যান্সেলর প্রফেসর ড. সৌমিত্র শেখর সভাপতি হিসেবে বক্তব্য রাখেন।<br />\r\nপ্রশিক্ষণ কর্মশালার উদ্বোধনী পর্বের সভাপতি প্রফেসর ড. সৌমিত্র শেখর তাঁর বক্তব্যের শুরুতে সর্বকালের সর্বশ্রেষ্ঠ বাঙালি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমানসহ তাঁর পরিবারের শাহাদাৎবরণকারী, জাতীয় চারনেতা, ভাষা ও মহান মুক্তিযুদ্ধে শহিদ সকলকে গভীর শ্রদ্ধাভরে স্মরণ করেন। তিনি বলেন, বঙ্গবন্ধুর সুযোগ্যকন্যা মাননীয় প্রধানমন্ত্রী জননেত্রী শেখ হাসিনার নেতৃত্বে ডিজিটাল বাংলাদেশ স্মার্ট বাংলাদেশের দিকে এগিয়ে যাচ্ছে। আমাদের যার যা দায়িত্ব রয়েছে তা সঠিকভাবে সম্পাদন করলেই আমরা মাননীয় প্রধানমন্ত্রীর স্বপ্নের স্মার্ট বাংলাদেশ গড়তে পারবো। ন্যায়-নিষ্ঠা, আন্তরিকতা এবং স্বচ্ছতার সাথে আমাদের পরিকল্পনামাফিক কাজ করতে হবে। কাজের জন্য একটি নির্দিষ্ট পরিকল্পনামাফিক লক্ষ নির্ধারণ করতে হবে। নির্ধারিত লক্ষ অর্জনের জন্য কাজ করে সেই লক্ষে পৌঁছতে হবে। যেহেতু লক্ষ আমরাই নির্ধারণ করবো, তাই এই পরিকল্পিত কাজে কোনভাবেই ব্যর্থ হওয়া যাবে না।<br />\r\nড. সৌমিত্র শেখর আরও বলেন, আমি এই বিশ্ববিদ্যালয়ে যোগদানকালে এ.পি.এ. র&zwnj;্যাংকিংয়ে নজরুল বিশ্ববিদ্যালয় তলানিতে ছিল। ৪৬টি বিশ্ববিদ্যালয়ের মধ্যে ৩৯তম এরপর আপনাদের সহযোগিতায়, আপনাদের কাজের মাধ্যমে ২৯তম এবং সবশেষ ১৪তম অবস্থানে নজরুল বিশ্ববিদ্যালয়। যেসকল বিশ্ববিদ্যালয় আমাদের বিশ্ববিদ্যালয়ের থেকে পিছিয়ে ছিল তারা চেষ্টা করবে এগিয়ে যাওয়ার। ফলে আমাদের অবস্থানকে আরও এগিয়ে নিতে আগের চেয়ে আরও বেশি কাজ করতে হবে। আপনাদের কাজের আন্তরিকতার মধ্য দিয়ে আগামীতে এ.পি.এ. র&zwnj;্যাংকিংয়ে আমাদের অবস্থান আরও ভালো হবে আমার বিশ্বাস।<br />\r\nপ্রশিক্ষণার্থী শিক্ষক-কর্মকর্তাবৃন্দের উদ্দেশ্যে তিনি বলেন, &lsquo;আজকের প্রশিক্ষণ কর্মশালায় বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশন হতে আগত সম্পদ ব্যক্তিদ্বয় &lsquo;জাতীয় শুদ্ধাচার কৌশল ও বার্ষিক কর্মসম্পাদন চুক্তি&rsquo; বিষয়ে অভিজ্ঞ এবং প্রশিক্ষিত। তাদের অভিজ্ঞতা ও প্রশিক্ষিত জ্ঞান আপনাদের আরও প্রশিক্ষিত করবে বলে আমি বিশ্বাস করি। কর্মশালা আর ক্লাসের মধ্যে বিস্তর পার্থক্য রয়েছে উল্লেথ করে তিনি বলেন, কর্মশালায় প্রশ্ন করার সুযোগ রয়েছে। প্রশ্ন করা সবচেয়ে কঠিন কাজ। আপনাদের যে বিষয়গুলো বুঝতে সমস্যা হবে বা জানতে চান তা প্রশ্ন করে জেনে নিবেন। প্রধান অতিথি বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশনের সদস্য প্রফেসর ড. আবু তাহেরসহ অতিথিবৃন্দ, সম্পদ ব্যক্তি ও প্রশিক্ষণার্থী শিক্ষক কর্মকর্তাদের আন্তরিক ধন্যবাদ জ্ঞাপন করেন মাননীয় ভাইস-চ্যান্সেলর।<br />\r\nপ্রশিক্ষণ কর্মশালায় প্রধান অতিথি হিসেবে বক্তব্য রাখেন বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশনের সদস্য প্রফেসর ড. আবু তাহের। প্রধান অতিথি জাতীয় শুদ্ধাচার কৌশল ও বার্ষিক কর্মসম্পাদন চুক্তির বিষয়ে বিস্তারিত আলোচনা করেন। এসময় তিনি নজরুল বিশ্ববিদ্যালয়ে এ্যাকাডেমিক ক্যালেন্ডার তৈরি এবং সেই অনুযায়ী ক্লাস-পরীক্ষার জন্য মাননীয় ভাইস-চ্যান্সেলরকে আন্তরিক ধন্যবাদ জ্ঞাপন করেন। বিশ্ববিদ্যালয় উম্মুক্ত জ্ঞানচর্চার জায়গা উল্লেখ করে প্রধান অতিথি বলেন, জাতীয় বিশ্ববিদ্যালয়ে দেশের বেশির ভাগ উচ্চ শিক্ষা গ্রহণকরী শিক্ষার্থী অধ্যয়ন করছে। ফলে তাদের শিক্ষার মানোন্নয়ন ছাড়া দেশের উচ্চশিক্ষার মানোন্নয়ন সম্ভব না। ন্যায়-নীতির মধ্য দিয়ে দেশপ্রেমের সাথে ছাড় দেওয়ার মানসিকতার মাধ্যমে মেধাকে কাজে লাগিয়ে স্মার্ট বাংলাদেশ গড়ে তুলতে হবে বলে প্রধান অতিথি উল্লেখ করেন।<br />\r\nউদ্বোধনীপর্বে বিশেষ অতিথি হিসেবে বক্তব্য রাখেন জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের ট্রেজারার প্রফেসর ড. আতাউর রহমান, বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশনের সচিব ড. ফেরদৌস জামান। স্বাগত বক্তব্য দেন বিশ্ববিদ্যালয়ের রেজিস্ট্রার কৃষিবিদ ড. মো. হুমায়ুন কবীর। প্রশিক্ষণে বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশনের স্ট্র্যাটেজিক প্ল্যানিং এন্ড কোয়ালিটি অ্যাশুরেন্স বিভাগের উপ-সচিব ও এ.পি.এ এর ফোকাল পয়েন্ট বিষ্ণু মল্লিক ও বাংলাদেশ বিশ্ববিদ্যালয় মঞ্জুরী কমিশনের প্রশাসন বিভাগের উপ-সচিব ও শুদ্ধাচার কৌশলের ফোকাল পয়েন্ট মো. আসাদুজ্জামান সম্পদব্যক্তি হিসেবে উপস্থিত ছিলেন। এসময় প্রশিক্ষণার্থী হিসেবে উপস্থিত ছিলেন বিশ্ববিদ্যালয়ের শিক্ষক-কর্মকর্তাবৃন্দ।</p>\r\n', '65cd208770aa9.jpg', '2024-02-14 20:20:23', '2024-02-15 09:00:35'),
(2, 'জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ে মহান বিজয় দিবস-২০২৩ উদযাপন', '<p>যথাযোগ্য মর্যাদা ও উৎসাহ উদ্দীপনার সাথে জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ে মহান বিজয় দিবস-২০২৩ উদযাপন করা হয়েছে। দিবসটি উপলক্ষ্যে শনিবার (১৬ ডিসেম্বর) সকাল ১০টায় প্রশাসনিক ভবনের সামনে জাতীয় সংগীতের সহযোগে জাতীয় পতাকা উত্তোলন করা হয়। এরপর শুরু হয় বিজয় শোভাযাত্রা। শোভাযাত্রাটি ক্যাম্পাসের বিভিন্ন সড়ক প্রদক্ষিণ করে বঙ্গবন্ধু স্কয়ারে গিয়ে শেষ হয়। এরপর শহিদদের স্মরণে ক্যাম্পাসে &lsquo;বঙ্গবন্ধু ভাস্কর্য&rsquo; ও &lsquo;চির উন্নত মম শির&rsquo;-এ ফুলেল শ্রদ্ধাঞ্জলি জানানো হয়।<br />\r\nবিশ্ববিদ্যালয় পরিবারের পক্ষ থেকে মাননীয় উপাচার্য প্রফেসর ড. সৌমিত্র শেখর প্রথমে পুষ্পস্তবক অর্পণ করেন। এরপর ট্রেজারার প্রফেসর ড. আতাউর রহমান পুষ্পস্তবক অর্পণ করেন।<br />\r\nএরপর শিক্ষক সমিতি, কর্মকর্তা পরিষদ, বঙ্গবন্ধু পরিষদ, কর্মচারী সমিতি (১১-১৬), কর্মচারী ইউনিয়ন( গ্রেড ১৭-২০) অগ্নি-বীণা হল, দোলন-চাঁপা হল, জাতির জনক বঙ্গবন্ধু শেখ মুজিবুর রহমান হল, বঙ্গমাতা বেগম ফজিলাতুন্নেছা মুজিব হলসহ বিভিন্ন অনুষদ, বিভাগ,দপ্তর, বাংলাদেশ ছাত্রলীগ জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়সহ বিভিন্ন সামাজিক, সাংস্কৃতিক সংগঠনের পক্ষ থেকে ফুল দেওয়া হয়।<br />\r\nএ সময় উপস্থিত ছিলেন সামাজিক বিজ্ঞান অনুষদের ডিন প্রফেসর ড. মো. নজরুল ইসলাম, বিজ্ঞান ও প্রকৌশল অনুষদের ডিন প্রফেসর ড. উজ্জ্বল কুমার প্রধান, ব্যবসায় প্রশাসন অনুষদের ডিন প্রফেসর ড. মো. রিয়াদ হাসান, চারুকলা অনুষদের ডিন প্রফেসর ড. তপন কুমার সরকার, রেজিস্ট্রার কৃষিবিদ ড. মো. হুমায়ুন কবীর, ছাত্র উপদেষ্টা ড. মোহাম্মদ মেহেদী উল্লাহ, প্রক্টর সঞ্জয় কুমার মুখার্জী, শিক্ষক সমিতির সাধারণ সম্পাদক ড.জান্নাতুল ফেরদৌস, কর্মকর্তা পরিষদের সাধারণ সম্পাদক মো. রামিম আল করিমসহ অন্যরা।<br />\r\nদিবসটি উপলক্ষ্যে দুপুরে প্রশাসনিক ভবনের কনফারেন্স কক্ষে একটি আলোচনা সভা অনুষ্ঠিত হয়। সংশ্লিষ্ট কমিটির আহ&Yuml;ায়ক প্রফেসর ড. মো. রিয়াদ হাসানের সভাপতিত্বে আলোচনা সভায় প্রধান অতিথি হিসেবে বক্তব্য দেন বিশ্ববিদ্যালয়ের উপাচার্য প্রফেসর ড. সৌমিত্র শেখর। তিনি তাঁর বক্তব্যের শুরুতে সর্বকালের সর্বশ্রেষ্ঠ বাঙ্গালি জাতির পিতা বঙ্গবন্ধু শেখ মুজিবুর রহমান এর প্রতি গভীর শ্রদ্ধা নিবেদন করেন। এছাড়া বঙ্গন্ধুর পরিবার, জাতীয় চারনেতা, মুক্তিযুদ্ধে শহিদ সকলের কথা গভীর শ্রদ্ধাভরে স্মরণ করেন।<br />\r\nবাংলাদেশের মুক্তি সংগ্রামের প্রেক্ষাপট তুলে ধরে সভায় প্রধান অতিথির বক্তব্যে তিনি বলেন, বাংলাদেশের মানুষের মনে বঙ্গবন্ধু যে আর্দশের বীজ বপন করেছিলেন সে আদর্শের পরিপ্রেক্ষিতে আমাদের মুক্তিযুদ্ধ সম্পন্ন হয়েছিল। মুক্তিযুদ্ধ কিন্তু শুধুই নয় মাসের যুদ্ধ নয়। এটি হচ্ছে মুক্তির সংগ্রাম। এই সংগ্রামের দীর্ঘ ২৩ বছরের ইতিহাস রয়েছে। ধীরে ধীরে একটি পর্যায় বঙ্গবন্ধু অতিক্রম করেছে। বাঙালিদের মধ্যে তো সবাই মুক্তিযুদ্ধে অংশগ্রহণ করেন নি। সব দল মুক্তিযুদ্ধ সম্পর্কে একমত ছিলেন না। অনেকগুরুত্বপূর্ণ নেতা যেমন মাওলানা ভাসানীর মতো সামনের দিকের নেতার পদক্ষেপ ছিল, সেটাও পাকিস্তানি কূটকৌশলের পক্ষে গিয়েছিল। বিশ্বের যে গুরুত্বপূর্ণ দেশগুলো যারা আজকে মানবতা শেখায়, নানা রকমের ছবক নিয়ে আসে তাদের অবস্থা ও অবস্থান ছিল প্রশ্ন সাপেক্ষ। বাংলাদেশের মুক্তির সংগ্রাম মূলত অভ্যন্তরীণ লড়াই ছিল না। মূলত দুটি দেশের গোলাগুলি ছিল না। এটি ছিল একটি আদর্শের লড়াই। সে আদর্শ ছিল শোষণমুক্ত, ধর্ম নিরপেক্ষ একটি সুখী বাংলাদেশ প্রতিষ্ঠার লড়াই।<br />\r\nএবারের বিজয় দিবসের প্রত্যয় হিসেবে সাংবিধানিক ধারাবাহিতকা রক্ষার কথা তুলে ধরে ড. সৌমিত্র শেখর বলেন, আমরা সাংবিধানিক ধারাবাহিতকা রক্ষা করতে চাই। এবং সাংবিধানিক ধারাবাহিকতা রক্ষার মধ্যদিয়ে আগামীর যে নির্বাচন আছে এই নির্বাচনকে ফলপ্রসূ করতে চাই। আর সেজন্য সকলকে যার যার অবস্থান থেকে ঐক্যবদ্ধভাবে কাজ করতে হবে।<br />\r\nআলোচনা সভায় বিশেষ অতিথির বক্তব্য দেন ট্রেজারার প্রফেসর ড. আতাউর রহমান, সামাজিক বিজ্ঞান অনুষদের ডিন প্রফেসর ড. নজরুল ইসলাম, বিজ্ঞান ও প্রকৌশল অনুষদের ডিন প্রফেসর ড. উজ্জ্বল কুমার প্রধান, চারুকলা অনুষদের ডিন প্রফেসর ড. তপন কুমার সরকার। আলোচনা করেন শিক্ষক সমিতির সাধারণ সম্পাদক ড. জান্নাতুল ফেরদৌস, কর্মচারী সমিতির সভাপতি (গ্রেড১১-১৬) মো. কামরুজ্জামানসহ অন্যরা। স্বাগত বক্তব্য দেন রেজিস্ট্রার কৃষিবিদ ড. মো. হুমায়ুন কবীর। ধন্যবাদ জ্ঞাপন করেন সংশ্লিষ্ট কমিটির সদস্য-সচিব ড. মোহাম্মদ মেহেদী উল্লাহ। সঞ্চালনা করেন মাসুদুর রহমান ও জান্নাতুল নাঈম।<br />\r\nদিবসটি স্মরণে দুপুরে বিশ্ববিদ্যালয়ের চারুকলা অনুষদের সহযোগিতায় আর্ট ক্যাম্প অনুষ্ঠিত হয়। উপাচার্য প্রফেসর ড. সৌমিত্র শেখর ক্যাম্পের উদ্বোধন করেন। দুপুর আড়াইটায় শেখ রাসেল কেন্দ্রীয় খেলার মাঠে শিক্ষক,কর্মকর্তা ও কর্মচারীদের খেলাধুলো অনুষ্ঠিত হয়।<br />\r\nএরপর বিকেল সাড়ে চারটায় বাংলাদেশের প্রথম সংবিধান অর্থাৎ &lsquo;বাহাত্তরের মূল সংবিধান&rsquo; এর পঞ্চাশ বছর পূর্তি ও &lsquo;সুবর্ণ জয়ন্তী&rsquo; উপলক্ষ্যে জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের সামাজিক বিজ্ঞান অনুষদ ও ব্যবসায় প্রশাসন অনুষদ ভবনের প্লাজাকে &lsquo;সংবিধান আঙিনা&rsquo; হিসেবে বিবেচনায় নিয়ে &lsquo;ধ্রুব&rsquo;৭২&rsquo; স্থাপনার উদ্বোধন ও আলোচনা সভা অনুষ্ঠিত হয়। ধ্রুব&rsquo;৭২ স্মারক-স্থাপনা উদ্বোধন ও সভায় সভাপত্বি করেন ধ্রুব&rsquo;৭২ স্থাপনার রূপকার ও উপাচার্য প্রফেসর ড. সৌমিত্র শেখর। আলোচনা করেন ট্রেজারার প্রফেসর ড.আতাউর রহমান, সামাজিক অনুষদের ডিন অধ্যাপক ড. মো. নজরুল ইসলাম, ব্যবসায় প্রশাসন অনুষদের ডিন অধ্যাপক ড. মো. রিয়াদ হাসান, রেজিস্ট্রার কৃষিবিদ ড. মো. হুমায়ুন কবীর, লোকপ্রশাসন ও সরকার পরিচালনাবিদ্যা বিভাগের বিভাগীয় প্রধান আজিজুর রহমান ও আইন বিভাগের বিভাগীয় প্রধান মো. আহসান কবীর। বিকেল সাড়ে পাঁচটা থেকে জয়ধ্বনি মঞ্চে বিজয় দিবস উপলক্ষ্যে আয়োজিত বিভিন্ন প্রতিযোগিতার পুরষ্কার বিতরণী ও সাংস্কৃতিক অনুষ্ঠান।<br />\r\nউল্লেখ্য, মহান বিজয় দিবস উপলক্ষ্যে বিশ্ববিদ্যালয়ে প্রাঙ্গণে গুরুত্বপূর্ণ ভবন ও স্থাপনায় আলোকসজ্জা করা হয়েছে। শুক্রবার (১৫ ডিসেম্বর) জয়ধ্বনি মঞ্চে মুক্তিযুদ্ধ ভিত্তিক চলচ্চিত্র প্রদর্শন করা হয়।</p>\r\n', '65cd1eb2467f2.jpg', '2024-02-14 20:12:34', '2024-02-15 09:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `submission_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `details`, `image`, `pdf_file`, `submission_date`, `created_at`, `updated_at`) VALUES
(1, 'গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র আহবান - ২০২১', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র আহবান - ২০২১ এবং এই বিশ্ববিদ্যালয়ের স্নাতকোত্তর পর্যায়ে নজরুল জীবন ও সৃষ্টিকর্ম বিষয়ক অভিসন্দর্ভ (Thesis) রচনার জন্য কোর্স শিক্ষক/গবেষণা তত্ত্বাবধায়কের সুপারিশসহ আবেদনপত্র আহবান ।</p>\r\n', '65ce70f00a5a3.png', '652947d48e777.pdf', '2021-09-05', '2024-02-15 05:38:31', '2024-02-15 20:15:44'),
(2, 'গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র আহবান - ২০২২', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র আহবান - ২০২২ এবং এই বিশ্ববিদ্যালয়ের স্নাতকোত্তর পর্যায়ে নজরুল জীবন ও সৃষ্টিকর্ম বিষয়ক অভিসন্দর্ভ (Thesis) রচনার জন্য কোর্স শিক্ষক/গবেষণা তত্ত্বাবধায়কের সুপারিশসহ আবেদনপত্র আহবান ।</p>\r\n', '65ce70f7ee339.png', '652965486bc30.pdf', '2022-12-17', '2024-02-15 05:38:59', '2024-02-15 20:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'রাশেদুল আনাম', 'অতিরিক্ত পরিচালক', '6528d8d0097f8.png', '2023-10-13 05:42:40', '2024-02-15 09:01:49'),
(2, 'মাহমুদুর রহমান আনসারী', 'পার্সোনাল অফিসার', '6528d8d53f118.png', '2023-10-13 05:43:11', '2024-02-15 09:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_submission_student`
--

CREATE TABLE `project_submission_student` (
  `id` int(11) NOT NULL,
  `researcher_author_id` int(11) NOT NULL,
  `researcher_notice_id` int(11) NOT NULL,
  `researcher_name_bd` varchar(255) NOT NULL,
  `researcher_name_en` varchar(255) NOT NULL,
  `researcher_roll` varchar(255) NOT NULL,
  `researcher_session` varchar(255) NOT NULL,
  `researcher_department` varchar(255) NOT NULL,
  `researcher_supervisor_name` varchar(255) NOT NULL,
  `researcher_supervisor_designation` varchar(255) NOT NULL,
  `researcher_supervisor_department` varchar(255) NOT NULL,
  `researcher_organization` varchar(255) NOT NULL,
  `researcher_project_title_bd` varchar(255) NOT NULL,
  `researcher_project_title_en` varchar(255) NOT NULL,
  `researcher_project_objective` longtext NOT NULL,
  `researcher_project_details` longtext NOT NULL,
  `researcher_project_desiredOutput` longtext NOT NULL,
  `researcher_project_relToNationalDev` longtext NOT NULL,
  `researcher_project_collectInfo` longtext NOT NULL,
  `researcher_project_examDirector` longtext NOT NULL,
  `researcher_project_reportPdf` varchar(255) NOT NULL,
  `researcher_project_sixMonthWorkSchedule` longtext NOT NULL,
  `researcher_salaryExp` varchar(255) NOT NULL,
  `researcher_supervisorSalaryExp` varchar(255) NOT NULL,
  `researcher_fieldWorkExp` varchar(255) NOT NULL,
  `researcher_seminarExp` varchar(255) NOT NULL,
  `researcher_travelExp` varchar(255) NOT NULL,
  `researcher_itemsExp` varchar(255) NOT NULL,
  `researcher_reportExp` varchar(255) NOT NULL,
  `researcher_extraExp` varchar(255) NOT NULL,
  `researcher_sixMonthTotalExp` varchar(255) NOT NULL,
  `researcher_projectResultForDegree` longtext NOT NULL,
  `researcher_final_report_file` varchar(255) NOT NULL,
  `paper_status` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `researcher_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_submission_student`
--

INSERT INTO `project_submission_student` (`id`, `researcher_author_id`, `researcher_notice_id`, `researcher_name_bd`, `researcher_name_en`, `researcher_roll`, `researcher_session`, `researcher_department`, `researcher_supervisor_name`, `researcher_supervisor_designation`, `researcher_supervisor_department`, `researcher_organization`, `researcher_project_title_bd`, `researcher_project_title_en`, `researcher_project_objective`, `researcher_project_details`, `researcher_project_desiredOutput`, `researcher_project_relToNationalDev`, `researcher_project_collectInfo`, `researcher_project_examDirector`, `researcher_project_reportPdf`, `researcher_project_sixMonthWorkSchedule`, `researcher_salaryExp`, `researcher_supervisorSalaryExp`, `researcher_fieldWorkExp`, `researcher_seminarExp`, `researcher_travelExp`, `researcher_itemsExp`, `researcher_reportExp`, `researcher_extraExp`, `researcher_sixMonthTotalExp`, `researcher_projectResultForDegree`, `researcher_final_report_file`, `paper_status`, `count`, `researcher_email`, `created_at`, `updated_at`) VALUES
(25, 3, 20, 'মেহেদী খান রাকিব', 'MEHEDI KHAN RAKIB', '১৯১০২০১২', '২০১৮-১৯', 'কম্পিউটার সায়েন্স এণ্ড ইঞ্জিনিয়ারিং', 'ড. জান্নাতুল ফেরদৌস', 'প্রফেসর', 'কম্পিউটার সায়েন্স এণ্ড ইঞ্জিনিয়ারিং', 'জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়', 'নজরুল ইন্সটিটিউটের জন্য ওয়েবসাইট', 'WEBSITE FOR NAZRUL INSTITUTE', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '65cc7d360d993.pdf', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '২৫০০০ টাকা মাত্র', '৩০০০ টাকা মাত্র', '১০০০ টাকা মাত্র', '৫০০০ টাকা মাত্র', '১০০০ টাকা মাত্র', '২০০০ টাকা মাত্র', '১০০০ টাকা মাত্র', '২০০০ টাকা মাত্র', '৪০০০০ টাকা মাত্র', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong></p>\r\n', '65cc7e99833fb.pdf', 0, 1, 'mkrakib328@gmail.com', '2024-02-14 10:31:22', '2024-02-15 09:02:33'),
(26, 3, 21, 'মেহেদী খান রাকিব', 'MEHEDI KHAN RAKIB', '১৯১০২০১২', '২০১৮-১৯', 'কম্পিউটার সায়েন্স এণ্ড ইঞ্জিনিয়ারিং', 'ড. জান্নাতুল ফেরদৌস', 'প্রফেসর', 'কম্পিউটার সায়েন্স এণ্ড ইঞ্জিনিয়ারিং', 'জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়', 'নজরুল ইন্সটিটিউটের জন্য ওয়েবসাইট', 'WEBSITE FOR NAZRUL INSTITUTE', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '65cc7f4d3e45f.pdf', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '২৫০০০ টাকা মাত্র', '৩০০০ টাকা মাত্র', '১০০০ টাকা মাত্র', '৫০০০ টাকা মাত্র', '১০০০ টাকা মাত্র', '২০০০ টাকা মাত্র', '১০০০ টাকা মাত্র', '২০০০ টাকা মাত্র', '৪০০০০ টাকা মাত্র', '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র</p>\r\n', '65cc84f967bbe.pdf', 1, 1, 'mkrakib328@gmail.com', '2024-02-14 09:16:41', '2024-02-15 09:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_submission_teacher`
--

CREATE TABLE `project_submission_teacher` (
  `id` int(11) NOT NULL,
  `advisor_author_id` int(11) NOT NULL,
  `advisor_notice_id` int(11) NOT NULL,
  `advisor_name_designation_bd` varchar(255) NOT NULL,
  `advisor_name_designation_en` varchar(255) NOT NULL,
  `advisor_assistant_name_designation_bd` varchar(255) NOT NULL,
  `advisor_assistant_name_designation_en` varchar(255) NOT NULL,
  `advisor_department` varchar(255) NOT NULL,
  `advisor_organization` varchar(255) NOT NULL,
  `advisor_project_title_bd` varchar(255) NOT NULL,
  `advisor_project_title_en` varchar(255) NOT NULL,
  `advisor_project_relatedTopic` varchar(255) NOT NULL,
  `advisor_research_workPlace_university` varchar(255) NOT NULL,
  `advisor_research_workPlace_department` varchar(255) NOT NULL,
  `advisor_project_objective` longtext NOT NULL,
  `advisor_project_details` longtext NOT NULL,
  `advisor_project_desiredOutput` longtext NOT NULL,
  `advisor_project_relToNationalDev` longtext NOT NULL,
  `advisor_project_collectInfo` longtext NOT NULL,
  `advisor_project_examDirector` longtext NOT NULL,
  `advisor_project_proposal_file` varchar(255) NOT NULL,
  `advisor_project_sixMonthWorkSchedule` longtext NOT NULL,
  `advisor_basic_facilities_forProject` longtext NOT NULL,
  `advisor_basic_facilities_unavailable` longtext NOT NULL,
  `advisor_applicant_appointment_period` varchar(255) NOT NULL,
  `advisor_performance_indicators` varchar(255) NOT NULL,
  `advisor_assessment_expertName` varchar(255) NOT NULL,
  `advisor_project_salaryExp` varchar(255) NOT NULL,
  `advisor_assisstantSalaryExp` varchar(255) NOT NULL,
  `advisor_unavailable_elementsExp` varchar(255) NOT NULL,
  `advisor_fieldWorkExp` varchar(255) NOT NULL,
  `advisor_seminarExp` varchar(255) NOT NULL,
  `advisor_travelExp` varchar(255) NOT NULL,
  `advisor_itemsExp` varchar(255) NOT NULL,
  `advisor_reportExp` varchar(255) NOT NULL,
  `advisor_extraExp` varchar(255) NOT NULL,
  `advisor_sixMonthTotalExp` varchar(255) NOT NULL,
  `advisor_prev_economicHelp` varchar(255) NOT NULL,
  `advisor_economicApproval` varchar(255) NOT NULL,
  `advisor_final_report_date` varchar(255) NOT NULL,
  `advisor_final_report_currentCondition` varchar(255) NOT NULL,
  `advisor_economicHelping_org` varchar(255) NOT NULL,
  `advisor_economicHelping_project` varchar(255) NOT NULL,
  `advisor_economicHelping_money` varchar(255) NOT NULL,
  `advisor_economicHelping_finishingDate` varchar(255) NOT NULL,
  `advisor_projectResultForDegree` longtext NOT NULL,
  `advisor_final_report_file` varchar(255) NOT NULL,
  `paper_status` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `advisor_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_submission_teacher`
--

INSERT INTO `project_submission_teacher` (`id`, `advisor_author_id`, `advisor_notice_id`, `advisor_name_designation_bd`, `advisor_name_designation_en`, `advisor_assistant_name_designation_bd`, `advisor_assistant_name_designation_en`, `advisor_department`, `advisor_organization`, `advisor_project_title_bd`, `advisor_project_title_en`, `advisor_project_relatedTopic`, `advisor_research_workPlace_university`, `advisor_research_workPlace_department`, `advisor_project_objective`, `advisor_project_details`, `advisor_project_desiredOutput`, `advisor_project_relToNationalDev`, `advisor_project_collectInfo`, `advisor_project_examDirector`, `advisor_project_proposal_file`, `advisor_project_sixMonthWorkSchedule`, `advisor_basic_facilities_forProject`, `advisor_basic_facilities_unavailable`, `advisor_applicant_appointment_period`, `advisor_performance_indicators`, `advisor_assessment_expertName`, `advisor_project_salaryExp`, `advisor_assisstantSalaryExp`, `advisor_unavailable_elementsExp`, `advisor_fieldWorkExp`, `advisor_seminarExp`, `advisor_travelExp`, `advisor_itemsExp`, `advisor_reportExp`, `advisor_extraExp`, `advisor_sixMonthTotalExp`, `advisor_prev_economicHelp`, `advisor_economicApproval`, `advisor_final_report_date`, `advisor_final_report_currentCondition`, `advisor_economicHelping_org`, `advisor_economicHelping_project`, `advisor_economicHelping_money`, `advisor_economicHelping_finishingDate`, `advisor_projectResultForDegree`, `advisor_final_report_file`, `paper_status`, `count`, `advisor_email`, `created_at`, `updated_at`) VALUES
(5, 2, 2, 'e', 'e', 'c', 'c', 'c', 'c', 'c', 'c', 'জীবনী', 'c', 'c', '<p>e</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 232px; top: 39px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '<p>c</p>\r\n', '<p>e</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 78px; top: 39px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '<p>c</p>\r\n', '<p>c</p>\r\n', '<p>c</p>\r\n', '652965486bc30.pdf', '<p>c</p>\r\n', '<p>c</p>\r\n', '<p>c</p>\r\n', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', '<p>c</p>\r\n', 'N/A', 2, 2, 'mkrcoding1998@gmail.com', '2023-11-30 21:04:21', '2024-02-15 09:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `publication_book`
--

CREATE TABLE `publication_book` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication_book`
--

INSERT INTO `publication_book` (`id`, `book_name`, `publisher_name`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'নজরুলের ত্রিশাল আগমনের একশ বছর (২০১৫)', 'মোহীত উল আলম, রাশেদুল আনাম', '6528e9cb82476.jpg', '', '2023-11-29 07:42:22', '2024-02-15 09:04:39'),
(2, 'নজরুল-বীক্ষা (২০১৭)', 'মোহীত উল আলম, রাশেদুল আনাম', '6528e9d08340f.jpg', '', '2023-10-13 06:55:12', '2024-02-15 09:04:39'),
(3, 'নজরুল-মানসলোক (২০১৮)', 'মো. সাহাবউদ্দিন, রাশেদুল আনাম', '6528e9d476d6e.jpg', '', '2023-10-13 06:55:16', '2024-02-15 09:04:39'),
(4, 'বঙ্গবন্ধুর বাংলাদেশে নজরুল (২০২২)', 'সৌমিত্র শেখর', '6528e9de88e71.jpg', '', '2023-10-13 06:55:26', '2024-02-15 09:04:39'),
(5, 'নজরুল স্টাডিজ পাঠ্যপুস্তক (২০২২)', 'সৌমিত্র শেখর, রাশেদুল আনাম', '6528e9e3b2aaf.jpg', '', '2023-10-13 06:55:31', '2024-02-15 09:04:39'),
(6, 'ফিলাটেলিক নজরুল (২০২৩)', 'রাশেদ সুখন', '6528e9fde4989.png', '', '2023-10-13 06:55:57', '2024-02-15 09:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'প্রতিবেদন-২০২২', '65294f503a69b.pdf', '2023-10-13 14:08:16', '2024-02-15 09:05:06'),
(2, 'প্রতিবেদন-২০২৩', '65294f8abedc7.pdf', '2023-10-13 14:09:14', '2024-02-15 09:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `research_activities`
--

CREATE TABLE `research_activities` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(100) NOT NULL,
  `researcher_number` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_activities`
--

INSERT INTO `research_activities` (`id`, `fiscal_year`, `researcher_number`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, '২০১৫-১৬', '১ জন গবেষক', '', '', '2023-06-05 18:28:08', '2024-02-15 09:05:31'),
(2, '২০১৬-১৭', '১ জন গবেষক', '', '', '2023-06-05 18:28:22', '2024-02-15 09:05:31'),
(3, '২০১৭-১৮', '৩ জন গবেষক', '', '', '2023-06-05 18:28:29', '2024-02-15 09:05:31'),
(4, '২০১৮-১৯', '৬ জন গবেষক', '', '', '2023-06-05 18:28:39', '2024-02-15 09:05:31'),
(5, '২০১৯-২০', '১৫ জন গবেষক', '', '', '2023-10-13 07:21:13', '2024-02-15 09:05:31'),
(6, '২০২০-২১', 'করোনাকাল', '', '', '2023-06-05 18:29:07', '2024-02-15 09:05:31'),
(7, '২০২১-২২', '১৭ জন গবেষক', '', '', '2023-06-05 18:29:24', '2024-02-15 09:05:31'),
(8, '২০২২-২৩', '২৪ জন গবেষক', '', '', '2023-10-13 07:26:37', '2024-02-15 09:05:31'),
(9, '২০২৩-২8', 'চলমান', '', '', '2023-10-13 07:30:56', '2024-02-15 09:05:31'),
(10, '২০১৬-১৭', '৮ জন গবেষক', '', '', '2024-02-13 20:43:21', '2024-02-15 09:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_students`
--

CREATE TABLE `scholarship_students` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(100) NOT NULL,
  `session_year` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `scholarship_student` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_students`
--

INSERT INTO `scholarship_students` (`id`, `fiscal_year`, `session_year`, `faculty`, `department`, `scholarship_student`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, '২০১৫-১৬', '২০০৮-০৯', '৪ টি', '৬ টি', '৭ জন', '', '', '2023-10-13 07:31:30', '2024-02-15 09:05:59'),
(2, '২০১৬-১৭', '২০০৯-১০', '৪ টি', '৮ টি', '৮ জন', '', '', '2023-10-13 07:31:47', '2024-02-15 09:05:59'),
(3, '২০১৭-১৮', '২০১০-১১', '৪ টি', '১১ টি', '১১ জন', '', '', '2023-10-13 07:32:04', '2024-02-15 09:05:59'),
(4, '২০১৮-১৯', '২০১১-১২', '৪ টি', '১১ টি', '১২ জন', '', '', '2023-10-13 07:32:26', '2024-02-15 09:05:59'),
(5, '২০১৯-২০', '২০১২-১৩', '৪ টি', '১১ টি', '১৩ জন', '', '', '2023-10-13 07:32:51', '2024-02-15 09:05:59'),
(6, '২০২০-২১', '২০১৩-১৪', '৫ টি', '১২ টি', '১২ জন', '', '', '2023-10-13 07:33:14', '2024-02-15 09:05:59'),
(7, '২০২১-২২', '২০১৪-১৫', '৫ টি', '১২ টি', '১২ জন', '', '', '2023-10-13 07:33:36', '2024-02-15 09:05:59'),
(8, '২০২২-২৩', '২০১৫-১৬', '৬ টি', '১৬ টি', '১৬ জন', '', '', '2023-10-13 07:34:11', '2024-02-15 09:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `title`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'কাজী নজরুল ইসলাম ও নেতাজী সুভাষচন্দ্র বসু (২০১৮)', '', '', '2023-04-28 08:00:46', '2024-02-15 09:06:31'),
(2, 'ঈশ্বরচন্দ্র বিদ্যাসাগর জন্মদ্বিশতবর্ষ : বিদ্যাসাগর ও মানবতাবাদ (২০২০)', '', '', '2023-04-28 08:01:56', '2024-02-15 09:06:31'),
(3, 'বিদ্রোহী কবিতার শতবর্ষ : বঙ্গবন্ধু ও নজরুল (২০২১)', '', '', '2023-04-28 08:02:49', '2024-02-15 09:06:31'),
(4, 'বঙ্গবন্ধুর চোখে নেতাজি ও নজরুল -৭ (২০২১)', '', '', '2023-04-28 08:03:37', '2024-02-15 09:06:31'),
(5, 'গবেষণা প্রকল্প অগ্রগতি সেমিনার (২০২২)', '', '', '2023-04-28 08:04:16', '2024-02-15 09:06:31'),
(6, 'নজরুল ও নারী মুক্তি (২০২৩)', '', '', '2023-10-13 06:18:36', '2024-02-15 09:06:31'),
(7, 'একুশ শতকে নজরুল (২০২৩)', '', '', '2023-10-13 06:18:42', '2024-02-15 09:06:31'),
(8, 'বাংলার শিক্ষা বঞ্চনার ইতিহাস : নজরুলের শিক্ষা চিন্তার প্রাসঙ্গিকতা (২০২৩)', '', '', '2023-10-13 06:18:54', '2024-02-15 09:06:31'),
(9, 'নজরুল জীবন ও মনন (২০২৩)', '', '', '2023-10-13 06:19:07', '2024-02-15 09:06:31'),
(10, 'নজরুলের রচনায় নটরাজ (২০২৩)', '', '', '2023-10-13 06:19:16', '2024-02-15 09:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `session_years`
--

CREATE TABLE `session_years` (
  `id` int(11) NOT NULL,
  `session_year` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_years`
--

INSERT INTO `session_years` (`id`, `session_year`, `created_at`, `updated_at`) VALUES
(1, '২০০৮-০৯', '2023-04-29 06:52:48', '2024-02-15 09:08:10'),
(2, '২০০৯-১০', '2023-04-29 06:53:44', '2024-02-15 09:08:10'),
(3, '২০১০-১১', '2023-04-29 06:54:06', '2024-02-15 09:08:10'),
(4, '২০১১-১২', '2023-04-29 06:54:25', '2024-02-15 09:08:10'),
(5, '২০১২-১৩', '2023-04-29 06:54:43', '2024-02-15 09:08:10'),
(6, '২০১৩-১৪', '2023-04-29 06:55:00', '2024-02-15 09:08:10'),
(7, '২০১৪-১৫', '2023-04-29 06:55:20', '2024-02-15 09:08:10'),
(8, '২০১৫-১৬', '2023-04-29 06:55:50', '2024-02-15 09:08:10'),
(9, '২০১৬-১৭', '2023-10-13 08:00:15', '2024-02-15 09:08:10'),
(10, '২০১৭-১৮', '2023-10-13 08:00:24', '2024-02-15 09:08:10'),
(11, '২০১৮-১৯', '2023-10-13 08:00:33', '2024-02-15 09:08:10'),
(12, '২০১৯-২০', '2023-10-13 08:02:17', '2024-02-15 09:08:10'),
(13, '২০২০-২১', '2023-10-13 08:02:22', '2024-02-15 09:08:10'),
(14, '২০২১-২২', '2023-10-13 08:02:28', '2024-02-15 09:08:10'),
(15, '২০২২-২৩', '2023-10-13 08:02:32', '2024-02-15 09:08:10'),
(16, '২০২৩-২৪', '2023-10-13 08:02:37', '2024-02-15 09:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `speech`
--

CREATE TABLE `speech` (
  `id` int(11) NOT NULL,
  `speech_name` varchar(255) NOT NULL,
  `speaker_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speech`
--

INSERT INTO `speech` (`id`, `speech_name`, `speaker_name`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(1, 'নজরুলের বিদ্রোহী সত্তা (২০১৫)', 'অধ্যাপক ড. মোহীত উল আলম', '6528dabd07987.jpg', '', '2023-10-13 05:50:53', '2024-02-15 09:08:36'),
(2, 'নজরুলের লাঙল (২০১৫)', 'অধ্যাপক ড. সৌমিত্র শেখর', '6528dac407504.jpg', '', '2023-10-13 05:51:00', '2024-02-15 09:08:36'),
(3, 'নজরুল সাহিত্য : প্রসঙ্গ সৈনিক জীবন (২০১৭)', 'অধ্যাপক ড. মো. সাহাবউদ্দিন', '6528dac9a2dd9.jpg', '', '2023-10-13 05:51:05', '2024-02-15 09:08:36'),
(4, 'সুভাষ-নজরুল আদর্শের সাদৃশ্য ও বর্তমান (২০১৭)', 'ড. জয়ন্ত চৌধুরি', '65295b953cef0.jpg', '', '2023-10-13 15:00:37', '2024-02-15 09:08:36'),
(5, 'ভারতবর্ষের স্বাধীনতা সংগ্রামে নজরুল (২০১৮)', 'ড. মো. সাইফুল ইসলাম', '65295bcc0b215.jpg', '', '2023-10-13 15:01:32', '2024-02-15 09:08:36'),
(6, 'মোসলেম ভারত এবং নজরুল ও তাঁর অগ্রন্থিত রচনা (২০২২)', 'অধ্যাপক ড. সৌমিত্র শেখর', '6528dadbbd622.jpg', '', '2023-10-13 05:51:23', '2024-02-15 09:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'মুহাম্মদ আবুল হাসনাত', 'কেয়ারটেকার', '6528d908957fa.png', '2023-10-13 05:43:36', '2024-02-15 09:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `title`, `image`, `pdf_file`, `created_at`, `updated_at`) VALUES
(13, 'নজরুল স্টাডিজ অভিন্ন পাঠক্রম (২০১৮)', '65675eb44efc4.png', '', '2023-11-29 15:54:28', '2024-02-15 09:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'দাপ্তরিক কাজে প্রমিত বাংলা ভাষার ব্যবহার:প্রশিক্ষণ - ২০২১ (১ম পর্যায়)', '<p>জেলা প্রশাসন, ময়মনসিংহ - এর অর্থায়নে ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ কর্তৃক আয়োজিত &quot;প্রশাসনিক কাজে প্রমিত বাংলা ভাষার ব্যবহার&quot; শীর্ষক প্রশিক্ষণ - ২০২১ গত ০৮/১১/২০২১ তারিখে অনুষ্ঠিত হয় । উক্ত প্রশিক্ষণে অত্র বিশ্ববিদ্যালয়ের ১০ম গ্রেডের ৩৫ জন কর্মকর্তা অংশগ্রহণ করেন ।</p>\r\n', '65cd8c8de81bd.jpg', '2024-02-15 04:07:06', '2024-02-15 09:09:49'),
(2, 'প্রশাসনিক কাজে প্রমিত বাংলা ভাষার ব্যবহার:প্রশিক্ষণ - ২০২২ (২য় পর্যায়)', '<p>জেলা প্রশাসন, ময়মনসিংহ - এর অর্থায়নে ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ কর্তৃক আয়োজিত &quot;প্রশাসনিক কাজে প্রমিত বাংলা ভাষার ব্যবহার&quot; শীর্ষক প্রশিক্ষণ - ২০২২ গত ১৯/০৯/২০২২ তারিখে অনুষ্ঠিত হয় । উক্ত প্রশিক্ষণে অত্র বিশ্ববিদ্যালয়ের ৯ম গ্রেডের ৪০ জন কর্মকর্তা অংশগ্রহণ করেন ।</p>\r\n', '65cd8cc6d0497.jpg', '2024-02-15 04:07:19', '2024-02-15 09:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `work_shop`
--

CREATE TABLE `work_shop` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_shop`
--

INSERT INTO `work_shop` (`id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(1, 'গবেষণা রীতি-পদ্ধতি কর্মশালা - ২০২২', '<p><strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> কর্তৃক ২০২১-২২ অর্থবছরে প্রদানকৃত গবেষণা প্রকল্পের ১৭ জন গবেষকদের নিয়ে ৩১ মার্চ ২০২২ খ্রি. তারিখে অনুষ্ঠিত হয় <strong>&quot;গবেষণা রীতি-পদ্ধতি&quot;</strong> শীর্ষক কর্মশালা ।</p>\r\n', '6528dc2fd0f76.jpg', '2023-10-13 06:01:01', '2024-02-15 09:10:17'),
(2, 'দাপ্তরিক কার্যে প্রমিত বাংলা ভাষার ব্যবহার কর্মশালা- ২০২২', '<p><strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong>&nbsp;কর্তৃক ২০২১-২২ অর্থবছরে প্রদানকৃত গবেষণা প্রকল্পের ১৭ জন গবেষকদের নিয়ে ৩১ মার্চ ২০২২ খ্রি. তারিখে অনুষ্ঠিত হয়&nbsp;<strong>&quot;দাপ্তরিক কার্যে প্রমিত বাংলা ভাষার ব্যবহার&quot;</strong>&nbsp;শীর্ষক কর্মশালা ।</p>\r\n', '6528dc826d4be.jpg', '2023-10-13 15:03:09', '2024-02-15 14:51:52'),
(3, 'দাপ্তরিক কার্যে প্রমিত বাংলা ভাষার ব্যবহার - কর্মকর্তাদের প্রশিক্ষণ কর্মশালা- ২০২২', '<p><strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong>&nbsp;কর্তৃক ২০২১-২২ অর্থবছরে প্রদানকৃত গবেষণা প্রকল্পের ১৭ জন গবেষকদের নিয়ে ৩১ মার্চ ২০২২ খ্রি. তারিখে অনুষ্ঠিত হয়&nbsp;<strong>&quot;দাপ্তরিক কার্যে প্রমিত বাংলা ভাষার ব্যবহার - কর্মকর্তাদের প্রশিক্ষণ&quot;</strong>&nbsp;শীর্ষক কর্মশালা ।</p>\r\n', '6528dd0b49788.jpg', '2023-10-13 15:03:15', '2024-02-15 14:52:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_information`
--
ALTER TABLE `admin_information`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art_camp`
--
ALTER TABLE `art_camp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_information`
--
ALTER TABLE `author_information`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_message`
--
ALTER TABLE `director_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentary`
--
ALTER TABLE `documentary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_activities`
--
ALTER TABLE `educational_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infrastructure`
--
ALTER TABLE `infrastructure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_details`
--
ALTER TABLE `institute_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memorandum`
--
ALTER TABLE `memorandum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nazrul_scholarship`
--
ALTER TABLE `nazrul_scholarship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_submission_student`
--
ALTER TABLE `project_submission_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_submission_teacher`
--
ALTER TABLE `project_submission_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_book`
--
ALTER TABLE `publication_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_activities`
--
ALTER TABLE `research_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholarship_students`
--
ALTER TABLE `scholarship_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_years`
--
ALTER TABLE `session_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speech`
--
ALTER TABLE `speech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_shop`
--
ALTER TABLE `work_shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_information`
--
ALTER TABLE `admin_information`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `art_camp`
--
ALTER TABLE `art_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `director_message`
--
ALTER TABLE `director_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documentary`
--
ALTER TABLE `documentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `educational_activities`
--
ALTER TABLE `educational_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fiscal_years`
--
ALTER TABLE `fiscal_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `infrastructure`
--
ALTER TABLE `infrastructure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `institute_details`
--
ALTER TABLE `institute_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memorandum`
--
ALTER TABLE `memorandum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nazrul_scholarship`
--
ALTER TABLE `nazrul_scholarship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_submission_student`
--
ALTER TABLE `project_submission_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_submission_teacher`
--
ALTER TABLE `project_submission_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publication_book`
--
ALTER TABLE `publication_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_activities`
--
ALTER TABLE `research_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `scholarship_students`
--
ALTER TABLE `scholarship_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `session_years`
--
ALTER TABLE `session_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `speech`
--
ALTER TABLE `speech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_shop`
--
ALTER TABLE `work_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
