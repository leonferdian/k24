-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 12:46 PM
-- Server version: 10.4.24-MariaDB
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
-- Database: `administrator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `url` varchar(250) NOT NULL,
  `scheme` varchar(10) NOT NULL,
  `host` varchar(50) NOT NULL,
  `path` varchar(100) NOT NULL,
  `qs` varchar(150) NOT NULL DEFAULT '',
  `child` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `title`, `icon`, `url`, `scheme`, `host`, `path`, `qs`, `child`, `status`, `parent_id`, `created`, `updated`) VALUES
(1, 'Dashboard', 'fa-home', '', '', '', '', '', 1, 1, 1, '2018-09-15 23:21:15', 2022),
(5, 'Settings', 'fa-cogs', '#', '', '', '', '', 1, 0, 2, '2020-04-08 04:05:17', 0),
(6, 'Users Backend', 'fa-user', '#', '', '', '', '', 2, 1, 2, '2020-04-08 04:24:56', 0),
(12, 'Admin Menu', 'fa-th-large', 'admin/menu', '', '', '', '', 0, 1, 5, '2020-04-08 05:09:26', 0),
(13, 'Admin Users', 'ti-key', 'admin/users', '', '', '', '', 0, 1, 6, '2020-04-08 05:09:26', 0),
(14, 'Admin Groups', 'ti-layers-alt', 'admin/users/groups', '', '', '', '', 0, 1, 6, '2020-04-08 05:09:26', 0),
(28, 'Member', 'fa-user', '', '', '', '', '', 1, 1, 2, '2022-05-18 06:42:11', 0),
(29, 'List Member', '', 'administrator/list-member', '', '', '', '', 0, 1, 28, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'All Access'),
(2, 'members', 'Menu Access');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `edited_content` text NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(250) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `status_online` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `password`, `phone`, `tgl_lahir`, `email`, `nik`, `foto`, `gender`, `status`, `status_online`) VALUES
(2, 'M LEONARD FERDIAN YUSUF', 'd1936cf6f184d3ce5e0f348eeb5276af', '081322254594', '1994-09-20', 'leonardoferdiano@gmail.com', '3515182009950005', 'foto-3515182009950005-1994-09-20.jpg', 'L', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pageviews`
--

