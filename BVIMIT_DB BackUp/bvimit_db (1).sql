-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 07:23 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bvimit_db`
--
CREATE DATABASE IF NOT EXISTS `bvimit_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bvimit_db`;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_title` varchar(200) NOT NULL,
  `document_file` longblob NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_date` date NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation` longtext,
  `qualification` longtext,
  `specialization` longtext,
  `research_work` longtext,
  `achievements` longtext,
  `resume` longblob,
  PRIMARY KEY (`faculty_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20007 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `designation`, `qualification`, `specialization`, `research_work`, `achievements`, `resume`) VALUES
(20004, 10036, NULL, NULL, NULL, NULL, NULL, NULL),
(20005, 10037, NULL, NULL, NULL, NULL, NULL, NULL),
(20006, 10038, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` varchar(200) NOT NULL,
  `notice_category` varchar(50) NOT NULL,
  `notice_words` longtext NOT NULL,
  `notice_file` longblob,
  `date_uploaded` date NOT NULL,
  PRIMARY KEY (`notice_id`),
  UNIQUE KEY `notice_id` (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `placement_partner`
--

DROP TABLE IF EXISTS `placement_partner`;
CREATE TABLE IF NOT EXISTS `placement_partner` (
  `placement_partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(200) NOT NULL,
  `partner_logo` longblob NOT NULL,
  PRIMARY KEY (`placement_partner_id`),
  UNIQUE KEY `placement_partner_id` (`placement_partner_id`),
  UNIQUE KEY `partner_name` (`partner_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `placement_student`
--

DROP TABLE IF EXISTS `placement_student`;
CREATE TABLE IF NOT EXISTS `placement_student` (
  `placement_students_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `company_placed` varchar(100) NOT NULL,
  `package_amt` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`placement_students_id`),
  UNIQUE KEY `placement_students_id` (`placement_students_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_id` (`role_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `user_id`, `role`) VALUES
(13, 10032, 'Super Admin'),
(14, 10033, 'Admin Admissions'),
(15, 10034, 'Admin Examination'),
(16, 10035, 'Admin Placements'),
(17, 10036, 'Faculty'),
(18, 10037, 'Faculty'),
(19, 10038, 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` double NOT NULL,
  `profile_image` longblob,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  UNIQUE KEY `emai_id` (`email_id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10039 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `faculty_id`, `first_name`, `second_name`, `email_id`, `password`, `mobile`, `profile_image`) VALUES
(10032, NULL, 'admin', 'test', 'testadmin@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 7893210569, NULL),
(10033, NULL, 'test', 'admissions', 'testad@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 7419638555, NULL),
(10034, NULL, 'test', 'exams', 'testexam@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 9638527456, NULL),
(10035, NULL, 'test', 'placemments', 'testplace@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 85255642987, NULL),
(10036, 20004, 'faculty1', 'test', 'testf1@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 8523690123, NULL),
(10037, 20005, 'faculty2', 'test', 'testf2@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 8524569871, NULL),
(10038, 20006, 'faculty3', 'test', 'testf3@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 789654123, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
