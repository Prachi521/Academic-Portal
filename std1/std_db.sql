-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 08:42 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `std_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `index_number`, `full_name`, `i_name`, `gender`, `address`, `phone`, `email`, `image_name`, `reg_date`) VALUES
(1, 100, 'Admin PrachiMonika', 'MonikaPrachi', 'Female', 'India', '111-111-1114', 'admin@gmail.com', 'uploads/2022013120404.jpg', '2018-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `sender_index` bigint(11) NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `receiver_index` bigint(11) NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `_isread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_room`
--

INSERT INTO `class_room` (`id`, `name`, `student_count`) VALUES
(26, '4th Year', 35);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `grade_id` varchar(255) NOT NULL,
  `create_by` bigint(11) NOT NULL,
  `creator_type` varchar(255) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `end_date_time` datetime NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `note`, `color`, `category_id`, `grade_id`, `create_by`, `creator_type`, `start_date_time`, `end_date_time`, `year`, `month`) VALUES
(1, 'celebration of republic day', 'all must be present on time', '#d74e4e', 2, '', 100, 'Admin', '2021-12-15 09:00:00', '2021-12-15 11:00:00', 2021, 11),
(2, 'subsmissin assignment', 'do submit it', '#dc3434', 6, '', 0, 'Teacher', '2022-01-04 00:00:00', '2022-01-04 23:59:00', 2022, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_category_type`
--

CREATE TABLE `event_category_type` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE `exam_timetable` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `start_time` double(11,2) NOT NULL,
  `end_time` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admission_fee` double(11,2) NOT NULL,
  `hall_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`, `admission_fee`, `hall_charge`) VALUES
(14, '1st semester', 1.00, 30),
(22, '7th CSE', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_message`
--

CREATE TABLE `group_message` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_index` bigint(11) NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_notifications`
--

CREATE TABLE `main_notifications` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `_isread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_notifications`
--

