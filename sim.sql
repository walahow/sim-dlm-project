-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Sep 2025 pada 08.55
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
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('andrian123@gmail.com|127.0.0.1', 'i:1;', 1727805333),
('andrian123@gmail.com|127.0.0.1:timer', 'i:1727805333;', 1727805333),
('andrian25544@gmail.com|127.0.0.1', 'i:1;', 1747052229),
('andrian25544@gmail.com|127.0.0.1:timer', 'i:1747052229;', 1747052229),
('neca@gmail.com|127.0.0.1', 'i:1;', 1728702939),
('neca@gmail.com|127.0.0.1:timer', 'i:1728702939;', 1728702939),
('saya123@gmail.com|127.0.0.1', 'i:1;', 1727805275),
('saya123@gmail.com|127.0.0.1:timer', 'i:1727805275;', 1727805275);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id` bigint UNSIGNED NOT NULL,
  `nomorgedung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlahkelas` int NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pengurusgedung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siluet_default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id`, `nomorgedung`, `jumlahkelas`, `lokasi`, `Pengurusgedung`, `lantai`, `foto`, `created_at`, `updated_at`) VALUES
(1, '77', 12, 'ilkom', 'pak_cahyo', '3', 'siluet_default.png', NULL, '2024-10-18 22:12:08'),
(2, '12', 7, 'ilkom', 'cahyo', '2', 'siluet_default.png', NULL, NULL);

