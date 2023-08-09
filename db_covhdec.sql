-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 04:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_covhdec`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_info`
--

CREATE TABLE `tbl_patient_info` (
  `id` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `age` mediumint(3) NOT NULL,
  `mobileNo` varchar(15) NOT NULL,
  `email_add` varchar(100) NOT NULL,
  `body_temp` varchar(10) NOT NULL,
  `cov_diag` varchar(15) NOT NULL,
  `cov_enc` varchar(15) NOT NULL,
  `vax` varchar(15) NOT NULL,
  `createat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient_info`
--

INSERT INTO `tbl_patient_info` (`id`, `fullname`, `nationality`, `gender`, `age`, `mobileNo`, `email_add`, `body_temp`, `cov_diag`, `cov_enc`, `vax`, `createat`) VALUES
(119, 'Adrian Gutierrez', 'Filipino', 'Male', 22, '09815793724', 'gutierrezadrianb23@gmail.com', '36.1', 'NO', 'NO', 'YES', '2023-08-09'),
(120, 'Nicko Albes', 'Filipino', 'Male', 24, '+639076452856', 'nickoalbes@gmail.com', '36.7', 'NO', 'NO', 'YES', '2023-08-09'),
(121, 'Al John Villareal', 'Filipino', 'Male', 27, '+6398149473529', 'villarealaljohn@gmail.com', '35.9', 'NO', 'NO', 'YES', '2023-08-09'),
(122, 'Uvuvwevwevwe Onyetenyevwe Ugwemuhwem Osas', 'African', 'Male', 22, '027 975 8926', 'uvuvwevwevweouo@gmail.com', '37.3', 'NO', 'YES', 'NO', '2023-08-09'),
(123, 'Beetle Juice', 'American', 'Male', 52, '555 973 5649', 'beetle_red@gmail.com', '36.0', 'NO', 'NO', 'YES', '2023-08-09'),
(124, 'Bully Maguire', 'American', 'Male', 46, '555 937 7593', 'dirtinureye@gmail.com', '35.1', 'YES', 'NO', 'YES', '2023-08-09'),
(125, 'Terry Crews ', 'American', 'Male', 54, '555 971 7305', 'terry_boy@gmail.com', '36.0', 'NO', 'NO', 'YES', '2023-08-09'),
(126, 'Lil AGz', 'American', 'Male', 16, '555 974 8461', 'oooh_sayless@gmail.com', '37.8', 'YES', 'YES', 'YES', '2023-08-09'),
(127, 'IM Tyrone', 'Canadian', 'Male', 54, '+12846372164', 'im_tyrone@gmail.com', '38.1', 'YES', 'NO', 'NO', '2023-08-09'),
(128, 'Jack Cole', 'British', 'Male', 15, '44 97 786 9574', 'jcole@gmail.com', '35.7', 'YES', 'YES', 'YES', '2023-08-09'),
(129, 'Karen', 'American', 'Male', 44, '555 096 7452', 'stop_filming_me@gmail.com', '40.5', 'YES', 'YES', 'YES', '2023-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `fullname`, `username`, `password`, `email_address`) VALUES
(1, 'Adrian Gutierrez', 'AGoat23', 'ABGutierrez3223', 'gutierrezadrianmb23@gmail.com'),
(2, 'Nicko Albes', 'Nicko_Hue', 'nickoni', 'nicko@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_patient_info`
--
ALTER TABLE `tbl_patient_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
