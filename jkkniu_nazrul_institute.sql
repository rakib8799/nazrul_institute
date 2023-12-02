-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 10:49 PM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title_en`, `details_en`, `title_bd`, `details_bd`, `created_at`) VALUES
(1, 'Brief Introduction to the Institute of Nazrul Studies', '<p>National poet Kazi Nazrul Islam is a symbol of the&nbsp;spirit of the nation. His works have enriched Bengali literature and our lives. Nazrul literature is the charioteer for the development of purity, honesty, good intellect, and open mind in the Bengali mind. <strong>&quot;Jatiya Kabi Kazi Nazrul Islam University&quot;</strong>&nbsp;was established in 2006 in Nazrul memorial, Trishal. This university is conducting educational programs through 24 departments of 6 faculties and one institute.</p>\r\n\r\n<p><strong>&quot;Institute of Nazrul Studies&quot;</strong> was established in 2014 in Jatiya Kabi Kazi Nazrul Islam University to conduct research and academic activities on Nazrul life, literature, and music.&nbsp;</p>\r\n', 'ইন্সটিটিউট অব নজরুল স্টাডিজের সংক্ষিপ্ত পরিচিতি', '<p>জাতীয় কবি কাজী নজরুল ইসলাম জাতির চেতনার প্রতীক । তাঁর সৃষ্টি ও কর্ম বাংলা সাহিত্য এবং আমাদের জীবনকে করেছে ঋদ্ধ । বাঙালি মননে শুদ্ধতা, সততা, শুভবুদ্ধি ও মুক্তবুদ্ধি বিকাশে নজরুল-সাহিত্য সারথি স্বরূপ । নজরুল স্মৃতি বিজরিত ত্রিশালে ২০০৬ সালে প্রতিষ্ঠিত হয় <strong>&quot;জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়&quot;</strong> । এ বিশ্ববিদ্যালয় ০৬টি অনুষদে ২৪টি বিভাগ ও একটি ইন্সটিটিউটের মাধ্যমে শিক্ষা কার্যক্রম পরিচালনা করছে ।</p>\r\n\r\n<p>নজরুল জীবন, সাহিত্য ও সংগীত নিয়ে গবেষণা এবং একাডেমিক কার্যক্রম পরিচালনায়&nbsp;জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ে ২০১৪ সালে প্রতিষ্ঠিত হয়েছে <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> ।</p>\r\n', '2023-10-13 15:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `admin_information`
--

CREATE TABLE `admin_information` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_information`
--

