-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2022 pada 02.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `status`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_radar`
--

CREATE TABLE `data_radar` (
  `id` int(255) NOT NULL,
  `device` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `availability` int(20) NOT NULL,
  `Durasi` int(20) NOT NULL,
  `Event` int(20) NOT NULL,
  `remark` varchar(20) NOT NULL,
  `kode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_radar`
--

INSERT INTO `data_radar` (`id`, `device`, `Name`, `lokasi`, `status`, `tanggal`, `time`, `latlong`, `lat`, `lng`, `availability`, `Durasi`, `Event`, `remark`, `kode`) VALUES
(1, 'RADAR_01', '01AMN', 'AMBON', 'OK', '22-08-26', '00:50:55', '-3.70393, 128.089428', '-3.70393', '128.089428', 100, 0, 0, 'RADAR_01_CLOSE', '109/50'),
(2, 'RADAR_02', '02KDI', 'KENDARI', 'OK', '22-08-26', '00:50:55', '-3.988417, 122.511849', '-3.988417', '122.511849', 100, 0, 0, 'RADAR_02_OPEN', '112/50'),
(4, 'RADAR_04', '04MNO', 'MANADO', 'OK', '22-08-26', '05:49:51', '1.542899, 124.925258', '1.542899', '124.925258', 100, 0, 0, 'RADAR_04_CLOSE', '113/50'),
(6, 'RADAR_06', '06KPG', 'KUPANG', 'OK', '22-08-26', '07:26:13', '-10.167615, 123.667946', '-10.167615', '123.667946', 100, 0, 0, 'RADAR_06_CLOSE', '24/32'),
(10, 'RADAR_10', '10PAL', 'PALU', 'OK', '22-08-26', '00:50:55', '-0.916633, 119.908648', '-0.916633', '119.908648', 100, 0, 0, 'RADAR_10_OPEN', '22/32'),
(11, 'RADAR_11', '11SMG', 'SEMARANG', 'OK', '22-08-26', '00:50:55', '-6.978612, 110.378609', '-6.978612', '110.378609', 100, 0, 0, 'RADAR_11_CLOSE', '110/50'),
(18, 'RADAR_18', '18BLI', 'BALI', 'OK', '22-08-26', '22:30:08', '-8.743258, 115.16573', '-8.743258', '115.16573', 100, 0, 0, 'RADAR_18_CLOSE', '12/50'),
(19, 'RADAR_19', '19SBR', 'SURABAYA', 'OK', '22-08-26', '11:57:08', '-7.373107, 112.795', '-7.373107', '112.795', 100, 0, 0, 'RADAR_19_CLOSE', '8/50'),
(21, 'RADAR_21', '21MKS', 'MAKASSAR', 'FAILED', '22-08-26', '18:03:39', '-5.076068, 119.546785', '-5.076068', '119.546785', 100, 0, 0, 'RADAR_21_CLOSE', '9/50'),
(22, 'RADAR_22', '22BPN', 'BALIKPAPAN', 'OK', '22-08-26', '00:50:55', '-1.26487, 116.900539', '-1.26487', '116.900539', 100, 0, 0, 'RADAR_22_CLOSE', '11/50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id` varchar(20) NOT NULL,
  `nama_radar` varchar(50) NOT NULL,
  `tgl_r` varchar(50) NOT NULL,
  `jam_r` varchar(50) NOT NULL,
  `tgl_n` varchar(50) NOT NULL,
  `jam_n` varchar(50) NOT NULL,
  `durasi` varchar(50) NOT NULL,
  `cat` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `teknisi` varchar(50) NOT NULL,
  `penyebab` varchar(70) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `bul` varchar(25) NOT NULL,
  `tahun` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notes`
--

INSERT INTO `notes` (`id`, `nama_radar`, `tgl_r`, `jam_r`, `tgl_n`, `jam_n`, `durasi`, `cat`, `status`, `teknisi`, `penyebab`, `tanggal`, `bul`, `tahun`) VALUES
('220814-0001', '01AMN', '14-08-2022', '02:46:45', '15-08-2022', '02:46:45', '24 Jam 0 Menit', 'error deviasi radar ambon sebesar 3,4 derajat ke kanan', 'FAILED', 'DIMAS', 'Maintenance Due To Technical', '14', 'August', '2022'),
('220814-0002', '01AMN', '14-08-2022', '02:47:15', '14-08-2022', '05:47:15', '3 Jam 0 Menit', 'terjadi kerusakan pada UPS radar Ambon', 'FAILED', 'ASMAH', 'Maintenance Due To Electrical', '14', 'August', '2022'),
('220814-0003', '01AMN', '15-08-2022', '02:47:45', '16-08-2022', '02:47:45', '24 Jam 0 Menit', 'PLN off pada site Ambon', 'FAILED', 'GERALDI', 'Maintenance Due To Electrical', '14', 'August', '2022'),
('220814-0004', '06KPG', '14-08-2022', '03:05:45', '17-08-2022', '03:05:45', '72 Jam 0 Menit', 'perbaikan vsat kupang dikarenakan kerusakan tersambar petir', 'FAILED', 'ASWAR', 'Maintenance Due To Link (No Data)', '14', 'August', '2022'),
('220815-0005', '01AMN', '15-08-2022', '13:38:45', '16-08-2022', '13:38:45', '24 Jam 0 Menit', 'Perbaikan Link Data Radar oleh teknisi LA dikarenakan adanya kerusakan pada router pengiriman vsat di ambon', 'FAILED', 'SHELLA', 'Maintenance Due To Link (No Data)', '15', 'August', '2022'),
('220827-0006', '01AMN', '26-08-2022', '12:51:15', '26-08-2022', '18:51:15', '6 Jam 0 Menit', 'Drop packet link dari Lintas Arta, Switch ke Router Backup', 'FAILED', 'ASWAR', 'Maintenance Due To Link (No Data)', '27', 'August', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'Adiemas', 'dimas123', 'Admin'),
(2, 'Aswar', 'aswar123', 'Technician'),
(3, 'Dankosek', 'dankosek123', 'Managerial'),
(4, 'GTOA', 'manfasotm123', 'Managerial'),
(5, 'Matsc01', 'matsc01', 'Managerial'),
(6, 'Geraldi', 'geraldi123', 'Technician'),
(7, 'Shella', 'shella123', 'Technician'),
(8, 'Asmah', 'asmah123', 'Technician'),
(9, 'Kosek', 'kosek123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_radar`
--
ALTER TABLE `data_radar`
  ADD PRIMARY KEY (`device`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