--
-- Trigger `gedung`
--
DELIMITER $$
CREATE TRIGGER `gedung_admin` BEFORE INSERT ON `gedung` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

   
    SELECT COUNT(*)
    INTO overlap_count
    FROM gedung
    WHERE NEW.nomorgedung = nomorgedung;
   

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'wahai admin, gedung sudah ada wkwk';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tanggalganti` date NOT NULL,
  `jammulai` time NOT NULL,
  `jamakhir` time NOT NULL,
  `status` enum('dibooking','dilaksanakan','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkul_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `user_id`, `kelas_id`, `tanggalganti`, `jammulai`, `jamakhir`, `status`, `matkul_id`, `created_at`, `updated_at`) VALUES
(574, 1, 2, '2024-10-21', '13:00:00', '15:00:00', 'selesai', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `gedung_id` bigint UNSIGNED NOT NULL,
  `nomorkelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `status` enum('tersedia','dibooking','dipakai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tersedia',
  `ac` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kipas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'path/to/default/siluet.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `gedung_id`, `nomorkelas`, `kapasitas`, `status`, `ac`, `kipas`, `lampu`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, '77.1.77', 45, 'tersedia', '1', '0', '2', 'diuabah ke gedung 12', 'path/to/default/siluet.jpg', NULL, '2024-10-19 03:48:45'),
(2, 1, '77.2.77', 21, 'tersedia', '0', '6', '2', 'kelas ini berhantu', 'path/to/default/siluet.jpg', NULL, '2024-10-19 03:57:50'),
(6, 1, '77.4.77', 45, 'tersedia', '1', '0', '2', 'sasassaa', 'images/eR7P8EJl1gbvfPNeU7T1WS0LntfY5EslZzjekYk9.jpg', NULL, '2024-10-20 14:41:12'),
(7, 1, '77.5.55', 45, 'tersedia', '0', '2', '2', NULL, 'path/to/default/siluet.jpg', NULL, NULL),
(8, 2, '12.02.3', 23, 'tersedia', '5', '10', '8', 'kelas ini adalah kelas yang di bangun di fakultas fmipa', 'path/to/default/siluet.jpg', NULL, '2024-10-19 03:48:57'),
(12, 1, '77.2.72', 2, 'tersedia', '2', '3', '3', 'asasas', 'images/0iXQV0BRqNx1nIkQdJvGfyLHx4tASPkchpBaOeCL.jpg', '2024-10-20 10:07:57', '2024-10-20 10:07:57'),
(13, 2, '12.02.9', 8, 'tersedia', '1', '8', '3', 'mamamamamam', 'images/1jRgVbHTZ1FBf0JxqNlbl8BpcwwZiZETpEep1MSg.png', '2024-10-20 10:15:24', '2024-10-20 10:15:24');

--
-- Trigger `kelas`
--
DELIMITER $$
CREATE TRIGGER `kelas_admin` BEFORE INSERT ON `kelas` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

   
    SELECT COUNT(*)
    INTO overlap_count
    FROM kelas
    WHERE NEW.nomorkelas = nomorkelas;
   

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'wahai admin, gedung sudah ada wkwk';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `matakuliah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jammulai` time NOT NULL,
  `jamakhir` time NOT NULL,
  `dosen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('sesuai','dilaksanakan','dibatalkan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sesuai',
  `user_class` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'kelas sedang di Alihkan, Silahkan Lihat Tabel Matkulganti !',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id`, `kelas_id`, `matakuliah`, `hari`, `jammulai`, `jamakhir`, `dosen`, `status`, `user_class`, `user_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(11, 1, 'ORKOM', 'selasa', '08:00:00', '10:30:00', 'Debi', 'sesuai', 'PSIK23A', 2, NULL, NULL, NULL),
(15, 6, 'Struktur Data', 'kamis', '13:00:00', '15:30:00', 'Fanny', 'dibatalkan', 'PSIK23D', 1, 'kelas ini di batalkan untuk harinini', NULL, NULL),
(28, 7, 'saya', 'kamis', '13:00:00', '14:00:00', 'pak rizki', 'sesuai', 'PSIK23D', 1, NULL, '2024-10-18 17:22:19', '2024-10-18 17:22:19'),
(35, 2, 'abc', 'jumat', '16:00:00', '18:00:00', 'andrian', 'sesuai', 'PSIK23D', 1, 'kelas sedang di Alihkan, Silahkan Lihat Tabel Matkulganti', '2024-10-19 04:41:43', '2024-10-19 04:41:43');

--
-- Trigger `matkul`
--
DELIMITER $$
CREATE TRIGGER `matkul_prevent` BEFORE INSERT ON `matkul` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;


    SELECT COUNT(*)
    INTO overlap_count
    FROM matkul
    WHERE NEW.hari = hari
    AND NEW.kelas_id = kelas_id
AND matkul.status IN ('sesuai', 'dilaksanakan')    
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkulganti`
--

CREATE TABLE `matkulganti` (
  `id` bigint UNSIGNED NOT NULL,
  `matkul_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tanggalganti` date NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jammulai` time NOT NULL,
  `jamakhir` time NOT NULL,
  `status` enum('dibooking','dilaksanakan','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dibooking',
  `user_class` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matkulganti`
--

INSERT INTO `matkulganti` (`id`, `matkul_id`, `kelas_id`, `tanggalganti`, `hari`, `jammulai`, `jamakhir`, `status`, `user_class`, `created_at`, `updated_at`, `user_id`) VALUES
(575, 24, 6, '2024-10-21', 'senin', '10:00:00', '11:00:00', 'dibooking', 'PSIK23A', '2024-10-20 07:51:36', '2024-10-20 07:51:36', 2);

--
-- Trigger `matkulganti`
--
DELIMITER $$
CREATE TRIGGER `backup_matkulganti` AFTER INSERT ON `matkulganti` FOR EACH ROW BEGIN
    INSERT INTO history (id, user_id, kelas_id, tanggalganti, jammulai, jamakhir, status ,matkul_id)
    SELECT id, user_id, kelas_id, tanggalganti, jammulai, jamakhir, status, matkul_id
    FROM matkulganti
    WHERE status = 'selesai';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `matkul_ganti<harini` BEFORE INSERT ON `matkulganti` FOR EACH ROW IF NEW.tanggalganti < CURDATE() THEN
        SIGNAL SQLSTATE '46000'
        SET MESSAGE_TEXT = 'Tidak bisa membuat jadwal pengganti untuk tanggal yang sudah lewat';
    END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `matkul_ganti_new` BEFORE INSERT ON `matkulganti` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;
     
	SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalganti)
		WHEN 2 THEN 'senin'
		WHEN 3 THEN 'selasa'
		WHEN 4 THEN 'rabu'
		WHEN 5 THEN 'kamis'
		WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
	END;
    
    SELECT COUNT(*)
    INTO overlap_count
    FROM pesan 
    WHERE NEW.hari = hari
    AND NEW.tanggalganti = pesan.tanggalpesan
    AND NEW.kelas_id = kelas_id
    AND pesan.status='dibooking'|| 'dilaksanakan'
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000' 
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `override_matkul` AFTER INSERT ON `matkulganti` FOR EACH ROW BEGIN
    UPDATE matkul
    SET status = 'dibatalkan'
    WHERE id = NEW.matkul_id;
   
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_overlap_ganti_overlap` BEFORE INSERT ON `matkulganti` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

    SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalganti)
        WHEN 2 THEN 'senin'
        WHEN 3 THEN 'selasa'
        WHEN 4 THEN 'rabu'
        WHEN 5 THEN 'kamis'
        WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
    END;

    SELECT COUNT(*)
    INTO overlap_count
    FROM matkulganti
    WHERE NEW.hari = hari
    AND NEW.kelas_id = kelas_id
AND matkulganti.status IN ('sesuai', 'dilaksanakan')    
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_overlap_matkul_overlap` BEFORE INSERT ON `matkulganti` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

    SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalganti)
        WHEN 2 THEN 'senin'
        WHEN 3 THEN 'selasa'
        WHEN 4 THEN 'rabu'
        WHEN 5 THEN 'kamis'
        WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
    END;

    SELECT COUNT(*)
    INTO overlap_count
    FROM matkul
    WHERE NEW.hari = hari
    AND NEW.kelas_id = kelas_id
