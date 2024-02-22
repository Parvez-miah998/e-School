-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 04:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschool_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_contact` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_address` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_contact`, `a_email`, `a_address`, `a_password`) VALUES
(1, 'Admin', '01779531662', 'admin@gmail.com', 'Uttara 11, Dhaka 1230', '$2y$10$PjnzhwbsA5e/4QHjcAAYb.vBuPgyX95.Bw06/1JyL6A6qsC0/66KG'),
(2, 'admin2', '01630411972', 'admin.k@gmail.com', 'Dhaka', '123admin');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ctus_id` int(11) NOT NULL,
  `ctus_name` varchar(255) NOT NULL,
  `ctus_email` varchar(255) NOT NULL,
  `ctus_subject` text NOT NULL,
  `ctus_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ctus_id`, `ctus_name`, `ctus_email`, `ctus_subject`, `ctus_desc`) VALUES
(40, 'Laptop', 'example@gmail.com', 'Unable to registered', 'Example'),
(41, 'Jo jo', 'example@gmail.com', 'Unable to registered', 'Example'),
(42, 'Shakib', 'example.a@gmail.com', 'Unable to registered', 'ssss'),
(43, 'Shakib', 'example@gmail.com', 'Unable to registered', 'mmmNCKiI'),
(44, 'Mitu', 'cas@gmail.com', 'Hello', 'aadcacac'),
(45, 'Parvez Miah', 'example@gmail.com', 'Unable to registered', 'cccccc'),
(48, 'Parvez Mosarof', 'adad', 'Unable to registered', 'shaudhyaof'),
(49, 'Parvez Miah', 'rafsan@example.com', 'Unable to registered', 'asadasda'),
(51, 'Parvez Miah', 'asasas', 'Unable to registered', 'asacasc'),
(52, 'Parvez Miah', 'CDVVFV', 'Unable to registered', 'DVX'),
(57, 'Parvez Miah', 'example@gmail.com', 'Unable to registered', 'EEEE'),
(60, 'Parvez Mosarof', 'parvez@example.edu', 'Hello', 'ASACACAC'),
(61, 'Parvez Mosarof', 'example@gmail.com', 'Unable to registered ', 'hwl'),
(62, 'Parvez Mosarof', 'example@gmail.com', 'Unable to registered', 'adada'),
(63, 'Shakib', 'example@gmail.com', 'Unable to by a course', 'Please help me to solve this........');

-- --------------------------------------------------------

--
-- Table structure for table `courseorder`
--

CREATE TABLE `courseorder` (
  `co_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `respmsg` text NOT NULL,
  `amount` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseorder`
--

INSERT INTO `courseorder` (`co_id`, `order_id`, `stu_email`, `c_id`, `status`, `respmsg`, `amount`, `order_date`) VALUES
(9, 'ORDS94463443', 'example@gmail.com', 5, 'Success', 'Payment Complete', 100, '2023-12-07'),
(11, 'ORDS50449511', 'example@gmail.com', 6, 'Success', 'Payment Complete', 340, '2023-12-07'),
(12, 'ORDS3775104', 'example@gmail.com', 8, 'Success', 'Payment Complete', 350, '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `c_desc` text NOT NULL,
  `c_author` varchar(255) NOT NULL,
  `c_img` text NOT NULL,
  `c_duration` text NOT NULL,
  `c_price` int(11) NOT NULL,
  `c_originalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name`, `c_desc`, `c_author`, `c_img`, `c_duration`, `c_price`, `c_originalprice`) VALUES
(5, 'Learn Programming in C# easy way', 'C# is an object-oriented, component-oriented programming language. C# provides language constructs to directly support these concepts, making C# a natural language in which to create and use software components.', 'Team Smith', '../assets/image/czc022dw8m1g1peoenpm.png', '20 hours', 40, 55),
(6, 'Learn Programming in Django in Easy Way', 'Django is a high-level Python web framework that enables rapid development of secure and maintainable websites. Built by experienced developers, Django takes care of much of the hassle of web development, so you can focus on writing your app without needing to reinvent the wheel.', 'Moeen Ali', '../assets/image/django.jpg', '17 Hours', 340, 440),
(7, 'Learn Programming in Python in Easy Way', 'Python is a computer programming language often used to build websites and software, automate tasks, and conduct data analysis. Python is a general-purpose language, meaning it can be used to create a variety of different programs and isn\'t specialized for any specific problems.', 'Adil Rashid', '../assets/image/Python.png', '19 Hours', 100, 160),
(8, 'Learn Programming in C++ in Easy Way', 'C++ is very easy coursse', 'Team Smith', '../assets/image/C++ COURSE IN BANGLA.jpg', '17 Hours', 350, 440),
(9, 'Learn Programming in C in Easy Way', 'C is very basic language for computer programming language', 'Jo Root', '../assets/image/C++ COURSE IN BANGLA.jpg', '20 hours', 320, 440),
(10, 'Learn Programming in JavaScript in Easy Way', 'This is an easy course for Web Designer.', 'Parvez Mosarof', '../assets/image/java.jpg', '30 Hours', 350, 500);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_content` text NOT NULL,
  `stu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(1, 'I\'m a good student', 81),
(5, 'I need all the Courses..', 81),
(6, 'Python is easy.. ', 81),
(7, 'I need JS full course', 81),
(8, 'This is my new account. I\'m a web app developer.', 83);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `l_id` int(11) NOT NULL,
  `l_name` text NOT NULL,
  `l_desc` text NOT NULL,
  `l_link` text NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`l_id`, `l_name`, `l_desc`, `l_link`, `c_id`, `c_name`) VALUES
