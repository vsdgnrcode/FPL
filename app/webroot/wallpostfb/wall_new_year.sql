-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2012 at 02:52 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wall_new_year`
--

-- --------------------------------------------------------

--
-- Table structure for table `facebook_likes_track`
--

CREATE TABLE IF NOT EXISTS `facebook_likes_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `facebook_likes_track`
--


-- --------------------------------------------------------

--
-- Table structure for table `facebook_posts`
--

CREATE TABLE IF NOT EXISTS `facebook_posts` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `type` varchar(55) NOT NULL,
  `value` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `media` int(11) NOT NULL,
  `uip` varchar(222) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `cur_image` text NOT NULL,
  `post_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `facebook_posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `facebook_posts_comments`
--

CREATE TABLE IF NOT EXISTS `facebook_posts_comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `comments` text NOT NULL,
  `date_created` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `clikes` int(11) NOT NULL,
  `uip` varchar(222) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `facebook_posts_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `gender` varchar(2) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `email`, `password`, `firstname`, `lastname`, `picture`, `gender`) VALUES
(1, 'zeeshan@99points.info', '98adjooenldas98-k344n', 'Zeeshan', 'Rasool', '', 'm'),
(2, 'user1@99points.com', '98adjooenldas98-k344n', 'Marlena', 'Justin', '', 'f'),
(3, 'user2@99points.info', '98adjooenldas98-k344n', 'I Love this', 'Script', '99points.jpg', 'm'),
(4, 'user3@99points.info', '98adjooenldas98-k344n', '99Points', '', '', 'm');
