-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2022 pada 05.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etask`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_post`
--

CREATE TABLE `agenda_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_conwrit` int(12) NOT NULL,
  `id_designer` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` int(11) NOT NULL,
  `nama_projek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `jadwal_dateline` datetime DEFAULT NULL,
  `jadwal_post` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agenda_post`
--

INSERT INTO `agenda_post` (`id`, `id_conwrit`, `id_designer`, `id_client`, `nama_projek`, `file`, `status`, `jadwal_dateline`, `jadwal_post`, `created_at`, `updated_at`) VALUES
(1, 0, '2', 15, 'projek 1', '/design/VYLHDwkx9bJRFuEVg0oUxHsOeZfr9j3R.png', 0, '2022-05-19 08:21:29', '2022-04-09 00:00:00', NULL, '2022-04-18 06:40:13'),
(5, 0, '2', 17, 'Projek Desain Banner', '/design/9W6yscjEuzdjllK1bepI9VlwiEMDwlQx.jpg', 0, '2022-05-19 08:21:29', '2022-04-11 00:00:00', NULL, '2022-04-18 06:40:47'),
(6, 0, '2', 15, 'Projek Desain Poster', '/design/lOb0bwnWqRqvRC9kG2vR7RJcSUijwZGj.png', 0, '2022-05-19 08:21:29', '2022-04-11 00:00:00', NULL, '2022-04-18 06:41:58'),
(7, 0, '2', 17, 'PROJEK PEMBUATAN DESAIN MENU', '/design/sqZ4Eo7S7LAnOLUijBIz7FPXdndfMDbh.jpg', 0, '2022-05-19 08:21:29', '2022-04-18 00:00:00', NULL, '2022-04-18 06:43:13'),
(8, 0, '2,3', 15, 'DESAIN PROMO RAMADHAN', '/design/bduMjYbxYufc1pSGw4ZRcDf9Zl8JSOMB.jpg', 0, '2022-05-19 08:21:29', '2022-04-18 00:00:00', NULL, '2022-05-11 18:37:19'),
(10, 0, '1', 25, 'DESAIN POSTER LOMBA PENUMPASAN KEMISKINAN', '/design/IjcCl3eGbWYrzIxRobD0Q4Rhsv7k5vPw.png', 1, '2022-05-19 08:21:29', '2022-05-12 00:00:00', NULL, '2022-05-18 00:03:58'),
(12, 34, '1,7,8', 15, 'DEMOM PROJEK', '/design/1AqGVwELHnaulbRx3BY35W5SlY45VRZX.png', 1, '2022-05-20 08:26:08', NULL, NULL, '2022-05-18 01:26:34'),
(13, 34, '8', 24, 'PROJEK PEMBUATAN DESAIN BAJU', NULL, 0, '2022-05-20 08:15:29', NULL, NULL, '2022-05-18 11:47:18'),
(14, 34, '1,8', 17, 'DESAIN PROMO 12.12', '/design/tNCsCJhnTbs2BKRgpf6Y6UACoTeIapf4.png', 1, '2022-05-20 08:17:05', '2022-05-23 01:17:00', NULL, '2022-05-18 10:14:21'),
(15, 34, '1,7', 21, 'Poster BARU', NULL, 0, '2022-05-20 08:17:24', '2022-05-07 06:05:00', NULL, NULL),
(16, 34, '1', 18, 'WAGU', NULL, 0, '2022-05-19 08:23:33', '2022-05-20 00:00:00', NULL, NULL),
(17, 34, '7,8', 17, 'WAGU PROJEK', NULL, 0, '2022-05-19 10:40:41', '2022-05-19 10:40:00', NULL, NULL),
(18, 34, '7', 21, 'BEDJO PROJEK', NULL, 0, '2022-05-19 10:40:54', '2022-05-28 10:40:00', NULL, NULL),
(19, 34, '7', 25, 'DESAIN POSTER LOMBA INOVASI KREATIF', NULL, 0, '2022-05-19 10:41:15', '2022-05-21 10:41:00', NULL, NULL),
(20, 34, '7', 20, 'BRADER PROJEK', NULL, 0, '2022-05-19 10:41:41', NULL, NULL, NULL),
(21, 34, '1', 15, 'aa', NULL, 0, NULL, '2022-05-20 08:34:00', NULL, NULL),
(22, 34, '7', 18, 'demo lagi', NULL, 0, '2022-05-13 08:36:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `nama_client`, `telp`, `email`, `created_at`, `updated_at`) VALUES
(15, 'bbv13', '123123', 'bbc@mail.com', NULL, NULL),
(17, 'WAGU', '09893819318', 'WAGU@GMAIL.COM', NULL, NULL),
(18, 'CV.Mannn', '099202029', 'CVMan@mail.com', NULL, NULL),
(19, 'anc', 'ancn', 'anc@Mail', NULL, NULL),
(20, 'WARUNG BRADER', '089849289', 'brader@mail.com', NULL, NULL),
(21, 'WARKOP BEDJO', '094490490', 'bedjo@mail.com', NULL, NULL),
(22, 'demo lagi', '0192201920', 'admin@gmail.com', NULL, NULL),
(23, 'akajk', 'akjakjak', 'kajkajka', NULL, NULL),
(24, 'WARKOP AROS', '0839898329829', 'aros@gmail.co.id', NULL, NULL),
(25, 'BAPPEDA KOTA KEDIRI', '08598585989', 'bappeda@mail.com', NULL, NULL),
(26, 'STARBUCK', '08484984948', 'budis@mail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contentwriter`
--

