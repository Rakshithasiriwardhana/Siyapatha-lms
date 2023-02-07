  -- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2021 at 06:41 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siyapatha`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `stu_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'absent',
  PRIMARY KEY (`stu_id`,`class_id`,`date`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`stu_id`, `class_id`, `date`, `status`) VALUES
('st01', 'c02', '07-01-2021', 'present'),
('st01', 'c02', '07-02-2021', 'present'),
('st01', 'c02', '07-20-2021', 'absent'),
('st01', 'c02', '08-21-2021', 'present'),
('st01', 'c02', '08-30-2021', 'absent'),
('st01', 'c02', '09-23-2021', 'absent'),
('st02', 'c02', '07-01-2021', 'present'),
('st02', 'c02', '07-20-2021', 'absent'),
('st02', 'c02', '07-21-2021', 'present'),
('st02', 'c02', '07-30-2021', 'absent'),
('st02', 'c02', '09-23-2021', 'absent'),
('st04', 'c02', '07-01-2021', 'present'),
('st04', 'c02', '07-20-2021', 'present'),
('st04', 'c02', '07-21-2021', 'present'),
('st04', 'c02', '07-30-2021', 'present'),
('st04', 'c02', '09-23-2021', 'absent'),
('st04', 'c03', '07-15-2021', 'present'),
('st10', 'c03', '07-15-2021', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` varchar(10) NOT NULL,
  `sub_id` varchar(10) NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `grade` int(11) NOT NULL,
  `fee` float NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `sub_id` (`sub_id`,`teacher_id`,`grade`),
  KEY `class_ibfk_2` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `sub_id`, `teacher_id`, `name`, `grade`, `fee`) VALUES
('c02', 's02', 't02', 'english grd8', 8, 650),
('c03', 's02', 't02', 'english grd11', 11, 650),
('dfgdsfg', 's01', 't02', 'adfasdf', 11, 800);

-- --------------------------------------------------------

--
-- Table structure for table `class_timetable`
--

DROP TABLE IF EXISTS `class_timetable`;
CREATE TABLE IF NOT EXISTS `class_timetable` (
  `class_id` varchar(10) NOT NULL,
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`class_id`,`timetable_id`),
  KEY `timetable_id` (`timetable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_timetable`
--

INSERT INTO `class_timetable` (`class_id`, `timetable_id`) VALUES
('c02', 1),
('c03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

DROP TABLE IF EXISTS `fee`;
CREATE TABLE IF NOT EXISTS `fee` (
  `uid` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  `stu_id` varchar(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'not-paid',
  PRIMARY KEY (`class_id`,`stu_id`,`month`),
  KEY `fee_ibfk_1` (`uid`),
  KEY `stu_id` (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`uid`, `class_id`, `stu_id`, `month`, `date`, `status`) VALUES
('admin', 'c02', 'st01', 'August', '07-21-2021', 'not-paid'),
('admin', 'c02', 'st01', 'July', '07-21-2021', 'payed');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `uid` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`) VALUES
('admin', 'admin', '$2y$10$v2MtPpwad9dKOyBPelnG..4GrZ88K1bogkuCuP0sM7lzNtJOqPjIa'),
('u01', 'hava', '5Qw%'),
('u03', 'ibba', '$2y$10$Pbzvauwashbh6Z0dT5X0TOCEl6.hcMzqmBv6a51Q8haFu1/NX7HFS'),
('u06', 'sarath', '$2y$10$MhUzuTFsIvDfAT5QebG/mO2UhIrMYWCZsXHLS.7KdcNzdLROzJbu.'),
('u10', 'pragith', '$2y$10$tXazDKbcFzha1JB3TyBSTe46HwCtVP.w94CU8k/DCB28v1nlh9Oxy'),
('worker', 'worker', '$2y$10$/my2lCGGpUdsAsU4cBE7M.fzx.M/mkchdmEpOVO/bJVzWs.0kFKz6');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` varchar(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `grade` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `address_no` varchar(10) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `grade`, `email`, `contact_no`, `address_no`, `street`, `city`, `photo`) VALUES
('st01', 'saman', 'saman', 10, 'saman@saman.com', '0111223314', '11', 'beruwala', 'aluthgama', ''),
('st02', 'kasun', 'sameera', 7, 'kasun@gmail.com', '1111111100', '20', 'aluthgama', 'aluthgama', '2424'),
('st03', 'pasan', 'dilshan', 10, 'pasan@gmail.com', '0342222211', '20', 'baduraliya', 'baduraliya', '2424'),
('st04', 'waruna', 'sampath', 11, 'waruna@gmail.com', '0342211110', '40', 'agalawatta', 'agalawatta', '2424'),
('st05', 'nuwan', 'sampath', 8, 'nuwan@gmail.com', '0342211000', '42', 'agalawatta', 'agalawatta', '2424'),
('st19', 'sahan', 'sahan', 9, 'sagab@kk.com', '7777777666', 'dfgd', 'uy', 'fg', '2424'),
('st20', 'pasindu', 'samaranayake', 6, 'adf@sfd.com', '3333333333', 'erw', 'wer', 'we', '2424');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

DROP TABLE IF EXISTS `student_class`;
CREATE TABLE IF NOT EXISTS `student_class` (
  `stu_id` varchar(10) NOT NULL,
  `class_id` varchar(10) NOT NULL,
  PRIMARY KEY (`stu_id`,`class_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`stu_id`, `class_id`) VALUES
