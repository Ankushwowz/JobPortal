-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 07:45 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelencer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `job_type` int(11) DEFAULT NULL,
  `job_category` int(11) DEFAULT NULL,
  `job_amount` varchar(255) DEFAULT NULL,
  `job_description` longtext,
  `job_file` varchar(255) DEFAULT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  FULLTEXT KEY `job_title` (`job_title`),
  FULLTEXT KEY `job_description` (`job_description`),
  FULLTEXT KEY `job_title_2` (`job_title`),
  FULLTEXT KEY `job_description_2` (`job_description`),
  FULLTEXT KEY `job_description_3` (`job_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `user_id`, `job_title`, `job_type`, `job_category`, `job_amount`, `job_description`, `job_file`, `status`, `created_at`) VALUES
(1, 4, 'Php Developer', 1, 1, '5000', '<p>asdsad</p>\r\n', '', 'A', '2019-09-12'),
(2, 2, 'wordpress customize theme', 1, 1, '5000', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel nunc. Proin accumsan elit sed neque euismod fringilla. Curabitur lobortis nunc velit, et fermentum urna dapibus non. Vivamus magna lorem, elementum id gravida ac, laoreet tristique augue. Maecenas dictum lacus eu nunc porttitor, ut hendrerit arcu efficitur.</p>\r\n\r\n<h3>Education + Experience</h3>\r\n\r\n<ul>\r\n	<li>M.B.S / M.B.A under National University with CA course complete.</li>\r\n	<li>3 or more years of professional design experience</li>\r\n	<li>Excellent communication skills, most notably a demonstrated ability to solicit and address creative and design feedback</li>\r\n	<li>Masters of library science any Green University.</li>\r\n	<li>BA/BS degree in a technical field or equivalent practical experience.</li>\r\n	<li>Ability to work independently and to carry out assignments to completion within parameters of instructions given, prescribed routines, and standard accepted practices</li>\r\n</ul>\r\n\r\n<h3>Responsibilities</h3>\r\n\r\n<ul>\r\n	<li>Explore and design dynamic and compelling consumer experiences.</li>\r\n	<li>Have sound knowledge of commercial activities.</li>\r\n	<li>Build next-generation web applications with a focus on the client side.</li>\r\n	<li>The applicants should have experience in the following areas</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'job-post_10245-1568348171.jpeg', 'A', '2019-09-13'),
(3, 4, 'New Jobs', 1, 2, '100', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra a. Aliquam pellentesque nibh et nibh feugiat gravida. Maecenas ultricies, diam vitae semper placerat, velit risus accumsan nisl, eget tempor lacus est vel nunc. Proin accumsan elit sed neque euismod fringilla. Curabitur lobortis nunc velit, et fermentum urna dapibus non. Vivamus magna lorem, elementum id gravida ac, laoreet tristique augue. Maecenas dictum lacus eu nunc porttitor, ut hendrerit arcu efficitur.</p>\r\n\r\n<h3>Education + Experience</h3>\r\n\r\n<ul>\r\n	<li>M.B.S / M.B.A under National University with CA course complete.</li>\r\n	<li>3 or more years of professional design experience</li>\r\n	<li>Excellent communication skills, most notably a demonstrated ability to solicit and address creative and design feedback</li>\r\n	<li>Masters of library science any Green University.</li>\r\n	<li>BA/BS degree in a technical field or equivalent practical experience.</li>\r\n	<li>Ability to work independently and to carry out assignments to completion within parameters of instructions given, prescribed routines, and standard accepted practices</li>\r\n</ul>\r\n\r\n<h3>Responsibilities</h3>\r\n\r\n<ul>\r\n	<li>Explore and design dynamic and compelling consumer experiences.</li>\r\n	<li>Have sound knowledge of commercial activities.</li>\r\n	<li>Build next-generation web applications with a focus on the client side.</li>\r\n	<li>The applicants should have experience in the following areas</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'job-post_10245-1568348171.jpeg', 'A', '2019-09-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