CREATE TABLE `contentwriter` (
  `id` bigint(255) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_lead` int(125) NOT NULL,
  `nama_cowrit` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contentwriter`
--

INSERT INTO `contentwriter` (`id`, `id_user`, `id_lead`, `nama_cowrit`, `alamat`, `tgl_lahir`, `telp`, `email`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'angga', 'manisrenggo', '2022-05-17', '08391839839', 'anggar@mail.com', '2022-05-17 02:31:37', '2022-05-17 02:31:37'),
(4, 34, 1, 'irvan maulan', 'jl.mayoo', '2022-05-17', '0892819219', 'irvan@mail.com', '2022-05-16 21:12:20', '2022-05-16 21:12:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `designer`
--

CREATE TABLE `designer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(12) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `designer`
--

INSERT INTO `designer` (`id`, `id_user`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(1, 3, 'anggi', 'amnamna', '03913913019', NULL, NULL),
(7, 35, 'budi', 'jl.budungan', '08494849849', '2022-05-17 18:54:02', '2022-05-17 18:54:02'),
(8, 36, 'yeni', 'banaran', '08598594', '2022-05-17 20:10:52', '2022-05-17 20:10:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE `log_activity` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `kode_log` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_activity`
--

INSERT INTO `log_activity` (`id`, `post_id`, `user_id`, `kode_log`, `created_at`) VALUES
(1, 1, 3, 1, '2022-04-18 13:37:34'),
(2, 1, 3, 1, '2022-04-18 13:39:06'),
(3, 1, 3, 1, '2022-04-18 13:40:13'),
(4, 5, 3, 1, '2022-04-18 13:40:47'),
(5, 6, 3, 1, '2022-04-18 13:41:58'),
(6, 7, 3, 1, '2022-04-18 13:43:13'),
(7, 8, 3, 1, '2022-04-18 13:44:12'),
(8, 8, 3, 1, '2022-04-18 13:45:07'),
(9, 8, 3, 1, '2022-04-20 10:12:11'),
(10, 8, 3, 1, '2022-05-12 01:37:18'),
(11, 8, 3, 1, '2022-05-12 01:37:19'),
(12, 10, 3, 1, '2022-05-18 07:03:58'),
(13, 12, 3, 1, '2022-05-18 07:05:07'),
(14, 13, 36, 1, '2022-05-18 07:38:17'),
(15, 12, 3, 1, '2022-05-18 08:26:34'),
(16, 14, 3, 1, '2022-05-18 17:14:21'),
(17, 13, 36, 1, '2022-05-18 18:47:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_04_02_195118_create_clients_table', 2),
(5, '2022_04_03_134950_create_designers_table', 3),
(7, '2022_04_04_150031_create_cw_table', 4),
(8, '2022_04_07_171603_create_agenda_posts_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anggoro ', 'anggoro@mail.com', NULL, '$2y$10$hhEJvGCdP8D/rLJsHEnrb.gzzU7dGzv3C09RO62mK9CjFjRpN2mKK', 0, NULL, '2022-04-02 08:03:53', '2022-04-02 08:03:53'),
(2, 'angga rahmaden', 'anggarahmad@mail.com', NULL, '$2y$10$lTE.7FpiS9E0wnXhojb0KuDNtVK6d1VJ.zASsw6iFofedsxTUKgum', 1, NULL, '2022-04-02 08:36:21', '2022-04-02 08:36:21'),
(3, 'angginn', 'anggi@mail.com', NULL, '$2y$10$9jWxfkydG5m.LgXx76icdekdIP2kYmuQnSJ9CABGjrGSzWBSRBq2C', 2, NULL, '2022-04-02 08:36:48', '2022-04-02 08:36:48'),
(22, 'DODI ILHAM', 'dodi@mail.com', NULL, '$2y$10$8UDmsl2.BqFFA0tlMgUtCO.8YCrH/p8ypWkago02DxorJ5OAKavjq', 2, NULL, NULL, NULL),
(24, 'AZIZ SEPTA', 'aziz@mail.com', NULL, '12341234', 2, NULL, '2022-05-11 20:40:43', '2022-05-11 20:40:43'),
(34, 'irvan', 'irvan@mail.com', NULL, '$2y$10$HkTIU0eNz7rOyOIXlHazv.v98I85yvu2MsI.P/sLWFwCeQSxcZwcO', 1, NULL, '2022-05-16 21:12:20', '2022-05-16 21:12:20'),
(35, 'budi', 'budi@mail.com', NULL, '$2y$10$HkTIU0eNz7rOyOIXlHazv.v98I85yvu2MsI.P/sLWFwCeQSxcZwcO', 2, NULL, '2022-05-17 18:54:02', '2022-05-17 18:54:02'),
(36, 'yeni', 'yeni@mail.com', NULL, '$2y$10$xQjbxiZQkMTktEG6jzapeOSfsPq4s86aSNhyYuBQkeqIyMjXxtfYS', 2, NULL, '2022-05-17 20:10:52', '2022-05-17 20:10:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda_post`
--
ALTER TABLE `agenda_post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contentwriter`
--
ALTER TABLE `contentwriter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda_post`
--
ALTER TABLE `agenda_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `contentwriter`
--
ALTER TABLE `contentwriter`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `designer`
--
ALTER TABLE `designer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
