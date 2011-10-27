SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE `test` ;

USE `test`;

CREATE USER 'tempuser'@'localhost' 
  IDENTIFIED BY '3bptShjLSBS89Lay';

GRANT ALL PRIVILEGES ON `test`.* TO 'tempuser'@'localhost';


DROP TABLE IF EXISTS `tbl_hobby`;
DROP TABLE IF EXISTS `tbl_hobby_type`;
DROP TABLE IF EXISTS `tbl_photo`;
DROP TABLE IF EXISTS `tbl_profile`;
DROP TABLE IF EXISTS `tbl_race_type`;
DROP TABLE IF EXISTS `tbl_religion_type`;

CREATE TABLE IF NOT EXISTS `tbl_hobby` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `hobby_id` char(2) NOT NULL, 
  PRIMARY KEY (`id`),
  KEY `USER` (`user_id`),
  KEY `TYPE` (`hobby_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `tbl_hobby_type` (
  `id` char(2) NOT NULL,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_religion_type` (
  `id` char(2) NOT NULL,
  `name` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_race_type` (
  `id` char(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_hobby_type` (
  `id` char(1) NOT NULL,
  `name` text(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(256) DEFAULT NULL,
  `username` varchar(256) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `race_id` char(1),
  `religion_id` char(2),
  `gender` ENUM('M','F'),
  `hasPets` ENUM('Y','N'),
  `hasChildren` ENUM('Y','N'),
  `education` tinyint(3) unsigned DEFAULT NULL,
  `income_bracket` tinyint(3) unsigned DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `photo_id` int(10) unsigned ,
  `num_hobbies` smallint(5) unsigned ,
   `date_of_birth` date,
  PRIMARY KEY (`id`),
  KEY `RACE` (`race_id`),
  KEY `RELIGION` (`religion_id`),
  KEY `PHOTO` (`photo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


INSERT INTO `tbl_race_type` (`id`, `name`) VALUES
('A', 'White'),
('B', 'Black'),
('C', 'Native American'),
('D', 'Mexican'),
('E', 'Puerto Rican'),
('F', 'Other Latino'),
('G', 'Asian'),
('H', 'Other')
;

INSERT INTO `tbl_hobby_type` (`id`, `name`) VALUES
('AA', 'Biking'),
('AB', 'Reading'),
('AC', 'Clubbing'),
('AD', 'Working out'),
('AE', 'Soccer'),
('AF', 'Movies'),
('AG', 'Harry Potter'),
('AH', 'Swimming')
;

INSERT INTO `tbl_photo` (`id`, `name`) VALUES
(1, 'photo1'),
(2, 'photo2'),
(3, 'photo3'),
(4, 'photo4'),
(5, 'photo5'),
(6, 'photo6'),
(7, 'photo7'),
(8, 'photo8')
;

INSERT INTO `tbl_religion_type` (`id`, `name`) VALUES
('AA', 'I prefer not to answer'),
('AB', 'African Methodist Episcopal'),
('AC', 'Anglican'),
('AD', 'Assembly of God'),
('AE', 'Baha’i'),
('AF', 'Baptist'),
('AG', 'Southern Baptist Convention'),
('AH', 'Buddhism'),
('AI', 'Christian–Disciples'),
('AJ', 'Christian Reformed Church in America'),
('AK', 'Church of the Brethen'),
('AL', 'Church of Christ'),
('AM', 'United Church of Christ'),
('AN', 'Christian Science (Church of Christ, Scientist)'),
('AO', 'Church of God'),
('AP', 'Church of Jesus Christ of Latter-Day Saints'),
('AQ', 'Church of the Nazarene'),
('AR', 'Episcopal'),
('AS', 'Hinduism'),
('AT', 'Islam/Muslim/ Moslem'),
('AU', 'Judaism'),
('AV', 'Evangelical Lutheran Church in America'),
('AW', 'Lutheran Church--Missouri Synod'),
('AX', 'Mennonite'),
('AY', 'Methodist'),
('AZ', 'United Methodist'),
('A0', 'Eastern Orthodox Churches'),
('A1', 'Pentecostal'),
('A2', 'Presbyterian Church (USA)'),
('A3', 'Reformed Church in America'),
('A4', 'Roman Catholic'),
('A5', 'Seventh-Day Adventist'),
('A6', 'Sikhism'),
('A7', 'Society of Friends (Quaker)'),
('A8', 'Unitarian Universalist Association'),
('A9', 'Wesleyan Church'),
('BA', 'Worldwide Church of God'),
('BB', 'Other'),
('BC', 'None, no preference/affiliation');



--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hobby`
--
ALTER TABLE `tbl_hobby`
  ADD CONSTRAINT `tbl_hobby_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hobby_ibfk_1` FOREIGN KEY (`hobby_id`) REFERENCES `tbl_hobby_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_profile`
--
ALTER TABLE `tbl_profile`
  ADD CONSTRAINT `tbl_profile_ibfk_1` FOREIGN KEY (`race_id`) REFERENCES `tbl_race_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_profile_ibfk_2` FOREIGN KEY (`religion_id`) REFERENCES `tbl_religion_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
