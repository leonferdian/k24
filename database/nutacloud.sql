-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Mar 2022 pada 00.46
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutacloud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_menus`
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
-- Dumping data untuk tabel `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `title`, `icon`, `url`, `scheme`, `host`, `path`, `qs`, `child`, `status`, `parent_id`, `created`, `updated`) VALUES
(1, 'Nutapos', 'fa-home', 'administrator', '', '', '', '', 1, 0, 2, '2018-09-15 23:21:15', 2022),
(3, 'Product', 'fas fa-rocket', '#', '', '', '', '', 6, 0, 2, '2018-09-16 00:46:53', 2022),
(4, 'Website Management', 'fas fa-database', '#', '', '', '', '', 5, 0, 2, '2020-04-08 04:05:07', 2022),
(5, 'Orders', 'fas fa-shopping-cart', '#', '', '', '', '', 2, 0, 2, '2020-10-10 07:07:44', 2022),
(9, 'Photos', 'fa-camera-retro', 'creator/manage-content/photos', '', '', '', '', 0, 0, 3, '2020-04-08 04:51:11', 1598324565),
(10, 'Videos', 'ti-video-clapper', 'creator/manage-content/videos', '', '', '', '', 0, 0, 3, '2020-04-08 04:51:11', 1598324641),
(11, 'Categories', 'fa-tags', 'categories', '', '', '', '', 0, 1, 3, '2020-04-08 04:57:58', 2020),
(12, 'Admin Menu', 'fa-th-large', 'admin/menu', '', '', '', '', 0, 1, 99, '2020-04-08 05:09:26', 0),
(13, 'Admin Users', 'ti-key', 'admin/users', '', '', '', '', 0, 1, 100, '2020-04-08 05:09:26', 0),
(14, 'Admin Groups', 'ti-layers-alt', 'admin/users/groups', '', '', '', '', 0, 1, 100, '2020-04-08 05:09:26', 0),
(23, 'Permission', 'fas fa-user-shield', 'admin/menu/permission', '', '', '', '', 0, 1, 99, '2020-08-23 16:01:19', 0),
(24, 'Products', 'fas fa-archive', 'administrator/products', '', '', '', '', 0, 1, 3, '2020-08-24 06:42:07', 2020),
(25, 'Catalog', 'fas fa-bars', 'administrator/catalog', '', '', '', '', 0, 0, 3, '2020-10-10 06:57:54', 2020),
(26, 'Product Detail', 'fas fa-search-plus', 'administrator/detail', '', '', '', '', 0, 1, 3, '2020-10-10 06:59:35', 0),
(28, 'Top Menu', 'fas fa-bars', 'admin/menu/top-menu', '', '', '', '', 0, 1, 4, '2020-10-10 10:25:22', 0),
(29, 'Main Menu', 'fas fa-bars', 'admin/menu/main-menu', '', '', '', '', 0, 1, 4, '2020-10-10 10:25:57', 0),
(30, 'Footer Menu', 'fas fa-bars', 'admin/menu/footer-menu', '', '', '', '', 0, 1, 4, '2020-10-10 10:28:04', 0),
(31, 'Brand', 'fab fa-shirtsinbulk', 'categories/brand', '', '', '', '', 0, 1, 3, '2020-10-11 07:14:04', 2020),
(32, 'size', 'fas fa-search-plus', 'administrator/size', '', '', '', '', 0, 1, 3, '2020-10-11 14:24:09', 0),
(33, 'color', 'fas fa-brush', 'administrator/color', '', '', '', '', 0, 1, 3, '2020-10-11 14:24:49', 0),
(34, 'cart', 'fas fa-luggage-cart', 'order/cart', '', '', '', '', 0, 1, 5, '2020-10-11 16:49:23', 0),
(35, 'wishlist', 'fas fa-heart', 'order/wishlist', '', '', '', '', 0, 1, 5, '2020-10-11 16:50:27', 2020),
(36, 'rate', 'fas fa-star', 'administrator/rate', '', '', '', '', 0, 1, 3, '2020-10-11 17:07:34', 0),
(37, 'Soal 1', 'fab fa-500px', 'administrator/soal1', '', '', '', '', 0, 1, 0, '2022-03-05 04:07:21', 2022),
(38, 'Soal 2', 'fab fa-500px', 'administrator/soal2', '', '', '', '', 0, 1, 0, '2022-03-05 04:07:21', 2022),
(39, 'Soal 3', 'fab fa-500px', 'administrator/soal3', '', '', '', '', 0, 1, 0, '2022-03-05 04:07:21', 2022),
(40, 'Soal 4', 'fab fa-500px', 'administrator/soal4', '', '', '', '', 0, 1, 0, '2022-03-05 04:07:21', 2022),
(41, 'Soal 5', 'fab fa-500px', 'administrator/soal5', '', '', '', '', 0, 1, 0, '2022-03-05 04:07:21', 2022),
(99, 'Settings', 'fas fa-cog', '#', '', '', '', '', 2, 1, 2, '2020-04-08 04:05:17', 1598082031),
(100, 'Users', 'fa-user', '#', '', '', '', '', 2, 1, 2, '2020-04-08 04:24:56', 1598169137);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(16, '::1', 'leonferdian', 1646471428),
(17, '::1', 'admin_ecommerce', 1646471994),
(18, '::1', 'admin_ecommerce', 1646472004),
(19, '::1', 'admin_ecommerce', 1646472079),
(20, '::1', 'administrator', 1646473415),
(21, '::1', 'administrator', 1646473424),
(22, '::1', 'administrator', 1646473522);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user`
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
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `NoPenjualan` varchar(150) NOT NULL,
  `NamaPelanggan` varchar(50) NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` varchar(50) NOT NULL,
  `Total` int(11) NOT NULL,
  `BayarTunai` int(11) NOT NULL,
  `Kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `NoPenjualan`, `NamaPelanggan`, `Tanggal`, `Jam`, `Total`, `BayarTunai`, `Kembali`) VALUES
(3, 'I8pNWWu5l3CQiEItGrG3Cc8eXA6PwLY61RJB3s4fB3faiL2er0gsfOQ6xi3yEtwUqcokdvV5KLYHX9MEW3Lr3rMaUqkUBfbMkolCqcVgzWEJTA3SrP6a9Kd1OTckHvvROwHccJFap7CMlu5FoK2Hll', 'Andi', '2019-01-07', '10:45', 38000, 50000, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualandetil`
--

