-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2011 at 05:21 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `searcher_test`
--
CREATE DATABASE `searcher_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `searcher_test`;

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authassignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('admin', 2, '', NULL, 'N;'),
('buyerLevel1', 2, '', NULL, 'N;'),
('buyerLevel2', 2, '', NULL, 'N;'),
('buyerLevel3', 2, '', NULL, 'N;'),
('deleteAp', 0, 'deleteAp', NULL, 'N;'),
('deleteCompetition', 0, 'deleteCompetition', NULL, 'N;'),
('deleteEssay', 0, 'deleteEssay', NULL, 'N;'),
('deleteExtracurricular', 0, 'deleteExtracurricular', NULL, 'N;'),
('deleteProfile', 0, 'deleteProfile', NULL, 'N;'),
('deleteSat2', 0, 'deleteSat2', NULL, 'N;'),
('deleteSport', 0, 'deleteSport', NULL, 'N;'),
('deleteSubject', 0, 'deleteSubject', NULL, 'N;'),
('deleteUser', 0, 'remove a user from a project', NULL, 'N;'),
('modAp', 0, 'modAp', NULL, 'N;'),
('modBasic', 0, 'modBasic', NULL, 'N;'),
('modCompetitions', 0, 'modCompetitions', NULL, 'N;'),
('modEssays', 0, 'modEssays', NULL, 'N;'),
('modExtracurriculars', 0, 'modExtracurriculars', NULL, 'N;'),
('modSat2', 0, 'modSat2', NULL, 'N;'),
('modScores', 0, 'modScores', NULL, 'N;'),
('modSports', 0, 'modSports', NULL, 'N;'),
('modSubjects', 0, 'modSubjects', NULL, 'N;'),
('readUser', 0, 'read user profile in-formation', NULL, 'N;'),
('seller', 2, '', NULL, 'N;'),
('updateUser', 0, 'update a users in-formation', NULL, 'N;'),
('user', 2, '', NULL, 'N;'),
('viewEssay', 0, 'viewEssay', NULL, 'N;'),
('viewLevel1', 0, 'viewLevel1', NULL, 'N;'),
('viewLevel2', 0, 'viewLevel2', NULL, 'N;'),
('viewLevel3', 0, 'viewLevel3', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('admin', 'buyerLevel1'),
('seller', 'buyerLevel1'),
('admin', 'buyerLevel2'),
('seller', 'buyerLevel2'),
('admin', 'buyerLevel3'),
('seller', 'buyerLevel3'),
('seller', 'deleteAp'),
('seller', 'deleteCompetition'),
('seller', 'deleteEssay'),
('seller', 'deleteExtracurricular'),
('admin', 'deleteProfile'),
('seller', 'deleteSat2'),
('seller', 'deleteSport'),
('seller', 'deleteSubject'),
('admin', 'deleteUser'),
('seller', 'modAp'),
('seller', 'modBasic'),
('seller', 'modCompetitions'),
('seller', 'modEssays'),
('seller', 'modExtracurriculars'),
('seller', 'modSat2'),
('seller', 'modScores'),
('seller', 'modSports'),
('seller', 'modSubjects'),
('user', 'readUser'),
('admin', 'seller'),
('user', 'updateUser'),
('admin', 'user'),
('buyerLevel1', 'user'),
('buyerLevel2', 'user'),
('buyerLevel3', 'user'),
('seller', 'user'),
('seller', 'viewEssay'),
('buyerLevel1', 'viewLevel1'),
('buyerLevel2', 'viewLevel2'),
('buyerLevel3', 'viewLevel3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_academic_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `national_Merit` enum('','N','S','M','F') DEFAULT NULL,
  `class_rank_num` tinyint(4) DEFAULT NULL,
  `class_size` char(1) DEFAULT NULL,
  `GPA_unweight` float unsigned DEFAULT NULL,
  `class_rank_percent` tinyint(1) unsigned DEFAULT NULL,
  `GPA_weight` float unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic_profile`
--

