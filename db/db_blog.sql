-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 12:38 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'JavaScript'),
(4, 'C#'),
(5, 'lol home');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(2, 'Arnab', 'Das', 'anik6881@gmail.com', 'dacccZ', 1, '2018-03-10 18:05:01'),
(3, 'Anik', 'Das', 'anik6881@gmail.com', 'INSPIRATION\r\nSorry, no INSPIRATION ads are available for you at the moment. Check back tomorrow.\r\nDELIGHT\r\nSorry, no DELIGHT ads are available for you at the moment. Check back tomorrow.', 0, '2018-03-11 15:11:08'),
(5, 'java', 'script', 'JavaScript@gmail.com', 'Senior Software Developer (Sun Certified JAVA Programmer):Since 10 years he has been working as an', 0, '2018-03-13 09:57:20'),
(6, 'PHP', 'no', 'e8@vektik.com', 'JAVA &amp; PHP Developer (Oracle Certified JAVA Programmer) and the founder of TWLP Learning Solutions. - a online guide...', 1, '2018-03-14 04:25:28'),
(7, 'FreeBitco', '.in', 'FreeBitco@gmail.com', 'Please double-check that the address you have copied is correct before sending bitcoins from your wallet since there...', 0, '2018-03-14 04:26:57'),
(8, 'Arnab', 'Das', 'JmidarEmpty@gmail.com', 'dc xzc cz', 0, '2018-03-23 14:13:33'),
(9, 'lol', 'lol', 'lol@gmail.com', 'lol', 0, '2018-10-29 14:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright JmidarArnab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'any...', '<div class=\"wc_box_content\">\r\n<ul>\r\n<li>Multiple ways to earn (Ex: Offerwalls, PTSU etc)</li>\r\n<li>Affordable and lower than industry standard advertising rates</li>\r\n<li>Trust Grid for cheap advertising</li>\r\n<li>Many monthly contest for more earning.</li>\r\n<li>Minimum cashout of $3.00</li>\r\n</ul>\r\n</div>\r\n<div class=\"wc_signup_but\">MY ACCOUNT PANEL</div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(5, 0, 'FreeBitco.in', '<p>Please double-check that the address you have copied is correct before sending bitcoins from your wallet since there are some malware that can change the deposit address after you copy it, resulting in coins being sent to some other address and not your deposit address.</p>\r\n<p>Your previously generated bitcoin addresses are listed below. Any deposits sent to these addresses will also be credited to your FreeBitco.in account after 1 confirmation lol lol lol lol lol lol.</p>', 'Upload/59a3c0b6d5.jpg', 'Jmi...', 'Bitcoins', '2018-02-24 13:59:57', 0),
(6, 0, 'lol', '<p>Please double-check that the address you have copied is correct before sending bitcoins from your wallet since there are some malware that can change the deposit address after you copy it, resulting in coins being sent to some other address and not your deposit address.</p>\r\n<p>Your previously generated bitcoin addresses are listed below. Any deposits sent to these&nbsp;</p>', 'Upload/ff4b5923ad.png', 'lol', 'lol', '2018-08-29 12:00:05', 0),
(7, 3, 'lol', '<p>ddd</p>', 'Upload/578dec30f5.png', 'dd', 'ddd', '2018-08-29 12:20:27', 0),
(8, 4, 'aaa', '<p>gsdgdsgd hfdhdfhfhnhgfvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; vvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>\r\n<p>vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv</p>\r\n<p>ggggggggggggggggggggggggggggggg</p>\r\n<p>dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>', 'Upload/c72e8d8de1.png', 'dhdfh', 'fsff', '2018-08-29 13:10:08', 0),
(9, 1, 'ssss', '<p>hfhfdh</p>', 'Upload/6d6b879067.jpg', 'Jmidar', 'hfhfh', '2018-10-30 05:55:11', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(1, '1', 'Upload/Slider/e4f3dc7113.jpg'),
(2, '2', 'Upload/Slider/729800392a.jpg'),
(3, '3', 'Upload/Slider/cb4417735c.jpg'),
(4, '4', 'Upload/Slider/e4e5cab9bc.jpg'),
(5, '5', 'Upload/Slider/cbdf2c2554.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(2, '', 'Jmi', 'jmi', '', '', 0),
(6, '', 'anik6881', 'a8d729744cce939323d37f1789be0d4f', '', '', 2),
(7, '', 'JmidarEmpty', '27df582040a3bb1ee04affe92d91cf6a', '', '', 1),
(8, '', 'Jmidar', 'd0970714757783e6cf17b26fb8e2298f', '', '', 0),
(9, 'Jmidar', 'jmi', '9eb0d3c6c8f0e798a9cb8b3f1d92dafc', 'jmi@gmail.com', '<p>nmbghcvhjgv</p>', 1),
(10, '', 'Arnab', 'bf9ea75bd1d06d64c834e63a7e1ef0cf', '', '', 2),
(11, '', 'arnab', 'bf9ea75bd1d06d64c834e63a7e1ef0cf', '', '', 1),
(12, '', 'arnab.das682@gmail.com', 'c161e92ed7bdb5e2ba4cef19e2d1d7b0', '', '', 1),
(13, '', 'jmidar', '698d51a19d8a121ce581499d7b701668', '', '', 1),
(14, '', 'jmidar', '698d51a19d8a121ce581499d7b701668', '', '', 1),
(15, '', 'aaaa', 'b59c67bf196a4758191e42f76670ceba', '', '', 2),
(16, '', 'new', 'e44b455ca13934ebb2906f3796b138f1', '', '', 2),
(17, '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'our set title', 'our set slogan', 'Upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
