-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 11, 2021 at 10:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_keranjang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 10, 5, '2021-08-11 07:08:26', '2021-08-11 07:08:26', NULL),
(13, 10, 8, '2021-08-11 07:08:26', '2021-08-11 07:08:26', NULL),
(14, 11, 9, '2021-08-12 07:49:49', '2021-08-12 07:49:49', NULL),
(15, 11, 10, '2021-08-12 07:49:49', '2021-08-12 07:49:49', NULL),
(16, 12, 8, '2021-08-13 07:50:07', '2021-08-13 07:50:07', NULL),
(17, 12, 9, '2021-08-13 07:50:07', '2021-08-13 07:50:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `updated_at`, `created_at`, `deleted_at`) VALUES
(2, 'Aksesoris Laptop', '2021-07-21 22:59:04', '2021-07-21 22:59:04', NULL),
(3, 'Internal', '2021-07-22 03:03:15', '2021-07-22 03:03:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_varian` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_produk`, `id_varian`, `qty`, `subtotal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 2, 28, 10, 1, 50000, '2021-08-09 00:03:39', '2021-08-09 00:03:39', NULL),
(8, 2, 18, 4, 2, 99998, '2021-08-09 00:57:59', '2021-08-09 02:49:56', NULL),
(9, 2, 19, 6, 2, 400000, '2021-08-10 21:47:09', '2021-08-10 21:47:09', NULL),
(10, 2, 29, 11, 2, 150000, '2021-08-11 00:49:27', '2021-08-11 00:49:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `foto_produk` text,
  `deskripsi` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `foto_produk`, `deskripsi`, `harga`, `stok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 2, 'Wire Mouse', '1628243400304-mouse.png', 'ini wire mouse murah', 49999, 1, '2021-07-22 02:49:50', '2021-08-09 02:49:56', NULL),
(19, 2, 'Headphone', '1628243301609-headphone.png', 'ini headphone', 200000, 2, '2021-07-22 03:02:38', '2021-08-10 21:47:09', NULL),
(20, 3, 'RAM 4 GB', '1628243516600-ram.jpg', 'Ini RAM 4 GB', 500000, 5, '2021-07-22 03:03:57', '2021-08-06 02:51:56', NULL),
(28, 2, 'Flashdisk', '1628243791194-flash-disk.jpg', 'ini flashdisk 32 GB', 50000, 0, '2021-08-05 23:33:10', '2021-08-09 00:03:39', NULL),
(29, 2, 'Mouse Pad', '1628480462783-mouse-pad.png', 'mouse pad nyaman digunakan untuk mengoperasikan PC ber jam-jam', 75000, 1, '2021-08-08 20:38:41', '2021-08-11 00:49:27', NULL),
(30, 2, 'Charger Laptop', '1628498879040-charger-1.jpg', 'Charger laptop murah, kualitas terjamin', 300000, 6, '2021-08-09 01:46:15', '2021-08-09 01:47:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `total_harga`, `payment_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 2, 149998, 'paid', '2021-08-11 07:08:26', '2021-08-11 07:08:26', NULL),
(11, 2, 550000, 'paid', '2021-08-12 07:49:49', '2021-08-12 07:49:49', NULL),
(12, 2, 499998, 'paid', '2021-08-13 07:50:07', '2021-08-13 07:50:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('admin','pegawai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('unverified','verified') NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `roles`, `status`, `remember_token`, `verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'admin', 'verified', NULL, '2021-08-06 12:00:00', NULL, NULL, NULL),
(2, 'pegawai', 'pegawai@gmail.com', 'pegawai123', 'pegawai', 'verified', NULL, '2021-08-09 02:04:33', NULL, '2021-08-08 20:00:44', NULL),
(3, 'laras', 'laras@gmail.com', 'laras123', 'pegawai', 'unverified', NULL, '2021-08-06 12:02:00', NULL, NULL, NULL),
(5, 'gaizka', 'gaizka@gmail.com', 'gaizka123', 'pegawai', 'verified', NULL, '2021-08-09 03:02:21', '2021-08-08 19:38:32', '2021-08-08 20:02:26', '2021-08-08 20:02:26'),
(6, 'coba', 'coba@gmail.com', 'coba123', 'pegawai', 'verified', NULL, NULL, NULL, '2021-08-11 00:20:03', '2021-08-11 00:20:03');

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id_varian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_varian` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `varian`
--

INSERT INTO `varian` (`id_varian`, `id_produk`, `nama_varian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 'merah', NULL, '2021-07-23 02:18:05', NULL),
(2, 17, 'putih', NULL, NULL, NULL),
(3, 18, 'Merah', '2021-07-23 02:04:21', '2021-08-06 00:00:43', NULL),
(4, 18, 'Hijau Mint', '2021-07-23 02:04:49', '2021-08-06 00:02:48', NULL),
(6, 19, 'Hitam', '2021-08-06 00:00:22', '2021-08-06 00:54:37', NULL),
(7, 18, 'Putih', '2021-08-06 00:02:36', '2021-08-06 00:02:36', NULL),
(8, 19, 'Putih', '2021-08-06 00:10:36', '2021-08-06 00:54:54', NULL),
(9, 19, 'Merah', '2021-08-06 00:11:22', '2021-08-06 00:55:02', NULL),
(10, 28, 'biru', NULL, NULL, NULL),
(11, 29, 'hitam', '2021-08-09 00:23:00', '2021-08-09 00:23:18', NULL),
(12, 20, 'Samsung', '2021-08-09 00:23:50', '2021-08-09 00:23:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
