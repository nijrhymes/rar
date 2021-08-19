-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2021 at 02:20 PM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcodingc_rarafrica`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `ID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `accommodation` text NOT NULL,
  `university` text NOT NULL,
  `description` text NOT NULL,
  `rentprice` text NOT NULL,
  `roomtype` text NOT NULL,
  `facilities` text NOT NULL,
  `fname` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `accname` text NOT NULL,
  `nob` text NOT NULL,
  `accnum` text NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`ID`, `status`, `accommodation`, `university`, `description`, `rentprice`, `roomtype`, `facilities`, `fname`, `surname`, `email`, `telephone`, `image`, `accname`, `nob`, `accnum`, `dateCreated`, `sum`) VALUES
(1, 'Approved', 'NEK Contentment', 'Kings University College, AIT University', 'A green 4-storey building located behind Kings University college and within close proximity to AIT university.', '500', 'Single room,Entire Apartment', 'A/C,Fan,Kitchen,Canteen/Cafeteria', 'Samson', 'Maxwell', 'mxwll.jr@protonmail.com', '+233 241801366', '1.jpg', 'Samson Maxwell', 'Zenith Bank', '1017769987', '2021-08-07 02:29:40', 1),
(9, 'Approved', 'NEK Contentment', 'Kings University College', 'asdfghjkl', '300', 'Single room,Two bedroom,Entire Apartment', 'A/C,Fan,WiFi,Kitchen', 'Tachin', '', '', '', '2.jpg', 'UBA', '1017769987', '', '2021-08-07 02:29:46', 1),
(10, 'Approved', 'NEK Contentment', 'Kings University College', 'asdfghjkl', '300', 'Single room,Two bedroom,Entire Apartment', 'A/C,Fan,WiFi,Kitchen', 'Tachin', 'Volker', 'mxwdwf@gmail.com', '+233 241801366', '3.jpg', 'UBA', 'UBA', '1017769987', '2021-08-07 02:29:53', 1),
(18, 'Approved', 'St Nicholas Hostel', 'Federal University of Technology Owerri', 'A Big House with nice Property on it', '700', 'Entire Room', 'Kitchen', '', '', '', '', '4.jpg', '', '', '', '2021-08-07 02:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_assist`
--

CREATE TABLE `booking_assist` (
  `ID` int(11) NOT NULL,
  `country` text NOT NULL,
  `university` text NOT NULL,
  `accommodationid` text NOT NULL,
  `eta` text NOT NULL,
  `maxbudget` text NOT NULL,
  `fullname` text NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` text NOT NULL,
  `pickup` text NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_assist`
--

INSERT INTO `booking_assist` (`ID`, `country`, `university`, `accommodationid`, `eta`, `maxbudget`, `fullname`, `gender`, `email`, `telephone`, `pickup`, `datecreated`, `sum`) VALUES
(3, 'Ghana', 'Kings University College', 'Hostel', '31/07/2020', '$300', 'Samson Maxwell', '0', 'mxwll.jr@protonmail.com', '+233 241801366', 'Yes', '2020-07-14 12:24:54', 1),
(4, 'Ghana', 'Kings University College', 'Hostel', '31/07/2020', '$300', 'Samson Maxwell', '0', 'mxwll.jr@protonmail.com', '+233 241801366', 'Yes', '2020-07-14 12:26:50', 1),
(5, 'Ghana', 'Kings University College', 'Entire Apartment', '31/07/2020', '$300', 'Eleanor Nnodi', '0', 'mxwdwf@gmail.com', '+233 241801366', 'No', '2020-07-18 15:41:35', 1),
(6, 'Ghana', 'Kings University College', 'Entire Apartment', '31/07/2020', '$300', 'Eleanor Nnodi', '0', 'mxwdwf@gmail.com', '+233 241801366', 'No', '2020-07-18 15:44:30', 1),
(7, 'Ghana', 'Kings University College', 'Entire Apartment', '31/07/2020', '$300', 'Eleanor Nnodi', '0', 'mxwdwf@gmail.com', '+233 241801366', 'No', '2020-07-18 15:47:41', 1),
(8, 'Ghana', 'Kings University College', 'Hostel', '31/07/2020', '$300', 'Eleanor Nnodi', '0', 'mxwdwf@gmail.com', '0550021259', 'Yes', '2020-07-18 16:05:13', 1),
(9, 'Ghana', 'Kings University College', 'Hostel', '31/07/2020', '$300', 'Eleanor Nnodi', '0', 'mxwdwf@gmail.com', '0550021259', 'Yes', '2020-07-18 16:09:27', 1),
(10, 'Ghana', 'Accra Institute of Technology (AIT)', 'Single bedroom', '02/12/2020', '$300', 'Eleanor Nnodi', '0', 'mxwll_jr@protonmail.com', '+233 241801366', 'No', '2020-11-15 20:49:56', 1),
(11, 'Nigeria', 'University of Ghana', 'Two bedroom', '02/12/2020', '$200', 'Rachael Ireke', 'Female', 'rach4rach@gmail.com', '+233 245 087 966', 'Yes', '2020-11-15 21:21:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `ID` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` text NOT NULL,
  `university` text NOT NULL,
  `accommodation` text NOT NULL,
  `room_type` text NOT NULL,
  `eta` text NOT NULL,
  `duration` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `bookingref` varchar(255) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`ID`, `firstname`, `surname`, `email`, `telephone`, `university`, `accommodation`, `room_type`, `eta`, `duration`, `image`, `bookingref`, `DateCreated`, `sum`) VALUES
(2, 'Samson', 'Maxwell', 'mxwll.jr@protonmail.com', '+233 241801366', 'Kings University College', 'NEK Contentment', 'Two-bedroom', '31/07/2020', '5 Months', '', '3ea20a09dcbe808ee501c8ec0f594765', '2020-07-14 12:49:49', 1),
(3, 'Samson', 'Maxwell', 'mxwdwf@gmail.com', '516281793', 'kjhb', 'St Nicholas', 'Single room', '31/07/2020', '11 Months', '', '163fbd829f14e2989a120dfe79d7dcba', '2020-07-15 11:30:38', 1),
(4, 'Eleanor', 'fexe', 'mxwdwf@gmail.com', '+233 241801366', 'Kings University College', 'Big Apple', 'Entire Apartment', '31/07/2020', '8 Months', '', '540eab78a933b0db3e72849437f99949', '2020-07-18 16:35:49', 1),
(5, 'Eleanor', 'fexe', 'mxwdwf@gmail.com', '+233 241801366', 'Kings University College', 'Big Apple', 'Entire Apartment', '31/07/2020', '8 Months', '', '1ac7de19d53c678f69e6d334b29d5bcf', '2020-07-18 16:37:07', 1),
(6, 'Ihechu', 'Nnamdi', 'nijnnamdi@gmail.com', '+2347064222463', 'Federal University of Technology Owerri ', 'Ihechu Nnamdi', 'Hostel', '13/2/2022', '10 Months', '', '9124728f6bb57076dd8c967f58366bbb', '2021-07-26 00:27:02', 1),
(7, 'Ihechu', 'Nnamdi', 'nijnnamdi@gmail.com', '+2347064222463', 'Federal University of Technology Owerri ', 'Ihechu Nnamdi', 'Two-bedroom', '13/2/2022', '1 Year', '', '91be8cadab8020da46367c037f5afe07', '2021-07-27 10:00:48', 1),
(12, 'Last', 'Test', 'nijnnamdi@gmail.com', '07064222463', 'Federal University of Technology Owerri', 'St Nicholas Hostel', 'Single room', '14/09/202-', '1 Year', '8535E22B-D9B8-4AD6-959B-20F0A5C2F566.jpeg', 'fe67037abd72846066ba90bc98000aa5', '2021-08-14 22:01:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `FName` text NOT NULL,
  `SName` text NOT NULL,
  `Telephone` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `emailad` varchar(222) NOT NULL,
  `Password` text NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `Verified` tinyint(1) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `FName`, `SName`, `Telephone`, `Email`, `username`, `emailad`, `Password`, `vkey`, `Verified`, `DateCreated`) VALUES
(4, 'volka', 'volka', 1234, 'katchetachin@yahoo.com', '', '', '5ed202f43ee6c412296a6b3701344849', '350765240229d2abbd897af375c8dd17', 0, '2020-06-24 21:33:23'),
(5, 'joe', 'val', 12345, 'happic@gmail.com', '', '', '3a5ec8d3af8b4148b61d56eb19541e1e', 'a4742a2b8b188d0cf40b7c17bccab7ce', 0, '2020-06-24 21:34:16'),
(6, 'Eleanor', 'Nnodi', 550032129, 'eleanoresomchiaga@gmail.com', '', '', '96fe4d2a3c09bb630dd6210f0bcbf617', 'fec8129129dc6c5b55a6f40003306348', 0, '2020-06-26 20:28:59'),
(7, 'John', 'Kirkman', 550021258, 'mxwll.jr@protonmail.com', '', '', '180b0a9ec15b796e19648a94a57688de', 'd23af752882606cd3efb971d689072f8', 0, '2020-06-30 10:30:47'),
(8, '', '', 0, 'nijnnamdi@gmail.com', '', '', '$2y$10$NUMpxDRQ0Z.G7GxjWNFbyechkcI1N5owOSFUCRhUjrx84BBVhIHt.', '', 0, '2021-07-27 00:34:47'),
(9, '', '', 0, 'nijnnamdi@gmail.co', '', '', '$2y$10$pa1QSyRfBe43sK3izBFyZ.UMKvtBLc/d1Xsg7sLQxhaSA5TXMh79i', '', 0, '2021-07-27 00:37:53'),
(10, '', '', 0, 'admin@rar.org', '', '', '$2y$10$euY9lvPet1dbbtgDT2W0DejWvxeBZk1YWYVQ5KWFretTQlJhSoVYa', '', 0, '2021-08-13 02:35:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking_assist`
--
ALTER TABLE `booking_assist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `booking_assist`
--
ALTER TABLE `booking_assist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
