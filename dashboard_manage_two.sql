-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard_manage_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_des` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=active, 2=draft',
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `status`, `author`) VALUES
(12, 'Play', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 59),
(14, 'Food', '<p>ndustry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 1, 59),
(16, 'News', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 58),
(17, 'International ', '<p>ndustry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 2, 58),
(18, 'GYM', '<p>Hi, train-ops. When you submit this form, the owner will see your name and email address.</p>\r\n', 1, 67);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cmt_user` varchar(255) NOT NULL,
  `cmt_email` varchar(255) NOT NULL,
  `cmt_des` text NOT NULL,
  `cmt_status` int(11) NOT NULL DEFAULT 2 COMMENT '1=published, 2=draft',
  `cmt_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmt_id`, `post_id`, `cmt_user`, `cmt_email`, `cmt_des`, `cmt_status`, `cmt_date`) VALUES
(3, 21, 'Sakib', 'sakib@gmail.com', 'agjkafjk', 1, '2022-09-07 10:17:44'),
(4, 21, 'Sakib', 'sakib@gmail.com', 'adaKHBCJKAg', 2, '2022-09-07 10:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_tittle` varchar(255) NOT NULL,
  `post_des` text NOT NULL,
  `post_cat` int(11) NOT NULL,
  `post_image` text NOT NULL,
  `tag` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '1=published, 2=draft ',
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_tittle`, `post_des`, `post_cat`, `post_image`, `tag`, `author`, `status`, `post_date`) VALUES
(19, 'Fast-food ', '<p>Hi, train-ops. When you submit this form, the owner will see your name and email address.</p>\r\n', 14, '604503_photo-1526666923127-b2970f64b422.jpg', 'Bangla', 59, 1, '2022-08-17 11:20:34'),
(20, 'bangla vission product ', '<p>Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.Hi, train-ops. When you submit this form, the owner will see your name and email address.</p>\r\n', 17, '439411_download (6).jpg', 'bangla vission product ', 59, 1, '2022-08-17 11:21:32'),
(21, 'Alur Bazar ', '<p>Prime minister Sheikh Hasina on Monday offered land to Qatar in the special economic zones being set up across Bangladesh alongside seeking more help from the gulf country in the energy sector, particularly in LNG import.</p>\r\n\r\n<p>&quot;Bangladesh is setting up 100 special economic zones. Qatar can take land in the zones for its investors and entrepreneurs to make investments on a larger scale,&quot; she said.</p>\r\n', 16, '265493_download (7).jpg', 'Alur Bazar ', 59, 2, '2022-08-23 08:39:49'),
(22, 'BLD VS AFG ', '<p>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 12, '300738_1.jpg', 'BLD VS AFG , Play, Cricket', 59, 1, '2022-08-26 10:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_role` int(1) NOT NULL DEFAULT 3 COMMENT '1=admin, 2=editor, 3=author',
  `user_status` int(1) NOT NULL DEFAULT 2 COMMENT '1=active, 2=inactive',
  `profile` text DEFAULT NULL,
  `join_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `password`, `user_address`, `user_role`, `user_status`, `profile`, `join_date`) VALUES
(58, 'bangla', 'bangla@gmail.com', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 3, 2, '77865_WhatsApp Image 2022-06-16 at 1.13.20 AM.jpeg', '2022-06-17 10:48:34'),
(59, 'Ronah ', 'rohan@gmail.com', '01718139844', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'dhaka', 1, 1, '62957_images.jfif', '2022-06-17 10:50:14'),
(61, 'Hasib', 'hasib@gmail.com', NULL, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, 3, 2, NULL, '2022-06-17 13:09:22'),
(67, 'Najmus Sakib', 'najmussakib@gmail.com', '01818961280', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dhaka', 1, 1, '40362_IMG-20220616-WA0002 (1).jpg', '2022-07-29 10:52:04'),
(68, 'cddd', 'cdb@gmail.com', '01400312021', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Dhaka', 1, 1, '', '2022-07-29 10:54:17'),
(70, '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', 0, 0, '', '2022-08-20 13:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
