-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2023 at 08:00 AM
-- Server version: 10.6.15-MariaDB-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapurkod_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `tipe_kehadiran` varchar(10) DEFAULT NULL COMMENT 'present = P, late = L, absent = A, holiday = H, half day = F',
  `pertemuan` int(11) DEFAULT NULL,
  `dibuat_oleh` int(11) DEFAULT NULL,
  `semester` varchar(15) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tahun_ajaran` varchar(15) DEFAULT NULL,
  `diubah_oleh` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `siswa_id`, `jadwal_id`, `tipe_kehadiran`, `pertemuan`, `dibuat_oleh`, `semester`, `kelas_id`, `tanggal`, `tahun_ajaran`, `diubah_oleh`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '0', 1, 16, '1', 46, '2023-04-28', '3', NULL, '2023-04-28 10:18:08', '2023-04-28 10:18:08'),
(3, 812, 1, '0', 1, 16, '1', 46, '2023-04-28', '3', NULL, '2023-04-28 10:18:08', '2023-04-28 10:18:08'),
(4, 813, 1, '0', 1, 16, '1', 46, '2023-04-28', '3', NULL, '2023-04-28 10:18:08', '2023-04-28 10:18:08'),
(5, 814, 1, '0', 1, 16, '1', 46, '2023-04-28', '3', NULL, '2023-04-28 10:18:08', '2023-04-28 10:18:08'),
(6, 808, 5, '0', 1, 53, '1', 47, '2023-05-04', '3', NULL, '2023-05-04 03:26:55', '2023-05-04 03:26:55'),
(7, 809, 5, '1', 1, 53, '1', 47, '2023-05-04', '3', NULL, '2023-05-04 03:26:55', '2023-05-04 03:26:55'),
(8, 810, 5, '3', 1, 53, '1', 47, '2023-05-04', '3', NULL, '2023-05-04 03:26:55', '2023-05-04 03:26:55'),
(9, 811, 5, '0', 1, 53, '1', 47, '2023-05-04', '3', NULL, '2023-05-04 03:26:55', '2023-05-04 03:26:55'),
(10, 815, 5, '3', 1, 53, '1', 47, '2023-05-04', '3', NULL, '2023-05-04 03:26:55', '2023-05-04 03:26:55'),
(11, 808, 5, '0', 2, 53, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 03:09:13', '2023-05-05 03:09:13'),
(12, 809, 5, '0', 2, 53, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 03:09:13', '2023-05-05 03:09:13'),
(13, 810, 5, '0', 2, 53, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 03:09:13', '2023-05-05 03:09:13'),
(14, 811, 5, '0', 2, 53, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 03:09:13', '2023-05-05 03:09:13'),
(15, 815, 5, '3', 2, 53, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 03:09:13', '2023-05-05 03:09:13'),
(16, 816, 5, '0', 1, 53, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 03:09:13', '2023-05-05 03:09:13'),
(17, 808, 9, '0', 1, 16, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 04:04:31', '2023-05-05 04:04:31'),
(18, 809, 9, '0', 1, 16, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 04:04:31', '2023-05-05 04:04:31'),
(19, 810, 9, '0', 1, 16, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 04:04:31', '2023-05-05 04:04:31'),
(20, 811, 9, '0', 1, 16, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 04:04:31', '2023-05-05 04:04:31'),
(21, 815, 9, '0', 1, 16, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 04:04:31', '2023-05-05 04:04:31'),
(22, 816, 9, '0', 1, 16, '1', 47, '2023-05-05', '3', NULL, '2023-05-05 04:04:31', '2023-05-05 04:04:31'),
(23, 808, 10, '0', 1, 53, '1', 47, '2023-05-08', '3', NULL, '2023-05-08 03:15:53', '2023-05-08 03:15:53'),
(24, 809, 10, '0', 1, 53, '1', 47, '2023-05-08', '3', NULL, '2023-05-08 03:15:53', '2023-05-08 03:15:53'),
(25, 810, 10, '0', 1, 53, '1', 47, '2023-05-08', '3', NULL, '2023-05-08 03:15:53', '2023-05-08 03:15:53'),
(26, 811, 10, '0', 1, 53, '1', 47, '2023-05-08', '3', NULL, '2023-05-08 03:15:53', '2023-05-08 03:15:53'),
(27, 815, 10, '0', 1, 53, '1', 47, '2023-05-08', '3', NULL, '2023-05-08 03:15:53', '2023-05-08 03:15:53'),
(28, 816, 10, '0', 1, 53, '1', 47, '2023-05-08', '3', NULL, '2023-05-08 03:15:53', '2023-05-08 03:15:53'),
(29, 808, 5, '0', 3, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(30, 809, 5, '0', 3, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(31, 810, 5, '0', 3, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(32, 811, 5, '0', 3, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(33, 815, 5, '0', 3, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(34, 816, 5, '0', 2, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(35, 817, 5, '0', 1, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24'),
(36, 818, 5, '0', 1, 53, '1', 47, '2023-05-12', '3', NULL, '2023-05-12 08:31:24', '2023-05-12 08:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nomor_induk_pegawai` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_user`, `nomor_induk_pegawai`, `nama_admin`, `email`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, 'dimmas', 'dimmas', 'dimmas@gmail.com', NULL, '2022-12-14 09:51:49', '2023-02-27 09:28:54'),
(2, 95, '98009', 'admin', 'admin@emaill.com', NULL, '2023-01-05 05:37:00', '2023-01-05 05:37:00'),
(3, 96, '9884', 'admin 2', 'admmda@mfm.com', NULL, '2023-01-05 05:37:00', '2023-01-05 05:37:00'),
(4, 126, '98009', 'admin', 'addssdsdmin@emaill.com', NULL, '2023-01-09 06:10:32', '2023-01-09 06:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `id_orang_tua` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nomor_induk_siswa` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumnis`
--

INSERT INTO `alumnis` (`id`, `tingkat`, `id_orang_tua`, `id_user`, `nomor_induk_siswa`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `telp`, `alamat`, `kelas`, `avatar`, `agama`, `created_at`, `updated_at`) VALUES
(839, 12, 33, 2, '09890980989', '0989098', 'Ari Hadya Achmad   id(1)', 'L', 'Brebes', '2023-01-01', NULL, 'alamat', NULL, NULL, 'Islam', '2023-02-23 08:20:40', '2023-02-23 08:20:40'),
(840, 12, 62, 901, NULL, NULL, 'dayat', 'L', 'dayat', '2023-02-24', NULL, NULL, NULL, NULL, NULL, '2023-02-23 08:31:07', '2023-02-23 08:31:07'),
(841, 12, 63, 902, NULL, NULL, 'tes', 'L', 'tes', '2023-02-23', NULL, NULL, NULL, NULL, NULL, '2023-02-23 08:31:07', '2023-02-23 08:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_ajar_mata_pelajarans`
--

CREATE TABLE `bahan_ajar_mata_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_ajar_mata_pelajarans`
--

INSERT INTO `bahan_ajar_mata_pelajarans` (`id`, `mata_pelajaran_id`, `judul`, `file`, `created_at`, `updated_at`) VALUES
(3, 1, 'Simbiosimutualisme', 'file-bahan_ajar-c3tDI.pdf', '2023-05-09 09:41:09', '2023-05-09 09:42:45'),
(4, 2, 'Aljabar', 'file-bahan_ajar-2CAhmf.pdf', '2023-05-16 03:44:09', '2023-05-16 03:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `image`, `tanggal`, `jam`, `status`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Opening Universal SMP Islam Al-Azhar BSD', 'https://utama.alazhar-bsd.sch.id/2023/02/09/universal-2023/', 'foto-berita-lNlhB.jpg', '2023-01-02', '12:22', 1, 'https://utama.alazhar-bsd.sch.id/2022/08/01/pembukaan-tahun-pelajaran-baru-2022-2023/', '2022-12-29 04:00:52', '2023-04-18 04:08:02'),
(2, 'Kita Juara!', '<p>JUARA DUNIA</p><p><br></p>', 'foto-berita-VR4pi.jpeg', '2023-01-02', '11:01', 1, 'https://www.detik.com/edu/edutainment/d-6716445/top-mahasiswa-uns-raih-medali-emas-silat-di-sea-games-2023', '2022-12-29 04:03:34', '2023-05-12 03:33:22'),
(3, 'Juara Tahfizh Seindonesia!', 'Siswa Al-Azhar KEmbali memenagkan perlombaan tahfizh se indonesia', 'foto-berita-JvRAT.jpg', '2023-01-02', '00:00', 1, 'https://www.detik.com/edu/foto/d-6715907/infografis-5-jurusan-kuliah-yang-cocok-buat-gamers', '2023-01-02 19:40:49', '2023-05-12 03:34:15'),
(4, 'Perbaikan infrastruktur pendidikan pasca gempa', 'Perbaikan Infrastruktur Pendidikan Pascagempa Cianjur Butuh Triliunan Rupiah\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Perbaikan Infrastruktur Pendidikan Pascagempa Cianjur Butuh Triliunan Rupiah\",&nbsp;', 'foto-berita-F4kqv.jpeg', '2022-12-27', '00:00', 1, 'https://www.detik.com/edu/seleksi-masuk-pt/d-6716159/link-pendaftaran-smm-ptn-barat-dan-ketentuan-jurusannya-segera-daftarkan-diri', '2023-01-02 19:46:54', '2023-05-12 03:34:52'),
(5, 'Kenali sekolah biasa dan sekolah inklusi', 'Sekolah inklusi menerima murid tanpa memandang apakah mereka anak normal atau berkebutuhan khusus. Bisa dikatakan, sekolah inklusi sebenarnya adalah sekolah reguler yang juga menerima murid ABK.\r\n\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Kenali Perbedaan Sekolah Luar Biasa dan Sekolah Inklusi\", Klik untuk baca: https://www.kompas.com/edu/read/2023/01/01/111916171/kenali-perbedaan-sekolah-luar-biasa-dan-sekolah-inklusi.\r\nPenulis : Mahar Prastiwi\r\nEditor : Albertus Adit\r\n\r\nKompascom+ baca berita tanpa iklan: https://kmp.im/plus6\r\nDownload aplikasi: https://kmp.im/app6', 'foto-berita-v8n3r.jpg', '2023-01-03', '11:11', 1, 'https://www.detik.com/edu/perguruan-tinggi/d-6715791/18-prodi-uin-sunan-kalijaga-terakreditasi-internasional-fibaa-calon-maba-cek', '2023-01-02 19:48:34', '2023-05-12 03:35:36'),
(7, 'Pembukaan Tahun Pelajaran Baru 2023/2024', 'Pembukaan Tahun Pelajaran Baru 2022/2023', 'foto-berita-4qFu9.jpeg', '2023-01-30', '00:00', 1, 'https://www.detik.com/edu/detikpedia/d-6716144/magic-mushroom-bisa-menyembuhkan-buta-warna-begini-kata-peneliti', '2023-01-27 09:38:59', '2023-05-12 03:36:12'),
(8, 'pelaksanaan qurban', '<p>https://utama.alazhar-bsd.sch.id/2022/08/01/pelaksanaan-kegiatan-iedul-qurban-1443-hijriah/</p>', 'foto-berita-crIw8.jpeg', '2023-01-30', '00:00', 1, 'https://utama.alazhar-bsd.sch.id/2022/08/01/pelaksanaan-kegiatan-iedul-qurban-1443-hijriah', '2023-01-27 09:39:57', '2023-04-18 03:50:59'),
(9, 'Serapan Perguruan Tinggi Alumni Al-Azhar Bumi Serpong Damai', 'https://utama.alazhar-bsd.sch.id/2022/08/02/serapan-perguruan-tinggi-alumni-al-azhar-bumi-serpong-damai/', 'foto-berita-Zn3yu.jpeg', '2023-01-28', '00:00', 1, 'https://utama.alazhar-bsd.sch.id/2022/08/02/serapan-perguruan-tinggi-alumni-al-azhar-bumi-serpong-damai/', '2023-01-27 09:41:05', '2023-01-27 09:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `sampul` varchar(250) DEFAULT NULL,
  `sinopsis` varchar(255) DEFAULT NULL,
  `isbn_no` varchar(50) DEFAULT NULL,
  `penerbit` varchar(120) NOT NULL,
  `penulis` varchar(120) NOT NULL,
  `rak` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `bahasa` varchar(100) DEFAULT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `diubah_oleh` int(11) NOT NULL,
  `harga` double(15,2) DEFAULT NULL,
  `view` varchar(20) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `file_ebook` varchar(100) DEFAULT NULL,
  `link_ebook` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `sampul`, `sinopsis`, `isbn_no`, `penerbit`, `penulis`, `rak`, `jumlah`, `jumlah_halaman`, `bahasa`, `dibuat_oleh`, `diubah_oleh`, `harga`, `view`, `jenis`, `file_ebook`, `link_ebook`, `created_at`, `updated_at`) VALUES
(2, 'Kisah Sangkuriang Sang Anak Durhaka', 'sampul-KuHVu.jpg', NULL, NULL, 'penerbit', 'penulis', NULL, NULL, 2000, 'indonesia', 95, 95, NULL, '60', 'ebook', NULL, NULL, '2022-12-28 01:59:23', '2023-06-13 05:39:43'),
(3, 'Kisah Pemberani Sang Penyelamat', 'sampul-WQUYh.png', NULL, '90', '0ffdn', 'nmnm', '90909', 9090, 20, 'indonesia', 95, 95, 9090.00, '2000', 'fisik', NULL, NULL, '2022-12-28 02:05:47', '2023-05-05 03:46:34'),
(4, 'Fisika', 'sampul-OAFQv.jpeg', NULL, NULL, 'dimmas', 'dimmas', '2', 3, 20, 'indonesia', 95, 95, 70000.00, '30', 'fisik', 'ebook-dimmas8dw7I.pdf', 'https://localhost::8000/baca-buku-ebook/ebook-dimmas8dw7I.pdf', '2023-04-14 02:57:46', '2023-05-05 03:46:12'),
(5, 'Matematika', 'sampul-Pmvuo.jpeg', NULL, NULL, 'halal grup', 'dimas', NULL, NULL, 1, 'Bahasa Indonesia', 95, 95, NULL, '54', 'ebook', 'file_ebook-ju4lu.pdf', 'https://localhost::8000/baca-buku-ebook/ebook-dimas6b0NK.pdf', '2023-04-27 07:36:30', '2023-05-05 04:04:03'),
(6, 'Sejarah', 'sampul-OTIjN.jpeg', NULL, NULL, 'halal grups', 'dimasta', NULL, NULL, 1, 'Bahasa Indonesia', 95, 95, NULL, '24', 'ebook', 'file_ebook-8L7ia.pdf', 'https://localhost::8000/baca-buku-ebook/ebook-dimastaatxWn.pdf', '2023-04-27 07:37:57', '2023-05-05 03:45:48'),
(7, 'PKN', 'sampul-HmkcO.png', NULL, NULL, 'halal grups', 'dimasta', NULL, NULL, 60, 'Bahasa Indonesia', 95, 95, NULL, '9', 'ebook', 'file_ebook-vg9cc.pdf', 'https://localhost::8000/baca-buku-ebook/ebook-dimastatsOMH.pdf', '2023-04-27 07:38:02', '2023-05-05 03:54:04'),
(8, 'IPA', 'sampul-1dhPH.png', NULL, NULL, 'halal grups', 'dimasta', NULL, NULL, 60, 'Bahasa Indonesia', 95, 95, NULL, '6', 'ebook', 'file_ebook-tEjVt.pdf', 'https://localhost::8000/baca-buku-ebook/ebook-dimastaIKSPJ.pdf', '2023-04-27 07:38:24', '2023-06-13 05:30:12'),
(9, 'Informatika', 'sampul-AZQB0.png', NULL, NULL, 'Harian Saya', 'Michael', NULL, NULL, 90, 'indonesia', 95, 95, NULL, '13', 'ebook', 'ebook-MichaelbR9hU.pdf', 'https://dapurkoding.my.id/baca-buku-ebook/ebook-MichaelbR9hU.pdf', '2023-05-05 04:00:43', '2023-06-14 01:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `buku_kategori`
--

CREATE TABLE `buku_kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku_kategori`
--

INSERT INTO `buku_kategori` (`id`, `nama_kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'teknologi', 'gambar-kategori-V2UWj.webp', NULL, '2023-04-13 01:07:17'),
(2, 'sejarah', 'gambar-kategori-Od5os.jpeg', NULL, '2023-04-13 01:07:29'),
(3, 'Filsafat', 'gambar-kategori-Gxb41.jpeg', NULL, '2023-04-13 01:08:10'),
(6, 'Bahasa', 'gambar-kategori-BFKSM.jpeg', '2023-05-02 08:20:32', '2023-05-02 08:20:32'),
(7, 'Kewarganegaraan', 'gambar-kategori-mEBzI.png', '2023-05-02 08:51:04', '2023-05-02 08:51:04'),
(8, 'Ilmu Pengetahuan', 'gambar-kategori-7b3ZV.jpeg', '2023-05-05 03:44:38', '2023-05-05 03:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `buku_relasi_kategoris`
--

CREATE TABLE `buku_relasi_kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` int(11) NOT NULL,
  `buku_kategori_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku_relasi_kategoris`
--

INSERT INTO `buku_relasi_kategoris` (`id`, `buku_id`, `buku_kategori_id`, `created_at`, `updated_at`) VALUES
(44, 7, 7, '2023-05-05 03:45:18', '2023-05-05 03:45:18'),
(45, 8, 8, '2023-05-05 03:45:35', '2023-05-05 03:45:35'),
(46, 6, 2, '2023-05-05 03:45:48', '2023-05-05 03:45:48'),
(47, 4, 8, '2023-05-05 03:46:12', '2023-05-05 03:46:12'),
(48, 3, 2, '2023-05-05 03:46:34', '2023-05-05 03:46:34'),
(50, 5, 8, '2023-05-05 03:47:08', '2023-05-05 03:47:08'),
(54, 9, 6, '2023-05-05 04:01:12', '2023-05-05 04:01:12'),
(55, 9, 1, '2023-05-05 04:01:12', '2023-05-05 04:01:12'),
(56, 2, 2, '2023-05-23 03:08:34', '2023-05-23 03:08:34'),
(57, 2, 3, '2023-05-23 03:08:34', '2023-05-23 03:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `cek_totals`
--

CREATE TABLE `cek_totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_invoice` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cek_totals`
--

INSERT INTO `cek_totals` (`id`, `id_invoice`, `nominal`, `id_user`, `created_at`, `updated_at`) VALUES
(529, 'INV-00003-III-2023', 90000, 770, '2023-03-02 06:09:58', '2023-03-02 06:09:58'),
(533, 'INV-00001-III-2023', 90000, 768, '2023-03-02 07:25:20', '2023-03-02 07:25:20'),
(539, 'INV-00013-III-2023', 300000, 768, '2023-03-02 08:44:09', '2023-03-02 08:44:09'),
(541, 'INV-00007-III-2023', 70000000, 770, '2023-03-02 09:28:59', '2023-03-02 09:28:59'),
(542, 'INV-00011-III-2023', 100000, 770, '2023-03-02 09:29:01', '2023-03-02 09:29:01'),
(543, 'INV-00015-III-2023', 300000, 770, '2023-03-02 09:29:03', '2023-03-02 09:29:03'),
(549, 'INV-00006-III-2023', 70000000, 769, '2023-03-03 02:33:09', '2023-03-03 02:33:09'),
(562, 'INV-00020-III-2023', 300000, 801, '2023-03-14 16:47:09', '2023-03-14 16:47:09'),
(564, 'INV-00002-V-2023', 200000, 812, '2023-05-02 04:47:15', '2023-05-02 04:47:15'),
(565, 'INV-00010-V-2023', 300000, 812, '2023-05-02 04:47:18', '2023-05-02 04:47:18'),
(579, 'INV-00123-V-2023', 90000, 951, '2023-05-10 07:42:37', '2023-05-10 07:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'e7841278-34b1-4bd5-8a20-6cdeceb3cc0d', 'database', 'default', '{\"uuid\":\"e7841278-34b1-4bd5-8a20-6cdeceb3cc0d\",\"displayName\":\"App\\\\Jobs\\\\SendNotifEmailRegister\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendNotifEmailRegister\",\"command\":\"O:31:\\\"App\\\\Jobs\\\\SendNotifEmailRegister\\\":11:{s:38:\\\"\\u0000App\\\\Jobs\\\\SendNotifEmailRegister\\u0000email\\\";N;s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Illuminate\\Queue\\MaxAttemptsExceededException: App\\Jobs\\SendNotifEmailRegister has been attempted too many times or run too long. The job may have previously timed out. in C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php:750\nStack trace:\n#0 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(504): Illuminate\\Queue\\Worker->maxAttemptsExceededException(Object(Illuminate\\Queue\\Jobs\\DatabaseJob))\n#1 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(418): Illuminate\\Queue\\Worker->markJobAsFailedIfAlreadyExceedsMaxAttempts(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), 1)\n#2 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(378): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#3 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(172): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#4 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#5 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#6 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#7 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#8 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#9 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#10 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(653): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#11 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#12 C:\\xampp\\htdocs\\al-azhar\\vendor\\symfony\\console\\Command\\Command.php(298): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#13 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#14 C:\\xampp\\htdocs\\al-azhar\\vendor\\symfony\\console\\Application.php(1040): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#15 C:\\xampp\\htdocs\\al-azhar\\vendor\\symfony\\console\\Application.php(301): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#16 C:\\xampp\\htdocs\\al-azhar\\vendor\\symfony\\console\\Application.php(171): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#17 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(94): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#18 C:\\xampp\\htdocs\\al-azhar\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#19 C:\\xampp\\htdocs\\al-azhar\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#20 {main}', '2023-02-24 04:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_kegiatans`
--

CREATE TABLE `gambar_kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_kegiatans`
--

INSERT INTO `gambar_kegiatans` (`id`, `kegiatan_id`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 8, 'foto-lampiran-mkvbc.jpeg', NULL, NULL),
(4, 8, 'foto-lampiran-mkvbc.jpeg', NULL, NULL),
(5, 9, 'foto-kegiatan-8JutY.jpg', '2023-04-27 06:27:33', '2023-04-27 06:27:33'),
(7, 11, 'foto-kegiatan-AGJ1a.jpg', '2023-04-27 08:16:24', '2023-04-27 08:16:24'),
(9, 12, 'foto-kegiatan-rTAhi.jpg', '2023-05-02 04:32:29', '2023-05-02 04:32:29'),
(10, 13, 'foto-kegiatan-orWAc.jpg', '2023-05-02 04:41:12', '2023-05-02 04:41:12'),
(11, 14, 'foto-kegiatan-pDWsn.jpg', '2023-05-02 04:45:32', '2023-05-02 04:45:32'),
(12, 3, 'foto-kegiatan-8apet.jpeg', '2023-05-04 07:43:09', '2023-05-04 07:43:09'),
(13, 4, 'foto-kegiatan-2uVBy.jpeg', '2023-05-04 07:44:12', '2023-05-04 07:44:12'),
(14, 6, 'foto-kegiatan-BQ0qY.jpeg', '2023-05-04 07:45:36', '2023-05-04 07:45:36'),
(15, 7, 'foto-kegiatan-NnsMo.jpeg', '2023-05-04 07:46:41', '2023-05-04 07:46:41'),
(17, 1, 'foto-kegiatan-yOLgz.jpeg', '2023-05-04 07:49:42', '2023-05-04 07:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `mulai_mengajar` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` varchar(20) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `id_user`, `mulai_mengajar`, `name`, `email`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `telp`, `avatar`, `created_at`, `updated_at`) VALUES
(16, 3, '2022-10-03', 'Achmad Rochim', 'guru@gmail.com', 'Blora Jawa tengah', 'L', 'jakarta', '2023-01-01', '0896748375887', 'foto-guru-Achmad RochimgPxBA.png', '2022-12-26 00:31:39', '2023-01-19 03:47:08'),
(47, 97, '2022-10-06', 'Ananda Dimmas Budiarto', 'guru2@gmail.com', 'Blora, Jawa Tengah', NULL, NULL, NULL, '089089869584', 'guru-D0psd.jpeg', '2023-01-06 03:44:23', '2023-04-28 07:40:49'),
(50, 898, '2022-10-10', 'tesguru', 'tesguru@gmail.com', 'alamat', NULL, NULL, NULL, '09009090', 'guru-pjM9l.jpeg', '2023-02-20 07:45:37', '2023-05-04 06:20:29'),
(51, 928, NULL, 'Prof.Dr.Heri Setiawan', 'megacan@gmail.com', 'Jl.Kebon Sawit', NULL, NULL, NULL, '081278906543', 'guru-R7TrV.jpeg', '2023-04-27 03:36:16', '2023-05-04 06:19:34'),
(52, 940, NULL, 'Heru', 'Pianmihirini@gmail.com', 'Jl.Kebon Nangka', NULL, NULL, NULL, '089776504367', 'guru-LGOVb.jpeg', '2023-04-28 06:52:27', '2023-05-04 06:20:00'),
(53, 949, NULL, 'budi', 'qwrqwre2@gmail.com', 'qwjqwpf', NULL, NULL, NULL, '198234827', 'guru-cMlGp.jpeg', '2023-05-02 02:58:17', '2023-05-04 06:20:47'),
(54, 964, NULL, 'penyok', 'penyok@gmail.com', 'password', NULL, NULL, NULL, '085895', 'guru-DXdd9.jpg', '2023-06-18 00:23:12', '2023-06-18 00:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `guru_kelas`
--

CREATE TABLE `guru_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_kelas`
--

INSERT INTO `guru_kelas` (`id`, `guru_id`, `kelas_id`, `mata_pelajaran_id`, `created_at`, `updated_at`) VALUES
(2, 14, 1, 1, '2022-12-21 21:07:35', '2022-12-21 21:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `haris`
--

CREATE TABLE `haris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `haris`
--

INSERT INTO `haris` (`id`, `name`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Senin', 'Mon', NULL, NULL),
(2, 'Selasa', 'Tue', NULL, NULL),
(3, 'Rabu', 'Wed', NULL, NULL),
(4, 'Kamis', 'Thu', NULL, NULL),
(5, 'Jumat', 'Fri', NULL, NULL),
(6, 'Sabtu', 'Sat', NULL, NULL),
(7, 'Minggu', 'Sun', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tagihans`
--

CREATE TABLE `invoice_tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tagihan` int(11) NOT NULL,
  `id_invoice` varchar(255) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `nominal` double(15,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_tagihans`
--

INSERT INTO `invoice_tagihans` (`id`, `id_tagihan`, `id_invoice`, `id_siswa`, `kelas_id`, `nominal`, `status`, `created_at`, `updated_at`) VALUES
(335, 330, 'INV-00001-V-2023', 1, 46, 200000.00, 'paid', '2023-05-02 03:43:33', '2023-05-02 04:59:45'),
(336, 331, 'INV-00002-V-2023', 812, 46, 200000.00, 'unpaid', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(337, 332, 'INV-00003-V-2023', 813, 46, 200000.00, 'paid', '2023-05-02 03:43:34', '2023-05-02 06:35:58'),
(338, 333, 'INV-00004-V-2023', 814, 46, 200000.00, 'unpaid', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(339, 334, 'INV-00005-V-2023', 808, 47, 200000.00, 'unpaid', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(340, 335, 'INV-00006-V-2023', 809, 47, 200000.00, 'paid', '2023-05-02 03:43:34', '2023-05-24 15:15:18'),
(341, 336, 'INV-00007-V-2023', 810, 47, 200000.00, 'unpaid', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(342, 337, 'INV-00008-V-2023', 811, 47, 200000.00, 'unpaid', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(343, 338, 'INV-00009-V-2023', 1, 46, 300000.00, 'paid', '2023-05-02 03:43:43', '2023-05-02 04:02:42'),
(344, 339, 'INV-00010-V-2023', 812, 46, 300000.00, 'unpaid', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(345, 340, 'INV-00011-V-2023', 813, 46, 300000.00, 'unpaid', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(346, 341, 'INV-00012-V-2023', 814, 46, 300000.00, 'unpaid', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(347, 342, 'INV-00013-V-2023', 808, 47, 300000.00, 'unpaid', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(348, 343, 'INV-00014-V-2023', 809, 47, 300000.00, 'paid', '2023-05-02 03:43:43', '2023-05-24 15:15:18'),
(349, 344, 'INV-00015-V-2023', 810, 47, 300000.00, 'unpaid', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(350, 345, 'INV-00016-V-2023', 811, 47, 300000.00, 'unpaid', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(351, 346, 'INV-00017-V-2023', 1, 46, 70000.00, 'paid', '2023-05-02 03:43:48', '2023-05-02 05:01:35'),
(352, 347, 'INV-00018-V-2023', 812, 46, 70000.00, 'unpaid', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(353, 348, 'INV-00019-V-2023', 813, 46, 70000.00, 'paid', '2023-05-02 03:43:48', '2023-05-02 06:35:58'),
(354, 349, 'INV-00020-V-2023', 814, 46, 70000.00, 'unpaid', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(355, 350, 'INV-00021-V-2023', 808, 47, 70000.00, 'unpaid', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(356, 351, 'INV-00022-V-2023', 809, 47, 70000.00, 'unpaid', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(357, 352, 'INV-00023-V-2023', 810, 47, 70000.00, 'unpaid', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(358, 353, 'INV-00024-V-2023', 811, 47, 70000.00, 'unpaid', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(359, 354, 'INV-00025-V-2023', 1, 46, 100000.00, 'paid', '2023-05-02 03:43:53', '2023-05-02 05:29:33'),
(360, 355, 'INV-00026-V-2023', 812, 46, 100000.00, 'unpaid', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(361, 356, 'INV-00027-V-2023', 813, 46, 100000.00, 'unpaid', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(362, 357, 'INV-00028-V-2023', 814, 46, 100000.00, 'unpaid', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(363, 358, 'INV-00029-V-2023', 808, 47, 100000.00, 'unpaid', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(364, 359, 'INV-00030-V-2023', 809, 47, 100000.00, 'unpaid', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(365, 360, 'INV-00031-V-2023', 810, 47, 100000.00, 'unpaid', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(366, 361, 'INV-00032-V-2023', 811, 47, 100000.00, 'unpaid', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(367, 362, 'INV-00033-V-2023', 1, 46, 100000000.00, 'paid', '2023-05-02 03:43:59', '2023-05-02 04:40:54'),
(368, 363, 'INV-00034-V-2023', 812, 46, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(369, 364, 'INV-00035-V-2023', 813, 46, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(370, 365, 'INV-00036-V-2023', 814, 46, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(371, 366, 'INV-00037-V-2023', 808, 47, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(372, 367, 'INV-00038-V-2023', 809, 47, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(373, 368, 'INV-00039-V-2023', 810, 47, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(374, 369, 'INV-00040-V-2023', 811, 47, 100000000.00, 'unpaid', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(375, 370, 'INV-00041-V-2023', 1, 46, 70000000.00, 'paid', '2023-05-02 03:44:06', '2023-05-02 04:35:28'),
(376, 371, 'INV-00042-V-2023', 812, 46, 70000000.00, 'unpaid', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(377, 372, 'INV-00043-V-2023', 813, 46, 70000000.00, 'paid', '2023-05-02 03:44:06', '2023-05-02 07:24:39'),
(378, 373, 'INV-00044-V-2023', 814, 46, 70000000.00, 'unpaid', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(379, 374, 'INV-00045-V-2023', 808, 47, 70000000.00, 'unpaid', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(380, 375, 'INV-00046-V-2023', 809, 47, 70000000.00, 'unpaid', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(381, 376, 'INV-00047-V-2023', 810, 47, 70000000.00, 'unpaid', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(382, 377, 'INV-00048-V-2023', 811, 47, 70000000.00, 'unpaid', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(383, 378, 'INV-00049-V-2023', 1, 46, 90000.00, 'paid', '2023-05-02 03:44:14', '2023-05-02 04:03:31'),
(384, 379, 'INV-00050-V-2023', 812, 46, 90000.00, 'unpaid', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(385, 380, 'INV-00051-V-2023', 813, 46, 90000.00, 'unpaid', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(386, 381, 'INV-00052-V-2023', 814, 46, 90000.00, 'unpaid', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(387, 382, 'INV-00053-V-2023', 808, 47, 90000.00, 'unpaid', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(388, 383, 'INV-00054-V-2023', 809, 47, 90000.00, 'unpaid', '2023-05-02 03:44:15', '2023-05-02 03:44:15'),
(389, 384, 'INV-00055-V-2023', 810, 47, 90000.00, 'paid', '2023-05-02 03:44:15', '2023-05-02 04:54:36'),
(390, 385, 'INV-00056-V-2023', 811, 47, 90000.00, 'unpaid', '2023-05-02 03:44:15', '2023-05-02 03:44:15'),
(391, 386, 'INV-00057-V-2023', 1, 46, 200000.00, 'paid', '2023-05-02 06:27:28', '2023-05-04 06:13:36'),
(392, 387, 'INV-00058-V-2023', 812, 46, 200000.00, 'unpaid', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(393, 388, 'INV-00059-V-2023', 813, 46, 200000.00, 'paid', '2023-05-02 06:27:28', '2023-05-02 07:24:12'),
(394, 389, 'INV-00060-V-2023', 814, 46, 200000.00, 'unpaid', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(395, 390, 'INV-00061-V-2023', 808, 47, 200000.00, 'unpaid', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(396, 391, 'INV-00062-V-2023', 809, 47, 200000.00, 'unpaid', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(397, 392, 'INV-00063-V-2023', 810, 47, 200000.00, 'unpaid', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(398, 393, 'INV-00064-V-2023', 811, 47, 200000.00, 'unpaid', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(399, 394, 'INV-00065-V-2023', 1, 46, 300000.00, 'paid', '2023-05-02 06:27:34', '2023-05-04 16:35:31'),
(400, 395, 'INV-00066-V-2023', 812, 46, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(401, 396, 'INV-00067-V-2023', 813, 46, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(402, 397, 'INV-00068-V-2023', 814, 46, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(403, 398, 'INV-00069-V-2023', 808, 47, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(404, 399, 'INV-00070-V-2023', 809, 47, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(405, 400, 'INV-00071-V-2023', 810, 47, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(406, 401, 'INV-00072-V-2023', 811, 47, 300000.00, 'unpaid', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(407, 402, 'INV-00073-V-2023', 1, 46, 70000.00, 'paid', '2023-05-02 06:27:52', '2023-06-13 05:33:31'),
(408, 403, 'INV-00074-V-2023', 812, 46, 70000.00, 'unpaid', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(409, 404, 'INV-00075-V-2023', 813, 46, 70000.00, 'unpaid', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(410, 405, 'INV-00076-V-2023', 814, 46, 70000.00, 'unpaid', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(411, 406, 'INV-00077-V-2023', 808, 47, 70000.00, 'unpaid', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(412, 407, 'INV-00078-V-2023', 809, 47, 70000.00, 'unpaid', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(413, 408, 'INV-00079-V-2023', 810, 47, 70000.00, 'unpaid', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(414, 409, 'INV-00080-V-2023', 811, 47, 70000.00, 'unpaid', '2023-05-02 06:27:53', '2023-05-02 06:27:53'),
(415, 410, 'INV-00081-V-2023', 1, 46, 100000.00, 'paid', '2023-05-02 06:27:57', '2023-06-13 06:50:27'),
(416, 411, 'INV-00082-V-2023', 812, 46, 100000.00, 'unpaid', '2023-05-02 06:27:57', '2023-05-02 06:27:57'),
(417, 412, 'INV-00083-V-2023', 813, 46, 100000.00, 'paid', '2023-05-02 06:27:57', '2023-05-02 07:24:03'),
(418, 413, 'INV-00084-V-2023', 814, 46, 100000.00, 'unpaid', '2023-05-02 06:27:57', '2023-05-02 06:27:57'),
(419, 414, 'INV-00085-V-2023', 808, 47, 100000.00, 'unpaid', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(420, 415, 'INV-00086-V-2023', 809, 47, 100000.00, 'unpaid', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(421, 416, 'INV-00087-V-2023', 810, 47, 100000.00, 'unpaid', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(422, 417, 'INV-00088-V-2023', 811, 47, 100000.00, 'unpaid', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(423, 418, 'INV-00089-V-2023', 1, 46, 100000000.00, 'paid', '2023-05-02 06:28:02', '2023-06-14 01:30:26'),
(424, 419, 'INV-00090-V-2023', 812, 46, 100000000.00, 'unpaid', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(425, 420, 'INV-00091-V-2023', 813, 46, 100000000.00, 'paid', '2023-05-02 06:28:02', '2023-05-02 07:24:03'),
(426, 421, 'INV-00092-V-2023', 814, 46, 100000000.00, 'unpaid', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(427, 422, 'INV-00093-V-2023', 808, 47, 100000000.00, 'unpaid', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(428, 423, 'INV-00094-V-2023', 809, 47, 100000000.00, 'unpaid', '2023-05-02 06:28:03', '2023-05-02 06:28:03'),
(429, 424, 'INV-00095-V-2023', 810, 47, 100000000.00, 'unpaid', '2023-05-02 06:28:03', '2023-05-02 06:28:03'),
(430, 425, 'INV-00096-V-2023', 811, 47, 100000000.00, 'unpaid', '2023-05-02 06:28:04', '2023-05-02 06:28:04'),
(431, 426, 'INV-00097-V-2023', 1, 46, 70000000.00, 'unpaid', '2023-05-02 06:28:16', '2023-05-02 06:28:16'),
(432, 427, 'INV-00098-V-2023', 812, 46, 70000000.00, 'unpaid', '2023-05-02 06:28:16', '2023-05-02 06:28:16'),
(433, 428, 'INV-00099-V-2023', 813, 46, 70000000.00, 'paid', '2023-05-02 06:28:16', '2023-05-02 07:24:12'),
(434, 429, 'INV-00100-V-2023', 814, 46, 70000000.00, 'unpaid', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(435, 430, 'INV-00101-V-2023', 808, 47, 70000000.00, 'unpaid', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(436, 431, 'INV-00102-V-2023', 809, 47, 70000000.00, 'unpaid', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(437, 432, 'INV-00103-V-2023', 810, 47, 70000000.00, 'unpaid', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(438, 433, 'INV-00104-V-2023', 811, 47, 70000000.00, 'unpaid', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(439, 434, 'INV-00105-V-2023', 1, 46, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(440, 435, 'INV-00106-V-2023', 812, 46, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(441, 436, 'INV-00107-V-2023', 813, 46, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(442, 437, 'INV-00108-V-2023', 814, 46, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(443, 438, 'INV-00109-V-2023', 808, 47, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(444, 439, 'INV-00110-V-2023', 809, 47, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(445, 440, 'INV-00111-V-2023', 810, 47, 200000.00, 'unpaid', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(446, 441, 'INV-00112-V-2023', 811, 47, 200000.00, 'unpaid', '2023-05-05 06:34:55', '2023-05-05 06:34:55'),
(447, 442, 'INV-00113-V-2023', 815, 47, 200000.00, 'paid', '2023-05-05 06:34:55', '2023-05-10 07:42:25'),
(448, 443, 'INV-00114-V-2023', 816, 47, 200000.00, 'paid', '2023-05-05 06:34:55', '2023-05-09 02:54:39'),
(449, 444, 'INV-00115-V-2023', 1, 46, 90000.00, 'unpaid', '2023-05-05 06:35:04', '2023-05-05 06:35:04'),
(450, 445, 'INV-00116-V-2023', 812, 46, 90000.00, 'unpaid', '2023-05-05 06:35:04', '2023-05-05 06:35:04'),
(451, 446, 'INV-00117-V-2023', 813, 46, 90000.00, 'unpaid', '2023-05-05 06:35:05', '2023-05-05 06:35:05'),
(452, 447, 'INV-00118-V-2023', 814, 46, 90000.00, 'unpaid', '2023-05-05 06:35:05', '2023-05-05 06:35:05'),
(453, 448, 'INV-00119-V-2023', 808, 47, 90000.00, 'unpaid', '2023-05-05 06:35:05', '2023-05-05 06:35:05'),
(454, 449, 'INV-00120-V-2023', 809, 47, 90000.00, 'unpaid', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(455, 450, 'INV-00121-V-2023', 810, 47, 90000.00, 'unpaid', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(456, 451, 'INV-00122-V-2023', 811, 47, 90000.00, 'unpaid', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(457, 452, 'INV-00123-V-2023', 815, 47, 90000.00, 'paid', '2023-05-05 06:35:06', '2023-05-11 09:29:38'),
(458, 453, 'INV-00124-V-2023', 816, 47, 90000.00, 'paid', '2023-05-05 06:35:06', '2023-05-09 02:54:48'),
(459, 454, 'INV-00125-V-2023', 1, 46, 200000.00, 'unpaid', '2023-05-10 08:09:43', '2023-05-10 08:09:43'),
(460, 455, 'INV-00126-V-2023', 812, 46, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(461, 456, 'INV-00127-V-2023', 813, 46, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(462, 457, 'INV-00128-V-2023', 814, 46, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(463, 458, 'INV-00129-V-2023', 808, 47, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(464, 459, 'INV-00130-V-2023', 809, 47, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(465, 460, 'INV-00131-V-2023', 810, 47, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(466, 461, 'INV-00132-V-2023', 811, 47, 200000.00, 'unpaid', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(467, 462, 'INV-00133-V-2023', 815, 47, 200000.00, 'unpaid', '2023-05-10 08:09:45', '2023-05-10 08:09:45'),
(468, 463, 'INV-00134-V-2023', 816, 47, 200000.00, 'paid', '2023-05-10 08:09:45', '2023-05-16 04:29:04'),
(469, 464, 'INV-00135-V-2023', 817, 47, 200000.00, 'unpaid', '2023-05-10 08:09:45', '2023-05-10 08:09:45'),
(470, 465, 'INV-00136-V-2023', 818, 47, 200000.00, 'unpaid', '2023-05-10 08:09:45', '2023-05-10 08:09:45'),
(471, 466, 'INV-00137-V-2023', 1, 46, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(472, 467, 'INV-00138-V-2023', 812, 46, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(473, 468, 'INV-00139-V-2023', 813, 46, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(474, 469, 'INV-00140-V-2023', 814, 46, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(475, 470, 'INV-00141-V-2023', 808, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(476, 471, 'INV-00142-V-2023', 809, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(477, 472, 'INV-00143-V-2023', 810, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(478, 473, 'INV-00144-V-2023', 811, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(479, 474, 'INV-00145-V-2023', 815, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(480, 475, 'INV-00146-V-2023', 816, 47, 100000.00, 'paid', '2023-05-16 04:35:52', '2023-05-16 04:37:57'),
(481, 476, 'INV-00147-V-2023', 817, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(482, 477, 'INV-00148-V-2023', 818, 47, 100000.00, 'unpaid', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(483, 478, 'INV-00149-V-2023', 1, 46, 70000.00, 'unpaid', '2023-05-16 04:35:59', '2023-05-16 04:35:59'),
(484, 479, 'INV-00150-V-2023', 812, 46, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(485, 480, 'INV-00151-V-2023', 813, 46, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(486, 481, 'INV-00152-V-2023', 814, 46, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(487, 482, 'INV-00153-V-2023', 808, 47, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(488, 483, 'INV-00154-V-2023', 809, 47, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(489, 484, 'INV-00155-V-2023', 810, 47, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(490, 485, 'INV-00156-V-2023', 811, 47, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(491, 486, 'INV-00157-V-2023', 815, 47, 70000.00, 'unpaid', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(492, 487, 'INV-00158-V-2023', 816, 47, 70000.00, 'paid', '2023-05-16 04:36:00', '2023-05-16 04:37:57'),
(493, 488, 'INV-00159-V-2023', 817, 47, 70000.00, 'unpaid', '2023-05-16 04:36:01', '2023-05-16 04:36:01'),
(494, 489, 'INV-00160-V-2023', 818, 47, 70000.00, 'unpaid', '2023-05-16 04:36:01', '2023-05-16 04:36:01'),
(495, 490, 'INV-00161-V-2023', 1, 46, 70000.00, 'unpaid', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(496, 491, 'INV-00162-V-2023', 812, 46, 70000.00, 'unpaid', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(497, 492, 'INV-00163-V-2023', 813, 46, 70000.00, 'unpaid', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(498, 493, 'INV-00164-V-2023', 814, 46, 70000.00, 'unpaid', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(499, 494, 'INV-00165-V-2023', 808, 47, 70000.00, 'unpaid', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(500, 495, 'INV-00166-V-2023', 809, 47, 70000.00, 'unpaid', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(501, 496, 'INV-00167-V-2023', 810, 47, 70000.00, 'unpaid', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(502, 497, 'INV-00168-V-2023', 811, 47, 70000.00, 'unpaid', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(503, 498, 'INV-00169-V-2023', 815, 47, 70000.00, 'unpaid', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(504, 499, 'INV-00170-V-2023', 816, 47, 70000.00, 'paid', '2023-05-16 04:36:55', '2023-05-16 04:37:57'),
(505, 500, 'INV-00171-V-2023', 817, 47, 70000.00, 'unpaid', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(506, 501, 'INV-00172-V-2023', 818, 47, 70000.00, 'unpaid', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(507, 502, 'INV-00173-V-2023', 1, 46, 100000000.00, 'unpaid', '2023-05-25 07:55:10', '2023-05-25 07:55:10'),
(508, 503, 'INV-00174-V-2023', 803, 46, 100000000.00, 'unpaid', '2023-05-25 07:55:10', '2023-05-25 07:55:10'),
(509, 504, 'INV-00175-V-2023', 812, 46, 100000000.00, 'unpaid', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(510, 505, 'INV-00176-V-2023', 813, 46, 100000000.00, 'unpaid', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(511, 506, 'INV-00177-V-2023', 814, 46, 100000000.00, 'unpaid', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(512, 507, 'INV-00178-V-2023', 819, 46, 100000000.00, 'unpaid', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(513, 508, 'INV-00179-V-2023', 820, 46, 100000000.00, 'paid', '2023-05-25 07:55:11', '2023-05-25 08:27:10'),
(514, 509, 'INV-00180-V-2023', 808, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(515, 510, 'INV-00181-V-2023', 809, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(516, 511, 'INV-00182-V-2023', 810, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(517, 512, 'INV-00183-V-2023', 811, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(518, 513, 'INV-00184-V-2023', 815, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(519, 514, 'INV-00185-V-2023', 816, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(520, 515, 'INV-00186-V-2023', 817, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(521, 516, 'INV-00187-V-2023', 818, 47, 100000000.00, 'unpaid', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(522, 517, 'INV-00001-VI-2023', 1, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(523, 518, 'INV-00002-VI-2023', 803, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(524, 519, 'INV-00003-VI-2023', 812, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(525, 520, 'INV-00004-VI-2023', 813, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(526, 521, 'INV-00005-VI-2023', 814, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(527, 522, 'INV-00006-VI-2023', 819, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(528, 523, 'INV-00007-VI-2023', 820, 46, 200000.00, 'unpaid', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(529, 524, 'INV-00008-VI-2023', 808, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(530, 525, 'INV-00009-VI-2023', 809, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(531, 526, 'INV-00010-VI-2023', 810, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(532, 527, 'INV-00011-VI-2023', 811, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(533, 528, 'INV-00012-VI-2023', 815, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(534, 529, 'INV-00013-VI-2023', 816, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(535, 530, 'INV-00014-VI-2023', 817, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(536, 531, 'INV-00015-VI-2023', 818, 47, 200000.00, 'unpaid', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(537, 532, 'INV-00016-VI-2023', 1, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(538, 533, 'INV-00017-VI-2023', 803, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(539, 534, 'INV-00018-VI-2023', 812, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(540, 535, 'INV-00019-VI-2023', 813, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(541, 536, 'INV-00020-VI-2023', 814, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(542, 537, 'INV-00021-VI-2023', 819, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(543, 538, 'INV-00022-VI-2023', 820, 46, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(544, 539, 'INV-00023-VI-2023', 808, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(545, 540, 'INV-00024-VI-2023', 809, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(546, 541, 'INV-00025-VI-2023', 810, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(547, 542, 'INV-00026-VI-2023', 811, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(548, 543, 'INV-00027-VI-2023', 815, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(549, 544, 'INV-00028-VI-2023', 816, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(550, 545, 'INV-00029-VI-2023', 817, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(551, 546, 'INV-00030-VI-2023', 818, 47, 200000.00, 'unpaid', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(552, 547, 'INV-00031-VI-2023', 1, 46, 200000.00, 'unpaid', '2023-06-12 16:30:05', '2023-06-12 16:30:05'),
(553, 548, 'INV-00032-VI-2023', 803, 46, 200000.00, 'unpaid', '2023-06-12 16:30:05', '2023-06-12 16:30:05'),
(554, 549, 'INV-00033-VI-2023', 812, 46, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(555, 550, 'INV-00034-VI-2023', 813, 46, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(556, 551, 'INV-00035-VI-2023', 814, 46, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(557, 552, 'INV-00036-VI-2023', 819, 46, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(558, 553, 'INV-00037-VI-2023', 820, 46, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(559, 554, 'INV-00038-VI-2023', 808, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(560, 555, 'INV-00039-VI-2023', 809, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(561, 556, 'INV-00040-VI-2023', 810, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(562, 557, 'INV-00041-VI-2023', 811, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(563, 558, 'INV-00042-VI-2023', 815, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(564, 559, 'INV-00043-VI-2023', 816, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(565, 560, 'INV-00044-VI-2023', 817, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(566, 561, 'INV-00045-VI-2023', 818, 47, 200000.00, 'unpaid', '2023-06-12 16:30:06', '2023-06-12 16:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang_pendidikan_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ruangan_id` int(11) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `mata_pelajaran_id` int(11) DEFAULT NULL,
  `tingkatan_id` varchar(11) DEFAULT NULL,
  `hari_id` varchar(10) DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `jenjang_pendidikan_id`, `kelas_id`, `ruangan_id`, `guru_id`, `mata_pelajaran_id`, `tingkatan_id`, `hari_id`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(1, 3, 46, 1, 16, 1, '10', '2', '14:00:00', '15:00:00', '2023-04-28 07:36:31', '2023-05-02 07:06:50'),
(2, 3, 46, 1, 47, 3, '10', '2', '11:00:00', '12:00:00', '2023-04-28 07:36:50', '2023-05-02 03:28:28'),
(3, 3, 46, 1, 51, 3, '10', '3', '13:00:00', '14:00:00', '2023-05-02 07:17:44', '2023-05-02 07:18:49'),
(4, 3, 47, 3, 51, 18, '10', '2', '14:00:00', '17:00:00', '2023-05-02 07:28:48', '2023-05-02 07:28:48'),
(5, 3, 47, 4, 53, 2, '10', '5', '11:00:00', '14:00:00', '2023-05-04 03:22:24', '2023-05-05 02:23:23'),
(6, 3, 47, 3, 53, 2, '10', '4', '16:00:00', '18:00:00', '2023-05-04 09:09:12', '2023-05-04 09:09:12'),
(7, 3, 46, 1, 16, 1, '10', '4', '16:00:00', '18:00:00', '2023-05-04 09:30:49', '2023-05-04 09:30:49'),
(8, 3, 47, 1, 16, 2, '10', '4', '01:00:00', '02:00:00', '2023-05-04 09:31:20', '2023-05-04 09:31:20'),
(9, 3, 47, 1, 16, 19, '10', '5', '07:00:00', '10:00:00', '2023-05-04 09:42:11', '2023-05-05 02:22:57'),
(10, 3, 47, 1, 53, 19, '10', '1', '10:00:00', '13:00:00', '2023-05-08 03:13:35', '2023-05-08 03:13:35'),
(11, 3, 47, 2, 51, 2, '10', '3', '08:00:00', '17:00:00', '2023-05-08 03:14:05', '2023-05-08 03:14:05'),
(12, 3, 46, 2, 16, 1, '10', '1', '14:00:00', '17:00:00', '2023-05-08 07:36:48', '2023-05-08 07:36:48'),
(13, 3, 51, 3, 16, 18, '10', '1', '14:00:00', '17:00:00', '2023-05-23 03:07:18', '2023-05-23 03:07:18'),
(14, 3, 46, 4, 16, 1, '10', '5', '14:00:00', '17:00:00', '2023-05-25 07:29:44', '2023-05-25 07:29:44'),
(15, 3, 46, 3, 16, 22, '10', '5', '09:00:00', '12:00:00', '2023-05-25 07:39:36', '2023-05-25 07:39:36'),
(16, 3, 46, 3, 47, 24, '10', '1', '14:00:00', '15:00:00', '2023-05-25 07:51:18', '2023-05-25 07:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang_pendidikans`
--

CREATE TABLE `jenjang_pendidikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenjang_pendidikans`
--

INSERT INTO `jenjang_pendidikans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'SD', NULL, NULL),
(2, 'SMP', NULL, NULL),
(3, 'SMA', NULL, NULL),
(4, 'TK', NULL, '2023-01-10 02:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_tagihans`
--

CREATE TABLE `kategori_tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `batas_bayar` date DEFAULT NULL,
  `kategori_cicilan` int(11) DEFAULT NULL,
  `minimum_bayar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_tagihans`
--

INSERT INTO `kategori_tagihans` (`id`, `nama_kategori`, `nominal`, `deskripsi`, `batas_bayar`, `kategori_cicilan`, `minimum_bayar`, `created_at`, `updated_at`) VALUES
(1, 'spp', '200000', 'deskripsi', '2023-03-09', 0, 200000, '2022-12-14 10:07:34', '2023-02-27 08:40:20'),
(2, 'Biaya Gedung', '300000', 'deskripsi', '2023-03-11', 0, 300000, '2022-12-14 10:07:55', '2023-02-27 08:40:10'),
(3, 'Biaya Classmeet', '70000', 'wajib bayar', '2023-03-11', 0, 70000, '2023-01-25 03:25:14', '2023-02-27 08:40:35'),
(4, 'Biaya Kegiatan', '100000', 'wajib bayar', '2023-03-11', 0, 100000, '2023-01-25 03:25:34', '2023-02-27 08:40:50'),
(5, 'Biaya Tagihan', '100000000', 'wajib bayar', '2023-03-11', 1, 50000, '2023-01-25 03:29:26', '2023-02-27 08:41:19'),
(6, 'Biaya Kerusakan', '70000000', 'wajib bayar', '2023-03-03', 1, 70000, '2023-01-25 03:29:52', '2023-05-02 04:48:23'),
(7, 'iuran sekolah', '90000', 'deskripsi', '2023-02-24', 0, 90000, '2023-02-24 03:29:08', '2023-02-27 08:41:52'),
(9, 'Study Tour', '200000', 'Tidak dapat dicicil', '2023-05-30', 0, 200000, '2023-05-02 04:49:54', '2023-05-02 04:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` varchar(30) DEFAULT NULL,
  `jam_berakhir` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `kontak` varchar(25) DEFAULT NULL,
  `jenis_kontak` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `tanggal`, `jam_mulai`, `jam_berakhir`, `status`, `deskripsi`, `catatan`, `nama`, `kontak`, `jenis_kontak`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan tari', '2023-05-04', '11:00', '17:00', 1, 'Ekstra kulikuler tari', 'catatan', 'nama', '08984775874885', 'whatshap', '2022-12-29 03:21:17', '2023-05-04 07:48:22'),
(3, 'Kegiatan pencak silat', '2023-04-13', '13:00', '14:00', 1, 'Ekstra pencak silat', 'catatan', 'kusnul', '08984775874885', 'Whatapp', '2023-01-02 06:22:49', '2023-05-04 07:43:09'),
(4, 'Kegiatan pramuka', '2023-04-21', '14:00', '15:00', 1, 'Ekstra Pramuka', 'catatan', 'kusnul', '08984775874885', 'Whatapp', '2023-01-02 06:23:32', '2023-05-04 07:44:12'),
(6, 'Membaca buku massal', '2023-04-27', '06:00', '07:00', 1, 'Mengapa tidak memanfaatkan waktu di sela-sela jam belajar untuk membaca buku-buku favorit kamu mulai dari komik, majalah, novel dan lain sebagainya. Membaca buku favorit akan memberikan suasana menyenangkan pada diri kamu sehingga rasa bosan dan jenuh bisa hilang. Jadi tidak ada salahnya kamu membawa serta buku favorit di dalam tas dengan catatan tidak boleh dibaca saat jam pelajaran berlangsung ya.', 'catatan', 'kusnul', '08984775874885', 'Whatapp', '2023-01-02 19:50:49', '2023-05-04 07:45:36'),
(7, 'Buka bersama', '2023-04-30', '11:00', '12:00', 1, 'Berbuka bersama (bukber) merupakan momentum unik di kalangan komunitas tertentu. Misalnya berbuka bersama antar keluarga besar, alumni, rekan sejawat dan antar anggota organisasi tertentu.\r\n\r\nmanfaat,berbuka bersama\r\nBerbuka bersama (bukber) komunitas siswa (doc.matrapendidikan.com)\r\n\r\nNamanya bukber, tentu saja diadakan khusus pada bulan puasa Ramadhan. Biasanya acara bukber ini diadakan di ujung-ujung bulan puasa Ramadhan. Atau sepuluh hari ketiga bulan suci Ramadhan.\r\n\r\nDi lembaga pendidikan sekolah, wujud kegiatan bukber meliputi bukber sekolah, alumni sekolah, organisasi sekolah dan bukber komunitas tertentu.\r\n\r\nBukber sekolah diadakan oleh sekolah dengan anggota seluruh warga sekolah. Bukber alumni sekolah dilaksanakan oleh para alumni dari sekolah tersebut.;mk', 'catatan', 'kusnul', '08984775874885', 'Whatapp', '2023-01-02 19:51:52', '2023-05-04 07:46:41'),
(12, 'Lomba Musabaqah Hifdzul Qur\'an (MHQ)', '2023-05-02', '13:15', '16:05', 1, 'Lomba', 'Setiap Kelas Berhak Mengikuti Lomba Ini', 'Guru', '0821150414045', 'Whatapp', '2023-05-02 04:32:29', '2023-05-02 04:32:29'),
(13, 'Lomba Adzan', '2023-05-04', '08:00', '15:00', 1, 'yang merupakan panggilan untuk menunaikan shalat bagi umat islam ialah suatu yang sangat perlu untuk dikenalkan kepada anak sejak dini dan dengan adanya lomba ini kami berharap agar ajang ini menjadi wadah untuk melatih mereka yang nantinya akan sangat bermanfaat dikemudian hari.', 'Tempat: Masjid', 'Guru Agama', '0821525252', 'Whatapp', '2023-05-02 04:41:12', '2023-05-02 04:41:12'),
(14, 'Festival Makan Nikmat', '2023-05-05', '07:00', '17:00', 1, 'Festival yang diselenggarakan tiap tahunnya', 'Acara digelar di Llapangan Sekolah', 'Maulana', '098263738', 'Whatsapp', '2023-05-02 04:45:32', '2023-05-02 04:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkatan_id` int(11) DEFAULT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `id_master_kelas` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `jurusan` varchar(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkatan_id`, `id_tahun_ajaran`, `id_master_kelas`, `id_guru`, `jurusan`, `max`, `created_at`, `updated_at`) VALUES
(46, 10, 3, 1, 16, 'ipa', 10, '2023-04-03 01:24:43', '2023-04-03 01:24:43'),
(47, 10, 3, 2, 47, 'ips', 20, '2023-04-04 04:11:19', '2023-04-04 04:11:19'),
(51, 10, 3, 2, 53, 'ips', 10, '2023-05-04 09:55:16', '2023-05-04 09:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulums`
--

CREATE TABLE `kurikulums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkatan_id` int(11) DEFAULT NULL,
  `mata_pelajaran_id` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurikulums`
--

INSERT INTO `kurikulums` (`id`, `tingkatan_id`, `mata_pelajaran_id`, `tanggal`, `lampiran`, `name`, `deskripsi`, `created_at`, `updated_at`) VALUES
(5, NULL, 18, '2023-01-04', 'file-lampirankurikulum-18gO2az.pdf', 'Kurikulum Bahasa Indonesia 2020', 'ue', '2023-01-03 02:37:47', '2023-05-12 07:20:58'),
(13, 10, 20, '2023-05-11', 'file-lampirankurikulum-20Xg2NZ.pdf', 'Ekonomi Syariah', 'mendalami', '2023-05-11 03:00:33', '2023-05-12 07:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_kegiatans`
--

CREATE TABLE `lampiran_kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `lampiran_kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lampiran_kegiatans`
--

INSERT INTO `lampiran_kegiatans` (`id`, `kegiatan_id`, `nama`, `lampiran_kegiatan`, `created_at`, `updated_at`) VALUES
(3, 8, 'nama lampiran', 'foto-lampiran-mkvbc.jpeg', NULL, NULL),
(4, 8, 'nama lampiran 2', 'foto-lampiran-mkvbc.jpeg', NULL, NULL),
(5, 9, 'name', 'foto-lampiran-mkvbc.jpeg', '2023-04-27 06:27:33', '2023-04-27 06:27:33'),
(7, 11, 'teting 2', 'foto-lampiran-aCMzt.jpg', '2023-04-27 08:16:24', '2023-04-27 08:16:24'),
(9, 12, NULL, 'foto-lampiran-NzBwx.jpg', '2023-05-02 04:32:29', '2023-05-02 04:32:29'),
(10, 3, NULL, 'foto-lampiran-hePvE.jpeg', '2023-05-04 07:43:09', '2023-05-04 07:43:09'),
(12, 12, NULL, 'foto-lampiran-jAGfs.jpeg', '2023-05-05 03:33:58', '2023-05-05 03:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `mapel_gurus`
--

CREATE TABLE `mapel_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel_gurus`
--

INSERT INTO `mapel_gurus` (`id`, `guru_id`, `mata_pelajaran_id`, `created_at`, `updated_at`) VALUES
(5, 16, 1, NULL, NULL),
(7, 16, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_kelas`
--

CREATE TABLE `master_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkatan_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `jenjang_pendidikan_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_kelas`
--

INSERT INTO `master_kelas` (`id`, `tingkatan_id`, `name`, `jenjang_pendidikan_id`, `created_at`, `updated_at`) VALUES
(1, 10, 'X MIPA 1', 3, '2022-12-14 09:56:19', '2022-12-14 09:56:19'),
(2, 10, 'X MIPA 2', 3, '2022-12-14 09:56:27', '2022-12-14 09:56:27'),
(4, 10, 'X MIPA 3', 3, '2023-01-09 06:25:14', '2023-01-09 06:25:35'),
(5, 10, 'X MIPA 4', 3, '2023-01-09 06:25:26', '2023-01-09 06:25:26'),
(7, 11, 'XI MIPA 2', 3, '2023-01-09 06:26:08', '2023-01-09 06:26:55'),
(8, 12, 'XII MIPA 1', 3, '2023-01-09 06:26:33', '2023-01-09 06:27:05'),
(9, 12, 'XII MIPA 2', 3, '2023-01-09 06:27:13', '2023-01-09 06:27:13'),
(10, 7, 'VII', 2, '2023-01-09 08:55:26', '2023-01-09 08:55:26'),
(11, 8, 'VIII', 2, '2023-01-09 08:57:22', '2023-01-09 08:57:22'),
(12, 6, 'VI', 1, '2023-01-09 09:29:06', '2023-01-09 09:29:06'),
(13, 5, 'V', 1, '2023-01-09 09:29:13', '2023-01-09 09:29:13'),
(14, 4, 'IV', 1, NULL, NULL),
(15, 14, 'TK A', 4, '2023-01-10 03:23:57', '2023-01-10 03:23:57'),
(16, 14, 'TK B', 4, '2023-01-10 03:24:06', '2023-01-10 03:24:06'),
(22, 10, 'BAHASA 1', 3, '2023-03-03 07:00:25', '2023-03-03 07:00:25'),
(23, NULL, 'TK A', 4, '2023-04-12 02:12:34', '2023-04-12 02:12:34'),
(24, 10, 'X IPS 1', 3, '2023-04-28 06:39:46', '2023-04-28 06:39:46'),
(25, 10, 'X IPS 2', 3, '2023-04-28 06:40:27', '2023-04-28 06:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `jenjang_pendidikan_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `tingkatan` int(11) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajarans`
--

INSERT INTO `mata_pelajarans` (`id`, `tahun_ajaran_id`, `jenjang_pendidikan_id`, `name`, `tingkatan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 'Biologi', 10, 'ipa', '2022-12-14 09:57:21', '2022-12-14 09:57:21'),
(2, 3, 3, 'Matematika', 10, 'ips', '2022-12-14 09:57:27', '2022-12-14 09:57:27'),
(3, 3, 3, 'Fisika', 10, 'ipa', '2022-12-14 09:57:33', '2022-12-14 09:57:33'),
(18, 3, 3, 'arkeolog', 10, 'ips', '2023-04-04 07:05:39', '2023-04-04 07:05:39'),
(19, 3, 3, 'Bahasa Inggris', 10, 'ips', '2023-05-02 07:34:11', '2023-05-02 07:34:11'),
(20, 3, 3, 'Ekonomi', 10, 'ips', '2023-05-04 09:52:49', '2023-05-04 09:52:49'),
(22, 3, 3, 'Bahasa Indonesia', 10, 'ipa', '2023-05-25 07:37:19', '2023-05-25 07:37:19'),
(23, 3, 2, 'Penjaskes', 7, 'ipa', '2023-05-25 07:49:54', '2023-05-25 07:49:54'),
(24, 3, 3, 'Penjaskes', 10, 'ipa', '2023-05-25 07:50:11', '2023-05-25 07:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49, '2014_10_12_000000_create_users_table', 1),
(50, '2014_10_12_100000_create_password_resets_table', 1),
(51, '2019_08_19_000000_create_failed_jobs_table', 1),
(52, '2022_12_06_132006_create_pembayaran_table', 1),
(53, '2022_12_12_071229_create_absens_table', 1),
(54, '2022_12_13_023537_create_jadwal_table', 1),
(55, '2022_12_13_023825_create_guru_table', 1),
(56, '2022_12_13_023841_create_mata_pelajaran_table', 1),
(57, '2022_12_13_024253_create_kelas_table', 1),
(58, '2022_12_13_024305_create_ruangan_table', 1),
(59, '2022_12_13_032809_create_haris_table', 1),
(60, '2022_12_13_040519_create_rincian__siswas_table', 1),
(61, '2022_12_14_024959_create_guru_kelas_table', 1),
(62, '2022_12_14_161202_create_admins_table', 1),
(63, '2022_12_14_161420_create_kategori_tagihans_table', 1),
(64, '2022_12_14_162025_create_tagihan_siswas_table', 1),
(65, '2022_12_14_162037_create_invoice_tagihans_table', 1),
(66, '2022_12_14_162406_create_rincian_pembayarans_table', 1),
(67, '2022_12_14_164235_create_siswas_table', 1),
(70, '2022_12_19_060153_create_wali_siswas_table', 2),
(71, '2022_12_19_060540_create_wali_dan_siswa_table', 2),
(72, '2022_12_19_071044_create_mapel_guru_table', 3),
(73, '2022_12_19_073301_create_kurikulums_table', 4),
(80, '2022_12_20_021023_create_pendaftarans_table', 5),
(81, '2022_12_23_064200_create_penggunas_table', 6),
(82, '2022_12_26_025255_create_jobs_table', 7),
(84, '2019_12_14_000001_create_personal_access_tokens_table', 8),
(85, '2022_12_27_050642_create_tugas_table', 9),
(86, '2022_12_27_063005_create_kumpul_tugas_table', 10),
(87, '2022_12_28_022807_create_notifikasi_table', 11),
(91, '2022_12_28_080200_create_buku_kategori_table', 12),
(92, '2022_12_28_080209_create_buku_table', 12),
(93, '2022_12_28_080329_create_perpustakaan_pinjam_table', 12),
(94, '2022_12_28_080338_create_perpustakaan_pinjam_rincian_table', 12),
(96, '2022_12_29_022112_create_perpustakaan_member_table', 13),
(98, '2023_01_04_104451_create_settings_table', 14),
(99, '2023_01_09_104949_create_jenjang_pendidikans_table', 15),
(100, '2023_01_12_142747_create_semesters_table', 16),
(101, '2023_01_19_142912_create_pengaturans_table', 17),
(102, '2023_01_19_142919_create_soals_table', 17),
(103, '2023_01_19_142926_create_nilais_table', 17),
(104, '2023_03_08_111226_create_email_accommodations_table', 18),
(105, '2023_03_08_161337_create_email_accommodation_confirmations_table', 18),
(106, '2023_03_08_162103_create_email_accommodation_confirmation_g_l_s_table', 18),
(107, '2023_03_08_162123_create_email_blast_p_o_p_symposia_table', 18),
(108, '2023_03_08_162141_create_email_certificates_table', 18),
(109, '2023_03_08_162200_create_email_confirmation_g_l_s_table', 18),
(110, '2023_03_08_162218_create_email_confirmation_symposia_table', 18),
(111, '2023_03_08_162238_create_email_confirmation_workshops_table', 18),
(112, '2023_03_08_162300_create_email_pengumuman_undangans_table', 18),
(113, '2023_03_08_162318_create_email_successes_table', 18),
(114, '2023_03_08_181129_create_email_success_abstracts_table', 18),
(115, '2023_03_08_181145_create_email_success_abstract_edits_table', 18),
(116, '2023_03_08_181208_create_email_success_workshops_table', 18),
(117, '2023_05_09_132513_create_bahan_ajar_mata_pelajarans_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) NOT NULL,
  `benar` varchar(20) DEFAULT NULL,
  `salah` varchar(20) DEFAULT NULL,
  `score` varchar(20) DEFAULT '0',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `ujian_id`, `siswa_id`, `benar`, `salah`, `score`, `keterangan`, `created_at`, `updated_at`) VALUES
(10, 3, 1, '1', '0', '1', NULL, '2023-04-28 08:42:08', '2023-04-28 08:43:03'),
(16, 4, 1, '1', '1', '1', NULL, '2023-04-28 08:57:06', '2023-04-28 09:06:25'),
(17, 5, 1, '1', '0', '1', NULL, '2023-04-28 10:21:16', '2023-04-28 10:23:33'),
(18, 5, 812, '1', '0', '1', NULL, '2023-04-28 10:21:16', '2023-04-28 10:21:57'),
(19, 5, 813, NULL, NULL, '0', NULL, '2023-04-28 10:21:16', '2023-04-28 10:21:16'),
(20, 5, 814, '1', '0', '1', NULL, '2023-04-28 10:21:16', '2023-04-28 10:23:10'),
(21, 6, 1, '0', '1', '0', NULL, '2023-05-01 12:34:12', '2023-05-02 02:50:36'),
(22, 6, 812, NULL, NULL, '0', NULL, '2023-05-01 12:34:12', '2023-05-01 12:34:12'),
(23, 6, 813, NULL, NULL, '0', NULL, '2023-05-01 12:34:12', '2023-05-01 12:34:12'),
(24, 6, 814, NULL, NULL, '0', NULL, '2023-05-01 12:34:12', '2023-05-01 12:34:12'),
(25, 7, 802, NULL, NULL, '0', NULL, '2023-05-04 03:36:57', '2023-05-04 03:36:57'),
(26, 7, 806, NULL, NULL, '0', NULL, '2023-05-04 03:36:57', '2023-05-04 03:36:57'),
(27, 7, 808, NULL, NULL, '0', NULL, '2023-05-04 03:36:57', '2023-05-04 03:36:57'),
(28, 7, 809, NULL, NULL, '0', NULL, '2023-05-04 03:36:57', '2023-05-04 03:36:57'),
(29, 7, 810, NULL, NULL, '0', NULL, '2023-05-04 03:36:57', '2023-05-04 03:36:57'),
(30, 7, 811, NULL, NULL, '0', NULL, '2023-05-04 03:36:57', '2023-05-04 03:36:57'),
(31, 7, 815, '1', '0', '1', NULL, '2023-05-04 03:36:57', '2023-05-04 03:41:37'),
(32, 8, 802, NULL, NULL, '0', NULL, '2023-05-08 04:51:48', '2023-05-08 04:51:48'),
(33, 8, 806, NULL, NULL, '0', NULL, '2023-05-08 04:51:48', '2023-05-08 04:51:48'),
(34, 8, 808, NULL, NULL, '0', NULL, '2023-05-08 04:51:48', '2023-05-08 04:51:48'),
(35, 8, 809, NULL, NULL, '0', NULL, '2023-05-08 04:51:48', '2023-05-08 04:51:48'),
(36, 8, 810, NULL, NULL, '0', NULL, '2023-05-08 04:51:48', '2023-05-08 04:51:48'),
(37, 8, 811, NULL, NULL, '0', NULL, '2023-05-08 04:51:48', '2023-05-08 04:51:48'),
(38, 8, 815, '1', '0', '1', NULL, '2023-05-08 04:51:48', '2023-05-09 02:23:37'),
(39, 8, 816, '1', '0', '1', NULL, '2023-05-08 04:51:48', '2023-05-08 06:12:10'),
(40, 9, 802, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(41, 9, 806, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(42, 9, 808, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(43, 9, 809, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(44, 9, 810, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(45, 9, 811, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(46, 9, 815, '1', '0', '1', NULL, '2023-05-10 08:02:34', '2023-05-10 08:28:52'),
(47, 9, 816, '1', '0', '1', NULL, '2023-05-10 08:02:34', '2023-05-10 08:40:01'),
(48, 9, 817, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(49, 9, 818, NULL, NULL, '0', NULL, '2023-05-10 08:02:34', '2023-05-10 08:02:34'),
(50, 10, 802, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(51, 10, 806, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(52, 10, 808, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(53, 10, 809, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(54, 10, 810, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(55, 10, 811, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(56, 10, 815, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(57, 10, 816, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(58, 10, 817, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(59, 10, 818, NULL, NULL, '0', NULL, '2023-05-10 09:48:12', '2023-05-10 09:48:12'),
(60, 11, 802, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(61, 11, 806, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(62, 11, 808, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(63, 11, 809, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(64, 11, 810, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(65, 11, 811, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(66, 11, 815, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(67, 11, 816, '1', '0', '1', NULL, '2023-05-12 08:35:30', '2023-05-12 08:41:17'),
(68, 11, 817, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(69, 11, 818, NULL, NULL, '0', NULL, '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(70, 12, 802, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(71, 12, 806, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(72, 12, 808, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(73, 12, 809, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(74, 12, 810, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(75, 12, 811, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(76, 12, 815, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(77, 12, 816, '1', '0', '1', NULL, '2023-05-12 08:36:36', '2023-05-12 08:41:28'),
(78, 12, 817, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(79, 12, 818, NULL, NULL, '0', NULL, '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(80, 13, 1, NULL, NULL, '0', NULL, '2023-05-23 03:03:16', '2023-05-23 03:03:16'),
(81, 13, 812, NULL, NULL, '0', NULL, '2023-05-23 03:03:16', '2023-05-23 03:03:16'),
(82, 13, 813, NULL, NULL, '0', NULL, '2023-05-23 03:03:16', '2023-05-23 03:03:16'),
(83, 13, 814, NULL, NULL, '0', NULL, '2023-05-23 03:03:16', '2023-05-23 03:03:16'),
(84, 14, 1, NULL, NULL, '0', NULL, '2023-05-25 07:42:09', '2023-05-25 07:42:09'),
(85, 14, 812, NULL, NULL, '0', NULL, '2023-05-25 07:42:09', '2023-05-25 07:42:09'),
(86, 14, 813, NULL, NULL, '0', NULL, '2023-05-25 07:42:09', '2023-05-25 07:42:09'),
(87, 14, 814, NULL, NULL, '0', NULL, '2023-05-25 07:42:09', '2023-05-25 07:42:09'),
(88, 14, 820, '1', '1', '1', NULL, '2023-05-25 07:42:09', '2023-05-25 07:43:56'),
(89, 15, 1, NULL, NULL, '0', NULL, '2023-06-13 06:56:51', '2023-06-13 06:56:51'),
(90, 15, 812, NULL, NULL, '0', NULL, '2023-06-13 06:56:51', '2023-06-13 06:56:51'),
(91, 15, 813, NULL, NULL, '0', NULL, '2023-06-13 06:56:51', '2023-06-13 06:56:51'),
(92, 15, 814, NULL, NULL, '0', NULL, '2023-06-13 06:56:51', '2023-06-13 06:56:51'),
(93, 15, 820, NULL, NULL, '0', NULL, '2023-06-13 06:56:51', '2023-06-13 06:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `subnama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_notifikasi` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `read` int(11) DEFAULT 0,
  `id_target` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `nama`, `subnama`, `deskripsi`, `tgl_notifikasi`, `target`, `read`, `id_target`, `created_at`, `updated_at`) VALUES
(1, 2, 'Matematika', 'Membuat perhitungan kalkulus matematika', 'Matematika', '2023-04-19', 'detail-tugas', 0, 1, '2023-04-13 07:09:41', '2023-04-19 05:32:37'),
(2, 2, 'arkeolog', 'tugas arkeolog terkini dan terupdate', 'arkeolog', '2023-04-19', 'detail-tugas', 0, 2, '2023-04-13 07:09:41', '2023-04-19 05:32:37'),
(3, 2, 'arkeolog', 'Tugas 13/04/20223', 'TUGAS AKHIR ZAMAN', '2023-04-19', 'detail-tugas', 0, 3, '2023-04-13 07:09:41', '2023-04-19 05:32:37'),
(4, 2, 'arkeolog', 'Tugas Bikin', 'Akhir zaman', '2023-04-20', 'detail-tugas', 0, 4, '2023-04-13 07:09:41', '2023-04-20 16:57:55'),
(8, 2, 'kegiatan hari ini', 'kegiatan hari ini', 'deskripsi kegiatan', '2023-04-13', 'detail-kegiatan', 0, 8, '2023-04-13 07:09:41', '2023-04-13 07:09:41'),
(12, 2, 'Lomba Musabaqah Hifdzul Qur\'an (MHQ)', 'Lomba Musabaqah Hifdzul Qur\'an (MHQ)', 'Lomba', '2023-05-02', 'detail-kegiatan', 0, 12, '2023-05-02 04:33:04', '2023-05-02 08:17:48'),
(13, 2, 'Lomba Adzan', 'Lomba Adzan', 'yang merupakan panggilan untuk menunaikan shalat bagi umat islam ialah suatu yang sangat perlu untuk dikenalkan kepada anak sejak dini dan dengan adanya lomba ini kami berharap agar ajang ini menjadi wadah untuk melatih mereka yang nantinya akan sangat bermanfaat dikemudian hari.', '2023-05-04', 'detail-kegiatan', 0, 13, '2023-05-04 07:41:45', '2023-05-04 07:42:58'),
(25, 2, 'Matematika', 'gkub', 'kji', '2023-04-20', 'detail-tugas', 0, 25, '2023-04-13 07:09:41', '2023-04-20 16:57:55'),
(26, 2, 'Matematika', '12121212', 'MAUL IPS', '2023-04-13', 'detail-tugas', 0, 26, '2023-04-13 07:09:41', '2023-04-13 07:09:41'),
(39, 2, 'Matematika', 'dimas logout', '>>>>', '2023-04-20', 'detail-tugas', 0, 39, '2023-04-13 07:09:41', '2023-04-20 16:57:55'),
(50, 2, 'Kembalikan bukuKisah Sangkuriang Sang Anak Durhaka dan 2 buku lainnya', 'Pengembalian Buku', 'ini Adalah Notifikasi Tanggal Pengembalian Buku siswa', '2023-04-18', 'detail-pinjam-buku', 0, 50, '2023-04-18 03:57:04', '2023-04-18 03:57:04'),
(51, 2, 'Matematika', 'testing tugas', 'deskripsi testing tugas', '2023-04-14', 'detail-tugas', 0, 51, '2023-04-14 07:51:42', '2023-04-14 07:51:42'),
(63, 2, 'Matematika', 'awerty', 'qwerty', '2023-04-19', 'detail-tugas', 0, 63, '2023-04-14 07:51:42', '2023-04-19 05:32:46'),
(83, 2, 'Matematika', 'tugas matematika', 'wajib mengumpulkan', '2023-04-20', 'detail-tugas', 0, 83, '2023-04-17 02:42:33', '2023-04-20 16:57:55'),
(95, 2, 'Matematika', 'Matematika', 'kumpulkan!', '2023-04-17', 'detail-tugas', 0, 95, '2023-04-17 03:32:48', '2023-04-17 03:32:48'),
(107, 2, 'Matematika', 'wkwkw', 'kenal ga lip', '2023-04-18', 'detail-tugas', 0, 107, '2023-04-18 03:57:04', '2023-04-18 03:57:04'),
(161, 2, 'Biologi', 'ds', 'sd', '2023-04-27', 'detail-tugas', 0, 161, '2023-04-27 09:16:24', '2023-04-27 09:16:24'),
(162, 2, 'Biologi', 'testing 2', 'testing 2', '2023-04-27', 'detail-tugas', 0, 162, '2023-04-27 09:16:24', '2023-04-27 09:16:24'),
(163, 2, 'Biologi', 'Biologi', 'Essay', '2023-05-01', 'detail-tugas', 0, 163, '2023-04-28 10:31:05', '2023-05-01 15:59:02'),
(167, 2, 'Biologi', 'Biologi', 'Kerjakan Secara Jujur', '2023-05-02', 'detail-tugas', 0, 167, '2023-05-02 03:40:31', '2023-05-02 03:40:31'),
(171, 2, 'Biologi', 'Biologi', 'Pilihan Ganda', '2023-05-04 16:58:29', 'detail-tugas', 0, 171, '2023-05-02 07:15:42', '2023-05-04 09:58:29'),
(175, 2, 'Biologi', 'Biologi', 'Pilihan Ganda', '2023-05-02', 'detail-tugas', 0, 175, '2023-05-02 07:15:42', '2023-05-02 07:15:42'),
(201, 939, 'Matematika', 'Matematika', 'Kerjakan', '2023-05-04', 'detail-tugas', 0, 201, '2023-05-04 03:39:14', '2023-05-04 03:39:14'),
(203, 951, 'Matematika', 'Matematika', 'Kerjakan', '2023-05-04 15:08:18', 'detail-tugas', 0, 203, '2023-05-04 07:59:08', '2023-05-04 08:08:18'),
(206, 939, 'Matematika', 'Coba', 'coba', '2023-05-04 15:05:34', 'detail-tugas', 0, 206, '2023-05-04 08:05:34', '2023-05-04 08:05:34'),
(208, 951, 'Matematika', 'Coba', 'coba', '2023-05-04 15:08:18', 'detail-tugas', 0, 208, '2023-05-04 08:05:07', '2023-05-04 08:08:18'),
(211, 939, 'arkeolog', 'arkeo', 'bbb', '2023-05-04 16:57:06', 'detail-tugas', 0, 211, '2023-05-04 09:57:06', '2023-05-04 09:57:06'),
(213, 951, 'arkeolog', 'arkeo', 'bbb', '2023-05-05 09:26:14', 'detail-tugas', 0, 213, '2023-05-05 02:26:14', '2023-05-05 02:26:14'),
(214, 953, 'arkeolog', 'arkeo', 'bbb', '2023-05-10 08:59:30', 'detail-tugas', 0, 214, '2023-05-04 09:57:30', '2023-05-10 01:59:30'),
(217, 939, 'Matematika', 'asdfgh', 'asdfghj', '2023-05-10 13:16:57', 'detail-tugas', 0, 217, '2023-05-10 06:16:57', '2023-05-10 06:16:57'),
(219, 951, 'Matematika', 'asdfgh', 'asdfghj', '2023-05-05 09:26:14', 'detail-tugas', 0, 219, '2023-05-05 02:26:14', '2023-05-05 02:26:14'),
(220, 953, 'Matematika', 'asdfgh', 'asdfghj', '2023-05-05 09:20:56', 'detail-tugas', 0, 220, '2023-05-05 02:20:56', '2023-05-05 02:20:56'),
(223, 939, 'Matematika', 'testjumat', 'testjumat', '2023-05-10 13:16:57', 'detail-tugas', 0, 223, '2023-05-10 06:16:57', '2023-05-10 06:16:57'),
(225, 951, 'Matematika', 'testjumat', 'testjumat', '2023-05-05 10:05:10', 'detail-tugas', 0, 225, '2023-05-05 03:05:10', '2023-05-05 03:05:10'),
(226, 953, 'Matematika', 'testjumat', 'testjumat', '2023-05-05 10:18:10', 'detail-tugas', 0, 226, '2023-05-05 03:18:10', '2023-05-05 03:18:10'),
(231, 951, 'Matematika', '10MEI', '10MEI', '2023-05-11 10:34:41', 'detail-tugas', 0, 231, '2023-05-11 03:34:41', '2023-05-11 03:34:41'),
(232, 953, 'Matematika', '10MEI', '10MEI', '2023-05-10 14:59:10', 'detail-tugas', 0, 232, '2023-05-10 07:59:10', '2023-05-10 07:59:10'),
(237, 939, 'Matematika', 'Aljabar', 'Kerjakan ya:)', '2023-05-12 10:50:48', 'detail-tugas', 0, 237, '2023-05-12 03:50:48', '2023-05-12 03:50:48'),
(239, 951, 'Matematika', 'Aljabar', 'Kerjakan ya:)', '2023-05-15 09:49:33', 'detail-tugas', 0, 239, '2023-05-15 02:49:34', '2023-05-15 02:49:34'),
(240, 953, 'Matematika', 'Aljabar', 'Kerjakan ya:)', '2023-05-23 20:30:01', 'detail-tugas', 0, 240, '2023-05-12 03:06:44', '2023-05-23 13:30:02'),
(245, 939, 'Bahasa Inggris', 'Present Tense', 'take it or leave it:)', '2023-05-12 10:50:48', 'detail-tugas', 0, 245, '2023-05-12 03:50:48', '2023-05-12 03:50:48'),
(247, 951, 'Bahasa Inggris', 'Present Tense', 'take it or leave it:) yy', '2023-05-15 09:49:33', 'detail-tugas', 0, 247, '2023-05-15 02:49:34', '2023-05-15 02:49:34'),
(248, 953, 'Bahasa Inggris', 'Present Tense', 'take it or leave it:) yy', '2023-05-16 11:31:00', 'detail-tugas', 0, 248, '2023-05-12 03:06:44', '2023-05-16 04:31:00'),
(250, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-04-28', 'list-tagihan', 0, 0, '2023-04-13 07:09:41', '2023-04-28 08:19:13'),
(251, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-04-17', 'list-tagihan', 0, 0, '2023-04-17 07:53:23', '2023-04-17 07:53:23'),
(255, 951, 'Matematika', 'expired', 'kerjakan', '2023-05-15 09:49:33', 'detail-tugas', 0, 255, '2023-05-15 02:49:34', '2023-05-15 02:49:34'),
(256, 953, 'Matematika', 'expired', 'kerjakan', '2023-05-16 11:31:00', 'detail-tugas', 0, 256, '2023-05-12 08:25:28', '2023-05-16 04:31:00'),
(259, 2, 'Biologi', 'tugas 1', 'kerjakan', '2023-06-12 23:05:13', 'detail-tugas', 0, 259, '2023-06-12 16:05:13', '2023-06-12 16:05:13'),
(265, 963, 'Biologi', 'tugas 1', 'kerjakan', '2023-05-25 11:24:04', 'detail-tugas', 0, 265, '2023-05-25 04:24:05', '2023-05-25 04:24:05'),
(266, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-04-17', 'list-tagihan', 0, 0, '2023-04-17 07:53:23', '2023-04-17 07:53:23'),
(272, 963, 'Biologi', 'tugas 2', 'kerjakan', '2023-05-25 11:24:04', 'detail-tugas', 0, 272, '2023-05-25 04:24:05', '2023-05-25 04:24:05'),
(281, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-04-17', 'list-tagihan', 0, 0, '2023-04-17 07:53:23', '2023-04-17 07:53:23'),
(311, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-04-29 13:10:32', '2023-05-02 03:35:25'),
(319, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-01', 'list-tagihan', 0, 0, '2023-04-29 13:23:14', '2023-05-01 00:07:22'),
(327, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-04-30', 'list-tagihan', 0, 0, '2023-04-29 17:28:06', '2023-04-29 17:28:06'),
(335, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(341, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:53:35'),
(343, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(349, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:53:35'),
(351, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(357, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:53:35'),
(359, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(365, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:53:35'),
(367, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(373, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:53:35'),
(375, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(381, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:54:42'),
(383, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 03:51:49', '2023-05-02 03:51:49'),
(389, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 04:53:35', '2023-05-02 04:53:35'),
(391, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 06:28:11', '2023-05-02 07:36:50'),
(397, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 07:57:40', '2023-05-02 07:57:40'),
(399, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-04 16:51:33', 'list-tagihan', 1, 0, '2023-05-02 06:28:11', '2023-05-04 16:34:54'),
(405, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 07:57:40', '2023-05-02 07:57:40'),
(407, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-11 17:16:04', 'list-tagihan', 1, 0, '2023-05-02 06:28:11', '2023-06-13 05:33:06'),
(413, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 07:57:40', '2023-05-02 07:57:40'),
(415, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 06:28:11', '2023-05-02 06:28:11'),
(421, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 07:57:40', '2023-05-02 07:57:40'),
(423, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-04 23:34:52', 'list-tagihan', 0, 0, '2023-05-02 06:28:11', '2023-05-04 16:34:52'),
(429, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 07:57:40', '2023-05-02 07:57:40'),
(431, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 06:32:42', '2023-05-02 06:32:42'),
(437, 939, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-02', 'list-tagihan', 0, 0, '2023-05-02 07:57:40', '2023-05-02 07:57:40'),
(439, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-05 15:12:14', 'list-tagihan', 0, 0, '2023-05-05 08:12:14', '2023-05-05 08:12:14'),
(445, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-10 13:16:57', 'list-tagihan', 0, 0, '2023-05-10 06:16:57', '2023-05-10 06:16:57'),
(447, 951, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-06 21:06:05', 'list-tagihan', 0, 0, '2023-05-05 06:35:16', '2023-05-06 14:06:05'),
(448, 953, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-05 13:36:16', 'list-tagihan', 0, 0, '2023-05-05 06:36:17', '2023-05-05 06:36:17'),
(449, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-05 15:12:14', 'list-tagihan', 0, 0, '2023-05-05 08:12:14', '2023-05-05 08:12:14'),
(455, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-10 13:16:57', 'list-tagihan', 0, 0, '2023-05-10 06:16:57', '2023-05-10 06:16:57'),
(457, 951, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-05 13:35:16', 'list-tagihan', 0, 0, '2023-05-05 06:35:16', '2023-05-05 06:35:16'),
(458, 953, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-05 13:36:16', 'list-tagihan', 0, 0, '2023-05-05 06:36:17', '2023-05-05 06:36:17'),
(459, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-11 10:19:32', 'list-tagihan', 0, 0, '2023-05-11 03:19:32', '2023-05-11 03:19:32'),
(465, 939, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-12 10:50:48', 'list-tagihan', 0, 0, '2023-05-12 03:50:48', '2023-05-12 03:50:48'),
(467, 951, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-11 10:34:41', 'list-tagihan', 1, 0, '2023-05-11 03:34:41', '2023-08-17 02:38:06'),
(468, 953, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-05-10 15:09:47', 'list-tagihan', 0, 0, '2023-05-10 08:09:47', '2023-05-10 08:09:47'),
(471, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-20 17:20:03', 'list-tagihan', 0, 0, '2023-05-20 10:20:03', '2023-05-20 10:20:03'),
(479, 951, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-29 18:30:31', 'list-tagihan', 0, 0, '2023-05-29 11:30:31', '2023-05-29 11:30:31'),
(483, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-20 17:20:03', 'list-tagihan', 0, 0, '2023-05-20 10:20:03', '2023-05-20 10:20:03'),
(491, 951, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-29 18:30:31', 'list-tagihan', 0, 0, '2023-05-29 11:30:31', '2023-05-29 11:30:31'),
(495, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-20 17:20:03', 'list-tagihan', 0, 0, '2023-05-20 10:20:03', '2023-05-20 10:20:03'),
(503, 951, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-29 18:30:31', 'list-tagihan', 0, 0, '2023-05-29 11:30:31', '2023-05-29 11:30:31'),
(507, 2, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-06-12 23:05:13', 'list-tagihan', 0, 0, '2023-06-12 16:05:13', '2023-06-12 16:05:13'),
(518, 951, 'wajib bayar', 'tagihan', 'Ada tagihan baru', '2023-05-29 18:30:31', 'list-tagihan', 0, 0, '2023-05-29 11:30:31', '2023-05-29 11:30:31'),
(522, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-06-13 12:28:57', 'list-tagihan', 0, 0, '2023-06-13 05:28:57', '2023-06-13 05:28:57'),
(533, 951, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-07-04 16:36:57', 'list-tagihan', 0, 0, '2023-07-04 09:36:57', '2023-07-04 09:36:57'),
(537, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-06-13 12:28:57', 'list-tagihan', 0, 0, '2023-06-13 05:28:57', '2023-06-13 05:28:57'),
(548, 951, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-07-04 16:36:57', 'list-tagihan', 0, 0, '2023-07-04 09:37:01', '2023-07-04 09:37:01'),
(552, 2, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-06-13 12:28:57', 'list-tagihan', 0, 0, '2023-06-13 05:28:57', '2023-06-13 05:28:57'),
(563, 951, 'deskripsi', 'tagihan', 'Ada tagihan baru', '2023-07-04 16:37:05', 'list-tagihan', 1, 0, '2023-07-04 09:37:05', '2023-08-17 02:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` varchar(255) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `total_pembayaran` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_tahun_ajaran` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `id_pembayaran`, `siswa_id`, `tanggal_pembayaran`, `total_pembayaran`, `metode_pembayaran`, `status`, `id_tahun_ajaran`, `created_at`, `updated_at`) VALUES
(30, 'PEM-00001-V-2023', 1, '2023-05-02', 75000, 'xendit', 'paid', NULL, '2023-05-02 04:59:26', '2023-05-02 04:59:45'),
(31, 'PEM-00002-V-2023', 1, '2023-05-02', 75000, 'xendit', 'paid', NULL, '2023-05-02 05:00:43', '2023-05-02 05:01:35'),
(32, 'PEM-00003-V-2023', 1, '2023-05-02', 105000, 'xendit', 'paid', NULL, '2023-05-02 05:29:15', '2023-05-02 05:29:33'),
(33, 'PEM-00004-V-2023', 813, '2023-05-02', 273000, 'metode_pembayaran', 'paid', 3, '2023-05-02 06:35:58', '2023-05-02 06:35:58'),
(34, 'PEM-00005-V-2023', 1, '2023-05-02', 105000, 'pending', 'pending', NULL, '2023-05-02 07:17:23', '2023-05-02 07:17:23'),
(35, 'PEM-00006-V-2023', 1, '2023-05-02', 105000, 'pending', 'pending', NULL, '2023-05-02 07:17:39', '2023-05-02 07:17:39'),
(36, 'PEM-00007-V-2023', 813, '2023-05-02', 100103000, 'metode_pembayaran', 'paid', 3, '2023-05-02 07:24:03', '2023-05-02 07:24:03'),
(37, 'PEM-00008-V-2023', 813, '2023-05-02', 70203000, 'metode_pembayaran', 'paid', 3, '2023-05-02 07:24:12', '2023-05-02 07:24:12'),
(38, 'PEM-00009-V-2023', 813, '2023-05-02', 70003000, 'metode_pembayaran', 'paid', 3, '2023-05-02 07:24:39', '2023-05-02 07:24:39'),
(39, 'PEM-00010-V-2023', 1, '2023-05-04', 205000, 'xendit', 'paid', NULL, '2023-05-04 06:12:56', '2023-05-04 06:13:36'),
(40, 'PEM-00011-V-2023', 1, '2023-05-04', 305000, 'xendit', 'paid', NULL, '2023-05-04 16:35:01', '2023-05-04 16:35:31'),
(41, 'PEM-00012-V-2023', 1, '2023-05-05', 70005000, 'pending', 'pending', NULL, '2023-05-05 03:04:19', '2023-05-05 03:04:19'),
(42, 'PEM-00013-V-2023', 1, '2023-05-05', 70005000, 'pending', 'pending', NULL, '2023-05-05 03:04:42', '2023-05-05 03:04:42'),
(43, 'PEM-00014-V-2023', 1, '2023-05-05', 100005000, 'pending', 'pending', NULL, '2023-05-05 03:04:54', '2023-05-05 03:04:54'),
(44, 'PEM-00015-V-2023', 1, '2023-05-05', 75000, 'pending', 'pending', NULL, '2023-05-05 03:05:04', '2023-05-05 03:05:04'),
(45, 'PEM-00016-V-2023', 1, '2023-05-05', 105000, 'pending', 'pending', NULL, '2023-05-05 03:05:15', '2023-05-05 03:05:15'),
(46, 'PEM-00017-V-2023', 1, '2023-05-05', 75000, 'pending', 'pending', NULL, '2023-05-05 03:19:50', '2023-05-05 03:19:50'),
(47, 'PEM-00018-V-2023', 1, '2023-05-05', 105000, 'pending', 'pending', NULL, '2023-05-05 03:21:28', '2023-05-05 03:21:28'),
(48, 'PEM-00019-V-2023', 1, '2023-05-05', 70005000, 'pending', 'pending', NULL, '2023-05-05 03:23:48', '2023-05-05 03:23:48'),
(49, 'PEM-00020-V-2023', 1, '2023-05-05', 75000, 'pending', 'pending', NULL, '2023-05-05 03:24:40', '2023-05-05 03:24:40'),
(50, 'PEM-00021-V-2023', 1, '2023-05-05', 75000, 'pending', 'pending', NULL, '2023-05-05 03:26:45', '2023-05-05 03:26:45'),
(51, 'PEM-00022-V-2023', 815, '2023-05-05', 295000, 'pending', 'pending', NULL, '2023-05-05 06:35:26', '2023-05-05 06:35:26'),
(52, 'PEM-00023-V-2023', 816, '2023-05-09', 203000, 'metode_pembayaran', 'paid', 3, '2023-05-09 02:54:39', '2023-05-09 02:54:39'),
(53, 'PEM-00024-V-2023', 816, '2023-05-09', 93000, 'metode_pembayaran', 'paid', 3, '2023-05-09 02:54:48', '2023-05-09 02:54:48'),
(54, 'PEM-00025-V-2023', 815, '2023-05-10', 203000, 'metode_pembayaran', 'paid', 3, '2023-05-10 07:42:25', '2023-05-10 07:42:25'),
(55, 'PEM-00026-V-2023', 1, '2023-05-11', 75000, 'pending', 'pending', NULL, '2023-05-11 09:26:08', '2023-05-11 09:26:08'),
(56, 'PEM-00027-V-2023', 815, '2023-05-11', 95000, 'pending', 'pending', NULL, '2023-05-11 09:26:24', '2023-05-11 09:26:24'),
(57, 'PEM-00028-V-2023', 815, '2023-05-11', 95000, 'xendit', 'paid', NULL, '2023-05-11 09:29:08', '2023-05-11 09:29:38'),
(58, 'PEM-00029-V-2023', 816, '2023-05-16', 205000, 'pending', 'pending', NULL, '2023-05-16 04:18:32', '2023-05-16 04:18:32'),
(59, 'PEM-00030-V-2023', 816, '2023-05-16', 205000, 'pending', 'pending', NULL, '2023-05-16 04:21:02', '2023-05-16 04:21:02'),
(60, 'PEM-00031-V-2023', 816, '2023-05-16', 205000, 'pending', 'pending', NULL, '2023-05-16 04:21:35', '2023-05-16 04:21:35'),
(61, 'PEM-00032-V-2023', 816, '2023-05-16', 205000, 'pending', 'pending', NULL, '2023-05-16 04:27:56', '2023-05-16 04:27:56'),
(62, 'PEM-00033-V-2023', 816, '2023-05-16', 205000, 'xendit', 'paid', NULL, '2023-05-16 04:28:07', '2023-05-16 04:29:04'),
(63, 'PEM-00034-V-2023', 816, '2023-05-16', 245000, 'xendit', 'paid', NULL, '2023-05-16 04:37:15', '2023-05-16 04:37:57'),
(64, 'PEM-00035-V-2023', 1, '2023-05-20', 75000, 'pending', 'pending', NULL, '2023-05-20 10:20:10', '2023-05-20 10:20:10'),
(65, 'PEM-00036-V-2023', 809, '2023-05-24', 503000, 'metode_pembayaran', 'paid', 3, '2023-05-24 15:15:18', '2023-05-24 15:15:18'),
(66, 'PEM-00037-V-2023', 820, '2023-05-25', 100005000, 'pending', 'pending', NULL, '2023-05-25 07:56:35', '2023-05-25 07:56:35'),
(67, 'PEM-00038-V-2023', 820, '2023-05-25', 100005000, 'pending', 'pending', NULL, '2023-05-25 08:11:28', '2023-05-25 08:11:28'),
(68, 'PEM-00039-V-2023', 820, '2023-05-25', 100005000, 'pending', 'pending', NULL, '2023-05-25 08:17:20', '2023-05-25 08:17:20'),
(69, 'PEM-00040-V-2023', 820, '2023-05-25', 100005000, 'pending', 'pending', NULL, '2023-05-25 08:21:21', '2023-05-25 08:21:21'),
(70, 'PEM-00041-V-2023', 820, '2023-05-25', 100005000, 'pending', 'pending', NULL, '2023-05-25 08:22:50', '2023-05-25 08:22:50'),
(71, 'PEM-00042-V-2023', 820, '2023-05-25', 100005000, 'pending', 'pending', NULL, '2023-05-25 08:24:33', '2023-05-25 08:24:33'),
(72, 'PEM-00043-V-2023', 820, '2023-05-25', 100005000, 'xendit', 'paid', NULL, '2023-05-25 08:26:52', '2023-05-25 08:27:10'),
(73, 'PEM-00044-V-2023', 820, '2023-05-25', 100005000, 'xendit', 'paid', NULL, '2023-05-25 08:27:53', '2023-05-25 08:28:11'),
(74, 'PEM-00001-VI-2023', 1, '2023-06-13', 75000, 'xendit', 'paid', NULL, '2023-06-13 05:33:11', '2023-06-13 05:33:31'),
(75, 'PEM-00002-VI-2023', 1, '2023-06-13', 105000, 'xendit', 'paid', NULL, '2023-06-13 06:49:08', '2023-06-13 06:50:27'),
(76, 'PEM-00003-VI-2023', 1, '2023-06-14', 100005000, 'xendit', 'paid', NULL, '2023-06-14 01:29:56', '2023-06-14 01:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_seleksi_id` int(11) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `jenjang` varchar(25) DEFAULT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `nama_bapak` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_bapak` varchar(255) DEFAULT NULL,
  `penghasilan_bapak` varchar(255) DEFAULT NULL,
  `agama_bapak` varchar(255) DEFAULT NULL,
  `agama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `penghasilan_ibu` varchar(255) DEFAULT NULL,
  `no_telp_bapak` varchar(255) DEFAULT NULL,
  `no_telp_ibu` varchar(255) DEFAULT NULL,
  `email_bapak` varchar(255) DEFAULT NULL,
  `email_ibu` varchar(255) DEFAULT NULL,
  `tgl_daftar` varchar(255) DEFAULT NULL,
  `jurusan_1` varchar(255) DEFAULT NULL,
  `jurusan_2` varchar(255) DEFAULT NULL,
  `prestasi_1` varchar(255) DEFAULT NULL,
  `prestasi_2` varchar(255) DEFAULT NULL,
  `ijasah` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `hasil` varchar(20) DEFAULT NULL,
  `daftar_ulang` varchar(20) DEFAULT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `nomor_pendaftaran` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `tanggal_seleksi_id`, `jenis`, `jurusan`, `jenjang`, `nis`, `nisn`, `email`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `asal_sekolah`, `no_telp`, `nama_bapak`, `nama_ibu`, `pekerjaan_bapak`, `penghasilan_bapak`, `agama_bapak`, `agama_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_telp_bapak`, `no_telp_ibu`, `email_bapak`, `email_ibu`, `tgl_daftar`, `jurusan_1`, `jurusan_2`, `prestasi_1`, `prestasi_2`, `ijasah`, `bukti_bayar`, `tingkat`, `status`, `hasil`, `daftar_ulang`, `tahun_ajaran_id`, `nomor_pendaftaran`, `created_at`, `updated_at`) VALUES
(1, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'galmogayde@gufum.com', 'maulana', 'bogor', '2009-04-02', 'P', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02929283', '823830303', NULL, NULL, '2023-04-28', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-bxp1sKoUByJSDzlI0n1MwyRIt.jpeg', '10', 'off', 'lulus', 'ya', 3, 'bxp1sKoUByJSDzlI0n1M', '2023-04-28 03:29:52', '2023-04-28 06:31:10'),
(2, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'pelmalikku@gufum.com', 'qwerty', 'Jakarta', '2009-04-26', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0821212121', '0857272727', NULL, NULL, '2023-04-28', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-DvcLEkMGumcFunwFY8uornwKr.jpeg', '10', 'off', 'lulus', 'ya', 3, 'DvcLEkMGumcFunwFY8uo', '2023-04-28 03:45:17', '2023-04-28 09:14:47'),
(3, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'fabata9440@larland.com', 'Azalea', 'Bandung', '2009-04-13', 'P', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085156010900', '089659055229', NULL, NULL, '2023-04-28', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-tE8nAATZnkv2Fo7rJBZcskrAA.jpeg', '10', 'off', 'lulus', 'ya', 3, 'tE8nAATZnkv2Fo7rJBZc', '2023-04-28 06:20:19', '2023-04-28 06:27:01'),
(4, NULL, 'siswapindahan', 'ipa', '3', '12349142', '5234953290', 'hurdizaltu@gufum.com', 'Michael', 'jakarta', '2009-04-23', 'L', 'janeee', 'islam', 'SMA 2 Tanggerang', '023489348', 'Bapake', 'usjfnwqf', 'PNS', '900000', 'islam', 'islam', 'wqjfnqwf', '84930393', '023425689', '02882489234', 'ebfewjb@gmail.com', 'jfebwfjwenf@gmail.com', '2023-04-28', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-b23AOzfX1kcLMdGUiJitEkKdG.jpeg', '10', NULL, NULL, NULL, 3, 'b23AOzfX1kcLMdGUiJit', '2023-04-28 09:18:05', '2023-04-28 09:41:00'),
(5, NULL, 'siswapindahan', 'ipa', '3', '87', '89', 'gutrofegnu@gufum.com', 'mumu', 'jakarta', '2009-04-13', 'L', 'Jl.Kren', 'islam', 'SMA 2 Tanggerang', '08221', 'uwr', 'wajaf', 'uwqhf', '3000000', 'islam', 'islam', 'jwffjqw', '3913200', '03299238', '9328023', 'jdeiqjf@gmail.com', 'ewnfjwnefl@gmail.com', '2023-04-28', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-FVLTwUs1mdvRnEW06ejdIQSU8.jpeg', '10', NULL, NULL, NULL, 3, 'FVLTwUs1mdvRnEW06ejd', '2023-04-28 09:34:09', '2023-04-28 09:41:06'),
(6, NULL, 'siswapindahan', NULL, '1', '6262', '2626', NULL, 'resy', 'efwih', '4240-02-20', 'L', NULL, 'islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'uBEuL0AbTfnoWzDiwNgt', '2023-04-28 09:56:44', '2023-04-28 09:56:44'),
(8, NULL, 'siswapindahan', 'ipa', '3', '123', '432', 'kofyehutru@gufum.com', 'Muyo', 'Jakarta', '2009-04-28', 'L', 'Jl.Kuncoro', 'islam', 'SMA Yadika 1', '08452367', 'taudahh', 'Muhfhjf', 'pns', '92840248', 'islam', 'kristen', 'jsbfkja', '763743748', '0202838394', '36294710', 'kewkjfwef@gmail.com', 'jhbfwjefb@gmail.com', '2023-04-28', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-lVEHoSwVFhBYx52MhNW8H8XJg.jpeg', '10', 'off', NULL, NULL, 3, 'lVEHoSwVFhBYx52MhNW8', '2023-04-28 10:02:26', '2023-04-28 10:06:31'),
(9, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'yultuburdi@gufum.com', 'yultru', 'Balikpapan', '2009-04-12', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0821', '5731', NULL, NULL, '2023-05-03', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-CLfqeHZXlPak8yI0w1NliUD0Y.jpg', '10', 'off', 'lulus', 'ya', 3, 'CLfqeHZXlPak8yI0w1Nl', '2023-05-03 02:27:52', '2023-05-04 02:18:10'),
(10, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'fodresuspo@gufum.com', 'Neneng', 'Balikpapan', '2009-03-12', 'P', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8353205', '375632957', NULL, NULL, '2023-05-03', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-YPPqYt7D65eedvkpJRUxnMCw0.jpg', '10', 'off', 'lulus', NULL, 3, 'YPPqYt7D65eedvkpJRUx', '2023-05-03 08:40:36', '2023-05-03 08:43:32'),
(11, NULL, 'siswabaru', 'ipa', '3', NULL, NULL, 'anandadimmas1204@gmail.com', 'dimmas', 'dsawd', '2023-05-05', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '098908098', '09809808098', NULL, NULL, '2023-05-04', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-03CcUjbqv68xn8lA0OIQXT9Kt.jpg', '10', 'off', 'lulus', NULL, 3, '03CcUjbqv68xn8lA0OIQ', '2023-05-04 02:40:06', '2023-05-04 02:43:08'),
(12, NULL, 'siswabaru', NULL, '3', NULL, NULL, 'anandadimmas1204@gmail.com', 'testing', 'tempat testing', '2023-05-11', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08978897897', '098989089890', NULL, NULL, '2023-05-04', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-FRJqk0XSPUFax54bPGoklWtCJ.jpg', '10', 'off', NULL, NULL, 3, 'FRJqk0XSPUFax54bPGok', '2023-05-04 02:47:42', '2023-05-04 02:51:50'),
(13, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'fezranoorsaputro15@gmail.com', 'siswa1', 'Jakarta', '2009-04-15', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '38274834', '392472394', NULL, NULL, '2023-05-04', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-coBUeKNzUpiXNGNicLWLmNvtA.jpeg', '10', 'off', NULL, NULL, 3, 'coBUeKNzUpiXNGNicLWL', '2023-05-04 09:17:55', '2023-05-04 09:21:54'),
(14, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'sirdokagne@gufum.com', 'asdf', 'Balikpapan', '2009-04-27', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0982813', '3284234', NULL, NULL, '2023-05-04', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-neHSN98bRdXuD32QSLK2spyM4.jpeg', '10', 'off', 'lulus', 'ya', 3, 'neHSN98bRdXuD32QSLK2', '2023-05-04 09:39:09', '2023-05-04 09:44:48'),
(15, NULL, 'siswabaru', 'ips', '3', NULL, NULL, NULL, 'fabata', 'Jaka', NULL, 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-tE8nAATZnkv2Fo7rJBZcskrAA.jpeg', '10', 'paid', NULL, NULL, 3, '7w1gQEQSNRgexa4JASRx', '2023-05-08 08:14:08', '2023-05-08 08:14:08'),
(16, NULL, 'siswabaru', 'ips', '3', NULL, NULL, 'fabata9440@larland.com', 'farta', 'Jakarta', '2009-12-01', 'P', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0218024234', '0221324323', NULL, NULL, '2023-05-08', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-TY70XNFIqziUSB9kAvv6KC8Cm.jpeg', '10', 'off', 'lulus', NULL, 3, 'TY70XNFIqziUSB9kAvv6', '2023-05-08 08:15:10', '2023-05-08 08:41:41'),
(17, NULL, 'siswabaru', 'ipa', '3', NULL, NULL, 'anandadimmas1204@gmail.com', 'peserta tes', 'sdsd', '2022-04-07', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08098908', '9890809809', NULL, NULL, '2023-05-08', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-4d3ZDsOr2D4KwhTKTiigZOrSq.jpg', '10', 'paid', NULL, NULL, 3, '4d3ZDsOr2D4KwhTKTiig', '2023-05-08 12:26:43', '2023-05-08 12:29:34'),
(18, 15, 'siswabaru', 'ipa', '3', NULL, NULL, 'anandadimmas1204@gmail.com', 'dimmassdwasdwads', 'sdasd', '2022-04-07', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0808098', '0808098', NULL, NULL, '2023-05-08', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-v9scVHwP3jpOGAStEWi55EQdR.jpg', '10', 'off', NULL, NULL, 3, 'v9scVHwP3jpOGAStEWi5', '2023-05-08 14:33:16', '2023-05-08 14:48:20'),
(19, 15, 'siswabaru', 'ipa', '3', NULL, NULL, 'anandadimmas1204@gmail.com', 'dimmas aku', 'sds', '2022-04-07', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0980809', '89080980', NULL, NULL, '2023-05-08', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-PPlItPTp6rbO42VnKjLvgIgd6.jpg', '10', 'off', NULL, 'ya', 3, 'PPlItPTp6rbO42VnKjLv', '2023-05-08 14:50:08', '2023-05-24 15:14:43'),
(20, 15, 'siswabaru', NULL, '2', NULL, NULL, 'fokkimurka@gufum.com', 'fokki', 'jakarta', '2011-03-28', NULL, NULL, NULL, 'SD Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089538383894', '082138484245', NULL, NULL, '2023-05-09', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-HXf7SVD0mzXjylBpPPQHnV3JH.jpg', '7', 'paid', NULL, NULL, 3, 'HXf7SVD0mzXjylBpPPQH', '2023-05-09 02:27:18', '2023-05-09 02:28:42'),
(21, 15, 'siswabaru', 'ips', '3', NULL, NULL, 'corzejustu@gufum.com', 'corze', 'Jakarta', '2013-04-10', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08515601900', '085158336737', NULL, NULL, '2023-05-09', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-NsRm0du06WjG5xYWZbGA3ysMC.jpg', '10', 'off', NULL, 'ya', 3, 'NsRm0du06WjG5xYWZbGA', '2023-05-09 02:35:54', '2023-05-09 03:28:26'),
(22, NULL, 'siswapindahan', 'ipa', '3', '913478', '031304940', 'vimlalidro@gufum.com', 'Budi Dimas', 'Solo', '2009-04-20', 'L', 'Jl.Gotong', 'kristen', 'SMA 2 Tanggerang', '0821234567', 'Budiana', 'sulis', 'pengangguran', '90000', 'islam', 'islam', 'pns', '23740', '03828', '021937042234', 'vimlalidro2@gufum.com', 'vimlalidro21@gufum.com', '2023-05-09', NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, 3, 'S0hcE1XBisgR8Rzyg1S4', '2023-05-09 07:24:59', '2023-05-09 07:24:59'),
(23, NULL, 'siswapindahan', 'ipa', '3', '913478', '031304940', 'vimlalidro@gufum.com', 'Budi Dimas', 'Solo', '2009-04-20', 'L', 'Jl.Gotong', 'kristen', 'SMA 2 Tanggerang', '0821234567', 'Budiana', 'sulis', 'pengangguran', '90000', 'islam', 'islam', 'pns', '23740', '03828', '021937042234', 'vimlalidro2@gufum.com', 'vimlalidro21@gufum.com', '2023-05-09', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-rri55N0TxbNgDkx6QwMm2by09.jpg', '10', NULL, NULL, NULL, 3, 'rri55N0TxbNgDkx6QwMm', '2023-05-09 07:26:27', '2023-05-09 07:27:21'),
(24, 15, 'siswabaru', 'ips', '3', NULL, NULL, 'domiri1070@larland.com', 'siswabaru1', 'jakarta', '2009-04-20', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08219394948', '08319381384', NULL, NULL, '2023-05-09', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-TSX5VTYQHkpqj0l3tBKKh07u4.jpg', '10', 'off', NULL, 'ya', 3, 'TSX5VTYQHkpqj0l3tBKK', '2023-05-09 09:00:38', '2023-05-09 09:05:05'),
(25, NULL, 'siswapindahan', 'ipa', '3', '12345', '123459876', 'vordukerko@gufum.com', 'mauldimmasbersatusatu', 'bawah jembatan', '2009-09-05', 'L', 'Blora Jawa tenga', 'islam', 'SMA Yadika 1', '08320239', 'suep', 'kilis', 'orang kaya', '999', 'islam', 'kristen', 'pns', '82828', '0912876', '9213412', 'vordukerko1@gufum.com', 'vordukerko12@gufum.com', '2023-05-09', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-QY6yGNHRPU3mEcUoJdSc1l66A.jpeg', '11', 'off', 'lulus', NULL, 3, 'QY6yGNHRPU3mEcUoJdSc', '2023-05-09 09:11:54', '2023-05-09 09:13:47'),
(27, 15, 'siswabaru', 'ipa', '3', NULL, NULL, 'anandadimmas1204@gmail.com', 'dsdawsdwaasd', 'sdsdsdsd', '2023-05-16', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '098908890', '09809809809809', NULL, NULL, '2023-05-16', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-hHJuQc66o1EIY2B9KW8yCZoxI.png', '10', 'off', NULL, NULL, 3, 'hHJuQc66o1EIY2B9KW8y', '2023-05-16 06:33:47', '2023-05-20 15:54:01'),
(28, 15, 'siswabaru', 'ipa', '3', NULL, NULL, 'siswa9822@gmail.com', 'siswa1', 'Jakarta', '2000-01-01', 'L', NULL, NULL, 'sekolah smp baru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089999', '087777', NULL, NULL, '2023-05-25', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-vm8BHPiz40KKzSUwffYNIhXiN.png', '10', 'off', NULL, 'ya', 3, 'vm8BHPiz40KKzSUwffYN', '2023-05-25 03:23:39', '2023-05-25 03:46:42'),
(29, NULL, 'siswapindahan', 'ipa', '3', '8098098', '890890890', 'anandadimmas1204@gmail.com', 'sdssdsd', 'dsdsds', '2022-04-24', 'L', 'hjhhjhj', 'islam', 'nnbnb', '7787', 'bnbnb', 'sdsd', 'nbnbn', '343434', 'islam', 'islam', 'sdsd', '9090', '8089890', '8898', 'asd@fsd.csds', 'sdd@Fsds.ds', '2023-05-25', NULL, NULL, NULL, NULL, NULL, NULL, '10', NULL, NULL, NULL, 3, 'hLT30XxPlNxOxVPO3nlL', '2023-05-25 07:30:31', '2023-05-25 07:30:31'),
(37, 16, 'siswabaru', 'ips', '3', NULL, NULL, 'cobacobaajeh3@gmail.com', 'Didik', 'Surabaya', '2009-06-28', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '021789654', '022789654', NULL, NULL, '2023-06-06', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-bbKxlORN6bFK8aKiz0KlpQ3iK.jfif', '10', 'paid', NULL, NULL, 3, 'bbKxlORN6bFK8aKiz0Kl', '2023-06-06 09:24:17', '2023-06-06 09:34:58'),
(38, 16, 'siswabaru', 'ips', '3', NULL, NULL, 'pofomalo@gotgel.org', 'Didikk', 'Surabaya', '2009-06-25', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '021654321', '022654321', NULL, NULL, '2023-06-06', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-fl6NeHqIRPlcfRvUOkLHWxCvd.jfif', '10', 'paid', NULL, NULL, 3, 'fl6NeHqIRPlcfRvUOkLH', '2023-06-06 09:38:32', '2023-06-06 09:42:26'),
(39, 16, 'siswabaru', 'ipa', '3', NULL, NULL, 'pofomalo@gotgel.org', 'Didik Setiawan', 'Surabaya', '2009-02-02', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02144444444', '02155555555', NULL, NULL, '2023-06-06', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-0iNeJheU1QTQgo0RoFhSeIBla.jfif', '10', 'paid', NULL, NULL, 3, '0iNeJheU1QTQgo0RoFhS', '2023-06-06 09:55:59', '2023-06-06 10:04:09'),
(40, 16, 'siswabaru', 'ips', '3', NULL, NULL, 'tahevecujohu@gotgel.org', 'qinan', 'Surabaya', '2009-02-20', 'P', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '087878784', '087898984', NULL, NULL, '2023-06-06', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-4Sxlj88PqtMo2Gv0kPkfp25jS.jfif', '10', 'off', NULL, NULL, 3, '4Sxlj88PqtMo2Gv0kPkf', '2023-06-06 12:41:25', '2023-06-13 17:08:51'),
(41, 16, 'siswabaru', 'ipa', '3', NULL, NULL, 'metivanin.jeqavore@gotgel.org', 'satuduatiga', 'Surabaya', '2009-05-02', 'L', NULL, NULL, 'SMA K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09876452', '021579452', NULL, NULL, '2023-06-07', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-MxLDWvP68KuMTVIJMKVUC7img.jfif', '10', 'paid', NULL, NULL, 3, 'MxLDWvP68KuMTVIJMKVU', '2023-06-07 01:36:56', '2023-06-07 01:37:32'),
(42, 16, 'siswabaru', 'ipa', '3', NULL, NULL, 'dians92o.work@gmail.com', 'dian s', 'Jakarta', '2020-01-01', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08999', '08777', NULL, NULL, '2023-06-13', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-goxBG2s3qrHMySSIbCh6pI4Dq.jpeg', '10', 'paid', NULL, NULL, 3, 'goxBG2s3qrHMySSIbCh6', '2023-06-12 17:03:12', '2023-06-12 17:06:38'),
(44, 16, 'siswabaru', 'ipa', '3', NULL, NULL, 'dians92.work@gmail.com', 'dian', 'Jakarta', '1991-01-01', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08999', '08777', NULL, NULL, '2023-06-13', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-M6HLUP28etnJBE4mOL9qBURqi.jpeg', '10', 'paid', NULL, NULL, 3, 'M6HLUP28etnJBE4mOL9q', '2023-06-13 06:43:25', '2023-06-13 06:45:20'),
(45, 16, 'siswabaru', 'ipa', '3', NULL, NULL, 'dians92.work@gmail.com', 'dian s', 'Jakarta', '1991-01-01', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08999', '087777', NULL, NULL, '2023-06-13', NULL, NULL, NULL, NULL, NULL, 'foto-bukti_bayar-SUdQOYXj9D713oyQyYMSzFnpi.png', '10', 'paid', NULL, NULL, 3, 'SUdQOYXj9D713oyQyYMS', '2023-06-13 15:54:34', '2023-06-13 16:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ujian` varchar(191) NOT NULL,
  `waktu` varchar(191) NOT NULL,
  `nilai_min` int(11) NOT NULL,
  `peraturan_ujian` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `nama_ujian`, `waktu`, `nilai_min`, `peraturan_ujian`, `created_at`, `updated_at`) VALUES
(1, 'Soal PKN', '60', 7, 'Kerjakan dengan Sejujurnya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penggunas`
--

CREATE TABLE `penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penggunas`
--

INSERT INTO `penggunas` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'pengguna 1', 'password', 'siswa', NULL, NULL),
(2, 'pengguna 2', 'password', 'wali', NULL, NULL),
(3, 'pengguna 3', 'password', 'siswa', NULL, NULL),
(4, 'pengguna 4', 'password', 'wali', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) DEFAULT NULL,
  `guru_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `nilai_kehadiran` int(11) DEFAULT NULL,
  `nilai_sikap` int(11) DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `nilai_uts` int(11) DEFAULT NULL,
  `nilai_uas` int(11) DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `predikat` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `dibuat_oleh` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians`
--

INSERT INTO `penilaians` (`id`, `kelas_id`, `tahun_ajaran_id`, `jadwal_id`, `mata_pelajaran_id`, `guru_id`, `siswa_id`, `nilai_kehadiran`, `nilai_sikap`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `predikat`, `status`, `dibuat_oleh`, `created_at`, `updated_at`) VALUES
(1, 46, 3, 3, 3, 51, 1, 100, 90, 90, 90, 90, NULL, NULL, NULL, NULL, '2023-05-02 07:27:00', '2023-05-02 07:27:00'),
(2, 46, 3, 3, 3, 51, 812, 95, 80, 90, 90, 90, NULL, NULL, NULL, NULL, '2023-05-02 07:27:00', '2023-05-02 07:27:00'),
(3, 46, 3, 3, 3, 51, 813, 98, 85, 85, 89, 90, NULL, NULL, NULL, NULL, '2023-05-02 07:27:00', '2023-05-02 07:27:00'),
(4, 46, 3, 3, 3, 51, 814, 76, 60, 90, 90, 90, NULL, NULL, NULL, NULL, '2023-05-02 07:27:00', '2023-05-02 07:27:00'),
(5, 47, 3, 10, 19, 53, 808, 20, 20, 30, 20, 20, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(6, 47, 3, 10, 19, 53, 809, 30, 30, 30, 30, 30, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(7, 47, 3, 10, 19, 53, 810, 40, 40, 40, 40, 40, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(8, 47, 3, 10, 19, 53, 811, 50, 50, 50, 50, 50, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(9, 47, 3, 10, 19, 53, 815, 80, 80, 80, 80, 80, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(10, 47, 3, 10, 19, 53, 816, 90, 90, 90, 90, 90, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(11, 47, 3, 10, 19, 53, 817, 30, 30, 30, 30, 30, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44'),
(12, 47, 3, 10, 19, 53, 818, 30, 30, 30, 30, 30, NULL, NULL, NULL, NULL, '2023-05-23 03:05:44', '2023-05-23 03:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_member`
--

CREATE TABLE `perpustakaan_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `tipe_member` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpustakaan_member`
--

INSERT INTO `perpustakaan_member` (`id`, `status_aktif`, `tipe_member`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '5', '2', '2022-12-28 19:46:25', '2022-12-29 10:57:30'),
(2, 1, '3', '3', '2022-12-28 19:46:25', '2022-12-29 10:57:30'),
(3, 1, '3', '97', '2023-02-21 06:23:32', '2023-02-21 06:23:32'),
(4, 1, '3', '928', '2023-04-27 04:29:28', '2023-04-27 04:29:28'),
(5, 1, '5', '951', '2023-05-05 03:47:53', '2023-05-05 03:47:53'),
(6, 1, '5', '2', '2023-05-05 03:49:19', '2023-05-05 03:49:19'),
(7, 1, '5', '953', '2023-05-16 03:34:44', '2023-05-16 03:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_pinjam`
--

CREATE TABLE `perpustakaan_pinjam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `batas_waktu` date DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpustakaan_pinjam`
--

INSERT INTO `perpustakaan_pinjam` (`id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `batas_waktu`, `member_id`, `created_at`, `updated_at`) VALUES
(8, '2023-05-02', NULL, '2023-05-09', 1, '2023-05-02 08:00:17', '2023-05-02 08:00:17'),
(9, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:29:20', '2023-05-03 06:29:20'),
(10, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:31:35', '2023-05-03 06:31:35'),
(11, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:32:12', '2023-05-03 06:32:12'),
(12, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:33:13', '2023-05-03 06:33:13'),
(13, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:33:44', '2023-05-03 06:33:44'),
(14, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:39:01', '2023-05-03 06:39:01'),
(15, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:39:45', '2023-05-03 06:39:45'),
(16, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:42:17', '2023-05-03 06:42:17'),
(17, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:43:34', '2023-05-03 06:43:34'),
(18, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:43:57', '2023-05-03 06:43:57'),
(19, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:44:13', '2023-05-03 06:44:13'),
(20, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:45:13', '2023-05-03 06:45:13'),
(21, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:46:48', '2023-05-03 06:46:48'),
(22, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:47:21', '2023-05-03 06:47:21'),
(23, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 06:47:51', '2023-05-03 06:47:51'),
(24, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 07:55:13', '2023-05-03 07:55:13'),
(25, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 08:58:55', '2023-05-03 08:58:55'),
(26, '2023-05-03', NULL, '2023-05-10', 1, '2023-05-03 09:59:06', '2023-05-03 09:59:06'),
(27, '2023-05-05', NULL, '2023-05-12', 1, '2023-05-05 02:45:51', '2023-05-05 02:45:51'),
(28, '2023-06-13', NULL, '2023-06-20', 1, '2023-06-13 05:30:38', '2023-06-13 05:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_pinjam_rincian`
--

CREATE TABLE `perpustakaan_pinjam_rincian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perpustakaan_pinjam_id` int(11) DEFAULT NULL,
  `buku_id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpustakaan_pinjam_rincian`
--

INSERT INTO `perpustakaan_pinjam_rincian` (`id`, `perpustakaan_pinjam_id`, `buku_id`, `note`, `created_at`, `updated_at`) VALUES
(7, 12, 2, NULL, '2023-05-03 06:33:13', '2023-05-03 06:33:13'),
(8, 12, 3, NULL, '2023-05-03 06:33:13', '2023-05-03 06:33:13'),
(9, 13, 3, NULL, '2023-05-03 06:33:44', '2023-05-03 06:33:44'),
(10, 17, 3, NULL, '2023-05-03 06:43:34', '2023-05-03 06:43:34'),
(11, 18, 2, NULL, '2023-05-03 06:43:57', '2023-05-03 06:43:57'),
(12, 18, 3, NULL, '2023-05-03 06:43:57', '2023-05-03 06:43:57'),
(13, 19, 3, NULL, '2023-05-03 06:44:13', '2023-05-03 06:44:13'),
(14, 20, 3, NULL, '2023-05-03 06:45:13', '2023-05-03 06:45:13'),
(15, 21, 3, NULL, '2023-05-03 06:46:48', '2023-05-03 06:46:48'),
(16, 22, 3, NULL, '2023-05-03 06:47:21', '2023-05-03 06:47:21'),
(17, 23, 3, NULL, '2023-05-03 06:47:51', '2023-05-03 06:47:51'),
(18, 24, 3, NULL, '2023-05-03 07:55:13', '2023-05-03 07:55:13'),
(19, 24, 4, NULL, '2023-05-03 07:55:13', '2023-05-03 07:55:13'),
(20, 25, 3, NULL, '2023-05-03 08:58:55', '2023-05-03 08:58:55'),
(21, 26, 4, NULL, '2023-05-03 09:59:06', '2023-05-03 09:59:06'),
(22, 27, 4, NULL, '2023-05-05 02:45:51', '2023-05-05 02:45:51'),
(23, 28, 4, NULL, '2023-06-13 05:30:38', '2023-06-13 05:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(11, 'App\\Models\\User', 1, 'myAppToken', 'b2f73cab5c0efc79089b9549ff3ef48d9464bc31cf9aee062e8a7a39ba9ae204', '[\"*\"]', NULL, '2022-12-25 23:35:39', '2022-12-25 23:35:39'),
(12, 'App\\Models\\User', 1, 'myAppToken', 'e6c751db5699cb6d88fb6227e68f845d1eddcb999c00e565eba7485b44542739', '[\"*\"]', NULL, '2022-12-25 23:48:48', '2022-12-25 23:48:48'),
(13, 'App\\Models\\User', 1, 'myAppToken', '79029a915f08d0a833127712e9c445a30b4d2fcb0a73b7fcbba6072ba3094784', '[\"*\"]', NULL, '2022-12-25 23:54:29', '2022-12-25 23:54:29'),
(14, 'App\\Models\\User', 1, 'myAppToken', '8870975ae52f4dd40a915eb05cbe12328c2e506c444de949f44c6cc9d330259c', '[\"*\"]', NULL, '2022-12-26 00:28:46', '2022-12-26 00:28:46'),
(15, 'App\\Models\\User', 14, 'myAppToken', '217dbb3c729f0a66a0029c7d0b3a2d58dd5dd9fe90dc8d53960c04c26ab923c9', '[\"*\"]', NULL, '2022-12-27 20:18:13', '2022-12-27 20:18:13'),
(16, 'App\\Models\\User', 14, 'myAppToken', '5987e571456951ac417c057a75d40ebc43f0b763ff7e8789a24b398305dd7744', '[\"*\"]', NULL, '2022-12-29 00:10:40', '2022-12-29 00:10:40'),
(17, 'App\\Models\\User', 14, 'myAppToken', '30bcf1060adb613e4eed544bc8618a971e4308a95d8af8746d442579dcef3014', '[\"*\"]', NULL, '2022-12-29 00:11:32', '2022-12-29 00:11:32'),
(18, 'App\\Models\\User', 25, 'myAppToken', '3172592e08d5fea68902029380d434089b6197e7f2f2875c880c79693266c7c7', '[\"*\"]', NULL, '2022-12-29 00:24:27', '2022-12-29 00:24:27'),
(19, 'App\\Models\\User', 25, 'myAppToken', '6d205f4db889c3b5dbb5d50787561734b82277a171fd5e7a6397c487edcabce4', '[\"*\"]', NULL, '2022-12-29 00:25:15', '2022-12-29 00:25:15'),
(20, 'App\\Models\\User', 25, 'myAppToken', 'ef4ca430dc550e64e76427f8e536864d4fc55bd4d7b8a5279109fe015dd9dc89', '[\"*\"]', NULL, '2022-12-29 00:25:58', '2022-12-29 00:25:58'),
(21, 'App\\Models\\User', 25, 'myAppToken', '9f5a84c4a7a6e303eb7d488186f4cc75a0c106860b25ec3e9bee95c0a6922d22', '[\"*\"]', NULL, '2022-12-29 00:26:44', '2022-12-29 00:26:44'),
(22, 'App\\Models\\User', 25, 'myAppToken', '72726e6608c2d80f772af0b56944cf24033fe3bfb38cdc30721e2c3998222c6f', '[\"*\"]', NULL, '2022-12-29 00:27:25', '2022-12-29 00:27:25'),
(23, 'App\\Models\\User', 25, 'myAppToken', '8ea431888100110be2ca1e2dc458503337777a1838ca86b76e9cb93350956f62', '[\"*\"]', NULL, '2022-12-29 00:28:37', '2022-12-29 00:28:37'),
(24, 'App\\Models\\User', 25, 'myAppToken', 'ce71c2599a8b57b0aa7ca577138b673be00d6f6d99882c1db2d47cd27676fa94', '[\"*\"]', NULL, '2022-12-29 00:28:39', '2022-12-29 00:28:39'),
(25, 'App\\Models\\User', 25, 'myAppToken', '397a3b92194ca504245010439360964769beb157956b67764321bda74f25c822', '[\"*\"]', NULL, '2022-12-29 00:28:41', '2022-12-29 00:28:41'),
(26, 'App\\Models\\User', 25, 'myAppToken', 'f4ffac519fb67358f25a00e8ce3cbabaf6515154954579a337fa722022b4bfb2', '[\"*\"]', NULL, '2022-12-29 00:30:10', '2022-12-29 00:30:10'),
(27, 'App\\Models\\User', 25, 'myAppToken', 'db3d22c0c2bfb1c8f54bfb4ae3bf2b4f7c752425192812cea9c9df58c8a3047f', '[\"*\"]', NULL, '2022-12-29 00:31:40', '2022-12-29 00:31:40'),
(28, 'App\\Models\\User', 25, 'myAppToken', '3c70f689fd526f48dad43a12932230264e28d9b56cab504c4e68999ae6975dec', '[\"*\"]', NULL, '2022-12-29 00:31:42', '2022-12-29 00:31:42'),
(29, 'App\\Models\\User', 25, 'myAppToken', '5fc6749532cc506532b8ab064ad550ce2a50827bb266d71dd3bf36c88afbe854', '[\"*\"]', NULL, '2022-12-29 00:33:09', '2022-12-29 00:33:09'),
(30, 'App\\Models\\User', 25, 'myAppToken', '8e71257cb47e976f417fb1f7e43a74ea14012c43b06011b549f59c4d918e950a', '[\"*\"]', NULL, '2022-12-29 00:33:12', '2022-12-29 00:33:12'),
(31, 'App\\Models\\User', 25, 'myAppToken', '377e23310547a5d8dc34e706d39a15aa9fa402512ae568c9a9b7d2e8903349c5', '[\"*\"]', NULL, '2022-12-29 00:33:29', '2022-12-29 00:33:29'),
(32, 'App\\Models\\User', 25, 'myAppToken', 'bcf5de5804468dcd4381a5a89312b73b51d6e8a162221f630efcebb6cf10e900', '[\"*\"]', NULL, '2022-12-29 00:33:33', '2022-12-29 00:33:33'),
(33, 'App\\Models\\User', 25, 'myAppToken', 'e011280c33ba37916e77056c2032967b132cb2d8179fdc1aeb3bf07330384e23', '[\"*\"]', NULL, '2022-12-29 00:35:05', '2022-12-29 00:35:05'),
(34, 'App\\Models\\User', 25, 'myAppToken', 'bad2dd91a2d84d8fbf679790b10782b19ac8dace840a495f90a4566b30369da9', '[\"*\"]', NULL, '2022-12-29 00:35:08', '2022-12-29 00:35:08'),
(35, 'App\\Models\\User', 25, 'myAppToken', 'e07dc70fbffd7bc31a1cc1280eb06affa9617d9aa2676e81742e1e86392e9505', '[\"*\"]', NULL, '2022-12-29 00:35:10', '2022-12-29 00:35:10'),
(36, 'App\\Models\\User', 25, 'myAppToken', '92967233a85d4b769b171ab3824b20ca5d2b096683ab113813c968b2f283e400', '[\"*\"]', NULL, '2022-12-29 00:35:13', '2022-12-29 00:35:13'),
(37, 'App\\Models\\User', 25, 'myAppToken', '1b0bca761c31d4636223a8a47a66f5a6446e3863abc0f6958782b27a87ca0765', '[\"*\"]', NULL, '2022-12-29 00:58:28', '2022-12-29 00:58:28'),
(38, 'App\\Models\\User', 25, 'myAppToken', '42982613a611add373f6b904617837e261172449c4e56d961c0fecf9ebdbad93', '[\"*\"]', NULL, '2022-12-29 01:02:05', '2022-12-29 01:02:05'),
(39, 'App\\Models\\User', 25, 'myAppToken', '1193495295f979feae189921b10b0d419f6b25e8ad05555cb747066aa53b7526', '[\"*\"]', NULL, '2022-12-29 01:04:45', '2022-12-29 01:04:45'),
(40, 'App\\Models\\User', 25, 'myAppToken', '0c83f0098971b6d6337e49750c05e3dc99fcb996fcbd0aec2f321e2b4bb94241', '[\"*\"]', NULL, '2022-12-29 01:10:47', '2022-12-29 01:10:47'),
(41, 'App\\Models\\User', 25, 'myAppToken', '4694bf22c7749c89118c1283fe1bdbf29c85430c80b4ed1c43930d0aa00f25d9', '[\"*\"]', NULL, '2022-12-29 01:13:29', '2022-12-29 01:13:29'),
(42, 'App\\Models\\User', 25, 'myAppToken', 'b961c6ddc3dbee3ca04604a91d587140e6d7c956adf214a873e4f46499dfeb28', '[\"*\"]', NULL, '2022-12-29 02:45:31', '2022-12-29 02:45:31'),
(43, 'App\\Models\\User', 25, 'myAppToken', 'd98b632fc677a6c3711c65726068ac5c18a213a7cc4fbb09fd8fa3bb6502848a', '[\"*\"]', NULL, '2022-12-29 19:28:53', '2022-12-29 19:28:53'),
(44, 'App\\Models\\User', 25, 'myAppToken', 'c3ae0a23a72d62ed6f4b050c52de8e4334dbd1e36b6710a5635c9669a9dd8b78', '[\"*\"]', NULL, '2022-12-29 19:29:14', '2022-12-29 19:29:14'),
(45, 'App\\Models\\User', 25, 'myAppToken', '5e4f7cadcb9fc328d4809be72bf4ed77dc64b14e594934d1d024223aa1fd1998', '[\"*\"]', NULL, '2022-12-29 19:32:05', '2022-12-29 19:32:05'),
(46, 'App\\Models\\User', 25, 'myAppToken', '15483c9eaae031acb4e97c8dee8f4cea31ff7f3a7e2919d21d093a631f496042', '[\"*\"]', NULL, '2022-12-29 19:33:44', '2022-12-29 19:33:44'),
(47, 'App\\Models\\User', 25, 'myAppToken', '88bb5fd7d86968737b0cdd3a9bfc949a4b94da105252daacfaee178825dedb24', '[\"*\"]', NULL, '2022-12-29 19:40:28', '2022-12-29 19:40:28'),
(48, 'App\\Models\\User', 25, 'myAppToken', '8fd169bcdd97fe7b58cc6a4b2ada8abd90f5003aef49b84214e8bbdf9c852d36', '[\"*\"]', NULL, '2022-12-29 20:16:33', '2022-12-29 20:16:33'),
(49, 'App\\Models\\User', 25, 'myAppToken', '9ed17826ca56911bc4be916b4fe032e343bee53d6508c179a0e033941b4afebd', '[\"*\"]', NULL, '2022-12-29 20:29:53', '2022-12-29 20:29:53'),
(50, 'App\\Models\\User', 25, 'myAppToken', '8e771956da2af21dd1d83330a93eff7fc460a618e152adaaad83ad32a1b7f211', '[\"*\"]', NULL, '2022-12-29 20:39:59', '2022-12-29 20:39:59'),
(51, 'App\\Models\\User', 25, 'myAppToken', '4c14bd5320c87d4601b0362dc67dd820e9836f99425d0b5c1ea4679b032d2a78', '[\"*\"]', NULL, '2022-12-29 20:48:31', '2022-12-29 20:48:31'),
(52, 'App\\Models\\User', 25, 'myAppToken', '67ba971c1ea4ecdf024b2839117bc615c49b3622aebe57c7aaf8692e9ea4dfad', '[\"*\"]', NULL, '2022-12-29 20:50:18', '2022-12-29 20:50:18'),
(53, 'App\\Models\\User', 25, 'myAppToken', '8357ea44c97ec65c6c3abd68919c5c59b78a0ef3f51b63dc827426aa9fb9da02', '[\"*\"]', NULL, '2022-12-29 21:03:18', '2022-12-29 21:03:18'),
(54, 'App\\Models\\User', 25, 'myAppToken', 'c2b4bcc1a4c028fead98ca318f11020bde2ce9a6105d1d54387d1b2f84ccb77a', '[\"*\"]', NULL, '2022-12-29 21:31:47', '2022-12-29 21:31:47'),
(55, 'App\\Models\\User', 25, 'myAppToken', '523091de92afeff8f64bbeacaf8b60dcf6b4ae26dfb70d1d43f4fd06c6a4984d', '[\"*\"]', NULL, '2022-12-29 23:16:10', '2022-12-29 23:16:10'),
(56, 'App\\Models\\User', 25, 'myAppToken', '096edc350193682bca24c78a8c607bacc7a080cadd13e58bb274ba641a4a10ee', '[\"*\"]', NULL, '2022-12-29 23:30:50', '2022-12-29 23:30:50'),
(57, 'App\\Models\\User', 25, 'myAppToken', '6f5c5ab14c0965c1d0c04fbc9deb8d65b2f1899be0162fa79e6c50f83b41dc87', '[\"*\"]', NULL, '2022-12-29 23:35:14', '2022-12-29 23:35:14'),
(58, 'App\\Models\\User', 25, 'myAppToken', 'c28c5ab93dd47db54d7ae3e53c90f8165675991cafa9ed10acfdbeaf110fd184', '[\"*\"]', NULL, '2022-12-29 23:41:41', '2022-12-29 23:41:41'),
(59, 'App\\Models\\User', 25, 'myAppToken', '02cf34b3999b214e5514166ffa1c130db888c2ba738df0eaa6536156c820188a', '[\"*\"]', NULL, '2022-12-29 23:51:53', '2022-12-29 23:51:53'),
(60, 'App\\Models\\User', 25, 'myAppToken', '02fd79acf5d5b20df892c5b873bcce62725c6b00c9576690eedfb59c99fce966', '[\"*\"]', NULL, '2022-12-30 00:22:23', '2022-12-30 00:22:23'),
(61, 'App\\Models\\User', 25, 'myAppToken', 'b59548b890effdbf7696f38c60598ead7ab9db538fb5407d90a1609634aa94be', '[\"*\"]', NULL, '2022-12-30 00:24:26', '2022-12-30 00:24:26'),
(62, 'App\\Models\\User', 25, 'myAppToken', '5429570916dbd317d99984ef38b212873faa55169257e0e749201a7e0e2faf89', '[\"*\"]', NULL, '2022-12-30 00:33:04', '2022-12-30 00:33:04'),
(63, 'App\\Models\\User', 25, 'myAppToken', '60a0a8ce2acb9b653fe3c69035ccc08e271a8c6882a765fe6aca3c05c5982f7e', '[\"*\"]', NULL, '2022-12-30 01:04:33', '2022-12-30 01:04:33'),
(64, 'App\\Models\\User', 25, 'myAppToken', '5ff55739f26ca82593f20c6f5d59813f89a2f8de52b9ff3f9d39e039265c4635', '[\"*\"]', NULL, '2022-12-30 01:57:30', '2022-12-30 01:57:30'),
(65, 'App\\Models\\User', 25, 'myAppToken', '9e477ed05be8725f2bb80a474961a7a16b9fc1997b6ca4a0f050c2279c3c1f16', '[\"*\"]', NULL, '2022-12-30 02:47:21', '2022-12-30 02:47:21'),
(66, 'App\\Models\\User', 25, 'myAppToken', 'bb4ad24bc30670ceae725e25110ac6b0d89842106c18f521de927db88dd2b51d', '[\"*\"]', NULL, '2022-12-30 02:49:28', '2022-12-30 02:49:28'),
(67, 'App\\Models\\User', 25, 'myAppToken', 'aca0fbb3da1710fb1d64323a802c89ac14e7a30773520d0af0369533d91761f1', '[\"*\"]', NULL, '2022-12-30 03:14:52', '2022-12-30 03:14:52'),
(68, 'App\\Models\\User', 25, 'myAppToken', 'b6c0c0bb886c1a872dbfedd891fe7e72de15d5993ab3b8e16254189a42cdf7e5', '[\"*\"]', NULL, '2022-12-30 03:28:27', '2022-12-30 03:28:27'),
(69, 'App\\Models\\User', 25, 'myAppToken', '51698aebf9f37b0e3f2a85d416fbd600a9d9dcc533d1f4f33b3c153f668006e8', '[\"*\"]', NULL, '2022-12-30 04:00:56', '2022-12-30 04:00:56'),
(70, 'App\\Models\\User', 25, 'myAppToken', '6050ee2249c954c6052d9e493476e4334d784b4b2a0097551e9fe2d739e7def3', '[\"*\"]', NULL, '2022-12-30 04:01:27', '2022-12-30 04:01:27'),
(71, 'App\\Models\\User', 25, 'myAppToken', '322186fec7273a3e1c117bef7604ae96075a6522335c568df50583f2a8ac0acc', '[\"*\"]', NULL, '2022-12-30 13:07:25', '2022-12-30 13:07:25'),
(72, 'App\\Models\\User', 25, 'myAppToken', 'a61e036673d49044828b52c03b797870b70b4965d6751f32862cb6eef10c6bd7', '[\"*\"]', NULL, '2023-01-01 08:55:13', '2023-01-01 08:55:13'),
(73, 'App\\Models\\User', 25, 'myAppToken', '35d6b56e336708fbae76362d079d9cb7ea58fc7a9383482b6db428dc464410a4', '[\"*\"]', NULL, '2023-01-02 02:30:53', '2023-01-02 02:30:53'),
(74, 'App\\Models\\User', 25, 'myAppToken', '59e10cf019d3847f1ac8e1ec5e4d273a2a812cf51ea771e39ebc7a2ea31a6ab3', '[\"*\"]', NULL, '2023-01-02 02:40:07', '2023-01-02 02:40:07'),
(75, 'App\\Models\\User', 25, 'myAppToken', '30055232da1a0ab5763cbe0149743e0cd36bb9cedcefde413facee33671493c5', '[\"*\"]', NULL, '2023-01-02 03:02:15', '2023-01-02 03:02:15'),
(76, 'App\\Models\\User', 25, 'myAppToken', '48f035b8e156f0ec5ab34f8c4e96dd1ebb40223eaaa2a8652179813b7cb1d75a', '[\"*\"]', NULL, '2023-01-02 03:04:22', '2023-01-02 03:04:22'),
(77, 'App\\Models\\User', 25, 'myAppToken', 'd740630934495171920c56f0039224cff603a547cf1330e1a942e5e3b5c7a381', '[\"*\"]', NULL, '2023-01-02 03:11:20', '2023-01-02 03:11:20'),
(78, 'App\\Models\\User', 2, 'myAppToken', '38d44fdb1f303cffa232448e53034995780bdeaa6a58cc18a73f6914db4aec64', '[\"*\"]', NULL, '2023-01-02 03:17:05', '2023-01-02 03:17:05'),
(79, 'App\\Models\\User', 2, 'myAppToken', 'c9bb1cba0d08bd7ece3157dbc9196a592d26d8f8ca68c42080e3471b93c877f1', '[\"*\"]', NULL, '2023-01-02 03:25:06', '2023-01-02 03:25:06'),
(80, 'App\\Models\\User', 2, 'myAppToken', 'f1e1619f5d98d276b8f7a624c14fbd80b98f8c5cd97b117c1bb679ead6e25cba', '[\"*\"]', NULL, '2023-01-02 03:27:01', '2023-01-02 03:27:01'),
(81, 'App\\Models\\User', 2, 'myAppToken', '893d3974c7434075986197967fbbcc6e7716a54fc0fc64d102abaa763d6bbeab', '[\"*\"]', NULL, '2023-01-02 03:27:45', '2023-01-02 03:27:45'),
(82, 'App\\Models\\User', 2, 'myAppToken', 'e0ee6c6196cc7aa3ef769dc29e90abd68bf688eeff25a34dca81713d335dd2f7', '[\"*\"]', NULL, '2023-01-02 03:28:49', '2023-01-02 03:28:49'),
(83, 'App\\Models\\User', 2, 'myAppToken', '3f55610027a7938b41d84b6fd94d519cb861f6bce9a747b5d0ac4612806494f4', '[\"*\"]', NULL, '2023-01-02 03:29:12', '2023-01-02 03:29:12'),
(84, 'App\\Models\\User', 2, 'myAppToken', 'b0230c003d8f5165d672a60f3a4aef2a4792cb1eec6deaec4054a0b69e6feef1', '[\"*\"]', NULL, '2023-01-02 03:42:30', '2023-01-02 03:42:30'),
(85, 'App\\Models\\User', 3, 'myAppToken', 'b1cdf6945b53cd3e8867dc4934d9cbe78a56986bee6847920ebd12a9f0bc88ee', '[\"*\"]', NULL, '2023-01-02 03:46:05', '2023-01-02 03:46:05'),
(86, 'App\\Models\\User', 2, 'myAppToken', '1dfe8b91d4c237b595eb29a5fbf02aa235703fc7eddf5f6c3a38ed33fc2d115d', '[\"*\"]', NULL, '2023-01-02 03:48:39', '2023-01-02 03:48:39'),
(87, 'App\\Models\\User', 2, 'myAppToken', '47658961c01919dd2c1bceb5fb22e648df0f5a8334ef196b54dfbf43d87abb8a', '[\"*\"]', NULL, '2023-01-02 03:50:30', '2023-01-02 03:50:30'),
(88, 'App\\Models\\User', 3, 'myAppToken', 'd0c78c002e745ed6359c1d1a16b9601e39bb7f9cd655ee7dde696fcf8d9ca7a8', '[\"*\"]', NULL, '2023-01-02 03:51:00', '2023-01-02 03:51:00'),
(89, 'App\\Models\\User', 3, 'myAppToken', 'ced1d1ac13ac28cb4cd7d970b8b3082c7cf41283bc8a9787f9ae00f3bc152b3a', '[\"*\"]', NULL, '2023-01-02 03:57:52', '2023-01-02 03:57:52'),
(90, 'App\\Models\\User', 3, 'myAppToken', '816555378fabcad8dd6672ff9f37402dae92991019c804d8230d85ae017cc4d1', '[\"*\"]', NULL, '2023-01-02 03:58:30', '2023-01-02 03:58:30'),
(91, 'App\\Models\\User', 3, 'myAppToken', '8776fb501fa182968a0c7ce90e709017f439557334f2fb7ed2473107e7002cb6', '[\"*\"]', NULL, '2023-01-02 04:01:23', '2023-01-02 04:01:23'),
(92, 'App\\Models\\User', 2, 'myAppToken', '4215690f3c5bd1ed8de64f6a0f829785964bcef36d7789d797a369b01cee65ba', '[\"*\"]', NULL, '2023-01-02 04:04:33', '2023-01-02 04:04:33'),
(93, 'App\\Models\\User', 2, 'myAppToken', 'c9caf1cd510f4eaccd090c669783b81d32fd14163919eb4626e75ea1fc400bc5', '[\"*\"]', NULL, '2023-01-02 04:05:46', '2023-01-02 04:05:46'),
(94, 'App\\Models\\User', 3, 'myAppToken', '42d7965e6248249cca5dd33be1c91c1a5746bc7f2333a59c378b4cf6ade64d10', '[\"*\"]', NULL, '2023-01-02 04:06:33', '2023-01-02 04:06:33'),
(95, 'App\\Models\\User', 2, 'myAppToken', 'ca1e149625a8bcf48d72ff6ee0a2183ca38f549b09bf670fa3a8aa3a4bf712ad', '[\"*\"]', NULL, '2023-01-02 04:33:13', '2023-01-02 04:33:13'),
(96, 'App\\Models\\User', 3, 'myAppToken', '8ac55f28436e7445f0c84c6e0854ca83489c8598a079147aee82e166f5c9de3d', '[\"*\"]', NULL, '2023-01-02 04:33:37', '2023-01-02 04:33:37'),
(97, 'App\\Models\\User', 2, 'myAppToken', '0a5c54a2a6694f28e3fef663c6fca4a2f84ca0fe74baa2a28789fd18226a37ac', '[\"*\"]', NULL, '2023-01-02 04:57:50', '2023-01-02 04:57:50'),
(98, 'App\\Models\\User', 2, 'myAppToken', '15c1fb3e3c5b57fb1ff35bfe61dee9b0c0a8aba921e0c42ea4df4bb45d0c4265', '[\"*\"]', NULL, '2023-01-02 06:18:08', '2023-01-02 06:18:08'),
(99, 'App\\Models\\User', 2, 'myAppToken', 'fd96bcbf8d0f29023e76ab4bf7b6ddd1ea00e905afe523c38799352e0dd4cca0', '[\"*\"]', NULL, '2023-01-02 06:27:50', '2023-01-02 06:27:50'),
(100, 'App\\Models\\User', 2, 'myAppToken', 'be620a60ed2681e0f558c3a3105d1868535aa152bdd1382886cf900861d6583a', '[\"*\"]', NULL, '2023-01-02 06:28:12', '2023-01-02 06:28:12'),
(101, 'App\\Models\\User', 2, 'myAppToken', '4edbd60b339dfd0fbbd6afd5420a300400023d352784ca1a1d6a49807428f0ca', '[\"*\"]', NULL, '2023-01-02 06:30:50', '2023-01-02 06:30:50'),
(102, 'App\\Models\\User', 2, 'myAppToken', 'fd457f26609101c040f3dcd6256433a9469f2df1f5c1db02358c2246cb2fe26c', '[\"*\"]', NULL, '2023-01-02 06:31:11', '2023-01-02 06:31:11'),
(103, 'App\\Models\\User', 3, 'myAppToken', '06567ed968cc764d356d951234071b8502ed6b5be9f1a33013e13e209186ca5b', '[\"*\"]', NULL, '2023-01-02 07:03:41', '2023-01-02 07:03:41'),
(104, 'App\\Models\\User', 2, 'myAppToken', '6e9fc55267f6e8467b0ae0b2fd6f83f0ad893120dac26e88788b41d24e8cf325', '[\"*\"]', NULL, '2023-01-02 07:07:05', '2023-01-02 07:07:05'),
(105, 'App\\Models\\User', 3, 'myAppToken', '18654cb660c514aad489406ca48e4a56ae741dc42dad1cf2bd8515eef266ebaa', '[\"*\"]', NULL, '2023-01-02 07:26:22', '2023-01-02 07:26:22'),
(106, 'App\\Models\\User', 2, 'myAppToken', '02492cb9eddaed1fe012209e4bf2fd982ad9955c7ca69b485f8b048c02438eca', '[\"*\"]', NULL, '2023-01-02 08:28:23', '2023-01-02 08:28:23'),
(107, 'App\\Models\\User', 2, 'myAppToken', 'e1df3cec62096894e787c50130ac8edacdfef9180479cb646b35a12501ea8824', '[\"*\"]', NULL, '2023-01-02 08:44:55', '2023-01-02 08:44:55'),
(108, 'App\\Models\\User', 2, 'myAppToken', '0dcd86727e63524e1047143e500ee8ee575807838d5824eb6728766335cd2e88', '[\"*\"]', NULL, '2023-01-16 03:06:50', '2023-01-16 03:06:50'),
(109, 'App\\Models\\User', 2, 'myAppToken', 'f4234dfdd0ff06a640d951bb7cd3d72b4f25bf19b4b76ef5c520b439e8ab9fdc', '[\"*\"]', NULL, '2023-01-16 03:06:54', '2023-01-16 03:06:54'),
(110, 'App\\Models\\User', 2, 'myAppToken', '74590041ffbbf63a662b20fc604019101d2c257464c349bed35fc5f56c6ac48d', '[\"*\"]', NULL, '2023-01-16 03:40:11', '2023-01-16 03:40:11'),
(111, 'App\\Models\\User', 2, 'myAppToken', '51c0d2cfbf70de447b2c1e2acacd1e457ed629e076c7b653e38e475af70ab3a9', '[\"*\"]', NULL, '2023-01-18 03:48:05', '2023-01-18 03:48:05'),
(112, 'App\\Models\\User', 2, 'myAppToken', '7ffe37ca337120058dbd86a141d6f9b121d3caf990a5a39299a3fb5407e30a09', '[\"*\"]', NULL, '2023-01-18 07:46:13', '2023-01-18 07:46:13'),
(113, 'App\\Models\\User', 2, 'myAppToken', '7aa8c21df3bfe2cb8bd4392121982351c6a089b390c8f4d973bda7129da57bca', '[\"*\"]', NULL, '2023-01-18 07:46:33', '2023-01-18 07:46:33'),
(114, 'App\\Models\\User', 2, 'myAppToken', 'db0f3d65e4f758ed7dd0b515ce2a1c136c49e0883c61bdf6be1ad26fe4ca72f6', '[\"*\"]', NULL, '2023-01-18 07:50:09', '2023-01-18 07:50:09'),
(115, 'App\\Models\\User', 2, 'myAppToken', '7c5d7630d00db008f5f3ecfc89ecfe1c8ee2f78f7570fc4ee03f363ea5f7a1d8', '[\"*\"]', NULL, '2023-01-18 07:56:49', '2023-01-18 07:56:49'),
(116, 'App\\Models\\User', 2, 'myAppToken', '9985238cd61c15832d521ba5670d22a778d8eb245a68ab7247831f3299515996', '[\"*\"]', NULL, '2023-01-18 08:44:14', '2023-01-18 08:44:14'),
(117, 'App\\Models\\User', 2, 'myAppToken', 'aec9978b61c99085eafbeefb9bd609fb691ecad0b5eabdcac8126293dc973293', '[\"*\"]', NULL, '2023-01-18 08:50:10', '2023-01-18 08:50:10'),
(118, 'App\\Models\\User', 2, 'myAppToken', '292422ecb13ced71ce515ad277465aec92e65b87149c4095d78725044bcd6053', '[\"*\"]', NULL, '2023-01-18 08:51:28', '2023-01-18 08:51:28'),
(119, 'App\\Models\\User', 2, 'myAppToken', '3fc4e2182d9e1af4ce3afb4f28c9b4d71ce070f64b905c131fd396a040c4bd91', '[\"*\"]', NULL, '2023-01-18 08:52:59', '2023-01-18 08:52:59'),
(120, 'App\\Models\\User', 28, 'myAppToken', 'ebf3c1efb52a77e64d235ae98af6c309d36eb9e786a1d845581541265cd8aae2', '[\"*\"]', NULL, '2023-01-18 08:55:47', '2023-01-18 08:55:47'),
(121, 'App\\Models\\User', 28, 'myAppToken', '669b234f564a62953504b7c4cc5dec359293130851d50df10ca4ea5fd0fe8a35', '[\"*\"]', NULL, '2023-01-18 08:58:54', '2023-01-18 08:58:54'),
(122, 'App\\Models\\User', 28, 'myAppToken', '239d65d31929be6290c0da820bc66aefefe499baa8e39fc509450f16268dd30d', '[\"*\"]', NULL, '2023-01-18 09:03:59', '2023-01-18 09:03:59'),
(123, 'App\\Models\\User', 2, 'myAppToken', '9b82196aa594890449126a4caf2d5a22354a1ec509be145ea1cda06eb5bf4524', '[\"*\"]', NULL, '2023-01-19 06:34:13', '2023-01-19 06:34:13'),
(124, 'App\\Models\\User', 2, 'myAppToken', '692a70fbe3cef41c99c189e8dea5bf7ba22a737c6a0d9206afc0407d90f02bab', '[\"*\"]', NULL, '2023-01-19 08:08:12', '2023-01-19 08:08:12'),
(125, 'App\\Models\\User', 3, 'myAppToken', 'b9c6c7a2ef991339b5d769e483b399d786840c2b8d7ef2e05e44d2f7fa2fb77b', '[\"*\"]', NULL, '2023-01-20 06:53:04', '2023-01-20 06:53:04'),
(126, 'App\\Models\\User', 2, 'myAppToken', 'b3f88c43a3a717356b2bb4f13f0be9b489e4d1c46a99d50d9af9679d7433a08c', '[\"*\"]', NULL, '2023-01-20 10:25:53', '2023-01-20 10:25:53'),
(127, 'App\\Models\\User', 2, 'myAppToken', '61968b5064872af6b73e82d9ae46cc9b1a74721813547b2d44d20dca5b794558', '[\"*\"]', NULL, '2023-01-20 10:29:48', '2023-01-20 10:29:48'),
(128, 'App\\Models\\User', 2, 'myAppToken', 'e15da24858b33fedf14b8523dd2c43e1e4efdc7b1709188dfcf49b6b19400e61', '[\"*\"]', NULL, '2023-01-24 03:02:57', '2023-01-24 03:02:57'),
(129, 'App\\Models\\User', 2, 'myAppToken', 'fc7e531fa6c78d52a6fad5fc82255ed35e53003973d06b2dc60e73b00f2a88b7', '[\"*\"]', NULL, '2023-01-24 03:49:22', '2023-01-24 03:49:22'),
(130, 'App\\Models\\User', 2, 'myAppToken', '06775c9a4fc8d6e1206229969bb66145341322b3aee02d30b6a26ee17fdc19fd', '[\"*\"]', NULL, '2023-01-24 04:04:20', '2023-01-24 04:04:20'),
(131, 'App\\Models\\User', 2, 'myAppToken', '597907319c01503a32b302e77ce716790b04c375b2fb30203fccac51f3f79259', '[\"*\"]', NULL, '2023-01-24 07:05:14', '2023-01-24 07:05:14'),
(132, 'App\\Models\\User', 2, 'myAppToken', '62c0aecda903f5eff8108a004dfa8998170335e3e3a9934e3bc69a4ed0df8068', '[\"*\"]', NULL, '2023-01-24 07:06:26', '2023-01-24 07:06:26'),
(133, 'App\\Models\\User', 2, 'myAppToken', '50c5c3af7521f9378e750a8d40996ba82b6610cf96b609fcfb856ff2444e6467', '[\"*\"]', NULL, '2023-01-24 09:56:20', '2023-01-24 09:56:20'),
(134, 'App\\Models\\User', 2, 'myAppToken', '433cb27b1f161a60a03368f34371bec56cf8f6aa3dd2113bc751421cfce02b24', '[\"*\"]', NULL, '2023-01-25 02:39:54', '2023-01-25 02:39:54'),
(135, 'App\\Models\\User', 2, 'myAppToken', '6d3d9997ff2a15eba133d958db744956d1c53cdfd80c528a30663fec2c810801', '[\"*\"]', NULL, '2023-01-25 02:40:07', '2023-01-25 02:40:07'),
(136, 'App\\Models\\User', 2, 'myAppToken', 'edb1d177ecbcd4b47a004d1496513a8b3d76cc054eac76e507cb7b49486ce7a6', '[\"*\"]', NULL, '2023-01-25 02:41:26', '2023-01-25 02:41:26'),
(137, 'App\\Models\\User', 2, 'myAppToken', 'f2eef62912dc3f2f4669a8ea8d3176b569ac1ab113eb24b5f74cb2ba92938124', '[\"*\"]', NULL, '2023-01-25 02:42:05', '2023-01-25 02:42:05'),
(138, 'App\\Models\\User', 2, 'myAppToken', 'f587c8ee599db8d69f4496a01276854f9d0c4d63522178ca023b503b63a7d977', '[\"*\"]', NULL, '2023-01-25 02:47:13', '2023-01-25 02:47:13'),
(139, 'App\\Models\\User', 2, 'myAppToken', 'c2239bce2dee85b846c6ed7ec1e4f3f3a13fdce00ffa57aa85796a6fda5890b4', '[\"*\"]', NULL, '2023-01-25 08:46:46', '2023-01-25 08:46:46'),
(140, 'App\\Models\\User', 2, 'myAppToken', '4a886f2f7c0f875ad2fccb43ab2a958aaea9f4c3d4525bcbe4f4e37ce0b2d826', '[\"*\"]', NULL, '2023-01-26 07:02:52', '2023-01-26 07:02:52'),
(141, 'App\\Models\\User', 2, 'myAppToken', 'd7ef29770eda1bfb2468a2731a69c198594c89a23bda7b4948f0aa08fa63b5f9', '[\"*\"]', NULL, '2023-01-26 09:41:01', '2023-01-26 09:41:01'),
(142, 'App\\Models\\User', 2, 'myAppToken', 'd88c7f5bf356ed7dfc8db00c4320e861ecc5cb1040f887f739bc0de8205aec94', '[\"*\"]', NULL, '2023-01-27 02:03:16', '2023-01-27 02:03:16'),
(143, 'App\\Models\\User', 2, 'myAppToken', '0a935853fea0a4ef51718a4318bf76d2ffdc4c80969e9fe2c5f20344de378190', '[\"*\"]', NULL, '2023-01-27 02:19:35', '2023-01-27 02:19:35'),
(144, 'App\\Models\\User', 2, 'myAppToken', '2c9dd4fa4ca9f3c58157224be9a484c59545c2ba5040fdcce60bcbe41e426d7e', '[\"*\"]', NULL, '2023-01-27 09:37:56', '2023-01-27 09:37:56'),
(145, 'App\\Models\\User', 2, 'myAppToken', 'c9001e98b7d6b383016c84771ff074c5db3344f1b3311da335c19f1ddb8e06ce', '[\"*\"]', NULL, '2023-01-31 04:00:14', '2023-01-31 04:00:14'),
(146, 'App\\Models\\User', 2, 'myAppToken', '5bf67d988aba366243d38465b1003a9835c717bfeb2abcd3ab443d7fdb77499a', '[\"*\"]', NULL, '2023-01-31 04:14:47', '2023-01-31 04:14:47'),
(147, 'App\\Models\\User', 2, 'myAppToken', '385fa68d375b7b0af9d8aa4c192e5c8c485b5cc3928e420a29e78347350621c8', '[\"*\"]', NULL, '2023-01-31 04:48:23', '2023-01-31 04:48:23'),
(148, 'App\\Models\\User', 2, 'myAppToken', '6dd444f8986e03a016701837870a0e2dc0361b2695227f65c2aaa8f3000879b9', '[\"*\"]', NULL, '2023-01-31 06:35:54', '2023-01-31 06:35:54'),
(149, 'App\\Models\\User', 2, 'myAppToken', '97025698eae5b3827231032b79b4c6acf572de3f3f2f6af0000740eaa992a630', '[\"*\"]', NULL, '2023-02-03 12:52:37', '2023-02-03 12:52:37'),
(150, 'App\\Models\\User', 142, 'myAppToken', '183af125448c0c8f3abda4881fb6657aeb5071efd672f17763f0ca42d749374b', '[\"*\"]', NULL, '2023-03-08 03:53:20', '2023-03-08 03:53:20'),
(151, 'App\\Models\\User', 2, 'myAppToken', '60055928663877952ea255992768ca2dba3ab2be95aa91e673115e9bee0bc086', '[\"*\"]', NULL, '2023-03-13 04:34:13', '2023-03-13 04:34:13'),
(152, 'App\\Models\\User', 2, 'myAppToken', 'aaa1400816797928d49a3867fd5ea178e6c4fa8650608843d28371807f8724b1', '[\"*\"]', NULL, '2023-03-27 03:27:26', '2023-03-27 03:27:26'),
(153, 'App\\Models\\User', 2, 'myAppToken', '77532beb5b56422932a74f5b88407f0c5fddd890d8e1c01f876c1728c1dc1662', '[\"*\"]', NULL, '2023-03-27 06:57:16', '2023-03-27 06:57:16'),
(154, 'App\\Models\\User', 2, 'myAppToken', 'f55c7683f26471b0f948db76d0058648eedb1ea5b7852f947be6f714005d75d2', '[\"*\"]', NULL, '2023-03-27 06:58:13', '2023-03-27 06:58:13'),
(155, 'App\\Models\\User', 2, 'myAppToken', '7ee8a2047271a808e78c600375071ee47aaf6e3169806188569d3b89f5eb0d20', '[\"*\"]', NULL, '2023-04-04 03:40:20', '2023-04-04 03:40:20'),
(156, 'App\\Models\\User', 2, 'myAppToken', 'd92d1d557c67f34ae8df89d00e8241e8d49a475588752fd2c85a8a31d9cbb6ec', '[\"*\"]', NULL, '2023-04-04 03:40:50', '2023-04-04 03:40:50'),
(157, 'App\\Models\\User', 2, 'myAppToken', 'df6c1e3215e3d858ac79b098ba060c1fc1a3e838b9645f34386482151351de31', '[\"*\"]', NULL, '2023-04-04 04:09:15', '2023-04-04 04:09:15'),
(158, 'App\\Models\\User', 2, 'myAppToken', '8d9e94cee2345d8f3d608cc2ef79ecb0c9543ab05b7d0e906c6cf772bb0bb168', '[\"*\"]', NULL, '2023-04-05 01:51:21', '2023-04-05 01:51:21'),
(159, 'App\\Models\\User', 2, 'myAppToken', 'ed71e748b62eb21672fbc6a936e1815fed3767439ba8bee35c714b5b100ab321', '[\"*\"]', NULL, '2023-04-12 02:28:42', '2023-04-12 02:28:42'),
(160, 'App\\Models\\User', 2, 'myAppToken', 'eccaf5bf2f77cf9e7020cf6d2f755875dc00183f4c7fe87e6d9aaad3450b1d25', '[\"*\"]', NULL, '2023-04-12 02:30:17', '2023-04-12 02:30:17'),
(161, 'App\\Models\\User', 2, 'myAppToken', 'b02b313d5c42a5eae7ea1d54dcff5aa16269d1b0efc9a9bab5e0569f28b7ce25', '[\"*\"]', NULL, '2023-04-12 02:40:14', '2023-04-12 02:40:14'),
(162, 'App\\Models\\User', 2, 'myAppToken', '3aa976458f583860f6d3a228228fe3aedb0c5c3625ed1e0b91418a62e535d128', '[\"*\"]', NULL, '2023-04-12 02:58:55', '2023-04-12 02:58:55'),
(163, 'App\\Models\\User', 2, 'myAppToken', '1a3217778f1c93a26077b9b832132b4c1b9f55f68d9ac8cd1adda62cfe57bfed', '[\"*\"]', NULL, '2023-04-12 04:06:56', '2023-04-12 04:06:56'),
(164, 'App\\Models\\User', 2, 'myAppToken', '2c5de4394390a1420dafa5bc6db09155a482252df7fba14428a97e4a743f62d4', '[\"*\"]', NULL, '2023-04-13 01:22:35', '2023-04-13 01:22:35'),
(165, 'App\\Models\\User', 2, 'myAppToken', 'db1bdefe1af6aba019d53761828adc4e4495c6249b2c3c826fcd745de5653e30', '[\"*\"]', NULL, '2023-04-13 01:22:49', '2023-04-13 01:22:49'),
(166, 'App\\Models\\User', 2, 'myAppToken', '91f2a3d72cfb964a0a24e29e2da6feca4793e89afedc11f473500a4046a94153', '[\"*\"]', NULL, '2023-04-13 02:12:56', '2023-04-13 02:12:56'),
(167, 'App\\Models\\User', 2, 'myAppToken', '78239c79ce292ea6472b1554492fbcac564b53d3b673f976de10981f7f1f5e1b', '[\"*\"]', NULL, '2023-04-13 03:17:13', '2023-04-13 03:17:13'),
(168, 'App\\Models\\User', 2, 'myAppToken', '5ccb8ae942d010b4d868ed1ad45b2a2813359fa03741dcaf20401cd270ca00bd', '[\"*\"]', NULL, '2023-04-13 03:17:27', '2023-04-13 03:17:27'),
(169, 'App\\Models\\User', 2, 'myAppToken', 'f788476a52bd288b00d4c3bdb83d8b0fd4e8d07999f53dc6d58a9601cef04d2b', '[\"*\"]', NULL, '2023-04-13 06:59:33', '2023-04-13 06:59:33'),
(170, 'App\\Models\\User', 2, 'myAppToken', 'bc2a70408c0fbc7b6d912c20af0f29333f2d6c9fec82addf6bc78f1a8ddeddb7', '[\"*\"]', NULL, '2023-04-14 03:49:39', '2023-04-14 03:49:39'),
(171, 'App\\Models\\User', 2, 'myAppToken', '3fef6791eb5d567a9a889c05cea7788d5380eb20c3eeef6cccc091e8618cb849', '[\"*\"]', NULL, '2023-04-14 03:55:21', '2023-04-14 03:55:21'),
(172, 'App\\Models\\User', 2, 'myAppToken', 'e7e6c1ba286d3a8ce0f4cf59cd67dc50554a798dc213282606e337197f56c875', '[\"*\"]', NULL, '2023-04-14 06:29:27', '2023-04-14 06:29:27'),
(173, 'App\\Models\\User', 2, 'myAppToken', '482f03957d310685774bd9f5bf55193e8d24f84f314d55e781a161876c5718ba', '[\"*\"]', NULL, '2023-04-17 01:37:46', '2023-04-17 01:37:46'),
(174, 'App\\Models\\User', 2, 'myAppToken', 'fd2cbfa54e379d036871bb5c9bf7f216de4eb6a410ba6cc5a8bfc22b2ec650dd', '[\"*\"]', NULL, '2023-04-17 01:57:26', '2023-04-17 01:57:26'),
(175, 'App\\Models\\User', 2, 'myAppToken', '2e540c7c556f682a9a1bcdb662a2a4f9517d1ef2f7b74a4ef7652c7d38bb34c5', '[\"*\"]', NULL, '2023-04-18 02:32:41', '2023-04-18 02:32:41'),
(176, 'App\\Models\\User', 2, 'myAppToken', 'ef4f0d79130a7ce817382fce6a062afb21ed6a1229f2bfd86342e420732720d5', '[\"*\"]', NULL, '2023-04-18 02:33:11', '2023-04-18 02:33:11'),
(177, 'App\\Models\\User', 2, 'myAppToken', '4325fcbd93d5921155d5e76c344e6839b312d1d4ec3723b3fdf8d933a1779267', '[\"*\"]', NULL, '2023-04-18 02:33:27', '2023-04-18 02:33:27'),
(178, 'App\\Models\\User', 2, 'myAppToken', '697cb39c660449a4b34dce857418a77af405bfe320fb0108b1b97daa29b0ae6f', '[\"*\"]', NULL, '2023-04-18 02:44:20', '2023-04-18 02:44:20'),
(179, 'App\\Models\\User', 2, 'myAppToken', '604c70cc9b8565f510864d4bbeb3d62ea5feffb916aca734e568bb8b766e4bd6', '[\"*\"]', NULL, '2023-04-26 03:37:23', '2023-04-26 03:37:23'),
(180, 'App\\Models\\User', 939, 'myAppToken', '4d72759d49c6093a59ee487245f464a4223805567565391b365d83170c44071d', '[\"*\"]', NULL, '2023-05-02 04:53:34', '2023-05-02 04:53:34'),
(181, 'App\\Models\\User', 939, 'myAppToken', 'c5d4020dec4a7ced431ff27bb6cedc911a89abd1c12a158f4294e27b81c63555', '[\"*\"]', NULL, '2023-05-04 03:39:08', '2023-05-04 03:39:08'),
(182, 'App\\Models\\User', 939, 'myAppToken', '161985f4ddc5fe6982f84ea4e8b3e644f2a1e780d4d39feaee1ea9eda949a238', '[\"*\"]', NULL, '2023-05-04 04:26:44', '2023-05-04 04:26:44'),
(183, 'App\\Models\\User', 2, 'myAppToken', 'df48d4f1ba484cd21683c40cd1eb8338f24c8d4e030d8e6b968736b22dd1817b', '[\"*\"]', NULL, '2023-05-04 07:15:04', '2023-05-04 07:15:04'),
(184, 'App\\Models\\User', 951, 'myAppToken', '374a9afe350f2a0e3eac222a2773bb195c2a7c98b2f5c5a9f244bc86df538628', '[\"*\"]', NULL, '2023-05-04 07:59:05', '2023-05-04 07:59:05'),
(185, 'App\\Models\\User', 951, 'myAppToken', '7af749bd23a886177b710c09693282b12858e8a52ed03e9b08130b0153e5e808', '[\"*\"]', NULL, '2023-05-04 08:00:27', '2023-05-04 08:00:27'),
(186, 'App\\Models\\User', 951, 'myAppToken', '396c058d8b0b491a0b8370068a58d196ff29b2169422548d0ed6f914d4e9224e', '[\"*\"]', NULL, '2023-05-04 08:08:17', '2023-05-04 08:08:17'),
(187, 'App\\Models\\User', 951, 'myAppToken', '47e9ae858e056ab87d9f9bc31cd2256df633f58add1ab4c962d3eb040dfc388a', '[\"*\"]', NULL, '2023-05-04 08:10:58', '2023-05-04 08:10:58'),
(188, 'App\\Models\\User', 951, 'myAppToken', '14ace41e11d5d01d7f06f34fd8f173a2f2e329692ca615303a996b4806546fc3', '[\"*\"]', NULL, '2023-05-04 08:13:35', '2023-05-04 08:13:35'),
(189, 'App\\Models\\User', 951, 'myAppToken', '219301c7f15a96d5c75f838c53670dbb4f4b2d01a41904b23efe55fba5e4181c', '[\"*\"]', NULL, '2023-05-04 08:17:11', '2023-05-04 08:17:11'),
(190, 'App\\Models\\User', 951, 'myAppToken', '9d800e489c93f6b690057a5374a054292d7f09dbbb2dc467f095026dd2f04e21', '[\"*\"]', NULL, '2023-05-04 08:24:40', '2023-05-04 08:24:40'),
(191, 'App\\Models\\User', 2, 'myAppToken', '07f15cec02b0bca7b6745de535900470352d757094d011756ee98ec2b85c177d', '[\"*\"]', NULL, '2023-05-04 09:19:58', '2023-05-04 09:19:58'),
(192, 'App\\Models\\User', 2, 'myAppToken', '9c6519c9be01288d4116a71e97437ca25aaa858edf2031004a08bd7953b7589e', '[\"*\"]', NULL, '2023-05-04 09:32:15', '2023-05-04 09:32:15'),
(193, 'App\\Models\\User', 939, 'myAppToken', '1d903043b45f7170816906bd999bbfaf53bdc7117ed939fa23c99dda575644ae', '[\"*\"]', NULL, '2023-05-04 09:33:31', '2023-05-04 09:33:31'),
(194, 'App\\Models\\User', 2, 'myAppToken', '39c700abded6361fa046f239d54a3a1897b886db257b14317307911bec59eace', '[\"*\"]', NULL, '2023-05-04 09:34:01', '2023-05-04 09:34:01'),
(195, 'App\\Models\\User', 939, 'myAppToken', '98ba20bb8eaf800334ce603b752cd0660988a3773effa8d06d9a34ba6f189b94', '[\"*\"]', NULL, '2023-05-04 09:38:37', '2023-05-04 09:38:37'),
(196, 'App\\Models\\User', 939, 'myAppToken', 'bb3b305a83c77bc614cc7d0b787811cf851dd7cd0ff7c6a7ee113e0a9a0ad24a', '[\"*\"]', NULL, '2023-05-04 09:39:44', '2023-05-04 09:39:44'),
(197, 'App\\Models\\User', 953, 'myAppToken', '9728049192582831666a215a2aacb53db9448034b9f25a5d030e6a1d1086e678', '[\"*\"]', NULL, '2023-05-04 09:45:59', '2023-05-04 09:45:59'),
(198, 'App\\Models\\User', 953, 'myAppToken', '08a591d45af213bc57ef642c23863cd0bdb9f4d3e9e72c10fdba0e6c410de946', '[\"*\"]', NULL, '2023-05-04 09:47:46', '2023-05-04 09:47:46'),
(199, 'App\\Models\\User', 2, 'myAppToken', 'df3410c0bd5afeda9ee232d43349d4014112a137f6d351f64f7cc79512da1ea4', '[\"*\"]', NULL, '2023-05-04 09:50:32', '2023-05-04 09:50:32'),
(200, 'App\\Models\\User', 2, 'myAppToken', '20180d2d855103ecd52a444f00578152e253fab509654296d08d5a526f5719d5', '[\"*\"]', NULL, '2023-05-04 09:53:15', '2023-05-04 09:53:15'),
(201, 'App\\Models\\User', 2, 'myAppToken', 'ed5565c25caa2cd1bd8e3cd53858f6f53098c36a405a1e748f12bf0bee2678c1', '[\"*\"]', NULL, '2023-05-04 09:56:42', '2023-05-04 09:56:42'),
(202, 'App\\Models\\User', 953, 'myAppToken', '8ba72ec70d030ba61fca4a99a8101b10b58a8ec6f98a03f422e2337ba677d5c1', '[\"*\"]', NULL, '2023-05-04 09:57:29', '2023-05-04 09:57:29'),
(203, 'App\\Models\\User', 2, 'myAppToken', '4a5113ebcfe89ac91ee7801efd4c47cfb87988566278ec8050f7c6682c6b6c15', '[\"*\"]', NULL, '2023-05-04 09:57:57', '2023-05-04 09:57:57'),
(204, 'App\\Models\\User', 939, 'myAppToken', '3c4af88f597831160c04c6d78a600dacc56aab171e135f8c4c957b6ae9e87de8', '[\"*\"]', NULL, '2023-05-04 09:58:52', '2023-05-04 09:58:52'),
(205, 'App\\Models\\User', 2, 'myAppToken', 'e3bf0b602f46b7bb4cedc157d038d3a0fdc70a59a14b0c4830c8607c2e184fab', '[\"*\"]', NULL, '2023-05-04 09:59:04', '2023-05-04 09:59:04'),
(206, 'App\\Models\\User', 953, 'myAppToken', '7a8a3a713d0b8f35be16670ca6ba146b17d36dde8240f40cb1ab8635a37dc3c0', '[\"*\"]', NULL, '2023-05-04 09:59:13', '2023-05-04 09:59:13'),
(207, 'App\\Models\\User', 939, 'myAppToken', '4c1090de1353418a8218da890fe9c193ed5d7955bcb176bc2f11250a1c011e8f', '[\"*\"]', NULL, '2023-05-04 09:59:23', '2023-05-04 09:59:23'),
(208, 'App\\Models\\User', 2, 'myAppToken', '1b74880db3861036db733ccdf10788ab52721f4061db1c9c338e5bbde9ce654d', '[\"*\"]', NULL, '2023-05-04 09:59:36', '2023-05-04 09:59:36'),
(209, 'App\\Models\\User', 2, 'myAppToken', '890cd3ac6691d5a4d9219877e95420eee7320fd5f2fb124a6928c0114b8bfa89', '[\"*\"]', NULL, '2023-05-04 10:00:52', '2023-05-04 10:00:52'),
(210, 'App\\Models\\User', 953, 'myAppToken', '0d680fe1422cc1693f66f75395f9f88f96e1e81fac25b435ccad7ade39e6b5f5', '[\"*\"]', NULL, '2023-05-04 10:03:49', '2023-05-04 10:03:49'),
(211, 'App\\Models\\User', 2, 'myAppToken', '9fc7e803d601f3178af1df6b55464edf547db26e14667170b5a54b371d104afa', '[\"*\"]', NULL, '2023-05-04 10:04:01', '2023-05-04 10:04:01'),
(212, 'App\\Models\\User', 953, 'myAppToken', '74ce985acfddebc366d343eacc57ec8dd9b0d23319bc1382b9d160551eb0e716', '[\"*\"]', NULL, '2023-05-04 10:05:43', '2023-05-04 10:05:43'),
(213, 'App\\Models\\User', 953, 'myAppToken', '06cd351ea40da91b187a45113ff4e8687ff7f089767eeeca9737b4ee60ae0954', '[\"*\"]', NULL, '2023-05-04 10:06:12', '2023-05-04 10:06:12'),
(214, 'App\\Models\\User', 2, 'myAppToken', '20603f51f5ebd5b454ac5294b4f203ce5160b9ff0736f9726f8a7a5fd06c6523', '[\"*\"]', NULL, '2023-05-05 00:32:53', '2023-05-05 00:32:53'),
(215, 'App\\Models\\User', 951, 'myAppToken', '1a8c2d6d6e2daa781abac5a5bd13ad944a964fceb3b9b1d2067db718d4f7db80', '[\"*\"]', NULL, '2023-05-05 02:23:51', '2023-05-05 02:23:51'),
(216, 'App\\Models\\User', 951, 'myAppToken', '626eba014fd5c4ccccce87348b4b23006d926dadc304d19e19510b7f3f816cab', '[\"*\"]', NULL, '2023-05-05 02:37:20', '2023-05-05 02:37:20'),
(217, 'App\\Models\\User', 2, 'myAppToken', 'faa71c6c5d1a8bd90b4c54c49b56b30043c7d0f774160074adbcae0d9fe20ac4', '[\"*\"]', NULL, '2023-05-05 02:55:18', '2023-05-05 02:55:18'),
(218, 'App\\Models\\User', 953, 'myAppToken', '4b361975dd67c17f7e4882fbd2a6f705a79b91867082ba5e771708564037b5d2', '[\"*\"]', NULL, '2023-05-05 02:55:44', '2023-05-05 02:55:44'),
(219, 'App\\Models\\User', 2, 'myAppToken', '25ae4a3d7dd2b537ec2e2010b2f07ae3b569b6dd9e6c63c1b72d7af9298e40b8', '[\"*\"]', NULL, '2023-05-05 03:18:29', '2023-05-05 03:18:29'),
(220, 'App\\Models\\User', 953, 'myAppToken', 'a0f2b4511a2de43c441a326da2606568b69f1873ce24c4bd8924784dac8326aa', '[\"*\"]', NULL, '2023-05-05 03:26:41', '2023-05-05 03:26:41'),
(221, 'App\\Models\\User', 2, 'myAppToken', 'ce08b7372b3c34e21b6499c516c2979064829f2cdc1896c2fb65d00cb96feec2', '[\"*\"]', NULL, '2023-05-05 03:49:40', '2023-05-05 03:49:40'),
(222, 'App\\Models\\User', 953, 'myAppToken', '67e9b9feb7c56e079489525ade8b0c19fc4e8d1bf83035c4710d0d389ebed323', '[\"*\"]', NULL, '2023-05-05 03:57:48', '2023-05-05 03:57:48'),
(223, 'App\\Models\\User', 953, 'myAppToken', '45de02060c7252155e135dd1bf6c11d2e2f4eb819aff625fc92a0c3f0d2cb529', '[\"*\"]', NULL, '2023-05-05 04:34:35', '2023-05-05 04:34:35'),
(224, 'App\\Models\\User', 951, 'myAppToken', '7b1d2f5e078494ea51914aa7fa86dddbe251c466256156abab68030d8502a7a0', '[\"*\"]', NULL, '2023-05-05 06:31:27', '2023-05-05 06:31:27'),
(225, 'App\\Models\\User', 2, 'myAppToken', 'ad76ff13eecb83fbefc386fa7ccd17c503c046cbd461d43dc5ac340c3d8039c7', '[\"*\"]', NULL, '2023-05-05 08:12:13', '2023-05-05 08:12:13'),
(226, 'App\\Models\\User', 913, 'myAppToken', '2196d1375befe10177f48957996e9854f74d5714e7404cf4b627879b33ae8de2', '[\"*\"]', NULL, '2023-05-06 14:10:31', '2023-05-06 14:10:31'),
(227, 'App\\Models\\User', 953, 'myAppToken', 'a029448f7202c7344174a8fb9de110b88621d98eb5944f1890ac8ec878e92537', '[\"*\"]', NULL, '2023-05-06 14:14:22', '2023-05-06 14:14:22'),
(228, 'App\\Models\\User', 953, 'myAppToken', 'eb415f731db56c30bf5a8970627a3ef24f0c4b47cc0cae8cb621272829945aff', '[\"*\"]', NULL, '2023-05-08 03:13:38', '2023-05-08 03:13:38'),
(229, 'App\\Models\\User', 2, 'myAppToken', '663370744503f585efbf2621c91a3d1d8d481d2f07379d65f230b8a39ce1ab10', '[\"*\"]', NULL, '2023-05-08 03:17:43', '2023-05-08 03:17:43'),
(230, 'App\\Models\\User', 953, 'myAppToken', '40c2c7c7df37b85ab16971ead226e50da49f2de96e5d627a165fd2aa7839ba5a', '[\"*\"]', NULL, '2023-05-08 08:04:40', '2023-05-08 08:04:40'),
(231, 'App\\Models\\User', 951, 'myAppToken', '1e68dd39e6a1bc38aa41f52927e763aef2ed2cf192623c4e4a187f1ad142b491', '[\"*\"]', NULL, '2023-05-08 09:58:32', '2023-05-08 09:58:32'),
(232, 'App\\Models\\User', 953, 'myAppToken', 'ef0b0a0276c18b4045f5e9bb55e888bbba35af404adc2e2557c9f4509d7e7660', '[\"*\"]', NULL, '2023-05-08 14:26:31', '2023-05-08 14:26:31'),
(233, 'App\\Models\\User', 2, 'myAppToken', '62e9ed75438987944908e1eb9e2812bdfc23928bb46e508192b63417b32fd849', '[\"*\"]', NULL, '2023-05-09 07:45:42', '2023-05-09 07:45:42'),
(234, 'App\\Models\\User', 953, 'myAppToken', '32df30c08ab3203b37b9a62968fa791229358f823e4a61a31f2a27d6c47fbbec', '[\"*\"]', NULL, '2023-05-10 08:07:43', '2023-05-10 08:07:43'),
(235, 'App\\Models\\User', 951, 'myAppToken', '61beea7abadbedfbed0fb56ae6efa95aa532ce7da420ba57a1fe668bda1c3612', '[\"*\"]', NULL, '2023-05-11 03:34:40', '2023-05-11 03:34:40'),
(236, 'App\\Models\\User', 2, 'myAppToken', 'e5ee83f78e55f8196c2fb0f64bf6783c7320f92adcc8ee5c97aa4602e39e42b6', '[\"*\"]', NULL, '2023-05-11 03:37:25', '2023-05-11 03:37:25'),
(237, 'App\\Models\\User', 2, 'myAppToken', '4c68182c18eac449dc233e3c603bf2f6872099ec61c3eb4ef7f47103897db549', '[\"*\"]', NULL, '2023-05-11 03:58:34', '2023-05-11 03:58:34'),
(238, 'App\\Models\\User', 2, 'myAppToken', '2059ed10c3525197f8313f6a98dfb64bacb36e33374a04047e1201e2ececc710', '[\"*\"]', NULL, '2023-05-11 04:44:04', '2023-05-11 04:44:04'),
(239, 'App\\Models\\User', 2, 'myAppToken', 'b14a21089cf229c68c8e5d4af90eb759b549a93384a3e4ed0bbaadeada9f1f17', '[\"*\"]', NULL, '2023-05-11 09:44:48', '2023-05-11 09:44:48'),
(240, 'App\\Models\\User', 953, 'myAppToken', '81f149c492f37eeb27be8904b1be9fc4a738e0d45cb00d6782a4bcf3802e5872', '[\"*\"]', NULL, '2023-05-11 09:46:41', '2023-05-11 09:46:41'),
(241, 'App\\Models\\User', 2, 'myAppToken', '927d023673f6ac466c167343c8e457e74ccee2597bc17925b45d11087c7c3791', '[\"*\"]', NULL, '2023-05-11 10:15:32', '2023-05-11 10:15:32'),
(242, 'App\\Models\\User', 953, 'myAppToken', '3233c293305c1d070c3d7d141761873148ef347118e1b9cbd6fc03ffbf2b18eb', '[\"*\"]', NULL, '2023-05-11 10:16:28', '2023-05-11 10:16:28'),
(243, 'App\\Models\\User', 2, 'myAppToken', '6b34bd97d04de5cb9627d820e48022ba7d59f0bc4b3d2dcff44a5a39c9442cb0', '[\"*\"]', NULL, '2023-05-12 04:17:08', '2023-05-12 04:17:08'),
(244, 'App\\Models\\User', 953, 'myAppToken', 'f94e16eb982dfbc11604a66a5b8ee081c26dcfc84162789997a0c63e5735946e', '[\"*\"]', NULL, '2023-05-12 04:22:23', '2023-05-12 04:22:23'),
(245, 'App\\Models\\User', 2, 'myAppToken', '6ceae49008b5de2a11657e45a6d1c01604b7c7455d0152d2970e2479b4189cae', '[\"*\"]', NULL, '2023-05-12 04:22:44', '2023-05-12 04:22:44'),
(246, 'App\\Models\\User', 953, 'myAppToken', 'f4e7cca2bfd90d7f0ed00ae7f2ba12378e0011e2764e1cbb6e9197ea25140db5', '[\"*\"]', NULL, '2023-05-12 04:23:01', '2023-05-12 04:23:01'),
(247, 'App\\Models\\User', 2, 'myAppToken', '5dc9ec316dc890bb9291762a047584a91d7fc57cf2bd31e2c48784c267bc3a2f', '[\"*\"]', NULL, '2023-05-12 06:55:18', '2023-05-12 06:55:18'),
(248, 'App\\Models\\User', 953, 'myAppToken', '1ef38b8d7ddfdef243d1c83c0c517bfc735fae55aeee2f4bf01ee2c4830c545a', '[\"*\"]', NULL, '2023-05-12 09:48:22', '2023-05-12 09:48:22'),
(249, 'App\\Models\\User', 951, 'myAppToken', '1bfad117b4751dba9876df6e8bef8f7054ecdd099fe59858c8db5e98da67f827', '[\"*\"]', NULL, '2023-05-15 02:49:30', '2023-05-15 02:49:30'),
(250, 'App\\Models\\User', 2, 'myAppToken', '05c5f266375f0bbac5b7608f2d6975661eb0c11828fdc404d4de97a81cac0ea7', '[\"*\"]', NULL, '2023-05-16 03:06:19', '2023-05-16 03:06:19'),
(251, 'App\\Models\\User', 953, 'myAppToken', 'b9f9279faa24e4353a6aa2992d9f261191a4461198148076632a920ce0055c1b', '[\"*\"]', NULL, '2023-05-16 03:32:06', '2023-05-16 03:32:06'),
(252, 'App\\Models\\User', 953, 'myAppToken', '4585ba94f37e77072a64262caff84144d28bd779139a9a57985ee0e9d7ff6900', '[\"*\"]', NULL, '2023-05-16 04:07:56', '2023-05-16 04:07:56'),
(253, 'App\\Models\\User', 953, 'myAppToken', '74da525f789d4c1f4be98138528ba1da7a9c4558a91789c04af48c817157c89b', '[\"*\"]', NULL, '2023-05-16 04:17:56', '2023-05-16 04:17:56'),
(254, 'App\\Models\\User', 953, 'myAppToken', '387b2eb2439d239dceca7c667259f57afd0a94bfa19436e9fa841a63de039f95', '[\"*\"]', NULL, '2023-05-22 04:38:30', '2023-05-22 04:38:30'),
(255, 'App\\Models\\User', 953, 'myAppToken', '325f2ef6e17488f6a0929d25d2749fbcd141b6aca0f813d412168d4d2c4c191f', '[\"*\"]', NULL, '2023-05-23 02:54:50', '2023-05-23 02:54:50'),
(256, 'App\\Models\\User', 953, 'myAppToken', '1aec92c2193f2c571d118e02d5c486136f809464e1bd3618154c4f8c17933acd', '[\"*\"]', NULL, '2023-05-23 02:58:11', '2023-05-23 02:58:11'),
(257, 'App\\Models\\User', 963, 'myAppToken', 'e8f5887bac4af0ee6243b2484cec28f5f41a2201f39d611b6fa52c7c804a0cb8', '[\"*\"]', NULL, '2023-05-25 03:57:52', '2023-05-25 03:57:52'),
(258, 'App\\Models\\User', 963, 'myAppToken', 'f3f60439c86759f4c5462d600ec0844b0d9ad4f2d1fe16dd3aaa1275c859316f', '[\"*\"]', NULL, '2023-05-25 04:43:33', '2023-05-25 04:43:33'),
(259, 'App\\Models\\User', 2, 'myAppToken', '9af6063f7d771befa915275b187c5ac9e0038ef454c37673a934167f50ccb4e2', '[\"*\"]', NULL, '2023-06-13 05:28:55', '2023-06-13 05:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `rincian_pembayarans`
--

CREATE TABLE `rincian_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pembayaran` varchar(255) NOT NULL,
  `id_invoice` varchar(255) DEFAULT NULL,
  `tanggal_pembayaran` varchar(255) NOT NULL,
  `nominal_pembayaran` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rincian_pembayarans`
--

INSERT INTO `rincian_pembayarans` (`id`, `id_pembayaran`, `id_invoice`, `tanggal_pembayaran`, `nominal_pembayaran`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
(45, 'PEM-00001-V-2023', 'INV-00001-V-2023', '2023-05-02', 70000, 'xendit', '2023-05-02 04:59:26', '2023-05-02 04:59:26'),
(46, 'PEM-00001-V-2023', '1', '2023-05-02', 5000, 'Fee Transaksi', '2023-05-02 04:59:26', '2023-05-02 04:59:26'),
(47, 'PEM-00002-V-2023', 'INV-00017-V-2023', '2023-05-02', 70000, 'xendit', '2023-05-02 05:00:43', '2023-05-02 05:00:43'),
(48, 'PEM-00002-V-2023', '1', '2023-05-02', 5000, 'Fee Transaksi', '2023-05-02 05:00:43', '2023-05-02 05:00:43'),
(49, 'PEM-00003-V-2023', 'INV-00025-V-2023', '2023-05-02', 100000, 'xendit', '2023-05-02 05:29:15', '2023-05-02 05:29:15'),
(50, 'PEM-00003-V-2023', '1', '2023-05-02', 5000, 'Fee Transaksi', '2023-05-02 05:29:15', '2023-05-02 05:29:15'),
(51, 'PEM-00004-V-2023', 'INV-00003-V-2023', '2023-05-02', 200000, 'metode_pembayaran', '2023-05-02 06:35:58', '2023-05-02 06:35:58'),
(52, 'PEM-00004-V-2023', 'INV-00019-V-2023', '2023-05-02', 70000, 'metode_pembayaran', '2023-05-02 06:35:58', '2023-05-02 06:35:58'),
(53, 'PEM-00004-V-2023', '1', '2023-05-02', 3000, 'Fee Transaksi', '2023-05-02 06:35:58', '2023-05-02 06:35:58'),
(54, 'PEM-00005-V-2023', 'INV-00081-V-2023', '2023-05-02', 100000, 'xendit', '2023-05-02 07:17:23', '2023-05-02 07:17:23'),
(55, 'PEM-00005-V-2023', '1', '2023-05-02', 5000, 'Fee Transaksi', '2023-05-02 07:17:23', '2023-05-02 07:17:23'),
(56, 'PEM-00006-V-2023', 'INV-00081-V-2023', '2023-05-02', 100000, 'xendit', '2023-05-02 07:17:39', '2023-05-02 07:17:39'),
(57, 'PEM-00006-V-2023', '1', '2023-05-02', 5000, 'Fee Transaksi', '2023-05-02 07:17:39', '2023-05-02 07:17:39'),
(58, 'PEM-00007-V-2023', 'INV-00083-V-2023', '2023-05-02', 100000, 'metode_pembayaran', '2023-05-02 07:24:03', '2023-05-02 07:24:03'),
(59, 'PEM-00007-V-2023', 'INV-00091-V-2023', '2023-05-02', 100000000, 'metode_pembayaran', '2023-05-02 07:24:03', '2023-05-02 07:24:03'),
(60, 'PEM-00007-V-2023', '1', '2023-05-02', 3000, 'Fee Transaksi', '2023-05-02 07:24:03', '2023-05-02 07:24:03'),
(61, 'PEM-00008-V-2023', 'INV-00059-V-2023', '2023-05-02', 200000, 'metode_pembayaran', '2023-05-02 07:24:12', '2023-05-02 07:24:12'),
(62, 'PEM-00008-V-2023', 'INV-00099-V-2023', '2023-05-02', 70000000, 'metode_pembayaran', '2023-05-02 07:24:12', '2023-05-02 07:24:12'),
(63, 'PEM-00008-V-2023', '1', '2023-05-02', 3000, 'Fee Transaksi', '2023-05-02 07:24:12', '2023-05-02 07:24:12'),
(64, 'PEM-00009-V-2023', 'INV-00043-V-2023', '2023-05-02', 70000000, 'metode_pembayaran', '2023-05-02 07:24:39', '2023-05-02 07:24:39'),
(65, 'PEM-00009-V-2023', '1', '2023-05-02', 3000, 'Fee Transaksi', '2023-05-02 07:24:39', '2023-05-02 07:24:39'),
(66, 'PEM-00010-V-2023', 'INV-00057-V-2023', '2023-05-04', 200000, 'xendit', '2023-05-04 06:12:56', '2023-05-04 06:12:56'),
(67, 'PEM-00010-V-2023', '1', '2023-05-04', 5000, 'Fee Transaksi', '2023-05-04 06:12:56', '2023-05-04 06:12:56'),
(68, 'PEM-00011-V-2023', 'INV-00065-V-2023', '2023-05-04', 300000, 'xendit', '2023-05-04 16:35:01', '2023-05-04 16:35:01'),
(69, 'PEM-00011-V-2023', '1', '2023-05-04', 5000, 'Fee Transaksi', '2023-05-04 16:35:01', '2023-05-04 16:35:01'),
(70, 'PEM-00012-V-2023', 'INV-00097-V-2023', '2023-05-05', 70000000, 'xendit', '2023-05-05 03:04:19', '2023-05-05 03:04:19'),
(71, 'PEM-00012-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:04:19', '2023-05-05 03:04:19'),
(72, 'PEM-00013-V-2023', 'INV-00097-V-2023', '2023-05-05', 70000000, 'xendit', '2023-05-05 03:04:42', '2023-05-05 03:04:42'),
(73, 'PEM-00013-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:04:42', '2023-05-05 03:04:42'),
(74, 'PEM-00014-V-2023', 'INV-00089-V-2023', '2023-05-05', 100000000, 'xendit', '2023-05-05 03:04:54', '2023-05-05 03:04:54'),
(75, 'PEM-00014-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:04:54', '2023-05-05 03:04:54'),
(76, 'PEM-00015-V-2023', 'INV-00073-V-2023', '2023-05-05', 70000, 'xendit', '2023-05-05 03:05:04', '2023-05-05 03:05:04'),
(77, 'PEM-00015-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:05:04', '2023-05-05 03:05:04'),
(78, 'PEM-00016-V-2023', 'INV-00081-V-2023', '2023-05-05', 100000, 'xendit', '2023-05-05 03:05:15', '2023-05-05 03:05:15'),
(79, 'PEM-00016-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:05:15', '2023-05-05 03:05:15'),
(80, 'PEM-00017-V-2023', 'INV-00073-V-2023', '2023-05-05', 70000, 'xendit', '2023-05-05 03:19:50', '2023-05-05 03:19:50'),
(81, 'PEM-00017-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:19:50', '2023-05-05 03:19:50'),
(82, 'PEM-00018-V-2023', 'INV-00081-V-2023', '2023-05-05', 100000, 'xendit', '2023-05-05 03:21:28', '2023-05-05 03:21:28'),
(83, 'PEM-00018-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:21:28', '2023-05-05 03:21:28'),
(84, 'PEM-00019-V-2023', 'INV-00097-V-2023', '2023-05-05', 70000000, 'xendit', '2023-05-05 03:23:48', '2023-05-05 03:23:48'),
(85, 'PEM-00019-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:23:48', '2023-05-05 03:23:48'),
(86, 'PEM-00020-V-2023', 'INV-00073-V-2023', '2023-05-05', 70000, 'xendit', '2023-05-05 03:24:40', '2023-05-05 03:24:40'),
(87, 'PEM-00020-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:24:40', '2023-05-05 03:24:40'),
(88, 'PEM-00021-V-2023', 'INV-00073-V-2023', '2023-05-05', 70000, 'xendit', '2023-05-05 03:26:45', '2023-05-05 03:26:45'),
(89, 'PEM-00021-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 03:26:45', '2023-05-05 03:26:45'),
(90, 'PEM-00022-V-2023', 'INV-00113-V-2023', '2023-05-05', 200000, 'xendit', '2023-05-05 06:35:26', '2023-05-05 06:35:26'),
(91, 'PEM-00022-V-2023', 'INV-00123-V-2023', '2023-05-05', 90000, 'xendit', '2023-05-05 06:35:26', '2023-05-05 06:35:26'),
(92, 'PEM-00022-V-2023', '1', '2023-05-05', 5000, 'Fee Transaksi', '2023-05-05 06:35:26', '2023-05-05 06:35:26'),
(93, 'PEM-00023-V-2023', 'INV-00114-V-2023', '2023-05-09', 200000, 'metode_pembayaran', '2023-05-09 02:54:39', '2023-05-09 02:54:39'),
(94, 'PEM-00023-V-2023', '1', '2023-05-09', 3000, 'Fee Transaksi', '2023-05-09 02:54:39', '2023-05-09 02:54:39'),
(95, 'PEM-00024-V-2023', 'INV-00124-V-2023', '2023-05-09', 90000, 'metode_pembayaran', '2023-05-09 02:54:48', '2023-05-09 02:54:48'),
(96, 'PEM-00024-V-2023', '1', '2023-05-09', 3000, 'Fee Transaksi', '2023-05-09 02:54:48', '2023-05-09 02:54:48'),
(97, 'PEM-00025-V-2023', 'INV-00113-V-2023', '2023-05-10', 200000, 'metode_pembayaran', '2023-05-10 07:42:25', '2023-05-10 07:42:25'),
(98, 'PEM-00025-V-2023', '1', '2023-05-10', 3000, 'Fee Transaksi', '2023-05-10 07:42:25', '2023-05-10 07:42:25'),
(99, 'PEM-00026-V-2023', 'INV-00073-V-2023', '2023-05-11', 70000, 'xendit', '2023-05-11 09:26:08', '2023-05-11 09:26:08'),
(100, 'PEM-00026-V-2023', '1', '2023-05-11', 5000, 'Fee Transaksi', '2023-05-11 09:26:08', '2023-05-11 09:26:08'),
(101, 'PEM-00027-V-2023', 'INV-00123-V-2023', '2023-05-11', 90000, 'xendit', '2023-05-11 09:26:24', '2023-05-11 09:26:24'),
(102, 'PEM-00027-V-2023', '1', '2023-05-11', 5000, 'Fee Transaksi', '2023-05-11 09:26:24', '2023-05-11 09:26:24'),
(103, 'PEM-00028-V-2023', 'INV-00123-V-2023', '2023-05-11', 90000, 'xendit', '2023-05-11 09:29:08', '2023-05-11 09:29:08'),
(104, 'PEM-00028-V-2023', '1', '2023-05-11', 5000, 'Fee Transaksi', '2023-05-11 09:29:08', '2023-05-11 09:29:08'),
(105, 'PEM-00029-V-2023', 'INV-00134-V-2023', '2023-05-16', 200000, 'xendit', '2023-05-16 04:18:32', '2023-05-16 04:18:32'),
(106, 'PEM-00029-V-2023', '1', '2023-05-16', 5000, 'Fee Transaksi', '2023-05-16 04:18:32', '2023-05-16 04:18:32'),
(107, 'PEM-00030-V-2023', 'INV-00134-V-2023', '2023-05-16', 200000, 'xendit', '2023-05-16 04:21:02', '2023-05-16 04:21:02'),
(108, 'PEM-00030-V-2023', '1', '2023-05-16', 5000, 'Fee Transaksi', '2023-05-16 04:21:02', '2023-05-16 04:21:02'),
(109, 'PEM-00031-V-2023', 'INV-00134-V-2023', '2023-05-16', 200000, 'xendit', '2023-05-16 04:21:35', '2023-05-16 04:21:35'),
(110, 'PEM-00031-V-2023', '1', '2023-05-16', 5000, 'Fee Transaksi', '2023-05-16 04:21:35', '2023-05-16 04:21:35'),
(111, 'PEM-00032-V-2023', 'INV-00134-V-2023', '2023-05-16', 200000, 'xendit', '2023-05-16 04:27:56', '2023-05-16 04:27:56'),
(112, 'PEM-00032-V-2023', '1', '2023-05-16', 5000, 'Fee Transaksi', '2023-05-16 04:27:56', '2023-05-16 04:27:56'),
(113, 'PEM-00033-V-2023', 'INV-00134-V-2023', '2023-05-16', 200000, 'xendit', '2023-05-16 04:28:07', '2023-05-16 04:28:07'),
(114, 'PEM-00033-V-2023', '1', '2023-05-16', 5000, 'Fee Transaksi', '2023-05-16 04:28:07', '2023-05-16 04:28:07'),
(115, 'PEM-00034-V-2023', 'INV-00146-V-2023', '2023-05-16', 100000, 'xendit', '2023-05-16 04:37:15', '2023-05-16 04:37:15'),
(116, 'PEM-00034-V-2023', 'INV-00158-V-2023', '2023-05-16', 70000, 'xendit', '2023-05-16 04:37:15', '2023-05-16 04:37:15'),
(117, 'PEM-00034-V-2023', 'INV-00170-V-2023', '2023-05-16', 70000, 'xendit', '2023-05-16 04:37:15', '2023-05-16 04:37:15'),
(118, 'PEM-00034-V-2023', '1', '2023-05-16', 5000, 'Fee Transaksi', '2023-05-16 04:37:15', '2023-05-16 04:37:15'),
(119, 'PEM-00035-V-2023', 'INV-00073-V-2023', '2023-05-20', 70000, 'xendit', '2023-05-20 10:20:10', '2023-05-20 10:20:10'),
(120, 'PEM-00035-V-2023', '1', '2023-05-20', 5000, 'Fee Transaksi', '2023-05-20 10:20:10', '2023-05-20 10:20:10'),
(121, 'PEM-00036-V-2023', 'INV-00006-V-2023', '2023-05-24', 200000, 'metode_pembayaran', '2023-05-24 15:15:18', '2023-05-24 15:15:18'),
(122, 'PEM-00036-V-2023', 'INV-00014-V-2023', '2023-05-24', 300000, 'metode_pembayaran', '2023-05-24 15:15:18', '2023-05-24 15:15:18'),
(123, 'PEM-00036-V-2023', '1', '2023-05-24', 3000, 'Fee Transaksi', '2023-05-24 15:15:18', '2023-05-24 15:15:18'),
(124, 'PEM-00037-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 07:56:35', '2023-05-25 07:56:35'),
(125, 'PEM-00037-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 07:56:35', '2023-05-25 07:56:35'),
(126, 'PEM-00038-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:11:28', '2023-05-25 08:11:28'),
(127, 'PEM-00038-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:11:28', '2023-05-25 08:11:28'),
(128, 'PEM-00039-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:17:20', '2023-05-25 08:17:20'),
(129, 'PEM-00039-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:17:20', '2023-05-25 08:17:20'),
(130, 'PEM-00040-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:21:21', '2023-05-25 08:21:21'),
(131, 'PEM-00040-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:21:21', '2023-05-25 08:21:21'),
(132, 'PEM-00041-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:22:50', '2023-05-25 08:22:50'),
(133, 'PEM-00041-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:22:50', '2023-05-25 08:22:50'),
(134, 'PEM-00042-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:24:33', '2023-05-25 08:24:33'),
(135, 'PEM-00042-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:24:33', '2023-05-25 08:24:33'),
(136, 'PEM-00043-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:26:52', '2023-05-25 08:26:52'),
(137, 'PEM-00043-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:26:52', '2023-05-25 08:26:52'),
(138, 'PEM-00044-V-2023', 'INV-00179-V-2023', '2023-05-25', 100000000, 'xendit', '2023-05-25 08:27:53', '2023-05-25 08:27:53'),
(139, 'PEM-00044-V-2023', '1', '2023-05-25', 5000, 'Fee Transaksi', '2023-05-25 08:27:53', '2023-05-25 08:27:53'),
(140, 'PEM-00001-VI-2023', 'INV-00073-V-2023', '2023-06-13', 70000, 'xendit', '2023-06-13 05:33:11', '2023-06-13 05:33:11'),
(141, 'PEM-00001-VI-2023', '1', '2023-06-13', 5000, 'Fee Transaksi', '2023-06-13 05:33:11', '2023-06-13 05:33:11'),
(142, 'PEM-00002-VI-2023', 'INV-00081-V-2023', '2023-06-13', 100000, 'xendit', '2023-06-13 06:49:08', '2023-06-13 06:49:08'),
(143, 'PEM-00002-VI-2023', '1', '2023-06-13', 5000, 'Fee Transaksi', '2023-06-13 06:49:08', '2023-06-13 06:49:08'),
(144, 'PEM-00003-VI-2023', 'INV-00089-V-2023', '2023-06-14', 100000000, 'xendit', '2023-06-14 01:29:56', '2023-06-14 01:29:56'),
(145, 'PEM-00003-VI-2023', '1', '2023-06-14', 5000, 'Fee Transaksi', '2023-06-14 01:29:56', '2023-06-14 01:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ruangan 01', '2022-12-14 09:57:46', '2022-12-14 09:57:46'),
(2, 'Ruangan 02', '2022-12-14 09:57:53', '2022-12-14 09:57:53'),
(3, 'Ruangan 03', '2023-05-02 07:25:48', '2023-05-04 03:20:29'),
(4, 'Ruangan 04', '2023-05-04 03:21:23', '2023-05-04 03:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `seleksi`
--

CREATE TABLE `seleksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftaran_id` int(11) DEFAULT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `jenjang` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `hasil` varchar(11) DEFAULT NULL,
  `tanggalseleksi` int(11) DEFAULT NULL,
  `diterima` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seleksi`
--

INSERT INTO `seleksi` (`id`, `pendaftaran_id`, `jurusan`, `jenjang`, `email`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `agama`, `asal_sekolah`, `no_telp`, `tingkat`, `status`, `nilai`, `hasil`, `tanggalseleksi`, `diterima`, `created_at`, `updated_at`) VALUES
(20, 19, 'ipa', '3', 'anandadimmas1204@gmail.com', 'dimmas aku', 'sds', '2022-04-07', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, '10', 'hasil', 90, 'lulus', 15, 'diterima', '2023-05-08 14:51:21', '2023-05-25 03:36:06'),
(21, 21, 'ips', '3', 'corzejustu@gufum.com', 'corze', 'Jakarta', '2013-04-10', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, '10', 'hadir', 80, 'lulus', 15, 'diterima', '2023-05-09 02:39:59', '2023-05-25 03:36:06'),
(22, 24, 'ips', '3', 'domiri1070@larland.com', 'siswabaru1', 'jakarta', '2009-04-20', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, '10', 'hadir', 70, 'lulus', 15, 'diterima', '2023-05-09 09:02:46', '2023-05-25 03:36:06'),
(23, 27, 'ipa', '3', 'anandadimmas1204@gmail.com', 'dsdawsdwaasd', 'sdsdsdsd', '2023-05-16', 'L', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, '10', 'hadir', 60, 'lulus', 15, 'diterima', '2023-05-20 15:54:01', '2023-05-25 03:36:06'),
(24, 28, 'ipa', '3', 'siswa9822@gmail.com', 'siswa1', 'Jakarta', '2000-01-01', 'L', NULL, NULL, 'sekolah smp baru', NULL, '10', 'hadir', 50, 'lulus', 15, 'diterima', '2023-05-25 03:31:04', '2023-05-25 03:36:06'),
(25, 40, 'ips', '3', 'tahevecujohu@gotgel.org', 'qinan', 'Surabaya', '2009-02-20', 'P', NULL, NULL, 'SMP Islam AL-Azhar BSD', NULL, '10', 'hadir', 2, 'lulus', 16, 'diterima', '2023-06-13 17:08:51', '2023-06-13 17:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `created_at`, `updated_at`) VALUES
(1, '1', '2023-01-12 08:01:42', '2023-01-12 08:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `id_tahun_ajaran`, `semester`, `fee`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 3000, '2023-04-27 03:50:49', '2023-05-09 07:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(20) DEFAULT NULL,
  `tingkat` int(11) DEFAULT NULL,
  `id_orang_tua` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jenjang_pendidikan_id` int(11) DEFAULT NULL,
  `nomor_induk_siswa` varchar(255) DEFAULT NULL,
  `nisn` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `jurusan`, `tingkat`, `id_orang_tua`, `id_user`, `jenjang_pendidikan_id`, `nomor_induk_siswa`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `email`, `telp`, `alamat`, `kelas`, `avatar`, `agama`, `asal_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'ipa', 11, 33, 2, 3, '09890980989', '0989098', 'Maul Susanto', 'L', 'Brebes', '2023-01-01', 'maulana.malik53@gmail.com', '09890980989', 'alamat', NULL, 'avatar-yvIkY.jpg', NULL, 'Sman 1 Jepon', '2022-12-14 10:06:38', '2023-06-18 00:39:18'),
(24, NULL, 10, 35, 27, 3, '09890980989', '0989098', 'Syawal Achmad Junaidi', 'L', 'Brebes', '2023-01-01', 'syawal@gmail.com', '09890980989', 'Blora', 31, NULL, 'Islam', 'Sman 1 Jepon', '2022-12-14 10:06:38', '2023-02-10 03:04:28'),
(25, NULL, 7, 33, 28, 3, '09890980989', '0989098', 'Adi Hidayat', 'L', 'Pekalongan', '2023-01-01', 'adi@gmail.com', '09890980989', 'pekalongan', 31, 'avatar', 'Islam', 'Sman 1 Jepon', '2022-12-14 10:06:38', '2023-02-02 09:19:39'),
(26, NULL, NULL, 4, 29, 3, '098909809867', '0989094343', 'Tyan Sucipto', 'L', 'Boyolali', '2023-01-01', 'tian@gmail.com', '09890980989', 'Blora', NULL, 'avatar', 'Islam', 'Sman 1 Jepon', '2022-12-14 10:06:38', '2023-02-02 09:19:39'),
(27, NULL, 14, 27, 30, 3, '0989098094545', '0989098434', 'Deti Kusnidewi', 'P', 'Purbolinggo', '2023-01-01', 'deti@gmail.com', '09890984343', 'alamat', 17, 'avatar', 'Islam', 'SD 1 Jepon', '2022-12-14 10:06:38', '2023-02-02 09:19:39'),
(28, NULL, NULL, 28, 31, 3, '09890980989', '0989098', 'Romi Achmad Kurniawan', 'L', 'Depok', '2023-01-01', 'romi@gmail.com', '09890980343', 'Jakarta', NULL, 'avatar', 'Islam', 'SD Jepon', '2022-12-14 10:06:38', '2023-02-02 09:19:39'),
(29, NULL, NULL, 29, 32, 3, '098904545', '09890984343', 'Udin Penyok Kurniawan', 'L', 'Blora', '2023-01-01', 'udin@gmail.com', '08956644758', 'pekalongan', NULL, 'avatar', 'Islam', 'SD 1 Jepon', '2022-12-14 10:06:38', '2023-02-02 09:19:39'),
(30, NULL, NULL, 30, 33, 3, '098909809867', '0989094343', 'Ananda Dimmas Budiarto', 'L', 'Blora', '2023-01-01', 'anandadimmas@gmail.com', '08989089', 'Blora', NULL, 'avatar-4mYDp.jpg', 'Kristen', 'SD 1 Jepon', '2022-12-14 10:06:38', '2023-02-02 09:19:39'),
(48, NULL, NULL, 33, 118, 3, '4334', '44343', 'hhjh', 'P', 'dss', '2023-01-05', 'siswaass@ffes.com', '3232', '<p>dsdsd<br></p>', 2, 'avatar-XGebX.jpg', 'Kristen', 'dsdsdd', '2023-01-06 09:47:08', '2023-01-06 18:29:37'),
(50, NULL, NULL, NULL, 129, 3, '0965434567890', '878787', 'id 50', 'P', 'bllora', '2023-01-09', 'dsdsEmail@ddwds.com', '3232323', 'Alamat', 2, 'avatar-Ycdh8.jpg', 'Islam', 'id 50', '2023-01-09 06:14:36', '2023-01-09 07:35:54'),
(51, NULL, NULL, NULL, 130, 3, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.com', '09890980989', 'alamat', 2, NULL, NULL, NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(52, NULL, NULL, NULL, 131, 3, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.com', '09890980989', 'Blora', 2, NULL, NULL, NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(53, NULL, NULL, NULL, 132, 3, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.com', '09890980989', 'pekalongan', 2, NULL, NULL, NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(54, NULL, NULL, NULL, 133, 3, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.com', '09890980989', 'Blora', 2, NULL, NULL, NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(55, NULL, NULL, NULL, 134, 3, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.com', '09890984343', 'alamat', 2, NULL, NULL, NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(56, NULL, NULL, NULL, 135, 3, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.com', '09890980343', 'Jakarta', 2, NULL, NULL, NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(57, NULL, NULL, NULL, 136, 3, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.com', '08956644758', 'pekalongan', 2, NULL, NULL, NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(58, NULL, NULL, NULL, 137, 5, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.com', '454545334', 'Blora', 2, NULL, NULL, NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(59, NULL, NULL, NULL, 138, 3, '4334', NULL, 'dsfrtry', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.com', '3232', '<p>dsdsd<br></p>', 2, NULL, NULL, NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(62, NULL, NULL, NULL, 143, 3, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.comm', '09890980989', 'Blora', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(63, NULL, NULL, NULL, 144, 3, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'adi@gmail.comm', '09890980989', 'pekalongan', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(64, NULL, NULL, NULL, 145, 3, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.comm', '09890980989', 'Blora', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(66, NULL, NULL, NULL, 147, 3, '09890980989', NULL, 'Romi Achmad Kurniawan', 'L', NULL, NULL, 'romi@gmail.comm', '09890980343', 'Jakarta', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(67, NULL, NULL, NULL, 148, 3, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.comm', '08956644758', 'pekalongan', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(68, NULL, NULL, NULL, 149, 3, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.comm', '980909', 'Blora', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(69, NULL, NULL, NULL, 150, 3, '4323334', NULL, 'dsw', 'P', NULL, NULL, 'siswaass@ffes.comm', '3232', '<p>dsdsd<br></p>', 3, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(70, NULL, NULL, NULL, 151, 3, '32322121212', NULL, 'dsdsdsdsdsd', 'L', NULL, NULL, 'Emaild@Jkj.comm', 'Telepon', 'Alamat', 4, NULL, NULL, NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(71, NULL, NULL, NULL, 152, 3, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.comm', '09890980989', 'alamat', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(72, NULL, NULL, NULL, 153, 3, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.comm', '09890980989', 'Blora', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(73, NULL, NULL, NULL, 154, 3, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.comm', '09890980989', 'pekalongan', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(74, NULL, NULL, NULL, 155, 3, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.comm', '09890980989', 'Blora', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(75, NULL, NULL, NULL, 156, 3, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.comm', '09890984343', 'alamat', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(76, NULL, NULL, NULL, 157, 3, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.comm', '09890980343', 'Jakarta', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(77, NULL, NULL, NULL, 158, 3, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.comm', '08956644758', 'pekalongan', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(78, NULL, NULL, NULL, 159, 3, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.comm', '89443234', 'Blora', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(79, NULL, NULL, NULL, 160, 3, '4334', NULL, 'sdss', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.comm', '3232', '<p>dsdsd<br></p>', 4, NULL, NULL, NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(173, NULL, NULL, NULL, 260, 3, '43434343', NULL, 'dsdsdsdsdsd', 'L', NULL, NULL, 'Emaildwwdswdsw@dsd.com', '434343', 'Alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(174, NULL, NULL, NULL, 261, 3, '09890980989', NULL, 'Ari Hadydsdsdsa Achmad', 'L', NULL, NULL, 'ari@gmail.comffefefeds22222222', '09890980989', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(175, NULL, NULL, NULL, 262, 3, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.comfefe', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(176, NULL, NULL, NULL, 263, 3, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'adi@gmail.comfef', '09890980989', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(177, NULL, NULL, NULL, 264, 3, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.comfefe', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(178, NULL, NULL, NULL, 265, 3, '0989098094545', NULL, 'Deti Kusnidewi', 'P', NULL, NULL, 'deti@gmail.comfef', '09890984343', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(179, NULL, NULL, NULL, 266, 3, '09890980989', NULL, 'Romi Achmad Kurniawan', 'L', NULL, NULL, 'romi@gmail.dwwd', '09890980343', 'Jakarta', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(180, NULL, NULL, NULL, 267, 3, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.comdwdw', '08956644758', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(181, NULL, NULL, NULL, 268, 3, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.comdwd', '08989089', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(182, NULL, NULL, NULL, 269, 3, '4334', NULL, 'sdwdsd', 'P', NULL, NULL, 'siswaass@ffes.comdwwd', '3434433', '<p>dsdsd<br></p>', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(183, NULL, NULL, NULL, 270, 3, '4343434343434', NULL, 'Namawsdw Siswa', 'L', NULL, NULL, 'Emailddwd@Dds.co', 'Telepon', 'Alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(184, NULL, NULL, NULL, 271, 3, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.comdsds3232111', '09890980989', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(185, NULL, NULL, NULL, 272, 3, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.comdsds', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(186, NULL, NULL, NULL, 273, 3, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.comdsd', '09890980989', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(187, NULL, NULL, NULL, 274, 3, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.comdsd', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(188, NULL, NULL, NULL, 275, 3, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.ds', '09890984343', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(189, NULL, NULL, NULL, 276, 3, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.commmdsds', '09890980343', 'Jakarta', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(190, NULL, NULL, NULL, 277, 3, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.commmdsd', '08956644758', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(191, NULL, NULL, NULL, 278, 3, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.commmdsds', '454545334', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(192, NULL, NULL, NULL, 279, 3, '4334', NULL, 'dsfrtry', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.commmdsds', '3232', '<p>dsdsd<br></p>', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(193, NULL, NULL, NULL, 280, 3, '332323', NULL, 'sdsdsdsdsds', 'P', NULL, NULL, 'sdwasdw@dsdwd2dw.commmmdsdd', '89879789', 'jkjkhkhknm', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(194, NULL, NULL, NULL, 281, 3, '09890980989', NULL, 'Ari Hadya Achmad', 'L', NULL, NULL, 'ari@gmail.commddddsd2323', '09890980989', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(195, NULL, NULL, NULL, 282, 3, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.commddddsd', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(196, NULL, NULL, NULL, 283, 3, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'sdwasdw@dsdwd2dw.commmmdsddsaasa', '09890980989', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(197, NULL, NULL, NULL, 284, 3, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.commddddsds', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(198, NULL, NULL, NULL, 285, 3, '0989098094545', NULL, 'Deti Kusnidewi', 'P', NULL, NULL, 'deti@gmail.commddsds', '09890984343', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(199, NULL, NULL, NULL, 286, 3, '09890980989', NULL, 'Romi Achmad Kurniawan', 'L', NULL, NULL, 'romi@gmail.commddsd', '09890980343', 'Jakarta', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(200, NULL, NULL, NULL, 287, 3, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.commddsd', '08956644758', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(201, NULL, NULL, NULL, 288, 3, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.commdsds', '980909', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(202, NULL, NULL, NULL, 289, 3, '4323334', NULL, 'dsw', 'P', NULL, NULL, 'siswaass@ffes.commddsdd', '3232', '<p>dsdsd<br></p>', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(203, NULL, NULL, NULL, 290, 3, '43434', NULL, 'dsdsdsdsdsd', 'L', NULL, NULL, 'Emaild@Jkj.commddsd', 'Telepon', 'Alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(204, NULL, NULL, NULL, 291, 3, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.commdsdsssd23232', '09890980989', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(205, NULL, NULL, NULL, 292, 3, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.commddsd', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(206, NULL, NULL, NULL, 293, 3, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.commdfdf', '09890980989', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(207, NULL, NULL, NULL, 294, 3, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.commdfdf', '09890980989', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(208, NULL, NULL, NULL, 295, 3, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.commddf', '09890984343', 'alamat', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(209, NULL, NULL, NULL, 296, 3, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.commdfdf', '09890980343', 'Jakarta', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(210, NULL, NULL, NULL, 297, 3, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.commdfdf', '08956644758', 'pekalongan', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(211, NULL, NULL, NULL, 298, 3, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.commdfdf', '89443234', 'Blora', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(212, NULL, NULL, NULL, 299, 3, '4334', NULL, 'sdss', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.commdfdf', '3232', '<p>dsdsd<br></p>', 6, NULL, NULL, NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(213, NULL, NULL, NULL, 302, 2, '09890980989', NULL, 'Ari Hadya Achmad', 'L', NULL, NULL, 'ari@gmail.coma', '09890980989', 'alamat', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(214, NULL, NULL, NULL, 303, 2, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.coma', '09890980989', 'Blora', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(215, NULL, NULL, NULL, 304, 2, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'adi@gmail.coma', '09890980989', 'pekalongan', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(216, NULL, NULL, NULL, 305, 2, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.coma', '09890980989', 'Blora', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(217, NULL, NULL, NULL, 306, 2, '0989098094545', NULL, 'Deti Kusnidewi', 'P', NULL, NULL, 'deti@gmail.coma', '09890984343', 'alamat', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(218, NULL, NULL, NULL, 307, 2, '09890980989', NULL, 'Romi Achmad Kurniawan (218)', 'L', NULL, NULL, 'romi@gmail.coma', '09890980343', 'Jakarta', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(219, NULL, NULL, NULL, 308, 2, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.coma', '08956644758', 'pekalongan', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(220, NULL, NULL, NULL, 309, 2, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.coma', '08989089', 'Blora', 10, NULL, NULL, NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(715, NULL, NULL, NULL, 805, 1, '0965434567890', NULL, 'id 50', 'P', NULL, NULL, 'dsdsEmail@ddwds.comaaaxs', '3232323', 'Alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:41', '2023-01-09 10:04:41'),
(716, NULL, NULL, NULL, 806, 1, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.comaaaaxs', '09890980989', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:41', '2023-01-09 10:04:41'),
(718, NULL, NULL, NULL, 808, 1, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.comaaaxs', '09890980989', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(719, NULL, NULL, NULL, 809, 1, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.comaaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(720, NULL, NULL, NULL, 810, 1, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.comaaaxs', '09890984343', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(721, NULL, NULL, NULL, 811, 1, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.comaaaxs', '09890980343', 'Jakarta', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(722, NULL, NULL, NULL, 812, 1, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.comaaaxs', '08956644758', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(723, NULL, NULL, NULL, 813, 1, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.comaaaaxs', '454545334', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(724, NULL, NULL, NULL, 814, 1, '4334', NULL, 'dsfrtry', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.comaaad', '3232', '<p>dsdsd<br></p>', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(725, NULL, NULL, NULL, 815, 1, '434343344', NULL, 'sdsdsdsdsds', 'P', NULL, NULL, 'sdwasdw@dsdwd2dw.comaadsdsdss', '89879789', 'jkjkhkhknm', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(726, NULL, NULL, NULL, 816, 1, '09890980989', NULL, 'Ari Hadya Achmad', 'L', NULL, NULL, 'ari@gmail.commaaxs', '09890980989', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(727, NULL, NULL, NULL, 817, 1, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.commaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(728, NULL, NULL, NULL, 818, 1, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'adi@gmail.commaaxs', '09890980989', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(729, NULL, NULL, NULL, 819, 1, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.commaas', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(730, NULL, NULL, NULL, 820, 1, '0989098094545', NULL, 'Deti Kusnidewi', 'P', NULL, NULL, 'deti@gmail.commaaxs', '09890984343', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(731, NULL, NULL, NULL, 821, 1, '09890980989', NULL, 'Romi Achmad Kurniawan', 'L', NULL, NULL, 'romi@gmail.commaas', '09890980343', 'Jakarta', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(732, NULL, NULL, NULL, 822, 1, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.commaaxs', '08956644758', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(733, NULL, NULL, NULL, 823, 1, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.commaaaxs', '980909', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(734, NULL, NULL, NULL, 824, 1, '4323334', NULL, 'dsw', 'P', NULL, NULL, 'siswaass@ffes.commaaxs', '3232', '<p>dsdsd<br></p>', 12, NULL, NULL, NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(735, NULL, NULL, NULL, 825, 1, '32322121212', NULL, 'dsdsdsdsdsd', 'L', NULL, NULL, 'Emaild@Jkj.commaaxs', 'Telepon', 'Alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(736, NULL, NULL, NULL, 826, 1, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.commaaxs', '09890980989', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(737, NULL, NULL, NULL, 827, 1, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.commaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(738, NULL, NULL, NULL, 828, 1, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.commaaxs', '09890980989', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(739, NULL, NULL, NULL, 829, 1, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.commaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(740, NULL, NULL, NULL, 830, 1, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.commaaxs', '09890984343', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(741, NULL, NULL, NULL, 831, 1, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.commaaxs', '09890980343', 'Jakarta', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(742, NULL, NULL, NULL, 832, 1, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.commaaxs', '08956644758', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(743, NULL, NULL, NULL, 833, 1, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.commaaxs', '89443234', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(744, NULL, NULL, NULL, 834, 1, '4334', NULL, 'sdss', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.commaaxs', '3232', '<p>dsdsd<br></p>', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(745, NULL, NULL, NULL, 835, 1, '43434343', NULL, 'dsdsdsdsdsd', 'L', NULL, NULL, 'Emaildwwdswdsw@dsd.comaaxs', '434343', 'Alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(746, NULL, NULL, NULL, 836, 1, '09890980989', NULL, 'Ari Hadydsdsdsa Achmad', 'L', NULL, NULL, 'ari@gmail.comffefefeds22222222aaxs', '09890980989', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(747, NULL, NULL, NULL, 837, 1, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.comfefeaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(748, NULL, NULL, NULL, 838, 1, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'adi@gmail.comfefaaxs', '09890980989', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(749, NULL, NULL, NULL, 839, 1, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.comfefeaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(750, NULL, NULL, NULL, 840, 1, '0989098094545', NULL, 'Deti Kusnidewi', 'P', NULL, NULL, 'deti@gmail.comfefaaxs', '09890984343', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(751, NULL, NULL, NULL, 841, 1, '09890980989', NULL, 'Romi Achmad Kurniawan', 'L', NULL, NULL, 'romi@gmail.dwwdaaxs', '09890980343', 'Jakarta', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(752, NULL, NULL, NULL, 842, 1, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.comdwdwaaxs', '08956644758', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(753, NULL, NULL, NULL, 843, 1, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.comdwdaaxs', '08989089', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(754, NULL, NULL, NULL, 844, 1, '4334', NULL, 'sdwdsd', 'P', NULL, NULL, 'siswaass@ffes.comdwwdaaxs', '3434433', '<p>dsdsd<br></p>', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(755, NULL, NULL, NULL, 845, 1, '4343434343434', NULL, 'Namawsdw Siswa', 'L', NULL, NULL, 'Emailddwd@Dds.coaaaxs', 'Telepon', 'Alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(756, NULL, NULL, NULL, 846, 1, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.comdsds3232111aaxs', '09890980989', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(757, NULL, NULL, NULL, 847, 1, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.comdsdsaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(758, NULL, NULL, NULL, 848, 1, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.comdsdaaxs', '09890980989', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(759, NULL, NULL, NULL, 849, 1, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.comdsdaaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(760, NULL, NULL, NULL, 850, 1, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.dsaaxsxs', '09890984343', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(761, NULL, NULL, NULL, 851, 1, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.commmdsdsaaxs', '09890980343', 'Jakarta', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(762, NULL, NULL, NULL, 852, 1, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.commmdsdaas', '08956644758', 'pekalongan', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(763, NULL, NULL, NULL, 853, 1, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.commamdsdsaxs', '454545334', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(764, NULL, NULL, NULL, 854, 1, '4334', NULL, 'dsfrtry', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.commmdsadsaxs', '3232', '<p>dsdsd<br></p>', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(765, NULL, NULL, NULL, 855, 1, '332323', NULL, 'sdsdsdsdsds', 'P', NULL, NULL, 'sdwasdw@dsdwd2dw.commmmdsddaaxsx', '89879789', 'jkjkhkhknm', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(766, NULL, NULL, NULL, 856, 1, '09890980989', NULL, 'Ari Hadya Achmad', 'L', NULL, NULL, 'ari@gmail.commddddsd2323aaxs', '09890980989', 'alamat', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(767, NULL, NULL, NULL, 857, 1, '09890980989', NULL, 'Syawal Achmad Junaidi', 'L', NULL, NULL, 'syawal@gmail.commddddsdaaxs', '09890980989', 'Blora', 12, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(768, NULL, 10, NULL, 858, 1, '09890980989', NULL, 'Adi Hidayat', 'L', NULL, NULL, 'sdwasdw@dsdwd2dw.commmamdsddsaasaaxs', '09890980989', 'pekalongan', 16, NULL, NULL, NULL, '2023-01-09 10:04:44', '2023-02-02 08:30:04'),
(769, NULL, 10, NULL, 859, 1, '098909809867', NULL, 'Tyan Sucipto', 'L', NULL, NULL, 'tian@gmail.commddddsdsaaxs', '09890980989', 'Blora', 16, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-02-02 08:30:04'),
(770, NULL, 10, NULL, 860, 1, '0989098094545', NULL, 'Deti Kusnidewi', 'P', NULL, NULL, 'deti@gmail.commddsdsaaxs', '09890984343', 'alamat', 16, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-02-02 08:30:04'),
(771, NULL, 11, 58, 861, 1, '09890980989', NULL, 'Romi Achmad Kurniawan (771)', 'L', NULL, NULL, 'romi@gmail.commddsdaas', '09890980343', 'Jakarta', NULL, 'avatar-WzHPh.jpg', 'Kristen', NULL, '2023-01-09 10:04:45', '2023-02-03 09:57:35'),
(772, NULL, NULL, NULL, 862, 1, '098904545', NULL, 'Udin Penyok Kurniawan', 'L', NULL, NULL, 'udin@gmail.commddsdaaxs', '08956644758', 'pekalongan', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(773, NULL, NULL, NULL, 863, 1, '098909809867', NULL, 'Ananda Dimmas Budiarto', 'L', NULL, NULL, 'anandadimmas@gmail.commdsdsaaxs', '980909', 'Blora', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(774, NULL, NULL, NULL, 864, 1, '4323334', NULL, 'dsw', 'P', NULL, NULL, 'siswaass@ffes.commddsddaaxs', '3232', '<p>dsdsd<br></p>', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(775, NULL, NULL, NULL, 865, 1, '43434', NULL, 'dsdsdsdsdsd', 'L', NULL, NULL, 'Emaild@Jkj.commddsdaaxs', 'Telepon', 'Alamat', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(776, NULL, NULL, NULL, 866, 1, '09890980989', NULL, 'Ari Haswsdya Achmad', 'L', NULL, NULL, 'addsdri@gmail.commdsdsssd23232aaxs', '09890980989', 'alamat', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(777, NULL, NULL, NULL, 867, 1, '09890980989', NULL, 'Syadetwal Achmad Junaidi', 'L', NULL, NULL, 'sydsdsawal@gmail.commddsdaaaxs', '09890980989', 'Blora', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(778, NULL, NULL, NULL, 868, 1, '09890980989', NULL, 'Adfdfei Hidayat', 'L', NULL, NULL, 'addsdsdi@gmail.commdfdfaaxs', '09890980989', 'pekalongan', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(779, NULL, NULL, NULL, 869, 1, '098909809867', NULL, 'Tyffdan Sucipto', 'L', NULL, NULL, 'tiadsdsn@gmail.commdfdfaaxs', '09890980989', 'Blora', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(780, NULL, NULL, NULL, 870, 1, '0989098094545', NULL, 'Deti fdfdKusnidewi', 'P', NULL, NULL, 'ddsdseti@gmail.commddfaaxs', '09890984343', 'alamat', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(781, NULL, NULL, NULL, 871, 1, '09890980989', NULL, 'Romifdfd Achmad Kurniawan', 'L', NULL, NULL, 'rodsdsmi@gmail.commdfdfaaxs', '09890980343', 'Jakarta', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(782, NULL, NULL, NULL, 872, 1, '098904545', NULL, 'Udin Pfdfdenyok Kurniawan', 'L', NULL, NULL, 'uddsdssin@gmail.commdfdfaaxs', '08956644758', 'pekalongan', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(783, NULL, NULL, NULL, 873, 1, '098909809867', NULL, 'Anandfdfa Dimmas Budiarto', 'L', NULL, NULL, 'anadsdsdsndadimmas@gmail.commdafdfaaxs', '89443234', 'Blora', 13, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(784, NULL, 11, NULL, 874, 1, '4334', NULL, 'sdss', 'P', NULL, NULL, 'siswdsdsdsdsdsaass@ffes.commdfdfaaxs', '3232', '<p>dsdsd<br></p>', NULL, NULL, NULL, NULL, '2023-01-09 10:04:45', '2023-02-03 09:57:35'),
(785, NULL, 11, 37, 879, NULL, NULL, NULL, 'uus', 'P', 'cabak', '2023-01-11', 'uus@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 08:04:45', '2023-02-03 09:57:35'),
(786, NULL, 11, 38, 880, NULL, '343434', '434343434', 'hani', 'L', 'bloara', '2023-01-03', 'hani@gmail.com', NULL, 'sdsd', NULL, 'avatar-urNQk.jpg', 'Kristen', NULL, '2023-01-11 08:26:29', '2023-02-03 09:57:35'),
(788, NULL, 11, 40, 882, 3, NULL, NULL, 'dimmas ketipung', 'L', 'blora', '2023-01-11', 'dimmasketipung@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SMA Islam AL-Azhar BSD', '2023-01-12 03:37:08', '2023-02-03 09:57:35'),
(789, NULL, 11, 41, 884, 3, NULL, NULL, 'dimmas ketipung', 'L', 'blora', '2023-01-11', 'dimmasketipung@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SMA Islam AL-Azhar BSD', '2023-01-12 03:37:44', '2023-02-03 09:57:35'),
(790, NULL, 11, 42, 885, 3, NULL, NULL, 'dimmas', 'L', 'blora', '2023-01-09', 'anandadimmas1204@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-01-16 07:53:39', '2023-02-03 09:57:35'),
(791, NULL, 11, 46, 886, 1, NULL, NULL, 'muehehe', 'L', 'ananda', '2023-01-09', 'anandadimmasb@gmail.com', NULL, NULL, NULL, NULL, NULL, 'TK Islam AL-Azhar BSD', '2023-01-16 08:00:55', '2023-02-03 09:57:35'),
(792, NULL, 10, 56, 887, 3, NULL, NULL, 'adi hidayat', 'L', 'bogor', '2022-12-25', 'Dians92.work@gmail.com', NULL, NULL, 15, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-01-16 08:14:34', '2023-02-02 09:32:53'),
(793, NULL, 10, 57, 888, 3, NULL, NULL, 'peserta', 'L', 'peserta', '2023-01-30', 'peserta@gmail.com', NULL, NULL, 15, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-02-02 08:24:22', '2023-02-02 09:32:53'),
(794, NULL, 7, 59, 890, 2, NULL, NULL, 'achmad', 'L', 'achmad', '2023-02-05', 'achmad@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SD Islam AL-Azhar BSD', '2023-02-05 13:55:29', '2023-02-05 13:55:29'),
(795, NULL, 11, 60, 899, 3, NULL, NULL, 'testingppdb', 'L', 'testing tempatlahir', '2023-02-23', 'testingppdb@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-02-23 02:46:50', '2023-02-23 08:20:40'),
(796, NULL, 10, 61, 900, 3, NULL, NULL, 'untung', 'L', 'untung', '2023-02-23', 'untung@gail.com', NULL, NULL, 26, NULL, NULL, 'TK Islam AL-Azhar BSD', '2023-02-23 03:40:06', '2023-02-23 03:40:06'),
(797, NULL, 10, 62, 901, 3, NULL, NULL, 'dayat', 'L', 'dayat', '2023-02-24', 'dayat@gmail.com', NULL, NULL, 27, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-02-23 07:14:21', '2023-02-23 08:31:07'),
(798, NULL, 10, 63, 902, 3, NULL, NULL, 'tes', 'L', 'tes', '2023-02-23', 'testes@gmail.com', NULL, NULL, 27, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-02-23 07:17:07', '2023-02-23 08:31:07'),
(799, NULL, 11, 64, 903, 3, NULL, NULL, 'Hendra', 'L', 'Jakarta', '2013-02-23', 'adharinurul80@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-02-23 09:33:04', '2023-02-23 10:01:24'),
(802, 'ips', 10, 67, 906, 3, NULL, NULL, 'eqy', 'L', 'Jakarta', '1999-05-20', 'caniasak@gmail.com', NULL, NULL, 4, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-03-16 07:05:21', '2023-04-13 06:16:14'),
(803, 'ipa', 12, 68, 907, 3, NULL, NULL, 'qqqq', 'L', 'qqq', '2022-12-20', 'qwdadadsd@gmail.com', NULL, NULL, NULL, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-03-16 07:08:28', '2023-06-18 00:39:18'),
(806, 'ips', 10, 75, 925, 3, '9111121212', '0212121212', 'Alif', 'L', 'Balikpapan', '2000-06-16', 'aliffarie1@gmail.com', '089876543210', 'Jl.bekasi panas bat', 4, NULL, 'islam', 'SMP Islam AL-Azhar BSD', '2023-04-17 08:23:24', '2023-04-17 08:26:54'),
(808, 'ips', 10, 79, 935, 3, '123456', '1234567', 'Alif', 'L', 'Balikpapan', '2000-06-16', 'aliff11arie1@gmail.com', NULL, 'bekasi', 47, NULL, 'kristen', 'SMP Islam AL-Azhar BSD', '2023-04-27 04:19:18', '2023-04-28 09:43:34'),
(809, 'ips', 10, 80, 937, 3, '123456', '1234567', 'Azalea', 'P', 'Bandung', '2009-04-13', 'fabata9440@larland.com', '08122570233', 'Jl.Cilengkrang No.70d', 47, NULL, 'islam', 'SMP Islam AL-Azhar BSD', '2023-04-28 06:27:02', '2023-04-28 09:43:34'),
(810, 'ips', 10, 81, 939, 3, '832783723', '328748237493', 'maulana', 'P', 'bogor', '2009-04-02', 'galmogayde@gufum.com', '0851560109', 'Jl.Bogor barat no.70', 47, 'avatar-9bHTG.jpeg', NULL, 'SMP Islam AL-Azhar BSD', '2023-04-28 06:31:11', '2023-05-04 10:05:00'),
(811, 'ips', 10, 82, 942, 3, '123', '1234', 'qwerty', 'L', 'Jakarta', '2009-04-26', 'pelmalikku@gufum.com', NULL, 'Masukan Alamat', 47, NULL, NULL, 'SMP Islam AL-Azhar BSD', '2023-04-28 09:14:47', '2023-04-28 09:43:34'),
(812, 'ipa', 11, 83, 944, 3, NULL, '5234953290', 'Michael', 'L', 'jakarta', '2009-04-23', 'hurdizaltu@gufum.com', '023489348', 'janeee', NULL, NULL, 'islam', 'SMA 2 Tanggerang', '2023-04-28 09:41:00', '2023-06-18 00:39:18'),
(813, 'ipa', 11, 84, 946, 3, NULL, '89', 'mumu', 'L', 'jakarta', '2009-04-13', 'gutrofegnu@gufum.com', '08221', 'Jl.Kren', NULL, NULL, 'islam', 'SMA 2 Tanggerang', '2023-04-28 09:41:06', '2023-06-18 00:39:18'),
(814, 'ipa', 11, 85, 948, 3, NULL, '432', 'Muyo', 'L', 'Jakarta', '2009-04-28', 'kofyehutru@gufum.com', '08452367', 'Jl.Kuncoro', NULL, NULL, 'islam', 'SMA Yadika 1', '2023-04-28 10:06:31', '2023-06-18 00:39:19'),
(815, 'ips', 10, 86, 951, 3, '3171041504', '089659055229', 'fezraa', 'L', 'Balikpapan', '2009-04-12', 'yultuburdi@gufum.com', '085156010900', 'aaa', 47, 'avatar-Jmg5k.jpg', NULL, 'SMP Islam AL-Azhar BSD', '2023-05-04 02:18:10', '2023-05-05 04:10:32'),
(816, 'ips', 10, 87, 953, 3, '123452828282828', '234567', 'asdf', 'L', 'Balikpapan', '2009-04-27', 'sirdokagne@gufum.com', '082156789', 'sfsdkf', 47, 'avatar-3xe71.jpeg', NULL, 'SMP Islam AL-Azhar BSD', '2023-05-04 09:44:49', '2023-05-05 07:11:02'),
(817, 'ips', 10, 88, 955, 3, '324701', '328740', 'corze', 'L', 'Jakarta', '2013-04-10', 'corzejustu@gufum.com', '08238121238', 'Jl.Alamat', 47, NULL, 'islam', 'SMP Islam AL-Azhar BSD', '2023-05-09 03:28:26', '2023-05-09 03:29:24'),
(818, 'ips', 10, 89, 957, 3, '089890', '9080989089080', 'siswabaru1', 'L', 'jakarta', '2009-04-20', 'domiri1070@larland.com', '99898098', 'Masukan Alamat', 47, NULL, 'islam', 'SMP Islam AL-Azhar BSD', '2023-05-09 09:05:05', '2023-05-09 09:08:16'),
(819, 'ipa', 12, 90, 959, 3, '1234689077', '123459876', 'mauldimmasbersatusatu', 'L', 'bawah jembatan', '2009-09-05', 'vordukerko@gufum.com', '08320239', 'Blora Jawa tenga', NULL, NULL, NULL, 'SMA Yadika 1', '2023-05-09 09:13:47', '2023-06-18 00:39:19'),
(820, 'ipa', 11, 92, 963, 3, '9999', '88888', 'siswa1', 'L', 'Jakarta', '2000-01-01', 'siswa9822@gmail.com', '77777', 'di jakarta', NULL, NULL, 'islam', 'sekolah smp baru', '2023-05-25 03:46:43', '2023-06-18 00:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ujian_id` int(11) DEFAULT NULL,
  `soal` text NOT NULL,
  `jawaban_a` varchar(191) NOT NULL,
  `jawaban_b` varchar(191) NOT NULL,
  `jawaban_c` varchar(191) NOT NULL,
  `jawaban_d` varchar(191) NOT NULL,
  `kunci_jawaban` varchar(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `ujian_id`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `kunci_jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>a</p>', '<p>a</p>', '<p>v</p>', '<p>da</p>', '<p>dad</p>', 'a', '2023-04-28 04:27:20', '2023-04-28 04:27:20'),
(2, 2, 'tentukan hasil 2+2 x=', '<p>4</p>', '<p>6&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>8</p>', '<p>1</p>', 'a', '2023-04-28 06:09:08', '2023-04-28 06:09:38'),
(3, 3, '<p>bisa ga</p>', '<p>a</p>', '<p>b</p>', '<p>c</p>', '<p>d</p>', 'a', '2023-04-28 08:42:28', '2023-04-28 08:42:28'),
(4, 4, '<p>kandungan zat pada spesifik dinding sel pada bakteri disebut</p>', '<p>ajd&nbsp; &nbsp;</p>', '<p>asdsadasdad</p>', '<p>wrwr</p>', '<p>pektin</p>', 'd', '2023-04-28 09:05:31', '2023-04-28 09:05:31'),
(5, 4, '<p>reproduksi seksual pada bakteri melalui ?</p>', '<p>perpecahan biner</p>', '<p>membagi</p>', '<p>fragmentasi</p>', '<p>duplikasi</p>', 'a', '2023-04-28 09:05:31', '2023-04-28 09:05:31'),
(6, 5, '<p>aadasd&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>wadawd</p>', '<p>asdasd&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>addfqwf</p>', '<p>qwqwfqwf</p>', 'a', '2023-04-28 10:21:37', '2023-04-28 10:21:37'),
(7, 6, '<p>apa saja&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'b', '2023-05-01 12:34:30', '2023-05-01 12:34:30'),
(8, 7, '<p>2-2&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>0</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'a', '2023-05-04 03:37:27', '2023-05-04 03:37:27'),
(9, 8, '<p>2+2&nbsp; &nbsp;?</p>', '<p>4</p>', '<p>6</p>', '<p>7</p>', '<p>2</p>', 'a', '2023-05-08 04:52:29', '2023-05-08 04:52:29'),
(10, 9, '<ol><li>dimas&nbsp;</li></ol>', '<p>dimas lagi&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>dan lagi&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>bosen</p>', '<p>semua benar</p>', 'd', '2023-05-10 08:03:13', '2023-05-10 08:03:13'),
(11, 10, '<p>arkeolog&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'a', '2023-05-10 09:48:33', '2023-05-10 09:48:33'),
(12, 11, '<p>qq</p>', '<p>qwerty</p>', '<p>yeye</p>', '<p>dede</p>', '<p>cccc</p>', 'a', '2023-05-12 08:36:00', '2023-05-12 08:36:00'),
(13, 12, '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '<p>5</p>', 'a', '2023-05-12 08:36:54', '2023-05-12 08:36:54'),
(14, 13, '<p>qwerty&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', 'a', '2023-05-23 03:03:41', '2023-05-23 03:03:41'),
(15, 14, 'siapa kah saya?', '<p>dimas</p>', '<p>maul</p>', '<p>dimaz</p>', '<p>maul</p>', 'a', '2023-05-25 07:43:09', '2023-05-25 07:43:09'),
(16, 14, '<p>hobby saya</p>', '<p>berenang</p>', '<p>berenangs</p>', '<p>nabur ayam</p>', '<p>aaa</p>', 'a', '2023-05-25 07:43:09', '2023-05-25 07:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_siswas`
--

CREATE TABLE `tagihan_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori_tagihan` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `batas_bayar` date DEFAULT NULL,
  `kategori_cicilan` int(11) NOT NULL DEFAULT 0,
  `minimum_bayar` int(11) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagihan_siswas`
--

INSERT INTO `tagihan_siswas` (`id`, `id_kategori_tagihan`, `deskripsi`, `batas_bayar`, `kategori_cicilan`, `minimum_bayar`, `avatar`, `tanggal`, `created_at`, `updated_at`) VALUES
(330, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:33', '2023-05-02 03:43:33'),
(331, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(332, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(333, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(334, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(335, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(336, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(337, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 03:43:34', '2023-05-02 03:43:34'),
(338, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(339, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(340, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(341, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(342, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(343, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(344, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(345, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 03:43:43', '2023-05-02 03:43:43'),
(346, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(347, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(348, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(349, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(350, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(351, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(352, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(353, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 03:43:48', '2023-05-02 03:43:48'),
(354, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(355, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(356, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(357, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(358, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:53', '2023-05-02 03:43:53'),
(359, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(360, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(361, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 03:43:54', '2023-05-02 03:43:54'),
(362, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(363, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(364, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(365, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(366, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(367, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(368, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(369, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 03:43:59', '2023-05-02 03:43:59'),
(370, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(371, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(372, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(373, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(374, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(375, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(376, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(377, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 03:44:06', '2023-05-02 03:44:06'),
(378, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(379, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(380, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(381, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(382, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:14', '2023-05-02 03:44:14'),
(383, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:15', '2023-05-02 03:44:15'),
(384, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:15', '2023-05-02 03:44:15'),
(385, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-02', '2023-05-02 03:44:15', '2023-05-02 03:44:15'),
(386, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(387, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(388, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(389, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(390, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(391, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(392, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(393, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-02', '2023-05-02 06:27:28', '2023-05-02 06:27:28'),
(394, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(395, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(396, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(397, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(398, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(399, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(400, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(401, 2, 'deskripsi', '2023-03-11', 0, 300000, NULL, '2023-05-02', '2023-05-02 06:27:34', '2023-05-02 06:27:34'),
(402, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(403, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(404, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(405, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(406, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(407, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(408, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:52', '2023-05-02 06:27:52'),
(409, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-02', '2023-05-02 06:27:53', '2023-05-02 06:27:53'),
(410, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:57', '2023-05-02 06:27:57'),
(411, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:57', '2023-05-02 06:27:57'),
(412, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:57', '2023-05-02 06:27:57'),
(413, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:57', '2023-05-02 06:27:57'),
(414, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(415, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(416, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(417, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-02', '2023-05-02 06:27:58', '2023-05-02 06:27:58'),
(418, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(419, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(420, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(421, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(422, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:02', '2023-05-02 06:28:02'),
(423, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:03', '2023-05-02 06:28:03'),
(424, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:03', '2023-05-02 06:28:03'),
(425, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-02', '2023-05-02 06:28:04', '2023-05-02 06:28:04'),
(426, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:16', '2023-05-02 06:28:16'),
(427, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:16', '2023-05-02 06:28:16'),
(428, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:16', '2023-05-02 06:28:16'),
(429, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(430, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(431, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(432, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(433, 6, 'wajib bayar', '2023-03-03', 1, 70000, NULL, '2023-05-02', '2023-05-02 06:28:17', '2023-05-02 06:28:17'),
(434, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(435, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(436, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(437, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(438, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(439, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(440, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:54', '2023-05-05 06:34:54'),
(441, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:55', '2023-05-05 06:34:55'),
(442, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:55', '2023-05-05 06:34:55'),
(443, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-05', '2023-05-05 06:34:55', '2023-05-05 06:34:55'),
(444, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:04', '2023-05-05 06:35:04'),
(445, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:04', '2023-05-05 06:35:04'),
(446, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:05', '2023-05-05 06:35:05'),
(447, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:05', '2023-05-05 06:35:05'),
(448, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:05', '2023-05-05 06:35:05'),
(449, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(450, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(451, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(452, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(453, 7, 'deskripsi', '2023-02-24', 0, 90000, NULL, '2023-05-05', '2023-05-05 06:35:06', '2023-05-05 06:35:06'),
(454, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:43', '2023-05-10 08:09:43'),
(455, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(456, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(457, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(458, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(459, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(460, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(461, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(462, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:44', '2023-05-10 08:09:44'),
(463, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:45', '2023-05-10 08:09:45'),
(464, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:45', '2023-05-10 08:09:45'),
(465, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-05-10', '2023-05-10 08:09:45', '2023-05-10 08:09:45'),
(466, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(467, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(468, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(469, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(470, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(471, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(472, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(473, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(474, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(475, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(476, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(477, 4, 'wajib bayar', '2023-03-11', 0, 100000, NULL, '2023-05-16', '2023-05-16 04:35:52', '2023-05-16 04:35:52'),
(478, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:35:59', '2023-05-16 04:35:59'),
(479, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(480, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(481, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(482, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(483, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(484, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(485, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(486, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(487, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:00', '2023-05-16 04:36:00'),
(488, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:01', '2023-05-16 04:36:01'),
(489, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:01', '2023-05-16 04:36:01'),
(490, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(491, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(492, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(493, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(494, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(495, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:54', '2023-05-16 04:36:54'),
(496, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(497, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(498, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(499, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(500, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(501, 3, 'wajib bayar', '2023-03-11', 0, 70000, NULL, '2023-05-16', '2023-05-16 04:36:55', '2023-05-16 04:36:55'),
(502, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:10', '2023-05-25 07:55:10'),
(503, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:10', '2023-05-25 07:55:10'),
(504, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(505, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(506, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(507, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(508, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(509, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(510, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:11', '2023-05-25 07:55:11'),
(511, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(512, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(513, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(514, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(515, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(516, 5, 'wajib bayar', '2023-03-11', 1, 50000, NULL, '2023-05-25', '2023-05-25 07:55:12', '2023-05-25 07:55:12'),
(517, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(518, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(519, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(520, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(521, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(522, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(523, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:25', '2023-06-12 16:27:25'),
(524, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(525, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(526, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(527, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(528, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(529, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(530, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(531, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:27:26', '2023-06-12 16:27:26'),
(532, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(533, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(534, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(535, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(536, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(537, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(538, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(539, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(540, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(541, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(542, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(543, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(544, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(545, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(546, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:28:10', '2023-06-12 16:28:10'),
(547, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:05', '2023-06-12 16:30:05'),
(548, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:05', '2023-06-12 16:30:05'),
(549, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(550, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(551, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(552, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(553, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(554, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(555, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(556, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(557, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(558, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(559, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(560, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06'),
(561, 1, 'deskripsi', '2023-03-09', 0, 200000, NULL, '2023-06-12', '2023-06-12 16:30:06', '2023-06-12 16:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(3, '2023', '2023-04-27 03:50:33', '2023-04-27 03:50:33'),
(4, '2024', '2023-04-28 06:37:04', '2023-04-28 06:37:04'),
(5, '2025', '2023-04-28 06:37:18', '2023-04-28 06:37:18'),
(6, '2026', '2023-04-28 06:37:48', '2023-04-28 06:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_seleksis`
--

CREATE TABLE `tanggal_seleksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `tanggalmulai` date NOT NULL,
  `gelombang` int(11) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `jenjang` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanggal_seleksis`
--

INSERT INTO `tanggal_seleksis` (`id`, `tahun_ajaran_id`, `tanggalmulai`, `gelombang`, `kuota`, `jenjang`, `status`, `created_at`, `updated_at`) VALUES
(10, 8, '2023-04-03', NULL, NULL, NULL, 'aktif', '2023-04-03 03:12:31', '2023-04-05 01:25:08'),
(11, 8, '2023-04-03', NULL, NULL, NULL, 'tidakaktif', '2023-04-03 03:12:53', '2023-04-03 03:16:57'),
(12, 8, '2023-04-03', NULL, NULL, NULL, 'tidakaktif', '2023-04-03 03:15:31', '2023-04-03 03:15:41'),
(13, 8, '2023-04-03', NULL, NULL, NULL, 'tidakaktif', '2023-04-03 06:29:02', '2023-04-03 06:29:02'),
(15, 3, '2023-06-06', 1, 20, 3, 'aktif', '2023-05-08 12:23:57', '2023-06-06 11:41:27'),
(16, 3, '2023-05-10', 2, 10, 3, 'aktif', '2023-05-09 02:32:03', '2023-05-09 02:32:03'),
(17, 3, '2023-05-11', 2, 10, 3, 'aktif', '2023-05-09 02:32:28', '2023-05-09 02:32:28'),
(18, 3, '2023-05-12', 1, 10, 3, 'aktif', '2023-05-09 02:34:01', '2023-06-07 01:34:50'),
(19, 3, '2023-06-07', 3, 3, 3, 'aktif', '2023-06-07 01:35:14', '2023-06-07 01:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatans`
--

CREATE TABLE `tingkatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang` int(11) DEFAULT NULL,
  `tingkat` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tingkatans`
--

INSERT INTO `tingkatans` (`id`, `jenjang`, `tingkat`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'I', '2023-02-02 06:53:15', '2023-02-02 06:53:15'),
(2, 1, '2', 'II', '2023-02-02 06:53:27', '2023-02-02 06:53:27'),
(3, 1, '3', 'III', '2023-02-02 06:53:38', '2023-02-02 06:53:38'),
(4, 1, '4', 'IV', '2023-02-02 06:53:46', '2023-02-02 06:53:46'),
(5, 1, '5', 'V', '2023-02-02 06:53:55', '2023-02-02 06:53:55'),
(6, 1, '6', 'VI', '2023-02-02 06:54:07', '2023-02-02 06:54:07'),
(7, 2, '7', 'VII', '2023-02-02 06:54:16', '2023-02-02 06:54:16'),
(8, 2, '8', 'VIII', '2023-02-02 06:54:24', '2023-02-02 06:54:24'),
(9, 2, '9', 'IX', '2023-02-02 06:54:36', '2023-02-02 06:54:36'),
(10, 3, '10', 'X', '2023-02-02 06:54:48', '2023-02-02 06:54:48'),
(11, 3, '11', 'XI', '2023-02-02 06:55:04', '2023-02-02 06:55:04'),
(12, 3, '12', 'XII', '2023-02-02 06:55:12', '2023-02-02 06:55:12'),
(13, 5, '13', 'alumni', '2023-02-06 09:45:54', '2023-02-06 09:45:54'),
(14, 4, '14', 'TK', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` int(11) DEFAULT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `mata_pelajaran_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `jenjang_pendidikan_id` int(11) DEFAULT NULL,
  `nama` varchar(170) NOT NULL,
  `tanggal_tugas` date NOT NULL,
  `tanggal_pengumpulan` date NOT NULL,
  `tanggal_evaluasi` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `evaluasi_oleh` int(11) DEFAULT NULL,
  `dibuat_oleh` int(11) NOT NULL,
  `file_tugas` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `jadwal_id`, `tahun_ajaran_id`, `mata_pelajaran_id`, `kelas_id`, `guru_id`, `jenjang_pendidikan_id`, `nama`, `tanggal_tugas`, `tanggal_pengumpulan`, `tanggal_evaluasi`, `deskripsi`, `status_aktif`, `evaluasi_oleh`, `dibuat_oleh`, `file_tugas`, `created_at`, `updated_at`) VALUES
(26, NULL, 3, 1, 46, 16, 3, 'Biologi', '2023-05-02', '2023-05-03', '2023-05-09', 'Pilihan Ganda', 0, NULL, 16, 'file_tugas-I1GVP.pdf', '2023-05-02 06:46:41', '2023-05-02 09:24:05'),
(33, NULL, 3, 2, 47, 53, 3, 'Matematika', '2023-05-04', '2023-05-11', '2023-05-11', 'Kerjakan', 0, NULL, 53, 'file_tugas-oiLAQ.pdf', '2023-05-04 03:33:23', '2023-05-04 03:33:23'),
(34, NULL, 3, 2, 47, 53, 3, 'Coba', '2023-05-04', '2023-05-04', '2023-05-04', 'coba', 0, NULL, 53, 'file_tugas-Z96YL.pdf', '2023-05-04 08:04:52', '2023-05-04 08:04:52'),
(35, NULL, 3, 18, 47, 51, 3, 'arkeo', '2023-05-04', '2023-05-04', '2023-05-04', 'bbb', 0, NULL, 51, 'file_tugas-wzcWQ.pdf', '2023-05-04 09:57:02', '2023-05-04 09:57:02'),
(36, NULL, 3, 2, 47, 53, 3, 'asdfgh', '2023-05-05', '2023-05-08', '2023-05-08', 'asdfghj', 0, NULL, 53, 'file_tugas-pzJPo.pdf', '2023-05-05 02:20:43', '2023-05-05 02:20:43'),
(37, NULL, 3, 2, 47, 53, 3, 'testjumat', '2023-05-04', '2023-05-04', '2023-05-04', 'testjumat', 0, NULL, 53, 'file_tugas-aQetC.pdf', '2023-05-05 03:05:04', '2023-05-05 03:07:31'),
(38, NULL, 3, 2, 47, 53, 3, '10MEI', '2023-05-10', '2023-05-11', '2023-05-11', '10MEI', 0, NULL, 53, 'file_tugas-k9ULH.pdf', '2023-05-10 07:53:19', '2023-05-10 07:53:19'),
(39, NULL, 3, 2, 47, 53, 3, 'Aljabar', '2023-05-12', '2023-05-13', '2023-05-13', 'Kerjakan ya:)', 0, NULL, 53, 'file_tugas-3AvCw.pdf', '2023-05-12 03:05:06', '2023-05-12 03:05:06'),
(40, NULL, 3, 19, 47, 53, 3, 'Present Tense', '2023-05-11', '2023-05-13', '2023-05-12', 'take it or leave it:) yy', 0, NULL, 53, 'file_tugas-aOvB9.pdf', '2023-05-12 03:06:14', '2023-05-12 08:04:14'),
(41, NULL, 3, 2, 47, 53, 3, 'expired', '2023-05-12', '2023-05-12', '2023-05-12', 'kerjakan', 0, NULL, 53, 'file_tugas-T3dKr.pdf', '2023-05-12 06:57:03', '2023-05-12 08:32:07'),
(42, NULL, 3, 1, 46, 16, 3, 'tugas 1', '2023-05-25', '2023-06-30', '2023-06-29', 'kerjakan', 0, NULL, 16, 'file_tugas-i7G1L.pdf', '2023-05-25 04:22:46', '2023-05-25 04:22:46'),
(43, NULL, 3, 1, 46, 16, 3, 'tugas 2', '2023-05-25', '2023-05-26', '2023-05-26', 'kerjakan', 0, NULL, 16, 'file_tugas-TmEt2.pdf', '2023-05-25 04:23:22', '2023-05-25 04:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_kumpul`
--

CREATE TABLE `tugas_kumpul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `kesempatan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nilai_tugas` int(11) DEFAULT NULL,
  `komentar_tugas` varchar(100) DEFAULT NULL,
  `status_pengumpulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_kumpul`
--

INSERT INTO `tugas_kumpul` (`id`, `tugas_id`, `siswa_id`, `file_upload`, `kesempatan`, `created_at`, `updated_at`, `nilai_tugas`, `komentar_tugas`, `status_pengumpulan`) VALUES
(235, 39, 808, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(236, 39, 809, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(237, 39, 810, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(238, 39, 811, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(239, 39, 815, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(240, 39, 816, 'file_tugas-816rY246RA4Rc.', 1, '2023-05-12 03:05:06', '2023-05-12 03:07:56', NULL, NULL, NULL),
(241, 39, 817, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(242, 39, 818, NULL, 2, '2023-05-12 03:05:06', '2023-05-12 03:05:06', NULL, NULL, NULL),
(243, 40, 808, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(244, 40, 809, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(245, 40, 810, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(246, 40, 811, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(247, 40, 815, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(248, 40, 816, 'file_tugas-ZBE7X.pdf', 1, '2023-05-12 03:06:14', '2023-05-12 08:30:32', 90, NULL, NULL),
(249, 40, 817, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(250, 40, 818, NULL, 2, '2023-05-12 03:06:14', '2023-05-12 03:06:14', NULL, NULL, NULL),
(251, 41, 808, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(252, 41, 809, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(253, 41, 810, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(254, 41, 811, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(255, 41, 815, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(256, 41, 816, 'file_tugas-pDdh5.pdf', 1, '2023-05-12 06:57:03', '2023-05-12 08:32:46', 100, NULL, NULL),
(257, 41, 817, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(258, 41, 818, NULL, 2, '2023-05-12 06:57:03', '2023-05-12 06:57:03', NULL, NULL, NULL),
(259, 42, 1, 'file_tugas-11nawkgCNLs.pdf', 1, '2023-05-25 04:22:46', '2023-06-13 05:42:28', NULL, NULL, NULL),
(260, 42, 803, NULL, 2, '2023-05-25 04:22:46', '2023-05-25 04:22:46', NULL, NULL, NULL),
(261, 42, 812, NULL, 2, '2023-05-25 04:22:46', '2023-05-25 04:22:46', NULL, NULL, NULL),
(262, 42, 813, NULL, 2, '2023-05-25 04:22:46', '2023-05-25 04:22:46', NULL, NULL, NULL),
(263, 42, 814, NULL, 2, '2023-05-25 04:22:46', '2023-05-25 04:22:46', NULL, NULL, NULL),
(264, 42, 819, NULL, 2, '2023-05-25 04:22:46', '2023-05-25 04:22:46', NULL, NULL, NULL),
(265, 42, 820, 'file_tugas-4yYs7.pdf', 0, '2023-05-25 04:22:46', '2023-05-25 04:45:10', 52, NULL, NULL),
(266, 43, 1, NULL, 2, '2023-05-25 04:23:22', '2023-05-25 04:23:22', NULL, NULL, NULL),
(267, 43, 803, NULL, 2, '2023-05-25 04:23:22', '2023-05-25 04:23:22', NULL, NULL, NULL),
(268, 43, 812, NULL, 2, '2023-05-25 04:23:22', '2023-05-25 04:23:22', NULL, NULL, NULL),
(269, 43, 813, NULL, 2, '2023-05-25 04:23:22', '2023-05-25 04:23:22', NULL, NULL, NULL),
(270, 43, 814, NULL, 2, '2023-05-25 04:23:22', '2023-05-25 04:23:22', NULL, NULL, NULL),
(271, 43, 819, NULL, 2, '2023-05-25 04:23:22', '2023-05-25 04:23:22', NULL, NULL, NULL),
(272, 43, 820, 'file_tugas-820zHBRxtg9dz.pdf', 1, '2023-05-25 04:23:22', '2023-05-25 04:39:35', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ujians`
--

CREATE TABLE `ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL COMMENT '1 = ganjil, 2 = genap',
  `mata_pelajaran_id` int(11) DEFAULT NULL,
  `jenis_ujian` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ujians`
--

INSERT INTO `ujians` (`id`, `tahun_ajaran_id`, `semester`, `mata_pelajaran_id`, `jenis_ujian`, `tanggal`, `created_at`, `updated_at`) VALUES
(11, 3, 1, 2, 'uas', '2023-05-12', '2023-05-12 08:35:30', '2023-05-12 08:35:30'),
(12, 3, 1, 2, 'uts', '2023-05-12', '2023-05-12 08:36:36', '2023-05-12 08:36:36'),
(13, 3, 1, 1, 'uas', '2023-05-23', '2023-05-23 03:03:16', '2023-05-23 03:03:16'),
(14, 3, 1, 22, 'uts', '2023-05-25', '2023-05-25 07:42:09', '2023-05-25 07:42:09'),
(15, 3, 1, 1, 'uts', '2023-06-13', '2023-06-13 06:56:51', '2023-06-13 06:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL COMMENT '5 = siswa,4 = orgtua, 3 = guru  ',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'dimmas', 'dimmas', 'dimmas@gmail.com', 1, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-14 09:50:11', '2023-02-27 09:28:54'),
(2, NULL, 'Maul Susanto', 'Maul', 'maulana.malik53@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2023-04-28 04:29:28'),
(3, 1, 'Achmad Rochim', 'guru', 'guru@gmail.com', 3, NULL, '$2y$10$evFiwMilN.ixNbFohENEhOibbkDHtX3yQxqcxR3F2FARzy.qcisZW', NULL, '2022-12-14 09:50:11', '2023-01-05 03:05:38'),
(27, 1, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2023-02-10 03:04:28'),
(28, NULL, 'Adi Hidayat', 'adi', 'adi@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2022-12-28 23:42:04'),
(29, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2022-12-28 23:42:04'),
(30, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2022-12-28 23:42:04'),
(31, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2022-12-28 23:42:04'),
(32, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.com', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2022-12-28 23:42:04', '2022-12-28 23:42:04'),
(33, NULL, 'Ananda Dimmas Budiarto', 'hani', 'anandadimmas1204@gmail.coms', 5, NULL, '$2y$10$xp8zGRdoh.GaniCq49nCx.td0SmU6/DTDlae4X5iaH8HZWtPwiMMy', NULL, '2022-12-28 23:42:04', '2023-03-27 02:47:21'),
(93, NULL, 'anandadimmas', 'anandadimmas', 'emailllll@gmail.com', 3, NULL, '$2y$10$rWacNfdR8m0.Lnq1.cAHTOq24xh4pDTDpwwBjDgAVQh9v3SrgXHnu', NULL, '2023-01-05 05:16:41', '2023-01-05 05:16:41'),
(94, NULL, 'anandadimmasdsdsd', 'anandadimmasdsdsd', 'emaddilllll@gmail.com', 3, NULL, '$2y$10$zRhtBLMCDqqPSbJONzjPbu62x.5UUvTOTbvyNS692J/qVt/kfW0X6', NULL, '2023-01-05 05:16:41', '2023-01-05 05:16:41'),
(95, NULL, 'admin', 'admin', 'admin@gmail.com', 1, NULL, '$2y$10$YOqGL9kwLekS.xFOi4M82OdPK/2BwbsOS7EDpFDi1MwEpSVdVyvU6', NULL, '2023-01-05 05:37:00', '2023-01-05 05:37:00'),
(96, NULL, 'admin 2', 'admin 2', 'admmda@mfm.com', 1, NULL, '$2y$10$8132WnGqqdUqLQMxR3rfOul9fPGbgTyLhC2MJMIqucy9KokcKN13q', NULL, '2023-01-05 05:37:00', '2023-01-05 05:37:00'),
(97, NULL, 'guruuuuuu', 'guruuuuuu', 'guru2@gmail.com', 3, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2023-01-06 03:44:23', '2023-01-19 03:47:35'),
(117, 1, 'nmnmn', 'nmnmn', 'bapakku@fdmfn.com', 4, NULL, '$2y$10$sYaw5t.B.XRxGww49norre1PL/EIlXcwFpRbbQ3ggoX55w0bHNo7O', NULL, '2023-01-06 09:47:08', '2023-04-28 04:29:28'),
(126, NULL, 'admin', 'admin', 'addssdsdmin@emaill.com', 1, NULL, '$2y$10$zfpVwQiILz6vC7XE1jE.feaVB3mz87qBTlAZ6vfyUwnR4cPWrbEmi', NULL, '2023-01-09 06:10:32', '2023-01-09 06:10:32'),
(127, NULL, 'admin 2', 'admin 2', 'sdsdsdsdsdsdsd@mfm.com', 1, NULL, '$2y$10$b9w2UI0EhTzRTbS8sUrvN.Inq/0jDoDCwuq4mPxZQpWAgPQ/iw84y', NULL, '2023-01-09 06:10:32', '2023-01-09 06:10:32'),
(129, NULL, 'id 50', 'id 50', 'dsdsEmail@ddwds.com', 5, NULL, '$2y$10$fiPGrG1KeebZQ4FB1hp6D.tzACuZEm22hMQ0wC63SokqLXCvJ7wbS', NULL, '2023-01-09 06:14:36', '2023-01-09 07:35:54'),
(130, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.com', 5, NULL, '$2y$10$Hc0G5hGGn1N9YuWCzf24yuDj1h7RwgdyY2ffSybe0xWzLopYy1dpu', NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(131, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.com', 5, NULL, '$2y$10$GZE2YRRjFSuaQCfmWy0Q9.XjX9timnlRECAc0rpCZhgUvORsDRCaq', NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(132, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.com', 5, NULL, '$2y$10$yzTgsS2QySmudDBM8BZpaOPPR2jDnDZeM7sqSquZIaSDZMTaUm5Z2', NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(133, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.com', 5, NULL, '$2y$10$ZOjwT1z..bYIQ2uTFx.Mf.rFI.8VOgVhP2kLZ2q8JuwTQNf8Q1VNS', NULL, '2023-01-09 06:14:36', '2023-01-09 06:14:36'),
(134, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.com', 5, NULL, '$2y$10$5WSQFCi2jtU6xKyif8D5EORBvRiPN0YxrqJr9q0/ddvDy9uLan4K2', NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(135, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.com', 5, NULL, '$2y$10$Cthm/hXATkX6ZK7B/AEFTO5YP.ClCM1tIrfE4NPkYMbygGToNJuE.', NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(136, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.com', 5, NULL, '$2y$10$2aRv0yLjHuMKCxWXpDEOtO5GtS58rBv5uFZR7EXXbVojSI0FUgY2y', NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(137, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.com', 5, NULL, '$2y$10$5x0.Q5m11LfpaExPKmt4FecgxBuoePKkWAYpozmdFArOR9QkS0yhC', NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(138, NULL, 'dsfrtry', 'dsfrtry', 'siswdsdsdsdsdsaass@ffes.com', 5, NULL, '$2y$10$k4MwYCKQ8xPuvTNHBPvSSubak7WiePKZTOwxPvTrt0xjNzGfvZWUS', NULL, '2023-01-09 06:14:37', '2023-01-09 06:14:37'),
(141, NULL, 'sdsdsdsdsds', 'sdsdsdsdsds', 'sdwasdw@dsdwd2dw.com', 5, NULL, '$2y$10$r20Txq56oiPVZ9ENBxOFA.X.cHk.fvAca2.HMRQlKam1EdrGB44Ba', NULL, '2023-01-09 06:33:46', '2023-01-09 06:33:46'),
(142, NULL, 'Ari Hadya Achmad', 'Ari Hadya Achmad', 'ari@gmail.comm', 5, NULL, '$2y$10$w9/epwFUQroGNwa3/jbjJ.1usBxvwJU6bDOub6QoqHxVtW0Ay63Ry', NULL, '2023-01-09 06:33:46', '2023-01-09 06:33:46'),
(143, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.comm', 5, NULL, '$2y$10$38DZDRqvhxyTeaVW238B9Oy1dnPb35mVjmJRkU9FbQGAaHpVjNuny', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(144, NULL, 'Adi Hidayat', 'Adi Hidayat', 'adi@gmail.comm', 5, NULL, '$2y$10$Y0OrUCvo33g9eHioSiVczuphXgIL7zi84XDlMMyfKs.sdYwrD3Xm2', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(145, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.comm', 5, NULL, '$2y$10$Bp4.pOEI5neFUAW1eDjWMOGH16Bn2kjemnQCp1d8.wHIvCjKqY7N2', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(146, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.comm', 5, NULL, '$2y$10$CGfdhRkO.oLr2w.fB4L96.SMZCp6.MntRAVkp8JjPyXieJW7dNEuO', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(147, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.comm', 5, NULL, '$2y$10$IsNrQD01ItZ/c7OWWXsjQ.4s2UCGM0tUqFtLgPIyAU0tFkSGOxBT.', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(148, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.comm', 5, NULL, '$2y$10$UuEYM.7MFr7NoBgebOH7dOrphdHw8of6F2YaYApIPSi7SJz6rUYni', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(149, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.comm', 5, NULL, '$2y$10$zpHKVRaKQdKM9pVu1.wKuuPSBlSt2S8A.nmipF1qm3FKt6E.4Kod6', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(150, NULL, 'dsw', 'dsw', 'siswaass@ffes.comm', 5, NULL, '$2y$10$.grBVIotbwkuENPdy91Pve6YCay0rV2MZE1ZNhkueuYfDNJ5nFQ1.', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(151, NULL, 'dsdsdsdsdsd', 'dsdsdsdsdsd', 'Emaild@Jkj.comm', 5, NULL, '$2y$10$0.oHmLlrWZwqAGmm1w1aT.Iden/f0bCbTvNeHQuT8MYrH4iAHpaz6', NULL, '2023-01-09 06:33:47', '2023-01-09 06:33:47'),
(152, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.comm', 5, NULL, '$2y$10$hKU8DEGPaukO3Clx1gYxru84Pjkh/qn2BjbvJbDFZkLGpxptEnWWi', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(153, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.comm', 5, NULL, '$2y$10$1Ik5ROXDiaJ56UCKdn32Ke4qFBImvL53GuxFQkpHvN6p.pmEeoX6q', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(154, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.comm', 5, NULL, '$2y$10$TaOEVrbloxPoKSmVU1hVfeTaXbB.7jaPWWwsDqmqSyZQ/SODtvNW2', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(155, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.comm', 5, NULL, '$2y$10$jGkBy4yfee1FKo4OS4bs5.taHaqaOGVR.51s7/PeLcfdMKagAd13m', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(156, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.comm', 5, NULL, '$2y$10$yODliYbHz3AJ3/0lnVjh.umtNnk1zp0BrNGgzo59DoZwVOOQWtGyq', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(157, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.comm', 5, NULL, '$2y$10$9gnHhqhNLmr08e8IPXGD/earRKmRRvc9dhnqepWdVRVJ2LcJB5MFe', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(158, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.comm', 5, NULL, '$2y$10$U788bnGmwmI4F3P7V9avguwJqKnOjd0OIbeFsaUvw5I3nycbFMyyO', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(159, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.comm', 5, NULL, '$2y$10$3hF7TsUUDd8TFxldhlWMLeKtrrZPf.F6lQE5zMQTjRCaJKjR5d13e', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(160, NULL, 'sdss', 'sdss', 'siswdsdsdsdsdsaass@ffes.comm', 5, NULL, '$2y$10$5aKQNm2GbBwPs9eguUL4IOipNO//mQb1lSTNIbQ55b.kpq5blBX0.', NULL, '2023-01-09 06:33:48', '2023-01-09 06:33:48'),
(260, NULL, 'dsdsdsdsdsd', 'dsdsdsdsdsd', 'Emaildwwdswdsw@dsd.com', 5, NULL, '$2y$10$DrMRDdqrA.71z5FcaUJ3se/coGw6WkrcgN9z5nObQ5fh0qEqt1vua', NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(261, NULL, 'Ari Hadydsdsdsa Achmad', 'Ari Hadydsdsdsa Achmad', 'ari@gmail.comffefefeds22222222', 5, NULL, '$2y$10$C61VZN/lhlRKq1eYBhoPU.uzsyjYWT5HKLOnoODtZV8gvw4ASNiZW', NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(262, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.comfefe', 5, NULL, '$2y$10$esQVgTLkE/d9P7WtUtQQ5eBIMeCtCtWBpi3.UfV.w/XtKY.4w/rCC', NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(263, NULL, 'Adi Hidayat', 'Adi Hidayat', 'adi@gmail.comfef', 5, NULL, '$2y$10$Get0oTIQE.6VoCNv3JjF0enZvZRC8FZa.zTuvkswQQuO/pgMvdZ7e', NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(264, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.comfefe', 5, NULL, '$2y$10$aKoAW4Iik6GeUkJTg9UhseoE8g3gElePhDhHaAGZaig1ec2CVhnZy', NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(265, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.comfef', 5, NULL, '$2y$10$il/Bj83GuS5fDsdkubbjXeiKHImj.HKMbHMAKoWmz90cHNpb2EFmS', NULL, '2023-01-09 06:46:08', '2023-01-09 06:46:08'),
(266, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.dwwd', 5, NULL, '$2y$10$huFvFA1qILKUbzCxlfWHFuM8PKWxQYjjEG69RGpUeIkJyEIJB7qWO', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(267, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.comdwdw', 5, NULL, '$2y$10$w4TXLmnIcqJW/MvlqOSiaOWNbDGuUVI5QXWnRJWs2skP3G.EtFsCy', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(268, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.comdwd', 5, NULL, '$2y$10$c7rs2VHWA.9JxzXapbyvE.fc5Jo3MoTZ1pVK2UVGk/Z43TK7eNykm', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(269, NULL, 'sdwdsd', 'sdwdsd', 'siswaass@ffes.comdwwd', 5, NULL, '$2y$10$9Nghdi3cg1b7YOb8DRv.WOXT9/TK48PP92/bIPXJ1HqJxBz5X81nG', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(270, NULL, 'Namawsdw Siswa', 'Namawsdw Siswa', 'Emailddwd@Dds.co', 5, NULL, '$2y$10$J7igYUqQSmxcJPd9rn7aHevjnJhwqr89lsndFtXxA8T/QuAI4Rlg.', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(271, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.comdsds3232111', 5, NULL, '$2y$10$b0ClA20m2OtskN9MTyiRl.ZH6i77j/Z.qwwUGOYcHZuMuXRvjyjhm', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(272, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.comdsds', 5, NULL, '$2y$10$xHS3ZnLoQc8mixcfv5xVRehXyXDqur1AvuMOTRLcPIzB8OLTFZviu', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(273, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.comdsd', 5, NULL, '$2y$10$CTc2j.P.GSIRM0HQy4NiDOa6hbewDak59wOTNwJHvuDANM3enbem6', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(274, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.comdsd', 5, NULL, '$2y$10$7H/CiBQalxbhEFfzACP6F.tu4.laER.B5HWUZgjUjnuUhVa1ar/Wa', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(275, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.ds', 5, NULL, '$2y$10$S.bthfQ9SwEr.aGyfxyoeO9Bh6fijf29WMcoqW/IRzsoJ78qlFu/W', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(276, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.commmdsds', 5, NULL, '$2y$10$TNdbuCYaS/J92B3twSfccugmFI4MJmNt9febWsMRoGdR6qpWalVqS', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(277, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.commmdsd', 5, NULL, '$2y$10$NabehZRnq46b3xj2U1BPi.BWqef6ir63wteU0PT8WHytKDXE/kfGO', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(278, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.commmdsds', 5, NULL, '$2y$10$BdSurhjM3nEtvp6qSsmIUOk5E/ZN7muANRQGhBKFqusCBIraYSRxS', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(279, NULL, 'dsfrtry', 'dsfrtry', 'siswdsdsdsdsdsaass@ffes.commmdsds', 5, NULL, '$2y$10$GFPa3WGgR5gDhLkVyxfUpelLALECnPQULfTOSl5lz/Wm5Fg5GrLAq', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(280, NULL, 'sdsdsdsdsds', 'sdsdsdsdsds', 'sdwasdw@dsdwd2dw.commmmdsdd', 5, NULL, '$2y$10$VLp/.iqKvepkxLgU1eFHFu2y2H48bJQdh8yd0hjtPjWp3KlsIjy52', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(281, NULL, 'Ari Hadya Achmad', 'Ari Hadya Achmad', 'ari@gmail.commddddsd2323', 5, NULL, '$2y$10$pM6OsWEvEghWFsJ4sBE4FuU4Xj6XIatNL50j4pJ7Ab9wL4.AhZqUC', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(282, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.commddddsd', 5, NULL, '$2y$10$JJozW16KWN1tDrMsdFpMA.NBKFG.OardEHgm.qO/gVLOXXqPkfwte', NULL, '2023-01-09 06:46:09', '2023-01-09 06:46:09'),
(283, NULL, 'Adi Hidayat', 'Adi Hidayat', 'sdwasdw@dsdwd2dw.commmmdsddsaasa', 5, NULL, '$2y$10$cl2ftV1L3PNp8mjVi8/1cer3qvB7.A.584n313is542xtST3sVdZq', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(284, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.commddddsds', 5, NULL, '$2y$10$TUmmoEOf7YX99gYPxwg1G.51r94EnMGfmZEJ/ngQyOTMv78gpYZ0a', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(285, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.commddsds', 5, NULL, '$2y$10$sPcKu/dIYPoFrPdrIeNdA.Xv.szaw2iHRATcU8q67zFQ3rlrx8XtO', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(286, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.commddsd', 5, NULL, '$2y$10$4R8qg9RlqtdVnFIK1FcAd.u34kTS.sBev9rxqVjV3zmN9u.Uq9q5q', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(287, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.commddsd', 5, NULL, '$2y$10$k42vSfzCjZX4B.tMXfH9Ye/9DCMf5WQAdReaztPjEarJMHu.4aVLq', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(288, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.commdsds', 5, NULL, '$2y$10$krXKj4IOCWO87ykF607RE.KYv.iJhPuMZySXCIeGb5lbPNomujaLG', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(289, NULL, 'dsw', 'dsw', 'siswaass@ffes.commddsdd', 5, NULL, '$2y$10$vavdFo/boXeqEBDQyOnG0uQJhaVriWLWlffA/Vgydtpathrcv8uNC', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(290, NULL, 'dsdsdsdsdsd', 'dsdsdsdsdsd', 'Emaild@Jkj.commddsd', 5, NULL, '$2y$10$ejN6sIgpHfciPckTISeVQeSQlsBT4Ux4.src1lssXqDcj4pftC/Sy', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(291, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.commdsdsssd23232', 5, NULL, '$2y$10$TKkAivEWZAiFMQw2e9bS8.uavUDpeUfOX/lhyVkhfQKnIV2wOJa8y', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(292, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.commddsd', 5, NULL, '$2y$10$YS49wcU19MycorN4aUAKOOnnji1bC5A94Ch9IBgQcxU7DMEmGboaK', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(293, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.commdfdf', 5, NULL, '$2y$10$yFH6fvOaYv3z.64I5RTw2.JGwn0P9Mh3Q9nFJBSIcZSEL0YqNQ/4m', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(294, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.commdfdf', 5, NULL, '$2y$10$Xrq.TlS6TZ0Q6TPAhIn7eOV8IMPgV6L6JoGCzjB0O5jnhUvEkJiO.', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(295, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.commddf', 5, NULL, '$2y$10$w3DgnBr.2Hsg3hqXbaMRTuewMbmic0IaSB8nIrf8mn1Cy87SRg7Em', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(296, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.commdfdf', 5, NULL, '$2y$10$ViA75jesjSEy2f6ImRGzee7tKKwvY/nVkvsfHQhORNm9qP9JLjHwu', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(297, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.commdfdf', 5, NULL, '$2y$10$FKW8MBuElUexO.d95WfI/um/jQdLmINJ9DhOLUjZN4m1UN10cZfdO', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(298, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.commdfdf', 5, NULL, '$2y$10$QcNoRgFTc8ng0KKI.3wsUO6ggsED9R/wK5IlXj.nePaxA9B72NxVq', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(299, NULL, 'sdss', 'sdss', 'siswdsdsdsdsdsaass@ffes.commdfdf', 5, NULL, '$2y$10$Oz/iVdc5V3pViBUnuzX8NuILHUyr52A8W5nLmteD6ia.Q8dyX0Xmi', NULL, '2023-01-09 06:46:10', '2023-01-09 06:46:10'),
(300, NULL, 'nama bapak', 'nama bapak', 'id50@fdkfjdk.com', 4, NULL, '$2y$10$3CcIP/6rDlD9eUBiXV5TrOolymtjRzKeipjGg5ZtSMhbH7JVO/jMu', NULL, '2023-01-09 07:34:03', '2023-01-09 07:34:03'),
(301, 1, 'nama bapakku', 'nama bapakku', 'id50@fdsdsdkfjdk.com', 4, NULL, '$2y$10$0uTk6EuqX0TmDvNJ.BcnFe6rVNihjeDI5pt7FnuBhf2qwhlFsGflW', NULL, '2023-01-09 07:35:54', '2023-02-10 03:04:28'),
(302, NULL, 'Ari Hadya Achmad', 'Ari Hadya Achmad', 'ari@gmail.coma', 5, NULL, '$2y$10$FpqYLLf4oQGpB.Y2mwGKKO3Kq.EUUxqTRQZe2BikL3/698ddX6xaS', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(303, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.coma', 5, NULL, '$2y$10$zMcXSR4YU5PWwcR9/Or3yeJGFRtuiyhlChhLroEWujnLYzapcp5ny', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(304, NULL, 'Adi Hidayat', 'Adi Hidayat', 'adi@gmail.coma', 5, NULL, '$2y$10$ipM/lgR0osRSi5m2B89Sg.ZB//.hs5e1GCKNDslVLN1qRKkKhF5la', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(305, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.coma', 5, NULL, '$2y$10$LZM7qYIcvPXsgfcu7iwitea.rLiqcIT0rCA/ZsyLerElok3pF4MP.', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(306, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.coma', 5, NULL, '$2y$10$e25i9fuGJCF2sXybA0yLJ.moXLz4H/nyUdNuj/Yi3I7ue3DwRgswu', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(307, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.coma', 5, NULL, '$2y$10$cKbyZDa30Ze1FG8dtKzo0ub4aTD7wKccfPz0lGMnKLc4l8I6F1lOe', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(308, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.coma', 5, NULL, '$2y$10$zeWB4bTbQCCCF3SxTPF.oeRlxdq887/MZDv5/UlRlotVCTOczu8Wu', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(309, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.coma', 5, NULL, '$2y$10$5q2f1iJLGWfqCAbL4EgnaOFgp2oamieaBF9Tda.ASw/xxCRURlBxe', NULL, '2023-01-09 09:10:34', '2023-01-09 09:10:34'),
(805, NULL, 'id 50', 'id 50', 'dsdsEmail@ddwds.comaaaxs', 5, NULL, '$2y$10$AQKAXEsKH1vCJyeGWvaS.evHXmEv8cWJti1S5b7mne7J8/T/uH1eG', NULL, '2023-01-09 10:04:41', '2023-01-09 10:04:41'),
(806, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.comaaaaxs', 5, NULL, '$2y$10$MnxmB7.GvDmH24JOeEFsoeGTMvCECPNgxjWGKTEHUj6ORJk3U7C4m', NULL, '2023-01-09 10:04:41', '2023-01-09 10:04:41'),
(807, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.comaaaxs', 5, NULL, '$2y$10$9UWMqOcwb7tuB.oT8y.74eooMsBDZ2CXAgchWDhSDedpgCZLDdnR6', NULL, '2023-01-09 10:04:41', '2023-01-09 10:04:41'),
(808, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.comaaaxs', 5, NULL, '$2y$10$TlqesNaVPoXTAx9KjXE6IeZr.eNkqWBpmDMrsVmWsJSlglT1NRRBi', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(809, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.comaaaxs', 5, NULL, '$2y$10$CbnI8uYbH6AvWkm5wOeugOi6oUd8lbYzEhiGdeONjs3IclMEG7B0u', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(810, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.comaaaxs', 5, NULL, '$2y$10$J0rQFGIjD0HGlVLT9Pj5h.og47qRb2UdVesgCppGK7UeCW8AyVEAG', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(811, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.comaaaxs', 5, NULL, '$2y$10$LKbBNyvdbcb6sgxfWHVPtuY0kBFITZfybfrPG1TkIN9Ty4tHrP4vm', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(812, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.comaaaxs', 5, NULL, '$2y$10$Jqsc9kpQt6h55GpxozKCDuHDr.wBgZ.qbUf20mW2uSrMWMg5d5LBu', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(813, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.comaaaaxs', 5, NULL, '$2y$10$iI/qfRFGU5Z4DG4hNabDCeLzUbYhRuPysU//x2fvWLKPwNRNDa7D2', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(814, NULL, 'dsfrtry', 'dsfrtry', 'siswdsdsdsdsdsaass@ffes.comaaad', 5, NULL, '$2y$10$P9V0M7gnm6Sjleqv4PLmPeq/P/uylHem2ofKLmo5Xmhz0zRaswOLW', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(815, NULL, 'sdsdsdsdsds', 'sdsdsdsdsds', 'sdwasdw@dsdwd2dw.comaadsdsdss', 5, NULL, '$2y$10$JQOP6gcxRBhrq6oMzVp/ieHI1Egx.F1Y2oSw4stQQ1uttpvVzpMCS', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(816, NULL, 'Ari Hadya Achmad', 'Ari Hadya Achmad', 'ari@gmail.commaaxs', 5, NULL, '$2y$10$rEMcPaUxSbadbSN0uqL.GexbVAzQ4XI7V6dLaj3v.X5q9OX01ciIq', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(817, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.commaaxs', 5, NULL, '$2y$10$UV.VaLMkzS.NWSpsnku0n.Onb4uIDhednj.yvpHuWr1Mf1yHX3axm', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(818, NULL, 'Adi Hidayat', 'Adi Hidayat', 'adi@gmail.commaaxs', 5, NULL, '$2y$10$1rRrr7gnHTIaSb24PNB4WeSzHcfhsJYW7qwCpbxoKLUWrEpI0s6pq', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(819, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.commaas', 5, NULL, '$2y$10$hxe1SP9W..4XspGgDLMyi.tsD8xASfry6UNbiIUGB1B9tUN.hRjn.', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(820, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.commaaxs', 5, NULL, '$2y$10$6B0PSDxwr3wUouJV4uqX/.CHB1ZjZzDujZD5HFulj/1ac1q3djAfW', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(821, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.commaas', 5, NULL, '$2y$10$vulGkS5lYWbm6H9r05u1Ve3VGY7ZF3LZQhKwWh7E4pkVVKb6rjVfO', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(822, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.commaaxs', 5, NULL, '$2y$10$1sSHdnA7cibx.7KImhoViONF2cF15noXpoAZGzqEA.tVnVRmCqgfC', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(823, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.commaaaxs', 5, NULL, '$2y$10$AMiddlQWkmhbMwfd8ahZRu7elMn/iUsZf9jvo6dyEntHSHDSQCzz.', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(824, NULL, 'dsw', 'dsw', 'siswaass@ffes.commaaxs', 5, NULL, '$2y$10$P/q9GIZsxpzEcEb69SBSoOQXiK5I4h8dK6qC8.mexVXiPgF8DGGwK', NULL, '2023-01-09 10:04:42', '2023-01-09 10:04:42'),
(825, NULL, 'dsdsdsdsdsd', 'dsdsdsdsdsd', 'Emaild@Jkj.commaaxs', 5, NULL, '$2y$10$0E8kqp6QjQWYj70uZAm06e/igQESlHJYG2uNORYX2OcGZ1Kh/vmyW', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(826, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.commaaxs', 5, NULL, '$2y$10$ghwOcHQ8WIZVbFm1e3lVwui7N.1nPQVL5EqexQ30xQQl3Gj1j/aci', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(827, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.commaaxs', 5, NULL, '$2y$10$Vx2SCkFlhmy0FvJ1F3etSefZCkurWuZ5ScVDT/RcubLknTahFMlf.', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(828, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.commaaxs', 5, NULL, '$2y$10$Sn29bkAbRJ9YvM58QGA2YOSuM2tifu5saMipEYxZlf1Oy0SIBKNBW', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(829, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.commaaxs', 5, NULL, '$2y$10$mJzTw0tZlrTPrfaSsgfl1OKFMQ8ASuZn2tP9YjQtL1enyLBlJfeZa', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(830, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.commaaxs', 5, NULL, '$2y$10$I0NnA4ml8TGcKjZkWrITmueyn9fXO28TY67PT/jS8Zg..2rDr7l9.', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(831, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.commaaxs', 5, NULL, '$2y$10$ssifTVWjIc1AgyFK.yRbmeCG2vvJ/I/igu2JCmA9K.nCaLyNqqQnW', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(832, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.commaaxs', 5, NULL, '$2y$10$3Es6i61gLWPX6uwgWF2qXeDcTE6CkWIwboiB1.svUL/Uqapt3MvpK', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(833, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.commaaxs', 5, NULL, '$2y$10$ykweqDl.JbA2kbh1VIq80OpDK9YGMJRcnCLBUGsGt4Dvl/NB8Vv1O', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(834, NULL, 'sdss', 'sdss', 'siswdsdsdsdsdsaass@ffes.commaaxs', 5, NULL, '$2y$10$dBxxmesxmJxg/vW0auPIm.sK47x3Y9w/ORO60pGZv.pXu2u6FSu3K', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(835, NULL, 'dsdsdsdsdsd', 'dsdsdsdsdsd', 'Emaildwwdswdsw@dsd.comaaxs', 5, NULL, '$2y$10$aEB/2C/2BmaOhUSGDurg1emYCw7xnm3g2PNxDAd/OM4OSMn1o84MW', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(836, NULL, 'Ari Hadydsdsdsa Achmad', 'Ari Hadydsdsdsa Achmad', 'ari@gmail.comffefefeds22222222aaxs', 5, NULL, '$2y$10$7RVKCDpRy15gw0.Jkb5b.uOyGfs2/coxnoWngi3ZdGiKswO8Mgtpq', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(837, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.comfefeaaxs', 5, NULL, '$2y$10$8/IZStE95PWL7Szth1UDne0kS.Hv0CjiFHnigs0hjbHdxnHENPUgq', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(838, NULL, 'Adi Hidayat', 'Adi Hidayat', 'adi@gmail.comfefaaxs', 5, NULL, '$2y$10$ZTITAz.31Nh9ZvgvqKhFiuUu/OsQ6fU8PQUg5ZHiwBW9wnqOgjjGW', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(839, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.comfefeaaxs', 5, NULL, '$2y$10$BQPDPo9i9OXEjlQQYJIqDOY1j8Ux6RSbTJ2Y2sCOEV3DP40KMxxKW', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(840, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.comfefaaxs', 5, NULL, '$2y$10$plwZMXm2rQAKm1j.u0ghu.OsQySpSS0xdVNJ3vhpP59wDIRIR./Ha', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(841, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.dwwdaaxs', 5, NULL, '$2y$10$fwB/2jkXGSs/qvoCF1dwdOPGpAMnwOM1MYQ8t5QDRLweGXaC/AlzO', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(842, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.comdwdwaaxs', 5, NULL, '$2y$10$vl0xqEfhBQwbGCkoyLlf1eBzGlcVv92soCNUI2g8Z1tsT8qZdi9uy', NULL, '2023-01-09 10:04:43', '2023-01-09 10:04:43'),
(843, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.comdwdaaxs', 5, NULL, '$2y$10$3JD0oj6AUdPPkpyd8O8pxuKEbpVfjgcUeHWEOY6j3mNuToHu.pY7O', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(844, NULL, 'sdwdsd', 'sdwdsd', 'siswaass@ffes.comdwwdaaxs', 5, NULL, '$2y$10$KRHyJqG/XOGamgABN0YrDei9tR5FkHqR4n3Mtp5WF9hmY74pr/jE6', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(845, NULL, 'Namawsdw Siswa', 'Namawsdw Siswa', 'Emailddwd@Dds.coaaaxs', 5, NULL, '$2y$10$cUa8W6uw0DutZyBNzRNpJekL/xudOqbwvJRzvkIiE0dJdrLvDZcvC', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(846, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.comdsds3232111aaxs', 5, NULL, '$2y$10$eUTLpdqYM/Dsp7TLSOIeZ.SV.uq7da6dEPJFdGNt9Ppb3m9dr6mDS', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(847, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.comdsdsaaxs', 5, NULL, '$2y$10$VbFuzd5CNUqWVjkMUuVyXuHqj1YAXqc2W2pF0zLL8uuxliPylNt8m', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(848, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.comdsdaaxs', 5, NULL, '$2y$10$rlzCmxb6WqG9O//v0lUU6ePZv.m2qBpsfibQh.Z4zSSXSuHwsfj3u', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(849, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.comdsdaaaxs', 5, NULL, '$2y$10$IgXgbMdjRn7pdo0QqnwaNemcar1U5yNuiFi8jBfQKufNnmxgSF0qC', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(850, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.dsaaxsxs', 5, NULL, '$2y$10$Yp95V58On7quSgT5jmH9HOVzeo1U2XN1ASLWJJHdAqhHP9EElP7ui', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(851, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.commmdsdsaaxs', 5, NULL, '$2y$10$mgTebxf0qTyOLt/.U8EC0uuPaKAlgoc/qzKYHzUdiM1l8Oqw3t5EO', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(852, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.commmdsdaas', 5, NULL, '$2y$10$C7UHgCL80u4tb27pPK6ZjuU1N/xKC1BITfg0xuW.g7Mn89U110Dlu', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(853, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.commamdsdsaxs', 5, NULL, '$2y$10$mGicR6jRYXaQFDlWfBHO5ud9gYqYhtKEsI266e/FPK7Fqfb8ZcgiW', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(854, NULL, 'dsfrtry', 'dsfrtry', 'siswdsdsdsdsdsaass@ffes.commmdsadsaxs', 5, NULL, '$2y$10$bghDd1qILQGBNAPrOSTXL.oze/qdGJinPD1efmJsH/g1s9xQUXDL6', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(855, NULL, 'sdsdsdsdsds', 'sdsdsdsdsds', 'sdwasdw@dsdwd2dw.commmmdsddaaxsx', 5, NULL, '$2y$10$m/uiCoB8LWBPfI4nLeD5P.Ha8una3i3gC9LLmKna0JPmf5PmuIq.u', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(856, NULL, 'Ari Hadya Achmad', 'Ari Hadya Achmad', 'ari@gmail.commddddsd2323aaxs', 5, NULL, '$2y$10$mKWwwEC1tzmX3fSaJ1/5AOyxB4tR8cZO99jpqChTJToTR71kUcGUa', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(857, NULL, 'Syawal Achmad Junaidi', 'Syawal Achmad Junaidi', 'syawal@gmail.commddddsdaaxs', 5, NULL, '$2y$10$1bze4e4HmoWztOUXRZyhVuzdjSAiep8vzDH14fG3uT5k7uQsHjlES', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(858, NULL, 'Adi Hidayat', 'Adi Hidayat', 'sdwasdw@dsdwd2dw.commmamdsddsaasaaxs', 5, NULL, '$2y$10$/APbgFKoEp679nJP4bcFm.Odm893zEsRNCUzovFaQTa.dOjzL8Cla', NULL, '2023-01-09 10:04:44', '2023-01-09 10:04:44'),
(859, NULL, 'Tyan Sucipto', 'Tyan Sucipto', 'tian@gmail.commddddsdsaaxs', 5, NULL, '$2y$10$HLpDEdsgL0Y35psa4vp/NOv4ovh8gAWYs37d9I72wQTIZ22kTPwZS', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(860, NULL, 'Deti Kusnidewi', 'Deti Kusnidewi', 'deti@gmail.commddsdsaaxs', 5, NULL, '$2y$10$Wt4/ervA.Dk2UfXTOZh1v.8cTSbq70LZlC4J10z/HVnLoaZ9GWbU6', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(861, NULL, 'Romi Achmad Kurniawan', 'Romi Achmad Kurniawan', 'romi@gmail.commddsdaas', 5, NULL, '$2y$10$h/rb.pIx9AtH6LjD04HAWO.V4E/Fdq7ivT8HmyGju/y0a3wundUzO', NULL, '2023-01-09 10:04:45', '2023-02-03 07:56:15'),
(862, NULL, 'Udin Penyok Kurniawan', 'Udin Penyok Kurniawan', 'udin@gmail.commddsdaaxs', 5, NULL, '$2y$10$egWnqhsm3FwCsLbfODE2Fec15AJ7BSSQXLMIjWp7kGB4cKk5/DiOO', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(863, NULL, 'Ananda Dimmas Budiarto', 'Ananda Dimmas Budiarto', 'anandadimmas@gmail.commdsdsaaxs', 5, NULL, '$2y$10$STVQ5mfu1l4WLmyRlG.QNecECT4Yq1fTSIbdsztQuG2X1nucwFr1G', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(864, NULL, 'dsw', 'dsw', 'siswaass@ffes.commddsddaaxs', 5, NULL, '$2y$10$Xlb99jZf8OwkC3U4myr6/.6wHl2blgLvea1h.fQ/KAdvrJYViwOYC', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(865, NULL, 'dsdsdsdsdsd', 'dsdsdsdsdsd', 'Emaild@Jkj.commddsdaaxs', 5, NULL, '$2y$10$s.QgikEbjQ/si6epxOB7p.zaFuBeWzKYSzdNAmzres2vVzhWEfO8m', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(866, NULL, 'Ari Haswsdya Achmad', 'Ari Haswsdya Achmad', 'addsdri@gmail.commdsdsssd23232aaxs', 5, NULL, '$2y$10$canxRi4kbulBONdMCAj11uueKxgaKOhZWZcLfTjMwk6FjwaJdkR0e', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(867, NULL, 'Syadetwal Achmad Junaidi', 'Syadetwal Achmad Junaidi', 'sydsdsawal@gmail.commddsdaaaxs', 5, NULL, '$2y$10$4LOtyYXKJEbG1jpqKZSTAefgi0Yoh44XWz5tPlJbZ0vgl5Wy/GNsm', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(868, NULL, 'Adfdfei Hidayat', 'Adfdfei Hidayat', 'addsdsdi@gmail.commdfdfaaxs', 5, NULL, '$2y$10$f20Q96PdeskrJFoPdZk1W.erOV8yz8n6fTD8jLAbaXbq1Jmbq8lYe', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(869, NULL, 'Tyffdan Sucipto', 'Tyffdan Sucipto', 'tiadsdsn@gmail.commdfdfaaxs', 5, NULL, '$2y$10$zgH26jM8TbbZC3JpBTqtvulqfnXBesK7Rtc0C7Ipk69HEMglpBSym', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(870, NULL, 'Deti fdfdKusnidewi', 'Deti fdfdKusnidewi', 'ddsdseti@gmail.commddfaaxs', 5, NULL, '$2y$10$Opxu0FtoBmZHFpl3k7t55uf3Yc2nyJdVtQkkxQwUCEa.8Fb3BVR6u', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(871, NULL, 'Romifdfd Achmad Kurniawan', 'Romifdfd Achmad Kurniawan', 'rodsdsmi@gmail.commdfdfaaxs', 5, NULL, '$2y$10$cZFO0YfRI8DOn4RE1v0PBe8mFuWsroSEXEsYbpnE7cFkjJwInR7ZG', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(872, NULL, 'Udin Pfdfdenyok Kurniawan', 'Udin Pfdfdenyok Kurniawan', 'uddsdssin@gmail.commdfdfaaxs', 5, NULL, '$2y$10$l0eIGq6UcHZqyHwaiGjiouV4yq0lrAiV43j.T7RHKusiC0ju1xNkO', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(873, NULL, 'Anandfdfa Dimmas Budiarto', 'Anandfdfa Dimmas Budiarto', 'anadsdsdsndadimmas@gmail.commdafdfaaxs', 5, NULL, '$2y$10$ljhs5keuar/TtgzlzWwLv.iIc2q2BWCmzihjYy1jYdoHqE14PfTx.', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(874, NULL, 'sdss', 'sdss', 'siswdsdsdsdsdsaass@ffes.commdfdfaaxs', 5, NULL, '$2y$10$5FbfqJs4ng1EzFkPT6QOCOiyqiRWvqGdvgYpf7nw4fvkvppFSR946', NULL, '2023-01-09 10:04:45', '2023-01-09 10:04:45'),
(875, NULL, 'sd', 'sd', NULL, 4, NULL, '$2y$10$Giew2pom4Ivf7dtIVp.o7erjcXqHrgHMwpT/6cIxDWXRt7dDuL8py', NULL, '2023-01-11 06:54:52', '2023-01-11 07:03:59'),
(879, NULL, 'uus', 'uus', 'uus@gmail.com', 5, NULL, '$2y$10$SZBbkRXsq3XNc97aCCCxk.Dd0zIN1SxWMoF6YPrbG4iu44ByDoV/i', NULL, '2023-01-11 08:04:45', '2023-01-11 08:04:45'),
(880, NULL, 'hani', 'hani', 'hani@gmail.com', 5, NULL, '$2y$10$x61wEat5cXeUzIWF0P5pzOnNWJrvJTTsuioHmLLic..iyu36G1Vmm', NULL, '2023-01-11 08:26:29', '2023-01-11 09:13:25'),
(884, NULL, 'dimmas ketipung', 'dimmas ketipung', 'dimmasketipung@gmail.com', 5, NULL, '$2y$10$q6kA73YV.lrSjOq6TPQnaugcf3.FhGi7yVdQArQbvpiPBtCzzU9MS', NULL, '2023-01-12 03:37:44', '2023-01-12 03:37:44'),
(885, NULL, 'dimmas', 'dimmasakudimmaskan', 'anandadimmas1204@gmail.com', 5, NULL, '$2y$10$cIES8NFfslD.vKBm2m4wQe9sfQWqFzkhW2GyKXAhie7uUHkyjedjq', NULL, '2023-01-16 07:53:39', '2023-04-17 01:47:07'),
(886, NULL, 'muehehe', 'muehehe', 'anandadimmasb@gmail.com', 5, NULL, '$2y$10$hl6LwmR4Gyvho2RlOrtHKeYAIX43Ml3IxVwC1tm.XePVLNiAfeOIG', NULL, '2023-01-16 08:00:55', '2023-01-16 08:00:55'),
(887, NULL, 'adi hidayat', 'adi hidayat', 'Dians92m.work@gmail.com', 5, NULL, '$2y$10$ZOoM1JabBYjix.t7hmULx.qvK7HQGGhBaGbZ8e5uVqYe56NhpXiv6', NULL, '2023-01-16 08:14:34', '2023-01-16 08:14:34'),
(888, NULL, 'peserta', 'peserta', 'peserta@gmail.com', 5, NULL, '$2y$10$54VaKiZm/7/bKffPFSt80.K91fPskkHZaE2nGF0yIfBrgW.dC6eI.', NULL, '2023-02-02 08:24:22', '2023-02-02 08:24:22'),
(889, NULL, 'nama ortuku nih bos', 'nama ortuku nih bos', 'hahahahah@gmil.com', 4, NULL, '$2y$10$0pmitrXHanUgFCAPD1Fsl.Y2kIuywshjLNlrwhVuD3pKTPms6j2GK', NULL, '2023-02-03 07:10:49', '2023-02-03 07:56:14'),
(890, NULL, 'achmad', 'achmad', 'achmad@gmail.com', 5, NULL, '$2y$10$P8hTiNZ0JrMghu60Yo.6YOCCLe.hquB5ybh.WnHwAodvq79hfZ8hW', NULL, '2023-02-05 13:55:29', '2023-02-05 13:55:29'),
(891, NULL, NULL, NULL, 'yaha@gmail.com', 1, NULL, '$2y$10$ir5kQ7snoo2SAxAl8r7TAerxt2.DvNdm1JSdeXhKq0Yv0zoucfi76', NULL, '2023-02-20 06:37:28', '2023-02-20 06:37:28'),
(892, NULL, 'yihi', 'yihi', 'yihi@gmail.com', 1, NULL, '$2y$10$uuSEGAbF59iHBKZzrLLIPuF0WLLVUsvxAiHw6HhCYiBmLClN.dGHe', NULL, '2023-02-20 06:52:25', '2023-02-20 06:52:25'),
(895, NULL, 'haha', 'haha', 'yahaha@gmail.com', 1, NULL, '$2y$10$SJnI7M0m/h2JYyvy1ywMLOwbtMzulCW6JvYLWwnSI4yu01gwLutaa', NULL, '2023-02-20 06:53:46', '2023-02-20 06:53:46'),
(898, NULL, 'tesguru', 'tesguru', 'tesguru@gmail.com', 3, NULL, '$2y$10$ZzDW7su4uxr/t8JdX2qVTud97jHxXkJqidEzZfuQwcoGXSmqdU26C', NULL, '2023-02-20 07:45:37', '2023-02-20 07:45:37'),
(899, NULL, 'testingppdb', 'testingppdb', 'testingppdb@gmail.com', 5, NULL, '$2y$10$H6B1FNRSajHmWHBDBtBUjuqoXnF.F/chafCNAUAiMSSkxOIv.7vY6', NULL, '2023-02-23 02:46:50', '2023-02-23 02:46:50'),
(900, NULL, 'untung', 'untung', 'untung@gail.com', 5, NULL, '$2y$10$VEQIJ7GpuPTxscid9aavzu0kDTrKsL9cwsBi4mu8xEZWOmxEgDk6.', NULL, '2023-02-23 03:40:06', '2023-02-23 03:40:06'),
(901, 1, 'dayat', 'dayat', 'dayat@gmail.com', 5, NULL, '$2y$10$iNGCTPvS16j8q2ACpwA4MOwXMkxkx.pJm1M9wQiv3GyhUlIEoe0W6', NULL, '2023-02-23 07:14:21', '2023-02-23 08:31:07'),
(902, 1, 'tes', 'tes', 'testes@gmail.com', 5, NULL, '$2y$10$Ep7EX4EaIKfllfc4uE/3I.WOFeh9B6llADiNIkw.IneRV1aDKsZ6.', NULL, '2023-02-23 07:17:07', '2023-02-23 08:31:07'),
(903, NULL, 'Hendra', 'Hendra', 'adharinurul80@gmail.com', 5, NULL, '$2y$10$/6D8SFBCqGN/KpJWbjB3dOSjknCzqb4n8n625rp/ACdrzTIB8bENK', NULL, '2023-02-23 09:33:04', '2023-02-23 09:33:04'),
(904, NULL, 'jurusan', 'jurusan', 'jurusan@gmail.com', 5, NULL, '$2y$10$j28wm07rezw7PSTH3OoYmujH4hDojlInmnQv9HNDEEqnEI6SwY2Pa', NULL, '2023-03-07 08:47:05', '2023-03-07 08:47:05'),
(905, NULL, 'Jojon Terry', 'Jojon Terry', 'cobacobaajeh2@gmail.com', 5, NULL, '$2y$10$VLZLoAnmAEIprcX3B4gNF.O78DzA4MI0VLyRHqPvQhHbI0hw4iUlq', NULL, '2023-03-14 04:35:02', '2023-03-16 06:42:16'),
(906, NULL, 'eqy', 'eqy', 'caniasak@gmail.com', 5, NULL, '$2y$10$5FzYdK2Mzq7CmpoYq3s77exH/doAu384PUkX8NZRm6FUVSofGzY1y', NULL, '2023-03-16 07:05:21', '2023-03-16 07:05:21'),
(907, NULL, 'qqqq', 'qqqq', 'qwdadadsd@gmail.com', 5, NULL, '$2y$10$r/HsfLX7tSnSZsWSVOjhJe4f81mO7zmEE/QDTTcNTdyt4H0Sb2aNW', NULL, '2023-03-16 07:08:28', '2023-03-16 07:08:28'),
(908, NULL, 'Jojons', 'Jojons', 'jojons123@gmail.com', 4, NULL, '$2y$10$O3ePsKvQUK.ACQ6N/jt56ebdSwaZSuc4gs/cNqc3DPHPqhgmn6XRK', NULL, '2023-04-13 06:10:29', '2023-04-13 06:10:29'),
(909, NULL, 'mauldimmasbersatu', 'mauldimmasbersatu', 'jertezotri@gufum.com', 5, NULL, '$2y$10$3ouIxC/eHrS7ILkbithdf.2H6GA.t3zupjMkkuM62in44rXM.Tiwi', NULL, '2023-04-13 06:10:29', '2023-04-13 06:10:29'),
(910, NULL, 'ytyty', 'ytyty', 'ffeasfasf@gmail.com', 4, NULL, '$2y$10$IZui7y61oC7uZ4nQkd1Fl.jN0Vomqg7F7qYdiwbSYFkzHPtggKVc6', NULL, '2023-04-14 03:32:30', '2023-04-14 03:32:30'),
(911, NULL, 'dimasraa', 'dimasraa', 'pordudakku@gufum.com', 5, NULL, '$2y$10$Q2X0Y4pyUkZTpYVdIp2xAu2Fq7PhUybkyf5w6NMVvgZrv7xBYXptC', NULL, '2023-04-14 03:32:30', '2023-04-14 03:32:30'),
(912, NULL, 'taudah', 'taudah', 'asfbaiosfb@gmail.com', 4, NULL, '$2y$10$k.DT6FBQofqhhvmDkWJPkeufhR3/am1rC5chQ7PAutwO59z.Mm972', NULL, '2023-04-17 08:18:12', '2023-04-17 08:18:12'),
(913, NULL, 'Alif', 'Alif', 'jeltajurzo@gufum.com', 5, NULL, '$2y$10$fGdh/cyuKmQ5bPZAEFibluhfmcRVK82zEAI7p0CUm4tnUVQmqqn6W', NULL, '2023-04-17 08:18:13', '2023-04-17 08:18:13'),
(915, NULL, 'taudah', 'taudah', 'bapakalif@gmail.com', 4, NULL, '$2y$10$lwA//0UGg2R9/yB3cG61.ufJTvMEQeKokxZbhzyNIU3GB9FZnbykO', NULL, '2023-04-17 08:19:40', '2023-04-17 08:19:40'),
(919, NULL, 'taudah', 'taudah', 'lustiholmo@gufum.com', 4, NULL, '$2y$10$bHGckEzvD4hje5oSzHNR1OMVFvpsf/D9YHjb6dSZyFrNuWiCuWLke', NULL, '2023-04-17 08:22:26', '2023-04-17 08:22:26'),
(920, NULL, 'Alif', 'Alif', 'aliffarie@gmail.com', 5, NULL, '$2y$10$8T5TibKB64WX17YyOiA6SeG1giW0tR3zRNspFKfxlKDFC9GQGTWdu', NULL, '2023-04-17 08:22:26', '2023-04-17 08:22:26'),
(922, NULL, 'taudah', 'taudah', 'lustiholmo1@gufum.com', 4, NULL, '$2y$10$E47Dokxo29TSclQIE6wHNu4SUVrTyBZgVICkR6yzxIUJzNJNQ8Rii', NULL, '2023-04-17 08:23:04', '2023-04-17 08:23:04'),
(924, NULL, 'taudah', 'taudah', 'lustiholmo11@gufum.com', 4, NULL, '$2y$10$DzY87GkDNKUpn0PIB2aeROorVoRi5QIn3lc8D7f5ubTcqZCknEdGK', NULL, '2023-04-17 08:23:24', '2023-04-17 08:23:24'),
(925, NULL, 'Alif', 'Alif', 'aliffarie1@gmail.com', 5, NULL, '$2y$10$N.JmDcQTorigNlXIB.mhTeSmlAFMDkjplCXZfGnZt8JnpJdL3BnMy', NULL, '2023-04-17 08:23:24', '2023-04-17 08:23:24'),
(926, NULL, 'asep', 'asep', 'adada@gmail.com', 4, NULL, '$2y$10$11s12CV/aVedTtw0kfrsReWmm9oI6.DaigczNP6CCc4.7GR.rJ5.6', NULL, '2023-04-27 03:26:23', '2023-04-27 03:26:23'),
(927, NULL, 'Sayang Anak', 'Sayang Anak', 'meknovadro@gufum.com', 5, NULL, '$2y$10$wfuHAvbbgCq.i.bQbzEECeoLAibzSagV467zw5OHZhyZdlH2Sya/q', NULL, '2023-04-27 03:26:24', '2023-04-27 03:26:24'),
(928, NULL, 'Prof.Dr.Megachan', 'Prof.Dr.Megachan', 'megacan@gmail.com', 3, NULL, '$2y$10$eq8IwsIAOA89NOO1ArHYOOHS1DbOuKdrPYOOmaF8x/1O0Y70bTpGi', NULL, '2023-04-27 03:36:16', '2023-05-02 07:21:49'),
(929, NULL, 'aa', 'aa', 'sjfnsfos@gmail.com', 4, NULL, '$2y$10$1S99pK2tU7t1NRIyao0UgOXEz/TDeTu2M3RbqsTNH.7QVsJ9C7rbW', NULL, '2023-04-27 04:18:29', '2023-04-27 04:18:29'),
(932, NULL, 'aa', 'aa', 'sjfnsjbfos@gmail.com', 4, NULL, '$2y$10$ZTgkigxW1UK4wLZ234hqO.jzZpAdoFjXMf0u7myZ4fUfPTe1r5nGa', NULL, '2023-04-27 04:18:52', '2023-04-27 04:18:52'),
(934, NULL, 'aa', 'aa', 'sjfnsjbf1111111os@gmail.com', 4, NULL, '$2y$10$0RMPTYvS6eHPl.wzwaItIeQoHjRIjxfPlqSv/XLQhwtyBRXHetyNK', NULL, '2023-04-27 04:19:18', '2023-04-27 04:19:18'),
(935, NULL, 'Alif', 'Alif', 'aliff11arie1@gmail.com', 5, NULL, '$2y$10$CuGc9prBsEvEC4kld.T5T.P3a/0OGwtOd81gQn2mq/WdUrXd0hmSe', NULL, '2023-04-27 04:19:18', '2023-04-27 04:19:18'),
(936, NULL, 'Fezra Noor', 'Fezra Noor', 'fezranoorsaputro15@gmail.com', 4, NULL, '$2y$10$/KVVgoLAHwxzoPorw7zToO3iEmGxDcGfQvnH/jLWT/UT7cpk.YNyS', NULL, '2023-04-28 06:27:01', '2023-04-28 06:27:01'),
(937, NULL, 'Azalea', 'Azalea', 'fabata9440@larland.com', 5, NULL, '$2y$10$SjQiFv5ln9eZQ9ZlDBw0b.AZ6dHdOV3GFfqdjwUXoX4ZJf2Tykfy2', NULL, '2023-04-28 06:27:02', '2023-04-28 06:27:02'),
(938, NULL, NULL, NULL, NULL, 4, NULL, '$2y$10$2ATA8NE4J767JE5rr7XXzuH4hnT7QllGoGnyIe/gOwEK6GZvCov/a', NULL, '2023-04-28 06:31:10', '2023-05-04 10:05:00'),
(939, NULL, 'maulana', 'maulana', 'galmogayde@gufum.com', 5, NULL, '$2y$10$Hb9Ceg2gyjkIqJfHA3VDwu2Rs8Uit6S3egcMEhIST6Vt.VJhXkY.S', NULL, '2023-04-28 06:31:11', '2023-05-04 10:05:00'),
(940, NULL, 'Pian Mihirini', 'Pian Mihirini', 'Pianmihirini@gmail.com', 3, NULL, '$2y$10$tbJnpgc86tOBbKKGopV0Uul5M5dM.Xpa2SKgKbIwNa3fm7ZV3rDrO', NULL, '2023-04-28 06:52:27', '2023-04-28 06:52:27'),
(941, NULL, NULL, NULL, NULL, 4, NULL, '$2y$10$CiPBtDNfj8mdzf.scSPFKOairbZoI54CqHKo9k.bUAavbgBuQHD5O', NULL, '2023-04-28 09:14:47', '2023-04-28 09:14:47'),
(942, NULL, 'qwerty', 'qwerty', 'pelmalikku@gufum.com', 5, NULL, '$2y$10$KMXrpHy076UniBdLU/OGu.su8Nxaifz9vFIIfdlRnTlxWujt8d8hK', NULL, '2023-04-28 09:14:47', '2023-04-28 09:14:47'),
(943, NULL, 'Bapake', 'Bapake', 'ebfewjb@gmail.com', 4, NULL, '$2y$10$FyTMUOJOQYpaZBI.7B.YouJc3TW5AvqoBlAQ/3QnCHFJRMkjUZvye', NULL, '2023-04-28 09:41:00', '2023-04-28 09:41:00'),
(944, NULL, 'Michael', 'Michael', 'hurdizaltu@gufum.com', 5, NULL, '$2y$10$1vtnjMaJ9GiOrvZxVpUJZ.RHM0H/eqvjck2uGlOWoZMWgCe7Pb.A2', NULL, '2023-04-28 09:41:00', '2023-04-28 09:41:00'),
(945, NULL, 'uwr', 'uwr', 'jdeiqjf@gmail.com', 4, NULL, '$2y$10$58lp6AO0o9d6O/p/Tz0YBOZKrmnX3.uymhgrsCKkyRbSIBozFEd7C', NULL, '2023-04-28 09:41:06', '2023-04-28 09:41:06'),
(946, NULL, 'mumu', 'mumu', 'gutrofegnu@gufum.com', 5, NULL, '$2y$10$Nb0PyHUEjnfHYKuLe855Nuf7XuCT0mMyLkE.EqBsEQYM.IAsS58vu', NULL, '2023-04-28 09:41:06', '2023-04-28 09:41:06'),
(947, NULL, 'taudahh', 'taudahh', 'kewkjfwef@gmail.com', 4, NULL, '$2y$10$R0JlhW6R36n8cBWr/2g5fegkzhr0AREdkiUF2DyOhLvK70kvlXRs2', NULL, '2023-04-28 10:06:31', '2023-04-28 10:06:31'),
(948, NULL, 'Muyo', 'Muyo', 'kofyehutru@gufum.com', 5, NULL, '$2y$10$mFM67HFt1T0GgP8CbZUMj.m9XEJnMnma8b1eSqRUi5UuHY3Hvv47G', NULL, '2023-04-28 10:06:31', '2023-04-28 10:06:31'),
(949, NULL, 'sdfwefqrqwrsadasd', 'sdfwefqrqwrsadasd', 'qwrqwre2@gmail.com', 3, NULL, '$2y$10$/.6WdAWdOAkMBNWyG1K8NurF0dIEQbwiF4R/8ooknAmO/cSbkKLZK', NULL, '2023-05-02 02:58:17', '2023-05-04 03:25:41'),
(950, NULL, 'AAAAAAA', 'AAAAAAA', 'dhus@gmail.com', 4, NULL, '$2y$10$U.bnEMNrM8mY3Cop69LZuelegaJUapdZqtNvi.9EQ1rKXsZ3oOTZ2', NULL, '2023-05-04 02:18:10', '2023-05-05 04:10:32'),
(951, NULL, 'fezraa', 'fezraa', 'yultuburdi@gufum.com', 5, NULL, '$2y$10$iANaYc8AWIddc1h0gmJlsu9m9b4vP5p9jmS/NRfCTG1S8E/nRa8eS', NULL, '2023-05-04 02:18:10', '2023-05-05 04:10:32'),
(952, NULL, 'uerwerj', 'uerwerj', 'nfjwenf@gmail.com', 4, NULL, '$2y$10$Rl5HtPC0qfBY/3EJvIXBme3Cd2BucQx4sXxU5GYNqXPOiplGPJvoC', NULL, '2023-05-04 09:44:49', '2023-05-05 07:11:02'),
(953, NULL, 'asdf', 'asdf', 'sirdokagne@gufum.com', 5, NULL, '$2y$10$M66Ir6GFVX5HNY8.gTzxJew1.eCctPUR/7EsEGuMr24Wdc7ERTb6q', NULL, '2023-05-04 09:44:49', '2023-05-05 07:11:02'),
(954, NULL, 'suhendar', 'suhendar', 'hewfo@gmail.com', 4, NULL, '$2y$10$5SnoevCyMvr8Qyqh/hCZHeQog8SXogeudbfZQ/xgMXbyX549kwU96', NULL, '2023-05-09 03:28:26', '2023-05-09 03:28:26'),
(955, NULL, 'corze', 'corze', 'corzejustu@gufum.com', 5, NULL, '$2y$10$DvFJsTqJN3S0UG4QFXKIWOI8bfm9YtVw8i5Es.J9KO1IBFaqmZf4W', NULL, '2023-05-09 03:28:26', '2023-05-09 03:28:26'),
(956, NULL, 'ijhkjhkjh', 'ijhkjhkjh', 'bbbbh@hbhjhh.ff', 4, NULL, '$2y$10$Al3pXYE3YX6C6trWC.W80uw.xGlVnQBfa4PvYel9APPis9CcLbhaq', NULL, '2023-05-09 09:05:05', '2023-05-09 09:05:05'),
(957, NULL, 'siswabaru1', 'siswabaru1', 'domiri1070@larland.com', 5, NULL, '$2y$10$/z1DH9XU3b5uUDDN4j2ulOQFB8Bqv5p5/mm6xOkqD.GsLEBkCXJS.', NULL, '2023-05-09 09:05:05', '2023-05-09 09:05:05'),
(958, NULL, 'suep', 'suep', 'vordukerko1@gufum.com', 4, NULL, '$2y$10$d9E8p7JPlKXcv9IYEqJ8suf9NWIhK8P6jkB8Zb/DqSB7XlMCSMRg6', NULL, '2023-05-09 09:13:46', '2023-05-09 09:16:55'),
(959, NULL, 'mauldimmasbersatusatu', 'mauldimmasbersatusatu', 'vordukerko@gufum.com', 5, NULL, '$2y$10$KW9Qmsut8qLDk3AhxwFC.ejwPAIibCygjWC6X3jCeHf/oo0YdXek6', NULL, '2023-05-09 09:13:47', '2023-05-09 09:16:56'),
(960, NULL, NULL, NULL, NULL, 4, NULL, '$2y$10$Ou/O4sXskpw11V22ef0U2e7oEFSXkdXnjhIv2OUNER4OJxDefFl3K', NULL, '2023-05-24 15:14:44', '2023-05-24 15:14:44'),
(962, NULL, 'ida', 'ida', 'lala@gmail.com', 4, NULL, '$2y$10$aOxLqqJvaf6b86OU/d8mR.vUMwXpKXkbvasUbGQ./JUZNIhe0ZCzO', NULL, '2023-05-25 03:46:42', '2023-05-25 03:46:42'),
(963, NULL, 'siswa1', 'siswa1', 'siswa9822@gmail.com', 5, NULL, '$2y$10$UvOsmgiUkY0lXV.lDaxcoud/P2BFhuMHgiXXDzA6p8dHmCz/4kTw2', NULL, '2023-05-25 03:46:42', '2023-05-25 03:46:42'),
(964, NULL, 'penyok', 'penyok', 'penyok@gmail.com', 3, NULL, '$2y$10$4w4tgxraKR9WTdnY4B7M6eDSm4Q4a1PKv14N6n.JlG4XZfDeDC25W', NULL, '2023-06-18 00:23:12', '2023-06-18 00:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `wali_dan_siswas`
--

CREATE TABLE `wali_dan_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user_wali` int(11) DEFAULT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `wali_siswa_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wali_dan_siswas`
--

INSERT INTO `wali_dan_siswas` (`id`, `id_user_wali`, `id_user_siswa`, `siswa_id`, `wali_siswa_id`, `created_at`, `updated_at`) VALUES
(10, NULL, 0, 1, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wali_siswas`
--

CREATE TABLE `wali_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_bapak` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `pekerjaan_bapak` varchar(100) DEFAULT NULL,
  `penghasilan_bapak` varchar(100) DEFAULT NULL,
  `agama_bapak` varchar(100) DEFAULT NULL,
  `agama_ibu` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `no_telp_bapak` varchar(100) DEFAULT NULL,
  `no_telp_ibu` varchar(20) DEFAULT NULL,
  `email_bapak` varchar(100) DEFAULT NULL,
  `email_ibu` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wali_siswas`
--

INSERT INTO `wali_siswas` (`id`, `id_user`, `nama_bapak`, `nama_ibu`, `pekerjaan_bapak`, `penghasilan_bapak`, `agama_bapak`, `agama_ibu`, `alamat`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_telp_bapak`, `no_telp_ibu`, `email_bapak`, `email_ibu`, `created_at`, `updated_at`) VALUES
(33, 117, 'nmnmn', 'dsefdc', 'mnmnm', '34343', NULL, NULL, NULL, 'dsdedsd', '434343', '23232', '32323', 'bapakku@fdmfn.com', 'ibuku@fffd.com', '2023-01-06 09:47:08', '2023-04-28 04:29:28'),
(35, 301, 'nama bapakku', NULL, NULL, NULL, 'Kristen', 'Kristen', NULL, NULL, NULL, '4343', '3433', NULL, NULL, '2023-01-09 07:35:54', '2023-01-25 02:41:04'),
(36, 875, 'sd', NULL, NULL, NULL, 'Kristen', 'Kristen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 06:54:52', '2023-01-11 07:03:59'),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08989898', '899898', NULL, NULL, '2023-01-11 08:04:45', '2023-01-11 08:04:45'),
(38, NULL, 'sutanto', NULL, 'ngarit', NULL, 'Kristen', 'Kristen', NULL, NULL, NULL, '0989898', '89809890', NULL, NULL, '2023-01-11 08:26:29', '2023-01-11 09:13:25'),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089765432345', '089765432345', NULL, NULL, '2023-01-12 03:37:08', '2023-01-12 03:37:08'),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089765432345', '089765432345', NULL, NULL, '2023-01-12 03:37:44', '2023-01-12 03:37:44'),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08977656788977', '0089866578', NULL, NULL, '2023-01-16 07:53:39', '2023-01-16 07:53:39'),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08977656788977', '0089866578', NULL, NULL, '2023-01-16 07:54:07', '2023-01-16 07:54:07'),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08977656788977', '0089866578', NULL, NULL, '2023-01-16 07:54:20', '2023-01-16 07:54:20'),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08977656788977', '0089866578', NULL, NULL, '2023-01-16 07:54:43', '2023-01-16 07:54:43'),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:00:55', '2023-01-16 08:00:55'),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:02:00', '2023-01-16 08:02:00'),
(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:03:39', '2023-01-16 08:03:39'),
(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:05:33', '2023-01-16 08:05:33'),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:06:04', '2023-01-16 08:06:04'),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:06:33', '2023-01-16 08:06:33'),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:06:45', '2023-01-16 08:06:45'),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:07:00', '2023-01-16 08:07:00'),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:07:07', '2023-01-16 08:07:07'),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08990980', '0980980', NULL, NULL, '2023-01-16 08:07:52', '2023-01-16 08:07:52'),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089876890987', '089765678908', NULL, NULL, '2023-01-16 08:14:34', '2023-01-16 08:14:34'),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '089089809889', '098098098098', NULL, NULL, '2023-02-02 08:24:22', '2023-02-02 08:24:22'),
(58, 889, 'nama ortuku nih bos', 'ddada', 'halo', '3232323332', 'Islam', 'Islam', NULL, 'adad', '0909090', '0909090909', '0909090909', 'hahahahah@gmil.com', 'namaortukunih@gmaik.com', '2023-02-03 07:10:49', '2023-02-03 07:56:14'),
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0868566', '00856655', NULL, NULL, '2023-02-05 13:55:29', '2023-02-05 13:55:29'),
(60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0890980808098', '08098908908980', NULL, NULL, '2023-02-23 02:46:50', '2023-02-23 02:46:50'),
(61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08909880808', '09809809890', NULL, NULL, '2023-02-23 03:40:06', '2023-02-23 03:40:06'),
(62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08989080809', '9080988908', NULL, NULL, '2023-02-23 07:14:21', '2023-02-23 07:14:21'),
(63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '098080988', '0880880', NULL, NULL, '2023-02-23 07:17:07', '2023-02-23 07:17:07'),
(64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085254911334', '081224095456', NULL, NULL, '2023-02-23 09:33:04', '2023-02-23 09:33:04'),
(65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0880', '09809', NULL, NULL, '2023-03-07 08:47:05', '2023-03-07 08:47:05'),
(66, NULL, 'tau siapa', 'itu pokonya', 'pengangguran', '500.000', NULL, NULL, NULL, 'pengacara', '300.000', '085156010000', '08888222357', 'tausiapa@gmail.com', 'itupokonya@gmail.com', '2023-03-14 04:35:02', '2023-03-16 06:42:16'),
(67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '088888222', '082121212', NULL, NULL, '2023-03-16 07:05:21', '2023-03-16 07:05:21'),
(68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0990909090', '090909090', NULL, NULL, '2023-03-16 07:08:28', '2023-03-16 07:08:28'),
(69, 908, 'Jojons', 'Nenk', 'pengangguran', '100000000', 'islam', 'islam', NULL, 'pengacara', '102000000000', '082172810987', '08888222357', 'jojons123@gmail.com', 'nenenek@gmail.com', '2023-04-13 06:10:29', '2023-04-13 06:10:29'),
(70, 910, 'ytyty', 'adadqw', 'dadas', '200000000', 'islam', 'islam', NULL, 'sadasdsad', '20000000', '1233123123123', '212121212121212', 'ffeasfasf@gmail.com', 'ugawduads@gmail.com', '2023-04-14 03:32:30', '2023-04-14 03:32:30'),
(71, 912, 'taudah', 'taujuga', 'boss permata bank', '9999999', 'islam', 'islam', NULL, 'asdhoasid', '9999999999', '089876543210', '089876543210', 'asfbaiosfb@gmail.com', 'fjoasfoasf@gmail.com', '2023-04-17 08:18:12', '2023-04-17 08:18:12'),
(72, 915, 'taudah', 'taujuga', 'boss permata bank', '10000', 'islam', 'islam', NULL, 'asdhoasid', '10000', '089876543210', '089876543210', 'bapakalif@gmail.com', 'nyokapalip@gmail.com', '2023-04-17 08:19:40', '2023-04-17 08:19:40'),
(73, 919, 'taudah', 'taujuga', 'boss permata bank', '10000', 'islam', 'islam', NULL, 'asdhoasid', '10000', '089876543210', '089876543210', 'lustiholmo@gufum.com', 'nyokapalip@gmail.com', '2023-04-17 08:22:26', '2023-04-17 08:22:26'),
(74, 922, 'taudah', 'taujuga', 'boss permata bank', '10000', 'islam', 'islam', NULL, 'asdhoasid', '10000', '089876543210', '089876543210', 'lustiholmo1@gufum.com', 'nyokapalip@gmail.com', '2023-04-17 08:23:04', '2023-04-17 08:23:04'),
(75, 924, 'taudah', 'taujuga', 'boss permata bank', '10000', 'islam', 'islam', NULL, 'asdhoasid', '10000', '089876543210', '089876543210', 'lustiholmo11@gufum.com', 'nyokapalip1@gmail.com', '2023-04-17 08:23:24', '2023-04-17 08:23:24'),
(76, 926, 'asep', 'Ijem', 'PNS', '9000000', 'kristen', 'kristen', NULL, 'pengacara', '800000', '08928282992', '09282229292', 'adada@gmail.com', 'fwf@gmail.com', '2023-04-27 03:26:23', '2023-04-27 03:26:23'),
(77, 929, 'aa', 'iefjeif', 'aaaaa', '90000000', 'islam', 'islam', NULL, 'knfkwefn', '80000000', '39202332', '39303230', 'sjfnsfos@gmail.com', 'fewfn@gmail.com', '2023-04-27 04:18:29', '2023-04-27 04:18:29'),
(78, 932, 'aa', 'iefjeif', 'aaaaa', '90000000', 'islam', 'islam', NULL, 'knfkwefn', '80000000', '39202332', '39303230', 'sjfnsjbfos@gmail.com', 'fewfn@gmail.com', '2023-04-27 04:18:52', '2023-04-27 04:18:52'),
(79, 934, 'aa', 'iefjeif', 'aaaaa', '90000000', 'islam', 'islam', NULL, 'knfkwefn', '80000000', '39202332', '39303230', 'sjfnsjbf1111111os@gmail.com', 'few111fn@gmail.com', '2023-04-27 04:19:18', '2023-04-27 04:19:18'),
(80, 936, 'Fezra Noor', 'Maudina Salbia', 'PNS', '9000000', 'islam', 'islam', NULL, 'PNS', '8000000', '087885442331', '085723237654', 'fezranoorsaputro15@gmail.com', 'maudisalbia@gmail.com', '2023-04-28 06:27:01', '2023-04-28 06:27:01'),
(81, 938, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-28 06:31:10', '2023-05-04 10:05:00'),
(82, 941, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-28 09:14:47', '2023-04-28 09:14:47'),
(83, 943, 'Bapake', 'usjfnwqf', 'PNS', '900000', 'islam', 'islam', NULL, 'wqjfnqwf', '84930393', '023425689', '02882489234', 'ebfewjb@gmail.com', 'jfebwfjwenf@gmail.com', '2023-04-28 09:41:00', '2023-04-28 09:41:00'),
(84, 945, 'uwr', 'wajaf', 'uwqhf', '3000000', 'islam', 'islam', NULL, 'jwffjqw', '3913200', '03299238', '9328023', 'jdeiqjf@gmail.com', 'ewnfjwnefl@gmail.com', '2023-04-28 09:41:06', '2023-04-28 09:41:06'),
(85, 947, 'taudahh', 'Muhfhjf', 'pns', '92840248', 'islam', 'kristen', NULL, 'jsbfkja', '763743748', '0202838394', '36294710', 'kewkjfwef@gmail.com', 'jhbfwjefb@gmail.com', '2023-04-28 10:06:31', '2023-04-28 10:06:31'),
(86, 950, 'AAAAAAA', 'sjaddsl', 'ASDDSA', '30238', NULL, NULL, NULL, 'bfasfbl', '208308', '823940', '2971491274', 'dhus@gmail.com', 'dasjbdasjd@gmail.com', '2023-05-04 02:18:10', '2023-05-05 04:10:32'),
(87, 952, 'uerwerj', 'fjnsdfjndf', 'woefnwlefn', '23942304', NULL, NULL, NULL, 'wefweffe', '832492384', '32740234', '238740234', 'nfjwenf@gmail.com', 'nwefnwef@gmail.com', '2023-05-04 09:44:49', '2023-05-05 07:11:02'),
(88, 954, 'suhendar', 'eowrjr', 'yaqueen', '900303', 'islam', 'islam', NULL, 'kwenwef', '39423', '08212727239', '02183939384', 'hewfo@gmail.com', 'whefbsn@gmail.com', '2023-05-09 03:28:26', '2023-05-09 03:28:26'),
(89, 956, 'ijhkjhkjh', 'fdff', 'kjhkjhkjhkjh', '898898', 'islam', 'islam', NULL, 'fdfd', '89898', '7987987897', '989080', 'bbbbh@hbhjhh.ff', 'fkdjfk@jdhf.com', '2023-05-09 09:05:05', '2023-05-09 09:05:05'),
(90, 958, 'suep', 'kilis', 'orang kaya', '999', NULL, NULL, NULL, 'pns', '82828', '0912876', '9213412', 'vordukerko1@gufum.com', 'vordukerko12@gufum.com', '2023-05-09 09:13:46', '2023-05-09 09:16:55'),
(91, 960, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-24 15:14:44', '2023-05-24 15:14:44'),
(92, 962, 'ida', 'kaka', 'pegawai swasta', '900000', NULL, 'islam', NULL, 'ibu rumah tangga', '800000', '7899999', '798889998', 'lala@gmail.com', 'ibu@gmail.com', '2023-05-25 03:46:42', '2023-05-25 03:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `buku_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `id_user`, `buku_id`, `created_at`, `updated_at`) VALUES
(1, 9, 9, NULL, NULL),
(2, 9, 5, '2023-05-05 07:26:13', '2023-05-05 07:26:13'),
(67, 9, 2, '2023-05-08 07:10:23', '2023-05-08 07:10:23'),
(68, 9, 3, '2023-05-08 07:10:28', '2023-05-08 07:10:28'),
(69, 9, 4, '2023-05-08 07:10:32', '2023-05-08 07:10:32'),
(80, 2, 9, '2023-05-12 06:56:11', '2023-05-12 06:56:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan_ajar_mata_pelajarans`
--
ALTER TABLE `bahan_ajar_mata_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_relasi_kategoris`
--
ALTER TABLE `buku_relasi_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cek_totals`
--
ALTER TABLE `cek_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambar_kegiatans`
--
ALTER TABLE `gambar_kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `haris`
--
ALTER TABLE `haris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_tagihans`
--
ALTER TABLE `invoice_tagihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenjang_pendidikans`
--
ALTER TABLE `jenjang_pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `kategori_tagihans`
--
ALTER TABLE `kategori_tagihans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurikulums`
--
ALTER TABLE `kurikulums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lampiran_kegiatans`
--
ALTER TABLE `lampiran_kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel_gurus`
--
ALTER TABLE `mapel_gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpustakaan_member`
--
ALTER TABLE `perpustakaan_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpustakaan_pinjam`
--
ALTER TABLE `perpustakaan_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpustakaan_pinjam_rincian`
--
ALTER TABLE `perpustakaan_pinjam_rincian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rincian_pembayarans`
--
ALTER TABLE `rincian_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seleksi`
--
ALTER TABLE `seleksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan_siswas`
--
ALTER TABLE `tagihan_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggal_seleksis`
--
ALTER TABLE `tanggal_seleksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkatans`
--
ALTER TABLE `tingkatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_kumpul`
--
ALTER TABLE `tugas_kumpul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujians`
--
ALTER TABLE `ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wali_dan_siswas`
--
ALTER TABLE `wali_dan_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wali_siswas`
--
ALTER TABLE `wali_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=842;

--
-- AUTO_INCREMENT for table `bahan_ajar_mata_pelajarans`
--
ALTER TABLE `bahan_ajar_mata_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buku_relasi_kategoris`
--
ALTER TABLE `buku_relasi_kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cek_totals`
--
ALTER TABLE `cek_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=582;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar_kegiatans`
--
ALTER TABLE `gambar_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `guru_kelas`
--
ALTER TABLE `guru_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `haris`
--
ALTER TABLE `haris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice_tagihans`
--
ALTER TABLE `invoice_tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jenjang_pendidikans`
--
ALTER TABLE `jenjang_pendidikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `kategori_tagihans`
--
ALTER TABLE `kategori_tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `kurikulums`
--
ALTER TABLE `kurikulums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lampiran_kegiatans`
--
ALTER TABLE `lampiran_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mapel_gurus`
--
ALTER TABLE `mapel_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_kelas`
--
ALTER TABLE `master_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;

--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `perpustakaan_member`
--
ALTER TABLE `perpustakaan_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perpustakaan_pinjam`
--
ALTER TABLE `perpustakaan_pinjam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `perpustakaan_pinjam_rincian`
--
ALTER TABLE `perpustakaan_pinjam_rincian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `rincian_pembayarans`
--
ALTER TABLE `rincian_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seleksi`
--
ALTER TABLE `seleksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=821;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tagihan_siswas`
--
ALTER TABLE `tagihan_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=562;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tanggal_seleksis`
--
ALTER TABLE `tanggal_seleksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tingkatans`
--
ALTER TABLE `tingkatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tugas_kumpul`
--
ALTER TABLE `tugas_kumpul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `ujians`
--
ALTER TABLE `ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=965;

--
-- AUTO_INCREMENT for table `wali_dan_siswas`
--
ALTER TABLE `wali_dan_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wali_siswas`
--
ALTER TABLE `wali_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