AND matkul.status IN ('sesuai', 'dilaksanakan')    
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_overlap_pesan_pesan` BEFORE INSERT ON `matkulganti` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

    SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalganti)
        WHEN 2 THEN 'senin'
        WHEN 3 THEN 'selasa'
        WHEN 4 THEN 'rabu'
        WHEN 5 THEN 'kamis'
        WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
    END;

    SELECT COUNT(*)
    INTO overlap_count
    FROM pesan
    WHERE NEW.hari = hari
    AND NEW.kelas_id = kelas_id
AND pesan.status IN ('sesuai', 'dilaksanakan')    
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_matkul_after_delete` AFTER DELETE ON `matkulganti` FOR EACH ROW BEGIN
    -- Kembalikan status kelas ke 'tersedia' setelah pesan dihapus
    UPDATE matkul
    SET status = 'sesuai'
    WHERE id = OLD.matkul_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_matkul_status` AFTER UPDATE ON `matkulganti` FOR EACH ROW BEGIN

    IF NEW.status = 'selesai' THEN
      
        UPDATE matkul
        SET status = 'sesuai'
        WHERE id = NEW.matkul_id
        AND status = 'dibatalkan'
        AND user_class = NEW.user_class;
       
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_kelas` BEFORE UPDATE ON `matkulganti` FOR EACH ROW BEGIN
    DECLARE count_pesan INT;
    DECLARE count_matkulganti INT;

    SELECT COUNT(*) INTO count_pesan
    FROM pesan
    WHERE kelas_id = NEW.kelas_id
    AND jamakhir > NOW()
    AND tanggalpesan >= CURDATE();

    SELECT COUNT(*) INTO count_matkulganti
    FROM matkulganti
    WHERE kelas_id = NEW.kelas_id
    AND jamakhir > NOW()
    AND tanggalganti >= CURDATE();

    IF count_pesan = 0 AND count_matkulganti = 0 THEN
        UPDATE kelas
        SET status = 'tersedia'
        WHERE id = NEW.kelas_id;
    ELSE
        UPDATE kelas
        SET status = 'dibooking'
        WHERE id = NEW.kelas_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_status_matkulganti1` BEFORE UPDATE ON `matkulganti` FOR EACH ROW BEGIN
  
    IF NEW.tanggalganti = CURDATE() 
    AND NEW.jamakhir < CURTIME() THEN
        -- Set status menjadi 'selesai'
        SET NEW.status = 'selesai';
    END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '2024_09_21_045357_create_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tanggalpesan` date NOT NULL,
  `hari` enum('senin','selasa','rabu','kamis','jumat','sabtu') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jammulai` time NOT NULL,
  `jamakhir` time NOT NULL,
  `kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('dibooking','dilaksanakan','selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dibooking',
  `user_class` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `kelas_id`, `user_id`, `tanggalpesan`, `hari`, `jammulai`, `jamakhir`, `kegiatan`, `status`, `user_class`, `created_at`, `updated_at`) VALUES
(62, 6, 1, '2024-10-21', 'senin', '12:00:00', '13:00:00', 'hmj', 'dibooking', 'PSIK23D', '2024-10-20 07:53:09', '2024-10-20 07:53:09'),
(64, 1, 1, '2024-10-21', 'selasa', '11:00:00', '12:00:00', 'hmj', 'dibooking', 'PSIK23D', '2024-10-20 07:57:36', '2024-10-20 07:57:36'),
(65, 1, 1, '2024-10-23', 'rabu', '17:00:00', '18:00:00', 'hmj', 'dibooking', 'PSIK23D', '2024-10-20 08:04:21', '2024-10-20 08:04:21');