INSERT INTO `admin_information` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `created_at`) VALUES
(1, 'Mehedi Khan Rakib', 'mkrakib007@gmail.com', '$2y$10$gwntBIpYSUdGXZa1VGxcd.LZ2ggWcvAOEXbGGMua04QQldupzM3Mu', '2023-03-11 07:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `advisor_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `advisor_name`, `publisher_name`, `image`, `created_at`) VALUES
(1, '<p>নজরুল প্রতিকৃতি চিত্র অ্যালবাম &quot;কায়ার ছায়ায় নজরুল&quot; (২০২২)</p>\r\n', 'অধ্যাপক ড. সৌমিত্র শেখর', 'মো. সাহাবউদ্দিন, নগরবাসী বর্মন, রাশেদুল আনাম', '6529084f68160.jpg', '2023-10-13 09:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `art_camp`
--

CREATE TABLE `art_camp` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `art_camp`
--

INSERT INTO `art_camp` (`id`, `title`, `details`, `created_at`) VALUES
(1, '<p><strong>&quot;নজরুল প্রতিকৃতি চিত্র&quot; আর্ট-ক্যাম্প-২০১৮</strong></p>\r\n', '<p>নজরুল জন্মজয়ন্তী - ২০১৮ উপলক্ষে গত ১০মে ২০১৮খ্রি. তারিখে ইন্সটিটিউট অব নজরুল স্টাডিজ এবং চারুকলা বিভাগের যৌথ উদ্যোগে&nbsp;নজরুল প্রতিকৃতি চিত্র বিষয়ক <strong>&quot;নজরুল আর্ট ক্যাম্প&quot;</strong> অনুষ্ঠিত হয় । উক্ত আর্ট ক্যাম্পে চারুকলা বিভাগের ৩১জন শিক্ষার্থী অংশগ্রহণ করেন ।</p>\r\n', '2023-06-10 16:58:57');

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
  `verification_code` varchar(8) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `author_information`
--

INSERT INTO `author_information` (`author_id`, `author_name`, `author_email`, `author_contact_no`, `author_password`, `author_role`, `verification_code`, `email_verified_at`) VALUES
(1, 'MK Rakib', 'mkrakib328@gmail.com', '01727027277', '$2y$10$tEjK7bYeXQj9.3NPrfxheu2u3HfNyys0dlguk8DyNmx9z4nXYWFj.', 'Student', '125383', '2023-08-05 09:33:49'),
(2, 'Dr. Jannatul Ferdous', 'mkrcoding1998@gmail.com', '01727027277', '$2y$10$/u3FOMOtSe2H5ALZ0sqeteurrtfN9O93O1l4zkMTl6xurdWxkH.ci', 'Teacher', '330062', '2023-10-15 13:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`id`, `title`, `details`, `image`, `created_at`) VALUES
(1, 'আন্তর্জাতিক নজরুল কনফারেন্স - ২০১৭', '<p>নজরুল সেন্টার ফর সোস্যাল এণ্ড কালচারাল স্টাডিজ, কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারত এবং ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ - এর যৌথ উদ্যোগে&nbsp;কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারতে ২০১৭ সালের জুন মাসে অনুষ্ঠিত হয় তিন দিনব্যাপী <strong>&quot;আন্তর্জাতিক নজরুল কনফারেন্স&quot;</strong> । উক্ত কনফারেন্সে বাংলাদেশ ও ভারতের নজরুল বিশেষজ্ঞ ও গবেষকবৃন্দ অংশগ্রহণ করেন ।</p>\r\n', '6528e8ee36761.jpg', '2023-10-13 06:51:26'),
(2, 'গবেষকদের আন্তর্জাতিক কনফারেন্স - ২০১৯', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং নজরুল সেন্টার ফর সোস্যাল এন্ড কালচারাল স্টাডিজ,&nbsp;কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারত - এর মধ্যে দ্বিপাক্ষিক সমঝোতা চুক্তি Memorandum of Understanding (MoU) স্বাক্ষরিত হয় । উক্ত দ্বিপাক্ষিক&nbsp;সমঝোতা চুক্তির ধারাবাহিকতায়&nbsp;ইন্সটিটিউট অব নজরুল স্টাডিজ,&nbsp;জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়,&nbsp;ত্রিশাল, ময়মনসিংহ, বাংলাদেশ কর্তৃক আয়োজিত দুই বিশ্ববিদ্যালয়ের গবেষকদের নিয়ে <strong>&quot;উচ্চতর গবেষণা রীতি পদ্ধতি : নজরুল ও বাংলা সাহিত্য&quot;</strong> শীর্ষক কর্মশালা গত ২০ ফেব্রুয়ারি ২০১৯ খ্রি. তারিখে অনুষ্ঠিত হয় । উক্ত কনফারেন্সে ১০ জন পিএইচ.ডি. ১ জন এম.ফিল. এবং&nbsp;ইন্সটিটিউট অব নজরুল স্টাডিজ গবেষণা প্রকল্পের ১৪ জন গবেষক অংশগ্রহণ করেন ।</p>\r\n', '6528e8bf04004.jpg', '2023-10-13 06:50:39'),
(3, 'নজরুল জন্মজয়ন্তী উদযাপন', '<p>প্রতি বছর নজরুল জন্মজয়ন্তী উদযাপন উপলক্ষে জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় আয়োজিত সেমিনার, কনফারেন্স ও নজরুল পদক প্রদান অনুষ্ঠানে ইন্সটিটিউট অব নজরুল স্টাডিজ সহযোগিতা এবং গুরুত্বপূর্ণ ভূমিকা পালন করে আসছে ।</p>\r\n', '6528e8f51a9b5.jpg', '2023-10-13 06:51:33'),
(4, 'আন্তর্জাতিক নজরুল কনফারেন্স - ২০২২', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় কর্তৃক গত ০৮ জানুয়ারি ২০২৩ তারিখ রবিবার, দিনব্যাপী&nbsp;International Nazrul Conference on Global &nbsp;Realities of Nazrul Studies (নজরুল অধ্যয়নের বৈশ্বিক বাস্তবতা) শীর্ষক আন্তর্জাতিক নজরুল কনফারেন্সের আয়োজন করা হয়। উক্ত কনফারেন্সে যুক্তরাষ্ট্রের বিভিন্ন বিশ্ববিদ্যালয়ের ০৪ জন আন্তর্জাতিক পর্যায়ের নজরুল গবেষক উপস্থিত ছিলেন ।</p>\r\n', '6528e33276b81.jpg', '2023-10-13 06:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `location`, `contact`, `created_at`) VALUES
(1, 'ins.jkkniu@gmail.com', 'নামাপাড়া-বটতলা, ত্রিশাল, ময়নসিংহ - ২২২৪, বাংলাদেশ', 'টেলিফোন: 0১৫৫৮৩৩৯৯৫৯', '2023-10-13 13:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation`, `created_at`) VALUES
(1, 'পরিচালক (দায়িত্বপ্রাপ্ত)', '2023-04-29 06:52:48'),
(2, 'অতিরিক্ত পরিচালক', '2023-04-29 06:53:44'),
(3, 'পার্সোনাল অফিসার', '2023-04-29 06:54:06'),
(4, 'কেয়ারটেকার', '2023-04-29 06:54:25');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `name`, `designation`, `duration`, `image`, `created_at`) VALUES
(1, 'অধ্যাপক ড. মোহীত উল আলম', 'পরিচালক (দায়িত্বপ্রাপ্ত)', 'সেপ্টেম্বর ২০১৪ - ১২.০৮.২০১৭', '64ccfccd24030.jpg', '2023-08-04 13:27:41'),
(2, 'অধ্যাপক এ এম এম শামসুর রহমান', 'পরিচালক (দায়িত্বপ্রাপ্ত)', '১৩.০৮.২০১৭ - ১৩.১১.২০১৭', '64ccfcd5f261c.jpg', '2023-08-04 13:27:49'),
(3, 'অধ্যাপক ড. এ এইচ এম মোস্তাফিজুর রহমান', 'পরিচালক (দায়িত্বপ্রাপ্ত)', '১৮.১১.২০১৭ - ১৩.১১.২০২১', '64ccfcde44d3f.jpg', '2023-08-04 13:27:58'),
(4, 'অধ্যাপক ড. সৌমিত্র শেখর দে', 'পরিচালক (দায়িত্বপ্রাপ্ত)', '১৯.১২.২০২১ - চলমান', '64ccfce6e1ad7.jpg', '2023-08-04 13:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `director_message`
--

CREATE TABLE `director_message` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director_message`
--

INSERT INTO `director_message` (`id`, `title`, `details`, `created_at`) VALUES
(1, 'বর্তমান ইন্সটিটিউট প্রধানের নাম (মেয়াদকালসহ)', '<p>বিশিষ্ট শিক্ষাবিদ, ভাষাবিদ, নজরুল অধ্যাপক, ঢাকা বিশ্ববিদ্যালয় নজরুল গবেষণা কেন্দ্রের সাবেক পরিচালক ও&nbsp;ঢাকা বিশ্ববিদ্যালয় বাংলা বিভাগের অধ্যাপক এবং জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের মাননীয় উপাচার্য অধ্যাপক ড. সৌমিত্র শেখর <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> - এর পরিচালক (দায়িত্বপ্রাপ্ত) । মেয়াদকাল ১৯.১২.২০২১ থেকে চলমান ।</p>\r\n', '2023-05-22 11:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `documentary`
--

CREATE TABLE `documentary` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `screenplay_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentary`
--

INSERT INTO `documentary` (`id`, `title`, `screenplay_name`, `image`, `created_at`) VALUES
(1, '<p>&quot;চির-বিদ্রোহী&quot; (২০১৬)</p>\r\n', 'তুহিন অবন্ত', '6528eb3c9f5b2.jpg', '2023-10-13 07:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `educational_activities`
--

CREATE TABLE `educational_activities` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_activities`
--

INSERT INTO `educational_activities` (`id`, `title`, `details`, `created_at`) VALUES
(1, 'এম.ফিল. প্রোগ্রাম চালুকরণ', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয় - এর মাননীয় উপাচার্য এবং <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; -&nbsp;</strong>এর পরিচালক (দায়িত্বপ্রাপ্ত) অধ্যাপক ড. সৌমিত্র শেখরের আন্তরিক উদ্যোগে ২০২২-২৩ শিক্ষাবর্ষ থেকে&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>- এ এম.ফিল. প্রোগ্রাম চালু করা হয়েছে ।</p>\r\n', '2023-04-26 16:11:34'),
(2, '\"নজরুল স্টাডিজ\" কোর্সের সিলেবাস প্রণয়ন', '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ে সকল বিভাগে&nbsp;<strong>&quot;নজরুল স্টাডিজ&quot;</strong> আবশ্যিক কোর্স হিসেবে চালু রয়েছে । এই কোর্সের জন্য <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> কর্তৃক একটি অভিন্ন সিলেবাস প্রণয়ন করা হয়েছে ।</p>\r\n', '2023-06-07 08:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`, `created_at`) VALUES
(1, 'কলা', '2023-04-28 18:49:36'),
(2, 'বিজ্ঞান ও প্রযুক্তি', '2023-04-28 18:49:49'),
(3, 'সামাজিক বিজ্ঞান', '2023-04-28 18:49:59'),
(4, 'ব্যবসায় প্রশাসন', '2023-04-28 18:50:09'),
(5, 'চারুকলা', '2023-04-28 18:50:25'),
(6, 'আইন', '2023-04-28 18:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `fiscal_years`
--

CREATE TABLE `fiscal_years` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fiscal_years`
--

INSERT INTO `fiscal_years` (`id`, `fiscal_year`, `created_at`) VALUES
(1, '২০১৫-১৬', '2023-04-29 06:52:48'),
(2, '২০১৬-১৭', '2023-04-29 06:53:44'),
(3, '২০১৭-১৮', '2023-04-29 06:54:06'),
(4, '২০১৮-১৯', '2023-04-29 06:54:25'),
(5, '২০১৯-২০', '2023-04-29 06:54:43'),
(6, '২০২০-২১', '2023-04-29 06:55:00'),
(7, '২০২১-২২', '2023-04-29 06:55:20'),
(8, '২০২২-২৩', '2023-04-29 06:55:50'),
(9, '২০২৩-২8', '2023-10-13 07:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE `infrastructure` (
  `id` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `details`, `created_at`) VALUES
(1, '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়ের মাননীয় উপাচার্য বিশিষ্ট নজরুল গবেষক অধ্যাপক ড. সৌমিত্র শেখর মহোদয়ের ঐকান্তিক চেষ্টায় ১০ তলা বিশিষ্ট একটি আধুনিক ইন্সটিটিউট ভবন নির্মাণ প্রক্রিয়াধীন । উক্ত ইন্সটিটিউট ভবন নির্মাণ কাজ সম্মন্ন হলে আন্তর্জাতিক পর্যায়ে গবেষণার সুযোগ সৃষ্টি হবে ।</p>\r\n', '2023-04-28 08:45:43');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institute_details`
--

INSERT INTO `institute_details` (`id`, `name`, `founding_period`, `aim`, `target`, `created_at`) VALUES
(1, 'ইন্সটিটিউট অব নজরুল স্টাডিজ', '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ প্রতিষ্ঠিত হয় ২০১৪ খ্রিস্টাব্দে ।</p>\r\n', '<p>জাতীয় কবি কাজী নজরুল ইসলামের অমর স্মৃতি রক্ষা, তাঁর জীবন ও সাহিত্য, সংগীত ও সামগ্রিক অবদান সম্পর্কে পাঠদান, গবেষণা পরিচালনা, রচনাবলি সংগ্রহ, সংরক্ষণ, প্রকাশনা ও প্রচার এবং তাঁর ভাবমূর্তি দেশে-বিদেশে উজ্জ্বলরূপে তুলে ধরা <strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>এর লক্ষ্য ।</p>\r\n', '<p>কাজী নজরুল ইসলামের জীবন, সাহিত্য ও সৃষ্টিকর্মকে স্মরণীয় করে রাখার জন্য&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>একটি প্রাতিষ্ঠানিক বা একাডেমিক পদক্ষেপ । বাংলা সাহিত্য, সংস্কৃতি ও সভ্যতার সমৃদ্ধি নির্মাণে কাজী নজরুল ইসলামের অবদান অবিস্মরণীয় এবং তা আমাদের জীবনের উত্তোরত্তর বিকাশের সঙ্গে অবিচ্ছেদ্য । তাই কাজী নজরুল ইসলামের জীবন, সাহিত্য ও সংগীত সংক্রান্ত উপকরণসমূহ সংগ্রহ, অনুশীলন, সংরক্ষণ, গবেষণা, প্রকাশনা ও শিক্ষা কার্যক্রম পরিচালনা দায়িত্ব পালন&nbsp;<strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot; </strong>এর উদ্দ্যেশ্য ।&nbsp;</p>\r\n', '2023-04-23 06:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `title`, `image`, `pdf_file`, `created_at`) VALUES
(1, '<p>নজরুল বিষয়ক আন্তর্জাতিক গবেষণাপত্র &quot;নজরুল-জার্নাল&quot; ১ম সংখ্যা-২০২০</p>\r\n', '6528ea7d37a17.jpg', '6528eafe3a4dd.pdf', '2023-10-13 07:00:14'),
(2, '<p>নজরুল বিষয়ক আন্তর্জাতিক গবেষণাপত্র &quot;নজরুল-জার্নাল&quot; ২য় সংখ্যা-২০২২</p>\r\n', '6528ea967b81c.jpg', '65295312c68a1.pdf', '2023-10-13 14:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `details`, `created_at`) VALUES
(1, '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ - এ নজরুল রচনাসমগ্র, নজরুল জীবন ও সাহিত্য, সংগীত সম্পর্কিত গ্রন্থ এবং অন্যান্য সৃজনশীল গ্রন্থ, পত্র-পত্রিকা সমৃদ্ধ গ্রন্থাগার স্থাপন করা হয়েছে ।</p>\r\n', '2023-04-28 08:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `memorandum`
--

CREATE TABLE `memorandum` (
  `id` int(11) NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memorandum`
--

INSERT INTO `memorandum` (`id`, `details`, `created_at`) VALUES
(1, '<p>ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং নজরুল সেন্টার ফর সোস্যাল এন্ড কালচারাল স্টাডিজ, কাজী নজরুল বিশ্ববিদ্যালয়, আসানসোল, পশ্চিমবঙ্গ, ভারত - এর মধ্যে গত ২৭.০৬.২০১৮ খ্রি. তারিখে নজরুল জীবন ও কর্ম বিষয়ে গবেষণা এবং একাডেমিক কার্যক্রম পরিচালনার লক্ষ্যে <strong>দ্বিপাক্ষিক সমঝোতা চুক্তি</strong> <strong>Memorandum of Understanding (MoU)</strong> স্বাক্ষরিত হয় ।</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 31px; top: 101.391px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '2023-10-13 07:05:04'),
(2, '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং Ferdowsi University of Mashhad, Iran - এর মধ্যে গত ১২.১১.২০১৯ খ্রি. তারিখ <strong>দ্বিপাক্ষিক সমঝোতা চুক্তি Memorandum of Understanding (MoU)</strong> &nbsp;স্বাক্ষরিত হয় । উক্ত দ্বি-পাক্ষিক সমঝোতা চুক্তিতে নজরুল জীবন ও কর্ম বিষয়ে গবেষণার সুযোগ রয়েছে ।</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 611px; top: 14.7969px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '2023-10-13 13:31:35'),
(3, '<p>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ, বাংলাদেশ এবং ডাউন টাউন বিশ্ববিদ্যালয়, আসাম, ভারত - এর মধ্যে গত ০৩.০৮.২০২২ খ্রি. তারিখ <strong>দ্বিপাক্ষিক সমঝোতা চুক্তি</strong> <strong>Memorandum of Understanding (MoU)</strong>&nbsp;স্বাক্ষরিত হয় । উক্ত দ্বি-পাক্ষিক সমঝোতা চুক্তিতে নজরুল জীবন ও কর্ম বিষয়ে গবেষণার সুযোগ রয়েছে ।</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2023-10-13 13:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `nazrul_scholarship`
--

CREATE TABLE `nazrul_scholarship` (
  `id` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `scholarship` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nazrul_scholarship`
--

INSERT INTO `nazrul_scholarship` (`id`, `faculty`, `scholarship`, `created_at`) VALUES
(1, 'কলা', 'প্রমীলা', '2023-04-28 19:12:32'),
(2, 'বিজ্ঞান ও প্রযুক্তি', 'কাজী সব্যসাচী', '2023-04-28 19:13:05'),
(3, 'সামাজিক বিজ্ঞান', 'কাজী অনিরুদ্ধ', '2023-04-28 19:13:37'),
(4, 'ব্যবসায় প্রশাসন', 'বুলবুল', '2023-04-28 19:13:58'),
(5, 'চারুকলা', 'উমা কাজী', '2023-04-28 19:14:16'),
(6, 'আইন', 'কল্যাণী কাজী', '2023-04-28 19:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `pdf_file`, `created_at`) VALUES
(1, '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র আহবান - ২০২১ এবং এই বিশ্ববিদ্যালয়ের স্নাতকোত্তর পর্যায়ে নজরুল জীবন ও সৃষ্টিকর্ম বিষয়ক অভিসন্দর্ভ (Thesis) রচনার জন্য কোর্স শিক্ষক/গবেষণা তত্ত্বাবধায়কের সুপারিশসহ আবেদনপত্র আহবান ।</p>\r\n', '652947d48e777.pdf', '2023-10-13 15:41:49'),
(2, '<p><strong>&quot;নজরুল জীবন ও কর্মবিষয়ক&quot;&nbsp;</strong>গবেষণা প্রকল্পের প্রস্তাবনা আবেদনপত্র আহবান - ২০২২ এবং এই বিশ্ববিদ্যালয়ের স্নাতকোত্তর পর্যায়ে নজরুল জীবন ও সৃষ্টিকর্ম বিষয়ক অভিসন্দর্ভ (Thesis) রচনার জন্য কোর্স শিক্ষক/গবেষণা তত্ত্বাবধায়কের সুপারিশসহ আবেদনপত্র আহবান ।</p>\r\n', '652965486bc30.pdf', '2023-10-13 15:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `designation`, `image`, `created_at`) VALUES
(1, 'রাশেদুল আনাম', 'অতিরিক্ত পরিচালক', '6528d8d0097f8.png', '2023-10-13 05:42:40'),
(2, 'মাহমুদুর রহমান আনসারী', 'পার্সোনাল অফিসার', '6528d8d53f118.png', '2023-10-13 05:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `project_submission_student`
--

CREATE TABLE `project_submission_student` (
  `id` int(11) NOT NULL,
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
  `researcher_final_report_file` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_submission_teacher`
--

CREATE TABLE `project_submission_teacher` (
  `id` int(11) NOT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publication_book`
--

CREATE TABLE `publication_book` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication_book`
--

INSERT INTO `publication_book` (`id`, `book_name`, `publisher_name`, `image`, `created_at`) VALUES
(1, 'নজরুলের ত্রিশাল আগমনের একশ বছর (২০১৫)', 'মোহীত উল আলম, রাশেদুল আনাম', '6528e9cb82476.jpg', '2023-10-13 06:55:07'),
(2, 'নজরুল-বীক্ষা (২০১৭)', 'মোহীত উল আলম, রাশেদুল আনাম', '6528e9d08340f.jpg', '2023-10-13 06:55:12'),
(3, 'নজরুল-মানসলোক (২০১৮)', 'মো. সাহাবউদ্দিন, রাশেদুল আনাম', '6528e9d476d6e.jpg', '2023-10-13 06:55:16'),
(4, 'বঙ্গবন্ধুর বাংলাদেশে নজরুল (২০২২)', 'সৌমিত্র শেখর', '6528e9de88e71.jpg', '2023-10-13 06:55:26'),
(5, 'নজরুল স্টাডিজ পাঠ্যপুস্তক (২০২২)', 'সৌমিত্র শেখর, রাশেদুল আনাম', '6528e9e3b2aaf.jpg', '2023-10-13 06:55:31'),
(6, 'ফিলাটেলিক নজরুল (২০২৩)', 'রাশেদ সুখন', '6528e9fde4989.png', '2023-10-13 06:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pdf_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `pdf_file`, `created_at`) VALUES
(1, 'প্রতিবেদন-২০২২', '65294f503a69b.pdf', '2023-10-13 14:08:16'),
(2, 'প্রতিবেদন-২০২৩', '65294f8abedc7.pdf', '2023-10-13 14:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `research_activities`
--

CREATE TABLE `research_activities` (
  `id` int(11) NOT NULL,
  `fiscal_year` varchar(100) NOT NULL,
  `researcher_number` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_activities`
--

INSERT INTO `research_activities` (`id`, `fiscal_year`, `researcher_number`, `created_at`) VALUES
(1, '২০১৫-১৬', '১ জন গবেষক', '2023-06-05 18:28:08'),
(2, '২০১৬-১৭', '১ জন গবেষক', '2023-06-05 18:28:22'),
(3, '২০১৭-১৮', '৩ জন গবেষক', '2023-06-05 18:28:29'),
(4, '২০১৮-১৯', '৬ জন গবেষক', '2023-06-05 18:28:39'),
(5, '২০১৯-২০', '১৫ জন গবেষক', '2023-10-13 07:21:13'),
(6, '২০২০-২১', 'করোনাকাল', '2023-06-05 18:29:07'),
(7, '২০২১-২২', '১৭ জন গবেষক', '2023-06-05 18:29:24'),
(8, '২০২২-২৩', '২৪ জন গবেষক', '2023-10-13 07:26:37'),
(9, '২০২৩-২8', 'চলমান', '2023-10-13 07:30:56');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship_students`
--

INSERT INTO `scholarship_students` (`id`, `fiscal_year`, `session_year`, `faculty`, `department`, `scholarship_student`, `created_at`) VALUES
(1, '২০১৫-১৬', '২০০৮-০৯', '৪ টি', '৬ টি', '৭ জন', '2023-10-13 07:31:30'),
(2, '২০১৬-১৭', '২০০৯-১০', '৪ টি', '৮ টি', '৮ জন', '2023-10-13 07:31:47'),
(3, '২০১৭-১৮', '২০১০-১১', '৪ টি', '১১ টি', '১১ জন', '2023-10-13 07:32:04'),
(4, '২০১৮-১৯', '২০১১-১২', '৪ টি', '১১ টি', '১২ জন', '2023-10-13 07:32:26'),
(5, '২০১৯-২০', '২০১২-১৩', '৪ টি', '১১ টি', '১৩ জন', '2023-10-13 07:32:51'),
(6, '২০২০-২১', '২০১৩-১৪', '৫ টি', '১২ টি', '১২ জন', '2023-10-13 07:33:14'),
(7, '২০২১-২২', '২০১৪-১৫', '৫ টি', '১২ টি', '১২ জন', '2023-10-13 07:33:36'),
(8, '২০২২-২৩', '২০১৫-১৬', '৬ টি', '১৬ টি', '১৬ জন', '2023-10-13 07:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `title`, `created_at`) VALUES
(1, 'কাজী নজরুল ইসলাম ও নেতাজী সুভাষচন্দ্র বসু (২০১৮)', '2023-04-28 08:00:46'),
(2, 'ঈশ্বরচন্দ্র বিদ্যাসাগর জন্মদ্বিশতবর্ষ : বিদ্যাসাগর ও মানবতাবাদ (২০২০)', '2023-04-28 08:01:56'),
(3, 'বিদ্রোহী কবিতার শতবর্ষ : বঙ্গবন্ধু ও নজরুল (২০২১)', '2023-04-28 08:02:49'),
(4, 'বঙ্গবন্ধুর চোখে নেতাজি ও নজরুল -৭ (২০২১)', '2023-04-28 08:03:37'),
(5, 'গবেষণা প্রকল্প অগ্রগতি সেমিনার (২০২২)', '2023-04-28 08:04:16'),
(6, 'নজরুল ও নারী মুক্তি (২০২৩)', '2023-10-13 06:18:36'),
(7, 'একুশ শতকে নজরুল (২০২৩)', '2023-10-13 06:18:42'),
(8, 'বাংলার শিক্ষা বঞ্চনার ইতিহাস : নজরুলের শিক্ষা চিন্তার প্রাসঙ্গিকতা (২০২৩)', '2023-10-13 06:18:54'),
(9, 'নজরুল জীবন ও মনন (২০২৩)', '2023-10-13 06:19:07'),
(10, 'নজরুলের রচনায় নটরাজ (২০২৩)', '2023-10-13 06:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `session_years`
--

CREATE TABLE `session_years` (
  `id` int(11) NOT NULL,
  `session_year` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_years`
--

INSERT INTO `session_years` (`id`, `session_year`, `created_at`) VALUES
(1, '২০০৮-০৯', '2023-04-29 06:52:48'),
(2, '২০০৯-১০', '2023-04-29 06:53:44'),
(3, '২০১০-১১', '2023-04-29 06:54:06'),
(4, '২০১১-১২', '2023-04-29 06:54:25'),
(5, '২০১২-১৩', '2023-04-29 06:54:43'),
(6, '২০১৩-১৪', '2023-04-29 06:55:00'),
(7, '২০১৪-১৫', '2023-04-29 06:55:20'),
(8, '২০১৫-১৬', '2023-04-29 06:55:50'),
(9, '২০১৬-১৭', '2023-10-13 08:00:15'),
(10, '২০১৭-১৮', '2023-10-13 08:00:24'),
(11, '২০১৮-১৯', '2023-10-13 08:00:33'),
(12, '২০১৯-২০', '2023-10-13 08:02:17'),
(13, '২০২০-২১', '2023-10-13 08:02:22'),
(14, '২০২১-২২', '2023-10-13 08:02:28'),
(15, '২০২২-২৩', '2023-10-13 08:02:32'),
(16, '২০২৩-২৪', '2023-10-13 08:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `speech`
--

CREATE TABLE `speech` (
  `id` int(11) NOT NULL,
  `speech_name` varchar(255) NOT NULL,
  `speaker_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speech`
--

INSERT INTO `speech` (`id`, `speech_name`, `speaker_name`, `image`, `created_at`) VALUES
(1, 'নজরুলের বিদ্রোহী সত্তা (২০১৫)', 'অধ্যাপক ড. মোহীত উল আলম', '6528dabd07987.jpg', '2023-10-13 05:50:53'),
(2, 'নজরুলের লাঙল (২০১৫)', 'অধ্যাপক ড. সৌমিত্র শেখর', '6528dac407504.jpg', '2023-10-13 05:51:00'),
(3, 'নজরুল সাহিত্য : প্রসঙ্গ সৈনিক জীবন (২০১৭)', 'অধ্যাপক ড. মো. সাহাবউদ্দিন', '6528dac9a2dd9.jpg', '2023-10-13 05:51:05'),
(4, 'সুভাষ-নজরুল আদর্শের সাদৃশ্য ও বর্তমান (২০১৭)', 'ড. জয়ন্ত চৌধুরি', '65295b953cef0.jpg', '2023-10-13 15:00:37'),
(5, 'ভারতবর্ষের স্বাধীনতা সংগ্রামে নজরুল (২০১৮)', 'ড. মো. সাইফুল ইসলাম', '65295bcc0b215.jpg', '2023-10-13 15:01:32'),
(6, 'মোসলেম ভারত এবং নজরুল ও তাঁর অগ্রন্থিত রচনা (২০২২)', 'অধ্যাপক ড. সৌমিত্র শেখর', '6528dadbbd622.jpg', '2023-10-13 05:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `designation`, `image`, `created_at`) VALUES
(1, 'মুহাম্মদ আবুল হাসনাত', 'কেয়ারটেকার', '6528d908957fa.png', '2023-10-13 05:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `title`, `image`, `created_at`) VALUES
(1, 'নজরুল স্টাডিজ অভিন্ন পাঠক্রম (২০১৮)', '652b09463c694.png', '2023-10-14 21:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `details` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `title`, `details`, `created_at`) VALUES
(1, '<p><strong>&quot;দাপ্তরিক কাজে প্রমিত বাংলা ভাষার ব্যবহার&quot; প্রশিক্ষণ - ২০২১ (১ম পর্যায়)</strong></p>\r\n', '<p>জেলা প্রশাসন, ময়মনসিংহ - এর অর্থায়নে ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ কর্তৃক আয়োজিত &quot;প্রশাসনিক কাজে প্রমিত বাংলা ভাষার ব্যবহার&quot; শীর্ষক প্রশিক্ষণ - ২০২১ গত ০৮/১১/২০২১ তারিখে অনুষ্ঠিত হয় । উক্ত প্রশিক্ষণে অত্র বিশ্ববিদ্যালয়ের ১০ম গ্রেডের ৩৫ জন কর্মকর্তা অংশগ্রহণ করেন ।</p>\r\n', '2023-06-10 16:59:25'),
(2, '<p><strong>&quot;প্রশাসনিক কাজে প্রমিত বাংলা ভাষার ব্যবহার&quot; প্রশিক্ষণ - ২০২২ (২য় পর্যায়)</strong></p>\r\n', '<p>জেলা প্রশাসন, ময়মনসিংহ - এর অর্থায়নে ইন্সটিটিউট অব নজরুল স্টাডিজ, জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়, ত্রিশাল, ময়মনসিংহ কর্তৃক আয়োজিত &quot;প্রশাসনিক কাজে প্রমিত বাংলা ভাষার ব্যবহার&quot; শীর্ষক প্রশিক্ষণ - ২০২২ গত ১৯/০৯/২০২২ তারিখে অনুষ্ঠিত হয় । উক্ত প্রশিক্ষণে অত্র বিশ্ববিদ্যালয়ের ৯ম গ্রেডের ৪০ জন কর্মকর্তা অংশগ্রহণ করেন ।</p>\r\n', '2023-06-10 16:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `work_shop`
--

CREATE TABLE `work_shop` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_shop`
--

INSERT INTO `work_shop` (`id`, `title`, `details`, `image`, `created_at`) VALUES
(1, 'গবেষণা রীতি-পদ্ধতি কর্মশালা - ২০২২', '<p><strong>&quot;ইন্সটিটিউট অব নজরুল স্টাডিজ&quot;</strong> কর্তৃক ২০২১-২২ অর্থবছরে প্রদানকৃত গবেষণা প্রকল্পের ১৭ জন গবেষকদের নিয়ে ৩১ মার্চ ২০২২ খ্রি. তারিখে অনুষ্ঠিত হয় <strong>&quot;গবেষণা রীতি-পদ্ধতি&quot;</strong> শীর্ষক কর্মশালা ।</p>\r\n', '6528dc2fd0f76.jpg', '2023-10-13 06:01:01'),
(2, 'দাপ্তরিক কার্যে প্রমিত বাংলা ভাষার ব্যবহার কর্মশালা- ২০২২', '<p>&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -10px; top: 39px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '6528dc826d4be.jpg', '2023-10-13 15:03:09'),
(3, 'দাপ্তরিক কার্যে প্রমিত বাংলা ভাষার ব্যবহার - কর্মকর্তাদের প্রশিক্ষণ কর্মশালা- ২০২২', '<p>&nbsp;</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -143px; top: -6px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '6528dd0b49788.jpg', '2023-10-13 15:03:15');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `art_camp`
--
ALTER TABLE `art_camp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author_information`
--
ALTER TABLE `author_information`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `educational_activities`
--
ALTER TABLE `educational_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memorandum`
--
ALTER TABLE `memorandum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nazrul_scholarship`
--
ALTER TABLE `nazrul_scholarship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_submission_student`
--
ALTER TABLE `project_submission_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_submission_teacher`
--
ALTER TABLE `project_submission_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publication_book`
--
ALTER TABLE `publication_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `research_activities`
--
ALTER TABLE `research_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scholarship_students`
--
ALTER TABLE `scholarship_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `session_years`
--
ALTER TABLE `session_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `speech`
--
ALTER TABLE `speech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_shop`
--
ALTER TABLE `work_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
