-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2022 at 11:50 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenyahot_hrmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_me`
--

CREATE TABLE `about_me` (
  `id` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `about_me` varchar(500) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_me`
--

INSERT INTO `about_me` (`id`, `email`, `about_me`, `date_created`, `time_recorded`) VALUES
(4, 'pitarcheizin@gmail.com', 'Resource Person', '25-Nov-2020', '2020-11-25 13:41:10'),
(5, 'pitarcheizin@gmail.com', 'Resource Person', '25-Nov-2020', '2020-11-25 13:41:11'),
(6, 'cma@gmail.com', 'Regulator', '30-Nov-2020', '2020-11-30 15:15:55'),
(7, 'rose@gmail.com', 'About Me ', '04-Dec-2020', '2020-12-04 11:09:11'),
(8, 'caro88njoroge@gmail.com', 'Resourceful person', '13-Dec-2020', '2020-12-13 17:21:41'),
(9, 'bonface@gmail.com', 'About myself info', '22-Feb-2121', '2021-02-22 08:09:11'),
(10, 'inventory@panoramaengineering.com', 'About me', '25-Mar-2121', '2021-03-25 10:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `action_name` varchar(100) NOT NULL,
  `action_reference` varchar(3000) NOT NULL,
  `action_icon` varchar(100) DEFAULT NULL,
  `page_id` varchar(100) NOT NULL,
  `time_recorded` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `all_evidence_document`
--

CREATE TABLE `all_evidence_document` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `cv` varchar(100) DEFAULT NULL,
  `college_doc` varchar(100) DEFAULT NULL,
  `kcse_doc` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_evidence_document`
--

INSERT INTO `all_evidence_document` (`id`, `reference_no`, `cv`, `college_doc`, `kcse_doc`, `time_recorded`, `recorded_by`) VALUES
(1, 'cma@gmail.com', 'ENGLAND PREMIER LEAGUE NEW SEASON.docx', 'ENGLAND PREMIER LEAGUE NEW SEASON (3) (2).docx', 'Compassionate Pentecostal gospel fellowship Authorisation.docx', '2020-12-11 22:30:38', 'CMA'),
(3, 'personell@gmail.com', 'ENGLAND PREMIER LEAGUE NEW SEASON (8).docx', 'Valuation - draft 4.docx', 'ENGLAND PREMIER LEAGUE NEW SEASON (7).docx', '2020-12-22 08:06:00', 'potential'),
(4, 'bonface@gmail.com', 'ENGLAND PREMIER LEAGUE NEW SEASON (3) (2).docx', 'CCMP DISCUSSION JAMES KIVUVA.docx', 'RISKSYS Kenya Revenue Authority.docx', '2021-02-22 08:36:11', 'Kariuki'),
(5, 'pitarcheizin@gmail.com', 'RISKSYS Kenya Revenue Authority.docx', 'PKARIUKI CV.pdf', 'Compassionate Pentecostal gospel fellowship Authorisation.docx', '2021-04-06 10:42:54', 'PETER'),
(6, 'prchege@gmail.com', 'Kariuki Peter CV.pdf', 'Software developer cv.pdf', 'Equity Bank CMS Developer Cover Letter.pdf', '2021-07-26 11:15:58', 'Petre ');

-- --------------------------------------------------------

--
-- Table structure for table `answered_response_test`
--

CREATE TABLE `answered_response_test` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `response_name` varchar(100) DEFAULT NULL,
  `marks` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answered_response_test`
--

INSERT INTO `answered_response_test` (`id`, `reference_no`, `email`, `response_name`, `marks`, `remarks`, `time_recorded`) VALUES
(21, '29', 'prchege@gmail.com', '<ol>\r\n	<li>This is my reponse</li>\r\n</ol>\r\n\r\n<p>review 1</p>\r\n\r\n<ol>\r\n	<li>Response 2</li>\r\n</ol>\r\n\r', '90', 'Pass', '2021-08-01 01:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `answered_test`
--

CREATE TABLE `answered_test` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `answer_name` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT 'On Review',
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answered_test`
--

INSERT INTO `answered_test` (`id`, `reference_no`, `email`, `answer_name`, `remarks`, `time_recorded`) VALUES
(29, '22', 'prchege@gmail.com', '<ol>\r\n	<li>This is my reponse</li>\r\n	<li>Response 2</li>\r\n	<li>response 3</li>\r\n</ol>\r\n', 'On Review', '2021-08-01 01:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `answered_test2`
--

CREATE TABLE `answered_test2` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `answer_name` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT 'On Review',
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answered_test2`
--

INSERT INTO `answered_test2` (`id`, `reference_no`, `email`, `answer_name`, `remarks`, `time_recorded`) VALUES
(1, '12', 'dan@gmail.com', 'ANSWER FOR CCNP ALL', 'On Review', '2021-01-12 08:47:09'),
(2, '11', 'training@gmail.com', 'Finance answer\r\nTrial balance answer\r\nbalance sheet answer', 'On Review', '2021-01-12 09:19:59'),
(3, '9', 't@gmail.com', 'Answer cyber security', 'On Review', '2021-01-12 09:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `id` int(6) NOT NULL,
  `status_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`id`, `status_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'Screening', '2020-12-09 09:44:23', 'PETER KARIUKI'),
(2, 'Testing', '2020-12-09 09:44:23', 'PETER KARIUKI'),
(3, 'Shortlisted', '2020-12-09 09:44:50', 'PETER KARIUKI'),
(4, 'Successful', '2020-12-09 09:44:50', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `application_status_details`
--

CREATE TABLE `application_status_details` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_name` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_status_details`
--

INSERT INTO `application_status_details` (`id`, `reference_no`, `email`, `status_name`, `url`, `time_recorded`, `recorded_by`) VALUES
(43, '35', 'prchege@gmail.com', 'Testing', NULL, '2021-08-01 00:54:20', 'Potential staffing');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `id` int(6) NOT NULL,
  `job_posting_id` varchar(100) DEFAULT NULL,
  `applicant_email` varchar(100) DEFAULT NULL,
  `cover_letter` varchar(1000) DEFAULT NULL,
  `job_status` varchar(100) NOT NULL DEFAULT 'Applied',
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`id`, `job_posting_id`, `applicant_email`, `cover_letter`, `job_status`, `time_recorded`, `recorded_by`) VALUES
(35, '35', 'prchege@gmail.com', 'Cover letter', 'Applied', '2021-08-01 00:50:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_test`
--

CREATE TABLE `assigned_test` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `posted_job` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_test`
--

INSERT INTO `assigned_test` (`id`, `reference_no`, `posted_job`, `time_recorded`, `recorded_by`) VALUES
(22, '234', 'Human Resources Executive', '2021-08-01 00:46:39', 'PETER');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(100) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `award_name` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `year_received` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `reference_no`, `email`, `award_name`, `institution`, `type`, `year_received`, `date_created`, `time_recorded`) VALUES
(1, NULL, 'pitarcheizin@gmail.com', 'IT security', 'Cyber roam', 'Certificate', '11-Feb-2020', '26-Nov-2020', '2020-11-26 12:25:07'),
(2, NULL, 'pitarcheizin@gmail.com', 'IT Audit', 'ISACA', 'Award', '18-Nov-2020', '26-Nov-2020', '2020-11-26 12:28:19'),
(3, NULL, 'rose@gmail.com', 'COmp', 'KICT', 'Award', '08-Dec-2020', '04-Dec-2020', '2020-12-04 11:15:44'),
(4, '7253', 'p3@gmail.com', 'ICT', 'KCA', 'Certificate', '21-Dec-2020', '22-Dec-2020', '2020-12-22 07:46:12'),
(6, NULL, 'bonface@gmail.com', 'ICT Suport', 'IAT', 'Certificate', '15-Jul-2015', '22-Feb-2121', '2021-02-22 08:14:37'),
(7, NULL, 'carol@gmail.com', 'CPA', 'IAT', 'Award', '16-Jun-2020', '02-Mar-2121', '2021-03-02 15:48:08'),
(8, NULL, 'inventory@panoramaengineering.com', 'Communication', 'IAT', 'Award', '10-Mar-2021', '25-Mar-2121', '2021-03-25 10:04:02'),
(9, NULL, 'prchege@gmail.com', 'Cisco Certified Network associate routing and switching', 'Computer Pride', 'Certificate', '30-Dec-2016', '26-Jul-2121', '2021-07-26 19:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `award_type`
--

CREATE TABLE `award_type` (
  `id` int(6) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award_type`
--

INSERT INTO `award_type` (`id`, `type`, `time_recorded`, `recorded_by`) VALUES
(1, 'Award', '2020-11-26 12:04:46', 'PETER KARIUKI'),
(2, 'Certificate', '2020-11-26 12:04:46', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_branch` varchar(100) DEFAULT NULL,
  `account_no` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Active',
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `reference_no`, `bank_name`, `bank_branch`, `account_no`, `status`, `time_recorded`) VALUES
(17, '7253', 'Family Bank', 'Kenyatta Avenue', '1234567', 'Active', '2020-12-21 07:13:15'),
(18, '7253', 'Equity Bank', 'Moi Avenue', '12321312', 'Active', '2020-12-23 06:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `bulk_email`
--

CREATE TABLE `bulk_email` (
  `id` int(6) NOT NULL,
  `sendTo` varchar(100) DEFAULT NULL,
  `message` varchar(20000) DEFAULT NULL,
  `access_level` varchar(100) NOT NULL DEFAULT 'recruiter',
  `attachement` varchar(500) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk_email`
--

INSERT INTO `bulk_email` (`id`, `sendTo`, `message`, `access_level`, `attachement`, `time_recorded`, `recorded_by`) VALUES
(29, '', '<p>Hello marketing.</p>\r\n', 'recruiter', NULL, '2021-07-31 14:54:32', 'PETER'),
(30, '', '<p>Hello Carol New Catch Lovey Dovey</p>\r\n', 'recruiter', NULL, '2021-07-31 15:04:22', 'PETER'),
(31, '', '<p>Hello Carol. Lovey Dovey</p>\r\n', 'recruiter', NULL, '2021-07-31 15:05:36', 'PETER'),
(33, '', '', 'recruiter', NULL, '2021-08-19 19:50:15', 'PETER'),
(34, '', '', 'recruiter', NULL, '2021-08-19 19:52:39', 'PETER'),
(35, '', '', 'recruiter', NULL, '2021-08-20 06:17:32', 'PETER'),
(36, '', '', 'recruiter', NULL, '2021-08-20 06:19:27', 'PETER'),
(37, '', '<p>hello testing mail</p>\r\n', 'recruiter', NULL, '2021-08-20 06:37:47', 'PETER'),
(38, '', '', 'recruiter', NULL, '2021-08-20 07:08:48', 'PETER'),
(39, '', '<p>vfgdgd</p>\r\n', 'recruiter', NULL, '2021-08-20 07:15:11', 'PETER'),
(40, '', '<p>jhgfcfghujiop;kjhgfdfgyuiop</p>\r\n', 'recruiter', NULL, '2021-08-20 07:18:32', 'PETER'),
(41, '', '<p><strong>gvhjkv&nbsp; bbbb</strong></p>\r\n', 'recruiter', NULL, '2021-08-30 17:03:12', 'Njoroge'),
(42, '', '', 'recruiter', NULL, '2022-02-12 09:00:26', 'PETER'),
(43, '', '<p>Hello Potential staffing</p>\r\n', 'recruiter', NULL, '2022-02-12 09:01:07', 'PETER');

-- --------------------------------------------------------

--
-- Table structure for table `bulk_email_multiple`
--

CREATE TABLE `bulk_email_multiple` (
  `id` int(6) NOT NULL,
  `mail_details` varchar(5000) DEFAULT NULL,
  `mail_address` varchar(100) DEFAULT NULL,
  `recorded_by` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk_email_multiple`
--

INSERT INTO `bulk_email_multiple` (`id`, `mail_details`, `mail_address`, `recorded_by`, `time_recorded`) VALUES
(67, '<p>Hello marketing.</p>\r\n', 'caro88njoroge@gmail.com', 'PETER', '2021-07-31 14:54:32'),
(68, '<p>Hello marketing.</p>\r\n', 'pitarcheizin@gmail.com', 'PETER', '2021-07-31 14:54:32'),
(69, '<p>Hello marketing.</p>\r\n', 'prchege@gmail.com', 'PETER', '2021-07-31 14:54:32'),
(70, '<p>Hello marketing.</p>\r\n', 'info@potentialstaffing.com', 'PETER', '2021-07-31 14:54:32'),
(71, '<p>Hello marketing.</p>\r\n', 'pchege@students.uonbi.ac.ke', 'PETER', '2021-07-31 14:54:32'),
(72, '<p>Hello Carol New Catch Lovey Dovey</p>\r\n', 'caro88njoroge@gmail.com', 'PETER', '2021-07-31 15:04:22'),
(73, '<p>Hello Carol New Catch Lovey Dovey</p>\r\n', 'pitarcheizin@gmail.com', 'PETER', '2021-07-31 15:04:22'),
(74, '<p>Hello Carol New Catch Lovey Dovey</p>\r\n', 'prchege@gmail.com', 'PETER', '2021-07-31 15:04:22'),
(75, '<p>Hello Carol New Catch Lovey Dovey</p>\r\n', 'info@potentialstaffing.com', 'PETER', '2021-07-31 15:04:22'),
(76, '<p>Hello Carol New Catch Lovey Dovey</p>\r\n', 'pchege@students.uonbi.ac.ke', 'PETER', '2021-07-31 15:04:22'),
(78, '<p>Hello Carol. Lovey Dovey</p>\r\n', 'pitarcheizin@gmail.com', 'PETER', '2021-07-31 15:05:36'),
(79, '<p>Hello Carol. Lovey Dovey</p>\r\n', 'prchege@gmail.com', 'PETER', '2021-07-31 15:05:36'),
(80, '<p>Hello Carol. Lovey Dovey</p>\r\n', 'info@potentialstaffing.com', 'PETER', '2021-07-31 15:05:36'),
(81, '<p>Hello Carol. Lovey Dovey</p>\r\n', 'pchege@students.uonbi.ac.ke', 'PETER', '2021-07-31 15:05:36'),
(82, '', 'muthuivictoria03@gmail.com', 'PETER', '2021-08-05 08:29:04'),
(83, '', 'caro88njoroge@gmail.com', 'PETER', '2021-08-05 08:29:04'),
(84, '', 'pitarcheizin@gmail.com', 'PETER', '2021-08-05 08:29:04'),
(85, '', 'prchege@gmail.com', 'PETER', '2021-08-05 08:29:04'),
(86, '', 'info@potentialstaffing.com', 'PETER', '2021-08-05 08:29:04'),
(87, '', 'pchege@students.uonbi.ac.ke', 'PETER', '2021-08-05 08:29:04'),
(88, '', 'prchege@gmail.com', 'PETER', '2021-08-19 19:52:39'),
(89, '', 'prchege@gmail.com', 'PETER', '2021-08-20 06:19:27'),
(90, '<p>hello testing mail</p>\r\n', 'pchege@students.uonbi.ac.ke', 'PETER', '2021-08-20 06:37:47'),
(91, '<p>jhgfcfghujiop;kjhgfdfgyuiop</p>\r\n', 'pchege@students.uonbi.ac.ke', 'PETER', '2021-08-20 07:18:32'),
(92, '<p><strong>gvhjkv&nbsp; bbbb</strong></p>\r\n', 'info@potentialstaffing.com', 'Njoroge', '2021-08-30 17:03:12'),
(93, '<p><strong>gvhjkv&nbsp; bbbb</strong></p>\r\n', 'pchege@students.uonbi.ac.ke', 'Njoroge', '2021-08-30 17:03:12'),
(94, '', 'prchege@gmail.com', 'PETER', '2022-02-12 09:00:26'),
(95, '<p>Hello Potential staffing</p>\r\n', 'muthuivictoria03@gmail.com', 'PETER', '2022-02-12 09:01:07'),
(96, '<p>Hello Potential staffing</p>\r\n', 'info@potentialstaffing.com', 'PETER', '2022-02-12 09:01:07'),
(97, '<p>Hello Potential staffing</p>\r\n', 'pchege@students.uonbi.ac.ke', 'PETER', '2022-02-12 09:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `bulk_email_multiple_schedule`
--

CREATE TABLE `bulk_email_multiple_schedule` (
  `id` int(6) NOT NULL,
  `mail_details` varchar(5000) DEFAULT NULL,
  `mail_address` varchar(100) DEFAULT NULL,
  `recorded_by` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulk_save_email`
--

CREATE TABLE `bulk_save_email` (
  `id` int(6) NOT NULL,
  `sendTo` varchar(100) DEFAULT NULL,
  `message` varchar(7000) DEFAULT NULL,
  `attachement` varchar(500) DEFAULT NULL,
  `date_time` varchar(200) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cal_calendars`
--

CREATE TABLE `cal_calendars` (
  `cid` int(11) UNSIGNED NOT NULL,
  `hours_24` tinyint(1) NOT NULL DEFAULT '0',
  `date_format` tinyint(1) NOT NULL DEFAULT '0',
  `week_start` tinyint(1) NOT NULL DEFAULT '0',
  `subject_max` smallint(5) UNSIGNED NOT NULL DEFAULT '50',
  `events_max` tinyint(4) UNSIGNED NOT NULL DEFAULT '8',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PHP-Calendar',
  `anon_permission` tinyint(1) NOT NULL DEFAULT '1',
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cal_calendars`
--

INSERT INTO `cal_calendars` (`cid`, `hours_24`, `date_format`, `week_start`, `subject_max`, `events_max`, `title`, `anon_permission`, `timezone`, `language`, `theme`) VALUES
(1, 0, 0, 0, 50, 8, 'HRMIS', 1, '', '', 'cupertino');

-- --------------------------------------------------------

--
-- Table structure for table `cal_categories`
--

CREATE TABLE `cal_categories` (
  `catid` int(11) UNSIGNED NOT NULL,
  `cid` int(11) UNSIGNED NOT NULL,
  `gid` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bg_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cal_events`
--

CREATE TABLE `cal_events` (
  `eid` int(11) UNSIGNED NOT NULL,
  `cid` int(11) UNSIGNED NOT NULL,
  `owner` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `catid` int(11) UNSIGNED DEFAULT NULL,
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mtime` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cal_events`
--

INSERT INTO `cal_events` (`eid`, `cid`, `owner`, `subject`, `description`, `readonly`, `catid`, `ctime`, `mtime`) VALUES
(12, 1, 1, 'CCNA Networking', 'KCA', 0, NULL, '2021-01-11 07:45:56', '2021-01-11 08:27:16'),
(11, 1, 1, 'Financial Management', 'UON', 0, NULL, '2021-01-08 08:18:42', '2021-01-11 08:26:50'),
(13, 1, 1, 'Plaza beach Training', 'Plaza beach Training', 0, NULL, '2021-01-27 07:04:21', NULL),
(9, 1, 1, 'Cyber security', 'JKUAT', 0, NULL, '2021-01-04 16:25:36', '2021-01-11 08:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `cal_groups`
--

CREATE TABLE `cal_groups` (
  `gid` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cal_logins`
--

CREATE TABLE `cal_logins` (
  `uid` int(11) UNSIGNED NOT NULL,
  `series` char(43) COLLATE utf8_unicode_ci NOT NULL,
  `token` char(43) COLLATE utf8_unicode_ci NOT NULL,
  `atime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cal_logins`
--

INSERT INTO `cal_logins` (`uid`, `series`, `token`, `atime`) VALUES
(1, '3U3suP-jj_HFlq4ikwCCQbpTud5BOk4tzFZGhElNIxc', 'Uuukj1ZHsH1CrOzzIuUNnTGpKYGscvEhlLcyNDbE_0E', '2021-02-01 06:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `cal_occurrences`
--

CREATE TABLE `cal_occurrences` (
  `oid` int(11) UNSIGNED NOT NULL,
  `eid` int(11) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_ts` timestamp NULL DEFAULT NULL,
  `end_ts` timestamp NULL DEFAULT NULL,
  `time_type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cal_occurrences`
--

INSERT INTO `cal_occurrences` (`oid`, `eid`, `start_date`, `end_date`, `start_ts`, `end_ts`, `time_type`) VALUES
(12, 12, NULL, NULL, '2021-01-09 14:00:00', '2021-01-09 15:00:00', 0),
(11, 11, NULL, NULL, '2021-01-08 14:00:00', '2021-01-08 15:00:00', 0),
(13, 13, NULL, NULL, '2021-01-07 14:00:00', '2021-01-07 15:00:00', 0),
(9, 9, NULL, NULL, '2021-01-07 16:00:00', '2021-01-07 17:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cal_permissions`
--

CREATE TABLE `cal_permissions` (
  `cid` int(11) UNSIGNED NOT NULL,
  `uid` int(11) UNSIGNED NOT NULL,
  `read` tinyint(1) NOT NULL,
  `write` tinyint(1) NOT NULL,
  `readonly` tinyint(1) NOT NULL,
  `modify` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cal_users`
--

CREATE TABLE `cal_users` (
  `uid` int(11) UNSIGNED NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `password_editable` tinyint(1) NOT NULL DEFAULT '1',
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cal_users`
--

INSERT INTO `cal_users` (`uid`, `username`, `password`, `admin`, `password_editable`, `timezone`, `language`, `gid`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 'Africa/Nairobi', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cal_user_groups`
--

CREATE TABLE `cal_user_groups` (
  `gid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cal_version`
--

CREATE TABLE `cal_version` (
  `version` smallint(5) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cal_version`
--

INSERT INTO `cal_version` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `id` int(6) NOT NULL,
  `com_type` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`id`, `com_type`, `time_recorded`, `recorded_by`) VALUES
(1, 'Direct Employment', '2020-12-01 07:34:41', 'PETER KARIUKI'),
(2, 'Recruitment Agency', '2020-12-01 07:34:41', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text,
  `long_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `short_desc`, `long_desc`) VALUES
(1, 'peter', '<p>jjbhjbhbhk</p>\r\n', '<p><strong>hhhhhvh</strong></p>\r\n\r\n<ol>\r\n	<li>bb h</li>\r\n	<li>hjj</li>\r\n</ol>\r\n'),
(2, 'SME', '<p>SME</p>\r\n', '<p><strong>Employees with conflict management skills work through arguments, complaints and differences of opinion constructively. These employees are able to:</strong></p>\r\n\r\n<ol>\r\n	<li>Resolve issues that arise among team members quickly</li>\r\n	<li>Handle complaints from customers</li>\r\n	<li>Foster healthy work relationships</li>\r\n	<li>Raise objections in a professional manner</li>\r\n</ol>\r\n'),
(6, '34', NULL, '<p>Employees with conflict management skills work through arguments, complaints and differences of opinion constructively. These employees are able to:</p>\r\n\r\n<ol>\r\n	<li>Resolve issues that arise among team members quickly</li>\r\n	<li>Handle complaints from customers</li>\r\n	<li>Foster healthy work relationships</li>\r\n	<li>Raise objections in a professional manner</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` int(100) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `material_name` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_materials`
--

INSERT INTO `course_materials` (`id`, `reference_no`, `course_name`, `material_name`, `date_recorded`, `time_recorded`, `recorded_by`) VALUES
(3, '', 'MSC ITM', 'PETER CHEGE PIN (2).pdf', NULL, NULL, 'PETER');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` int(6) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `subject`, `student_name`, `date_recorded`, `time_recorded`) VALUES
(6, 'Financial Management', 'Training', '08-Jan-2121', '0000-00-00 00:00:00'),
(7, 'Cyber security', 'Trainee', '08-Jan-2121', '0000-00-00 00:00:00'),
(8, 'CCNA Networking', 'Dan', '11-Jan-2121', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(6) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `sector` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `contact`, `email`, `status`, `sector`, `time_recorded`, `recorded_by`) VALUES
(14, 'Kenchic Ltd', '00', '0@gmail.com', 'Active', '3', '2020-08-14 12:35:17', 'BENCO MBUGUA'),
(15, 'Customer-Window', '0712456', 'customer@gmail.com', 'Active', '2', '2020-09-17 06:55:42', 'BENCO MBUGUA'),
(16, 'Customer _ Roofing', '0722', 'customer@gmail.com', 'Active', '8', '2020-09-17 06:56:16', 'BENCO MBUGUA'),
(17, 'Customer_ Trucking', '0700000', 'Samuel@gmail.com', 'Active', '8', '2020-10-27 09:32:27', 'BENCO MBUGUA'),
(18, 'Bata Shoe Company', '0722280280', 'jane.nganga@bata.com', 'Active', '6', '2020-10-27 09:34:13', 'BENCO MBUGUA'),
(19, 'Afrimac Engineering Ltd', '0710823407', 'engineering@afrimac.co.ke', 'Active', '6', '2020-10-27 09:35:26', 'BENCO MBUGUA');

-- --------------------------------------------------------

--
-- Table structure for table `customer_end_delivery`
--

CREATE TABLE `customer_end_delivery` (
  `id` int(6) NOT NULL,
  `end_product_ref` varchar(100) DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `qtt` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `invoice_issued_id` varchar(100) DEFAULT NULL,
  `stock_remaining` varchar(100) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending_approval',
  `document` varchar(100) DEFAULT NULL,
  `delivery_note_doc` varchar(100) DEFAULT NULL,
  `purchase_order_doc` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_sector`
--

CREATE TABLE `customer_sector` (
  `id` int(6) NOT NULL,
  `sector_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_sector`
--

INSERT INTO `customer_sector` (`id`, `sector_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'Education', '2020-05-19 12:08:58', 'PETER KARIUKI'),
(2, 'Farming', '2020-05-19 12:08:58', 'PETER KARIUKI'),
(3, 'Poultry', '2020-05-19 12:09:28', 'PETER KARIUKI'),
(4, 'Government', '2020-05-19 12:09:28', 'PETER KARIUKI'),
(5, 'Media', '2020-05-19 12:09:50', NULL),
(6, 'Manufacturing', '2020-05-19 12:09:50', 'PETER KARIUKI'),
(7, 'Transport', '2020-05-19 12:10:12', 'PETER KARIUKI'),
(8, 'Construction', '2020-05-19 12:10:12', NULL),
(9, 'Electricals', '2020-07-15 10:43:55', 'PETER CHEGE KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_approvers`
--

CREATE TABLE `delivery_approvers` (
  `id` int(6) NOT NULL,
  `delivery_approver` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_approvers`
--

INSERT INTO `delivery_approvers` (`id`, `delivery_approver`, `product_id`, `date_recorded`, `time_recorded`, `recorded_by`) VALUES
(9, 'inventory@panoramaengineering.com', '6', '22-Jul-2020', '2020-07-22 10:40:24', 'PETER CHEGE KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `directorate_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_recorded` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_status`, `directorate_id`, `manager_id`, `created_by`, `time_recorded`) VALUES
('DO', 'Director', 'previous', 'CES OFFICE', 'CMA0168', 'MARO JILLO ABDALLA', '04/15/2019 03:17:27pm'),
('FA', 'Finance and Administration', 'previous', 'DCS', 'CMA0179', 'MARO JILLO ABDALLA', '04/15/2019 03:17:27pm'),
('ICT', 'Information Communication Technology', 'previous', 'DCS', 'CMA0154', 'MARO JILLO ABDALLA', '04/15/2019 03:17:27pm'),
('LO', 'Logistics', 'previous', 'DMO', 'CMA0106', 'MARO JILLO ABDALLA', '04/15/2019 03:17:27pm'),
('PRO', 'Production & Manufacturing', 'previous', 'DCS', 'CMA0123', 'MARO JILLO ABDALLA', '04/15/2019 03:17:27pm'),
('PROC', 'Procurement', 'previous', 'DCS', 'CMA0239', 'MARO JILLO ABDALLA', '04/15/2019 03:17:27pm');

-- --------------------------------------------------------

--
-- Table structure for table `departments_module`
--

CREATE TABLE `departments_module` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments_module`
--

INSERT INTO `departments_module` (`id`, `reference_no`, `department_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'potential', 'Finance', '2020-12-21 08:15:07', 'PETER KARIUKI'),
(2, 'potential', 'Information Technology', '2020-12-21 08:15:07', 'PETER KARIUKI'),
(3, 'potential', 'procurement', '2020-12-21 08:16:47', 'PETER KARIUKI'),
(4, 'potential', 'Human Resource', '2020-12-21 08:16:47', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `dependants_details`
--

CREATE TABLE `dependants_details` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `dependant_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dependants_details`
--

INSERT INTO `dependants_details` (`id`, `reference_no`, `dependant_name`, `relationship`, `gender`, `dob`, `contact`, `date_recorded`, `time_recorded`) VALUES
(1, '7253', 'DK', 's', 'Male', '08-Dec-2020', '342423', '22-Dec-2020', '2020-12-22 06:47:18'),
(2, '7253', 'PN', '4234', 'Male', '23-Dec-2020', '4234', '23-Dec-2020', '2020-12-23 06:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `education_history`
--

CREATE TABLE `education_history` (
  `id` int(100) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `school_name` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `qualification_name` varchar(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_history`
--

INSERT INTO `education_history` (`id`, `reference_no`, `email`, `school_name`, `qualification`, `qualification_name`, `start_date`, `end_date`, `duration`, `description`, `date_recorded`, `time_recorded`) VALUES
(3, NULL, 'pitarcheizin@gmail.com', 'Meru University', 'Degree', 'Bsc IT', '02-Nov-2020', '30-Nov-2020', '600', 'Bsc IT', '25-Nov-2020', '2020-11-25 19:57:50'),
(4, NULL, 'pitarcheizin@gmail.com', 'UON', 'Masters', 'Msc ITM', '12-Oct-2020', '30-Nov-2020', '450', 'msc ITM', '25-Nov-2020', '2020-11-25 19:59:00'),
(5, NULL, 'rose@gmail.com', 'UON', 'Masters', 'Graphics', '03-Dec-2020', '14-Dec-2020', 'NaN', 'Graphics', '04-Dec-2020', '2020-12-04 11:12:50'),
(7, '7253', 'p3@gmail.com', 'UON', 'Masters', 'Msc ITM', '22-Dec-2020', '23-Dec-2020', '1', 'sAS', '22-Dec-2020', '2020-12-22 07:29:44'),
(8, NULL, 'bonface@gmail.com', 'Jkuat', 'Degree', 'Bsc Computer Science', '23-Feb-2010', '27-Nov-2014', 'NaN', 'Degree ', '22-Feb-2121', '2021-02-22 08:13:58'),
(9, NULL, 'carol@gmail.com', 'UON', 'Degree', 'BCOM', '10-Nov-2020', '24-Mar-2021', 'NaN', 'Accounts option', '02-Mar-2121', '2021-03-02 15:47:37'),
(10, NULL, 'inventory@panoramaengineering.com', 'UON', 'Degree', 'Bsc Communication', '24-Mar-2021', '31-Mar-2021', 'NaN', 'Job Desc1', '25-Mar-2121', '2021-03-25 10:03:37'),
(11, NULL, 'prchege@gmail.com', 'University of Nairobi', 'Masters', 'Msc ITM', '07-May-2018', '30-Apr-2021', 'NaN', 'System Security', '26-Jul-2121', '2021-07-26 19:56:55'),
(12, NULL, 'prchege@gmail.com', 'Meru University of Science and Technology', 'Degree', 'Bsc. IT', '02-Jan-2012', '16-Dec-2016', 'NaN', 'Degree', '26-Jul-2121', '2021-07-26 19:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `employee_no`
--

CREATE TABLE `employee_no` (
  `id` int(100) NOT NULL,
  `emp_no` varchar(50) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL,
  `recorded_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_no`
--

INSERT INTO `employee_no` (`id`, `emp_no`, `time_recorded`, `recorded_by`) VALUES
(1, '1-4', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(2, '5-10', '2020-06-19 11:52:05', 'PETER KARIUKI'),
(3, '11-25', '2019-10-04 08:56:48', 'PETER KARIUKI'),
(4, '26-50', '2019-10-04 08:57:29', 'PETER KARIUKI'),
(5, '51-100', '2019-10-04 08:56:48', 'PETER KARIUKI'),
(6, '101-200', '2019-10-04 08:57:29', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `employment_details_module`
--

CREATE TABLE `employment_details_module` (
  `id` int(100) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `employment_type` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `supervisor` varchar(100) DEFAULT NULL,
  `job_grade` varchar(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `job_responsibilities` varchar(600) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_details_module`
--

INSERT INTO `employment_details_module` (`id`, `reference_no`, `department`, `employment_type`, `job_title`, `supervisor`, `job_grade`, `start_date`, `end_date`, `duration`, `job_responsibilities`, `date_recorded`, `time_recorded`) VALUES
(1, '7253', 'Information Technology', 'Permanent', 'ict', 'pits', '1', '15-Dec-2020', '23-Dec-2020', '8', 'dasdsa', '21-Dec-2020', '2020-12-21 10:01:34'),
(2, '7253', 'procurement', 'Contract', 'Test Title', 'rightd', '2', '21-Dec-2020', '24-Dec-2020', '3', 'dsadd\r\ndsa\r\nds\r\nad\r\nasda', '23-Dec-2020', '2020-12-23 06:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE `employment_history` (
  `id` int(100) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comp_name` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_level` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `monthly_salary` varchar(100) DEFAULT NULL,
  `work_type` varchar(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `job_responsibilities` varchar(600) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`id`, `reference_no`, `email`, `comp_name`, `industry`, `job_title`, `job_level`, `country`, `monthly_salary`, `work_type`, `start_date`, `end_date`, `duration`, `job_responsibilities`, `date_recorded`, `time_recorded`) VALUES
(3, NULL, 'pitarcheizin@gmail.com', 'CAPITAL MARKETS AUTHORITY', 'Goverment', 'Web Developer', 'Mid Level', 'Kenya', '150000', 'COntract', '26-Nov-2020', '04-Dec-2020', '8', 'Create Database\r\nNormalization of Tables\r\nIT Framework', '25-Nov-2020', '2020-11-25 18:21:28'),
(4, NULL, 'pitarcheizin@gmail.com', 'ICEA LION LIFE', 'Energy', 'DATA Admin', 'Entry Level', 'Kenya', '50000', 'Internship', '02-Mar-2020', '24-Jun-2020', '114', 'Database creation\r\nEDMS ILMS Integration', '25-Nov-2020', '2020-11-25 18:35:53'),
(5, NULL, 'rose@gmail.com', 'Wisegen', 'Government', 'Designer', 'Management Level', 'Kenya', '40000', 'Graduate', '08-Dec-2020', '14-Dec-2020', '6', 'Dstv Management\r\nPs management', '04-Dec-2020', '2020-12-04 11:12:21'),
(8, NULL, 'bonface@gmail.com', 'Joy millers', 'Construction', 'ICT SUPPORT', 'Mid Level', 'Kenya', '25000', 'Permanent', '04-Feb-2020', '15-May-2023', '1196', 'CCtv installation\r\nComp Maintenenace\r\n', '22-Feb-2121', '2021-02-22 08:13:12'),
(9, NULL, 'carol@gmail.com', 'Fairmount', 'Energy', 'Accountant', 'Management Level', 'Kenya', '80000', 'Permanent', '30-Jan-2019', '03-Mar-2021', '763', 'Balance sheet\r\nTrial balance', '02-Mar-2121', '2021-03-02 15:45:48'),
(11, NULL, 'carol@gmail.com', 'Potential Staffing', 'Government', 'Accounts manager', 'Management Level', 'Kenya', '70000', 'Permanent', '16-Feb-2021', '25-Mar-2021', '37', 'Trial Balance\r\nP AND L', '02-Mar-2121', '2021-03-02 16:09:19'),
(12, NULL, 'inventory@panoramaengineering.com', 'Roya Media', 'Energy', 'Presenter', 'Mid Level', 'Kenya', '7000', 'Permanent', '26-Mar-2021', '29-Mar-2021', '3', 'JOB rES', '25-Mar-2121', '2021-03-25 10:03:01'),
(13, NULL, 'prchege@gmail.com', 'CAPITAL MARKETS AUTHORITY', 'Government', 'Software Developer', 'Mid Level', 'Kenya', '80000', 'Contract', '05-Jul-2021', '29-Jul-2021', '24', '? Develop a software architecture for the proposed system.\r\n? Develop high front end User interface\r\n? Develop an Agile risk and project management system.\r\n? Integrate the system with the existing system', '26-Jul-2121', '2021-07-26 19:54:40'),
(14, NULL, 'prchege@gmail.com', 'ICEA Lion Life Assurance', 'IT & Telecoms', 'Data Admin', 'Mid Level', 'Kenya', '50000', 'Contract', '02-Feb-2021', '28-Jul-2021', '176', '? Ensure and enforce data integrity in the system.\r\n? Manage data entry and cleanup.\r\n? Generate ad-hoc reports on request', '26-Jul-2121', '2021-07-26 19:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `id` int(6) NOT NULL,
  `emp_type` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`id`, `emp_type`, `time_recorded`, `recorded_by`) VALUES
(1, 'Contract', '2020-12-01 08:24:24', 'PETER KARIUKI'),
(2, 'Permanent', '2020-12-01 08:24:24', 'PETER KARIUKI'),
(3, 'Casual', '2020-12-21 08:03:07', 'PETER KARIUKI'),
(4, 'Internship', '2021-02-15 06:23:24', 'Peter Kariuki');

-- --------------------------------------------------------

--
-- Table structure for table `end_product`
--

CREATE TABLE `end_product` (
  `id` int(6) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `qtt` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `customer_id` varchar(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `end_product`
--

INSERT INTO `end_product` (`id`, `product_name`, `unit_price`, `qtt`, `total`, `customer_id`, `start_date`, `end_date`, `duration`, `date_recorded`, `time_recorded`, `recorded_by`, `image`) VALUES
(7, 'GI cover [cone] for duct', '4731', '1', '4731.00', '14', '14-Aug-2020', '15-Aug-2020', '1', '14-Aug-2020', '2020-08-14 12:36:53', 'BENCO MBUGUA', NULL),
(8, 'Window', '8835', '12', '106020.00', '15', '10-Sep-2020', '30-Sep-2020', '20', '17-Sep-2020', '2020-09-17 06:58:21', 'BENCO MBUGUA', NULL),
(9, 'Roofing', '321979', '1', '321979.00', '16', '14-Sep-2020', '19-Sep-2020', '5', '17-Sep-2020', '2020-09-17 07:14:19', 'BENCO MBUGUA', NULL),
(10, 'Trucking 150mm', '1750', '130', '227500.00', '17', '26-Oct-2020', '31-Oct-2020', '5', '27-Oct-2020', '2020-10-27 09:36:18', 'BENCO MBUGUA', NULL),
(11, 'Shanks Size  115', '7', '10000', '70000.00', '18', '24-Oct-2020', '31-Oct-2020', '7', '27-Oct-2020', '2020-10-27 09:38:26', 'BENCO MBUGUA', NULL),
(12, 'SS Storange Tank', '213625', '11', '2349875.00', '19', '26-Oct-2020', '26-Dec-2020', '61', '27-Oct-2020', '2020-10-27 09:43:18', 'BENCO MBUGUA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experience_level`
--

CREATE TABLE `experience_level` (
  `id` int(6) NOT NULL,
  `exp_level` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience_level`
--

INSERT INTO `experience_level` (`id`, `exp_level`, `time_recorded`, `recorded_by`) VALUES
(1, 'Entry', '2020-12-01 07:55:12', 'PETER KARIUKI'),
(2, 'Mid_Level', '2020-12-01 07:55:12', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Undefined');

-- --------------------------------------------------------

--
-- Table structure for table `general_comments`
--

CREATE TABLE `general_comments` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(250) NOT NULL,
  `general_comments` varchar(500) NOT NULL,
  `commentor` varchar(250) NOT NULL,
  `email_of_commentor` varchar(250) NOT NULL,
  `date_commented` varchar(250) NOT NULL,
  `changed` varchar(10) NOT NULL DEFAULT 'no',
  `time_commented` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_comments`
--

INSERT INTO `general_comments` (`id`, `reference_no`, `general_comments`, `commentor`, `email_of_commentor`, `date_commented`, `changed`, `time_commented`) VALUES
(14, 'SPU/R/1', ' this is a general comment', 'MARO JILLO ABDALLA', 'mabdalla@cma.or.ke', '01/02/2019', 'no', '09:08:48am'),
(15, 'SPU/R/2', ' tty', 'Test User SPU', 'spu@testuser.com', '01/09/2019', 'no', '11:41:00am'),
(16, 'SPU/R/1', 'HEllo this is a comment', 'Test User SPU', 'spu@testuser.com', '01/09/2019', 'no', '11:41:51am'),
(17, 'SPU/R/1', 'men', 'MARO JILLO ABDALLA', 'mabdalla@cma.or.ke', '02/08/2019', 'no', '04:12:22pm'),
(18, 'FIN/R/2', ' N.T - National Treasury', 'PETER LEMAIYAN SAIGILU', 'PSaigilu@cma.or.ke', '04/02/2019', 'no', '03:10:02pm');

-- --------------------------------------------------------

--
-- Table structure for table `hear_about_us`
--

CREATE TABLE `hear_about_us` (
  `id` int(6) NOT NULL,
  `about_us_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hear_about_us`
--

INSERT INTO `hear_about_us` (`id`, `about_us_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'Online Search', '2020-11-27 15:34:36', 'PETER KARIUKI'),
(2, 'Online Advert', '2020-11-27 15:34:36', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE `how_it_works` (
  `id` int(6) NOT NULL,
  `details` varchar(50) NOT NULL,
  `more_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `details`, `more_details`) VALUES
(1, 'Log in to your account', 'Login to the Potential Staffing platform and share the link on the referral card.'),
(2, 'Invite a friend', 'Your friends or companies join Potential Staffing and make their first purchase'),
(3, 'Get rewarded', 'You get a Coupon worth Ksh 10,000');

-- --------------------------------------------------------

--
-- Table structure for table `individual_budget`
--

CREATE TABLE `individual_budget` (
  `id` int(6) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `trainee_name` varchar(100) DEFAULT NULL,
  `budget_amount` varchar(100) DEFAULT NULL,
  `allocated_amount` varchar(100) DEFAULT NULL,
  `remaining_amount` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individual_budget`
--

INSERT INTO `individual_budget` (`id`, `subject`, `trainee_name`, `budget_amount`, `allocated_amount`, `remaining_amount`, `date_recorded`, `time_recorded`) VALUES
(7, 'Financial Management', 'Training', '90000', '20000', '70000', '08-Jan-2121', '2021-01-08 19:13:48'),
(9, 'Cyber security', 'Training', '120000', '1000', '119000', '08-Jan-2121', '2021-01-08 19:18:30'),
(10, 'Cyber security', 'Trainee', '120000', '30000', '89000', '08-Jan-2121', '2021-01-08 19:18:44'),
(11, 'CCNA Networking', 'Training', '70000', '10000', '60000', '11-Jan-2121', '2021-01-11 08:00:08'),
(12, 'CCNA Networking', 'Dan', '70000', '15000', '45000', '11-Jan-2121', '2021-01-11 09:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(100) NOT NULL,
  `industry_name` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT 'icon-briefcase',
  `time_recorded` timestamp NULL DEFAULT NULL,
  `recorded_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `industry_name`, `class`, `time_recorded`, `recorded_by`) VALUES
(1, 'Construction', 'icon-bargraph', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(2, 'Energy', 'icon-tools', '2020-06-19 11:52:05', 'PETER KARIUKI'),
(3, 'IT & Telecoms', 'ti-briefcase', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(4, 'Government', 'ti-ruler-pencil', '2020-06-19 11:52:05', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(6) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `category_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'IT & Telecoms', '2020-06-19 11:52:04', 'PETER CHEGE KARIUKI'),
(2, 'Agriculture', '2020-06-19 11:52:32', 'PETER CHEGE KARIUKI'),
(3, 'Transport', '2020-06-19 11:54:22', 'PETER CHEGE KARIUKI'),
(4, 'Government', '2020-07-09 11:34:49', 'DANSON KARIUKI'),
(5, 'Healthcare', '2020-07-09 11:35:31', 'DANSON KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `job_grade`
--

CREATE TABLE `job_grade` (
  `id` int(6) NOT NULL,
  `grade_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_grade`
--

INSERT INTO `job_grade` (`id`, `grade_name`, `time_recorded`, `recorded_by`) VALUES
(1, '1', '2020-12-21 10:01:01', 'PETER KARIUKI'),
(2, '2', '2020-12-21 10:01:01', 'personell@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job_level`
--

CREATE TABLE `job_level` (
  `id` int(100) NOT NULL,
  `job_level` varchar(50) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL,
  `recorded_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_level`
--

INSERT INTO `job_level` (`id`, `job_level`, `time_recorded`, `recorded_by`) VALUES
(1, 'Entry Level', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(2, 'Mid Level', '2020-06-19 11:52:05', 'PETER KARIUKI'),
(3, 'Senior Level', '2020-06-19 11:52:06', 'PETER KARIUKI'),
(4, 'Management Level', '2020-06-19 11:52:07', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `job_posting`
--

CREATE TABLE `job_posting` (
  `id` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `job_category` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `com_type` varchar(100) DEFAULT NULL,
  `expLength` varchar(100) DEFAULT NULL,
  `emp_type` varchar(100) DEFAULT NULL,
  `rank_name` varchar(255) DEFAULT NULL,
  `exp_level` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `job_location` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `deadline` varchar(100) DEFAULT NULL,
  `job_description` varchar(1000) DEFAULT NULL,
  `responsibility` varchar(1000) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  `no_vaccancy` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_posting`
--

INSERT INTO `job_posting` (`id`, `email`, `job_title`, `job_category`, `company_name`, `com_type`, `expLength`, `emp_type`, `rank_name`, `exp_level`, `status`, `job_location`, `country`, `deadline`, `job_description`, `responsibility`, `skills`, `no_vaccancy`, `image`, `date_recorded`, `time_recorded`) VALUES
(35, 'info@potentialstaffing.com', 'Human Resources Executive', 'Energy', 'Potential staffing', 'Recruitment Agency', '1', 'Permanent', 'Degree', 'Entry', 'active', 'nairobi', 'kenya', '28-Jul-2021', 'Position:                Human Resources Executive\r\nLevel:                    Entry/Basic\r\nNationality:                 Kenyan Citizens\r\nLocation:                 Nairobi\r\nIndustry:                 Multiple \r\nQualification     Degree or Diploma in Human Resources Management\r\nExperience:    Should have experience 3-5 years in Human Resources Department in a Manufacturing Set up.\r\nRole:    Assisting the Human Resources Manager in the HR Function.\r\n\r\nSalary and benefits    Will depend on experience and background.\r\nJoining:        Immediate / or after notice period.\r\n\r\nIMPORTANT NOTE\r\nPlease note that we, New Age Associates, do not charge any fees to the prospective job seekers for their placement.  If you receive any call or email request for fees payment, please do not pay. All fees are charges to the clients only', 'Application\r\nIf your qualification and background matches, you can email us your profile', 'Our Client, a leading Business Conglomerate, based in East Africa, , is looking for the following Professional to join their team\r\n\r\nMinimum Qualification: Diploma\r\nExperience Level: Mid level\r\nExperience Length: 3 years', '1', NULL, '31-Jul-2121', '2021-08-01 00:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` int(6) NOT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `skill_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'PHP', '2020-11-26 12:42:33', 'PETER KARIUKI'),
(2, 'MYSQL', '2020-11-26 12:42:33', 'KARIUKI'),
(4, 'Accounts', '2020-11-26 13:02:03', 'PETER KARIUKI'),
(5, 'Procurement', '2020-11-26 13:02:03', 'PETER KARIUKI'),
(7, 'Development', '2020-11-26 19:41:56', 'PETER KARIUKI'),
(8, 'Economics', '2020-11-26 19:41:56', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `job_test`
--

CREATE TABLE `job_test` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `test_name` varchar(5000) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_test`
--

INSERT INTO `job_test` (`id`, `reference_no`, `test_name`, `time_recorded`, `recorded_by`) VALUES
(67, 'reference_no', 'test_name', '0000-00-00 00:00:00', 'recorded_by'),
(69, '182', 'What do the initials of PHP programming language stand for?', '2018-03-21 12:06:00', 'PETER'),
(70, '182', 'Which programming language does PHP resemble?', '2019-03-21 12:06:00', 'PETER'),
(73, '182', 'How do you execute a PHP script from the command line?', '2022-03-21 12:06:00', 'PETER'),
(74, '182', 'How to run the interactive PHP shell from the command line interface?', '2023-03-21 12:06:00', 'PETER'),
(75, '182', 'What is the correct and the most two common way to start and finish a PHP block of code?', '2024-03-21 12:06:00', 'PETER'),
(76, '182', 'How can we display the output directly to the browser?', '2025-03-21 12:06:00', 'PETER'),
(77, '182', 'What is the main difference between PHP 4 and PHP 5?', '2026-03-21 12:06:00', 'PETER'),
(78, '182', 'Is multiple inheritance supported in PHP?', '2027-03-21 12:06:00', 'PETER'),
(79, '182', 'What is the meaning of a final class and a final method?', '2028-03-21 12:06:00', 'PETER'),
(80, '182', 'How is the comparison of objects done in PHP?', '2029-03-21 12:06:00', 'PETER'),
(81, '182', 'How can PHP and HTML interact?', '2030-03-21 12:06:00', 'PETER'),
(82, '182', 'What type of operation is needed when passing values through a form or an URL?', '2031-03-21 12:06:00', 'PETER'),
(83, '182', 'How can PHP and Javascript interact?', '2001-04-21 12:06:00', 'PETER'),
(84, '182', 'What is needed to be able to use image function?', '2002-04-21 12:06:00', 'PETER'),
(85, '182', 'What is the use of the function \'imagetypes()\'?', '2003-04-21 12:06:00', 'PETER'),
(86, '182', 'What are the functions to be used to get the image\'s properties (size, width, and height)?', '2004-04-21 12:06:00', 'PETER'),
(87, '182', 'How failures in execution are handled with include() and require() functions?', '2005-04-21 12:06:00', 'PETER'),
(88, '182', 'What is the main difference between require() and require_once()?', '2006-04-21 12:06:00', 'PETER'),
(89, '182', 'How can I display text with a PHP script?', '2007-04-21 12:06:00', 'PETER'),
(90, '182', 'How can we display information of a variable and readable by a human with PHP?', '2008-04-21 12:06:00', 'PETER'),
(91, '182', 'How is it possible to set an infinite execution time for PHP script?', '2009-04-21 12:06:00', 'PETER'),
(92, '182', 'What does the PHP error \'Parse error in PHP - unexpected T_variable at line x\' means?', '2010-04-21 12:06:00', 'PETER'),
(93, '182', 'What should we do to be able to export data into an Excel file?', '2011-04-21 12:06:00', 'PETER'),
(94, '182', 'What is the function file_get_contents() useful for?', '2012-04-21 12:06:00', 'PETER'),
(95, '182', 'How can we connect to a MySQL database from a PHP script?', '2013-04-21 12:06:00', 'PETER'),
(96, '182', 'What is the function mysql_pconnect() useful for?', '2014-04-21 12:06:00', 'PETER'),
(97, '182', 'How be the result set of Mysql handled in PHP?', '2015-04-21 12:06:00', 'PETER'),
(98, '182', 'How is it possible to know the number of rows returned in the result set?', '2016-04-21 12:06:00', 'PETER'),
(99, '182', 'Which function gives us the number of affected entries by a query?', '2017-04-21 12:06:00', 'PETER'),
(100, '182', 'What is the difference between mysqli_fetch_object() and mysqli_fetch_array()?', '2018-04-21 12:06:00', 'PETER'),
(101, '182', 'How can we access the data sent through the URL with the GET method?', '2019-04-21 12:06:00', 'PETER'),
(102, '182', 'How can we access the data sent through the URL with the POST method?', '2020-04-21 12:06:00', 'PETER'),
(103, '182', 'How can we check the value of a given variable is a number?', '2021-04-21 12:06:00', 'PETER'),
(104, '182', 'How can we check the value of a given variable is alphanumeric?', '2022-04-21 12:06:00', 'PETER'),
(105, '182', 'How do I check if a given variable is empty?', '2023-04-21 12:06:00', 'PETER'),
(106, '182', 'What does the unlink() function mean?', '2024-04-21 12:06:00', 'PETER'),
(107, '182', 'What does the unset() function mean?', '2025-04-21 12:06:00', 'PETER'),
(108, '182', 'How do I escape data before storing it in the database?', '2026-04-21 12:06:00', 'PETER'),
(109, '182', 'How is it possible to remove escape characters from a string?', '2027-04-21 12:06:00', 'PETER'),
(110, '182', 'How can we automatically escape incoming data?', '2028-04-21 12:06:00', 'PETER'),
(111, '182', 'What does the function get_magic_quotes_gpc() means?', '2029-04-21 12:06:00', 'PETER'),
(112, '182', 'Is it possible to remove the HTML tags from data?', '2030-04-21 12:06:00', 'PETER'),
(113, '182', 'what is the static variable in function useful for?', '2001-05-21 12:06:00', 'PETER'),
(114, '182', 'How can we define a variable accessible in functions of a PHP script?', '2002-05-21 12:06:00', 'PETER'),
(115, '182', 'What is the most convenient hashing method to be used to hash passwords?', '2003-05-21 12:06:00', 'PETER'),
(116, '182', 'Which cryptographic extension provide generation and verification of digital signatures?', '2004-05-21 12:06:00', 'PETER'),
(117, '182', 'Who is known as the father of PHP?', '2005-05-21 12:06:00', 'PETER'),
(118, '', '', '0000-00-00 00:00:00', ''),
(119, '', '', '0000-00-00 00:00:00', ''),
(120, '', '', '0000-00-00 00:00:00', ''),
(121, '', '', '0000-00-00 00:00:00', ''),
(122, '', '', '0000-00-00 00:00:00', ''),
(123, '', '', '0000-00-00 00:00:00', ''),
(124, '', '', '0000-00-00 00:00:00', ''),
(125, '', '', '0000-00-00 00:00:00', ''),
(126, '', '', '0000-00-00 00:00:00', ''),
(127, '', '', '0000-00-00 00:00:00', ''),
(128, '', '', '0000-00-00 00:00:00', ''),
(129, '', '', '0000-00-00 00:00:00', ''),
(130, '', '', '0000-00-00 00:00:00', ''),
(131, '', '', '0000-00-00 00:00:00', ''),
(132, '', '', '0000-00-00 00:00:00', ''),
(133, '', '', '0000-00-00 00:00:00', ''),
(134, '', '', '0000-00-00 00:00:00', ''),
(135, '', '', '0000-00-00 00:00:00', ''),
(136, '', '', '0000-00-00 00:00:00', ''),
(137, '', '', '0000-00-00 00:00:00', ''),
(138, '', '', '0000-00-00 00:00:00', ''),
(139, '', '', '0000-00-00 00:00:00', ''),
(140, '', '', '0000-00-00 00:00:00', ''),
(141, '', '', '0000-00-00 00:00:00', ''),
(142, '', '', '0000-00-00 00:00:00', ''),
(143, '', '', '0000-00-00 00:00:00', ''),
(144, '', '', '0000-00-00 00:00:00', ''),
(145, '', '', '0000-00-00 00:00:00', ''),
(146, '', '', '0000-00-00 00:00:00', ''),
(147, '', '', '0000-00-00 00:00:00', ''),
(148, '', '', '0000-00-00 00:00:00', ''),
(149, '', '', '0000-00-00 00:00:00', ''),
(150, '', '', '0000-00-00 00:00:00', ''),
(151, '', '', '0000-00-00 00:00:00', ''),
(152, '', '', '0000-00-00 00:00:00', ''),
(153, '', '', '0000-00-00 00:00:00', ''),
(154, '', '', '0000-00-00 00:00:00', ''),
(155, '', '', '0000-00-00 00:00:00', ''),
(156, '', '', '0000-00-00 00:00:00', ''),
(157, '', '', '0000-00-00 00:00:00', ''),
(158, '', '', '0000-00-00 00:00:00', ''),
(159, '', '', '0000-00-00 00:00:00', ''),
(160, '', '', '0000-00-00 00:00:00', ''),
(161, '', '', '0000-00-00 00:00:00', ''),
(162, '', '', '0000-00-00 00:00:00', ''),
(163, '182', 'Name one Error handling In PHP', '2021-04-08 05:08:05', 'PETER'),
(164, '182', 'vdfgfdg&nbsp;&nbsp;&nbsp;&nbsp;dsf7fdsfdsf7ffdsf&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;gfhgfhgf&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;trett&nbsp; &nbsp; &nbsp; &nbsp; 23232re', '2021-06-30 03:32:52', 'PETER'),
(165, '81', 'what is balance sheet?', '2021-07-03 23:30:02', 'PETER'),
(166, '81', 'what is trial balance?', '2021-07-03 23:30:52', 'PETER'),
(167, '182', 'What\'s up Brother?', '2021-08-01 00:10:35', 'PETER'),
(168, '234', 'What is HR', '2021-08-01 00:46:09', 'PETER'),
(169, '234', 'wHat is the role of the manager', '2021-08-01 00:46:28', 'PETER');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(6) NOT NULL,
  `title_name` varchar(100) DEFAULT NULL,
  `title_description` varchar(1000) DEFAULT NULL,
  `detailled_description` varchar(4000) DEFAULT NULL,
  `grouping_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `title_name`, `title_description`, `detailled_description`, `grouping_name`, `time_recorded`, `recorded_by`) VALUES
(26, 'Adaptability ', NULL, NULL, '15', '2030-03-21 08:56:00', 'KARIUKI'),
(27, 'Analytical ', NULL, NULL, '15', '2031-03-21 08:56:00', 'KARIUKI'),
(28, 'Attention to detail ', NULL, NULL, '15', '2001-04-21 08:56:00', 'KARIUKI'),
(29, 'Change management ', NULL, NULL, '15', '2002-04-21 08:56:00', 'KARIUKI'),
(30, 'Coding ', 'These sample Coding interview questions are customized for different programming languages and can be used to test candidates on general coding and language-specific criteria. Use these programming questions to evaluate candidates’ skills and hire the best programmers for your company.', 'How to use programming questions to test candidates\r\nMost engineers and developers are required to know how to code. Evaluate candidates’ knowledge using coding skills interview questions during the hiring process. For junior positions, ask basic coding interview questions and test candidates theoretical knowledge using simple exercises. For more senior engineering roles, opt for a written assignment, where you can assess how candidates approach coding projects end-to-end.\r\n\r\nAsking too many programming technical interview questions can overwhelm candidates. During a programming interview, focus on specific languages that you want to test for, based on your needs. For example, choose between java coding interview questions and python coding interview questions depending on the role you’re hiring for.\r\n\r\nFor all engineering positions, look for candidates who blend a Computer Science academic background with IT work experience. Keep an eye for candidates who are enthusiastic about coding and can find workarounds to coding issues. Award bonus points to candidates who keep up with the latest developments in coding and technology.\r\n\r\nGeneral programming interview questions\r\nDescribe the process of writing a piece of code from requirements to delivery.\r\nWhich tools have you used to test your code quality?\r\nHow can you debug a program while it’s being used?\r\nWhat’s your favorite programming language and why? What features (if any) would you like to add to this language?\r\nWhere do you place most of your focus when reviewing somebody else’s code?\r\nHow do you stay up-to-date with the latest technology developments?\r\nFor more examples, see our full Programming interview questions list.\r\n\r\nJava coding interview questions\r\nHow are Runtime exceptions different from Checked exceptions?\r\nWhy use an object Factory and how would you implement the Singleton pattern?\r\nIs this possible in Java? “A extends B, C”\r\nWhat is the difference between String, StringBuilder and StringBuffer in Java?\r\nFor more examples, see our full Java Developer interview questions or Java Software Engineer interview questions lists.\r\n\r\nRuby coding interview questions\r\nWhat is the use of load and require in Ruby?\r\nExplain each of the following operators and how and when they should be used: ==, ===, eql?, equal?\r\nWhat is a module? Can you tell me the difference between classes and modules?\r\nWhat are some of your favorite gems?\r\nFor more examples, see our full Ruby Developer interview questions list.\r\n\r\nPython coding interview questions\r\nWhy are functions considered first class objects in Python?\r\nCan you explain circular dependencies in Python and potential ways to avoid them?\r\nGive an example of filter and reduce over an iterable object.\r\nCan you explain the uses/advantage of a generator?\r\nFor more examples, see our full Python Developer interview questions list.\r\n\r\n.NET coding interview questions\r\nWhat is the WebSecurity class in .NET? What is its use?\r\nIn .NET, attributes are a method of associating declarative information with C# code. Please describe the way they are used and a proper use case.\r\nWhich is the best way to pass configuration variables to ASP.NET applications?\r\nIs it possible in .NET to extend a class (any class) with some extra methods? If yes, how can it be accomplished?\r\nFor more examples, see our full .NET Web Developer interview questions list.\r\n\r\nPHP coding interview questions\r\nIf you need to generate random numbers in PHP, what method would you follow?\r\nWhat’s the difference between the include() and require() functions?\r\nExplain how you develop and integrate plugins for PHP frameworks, like Laravel and Yii.\r\nHow can you get web browser’s details using PHP?\r\nFor more examples, see our full PHP Developer interview questions list.\r\n\r\nHTML/CSS coding interview questions\r\nCan you describe the difference between inline elements and block elements?\r\nWhy is it generally a good idea to position CSS <link>s between <head></head> and JS <script>s just before', '15', '2003-04-21 08:56:00', 'KARIUKI'),
(31, 'Communication ', NULL, NULL, '15', '2004-04-21 08:56:00', 'KARIUKI'),
(32, 'Competency-based ', NULL, NULL, '15', '2005-04-21 08:56:00', 'KARIUKI'),
(33, 'Confidentiality ', NULL, NULL, '15', '2006-04-21 08:56:00', 'KARIUKI'),
(34, 'Conflict management ', NULL, NULL, '15', '2007-04-21 08:56:00', 'KARIUKI'),
(35, 'Critical-thinking ', NULL, NULL, '15', '2008-04-21 08:56:00', 'KARIUKI'),
(36, 'Decision-making ', NULL, NULL, '15', '2009-04-21 08:56:00', 'KARIUKI'),
(37, 'HTML ', NULL, NULL, '15', '2010-04-21 08:56:00', 'KARIUKI'),
(38, 'Leadership ', NULL, NULL, '15', '2011-04-21 08:56:00', 'KARIUKI'),
(39, 'Management ', NULL, NULL, '15', '2012-04-21 08:56:00', 'KARIUKI'),
(40, 'Presentation ', NULL, NULL, '15', '2013-04-21 08:56:00', 'KARIUKI'),
(41, 'Prioritization ', NULL, NULL, '15', '2014-04-21 08:56:00', 'KARIUKI'),
(42, 'Problem-solving ', NULL, NULL, '15', '2015-04-21 08:56:00', 'KARIUKI'),
(43, 'Programming ', NULL, NULL, '15', '2016-04-21 08:56:00', 'KARIUKI'),
(44, 'Sales ', NULL, NULL, '15', '2017-04-21 08:56:00', 'KARIUKI'),
(45, 'Soft skills ', NULL, NULL, '15', '2018-04-21 08:56:00', 'KARIUKI'),
(46, 'Strategic-thinking ', NULL, NULL, '15', '2019-04-21 08:56:00', 'KARIUKI'),
(47, 'Stress management ', NULL, NULL, '15', '2020-04-21 08:56:00', 'KARIUKI'),
(48, 'Team player ', NULL, NULL, '15', '2021-04-21 08:56:00', 'KARIUKI'),
(49, 'Technical ', NULL, NULL, '15', '2022-04-21 08:56:00', 'KARIUKI'),
(50, 'title_name', NULL, NULL, 'grouping_name', '0000-00-00 00:00:00', 'recorded_by'),
(51, 'Operational', NULL, NULL, '16', '2031-03-21 08:56:00', 'KARIUKI'),
(52, 'Situations', NULL, NULL, '16', '2001-04-21 08:56:00', 'KARIUKI'),
(53, 'Behavioral', NULL, NULL, '16', '2002-04-21 08:56:00', 'KARIUKI'),
(54, 'Candidate experience', NULL, NULL, '16', '2003-04-21 08:56:00', 'KARIUKI'),
(55, 'Career goals', NULL, NULL, '16', '2004-04-21 08:56:00', 'KARIUKI'),
(56, 'Closing', NULL, NULL, '16', '2005-04-21 08:56:00', 'KARIUKI'),
(57, 'Common Interview', NULL, NULL, '16', '2006-04-21 08:56:00', 'KARIUKI'),
(58, 'Cultural fit', NULL, NULL, '16', '2007-04-21 08:56:00', 'KARIUKI'),
(59, 'Emotional intelligence (EQ)', NULL, NULL, '16', '2008-04-21 08:56:00', 'KARIUKI'),
(60, 'Employment reference', NULL, NULL, '16', '2009-04-21 08:56:00', 'KARIUKI'),
(61, 'Entry-level', NULL, NULL, '16', '2010-04-21 08:56:00', 'KARIUKI'),
(62, 'Executive', NULL, NULL, '16', '2011-04-21 08:56:00', 'KARIUKI'),
(63, 'Exit', NULL, NULL, '16', '2012-04-21 08:56:00', 'KARIUKI'),
(64, 'Final-round', NULL, NULL, '16', '2013-04-21 08:56:00', 'KARIUKI'),
(65, 'Group', NULL, NULL, '16', '2014-04-21 08:56:00', 'KARIUKI'),
(66, 'Hiring manager-recruiter', NULL, NULL, '16', '2015-04-21 08:56:00', 'KARIUKI'),
(67, 'Icebreaker', NULL, NULL, '16', '2016-04-21 08:56:00', 'KARIUKI'),
(68, 'Internship', NULL, NULL, '16', '2017-04-21 08:56:00', 'KARIUKI'),
(69, 'Onboarding process', NULL, NULL, '16', '2018-04-21 08:56:00', 'KARIUKI'),
(70, 'Online', NULL, NULL, '16', '2019-04-21 08:56:00', 'KARIUKI'),
(71, 'Part-time job', NULL, NULL, '16', '2020-04-21 08:56:00', 'KARIUKI'),
(72, 'Personality', NULL, NULL, '16', '2021-04-21 08:56:00', 'KARIUKI'),
(73, 'Phone screen', NULL, NULL, '16', '2022-04-21 08:56:00', 'KARIUKI'),
(74, 'Remote job', NULL, NULL, '16', '2023-04-21 08:56:00', 'KARIUKI'),
(75, 'Seasonal jobs', NULL, NULL, '16', '2024-04-21 08:56:00', 'KARIUKI'),
(76, 'Situational', NULL, NULL, '16', '2025-04-21 08:56:00', 'KARIUKI'),
(77, 'Skype', NULL, NULL, '16', '2026-04-21 08:56:00', 'KARIUKI'),
(78, 'Third-round', NULL, NULL, '16', '2027-04-21 08:56:00', 'KARIUKI'),
(79, 'Values-based', NULL, NULL, '16', '2028-04-21 08:56:00', 'KARIUKI'),
(80, 'Accountant', NULL, NULL, '17', '2029-04-21 08:56:00', 'KARIUKI'),
(81, 'Accounting Clerk', NULL, NULL, '17', '2030-04-21 08:56:00', 'KARIUKI'),
(82, 'Accounting Manager', NULL, NULL, '17', '2001-05-21 08:56:00', 'KARIUKI'),
(83, 'Accounting Supervisor', NULL, NULL, '17', '2002-05-21 08:56:00', 'KARIUKI'),
(84, 'Accounts Payable Clerk', NULL, NULL, '17', '2003-05-21 08:56:00', 'KARIUKI'),
(85, 'Accounts Receivable Clerk', NULL, NULL, '17', '2004-05-21 08:56:00', 'KARIUKI'),
(86, 'Accounts Receivable Manager', NULL, NULL, '17', '2005-05-21 08:56:00', 'KARIUKI'),
(87, 'Bank', NULL, NULL, '17', '2006-05-21 08:56:00', 'KARIUKI'),
(88, 'Bank Manager', NULL, NULL, '17', '2007-05-21 08:56:00', 'KARIUKI'),
(89, 'Bank Teller', NULL, NULL, '17', '2008-05-21 08:56:00', 'KARIUKI'),
(90, 'Billing Analyst', NULL, NULL, '17', '2009-05-21 08:56:00', 'KARIUKI'),
(91, 'Billing Clerk', NULL, NULL, '17', '2010-05-21 08:56:00', 'KARIUKI'),
(92, 'Billing coordinator', NULL, NULL, '17', '2011-05-21 08:56:00', 'KARIUKI'),
(93, 'Billing Specialist', NULL, NULL, '17', '2012-05-21 08:56:00', 'KARIUKI'),
(94, 'Bookkeeper', NULL, NULL, '17', '2013-05-21 08:56:00', 'KARIUKI'),
(95, 'Budget Analyst', NULL, NULL, '17', '2014-05-21 08:56:00', 'KARIUKI'),
(96, 'Certified Public Accountant', NULL, NULL, '17', '2015-05-21 08:56:00', 'KARIUKI'),
(97, 'CFO', NULL, NULL, '17', '2016-05-21 08:56:00', 'KARIUKI'),
(98, 'Collection Specialist', NULL, NULL, '17', '2017-05-21 08:56:00', 'KARIUKI'),
(99, 'Cost Accountant', NULL, NULL, '17', '2018-05-21 08:56:00', 'KARIUKI'),
(100, 'Credit Analyst', NULL, NULL, '17', '2019-05-21 08:56:00', 'KARIUKI'),
(101, 'Finance Analyst', NULL, NULL, '17', '2020-05-21 08:56:00', 'KARIUKI'),
(102, 'Finance Clerk', NULL, NULL, '17', '2021-05-21 08:56:00', 'KARIUKI'),
(103, 'Finance Manager', NULL, NULL, '17', '2022-05-21 08:56:00', 'KARIUKI'),
(104, 'Financial Adviser', NULL, NULL, '17', '2023-05-21 08:56:00', 'KARIUKI'),
(105, 'Financial Controller', NULL, NULL, '17', '2024-05-21 08:56:00', 'KARIUKI'),
(106, 'Financial Planner', NULL, NULL, '17', '2025-05-21 08:56:00', 'KARIUKI'),
(107, 'Financial Specialist', NULL, NULL, '17', '2026-05-21 08:56:00', 'KARIUKI'),
(108, 'Insurance Agent', NULL, NULL, '17', '2027-05-21 08:56:00', 'KARIUKI'),
(109, 'Junior Accountant', NULL, NULL, '17', '2028-05-21 08:56:00', 'KARIUKI'),
(110, 'Loan Officer', NULL, NULL, '17', '2029-05-21 08:56:00', 'KARIUKI'),
(111, 'Loan processor', NULL, NULL, '17', '2030-05-21 08:56:00', 'KARIUKI'),
(112, 'Management Accountant', NULL, NULL, '17', '2031-05-21 08:56:00', 'KARIUKI'),
(113, 'Risk Analyst', NULL, NULL, '17', '2001-06-21 08:56:00', 'KARIUKI'),
(114, 'Senior Accountant', NULL, NULL, '17', '2002-06-21 08:56:00', 'KARIUKI'),
(115, 'Senior Auditor', NULL, NULL, '17', '2003-06-21 08:56:00', 'KARIUKI'),
(116, 'Staff Auditor', NULL, NULL, '17', '2004-06-21 08:56:00', 'KARIUKI'),
(117, 'Tax Accountant', NULL, NULL, '17', '2005-06-21 08:56:00', 'KARIUKI'),
(118, 'Tax Manager', NULL, NULL, '17', '2006-06-21 08:56:00', 'KARIUKI'),
(119, 'Treasurer', NULL, NULL, '17', '2007-06-21 08:56:00', 'KARIUKI'),
(120, 'Underwriter', NULL, NULL, '17', '2008-06-21 08:56:00', 'KARIUKI'),
(121, 'Administration Manager', NULL, NULL, '18', '2009-06-21 08:56:00', 'KARIUKI'),
(122, 'Administrative Assistant', NULL, NULL, '18', '2010-06-21 08:56:00', 'KARIUKI'),
(123, 'Administrative Officer', NULL, NULL, '18', '2011-06-21 08:56:00', 'KARIUKI'),
(124, 'Assistant Director', NULL, NULL, '18', '2012-06-21 08:56:00', 'KARIUKI'),
(125, 'Assistant Manager', NULL, NULL, '18', '2013-06-21 08:56:00', 'KARIUKI'),
(126, 'Branch Manager', NULL, NULL, '18', '2014-06-21 08:56:00', 'KARIUKI'),
(127, 'Business Manager', NULL, NULL, '18', '2015-06-21 08:56:00', 'KARIUKI'),
(128, 'CEO', NULL, NULL, '18', '2016-06-21 08:56:00', 'KARIUKI'),
(129, 'Chief Operating Officer (COO)', NULL, NULL, '18', '2017-06-21 08:56:00', 'KARIUKI'),
(130, 'Contract Administrator', NULL, NULL, '18', '2018-06-21 08:56:00', 'KARIUKI'),
(131, 'Customer Care Representative', NULL, NULL, '18', '2019-06-21 08:56:00', 'KARIUKI'),
(132, 'Customer Service Manager', NULL, NULL, '18', '2020-06-21 08:56:00', 'KARIUKI'),
(133, 'Customer Service Rep', NULL, NULL, '18', '2021-06-21 08:56:00', 'KARIUKI'),
(134, 'Data Entry Operator', NULL, NULL, '18', '2022-06-21 08:56:00', 'KARIUKI'),
(135, 'Executive Assistant', NULL, NULL, '18', '2023-06-21 08:56:00', 'KARIUKI'),
(136, 'Executive Secretary', NULL, NULL, '18', '2024-06-21 08:56:00', 'KARIUKI'),
(137, 'Field Service Technician', NULL, NULL, '18', '2025-06-21 08:56:00', 'KARIUKI'),
(138, 'File clerk', NULL, NULL, '18', '2026-06-21 08:56:00', 'KARIUKI'),
(139, 'Front Desk Representative', NULL, NULL, '18', '2027-06-21 08:56:00', 'KARIUKI'),
(140, 'General Manager', NULL, NULL, '18', '2028-06-21 08:56:00', 'KARIUKI'),
(141, 'Help Desk Specialist', NULL, NULL, '18', '2029-06-21 08:56:00', 'KARIUKI'),
(142, 'Mail Clerk', NULL, NULL, '18', '2030-06-21 08:56:00', 'KARIUKI'),
(143, 'Office Administrator', NULL, NULL, '18', '2001-07-21 08:56:00', 'KARIUKI'),
(144, 'Office Assistant', NULL, NULL, '18', '2002-07-21 08:56:00', 'KARIUKI'),
(145, 'Office Clerk', NULL, NULL, '18', '2003-07-21 08:56:00', 'KARIUKI'),
(146, 'Office Coordinator', NULL, NULL, '18', '2004-07-21 08:56:00', 'KARIUKI'),
(147, 'Office Manager', NULL, NULL, '18', '2005-07-21 08:56:00', 'KARIUKI'),
(148, 'Operations Manager', NULL, NULL, '18', '2006-07-21 08:56:00', 'KARIUKI'),
(149, 'Program Coordinator', NULL, NULL, '18', '2007-07-21 08:56:00', 'KARIUKI'),
(150, 'Program Manager', NULL, NULL, '18', '2008-07-21 08:56:00', 'KARIUKI'),
(151, 'Receptionist', NULL, NULL, '18', '2009-07-21 08:56:00', 'KARIUKI'),
(152, 'Secretary', NULL, NULL, '18', '2010-07-21 08:56:00', 'KARIUKI'),
(153, 'Staff Assistant', NULL, NULL, '18', '2011-07-21 08:56:00', 'KARIUKI'),
(154, 'Team Leader', NULL, NULL, '18', '2012-07-21 08:56:00', 'KARIUKI'),
(155, 'Virtual Assistant', NULL, NULL, '18', '2013-07-21 08:56:00', 'KARIUKI'),
(156, '.NET Web Developer', NULL, NULL, '20', '2014-07-21 08:56:00', 'KARIUKI'),
(157, 'Analytics Manager', NULL, NULL, '20', '2015-07-21 08:56:00', 'KARIUKI'),
(158, 'Android Developer', NULL, NULL, '20', '2016-07-21 08:56:00', 'KARIUKI'),
(159, 'Application Developer', NULL, NULL, '20', '2017-07-21 08:56:00', 'KARIUKI'),
(160, 'Business Analyst', NULL, NULL, '20', '2018-07-21 08:56:00', 'KARIUKI'),
(161, 'Chief Information Officer (CIO)', NULL, NULL, '20', '2019-07-21 08:56:00', 'KARIUKI'),
(162, 'Chief Technology Officer (CTO)', NULL, NULL, '20', '2020-07-21 08:56:00', 'KARIUKI'),
(163, 'Data analyst', NULL, NULL, '20', '2021-07-21 08:56:00', 'KARIUKI'),
(164, 'Data Architect', NULL, NULL, '20', '2022-07-21 08:56:00', 'KARIUKI'),
(165, 'Data Scientist (Analyst)', NULL, NULL, '20', '2023-07-21 08:56:00', 'KARIUKI'),
(166, 'Data Scientist', NULL, NULL, '20', '2024-07-21 08:56:00', 'KARIUKI'),
(167, 'Database Administrator (DBA)', NULL, NULL, '20', '2025-07-21 08:56:00', 'KARIUKI'),
(168, 'Database Manager', NULL, NULL, '20', '2026-07-21 08:56:00', 'KARIUKI'),
(169, 'Embedded Software Engineer', NULL, NULL, '20', '2027-07-21 08:56:00', 'KARIUKI'),
(170, 'Front End Web Developer', NULL, NULL, '20', '2028-07-21 08:56:00', 'KARIUKI'),
(171, 'iOS Developer', NULL, NULL, '20', '2029-07-21 08:56:00', 'KARIUKI'),
(172, 'IT Auditor', NULL, NULL, '20', '2030-07-21 08:56:00', 'KARIUKI'),
(173, 'IT Consultant', NULL, NULL, '20', '2031-07-21 08:56:00', 'KARIUKI'),
(174, 'IT Coordinator', NULL, NULL, '20', '2001-08-21 08:56:00', 'KARIUKI'),
(175, 'IT Manager', NULL, NULL, '20', '2002-08-21 08:56:00', 'KARIUKI'),
(176, 'Java Developer', NULL, NULL, '20', '2003-08-21 08:56:00', 'KARIUKI'),
(177, 'Java Software Engineer', NULL, NULL, '20', '2004-08-21 08:56:00', 'KARIUKI'),
(178, 'Lead Data Scientist', NULL, NULL, '20', '2005-08-21 08:56:00', 'KARIUKI'),
(179, 'Machine Learning Engineer', NULL, NULL, '20', '2006-08-21 08:56:00', 'KARIUKI'),
(180, 'Natural Language Processing', NULL, NULL, '20', '2007-08-21 08:56:00', 'KARIUKI'),
(181, 'Network Engineer', NULL, NULL, '20', '2008-08-21 08:56:00', 'KARIUKI'),
(182, 'PHP Developer', NULL, NULL, '20', '2009-08-21 08:56:00', 'KARIUKI'),
(183, 'Physical Product Designer', NULL, NULL, '20', '2010-08-21 08:56:00', 'KARIUKI'),
(184, 'Product Designer', NULL, NULL, '20', '2011-08-21 08:56:00', 'KARIUKI'),
(185, 'Product Manager', NULL, NULL, '20', '2012-08-21 08:56:00', 'KARIUKI'),
(186, 'Project Coordinator', NULL, NULL, '20', '2013-08-21 08:56:00', 'KARIUKI'),
(187, 'Project Manager', NULL, NULL, '20', '2014-08-21 08:56:00', 'KARIUKI'),
(188, 'Python Developer', NULL, NULL, '20', '2015-08-21 08:56:00', 'KARIUKI'),
(189, 'QA Engineer', NULL, NULL, '20', '2016-08-21 08:56:00', 'KARIUKI'),
(190, 'Ruby Developer', NULL, NULL, '20', '2017-08-21 08:56:00', 'KARIUKI'),
(191, 'Scrum Master', NULL, NULL, '20', '2018-08-21 08:56:00', 'KARIUKI'),
(192, 'Senior .NET Developer', NULL, NULL, '20', '2019-08-21 08:56:00', 'KARIUKI'),
(193, 'Senior Business Analyst', NULL, NULL, '20', '2020-08-21 08:56:00', 'KARIUKI'),
(194, 'Senior Java Developer', NULL, NULL, '20', '2021-08-21 08:56:00', 'KARIUKI'),
(195, 'Senior Project Manager', NULL, NULL, '20', '2022-08-21 08:56:00', 'KARIUKI'),
(196, 'Senior Python Developer', NULL, NULL, '20', '2023-08-21 08:56:00', 'KARIUKI'),
(197, 'Senior Ruby Developer', NULL, NULL, '20', '2024-08-21 08:56:00', 'KARIUKI'),
(198, 'Senior Software Engineer', NULL, NULL, '20', '2025-08-21 08:56:00', 'KARIUKI'),
(199, 'Senior Web Developer', NULL, NULL, '20', '2026-08-21 08:56:00', 'KARIUKI'),
(200, 'Software Architect', NULL, NULL, '20', '2027-08-21 08:56:00', 'KARIUKI'),
(201, 'Software Developer', NULL, NULL, '20', '2028-08-21 08:56:00', 'KARIUKI'),
(202, 'Software Engineer', NULL, NULL, '20', '2029-08-21 08:56:00', 'KARIUKI'),
(203, 'Software Testing', NULL, NULL, '20', '2030-08-21 08:56:00', 'KARIUKI'),
(204, 'System Administrator', NULL, NULL, '20', '2031-08-21 08:56:00', 'KARIUKI'),
(205, 'System Analyst', NULL, NULL, '20', '2001-09-21 08:56:00', 'KARIUKI'),
(206, 'System Engineer', NULL, NULL, '20', '2002-09-21 08:56:00', 'KARIUKI'),
(207, 'Technical Editor', NULL, NULL, '20', '2003-09-21 08:56:00', 'KARIUKI'),
(208, 'Technical Lead', NULL, NULL, '20', '2004-09-21 08:56:00', 'KARIUKI'),
(209, 'Technical Support Engineer', NULL, NULL, '20', '2005-09-21 08:56:00', 'KARIUKI'),
(210, 'Technical Writer', NULL, NULL, '20', '2006-09-21 08:56:00', 'KARIUKI'),
(211, 'UI Designer', NULL, NULL, '20', '2007-09-21 08:56:00', 'KARIUKI'),
(212, 'UX Designer', NULL, NULL, '20', '2008-09-21 08:56:00', 'KARIUKI'),
(213, 'Web Administrator', NULL, NULL, '20', '2009-09-21 08:56:00', 'KARIUKI'),
(214, 'Web Designer', NULL, NULL, '20', '2010-09-21 08:56:00', 'KARIUKI'),
(215, 'Web developer', NULL, NULL, '20', '2011-09-21 08:56:00', 'KARIUKI'),
(216, 'Webmaster', NULL, NULL, '20', '2012-09-21 08:56:00', 'KARIUKI'),
(217, 'Assistant Principal', NULL, NULL, '21', '2013-09-21 08:56:00', 'KARIUKI'),
(218, 'Benefits Coordinator', NULL, NULL, '21', '2014-09-21 08:56:00', 'KARIUKI'),
(219, 'Benefits Specialist', NULL, NULL, '21', '2015-09-21 08:56:00', 'KARIUKI'),
(220, 'Child Care Teacher', NULL, NULL, '21', '2016-09-21 08:56:00', 'KARIUKI'),
(221, 'Compensation Analyst', NULL, NULL, '21', '2017-09-21 08:56:00', 'KARIUKI'),
(222, 'Compliance Manager', NULL, NULL, '21', '2018-09-21 08:56:00', 'KARIUKI'),
(223, 'Corporate Trainer', NULL, NULL, '21', '2019-09-21 08:56:00', 'KARIUKI'),
(224, 'Director of Talent', NULL, NULL, '21', '2020-09-21 08:56:00', 'KARIUKI'),
(225, 'Executive Recruiter', NULL, NULL, '21', '2021-09-21 08:56:00', 'KARIUKI'),
(226, 'Guidance Counselor', NULL, NULL, '21', '2022-09-21 08:56:00', 'KARIUKI'),
(227, 'HR Assistant', NULL, NULL, '21', '2023-09-21 08:56:00', 'KARIUKI'),
(228, 'HR Business Partner', NULL, NULL, '21', '2024-09-21 08:56:00', 'KARIUKI'),
(229, 'HR Clerk', NULL, NULL, '21', '2025-09-21 08:56:00', 'KARIUKI'),
(230, 'HR Consultant', NULL, NULL, '21', '2026-09-21 08:56:00', 'KARIUKI'),
(231, 'HR Director', NULL, NULL, '21', '2027-09-21 08:56:00', 'KARIUKI'),
(232, 'HR Executive', NULL, NULL, '21', '2028-09-21 08:56:00', 'KARIUKI'),
(233, 'HR Generalist', NULL, NULL, '21', '2029-09-21 08:56:00', 'KARIUKI'),
(234, 'HR Manager', NULL, NULL, '21', '2030-09-21 08:56:00', 'KARIUKI'),
(235, 'HR Officer', NULL, NULL, '21', '2001-10-21 08:56:00', 'KARIUKI'),
(236, 'HR Onboarding Manager', NULL, NULL, '21', '2002-10-21 08:56:00', 'KARIUKI'),
(237, 'HR Specialist', NULL, NULL, '21', '2003-10-21 08:56:00', 'KARIUKI'),
(238, 'Instructional Designer', NULL, NULL, '21', '2004-10-21 08:56:00', 'KARIUKI'),
(239, 'Internal Auditor', NULL, NULL, '21', '2005-10-21 08:56:00', 'KARIUKI'),
(240, 'Kindergarten Teacher', NULL, NULL, '21', '2006-10-21 08:56:00', 'KARIUKI'),
(241, 'Legal assistant', NULL, NULL, '21', '2007-10-21 08:56:00', 'KARIUKI'),
(242, 'Legal counsel', NULL, NULL, '21', '2008-10-21 08:56:00', 'KARIUKI'),
(243, 'Paralegal', NULL, NULL, '21', '2009-10-21 08:56:00', 'KARIUKI'),
(244, 'Payroll Manager', NULL, NULL, '21', '2010-10-21 08:56:00', 'KARIUKI'),
(245, 'Payroll Specialist', NULL, NULL, '21', '2011-10-21 08:56:00', 'KARIUKI'),
(246, 'Preschool Teacher', NULL, NULL, '21', '2012-10-21 08:56:00', 'KARIUKI'),
(247, 'Principal', NULL, NULL, '21', '2013-10-21 08:56:00', 'KARIUKI'),
(248, 'Recruiter', NULL, NULL, '21', '2014-10-21 08:56:00', 'KARIUKI'),
(249, 'Recruiting coordinator', NULL, NULL, '21', '2015-10-21 08:56:00', 'KARIUKI'),
(250, 'Recruitment Consultant', NULL, NULL, '21', '2016-10-21 08:56:00', 'KARIUKI'),
(251, 'Recruitment Manager', NULL, NULL, '21', '2017-10-21 08:56:00', 'KARIUKI'),
(252, 'Special Education Teacher', NULL, NULL, '21', '2018-10-21 08:56:00', 'KARIUKI'),
(253, 'Staffing Coordinator', NULL, NULL, '21', '2019-10-21 08:56:00', 'KARIUKI'),
(254, 'Talent Acquisition Manager', NULL, NULL, '21', '2020-10-21 08:56:00', 'KARIUKI'),
(255, 'Teacher', NULL, NULL, '21', '2021-10-21 08:56:00', 'KARIUKI'),
(256, 'Technical Recruiter', NULL, NULL, '21', '2022-10-21 08:56:00', 'KARIUKI'),
(257, 'Technical Trainer', NULL, NULL, '21', '2023-10-21 08:56:00', 'KARIUKI'),
(258, 'Training Coordinator', NULL, NULL, '21', '2024-10-21 08:56:00', 'KARIUKI'),
(259, 'Training Manager', NULL, NULL, '21', '2025-10-21 08:56:00', 'KARIUKI'),
(260, 'Training Specialist', NULL, NULL, '21', '2026-10-21 08:56:00', 'KARIUKI'),
(261, 'Volunteer Coordinator', NULL, NULL, '21', '2027-10-21 08:56:00', 'KARIUKI'),
(262, 'VP of HR', NULL, NULL, '21', '2028-10-21 08:56:00', 'KARIUKI'),
(263, 'VP Talent Acquisition', NULL, NULL, '21', '2029-10-21 08:56:00', 'KARIUKI'),
(264, 'VP Talent Management', NULL, NULL, '21', '2030-10-21 08:56:00', 'KARIUKI'),
(265, 'Architect', NULL, NULL, '22', '2031-10-21 08:56:00', 'KARIUKI'),
(266, 'Assessor', NULL, NULL, '22', '2001-11-21 08:56:00', 'KARIUKI'),
(267, 'Carpenter', NULL, NULL, '22', '2002-11-21 08:56:00', 'KARIUKI'),
(268, 'Construction Manager', NULL, NULL, '22', '2003-11-21 08:56:00', 'KARIUKI'),
(269, 'Electrician', NULL, NULL, '22', '2004-11-21 08:56:00', 'KARIUKI'),
(270, 'Estimator', NULL, NULL, '22', '2005-11-21 08:56:00', 'KARIUKI'),
(271, 'Interior Designer', NULL, NULL, '22', '2006-11-21 08:56:00', 'KARIUKI'),
(272, 'Leasing Consultant', NULL, NULL, '22', '2007-11-21 08:56:00', 'KARIUKI'),
(273, 'Machine Operator', NULL, NULL, '22', '2008-11-21 08:56:00', 'KARIUKI'),
(274, 'Painter', NULL, NULL, '22', '2009-11-21 08:56:00', 'KARIUKI'),
(275, 'Plumber', NULL, NULL, '22', '2010-11-21 08:56:00', 'KARIUKI'),
(276, 'Production Supervisor', NULL, NULL, '22', '2011-11-21 08:56:00', 'KARIUKI'),
(277, 'Real Estate Agent', NULL, NULL, '22', '2012-11-21 08:56:00', 'KARIUKI'),
(278, 'Caregiver', NULL, NULL, '23', '2013-11-21 08:56:00', 'KARIUKI'),
(279, 'Case Manager', NULL, NULL, '23', '2014-11-21 08:56:00', 'KARIUKI'),
(280, 'Cosmetologist', NULL, NULL, '23', '2015-11-21 08:56:00', 'KARIUKI'),
(281, 'Dental Assistant', NULL, NULL, '23', '2016-11-21 08:56:00', 'KARIUKI'),
(282, 'Dietary Aide', NULL, NULL, '23', '2017-11-21 08:56:00', 'KARIUKI'),
(283, 'Director of Nursing', NULL, NULL, '23', '2018-11-21 08:56:00', 'KARIUKI'),
(284, 'Health Unit Coordinator', NULL, NULL, '23', '2019-11-21 08:56:00', 'KARIUKI'),
(285, 'Home Health?Aide', NULL, NULL, '23', '2020-11-21 08:56:00', 'KARIUKI'),
(286, 'Hospice Nurse', NULL, NULL, '23', '2021-11-21 08:56:00', 'KARIUKI'),
(287, 'LPN', NULL, NULL, '23', '2022-11-21 08:56:00', 'KARIUKI'),
(288, 'Medical Assistant', NULL, NULL, '23', '2023-11-21 08:56:00', 'KARIUKI'),
(289, 'Medical Sales Representative', NULL, NULL, '23', '2024-11-21 08:56:00', 'KARIUKI'),
(290, 'Medical Secretary', NULL, NULL, '23', '2025-11-21 08:56:00', 'KARIUKI'),
(291, 'Nurse', NULL, NULL, '23', '2026-11-21 08:56:00', 'KARIUKI'),
(292, 'Nursing supervisor', NULL, NULL, '23', '2027-11-21 08:56:00', 'KARIUKI'),
(293, 'Nutritionist', NULL, NULL, '23', '2028-11-21 08:56:00', 'KARIUKI'),
(294, 'Occupational Therapist', NULL, NULL, '23', '2029-11-21 08:56:00', 'KARIUKI'),
(295, 'Operating Room Nurse', NULL, NULL, '23', '2030-11-21 08:56:00', 'KARIUKI'),
(296, 'Paramedic', NULL, NULL, '23', '2001-12-21 08:56:00', 'KARIUKI'),
(297, 'Patient Care Technician', NULL, NULL, '23', '2002-12-21 08:56:00', 'KARIUKI'),
(298, 'Pediatrician', NULL, NULL, '23', '2003-12-21 08:56:00', 'KARIUKI'),
(299, 'Personal Care Assistant', NULL, NULL, '23', '2004-12-21 08:56:00', 'KARIUKI'),
(300, 'Pharmacist', NULL, NULL, '23', '2005-12-21 08:56:00', 'KARIUKI'),
(301, 'Pharmacy Technician', NULL, NULL, '23', '2006-12-21 08:56:00', 'KARIUKI'),
(302, 'Physical Therapist', NULL, NULL, '23', '2007-12-21 08:56:00', 'KARIUKI'),
(303, 'Registered Nurse', NULL, NULL, '23', '2008-12-21 08:56:00', 'KARIUKI'),
(304, 'Social Worker', NULL, NULL, '23', '2009-12-21 08:56:00', 'KARIUKI'),
(305, 'Bartender', NULL, NULL, '24', '2010-12-21 08:56:00', 'KARIUKI'),
(306, 'Cabin Crew', NULL, NULL, '24', '2011-12-21 08:56:00', 'KARIUKI'),
(307, 'Event Planner', NULL, NULL, '24', '2012-12-21 08:56:00', 'KARIUKI'),
(308, 'Executive Chef', NULL, NULL, '24', '2013-12-21 08:56:00', 'KARIUKI'),
(309, 'Flight Attendant', NULL, NULL, '24', '2014-12-21 08:56:00', 'KARIUKI'),
(310, 'Food and Beverage (F&B) Manager', NULL, NULL, '24', '2015-12-21 08:56:00', 'KARIUKI'),
(311, 'Hotel Concierge', NULL, NULL, '24', '2016-12-21 08:56:00', 'KARIUKI'),
(312, 'Hotel Manager', NULL, NULL, '24', '2017-12-21 08:56:00', 'KARIUKI'),
(313, 'Line Cook', NULL, NULL, '24', '2018-12-21 08:56:00', 'KARIUKI'),
(314, 'Maid', NULL, NULL, '24', '2019-12-21 08:56:00', 'KARIUKI'),
(315, 'Pastry Chef', NULL, NULL, '24', '2020-12-21 08:56:00', 'KARIUKI'),
(316, 'Prep Cook', NULL, NULL, '24', '2021-12-21 08:56:00', 'KARIUKI'),
(317, 'Restaurant Manager', NULL, NULL, '24', '2022-12-21 08:56:00', 'KARIUKI'),
(318, 'Sous Chef', NULL, NULL, '24', '2023-12-21 08:56:00', 'KARIUKI'),
(319, 'Travel Agent', NULL, NULL, '24', '2024-12-21 08:56:00', 'KARIUKI'),
(320, 'Wait Staff', NULL, NULL, '24', '2025-12-21 08:56:00', 'KARIUKI'),
(321, 'Waiter or Waitress', NULL, NULL, '24', '2026-12-21 08:56:00', 'KARIUKI'),
(322, 'Cleaner', NULL, NULL, '25', '2027-12-21 08:56:00', 'KARIUKI'),
(323, 'Debt Collector', NULL, NULL, '25', '2028-12-21 08:56:00', 'KARIUKI'),
(324, 'Delivery Driver', NULL, NULL, '25', '2029-12-21 08:56:00', 'KARIUKI'),
(325, 'Dispatcher', NULL, NULL, '25', '2030-12-21 08:56:00', 'KARIUKI'),
(326, 'Facilities Manager', NULL, NULL, '25', '2031-12-21 08:56:00', 'KARIUKI'),
(327, 'Firefighter', NULL, NULL, '25', '2001-01-22 08:56:00', 'KARIUKI'),
(328, 'Inventory Manager', NULL, NULL, '25', '2002-01-22 08:56:00', 'KARIUKI'),
(329, 'Janitor', NULL, NULL, '25', '2003-01-22 08:56:00', 'KARIUKI'),
(330, 'Logistics Manager', NULL, NULL, '25', '2004-01-22 08:56:00', 'KARIUKI'),
(331, 'Maintenance Supervisor', NULL, NULL, '25', '2005-01-22 08:56:00', 'KARIUKI'),
(332, 'Plant Manager', NULL, NULL, '25', '2006-01-22 08:56:00', 'KARIUKI'),
(333, 'Procurement Manager', NULL, NULL, '25', '2007-01-22 08:56:00', 'KARIUKI'),
(334, 'Purchasing agent', NULL, NULL, '25', '2008-01-22 08:56:00', 'KARIUKI'),
(335, 'Purchasing manager', NULL, NULL, '25', '2009-01-22 08:56:00', 'KARIUKI'),
(336, 'Safety Officer', NULL, NULL, '25', '2010-01-22 08:56:00', 'KARIUKI'),
(337, 'Security Guard', NULL, NULL, '25', '2011-01-22 08:56:00', 'KARIUKI'),
(338, 'Truck Driver', NULL, NULL, '25', '2012-01-22 08:56:00', 'KARIUKI'),
(339, 'Warehouse Assistant', NULL, NULL, '25', '2013-01-22 08:56:00', 'KARIUKI'),
(340, 'Warehouse Manager', NULL, NULL, '25', '2014-01-22 08:56:00', 'KARIUKI'),
(341, 'Warehouse Supervisor', NULL, NULL, '25', '2015-01-22 08:56:00', 'KARIUKI'),
(342, 'Warehouse Worker', NULL, NULL, '25', '2016-01-22 08:56:00', 'KARIUKI'),
(343, 'Advertising Account Executive', NULL, NULL, '26', '2017-01-22 08:56:00', 'KARIUKI'),
(344, 'Animator', NULL, NULL, '26', '2018-01-22 08:56:00', 'KARIUKI'),
(345, 'Art Director', NULL, NULL, '26', '2019-01-22 08:56:00', 'KARIUKI'),
(346, 'Assistant Brand Manager', NULL, NULL, '26', '2020-01-22 08:56:00', 'KARIUKI'),
(347, 'Brand Ambassador', NULL, NULL, '26', '2021-01-22 08:56:00', 'KARIUKI'),
(348, 'Brand Manager', NULL, NULL, '26', '2022-01-22 08:56:00', 'KARIUKI'),
(349, 'Client Relationship Manager', NULL, NULL, '26', '2023-01-22 08:56:00', 'KARIUKI'),
(350, 'Communications Specialist', NULL, NULL, '26', '2024-01-22 08:56:00', 'KARIUKI'),
(351, 'Content Writer', NULL, NULL, '26', '2025-01-22 08:56:00', 'KARIUKI'),
(352, 'Copywriter', NULL, NULL, '26', '2026-01-22 08:56:00', 'KARIUKI'),
(353, 'Creative Director', NULL, NULL, '26', '2027-01-22 08:56:00', 'KARIUKI'),
(354, 'Digital Marketing Manager', NULL, NULL, '26', '2028-01-22 08:56:00', 'KARIUKI'),
(355, 'Editor', NULL, NULL, '26', '2029-01-22 08:56:00', 'KARIUKI'),
(356, 'Email Marketing Manager', NULL, NULL, '26', '2030-01-22 08:56:00', 'KARIUKI'),
(357, 'Graphic Designer', NULL, NULL, '26', '2031-01-22 08:56:00', 'KARIUKI'),
(358, 'Illustrator', NULL, NULL, '26', '2001-02-22 08:56:00', 'KARIUKI'),
(359, 'Journalist', NULL, NULL, '26', '2002-02-22 08:56:00', 'KARIUKI'),
(360, 'Makeup Artist', NULL, NULL, '26', '2003-02-22 08:56:00', 'KARIUKI'),
(361, 'Market Research Analyst', NULL, NULL, '26', '2004-02-22 08:56:00', 'KARIUKI'),
(362, 'Marketing Assistant', NULL, NULL, '26', '2005-02-22 08:56:00', 'KARIUKI'),
(363, 'Marketing Associate', NULL, NULL, '26', '2006-02-22 08:56:00', 'KARIUKI'),
(364, 'Marketing Consultant', NULL, NULL, '26', '2007-02-22 08:56:00', 'KARIUKI'),
(365, 'Marketing Coordinator', NULL, NULL, '26', '2008-02-22 08:56:00', 'KARIUKI'),
(366, 'Marketing Director', NULL, NULL, '26', '2009-02-22 08:56:00', 'KARIUKI'),
(367, 'Marketing Intern', NULL, NULL, '26', '2010-02-22 08:56:00', 'KARIUKI'),
(368, 'Marketing Manager', NULL, NULL, '26', '2011-02-22 08:56:00', 'KARIUKI'),
(369, 'Marketing Specialist', NULL, NULL, '26', '2012-02-22 08:56:00', 'KARIUKI'),
(370, 'Media Planner', NULL, NULL, '26', '2013-02-22 08:56:00', 'KARIUKI'),
(371, 'Photo editor', NULL, NULL, '26', '2014-02-22 08:56:00', 'KARIUKI'),
(372, 'PPC (Pay Per Click) Manager', NULL, NULL, '26', '2015-02-22 08:56:00', 'KARIUKI'),
(373, 'Product Marketing Manager', NULL, NULL, '26', '2016-02-22 08:56:00', 'KARIUKI'),
(374, 'Promoter', NULL, NULL, '26', '2017-02-22 08:56:00', 'KARIUKI'),
(375, 'Public Relations Assistant', NULL, NULL, '26', '2018-02-22 08:56:00', 'KARIUKI'),
(376, 'Public Relations Manager', NULL, NULL, '26', '2019-02-22 08:56:00', 'KARIUKI'),
(377, '(SEO/SEM)specialist ', NULL, NULL, '26', '2020-02-22 08:56:00', 'KARIUKI'),
(378, 'SEO Analyst', NULL, NULL, '26', '2021-02-22 08:56:00', 'KARIUKI'),
(379, 'Social Media Analyst', NULL, NULL, '26', '2022-02-22 08:56:00', 'KARIUKI'),
(380, 'Social Media Manager', NULL, NULL, '26', '2023-02-22 08:56:00', 'KARIUKI'),
(381, 'Social Media Specialist', NULL, NULL, '26', '2024-02-22 08:56:00', 'KARIUKI'),
(382, 'Video Editor', NULL, NULL, '26', '2025-02-22 08:56:00', 'KARIUKI'),
(383, 'Account Coordinator', NULL, NULL, '27', '2026-02-22 08:56:00', 'KARIUKI'),
(384, 'Account Director', NULL, NULL, '27', '2027-02-22 08:56:00', 'KARIUKI'),
(385, 'Account Executive', NULL, NULL, '27', '2028-02-22 08:56:00', 'KARIUKI'),
(386, 'Account Manager', NULL, NULL, '27', '2001-03-22 08:56:00', 'KARIUKI'),
(387, 'Account Representative', NULL, NULL, '27', '2002-03-22 08:56:00', 'KARIUKI'),
(388, 'Assistant Account Executive', NULL, NULL, '27', '2003-03-22 08:56:00', 'KARIUKI'),
(389, 'Business Development Manager', NULL, NULL, '27', '2004-03-22 08:56:00', 'KARIUKI'),
(390, 'Business Development Rep', NULL, NULL, '27', '2005-03-22 08:56:00', 'KARIUKI'),
(391, 'Call Center Manager', NULL, NULL, '27', '2006-03-22 08:56:00', 'KARIUKI'),
(392, 'Call Center Representative', NULL, NULL, '27', '2007-03-22 08:56:00', 'KARIUKI'),
(393, 'Cashier', NULL, NULL, '27', '2008-03-22 08:56:00', 'KARIUKI'),
(394, 'Category Manager', NULL, NULL, '27', '2009-03-22 08:56:00', 'KARIUKI'),
(395, 'Engagement Manager', NULL, NULL, '27', '2010-03-22 08:56:00', 'KARIUKI'),
(396, 'Field Sales Representative', NULL, NULL, '27', '2011-03-22 08:56:00', 'KARIUKI'),
(397, 'Inside Sales Manager', NULL, NULL, '27', '2012-03-22 08:56:00', 'KARIUKI'),
(398, 'Inside Sales Representative', NULL, NULL, '27', '2013-03-22 08:56:00', 'KARIUKI'),
(399, 'Key Account Manager', NULL, NULL, '27', '2014-03-22 08:56:00', 'KARIUKI'),
(400, 'Merchandiser', NULL, NULL, '27', '2015-03-22 08:56:00', 'KARIUKI'),
(401, 'National Account Manager', NULL, NULL, '27', '2016-03-22 08:56:00', 'KARIUKI'),
(402, 'Regional Sales Manager', NULL, NULL, '27', '2017-03-22 08:56:00', 'KARIUKI'),
(403, 'Relationship Manager', NULL, NULL, '27', '2018-03-22 08:56:00', 'KARIUKI'),
(404, 'Retail Buyer', NULL, NULL, '27', '2019-03-22 08:56:00', 'KARIUKI'),
(405, 'Sales Account Executive', NULL, NULL, '27', '2020-03-22 08:56:00', 'KARIUKI'),
(406, 'Sales Advisor', NULL, NULL, '27', '2021-03-22 08:56:00', 'KARIUKI'),
(407, 'Sales Assistant', NULL, NULL, '27', '2022-03-22 08:56:00', 'KARIUKI'),
(408, 'Sales Associate', NULL, NULL, '27', '2023-03-22 08:56:00', 'KARIUKI'),
(409, 'Sales Consultant', NULL, NULL, '27', '2024-03-22 08:56:00', 'KARIUKI'),
(410, 'Sales Coordinator', NULL, NULL, '27', '2025-03-22 08:56:00', 'KARIUKI'),
(411, 'Sales Director', NULL, NULL, '27', '2026-03-22 08:56:00', 'KARIUKI'),
(412, 'Sales Engineer', NULL, NULL, '27', '2027-03-22 08:56:00', 'KARIUKI'),
(413, 'Sales Executive', NULL, NULL, '27', '2028-03-22 08:56:00', 'KARIUKI'),
(414, 'Sales Manager', NULL, NULL, '27', '2029-03-22 08:56:00', 'KARIUKI'),
(415, 'Sales Representative', NULL, NULL, '27', '2030-03-22 08:56:00', 'KARIUKI'),
(416, 'Sales Trainee', NULL, NULL, '27', '2031-03-22 08:56:00', 'KARIUKI'),
(417, 'Store Manager', NULL, NULL, '27', '2001-04-22 08:56:00', 'KARIUKI'),
(418, 'Strategic Account Manager', NULL, NULL, '27', '2002-04-22 08:56:00', 'KARIUKI'),
(419, 'Telesales Representative', NULL, NULL, '27', '2003-04-22 08:56:00', 'KARIUKI'),
(420, 'Visual Merchandiser', NULL, NULL, '27', '2004-04-22 08:56:00', 'KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles_grouping`
--

CREATE TABLE `job_titles_grouping` (
  `id` int(6) NOT NULL,
  `grouping_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_titles_grouping`
--

INSERT INTO `job_titles_grouping` (`id`, `grouping_name`, `time_recorded`, `recorded_by`) VALUES
(15, 'Skills-based interview questions', '2020-12-13 17:29:13', 'Njoroge'),
(16, 'Interview questions by type', '2020-12-14 07:40:53', 'Njoroge'),
(17, 'Accounting / Finance', '2021-01-11 11:19:55', 'Njoroge'),
(18, 'Admin / Customer Service', '2021-02-22 09:20:56', 'Njoroge'),
(19, 'Marketer', '2021-03-16 05:52:56', 'KARIUKI'),
(20, 'Computing / IT', '2021-03-16 07:40:13', 'KARIUKI'),
(21, 'HR / Legal / Education / Training', '2021-03-25 07:33:32', 'KARIUKI'),
(22, 'Real Estate / Engineering / Construction', '2021-03-29 07:22:09', 'PETER'),
(23, 'Healthcare / Pharmacy', '2021-03-29 07:22:09', 'PETER'),
(24, 'Hospitality / Travel', '2021-03-29 07:22:43', 'PETER'),
(25, 'Law Enforcement / Security / Logistics', '2021-03-29 07:22:43', 'PETER'),
(26, 'Marketing / PR / Media', '2021-03-29 07:23:20', 'PETER'),
(27, 'Sales / Retail', '2021-03-29 07:23:20', 'PETER');

-- --------------------------------------------------------

--
-- Table structure for table `job_titles_more_description`
--

CREATE TABLE `job_titles_more_description` (
  `id` int(6) NOT NULL,
  `title_description` varchar(500) DEFAULT NULL,
  `header_name` varchar(100) DEFAULT NULL,
  `description` varchar(7000) DEFAULT NULL,
  `title_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_titles_more_description`
--

INSERT INTO `job_titles_more_description` (`id`, `title_description`, `header_name`, `description`, `title_name`, `time_recorded`, `recorded_by`) VALUES
(423, NULL, NULL, '<h2><strong>Why test candidates&rsquo; adaptability skills in interviews</strong></h2>\r\n\r\n<p>Companies often need to change to meet new demands. Good companies have employees who swiftly adapt to industry, market and technology changes.</p>\r\n\r\n<p>Employees with the skills to adapt to change ultimately help companies grow. These employees:</p>\r\n\r\n<ul>\r\n	<li>Stay calm under pressure</li>\r\n	<li>Try out new tools and techniques to improve their work</li>\r\n	<li>Quickly come up with solutions, when problems arise</li>\r\n	<li>Accept new team members and working styles</li>\r\n</ul>\r\n\r\n<p>The following questions will help you evaluate how candidates:</p>\r\n\r\n<ul>\r\n	<li>Deal with unpredictable conditions (e.g. when a team member quits)</li>\r\n	<li>Adjust to changing circumstances (e.g. when clients modify their requirements)</li>\r\n	<li>Help their coworkers embrace change (e.g. when they have to comply with a new&nbsp;<a href=\"https://resources.workable.com/tutorial/popular-company-policies\" target=\"_blank\">company policy</a>)</li>\r\n	<li>Take on new tasks (e.g. when their job requirements increase)</li>\r\n</ul>\r\n\r\n<p><a name=\"intro_questions\"></a></p>\r\n\r\n<h2><strong>Examples of adaptability interview questions</strong></h2>\r\n\r\n<ul>\r\n	<li>How do you adjust to changes you have no control over? (e.g. A person from your team decides to quit.)</li>\r\n	<li>If your coworkers had a &ldquo;this is how we do it&rdquo; attitude to learning something new, how would you try to convince them to follow a different, more effective method of working?</li>\r\n	<li>What are the biggest challenges you&rsquo;re facing when starting a new job?</li>\r\n	<li>You have been working on a client&rsquo;s project for a while, when your manager informs you that the project&rsquo;s requirements changed suddenly. What would you do?</li>\r\n	<li>How do you re-adjust your schedule when your manager asks you to prepare a report within an hour? How do you make sure you don&rsquo;t fall behind your regular tasks?</li>\r\n	<li>Describe a time you were assigned new tasks (e.g. due to job enrichment or promotion.) How did you adapt?</li>\r\n	<li>The new HR Manager implements formal, quarterly performance reviews for all employees. How would you prepare yourself and your team, if you were used to having only informal meetings?</li>\r\n	<li>Tell me about a time you had to learn how to use a new tool at work. How long did it take you to understand its features use it daily?</li>\r\n</ul>\r\n\r\n<h2><strong>How to evaluate candidates&rsquo; adaptability skills</strong></h2>\r\n\r\n<ul>\r\n	<li>The&nbsp;<a href=\"https://resources.workable.com/blog/onboarding-new-hire-checklist\" target=\"_blank\">onboarding process</a>&nbsp;requires employees to adjust to new team members and different working styles. Candidates who describe how quickly they&rsquo;ve onboarded in past positions are likely to be successful in their new role.</li>\r\n	<li>For candidates who are considering a significant career change, ask what drives them to make that move and how confident they are with unfamiliar procedures and tasks.</li>\r\n	<li>Keep an eye out for people who consider all possible scenarios before making a decision. These candidates are more likely to adjust to unplanned circumstances.</li>\r\n	<li>For senior-level positions, look for candidates who value flexibility, are open to new ideas and have solid&nbsp;<a href=\"https://resources.workable.com/change-management-interview-questions\" target=\"_blank\">change management skills</a>.</li>\r\n	<li>If the position requires participating in multiple projects and collaboration with various teams/departments, opt for candidates who prefer mixing up their daily tasks instead of a routine.</li>\r\n</ul>\r\n\r\n<h2><strong>Red flags</strong></h2>\r\n\r\n<ul>\r\n	<li><strong>They&rsquo;re not open-minded.</strong>&nbsp;People who stick to what they already know and are reluctant to try non-traditional solutions are less likely to adapt well to change.</li>\r\n	<li><strong>They&rsquo;re scared of the unknown.</strong>&nbsp;If your company&rsquo;s environment is fast-paced and employees need to take on multiple tasks beyond their scope of responsibilities, look for candidates who aren&rsquo;t afraid of taking risks and learning new skills.</li>\r\n	<li><strong>They&rsquo;re not good team players.</strong>&nbsp;Being adaptable also means adjusting your working style for the team&rsquo;s sake. Opt for candidates who value&nbsp;<a href=\"https://resources.workable.com/team-player-interview-questions\" target=\"_blank\">collaboration</a>&nbsp;and flexibility.</li>\r\n	<li><strong>They&rsquo;re nervous.</strong>&nbsp;Candidates who can&rsquo;t stay calm under sudden changes mightn&rsquo;t be able to find quick and effective solutions to unexpected issues.</li>\r\n	<li><strong>They&rsquo;re negative.</strong>&nbsp;Candidates who blame others and are&nbsp;<a href=\"https://resources.workable.com/tutorial/toxic-employees\" target=\"_blank\">grumpy</a>&nbsp;when they have to adapt to a change are less likely to accept new circumstances.</li>\r\n</ul>\r\n', '26', '2021-07-03 13:59:37', NULL),
(424, NULL, NULL, '<h2>Why you should test candidates&rsquo; analytical skills</h2>\r\n\r\n<p>Analytical skills refer to the ability to gather data, break down a problem, weigh pros and cons and reach logical decisions. Employees who have these skills help companies overcome challenges, or spot issues before they become problems.</p>\r\n\r\n<p>Every position requires analytical skills. For some roles (e.g.&nbsp;<a href=\"https://resources.workable.com/investment-banker-job-description\" target=\"_blank\">Investment Banker</a>), methodical thinking is key, while for others (e.g.&nbsp;<a href=\"https://resources.workable.com/marketing-specialist-job-description\" target=\"_blank\">Marketing Strategist</a>) brainstorming abilities are more relevant. Regardless of how they approach problems, employees with sharp analytical skills are able to confidently connect the dots and come up with solutions.</p>\r\n\r\n<p>The following analytical interview questions will help you assess how candidates:</p>\r\n\r\n<ul>\r\n	<li>Gather data from various sources</li>\r\n	<li>Use a&nbsp;<a href=\"https://resources.workable.com/critical-thinking-interview-questions\" target=\"_blank\">critical thinking</a>&nbsp;to evaluate information</li>\r\n	<li>Communicate the findings of their research to team members</li>\r\n	<li>Make judgments that help businesses</li>\r\n</ul>\r\n\r\n<p>Combine these questions with&nbsp;<a href=\"https://resources.workable.com/problem-solving-interview-questions\" target=\"_blank\">problem-solving</a>&nbsp;and&nbsp;<a href=\"https://resources.workable.com/competency-based-interview-questions\" target=\"_blank\">competency-based</a>&nbsp;interview questions to gauge how candidates address complex situations that are likely to occur on the job.</p>\r\n\r\n<p><a name=\"intro_questions\"></a></p>\r\n\r\n<h2>Examples of analytical skills interview questions</h2>\r\n\r\n<ul>\r\n	<li>Describe a time when you had to solve a problem, but didn&rsquo;t have all necessary information about it in hand. What did you do?</li>\r\n	<li>How do you weigh pros and cons before making a decision?</li>\r\n	<li>If you had to choose between two or three options, how would you decide? (e.g. pricing, performance evaluation systems, training)</li>\r\n	<li>Explain step-by-step how you troubleshoot [X] problem. (e.g. &ldquo;wifi connection issues&rdquo; or &ldquo;a sudden drop in sales&rdquo;)</li>\r\n	<li>What metrics do you track on a regular basis (e.g. conversion rates, number of new customers, expenses)? What information do you research and how do you use it?</li>\r\n	<li>Your manager wants to buy new software or hardware that will increase the team&rsquo;s productivity and asks for your recommendation. How would you reply?</li>\r\n</ul>\r\n\r\n<h2>Tips to assess analytical skills in interviews</h2>\r\n\r\n<ul>\r\n	<li>Pose hypothetical but job-related scenarios to test candidates&rsquo; way of thinking. It&rsquo;s important to figure whether they take all relevant factors into consideration.</li>\r\n	<li>Make sure you give candidates enough time to come up with an answer. These types of questions usually require thinking through a situation and evaluating given facts.</li>\r\n	<li>&ldquo;Highly analytical&rdquo; is often confused with &ldquo;losing the big picture.&rdquo; Look for people who can prioritize what&rsquo;s most important and ignore irrelevant information.</li>\r\n	<li>Candidates who are intrigued by challenges are more likely to effectively manage complex situations on the job. Keep an eye out for candidates who don&rsquo;t easily quit when faced with problems, even if they can&rsquo;t immediately find solutions.</li>\r\n</ul>\r\n\r\n<h2>Red flags</h2>\r\n\r\n<ul>\r\n	<li><strong>They give canned answers.</strong>&nbsp;Candidates tend to describe themselves in resumes and interviews as highly analytical, organized and detail-oriented. If they can&rsquo;t support these skills with examples from real work experiences, they mightn&rsquo;t be honest.</li>\r\n	<li><strong>They only scratch the surface.</strong>&nbsp;Candidates who don&rsquo;t ask follow-up questions&nbsp;are likely to jump to rushed conclusions or miss out on important facts when dealing with a challenge.</li>\r\n	<li><strong>They have poor communication skills.</strong>&nbsp;Thorough analytical skills should be paired with the ability to communicate ideas to coworkers, managers and clients. Candidates who struggle to explain technical details (e.g. rates) using simple language will find it hard to be effective in their roles.</li>\r\n	<li><strong>They make assumptions.</strong>&nbsp;Analytical skills go hand-in-hand with critical thinking. Candidates who take things for granted and don&rsquo;t fact-check tend to make more superficial decisions.</li>\r\n</ul>\r\n', '27', '2021-07-03 14:11:50', NULL),
(425, NULL, NULL, '<h2>PHP&nbsp;Developer Interview Questions</h2>\r\n\r\n<p>PHP Developers are part of the Back-end Developers team, writing code for the server side of web applications. They develop back-end components, connect applications with other (often third-party) web services and support the Front-end Developers by integrating their work.</p>\r\n\r\n<p>PHP can be quite tricky, therefore you need candidates with a solid technical background and excellent coding skills. Use these questions to determine your candidates&rsquo; levels of experience and knowledge and shortlist those who match your specific criteria. You can include an assignment to compliment your hiring process and better evaluate your candidates&rsquo; skills.</p>\r\n\r\n<p>Candidates who are able to demonstrate a strong passion for programming should stand out. As with all developers roles, it&rsquo;s important to identify candidates who show a keen interest in attending seminars or reading relevant books. Don&rsquo;t hesitate to ask about other fun projects they&rsquo;re likely to get involved with, like game development. This way, you&rsquo;ll identify candidates who enjoy learning new thing and are driven by curiosity and creativity.</p>\r\n\r\n<p><a name=\"computing_science_questions\"></a></p>\r\n\r\n<h2>Computer Science questions</h2>\r\n\r\n<ul>\r\n	<li>What&rsquo;s PEAR in PHP?</li>\r\n	<li>What&rsquo;s the difference between the include() and require() functions?</li>\r\n	<li>What are the differences between PHP constants and variables?</li>\r\n	<li>What is the difference between an interface and an abstract class?</li>\r\n</ul>\r\n\r\n<p><a name=\"role_specific_questions\"></a></p>\r\n\r\n<h2>Role-specific questions</h2>\r\n\r\n<ul>\r\n	<li>What error types have you faced and how did you fix them?</li>\r\n	<li>If you need to generate random numbers in PHP, what method would you follow?</li>\r\n	<li>How can you get web browser&rsquo;s details using PHP?</li>\r\n	<li>How would you set cookies in your website?</li>\r\n	<li>Are you familiar with SQL? How would you create a MySql database using PHP?</li>\r\n	<li>What are your duties in the software development lifecycle?</li>\r\n	<li>Explain how you develop and integrate plugins for PHP frameworks, like Laravel and Yii.</li>\r\n	<li>What features would you develop to increase user experience quality? Name any examples you find appropriate.</li>\r\n	<li>What&rsquo;s your experience with open source projects like Joomla, Drupal or osCommerce?</li>\r\n	<li>Can you give some examples of best design and coding practices?</li>\r\n	<li>How can HTML, CSS, Javascript or AJAX help you when designing a web application?</li>\r\n	<li>Describe the troubleshooting process you follow when a program doesn&rsquo;t run properly.</li>\r\n</ul>\r\n\r\n<p><a name=\"behavioral_questions\"></a></p>\r\n\r\n<h2>Behavioral questions</h2>\r\n\r\n<ul>\r\n	<li>What&rsquo;s a fun project that you&rsquo;ve worked on recently?</li>\r\n	<li>If you could attend any tech seminar, which one would you choose and why?</li>\r\n	<li>How do you ensure you discover all current programming trends?</li>\r\n	<li>Describe a situation where you collaborated with developers and engineers to complete a project. What was your contribution to the team?</li>\r\n</ul>\r\n', '182', '2021-07-03 14:15:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `id` int(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `leave_name` varchar(100) DEFAULT NULL,
  `reliever` varchar(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `entitled_days` varchar(100) DEFAULT NULL,
  `remaining_days` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending_approval',
  `reason` varchar(800) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`id`, `email`, `leave_name`, `reliever`, `start_date`, `end_date`, `duration`, `entitled_days`, `remaining_days`, `status`, `reason`, `date_recorded`, `time_recorded`, `recorded_by`) VALUES
(1, 'carol@gmail.com', 'Maternity Leave', 'PETER', '12-Jan-2021', '26-Jan-2021', '14', '30', NULL, 'approved', 'Maternal', '22-Jan-2121', '2021-01-22 07:16:17', NULL),
(2, 'pitarcheizin@gmail.com', 'Maternity Leave', 'pETRE CHGE', '11-Jan-2021', '27-Jan-2021', '16', '10', NULL, 'active', 'Maternal', '25-Jan-2121', '2021-01-25 07:51:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(6) NOT NULL,
  `leave_name` varchar(100) DEFAULT NULL,
  `entitled_days` varchar(50) DEFAULT NULL,
  `gender` varchar(100) NOT NULL DEFAULT 'male',
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `leave_name`, `entitled_days`, `gender`, `status`, `time_recorded`, `recorded_by`) VALUES
(5, 'Maternity', '90', 'Female', 'Active', '2021-01-27 11:20:28', NULL),
(6, 'Annual Leave', '21', 'Undefined', 'Active', '2021-01-27 11:23:12', 'carol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `id` int(11) NOT NULL,
  `TransactionType` varchar(200) DEFAULT NULL,
  `TransID` varchar(200) DEFAULT NULL,
  `TransTime` varchar(200) DEFAULT NULL,
  `TransAmount` varchar(200) DEFAULT NULL,
  `BusinessShortCode` varchar(200) DEFAULT NULL,
  `BillRefNumber` varchar(200) DEFAULT NULL,
  `InvoiceNumber` varchar(200) DEFAULT NULL,
  `MSISDN` varchar(200) DEFAULT NULL,
  `FirstName` varchar(200) DEFAULT NULL,
  `MiddleName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `OrgAccountBalance` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_requests`
--

CREATE TABLE `page_requests` (
  `id` int(6) NOT NULL,
  `page_id` varchar(500) DEFAULT NULL,
  `page_name` varchar(500) NOT NULL,
  `requested_by` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'default',
  `time_requested` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `time_recorded` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `time_recorded`) VALUES
(8, 'pitarcheizin@gmail.com', '030cd1ed879d9534c2b8e6b2ee87c41bef76e5ae3abe711b5633b31e9ee8879e881dddafdbb6d9ed431e8c4fced611deb117', '2021-03-01 06:39:15.000000'),
(9, 'pitarcheizin@gmail.com', '  b64e018cb48579a21f35fd6164796ece7c6b7e5b23fc1395c632d4b625d716e2044b4f063600b47b3b510a09461edaa8663d', '2021-03-17 06:03:42.239648'),
(10, 'pitarcheizin@gmail.com', '45b669fd7e986636741545db7372efd6936695864410132762734ee88a70432b20bbff455a08816730f37113b02445eb5788', '2021-06-27 12:29:07.202405'),
(11, 'pitarcheizin@gmail.com', '04fcec69a9aaeee615a3b23356bc9f43e1bf85fef2d5ecb14a7b3b7ddcc7ac3e54c1d761d82e7826327b52a5974a8192c777', '2021-06-27 12:36:31.165909'),
(12, 'Pkariuki@cma.or.ke', '5cd54fc64ab2563f7d91e33f3102326d269e2aecc7fe96ea5a1b81d869461c33115620763240b56ec598620c15f9196ad5de', '2021-07-03 14:55:54.554612'),
(13, 'Pkariuki@cma.or.ke', '94c162c3edd6cad65ed6d2215433f9b41774f0b17a9d8da0cd519702d202ac812fa8b0bfe34ddb8bcdde056ecdba1d34a767', '2021-07-21 10:47:21.143900'),
(14, 'pitarcheizin@gmail.com', '888a69720adc89d88815e8c4b73382bcbdeb899f3e3d910dc5a76a5b89a5967d7ea7c022ebb6a0b50ce70d87fe36322fb94f', '2021-07-21 10:50:38.613353'),
(15, 'pitarcheizin@gmail.com', 'abd94b44149de2464e80b5f8250fe549e2735da662e4e54d071af8ebfdddad01451dfc06224a2ad10db712516aa3e05b95f0', '2021-07-21 10:56:13.713175'),
(16, 'pitarcheizin@gmail.com', '8fe0b484d6ef571493dd8f06cf38bac9ca10393e4123fcf61e54fe79b8f92cd806a1b9033cde80371af166ead30a41330374', '2021-07-21 10:59:40.780219'),
(17, 'pitarcheizin@gmail.com', '4a0ebd49ff04833b40ee39d70b91667d4182717508a827820ab537b7cf634f04e8d7c5fc4518f4760c261b8e0a7663ab1e48', '2021-07-21 11:01:33.666833'),
(18, 'pitarcheizin@gmail.com', '4a0ebd49ff04833b40ee39d70b91667d4182717508a827820ab537b7cf634f04e8d7c5fc4518f4760c261b8e0a7663ab1e48', '2021-07-21 11:02:03.777678'),
(19, 'Pkariuki@cma.or.ke', '89871f31941e58e47e5907b5cae39b41e6c7d94ab77d633d11295eea124474f1fd47816b10693a596971ebb16e954a467526', '2021-07-21 11:03:43.560742'),
(20, 'info@potentialstaffing.com', 'beb8683e90ab79c632d2f8d46c363b56f0174ca543875e8a1155170efb4c1595a821151e17f8ea8659a8e8e74836ef147961', '2021-07-31 15:38:37.546936'),
(21, 'pitarcheizin@gmail.com', 'b512f4d82069bd2ad6f81f1a19c8419e7d08d9acfcaa5449c9f22d1b5d9da8b5bbef6b95a7b1a826047c792bfe6f8c94f61f', '2022-02-15 08:49:52.413847');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(6) NOT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `payment_type`, `time_recorded`, `recorded_by`) VALUES
(1, 'Mpesa', '2020-05-07 17:07:49', 'PETER KARIUKI'),
(2, 'Bank', '2020-05-07 17:07:49', 'PETER KARIUKI'),
(3, 'Cash', '2020-05-07 17:08:30', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(6) NOT NULL,
  `reference_no` int(11) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `supplier_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending_approval',
  `image` varchar(100) DEFAULT NULL,
  `end_product_id` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(100) NOT NULL,
  `rank_name` varchar(50) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL,
  `recorded_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id`, `rank_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'Phd', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(2, 'Masters', '2020-06-19 11:52:05', 'PETER KARIUKI'),
(3, 'Degree', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(4, 'Diploma', '2020-06-19 11:52:05', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_timer`
--

CREATE TABLE `quiz_timer` (
  `id` int(100) NOT NULL,
  `hrs` varchar(100) DEFAULT NULL,
  `mins` varchar(100) DEFAULT NULL,
  `posted_job` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_timer`
--

INSERT INTO `quiz_timer` (`id`, `hrs`, `mins`, `posted_job`, `date_created`, `time_recorded`) VALUES
(20, '3', '20', 'Human Resources Executive', NULL, '2021-07-31 15:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `request_application`
--

CREATE TABLE `request_application` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `post_name` varchar(100) DEFAULT NULL,
  `special_info` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'sent',
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_application`
--

INSERT INTO `request_application` (`id`, `reference_no`, `post_name`, `special_info`, `status`, `time_recorded`, `recorded_by`) VALUES
(22, '7240', 'Finance manager', 'Apply for the post', 'sent', '2020-12-13 17:42:00', 'Potential Staffing'),
(24, 'caro88njoroge@gmail.com', 'Senior Marketer', 'Spec requ', 'sent', '2021-03-02 13:51:37', 'Caroline');

-- --------------------------------------------------------

--
-- Table structure for table `resources_header`
--

CREATE TABLE `resources_header` (
  `id` int(6) NOT NULL,
  `resource_name` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources_header`
--

INSERT INTO `resources_header` (`id`, `resource_name`, `token`, `time_recorded`, `recorded_by`) VALUES
(3, 'Where are you located?', NULL, '2021-08-19 13:13:27', 'PETER'),
(4, 'What Type of Questions do candidates undetake', NULL, '2021-08-19 14:06:43', 'PETER'),
(5, 'What type of assessment do', NULL, '2021-08-30 17:14:32', 'Njoroge');

-- --------------------------------------------------------

--
-- Table structure for table `resource_details`
--

CREATE TABLE `resource_details` (
  `id` int(6) NOT NULL,
  `resource_id` varchar(100) DEFAULT NULL,
  `resource` varchar(5000) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_details`
--

INSERT INTO `resource_details` (`id`, `resource_id`, `resource`, `time_recorded`, `recorded_by`) VALUES
(3, '2', 'Kindly contact us 1111', '2021-08-19 08:23:04', NULL),
(4, '2', 'Kindly contact us 22222', '2021-08-19 08:23:04', NULL),
(6, '3', '<p>We are located in Westlands Nairobi</p>\r\n', '2021-08-19 13:14:16', 'PETER'),
(9, '4', '<h2>Programming Interview Questions</h2>\r\n\r\n<p>When you&rsquo;re hiring engineers and developers, you should look for candidates with theoretical and practical knowledge of specific programming languages and software that your company uses. Include a written assignment in your hiring process to evaluate the coding skills of candidates.</p>\r\n', '2021-08-19 14:08:26', 'PETER'),
(10, '4', '<h2>Data Entry Operator&nbsp;Interview Questions</h2>\r\n\r\n<p>When it comes to hiring a&nbsp;<strong>Data Entry Operator</strong>, it&rsquo;s best to prioritize hard skills over candidates&rsquo; educational backgrounds.&nbsp;In general, you&rsquo;re looking for someone who is tech-savvy and a fast typist. Experience as a data entry clerk and familiarity with common workplace software and databases is critical. Candidates&nbsp;will report to a&nbsp;<a href=\"https://resources.workable.com/data-manager-job-description\">data manager</a>.</p>\r\n', '2021-08-19 14:10:10', 'PETER'),
(12, '5', '<h2>Pre-employment testing built natively in Workable</h2>\r\n\r\n<p>No need to work with an assessments provider - choose from 5 personality and cognitive assessments, right in the job editor.</p>\r\n\r\n<ul>\r\n	<li>Send straight from the candidate timeline or schedule through&nbsp;<a href=\"https://www.workable.com/automated-actions\" target=\"_self\">automated actions</a>.</li>\r\n	<li>Review results, accompanied with predictive job performance insights, as soon as the candidate completes their tests.</li>\r\n	<li>Recruiters leave feedback in one unified place without leaving the candidate timeline.</li>\r\n</ul>\r\n', '2021-08-30 17:16:26', 'Njoroge');

-- --------------------------------------------------------

--
-- Table structure for table `scheme_rating`
--

CREATE TABLE `scheme_rating` (
  `id` int(6) NOT NULL,
  `scheme_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme_rating`
--

INSERT INTO `scheme_rating` (`id`, `scheme_name`, `time_recorded`, `recorded_by`) VALUES
(1, 'Pass', '2020-12-12 10:23:46', 'PETER KARIUKI'),
(2, 'Average ', '2020-12-12 10:23:46', 'PETER KARIUKI'),
(3, 'Failed', '2020-12-12 10:24:02', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `selected_competencies`
--

CREATE TABLE `selected_competencies` (
  `id` int(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `competency_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_competencies`
--

INSERT INTO `selected_competencies` (`id`, `email`, `competency_name`, `time_recorded`) VALUES
(36, 'pitarcheizin@gmail.com', 'Analysis', '2020-12-12 13:28:46'),
(37, 'pkariuki@cma.or.ke', 'Development', '2021-02-18 18:56:46'),
(38, 'bonface@gmail.com', 'MYSQL', '2021-02-22 08:14:05'),
(39, 'pitarcheizin@gmail.com', 'Competencies', '2021-03-25 09:55:05'),
(40, 'pitarcheizin@gmail.com', 'Procurement', '2021-03-25 09:59:34'),
(41, 'pitarcheizin@gmail.com', 'Economics', '2021-03-25 09:59:54'),
(43, 'inventory@panoramaengineering.com', 'Development', '2021-03-25 10:01:55'),
(44, 'inventory@panoramaengineering.com', 'leadership', '2021-03-25 10:23:06'),
(45, 'pitarcheizin@gmail.com', 'Competency name 3', '2021-04-06 08:30:21'),
(46, 'prchege@gmail.com', 'PHP Competency', '2021-07-31 09:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `selected_job_skills`
--

CREATE TABLE `selected_job_skills` (
  `id` int(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skill_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_job_skills`
--

INSERT INTO `selected_job_skills` (`id`, `email`, `skill_name`, `time_recorded`) VALUES
(36, 'pitarcheizin@gmail.com', 'PHP', '2020-12-12 13:28:46'),
(37, 'pkariuki@cma.or.ke', 'Development', '2021-02-18 18:56:46'),
(38, 'bonface@gmail.com', 'MYSQL', '2021-02-22 08:14:05'),
(39, 'pitarcheizin@gmail.com', 'MYSQL', '2021-03-25 09:55:05'),
(40, 'pitarcheizin@gmail.com', 'Procurement', '2021-03-25 09:59:34'),
(41, 'pitarcheizin@gmail.com', 'Economics', '2021-03-25 09:59:54'),
(42, 'bonface@gmail.com', 'Procurement', '2021-03-25 10:00:51'),
(43, 'inventory@panoramaengineering.com', 'Development', '2021-03-25 10:01:55'),
(44, 'inventory@panoramaengineering.com', 'coding', '2021-03-25 10:25:42'),
(45, 'pitarcheizin@gmail.com', 'Development', '2021-04-06 06:36:15'),
(46, 'pitarcheizin@gmail.com', 'Skill name 2', '2021-04-06 08:24:04'),
(47, 'prchege@gmail.com', 'Programming', '2021-07-26 11:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `selected_kpi`
--

CREATE TABLE `selected_kpi` (
  `id` int(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `kpi_name` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selected_kpi`
--

INSERT INTO `selected_kpi` (`id`, `email`, `kpi_name`, `time_recorded`) VALUES
(36, 'pitarcheizin@gmail.com', 'Analysis', '2020-12-12 13:28:46'),
(37, 'pkariuki@cma.or.ke', 'Development', '2021-02-18 18:56:46'),
(38, 'bonface@gmail.com', 'MYSQL', '2021-02-22 08:14:05'),
(39, 'pitarcheizin@gmail.com', 'Competencies', '2021-03-25 09:55:05'),
(40, 'pitarcheizin@gmail.com', 'Procurement', '2021-03-25 09:59:34'),
(41, 'pitarcheizin@gmail.com', 'Economics', '2021-03-25 09:59:54'),
(43, 'inventory@panoramaengineering.com', 'Development', '2021-03-25 10:01:55'),
(44, 'inventory@panoramaengineering.com', 'leadership', '2021-03-25 10:23:06'),
(45, 'pitarcheizin@gmail.com', 'KPI Name', '2021-04-06 07:53:41'),
(46, 'pitarcheizin@gmail.com', 'Kpi Peter', '2021-04-06 10:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `sell_module`
--

CREATE TABLE `sell_module` (
  `id` int(6) NOT NULL,
  `module_name` varchar(500) DEFAULT NULL,
  `access_level` varchar(500) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sell_module`
--

INSERT INTO `sell_module` (`id`, `module_name`, `access_level`, `time_recorded`, `recorded_by`) VALUES
(1, 'RECRUITMENT MANAGEMENT', 'RECRUITMENT_MANAGEMENT', '2020-12-16 09:06:10', 'PETER KARIUKI'),
(2, 'PERSONELL MANAGEMENT', 'PERSONELL_MANAGEMENT', '2020-12-16 09:06:10', 'PETER KARUKI'),
(3, 'TRAINING MANAGEMENT', 'TRAINING_MANAGEMENT', '2020-12-16 09:07:29', 'PETER KARIUKI'),
(4, 'LEAVE MANAGEMENT ', 'LEAVE_MANAGEMENT ', '2020-12-16 09:07:29', 'PETER KARIUKI'),
(5, 'PERFORMANCE MANAGEMENT', 'PERFORMANCE_MANAGEMENT', '2020-12-16 09:09:02', 'PETER KARIUKI'),
(6, 'PAYROLL MANAGEMENT', 'PAYROLL_MANAGEMENT', '2020-12-16 09:09:02', 'PETER KARIUKI');

-- --------------------------------------------------------

--
-- Table structure for table `sign_in_logs`
--

CREATE TABLE `sign_in_logs` (
  `id` int(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'default',
  `time_signed_in` varchar(50) DEFAULT NULL,
  `time_signed_out` varchar(50) DEFAULT NULL,
  `date_recorded` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_in_logs`
--

INSERT INTO `sign_in_logs` (`id`, `email`, `name`, `ip_address`, `user_type`, `time_signed_in`, `time_signed_out`, `date_recorded`) VALUES
(329, 'carol@gmail.com', '', '::1', 'default', '2020/12/12 15:24:18', '2020/12/12 15:24:24', '2020/12/12'),
(330, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/12 15:26:24', '2020/12/12 15:29:26', '2020/12/12'),
(331, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/12 15:26:24', '2020/12/12 15:29:26', '2020/12/12'),
(332, 'carol@gmail.com', '', '::1', 'default', '2020/12/12 15:30:42', '2020/12/12 15:31:44', '2020/12/12'),
(333, 'carol@gmail.com', '', '::1', 'default', '2020/12/12 15:32:03', NULL, '2020/12/12'),
(334, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/12 16:00:21', '2020/12/12 16:00:56', '2020/12/12'),
(335, 'pitarcheizin@gmail.com', '', '196.201.218.83', 'default', '2020/12/12 16:25:56', '2020/12/12 16:26:05', '2020/12/12'),
(336, 'carol@gmail.com', '', '196.201.218.83', 'default', '2020/12/12 16:26:24', '2020/12/12 16:28:34', '2020/12/12'),
(337, 'pitarcheizin@gmail.com', '', '196.201.218.83', 'default', '2020/12/12 16:28:39', NULL, '2020/12/12'),
(338, 'carol@gmail.com', '', '41.90.7.20', 'default', '2020/12/12 21:55:10', NULL, '2020/12/12'),
(339, 'carol@gmail.com', '', '102.68.77.126', 'default', '2020/12/12 23:49:12', NULL, '2020/12/12'),
(340, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 11:58:37', '2020/12/13 11:58:45', '2020/12/13'),
(341, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 11:58:49', '2020/12/13 11:58:56', '2020/12/13'),
(342, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 11:59:03', '2020/12/13 12:01:08', '2020/12/13'),
(343, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 12:01:53', '2020/12/13 12:03:03', '2020/12/13'),
(344, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 12:03:16', '2020/12/13 12:03:31', '2020/12/13'),
(345, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 17:03:46', NULL, '2020/12/13'),
(346, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 17:24:48', '2020/12/13 17:31:27', '2020/12/13'),
(347, 'pitarcheizin@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 17:44:39', '2020/12/13 17:54:31', '2020/12/13'),
(348, 'carol@gmail.com', '', '102.68.77.126', 'default', '2020/12/13 18:24:45', NULL, '2020/12/13'),
(349, 'info@potentialstaffing.com', '', '196.201.218.136', 'default', '2020/12/13 20:12:38', '2020/12/13 20:15:01', '2020/12/13'),
(350, 'caro88njoroge@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:20:34', '2020/12/13 20:27:44', '2020/12/13'),
(351, 'carol@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:27:59', '2020/12/13 20:30:54', '2020/12/13'),
(352, 'caro88njoroge@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:31:09', '2020/12/13 20:32:05', '2020/12/13'),
(353, 'info@potentialstaffing.com', '', '196.201.218.136', 'default', '2020/12/13 20:32:21', '2020/12/13 20:33:58', '2020/12/13'),
(354, 'caro88njoroge@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:34:11', '2020/12/13 20:35:29', '2020/12/13'),
(355, 'carol@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:35:41', '2020/12/13 20:36:53', '2020/12/13'),
(356, 'caro88njoroge@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:37:13', '2020/12/13 20:38:30', '2020/12/13'),
(357, 'caro88njoroge@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:38:56', '2020/12/13 20:39:24', '2020/12/13'),
(358, 'info@potentialstaffing.com', '', '196.201.218.136', 'default', '2020/12/13 20:39:40', '2020/12/13 20:42:10', '2020/12/13'),
(359, 'pitarcheizin@gmail.com', '', '196.201.218.136', 'default', '2020/12/13 20:42:24', '2020/12/13 20:44:16', '2020/12/13'),
(360, 'info@potentialstaffing.com', '', '196.201.218.136', 'default', '2020/12/13 20:44:30', NULL, '2020/12/13'),
(361, 'cma@gmail.com', '', '::1', 'default', '2020/12/14 10:36:25', '2020/12/14 10:39:26', '2020/12/14'),
(362, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/14 10:39:34', '2020/12/14 10:39:59', '2020/12/14'),
(363, 'cma@gmail.com', '', '::1', 'default', '2020/12/14 10:40:04', '2020/12/14 10:40:26', '2020/12/14'),
(364, 'carol@gmail.com', '', '::1', 'default', '2020/12/14 10:40:35', '2020/12/14 10:41:24', '2020/12/14'),
(365, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/14 10:41:33', '2020/12/14 10:41:55', '2020/12/14'),
(366, 'carol@gmail.com', '', '::1', 'default', '2020/12/14 10:42:08', '2020/12/14 10:42:37', '2020/12/14'),
(367, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/14 10:42:47', '2020/12/15 08:10:57', '2020/12/14'),
(368, 'carol@gmail.com', '', '::1', 'default', '2020/12/15 08:11:38', '2020/12/16 11:48:23', '2020/12/15'),
(369, 'carol@gmail.com', '', '::1', 'default', '2020/12/16 12:43:29', '2020/12/16 13:03:21', '2020/12/16'),
(370, 'recruitment@gmail.com', '', '::1', 'default', '2020/12/16 13:03:42', '2020/12/16 13:04:17', '2020/12/16'),
(371, 'carol@gmail.com', '', '::1', 'default', '2020/12/16 14:14:16', '2020/12/17 08:18:33', '2020/12/16'),
(372, 'personell@gmail.com', '', '::1', 'default', '2020/12/17 08:19:58', '2020/12/17 10:19:18', '2020/12/17'),
(373, 'carol@gmail.com', '', '::1', 'default', '2020/12/17 10:19:30', '2020/12/17 10:24:59', '2020/12/17'),
(374, 'personell@gmail.com', '', '::1', 'default', '2020/12/17 10:25:05', '2020/12/17 10:26:24', '2020/12/17'),
(375, 'p3@gmail.com', '', '::1', 'default', '2020/12/17 10:26:35', '2020/12/17 10:29:52', '2020/12/17'),
(376, 'personell@gmail.com', '', '::1', 'default', '2020/12/17 10:30:04', '2020/12/17 16:10:32', '2020/12/17'),
(377, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/21 08:47:32', '2020/12/21 09:05:16', '2020/12/21'),
(378, 'carol@gmail.com', '', '::1', 'default', '2020/12/21 09:05:26', '2020/12/21 09:06:01', '2020/12/21'),
(379, 'personell@gmail.com', '', '::1', 'default', '2020/12/21 09:06:17', '2020/12/21 12:18:08', '2020/12/21'),
(380, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/21 12:57:23', '2020/12/21 12:57:31', '2020/12/21'),
(381, 'carol@gmail.com', '', '::1', 'default', '2020/12/21 12:57:39', '2020/12/21 12:59:00', '2020/12/21'),
(382, 'personell@gmail.com', '', '::1', 'default', '2020/12/21 12:59:05', '2020/12/21 17:00:45', '2020/12/21'),
(383, 'personell@gmail.com', '', '::1', 'default', '2020/12/21 17:08:51', '2020/12/22 09:26:47', '2020/12/21'),
(384, 'personell@gmail.com', '', '::1', 'default', '2020/12/22 09:40:17', '2020/12/22 09:48:38', '2020/12/22'),
(385, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/22 09:48:47', '2020/12/22 10:08:38', '2020/12/22'),
(386, 'personell@gmail.com', '', '::1', 'default', '2020/12/22 10:08:48', '2020/12/30 13:12:23', '2020/12/22'),
(387, 'pitarcheizin@gmail.com', '', '::1', 'default', '2020/12/30 13:13:02', '2020/12/31 07:43:19', '2020/12/30'),
(388, 'carol@gmail.com', '', '::1', 'default', '2020/12/31 07:44:00', '2020/12/31 07:45:43', '2020/12/31'),
(389, 'training@gmail.com', '', '::1', 'default', '2020/12/31 07:45:53', '2020/12/31 07:46:04', '2020/12/31'),
(390, 'personell@gmail.com', '', '::1', 'default', '2020/12/31 07:46:12', '2020/12/31 07:55:32', '2020/12/31'),
(391, 'training@gmail.com', '', '::1', 'default', '2020/12/31 07:55:46', '2020/12/31 07:55:52', '2020/12/31'),
(392, 'personell@gmail.com', '', '::1', 'default', '2020/12/31 07:56:01', '2020/12/31 07:56:16', '2020/12/31'),
(393, 'p3@gmail.com', '', '::1', 'default', '2020/12/31 07:56:22', '2020/12/31 07:56:38', '2020/12/31'),
(394, 'training@gmail.com', '', '::1', 'default', '2020/12/31 07:56:50', '2020/12/31 08:10:20', '2020/12/31'),
(395, 'personell@gmail.com', '', '::1', 'default', '2020/12/31 08:10:29', '2020/12/31 09:43:36', '2020/12/31'),
(396, 'training@gmail.com', '', '::1', 'default', '2020/12/31 09:43:54', '2020/12/31 13:34:31', '2020/12/31'),
(397, 'training@gmail.com', '', '::1', 'default', '2020/12/31 13:34:40', NULL, '2020/12/31'),
(398, 'personell@gmail.com', '', '::1', 'default', '2021/01/01 18:30:40', '2021/01/01 18:31:57', '2021/01/01'),
(399, 'training@gmail.com', '', '::1', 'default', '2021/01/01 18:32:08', '2021/01/01 20:21:03', '2021/01/01'),
(400, 'trainer@gmail.com', '', '::1', 'default', '2021/01/01 20:21:17', '2021/01/04 11:11:10', '2021/01/01'),
(401, 'training@gmail.com', '', '::1', 'default', '2021/01/04 11:35:40', NULL, '2021/01/04'),
(402, 'training@gmail.com', '', '::1', 'default', '2021/01/04 16:32:46', NULL, '2021/01/04'),
(403, 'training@gmail.com', '', '::1', 'default', '2021/01/04 17:19:24', NULL, '2021/01/04'),
(404, 'training@gmail.com', '', '::1', 'default', '2021/01/04 17:38:01', '2021/01/04 20:19:36', '2021/01/04'),
(405, 'personell@gmail.com', '', '::1', 'default', '2021/01/04 20:19:47', '2021/01/04 20:23:26', '2021/01/04'),
(406, 'carol@gmail.com', '', '::1', 'default', '2021/01/04 20:23:33', '2021/01/04 20:24:23', '2021/01/04'),
(407, 'personell@gmail.com', '', '::1', 'default', '2021/01/04 20:24:30', '2021/01/04 20:27:41', '2021/01/04'),
(408, 'carol@gmail.com', '', '::1', 'default', '2021/01/04 20:27:48', '2021/01/04 20:33:49', '2021/01/04'),
(409, 'personell@gmail.com', '', '::1', 'default', '2021/01/04 20:33:56', '2021/01/04 20:37:17', '2021/01/04'),
(410, 'carol@gmail.com', '', '::1', 'default', '2021/01/04 20:37:24', '2021/01/04 21:23:08', '2021/01/04'),
(411, 'carol@gmail.com', '', '::1', 'default', '2021/01/04 21:23:22', '2021/01/04 21:24:05', '2021/01/04'),
(412, 'carol@gmail.com', '', '::1', 'default', '2021/01/04 21:24:33', '2021/01/05 00:54:19', '2021/01/04'),
(413, 'training@gmail.com', '', '::1', 'default', '2021/01/08 11:17:18', '2021/01/08 12:18:54', '2021/01/08'),
(414, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/01/08 12:19:08', '2021/01/08 12:45:41', '2021/01/08'),
(415, 'training@gmail.com', '', '::1', 'default', '2021/01/08 12:45:52', '2021/01/08 13:36:52', '2021/01/08'),
(416, 'carol@gmail.com', '', '::1', 'default', '2021/01/08 13:37:01', '2021/01/08 13:39:59', '2021/01/08'),
(417, 'training@gmail.com', '', '::1', 'default', '2021/01/08 13:40:06', '2021/01/08 13:46:15', '2021/01/08'),
(418, 'carol@gmail.com', '', '::1', 'default', '2021/01/08 13:46:24', '2021/01/08 13:57:20', '2021/01/08'),
(419, 'training@gmail.com', '', '::1', 'default', '2021/01/08 13:57:30', '2021/01/09 11:12:28', '2021/01/08'),
(420, 'personell@gmail.com', '', '::1', 'default', '2021/01/09 11:12:42', '2021/01/09 11:14:43', '2021/01/09'),
(421, 'training@gmail.com', '', '::1', 'default', '2021/01/09 11:14:54', '2021/01/09 11:16:06', '2021/01/09'),
(422, 'trainer@gmail.com', '', '::1', 'default', '2021/01/09 11:16:15', '2021/01/09 11:16:52', '2021/01/09'),
(423, 'training@gmail.com', '', '::1', 'default', '2021/01/09 11:17:08', '2021/01/09 12:12:44', '2021/01/09'),
(424, 'carol@gmail.com', '', '::1', 'default', '2021/01/09 12:12:53', '2021/01/11 10:26:16', '2021/01/09'),
(425, 'carol@gmail.com', '', '::1', 'default', '2021/01/11 10:26:26', '2021/01/11 10:34:36', '2021/01/11'),
(426, 'carol@gmail.com', '', '::1', 'default', '2021/01/11 10:34:47', '2021/01/11 10:40:37', '2021/01/11'),
(427, 'training@gmail.com', '', '::1', 'default', '2021/01/11 10:40:47', '2021/01/11 14:09:28', '2021/01/11'),
(428, 'carol@gmail.com', '', '::1', 'default', '2021/01/11 14:10:00', NULL, '2021/01/11'),
(429, 'carol@gmail.com', '', '::1', 'default', '2021/01/11 21:24:27', '2021/01/12 09:52:19', '2021/01/11'),
(430, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/01/12 09:52:35', '2021/01/12 09:55:56', '2021/01/12'),
(431, 'cma@gmail.com', '', '::1', 'default', '2021/01/12 09:56:06', '2021/01/12 09:56:46', '2021/01/12'),
(432, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/01/12 09:57:00', '2021/01/12 10:04:41', '2021/01/12'),
(433, 'training@gmail.com', '', '::1', 'default', '2021/01/12 10:04:55', '2021/01/12 11:27:04', '2021/01/12'),
(434, 'dan@gmail.com', '', '::1', 'default', '2021/01/12 11:27:17', '2021/01/12 11:27:25', '2021/01/12'),
(435, 'carol@gmail.com', '', '::1', 'default', '2021/01/12 11:27:33', NULL, '2021/01/12'),
(436, 'carol@gmail.com', '', '::1', 'default', '2021/01/22 08:38:53', '2021/01/25 10:41:15', '2021/01/22'),
(437, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/01/25 10:41:32', NULL, '2021/01/25'),
(438, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/01/27 09:41:03', '2021/01/27 09:41:20', '2021/01/27'),
(439, 'carol@gmail.com', '', '::1', 'default', '2021/01/27 09:41:30', '2021/01/29 08:40:27', '2021/01/27'),
(440, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/01 09:17:52', '2021/02/01 09:18:05', '2021/02/01'),
(441, 'carol@gmail.com', '', '::1', 'default', '2021/02/01 09:18:16', '2021/02/01 10:21:05', '2021/02/01'),
(442, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/01 13:37:37', '2021/02/01 13:37:52', '2021/02/01'),
(443, 'carol@gmail.com', '', '::1', 'default', '2021/02/01 16:02:24', '2021/02/01 16:17:30', '2021/02/01'),
(444, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/01 17:20:32', '2021/02/01 17:20:39', '2021/02/01'),
(445, 'carol@gmail.com', '', '::1', 'default', '2021/02/02 21:30:48', '2021/02/02 21:31:11', '2021/02/02'),
(446, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/03 11:23:20', NULL, '2021/02/03'),
(447, 'carol@gmail.com', '', '::1', 'default', '2021/02/03 11:23:37', '2021/02/03 11:34:48', '2021/02/03'),
(448, 'carol@gmail.com', '', '::1', 'default', '2021/02/03 15:56:18', '2021/02/04 09:19:27', '2021/02/03'),
(449, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 12:02:35', '2021/02/04 20:57:23', '2021/02/04'),
(450, 'personell@gmail.com', '', '::1', 'default', '2021/02/04 20:57:31', '2021/02/04 20:58:26', '2021/02/04'),
(451, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 20:58:47', '2021/02/04 21:34:23', '2021/02/04'),
(452, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/04 21:37:49', '2021/02/04 21:40:14', '2021/02/04'),
(453, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 21:40:26', '2021/02/04 22:41:35', '2021/02/04'),
(454, 'p3@gmail.com', '', '::1', 'default', '2021/02/04 22:41:55', '2021/02/04 22:42:00', '2021/02/04'),
(455, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 22:42:09', '2021/02/04 22:42:20', '2021/02/04'),
(456, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 22:43:13', '2021/02/04 22:43:32', '2021/02/04'),
(457, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 22:44:28', '2021/02/04 22:46:32', '2021/02/04'),
(458, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/04 22:46:47', '2021/02/04 22:47:46', '2021/02/04'),
(459, 'carol@gmail.com', '', '::1', 'default', '2021/02/04 22:47:54', '2021/02/05 10:15:27', '2021/02/04'),
(460, 'carol@gmail.com', '', '::1', 'default', '2021/02/05 10:28:15', '2021/02/05 10:37:30', '2021/02/05'),
(461, 'carol@gmail.com', '', '::1', 'default', '2021/02/05 10:40:34', '2021/02/05 10:42:53', '2021/02/05'),
(462, 'carol@gmail.com', '', '::1', 'default', '2021/02/05 10:58:12', '2021/02/05 10:58:20', '2021/02/05'),
(463, 'carol@gmail.com', '', '::1', 'default', '2021/02/05 11:00:17', '2021/02/05 11:16:33', '2021/02/05'),
(464, 'carol@gmail.com', '', '::1', 'default', '2021/02/05 11:49:59', '2021/02/06 18:02:50', '2021/02/05'),
(465, 'carol@gmail.com', '', '::1', 'default', '2021/02/06 18:31:39', NULL, '2021/02/06'),
(466, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 08:21:35', '2021/02/15 08:21:55', '2021/02/15'),
(467, 'carol@gmail.com', '', '::1', 'default', '2021/02/15 08:22:03', '2021/02/15 08:30:39', '2021/02/15'),
(468, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 08:30:51', '2021/02/15 08:31:23', '2021/02/15'),
(469, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 08:31:37', '2021/02/15 11:46:26', '2021/02/15'),
(470, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 11:47:29', '2021/02/15 11:52:48', '2021/02/15'),
(471, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 11:56:09', '2021/02/15 12:01:47', '2021/02/15'),
(472, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 14:47:32', '2021/02/15 14:49:57', '2021/02/15'),
(473, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 14:55:07', NULL, '2021/02/15'),
(474, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 15:41:29', NULL, '2021/02/15'),
(475, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 15:41:33', NULL, '2021/02/15'),
(476, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 17:21:59', '2021/02/15 17:25:59', '2021/02/15'),
(477, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/15 17:34:25', NULL, '2021/02/15'),
(478, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 11:12:32', NULL, '2021/02/16'),
(479, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 11:45:32', '2021/02/16 11:48:14', '2021/02/16'),
(480, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 11:49:26', '2021/02/16 11:57:45', '2021/02/16'),
(481, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 11:58:16', NULL, '2021/02/16'),
(482, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 12:08:47', NULL, '2021/02/16'),
(483, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 12:14:54', NULL, '2021/02/16'),
(484, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 12:31:01', '2021/02/16 12:41:37', '2021/02/16'),
(485, 'dan@gmail.com', '', '::1', 'default', '2021/02/16 12:41:56', '2021/02/16 12:42:13', '2021/02/16'),
(486, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/16 12:42:24', '2021/02/17 17:01:31', '2021/02/16'),
(487, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/17 17:35:46', '2021/02/17 21:15:24', '2021/02/17'),
(488, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/17 21:15:34', '2021/02/17 21:22:23', '2021/02/17'),
(489, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/17 21:22:31', '2021/02/18 00:13:30', '2021/02/17'),
(490, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 00:24:00', '2021/02/18 00:35:32', '2021/02/18'),
(491, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 00:54:04', NULL, '2021/02/18'),
(492, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 01:03:53', '2021/02/18 01:08:04', '2021/02/18'),
(493, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 08:47:32', '2021/02/18 13:04:52', '2021/02/18'),
(494, 'p3@gmail.com', '', '::1', 'default', '2021/02/18 13:05:36', '2021/02/18 13:15:29', '2021/02/18'),
(495, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 13:17:51', '2021/02/18 13:19:03', '2021/02/18'),
(496, 'p3@gmail.com', '', '::1', 'default', '2021/02/18 13:23:58', '2021/02/18 13:29:14', '2021/02/18'),
(497, 'p3@gmail.com', '', '::1', 'default', '2021/02/18 13:36:23', '2021/02/18 13:38:24', '2021/02/18'),
(498, 'p3@gmail.com', '', '::1', 'default', '2021/02/18 13:39:00', '2021/02/18 13:59:01', '2021/02/18'),
(499, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/18 13:59:24', NULL, '2021/02/18'),
(500, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/18 17:43:23', NULL, '2021/02/18'),
(501, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 17:46:57', '2021/02/18 17:54:42', '2021/02/18'),
(502, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/18 17:54:50', '2021/02/18 18:14:07', '2021/02/18'),
(503, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 18:14:17', '2021/02/18 19:20:55', '2021/02/18'),
(504, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/18 19:21:15', '2021/02/18 19:35:59', '2021/02/18'),
(505, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 19:36:59', '2021/02/18 21:56:05', '2021/02/18'),
(506, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/18 21:56:13', '2021/02/18 22:07:08', '2021/02/18'),
(507, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 22:07:20', '2021/02/18 22:18:16', '2021/02/18'),
(508, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/18 22:20:44', '2021/02/19 22:16:00', '2021/02/18'),
(509, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/19 22:18:14', '2021/02/19 22:19:37', '2021/02/19'),
(510, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/19 22:19:53', '2021/02/22 09:04:15', '2021/02/19'),
(511, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/22 09:04:25', NULL, '2021/02/22'),
(512, 'p3@gmail.com', '', '::1', 'default', '2021/02/22 09:06:12', '2021/02/22 09:08:05', '2021/02/22'),
(513, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/22 09:08:15', '2021/02/22 11:06:50', '2021/02/22'),
(514, 'bonface@gmail.com', '', '::1', 'default', '2021/02/22 11:08:55', '2021/02/22 12:20:08', '2021/02/22'),
(515, 'carol@gmail.com', '', '::1', 'default', '2021/02/22 12:20:16', '2021/02/22 12:21:41', '2021/02/22'),
(516, 'bonface@gmail.com', '', '::1', 'default', '2021/02/22 12:21:51', '2021/02/22 13:57:14', '2021/02/22'),
(517, 'carol@gmail.com', '', '::1', 'default', '2021/02/22 13:57:27', '2021/02/22 21:12:29', '2021/02/22'),
(518, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/22 21:12:44', NULL, '2021/02/22'),
(519, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/22 21:33:55', '2021/02/22 21:34:33', '2021/02/22'),
(520, 'bonface@gmail.com', '', '::1', 'default', '2021/02/22 21:34:39', NULL, '2021/02/22'),
(521, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/23 12:10:17', '2021/02/23 12:56:51', '2021/02/23'),
(522, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/23 20:36:45', NULL, '2021/02/23'),
(523, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/25 09:04:54', NULL, '2021/02/25'),
(524, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/28 17:42:35', NULL, '2021/02/28'),
(525, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/28 17:42:42', NULL, '2021/02/28'),
(526, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/28 17:42:47', '2021/02/28 17:57:02', '2021/02/28'),
(527, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/02/28 18:26:31', '2021/02/28 18:29:00', '2021/02/28'),
(528, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/28 18:29:12', '2021/02/28 18:29:24', '2021/02/28'),
(529, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/28 18:31:38', '2021/02/28 18:32:37', '2021/02/28'),
(530, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/02/28 18:53:04', '2021/03/01 08:16:11', '2021/02/28'),
(531, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:16:41', '2021/03/01 08:30:31', '2021/03/01'),
(532, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:31:40', '2021/03/01 08:31:56', '2021/03/01'),
(533, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:36:33', '2021/03/01 08:36:47', '2021/03/01'),
(534, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:39:58', '2021/03/01 08:40:09', '2021/03/01'),
(535, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:43:17', '2021/03/01 08:43:29', '2021/03/01'),
(536, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:45:49', '2021/03/01 08:46:00', '2021/03/01'),
(537, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:47:11', '2021/03/01 08:52:38', '2021/03/01'),
(538, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 08:53:17', '2021/03/01 09:22:04', '2021/03/01'),
(539, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 09:23:08', '2021/03/01 09:23:17', '2021/03/01'),
(540, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 12:42:58', '2021/03/01 13:20:53', '2021/03/01'),
(541, 'carol@gmail.com', '', '::1', 'default', '2021/03/01 13:21:57', '2021/03/01 13:22:39', '2021/03/01'),
(542, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 13:22:51', '2021/03/01 14:00:22', '2021/03/01'),
(543, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 14:00:48', '2021/03/01 14:01:59', '2021/03/01'),
(544, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 14:02:35', '2021/03/01 14:14:12', '2021/03/01'),
(545, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 14:15:01', NULL, '2021/03/01'),
(546, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 15:29:52', '2021/03/01 21:29:55', '2021/03/01'),
(547, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/01 21:38:44', '2021/03/02 11:09:11', '2021/03/01'),
(548, 'carol@gmail.com', '', '::1', 'default', '2021/03/02 15:51:13', '2021/03/02 17:26:01', '2021/03/02'),
(549, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/02 17:26:20', '2021/03/02 18:25:30', '2021/03/02'),
(550, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/02 18:25:48', '2021/03/02 18:25:55', '2021/03/02'),
(551, 'carol@gmail.com', '', '::1', 'default', '2021/03/02 18:26:08', '2021/03/02 18:29:30', '2021/03/02'),
(552, 'carol@gmail.com', '', '::1', 'default', '2021/03/02 18:29:41', '2021/03/02 19:12:37', '2021/03/02'),
(553, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/02 19:58:02', '2021/03/02 20:17:53', '2021/03/02'),
(554, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/05 09:41:19', '2021/03/05 09:41:32', '2021/03/05'),
(555, 'carol@gmail.com', '', '::1', 'default', '2021/03/05 09:41:38', '2021/03/05 09:43:18', '2021/03/05'),
(556, 'carol@gmail.com', '', '::1', 'default', '2021/03/05 09:54:05', NULL, '2021/03/05'),
(557, 'carol@gmail.com', '', '::1', 'default', '2021/03/09 08:54:37', '2021/03/15 13:20:15', '2021/03/09'),
(558, 'carol@gmail.com', '', '::1', 'default', '2021/03/16 08:13:53', NULL, '2021/03/16'),
(559, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/16 08:18:27', '2021/03/16 15:12:28', '2021/03/16'),
(560, 'inventory@panoramaengineering.com', '', '::1', 'default', '2021/03/16 15:13:04', '2021/03/16 15:14:48', '2021/03/16'),
(561, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/16 15:15:48', '2021/03/16 15:17:55', '2021/03/16'),
(562, 'inventory@panoramaengineering.com', '', '::1', 'default', '2021/03/16 15:18:56', '2021/03/16 23:16:33', '2021/03/16'),
(563, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/16 23:16:52', NULL, '2021/03/16'),
(564, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/17 09:20:32', '2021/03/17 10:12:44', '2021/03/17'),
(565, 'bonface@gmail.com', '', '::1', 'default', '2021/03/17 10:13:41', '2021/03/17 10:14:32', '2021/03/17'),
(566, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/03/17 10:15:03', '2021/03/17 10:15:34', '2021/03/17'),
(567, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/17 10:15:44', '2021/03/17 10:16:40', '2021/03/17'),
(568, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/17 10:16:53', '2021/03/17 11:55:37', '2021/03/17'),
(569, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/17 11:55:59', '2021/03/17 16:16:07', '2021/03/17'),
(570, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/17 16:16:39', '2021/03/25 10:24:43', '2021/03/17'),
(571, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 10:24:58', NULL, '2021/03/25'),
(572, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 10:33:12', '2021/03/25 10:34:15', '2021/03/25'),
(573, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 10:34:36', '2021/03/25 10:35:05', '2021/03/25'),
(574, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 10:35:27', '2021/03/25 10:36:18', '2021/03/25'),
(575, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 10:36:52', '2021/03/25 10:55:40', '2021/03/25'),
(576, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 10:55:56', '2021/03/25 11:06:45', '2021/03/25'),
(577, 'inventory@panoramaengineering.com', '', '::1', 'default', '2021/03/25 11:06:50', '2021/03/25 11:07:57', '2021/03/25'),
(578, 'bonface@gmail.com', '', '::1', 'default', '2021/03/25 11:08:02', '2021/03/25 11:08:39', '2021/03/25'),
(579, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 11:08:48', '2021/03/25 12:54:28', '2021/03/25'),
(580, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 12:54:54', '2021/03/25 13:00:27', '2021/03/25'),
(581, 'bonface@gmail.com', '', '::1', 'default', '2021/03/25 13:00:37', '2021/03/25 13:01:36', '2021/03/25'),
(582, 'inventory@panoramaengineering.com', '', '::1', 'default', '2021/03/25 13:01:46', '2021/03/25 13:04:44', '2021/03/25'),
(583, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 13:04:53', '2021/03/25 13:30:43', '2021/03/25'),
(584, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/25 13:30:55', NULL, '2021/03/25'),
(585, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/29 09:29:13', '2021/03/29 09:30:49', '2021/03/29'),
(586, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/03/29 09:31:50', NULL, '2021/03/29'),
(587, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/04/06 09:20:55', NULL, '2021/04/06'),
(588, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/04/07 16:23:38', NULL, '2021/04/07'),
(589, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/04/07 16:54:52', NULL, '2021/04/07'),
(590, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/04/29 10:21:52', NULL, '2021/04/29'),
(591, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/05/23 10:49:01', NULL, '2021/05/23'),
(592, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/05/23 12:08:48', NULL, '2021/05/23'),
(593, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/05/23 12:16:56', NULL, '2021/05/23'),
(594, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/05/23 12:28:07', NULL, '2021/05/23'),
(595, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/05/23 12:48:08', NULL, '2021/05/23'),
(596, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/05/23 13:01:38', NULL, '2021/05/23'),
(597, 'pitarcheizin@gmail.com', '', '::1', 'default', '2021/05/23 14:31:06', NULL, '2021/05/23'),
(598, 'pkariuki@cma.or.ke', '', '::1', 'default', '2021/05/23 14:33:35', NULL, '2021/05/23'),
(599, 'tp@gmail.com', '', '::1', 'default', '2021/05/23 14:41:18', NULL, '2021/05/23'),
(600, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/05/31 08:46:52', NULL, '2021/05/31'),
(601, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/27 14:59:26', NULL, '2021/06/27'),
(602, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/27 16:46:00', NULL, '2021/06/27'),
(603, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/27 19:54:56', NULL, '2021/06/27'),
(604, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/28 15:18:28', NULL, '2021/06/28'),
(605, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/28 19:24:20', NULL, '2021/06/28'),
(606, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/29 09:41:35', NULL, '2021/06/29'),
(607, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/29 14:48:08', NULL, '2021/06/29'),
(608, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/29 20:01:01', NULL, '2021/06/29'),
(609, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/30 12:32:29', NULL, '2021/06/30'),
(610, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/06/30 16:00:50', NULL, '2021/06/30'),
(611, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/01 16:50:12', NULL, '2021/07/01'),
(612, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/01 17:48:06', NULL, '2021/07/01'),
(613, 'pitarcheizin@gmail.com', '', '102.167.201.214', 'default', '2021/07/02 08:46:54', NULL, '2021/07/02'),
(614, 'pitarcheizin@gmail.com', '', '154.122.47.0', 'default', '2021/07/02 09:59:36', NULL, '2021/07/02'),
(615, 'pitarcheizin@gmail.com', '', '102.167.246.203', 'default', '2021/07/02 11:55:18', NULL, '2021/07/02'),
(616, 'pitarcheizin@gmail.com', '', '102.167.246.203', 'default', '2021/07/02 11:58:41', NULL, '2021/07/02'),
(617, 'pitarcheizin@gmail.com', '', '197.232.79.1', 'default', '2021/07/03 16:33:35', NULL, '2021/07/03'),
(618, 'caro88njoroge@gmail.com', '', '197.232.79.1', 'default', '2021/07/03 17:45:50', NULL, '2021/07/03'),
(619, 'pitarcheizin@gmail.com', '', '197.232.79.1', 'default', '2021/07/03 18:00:52', NULL, '2021/07/03'),
(620, 'pitarcheizin@gmail.com', '', '197.232.79.1', 'default', '2021/07/03 18:32:54', NULL, '2021/07/03'),
(621, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/04 10:50:44', NULL, '2021/07/04'),
(622, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/04 10:52:39', NULL, '2021/07/04'),
(623, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/04 15:44:25', NULL, '2021/07/04'),
(624, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/09 14:23:27', NULL, '2021/07/09'),
(625, 'pitarcheizin@gmail.com', '', '154.123.17.23', 'default', '2021/07/11 16:57:52', NULL, '2021/07/11'),
(626, 'pitarcheizin@gmail.com', '', '154.123.17.23', 'default', '2021/07/11 17:30:06', NULL, '2021/07/11'),
(627, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/20 12:50:15', NULL, '2021/07/20'),
(628, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/20 15:08:18', NULL, '2021/07/20'),
(629, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/20 15:27:51', NULL, '2021/07/20'),
(630, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 08:43:39', NULL, '2021/07/21'),
(631, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 08:57:18', NULL, '2021/07/21'),
(632, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 12:55:47', NULL, '2021/07/21'),
(633, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 13:43:29', NULL, '2021/07/21'),
(634, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 14:03:08', NULL, '2021/07/21'),
(635, 'pkariuki@cma.or.ke', '', '41.139.160.21', 'default', '2021/07/21 14:05:22', NULL, '2021/07/21'),
(636, 'inventory@panoramaengineering.com', '', '41.139.160.21', 'default', '2021/07/21 14:08:02', NULL, '2021/07/21'),
(637, 'pkariuki@cma.or.ke', '', '41.139.160.21', 'default', '2021/07/21 14:10:35', NULL, '2021/07/21'),
(638, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 14:12:51', NULL, '2021/07/21'),
(639, 'inventory@panoramaengineering.com', '', '41.139.160.21', 'default', '2021/07/21 14:28:55', NULL, '2021/07/21'),
(640, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 14:30:59', NULL, '2021/07/21'),
(641, 'pkariuki@cma.or.ke', '', '41.139.160.21', 'default', '2021/07/21 16:16:26', NULL, '2021/07/21'),
(642, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/21 16:17:24', NULL, '2021/07/21'),
(643, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/22 08:26:17', NULL, '2021/07/22'),
(644, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/22 12:27:36', NULL, '2021/07/22'),
(645, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/22 14:00:07', NULL, '2021/07/22'),
(646, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/23 09:00:10', NULL, '2021/07/23'),
(647, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/23 10:14:57', NULL, '2021/07/23'),
(648, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/23 15:35:07', NULL, '2021/07/23'),
(649, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/25 19:08:42', NULL, '2021/07/25'),
(650, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/25 19:48:18', NULL, '2021/07/25'),
(651, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/25 23:00:48', NULL, '2021/07/25'),
(652, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 09:49:01', NULL, '2021/07/26'),
(653, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 11:16:04', NULL, '2021/07/26'),
(654, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 13:11:13', NULL, '2021/07/26'),
(655, 'pchege@students.uonbi.ac.ke', '', '41.139.160.21', 'default', '2021/07/26 13:41:36', NULL, '2021/07/26'),
(656, 'prchege@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 13:51:50', NULL, '2021/07/26'),
(657, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 14:08:58', NULL, '2021/07/26'),
(658, 'prchege@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 14:10:42', NULL, '2021/07/26'),
(659, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 14:18:19', NULL, '2021/07/26'),
(660, 'pchege@students.uonbi.ac.ke', '', '41.139.160.21', 'default', '2021/07/26 14:21:25', NULL, '2021/07/26'),
(661, 'pchege@students.uonbi.ac.ke', '', '41.139.160.21', 'default', '2021/07/26 14:36:36', NULL, '2021/07/26'),
(662, 'prchege@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 14:38:12', NULL, '2021/07/26'),
(663, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 16:28:55', NULL, '2021/07/26'),
(664, 'prchege@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 16:46:16', NULL, '2021/07/26'),
(665, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/26 16:47:41', NULL, '2021/07/26'),
(666, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 08:35:48', NULL, '2021/07/27'),
(667, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 09:10:41', NULL, '2021/07/27'),
(668, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 10:10:43', NULL, '2021/07/27'),
(669, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 10:51:48', NULL, '2021/07/27'),
(670, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 10:52:20', NULL, '2021/07/27'),
(671, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 11:02:31', NULL, '2021/07/27'),
(672, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/27 11:17:11', NULL, '2021/07/27'),
(673, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/28 12:44:07', NULL, '2021/07/28'),
(674, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/28 12:56:11', NULL, '2021/07/28'),
(675, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/29 22:04:31', NULL, '2021/07/29'),
(676, 'pchege@students.uonbi.ac.ke', '', '41.139.160.21', 'default', '2021/07/29 22:09:46', NULL, '2021/07/29'),
(677, 'muthuivictoria03@gmail.com', '', '41.139.160.21', 'default', '2021/07/29 22:14:20', NULL, '2021/07/29'),
(678, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/30 09:24:43', NULL, '2021/07/30'),
(679, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/30 23:25:15', NULL, '2021/07/30'),
(680, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/31 01:23:08', NULL, '2021/07/31'),
(681, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/07/31 11:04:04', NULL, '2021/07/31'),
(682, 'prchege@gmail.com', '', '41.139.160.21', 'default', '2021/07/31 12:12:42', NULL, '2021/07/31'),
(683, 'pitarcheizin@gmail.com', '', '102.167.15.48', 'default', '2021/07/31 16:09:04', NULL, '2021/07/31'),
(684, 'pitarcheizin@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 17:43:49', NULL, '2021/07/31'),
(685, 'info@potentialstaffing.com', '', '105.160.32.77', 'default', '2021/07/31 18:39:53', NULL, '2021/07/31'),
(686, 'pitarcheizin@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 18:44:45', NULL, '2021/07/31'),
(687, 'prchege@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 18:49:32', NULL, '2021/07/31'),
(688, 'info@potentialstaffing.com', '', '105.160.32.77', 'default', '2021/07/31 18:52:56', NULL, '2021/07/31'),
(689, 'pitarcheizin@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 19:00:29', NULL, '2021/07/31'),
(690, 'prchege@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 19:04:43', NULL, '2021/07/31'),
(691, 'pitarcheizin@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 19:06:03', NULL, '2021/07/31'),
(692, 'pitarcheizin@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 19:07:32', NULL, '2021/07/31'),
(693, 'muthuivictoria03@gmail.com', '', '105.160.32.77', 'default', '2021/07/31 19:20:58', NULL, '2021/07/31'),
(694, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/02 21:26:30', NULL, '2021/08/02'),
(695, 'pitarcheizin@gmail.com', '', '41.203.222.101', 'default', '2021/08/05 08:52:26', NULL, '2021/08/05'),
(696, 'pitarcheizin@gmail.com', '', '41.203.222.101', 'default', '2021/08/05 14:50:07', NULL, '2021/08/05'),
(697, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/06 17:29:50', NULL, '2021/08/06'),
(698, 'muthuivictoria03@gmail.com', '', '41.139.160.21', 'default', '2021/08/06 17:44:05', NULL, '2021/08/06'),
(699, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/07 20:11:44', NULL, '2021/08/07'),
(700, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/18 21:07:53', NULL, '2021/08/18'),
(701, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/18 21:23:12', NULL, '2021/08/18'),
(702, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/19 10:27:10', NULL, '2021/08/19'),
(703, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/19 22:38:05', NULL, '2021/08/19'),
(704, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/19 22:43:48', NULL, '2021/08/19'),
(705, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/19 22:49:16', NULL, '2021/08/19'),
(706, 'pitarcheizin@gmail.com', '', '41.139.160.21', 'default', '2021/08/20 09:13:11', NULL, '2021/08/20'),
(707, 'info@potentialstaffing.com', '', '197.237.79.3', 'default', '2021/08/30 19:36:00', NULL, '2021/08/30'),
(708, 'caro88njoroge@gmail.com', '', '197.237.79.3', 'default', '2021/08/30 19:37:18', NULL, '2021/08/30'),
(709, 'info@potentialstaffing.com', '', '197.237.79.3', 'default', '2021/08/30 20:34:19', NULL, '2021/08/30'),
(710, 'info@potentialstaffing.com', '', '105.160.44.216', 'default', '2021/08/31 10:05:28', NULL, '2021/08/31'),
(711, 'info@potentialstaffing.com', '', '105.160.44.216', 'default', '2021/08/31 10:07:20', NULL, '2021/08/31'),
(712, 'pitarcheizin@gmail.com', '', '105.63.166.230', 'default', '2021/09/05 00:21:42', NULL, '2021/09/05'),
(713, 'pitarcheizin@gmail.com', '', '154.159.246.58', 'default', '2022/02/12 11:59:21', NULL, '2022/02/12'),
(714, 'pitarcheizin@gmail.com', '', '41.203.222.101', 'default', '2022/02/14 09:17:00', NULL, '2022/02/14');

-- --------------------------------------------------------

--
-- Table structure for table `single_product`
--

CREATE TABLE `single_product` (
  `id` int(6) NOT NULL,
  `end_product_ref` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `qtt` varchar(100) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `order_total` varchar(100) DEFAULT NULL,
  `stock_remaining` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_recorded` varchar(100) DEFAULT NULL,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `single_product`
--

INSERT INTO `single_product` (`id`, `end_product_ref`, `product_name`, `unit_price`, `qtt`, `total`, `order_total`, `stock_remaining`, `time_recorded`, `date_recorded`, `recorded_by`) VALUES
(10, '8', '7', '3200', '1', '3200.00', NULL, '0', '2020-08-14 12:37:49', '14-Aug-2020', 'BENCO MBUGUA'),
(11, '35', '8', '684', '10', '6840.00', NULL, '0', '2020-09-17 07:00:14', '17-Sep-2020', 'BENCO MBUGUA'),
(12, '30', '8', '250', '11', '2750.00', NULL, '0', '2020-09-17 07:01:07', '17-Sep-2020', 'BENCO MBUGUA'),
(13, '38', '9', '3', '150', '450.00', NULL, '0', '2020-09-17 07:15:32', '17-Sep-2020', 'BENCO MBUGUA'),
(14, '37', '9', '300', '1', '300.00', NULL, '0', '2020-09-17 07:16:13', '17-Sep-2020', 'BENCO MBUGUA'),
(15, '39', '9', '80', '50', '4000.00', NULL, '0', '2020-09-17 07:16:46', '17-Sep-2020', 'BENCO MBUGUA'),
(16, '34', '9', '2385', '12', '28620.00', NULL, '0', '2020-09-17 07:17:16', '17-Sep-2020', 'BENCO MBUGUA'),
(17, '33', '9', '770', '2', '1540.00', NULL, '0', '2020-09-17 07:17:49', '17-Sep-2020', 'BENCO MBUGUA'),
(18, '36', '9', '1450', '14', '20300.00', NULL, '0', '2020-09-17 07:19:23', '17-Sep-2020', 'BENCO MBUGUA'),
(19, '32', '9', '4045', '3', '12135.00', NULL, '0', '2020-09-17 07:19:59', '17-Sep-2020', 'BENCO MBUGUA'),
(20, '31', '9', '13305', '3', '39915.00', NULL, '0', '2020-09-17 07:20:51', '17-Sep-2020', 'BENCO MBUGUA'),
(21, '42', '9', '1600', '2', '3200.00', NULL, '0', '2020-09-17 07:24:39', '17-Sep-2020', 'BENCO MBUGUA'),
(22, '43', '9', '600', '2', '1200.00', NULL, '0', '2020-09-17 07:25:13', '17-Sep-2020', 'BENCO MBUGUA'),
(25, '29', '8', '370', '15', '5550.00', NULL, '0', '2020-09-18 12:20:27', '18-Sep-2020', 'BENCO MBUGUA'),
(26, '54', '12', '16000', '3', '48000.00', NULL, '0', '2020-10-27 09:44:55', '27-Oct-2020', 'BENCO MBUGUA');

-- --------------------------------------------------------

--
-- Table structure for table `site_url`
--

CREATE TABLE `site_url` (
  `id` int(100) NOT NULL,
  `main_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_url`
--

INSERT INTO `site_url` (`id`, `main_url`) VALUES
(1, 'https://career.panoramaengineering.com/referralSignup.php?token=');

-- --------------------------------------------------------

--
-- Table structure for table `staff_users`
--

CREATE TABLE `staff_users` (
  `id` int(100) NOT NULL,
  `fName` varchar(100) DEFAULT NULL,
  `auth_service` varchar(50) DEFAULT NULL,
  `lName` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `access_level` varchar(50) NOT NULL DEFAULT 'standard',
  `contact` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `highestQualification` varchar(100) DEFAULT NULL,
  `currentPosition` varchar(100) DEFAULT NULL,
  `companyName` varchar(100) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `emp_photo` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `password` varchar(100) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `refferred_token` varchar(500) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_users`
--

INSERT INTO `staff_users` (`id`, `fName`, `auth_service`, `lName`, `dob`, `gender`, `Email`, `location`, `status`, `access_level`, `contact`, `nationality`, `highestQualification`, `currentPosition`, `companyName`, `experience`, `emp_photo`, `password`, `url`, `token`, `refferred_token`, `date_recorded`, `time_recorded`) VALUES
(7247, 'Njoroge', NULL, 'Caroline', '09-Dec-2020', 'Select type', 'caro88njoroge@gmail.com', 'Nairobi', 'active', 'admin', '0706429377', 'Kenyan', 'Degree', 'Accountant', 'Fairmount', '4', 'user.jpg', '3144db5448cf617860c024b97cdc902b', NULL, NULL, NULL, '13-Dec-2020', '2020-12-13 17:17:24'),
(7253, 'Pitar', NULL, 'CHEGE', '14-Dec-2020', 'Male', 'prchege@gmail.com', 'juja', 'active', 'job-seeker', '4324234', 'Kenya', 'Masters', 'Software Developer', 'CMA KENYA', '4 years', 'user.jpg', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, '17-Dec-2020', '2020-12-17 07:09:21'),
(7273, 'Potential staffing', NULL, '', '24-Feb-2021', '', 'info@potentialstaffing.com', 'Westlands', 'active', 'recruiter', '0706234567', 'Kenya', '', '', '', 'https://potentialstffing.com', 'user.jpg', 'a21766982e0919f1005608f9ae5593ad', NULL, NULL, NULL, '18-Feb-2121', '2021-02-18 06:10:05'),
(7276, 'PETER', NULL, 'KARIUKI', '29-Feb-1992', '', 'pitarcheizin@gmail.com', 'Juja', 'active', 'admin', '0710257750', 'Kenyan', 'Masters', 'Developer', 'CMA KENYA', '2 YEARS', 'user.jpg', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, '01-Mar-2121', '2021-03-01 18:38:28'),
(7287, 'University of Nairobi', NULL, '', '06-Jul-2021', '', 'pchege@students.uonbi.ac.ke', 'Nairobi', 'active', 'recruiter', '0710257750', 'Kenya', '', '', '', 'https://uonbi.ac.ke', 'user.jpg', '827ccb0eea8a706c4c34a16891f84e7b', 'https://career.panoramaengineering.com/referralSignup.php?token=', '', '', '26-Jul-2121', '2021-07-26 19:37:55'),
(7288, 'Fridges', NULL, '', '06-Jul-2021', '', 'muthuivictoria03@gmail.com', 'kenya', 'active', 'recruiter', '025455555', 'ke', '', '', '', 'hhhhh', 'user.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 'https://career.panoramaengineering.com/referralSignup.php?token=c268e4719039497dd240e6a074dbb0a3652c9210a0d89821ef076a50948e0dab180dc9b24047f6c35e849afb4a7331a2d4cb', 'c268e4719039497dd240e6a074dbb0a3652c9210a0d89821ef076a50948e0dab180dc9b24047f6c35e849afb4a7331a2d4cb', '', '29-Jul-2121', '2021-07-30 04:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `staff_users2`
--

CREATE TABLE `staff_users2` (
  `id` int(100) NOT NULL,
  `cName` varchar(100) DEFAULT NULL,
  `fName` varchar(100) DEFAULT NULL,
  `lName` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `access_level` varchar(50) NOT NULL DEFAULT 'standard',
  `contact` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `emp_photo` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `password` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_users2`
--

INSERT INTO `staff_users2` (`id`, `cName`, `fName`, `lName`, `dob`, `gender`, `Email`, `location`, `status`, `access_level`, `contact`, `nationality`, `emp_photo`, `password`, `date_recorded`, `time_recorded`) VALUES
(7251, 'potential', 'potential', 'personell', '15-Dec-2020', 'Male', 'p2@gmail.com', 'juja', 'active', 'employee', '355345', 'kenya', 'user.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '17-Dec-2020', '2020-12-17 06:28:43'),
(7252, 'potential', 'Pits', 'Kars', '18-Dec-2020', 'Male', 'p3@gmail.com', 'NBI', 'active', 'employee', 'RWEREW', 'kENYA', 'user.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '17-Dec-2020', '2020-12-17 06:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `statutory_details`
--

CREATE TABLE `statutory_details` (
  `id` int(6) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `id_number` varchar(100) DEFAULT NULL,
  `pin_number` varchar(100) DEFAULT NULL,
  `nhif_number` varchar(100) DEFAULT NULL,
  `nssf_number` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statutory_details`
--

INSERT INTO `statutory_details` (`id`, `reference_no`, `id_number`, `pin_number`, `nhif_number`, `nssf_number`, `time_recorded`) VALUES
(1, '7253', '29575809', '4324324', '432424234', '4234324', '2020-12-21 08:00:59');

-- --------------------------------------------------------

--
-- Table structure for table `stock_approvers`
--

CREATE TABLE `stock_approvers` (
  `id` int(6) NOT NULL,
  `stock_approver` varchar(100) DEFAULT NULL,
  `stock_id` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_approvers`
--

INSERT INTO `stock_approvers` (`id`, `stock_approver`, `stock_id`, `date_recorded`, `time_recorded`, `recorded_by`) VALUES
(14, 'danson@panoramaengineering.com', '1', '15-Jul-2020', '2020-07-15 10:52:07', 'PETER CHEGE KARIUKI'),
(15, 'danson@panoramaengineering.com', '2', '15-Jul-2020', '2020-07-15 11:00:37', 'PETER CHEGE KARIUKI'),
(16, 'danson@panoramaengineering.com', '3', '15-Jul-2020', '2020-07-15 11:02:38', 'PETER CHEGE KARIUKI'),
(17, 'danson@panoramaengineering.com', '4', '15-Jul-2020', '2020-07-15 11:06:20', 'PETER CHEGE KARIUKI'),
(18, 'danson@panoramaengineering.com', '5', '15-Jul-2020', '2020-07-15 11:07:19', 'PETER CHEGE KARIUKI'),
(19, 'danson@panoramaengineering.com', '6', '15-Jul-2020', '2020-07-15 11:25:47', 'PETER CHEGE KARIUKI'),
(20, 'danson@panoramaengineering.com', '7', '15-Jul-2020', '2020-07-15 11:26:39', 'PETER CHEGE KARIUKI'),
(21, 'moffat1@panoramaengineering.com', '8', '14-Aug-2020', '2020-08-14 12:32:52', 'BENCO MBUGUA'),
(22, 'danson@panoramaengineering.com', '9', '25-Aug-2020', '2020-08-25 09:27:36', 'BENCO MBUGUA'),
(23, 'danson@panoramaengineering.com', '10', '25-Aug-2020', '2020-08-25 09:28:46', 'BENCO MBUGUA'),
(24, 'danson@panoramaengineering.com', '11', '25-Aug-2020', '2020-08-25 09:30:37', 'BENCO MBUGUA'),
(25, 'danson@panoramaengineering.com', '12', '25-Aug-2020', '2020-08-25 09:35:50', 'BENCO MBUGUA'),
(26, 'danson@panoramaengineering.com', '13', '25-Aug-2020', '2020-08-25 09:39:10', 'BENCO MBUGUA'),
(27, 'danson@panoramaengineering.com', '14', '25-Aug-2020', '2020-08-25 09:42:52', 'BENCO MBUGUA'),
(28, 'danson@panoramaengineering.com', '15', '25-Aug-2020', '2020-08-25 09:44:20', 'BENCO MBUGUA'),
(29, 'danson@panoramaengineering.com', '16', '25-Aug-2020', '2020-08-25 09:45:26', 'BENCO MBUGUA'),
(30, 'danson@panoramaengineering.com', '17', '25-Aug-2020', '2020-08-25 09:46:24', 'BENCO MBUGUA'),
(31, 'danson@panoramaengineering.com', '18', '25-Aug-2020', '2020-08-25 09:47:29', 'BENCO MBUGUA'),
(32, 'danson@panoramaengineering.com', '19', '25-Aug-2020', '2020-08-25 09:48:53', 'BENCO MBUGUA'),
(33, 'danson@panoramaengineering.com', '20', '28-Aug-2020', '2020-08-28 08:49:12', 'BENCO MBUGUA'),
(34, 'danson@panoramaengineering.com', '21', '28-Aug-2020', '2020-08-28 08:50:07', 'BENCO MBUGUA'),
(35, 'danson@panoramaengineering.com', '22', '28-Aug-2020', '2020-08-28 08:50:47', 'BENCO MBUGUA'),
(36, 'danson@panoramaengineering.com', '23', '28-Aug-2020', '2020-08-28 08:51:32', 'BENCO MBUGUA'),
(37, 'danson@panoramaengineering.com', '24', '28-Aug-2020', '2020-08-28 08:54:23', 'BENCO MBUGUA'),
(38, 'danson@panoramaengineering.com', '25', '28-Aug-2020', '2020-08-28 08:59:04', 'BENCO MBUGUA'),
(39, 'danson@panoramaengineering.com', '26', '28-Aug-2020', '2020-08-28 11:04:37', 'BENCO MBUGUA'),
(40, 'danson@panoramaengineering.com', '27', '28-Aug-2020', '2020-08-28 11:08:58', 'BENCO MBUGUA'),
(41, 'danson@panoramaengineering.com', '28', '17-Sep-2020', '2020-09-17 06:22:09', 'BENCO MBUGUA'),
(42, 'danson@panoramaengineering.com', '29', '17-Sep-2020', '2020-09-17 06:23:46', 'BENCO MBUGUA'),
(43, 'danson@panoramaengineering.com', '30', '17-Sep-2020', '2020-09-17 06:24:33', 'BENCO MBUGUA'),
(44, 'danson@panoramaengineering.com', '31', '17-Sep-2020', '2020-09-17 06:26:05', 'BENCO MBUGUA'),
(45, 'danson@panoramaengineering.com', '32', '17-Sep-2020', '2020-09-17 06:34:00', 'BENCO MBUGUA'),
(46, 'danson@panoramaengineering.com', '33', '17-Sep-2020', '2020-09-17 06:35:00', 'BENCO MBUGUA'),
(47, 'danson@panoramaengineering.com', '34', '17-Sep-2020', '2020-09-17 06:35:51', 'BENCO MBUGUA'),
(48, 'danson@panoramaengineering.com', '35', '17-Sep-2020', '2020-09-17 06:37:20', 'BENCO MBUGUA'),
(49, 'danson@panoramaengineering.com', '36', '17-Sep-2020', '2020-09-17 07:03:29', 'BENCO MBUGUA'),
(50, 'danson@panoramaengineering.com', '37', '17-Sep-2020', '2020-09-17 07:08:13', 'BENCO MBUGUA'),
(51, 'danson@panoramaengineering.com', '38', '17-Sep-2020', '2020-09-17 07:09:20', 'BENCO MBUGUA'),
(52, 'danson@panoramaengineering.com', '39', '17-Sep-2020', '2020-09-17 07:10:20', 'BENCO MBUGUA'),
(53, 'danson@panoramaengineering.com', '40', '17-Sep-2020', '2020-09-17 07:11:07', 'BENCO MBUGUA'),
(54, 'danson@panoramaengineering.com', '41', '17-Sep-2020', '2020-09-17 07:11:45', 'BENCO MBUGUA'),
(55, 'danson@panoramaengineering.com', '42', '17-Sep-2020', '2020-09-17 07:23:13', 'BENCO MBUGUA'),
(56, 'danson@panoramaengineering.com', '43', '17-Sep-2020', '2020-09-17 07:23:53', 'BENCO MBUGUA'),
(57, 'danson@panoramaengineering.com', '44', '07-Oct-2020', '2020-10-07 07:37:59', 'BENCO MBUGUA'),
(58, 'danson@panoramaengineering.com', '45', '07-Oct-2020', '2020-10-07 07:38:55', 'BENCO MBUGUA'),
(59, 'danson@panoramaengineering.com', '46', '07-Oct-2020', '2020-10-07 07:40:06', 'BENCO MBUGUA'),
(60, 'danson@panoramaengineering.com', '47', '07-Oct-2020', '2020-10-07 07:44:11', 'BENCO MBUGUA'),
(61, 'danson@panoramaengineering.com', '48', '07-Oct-2020', '2020-10-07 07:46:11', 'BENCO MBUGUA'),
(62, 'danson@panoramaengineering.com', '49', '07-Oct-2020', '2020-10-07 07:47:41', 'BENCO MBUGUA'),
(63, 'danson@panoramaengineering.com', '50', '07-Oct-2020', '2020-10-07 07:52:05', 'BENCO MBUGUA'),
(64, 'danson@panoramaengineering.com', '51', '07-Oct-2020', '2020-10-07 07:52:54', 'BENCO MBUGUA'),
(65, 'danson@panoramaengineering.com', '52', '07-Oct-2020', '2020-10-07 07:53:33', 'BENCO MBUGUA'),
(66, 'danson@panoramaengineering.com', '53', '07-Oct-2020', '2020-10-07 07:54:15', 'BENCO MBUGUA'),
(67, 'danson@panoramaengineering.com', '54', '21-Oct-2020', '2020-10-21 11:54:30', 'BENCO MBUGUA'),
(68, 'danson@panoramaengineering.com', '55', '21-Oct-2020', '2020-10-21 11:55:34', 'BENCO MBUGUA'),
(69, 'danson@panoramaengineering.com', '56', '21-Oct-2020', '2020-10-21 11:56:20', 'BENCO MBUGUA'),
(70, 'danson@panoramaengineering.com', '57', '21-Oct-2020', '2020-10-21 11:57:13', 'BENCO MBUGUA'),
(71, 'danson@panoramaengineering.com', '58', '21-Oct-2020', '2020-10-21 11:57:51', 'BENCO MBUGUA'),
(72, 'danson@panoramaengineering.com', '59', '27-Oct-2020', '2020-10-27 09:28:51', 'BENCO MBUGUA'),
(73, 'danson@panoramaengineering.com', '60', '27-Oct-2020', '2020-10-27 09:29:46', 'BENCO MBUGUA'),
(74, 'danson@panoramaengineering.com', '61', '28-Oct-2020', '2020-10-28 08:39:02', 'BENCO MBUGUA'),
(75, 'danson@panoramaengineering.com', '62', '28-Oct-2020', '2020-10-28 08:40:21', 'BENCO MBUGUA'),
(76, 'danson@panoramaengineering.com', '63', '28-Oct-2020', '2020-10-28 08:41:39', 'BENCO MBUGUA'),
(77, 'danson@panoramaengineering.com', '64', '28-Oct-2020', '2020-10-28 08:42:38', 'BENCO MBUGUA'),
(78, 'danson@panoramaengineering.com', '65', '28-Oct-2020', '2020-10-28 08:47:14', 'BENCO MBUGUA'),
(79, 'danson@panoramaengineering.com', '66', '29-Oct-2020', '2020-10-29 06:43:12', 'BENCO MBUGUA'),
(80, 'danson@panoramaengineering.com', '67', '29-Oct-2020', '2020-10-29 06:43:56', 'BENCO MBUGUA'),
(81, 'danson@panoramaengineering.com', '67', '29-Oct-2020', '2020-10-29 06:44:08', 'BENCO MBUGUA'),
(82, 'danson@panoramaengineering.com', '67', '29-Oct-2020', '2020-10-29 06:44:12', 'BENCO MBUGUA'),
(83, 'danson@panoramaengineering.com', '67', '29-Oct-2020', '2020-10-29 06:44:12', 'BENCO MBUGUA'),
(84, 'danson@panoramaengineering.com', '68', '29-Oct-2020', '2020-10-29 06:45:23', 'BENCO MBUGUA'),
(85, 'danson@panoramaengineering.com', '69', '29-Oct-2020', '2020-10-29 06:47:08', 'BENCO MBUGUA'),
(86, 'danson@panoramaengineering.com', '70', '04-Nov-2020', '2020-11-04 09:05:17', 'BENCO MBUGUA'),
(87, 'danson@panoramaengineering.com', '71', '04-Nov-2020', '2020-11-04 09:06:56', 'BENCO MBUGUA'),
(88, 'danson@panoramaengineering.com', '72', '04-Nov-2020', '2020-11-04 09:08:48', 'BENCO MBUGUA'),
(89, 'danson@panoramaengineering.com', '73', '04-Nov-2020', '2020-11-04 09:11:01', 'BENCO MBUGUA'),
(90, 'danson@panoramaengineering.com', '74', '04-Nov-2020', '2020-11-04 09:12:08', 'BENCO MBUGUA'),
(91, 'danson@panoramaengineering.com', '75', '04-Nov-2020', '2020-11-04 09:13:13', 'BENCO MBUGUA'),
(92, 'danson@panoramaengineering.com', '76', '04-Nov-2020', '2020-11-04 09:14:01', 'BENCO MBUGUA'),
(93, 'danson@panoramaengineering.com', '77', '04-Nov-2020', '2020-11-04 09:16:40', 'BENCO MBUGUA'),
(94, 'danson@panoramaengineering.com', '78', '04-Nov-2020', '2020-11-04 09:17:29', 'BENCO MBUGUA'),
(95, 'danson@panoramaengineering.com', '79', '04-Nov-2020', '2020-11-04 09:18:24', 'BENCO MBUGUA'),
(96, 'danson@panoramaengineering.com', '80', '04-Nov-2020', '2020-11-04 09:24:35', 'BENCO MBUGUA'),
(97, 'danson@panoramaengineering.com', '81', '04-Nov-2020', '2020-11-04 09:43:53', 'BENCO MBUGUA');

-- --------------------------------------------------------

--
-- Table structure for table `stock_item`
--

CREATE TABLE `stock_item` (
  `id` int(6) NOT NULL,
  `reference_no` int(11) DEFAULT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_description` varchar(100) DEFAULT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `supplier_id` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending_approval',
  `image` varchar(100) DEFAULT NULL,
  `end_product_id` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_item`
--

INSERT INTO `stock_item` (`id`, `reference_no`, `item_name`, `item_description`, `category_id`, `supplier_id`, `status`, `image`, `end_product_id`, `date_recorded`, `time_recorded`, `recorded_by`) VALUES
(14, 1, 'Copper lug compress', '120 sqmm', 'Engineering', 'ZHEJIANG YOMIN ELECTRIC LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 10:52:07', 'PETER CHEGE KARIUKI'),
(15, 2, 'Copper lug  compress', '70sqmm', 'Engineering', 'ZHEJIANG YOMIN ELECTRIC LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 11:00:37', 'PETER CHEGE KARIUKI'),
(16, 3, 'Copper lug compress', '630sqmm', 'Engineering', 'ZHEJIANG YOMIN ELECTRIC LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 11:02:38', 'PETER CHEGE KARIUKI'),
(17, 4, 'Expulsion Fuse-cut-out', '11Kv', 'Engineering', 'CHUANG XIONG GROUP TECHNOLOGY LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 11:06:20', 'PETER CHEGE KARIUKI'),
(18, 5, 'Expulsion Fuse-cut-out', '33Kv', 'Engineering', 'CHUANG XIONG GROUP TECHNOLOGY LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 11:07:19', 'PETER CHEGE KARIUKI'),
(19, 6, 'Termination Kits', '11Kv', 'Engineering', 'CHUANG XIONG GROUP TECHNOLOGY LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 11:25:47', 'PETER CHEGE KARIUKI'),
(20, 7, 'Termination Kits', '33Kv', 'Engineering', 'CHUANG XIONG GROUP TECHNOLOGY LTD', 'approved', NULL, NULL, '15-Jul-2020', '2020-07-15 11:26:39', 'PETER CHEGE KARIUKI'),
(21, 8, 'GI Sheet ', '8x4x1.00mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '14-Aug-2020', '2020-08-14 12:32:52', 'BENCO MBUGUA'),
(22, 9, 'MS Tee', ' 25x25x3', 'Engineering', 'Nail N Steels Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:27:36', 'BENCO MBUGUA'),
(23, 10, 'flat Bar ', '  3/4\'\'x3mm', 'Engineering', 'Nail N Steels Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:28:46', 'BENCO MBUGUA'),
(24, 11, 'GI Sheet', '8x4x1mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:30:37', 'BENCO MBUGUA'),
(25, 12, 'MIld steel Dia', '3/8\'\'', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:35:50', 'BENCO MBUGUA'),
(26, 13, 'Stainless steel Rod', 'Dia 8mm G304', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:39:10', 'BENCO MBUGUA'),
(27, 14, 'Werods', 'N3 E6013 3.2mm', 'Engineering', 'P&L Above Heights Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:42:52', 'BENCO MBUGUA'),
(28, 15, 'Zed Angle', '25x25x3mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:44:20', 'BENCO MBUGUA'),
(29, 16, 'SHS', '40x40x1.2mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:45:26', 'BENCO MBUGUA'),
(30, 17, 'SHS', '50x50x1.5mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:46:24', 'BENCO MBUGUA'),
(31, 18, 'Hinges', 'Window Hinges', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:47:29', 'BENCO MBUGUA'),
(32, 19, 'Flat Bar', '25x3mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '25-Aug-2020', '2020-08-25 09:48:53', 'BENCO MBUGUA'),
(33, 20, 'SHS', '50x50x1.5mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 08:49:12', 'BENCO MBUGUA'),
(34, 21, 'SHS', '40x40x1.5mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 08:50:07', 'BENCO MBUGUA'),
(35, 22, 'SHS', '20x20x1.2mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 08:50:47', 'BENCO MBUGUA'),
(36, 23, 'MS Plate', '8x4x1.5mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 08:51:32', 'BENCO MBUGUA'),
(37, 24, 'GAS', 'Oxygen', 'Engineering', 'Noble Gases', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 08:54:23', 'BENCO MBUGUA'),
(38, 25, 'Powder Coating Paint', 'PP STR KEN RAL', 'Engineering', 'Kansai Paint', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 08:59:04', 'BENCO MBUGUA'),
(39, 26, 'Flat Bar', '1\'\'x3mm', 'Engineering', 'Maisha Steel  Ltd', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 11:04:37', 'BENCO MBUGUA'),
(40, 27, 'Expanded Mesh', 'Expanded Mesh', 'Engineering', 'Clerb Enterprises Ltd', 'pending_approval', NULL, NULL, '28-Aug-2020', '2020-08-28 11:08:58', 'BENCO MBUGUA'),
(41, 28, 'MS Plate', '8x4x1.2mm', 'Engineering', 'Nail N Steels Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:22:09', 'BENCO MBUGUA'),
(42, 29, 'Flat Bar', '1x3mm', 'Engineering', 'Nail N Steels Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:23:46', 'BENCO MBUGUA'),
(43, 30, 'Flat Bar', '3/4x3mm', 'Engineering', 'Nail N Steels Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:24:33', 'BENCO MBUGUA'),
(44, 31, 'SHS', '150x150x4mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:26:05', 'BENCO MBUGUA'),
(45, 32, 'RHS', '100X50X3MM', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:34:00', 'BENCO MBUGUA'),
(46, 33, 'Round Bar', '16mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:35:00', 'BENCO MBUGUA'),
(47, 34, 'Z Purlin', '5x2x2mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:35:51', 'BENCO MBUGUA'),
(48, 35, 'Tee', '1\'\'', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 06:37:20', 'BENCO MBUGUA'),
(49, 36, 'Angleline', '50x50x3mm', 'Engineering', 'Maisha Steel  Ltd', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:03:29', 'BENCO MBUGUA'),
(50, 37, 'Bolt & Nuts', '8mmx1\'\'', 'Engineering', 'Orbital Fastner', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:08:13', 'BENCO MBUGUA'),
(51, 38, 'Screws', 'Roofing 1\'\'', 'Engineering', 'P carlos hardware', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:09:20', 'BENCO MBUGUA'),
(52, 39, 'Rawl Bolt', '12mm Dia x100', 'Engineering', 'P carlos hardware', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:10:20', 'BENCO MBUGUA'),
(53, 40, 'Down Stoppers', 'Stopper', 'Engineering', 'P carlos hardware', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:11:07', 'BENCO MBUGUA'),
(54, 41, 'Hidges', 'Window Hidges', 'Engineering', 'P carlos hardware', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:11:45', 'BENCO MBUGUA'),
(55, 42, 'Paint', 'NC Primer Grey', 'Engineering', 'GYM  Car Auto Paints', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:23:13', 'BENCO MBUGUA'),
(56, 43, 'Thinner', 'STD Thinner', 'Engineering', 'GYM  Car Auto Paints', 'pending_approval', NULL, NULL, '17-Sep-2020', '2020-09-17 07:23:53', 'BENCO MBUGUA'),
(57, 44, 'Mild steel', '8x4x1mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:37:59', 'BENCO MBUGUA'),
(58, 45, 'Gas', 'Argon High Purity Gas', 'Engineering', 'Noble Gases', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:38:55', 'BENCO MBUGUA'),
(59, 46, 'SHS', '40x40x1.2', 'Engineering', 'Nail N Steels Ltd', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:40:06', 'BENCO MBUGUA'),
(60, 47, 'Powder coating Paint', 'Red textures', 'Engineering', 'Akzonobel', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:44:11', 'BENCO MBUGUA'),
(61, 48, 'SS Rod', 'POM C Rod 25mm Dia', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:46:11', 'BENCO MBUGUA'),
(62, 49, 'Mild Steel', 'Mild steel 5/8mm dia', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:47:41', 'BENCO MBUGUA'),
(63, 50, 'SHS', '2x2x16G', 'Engineering', 'Monross Hardware', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:52:05', 'BENCO MBUGUA'),
(64, 51, 'Agnleline ', '2\'\'X3/16', 'Engineering', 'Monross Hardware', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:52:54', 'BENCO MBUGUA'),
(65, 52, 'Flat bar', '11/2x1/8', 'Engineering', 'Monross Hardware', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:53:33', 'BENCO MBUGUA'),
(66, 53, 'Zed bar', '1\'\'', 'Engineering', 'Monross Hardware', 'pending_approval', NULL, NULL, '07-Oct-2020', '2020-10-07 07:54:15', 'BENCO MBUGUA'),
(67, 54, 'SS plate', '8x4x2mm Grade 304', 'Engineering', 'APEX STEEL LTD', 'pending_approval', NULL, NULL, '21-Oct-2020', '2020-10-21 11:54:30', 'BENCO MBUGUA'),
(68, 55, 'SS Plate', '8x4x4mm Grade 304', 'Engineering', 'APEX STEEL LTD', 'pending_approval', NULL, NULL, '21-Oct-2020', '2020-10-21 11:55:34', 'BENCO MBUGUA'),
(69, 56, 'Mild Steel Plate', '8x4x3.8mm', 'Engineering', 'APEX STEEL LTD', 'pending_approval', NULL, NULL, '21-Oct-2020', '2020-10-21 11:56:20', 'BENCO MBUGUA'),
(70, 57, 'Mild steel Plate', '8x4x5.8mm', 'Engineering', 'APEX STEEL LTD', 'pending_approval', NULL, NULL, '21-Oct-2020', '2020-10-21 11:57:13', 'BENCO MBUGUA'),
(71, 58, 'Mild Steel Plate', '8x4x1.2mm', 'Engineering', 'APEX STEEL LTD', 'pending_approval', NULL, NULL, '21-Oct-2020', '2020-10-21 11:57:51', 'BENCO MBUGUA'),
(72, 59, 'MS Plate', '8x4x1mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '27-Oct-2020', '2020-10-27 09:28:51', 'BENCO MBUGUA'),
(73, 60, 'MS Plate', '8x4x3mm', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '27-Oct-2020', '2020-10-27 09:29:46', 'BENCO MBUGUA'),
(74, 61, 'Shaft', 'EN9 35mmx300mm', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '28-Oct-2020', '2020-10-28 08:39:02', 'BENCO MBUGUA'),
(75, 62, 'SS Sheet', '8x4x3mm G304', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '28-Oct-2020', '2020-10-28 08:40:21', 'BENCO MBUGUA'),
(76, 63, 'SS Round tube', '1/2x1.5x5.8mm', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '28-Oct-2020', '2020-10-28 08:41:39', 'BENCO MBUGUA'),
(77, 64, 'SS Bend', '11/2 G304', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '28-Oct-2020', '2020-10-28 08:42:38', 'BENCO MBUGUA'),
(78, 65, 'Powder Coating Paint', 'Glossy RAL013', 'Powder Coating', 'Nasib Industries Ltd', 'pending_approval', NULL, NULL, '28-Oct-2020', '2020-10-28 08:47:14', 'BENCO MBUGUA'),
(79, 66, 'Filler Wire', '2.4', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:43:12', 'BENCO MBUGUA'),
(80, 67, 'Filler wire', '1.60', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:43:56', 'BENCO MBUGUA'),
(81, 67, 'Filler wire', '1.60', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:44:08', 'BENCO MBUGUA'),
(82, 67, 'Filler wire', '1.60', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:44:12', 'BENCO MBUGUA'),
(83, 67, 'Filler wire', '1.60', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:44:12', 'BENCO MBUGUA'),
(84, 68, 'Slit Cutter', '7\'\'', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:45:23', 'BENCO MBUGUA'),
(85, 69, 'Pure Copper Rod', '25mmx1ft', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '29-Oct-2020', '2020-10-29 06:47:08', 'BENCO MBUGUA'),
(86, 70, 'SS Pipe G304', '50x1.5mm', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:05:17', 'BENCO MBUGUA'),
(87, 71, 'MS Plate', '8x4x1', 'Engineering', 'Central Auto & Hardware Ltd', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:06:56', 'BENCO MBUGUA'),
(88, 72, 'Gas', 'Argon High Purity', 'Engineering', 'Noble Gases', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:08:48', 'BENCO MBUGUA'),
(89, 73, 'SS Bend', 'G304 2\'\'', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:11:01', 'BENCO MBUGUA'),
(90, 74, 'SS Round Tube', 'Dia 1.5x1.5mmx5.8m G304', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:12:08', 'BENCO MBUGUA'),
(91, 75, 'SS Rosette cover', 'Cover 1.5 CC04', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:13:13', 'BENCO MBUGUA'),
(92, 76, 'SS Glass clamp', 'GC01', 'Engineering', 'Kens Metal Industries Ltd', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:14:01', 'BENCO MBUGUA'),
(93, 77, 'Wax Bar', 'Wax Bar', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:16:40', 'BENCO MBUGUA'),
(94, 78, 'Flap Disc', '120 & 80', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:17:29', 'BENCO MBUGUA'),
(95, 79, 'Slit cutter', 'Makita  4\'\'', 'Engineering', 'Fujjo Hardware', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:18:24', 'BENCO MBUGUA'),
(96, 80, 'Flap wheel', '120 &80', 'Engineering', 'Jumbo Hardware', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:24:35', 'BENCO MBUGUA'),
(97, 81, 'Sisal Cloth Disc', 'HD 7\'\'', 'Engineering', 'Jumbo Hardware', 'pending_approval', NULL, NULL, '04-Nov-2020', '2020-11-04 09:43:53', 'BENCO MBUGUA');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `date_created` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training_course_details`
--

CREATE TABLE `training_course_details` (
  `id` int(100) NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'ongoing',
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_course_details`
--

INSERT INTO `training_course_details` (`id`, `reference_no`, `institution`, `course_name`, `start_date`, `end_date`, `duration`, `description`, `status`, `date_recorded`, `time_recorded`) VALUES
(2, '7257', 'UON', 'MSC ITM', '28-Sep-2018', '30-Dec-2020', '824', 'Masters degree', 'completed', '31-Dec-2020', '2020-12-31 17:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `update_views`
--

CREATE TABLE `update_views` (
  `id` int(6) NOT NULL,
  `job_id` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recorded_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_service` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `time_recorded` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `auth_service`, `role`, `time_recorded`) VALUES
(1, 'marojillo@gmail.com', 'Abdalla Maro', 'Google', 'admin', '2021-01-07 14:46:26.988867'),
(2, 'pitarcheizin@gmail.com', 'Peter Chege', 'Google', 'admin', '2021-01-07 18:48:26.620919'),
(4, 'pchege@students.uonbi.ac.ke', 'KARIUKI PETER CHEGE', 'Google', 'user', '2021-01-11 06:59:25.310504'),
(5, 'cmmpkenya@gmail.com', 'cmmp kenya', 'Google', 'user', '2021-01-28 05:21:46.801969');

-- --------------------------------------------------------

--
-- Table structure for table `whole_budget`
--

CREATE TABLE `whole_budget` (
  `id` int(6) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `budget_amount` varchar(100) DEFAULT NULL,
  `date_recorded` varchar(100) DEFAULT NULL,
  `time_recorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whole_budget`
--

INSERT INTO `whole_budget` (`id`, `subject`, `budget_amount`, `date_recorded`, `time_recorded`) VALUES
(2, 'Financial Management', '50000', '08-Jan-2121', '0000-00-00 00:00:00'),
(3, 'Financial Management', '70000', '08-Jan-2121', '0000-00-00 00:00:00'),
(4, 'Financial Management', '90000', '08-Jan-2121', '0000-00-00 00:00:00'),
(5, 'Cyber security', '120000', '08-Jan-2121', '0000-00-00 00:00:00'),
(6, 'CCNA Networking', '70000', '11-Jan-2121', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `id` int(100) NOT NULL,
  `work_type` varchar(50) DEFAULT NULL,
  `time_recorded` timestamp NULL DEFAULT NULL,
  `recorded_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`id`, `work_type`, `time_recorded`, `recorded_by`) VALUES
(1, 'Contract', '2020-06-19 11:52:04', 'PETER KARIUKI'),
(2, 'Permanent', '2020-06-19 11:52:05', 'PETER KARIUKI'),
(3, 'Internship', '2020-06-19 11:52:06', 'PETER KARIUKI'),
(4, 'Graduate', '2020-06-19 11:52:07', 'PETER KARIUKI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_me`
--
ALTER TABLE `about_me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`email`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `all_evidence_document`
--
ALTER TABLE `all_evidence_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answered_response_test`
--
ALTER TABLE `answered_response_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answered_test`
--
ALTER TABLE `answered_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answered_test2`
--
ALTER TABLE `answered_test2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_status_details`
--
ALTER TABLE `application_status_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_test`
--
ALTER TABLE `assigned_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award_type`
--
ALTER TABLE `award_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_email`
--
ALTER TABLE `bulk_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_email_multiple`
--
ALTER TABLE `bulk_email_multiple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_email_multiple_schedule`
--
ALTER TABLE `bulk_email_multiple_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_save_email`
--
ALTER TABLE `bulk_save_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cal_calendars`
--
ALTER TABLE `cal_calendars`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cal_categories`
--
ALTER TABLE `cal_categories`
  ADD PRIMARY KEY (`catid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `cal_events`
--
ALTER TABLE `cal_events`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `cal_groups`
--
ALTER TABLE `cal_groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `cal_logins`
--
ALTER TABLE `cal_logins`
  ADD PRIMARY KEY (`uid`,`series`);

--
-- Indexes for table `cal_occurrences`
--
ALTER TABLE `cal_occurrences`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `cal_permissions`
--
ALTER TABLE `cal_permissions`
  ADD UNIQUE KEY `cid` (`cid`,`uid`);

--
-- Indexes for table `cal_users`
--
ALTER TABLE `cal_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_end_delivery`
--
ALTER TABLE `customer_end_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_sector`
--
ALTER TABLE `customer_sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_approvers`
--
ALTER TABLE `delivery_approvers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `directorate_id` (`directorate_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `departments_module`
--
ALTER TABLE `departments_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependants_details`
--
ALTER TABLE `dependants_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_history`
--
ALTER TABLE `education_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_no`
--
ALTER TABLE `employee_no`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_details_module`
--
ALTER TABLE `employment_details_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_history`
--
ALTER TABLE `employment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `end_product`
--
ALTER TABLE `end_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_level`
--
ALTER TABLE `experience_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_comments`
--
ALTER TABLE `general_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hear_about_us`
--
ALTER TABLE `hear_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_works`
--
ALTER TABLE `how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_budget`
--
ALTER TABLE `individual_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_grade`
--
ALTER TABLE `job_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_level`
--
ALTER TABLE `job_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posting`
--
ALTER TABLE `job_posting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DepartmentCode` (`exp_level`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_test`
--
ALTER TABLE `job_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_titles_grouping`
--
ALTER TABLE `job_titles_grouping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_titles_more_description`
--
ALTER TABLE `job_titles_more_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_requests`
--
ALTER TABLE `page_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requested_by` (`requested_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_timer`
--
ALTER TABLE `quiz_timer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_application`
--
ALTER TABLE `request_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources_header`
--
ALTER TABLE `resources_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_details`
--
ALTER TABLE `resource_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme_rating`
--
ALTER TABLE `scheme_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_competencies`
--
ALTER TABLE `selected_competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_job_skills`
--
ALTER TABLE `selected_job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_kpi`
--
ALTER TABLE `selected_kpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_module`
--
ALTER TABLE `sell_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_in_logs`
--
ALTER TABLE `sign_in_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `single_product`
--
ALTER TABLE `single_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_url`
--
ALTER TABLE `site_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_users`
--
ALTER TABLE `staff_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DepartmentCode` (`location`);

--
-- Indexes for table `staff_users2`
--
ALTER TABLE `staff_users2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DepartmentCode` (`location`);

--
-- Indexes for table `statutory_details`
--
ALTER TABLE `statutory_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_approvers`
--
ALTER TABLE `stock_approvers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_item`
--
ALTER TABLE `stock_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_course_details`
--
ALTER TABLE `training_course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_views`
--
ALTER TABLE `update_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `whole_budget`
--
ALTER TABLE `whole_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_me`
--
ALTER TABLE `about_me`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1587;

--
-- AUTO_INCREMENT for table `all_evidence_document`
--
ALTER TABLE `all_evidence_document`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `answered_response_test`
--
ALTER TABLE `answered_response_test`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `answered_test`
--
ALTER TABLE `answered_test`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `answered_test2`
--
ALTER TABLE `answered_test2`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `application_status_details`
--
ALTER TABLE `application_status_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `assigned_test`
--
ALTER TABLE `assigned_test`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `award_type`
--
ALTER TABLE `award_type`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bulk_email`
--
ALTER TABLE `bulk_email`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `bulk_email_multiple`
--
ALTER TABLE `bulk_email_multiple`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `bulk_email_multiple_schedule`
--
ALTER TABLE `bulk_email_multiple_schedule`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulk_save_email`
--
ALTER TABLE `bulk_save_email`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cal_calendars`
--
ALTER TABLE `cal_calendars`
  MODIFY `cid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cal_categories`
--
ALTER TABLE `cal_categories`
  MODIFY `catid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cal_events`
--
ALTER TABLE `cal_events`
  MODIFY `eid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cal_groups`
--
ALTER TABLE `cal_groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cal_occurrences`
--
ALTER TABLE `cal_occurrences`
  MODIFY `oid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cal_users`
--
ALTER TABLE `cal_users`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer_end_delivery`
--
ALTER TABLE `customer_end_delivery`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_sector`
--
ALTER TABLE `customer_sector`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `delivery_approvers`
--
ALTER TABLE `delivery_approvers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments_module`
--
ALTER TABLE `departments_module`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dependants_details`
--
ALTER TABLE `dependants_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education_history`
--
ALTER TABLE `education_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee_no`
--
ALTER TABLE `employee_no`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employment_details_module`
--
ALTER TABLE `employment_details_module`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employment_history`
--
ALTER TABLE `employment_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `end_product`
--
ALTER TABLE `end_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `experience_level`
--
ALTER TABLE `experience_level`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_comments`
--
ALTER TABLE `general_comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hear_about_us`
--
ALTER TABLE `hear_about_us`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `how_it_works`
--
ALTER TABLE `how_it_works`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `individual_budget`
--
ALTER TABLE `individual_budget`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_grade`
--
ALTER TABLE `job_grade`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_level`
--
ALTER TABLE `job_level`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_posting`
--
ALTER TABLE `job_posting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_test`
--
ALTER TABLE `job_test`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `job_titles_grouping`
--
ALTER TABLE `job_titles_grouping`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job_titles_more_description`
--
ALTER TABLE `job_titles_more_description`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=426;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_requests`
--
ALTER TABLE `page_requests`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_timer`
--
ALTER TABLE `quiz_timer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `request_application`
--
ALTER TABLE `request_application`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `resources_header`
--
ALTER TABLE `resources_header`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resource_details`
--
ALTER TABLE `resource_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scheme_rating`
--
ALTER TABLE `scheme_rating`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selected_competencies`
--
ALTER TABLE `selected_competencies`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `selected_job_skills`
--
ALTER TABLE `selected_job_skills`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `selected_kpi`
--
ALTER TABLE `selected_kpi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sell_module`
--
ALTER TABLE `sell_module`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sign_in_logs`
--
ALTER TABLE `sign_in_logs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- AUTO_INCREMENT for table `single_product`
--
ALTER TABLE `single_product`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `site_url`
--
ALTER TABLE `site_url`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_users`
--
ALTER TABLE `staff_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7289;

--
-- AUTO_INCREMENT for table `staff_users2`
--
ALTER TABLE `staff_users2`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7253;

--
-- AUTO_INCREMENT for table `statutory_details`
--
ALTER TABLE `statutory_details`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_approvers`
--
ALTER TABLE `stock_approvers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `stock_item`
--
ALTER TABLE `stock_item`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_course_details`
--
ALTER TABLE `training_course_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `update_views`
--
ALTER TABLE `update_views`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `whole_budget`
--
ALTER TABLE `whole_budget`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
