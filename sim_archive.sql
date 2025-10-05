-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Sep 2025 pada 10.13
-- Versi server: 8.4.3
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_archive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkulganti-archived`
--

CREATE TABLE `matkulganti-archived` (
  `id` bigint UNSIGNED NOT NULL,
  `matkul_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tanggalganti` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jammulai` time NOT NULL,
  `jamakhir` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_class` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `archived_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan-archived`
--

CREATE TABLE `pesan-archived` (
  `id` bigint NOT NULL,
  `kelas_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `tanggalpesan` date NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jammulai` time NOT NULL,
  `jamakhir` time NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_class` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `archived_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users-archived`
--

CREATE TABLE `users-archived` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_class` varchar(120) NOT NULL,
  `no_telp` bigint NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `archived_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
