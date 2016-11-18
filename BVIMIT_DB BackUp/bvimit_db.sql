-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2016 at 01:35 PM
-- Server version: 5.6.17
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
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `admissions_id` int(11) NOT NULL AUTO_INCREMENT,
  `admissions_eligibility` longtext NOT NULL,
  `admission_documents` longtext NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`admissions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20004 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `designation`, `qualification`, `specialization`, `research_work`, `achievements`, `resume`) VALUES
(20003, 10031, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_category` varchar(50) NOT NULL,
  `notice_words` longtext NOT NULL,
  `notice_file` longblob,
  `date_uploaded` date NOT NULL,
  PRIMARY KEY (`notice_id`),
  UNIQUE KEY `notice_id` (`notice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_category`, `notice_words`, `notice_file`, `date_uploaded`) VALUES
(2, 'AdmissionsNotice', 'jhgfguv', NULL, '2016-11-15'),
(3, 'AdmissionsNotice', 'jhgfguv', NULL, '2016-11-15');

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

--
-- Dumping data for table `placement_student`
--

INSERT INTO `placement_student` (`placement_students_id`, `first_name`, `second_name`, `company_placed`, `package_amt`, `date`) VALUES
(1, 'Mukul', 'Dani', 'Capgermani', '8.9Lakhs', '2016-11-15'),
(2, 'Mukul', 'dani', 'sdgad', '656gfcc', '2016-11-15'),
(3, 'kjn', 'kj', 'kj', '87t', '2016-11-15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `user_id`, `role`) VALUES
(11, 10028, 'Admin Placements'),
(12, 10031, 'Faculty');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10032 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `faculty_id`, `first_name`, `second_name`, `email_id`, `password`, `mobile`, `profile_image`) VALUES
(10028, NULL, 'test', 'test', 'test@bvimit.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 7896541232, NULL),
(10031, NULL, 'test2', 'test', 'test2@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 7896451325, NULL);

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
