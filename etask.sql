-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2022 pada 16.36
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
  `id_designer` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` int(11) NOT NULL,
  `nama_projek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jadwal_post` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agenda_post`
--

INSERT INTO `agenda_post` (`id`, `id_designer`, `id_client`, `nama_projek`, `file`, `jadwal_post`, `created_at`, `updated_at`) VALUES
(1, '2', 15, 'projek 1', '/design/VYLHDwkx9bJRFuEVg0oUxHsOeZfr9j3R.png', '2022-04-09', NULL, '2022-04-18 06:40:13'),
(5, '2', 17, 'Projek Desain Banner', '/design/9W6yscjEuzdjllK1bepI9VlwiEMDwlQx.jpg', '2022-04-11', NULL, '2022-04-18 06:40:47'),
(6, '2', 15, 'Projek Desain Poster', '/design/lOb0bwnWqRqvRC9kG2vR7RJcSUijwZGj.png', '2022-04-11', NULL, '2022-04-18 06:41:58'),
(7, '2', 17, 'PROJEK PEMBUATAN DESAIN MENU', '/design/sqZ4Eo7S7LAnOLUijBIz7FPXdndfMDbh.jpg', '2022-04-18', NULL, '2022-04-18 06:43:13'),
(8, '2,3', 15, 'DESAIN PROMO RAMADHAN', NULL, '2022-04-18', NULL, '2022-04-20 03:12:11');

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
(24, 'WARKOP AROS', '0839898329829', 'aros@gmail.co.id', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contentwriter`
--

CREATE TABLE `contentwriter` (
  `id` bigint(255) NOT NULL,
  `user_id` int(20) NOT NULL,
  `id_lead` int(125) NOT NULL,
  `nama_cowrit` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cw`
--

CREATE TABLE `cw` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2, 'd', 'amnamna', '03913913019', NULL, NULL),
(2, 3, 'designer1', 'amnamna', '03913913019', NULL, NULL),
(3, 5, 'designer2', 'amnamna', '03913913019', NULL, NULL);

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
(9, 8, 3, 1, '2022-04-20 10:12:11');

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
(1, 'lutfirudianto', 'lutfi@mail.com', NULL, '$2y$10$hhEJvGCdP8D/rLJsHEnrb.gzzU7dGzv3C09RO62mK9CjFjRpN2mKK', 0, NULL, '2022-04-02 08:03:53', '2022-04-02 08:03:53'),
(2, 'contentwriter', 'contentwriter@mail.com', NULL, '$2y$10$lTE.7FpiS9E0wnXhojb0KuDNtVK6d1VJ.zASsw6iFofedsxTUKgum', 1, NULL, '2022-04-02 08:36:21', '2022-04-02 08:36:21'),
(3, 'designer', 'designer@mail.com', NULL, '$2y$10$9jWxfkydG5m.LgXx76icdekdIP2kYmuQnSJ9CABGjrGSzWBSRBq2C', 2, NULL, '2022-04-02 08:36:48', '2022-04-02 08:36:48'),
(5, 'Designer3', 'Designer3@mail.com', NULL, '$2y$10$9jWxfkydG5m.LgXx76icdekdIP2kYmuQnSJ9CABGjrGSzWBSRBq2C', 2, NULL, NULL, NULL),
(6, 'budi', 'budi@mail.com', NULL, '$2y$10$g8fftUY6sJtIQsoX.Wu2UOESxkbraZlLhMcjLDQrRHEpNuY3EkAhK', 1, NULL, NULL, NULL),
(7, 'abc', 'abcbb@mail.com', NULL, '$2y$10$rd96nR4QwWG6/VjqJlJUsOMXdMqEzCIzJuJ1nvjp29et2CUhnL3sW', 1, NULL, NULL, NULL),
(8, 'yudi', 'yudi@mail.com', NULL, '$2y$10$.F1JaODcyl6i.To9PMvjBO/14/bb6fTX6amPHWpCByaVdKnHD6LZK', 2, NULL, '2022-04-07 23:19:05', '2022-04-07 23:19:05'),
(9, 'yudee', 'yudee@mail.com', NULL, '$2y$10$BwUfqkD83E4o8YTV2lDUX.CraPeiwF.Vj9YaZzyqQbSAgKyvomuVq', 2, NULL, '2022-04-07 23:22:56', '2022-04-07 23:22:56'),
(11, 'yudee', 'yudhi@mail.com', NULL, '$2y$10$6AYgs9J1f/sv/L5sd7LDm.PRavRV8ZtuEHlkuneXQUIClDPT6OgOK', 2, NULL, '2022-04-07 23:23:18', '2022-04-07 23:23:18'),
(13, 'yudee', 'yudho@mail.com', NULL, '$2y$10$8B6xodF06tZ5ou8QWH2hHusy49p5R2LCZKTNEuIrZQDvaw29Oc1bu', 2, NULL, '2022-04-07 23:24:02', '2022-04-07 23:24:02'),
(15, 'yudee', 'yudh@mail.com', NULL, '$2y$10$M3pvhGtdAoMRZgfkGemQVeuQBHaPRugFY5YMHe2IiYggXcM5CnXXi', 2, NULL, '2022-04-07 23:24:36', '2022-04-07 23:24:36'),
(17, 'yudee', 'ytt@mail.com', NULL, '$2y$10$P9ki5UKUqo1LbDKJ91h2bOc32tsUxVceT0qD.cM.yp2pYlkM75aKm', 2, NULL, '2022-04-07 23:28:46', '2022-04-07 23:28:46'),
(19, 'yudee', 'yt@mail.com', NULL, '$2y$10$1UqTJSpHEkDrESkeEs2aIecTHI/YJaxW.v7iVyfdBDXycU8Y245ty', 2, NULL, '2022-04-07 23:29:23', '2022-04-07 23:29:23'),
(21, 'yudee', 'y2@mail.com', NULL, '$2y$10$OmmWv6qcDaez4f72ykZ7WukKswUbmPMi8Rl9iardXp3aSm6kO3Xj6', 2, NULL, '2022-04-07 23:30:21', '2022-04-07 23:30:21');

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
-- Indeks untuk tabel `cw`
--
ALTER TABLE `cw`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `contentwriter`
--
ALTER TABLE `contentwriter`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cw`
--
ALTER TABLE `cw`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `designer`
--
ALTER TABLE `designer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
