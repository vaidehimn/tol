-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 06:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tol`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `amount`, `payment_status`, `payment_id`, `added_on`) VALUES
(1, 'doc1', 0, 'complete', 'pay_JToAQtaW4eVicM', '2022-05-11 07:39:19'),
(2, 'jo', 0, 'complete', 'pay_JToDI6ZxpNXHn6', '2022-05-11 07:41:57'),
(3, 'doc1', 0, 'pending', '', '2022-05-11 12:19:07'),
(4, 'dsdsz', 0, 'pending', '', '2022-05-11 12:23:35'),
(5, 'dsdsz', 0, 'pending', '', '2022-05-11 12:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `assign_id` int(20) NOT NULL,
  `doct_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`assign_id`, `doct_id`, `cust_id`) VALUES
(7, 68, 66),
(8, 67, 59),
(9, 69, 74),
(10, 68, 72),
(11, 75, 73),
(12, 69, 78),
(13, 69, 77),
(14, 68, 91);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `book_id` int(10) NOT NULL,
  `book_regid` int(20) NOT NULL,
  `book_address` varchar(100) NOT NULL,
  `book_city` varchar(50) NOT NULL,
  `book_pincode` varchar(10) NOT NULL,
  `book_treatment` varchar(100) NOT NULL,
  `book_room` varchar(50) NOT NULL,
  `book_adate` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `reg_id`) VALUES
(23, 1, 59),
(24, 9, 72),
(26, 1, 66),
(27, 1, 74);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctdet`
--

CREATE TABLE `tbl_doctdet` (
  `doctor_id` int(10) NOT NULL,
  `doctor_address` varchar(50) NOT NULL,
  `doctor_gender` varchar(30) NOT NULL,
  `doctor_dob` varchar(30) NOT NULL,
  `doctor_spec` varchar(50) NOT NULL,
  `doctor_quali` varchar(255) NOT NULL,
  `doctor_idp` varchar(255) NOT NULL,
  `doctor_photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctdet`
--

INSERT INTO `tbl_doctdet` (`doctor_id`, `doctor_address`, `doctor_gender`, `doctor_dob`, `doctor_spec`, `doctor_quali`, `doctor_idp`, `doctor_photo`) VALUES
(20, 'sreeja sadanam', 'Female', '2022-03-30', 'kjklma', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(20) NOT NULL,
  `feedback_regid` int(20) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_regid`, `feedback`) VALUES
(6, 59, 'Good'),
(16, 66, 'Nice'),
(17, 72, 'No parking'),
(18, 73, 'Good treatment'),
(19, 74, 'Nice service'),
(20, 78, 'hvhjvgn'),
(21, 91, 'hgfch');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavedoc`
--

CREATE TABLE `tbl_leavedoc` (
  `ld_id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `ld_date` varchar(50) NOT NULL,
  `ld_reason` varchar(50) NOT NULL,
  `ld_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leavedoc`
--

