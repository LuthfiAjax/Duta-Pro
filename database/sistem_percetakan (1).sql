-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2022 pada 05.48
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_percetakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Aziz Ma\'ruf', 'aziz', 'aziz'),
(2, 'Luthfi Imron', 'luthfi', 'luthfi'),
(3, 'Sigit Ethana', 'sigit', 'sigit');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `cetak`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `cetak` (
`id_produksi` int(11)
,`nama_klien` varchar(100)
,`nama_pelaksana` varchar(100)
,`tgl_masuk` varchar(100)
,`deadline` date
,`status` varchar(100)
,`jml_peserta` int(11)
,`judul_training` varchar(100)
,`jenis_training` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_klien`
--

CREATE TABLE `data_klien` (
  `id_klien` int(11) NOT NULL,
  `nama_klien` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `judul_training` varchar(100) NOT NULL,
  `jenis_training` varchar(100) NOT NULL,
  `tgl_training` date NOT NULL,
  `jml_peserta` int(11) NOT NULL,
  `tgl_masuk` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `produksi` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_klien`
--

INSERT INTO `data_klien` (`id_klien`, `nama_klien`, `nama_instansi`, `judul_training`, `jenis_training`, `tgl_training`, `jml_peserta`, `tgl_masuk`, `deadline`, `produksi`) VALUES
(1, 'Fayzaya G.P', 'UTY', 'IT Security', 'Seminar', '2022-06-01', 50, '2022-05-01', '2022-06-03', '2'),
(4, 'Luthfi Ganteng', 'UGM', 'Prosefional', 'Webinar', '2022-07-30', 1000, '2022-07-25', '2022-08-05', '2'),
(5, 'Aziz', 'UTY', 'Web Programming', 'Seminar', '2022-07-26', 100, '2022-07-25', '2022-07-30', '2'),
(6, 'Sigit', 'eCompez', 'Sukses Selingkuh', 'Webinar', '2022-07-28', 100, '2022-07-25', '2022-07-30', '2'),
(7, 'Ferdy', 'Pornhub', 'Seks Non edu', 'Seminar', '2022-07-28', 11, '2022-07-25', '2022-07-30', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaksana`
--

CREATE TABLE `pelaksana` (
  `id_pelaksana` int(11) NOT NULL,
  `nama_pelaksana` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pasword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelaksana`
--

INSERT INTO `pelaksana` (`id_pelaksana`, `nama_pelaksana`, `username`, `pasword`) VALUES
(111, 'Muhammad Aziz', 'aziz111', 'aziz111'),
(112, 'Luthfi Imron', 'luthfi', 'luthfi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_pelaksana` int(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `id_pelaksana`, `id_klien`, `status`, `warna`) VALUES
(1006, 111, 1, 'BATAL', 'primary'),
(1007, 112, 5, 'BATAL', 'primary'),
(1008, 111, 4, 'SELESAI', 'primary'),
(1009, 112, 7, 'SELESAI', 'success'),
(1010, 111, 6, 'SELESAI', 'success');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `validasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `validasi` (
`id_produksi` int(11)
,`nama_klien` varchar(100)
,`nama_pelaksana` varchar(100)
,`tgl_masuk` varchar(100)
,`deadline` date
,`status` varchar(100)
,`warna` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `cetak`
--
DROP TABLE IF EXISTS `cetak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cetak`  AS SELECT `produksi`.`id_produksi` AS `id_produksi`, `data_klien`.`nama_klien` AS `nama_klien`, `pelaksana`.`nama_pelaksana` AS `nama_pelaksana`, `data_klien`.`tgl_masuk` AS `tgl_masuk`, `data_klien`.`deadline` AS `deadline`, `produksi`.`status` AS `status`, `data_klien`.`jml_peserta` AS `jml_peserta`, `data_klien`.`judul_training` AS `judul_training`, `data_klien`.`jenis_training` AS `jenis_training` FROM ((`produksi` join `data_klien` on(`produksi`.`id_klien` = `data_klien`.`id_klien`)) join `pelaksana` on(`produksi`.`id_pelaksana` = `pelaksana`.`id_pelaksana`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `validasi`
--
DROP TABLE IF EXISTS `validasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `validasi`  AS SELECT `produksi`.`id_produksi` AS `id_produksi`, `data_klien`.`nama_klien` AS `nama_klien`, `pelaksana`.`nama_pelaksana` AS `nama_pelaksana`, `data_klien`.`tgl_masuk` AS `tgl_masuk`, `data_klien`.`deadline` AS `deadline`, `produksi`.`status` AS `status`, `produksi`.`warna` AS `warna` FROM ((`produksi` join `data_klien` on(`produksi`.`id_klien` = `data_klien`.`id_klien`)) join `pelaksana` on(`produksi`.`id_pelaksana` = `pelaksana`.`id_pelaksana`)) WHERE `produksi`.`status` = 'selesai''selesai'  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_klien`
--
ALTER TABLE `data_klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indeks untuk tabel `pelaksana`
--
ALTER TABLE `pelaksana`
  ADD PRIMARY KEY (`id_pelaksana`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `id_pelaksana` (`id_pelaksana`),
  ADD KEY `id_klien` (`id_klien`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_klien`
--
ALTER TABLE `data_klien`
  MODIFY `id_klien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelaksana`
--
ALTER TABLE `pelaksana`
  MODIFY `id_pelaksana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`id_pelaksana`) REFERENCES `pelaksana` (`id_pelaksana`),
  ADD CONSTRAINT `produksi_ibfk_2` FOREIGN KEY (`id_klien`) REFERENCES `data_klien` (`id_klien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