INSERT INTO `main_notifications` (`id`, `notification_id`, `_status`, `year`, `month`, `date`, `_isread`) VALUES
(2, 1, 'Events', 2021, 'December', '2021-12-13', 1),
(3, 2, 'Events', 2022, 'January', '2022-01-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_friends`
--

CREATE TABLE `my_friends` (
  `id` int(11) NOT NULL,
  `my_index` bigint(11) NOT NULL,
  `friend_index` bigint(11) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `my_type` varchar(255) NOT NULL,
  `friend_type` varchar(255) NOT NULL,
  `_isread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_friends`
--

INSERT INTO `my_friends` (`id`, `my_index`, `friend_index`, `_status`, `conversation_id`, `my_type`, `friend_type`, `_isread`) VALUES
(11, 0, 124, 'Friend', 1, 'Teacher', 'Student', 1),
(12, 124, 0, 'Friend', 1, 'Student', 'Teacher', 1),
(13, 0, 67, 'Friend_Request_Sent', 13, 'Teacher', 'Student', 0),
(14, 67, 0, 'Pending', 13, 'Student', 'Teacher', 0),
(15, 0, 100, 'Friend', 15, 'Teacher', 'Admin', 1),
(16, 100, 0, 'Friend', 15, 'Admin', 'Teacher', 1),
(17, 0, 1, 'Friend_Request_Sent', 17, 'Teacher', 'Teacher', 0),
(18, 1, 0, 'Pending', 17, 'Teacher', 'Teacher', 0),
(19, 0, 45, 'Friend_Request_Sent', 19, 'Teacher', 'Student', 0),
(20, 45, 0, 'Pending', 19, 'Student', 'Teacher', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `sr_id` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `sr_id`, `notes`, `added_on`) VALUES
(2, 23, '46c78aa1-1c2e-490d-81e7-c7a0c89992baeaf_new (1).pdf', '0000-00-00 00:00:00'),
(3, 23, '6716e810-1c2e-4019-8346-5efa00a63d2aeaf_new__1_.pdf', '0000-00-00 00:00:00'),
(4, 40, '46c78aa1-1c2e-490d-81e7-c7a0c89992baeaf_new.pdf', '0000-00-00 00:00:00'),
(6, 42, 'GT.pdf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification_history`
--

CREATE TABLE `notification_history` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `_isread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_history`
--

INSERT INTO `notification_history` (`id`, `notification_id`, `index_number`, `user_type`, `_isread`) VALUES
(1, 1, 11, 'Student', 0),
(2, 1, 12, 'Student', 0),
(3, 1, 13, 'Student', 0),
(4, 1, 14, 'Student', 0),
(5, 1, 25252525, 'Student', 0),
(6, 1, 180134009, 'Student', 0),
(7, 1, 1, 'Teacher', 0),
(8, 1, 2, 'Teacher', 0),
(9, 1, 3, 'Teacher', 0),
(10, 1, 4, 'Teacher', 0),
(11, 1, 5, 'Teacher', 0),
(12, 1, 6, 'Teacher', 0),
(13, 1, 202, 'Teacher', 0),
(14, 2, 11, 'Student', 0),
(15, 2, 12, 'Student', 0),
(16, 2, 13, 'Student', 0),
(17, 2, 14, 'Student', 0),
(18, 2, 25252525, 'Student', 0),
(19, 2, 180134009, 'Student', 0),
(20, 2, 8, 'Student', 0),
(21, 2, 124, 'Student', 0),
(22, 2, 156, 'Student', 0),
(23, 2, 67, 'Student', 0),
(24, 2, 45, 'Student', 0);

-- --------------------------------------------------------

--
-- Table structure for table `online_chat`
--

CREATE TABLE `online_chat` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_index` bigint(11) NOT NULL,
  `msg` longtext NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `_isread` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_chat`
--

INSERT INTO `online_chat` (`id`, `conversation_id`, `user_index`, `msg`, `user_type`, `_isread`, `date`, `time`) VALUES
(1, 13, 100, 'hii', 'Admin', 1, '2022-01-03', '11:24:43'),
(2, 13, 100, 'hlo', 'Admin', 1, '2022-01-03', '11:24:45'),
(3, 13, 8, 'hii', 'Student', 0, '2022-01-03', '11:25:29'),
(4, 3, 100, 'hii sir', 'Admin', 0, '2022-01-03', '11:39:14'),
(5, 9, 100, 'hii', 'Admin', 1, '2022-01-03', '19:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `b_date` date NOT NULL,
  `_status` varchar(255) NOT NULL,
  `reg_year` year(4) NOT NULL,
  `reg_month` varchar(255) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `index_number`, `full_name`, `i_name`, `gender`, `address`, `phone`, `email`, `image_name`, `b_date`, `_status`, `reg_year`, `reg_month`, `reg_date`) VALUES
(21, 180134009, 'Reema', 'Ms. Reema Goel', 'Female', 'rkl', '234-678-0987', 'R2@gmail.com', 'uploads/20211213083045.png', '0000-00-00', '', 2021, 'December', '2021-12-13'),
(22, 8, 'Prachi Jaiswal', 'Ms Prachi', 'Female', 'basanti colony', '999-876-9875', 'jui@mail.com', 'uploads/20211228052109.png', '0000-00-00', '', 2021, 'December', '2021-12-28'),
(23, 124, 'xyzxyz', 'xyz', 'Female', 'rkl', '890-765-0987', 'xyz@gmail.com', 'uploads/2022013122351.png', '0000-00-00', '', 2022, 'January', '2022-01-03'),
(24, 156, 'kil', 'kil', 'Male', 'odisha', '956-345-7890', 'kl@gmail.com', 'uploads/2022013122606.jpg', '0000-00-00', '', 2022, 'January', '2022-01-03'),
(25, 67, 'Monika', 'Monika shaw', 'Female', 'ranchi', '897-065-1234', 'm@gmail.com', 'uploads/2022013123141.png', '0000-00-00', '', 2022, 'January', '2022-01-03'),
(26, 45, 'Trisha', 'Trisha ', 'Female', 'bihar', '789-567-1234', 't5@gmail.com', 'uploads/2022013123434.png', '0000-00-00', '', 2022, 'January', '2022-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `status` enum('Present','Absent') NOT NULL,
  `date` date NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `index_number`, `grade_id`, `subject_id`, `status`, `date`, `teacher_id`) VALUES
(14, 124, 22, 50, 'Present', '0000-00-00', 17),
(15, 124, 22, 50, 'Absent', '2022-09-07', 17);

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`id`, `index_number`, `grade_id`, `year`) VALUES
(82, 12, 11, 2017),
(83, 13, 11, 2017),
(86, 14, 11, 2017),
(87, 25252525, 11, 2018),
(88, 180134009, 14, 2021),
(90, 8, 13, 2022),
(91, 11, 0, 2022),
(92, 124, 22, 2022),
(93, 156, 22, 2022),
(94, 67, 22, 2022),
(95, 45, 22, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `_status` varchar(255) NOT NULL,
  `sr_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `reg_month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `index_number`, `_status`, `sr_id`, `year`, `reg_month`) VALUES
(207, 12, '', 17, 2017, ''),
(208, 12, '', 18, 2017, ''),
(209, 12, '', 19, 2017, ''),
(210, 12, '', 20, 2017, ''),
(211, 12, '', 21, 2017, ''),
(212, 12, '', 22, 2017, ''),
(213, 13, '', 17, 2017, ''),
(214, 13, '', 18, 2017, ''),
(215, 13, '', 19, 2017, ''),
(216, 13, '', 20, 2017, ''),
(217, 13, '', 21, 2017, ''),
(218, 13, '', 22, 2017, ''),
(231, 14, '', 17, 2017, ''),
(232, 14, '', 18, 2017, ''),
(233, 14, '', 19, 2017, ''),
(234, 14, '', 20, 2017, ''),
(235, 14, '', 21, 2017, ''),
(236, 14, '', 22, 2017, ''),
(237, 25252525, '', 17, 2018, ''),
(238, 25252525, '', 18, 2018, ''),
(239, 25252525, '', 19, 2018, ''),
(240, 25252525, '', 20, 2018, ''),
(241, 25252525, '', 21, 2018, ''),
(242, 25252525, '', 22, 2018, ''),
(243, 180134009, '', 35, 2021, ''),
(244, 180134009, '', 36, 2021, ''),
(245, 180134009, '', 37, 2021, ''),
(249, 8, '', 29, 2022, ''),
(250, 8, '', 39, 2022, ''),
(251, 8, '', 41, 2022, ''),
(256, 124, '', 43, 2022, ''),
(257, 124, '', 42, 2022, ''),
(258, 124, '', 44, 2022, ''),
(268, 156, '', 43, 2022, ''),
(269, 67, '', 43, 2022, ''),
(270, 45, '', 43, 2022, '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `syllabus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `syllabus`) VALUES
(21, 'dbms', ''),
(22, 'oops', ''),
(23, 'coa', ''),
(24, 'Daa', ''),
(50, 'DVLSI', 'CMOS INVERTER (1).pdf'),
(52, 'GT', 'Green Technology book.pdf'),
(53, 'gt', 'Green Technology book.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `subject_routing`
--

CREATE TABLE `subject_routing` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fee` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_routing`
--

INSERT INTO `subject_routing` (`id`, `grade_id`, `subject_id`, `teacher_id`, `fee`) VALUES
(35, 14, 21, 16, 400.00),
(36, 14, 22, 16, 300.00),
(37, 14, 23, 16, 700.00),
(38, 14, 24, 16, 890.00),
(43, 22, 52, 10, 0.00),
(44, 22, 50, 17, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `full_name`, `i_name`, `gender`, `address`, `phone`, `email`, `image_name`, `index_number`, `reg_date`) VALUES
(10, 'Teacher 1', 'Teacher 1fdsfhdfgdh', 'Male', 'Schoolfdgsfg', '111-111-1111', 't1@gmail.com', 'uploads/20171124010228.png', 1, '2017-11-24'),
(17, 'ABC', 'ABC', 'Female', 'sambalpur', '123-456-7780', 'abc@gmail.com', 'uploads/2022013121815.jpg', 0, '2022-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(11) NOT NULL,
  `index_number` bigint(11) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `time` time NOT NULL,
  `_status1` varchar(255) NOT NULL,
  `_status2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `index_number`, `date`, `month`, `year`, `time`, `_status1`, `_status2`) VALUES
(1, 1, '2021-12-13', 'December', 2021, '08:32:05', 'intime', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `start_time` double(11,2) NOT NULL,
  `end_time` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `grade_id`, `day`, `subject_id`, `teacher_id`, `classroom_id`, `start_time`, `end_time`) VALUES
(81, 22, 'Monday', 52, 10, 26, 9.00, 10.00),
(82, 22, 'Tuesday', 52, 10, 26, 9.00, 10.00),
(83, 22, 'Wednesday', 50, 17, 26, 9.00, 10.00),
(84, 22, 'Thursday', 52, 10, 26, 9.00, 10.00),
(85, 22, 'Friday', 50, 17, 26, 9.00, 10.00),
(86, 22, 'Monday', 50, 17, 26, 10.00, 11.00),
(87, 22, 'Wednesday', 52, 10, 26, 10.00, 11.00),
(88, 22, 'Tuesday', 50, 17, 26, 10.00, 11.00),
(89, 22, 'Thursday', 50, 17, 26, 10.00, 11.00),
(90, 22, 'Friday', 50, 17, 26, 10.00, 11.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `type`) VALUES
(29, 'admin@gmail.com', '12345', 'Admin'),
(47, 't1@gmail.com', '12345', 'Teacher'),
(53, 'std1@gmail.com', '12345', 'Student'),
(71, 'r@gmail.com', '12345', 'Teacher'),
(72, 'R2@gmail.com', '12345', 'Student'),
(73, 're@gmail.com', '12345', 'Parents'),
(74, 'jui@mail.com', '12345', 'Student'),
(75, 'kanchansingh21512@gmail.com', '12345', 'Parents'),
(76, 'abc@gmail.com', '12345', 'Teacher'),
(77, 'xyz@gmail.com', '12345', 'Student'),
(78, 'fgh@gmail.com', '12345', 'Parents'),
(79, 'kl@gmail.com', '12345', 'Student'),
(80, 'riz@gmail.com', '12345', 'Parents'),
(81, 'm@gmail.com', '12345', 'Student'),
(82, 'mg@gmail.com', '12345', 'Parents'),
(83, 't5@gmail.com', '12345', 'Student'),
(84, 'ty@gmail.com', '12345', 'Parents');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_category_type`
--
ALTER TABLE `event_category_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_message`
--
ALTER TABLE `group_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_notifications`
--
ALTER TABLE `main_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_friends`
--
ALTER TABLE `my_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_history`
--
ALTER TABLE `notification_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_chat`
--
ALTER TABLE `online_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_grade`
--
ALTER TABLE `student_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_routing`
--
ALTER TABLE `subject_routing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_category_type`
--
ALTER TABLE `event_category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `group_message`
--
ALTER TABLE `group_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_notifications`
--
ALTER TABLE `main_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `my_friends`
--
ALTER TABLE `my_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_history`
--
ALTER TABLE `notification_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `online_chat`
--
ALTER TABLE `online_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_grade`
--
ALTER TABLE `student_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `subject_routing`
--
ALTER TABLE `subject_routing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
