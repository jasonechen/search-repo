-- phpMyAdmin SQL Dump
-- version 2.6.4-pl3
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 06 2011 г., 23:30
-- Версия сервера: 5.0.67
-- Версия PHP: 5.3.8
--
-- БД: `searcher_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `authassignment`
--


-- --------------------------------------------------------

--
-- Структура таблицы `authitem`
--

DROP TABLE IF EXISTS `authitem`;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY  (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `authitem`
--

INSERT INTO `authitem` VALUES ('admin', 2, '', NULL, 'N;');
INSERT INTO `authitem` VALUES ('buyerLevel1', 2, '', NULL, 'N;');
INSERT INTO `authitem` VALUES ('buyerLevel2', 2, '', NULL, 'N;');
INSERT INTO `authitem` VALUES ('buyerLevel3', 2, '', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteAp', 0, 'deleteAp', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteCompetition', 0, 'deleteCompetition', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteEssay', 0, 'deleteEssay', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteExtracurricular', 0, 'deleteExtracurricular', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteProfile', 0, 'deleteProfile', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteSat2', 0, 'deleteSat2', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteSport', 0, 'deleteSport', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteSubject', 0, 'deleteSubject', NULL, 'N;');
INSERT INTO `authitem` VALUES ('deleteUser', 0, 'remove a user from a project', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modAp', 0, 'modAp', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modBasic', 0, 'modBasic', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modCompetitions', 0, 'modCompetitions', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modEssays', 0, 'modEssays', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modExtracurriculars', 0, 'modExtracurriculars', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modSat2', 0, 'modSat2', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modScores', 0, 'modScores', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modSports', 0, 'modSports', NULL, 'N;');
INSERT INTO `authitem` VALUES ('modSubjects', 0, 'modSubjects', NULL, 'N;');
INSERT INTO `authitem` VALUES ('readUser', 0, 'read user profile in-formation', NULL, 'N;');
INSERT INTO `authitem` VALUES ('seller', 2, '', NULL, 'N;');
INSERT INTO `authitem` VALUES ('updateUser', 0, 'update a users in-formation', NULL, 'N;');
INSERT INTO `authitem` VALUES ('user', 2, '', NULL, 'N;');
INSERT INTO `authitem` VALUES ('viewEssay', 0, 'viewEssay', NULL, 'N;');
INSERT INTO `authitem` VALUES ('viewLevel1', 0, 'viewLevel1', NULL, 'N;');
INSERT INTO `authitem` VALUES ('viewLevel2', 0, 'viewLevel2', NULL, 'N;');
INSERT INTO `authitem` VALUES ('viewLevel3', 0, 'viewLevel3', NULL, 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY  (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `authitemchild`
--

INSERT INTO `authitemchild` VALUES ('admin', 'buyerLevel1');
INSERT INTO `authitemchild` VALUES ('seller', 'buyerLevel1');
INSERT INTO `authitemchild` VALUES ('admin', 'buyerLevel2');
INSERT INTO `authitemchild` VALUES ('seller', 'buyerLevel2');
INSERT INTO `authitemchild` VALUES ('admin', 'buyerLevel3');
INSERT INTO `authitemchild` VALUES ('seller', 'buyerLevel3');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteAp');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteCompetition');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteEssay');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteExtracurricular');
INSERT INTO `authitemchild` VALUES ('admin', 'deleteProfile');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteSat2');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteSport');
INSERT INTO `authitemchild` VALUES ('seller', 'deleteSubject');
INSERT INTO `authitemchild` VALUES ('admin', 'deleteUser');
INSERT INTO `authitemchild` VALUES ('seller', 'modAp');
INSERT INTO `authitemchild` VALUES ('seller', 'modBasic');
INSERT INTO `authitemchild` VALUES ('seller', 'modCompetitions');
INSERT INTO `authitemchild` VALUES ('seller', 'modEssays');
INSERT INTO `authitemchild` VALUES ('seller', 'modExtracurriculars');
INSERT INTO `authitemchild` VALUES ('seller', 'modSat2');
INSERT INTO `authitemchild` VALUES ('seller', 'modScores');
INSERT INTO `authitemchild` VALUES ('seller', 'modSports');
INSERT INTO `authitemchild` VALUES ('seller', 'modSubjects');
INSERT INTO `authitemchild` VALUES ('user', 'readUser');
INSERT INTO `authitemchild` VALUES ('admin', 'seller');
INSERT INTO `authitemchild` VALUES ('user', 'updateUser');
INSERT INTO `authitemchild` VALUES ('admin', 'user');
INSERT INTO `authitemchild` VALUES ('buyerLevel1', 'user');
INSERT INTO `authitemchild` VALUES ('buyerLevel2', 'user');
INSERT INTO `authitemchild` VALUES ('buyerLevel3', 'user');
INSERT INTO `authitemchild` VALUES ('seller', 'user');
INSERT INTO `authitemchild` VALUES ('seller', 'viewEssay');
INSERT INTO `authitemchild` VALUES ('buyerLevel1', 'viewLevel1');
INSERT INTO `authitemchild` VALUES ('buyerLevel2', 'viewLevel2');
INSERT INTO `authitemchild` VALUES ('buyerLevel3', 'viewLevel3');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_academic_profile`
--

DROP TABLE IF EXISTS `tbl_academic_profile`;
CREATE TABLE `tbl_academic_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `national_Merit` enum('','N','S','M','F') default NULL,
  `class_rank_num` tinyint(4) default NULL,
  `class_size` char(1) default NULL,
  `GPA_unweight` float unsigned default NULL,
  `class_rank_percent` tinyint(1) unsigned default NULL,
  `GPA_weight` float unsigned default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_academic_profile`
--

