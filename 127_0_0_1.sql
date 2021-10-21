-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 06:24 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2_laravel`
--
CREATE DATABASE IF NOT EXISTS `project2_laravel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project2_laravel`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_31_042223_create_produk_table', 1),
(5, '2021_09_08_064439_create_transaksi_table', 1),
(6, '2021_09_09_024016_create_profile_table', 1),
(7, '2021_09_14_075211_create_payment_table', 1),
(8, '2021_09_17_085634_create_status_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(100) NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `produk`, `jenis`, `harga`, `stock`, `deskripsi`, `alamat`, `image`, `image2`, `image3`, `image4`, `created_at`, `updated_at`) VALUES
(1, 'pertanian a', 'hunian panas', 5100000, '4', 'sadas', 'bantul', '1iUuoSjDt5Seexm6Y21kF27GEp8FkjAE8MHNyFPg.jpg', 'bI2KBk5jTytNRSHxTsRv1BQspF4VUJX1iiICBNFO.jpg', 'QZSHFDO3R0Iyylky0Odb4mRrqydhZPZnZGbdvbSx.jpg', 'Pom1OWO82WuM0cUfy1lSVefIq93XiZp3l70lqM57.jpg', '2021-10-06 17:51:57', NULL),
(2, 'CCC', 'hunian', 5000000, '10', 'CCC', 'bantul', '6zqKOiwFgXXEdXbXT6qq6Xy4Zs23I6CWDnvMXbEn.jpg', 'sY3gaK8fmqAPIAv3r7nzZtTRpwbOx9Fck63jsrOK.jpg', 'meC9GZGlWPmVuF3sqN6XbpxM0C1xEaFFoXUrc21V.jpg', 'JqFkqVl1CVyN09bb5U0l0al9iuLE80RZZzmWGQvO.jpg', '2021-10-07 17:51:57', '2021-10-16 13:28:16'),
(4, 'Hotel a', 'hunian', 5000000, '9', 'sdsdsdsd', 'bantul', 'y4bgBBo2pyoxUAdjjNK3UXcEYfRXEnGzWTAFokeD.jpg', 'A6bMmqREfGgWXojIbZORdtMEEqJfpzfSUH2QrWlx.jpg', 'pUqqgotuOFpLv2Ucsa8Ll0h9KUTkHgDf3GWjAL5p.jpg', 'zjKHGiYEDENxXVCqQrIJJLy6JATmvKCC6ObvDtSl.jpg', '2021-10-07 17:51:57', NULL),
(5, 'perumahan a', 'hunian', 5000000, '8', 'asdasdad', 'bantul', 'kTVpSJ9lPSlY02st15azQgVoYO3DGykRv412hqvB.jpg', '6rszBXdHrtbm3UrXr2IqoozyCZuGKBkZLFL8svpN.jpg', 'XM9pZX6tuT5Yl00TCkJkIy5cE0TIlTwyhyimxIFg.jpg', 'smeYxyNY0picKxLlVplCiFUDN8a54VZqjwuE12OC.jpg', '2021-10-07 17:51:57', NULL),
(7, 'hotel b', 'hunian', 5000000, '9', 'sdgsrg', 'bantul', 'BIWrRkC6Nzv5vib8YOLcuWanygWgMpy4aJOpTUjy.jpg', 'hjbFPVvK7r1TsOr26gjrRd1h3l3o8KxNt8uKu0Xy.jpg', 'uBh1GJzP0cCWAQ732fdExJ4J1VQHtBSSopnO2NQJ.jpg', 'KzPBLw3OXg2NLZimRfp1UEZ0ts410xHnpDNJBAQj.jpg', '2021-10-07 17:51:57', NULL),
(11, 'aaaa', 'hunian', 5000000, '9', 'sdsd', 'bantul', 'Y2DZHZk2mNaMHA20yZPvAnC35VVhYpX7uho9Pufw.jpg', 'lpjowNCEJbZ2KmRZl8hdWfabnEvkOPM8nznPUujM.jpg', 'elbxLOGKMWa43BcebhWXedGsWUZTnlJzbI8hmU0P.jpg', 'LP4FqHTY3q7Neo18k1oGZOqACnu3X1riqkq8bY1o.jpg', '2021-08-07 17:40:57', NULL),
(15, 'RUMAH', 'hunian', 5100000, '6', 'adwasdawd', 'indramayu', 'J7hxVbiK9Yk13BXlDbecfe1Z42wL2ukok2tW4cZs.jpg', 'hkCJsVta9v85S9LCev7nBYQuhPJvrb0SQUIYnLiP.jpg', 'zNu3ILF5OgvtQx9xxgVhxxNz18Kvp9pyRjkQk08k.jpg', 'SB0f55jwjXb38MQJCFBPKmbI72HsgUv8xJP9KQ0z.jpg', '2021-10-07 17:51:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(100) NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_roi` datetime DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `first_name`, `last_name`, `total`, `no_hp`, `email`, `address`, `payment`, `status`, `bukti_pembayaran`, `waktu_roi`, `id_user`, `id_produk`, `created_at`, `updated_at`) VALUES
(2, 'rizki', 'anugrah', 10000000, '081276345878', 'rizki1@gmail.com', 'indramayu', 'on', 'dijual kembali', 'NMpVB8tDtGlwqVmub3fTfMPW9ggMx4gq32HAHSnp.jpg', NULL, 2, 1, '2021-10-07 17:51:57', NULL),
(4, 'rizki', 'anugrah', 10000000, '081276345878', 'rizki1@gmail.com', 'indramayu', 'on', 'selesai', '5muKgiRLnGYlnrtamaJn5UROvpiKMNVZZ0FG5E5Y.jpg', '2021-10-09 06:50:49', 2, 1, '2021-10-07 17:51:57', NULL),
(5, 'rizki', 'anugrah', 10000000, '081276345878', 'rizki1@gmail.com', 'awdasd', 'on', 'menunggu konfirmasi', 'YB3c0g9HoWymJsmjKzisKKHhYNZ6sjt8LQIDJr6l.png', NULL, 2, 1, '2021-10-07 17:51:57', NULL),
(6, 'rizki', 'anugrah', 10000000, '081276345878', 'rizki1@gmail.com', 'indramayu', 'on', 'menunggu konfirmasi', 'Z1EaGGZpHKwl8Cna7mB06GCdXcYKOVQSuKGP31u2.jpg', NULL, 2, 5, '2021-10-07 17:51:57', '2021-10-18 02:55:51'),
(7, 'rizki', 'anugrah', 5000000, '081276345878', 'rizki1@gmail.com', 'indramayu', 'on', 'belum dibayar', NULL, NULL, 2, 1, '2021-10-07 17:51:57', NULL),
(8, 'rizki', 'anugrah', 10000000, '081276345878', 'rizki1@gmail.com', 'awdasdawd', 'on', 'dijual kembali', NULL, NULL, 2, 2, '2021-10-07 17:51:57', NULL),
(9, 'roi', 'last', 11000000, '372183612', 'rizki1@gmail.com', 'sefsdf', 'on', 'selesai', 'OMXU3wfdiLmPq9Igd44hQEqXjVfQxJtynlY385BF.png', '2021-09-27 00:36:48', 2, 7, '2021-10-07 17:51:57', NULL),
(10, 'thesar', 'Dwi', 10000000, '081276345878', 'thesar@gmail.com', 'indramayu', 'on', 'selesai', 'HtbiAuXK2auX2lZWgyDzA4d116omwXDZpfHcWKka.jpg', '2021-09-27 08:58:03', 3, 2, '2021-10-07 17:51:57', NULL),
(11, 'rizki', 'anugrah', 5100000, '081276345878', 'rizki1@gmail.com', 'indramayu', 'on', 'selesai', 'J9oKH9byQfZaAbPcTJrGuVPizaZ5O0hW58KCVhJv.png', '2021-10-11 13:38:41', 2, 1, '2021-10-07 17:51:57', '2021-10-11 06:38:41'),
(13, 'safik', 'seftian', 5000000, '081276345878', 'rizki1@gmail.com', 'indramayu', 'Dana', 'belum dibayar', NULL, NULL, 2, 4, '2021-10-07 17:51:57', NULL),
(14, 'rizki', 'anugrah', 5000000, '081276345878', 'rizki1@gmail.com', 'dwdawdasd', 'Shopee pay', 'belum dibayar', NULL, NULL, 2, 7, '2021-10-09 04:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_verified_at` timestamp NULL DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_akun` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_asset` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_verified_at`, `level`, `ktp`, `no_rek`, `status_akun`, `no_hp`, `alamat`, `image`, `total_asset`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'safik', 'safikmohamad14@gmail.com', '$2y$10$MzWPuZaeIM3Qf0Sgqyp2QO0KrL5AurYtWukDTmXs/5X8svc80wF/S', NULL, 'admin', '', NULL, '', '081280974203', 'indramayu', 'Qfj1ag8bO9zjoiqj1kcTRIRZLBa7g5H6KXy0CpGQ.jpg', 0, NULL, '2021-09-23 20:21:05', '2021-09-23 20:21:05'),
(2, 'rizki', 'rizki1@gmail.com', '$2y$10$fVkIS/nf8CFl8WJJaAbaUOOiGw4s25C2YDpp8HLhA1STSdGO.4tni', NULL, 'user', '', 'bca 32143425435 a/n rizki', '', '081276345878', 'bantul', 'VA72BRdmaWE3KW05jR4JpYOTSPqIyz3IHR6SJsQp.jpg', 0, NULL, '2021-09-23 20:21:32', '2021-09-23 20:21:32'),
(3, 'thesar', 'thesar@gmail.com', '$2y$10$..sD4EhpOn5.6AcPp4dr9.U.v0vMa2/2G8Fn5688aNdtv7tlW.PSS', NULL, 'user', '', NULL, '', '0', '', '', NULL, NULL, '2021-09-27 01:47:55', '2021-09-27 01:47:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id_user_foreign` (`id_user`),
  ADD KEY `transaksi_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
