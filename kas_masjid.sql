-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2023 pada 12.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas_masjid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `brg`, `created_at`, `updated_at`) VALUES
(1, 'Gelas Plastik', '2022-11-28 01:13:10', '2022-12-26 01:33:11'),
(2, 'Sajadah', '2022-11-28 01:13:16', '2022-11-28 01:13:16'),
(3, 'Kursi Plastik', '2022-11-28 01:13:41', '2022-11-28 01:13:41'),
(5, 'Gelas Kaca', '2022-12-11 06:02:54', '2022-12-11 06:02:54'),
(6, 'Mukena', '2022-12-11 06:03:09', '2022-12-11 06:03:09'),
(7, 'Ceret', '2022-12-11 06:04:07', '2022-12-25 02:23:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_ivt` date NOT NULL,
  `ket_ivt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `barang_id`, `jumlah`, `tgl_ivt`, `ket_ivt`, `created_at`, `updated_at`) VALUES
(2, 3, 50, '2022-12-02', 'Sumbangan dari RT 007', '2022-11-28 02:54:47', '2022-12-26 16:35:43'),
(5, 6, 1, '2022-12-01', 'Pembelian', '2022-12-11 10:15:25', '2022-12-26 16:35:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_khotbah`
--

CREATE TABLE `jadwal_khotbah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_khotbah` date NOT NULL,
  `penceramah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_khotbah`
--

INSERT INTO `jadwal_khotbah` (`id`, `created_at`, `updated_at`, `tgl_khotbah`, `penceramah`) VALUES
(1, '2022-11-29 07:30:14', '2022-12-22 09:52:41', '2022-11-23', 'Hj. Andr'),
(2, '2022-11-29 07:30:25', '2022-12-18 06:23:15', '2022-12-08', 'Warsono'),
(3, '2022-12-25 00:34:34', '2022-12-25 00:34:50', '2022-12-02', 'Suki'),
(4, '2022-12-26 07:35:31', '2022-12-29 03:07:34', '2022-12-23', 'Sucipto'),
(5, '2022-12-26 14:46:27', '2022-12-29 03:07:23', '2022-12-30', 'Muhammad Rahmat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_kas` date NOT NULL,
  `uraian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kas_masjid`
--

INSERT INTO `kas_masjid` (`id`, `created_at`, `updated_at`, `tgl_kas`, `uraian`, `masuk`, `keluar`, `jenis`) VALUES
(2, '2022-11-30 06:44:32', '2022-12-26 14:56:55', '2022-12-20', 'Pengajian', 0, 200000, 'keluar'),
(6, '2022-12-18 02:03:40', '2022-12-18 02:46:43', '2022-12-23', 'Sumbangan untuk gempa cianjur', 0, 500000, 'keluar'),
(7, '2022-12-18 02:20:19', '2022-12-26 15:24:45', '2022-12-09', 'Infaq Jumat', 497000, 0, 'masuk'),
(8, '2022-12-18 02:31:10', '2022-12-18 02:31:26', '2022-12-18', 'Sumbangan bp. Warsito', 350000, 0, 'masuk'),
(11, '2022-12-26 07:20:52', '2022-12-26 07:20:52', '2022-12-10', 'Sumbangan bp. Wagiman', 240000, 0, 'masuk'),
(13, '2022-12-26 15:24:22', '2022-12-26 15:24:22', '2022-12-03', 'Pajak listrik', 0, 35000, 'keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_keg` date NOT NULL,
  `keg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `created_at`, `updated_at`, `tgl_keg`, `keg`, `ket`, `gambar`) VALUES
(5, '2022-12-27 23:05:10', '2022-12-28 09:33:38', '2022-12-01', 'Pengajian', 'jasaj', '1672245218.jpg'),
(7, '2022-12-27 23:22:55', '2022-12-28 03:03:40', '2022-12-03', 'Kerja Bakti', 'Kerja bakti membersihkan masjid', '1672221820.jpg'),
(8, '2022-12-28 02:17:32', '2022-12-28 03:22:39', '2022-12-02', 'Tahlilan', 'tahlilan di rumah Bp Indarto', '1672222959.jpg'),
(9, '2022-12-28 09:07:20', '2022-12-28 09:07:20', '2022-12-01', 'Kerja Bakti', 'sajsms', '1672243640.jpg'),
(10, '2023-01-10 04:17:35', '2023-01-10 04:17:35', '2023-01-07', 'sasaaaa', 'fdjjhk', '1673349455.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_11_22_144132_create_kas_masjid', 1),
(5, '2022_11_22_153954_create_jadwal_khotbah', 1),
(6, '2022_11_27_074638_create_kegiatan', 1),
(7, '2022_11_28_060050_create_barang', 1),
(8, '2022_11_28_060354_create_inventaris', 1),
(9, '2022_12_28_054619_add_gambar_to_kegiatan_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'pengurus', 'pengurus@gmail.com', '1', NULL, '$2y$10$rTVCxJwAvgQbiSeCge3j/./2tDX.pjCR.sEzUsNPnc3mDpTwHqW3y', NULL, '2022-12-18 07:25:16', '2022-12-18 07:25:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `jadwal_khotbah`
--
ALTER TABLE `jadwal_khotbah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `jadwal_khotbah`
--
ALTER TABLE `jadwal_khotbah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