INSERT INTO `tbl_academic_profile` VALUES (29, 'S', NULL, '', NULL, 2, NULL);
INSERT INTO `tbl_academic_profile` VALUES (33, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_activity_profile`
--

DROP TABLE IF EXISTS `tbl_activity_profile`;
CREATE TABLE `tbl_activity_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `activity_type_id` char(2) default NULL,
  `leadership` varchar(15) default NULL,
  `hours_per_week` tinyint(2) unsigned default NULL,
  `year_participate_begin` tinyint(2) unsigned default NULL,
  `year_participate_end` tinyint(2) unsigned default NULL,
  `comments` text,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`activity_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_activity_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_activity_type`
--

DROP TABLE IF EXISTS `tbl_activity_type`;
CREATE TABLE `tbl_activity_type` (
  `id` char(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_activity_type`
--

INSERT INTO `tbl_activity_type` VALUES ('AA', 'Academic Honor Society');
INSERT INTO `tbl_activity_type` VALUES ('AB', 'Art Activity or Club');
INSERT INTO `tbl_activity_type` VALUES ('AC', 'Business / Career-oriented Club');
INSERT INTO `tbl_activity_type` VALUES ('AD', 'Computer Club');
INSERT INTO `tbl_activity_type` VALUES ('AE', 'Dance Activity or Group');
INSERT INTO `tbl_activity_type` VALUES ('AF', 'Debating/Public Speaking Club');
INSERT INTO `tbl_activity_type` VALUES ('AG', 'Ethnic Organization');
INSERT INTO `tbl_activity_type` VALUES ('AH', 'Environmental Club');
INSERT INTO `tbl_activity_type` VALUES ('AI', 'Foreign Exchange Program');
INSERT INTO `tbl_activity_type` VALUES ('AJ', 'Foreign Lang. Activity/Club');
INSERT INTO `tbl_activity_type` VALUES ('AK', 'Game Club');
INSERT INTO `tbl_activity_type` VALUES ('AL', 'Government/Political Club');
INSERT INTO `tbl_activity_type` VALUES ('AM', 'Journalism / Newspaper');
INSERT INTO `tbl_activity_type` VALUES ('AN', 'Literary Club');
INSERT INTO `tbl_activity_type` VALUES ('AO', 'Math Club');
INSERT INTO `tbl_activity_type` VALUES ('AP', 'Media Activity / Club');
INSERT INTO `tbl_activity_type` VALUES ('AQ', 'Quiz Bowl');
INSERT INTO `tbl_activity_type` VALUES ('AR', 'Religious Club');
INSERT INTO `tbl_activity_type` VALUES ('AS', 'Science Club');
INSERT INTO `tbl_activity_type` VALUES ('AT', 'School Spirit Activity or Club');
INSERT INTO `tbl_activity_type` VALUES ('AU', 'Student Government / Council');
INSERT INTO `tbl_activity_type` VALUES ('AV', 'Theater Activity');
INSERT INTO `tbl_activity_type` VALUES ('AW', 'Other Club');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_ap_profile`
--

DROP TABLE IF EXISTS `tbl_ap_profile`;
CREATE TABLE `tbl_ap_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `ap_id` char(2) NOT NULL,
  `score` int(1) unsigned default NULL,
  `date_taken` date default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`ap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `tbl_ap_profile`
--

INSERT INTO `tbl_ap_profile` VALUES (10, 29, 'EL', 2, NULL, '2011-10-24 16:41:53', 29, '2011-10-24 16:41:53', 29);
INSERT INTO `tbl_ap_profile` VALUES (11, 29, 'CS', 1, NULL, '2011-10-24 19:21:00', 29, '2011-10-24 19:21:00', 29);
INSERT INTO `tbl_ap_profile` VALUES (14, 33, 'BI', 3, NULL, '2011-11-03 00:18:04', 33, '2011-11-03 00:18:04', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_ap_type`
--

DROP TABLE IF EXISTS `tbl_ap_type`;
CREATE TABLE `tbl_ap_type` (
  `id` char(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_ap_type`
--

INSERT INTO `tbl_ap_type` VALUES ('AB', 'Calculus AB');
INSERT INTO `tbl_ap_type` VALUES ('AH', 'Art History');
INSERT INTO `tbl_ap_type` VALUES ('BC', 'Calculus BC');
INSERT INTO `tbl_ap_type` VALUES ('BI', 'Biology');
INSERT INTO `tbl_ap_type` VALUES ('CG', 'Comp Government and Politics');
INSERT INTO `tbl_ap_type` VALUES ('CH', 'Chemistry');
INSERT INTO `tbl_ap_type` VALUES ('CL', 'Chinese Language and Culture');
INSERT INTO `tbl_ap_type` VALUES ('CS', 'Computer Science A');
INSERT INTO `tbl_ap_type` VALUES ('EH', 'European History');
INSERT INTO `tbl_ap_type` VALUES ('EL', 'English Literature');
INSERT INTO `tbl_ap_type` VALUES ('EN', 'English Language');
INSERT INTO `tbl_ap_type` VALUES ('ES', 'Environmental Science');
INSERT INTO `tbl_ap_type` VALUES ('FL', 'French Language and Culture');
INSERT INTO `tbl_ap_type` VALUES ('GL', 'German');
INSERT INTO `tbl_ap_type` VALUES ('HG', 'Human Geography');
INSERT INTO `tbl_ap_type` VALUES ('JL', 'Japanese Language and Culture');
INSERT INTO `tbl_ap_type` VALUES ('LV', 'Latin: Vergil');
INSERT INTO `tbl_ap_type` VALUES ('MA', 'Macroeconomics');
INSERT INTO `tbl_ap_type` VALUES ('MI', 'Microeconomics');
INSERT INTO `tbl_ap_type` VALUES ('MT', 'Music Theory');
INSERT INTO `tbl_ap_type` VALUES ('PB', 'Physics B');
INSERT INTO `tbl_ap_type` VALUES ('PC', 'Physics C');
INSERT INTO `tbl_ap_type` VALUES ('PS', 'Psychology');
INSERT INTO `tbl_ap_type` VALUES ('SA', 'Studio Art');
INSERT INTO `tbl_ap_type` VALUES ('SL', 'Spanish Literature');
INSERT INTO `tbl_ap_type` VALUES ('SP', 'Spanish Language');
INSERT INTO `tbl_ap_type` VALUES ('ST', 'Statistics');
INSERT INTO `tbl_ap_type` VALUES ('UG', 'U.S. Government and Politics');
INSERT INTO `tbl_ap_type` VALUES ('UH', 'U.S. History');
INSERT INTO `tbl_ap_type` VALUES ('WH', 'World History');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_award_profile`
--

DROP TABLE IF EXISTS `tbl_award_profile`;
CREATE TABLE `tbl_award_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `year` tinyint(4) default NULL,
  `award_name` varchar(30) default NULL,
  `comments` varchar(50) default NULL,
  `region` char(1) default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_award_profile`
--

INSERT INTO `tbl_award_profile` VALUES (3, 28, 4, 'National Latin Exam', 'exam', '6', '2011-10-27 23:18:09', 28, '2011-10-27 23:18:09', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_basic_profile`
--

DROP TABLE IF EXISTS `tbl_basic_profile`;
CREATE TABLE `tbl_basic_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `nickname` varchar(40) default NULL,
  `first_university_id` smallint(10) unsigned default NULL,
  `curr_university_id` smallint(10) unsigned NOT NULL,
  `isTransfer` enum('','Y','N') default NULL,
  `gender` enum('','M','F') default NULL,
  `highschool_id` smallint(4) unsigned NOT NULL default '0',
  `highSchoolType` enum('PUB','PRN','PRR','HOM','CHR','OTH','') default NULL,
  `race_id` char(1) default NULL,
  `sat_I_score_range` tinyint(1) unsigned default NULL,
  `num_scores` tinyint(2) unsigned NOT NULL,
  `num_aps` tinyint(2) unsigned NOT NULL,
  `num_sat2s` tinyint(2) unsigned NOT NULL,
  `num_competitions` tinyint(2) unsigned NOT NULL,
  `num_sports` tinyint(2) unsigned NOT NULL,
  `num_academics` tinyint(3) unsigned NOT NULL,
  `num_extracurriculars` tinyint(3) unsigned NOT NULL,
  `num_essays` tinyint(3) unsigned NOT NULL,
  `avg_profile_rating` tinyint(1) unsigned default NULL,
  `l1ForSale` tinyint(1) NOT NULL default '0',
  `l2ForSale` tinyint(1) NOT NULL default '0',
  `l3ForSale` tinyint(1) NOT NULL default '0',
  `musical_instrument_id` char(2) default NULL,
  `profile_type` tinyint(2) unsigned NOT NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`user_id`),
  KEY `RACE` (`race_id`),
  KEY `FUNIV` (`first_university_id`),
  KEY `CUNIV` (`curr_university_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_basic_profile`
--

INSERT INTO `tbl_basic_profile` VALUES (29, 'smitty', 1, 2047, '', 'F', 1, 'PRN', 'B', NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 1, 1, NULL, 3, '2011-10-31 20:24:30', 29, '2011-10-31 21:46:30', 29);
INSERT INTO `tbl_basic_profile` VALUES (33, 'test1', 1, 2039, 'N', 'M', 1, 'PUB', 'A', 7, 4, 1, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 5, '2011-11-03 00:16:53', 33, '2011-11-03 00:18:04', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_citizen_type`
--

DROP TABLE IF EXISTS `tbl_citizen_type`;
CREATE TABLE `tbl_citizen_type` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(60) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_citizen_type`
--

INSERT INTO `tbl_citizen_type` VALUES (1, 'United States of America ');
INSERT INTO `tbl_citizen_type` VALUES (2, 'Afghanistan');
INSERT INTO `tbl_citizen_type` VALUES (3, 'Albania');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_competition_profile`
--

DROP TABLE IF EXISTS `tbl_competition_profile`;
CREATE TABLE `tbl_competition_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `year` tinyint(1) default NULL,
  `name_of_competition` varchar(20) default NULL,
  `rank_or_score` varchar(10) default NULL,
  `num_competitors` tinyint(6) unsigned default NULL,
  `region` tinyint(1) default NULL,
  `comments` text,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_competition_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_essay_profile`
--

DROP TABLE IF EXISTS `tbl_essay_profile`;
CREATE TABLE `tbl_essay_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(20) default NULL,
  `mime` varchar(50) default NULL,
  `size` bigint(20) unsigned default NULL,
  `data` mediumblob,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_essay_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_ethnic_type`
--

DROP TABLE IF EXISTS `tbl_ethnic_type`;
CREATE TABLE `tbl_ethnic_type` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=123 ;

--
-- Дамп данных таблицы `tbl_ethnic_type`
--

INSERT INTO `tbl_ethnic_type` VALUES (1, 0x4166726963616e2d416d65726963616e202f20426c61636b);
INSERT INTO `tbl_ethnic_type` VALUES (2, 0x416c62616e69616e);
INSERT INTO `tbl_ethnic_type` VALUES (3, 0x416c67657269616e);
INSERT INTO `tbl_ethnic_type` VALUES (4, 0x416d65726963616e);
INSERT INTO `tbl_ethnic_type` VALUES (5, 0x416e676f6c616e);
INSERT INTO `tbl_ethnic_type` VALUES (6, 0x41726162);
INSERT INTO `tbl_ethnic_type` VALUES (7, 0x417267656e74696e69616e);
INSERT INTO `tbl_ethnic_type` VALUES (8, 0x41726d656e69616e);
INSERT INTO `tbl_ethnic_type` VALUES (9, 0x417573747269616e);
INSERT INTO `tbl_ethnic_type` VALUES (10, 0x42656c6769616e);
INSERT INTO `tbl_ethnic_type` VALUES (101, 0x537269204c616e6b616e);
INSERT INTO `tbl_ethnic_type` VALUES (102, 0x537564616e657365);
INSERT INTO `tbl_ethnic_type` VALUES (103, 0x53776564697368);
INSERT INTO `tbl_ethnic_type` VALUES (104, 0x5377697373);
INSERT INTO `tbl_ethnic_type` VALUES (105, 0x53797269616e);
INSERT INTO `tbl_ethnic_type` VALUES (106, 0x54616977616e657365);
INSERT INTO `tbl_ethnic_type` VALUES (107, 0x54616e7a616e69616e);
INSERT INTO `tbl_ethnic_type` VALUES (108, 0x54686169);
INSERT INTO `tbl_ethnic_type` VALUES (109, 0x5469626574616e);
INSERT INTO `tbl_ethnic_type` VALUES (110, 0x5472696e6964616469616e);
INSERT INTO `tbl_ethnic_type` VALUES (111, 0x54756e697369616e);
INSERT INTO `tbl_ethnic_type` VALUES (112, 0x5475726b697368);
INSERT INTO `tbl_ethnic_type` VALUES (113, 0x5567616e64616e);
INSERT INTO `tbl_ethnic_type` VALUES (114, 0x556b7261696e69616e);
INSERT INTO `tbl_ethnic_type` VALUES (115, 0x55727567756179616e);
INSERT INTO `tbl_ethnic_type` VALUES (116, 0x56656e657a75656c616e);
INSERT INTO `tbl_ethnic_type` VALUES (117, 0x566965746e616d657365);
INSERT INTO `tbl_ethnic_type` VALUES (118, 0x57656c7368);
INSERT INTO `tbl_ethnic_type` VALUES (119, 0x5975676f736c617669616e);
INSERT INTO `tbl_ethnic_type` VALUES (120, 0x5a616d6269616e);
INSERT INTO `tbl_ethnic_type` VALUES (121, 0x5a696d6261627765616e);
INSERT INTO `tbl_ethnic_type` VALUES (122, 0x4f74686572);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_highschool_name`
--

DROP TABLE IF EXISTS `tbl_highschool_name`;
CREATE TABLE `tbl_highschool_name` (
  `id` mediumint(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` char(2) default NULL,
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
  `type` char(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_highschool_name`
--

INSERT INTO `tbl_highschool_name` VALUES (1, 'bronx science', '', 'New York', 'NY', 127, 0, 0, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, '1');
INSERT INTO `tbl_highschool_name` VALUES (2, 'palo alto high school', 'el camino real', 'Palo Alto', 'CA', 0, 0, 0, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, '1');
INSERT INTO `tbl_highschool_name` VALUES (3, 'Philips Exeter Acadamy', '', 'Andover', 'MA', 0, 0, 0, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, '2');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_highschool_profile`
--

DROP TABLE IF EXISTS `tbl_highschool_profile`;
CREATE TABLE `tbl_highschool_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `highSchool_id` mediumint(10) default NULL,
  `start_date` date default NULL,
  `last_date` date default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`),
  KEY `HS` (`highSchool_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_highschool_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_language_profile`
--

DROP TABLE IF EXISTS `tbl_language_profile`;
CREATE TABLE `tbl_language_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `language_id` varchar(3) collate utf8_bin NOT NULL,
  `fluency` int(3) NOT NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `tbl_language_profile`
--

INSERT INTO `tbl_language_profile` VALUES (2, 28, 0x4131, 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);
INSERT INTO `tbl_language_profile` VALUES (4, 28, 0x4150, 3, '2011-10-25 09:50:12', 28, '2011-10-25 09:50:12', 28);
INSERT INTO `tbl_language_profile` VALUES (5, 28, 0x414b, 1, '2011-10-25 09:52:41', 28, '2011-10-25 09:52:41', 28);
INSERT INTO `tbl_language_profile` VALUES (6, 28, 0x4143, 1, '2011-10-25 10:29:51', 28, '2011-10-25 10:29:51', 28);
INSERT INTO `tbl_language_profile` VALUES (7, 33, 0x4136, 1, '2011-11-03 00:17:37', 33, '2011-11-03 00:17:37', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_language_type`
--

DROP TABLE IF EXISTS `tbl_language_type`;
CREATE TABLE `tbl_language_type` (
  `id` varchar(3) collate utf8_bin NOT NULL,
  `name` varchar(30) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `tbl_language_type`
--

INSERT INTO `tbl_language_type` VALUES (0x4130, '');
INSERT INTO `tbl_language_type` VALUES (0x4131, 'Albanian');
INSERT INTO `tbl_language_type` VALUES (0x4132, 'Amharic');
INSERT INTO `tbl_language_type` VALUES (0x4133, 'Arabic');
INSERT INTO `tbl_language_type` VALUES (0x4134, 'Armenian');
INSERT INTO `tbl_language_type` VALUES (0x4135, 'Assamese');
INSERT INTO `tbl_language_type` VALUES (0x4136, 'Azerbaijani');
INSERT INTO `tbl_language_type` VALUES (0x4137, 'Belarusian');
INSERT INTO `tbl_language_type` VALUES (0x4138, 'Bengali');
INSERT INTO `tbl_language_type` VALUES (0x4139, 'Bhojpuri');
INSERT INTO `tbl_language_type` VALUES (0x4141, 'Bulgarian');
INSERT INTO `tbl_language_type` VALUES (0x4142, 'Burmese');
INSERT INTO `tbl_language_type` VALUES (0x4143, 'Cantonese');
INSERT INTO `tbl_language_type` VALUES (0x4144, 'Cebuano');
INSERT INTO `tbl_language_type` VALUES (0x4145, 'Chhattisgarhi');
INSERT INTO `tbl_language_type` VALUES (0x4146, 'Czech');
INSERT INTO `tbl_language_type` VALUES (0x4147, 'Danish');
INSERT INTO `tbl_language_type` VALUES (0x4148, 'Dutch');
INSERT INTO `tbl_language_type` VALUES (0x4149, 'Finnish');
INSERT INTO `tbl_language_type` VALUES (0x414a, 'French');
INSERT INTO `tbl_language_type` VALUES (0x414b, 'Gan');
INSERT INTO `tbl_language_type` VALUES (0x414c, 'German');
INSERT INTO `tbl_language_type` VALUES (0x414d, 'Greek');
INSERT INTO `tbl_language_type` VALUES (0x414e, 'Gujarati');
INSERT INTO `tbl_language_type` VALUES (0x414f, 'Haitian');
INSERT INTO `tbl_language_type` VALUES (0x4150, 'Hausa');
INSERT INTO `tbl_language_type` VALUES (0x4151, 'Herbrew');
INSERT INTO `tbl_language_type` VALUES (0x4152, 'Hindi-Urdu');
INSERT INTO `tbl_language_type` VALUES (0x4153, 'Hunanese');
INSERT INTO `tbl_language_type` VALUES (0x4154, 'Hungarian');
INSERT INTO `tbl_language_type` VALUES (0x4155, 'Igbo');
INSERT INTO `tbl_language_type` VALUES (0x4156, 'Italian');
INSERT INTO `tbl_language_type` VALUES (0x4157, 'Japanese');
INSERT INTO `tbl_language_type` VALUES (0x4158, 'Javanese');
INSERT INTO `tbl_language_type` VALUES (0x4159, 'Kannada');
INSERT INTO `tbl_language_type` VALUES (0x415a, 'Kazakh');
INSERT INTO `tbl_language_type` VALUES (0x4241, 'Khmer');
INSERT INTO `tbl_language_type` VALUES (0x4242, 'Korean');
INSERT INTO `tbl_language_type` VALUES (0x4243, 'Kurdish');
INSERT INTO `tbl_language_type` VALUES (0x4244, 'Lao-Isan');
INSERT INTO `tbl_language_type` VALUES (0x4245, 'Latin');
INSERT INTO `tbl_language_type` VALUES (0x4246, 'Maithili');
INSERT INTO `tbl_language_type` VALUES (0x4247, 'Malagasy');
INSERT INTO `tbl_language_type` VALUES (0x4248, 'Malay');
INSERT INTO `tbl_language_type` VALUES (0x4249, 'Mandarin');
INSERT INTO `tbl_language_type` VALUES (0x424a, 'Marathi');
INSERT INTO `tbl_language_type` VALUES (0x424b, 'Marwari');
INSERT INTO `tbl_language_type` VALUES (0x424c, 'Northern Berber');
INSERT INTO `tbl_language_type` VALUES (0x424d, 'Oriya');
INSERT INTO `tbl_language_type` VALUES (0x424e, 'Oromo');
INSERT INTO `tbl_language_type` VALUES (0x424f, 'Pashto');
INSERT INTO `tbl_language_type` VALUES (0x4250, 'Persian');
INSERT INTO `tbl_language_type` VALUES (0x4251, 'Polish');
INSERT INTO `tbl_language_type` VALUES (0x4252, 'Portugese');
INSERT INTO `tbl_language_type` VALUES (0x4253, 'Punjabi');
INSERT INTO `tbl_language_type` VALUES (0x4254, 'Rajasthani');
INSERT INTO `tbl_language_type` VALUES (0x4255, 'Rangpuri');
INSERT INTO `tbl_language_type` VALUES (0x4256, 'Romanian');
INSERT INTO `tbl_language_type` VALUES (0x4257, 'Russian');
INSERT INTO `tbl_language_type` VALUES (0x4258, 'Serbo-Croatian');
INSERT INTO `tbl_language_type` VALUES (0x4259, 'Shanghainese');
INSERT INTO `tbl_language_type` VALUES (0x425a, 'Sindhi');
INSERT INTO `tbl_language_type` VALUES (0x4341, 'Sinhalese');
INSERT INTO `tbl_language_type` VALUES (0x4342, 'Spanish');
INSERT INTO `tbl_language_type` VALUES (0x4344, 'Sudanese');
INSERT INTO `tbl_language_type` VALUES (0x4345, 'Swedish');
INSERT INTO `tbl_language_type` VALUES (0x4346, 'Tagalog');
INSERT INTO `tbl_language_type` VALUES (0x4347, 'Taiwanese');
INSERT INTO `tbl_language_type` VALUES (0x4348, 'Tamil');
INSERT INTO `tbl_language_type` VALUES (0x4349, 'Thai');
INSERT INTO `tbl_language_type` VALUES (0x434a, 'Turkish');
INSERT INTO `tbl_language_type` VALUES (0x434b, 'Ukranian');
INSERT INTO `tbl_language_type` VALUES (0x434c, 'Uzbek');
INSERT INTO `tbl_language_type` VALUES (0x434d, 'Vietnamese');
INSERT INTO `tbl_language_type` VALUES (0x434e, 'Yoruba');
INSERT INTO `tbl_language_type` VALUES (0x434f, 'Zhuang');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_major_type`
--

DROP TABLE IF EXISTS `tbl_major_type`;
CREATE TABLE `tbl_major_type` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `name` varchar(40) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tbl_major_type`
--

INSERT INTO `tbl_major_type` VALUES (1, 0x41637475617269616c20536369656e63657320);
INSERT INTO `tbl_major_type` VALUES (2, 0x4164756c74202620436f6e74696e75696e6720456475636174696f6e);
INSERT INTO `tbl_major_type` VALUES (3, 0x4165726f7370616365204165726f6e6175746963616c);
INSERT INTO `tbl_major_type` VALUES (4, 0x4166726963616e2053747564696573);
INSERT INTO `tbl_major_type` VALUES (5, 0x4166726f2d416d65726963616e2028426c61636b292053747564696573);
INSERT INTO `tbl_major_type` VALUES (6, 0x4167726963756c747572616c20427573696e6573732026204d616e6167656d656e74);
INSERT INTO `tbl_major_type` VALUES (7, 0x4167726963756c747572616c20456e67696e656572696e67);
INSERT INTO `tbl_major_type` VALUES (8, 0x4167726963756c747572616c204d656368616e697a6174696f6e);
INSERT INTO `tbl_major_type` VALUES (9, 0x4167726963756c747572616c20536369656e636573);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_map_profile_student`
--

DROP TABLE IF EXISTS `tbl_map_profile_student`;
CREATE TABLE `tbl_map_profile_student` (
  `user_id` int(10) unsigned NOT NULL,
  `purchased_profile_id` int(10) unsigned NOT NULL,
  `l1_purchased` tinyint(1) NOT NULL default '0',
  `l2_purchased` tinyint(1) NOT NULL default '0',
  `l3_purchased` tinyint(1) NOT NULL default '0',
  `isOwner` tinyint(1) NOT NULL default '0',
  `l1_purchase_time` datetime default NULL,
  `l2_purchase_time` datetime default NULL,
  `l3_purchase_time` datetime default NULL,
  PRIMARY KEY  (`user_id`,`purchased_profile_id`),
  KEY `tbl_map_profile_student_ibfk_2` (`purchased_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_map_profile_student`
--

INSERT INTO `tbl_map_profile_student` VALUES (29, 29, 0, 0, 0, 1, NULL, NULL, NULL);
INSERT INTO `tbl_map_profile_student` VALUES (33, 33, 0, 0, 0, 1, NULL, NULL, NULL);
INSERT INTO `tbl_map_profile_student` VALUES (34, 29, 1, 1, 1, 0, '2011-11-03 00:20:15', '2011-11-03 00:20:15', '2011-11-03 00:20:15');
INSERT INTO `tbl_map_profile_student` VALUES (34, 34, 0, 0, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_music_profile`
--

DROP TABLE IF EXISTS `tbl_music_profile`;
CREATE TABLE `tbl_music_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `music` tinyint(3) NOT NULL,
  `level` tinyint(2) NOT NULL,
  `year_begin` tinyint(2) NOT NULL,
  `year_end` tinyint(2) NOT NULL,
  `school_orchband` tinyint(2) default NULL,
  `school_leader` tinyint(2) default NULL,
  `ext_orchband` tinyint(2) default NULL,
  `ext_leader` tinyint(2) default NULL,
  `comments` text collate utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(10) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_music_profile`
--

INSERT INTO `tbl_music_profile` VALUES (2, 29, 7, 3, 9, 13, NULL, NULL, NULL, NULL, '', '2011-10-24 16:42:23', 29, '2011-10-24 16:42:23', 29);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_other_profile`
--

DROP TABLE IF EXISTS `tbl_other_profile`;
CREATE TABLE `tbl_other_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(2) collate utf8_bin default NULL,
  `year_begin` tinyint(2) unsigned default NULL,
  `year_end` tinyint(2) unsigned default NULL,
  `comments` text collate utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_other_profile`
--

INSERT INTO `tbl_other_profile` VALUES (2, 28, 0x6173, 4, 6, 0x6173646664617366, '2011-10-25 10:20:45', 28, '2011-10-25 10:20:45', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_other_school_admit_profile`
--

DROP TABLE IF EXISTS `tbl_other_school_admit_profile`;
CREATE TABLE `tbl_other_school_admit_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `otherschool_id` mediumint(6) default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `tbl_other_school_admit_profile`
--

INSERT INTO `tbl_other_school_admit_profile` VALUES (6, 28, 1805, '2011-10-25 11:08:58', 28, '2011-10-25 11:08:58', 28);
INSERT INTO `tbl_other_school_admit_profile` VALUES (8, 28, 779, '2011-10-25 11:11:44', 28, '2011-10-25 11:11:44', 28);
INSERT INTO `tbl_other_school_admit_profile` VALUES (9, 28, 1536, '2011-10-25 11:20:12', 28, '2011-10-25 11:20:12', 28);
INSERT INTO `tbl_other_school_admit_profile` VALUES (10, 28, 2504, '2011-10-25 11:23:25', 28, '2011-10-25 11:23:25', 28);
INSERT INTO `tbl_other_school_admit_profile` VALUES (11, 28, 1540, '2011-10-25 11:24:19', 28, '2011-10-25 11:24:19', 28);
INSERT INTO `tbl_other_school_admit_profile` VALUES (12, 29, 2096, '2011-10-31 16:02:06', 29, '2011-10-31 16:02:06', 29);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_personal_profile`
--

DROP TABLE IF EXISTS `tbl_personal_profile`;
CREATE TABLE `tbl_personal_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `date_of_birth` date default NULL,
  `citizenship` char(3) default NULL,
  `ethnic_origin` tinyint(3) default NULL,
  `legacy_direct` enum('','N','M','F','B') default NULL,
  `legacy_indirect` enum('','N','S','O','B') default NULL,
  `hometown_zipcode` char(5) default NULL,
  `state` tinyint(2) unsigned default NULL,
  `income_bracket` enum('','A','B','C','D','E','F','G','H') default NULL,
  `parental_status` enum('','M','D','N') default NULL,
  `other_schools_admitted` varchar(50) default NULL,
  `religion_id` char(2) default NULL,
  `foreign_languages_spoken` varchar(30) default NULL,
  `current_major` varchar(50) default NULL,
  `hs_grad_year` mediumint(4) unsigned default NULL,
  `skills` varchar(100) default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`user_id`),
  KEY `RELIGION` (`religion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_personal_profile`
--

INSERT INTO `tbl_personal_profile` VALUES (29, '0000-00-00', '1', 7, 'N', 'N', '07645', 13, 'B', 'M', NULL, NULL, NULL, '6', 2009, NULL, '2011-10-24 16:41:24', 29, '2011-10-31 20:24:59', 29);
INSERT INTO `tbl_personal_profile` VALUES (33, '0000-00-00', '1', 10, 'N', 'N', '60450', 29, NULL, NULL, NULL, NULL, NULL, '8', 2010, NULL, '2011-11-03 00:16:53', 33, '2011-11-03 00:17:29', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_race_type`
--

DROP TABLE IF EXISTS `tbl_race_type`;
CREATE TABLE `tbl_race_type` (
  `id` char(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_race_type`
--

INSERT INTO `tbl_race_type` VALUES ('A', 'White');
INSERT INTO `tbl_race_type` VALUES ('B', 'Asian / Asian-American / Pacific-Islander');
INSERT INTO `tbl_race_type` VALUES ('C', 'Black / African-American');
INSERT INTO `tbl_race_type` VALUES ('D', 'Native American');
INSERT INTO `tbl_race_type` VALUES ('E', 'Mexican / Mexican-American');
INSERT INTO `tbl_race_type` VALUES ('F', 'Puerto Rican');
INSERT INTO `tbl_race_type` VALUES ('G', 'Other Hispanic / Latino');
INSERT INTO `tbl_race_type` VALUES ('H', 'Other');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_rating`
--

DROP TABLE IF EXISTS `tbl_rating`;
CREATE TABLE `tbl_rating` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `rating` int(1) unsigned default NULL,
  `comment` varchar(255) character set utf8 collate utf8_bin NOT NULL,
  `create_user_id` int(10) default NULL,
  `create_time` datetime default NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_tbl_rating_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tbl_rating`
--

INSERT INTO `tbl_rating` VALUES (1, 29, 2, 0x62616420636f6d6d656e74, 33, '2011-11-06 17:49:09');
INSERT INTO `tbl_rating` VALUES (2, 29, 5, 0x676f6f6420636f6d6d656e74, 34, '2011-11-06 03:49:09');
INSERT INTO `tbl_rating` VALUES (3, 29, 4, 0x6e65757472616c20636f6d6d656e74, 34, '2011-11-06 18:49:09');
INSERT INTO `tbl_rating` VALUES (4, 33, 3, 0x74657374, 34, '2011-11-06 18:49:09');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_religion_type`
--

DROP TABLE IF EXISTS `tbl_religion_type`;
CREATE TABLE `tbl_religion_type` (
  `id` char(2) NOT NULL,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_religion_type`
--

INSERT INTO `tbl_religion_type` VALUES ('A0', '');
INSERT INTO `tbl_religion_type` VALUES ('A1', 'I prefer not to answer');
INSERT INTO `tbl_religion_type` VALUES ('A8', 'Buddhism');
INSERT INTO `tbl_religion_type` VALUES ('A9', 'Christian Disciples');
INSERT INTO `tbl_religion_type` VALUES ('AK', 'Hinduism');
INSERT INTO `tbl_religion_type` VALUES ('AL', 'Islam/Muslim/ Moslem');
INSERT INTO `tbl_religion_type` VALUES ('AU', 'Roman Catholic');
INSERT INTO `tbl_religion_type` VALUES ('AV', 'Seventh-Day Adventist');
INSERT INTO `tbl_religion_type` VALUES ('AW', 'Sikhism');
INSERT INTO `tbl_religion_type` VALUES ('AX', 'Society of Friends (Quaker)');
INSERT INTO `tbl_religion_type` VALUES ('AY', 'Unitarian Universalist Association');
INSERT INTO `tbl_religion_type` VALUES ('AZ', 'Wesleyan Church');
INSERT INTO `tbl_religion_type` VALUES ('BA', 'United Methodist');
INSERT INTO `tbl_religion_type` VALUES ('BB', 'Worldwide Church of God');
INSERT INTO `tbl_religion_type` VALUES ('BC', 'Other');
INSERT INTO `tbl_religion_type` VALUES ('BD', 'Atheist/Agnostic');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_research_profile`
--

DROP TABLE IF EXISTS `tbl_research_profile`;
CREATE TABLE `tbl_research_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `subject` text collate utf8_bin,
  `field` tinyint(4) default NULL,
  `year_begin` tinyint(4) default NULL,
  `year_end` tinyint(4) default NULL,
  `hours` tinyint(4) default NULL,
  `comments` text collate utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_research_profile`
--

INSERT INTO `tbl_research_profile` VALUES (1, 28, 0x416c7a6865696d657227732044697365617365, 28, 4, 6, 2, '', '2011-10-23 11:24:32', 28, '2011-10-23 11:24:32', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_sat2_profile`
--

DROP TABLE IF EXISTS `tbl_sat2_profile`;
CREATE TABLE `tbl_sat2_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `sat2_id` char(2) NOT NULL,
  `score` smallint(3) unsigned NOT NULL,
  `date_taken` date default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`sat2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_sat2_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_sat2_type`
--

DROP TABLE IF EXISTS `tbl_sat2_type`;
CREATE TABLE `tbl_sat2_type` (
  `id` char(2) NOT NULL,
  `subject` varchar(40) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_sat2_type`
--

INSERT INTO `tbl_sat2_type` VALUES ('CH', 'Chemistry');
INSERT INTO `tbl_sat2_type` VALUES ('CL', 'Chinese with Listening');
INSERT INTO `tbl_sat2_type` VALUES ('EB', 'Ecological Biology');
INSERT INTO `tbl_sat2_type` VALUES ('FL', 'French with Listening');
INSERT INTO `tbl_sat2_type` VALUES ('FR', 'French');
INSERT INTO `tbl_sat2_type` VALUES ('GL', 'German with Listening');
INSERT INTO `tbl_sat2_type` VALUES ('GM', 'German');
INSERT INTO `tbl_sat2_type` VALUES ('IT', 'Italian');
INSERT INTO `tbl_sat2_type` VALUES ('JL', 'Japanese with Listening');
INSERT INTO `tbl_sat2_type` VALUES ('KL', 'Korean with Listening');
INSERT INTO `tbl_sat2_type` VALUES ('LR', 'Literature');
INSERT INTO `tbl_sat2_type` VALUES ('LT', 'Latin');
INSERT INTO `tbl_sat2_type` VALUES ('M1', 'Mathematics Level 1');
INSERT INTO `tbl_sat2_type` VALUES ('M2', 'Mathematics Level 2');
INSERT INTO `tbl_sat2_type` VALUES ('MB', 'Molecular Biology');
INSERT INTO `tbl_sat2_type` VALUES ('MH', 'Modern Hebrew');
INSERT INTO `tbl_sat2_type` VALUES ('PH', 'Physics');
INSERT INTO `tbl_sat2_type` VALUES ('SL', 'Spanish with Listening');
INSERT INTO `tbl_sat2_type` VALUES ('SP', 'Spanish');
INSERT INTO `tbl_sat2_type` VALUES ('UH', 'U.S. History');
INSERT INTO `tbl_sat2_type` VALUES ('WH', 'World History');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_score_profile`
--

DROP TABLE IF EXISTS `tbl_score_profile`;
CREATE TABLE `tbl_score_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `SAT_Math` smallint(3) unsigned default NULL,
  `SAT_Critical_Read` smallint(3) unsigned default NULL,
  `SAT_Writing` smallint(3) unsigned default NULL,
  `SAT_Essay` smallint(3) unsigned default NULL,
  `PSAT_Math` smallint(3) unsigned default NULL,
  `PSAT_Verbal` smallint(3) unsigned default NULL,
  `PSAT_Writing` smallint(3) unsigned default NULL,
  `ACT_English` smallint(3) unsigned default NULL,
  `ACT_Math` smallint(3) unsigned default NULL,
  `ACT_Reading` smallint(3) unsigned default NULL,
  `ACT_Science` smallint(3) unsigned default NULL,
  `ACT_Writing` smallint(3) unsigned default NULL,
  `ACT_Composite` smallint(3) unsigned default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_score_profile`
--

INSERT INTO `tbl_score_profile` VALUES (29, 290, 280, 300, 2, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, '2011-10-24 16:42:04', 29, '2011-10-24 19:20:56', 29);
INSERT INTO `tbl_score_profile` VALUES (33, 780, 500, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2011-11-03 00:17:54', 33, '2011-11-03 00:17:54', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_sport_profile`
--

DROP TABLE IF EXISTS `tbl_sport_profile`;
CREATE TABLE `tbl_sport_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `sport_id` char(3) NOT NULL,
  `year_begin` tinyint(1) unsigned NOT NULL,
  `year_end` tinyint(1) unsigned NOT NULL,
  `level` tinyint(1) default NULL,
  `leadership` tinyint(2) default NULL,
  `indiv_rank` tinyint(2) default NULL,
  `team_rank` tinyint(2) default NULL,
  `other_recog` tinyint(2) unsigned default NULL,
  `comments` text,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`sport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_sport_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_sport_type`
--

DROP TABLE IF EXISTS `tbl_sport_type`;
CREATE TABLE `tbl_sport_type` (
  `id` char(3) NOT NULL,
  `name` varchar(25) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_sport_type`
--

INSERT INTO `tbl_sport_type` VALUES ('ARC', 'Archery');
INSERT INTO `tbl_sport_type` VALUES ('BAD', 'Badminton');
INSERT INTO `tbl_sport_type` VALUES ('BAS', 'Baseball');
INSERT INTO `tbl_sport_type` VALUES ('BOW', 'Bowling');
INSERT INTO `tbl_sport_type` VALUES ('BOX', 'Boxing');
INSERT INTO `tbl_sport_type` VALUES ('BSK', 'Basketball');
INSERT INTO `tbl_sport_type` VALUES ('CHE', 'Cheerleading');
INSERT INTO `tbl_sport_type` VALUES ('DIV', 'Diving');
INSERT INTO `tbl_sport_type` VALUES ('FBL', 'Football');
INSERT INTO `tbl_sport_type` VALUES ('FEN', 'Fencing');
INSERT INTO `tbl_sport_type` VALUES ('FHC', 'Field Hockey');
INSERT INTO `tbl_sport_type` VALUES ('GLF', 'Golf');
INSERT INTO `tbl_sport_type` VALUES ('GYM', 'Gymnastics');
INSERT INTO `tbl_sport_type` VALUES ('HOR', 'Horseback Riding');
INSERT INTO `tbl_sport_type` VALUES ('IHC', 'Ice Hockey');
INSERT INTO `tbl_sport_type` VALUES ('LAX', 'Lacrosse');
INSERT INTO `tbl_sport_type` VALUES ('MAR', 'Martial Arts');
INSERT INTO `tbl_sport_type` VALUES ('OTH', 'Other');
INSERT INTO `tbl_sport_type` VALUES ('RAC', 'Racquetball');
INSERT INTO `tbl_sport_type` VALUES ('RIF', 'Riflery');
INSERT INTO `tbl_sport_type` VALUES ('ROD', 'Rodeo');
INSERT INTO `tbl_sport_type` VALUES ('ROW', 'Rowing (crew)');
INSERT INTO `tbl_sport_type` VALUES ('RUG', 'Rugby');
INSERT INTO `tbl_sport_type` VALUES ('SAI', 'Sailing');
INSERT INTO `tbl_sport_type` VALUES ('SBL', 'Softball');
INSERT INTO `tbl_sport_type` VALUES ('SKI', 'Skiing');
INSERT INTO `tbl_sport_type` VALUES ('SOC', 'Soccer');
INSERT INTO `tbl_sport_type` VALUES ('SQH', 'Squash');
INSERT INTO `tbl_sport_type` VALUES ('SWM', 'Swimming');
INSERT INTO `tbl_sport_type` VALUES ('TEN', 'Tennis');
INSERT INTO `tbl_sport_type` VALUES ('TNF', 'Track and Field');
INSERT INTO `tbl_sport_type` VALUES ('TTN', 'Table Tennis');
INSERT INTO `tbl_sport_type` VALUES ('VBL', 'Volleyball');
INSERT INTO `tbl_sport_type` VALUES ('WPL', 'Water Polo');
INSERT INTO `tbl_sport_type` VALUES ('WRE', 'Wrestling');
INSERT INTO `tbl_sport_type` VALUES ('XCO', 'Cross-Country');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_states`
--

DROP TABLE IF EXISTS `tbl_states`;
CREATE TABLE `tbl_states` (
  `id` int(2) unsigned NOT NULL auto_increment,
  `name` varchar(20) collate utf8_bin NOT NULL,
  `abbr` tinytext collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Дамп данных таблицы `tbl_states`
--

INSERT INTO `tbl_states` VALUES (1, 0x416c6162616d61, 0x414c);
INSERT INTO `tbl_states` VALUES (2, 0x416c61736b61, 0x414b);
INSERT INTO `tbl_states` VALUES (3, 0x4172697a6f6e61, 0x415a);
INSERT INTO `tbl_states` VALUES (4, 0x41726b616e736173, 0x4152);
INSERT INTO `tbl_states` VALUES (5, 0x43616c69666f726e6961, 0x4341);
INSERT INTO `tbl_states` VALUES (6, 0x436f6c6f7261646f, 0x434f);
INSERT INTO `tbl_states` VALUES (7, 0x436f6e6e65637469637574, 0x4354);
INSERT INTO `tbl_states` VALUES (8, 0x44656c6177617265, 0x4445);
INSERT INTO `tbl_states` VALUES (9, 0x4469737472696374206f6620436f6c756d626961, 0x4443);
INSERT INTO `tbl_states` VALUES (10, 0x466c6f72696461, 0x464c);
INSERT INTO `tbl_states` VALUES (11, 0x47656f72676961, 0x4741);
INSERT INTO `tbl_states` VALUES (12, 0x4775616d, 0x4755);
INSERT INTO `tbl_states` VALUES (13, 0x486177616969, 0x4849);
INSERT INTO `tbl_states` VALUES (14, 0x496461686f, 0x4944);
INSERT INTO `tbl_states` VALUES (15, 0x496c6c696e6f6973, 0x494c);
INSERT INTO `tbl_states` VALUES (16, 0x496e6469616e61, 0x494e);
INSERT INTO `tbl_states` VALUES (17, 0x496f7761, 0x4941);
INSERT INTO `tbl_states` VALUES (18, 0x4b616e736173, 0x4b53);
INSERT INTO `tbl_states` VALUES (19, 0x4b656e7475636b79, 0x4b59);
INSERT INTO `tbl_states` VALUES (20, 0x4c6f75697369616e61, 0x4c41);
INSERT INTO `tbl_states` VALUES (21, 0x4d61696e65, 0x4d45);
INSERT INTO `tbl_states` VALUES (22, 0x4d6172796c616e64, 0x4d44);
INSERT INTO `tbl_states` VALUES (23, 0x4d617373616368757365747473, 0x4d41);
INSERT INTO `tbl_states` VALUES (24, 0x4d6963686967616e, 0x4d49);
INSERT INTO `tbl_states` VALUES (25, 0x4d696e6e65736f7461, 0x4d4e);
INSERT INTO `tbl_states` VALUES (26, 0x4d69737369737369707069, 0x4d53);
INSERT INTO `tbl_states` VALUES (27, 0x4d6973736f757269, 0x4d4f);
INSERT INTO `tbl_states` VALUES (28, 0x4d6f6e74616e61, 0x4d54);
INSERT INTO `tbl_states` VALUES (29, 0x4e65627261736b61, 0x4e45);
INSERT INTO `tbl_states` VALUES (30, 0x4e6576616461, 0x4e56);
INSERT INTO `tbl_states` VALUES (31, 0x4e65772048616d707368697265, 0x4e48);
INSERT INTO `tbl_states` VALUES (32, 0x4e6577204a6572736579, 0x4e4a);
INSERT INTO `tbl_states` VALUES (33, 0x4e6577204d657869636f, 0x4e4d);
INSERT INTO `tbl_states` VALUES (34, 0x4e657720596f726b, 0x4e59);
INSERT INTO `tbl_states` VALUES (35, 0x4e6f727468204361726f6c696e61, 0x4e43);
INSERT INTO `tbl_states` VALUES (36, 0x4e6f7274682044616b6f7461, 0x4e44);
INSERT INTO `tbl_states` VALUES (37, 0x4f68696f, 0x4f48);
INSERT INTO `tbl_states` VALUES (38, 0x4f6b6c61686f6d61, 0x4f4b);
INSERT INTO `tbl_states` VALUES (39, 0x4f7265676f6e, 0x4f52);
INSERT INTO `tbl_states` VALUES (40, 0x50656e6e73796c76616e6961, 0x5041);
INSERT INTO `tbl_states` VALUES (41, 0x50756572746f205269636f, 0x5052);
INSERT INTO `tbl_states` VALUES (42, 0x52686f64652049736c616e64, 0x5249);
INSERT INTO `tbl_states` VALUES (43, 0x536f757468204361726f6c696e61, 0x5343);
INSERT INTO `tbl_states` VALUES (44, 0x536f7574682044616b6f7461, 0x5344);
INSERT INTO `tbl_states` VALUES (45, 0x54656e6e6573736565, 0x544e);
INSERT INTO `tbl_states` VALUES (46, 0x5465786173, 0x5458);
INSERT INTO `tbl_states` VALUES (47, 0x55746168, 0x5554);
INSERT INTO `tbl_states` VALUES (48, 0x5665726d6f6e74, 0x5654);
INSERT INTO `tbl_states` VALUES (49, 0x56697267696e2049736c616e6473, 0x5649);
INSERT INTO `tbl_states` VALUES (50, 0x56697267696e6961, 0x5641);
INSERT INTO `tbl_states` VALUES (51, 0x57617368696e67746f6e, 0x5741);
INSERT INTO `tbl_states` VALUES (52, 0x576573742056697267696e6961, 0x5756);
INSERT INTO `tbl_states` VALUES (53, 0x576973636f6e73696e, 0x5749);
INSERT INTO `tbl_states` VALUES (54, 0x57796f6d696e67, 0x5759);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_subject_profile`
--

DROP TABLE IF EXISTS `tbl_subject_profile`;
CREATE TABLE `tbl_subject_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `year_taken` tinyint(1) unsigned default NULL COMMENT '1=Freshman,2=Soph,3=Junior,4=Senior,5=5th year after senior',
  `subject_id` tinyint(2) unsigned default NULL,
  `honors_or_AP` tinyint(1) default NULL,
  `num_months` tinyint(2) unsigned default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `USER` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `tbl_subject_profile`
--

INSERT INTO `tbl_subject_profile` VALUES (9, 29, 4, 6, 1, 5, '2011-10-28 21:30:26', 29, '2011-10-28 21:30:26', 29);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_subject_type`
--

DROP TABLE IF EXISTS `tbl_subject_type`;
CREATE TABLE `tbl_subject_type` (
  `id` tinyint(2) unsigned NOT NULL auto_increment,
  `name` varchar(30) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=55 ;

--
-- Дамп данных таблицы `tbl_subject_type`
--

INSERT INTO `tbl_subject_type` VALUES (1, 0x416c67656272612049);
INSERT INTO `tbl_subject_type` VALUES (2, 0x416c6765627261204949);
INSERT INTO `tbl_subject_type` VALUES (3, 0x416e61746f6d79);
INSERT INTO `tbl_subject_type` VALUES (4, 0x41727420486973746f7279);
INSERT INTO `tbl_subject_type` VALUES (5, 0x417374726f6e6f6d79);
INSERT INTO `tbl_subject_type` VALUES (6, 0x4175746f6d6f74697665);
INSERT INTO `tbl_subject_type` VALUES (7, 0x42696f6c6f6779);
INSERT INTO `tbl_subject_type` VALUES (8, 0x427573696e657373);
INSERT INTO `tbl_subject_type` VALUES (9, 0x43616c63756c75732032);
INSERT INTO `tbl_subject_type` VALUES (10, 0x43616c63756c75732049);
INSERT INTO `tbl_subject_type` VALUES (11, 0x4368656d6973747279);
INSERT INTO `tbl_subject_type` VALUES (12, 0x436976696373);
INSERT INTO `tbl_subject_type` VALUES (13, 0x436f6d707574657220536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (14, 0x436f6f6b696e67);
INSERT INTO `tbl_subject_type` VALUES (15, 0x44726177696e67);
INSERT INTO `tbl_subject_type` VALUES (16, 0x456172746820536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (17, 0x45636f6e6f6d696373);
INSERT INTO `tbl_subject_type` VALUES (18, 0x456e676c697368);
INSERT INTO `tbl_subject_type` VALUES (19, 0x456e7669726f6e6d656e74616c20536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (20, 0x4574686e69632053747564696573);
INSERT INTO `tbl_subject_type` VALUES (21, 0x46696c6d20417274);
INSERT INTO `tbl_subject_type` VALUES (22, 0x466f6f6420536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (23, 0x4672656e6368);
INSERT INTO `tbl_subject_type` VALUES (24, 0x47656e6572616c20417274);
INSERT INTO `tbl_subject_type` VALUES (25, 0x47656e6572616c20536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (26, 0x47656f677261706879);
INSERT INTO `tbl_subject_type` VALUES (27, 0x47656f6d65747279);
INSERT INTO `tbl_subject_type` VALUES (28, 0x4765726d616e);
INSERT INTO `tbl_subject_type` VALUES (29, 0x4772616d6d6172);
INSERT INTO `tbl_subject_type` VALUES (30, 0x4865616c7468);
INSERT INTO `tbl_subject_type` VALUES (31, 0x486f6d652045636f6e6f6d696373);
INSERT INTO `tbl_subject_type` VALUES (32, 0x4974616c69616e);
INSERT INTO `tbl_subject_type` VALUES (33, 0x4a6170616e657365);
INSERT INTO `tbl_subject_type` VALUES (34, 0x4c6174696e);
INSERT INTO `tbl_subject_type` VALUES (35, 0x4c69666520536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (36, 0x4c697465726174757265);
INSERT INTO `tbl_subject_type` VALUES (37, 0x4d616e646172696e);
INSERT INTO `tbl_subject_type` VALUES (38, 0x4d75736963);
INSERT INTO `tbl_subject_type` VALUES (39, 0x50686f746f677261706879);
INSERT INTO `tbl_subject_type` VALUES (40, 0x506879736963616c20536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (41, 0x50687973696373);
INSERT INTO `tbl_subject_type` VALUES (42, 0x5072652d416c6765627261);
INSERT INTO `tbl_subject_type` VALUES (43, 0x50737963686f6c6f6779);
INSERT INTO `tbl_subject_type` VALUES (44, 0x5275737369616e);
INSERT INTO `tbl_subject_type` VALUES (45, 0x536f6369616c2053747564696573);
INSERT INTO `tbl_subject_type` VALUES (46, 0x536f63696f6c6f6779);
INSERT INTO `tbl_subject_type` VALUES (47, 0x537061636520536369656e6365);
INSERT INTO `tbl_subject_type` VALUES (48, 0x5370616e697368);
INSERT INTO `tbl_subject_type` VALUES (49, 0x547269676f6e6f6d65747279);
INSERT INTO `tbl_subject_type` VALUES (50, 0x555320476f7665726e6d656e74);
INSERT INTO `tbl_subject_type` VALUES (51, 0x555320486973746f7279);
INSERT INTO `tbl_subject_type` VALUES (52, 0x566f636162756c617279);
INSERT INTO `tbl_subject_type` VALUES (53, 0x576f726c6420486973746f7279);
INSERT INTO `tbl_subject_type` VALUES (54, 0x57726974696e67);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_summer_profile`
--

DROP TABLE IF EXISTS `tbl_summer_profile`;
CREATE TABLE `tbl_summer_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `name` text collate utf8_bin,
  `summer_id` tinyint(3) unsigned default NULL,
  `summer_date` tinyint(3) default NULL,
  `comments` text collate utf8_bin,
  `create_time` datetime NOT NULL,
  `create_user_id` int(10) unsigned NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_summer_profile`
--

INSERT INTO `tbl_summer_profile` VALUES (3, 28, '', 7, 5, '', '2011-10-25 01:08:57', 28, '2011-10-25 01:08:57', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_university_name`
--

DROP TABLE IF EXISTS `tbl_university_name`;
CREATE TABLE `tbl_university_name` (
  `id` smallint(10) unsigned NOT NULL,
  `name` varchar(30) default NULL,
  `state` char(2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_university_name`
--

INSERT INTO `tbl_university_name` VALUES (1, 'Abilene Christian University', 'AL');
INSERT INTO `tbl_university_name` VALUES (2, 'Abraham Baldwin Agricultural C', 'AL');
INSERT INTO `tbl_university_name` VALUES (3, 'Academy College', 'AL');
INSERT INTO `tbl_university_name` VALUES (4, 'Academy of Art University', 'AL');
INSERT INTO `tbl_university_name` VALUES (5, 'Acupuncture and Massage Colleg', 'AL');
INSERT INTO `tbl_university_name` VALUES (6, 'Adams State College', 'AL');
INSERT INTO `tbl_university_name` VALUES (7, 'Adelphi University', 'AL');
INSERT INTO `tbl_university_name` VALUES (8, 'Adrian College', 'AL');
INSERT INTO `tbl_university_name` VALUES (9, 'Agnes Scott College', 'AL');
INSERT INTO `tbl_university_name` VALUES (10, 'AI Miami International Univers', 'AL');
INSERT INTO `tbl_university_name` VALUES (11, 'AIB College of Business', 'AL');
INSERT INTO `tbl_university_name` VALUES (12, 'Alabama A & M University', 'AL');
INSERT INTO `tbl_university_name` VALUES (13, 'Alabama State University', 'AL');
INSERT INTO `tbl_university_name` VALUES (14, 'Alaska Pacific University', 'AL');
INSERT INTO `tbl_university_name` VALUES (15, 'Albany College of Pharmacy and', 'AL');
INSERT INTO `tbl_university_name` VALUES (16, 'Albany State University', 'AL');
INSERT INTO `tbl_university_name` VALUES (17, 'Albertus Magnus College', 'AL');
INSERT INTO `tbl_university_name` VALUES (18, 'Albion College', 'AK');
INSERT INTO `tbl_university_name` VALUES (19, 'Albright College', 'AK');
INSERT INTO `tbl_university_name` VALUES (20, 'Alcorn State University', 'AK');
INSERT INTO `tbl_university_name` VALUES (21, 'Alderson Broaddus College', 'AZ');
INSERT INTO `tbl_university_name` VALUES (22, 'Alfred University', 'AZ');
INSERT INTO `tbl_university_name` VALUES (23, 'Alice Lloyd College', 'AZ');
INSERT INTO `tbl_university_name` VALUES (24, 'Allegheny College', 'AZ');
INSERT INTO `tbl_university_name` VALUES (25, 'Allegheny Wesleyan College', 'AZ');
INSERT INTO `tbl_university_name` VALUES (26, 'Allen College', 'AZ');
INSERT INTO `tbl_university_name` VALUES (27, 'Allen University', 'AZ');
INSERT INTO `tbl_university_name` VALUES (28, 'Alliant International Universi', 'AZ');
INSERT INTO `tbl_university_name` VALUES (29, 'Alma College', 'AZ');
INSERT INTO `tbl_university_name` VALUES (30, 'Alvernia University', 'AZ');
INSERT INTO `tbl_university_name` VALUES (2031, 'Universidad Adventista de las ', 'CA');
INSERT INTO `tbl_university_name` VALUES (2032, 'Universidad Central Del Caribe', 'CA');
INSERT INTO `tbl_university_name` VALUES (2033, 'Universidad Del Este', 'CA');
INSERT INTO `tbl_university_name` VALUES (2034, 'Universidad Del Turabo', 'CA');
INSERT INTO `tbl_university_name` VALUES (2035, 'Universidad Metropolitana', 'CA');
INSERT INTO `tbl_university_name` VALUES (2036, 'Universidad Politecnica de Pue', 'CA');
INSERT INTO `tbl_university_name` VALUES (2037, 'Universidad Politecnica de Pue', 'CA');
INSERT INTO `tbl_university_name` VALUES (2038, 'Universidad Teologica del Cari', 'CA');
INSERT INTO `tbl_university_name` VALUES (2039, 'University at Buffalo', 'CA');
INSERT INTO `tbl_university_name` VALUES (2040, 'University of Advancing Techno', 'CA');
INSERT INTO `tbl_university_name` VALUES (2041, 'University of Akron Main Campu', 'CA');
INSERT INTO `tbl_university_name` VALUES (2042, 'University of Alabama at Birmi', 'CA');
INSERT INTO `tbl_university_name` VALUES (2043, 'University of Alabama in Hunts', 'CA');
INSERT INTO `tbl_university_name` VALUES (2044, 'University of Alaska Anchorage', 'CA');
INSERT INTO `tbl_university_name` VALUES (2045, 'University of Alaska Fairbanks', 'CA');
INSERT INTO `tbl_university_name` VALUES (2046, 'University of Alaska Southeast', 'CA');
INSERT INTO `tbl_university_name` VALUES (2047, 'University of Antelope Valley', 'CA');
INSERT INTO `tbl_university_name` VALUES (2048, 'University of Arizona', 'CA');
INSERT INTO `tbl_university_name` VALUES (2049, 'University of Arkansas', 'CA');
INSERT INTO `tbl_university_name` VALUES (2050, 'University of Arkansas at Litt', 'CA');
INSERT INTO `tbl_university_name` VALUES (2051, 'University of Arkansas at Mont', 'CA');
INSERT INTO `tbl_university_name` VALUES (2052, 'University of Arkansas at Pine', 'CA');
INSERT INTO `tbl_university_name` VALUES (2053, 'University of Arkansas for Med', 'CO');
INSERT INTO `tbl_university_name` VALUES (2054, 'University of Arkansas-Fort Sm', 'CO');
INSERT INTO `tbl_university_name` VALUES (2055, 'University of Baltimore', 'CO');
INSERT INTO `tbl_university_name` VALUES (2056, 'University of Bridgeport', 'CO');
INSERT INTO `tbl_university_name` VALUES (2057, 'University of California-Berke', 'CT');
INSERT INTO `tbl_university_name` VALUES (2058, 'University of California-Davis', 'CT');
INSERT INTO `tbl_university_name` VALUES (2059, 'University of California-Irvin', 'CT');
INSERT INTO `tbl_university_name` VALUES (2060, 'University of California-Los A', 'CT');
INSERT INTO `tbl_university_name` VALUES (2061, 'University of California-Merce', 'DE');
INSERT INTO `tbl_university_name` VALUES (2062, 'University of California-River', 'DE');
INSERT INTO `tbl_university_name` VALUES (2063, 'University of California-San D', 'DE');
INSERT INTO `tbl_university_name` VALUES (2064, 'University of California-Santa', 'DC');
INSERT INTO `tbl_university_name` VALUES (2065, 'University of California-Santa', 'DC');
INSERT INTO `tbl_university_name` VALUES (2066, 'University of Central Arkansas', 'FL');
INSERT INTO `tbl_university_name` VALUES (2067, 'University of Central Florida', 'FL');
INSERT INTO `tbl_university_name` VALUES (2068, 'University of Central Missouri', 'FL');
INSERT INTO `tbl_university_name` VALUES (2069, 'University of Central Oklahoma', 'FL');
INSERT INTO `tbl_university_name` VALUES (2070, 'University of Charleston', 'FL');
INSERT INTO `tbl_university_name` VALUES (2071, 'University of Chicago', 'FL');
INSERT INTO `tbl_university_name` VALUES (2072, 'University of Cincinnati-Clerm', 'FL');
INSERT INTO `tbl_university_name` VALUES (2073, 'University of Cincinnati-Main ', 'FL');
INSERT INTO `tbl_university_name` VALUES (2074, 'University of Cincinnati-Raymo', 'FL');
INSERT INTO `tbl_university_name` VALUES (2075, 'University of Colorado at Boul', 'FL');
INSERT INTO `tbl_university_name` VALUES (2076, 'University of Colorado at Colo', 'FL');
INSERT INTO `tbl_university_name` VALUES (2077, 'University of Colorado Denver', 'FL');
INSERT INTO `tbl_university_name` VALUES (2078, 'University of Connecticut', 'FL');
INSERT INTO `tbl_university_name` VALUES (2079, 'University of Connecticut-Aver', 'FL');
INSERT INTO `tbl_university_name` VALUES (2080, 'University of Connecticut-Stam', 'GA');
INSERT INTO `tbl_university_name` VALUES (2081, 'University of Connecticut-Tri-', 'GA');
INSERT INTO `tbl_university_name` VALUES (2082, 'University of Dallas', 'GA');
INSERT INTO `tbl_university_name` VALUES (2083, 'University of Dayton', 'GA');
INSERT INTO `tbl_university_name` VALUES (2084, 'University of Delaware', 'GA');
INSERT INTO `tbl_university_name` VALUES (2085, 'University of Denver', 'GA');
INSERT INTO `tbl_university_name` VALUES (2086, 'University of Detroit Mercy', 'GA');
INSERT INTO `tbl_university_name` VALUES (2087, 'University of Dubuque', 'GA');
INSERT INTO `tbl_university_name` VALUES (2088, 'University of Evansville', 'GA');
INSERT INTO `tbl_university_name` VALUES (2089, 'University of Florida', 'GA');
INSERT INTO `tbl_university_name` VALUES (2090, 'University of Georgia', 'GA');
INSERT INTO `tbl_university_name` VALUES (2091, 'University of Great Falls', 'GA');
INSERT INTO `tbl_university_name` VALUES (2092, 'University of Guam', 'GA');
INSERT INTO `tbl_university_name` VALUES (2093, 'University of Hartford', 'GA');
INSERT INTO `tbl_university_name` VALUES (2094, 'University of Hawaii at Hilo', 'GA');
INSERT INTO `tbl_university_name` VALUES (2095, 'University of Hawaii at Manoa', 'HI');
INSERT INTO `tbl_university_name` VALUES (2096, 'University of Hawaii Maui Coll', 'HI');
INSERT INTO `tbl_university_name` VALUES (2097, 'University of Hawaii-West Oahu', 'ID');
INSERT INTO `tbl_university_name` VALUES (2098, 'University of Houston', 'ID');
INSERT INTO `tbl_university_name` VALUES (2099, 'University of Houston-Clear La', 'IL');
INSERT INTO `tbl_university_name` VALUES (2100, 'University of Houston-Downtown', 'IL');
INSERT INTO `tbl_university_name` VALUES (2201, 'University of Phoenix-Des Moin', 'MI');
INSERT INTO `tbl_university_name` VALUES (2202, 'University of Phoenix-Eastern ', 'MI');
INSERT INTO `tbl_university_name` VALUES (2203, 'University of Phoenix-Fairfiel', 'MI');
INSERT INTO `tbl_university_name` VALUES (2204, 'University of Phoenix-Harrisbu', 'MI');
INSERT INTO `tbl_university_name` VALUES (2205, 'University of Phoenix-Hawaii C', 'MI');
INSERT INTO `tbl_university_name` VALUES (2206, 'University of Phoenix-Houston ', 'MI');
INSERT INTO `tbl_university_name` VALUES (2207, 'University of Phoenix-Idaho Ca', 'MI');
INSERT INTO `tbl_university_name` VALUES (2208, 'University of Phoenix-Indianap', 'MN');
INSERT INTO `tbl_university_name` VALUES (2209, 'University of Phoenix-Jersey C', 'MN');
INSERT INTO `tbl_university_name` VALUES (2210, 'University of Phoenix-Kansas C', 'MN');
INSERT INTO `tbl_university_name` VALUES (2211, 'University of Phoenix-Las Vega', 'MN');
INSERT INTO `tbl_university_name` VALUES (2212, 'University of Phoenix-Little R', 'MN');
INSERT INTO `tbl_university_name` VALUES (2213, 'University of Phoenix-Louisian', 'MN');
INSERT INTO `tbl_university_name` VALUES (2214, 'University of Phoenix-Louisvil', 'MN');
INSERT INTO `tbl_university_name` VALUES (2215, 'University of Phoenix-Madison ', 'MN');
INSERT INTO `tbl_university_name` VALUES (2216, 'University of Phoenix-Maryland', 'MN');
INSERT INTO `tbl_university_name` VALUES (2217, 'University of Phoenix-Memphis ', 'MN');
INSERT INTO `tbl_university_name` VALUES (2218, 'University of Phoenix-Metro De', 'MN');
INSERT INTO `tbl_university_name` VALUES (2219, 'University of Phoenix-Milwauke', 'MN');
INSERT INTO `tbl_university_name` VALUES (2220, 'University of Phoenix-Minneapo', 'MN');
INSERT INTO `tbl_university_name` VALUES (2221, 'University of Phoenix-Nashvill', 'MN');
INSERT INTO `tbl_university_name` VALUES (2222, 'University of Phoenix-New Mexi', 'MS');
INSERT INTO `tbl_university_name` VALUES (2223, 'University of Phoenix-North Fl', 'MS');
INSERT INTO `tbl_university_name` VALUES (2224, 'University of Phoenix-Northern', 'MS');
INSERT INTO `tbl_university_name` VALUES (2225, 'University of Phoenix-Northern', 'MO');
INSERT INTO `tbl_university_name` VALUES (2226, 'University of Phoenix-Northwes', 'MO');
INSERT INTO `tbl_university_name` VALUES (2227, 'University of Phoenix-Northwes', 'MO');
INSERT INTO `tbl_university_name` VALUES (2228, 'University of Phoenix-Oklahoma', 'MO');
INSERT INTO `tbl_university_name` VALUES (2229, 'University of Phoenix-Omaha Ca', 'MO');
INSERT INTO `tbl_university_name` VALUES (2230, 'University of Phoenix-Online C', 'MO');
INSERT INTO `tbl_university_name` VALUES (2231, 'University of Phoenix-Oregon C', 'MO');
INSERT INTO `tbl_university_name` VALUES (2232, 'University of Phoenix-Philadel', 'MO');
INSERT INTO `tbl_university_name` VALUES (2233, 'University of Phoenix-Phoenix-', 'MO');
INSERT INTO `tbl_university_name` VALUES (2234, 'University of Phoenix-Pittsbur', 'MO');
INSERT INTO `tbl_university_name` VALUES (2235, 'University of Phoenix-Puerto R', 'MO');
INSERT INTO `tbl_university_name` VALUES (2236, 'University of Phoenix-Raleigh ', 'MO');
INSERT INTO `tbl_university_name` VALUES (2237, 'University of Phoenix-Richmond', 'MO');
INSERT INTO `tbl_university_name` VALUES (2238, 'University of Phoenix-Sacramen', 'MO');
INSERT INTO `tbl_university_name` VALUES (2239, 'University of Phoenix-San Anto', 'MT');
INSERT INTO `tbl_university_name` VALUES (2240, 'University of Phoenix-San Dieg', 'MT');
INSERT INTO `tbl_university_name` VALUES (2241, 'University of Phoenix-Savannah', 'MT');
INSERT INTO `tbl_university_name` VALUES (2242, 'University of Phoenix-South Fl', 'MT');
INSERT INTO `tbl_university_name` VALUES (2243, 'University of Phoenix-Southern', 'NE');
INSERT INTO `tbl_university_name` VALUES (2244, 'University of Phoenix-Southern', 'NE');
INSERT INTO `tbl_university_name` VALUES (2245, 'University of Phoenix-Southern', 'NE');
INSERT INTO `tbl_university_name` VALUES (2246, 'University of Phoenix-Springfi', 'NE');
INSERT INTO `tbl_university_name` VALUES (2247, 'University of Phoenix-St Louis', 'NE');
INSERT INTO `tbl_university_name` VALUES (2248, 'University of Phoenix-Tulsa Ca', 'NE');
INSERT INTO `tbl_university_name` VALUES (2249, 'University of Phoenix-Utah Cam', 'NE');
INSERT INTO `tbl_university_name` VALUES (2250, 'University of Phoenix-Washingt', 'NE');
INSERT INTO `tbl_university_name` VALUES (2251, 'University of Phoenix-West Flo', 'NV');
INSERT INTO `tbl_university_name` VALUES (2252, 'University of Phoenix-West Mic', 'NV');
INSERT INTO `tbl_university_name` VALUES (2253, 'University of Phoenix-Western ', 'NV');
INSERT INTO `tbl_university_name` VALUES (2254, 'University of Phoenix-Wichita ', 'NH');
INSERT INTO `tbl_university_name` VALUES (2255, 'University of Pittsburgh-Bradf', 'NH');
INSERT INTO `tbl_university_name` VALUES (2256, 'University of Pittsburgh-Green', 'NH');
INSERT INTO `tbl_university_name` VALUES (2257, 'University of Pittsburgh-Johns', 'NH');
INSERT INTO `tbl_university_name` VALUES (2258, 'University of Pittsburgh-Pitts', 'NH');
INSERT INTO `tbl_university_name` VALUES (2259, 'University of Portland', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2260, 'University of Puerto Rico at C', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2261, 'University of Puerto Rico in P', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2262, 'University of Puerto Rico-Agua', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2263, 'University of Puerto Rico-Arec', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2264, 'University of Puerto Rico-Baya', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2265, 'University of Puerto Rico-Caro', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2266, 'University of Puerto Rico-Huma', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2267, 'University of Puerto Rico-Maya', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2268, 'University of Puerto Rico-Medi', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2269, 'University of Puerto Rico-Rio ', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2270, 'University of Puerto Rico-Utua', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2271, 'University of Puget Sound', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2272, 'University of Redlands', 'NJ');
INSERT INTO `tbl_university_name` VALUES (2273, 'University of Rhode Island', 'NM');
INSERT INTO `tbl_university_name` VALUES (2274, 'University of Richmond', 'NM');
INSERT INTO `tbl_university_name` VALUES (2275, 'University of Rio Grande', 'NY');
INSERT INTO `tbl_university_name` VALUES (2276, 'University of Rochester', 'NY');
INSERT INTO `tbl_university_name` VALUES (2277, 'University of Sacred Heart', 'NY');
INSERT INTO `tbl_university_name` VALUES (2278, 'University of Saint Francis-Ft', 'NY');
INSERT INTO `tbl_university_name` VALUES (2279, 'University of Saint Mary', 'NY');
INSERT INTO `tbl_university_name` VALUES (2280, 'University of San Diego', 'NY');
INSERT INTO `tbl_university_name` VALUES (2281, 'University of San Francisco', 'NY');
INSERT INTO `tbl_university_name` VALUES (2282, 'University of Science and Arts', 'NY');
INSERT INTO `tbl_university_name` VALUES (2283, 'University of Scranton', 'NY');
INSERT INTO `tbl_university_name` VALUES (2284, 'University of Sioux Falls', 'NY');
INSERT INTO `tbl_university_name` VALUES (2285, 'University of South Alabama', 'NY');
INSERT INTO `tbl_university_name` VALUES (2286, 'University of South Carolina-A', 'NY');
INSERT INTO `tbl_university_name` VALUES (2287, 'University of South Carolina-B', 'NY');
INSERT INTO `tbl_university_name` VALUES (2288, 'University of South Carolina-C', 'NY');
INSERT INTO `tbl_university_name` VALUES (2289, 'University of South Carolina-U', 'NY');
INSERT INTO `tbl_university_name` VALUES (2290, 'University of South Dakota', 'NY');
INSERT INTO `tbl_university_name` VALUES (2291, 'University of South Florida Sa', 'NY');
INSERT INTO `tbl_university_name` VALUES (2292, 'University of South Florida-Ma', 'NY');
INSERT INTO `tbl_university_name` VALUES (2293, 'University of South Florida-Po', 'NY');
INSERT INTO `tbl_university_name` VALUES (2294, 'University of South Florida-St', 'NY');
INSERT INTO `tbl_university_name` VALUES (2295, 'University of Southern Califor', 'NY');
INSERT INTO `tbl_university_name` VALUES (2296, 'University of Southern Indiana', 'NY');
INSERT INTO `tbl_university_name` VALUES (2297, 'University of Southern Maine', 'NY');
INSERT INTO `tbl_university_name` VALUES (2298, 'University of Southern Mississ', 'NY');
INSERT INTO `tbl_university_name` VALUES (2299, 'University of Southern Nevada', 'NY');
INSERT INTO `tbl_university_name` VALUES (2300, 'University of St Francis', 'NY');
INSERT INTO `tbl_university_name` VALUES (2301, 'University of St Thomas', 'NY');
INSERT INTO `tbl_university_name` VALUES (2302, 'University of St Thomas', 'NY');
INSERT INTO `tbl_university_name` VALUES (2303, 'University of Texas Southweste', 'NY');
INSERT INTO `tbl_university_name` VALUES (2304, 'University of the Cumberlands', 'NY');
INSERT INTO `tbl_university_name` VALUES (2305, 'University of the District of ', 'NY');
INSERT INTO `tbl_university_name` VALUES (2306, 'University of the Incarnate Wo', 'NY');
INSERT INTO `tbl_university_name` VALUES (2307, 'University of the Ozarks', 'NY');
INSERT INTO `tbl_university_name` VALUES (2308, 'University of the Pacific', 'NY');
INSERT INTO `tbl_university_name` VALUES (2309, 'University of the Sciences in ', 'NY');
INSERT INTO `tbl_university_name` VALUES (2310, 'University of the Southwest', 'NY');
INSERT INTO `tbl_university_name` VALUES (2311, 'University of the Virgin Islan', 'NY');
INSERT INTO `tbl_university_name` VALUES (2312, 'University of the West', 'NY');
INSERT INTO `tbl_university_name` VALUES (2313, 'University of Toledo', 'NY');
INSERT INTO `tbl_university_name` VALUES (2314, 'University of Tulsa', 'NY');
INSERT INTO `tbl_university_name` VALUES (2315, 'University of Utah', 'NY');
INSERT INTO `tbl_university_name` VALUES (2316, 'University of Vermont', 'NY');
INSERT INTO `tbl_university_name` VALUES (2317, 'University of Virginia-Main Ca', 'NY');
INSERT INTO `tbl_university_name` VALUES (2318, 'University of Washington-Bothe', 'NY');
INSERT INTO `tbl_university_name` VALUES (2319, 'University of Washington-Seatt', 'NY');
INSERT INTO `tbl_university_name` VALUES (2320, 'University of Washington-Tacom', 'NY');
INSERT INTO `tbl_university_name` VALUES (2321, 'University of West Alabama', 'NY');
INSERT INTO `tbl_university_name` VALUES (2322, 'University of West Georgia', 'NY');
INSERT INTO `tbl_university_name` VALUES (2323, 'University of Western States', 'NY');
INSERT INTO `tbl_university_name` VALUES (2324, 'University of Wisconsin-Eau Cl', 'NY');
INSERT INTO `tbl_university_name` VALUES (2325, 'University of Wisconsin-Green ', 'NY');
INSERT INTO `tbl_university_name` VALUES (2326, 'University of Wisconsin-La Cro', 'NC');
INSERT INTO `tbl_university_name` VALUES (2327, 'University of Wisconsin-Madiso', 'NC');
INSERT INTO `tbl_university_name` VALUES (2328, 'University of Wisconsin-Milwau', 'NC');
INSERT INTO `tbl_university_name` VALUES (2329, 'University of Wisconsin-Oshkos', 'NC');
INSERT INTO `tbl_university_name` VALUES (2330, 'University of Wisconsin-Parksi', 'NC');
INSERT INTO `tbl_university_name` VALUES (2331, 'University of Wisconsin-Platte', 'NC');
INSERT INTO `tbl_university_name` VALUES (2332, 'University of Wisconsin-River ', 'NC');
INSERT INTO `tbl_university_name` VALUES (2333, 'University of Wisconsin-Steven', 'NC');
INSERT INTO `tbl_university_name` VALUES (2334, 'University of Wisconsin-Stout', 'NC');
INSERT INTO `tbl_university_name` VALUES (2335, 'University of Wisconsin-Superi', 'ND');
INSERT INTO `tbl_university_name` VALUES (2336, 'University of Wisconsin-Whitew', 'ND');
INSERT INTO `tbl_university_name` VALUES (2337, 'University of Wyoming', 'ND');
INSERT INTO `tbl_university_name` VALUES (2338, 'Upper Iowa University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2339, 'Urbana University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2340, 'Ursinus College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2341, 'Ursuline College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2342, 'Uta Mesivta of Kiryas Joel', 'OH');
INSERT INTO `tbl_university_name` VALUES (2343, 'Utah Career College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2344, 'Utah Career College-Orem Campu', 'OH');
INSERT INTO `tbl_university_name` VALUES (2345, 'Utah Career College-Layton', 'OH');
INSERT INTO `tbl_university_name` VALUES (2346, 'Utah State University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2347, 'Utah State University-Regional', 'OH');
INSERT INTO `tbl_university_name` VALUES (2348, 'Utah Valley University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2349, 'Utica College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2350, 'Valdosta State University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2351, 'Valley City State University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2352, 'Valley Forge Christian College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2353, 'Valparaiso University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2354, 'Vanderbilt University', 'OH');
INSERT INTO `tbl_university_name` VALUES (2355, 'VanderCook College of Music', 'OH');
INSERT INTO `tbl_university_name` VALUES (2356, 'Vanguard University of Souther', 'OH');
INSERT INTO `tbl_university_name` VALUES (2357, 'Vassar College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2358, 'Vatterott College', 'OH');
INSERT INTO `tbl_university_name` VALUES (2359, 'Vatterott College', 'OK');
INSERT INTO `tbl_university_name` VALUES (2360, 'Vaughn College of Aeronautics ', 'OK');
INSERT INTO `tbl_university_name` VALUES (2361, 'Vermont Technical College', 'OK');
INSERT INTO `tbl_university_name` VALUES (2362, 'Villa Maria College Buffalo', 'OK');
INSERT INTO `tbl_university_name` VALUES (2363, 'Villanova University', 'OR');
INSERT INTO `tbl_university_name` VALUES (2364, 'Vincennes University', 'OR');
INSERT INTO `tbl_university_name` VALUES (2365, 'Virginia College in Charleston', 'OR');
INSERT INTO `tbl_university_name` VALUES (2366, 'Virginia College-Birmingham', 'OR');
INSERT INTO `tbl_university_name` VALUES (2367, 'Virginia College-Greenville', 'OR');
INSERT INTO `tbl_university_name` VALUES (2368, 'Virginia College-Huntsville', 'OR');
INSERT INTO `tbl_university_name` VALUES (2369, 'Virginia College-School of Bus', 'OR');
INSERT INTO `tbl_university_name` VALUES (2370, 'Virginia Commonwealth Universi', 'OR');
INSERT INTO `tbl_university_name` VALUES (2371, 'Virginia Intermont College', 'OR');
INSERT INTO `tbl_university_name` VALUES (2372, 'Virginia Military Institute', 'OR');
INSERT INTO `tbl_university_name` VALUES (2373, 'Virginia Polytechnic Institute', 'PA');
INSERT INTO `tbl_university_name` VALUES (2374, 'Virginia State University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2375, 'Virginia Union University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2376, 'Virginia University of Lynchbu', 'PA');
INSERT INTO `tbl_university_name` VALUES (2377, 'Virginia Wesleyan College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2378, 'Visible School-Music and Worsh', 'PA');
INSERT INTO `tbl_university_name` VALUES (2379, 'Viterbo University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2380, 'Voorhees College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2381, 'W L Bonner College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2382, 'Wabash College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2383, 'Wagner College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2384, 'Wake Forest University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2385, 'Walden University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2386, 'Waldorf College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2387, 'Walla Walla University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2388, 'Walsh College of Accountancy a', 'PA');
INSERT INTO `tbl_university_name` VALUES (2389, 'Walsh University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2390, 'Warner Pacific College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2391, 'Warner University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2392, 'Warren Wilson College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2393, 'Wartburg College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2394, 'Washburn University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2395, 'Washington & Jefferson College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2396, 'Washington Adventist Universit', 'PA');
INSERT INTO `tbl_university_name` VALUES (2397, 'Washington and Lee University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2398, 'Washington Bible College-Capit', 'PA');
INSERT INTO `tbl_university_name` VALUES (2399, 'Washington College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2400, 'Washington State University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2401, 'Washington University in St Lo', 'PA');
INSERT INTO `tbl_university_name` VALUES (2402, 'Watkins College of Art & Desig', 'PA');
INSERT INTO `tbl_university_name` VALUES (2403, 'Wayland Baptist University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2404, 'Wayne State College', 'PA');
INSERT INTO `tbl_university_name` VALUES (2405, 'Wayne State University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2406, 'Waynesburg University', 'PA');
INSERT INTO `tbl_university_name` VALUES (2407, 'Webb Institute', 'PA');
INSERT INTO `tbl_university_name` VALUES (2408, 'Webber International Universit', 'RI');
INSERT INTO `tbl_university_name` VALUES (2409, 'Weber State University', 'RI');
INSERT INTO `tbl_university_name` VALUES (2410, 'Webster University', 'RI');
INSERT INTO `tbl_university_name` VALUES (2411, 'Wellesley College', 'SC');
INSERT INTO `tbl_university_name` VALUES (2412, 'Wells College', 'SC');
INSERT INTO `tbl_university_name` VALUES (2413, 'Wentworth Institute of Technol', 'SC');
INSERT INTO `tbl_university_name` VALUES (2414, 'Wesley College', 'SC');
INSERT INTO `tbl_university_name` VALUES (2415, 'Wesley College', 'SC');
INSERT INTO `tbl_university_name` VALUES (2416, 'Wesleyan College', 'SC');
INSERT INTO `tbl_university_name` VALUES (2417, 'Wesleyan University', 'SC');
INSERT INTO `tbl_university_name` VALUES (2418, 'West Chester University of Pen', 'SC');
INSERT INTO `tbl_university_name` VALUES (2419, 'West Coast University', 'SD');
INSERT INTO `tbl_university_name` VALUES (2420, 'West Liberty University', 'SD');
INSERT INTO `tbl_university_name` VALUES (2421, 'West Suburban College of Nursi', 'SD');
INSERT INTO `tbl_university_name` VALUES (2422, 'West Texas A & M University', 'SD');
INSERT INTO `tbl_university_name` VALUES (2423, 'West Virginia State University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2424, 'West Virginia University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2425, 'West Virginia University at Pa', 'TN');
INSERT INTO `tbl_university_name` VALUES (2426, 'West Virginia University Insti', 'TN');
INSERT INTO `tbl_university_name` VALUES (2427, 'West Virginia Wesleyan College', 'TN');
INSERT INTO `tbl_university_name` VALUES (2428, 'Western Carolina University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2429, 'Western Connecticut State Univ', 'TN');
INSERT INTO `tbl_university_name` VALUES (2430, 'Western Governors University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2431, 'Western Illinois University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2432, 'Western International Universi', 'TN');
INSERT INTO `tbl_university_name` VALUES (2433, 'Western Kentucky University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2434, 'Western Michigan University', 'TN');
INSERT INTO `tbl_university_name` VALUES (2435, 'Western Nevada College', 'TN');
INSERT INTO `tbl_university_name` VALUES (2436, 'Western New England College', 'TX');
INSERT INTO `tbl_university_name` VALUES (2437, 'Western New Mexico University', 'TX');
INSERT INTO `tbl_university_name` VALUES (2438, 'Western Oregon University', 'TX');
INSERT INTO `tbl_university_name` VALUES (2439, 'Western State College of Color', 'TX');
INSERT INTO `tbl_university_name` VALUES (2440, 'Western Washington University', 'TX');
INSERT INTO `tbl_university_name` VALUES (2441, 'Westfield State College', 'TX');
INSERT INTO `tbl_university_name` VALUES (2442, 'Westminster College', 'TX');
INSERT INTO `tbl_university_name` VALUES (2443, 'Westminster College', 'TX');
INSERT INTO `tbl_university_name` VALUES (2444, 'Westminster College', 'TX');
INSERT INTO `tbl_university_name` VALUES (2445, 'Westmont College', 'TX');
INSERT INTO `tbl_university_name` VALUES (2446, 'Westwood College-Anaheim', 'TX');
INSERT INTO `tbl_university_name` VALUES (2447, 'Westwood College-Annandale', 'TX');
INSERT INTO `tbl_university_name` VALUES (2448, 'Westwood College-Arlington Bal', 'TX');
INSERT INTO `tbl_university_name` VALUES (2449, 'Westwood College-Atlanta Midto', 'TX');
INSERT INTO `tbl_university_name` VALUES (2450, 'Westwood College-Chicago Loop', 'TX');
INSERT INTO `tbl_university_name` VALUES (2451, 'Westwood College-Dallas', 'TX');
INSERT INTO `tbl_university_name` VALUES (2452, 'Westwood College-Denver North', 'TX');
INSERT INTO `tbl_university_name` VALUES (2453, 'Westwood College-Denver South', 'TX');
INSERT INTO `tbl_university_name` VALUES (2454, 'Westwood College-Dupage', 'TX');
INSERT INTO `tbl_university_name` VALUES (2455, 'Westwood College-Ft Worth', 'TX');
INSERT INTO `tbl_university_name` VALUES (2456, 'Westwood College-Houston South', 'TX');
INSERT INTO `tbl_university_name` VALUES (2457, 'Westwood College-Inland Empire', 'TX');
INSERT INTO `tbl_university_name` VALUES (2458, 'Westwood College-Los Angeles', 'TX');
INSERT INTO `tbl_university_name` VALUES (2459, 'Westwood College-Northlake', 'TX');
INSERT INTO `tbl_university_name` VALUES (2460, 'Westwood College-O''Hare Airpor', 'HI');
INSERT INTO `tbl_university_name` VALUES (2461, 'Westwood College-River Oaks', 'UT');
INSERT INTO `tbl_university_name` VALUES (2462, 'Westwood College-South Bay', 'UT');
INSERT INTO `tbl_university_name` VALUES (2463, 'Wheaton College', 'UT');
INSERT INTO `tbl_university_name` VALUES (2464, 'Wheaton College', 'VT');
INSERT INTO `tbl_university_name` VALUES (2465, 'Wheeling Jesuit University', 'VT');
INSERT INTO `tbl_university_name` VALUES (2466, 'Wheelock College', 'VT');
INSERT INTO `tbl_university_name` VALUES (2467, 'Whitman College', 'VT');
INSERT INTO `tbl_university_name` VALUES (2468, 'Whittier College', 'VT');
INSERT INTO `tbl_university_name` VALUES (2469, 'Whitworth University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2470, 'Wichita State University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2471, 'Widener University-Delaware Ca', 'VA');
INSERT INTO `tbl_university_name` VALUES (2472, 'Widener University-Main Campus', 'VA');
INSERT INTO `tbl_university_name` VALUES (2473, 'Wilberforce University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2474, 'Wiley College', 'VA');
INSERT INTO `tbl_university_name` VALUES (2475, 'Wilkes University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2476, 'Willamette University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2477, 'William Carey University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2478, 'William Jessup University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2479, 'William Jewell College', 'VA');
INSERT INTO `tbl_university_name` VALUES (2480, 'William Paterson University of', 'VA');
INSERT INTO `tbl_university_name` VALUES (2481, 'William Penn University', 'WA');
INSERT INTO `tbl_university_name` VALUES (2482, 'William Woods University', 'WA');
INSERT INTO `tbl_university_name` VALUES (2483, 'Williams Baptist College', 'WA');
INSERT INTO `tbl_university_name` VALUES (2484, 'Williams College', 'WA');
INSERT INTO `tbl_university_name` VALUES (2485, 'Williamson Christian College', 'WA');
INSERT INTO `tbl_university_name` VALUES (2486, 'Wilmington College', 'WA');
INSERT INTO `tbl_university_name` VALUES (2487, 'Wilmington University', 'WA');
INSERT INTO `tbl_university_name` VALUES (2488, 'Wilson College', 'WA');
INSERT INTO `tbl_university_name` VALUES (2489, 'Wingate University', 'WV');
INSERT INTO `tbl_university_name` VALUES (2490, 'Winona State University', 'WV');
INSERT INTO `tbl_university_name` VALUES (2491, 'Winston-Salem State University', 'WV');
INSERT INTO `tbl_university_name` VALUES (2492, 'Winthrop University', 'WV');
INSERT INTO `tbl_university_name` VALUES (2493, 'Wisconsin Lutheran College', 'WV');
INSERT INTO `tbl_university_name` VALUES (2494, 'Wittenberg University', 'WI');
INSERT INTO `tbl_university_name` VALUES (2495, 'Wofford College', 'WI');
INSERT INTO `tbl_university_name` VALUES (2496, 'Woodbury University', 'WI');
INSERT INTO `tbl_university_name` VALUES (2497, 'Worcester Polytechnic Institut', 'WI');
INSERT INTO `tbl_university_name` VALUES (2498, 'Worcester State College', 'WI');
INSERT INTO `tbl_university_name` VALUES (2499, 'World Mission University', 'WI');
INSERT INTO `tbl_university_name` VALUES (2500, 'Wright State University-Lake C', 'WI');
INSERT INTO `tbl_university_name` VALUES (2501, 'Wright State University-Main C', 'WI');
INSERT INTO `tbl_university_name` VALUES (2502, 'Xavier University', 'WY');
INSERT INTO `tbl_university_name` VALUES (2503, 'Xavier University of Louisiana', 'MP');
INSERT INTO `tbl_university_name` VALUES (2504, 'Yale University', 'PR');
INSERT INTO `tbl_university_name` VALUES (2505, 'Yeshiva and Kollel Harbotzas T', 'PR');
INSERT INTO `tbl_university_name` VALUES (2506, 'Yeshiva College of the Nations', 'PR');
INSERT INTO `tbl_university_name` VALUES (2507, 'Yeshiva D''monsey Rabbinical Co', 'PR');
INSERT INTO `tbl_university_name` VALUES (2508, 'Yeshiva Derech Chaim', 'PR');
INSERT INTO `tbl_university_name` VALUES (2509, 'Yeshiva Gedolah Imrei Yosef D''', 'PR');
INSERT INTO `tbl_university_name` VALUES (2510, 'Yeshiva Gedolah of Greater Det', 'PR');
INSERT INTO `tbl_university_name` VALUES (2511, 'Yeshiva Karlin Stolin', 'PR');
INSERT INTO `tbl_university_name` VALUES (2512, 'Yeshiva of Machzikai Hadas', 'PR');
INSERT INTO `tbl_university_name` VALUES (2513, 'Yeshiva of Nitra Rabbinical Co', 'PR');
INSERT INTO `tbl_university_name` VALUES (2514, 'Yeshiva of the Telshe Alumni', 'PR');
INSERT INTO `tbl_university_name` VALUES (2515, 'Yeshiva Ohr Elchonon Chabad We', 'PR');
INSERT INTO `tbl_university_name` VALUES (2516, 'Yeshiva Shaar Hatorah', 'PR');
INSERT INTO `tbl_university_name` VALUES (2517, 'Yeshiva Shaarei Torah of Rockl', 'PR');
INSERT INTO `tbl_university_name` VALUES (2518, 'Yeshiva Toras Chaim', 'PR');
INSERT INTO `tbl_university_name` VALUES (2519, 'Yeshiva Toras Chaim Talmudical', 'PR');
INSERT INTO `tbl_university_name` VALUES (2520, 'Yeshiva University', 'CA');
INSERT INTO `tbl_university_name` VALUES (2521, 'Yeshivah Gedolah Rabbinical Co', 'MO');
INSERT INTO `tbl_university_name` VALUES (2522, 'Yeshivas Be''er Yitzchok', 'NM');
INSERT INTO `tbl_university_name` VALUES (2523, 'Yeshivas Novominsk', 'SC');
INSERT INTO `tbl_university_name` VALUES (2524, 'Yeshivat Mikdash Melech', 'CO');
INSERT INTO `tbl_university_name` VALUES (2525, 'Yeshivath Beth Moshe', 'IA');
INSERT INTO `tbl_university_name` VALUES (2526, 'Yeshivath Viznitz', 'IL');
INSERT INTO `tbl_university_name` VALUES (2527, 'Yeshivath Zichron Moshe', 'FL');
INSERT INTO `tbl_university_name` VALUES (2528, 'York College', 'PR');
INSERT INTO `tbl_university_name` VALUES (2529, 'York College Pennsylvania', 'IA');
INSERT INTO `tbl_university_name` VALUES (2530, 'Young Harris College', 'TN');
INSERT INTO `tbl_university_name` VALUES (2531, 'Youngstown State University', 'VA');
INSERT INTO `tbl_university_name` VALUES (2532, 'Zion Bible College', 'CA');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `usertype` tinyint(3) unsigned NOT NULL,
  `transType` enum('B','S') NOT NULL default 'B',
  `schoolType` enum('C','L','B','M','G') NOT NULL default 'C',
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `FirstName` varchar(50) default NULL,
  `LastName` varchar(50) default NULL,
  `idName` varchar(50) default NULL,
  `hs_profile_status` enum('A','B','C') default 'A' COMMENT 'A = none, B=exists but not for sale, C = exists and for sale',
  `last_login_time` datetime default NULL,
  `create_time` datetime default NULL,
  `create_user_id` int(10) unsigned default NULL,
  `update_time` datetime default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` VALUES (29, 0, 'S', 'C', 'jsmith@gmail.com', 'jsmith', 'f75e19aa8da1f3bef9aaa878e8375dce840b3df185dbb3caed29c89dfef04afacc1c696bfb77d3d2b7153b0d4185a5e933b831263297099c21044bd824004963', 'John', 'Smith', NULL, 'A', NULL, '2011-10-24 16:40:19', NULL, '2011-10-24 16:40:19', NULL);
INSERT INTO `tbl_user` VALUES (33, 0, 'S', 'C', 'test@gmail.com', 'test', '8a3815c4b5efae15ebdaf24c593526d495eb263c7871b8234572f5b02bfa296d6d8f6ab88e2de6160b26c118db1732fc9d3d7ba213caf13ac84ff0e52f3042d7', 'test', 'testy', NULL, 'A', NULL, '2011-11-03 00:14:11', NULL, '2011-11-03 00:14:11', NULL);
INSERT INTO `tbl_user` VALUES (34, 0, 'S', 'C', 'test2@gmail.com', 'test2', '03a68bc8bf0b54c9c46d042991556b4b7bbe3a4ac1c2164f28cbc0edb5a6e9c6828fe4e96e92399c1a50c39f1ad17bf2f5e6172bc232c44a996413af58bf6d96', 'test2', 'test2', NULL, 'A', NULL, '2011-11-03 00:18:40', NULL, '2011-11-03 00:18:40', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user_credit`
--

DROP TABLE IF EXISTS `tbl_user_credit`;
CREATE TABLE `tbl_user_credit` (
  `user_id` int(10) unsigned NOT NULL,
  `buy_credits` double NOT NULL,
  `sell_credits` double NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `tbl_user_credit`
--

INSERT INTO `tbl_user_credit` VALUES (29, 11, 0);
INSERT INTO `tbl_user_credit` VALUES (33, 0, 0);
INSERT INTO `tbl_user_credit` VALUES (34, 51, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_volunteer_profile`
--

DROP TABLE IF EXISTS `tbl_volunteer_profile`;
CREATE TABLE `tbl_volunteer_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned default NULL,
  `name` text collate utf8_bin NOT NULL,
  `volunteertype_id` tinyint(2) NOT NULL,
  `year_begin` tinyint(3) unsigned NOT NULL,
  `year_end` tinyint(3) unsigned NOT NULL,
  `leadership` tinyint(3) unsigned NOT NULL,
  `hours` tinyint(3) unsigned NOT NULL,
  `comments` text collate utf8_bin NOT NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_volunteer_profile`
--


-- --------------------------------------------------------

--
-- Структура таблицы `tbl_work_profile`
--

DROP TABLE IF EXISTS `tbl_work_profile`;
CREATE TABLE `tbl_work_profile` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `name` text collate utf8_bin,
  `work_type` tinyint(2) default NULL,
  `year_begin` tinyint(2) default NULL,
  `year_end` tinyint(2) default NULL,
  `title` tinyint(2) default NULL,
  `hours` int(11) default NULL,
  `comments` int(11) default NULL,
  `create_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `tbl_work_profile`
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
-- Constraints for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `FK_tbl_rating_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
