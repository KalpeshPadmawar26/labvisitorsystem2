-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 08:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labvisitorsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses_subject`
--

CREATE TABLE `tbl_courses_subject` (
  `id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_part` text NOT NULL,
  `subject_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courses_subject`
--

INSERT INTO `tbl_courses_subject` (`id`, `course_name`, `course_part`, `subject_name`) VALUES
(10, 'Poly in CS', 'PART I SEMESTER I', 'Mathematics'),
(11, 'Poly in CS', 'PART I SEMESTER II', 'C Language'),
(12, 'Poly in CS', 'PART II SEMESTER III', 'CPP'),
(13, 'Poly in CS', 'PART II SEMESTER IV', 'Core JAVA'),
(14, 'Poly in CS', 'PART III SEMESTER V', 'Advanced JAVA'),
(15, 'Poly in CS', 'PART III SEMESTER VI', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_year`
--

CREATE TABLE `tbl_list_year` (
  `id` bigint(20) NOT NULL,
  `listyear` varchar(150) NOT NULL DEFAULT '0',
  `term` int(11) NOT NULL DEFAULT 2,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_list_year`
--

INSERT INTO `tbl_list_year` (`id`, `listyear`, `term`, `status`) VALUES
(1, '2020-2021', 2, '1'),
(2, '2021-2022', 2, '0'),
(3, '2022-2023', 2, '0'),
(4, '2023-2024', 2, '0'),
(5, '2024-2025', 2, '0'),
(13, '2025-2026', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `id` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '00',
  `passwordotp` varchar(50) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT '0',
  `action` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`id`, `username`, `passwordotp`, `created`, `status`, `action`) VALUES
(1, 'vbcmr491', '49340', '2020-11-15 15:32:50', '0', '0'),
(2, 'adminadmin', '42623', '2020-11-27 09:46:02', '0', '0'),
(3, 'mainadmin', '51263', '2021-05-15 06:06:54', '0', '0'),
(4, '123456789000', '56954', '2021-05-15 06:17:22', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdf`
--

CREATE TABLE `tbl_pdf` (
  `id` bigint(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `evtid` int(11) NOT NULL,
  `event_name` varchar(64) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(24) NOT NULL,
  `details` varchar(3000) NOT NULL,
  `description` varchar(3000) NOT NULL DEFAULT '0',
  `event_date` date NOT NULL,
  `image_name` varchar(400) NOT NULL,
  `thumb_name` varchar(400) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(200) NOT NULL DEFAULT 'staff',
  `added_for` varchar(100) NOT NULL DEFAULT 'event',
  `department` varchar(200) NOT NULL DEFAULT 'college',
  `year` varchar(150) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'none',
  `pdf_course` varchar(250) NOT NULL DEFAULT '0',
  `pdf_subject` varchar(250) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pdf`
--

INSERT INTO `tbl_pdf` (`id`, `sequence`, `evtid`, `event_name`, `start_time`, `end_time`, `location`, `details`, `description`, `event_date`, `image_name`, `thumb_name`, `created`, `added_by`, `added_for`, `department`, `year`, `username`, `pdf_course`, `pdf_subject`, `status`) VALUES
(1, 1, 1, 'NOTES hhhhh 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'hhhhh', 'sdhj jhdbcjhsd dc dscjhjhc jhcjhsjhdcjhdjhcjjhd', '2021-05-21', 'impnotes/NOTES hhhhh 2020-2021.pdf', 'impnotes/NOTES hhhhh 2020-2021.pdf', '2021-04-21 12:35:22', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', 'mainadmin', 'PART I SEMESTER I', 'Computer Fundamental', '0'),
(2, 2, 2, 'NOTES mathematics syllabus 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'mathematics syllabus', '........', '2021-05-26', 'impnotes/NOTES mathematics syllabus 2020-2021.pdf', 'impnotes/NOTES mathematics syllabus 2020-2021.pdf', '2021-05-26 18:26:26', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', '135791357913', 'PART I SEMESTER I', 'Mathematics', '0'),
(3, 3, 3, 'NOTES C language Syllabus 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'C language Syllabus', 'aaaaaa', '2021-05-26', 'impnotes/NOTES C language Syllabus 2020-2021.pdf', 'impnotes/NOTES C language Syllabus 2020-2021.pdf', '2021-05-26 18:27:18', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', '135791357913', 'PART I SEMESTER II', 'C Language', '0'),
(4, 4, 4, 'NOTES C++ syllabus 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'C++ syllabus', '........', '2021-05-26', 'impnotes/NOTES C++ syllabus 2020-2021.pdf', 'impnotes/NOTES C++ syllabus 2020-2021.pdf', '2021-05-26 18:28:07', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', '135791357913', 'PART II SEMESTER III', 'CPP', '0'),
(5, 5, 5, 'NOTES core java notes 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'core java notes', '..........', '2021-05-26', 'impnotes/NOTES core java notes 2020-2021.pdf', 'impnotes/NOTES core java notes 2020-2021.pdf', '2021-05-26 18:28:47', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', '135791357913', 'PART II SEMESTER IV', 'Core JAVA', '0'),
(6, 6, 6, 'NOTES Advanced java notes 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'Advanced java notes', '....', '2021-05-26', 'impnotes/NOTES Advanced java notes 2020-2021.pdf', 'impnotes/NOTES Advanced java notes 2020-2021.pdf', '2021-05-26 18:29:54', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', '135791357913', 'PART III SEMESTER V', 'Advanced JAVA', '0'),
(7, 7, 7, 'NOTES PHP Syllabus 2020-2021', '00:00:00', '00:00:00', 'NOTES', 'PHP Syllabus', '..........', '2021-05-27', 'impnotes/NOTES PHP Syllabus 2020-2021.pdf', 'impnotes/NOTES PHP Syllabus 2020-2021.pdf', '2021-05-26 18:30:29', 'admin admin admin', 'addpdf', 'POLY IN CS', '2020-2021', '135791357913', 'PART III SEMESTER VI', 'PHP', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration_admin`
--

CREATE TABLE `tbl_registration_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(24) NOT NULL DEFAULT '0',
  `last_name` varchar(24) NOT NULL DEFAULT '0',
  `user_name` varchar(48) NOT NULL DEFAULT '0',
  `password` varchar(48) NOT NULL DEFAULT '0',
  `email` varchar(68) NOT NULL DEFAULT '0',
  `contact` varchar(10) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `mid_name` varchar(30) NOT NULL DEFAULT '0',
  `designation` varchar(120) NOT NULL DEFAULT '0',
  `faculty` varchar(120) NOT NULL DEFAULT '0',
  `department` varchar(120) DEFAULT '0',
  `joining_date` date NOT NULL,
  `birth_date` date NOT NULL,
  `resume` varchar(300) NOT NULL DEFAULT '0',
  `qualification` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `action` varchar(20) NOT NULL DEFAULT '0',
  `gender` varchar(15) NOT NULL DEFAULT '0',
  `implink` text NOT NULL,
  `sitetitle` varchar(250) NOT NULL DEFAULT 'My Web Site',
  `site_address` varchar(450) NOT NULL DEFAULT '0',
  `site_mobile` varchar(20) NOT NULL DEFAULT '0',
  `site_website` varchar(250) NOT NULL DEFAULT '0',
  `site_line1` varchar(250) NOT NULL DEFAULT '0',
  `site_line2` varchar(250) NOT NULL DEFAULT '0',
  `site_line3` varchar(250) NOT NULL DEFAULT '0',
  `site_line4` varchar(250) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration_admin`
--

INSERT INTO `tbl_registration_admin` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `contact`, `created`, `mid_name`, `designation`, `faculty`, `department`, `joining_date`, `birth_date`, `resume`, `qualification`, `status`, `action`, `gender`, `implink`, `sitetitle`, `site_address`, `site_mobile`, `site_website`, `site_line1`, `site_line2`, `site_line3`, `site_line4`) VALUES
(1, 'admin', 'admin', '135791357913', 'mainadmin', 'admin@gmail.com', '8888888888', '0000-00-00', 'admin', 'admin', ' admin', 'admin', '2012-07-26', '2012-07-26', 'images/780940967462.pdf', ' ', '1', '0', 'female', '', 'hgb', 'Dhamangaon Road, Yavatmal', '+91-9423618472', 'http://yavatmalkar.com', 'site line 1', 'site line 2', 'site line 3', 'site line 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration_student`
--

CREATE TABLE `tbl_registration_student` (
  `id` int(11) NOT NULL,
  `user_name` varchar(48) NOT NULL DEFAULT '0',
  `first_name` varchar(24) NOT NULL DEFAULT '0',
  `mid_name` varchar(30) NOT NULL DEFAULT '0',
  `last_name` varchar(24) NOT NULL DEFAULT '0',
  `password` varchar(48) NOT NULL DEFAULT 'password',
  `gender` varchar(15) NOT NULL DEFAULT '0',
  `email` varchar(68) NOT NULL DEFAULT '0',
  `contact` varchar(10) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  `designation` varchar(120) NOT NULL DEFAULT '0',
  `faculty` varchar(120) NOT NULL DEFAULT '0',
  `department` varchar(120) DEFAULT '0',
  `joining_date` date NOT NULL,
  `birth_date` date NOT NULL,
  `resume` varchar(300) NOT NULL DEFAULT '0',
  `photo` varchar(300) NOT NULL DEFAULT '0',
  `qualification` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1',
  `action` varchar(20) NOT NULL DEFAULT '0',
  `year` varchar(25) NOT NULL DEFAULT '2020-2021'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration_student`
--

INSERT INTO `tbl_registration_student` (`id`, `user_name`, `first_name`, `mid_name`, `last_name`, `password`, `gender`, `email`, `contact`, `created`, `designation`, `faculty`, `department`, `joining_date`, `birth_date`, `resume`, `photo`, `qualification`, `status`, `action`, `year`) VALUES
(1, '123456789000', 'student', 'student', 'student', 'password', 'male', 'stud@gmail.com', '1234567890', '0000-00-00', 'student', 'PART I', 'Poly in CS', '2012-07-26', '2012-07-26', 'images/780940967462.pdf', '', 'PART I SEMESTER I', '1', '0', '2020-2021'),
(2, '222222222222', 'kalpesh', 'milind ', 'padmawar', 'password', 'MALE', 'shyam@gmail.com', '9999999999', '0000-00-00', '0', 'PART I', 'Poly in CS', '0000-00-00', '2001-05-20', '0', '0', 'PART I SEMESTER II', '1', '0', '2020-2021'),
(3, '333333333333', 'vaidehi', 'sandeep', 'kadam', 'password', 'FEMALE', 'rohit@gmail.com', '8888888888', '0000-00-00', '0', 'PART II', 'Poly in CS', '0000-00-00', '2000-11-15', '0', '0', 'PART II SEMESTER III', '1', '0', '2020-2021'),
(4, '444444444444', 'vaishnavi', 'xyz', 'giri', 'password', 'female', 'vaishnavi111@gmail.com', '1111111111', '0000-00-00', '0', 'PART II', 'Poly in CS', '0000-00-00', '2003-07-08', '0', 'images/student/444444444444.jpeg', 'PART II SEMESTER IV', '1', '0', '2020-2021'),
(5, '777777777777', 'sejal', 'pravin', 'gadewar', 'sejal123', 'female', 'sejal17@gmail.com', '7777777777', '0000-00-00', '0', 'PART II', 'Poly in CS', '0000-00-00', '2001-12-17', '0', '0', 'PART II SEMESTER III', '1', '0', '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE `tbl_visitor` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL DEFAULT '0',
  `remark` varchar(255) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT '0',
  `action` varchar(20) NOT NULL DEFAULT '0',
  `pc_ip` varchar(255) NOT NULL DEFAULT '0',
  `pc_mac` varchar(255) NOT NULL DEFAULT '0',
  `vcurrent_date` varchar(255) NOT NULL DEFAULT '0',
  `vcurrent_time` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`id`, `student_id`, `remark`, `created`, `status`, `action`, `pc_ip`, `pc_mac`, `vcurrent_date`, `vcurrent_time`) VALUES
(1, '', 'Machine Out Time', '2021-05-26 18:03:50', '0', '0', '', '0', '26-May-2021', '11:33:50 PM'),
(2, '123456789000', 'Machine In Time', '2021-05-26 18:04:16', '0', '0', '', '0', '26-May-2021', '11:34:16 PM'),
(3, '123456789000', 'Machine Out Time', '2021-05-26 18:04:56', '0', '0', '', '0', '26-May-2021', '11:34:56 PM'),
(4, '123456789000', 'Machine In Time', '2021-05-26 18:05:40', '0', '0', '', '0', '26-May-2021', '11:35:40 PM'),
(5, '123456789000', 'Machine Out Time', '2021-05-26 18:06:35', '0', '0', '192.168.43.172', '0', '26-May-2021', '11:36:35 PM'),
(6, '444444444444', 'Machine In Time', '2021-05-26 18:15:04', '0', '0', '', '0', '26-May-2021', '11:45:04 PM'),
(7, '444444444444', 'Machine Out Time', '2021-05-26 18:18:03', '0', '0', '', '0', '26-May-2021', '11:48:03 PM'),
(8, '123456789000', 'Machine In Time', '2021-05-26 18:18:12', '0', '0', '', '0', '26-May-2021', '11:48:12 PM'),
(9, '123456789000', 'Machine Out Time', '2021-05-26 18:19:05', '0', '0', '', '0', '26-May-2021', '11:49:05 PM'),
(10, '', 'Machine Out Time', '2021-05-26 18:38:59', '0', '0', '192.168.56.1', '0', '27-May-2021', '12:08:59 AM'),
(11, '', 'Machine Out Time', '2021-05-26 18:39:14', '0', '0', '192.168.56.1', '0', '27-May-2021', '12:09:14 AM'),
(12, '444444444444', 'Machine In Time', '2021-05-26 18:39:50', '0', '0', '192.168.56.1', '0', '27-May-2021', '12:09:50 AM'),
(13, '444444444444', 'Machine Out Time', '2021-05-26 18:40:25', '0', '0', '192.168.56.1', '0', '27-May-2021', '12:10:25 AM'),
(14, '333333333333', 'Machine In Time', '2021-05-26 18:41:01', '0', '0', '192.168.56.1', '0', '27-May-2021', '12:11:01 AM'),
(15, '333333333333', 'Machine Out Time', '2021-05-26 18:41:15', '0', '0', '192.168.56.1', '0', '27-May-2021', '12:11:15 AM'),
(16, '', 'Machine Out Time', '2021-05-28 03:54:31', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:24:31 AM'),
(17, '777777777777', 'Machine In Time', '2021-05-28 04:08:34', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:38:34 AM'),
(18, '777777777777', 'Machine Out Time', '2021-05-28 04:09:59', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:39:59 AM'),
(20, '777777777777', 'Machine In Time', '2021-05-28 04:11:14', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:41:14 AM'),
(21, '777777777777', 'Machine Out Time', '2021-05-28 04:11:41', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:41:41 AM'),
(22, '777777777777', 'Machine In Time', '2021-05-28 04:11:57', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:41:57 AM'),
(23, '777777777777', 'Machine Out Time', '2021-05-28 04:12:15', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:42:15 AM'),
(24, '123456789000', 'Machine In Time', '2021-05-28 04:12:41', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:42:41 AM'),
(25, '123456789000', 'Machine Out Time', '2021-05-28 04:13:15', '0', '0', '192.168.56.1', '0', '28-May-2021', '09:43:15 AM'),
(26, '123456789000', 'Machine In Time', '2021-05-28 05:54:22', '0', '0', '', '0', '28-May-2021', '11:24:22 AM'),
(27, '123456789000', 'Machine Out Time', '2021-05-28 08:15:51', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:45:51 PM'),
(28, '222222222222', 'Machine In Time', '2021-05-28 08:16:15', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:46:15 PM'),
(29, '222222222222', 'Machine Out Time', '2021-05-28 08:16:36', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:46:36 PM'),
(30, '123456789000', 'Machine In Time', '2021-05-28 08:17:50', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:47:50 PM'),
(31, '123456789000', 'Machine Out Time', '2021-05-28 08:18:26', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:48:26 PM'),
(32, '777777777777', 'Machine In Time', '2021-05-28 08:19:30', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:49:30 PM'),
(33, '777777777777', 'Machine Out Time', '2021-05-28 08:19:57', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:49:57 PM'),
(34, '123456789000', 'Machine In Time', '2021-05-28 08:20:23', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:50:23 PM'),
(35, '123456789000', 'Machine Out Time', '2021-05-28 08:20:56', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:50:56 PM'),
(36, '333333333333', 'Machine In Time', '2021-05-28 08:23:37', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:53:37 PM'),
(37, '333333333333', 'Machine Out Time', '2021-05-28 08:23:46', '0', '0', '192.168.43.172', '0', '28-May-2021', '01:53:46 PM'),
(38, '', 'Machine Out Time', '2021-05-28 10:10:02', '0', '0', '192.168.43.172', '0', '28-May-2021', '03:40:02 PM'),
(39, '444444444444', 'Machine In Time', '2021-05-28 10:11:20', '0', '0', '192.168.43.172', '0', '28-May-2021', '03:41:20 PM'),
(40, '', 'Machine Out Time', '2021-05-28 10:29:13', '0', '0', '192.168.137.1', '0', '28-May-2021', '03:59:04 PM'),
(41, '999999999999', 'Machine In Time', '2021-05-28 10:31:45', '0', '0', '192.168.137.1', '0', '28-May-2021', '04:01:45 PM'),
(42, '999999999999', 'Machine Out Time', '2021-05-28 10:33:04', '0', '0', '192.168.137.1', '0', '28-May-2021', '04:03:04 PM'),
(43, '999999999999', 'Machine In Time', '2021-05-28 10:34:24', '0', '0', '192.168.137.1', '0', '28-May-2021', '04:04:24 PM'),
(44, '999999999999', 'Machine Out Time', '2021-05-28 10:35:37', '0', '0', '192.168.137.1', '0', '28-May-2021', '04:05:37 PM'),
(45, '444444444444', 'Machine Out Time', '2021-05-28 10:36:50', '0', '0', '', '0', '28-May-2021', '04:06:50 PM'),
(46, '', 'Machine Out Time', '2021-05-28 16:04:56', '0', '0', '', '0', '28-May-2021', '09:34:56 PM'),
(47, '777777777777', 'Machine In Time', '2021-05-28 16:05:09', '0', '0', '', '0', '28-May-2021', '09:35:09 PM'),
(48, '777777777777', 'Machine Out Time', '2021-05-28 16:52:07', '0', '0', '', '0', '28-May-2021', '10:22:07 PM'),
(49, '', 'Machine Out Time', '2021-05-28 17:10:51', '0', '0', '', '0', '28-May-2021', '10:40:51 PM'),
(50, '123456789000', 'Machine In Time', '2021-05-28 17:11:42', '0', '0', '', '0', '28-May-2021', '10:41:42 PM'),
(51, '123456789000', 'Machine Out Time', '2021-05-28 17:34:01', '0', '0', '192.168.56.1', '0', '28-May-2021', '11:04:01 PM'),
(52, '444444444444', 'In Time', '2021-05-31 17:05:38', '0', '0', '0', '0', '31-May-2021', '10:35:38 PM'),
(53, '777777777777', 'In Time', '2021-05-31 17:05:50', '0', '0', '0', '0', '31-May-2021', '10:35:50 PM'),
(54, '222222222222', 'Out Time', '2021-05-31 17:06:03', '0', '0', '0', '0', '31-May-2021', '10:36:03 PM'),
(55, '777777777777', 'In Time', '2021-05-31 17:06:09', '0', '0', '0', '0', '31-May-2021', '10:36:09 PM'),
(56, '', 'Machine Out Time', '2021-05-31 17:24:53', '0', '0', '192.168.56.1', '0', '31-May-2021', '10:54:53 PM'),
(57, '123456789000', 'Machine In Time', '2021-05-31 17:34:11', '0', '0', '192.168.56.1', '0', '31-May-2021', '11:04:11 PM'),
(58, '', 'Machine Out Time', '2021-06-02 19:00:37', '0', '0', '', '0', '03-June-2021', '12:30:37 AM'),
(59, '222222222222', 'Machine In Time', '2021-06-02 19:00:49', '0', '0', '', '0', '03-June-2021', '12:30:49 AM'),
(60, '222222222222', 'Machine Out Time', '2021-06-02 19:01:21', '0', '0', '', '0', '03-June-2021', '12:31:21 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_courses_subject`
--
ALTER TABLE `tbl_courses_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_year`
--
ALTER TABLE `tbl_list_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration_admin`
--
ALTER TABLE `tbl_registration_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration_student`
--
ALTER TABLE `tbl_registration_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_courses_subject`
--
ALTER TABLE `tbl_courses_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_list_year`
--
ALTER TABLE `tbl_list_year`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pdf`
--
ALTER TABLE `tbl_pdf`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_registration_admin`
--
ALTER TABLE `tbl_registration_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_registration_student`
--
ALTER TABLE `tbl_registration_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