INSERT INTO `tbl_leavedoc` (`ld_id`, `reg_id`, `ld_date`, `ld_reason`, `ld_status`) VALUES
(1, 75, '2022-05-18', 'oskkao', 1),
(6, 68, '2022-05-18', 'tyty', 1),
(7, 68, '2022-05-31', 'd2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leavestaff`
--

CREATE TABLE `tbl_leavestaff` (
  `ls_id` int(20) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `ls_date` varchar(20) NOT NULL,
  `ls_reason` varchar(50) NOT NULL,
  `ls_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_leavestaff`
--

INSERT INTO `tbl_leavestaff` (`ls_id`, `reg_id`, `ls_date`, `ls_reason`, `ls_status`) VALUES
(2, 70, '2022-05-17', 'qwerty', 1),
(4, 70, '2022-05-25', 'tfthffgtyt', 0),
(5, 70, '2022-05-18', 'iuiuiu', 0),
(6, 70, '2022-05-18', 'iuiuiu', 2),
(8, 70, '2022-05-25', 'hjhjhj', 2),
(10, 70, '2022-05-26', 's1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(50) NOT NULL,
  `reg_id` int(50) NOT NULL,
  `type_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `reg_id`, `type_id`) VALUES
(31, 45, 3),
(45, 59, 4),
(52, 66, 4),
(53, 67, 1),
(54, 68, 1),
(55, 69, 1),
(56, 70, 2),
(57, 71, 2),
(58, 72, 4),
(59, 73, 4),
(60, 74, 4),
(61, 75, 1),
(62, 76, 2),
(63, 77, 4),
(64, 78, 4),
(72, 86, 2),
(77, 91, 4),
(78, 73, 4),
(79, 73, 4),
(80, 94, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maintenance`
--

CREATE TABLE `tbl_maintenance` (
  `m_id` int(20) NOT NULL,
  `m_room` varchar(100) NOT NULL,
  `m_problem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_maintenance`
--

INSERT INTO `tbl_maintenance` (`m_id`, `m_room`, `m_problem`) VALUES
(4, '101', 'Blub not working'),
(5, '201', 'Blub not working');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(150) NOT NULL,
  `p_age` int(20) NOT NULL,
  `p_prob` varchar(150) NOT NULL,
  `p_pres` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`p_id`, `p_name`, `p_age`, `p_prob`, `p_pres`) VALUES
(1, 'vai', 89, 'uiuiu', 'fghfgfgh'),
(2, 'qw', 20, 'iuiui', 'popop'),
(4, 'hv', 23, 'uuy', 'iui');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_amount` varchar(10) NOT NULL,
  `product_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_image`, `product_amount`, `product_status`) VALUES
(1, 'Face Wash', 'face.jpg', '750', 0),
(2, 'Hair Oil', 'oil.jpg', '250', 0),
(9, 'Cream', 'mois.jpg', '250', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `reg_id` int(11) NOT NULL,
  `reg_name` varchar(15) NOT NULL,
  `reg_email` varchar(50) NOT NULL,
  `reg_phone` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`reg_id`, `reg_name`, `reg_email`, `reg_phone`, `password`, `status`) VALUES
(45, 'admin', 'admin@gmail.com', '1231231232', '21232f297a57a5a743894a0e4a801fc3', 1),
(59, 'vai', 'vai@gmail.com', '7559989013', '962012d09b8170d912f0669f6d7d9d07', 1),
(66, 'jyothi', 'jyothi@gmail.com', '5599852362', '202cb962ac59075b964b07152d234b70', 0),
(67, 'doctor1', 'doctor1@gmail.com', '4565236563', '202cb962ac59075b964b07152d234b70', 0),
(68, 'doctor2', 'doctor2@gmail.com', '3636365645', '202cb962ac59075b964b07152d234b70', 0),
(69, 'doctor3', 'doctor3@gmail.com', '1452366336', '202cb962ac59075b964b07152d234b70', 0),
(70, 'staff1', 'staff1@gmail.com', '3656563445', '202cb962ac59075b964b07152d234b70', 0),
(71, 'staff2', 'staff2@gmail.com', '1231231231', '202cb962ac59075b964b07152d234b70', 0),
(72, 'mannu', 'mannnu@gmail.com', '7559989013', '202cb962ac59075b964b07152d234b70', 0),
(73, 'rose', 'rose@gmail.com', '1231231231', '202cb962ac59075b964b07152d234b70', 0),
(74, 'sona', 'sona@gmail.com', '5599852362', '202cb962ac59075b964b07152d234b70', 0),
(75, 'doctor4', 'doctor4@gmail.com', '5599852362', 'be83ab3ecd0db773eb2dc1b0a17836a1', 0),
(76, 'staff', 'staff@gmail.com', '1231231231', '202cb962ac59075b964b07152d234b70', 0),
(77, 'liyan', 'liyan@gmail.com', '1111111111', '202cb962ac59075b964b07152d234b70', 0),
(78, 'Joe', 'joe@gmail.com', '1231231232', '202cb962ac59075b964b07152d234b70', 0),
(86, 'staff3', 'staff3@gmail.com', '9639635265', '202cb962ac59075b964b07152d234b70', 0),
(91, 'meenu philip', 'meenu@gmail.com', '8129517046', 'b945b0972fbc74fabeac68b23600cf00', 0),
(92, 'rose', 'rose@gmail.com', '1231231232', '202cb962ac59075b964b07152d234b70', 0),
(93, 'rose', 'rose@gmail.com', '1231231232', '202cb962ac59075b964b07152d234b70', 0),
(94, 'mark', 'mark@gmail.com', '9599890233', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `room_id` int(20) NOT NULL,
  `room_name` varchar(30) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `room_amount` varchar(30) NOT NULL,
  `room_status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `room_image`, `room_amount`, `room_status`) VALUES
(26, 'Pool Suite', 'l.jpg', 'Rs2500', 1),
(21, 'Garden Suite', 'm.jpg', 'Rs2000', 0),
(22, 'Patio Room', '13.jpg', 'Rs1500', 1),
(23, 'Delux Room', 'p.jpg', 'Rs2700', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffdet`
--

CREATE TABLE `tbl_staffdet` (
  `staff_id` int(10) NOT NULL,
  `staff_address` varchar(50) NOT NULL,
  `staff_gender` varchar(30) NOT NULL,
  `staff_dob` varchar(30) NOT NULL,
  `staff_spec` varchar(50) NOT NULL,
  `staff_quali` varchar(255) NOT NULL,
  `staff_idp` varchar(255) NOT NULL,
  `staff_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE `tbl_treatment` (
  `treatment_id` int(11) NOT NULL,
  `treatment_name` varchar(30) NOT NULL,
  `treatment_image` varchar(255) NOT NULL,
  `treatment_day` varchar(30) NOT NULL,
  `treatment_amount` varchar(30) NOT NULL,
  `treatment_status` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_treatment`
--

INSERT INTO `tbl_treatment` (`treatment_id`, `treatment_name`, `treatment_image`, `treatment_day`, `treatment_amount`, `treatment_status`) VALUES
(19, 'Immunisation Package  ', 't6.jpg', '14Days   ', 'Rs 4000   ', 1),
(18, 'Beauty Care Package', 't5.jpg', '20Days', 'Rs 7200', 0),
(17, 'Rejuvenation Package', 't2.jpg', '12Days', 'Rs 3500', 0),
(20, 'Slimming Package', 'Ss.jpg', '35Days', 'Rs 15000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `type_id` int(20) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`type_id`, `type_name`) VALUES
(1, 'Doctor'),
(2, 'Staff'),
(3, 'admin'),
(4, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`assign_id`),
  ADD KEY `assign_doctor` (`doct_id`),
  ADD KEY `assign_cust` (`cust_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id_fk` (`product_id`),
  ADD KEY `reg_id_fk` (`reg_id`);

--
-- Indexes for table `tbl_doctdet`
--
ALTER TABLE `tbl_doctdet`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `reg_feedback` (`feedback_regid`);

--
-- Indexes for table `tbl_leavedoc`
--
ALTER TABLE `tbl_leavedoc`
  ADD PRIMARY KEY (`ld_id`),
  ADD KEY `reg` (`reg_id`);

--
-- Indexes for table `tbl_leavestaff`
--
ALTER TABLE `tbl_leavestaff`
  ADD PRIMARY KEY (`ls_id`),
  ADD KEY `regg` (`reg_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `reg_type` (`reg_id`),
  ADD KEY `login_type` (`type_id`);

--
-- Indexes for table `tbl_maintenance`
--
ALTER TABLE `tbl_maintenance`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_staffdet`
--
ALTER TABLE `tbl_staffdet`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `assign_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_doctdet`
--
ALTER TABLE `tbl_doctdet`
  MODIFY `doctor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_leavedoc`
--
ALTER TABLE `tbl_leavedoc`
  MODIFY `ld_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_leavestaff`
--
ALTER TABLE `tbl_leavestaff`
  MODIFY `ls_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_maintenance`
--
ALTER TABLE `tbl_maintenance`
  MODIFY `m_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_staffdet`
--
ALTER TABLE `tbl_staffdet`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD CONSTRAINT `assign_cust` FOREIGN KEY (`cust_id`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_doctor` FOREIGN KEY (`doct_id`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `reg_feedback` FOREIGN KEY (`feedback_regid`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leavedoc`
--
ALTER TABLE `tbl_leavedoc`
  ADD CONSTRAINT `reg` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_leavestaff`
--
ALTER TABLE `tbl_leavestaff`
  ADD CONSTRAINT `regg` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `login_type` FOREIGN KEY (`type_id`) REFERENCES `tbl_usertype` (`type_id`),
  ADD CONSTRAINT `reg_type` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