CREATE TABLE `penjualandetil` (
  `id` int(11) NOT NULL,
  `NoPenjualan` varchar(150) NOT NULL,
  `Item` varchar(50) NOT NULL,
  `Qty` int(11) NOT NULL,
  `HargaSatuan` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualandetil`
--

INSERT INTO `penjualandetil` (`id`, `NoPenjualan`, `Item`, `Qty`, `HargaSatuan`, `SubTotal`) VALUES
(2, 'I8pNWWu5l3CQiEItGrG3Cc8eXA6PwLY61RJB3s4fB3faiL2er0gsfOQ6xi3yEtwUqcokdvV5KLYHX9MEW3Lr3rMaUqkUBfbMkolCqcVgzWEJTA3SrP6a9Kd1OTckHvvROwHccJFap7CMlu5FoK2Hll', 'Roti', 10, 2000, 20000),
(3, 'I8pNWWu5l3CQiEItGrG3Cc8eXA6PwLY61RJB3s4fB3faiL2er0gsfOQ6xi3yEtwUqcokdvV5KLYHX9MEW3Lr3rMaUqkUBfbMkolCqcVgzWEJTA3SrP6a9Kd1OTckHvvROwHccJFap7CMlu5FoK2Hll', 'Keju', 4, 4500, 18000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(8, '127.0.0.1', 'administrator', '', NULL, 'leonardoferdiano@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1604235087, 1, 'Admin', 'istrator', 'Nutapos', '081233399750');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(15, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Server` (`ip_address`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `penjualandetil`
--
ALTER TABLE `penjualandetil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualandetil`
--
ALTER TABLE `penjualandetil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
