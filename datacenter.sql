-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2019 at 07:06 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(11) NOT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `f_name`, `l_name`, `email`, `address`, `contact_no`, `gender`) VALUES
(18001, 'jhon', 'doe', 'jhon@mail.com', 'west rajabazar', '0143246987', 'female'),
(18002, 'william', 'jack', 'wj@mail.com', '71 Dhanmondi 8', '01298345678', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `password`, `status`) VALUES
(18001, 'admin1', 'adpass1', 'yes'),
(18002, 'admin2', 'adpass2', 'yes');

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

-- --------------------------------------------------------

--
-- Table structure for table `doctor_req`
--

CREATE TABLE `doctor_req` (
  `doctor_id` int(11) DEFAULT NULL,
  `perameter` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_req`
--

INSERT INTO `doctor_req` (`doctor_id`, `perameter`, `type`, `status`) VALUES
(1, 'sun-thr 8:00am - 12:00pm', 'time', 'undone');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_serial`
--

CREATE TABLE `doctor_serial` (
  `serial_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `serial_date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_serial`
--

INSERT INTO `doctor_serial` (`serial_id`, `patient_name`, `age`, `serial_date`, `doctor_id`, `status`) VALUES
(1, 'Abul Mannan', 48, '2019-01-20', 1, 'yes'),
(2, 'Jhon Mia', 15, '2019-01-20', 1, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `serial_no` int(11) NOT NULL,
  `disease` varchar(1000) NOT NULL,
  `test` varchar(1000) NOT NULL,
  `medicine` varchar(1000) NOT NULL,
  `reference` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`serial_no`, `disease`, `test`, `medicine`, `reference`) VALUES
(1, 'fgfgjhfjghj', 'ghfghfgjht', 'dfgfghfnhvbnbvjuij', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `doctor_serial`
--
ALTER TABLE `doctor_serial`
  ADD PRIMARY KEY (`serial_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_serial`
--
ALTER TABLE `doctor_serial`
  MODIFY `serial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD CONSTRAINT `AL_FK` FOREIGN KEY (`admin_id`) REFERENCES `admin_info` (`admin_id`);

--
-- Constraints for table `doctor_login`
--
ALTER TABLE `doctor_login`
  ADD CONSTRAINT `doctor_loginFKdoctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