INSERT INTO `tbl_academic_profile` (`user_id`, `national_Merit`, `class_rank_num`, `class_size`, `GPA_unweight`, `class_rank_percent`, `GPA_weight`) VALUES
(29, 'S', NULL, '', NULL, 2, NULL),
(33, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `activity_type_id` char(2) DEFAULT NULL,
  `leadership` varchar(15) DEFAULT NULL,
  `hours_per_week` tinyint(2) unsigned DEFAULT NULL,
  `year_participate_begin` tinyint(2) unsigned DEFAULT NULL,
  `year_participate_end` tinyint(2) unsigned DEFAULT NULL,
  `comments` text,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`activity_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_activity_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_type`
--

CREATE TABLE IF NOT EXISTS `tbl_activity_type` (
  `id` char(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_activity_type`
--

INSERT INTO `tbl_activity_type` (`id`, `name`) VALUES
('AA', 'Academic Honor Society'),
('AB', 'Art Activity or Club'),
('AC', 'Business / Career-oriented Club'),
('AD', 'Computer Club'),
('AE', 'Dance Activity or Group'),
('AF', 'Debating/Public Speaking Club'),
('AG', 'Ethnic Organization'),
('AH', 'Environmental Club'),
('AI', 'Foreign Exchange Program'),
('AJ', 'Foreign Lang. Activity/Club'),
('AK', 'Game Club'),
('AL', 'Government/Political Club'),
('AM', 'Journalism / Newspaper'),
('AN', 'Literary Club'),
('AO', 'Math Club'),
('AP', 'Media Activity / Club'),
('AQ', 'Quiz Bowl'),
('AR', 'Religious Club'),
('AS', 'Science Club'),
('AT', 'School Spirit Activity or Club'),
('AU', 'Student Government / Council'),
('AV', 'Theater Activity'),
('AW', 'Other Club');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ap_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_ap_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ap_id` char(2) NOT NULL,
  `score` int(1) unsigned DEFAULT NULL,
  `date_taken` date DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`ap_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_ap_profile`
--

INSERT INTO `tbl_ap_profile` (`id`, `user_id`, `ap_id`, `score`, `date_taken`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(10, 29, 'EL', 2, NULL, '2011-10-24 16:41:53', 29, '2011-10-24 16:41:53', 29),
(11, 29, 'CS', 1, NULL, '2011-10-24 19:21:00', 29, '2011-10-24 19:21:00', 29),
(14, 33, 'BI', 3, NULL, '2011-11-03 00:18:04', 33, '2011-11-03 00:18:04', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ap_type`
--

CREATE TABLE IF NOT EXISTS `tbl_ap_type` (
  `id` char(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ap_type`
--

INSERT INTO `tbl_ap_type` (`id`, `name`) VALUES
('AB', 'Calculus AB'),
('AH', 'Art History'),
('BC', 'Calculus BC'),
('BI', 'Biology'),
('CG', 'Comp Government and Politics'),
('CH', 'Chemistry'),
('CL', 'Chinese Language and Culture'),
('CS', 'Computer Science A'),
('EH', 'European History'),
('EL', 'English Literature'),
('EN', 'English Language'),
('ES', 'Environmental Science'),
('FL', 'French Language and Culture'),
('GL', 'German'),
('HG', 'Human Geography'),
('JL', 'Japanese Language and Culture'),
('LV', 'Latin: Vergil'),
('MA', 'Macroeconomics'),
('MI', 'Microeconomics'),
('MT', 'Music Theory'),
('PB', 'Physics B'),
('PC', 'Physics C'),
('PS', 'Psychology'),
('SA', 'Studio Art'),
('SL', 'Spanish Literature'),
('SP', 'Spanish Language'),
('ST', 'Statistics'),
('UG', 'U.S. Government and Politics'),
('UH', 'U.S. History'),
('WH', 'World History');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_award_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_award_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `year` tinyint(4) DEFAULT NULL,
  `award_name` varchar(30) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL,
  `region` char(1) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_award_profile`
--

INSERT INTO `tbl_award_profile` (`id`, `user_id`, `year`, `award_name`, `comments`, `region`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(3, 28, 4, 'National Latin Exam', 'exam', '6', '2011-10-27 23:18:09', 28, '2011-10-27 23:18:09', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basic_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_basic_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `first_university_id` smallint(10) unsigned DEFAULT NULL,
  `curr_university_id` smallint(10) unsigned NOT NULL,
  `isTransfer` enum('','Y','N') DEFAULT NULL,
  `gender` enum('','M','F') DEFAULT NULL,
  `highschool_id` smallint(4) unsigned NOT NULL DEFAULT '0',
  `highSchoolType` enum('PUB','PRN','PRR','HOM','CHR','OTH','') DEFAULT NULL,
  `race_id` char(1) DEFAULT NULL,
  `sat_I_score_range` tinyint(1) unsigned DEFAULT NULL,
  `num_scores` tinyint(2) unsigned NOT NULL,
  `num_aps` tinyint(2) unsigned NOT NULL,
  `num_sat2s` tinyint(2) unsigned NOT NULL,
  `num_competitions` tinyint(2) unsigned NOT NULL,
  `num_sports` tinyint(2) unsigned NOT NULL,
  `num_academics` tinyint(3) unsigned NOT NULL,
  `num_extracurriculars` tinyint(3) unsigned NOT NULL,
  `num_essays` tinyint(3) unsigned NOT NULL,
  `avg_profile_rating` tinyint(1) unsigned DEFAULT NULL,
  `l1ForSale` tinyint(1) NOT NULL DEFAULT '0',
  `l2ForSale` tinyint(1) NOT NULL DEFAULT '0',
  `l3ForSale` tinyint(1) NOT NULL DEFAULT '0',
  `musical_instrument_id` char(2) DEFAULT NULL,
  `profile_type` tinyint(2) unsigned NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `RACE` (`race_id`),
  KEY `FUNIV` (`first_university_id`),
  KEY `CUNIV` (`curr_university_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_basic_profile`
--

INSERT INTO `tbl_basic_profile` (`user_id`, `nickname`, `first_university_id`, `curr_university_id`, `isTransfer`, `gender`, `highschool_id`, `highSchoolType`, `race_id`, `sat_I_score_range`, `num_scores`, `num_aps`, `num_sat2s`, `num_competitions`, `num_sports`, `num_academics`, `num_extracurriculars`, `num_essays`, `avg_profile_rating`, `l1ForSale`, `l2ForSale`, `l3ForSale`, `musical_instrument_id`, `profile_type`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(29, 'smitty', 1, 2047, '', 'F', 1, 'PRN', 'B', NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, 3, '2011-10-31 20:24:30', 29, '2011-10-31 21:46:30', 29),
(33, 'test1', 1, 2039, 'N', 'M', 1, 'PUB', 'A', 7, 4, 1, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 5, '2011-11-03 00:16:53', 33, '2011-11-03 00:18:04', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_citizen_type`
--

CREATE TABLE IF NOT EXISTS `tbl_citizen_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=182 ;

--
-- Dumping data for table `tbl_citizen_type`
--

INSERT INTO `tbl_citizen_type` (`id`, `name`) VALUES
(1, 'United States of America '),
(2, 'Afghanistan'),
(3, 'Albania');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_competition_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_competition_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `year` tinyint(1) DEFAULT NULL,
  `name_of_competition` varchar(20) DEFAULT NULL,
  `rank_or_score` varchar(10) DEFAULT NULL,
  `num_competitors` tinyint(6) unsigned DEFAULT NULL,
  `region` tinyint(1) DEFAULT NULL,
  `comments` text,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_competition_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_essay_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_essay_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `mime` varchar(50) DEFAULT NULL,
  `size` bigint(20) unsigned DEFAULT NULL,
  `data` mediumblob,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_essay_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_ethnic_type`
--

CREATE TABLE IF NOT EXISTS `tbl_ethnic_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=123 ;

--
-- Dumping data for table `tbl_ethnic_type`
--

INSERT INTO `tbl_ethnic_type` (`id`, `name`) VALUES
(1, 'African-American / Black'),
(2, 'Albanian'),
(3, 'Algerian'),
(4, 'American'),
(5, 'Angolan'),
(6, 'Arab'),
(7, 'Argentinian'),
(8, 'Armenian'),
(9, 'Austrian'),
(10, 'Belgian'),
(101, 'Sri Lankan'),
(102, 'Sudanese'),
(103, 'Swedish'),
(104, 'Swiss'),
(105, 'Syrian'),
(106, 'Taiwanese'),
(107, 'Tanzanian'),
(108, 'Thai'),
(109, 'Tibetan'),
(110, 'Trinidadian'),
(111, 'Tunisian'),
(112, 'Turkish'),
(113, 'Ugandan'),
(114, 'Ukrainian'),
(115, 'Uruguayan'),
(116, 'Venezuelan'),
(117, 'Vietnamese'),
(118, 'Welsh'),
(119, 'Yugoslavian'),
(120, 'Zambian'),
(121, 'Zimbabwean'),
(122, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_highschool_name`
--

CREATE TABLE IF NOT EXISTS `tbl_highschool_name` (
  `id` mediumint(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` char(2) DEFAULT NULL,
  `zip_code` tinyint(5) NOT NULL,
  `phone_num` tinyint(5) NOT NULL,
  `locale_code` tinyint(3) NOT NULL,
  `student_count` decimal(5,2) NOT NULL,
  `teacher_count` decimal(5,2) NOT NULL,
  `stud_teach_ratio` decimal(5,2) NOT NULL,
  `male_count` tinyint(3) NOT NULL,
  `female_count` tinyint(3) NOT NULL,
  `nativeam_count` tinyint(3) NOT NULL,
  `asian_count` tinyint(3) NOT NULL,
  `black_count` tinyint(3) NOT NULL,
  `hispanic_count` tinyint(3) NOT NULL,
  `white_count` tinyint(3) NOT NULL,
  `type` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_highschool_name`
--

INSERT INTO `tbl_highschool_name` (`id`, `name`, `street`, `city`, `state`, `zip_code`, `phone_num`, `locale_code`, `student_count`, `teacher_count`, `stud_teach_ratio`, `male_count`, `female_count`, `nativeam_count`, `asian_count`, `black_count`, `hispanic_count`, `white_count`, `type`) VALUES
(1, 'bronx science', '', 'New York', 'NY', 127, 0, 0, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, '1'),
(2, 'palo alto high school', 'el camino real', 'Palo Alto', 'CA', 0, 0, 0, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, '1'),
(3, 'Philips Exeter Acadamy', '', 'Andover', 'MA', 0, 0, 0, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_highschool_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_highschool_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `highSchool_id` mediumint(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`),
  KEY `HS` (`highSchool_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_highschool_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_language_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_language_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `language_id` varchar(3) COLLATE utf8_bin NOT NULL,
  `fluency` int(3) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_language_profile`
--

INSERT INTO `tbl_language_profile` (`id`, `user_id`, `language_id`, `fluency`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(2, 28, 'A1', 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 28, 'AP', 3, '2011-10-25 09:50:12', 28, '2011-10-25 09:50:12', 28),
(5, 28, 'AK', 1, '2011-10-25 09:52:41', 28, '2011-10-25 09:52:41', 28),
(6, 28, 'AC', 1, '2011-10-25 10:29:51', 28, '2011-10-25 10:29:51', 28),
(7, 33, 'A6', 1, '2011-11-03 00:17:37', 33, '2011-11-03 00:17:37', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language_type`
--

CREATE TABLE IF NOT EXISTS `tbl_language_type` (
  `id` varchar(3) COLLATE utf8_bin NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_language_type`
--

INSERT INTO `tbl_language_type` (`id`, `name`) VALUES
('A0', ''),
('A1', 'Albanian'),
('A2', 'Amharic'),
('A3', 'Arabic'),
('A4', 'Armenian'),
('A5', 'Assamese'),
('A6', 'Azerbaijani'),
('A7', 'Belarusian'),
('A8', 'Bengali'),
('A9', 'Bhojpuri'),
('AA', 'Bulgarian'),
('AB', 'Burmese'),
('AC', 'Cantonese'),
('AD', 'Cebuano'),
('AE', 'Chhattisgarhi'),
('AF', 'Czech'),
('AG', 'Danish'),
('AH', 'Dutch'),
('AI', 'Finnish'),
('AJ', 'French'),
('AK', 'Gan'),
('AL', 'German'),
('AM', 'Greek'),
('AN', 'Gujarati'),
('AO', 'Haitian'),
('AP', 'Hausa'),
('AQ', 'Herbrew'),
('AR', 'Hindi-Urdu'),
('AS', 'Hunanese'),
('AT', 'Hungarian'),
('AU', 'Igbo'),
('AV', 'Italian'),
('AW', 'Japanese'),
('AX', 'Javanese'),
('AY', 'Kannada'),
('AZ', 'Kazakh'),
('BA', 'Khmer'),
('BB', 'Korean'),
('BC', 'Kurdish'),
('BD', 'Lao-Isan'),
('BE', 'Latin'),
('BF', 'Maithili'),
('BG', 'Malagasy'),
('BH', 'Malay'),
('BI', 'Mandarin'),
('BJ', 'Marathi'),
('BK', 'Marwari'),
('BL', 'Northern Berber'),
('BM', 'Oriya'),
('BN', 'Oromo'),
('BO', 'Pashto'),
('BP', 'Persian'),
('BQ', 'Polish'),
('BR', 'Portugese'),
('BS', 'Punjabi'),
('BT', 'Rajasthani'),
('BU', 'Rangpuri'),
('BV', 'Romanian'),
('BW', 'Russian'),
('BX', 'Serbo-Croatian'),
('BY', 'Shanghainese'),
('BZ', 'Sindhi'),
('CA', 'Sinhalese'),
('CB', 'Spanish'),
('CD', 'Sudanese'),
('CE', 'Swedish'),
('CF', 'Tagalog'),
('CG', 'Taiwanese'),
('CH', 'Tamil'),
('CI', 'Thai'),
('CJ', 'Turkish'),
('CK', 'Ukranian'),
('CL', 'Uzbek'),
('CM', 'Vietnamese'),
('CN', 'Yoruba'),
('CO', 'Zhuang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_major_type`
--

CREATE TABLE IF NOT EXISTS `tbl_major_type` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=180 ;

--
-- Dumping data for table `tbl_major_type`
--

INSERT INTO `tbl_major_type` (`id`, `name`) VALUES
(1, 'Actuarial Sciences '),
(2, 'Adult & Continuing Education'),
(3, 'Aerospace Aeronautical'),
(4, 'African Studies'),
(5, 'Afro-American (Black) Studies'),
(6, 'Agricultural Business & Management'),
(7, 'Agricultural Engineering'),
(8, 'Agricultural Mechanization'),
(9, 'Agricultural Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_map_profile_student`
--

CREATE TABLE IF NOT EXISTS `tbl_map_profile_student` (
  `user_id` int(10) unsigned NOT NULL,
  `purchased_profile_id` int(10) unsigned NOT NULL,
  `l1_purchased` tinyint(1) NOT NULL DEFAULT '0',
  `l2_purchased` tinyint(1) NOT NULL DEFAULT '0',
  `l3_purchased` tinyint(1) NOT NULL DEFAULT '0',
  `isOwner` tinyint(1) NOT NULL DEFAULT '0',
  `l1_purchase_time` datetime DEFAULT NULL,
  `l2_purchase_time` datetime DEFAULT NULL,
  `l3_purchase_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`,`purchased_profile_id`),
  KEY `tbl_map_profile_student_ibfk_2` (`purchased_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_map_profile_student`
--

INSERT INTO `tbl_map_profile_student` (`user_id`, `purchased_profile_id`, `l1_purchased`, `l2_purchased`, `l3_purchased`, `isOwner`, `l1_purchase_time`, `l2_purchase_time`, `l3_purchase_time`) VALUES
(29, 29, 0, 0, 0, 1, NULL, NULL, NULL),
(33, 33, 0, 0, 0, 1, NULL, NULL, NULL),
(34, 29, 1, 1, 1, 0, '2011-11-03 00:20:15', '2011-11-03 00:20:15', '2011-11-03 00:20:15'),
(34, 34, 0, 0, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_music_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_music_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `music` tinyint(3) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `year_begin` tinyint(2) NOT NULL,
  `year_end` tinyint(2) NOT NULL,
  `school_orchband` tinyint(2) DEFAULT NULL,
  `school_leader` tinyint(2) DEFAULT NULL,
  `ext_orchband` tinyint(2) DEFAULT NULL,
  `ext_leader` tinyint(2) DEFAULT NULL,
  `comments` text COLLATE utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(10) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_music_profile`
--

INSERT INTO `tbl_music_profile` (`id`, `user_id`, `music`, `level`, `year_begin`, `year_end`, `school_orchband`, `school_leader`, `ext_orchband`, `ext_leader`, `comments`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(2, 29, 7, 3, 9, 13, NULL, NULL, NULL, NULL, '', '2011-10-24 16:42:23', 29, '2011-10-24 16:42:23', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_other_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `year_begin` tinyint(2) unsigned DEFAULT NULL,
  `year_end` tinyint(2) unsigned DEFAULT NULL,
  `comments` text COLLATE utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_other_profile`
--

INSERT INTO `tbl_other_profile` (`id`, `user_id`, `name`, `year_begin`, `year_end`, `comments`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(2, 28, 'as', 4, 6, 0x6173646664617366, '2011-10-25 10:20:45', 28, '2011-10-25 10:20:45', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other_school_admit_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_other_school_admit_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `otherschool_id` mediumint(6) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_other_school_admit_profile`
--

INSERT INTO `tbl_other_school_admit_profile` (`id`, `user_id`, `otherschool_id`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(6, 28, 1805, '2011-10-25 11:08:58', 28, '2011-10-25 11:08:58', 28),
(8, 28, 779, '2011-10-25 11:11:44', 28, '2011-10-25 11:11:44', 28),
(9, 28, 1536, '2011-10-25 11:20:12', 28, '2011-10-25 11:20:12', 28),
(10, 28, 2504, '2011-10-25 11:23:25', 28, '2011-10-25 11:23:25', 28),
(11, 28, 1540, '2011-10-25 11:24:19', 28, '2011-10-25 11:24:19', 28),
(12, 29, 2096, '2011-10-31 16:02:06', 29, '2011-10-31 16:02:06', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_personal_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `citizenship` char(3) DEFAULT NULL,
  `ethnic_origin` tinyint(3) DEFAULT NULL,
  `legacy_direct` enum('','N','M','F','B') DEFAULT NULL,
  `legacy_indirect` enum('','N','S','O','B') DEFAULT NULL,
  `hometown_zipcode` char(5) DEFAULT NULL,
  `state` tinyint(2) unsigned DEFAULT NULL,
  `income_bracket` enum('','A','B','C','D','E','F','G','H') DEFAULT NULL,
  `parental_status` enum('','M','D','N') DEFAULT NULL,
  `other_schools_admitted` varchar(50) DEFAULT NULL,
  `religion_id` char(2) DEFAULT NULL,
  `foreign_languages_spoken` varchar(30) DEFAULT NULL,
  `current_major` varchar(50) DEFAULT NULL,
  `hs_grad_year` mediumint(4) unsigned DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `RELIGION` (`religion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_personal_profile`
--

INSERT INTO `tbl_personal_profile` (`user_id`, `date_of_birth`, `citizenship`, `ethnic_origin`, `legacy_direct`, `legacy_indirect`, `hometown_zipcode`, `state`, `income_bracket`, `parental_status`, `other_schools_admitted`, `religion_id`, `foreign_languages_spoken`, `current_major`, `hs_grad_year`, `skills`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(29, '0000-00-00', '1', 7, 'N', 'N', '07645', 13, 'B', 'M', NULL, NULL, NULL, '6', 2009, NULL, '2011-10-24 16:41:24', 29, '2011-10-31 20:24:59', 29),
(33, '0000-00-00', '1', 10, 'N', 'N', '60450', 29, NULL, NULL, NULL, NULL, NULL, '8', 2010, NULL, '2011-11-03 00:16:53', 33, '2011-11-03 00:17:29', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_race_type`
--

CREATE TABLE IF NOT EXISTS `tbl_race_type` (
  `id` char(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_race_type`
--

INSERT INTO `tbl_race_type` (`id`, `name`) VALUES
('A', 'White'),
('B', 'Asian / Asian-American / Pacific-Islander'),
('C', 'Black / African-American'),
('D', 'Native American'),
('E', 'Mexican / Mexican-American'),
('F', 'Puerto Rican'),
('G', 'Other Hispanic / Latino'),
('H', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_religion_type`
--

CREATE TABLE IF NOT EXISTS `tbl_religion_type` (
  `id` char(2) NOT NULL,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_religion_type`
--

INSERT INTO `tbl_religion_type` (`id`, `name`) VALUES
('A0', ''),
('A1', 'I prefer not to answer'),
('A8', 'Buddhism'),
('A9', 'Christian Disciples'),
('AK', 'Hinduism'),
('AL', 'Islam/Muslim/ Moslem'),
('AU', 'Roman Catholic'),
('AV', 'Seventh-Day Adventist'),
('AW', 'Sikhism'),
('AX', 'Society of Friends (Quaker)'),
('AY', 'Unitarian Universalist Association'),
('AZ', 'Wesleyan Church'),
('BA', 'United Methodist'),
('BB', 'Worldwide Church of God'),
('BC', 'Other'),
('BD', 'Atheist/Agnostic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_research_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_research_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `subject` text COLLATE utf8_bin,
  `field` tinyint(4) DEFAULT NULL,
  `year_begin` tinyint(4) DEFAULT NULL,
  `year_end` tinyint(4) DEFAULT NULL,
  `hours` tinyint(4) DEFAULT NULL,
  `comments` text COLLATE utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_research_profile`
--

INSERT INTO `tbl_research_profile` (`id`, `user_id`, `subject`, `field`, `year_begin`, `year_end`, `hours`, `comments`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(1, 28, 0x416c7a6865696d657227732044697365617365, 28, 4, 6, 2, '', '2011-10-23 11:24:32', 28, '2011-10-23 11:24:32', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sat2_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_sat2_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `sat2_id` char(2) NOT NULL,
  `score` smallint(3) unsigned NOT NULL,
  `date_taken` date DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`sat2_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_sat2_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_sat2_type`
--

CREATE TABLE IF NOT EXISTS `tbl_sat2_type` (
  `id` char(2) NOT NULL,
  `subject` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sat2_type`
--

INSERT INTO `tbl_sat2_type` (`id`, `subject`) VALUES
('CH', 'Chemistry'),
('CL', 'Chinese with Listening'),
('EB', 'Ecological Biology'),
('FL', 'French with Listening'),
('FR', 'French'),
('GL', 'German with Listening'),
('GM', 'German'),
('IT', 'Italian'),
('JL', 'Japanese with Listening'),
('KL', 'Korean with Listening'),
('LR', 'Literature'),
('LT', 'Latin'),
('M1', 'Mathematics Level 1'),
('M2', 'Mathematics Level 2'),
('MB', 'Molecular Biology'),
('MH', 'Modern Hebrew'),
('PH', 'Physics'),
('SL', 'Spanish with Listening'),
('SP', 'Spanish'),
('UH', 'U.S. History'),
('WH', 'World History');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_score_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_score_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `SAT_Math` smallint(3) unsigned DEFAULT NULL,
  `SAT_Critical_Read` smallint(3) unsigned DEFAULT NULL,
  `SAT_Writing` smallint(3) unsigned DEFAULT NULL,
  `SAT_Essay` smallint(3) unsigned DEFAULT NULL,
  `PSAT_Math` smallint(3) unsigned DEFAULT NULL,
  `PSAT_Verbal` smallint(3) unsigned DEFAULT NULL,
  `PSAT_Writing` smallint(3) unsigned DEFAULT NULL,
  `ACT_English` smallint(3) unsigned DEFAULT NULL,
  `ACT_Math` smallint(3) unsigned DEFAULT NULL,
  `ACT_Reading` smallint(3) unsigned DEFAULT NULL,
  `ACT_Science` smallint(3) unsigned DEFAULT NULL,
  `ACT_Writing` smallint(3) unsigned DEFAULT NULL,
  `ACT_Composite` smallint(3) unsigned DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_score_profile`
--

INSERT INTO `tbl_score_profile` (`user_id`, `SAT_Math`, `SAT_Critical_Read`, `SAT_Writing`, `SAT_Essay`, `PSAT_Math`, `PSAT_Verbal`, `PSAT_Writing`, `ACT_English`, `ACT_Math`, `ACT_Reading`, `ACT_Science`, `ACT_Writing`, `ACT_Composite`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(29, 290, 280, 300, 2, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, '2011-10-24 16:42:04', 29, '2011-10-24 19:20:56', 29),
(33, 780, 500, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2011-11-03 00:17:54', 33, '2011-11-03 00:17:54', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sport_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_sport_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `sport_id` char(3) NOT NULL,
  `year_begin` tinyint(1) unsigned NOT NULL,
  `year_end` tinyint(1) unsigned NOT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `leadership` tinyint(2) DEFAULT NULL,
  `indiv_rank` tinyint(2) DEFAULT NULL,
  `team_rank` tinyint(2) DEFAULT NULL,
  `other_recog` tinyint(2) unsigned DEFAULT NULL,
  `comments` text,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`sport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_sport_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_sport_type`
--

CREATE TABLE IF NOT EXISTS `tbl_sport_type` (
  `id` char(3) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sport_type`
--

INSERT INTO `tbl_sport_type` (`id`, `name`) VALUES
('ARC', 'Archery'),
('BAD', 'Badminton'),
('BAS', 'Baseball'),
('BOW', 'Bowling'),
('BOX', 'Boxing'),
('BSK', 'Basketball'),
('CHE', 'Cheerleading'),
('DIV', 'Diving'),
('FBL', 'Football'),
('FEN', 'Fencing'),
('FHC', 'Field Hockey'),
('GLF', 'Golf'),
('GYM', 'Gymnastics'),
('HOR', 'Horseback Riding'),
('IHC', 'Ice Hockey'),
('LAX', 'Lacrosse'),
('MAR', 'Martial Arts'),
('OTH', 'Other'),
('RAC', 'Racquetball'),
('RIF', 'Riflery'),
('ROD', 'Rodeo'),
('ROW', 'Rowing (crew)'),
('RUG', 'Rugby'),
('SAI', 'Sailing'),
('SBL', 'Softball'),
('SKI', 'Skiing'),
('SOC', 'Soccer'),
('SQH', 'Squash'),
('SWM', 'Swimming'),
('TEN', 'Tennis'),
('TNF', 'Track and Field'),
('TTN', 'Table Tennis'),
('VBL', 'Volleyball'),
('WPL', 'Water Polo'),
('WRE', 'Wrestling'),
('XCO', 'Cross-Country');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE IF NOT EXISTS `tbl_states` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `abbr` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`id`, `name`, `abbr`) VALUES
(1, 'Alabama', 0x414c),
(2, 'Alaska', 0x414b),
(3, 'Arizona', 0x415a),
(4, 'Arkansas', 0x4152),
(5, 'California', 0x4341),
(6, 'Colorado', 0x434f),
(7, 'Connecticut', 0x4354),
(8, 'Delaware', 0x4445),
(9, 'District of Columbia', 0x4443),
(10, 'Florida', 0x464c),
(11, 'Georgia', 0x4741),
(12, 'Guam', 0x4755),
(13, 'Hawaii', 0x4849),
(14, 'Idaho', 0x4944),
(15, 'Illinois', 0x494c),
(16, 'Indiana', 0x494e),
(17, 'Iowa', 0x4941),
(18, 'Kansas', 0x4b53),
(19, 'Kentucky', 0x4b59),
(20, 'Louisiana', 0x4c41),
(21, 'Maine', 0x4d45),
(22, 'Maryland', 0x4d44),
(23, 'Massachusetts', 0x4d41),
(24, 'Michigan', 0x4d49),
(25, 'Minnesota', 0x4d4e),
(26, 'Mississippi', 0x4d53),
(27, 'Missouri', 0x4d4f),
(28, 'Montana', 0x4d54),
(29, 'Nebraska', 0x4e45),
(30, 'Nevada', 0x4e56),
(31, 'New Hampshire', 0x4e48),
(32, 'New Jersey', 0x4e4a),
(33, 'New Mexico', 0x4e4d),
(34, 'New York', 0x4e59),
(35, 'North Carolina', 0x4e43),
(36, 'North Dakota', 0x4e44),
(37, 'Ohio', 0x4f48),
(38, 'Oklahoma', 0x4f4b),
(39, 'Oregon', 0x4f52),
(40, 'Pennsylvania', 0x5041),
(41, 'Puerto Rico', 0x5052),
(42, 'Rhode Island', 0x5249),
(43, 'South Carolina', 0x5343),
(44, 'South Dakota', 0x5344),
(45, 'Tennessee', 0x544e),
(46, 'Texas', 0x5458),
(47, 'Utah', 0x5554),
(48, 'Vermont', 0x5654),
(49, 'Virgin Islands', 0x5649),
(50, 'Virginia', 0x5641),
(51, 'Washington', 0x5741),
(52, 'West Virginia', 0x5756),
(53, 'Wisconsin', 0x5749),
(54, 'Wyoming', 0x5759);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_subject_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `year_taken` tinyint(1) unsigned DEFAULT NULL COMMENT '1=Freshman,2=Soph,3=Junior,4=Senior,5=5th year after senior',
  `subject_id` tinyint(2) unsigned DEFAULT NULL,
  `honors_or_AP` tinyint(1) DEFAULT NULL,
  `num_months` tinyint(2) unsigned DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_subject_profile`
--

INSERT INTO `tbl_subject_profile` (`id`, `user_id`, `year_taken`, `subject_id`, `honors_or_AP`, `num_months`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(9, 29, 4, 6, 1, 5, '2011-10-28 21:30:26', 29, '2011-10-28 21:30:26', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_type`
--

CREATE TABLE IF NOT EXISTS `tbl_subject_type` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tbl_subject_type`
--

INSERT INTO `tbl_subject_type` (`id`, `name`) VALUES
(1, 'Algebra I'),
(2, 'Algebra II'),
(3, 'Anatomy'),
(4, 'Art History'),
(5, 'Astronomy'),
(6, 'Automotive'),
(7, 'Biology'),
(8, 'Business'),
(9, 'Calculus 2'),
(10, 'Calculus I'),
(11, 'Chemistry'),
(12, 'Civics'),
(13, 'Computer Science'),
(14, 'Cooking'),
(15, 'Drawing'),
(16, 'Earth Science'),
(17, 'Economics'),
(18, 'English'),
(19, 'Environmental Science'),
(20, 'Ethnic Studies'),
(21, 'Film Art'),
(22, 'Food Science'),
(23, 'French'),
(24, 'General Art'),
(25, 'General Science'),
(26, 'Geography'),
(27, 'Geometry'),
(28, 'German'),
(29, 'Grammar'),
(30, 'Health'),
(31, 'Home Economics'),
(32, 'Italian'),
(33, 'Japanese'),
(34, 'Latin'),
(35, 'Life Science'),
(36, 'Literature'),
(37, 'Mandarin'),
(38, 'Music'),
(39, 'Photography'),
(40, 'Physical Science'),
(41, 'Physics'),
(42, 'Pre-Algebra'),
(43, 'Psychology'),
(44, 'Russian'),
(45, 'Social Studies'),
(46, 'Sociology'),
(47, 'Space Science'),
(48, 'Spanish'),
(49, 'Trigonometry'),
(50, 'US Government'),
(51, 'US History'),
(52, 'Vocabulary'),
(53, 'World History'),
(54, 'Writing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_summer_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_summer_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_bin,
  `summer_id` tinyint(3) unsigned DEFAULT NULL,
  `summer_date` tinyint(3) DEFAULT NULL,
  `comments` text COLLATE utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(10) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_summer_profile`
--

INSERT INTO `tbl_summer_profile` (`id`, `user_id`, `name`, `summer_id`, `summer_date`, `comments`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(3, 28, '', 7, 5, '', '2011-10-25 01:08:57', 28, '2011-10-25 01:08:57', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_university_name`
--

CREATE TABLE IF NOT EXISTS `tbl_university_name` (
  `id` smallint(10) unsigned NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_university_name`
--

INSERT INTO `tbl_university_name` (`id`, `name`, `state`) VALUES
(1, 'Abilene Christian University', 'AL'),
(2, 'Abraham Baldwin Agricultural C', 'AL'),
(3, 'Academy College', 'AL'),
(4, 'Academy of Art University', 'AL'),
(5, 'Acupuncture and Massage Colleg', 'AL'),
(6, 'Adams State College', 'AL'),
(7, 'Adelphi University', 'AL'),
(8, 'Adrian College', 'AL'),
(9, 'Agnes Scott College', 'AL'),
(10, 'AI Miami International Univers', 'AL'),
(11, 'AIB College of Business', 'AL'),
(12, 'Alabama A & M University', 'AL'),
(13, 'Alabama State University', 'AL'),
(14, 'Alaska Pacific University', 'AL'),
(15, 'Albany College of Pharmacy and', 'AL'),
(16, 'Albany State University', 'AL'),
(17, 'Albertus Magnus College', 'AL'),
(18, 'Albion College', 'AK'),
(19, 'Albright College', 'AK'),
(20, 'Alcorn State University', 'AK'),
(21, 'Alderson Broaddus College', 'AZ'),
(22, 'Alfred University', 'AZ'),
(23, 'Alice Lloyd College', 'AZ'),
(24, 'Allegheny College', 'AZ'),
(25, 'Allegheny Wesleyan College', 'AZ'),
(26, 'Allen College', 'AZ'),
(27, 'Allen University', 'AZ'),
(28, 'Alliant International Universi', 'AZ'),
(29, 'Alma College', 'AZ'),
(30, 'Alvernia University', 'AZ'),
(2031, 'Universidad Adventista de las ', 'CA'),
(2032, 'Universidad Central Del Caribe', 'CA'),
(2033, 'Universidad Del Este', 'CA'),
(2034, 'Universidad Del Turabo', 'CA'),
(2035, 'Universidad Metropolitana', 'CA'),
(2036, 'Universidad Politecnica de Pue', 'CA'),
(2037, 'Universidad Politecnica de Pue', 'CA'),
(2038, 'Universidad Teologica del Cari', 'CA'),
(2039, 'University at Buffalo', 'CA'),
(2040, 'University of Advancing Techno', 'CA'),
(2041, 'University of Akron Main Campu', 'CA'),
(2042, 'University of Alabama at Birmi', 'CA'),
(2043, 'University of Alabama in Hunts', 'CA'),
(2044, 'University of Alaska Anchorage', 'CA'),
(2045, 'University of Alaska Fairbanks', 'CA'),
(2046, 'University of Alaska Southeast', 'CA'),
(2047, 'University of Antelope Valley', 'CA'),
(2048, 'University of Arizona', 'CA'),
(2049, 'University of Arkansas', 'CA'),
(2050, 'University of Arkansas at Litt', 'CA'),
(2051, 'University of Arkansas at Mont', 'CA'),
(2052, 'University of Arkansas at Pine', 'CA'),
(2053, 'University of Arkansas for Med', 'CO'),
(2054, 'University of Arkansas-Fort Sm', 'CO'),
(2055, 'University of Baltimore', 'CO'),
(2056, 'University of Bridgeport', 'CO'),
(2057, 'University of California-Berke', 'CT'),
(2058, 'University of California-Davis', 'CT'),
(2059, 'University of California-Irvin', 'CT'),
(2060, 'University of California-Los A', 'CT'),
(2061, 'University of California-Merce', 'DE'),
(2062, 'University of California-River', 'DE'),
(2063, 'University of California-San D', 'DE'),
(2064, 'University of California-Santa', 'DC'),
(2065, 'University of California-Santa', 'DC'),
(2066, 'University of Central Arkansas', 'FL'),
(2067, 'University of Central Florida', 'FL'),
(2068, 'University of Central Missouri', 'FL'),
(2069, 'University of Central Oklahoma', 'FL'),
(2070, 'University of Charleston', 'FL'),
(2071, 'University of Chicago', 'FL'),
(2072, 'University of Cincinnati-Clerm', 'FL'),
(2073, 'University of Cincinnati-Main ', 'FL'),
(2074, 'University of Cincinnati-Raymo', 'FL'),
(2075, 'University of Colorado at Boul', 'FL'),
(2076, 'University of Colorado at Colo', 'FL'),
(2077, 'University of Colorado Denver', 'FL'),
(2078, 'University of Connecticut', 'FL'),
(2079, 'University of Connecticut-Aver', 'FL'),
(2080, 'University of Connecticut-Stam', 'GA'),
(2081, 'University of Connecticut-Tri-', 'GA'),
(2082, 'University of Dallas', 'GA'),
(2083, 'University of Dayton', 'GA'),
(2084, 'University of Delaware', 'GA'),
(2085, 'University of Denver', 'GA'),
(2086, 'University of Detroit Mercy', 'GA'),
(2087, 'University of Dubuque', 'GA'),
(2088, 'University of Evansville', 'GA'),
(2089, 'University of Florida', 'GA'),
(2090, 'University of Georgia', 'GA'),
(2091, 'University of Great Falls', 'GA'),
(2092, 'University of Guam', 'GA'),
(2093, 'University of Hartford', 'GA'),
(2094, 'University of Hawaii at Hilo', 'GA'),
(2095, 'University of Hawaii at Manoa', 'HI'),
(2096, 'University of Hawaii Maui Coll', 'HI'),
(2097, 'University of Hawaii-West Oahu', 'ID'),
(2098, 'University of Houston', 'ID'),
(2099, 'University of Houston-Clear La', 'IL'),
(2100, 'University of Houston-Downtown', 'IL'),
(2201, 'University of Phoenix-Des Moin', 'MI'),
(2202, 'University of Phoenix-Eastern ', 'MI'),
(2203, 'University of Phoenix-Fairfiel', 'MI'),
(2204, 'University of Phoenix-Harrisbu', 'MI'),
(2205, 'University of Phoenix-Hawaii C', 'MI'),
(2206, 'University of Phoenix-Houston ', 'MI'),
(2207, 'University of Phoenix-Idaho Ca', 'MI'),
(2208, 'University of Phoenix-Indianap', 'MN'),
(2209, 'University of Phoenix-Jersey C', 'MN'),
(2210, 'University of Phoenix-Kansas C', 'MN'),
(2211, 'University of Phoenix-Las Vega', 'MN'),
(2212, 'University of Phoenix-Little R', 'MN'),
(2213, 'University of Phoenix-Louisian', 'MN'),
(2214, 'University of Phoenix-Louisvil', 'MN'),
(2215, 'University of Phoenix-Madison ', 'MN'),
(2216, 'University of Phoenix-Maryland', 'MN'),
(2217, 'University of Phoenix-Memphis ', 'MN'),
(2218, 'University of Phoenix-Metro De', 'MN'),
(2219, 'University of Phoenix-Milwauke', 'MN'),
(2220, 'University of Phoenix-Minneapo', 'MN'),
(2221, 'University of Phoenix-Nashvill', 'MN'),
(2222, 'University of Phoenix-New Mexi', 'MS'),
(2223, 'University of Phoenix-North Fl', 'MS'),
(2224, 'University of Phoenix-Northern', 'MS'),
(2225, 'University of Phoenix-Northern', 'MO'),
(2226, 'University of Phoenix-Northwes', 'MO'),
(2227, 'University of Phoenix-Northwes', 'MO'),
(2228, 'University of Phoenix-Oklahoma', 'MO'),
(2229, 'University of Phoenix-Omaha Ca', 'MO'),
(2230, 'University of Phoenix-Online C', 'MO'),
(2231, 'University of Phoenix-Oregon C', 'MO'),
(2232, 'University of Phoenix-Philadel', 'MO'),
(2233, 'University of Phoenix-Phoenix-', 'MO'),
(2234, 'University of Phoenix-Pittsbur', 'MO'),
(2235, 'University of Phoenix-Puerto R', 'MO'),
(2236, 'University of Phoenix-Raleigh ', 'MO'),
(2237, 'University of Phoenix-Richmond', 'MO'),
(2238, 'University of Phoenix-Sacramen', 'MO'),
(2239, 'University of Phoenix-San Anto', 'MT'),
(2240, 'University of Phoenix-San Dieg', 'MT'),
(2241, 'University of Phoenix-Savannah', 'MT'),
(2242, 'University of Phoenix-South Fl', 'MT'),
(2243, 'University of Phoenix-Southern', 'NE'),
(2244, 'University of Phoenix-Southern', 'NE'),
(2245, 'University of Phoenix-Southern', 'NE'),
(2246, 'University of Phoenix-Springfi', 'NE'),
(2247, 'University of Phoenix-St Louis', 'NE'),
(2248, 'University of Phoenix-Tulsa Ca', 'NE'),
(2249, 'University of Phoenix-Utah Cam', 'NE'),
(2250, 'University of Phoenix-Washingt', 'NE'),
(2251, 'University of Phoenix-West Flo', 'NV'),
(2252, 'University of Phoenix-West Mic', 'NV'),
(2253, 'University of Phoenix-Western ', 'NV'),
(2254, 'University of Phoenix-Wichita ', 'NH'),
(2255, 'University of Pittsburgh-Bradf', 'NH'),
(2256, 'University of Pittsburgh-Green', 'NH'),
(2257, 'University of Pittsburgh-Johns', 'NH'),
(2258, 'University of Pittsburgh-Pitts', 'NH'),
(2259, 'University of Portland', 'NJ'),
(2260, 'University of Puerto Rico at C', 'NJ'),
(2261, 'University of Puerto Rico in P', 'NJ'),
(2262, 'University of Puerto Rico-Agua', 'NJ'),
(2263, 'University of Puerto Rico-Arec', 'NJ'),
(2264, 'University of Puerto Rico-Baya', 'NJ'),
(2265, 'University of Puerto Rico-Caro', 'NJ'),
(2266, 'University of Puerto Rico-Huma', 'NJ'),
(2267, 'University of Puerto Rico-Maya', 'NJ'),
(2268, 'University of Puerto Rico-Medi', 'NJ'),
(2269, 'University of Puerto Rico-Rio ', 'NJ'),
(2270, 'University of Puerto Rico-Utua', 'NJ'),
(2271, 'University of Puget Sound', 'NJ'),
(2272, 'University of Redlands', 'NJ'),
(2273, 'University of Rhode Island', 'NM'),
(2274, 'University of Richmond', 'NM'),
(2275, 'University of Rio Grande', 'NY'),
(2276, 'University of Rochester', 'NY'),
(2277, 'University of Sacred Heart', 'NY'),
(2278, 'University of Saint Francis-Ft', 'NY'),
(2279, 'University of Saint Mary', 'NY'),
(2280, 'University of San Diego', 'NY'),
(2281, 'University of San Francisco', 'NY'),
(2282, 'University of Science and Arts', 'NY'),
(2283, 'University of Scranton', 'NY'),
(2284, 'University of Sioux Falls', 'NY'),
(2285, 'University of South Alabama', 'NY'),
(2286, 'University of South Carolina-A', 'NY'),
(2287, 'University of South Carolina-B', 'NY'),
(2288, 'University of South Carolina-C', 'NY'),
(2289, 'University of South Carolina-U', 'NY'),
(2290, 'University of South Dakota', 'NY'),
(2291, 'University of South Florida Sa', 'NY'),
(2292, 'University of South Florida-Ma', 'NY'),
(2293, 'University of South Florida-Po', 'NY'),
(2294, 'University of South Florida-St', 'NY'),
(2295, 'University of Southern Califor', 'NY'),
(2296, 'University of Southern Indiana', 'NY'),
(2297, 'University of Southern Maine', 'NY'),
(2298, 'University of Southern Mississ', 'NY'),
(2299, 'University of Southern Nevada', 'NY'),
(2300, 'University of St Francis', 'NY'),
(2301, 'University of St Thomas', 'NY'),
(2302, 'University of St Thomas', 'NY'),
(2303, 'University of Texas Southweste', 'NY'),
(2304, 'University of the Cumberlands', 'NY'),
(2305, 'University of the District of ', 'NY'),
(2306, 'University of the Incarnate Wo', 'NY'),
(2307, 'University of the Ozarks', 'NY'),
(2308, 'University of the Pacific', 'NY'),
(2309, 'University of the Sciences in ', 'NY'),
(2310, 'University of the Southwest', 'NY'),
(2311, 'University of the Virgin Islan', 'NY'),
(2312, 'University of the West', 'NY'),
(2313, 'University of Toledo', 'NY'),
(2314, 'University of Tulsa', 'NY'),
(2315, 'University of Utah', 'NY'),
(2316, 'University of Vermont', 'NY'),
(2317, 'University of Virginia-Main Ca', 'NY'),
(2318, 'University of Washington-Bothe', 'NY'),
(2319, 'University of Washington-Seatt', 'NY'),
(2320, 'University of Washington-Tacom', 'NY'),
(2321, 'University of West Alabama', 'NY'),
(2322, 'University of West Georgia', 'NY'),
(2323, 'University of Western States', 'NY'),
(2324, 'University of Wisconsin-Eau Cl', 'NY'),
(2325, 'University of Wisconsin-Green ', 'NY'),
(2326, 'University of Wisconsin-La Cro', 'NC'),
(2327, 'University of Wisconsin-Madiso', 'NC'),
(2328, 'University of Wisconsin-Milwau', 'NC'),
(2329, 'University of Wisconsin-Oshkos', 'NC'),
(2330, 'University of Wisconsin-Parksi', 'NC'),
(2331, 'University of Wisconsin-Platte', 'NC'),
(2332, 'University of Wisconsin-River ', 'NC'),
(2333, 'University of Wisconsin-Steven', 'NC'),
(2334, 'University of Wisconsin-Stout', 'NC'),
(2335, 'University of Wisconsin-Superi', 'ND'),
(2336, 'University of Wisconsin-Whitew', 'ND'),
(2337, 'University of Wyoming', 'ND'),
(2338, 'Upper Iowa University', 'OH'),
(2339, 'Urbana University', 'OH'),
(2340, 'Ursinus College', 'OH'),
(2341, 'Ursuline College', 'OH'),
(2342, 'Uta Mesivta of Kiryas Joel', 'OH'),
(2343, 'Utah Career College', 'OH'),
(2344, 'Utah Career College-Orem Campu', 'OH'),
(2345, 'Utah Career College-Layton', 'OH'),
(2346, 'Utah State University', 'OH'),
(2347, 'Utah State University-Regional', 'OH'),
(2348, 'Utah Valley University', 'OH'),
(2349, 'Utica College', 'OH'),
(2350, 'Valdosta State University', 'OH'),
(2351, 'Valley City State University', 'OH'),
(2352, 'Valley Forge Christian College', 'OH'),
(2353, 'Valparaiso University', 'OH'),
(2354, 'Vanderbilt University', 'OH'),
(2355, 'VanderCook College of Music', 'OH'),
(2356, 'Vanguard University of Souther', 'OH'),
(2357, 'Vassar College', 'OH'),
(2358, 'Vatterott College', 'OH'),
(2359, 'Vatterott College', 'OK'),
(2360, 'Vaughn College of Aeronautics ', 'OK'),
(2361, 'Vermont Technical College', 'OK'),
(2362, 'Villa Maria College Buffalo', 'OK'),
(2363, 'Villanova University', 'OR'),
(2364, 'Vincennes University', 'OR'),
(2365, 'Virginia College in Charleston', 'OR'),
(2366, 'Virginia College-Birmingham', 'OR'),
(2367, 'Virginia College-Greenville', 'OR'),
(2368, 'Virginia College-Huntsville', 'OR'),
(2369, 'Virginia College-School of Bus', 'OR'),
(2370, 'Virginia Commonwealth Universi', 'OR'),
(2371, 'Virginia Intermont College', 'OR'),
(2372, 'Virginia Military Institute', 'OR'),
(2373, 'Virginia Polytechnic Institute', 'PA'),
(2374, 'Virginia State University', 'PA'),
(2375, 'Virginia Union University', 'PA'),
(2376, 'Virginia University of Lynchbu', 'PA'),
(2377, 'Virginia Wesleyan College', 'PA'),
(2378, 'Visible School-Music and Worsh', 'PA'),
(2379, 'Viterbo University', 'PA'),
(2380, 'Voorhees College', 'PA'),
(2381, 'W L Bonner College', 'PA'),
(2382, 'Wabash College', 'PA'),
(2383, 'Wagner College', 'PA'),
(2384, 'Wake Forest University', 'PA'),
(2385, 'Walden University', 'PA'),
(2386, 'Waldorf College', 'PA'),
(2387, 'Walla Walla University', 'PA'),
(2388, 'Walsh College of Accountancy a', 'PA'),
(2389, 'Walsh University', 'PA'),
(2390, 'Warner Pacific College', 'PA'),
(2391, 'Warner University', 'PA'),
(2392, 'Warren Wilson College', 'PA'),
(2393, 'Wartburg College', 'PA'),
(2394, 'Washburn University', 'PA'),
(2395, 'Washington & Jefferson College', 'PA'),
(2396, 'Washington Adventist Universit', 'PA'),
(2397, 'Washington and Lee University', 'PA'),
(2398, 'Washington Bible College-Capit', 'PA'),
(2399, 'Washington College', 'PA'),
(2400, 'Washington State University', 'PA'),
(2401, 'Washington University in St Lo', 'PA'),
(2402, 'Watkins College of Art & Desig', 'PA'),
(2403, 'Wayland Baptist University', 'PA'),
(2404, 'Wayne State College', 'PA'),
(2405, 'Wayne State University', 'PA'),
(2406, 'Waynesburg University', 'PA'),
(2407, 'Webb Institute', 'PA'),
(2408, 'Webber International Universit', 'RI'),
(2409, 'Weber State University', 'RI'),
(2410, 'Webster University', 'RI'),
(2411, 'Wellesley College', 'SC'),
(2412, 'Wells College', 'SC'),
(2413, 'Wentworth Institute of Technol', 'SC'),
(2414, 'Wesley College', 'SC'),
(2415, 'Wesley College', 'SC'),
(2416, 'Wesleyan College', 'SC'),
(2417, 'Wesleyan University', 'SC'),
(2418, 'West Chester University of Pen', 'SC'),
(2419, 'West Coast University', 'SD'),
(2420, 'West Liberty University', 'SD'),
(2421, 'West Suburban College of Nursi', 'SD'),
(2422, 'West Texas A & M University', 'SD'),
(2423, 'West Virginia State University', 'TN'),
(2424, 'West Virginia University', 'TN'),
(2425, 'West Virginia University at Pa', 'TN'),
(2426, 'West Virginia University Insti', 'TN'),
(2427, 'West Virginia Wesleyan College', 'TN'),
(2428, 'Western Carolina University', 'TN'),
(2429, 'Western Connecticut State Univ', 'TN'),
(2430, 'Western Governors University', 'TN'),
(2431, 'Western Illinois University', 'TN'),
(2432, 'Western International Universi', 'TN'),
(2433, 'Western Kentucky University', 'TN'),
(2434, 'Western Michigan University', 'TN'),
(2435, 'Western Nevada College', 'TN'),
(2436, 'Western New England College', 'TX'),
(2437, 'Western New Mexico University', 'TX'),
(2438, 'Western Oregon University', 'TX'),
(2439, 'Western State College of Color', 'TX'),
(2440, 'Western Washington University', 'TX'),
(2441, 'Westfield State College', 'TX'),
(2442, 'Westminster College', 'TX'),
(2443, 'Westminster College', 'TX'),
(2444, 'Westminster College', 'TX'),
(2445, 'Westmont College', 'TX'),
(2446, 'Westwood College-Anaheim', 'TX'),
(2447, 'Westwood College-Annandale', 'TX'),
(2448, 'Westwood College-Arlington Bal', 'TX'),
(2449, 'Westwood College-Atlanta Midto', 'TX'),
(2450, 'Westwood College-Chicago Loop', 'TX'),
(2451, 'Westwood College-Dallas', 'TX'),
(2452, 'Westwood College-Denver North', 'TX'),
(2453, 'Westwood College-Denver South', 'TX'),
(2454, 'Westwood College-Dupage', 'TX'),
(2455, 'Westwood College-Ft Worth', 'TX'),
(2456, 'Westwood College-Houston South', 'TX'),
(2457, 'Westwood College-Inland Empire', 'TX'),
(2458, 'Westwood College-Los Angeles', 'TX'),
(2459, 'Westwood College-Northlake', 'TX'),
(2460, 'Westwood College-O''Hare Airpor', 'HI'),
(2461, 'Westwood College-River Oaks', 'UT'),
(2462, 'Westwood College-South Bay', 'UT'),
(2463, 'Wheaton College', 'UT'),
(2464, 'Wheaton College', 'VT'),
(2465, 'Wheeling Jesuit University', 'VT'),
(2466, 'Wheelock College', 'VT'),
(2467, 'Whitman College', 'VT'),
(2468, 'Whittier College', 'VT'),
(2469, 'Whitworth University', 'VA'),
(2470, 'Wichita State University', 'VA'),
(2471, 'Widener University-Delaware Ca', 'VA'),
(2472, 'Widener University-Main Campus', 'VA'),
(2473, 'Wilberforce University', 'VA'),
(2474, 'Wiley College', 'VA'),
(2475, 'Wilkes University', 'VA'),
(2476, 'Willamette University', 'VA'),
(2477, 'William Carey University', 'VA'),
(2478, 'William Jessup University', 'VA'),
(2479, 'William Jewell College', 'VA'),
(2480, 'William Paterson University of', 'VA'),
(2481, 'William Penn University', 'WA'),
(2482, 'William Woods University', 'WA'),
(2483, 'Williams Baptist College', 'WA'),
(2484, 'Williams College', 'WA'),
(2485, 'Williamson Christian College', 'WA'),
(2486, 'Wilmington College', 'WA'),
(2487, 'Wilmington University', 'WA'),
(2488, 'Wilson College', 'WA'),
(2489, 'Wingate University', 'WV'),
(2490, 'Winona State University', 'WV'),
(2491, 'Winston-Salem State University', 'WV'),
(2492, 'Winthrop University', 'WV'),
(2493, 'Wisconsin Lutheran College', 'WV'),
(2494, 'Wittenberg University', 'WI'),
(2495, 'Wofford College', 'WI'),
(2496, 'Woodbury University', 'WI'),
(2497, 'Worcester Polytechnic Institut', 'WI'),
(2498, 'Worcester State College', 'WI'),
(2499, 'World Mission University', 'WI'),
(2500, 'Wright State University-Lake C', 'WI'),
(2501, 'Wright State University-Main C', 'WI'),
(2502, 'Xavier University', 'WY'),
(2503, 'Xavier University of Louisiana', 'MP'),
(2504, 'Yale University', 'PR'),
(2505, 'Yeshiva and Kollel Harbotzas T', 'PR'),
(2506, 'Yeshiva College of the Nations', 'PR'),
(2507, 'Yeshiva D''monsey Rabbinical Co', 'PR'),
(2508, 'Yeshiva Derech Chaim', 'PR'),
(2509, 'Yeshiva Gedolah Imrei Yosef D''', 'PR'),
(2510, 'Yeshiva Gedolah of Greater Det', 'PR'),
(2511, 'Yeshiva Karlin Stolin', 'PR'),
(2512, 'Yeshiva of Machzikai Hadas', 'PR'),
(2513, 'Yeshiva of Nitra Rabbinical Co', 'PR'),
(2514, 'Yeshiva of the Telshe Alumni', 'PR'),
(2515, 'Yeshiva Ohr Elchonon Chabad We', 'PR'),
(2516, 'Yeshiva Shaar Hatorah', 'PR'),
(2517, 'Yeshiva Shaarei Torah of Rockl', 'PR'),
(2518, 'Yeshiva Toras Chaim', 'PR'),
(2519, 'Yeshiva Toras Chaim Talmudical', 'PR'),
(2520, 'Yeshiva University', 'CA'),
(2521, 'Yeshivah Gedolah Rabbinical Co', 'MO'),
(2522, 'Yeshivas Be''er Yitzchok', 'NM'),
(2523, 'Yeshivas Novominsk', 'SC'),
(2524, 'Yeshivat Mikdash Melech', 'CO'),
(2525, 'Yeshivath Beth Moshe', 'IA'),
(2526, 'Yeshivath Viznitz', 'IL'),
(2527, 'Yeshivath Zichron Moshe', 'FL'),
(2528, 'York College', 'PR'),
(2529, 'York College Pennsylvania', 'IA'),
(2530, 'Young Harris College', 'TN'),
(2531, 'Youngstown State University', 'VA'),
(2532, 'Zion Bible College', 'CA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usertype` tinyint(3) unsigned NOT NULL,
  `transType` enum('B','S') NOT NULL DEFAULT 'B',
  `schoolType` enum('C','L','B','M','G') NOT NULL DEFAULT 'C',
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `idName` varchar(50) DEFAULT NULL,
  `hs_profile_status` enum('A','B','C') DEFAULT 'A' COMMENT 'A = none, B=exists but not for sale, C = exists and for sale',
  `last_login_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(10) unsigned DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `update_user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `usertype`, `transType`, `schoolType`, `email`, `username`, `password`, `FirstName`, `LastName`, `idName`, `hs_profile_status`, `last_login_time`, `create_time`, `create_user_id`, `update_time`, `update_user_id`) VALUES
(29, 0, 'S', 'C', 'jsmith@gmail.com', 'jsmith', 'f75e19aa8da1f3bef9aaa878e8375dce840b3df185dbb3caed29c89dfef04afacc1c696bfb77d3d2b7153b0d4185a5e933b831263297099c21044bd824004963', 'John', 'Smith', NULL, 'A', NULL, '2011-10-24 16:40:19', NULL, '2011-10-24 16:40:19', NULL),
(33, 0, 'S', 'C', 'test@gmail.com', 'test', '8a3815c4b5efae15ebdaf24c593526d495eb263c7871b8234572f5b02bfa296d6d8f6ab88e2de6160b26c118db1732fc9d3d7ba213caf13ac84ff0e52f3042d7', 'test', 'testy', NULL, 'A', NULL, '2011-11-03 00:14:11', NULL, '2011-11-03 00:14:11', NULL),
(34, 0, 'S', 'C', 'test2@gmail.com', 'test2', '03a68bc8bf0b54c9c46d042991556b4b7bbe3a4ac1c2164f28cbc0edb5a6e9c6828fe4e96e92399c1a50c39f1ad17bf2f5e6172bc232c44a996413af58bf6d96', 'test2', 'test2', NULL, 'A', NULL, '2011-11-03 00:18:40', NULL, '2011-11-03 00:18:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_credit`
--

CREATE TABLE IF NOT EXISTS `tbl_user_credit` (
  `user_id` int(10) unsigned NOT NULL,
  `buy_credits` double NOT NULL,
  `sell_credits` double NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_credit`
--

INSERT INTO `tbl_user_credit` (`user_id`, `buy_credits`, `sell_credits`) VALUES
(29, 11, 0),
(33, 0, 0),
(34, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_volunteer_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_volunteer_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `volunteertype_id` tinyint(2) NOT NULL,
  `year_begin` tinyint(3) unsigned NOT NULL,
  `year_end` tinyint(3) unsigned NOT NULL,
  `leadership` tinyint(3) unsigned NOT NULL,
  `hours` tinyint(3) unsigned NOT NULL,
  `comments` text COLLATE utf8_bin NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_volunteer_profile`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_work_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_bin,
  `work_type` tinyint(2) DEFAULT NULL,
  `year_begin` tinyint(2) DEFAULT NULL,
  `year_end` tinyint(2) DEFAULT NULL,
  `title` tinyint(2) DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_work_profile`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_academic_profile`
--
ALTER TABLE `tbl_academic_profile`
  ADD CONSTRAINT `tbl_academic_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_activity_profile`
--
ALTER TABLE `tbl_activity_profile`
  ADD CONSTRAINT `tbl_activity_profile_ibfk_1` FOREIGN KEY (`activity_type_id`) REFERENCES `tbl_activity_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tbl_activity_profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ap_profile`
--
ALTER TABLE `tbl_ap_profile`
  ADD CONSTRAINT `tbl_ap_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ap_profile_ibfk_2` FOREIGN KEY (`ap_id`) REFERENCES `tbl_ap_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_basic_profile`
--
ALTER TABLE `tbl_basic_profile`
  ADD CONSTRAINT `tbl_basic_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_basic_profile_ibfk_2` FOREIGN KEY (`first_university_id`) REFERENCES `tbl_university_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_basic_profile_ibfk_3` FOREIGN KEY (`race_id`) REFERENCES `tbl_race_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tbl_basic_profile_ibfk_4` FOREIGN KEY (`curr_university_id`) REFERENCES `tbl_university_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_competition_profile`
--
ALTER TABLE `tbl_competition_profile`
  ADD CONSTRAINT `tbl_competition_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_essay_profile`
--
ALTER TABLE `tbl_essay_profile`
  ADD CONSTRAINT `tbl_essay_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_map_profile_student`
--
ALTER TABLE `tbl_map_profile_student`
  ADD CONSTRAINT `tbl_map_profile_student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_map_profile_student_ibfk_2` FOREIGN KEY (`purchased_profile_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_personal_profile`
--
ALTER TABLE `tbl_personal_profile`
  ADD CONSTRAINT `tbl_personal_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personal_profile_ibfk_2` FOREIGN KEY (`religion_id`) REFERENCES `tbl_religion_type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_sat2_profile`
--
ALTER TABLE `tbl_sat2_profile`
  ADD CONSTRAINT `tbl_sat2_profile_ibfk_1` FOREIGN KEY (`sat2_id`) REFERENCES `tbl_sat2_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sat2_profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_score_profile`
--
ALTER TABLE `tbl_score_profile`
  ADD CONSTRAINT `tbl_score_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sport_profile`
--
ALTER TABLE `tbl_sport_profile`
  ADD CONSTRAINT `tbl_sport_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sport_profile_ibfk_2` FOREIGN KEY (`sport_id`) REFERENCES `tbl_sport_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subject_profile`
--
ALTER TABLE `tbl_subject_profile`
  ADD CONSTRAINT `tbl_subject_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_credit`
--
ALTER TABLE `tbl_user_credit`
  ADD CONSTRAINT `tbl_user_credit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