(2, 'Introduction to C#', 'This is first lesson', '../assets/video/video (2160p).mp4', 5, 'Learn Programming in C# easy way'),
(3, 'Introduction to JavaScript', 'This is first part', '../assets/video/video (2160p).mp4', 10, 'Learn Programming in JavaScript in Easy Way'),
(4, 'Object Oriented Part', 'This is Second part', '../assets/video/video (2160p).mp4', 10, 'Learn Programming in JavaScript in Easy Way'),
(5, 'Chapter 3 ', 'Learn Javascript', '../assets/video/video (2160p).mp4', 10, 'Learn Programming in JavaScript in Easy Way'),
(6, 'Chapter 2', 'Learn Advance Basuc', '../assets/video/ImageGallery.mp4', 5, 'Learn Programming in C# easy way');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_contact` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_insname` varchar(255) NOT NULL,
  `stu_major` varchar(255) NOT NULL,
  `stu_password` varchar(255) NOT NULL,
  `stu_occ` varchar(255) NOT NULL,
  `stu_img` text NOT NULL,
  `stu_paddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_contact`, `stu_email`, `stu_insname`, `stu_major`, `stu_password`, `stu_occ`, `stu_img`, `stu_paddress`) VALUES
(81, 'Parvez Hossain', '01630411972', 'example@gmail.com', 'IUBAT', 'Software Engineering', '$2y$10$kPGMinZgTUr3aDMUAwWYv.odShKVq9Z1vEMhPLf4D2AShgz6flq3C', 'Web Developer', '2213337.jpg', 'Uttara 11, Dhaka 1230'),
(83, 'Parvez Mosarof', '01630411972', 'wwwabc@gmail.com', 'BBCD', 'IITS', '$2y$10$qQupt5k61benMxvbA.GKt.yVAVyt99FQQfQS/wkgsEf5YMxW0QP3O', 'Network Architecture', 'pinup-1729057_64.png', 'Rampura, Dhaka 1229'),
(85, 'Mitu', '01698756324', 'cas@gmail.com', 'NUS', 'MKT', '$2y$10$mTeW8RK1SUMWGQsvzAsAX.Z2YhrXgcxyAToAUuFRlwwo4hry488A6', '', '', ''),
(86, 'Rafsan', '01630411999', 'bbc@gmail.com', 'IUBAE', 'Web Designer', '$2y$10$8n.POyZ7imu1O6ay.SCCouEI4TWdtbgAvV7lB6bid0qYtwEoirJuS', 'A. Developer', 'pinup-1729057_64.png', 'Mirpur 10, Dhaka 1225'),
(87, 'Mitu', '01630417777', 'examples@gmail.com', 'IUBATD', 'Web Designer', '$2y$10$987AxRZ2.P2oYoENFcR7wOhm1gocYTAyj42JXU7z8V35UwCa.2XeC', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ctus_id`);

--
-- Indexes for table `courseorder`
--
ALTER TABLE `courseorder`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ctus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `courseorder`
--
ALTER TABLE `courseorder`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