('st01', 'c02'),
('st01', 'dfgdsfg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `medium` varchar(20) NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `medium`) VALUES
('s01', 'Sinhala', 'Sinhala'),
('s02', 'Maths', 'English'),
('s03', 'English', 'English'),
('s04', 'IT', 'Sinhala'),
('s05', 'Science', 'Sinhala'),
('s06', 'History', 'English'),
('s07', 'Art', 'English'),
('s08', 'Music', 'Sinhala');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` varchar(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `address_no` varchar(10) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `first_name`, `last_name`, `nic`, `email`, `contact_no`, `address_no`, `street`, `city`, `photo`) VALUES
('t01', 'malinda', 'perera', '1212121212', 'perera@gmail.com', '9999999999', '43', 'fghf', 'hfg', ''),
('t02', 'sumith', 'maduranga', '3434343434', 'sumith@gmail.com', '0000000000', '6756', 'fggfg', 'cgh', ''),
('t03', 'sudath', 'sirimanna', '601012131v', 'sudath@gmail.com', '1111111111', '80', 'hill road', 'matugama', '2424'),
('t04', 'sammani', 'thilakaratne', '501012131v', 'sam@gmail.com', '0342211111', '10', 'kalutara', 'matugama', '2424'),
('t05', 'rajitha', 'gunasena', '801012131v', 'raj@gmail.com', '0342222222', '10', 'baduraliya', 'baduraliya', '2424'),
('t06', 'nipun', 'beragma', '901012131v', 'nipun@gmail.com', '0111122223', '10', 'bulathsinhala', 'horana', '2424'),
('t07', 'menura', 'maheepala', '961012131v', 'menura@gmail.com', '0342248888', '50', 'agalawatta', 'agalawatta', '2424');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE IF NOT EXISTS `timetable` (
  `timetable_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` varchar(20) NOT NULL,
  `location` varchar(30) NOT NULL,
  PRIMARY KEY (`timetable_id`),
  UNIQUE KEY `start_time` (`start_time`,`day`,`location`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetable_id`, `start_time`, `end_time`, `day`, `location`) VALUES
(1, '00:00:10', '00:00:11', 'friday', 'D'),
(4, '00:00:06', '00:00:07', 'monday', 'B'),
(8, '00:00:08', '00:00:08', 'monday', 'A'),
(10, '00:00:09', '00:00:10', 'monday', 'A'),
(12, '00:00:10', '00:00:10', 'monday', 'A'),
(13, '00:00:11', '00:00:12', 'tuesday', 'D'),
(15, '00:00:12', '00:00:13', 'monday', 'A'),
(37, '00:00:06', '00:00:07', 'monday', 'C'),
(39, '00:00:06', '00:00:07', 'wednesday', 'A'),
(40, '00:00:08', '00:00:08', 'tuesday', 'A'),
(41, '00:00:06', '00:00:07', 'thursday', 'A'),
(44, '00:00:07', '00:00:07', 'monday', 'A'),
(46, '00:00:06', '00:00:07', 'friday', 'A'),
(47, '00:00:11', '00:00:12', 'thursday', 'A'),
(49, '00:00:06', '00:00:07', 'saturday', 'A'),
(50, '00:00:16', '00:00:17', 'thursday', 'A'),
(52, '00:00:14', '00:00:14', 'friday', 'B'),
(63, '00:00:09', '00:00:10', 'thursday', 'A'),
(64, '00:00:11', '00:00:11', 'friday', 'A'),
(65, '00:00:06', '00:00:07', 'friday', 'C'),
(68, '00:00:09', '00:00:09', 'wednesday', 'B'),
(70, '00:00:08', '00:00:09', 'thursday', 'C'),
(71, '00:00:09', '00:00:10', 'thursday', 'C'),
(79, '00:00:08', '00:00:09', 'friday', 'D'),
(83, '00:00:10', '00:00:12', 'saturday', 'D'),
(84, '00:00:09', '00:00:09', 'Wednesday', 'D'),
(85, '00:00:10', '00:00:10', 'Sunday', 'F'),
(86, '00:00:17', '00:00:18', 'Wednesday', 'D'),
(87, '00:00:18', '00:00:18', 'Sunday', 'A'),
(89, '00:00:16', '00:00:17', 'Saturday', 'D'),
(90, '00:00:07', '00:00:07', 'Sunday', 'D'),
(91, '00:00:11', '00:00:12', 'Tuesday', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `address_no` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nic` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact_no`, `type`, `photo`, `address_no`, `street`, `city`, `nic`) VALUES
('admin', 'admin', '', 'admin@admin.com', '0712121212', 'admin', '2424', '01', 'matale', 'matale', 'admin'),
('u01', 'kamal', 'rathnayake', 'kamal@gmail.com', '454545454', 'admin', '2222', 'no2', 'main street', 'kadawatha', '1111111111'),
('u03', 'nimal', 'rathnayake', 'nimal@gmail.com', '7878787878', 'admin', '3333', '44', 'gunasema rd', 'anuradapura', '3333333333'),
('u06', 'sarath', 'gamage', 'sarath@gmail.com', '0787323398', 'worker', '2424', '60', 'maliban rd', 'ratmalana', '981952257v'),
('u10', 'Pragith', 'Thilakarathna', 'lakshanxp@hotmail.com', '0715408871', 'admin', '2424', '22', ' Nandana Waththa', 'Matale', '1212121212'),
('worker', 'worker', '', 'w1@hotdfmail.com', '4243224234', 'worker', '2424', '10', 'matara', 'matara', '131231231231');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_timetable`
--
ALTER TABLE `class_timetable`
  ADD CONSTRAINT `class_timetable_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_timetable_ibfk_2` FOREIGN KEY (`timetable_id`) REFERENCES `timetable` (`timetable_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_ibfk_3` FOREIGN KEY (`stu_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `student_class_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_class_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