--
-- Trigger `pesan`
--
DELIMITER $$
CREATE TRIGGER `pesan<harini` BEFORE INSERT ON `pesan` FOR EACH ROW IF NEW.tanggalpesan < CURDATE() THEN
        SIGNAL SQLSTATE '46000'
        SET MESSAGE_TEXT = 'Tidak bisa memesan untuk tanggal yang sudah lewat';
    END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_matkul_overlap` BEFORE INSERT ON `pesan` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

    SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalpesan)
        WHEN 2 THEN 'senin'
        WHEN 3 THEN 'selasa'
        WHEN 4 THEN 'rabu'
        WHEN 5 THEN 'kamis'
        WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
    END;

    SELECT COUNT(*)
    INTO overlap_count
    FROM matkul
    WHERE NEW.hari = hari
    AND NEW.kelas_id = kelas_id
AND matkul.status IN ('sesuai', 'dilaksanakan')    
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_pesan_overlap` BEFORE INSERT ON `pesan` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

    SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalpesan)
        WHEN 2 THEN 'senin'
        WHEN 3 THEN 'selasa'
        WHEN 4 THEN 'rabu'
        WHEN 5 THEN 'kamis'
        WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
    END;
    


    SELECT COUNT(*)
    INTO overlap_count
    FROM pesan
    WHERE NEW.hari = hari
    AND NEW.tanggalpesan = tanggalpesan
    AND NEW.kelas_id = kelas_id
AND pesan.status IN ('dibooking', 'dilaksanakan')    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal pesanan bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_pesan_overlap_ganti` BEFORE INSERT ON `pesan` FOR EACH ROW BEGIN
    DECLARE overlap_count INT;

    SET NEW.hari = CASE DAYOFWEEK(NEW.tanggalpesan)
        WHEN 2 THEN 'senin'
        WHEN 3 THEN 'selasa'
        WHEN 4 THEN 'rabu'
        WHEN 5 THEN 'kamis'
        WHEN 6 THEN 'jumat'
        WHEN 7 THEN 'sabtu'
    END;

    SELECT COUNT(*)
    INTO overlap_count
    FROM matkulganti
    WHERE NEW.hari = hari
    AND NEW.tanggalpesan = tanggalganti
    AND NEW.kelas_id = kelas_id
AND matkulganti.status IN ('dibooking', 'dilaksanakan')   
    AND (
        (NEW.jammulai < jamakhir AND NEW.jamakhir > jammulai)
        OR
        (NEW.jammulai = jammulai AND NEW.jamakhir = jamakhir)
    );

    IF overlap_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Jadwal mata kuliah bertabrakan dengan jadwal yang ada';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kelas_status` AFTER UPDATE ON `pesan` FOR EACH ROW BEGIN
    IF NEW.status = 'dilaksanakan' THEN
        UPDATE kelas
        SET status = 'dipakai'
        WHERE id = NEW.kelas_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kelas_status_after_pesan_delete` AFTER DELETE ON `pesan` FOR EACH ROW BEGIN
    -- Kembalikan status kelas ke 'tersedia' setelah pesan dihapus
    UPDATE kelas
    SET status = 'tersedia'
    WHERE id = OLD.kelas_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_kelas_status_after_pesan_insert_update` AFTER INSERT ON `pesan` FOR EACH ROW BEGIN
    -- Update status pada tabel kelas saat pesan diinsert
    UPDATE kelas
    SET status = NEW.status
    WHERE id = NEW.kelas_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ANmvnKyR5BXtajDbCAIEYLto0uYWVWtxL9u6qFQC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGdUOFdNV0Q4aGt1Y0l2N3AzeUJiNDJHTFcxZ0hNNHNKZE4zT0dwUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747050700),
