-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2016 at 03:52 PM
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
-- Table structure for table `contact_us`
--
-- Creation: Nov 20, 2016 at 08:04 AM
-- Last update: Nov 20, 2016 at 08:38 AM
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `contactUs_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_num` double NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`contactUs_id`),
  UNIQUE KEY `contactUs_id` (`contactUs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactUs_id`, `name`, `email_id`, `phone_num`, `message`) VALUES
(1, 'Mukul', 'mukul.dani@gmail.com', 8665544364, 'Hello I am looking for adission in the college'),
(2, 'Mukul', 'mukul@dani.com', 784684535, 'Heloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo'),
(3, 'hg', 'hg', 53684513155, 'hjbmjvhcgchtg');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--
-- Creation: Nov 18, 2016 at 05:54 PM
-- Last update: Dec 07, 2016 at 02:27 PM
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `document_id` int(11) NOT NULL AUTO_INCREMENT,
  `document_title` varchar(200) NOT NULL,
  `document_file` longblob NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_date` date NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `document_title`, `document_file`, `document_type`, `document_date`) VALUES
(6, 'test', 0x4578616d696e6174696f6e5f635f6561726c792e706466, 'Examination', '2016-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--
-- Creation: Nov 18, 2016 at 05:42 PM
-- Last update: Dec 07, 2016 at 02:47 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20008 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `designation`, `qualification`, `specialization`, `research_work`, `achievements`, `resume`) VALUES
(20004, 10036, NULL, NULL, NULL, NULL, NULL, NULL),
(20005, 10037, NULL, NULL, NULL, NULL, NULL, NULL),
(20006, 10038, NULL, NULL, NULL, NULL, NULL, NULL),
(20007, 10039, 'Prof.', 'MCA', 'Oracle Web', '', '', 0x546573745f635f6561726c792e706466);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--
-- Creation: Nov 18, 2016 at 05:53 PM
-- Last update: Dec 07, 2016 at 02:05 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_title`, `notice_category`, `notice_words`, `notice_file`, `date_uploaded`) VALUES
(4, 'Exam FY Sem-1 Time table', 'Examinations & Results', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(5, 'Exam SY Time Table sem 3', 'Examinations & Results', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(6, 'Exam TY Sem 5 time table', 'Examinations & Results', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(7, 'Result FY Sem-1 Practicals', 'Examinations & Results', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(8, 'Result SY Sem 3 Practicals', 'Examinations & Results', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(10, 'Admission FY 2016', 'Admissions Notice', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-21'),
(11, 'Admission SY', 'Admissions Notice', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(12, 'Admission TY', 'Admissions Notice', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(13, 'Diwali Holidays', 'General Notice', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', NULL, '2016-11-20'),
(16, 'test', 'General Notice', 'test', 0x47656e6572616c204e6f746963655f6e646c732d6263742d315f6e6f762e706466, '2016-12-07'),
(17, 'test1', 'General Notice', 'test1', 0x47656e6572616c204e6f746963655f6263742d64656c2d32362d6f63742e706466, '2016-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `placement_partner`
--
-- Creation: Nov 18, 2016 at 05:42 PM
-- Last update: Dec 07, 2016 at 02:15 PM
--

DROP TABLE IF EXISTS `placement_partner`;
CREATE TABLE IF NOT EXISTS `placement_partner` (
  `placement_partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(200) NOT NULL,
  `partner_logo` longblob NOT NULL,
  PRIMARY KEY (`placement_partner_id`),
  UNIQUE KEY `placement_partner_id` (`placement_partner_id`),
  UNIQUE KEY `partner_name` (`partner_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `placement_partner`
--

INSERT INTO `placement_partner` (`placement_partner_id`, `partner_name`, `partner_logo`) VALUES
(4, '3A Technologies', 0x334120546563686e6f6c6f676965735f3361746563682e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `placement_student`
--
-- Creation: Nov 18, 2016 at 05:42 PM
-- Last update: Dec 06, 2016 at 06:35 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--
-- Creation: Nov 18, 2016 at 05:42 PM
-- Last update: Nov 22, 2016 at 05:50 AM
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_id` (`role_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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
(19, 10038, 'Faculty'),
(20, 10039, 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
-- Creation: Nov 18, 2016 at 05:42 PM
-- Last update: Dec 07, 2016 at 02:47 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10043 ;

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
(10038, 20006, 'faculty3', 'test', 'testf3@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 789654123, NULL),
(10039, 20007, 'Test', 'faculty4', 'testf4@bvimit.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 85156415155, NULL);

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
