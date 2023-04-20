-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 01:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fand`
--

-- --------------------------------------------------------

--
-- Table structure for table `acomments`
--

CREATE TABLE `acomments` (
  `caid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_upload`
--

CREATE TABLE `app_upload` (
  `aid` int(11) NOT NULL,
  `uid` int(255) NOT NULL,
  `appname` text NOT NULL,
  `appsize` int(3) NOT NULL,
  `emc` int(255) NOT NULL,
  `emsf` text NOT NULL,
  `applogo` varchar(255) NOT NULL,
  `applink` varchar(255) NOT NULL,
  `genre` text NOT NULL,
  `appgenretype` text NOT NULL,
  `gamegenretype` text NOT NULL,
  `devcomp` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `comment` text NOT NULL,
  `rating` int(2) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `feedname` text NOT NULL,
  `feedemail` varchar(255) NOT NULL,
  `roc` text NOT NULL,
  `feedss` varchar(255) NOT NULL,
  `mou` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iar`
--

CREATE TABLE `iar` (
  `inp` int(11) NOT NULL,
  `ars` int(11) DEFAULT NULL,
  `dc` int(11) DEFAULT NULL,
  `uig` int(11) DEFAULT NULL,
  `smt` int(11) DEFAULT NULL,
  `oa` int(11) DEFAULT NULL,
  `aid` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inr`
--

CREATE TABLE `inr` (
  `inc` int(11) NOT NULL,
  `rrn` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ncomments`
--

CREATE TABLE `ncomments` (
  `cnid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news_upload`
--

CREATE TABLE `news_upload` (
  `nid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `area` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `doi` date NOT NULL,
  `ngenre` text NOT NULL,
  `ninfo` text NOT NULL,
  `ncomment` text NOT NULL,
  `nrating` int(2) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `pimg` varchar(50000) NOT NULL,
  `lmail` varchar(500) NOT NULL,
  `amail` varchar(500) NOT NULL,
  `addr` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobno` int(15) NOT NULL,
  `curind` text NOT NULL,
  `workas` text NOT NULL,
  `offcity` text NOT NULL,
  `uid` int(11) NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suli`
--

CREATE TABLE `suli` (
  `uid` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `pass` varchar(5000) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acomments`
--
ALTER TABLE `acomments`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `userid5` (`uid`),
  ADD KEY `appid2` (`aid`);

--
-- Indexes for table `app_upload`
--
ALTER TABLE `app_upload`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `userid` (`uid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `userid3` (`uid`);

--
-- Indexes for table `iar`
--
ALTER TABLE `iar`
  ADD PRIMARY KEY (`inp`),
  ADD KEY `appid` (`aid`);

--
-- Indexes for table `inr`
--
ALTER TABLE `inr`
  ADD PRIMARY KEY (`inc`),
  ADD KEY `newsid` (`nid`);

--
-- Indexes for table `ncomments`
--
ALTER TABLE `ncomments`
  ADD PRIMARY KEY (`cnid`),
  ADD KEY `userid6` (`uid`),
  ADD KEY `newsid2` (`nid`);

--
-- Indexes for table `news_upload`
--
ALTER TABLE `news_upload`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `userid2` (`uid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD UNIQUE KEY `lmail` (`lmail`),
  ADD KEY `userid4` (`uid`);

--
-- Indexes for table `suli`
--
ALTER TABLE `suli`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acomments`
--
ALTER TABLE `acomments`
  MODIFY `caid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_upload`
--
ALTER TABLE `app_upload`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iar`
--
ALTER TABLE `iar`
  MODIFY `inp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inr`
--
ALTER TABLE `inr`
  MODIFY `inc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ncomments`
--
ALTER TABLE `ncomments`
  MODIFY `cnid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_upload`
--
ALTER TABLE `news_upload`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suli`
--
ALTER TABLE `suli`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acomments`
--
ALTER TABLE `acomments`
  ADD CONSTRAINT `appid2` FOREIGN KEY (`aid`) REFERENCES `app_upload` (`aid`),
  ADD CONSTRAINT `userid5` FOREIGN KEY (`uid`) REFERENCES `suli` (`uid`);

--
-- Constraints for table `app_upload`
--
ALTER TABLE `app_upload`
  ADD CONSTRAINT `userid` FOREIGN KEY (`uid`) REFERENCES `suli` (`uid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `userid3` FOREIGN KEY (`uid`) REFERENCES `suli` (`uid`);

--
-- Constraints for table `iar`
--
ALTER TABLE `iar`
  ADD CONSTRAINT `appid` FOREIGN KEY (`aid`) REFERENCES `app_upload` (`aid`);

--
-- Constraints for table `inr`
--
ALTER TABLE `inr`
  ADD CONSTRAINT `newsid` FOREIGN KEY (`nid`) REFERENCES `news_upload` (`nid`);

--
-- Constraints for table `ncomments`
--
ALTER TABLE `ncomments`
  ADD CONSTRAINT `newsid2` FOREIGN KEY (`nid`) REFERENCES `news_upload` (`nid`),
  ADD CONSTRAINT `userid6` FOREIGN KEY (`uid`) REFERENCES `suli` (`uid`);

--
-- Constraints for table `news_upload`
--
ALTER TABLE `news_upload`
  ADD CONSTRAINT `userid2` FOREIGN KEY (`uid`) REFERENCES `suli` (`uid`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `userid4` FOREIGN KEY (`uid`) REFERENCES `suli` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
