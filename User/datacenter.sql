-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2018 at 07:40 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datacenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_doner`
--

CREATE TABLE `blood_doner` (
  `doner_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `area` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blood_doner`
--

INSERT INTO `blood_doner` (`doner_id`, `first_name`, `last_name`, `email`, `address`, `area`, `contact_no`, `blood_group`, `status`) VALUES
(2, 'Ashiqur', 'Rahman', 'ashiq@gmaiil.com', '23 Baily Road', 'shantinagar', '0124967836', 'a+', 'available'),
(3, 'Rakibul', 'Islam', 'rakibul.rk@yahoo.com', '13 Mugdha', 'mugdha', '01396784235', 'o+', 'available'),
(4, 'Jhon', 'Smith', 'jhon@gmail.com', '8/A Baridhara', 'basundhara', '01187935647', 'b+', 'available'),
(5, 'Rakibul', 'Hasan', 'rakibul@mail.com', '71 Kolabagan', 'dhanmondi', '01369784356', 'a+', 'available'),
(1, 'Symon', 'Hasan', 'isymonhs@gmail.com', '71 Kolabagan', 'dhanmondi', '01681183306', 'o+', 'available'),
(6, 'Md', 'Islam', 'mis@mail.com', '9/A Malibag', 'malibag', '01398657426', 'o-', 'available'),
(7, 'Taiefur', 'Rahman', 'taief@yahoo.com', '18 Malibag', 'malibag', '01398563475', 'ab+', 'available'),
(8, 'Alamin', 'Seikh', 'alamin@gmail.com', '23 Green Road', 'dhanmondi', '01269875346', 'b-', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_firstname` varchar(100) NOT NULL,
  `doctor_lastname` varchar(100) NOT NULL,
  `specalized` varchar(100) NOT NULL,
  `degree` varchar(500) NOT NULL,
  `d_time` varchar(100) NOT NULL,
  `doc_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_firstname`, `doctor_lastname`, `specalized`, `degree`, `d_time`, `doc_status`) VALUES
(1, 'abdul', 'kader', 'medicine', 'm.b.b.s,fcps', 'SUN-THR 8:00AM - 1:00PM', 'available'),
(2, 'mannan', 'ahmed', 'child', 'm.b.b.s,fcps', 'MON-SAT 8:00PM - 11:00PM', 'available'),
(3, 'noor', 'jahan', 'gynecologist', 'm.b.b.s,fcps', 'FRI-WED 8:00AM - 7:00PM', 'available'),
(4, 'abul', 'kalam', 'neurologist', 'm.b.b.s,fcps', 'MON-THR 7:00PM - 10:00PM', 'available'),
(5, 'sumaiya', 'akhter', 'orthopedic', 'm.b.b.s,fcps', 'MON-SUM 6:00PM - 10:00PM', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

CREATE TABLE `doctor_login` (
  `doctor_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `d_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_login`
--

INSERT INTO `doctor_login` (`doctor_id`, `username`, `email`, `d_password`) VALUES
(1, 'doctor1', 'doctor1@hospital.com', 'password1'),
(2, 'doctor2', 'doctor2@hospital.com', 'password2'),
(3, 'doctor3', 'doctor3@hospital.com', 'password3'),
(4, 'doctor4', 'doctor4@hospital.com', 'password4'),
(5, 'doctor5', 'doctor5@hospital.com', 'password5');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_message`
--

CREATE TABLE `doctor_message` (
  `sender_email` varchar(100) NOT NULL,
  `reciever_email` varchar(100) NOT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `mail` varchar(10000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor_message`
--

INSERT INTO `doctor_message` (`sender_email`, `reciever_email`, `subject`, `mail`, `status`) VALUES
('someone@mail.com', 'doctor1@hospital.com', 'Sir! You have a message. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed metus nulla. Donec volutpat, neque id malesuada maximus, magna sem molestie lectus, vel imperdiet magna turpis ut leo. Aliquam rhoncus nisl sit amet aliquam elementum. Quisque posuere nisi et orci mollis tempus. In vel risus eget dolor blandit sollicitudin.', 'unread'),
('getyou@gmail.com', 'doctor1@hospital.com', 'Sir! You have another message.', 'Aliquam in lacus augue. Sed ut lorem nec lorem accumsan consectetur blandit eu urna. Suspendisse a tellus suscipit, dictum purus eget, sollicitudin libero. Sed tempor purus eu odio pretium pharetra. Fusce hendrerit odio id lectus lacinia dictum. Ut quis varius lectus. Praesent augue arcu, pretium sit amet vulputate ut, dapibus in metus. Sed euismod volutpat vestibulum. Suspendisse et posuere eros. Fusce dignissim sed neque in dignissim. Nunc ullamcorper consectetur nunc, non mollis felis sollicitudin ut. Curabitur non erat eleifend, accumsan mauris vitae, molestie urna. Cras libero urna, scelerisque at scelerisque non, cursus nec libero. Nulla quis lectus suscipit, vehicula dui a, tempus est.', 'unread');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD CONSTRAINT `doctor_loginFKdoctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
