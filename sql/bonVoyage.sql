-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2014 at 11:29 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bonvoyage`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE IF NOT EXISTS `board` (
`board_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `board_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `board_cat` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`comment_id` int(8) NOT NULL,
  `pin_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `content` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `comment_time` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
`follow_id` int(8) NOT NULL,
  `following_user_id` int(8) NOT NULL,
  `followed_user_id` int(8) NOT NULL,
  `follow_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `like_pin`
--

CREATE TABLE IF NOT EXISTS `like_pin` (
`like_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `pin_id` int(8) NOT NULL,
  `like_time` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE IF NOT EXISTS `pin` (
`pin_id` int(8) NOT NULL,
  `user_id` int(8) NOT NULL,
  `image_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `board_id` int(8) DEFAULT NULL,
  `pin_time` datetime NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `cost` int(8) NOT NULL,
  `place` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lon` float(10,6) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(8) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `about` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `head_pic` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gender` varchar(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
 ADD PRIMARY KEY (`board_id`), ADD KEY `user_board_index` (`user_id`), ADD KEY `board_index` (`board_cat`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `pin_comment_index` (`pin_id`), ADD KEY `user_comment_index` (`user_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
 ADD PRIMARY KEY (`follow_id`), ADD KEY `followed_index` (`followed_user_id`), ADD KEY `following_index` (`following_user_id`);

--
-- Indexes for table `like_pin`
--
ALTER TABLE `like_pin`
 ADD PRIMARY KEY (`like_id`), ADD KEY `like_user_index` (`user_id`), ADD KEY `like_pin_index` (`pin_id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
 ADD PRIMARY KEY (`pin_id`), ADD KEY `pin_delete_key` (`board_id`), ADD KEY `use_board_index` (`user_id`,`board_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD KEY `name_index` (`user_name`), ADD KEY `email_index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
MODIFY `board_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
MODIFY `follow_id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `like_pin`
--
ALTER TABLE `like_pin`
MODIFY `like_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
MODIFY `pin_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `board`
--
ALTER TABLE `board`
ADD CONSTRAINT `board_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `pin_comment_key` FOREIGN KEY (`pin_id`) REFERENCES `pin` (`pin_id`) ON DELETE CASCADE;

--
-- Constraints for table `like_pin`
--
ALTER TABLE `like_pin`
ADD CONSTRAINT `like_key` FOREIGN KEY (`pin_id`) REFERENCES `pin` (`pin_id`) ON DELETE CASCADE;

--
-- Constraints for table `pin`
--
ALTER TABLE `pin`
ADD CONSTRAINT `board_pin_key` FOREIGN KEY (`board_id`) REFERENCES `board` (`board_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `pin_delete_key` FOREIGN KEY (`board_id`) REFERENCES `board` (`board_id`) ON DELETE CASCADE,
ADD CONSTRAINT `pin_key` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