CREATE TABLE `pageviews` (
  `id` int(11) NOT NULL,
  `content_id` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `viewer` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL,
  `date_updated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageviews`
--

INSERT INTO `pageviews` (`id`, `content_id`, `type`, `viewer`, `date_created`, `date_updated`) VALUES
(69, '69', 'content', 65, '2020-05-01 06:09:06', '2020-05-01 06:09:06'),
(70, '33', 'content', 7, '2020-05-01 06:11:39', '2020-05-01 06:11:39'),
(71, '65', 'content', 8, '2020-05-01 06:33:36', '2020-05-01 06:33:36'),
(72, '35', 'content', 3, '2020-05-01 06:36:19', '2020-05-01 06:36:19'),
(73, '34', 'content', 4, '2020-05-01 06:36:52', '2020-05-01 06:36:52'),
(74, '61', 'content', 2, '2020-05-01 06:38:10', '2020-05-01 06:38:10'),
(75, '53', 'content', 45, '2020-05-01 06:54:57', '2020-05-01 06:54:57'),
(76, '57', 'content', 132, '2020-05-01 07:12:15', '2020-05-01 07:12:15'),
(77, '', '', 1, '2020-05-01 08:13:35', '2020-05-01 08:13:35'),
(78, '', '', 1, '2020-05-01 08:15:28', '2020-05-01 08:15:28'),
(79, '', '', 1, '2020-05-01 08:17:19', '2020-05-01 08:17:19'),
(80, '46', 'content', 66, '2020-05-01 19:02:54', '2020-05-01 19:02:54'),
(81, '42', 'content', 1, '2020-05-01 19:03:02', '2020-05-01 19:03:02'),
(82, '39', 'content', 1, '2020-05-01 19:03:08', '2020-05-01 19:03:08'),
(83, '47', 'content', 21, '2020-05-01 19:23:19', '2020-05-01 19:23:19'),
(84, '50', 'content', 2, '2020-05-01 19:31:31', '2020-05-01 19:31:31'),
(85, '', '', 1, '2020-05-02 08:38:12', '2020-05-02 08:38:12'),
(86, '', '', 1, '2020-05-02 08:38:13', '2020-05-02 08:38:13'),
(87, '', '', 1, '2020-05-02 08:38:14', '2020-05-02 08:38:14'),
(88, '', '', 1, '2020-05-02 08:38:14', '2020-05-02 08:38:14'),
(89, '', '', 1, '2020-05-02 08:38:15', '2020-05-02 08:38:15'),
(90, '', '', 1, '2020-05-02 08:38:16', '2020-05-02 08:38:16'),
(91, '', '', 1, '2020-05-02 08:38:17', '2020-05-02 08:38:17'),
(92, '', '', 1, '2020-05-02 08:38:17', '2020-05-02 08:38:17'),
(93, '', '', 1, '2020-05-02 08:38:18', '2020-05-02 08:38:18'),
(94, '', '', 1, '2020-05-02 08:38:18', '2020-05-02 08:38:18'),
(95, '', '', 1, '2020-05-02 08:38:18', '2020-05-02 08:38:18'),
(96, '', '', 1, '2020-05-02 08:38:19', '2020-05-02 08:38:19'),
(97, '', '', 1, '2020-05-02 08:38:19', '2020-05-02 08:38:19'),
(98, '', '', 1, '2020-05-02 08:38:21', '2020-05-02 08:38:21'),
(99, '72', '', 6, '2020-05-04 10:44:17', '2020-05-04 10:44:17'),
(100, '', '', 1, '2020-05-04 11:59:43', '2020-05-04 11:59:43'),
(101, '74', '', 8, '2020-05-04 12:00:31', '2020-05-04 12:00:31'),
(102, '', '', 1, '2020-05-04 12:00:39', '2020-05-04 12:00:39'),
(103, '', '', 1, '2020-05-04 12:01:47', '2020-05-04 12:01:47'),
(104, '', '', 1, '2020-05-04 12:03:56', '2020-05-04 12:03:56'),
(105, '', '', 1, '2020-05-04 12:04:14', '2020-05-04 12:04:14'),
(106, '', '', 1, '2020-05-04 12:06:01', '2020-05-04 12:06:01'),
(107, '', '', 1, '2020-05-04 12:11:55', '2020-05-04 12:11:55'),
(108, '76', '', 2, '2020-05-04 12:18:14', '2020-05-04 12:18:14'),
(109, '', '', 1, '2020-05-04 12:18:19', '2020-05-04 12:18:19'),
(110, '', '', 1, '2020-05-04 12:18:22', '2020-05-04 12:18:22'),
(111, '', '', 1, '2020-05-04 12:18:38', '2020-05-04 12:18:38'),
(112, '', '', 1, '2020-05-04 12:18:42', '2020-05-04 12:18:42'),
(113, '', '', 1, '2020-05-04 12:18:46', '2020-05-04 12:18:46'),
(114, '', '', 1, '2020-05-04 12:18:51', '2020-05-04 12:18:51'),
(115, '', '', 1, '2020-05-04 12:18:57', '2020-05-04 12:18:57'),
(116, '', '', 1, '2020-05-04 12:22:14', '2020-05-04 12:22:14'),
(117, '', '', 1, '2020-05-04 12:27:48', '2020-05-04 12:27:48'),
(118, '78', '', 2, '2020-05-04 12:33:36', '2020-05-04 12:33:36'),
(119, '52', 'content', 1, '2020-05-04 13:10:05', '2020-05-04 13:10:05'),
(120, '51', 'content', 1, '2020-05-04 13:10:11', '2020-05-04 13:10:11'),
(121, '30', 'content', 1, '2020-05-04 13:12:14', '2020-05-04 13:12:14'),
(122, '5', 'content', 1, '2020-05-04 13:13:37', '2020-05-04 13:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_selector` varchar(225) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(225) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$7VM5.sPDXhwMBSDlS5n41uwTM0Ul8CGskeruYWFD/MKILOBxFO67m', '', 'admin@admin.com', '', NULL, NULL, NULL, '2ead6427a088b5d02385c7f88ebf720cb744f22d', '$2y$10$y2QTmcl5ILVH6YF.E4xZZODCjJuUcGgcq', 1268889823, 1652954404, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 0, 0),
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 5, 1),
(13, 6, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Server` (`ip_address`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageviews`
--
ALTER TABLE `pageviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `type` (`type`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pageviews`
--
ALTER TABLE `pageviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
