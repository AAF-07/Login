-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2025 pada 04.07
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','masyarakat') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `NIK` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`NIK`, `nama`, `username`, `password`, `telp`, `created_at`, `updated_at`) VALUES
('1111111', 'paosd', 'kelan', 'qwerty', '11111111111', '2025-09-09 21:17:16', '2025-09-09 21:17:16'),
('334455', 'lala', 'klen', '123456', '1212121212', '2025-09-09 21:18:38', '2025-09-09 21:18:38'),
('3456789012345678', 'Masyarakat User', 'masyarakatuser', 'masyarakatpass', '083456789012', '2025-09-09 18:59:21', '2025-09-09 18:59:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_07_28_025524_create_akun_table', 1),
(2, '2025_07_30_041202_create_masyarakat_table', 1),
(3, '2025_07_30_041253_create_petugas_table', 1),
(4, '2025_07_30_041835_create_pengaduan_table', 1),
(5, '2025_07_30_041849_create_tanggapan_table', 1),
(6, '2025_08_05_013554_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(10) UNSIGNED NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `NIK` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `NIK`, `isi_laporan`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-09-10', '3456789012345678', 'bang bantuin bang', 'pengaduan/Dt2EniZKvAL8RcWuYpSPzOPMOvUGvsSLXh4CoJQU.png', 'selesai', '2025-09-09 23:46:10', '2025-09-12 07:38:56'),
(2, '2025-09-11', '3456789012345678', 'tes lagi', 'pengaduan/Renb7MEdnN8QQs4eTFI3yD65YkpobGtHVg8y0Qah.jpg', 'selesai', '2025-09-12 07:55:12', '2025-09-12 07:58:49'),
(3, '2025-09-13', '3456789012345678', 'HELPPP!!!!!!', 'pengaduan/jCIkPXbkrbHevEKLtMKcRWRFrcqqS5G4gW72r6CY.jpg', 'selesai', '2025-09-12 08:08:07', '2025-09-12 08:11:35'),
(4, '2025-09-16', '3456789012345678', 'bantu bang', 'pengaduan/95XNFijZr2hBLnbtX086g6eBK12TqfkKtG3Hzypj.jpg', 'selesai', '2025-09-14 18:38:55', '2025-09-14 18:41:41'),
(5, '2025-09-15', '3456789012345678', 'help', 'pengaduan/x9uniyxk3DGd8gLw76sXzMtHepfQTzI1nP2XicCH.jpg', 'selesai', '2025-09-14 18:52:01', '2025-09-14 18:52:48'),
(6, '2025-09-15', '3456789012345678', 'waw', '', 'selesai', '2025-09-14 18:53:25', '2025-09-14 18:56:04'),
(7, '2025-09-15', '3456789012345678', 'HELPPPPP!', '', 'selesai', '2025-09-14 18:59:05', '2025-09-14 19:04:45'),
(8, '2025-09-15', '3456789012345678', 'TOLONGGGG!', '', 'selesai', '2025-09-14 19:05:30', '2025-09-14 19:06:34'),
(9, '2025-09-15', '3456789012345678', 'sa,dfew BDCIDWE', '', 'selesai', '2025-09-14 19:09:09', '2025-09-14 19:10:03'),
(10, '2025-09-15', '3456789012345678', 'uihfuie3w', 'pengaduan/jidiw1BxYeLVT9a5cUVwSDOvQT7G9WSw3WwPjip9.jpg', 'selesai', '2025-09-14 19:12:02', '2025-09-14 19:12:35'),
(11, '2025-09-15', '3456789012345678', 'fghf', 'pengaduan/nvPJeaVzuMKXqatwCuako6CBeL7aFFmE9WSNtG2H.jpg', 'selesai', '2025-09-14 21:05:14', '2025-09-14 21:07:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `created_at`, `updated_at`) VALUES
(1, 'AdminSatu', 'admin1', 'adminpass1', '081111111111', 'admin', '2025-09-09 19:07:40', '2025-09-09 19:07:40'),
(2, 'PetugasSatu', 'petugas1', '123', '081111111111', 'petugas', '2025-09-09 19:48:51', '2025-09-09 19:48:51'),
(3, 'sugeng', 'admin', 'qwerty', '1234567', 'admin', '2025-09-09 21:41:27', '2025-09-09 21:41:27'),
(6, 'kacau', 'petugas', 'qwerty', '1234567', 'admin', '2025-09-09 23:25:09', '2025-09-09 23:25:09'),
(8, 'mcqueen', 'petugas', 'qwerty', '1234567', 'admin', '2025-09-09 23:29:17', '2025-09-09 23:29:17'),
(9, 'meter', 'admin', 'qwerty', '1234567', 'admin', '2025-09-09 23:32:46', '2025-09-09 23:32:46'),
(10, 'klan', 'kln', 'qwerty', '1234567', 'admin', '2025-09-09 23:40:17', '2025-09-09 23:40:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YGtdlAZyLGAC5O79Nql8RNquMsjGeFkf9bW1E1ci', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTDZpUmt0VlBPa2liQ0kyeWg1UWRaM0sySmJ1QVFrT0dZY1A3V1JKVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9fQ==', 1757473160);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(10) UNSIGNED NOT NULL,
  `id_pengaduan` int(10) UNSIGNED NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-09-12', 'proses', 1, '2025-09-12 07:38:56', '2025-09-12 07:38:56'),
(2, 1, '2025-09-12', 'proses', 1, '2025-09-12 07:41:37', '2025-09-12 07:41:37'),
(3, 2, '2025-09-12', 'proses', 1, '2025-09-12 07:57:27', '2025-09-12 07:57:27'),
(4, 3, '2025-09-12', 'oke akan di proses', 2, '2025-09-12 08:08:54', '2025-09-12 08:08:54'),
(5, 3, '2025-09-12', 'oke akan di proses', 2, '2025-09-12 08:11:08', '2025-09-12 08:11:08'),
(6, 4, '2025-09-15', 'proseshdcgjercuk', 1, '2025-09-14 18:41:22', '2025-09-14 18:41:22'),
(7, 5, '2025-09-15', 'sedang proses', 1, '2025-09-14 18:52:32', '2025-09-14 18:52:32'),
(8, 6, '2025-09-15', 'hahh', 2, '2025-09-14 18:55:03', '2025-09-14 18:55:03'),
(9, 7, '2025-09-15', 'asdsd', 1, '2025-09-14 18:59:44', '2025-09-14 18:59:44'),
(10, 7, '2025-09-15', 'jsdafjhwaeufhaw', 1, '2025-09-14 19:03:45', '2025-09-14 19:03:45'),
(11, 7, '2025-09-15', 'jsdafjhwaeufhaw', 1, '2025-09-14 19:04:16', '2025-09-14 19:04:16'),
(12, 7, '2025-09-15', 'lhfhaw', 1, '2025-09-14 19:04:34', '2025-09-14 19:04:34'),
(13, 8, '2025-09-15', 'khafhgdawe', 2, '2025-09-14 19:06:22', '2025-09-14 19:06:22'),
(14, 9, '2025-09-15', 'GGFTFGBH', 2, '2025-09-14 19:09:37', '2025-09-14 19:09:37'),
(15, 10, '2025-09-15', 'wkjaebfjkwEF', 2, '2025-09-14 19:12:27', '2025-09-14 19:12:27'),
(16, 11, '2025-09-15', 'ngfjhyg', 1, '2025-09-14 21:06:42', '2025-09-14 21:06:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`NIK`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `pengaduan_nik_foreign` (`NIK`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `tanggapan_id_pengaduan_foreign` (`id_pengaduan`),
  ADD KEY `tanggapan_id_petugas_foreign` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_nik_foreign` FOREIGN KEY (`NIK`) REFERENCES `masyarakat` (`NIK`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_id_pengaduan_foreign` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE,
  ADD CONSTRAINT `tanggapan_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