('eDnOcOLjl6OengMLeFDtHhomdnuv7YO0cHrHHEMm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjlQNmZ6c0M5cGI0THFUOHhnVng0dm5VclZnWU5kOGh3bmZhQ2FzaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teWNsYXNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1759049667),
('MbuiqcplOU5yihK86IYdiTqQWafFPc9EqIKbzO0N', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXp4TEE1S0Z1c2lQVG9rblB6QkdwVTQ0aElKN2RnNVVJUUNMckZRciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759049383),
('rNoXhuSNXBn5U1chovQvG4z7YdHOdDc5zSvfUmvb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFMzWU1tS3RZbHBhcjVtenNJY0VCRUZLSVRLRW9jWXNHdnIyMUIyeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759049059),
('Tp1CvkixKXbkKT3HiFYOinX1xlJZ3xHiOMcv6VP4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUNQZTJsbDlYN2NRM29PM1RlNGxHRDFURE9ncmdqODFQdG5sbWVsTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759049289),
('ukMXTyMASgujpEEhWS18Bux9yWySv10WoWdxZMvd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3dFWXNlNjdGSnd2b21yTEVKcFBwajRnbWNkeUVhc3FEZUxVb0dTOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90ZXJzZWRpYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759049394),
('Yg4WtkvIhMA5Q3G1yciZypToLMdVvWGOo6haMRlo', NULL, NULL, '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzJXaUNBOHB2cklwT1Z4VVVPOUpKdW5uYXhOa2lMekhndDBvbW9sRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODoiaHR0cDovLzoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1747050687),
('ZEMuR8H27Xg3TVTf3dTQsZF92XwWqB4i1USAq22w', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVDJhQ1FDc2JUMlAwSVJLekdTUjZ3eVlraEJCNmtFZFNwVllNcEVqWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9fQ==', 1747055911);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_class` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` bigint NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siluet_default.png',
  `role` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_class`, `no_telp`, `password`, `foto`, `role`, `created_at`, `updated_at`) VALUES
(1, 'andrian', 'andrian25544@gmail.com', 'PSIK23D', 82385141229, '$2y$12$ADqn9Kuc2wk3XReaXmZ.iuepOP8VXgiFnny9flYhDodvofBKxQy8K', '1729144200.jpg', 1, '2024-10-01 02:45:57', '2024-10-16 22:50:00'),
(2, 'syaa', 'neysa123@gmail.com', 'PSIK23A', 85262749914, '$2y$12$H0POfhJcds4m5lBNPMyYFu0jSahOPY9LGL3nf9TLb697TB270z5SO', 'WhJWb72YKChEJ50jUYpXtHHwnNSQYKc9lAOnjcBa.jpg', 0, '2024-10-06 01:33:33', '2024-10-20 11:58:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warnastatus`
--

CREATE TABLE `warnastatus` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `status` enum('hijau','kuning','merah') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_foreign` (`user_id`),
  ADD KEY `history_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_gedung_id_foreign` (`gedung_id`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matkul_kelas_id_foreign` (`kelas_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `matkulganti`
--
ALTER TABLE `matkulganti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matkulganti_matkul_id_foreign` (`matkul_id`),
  ADD KEY `matkulganti_kelas_id_foreign` (`kelas_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesan_kelas_id_foreign` (`kelas_id`),
  ADD KEY `pesan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_class` (`user_class`);

--
-- Indeks untuk tabel `warnastatus`
--
ALTER TABLE `warnastatus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warnastatus_kelas_id_foreign` (`kelas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `matkulganti`
--
ALTER TABLE `matkulganti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `warnastatus`
--
ALTER TABLE `warnastatus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `matkul_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `matkulganti`
--
ALTER TABLE `matkulganti`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matkulganti_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `matkulganti_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matkulganti_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `warnastatus`
--
ALTER TABLE `warnastatus`
  ADD CONSTRAINT `warnastatus_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_matkul_salah` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-10-19 18:15:48' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM matkul
  WHERE keterangan = 'salah'$$

CREATE DEFINER=`root`@`localhost` EVENT `enable_matkul_after_temp` ON SCHEDULE EVERY 1 WEEK STARTS '2024-09-21 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE matkul
    SET status = 'sesuai'
    WHERE id
    AND user_class = New.user_class;

END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_status_matkulganti` ON SCHEDULE EVERY 1 SECOND STARTS '2024-09-17 20:00:27' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE matkulganti
    SET status = 'selesai'
    WHERE NOW() > jamakhir
    AND tanggalganti = CURRENT_DATE   
    AND status = 'dilaksanakan';
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_status_matkulganti1` ON SCHEDULE EVERY 1 SECOND STARTS '2024-09-20 23:58:40' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE matkulganti
    SET status = 'dilaksanakan'
    WHERE NOW() >= jammulai  
    AND NOW() < jamakhir    
    AND tanggalganti = CURRENT_DATE
    AND status = 'dibooking';
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_status_pesan` ON SCHEDULE EVERY 1 SECOND STARTS '2024-09-20 23:26:56' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE pesan
    SET status = 'selesai'
    WHERE NOW() > jamakhir
    AND tanggalpesan = CURRENT_DATE   
    AND status = 'dilaksanakan';
END$$

CREATE DEFINER=`root`@`localhost` EVENT `update_status_pesan1` ON SCHEDULE EVERY 1 SECOND STARTS '2024-09-21 03:10:55' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE matkulganti
    SET status = 'dilaksanakan'
    WHERE NOW() >= jammulai  
    AND NOW() < jamakhir    
    AND tanggalpesan = CURRENT_DATE
    AND status = 'dibooking';
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
