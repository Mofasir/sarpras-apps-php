-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2022 pada 12.06
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
-- Database: `sarpras`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_prasarana`
--

CREATE TABLE `data_prasarana` (
  `id_prasarana` varchar(6) NOT NULL,
  `nama_prasarana` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_prasarana`
--

INSERT INTO `data_prasarana` (`id_prasarana`, `nama_prasarana`, `jumlah`, `keterangan`) VALUES
('PS0001', 'Ruang Kelas', 12, 'Kondisi Baik'),
('PS0002', 'Ruang Kantor', 1, 'Kondisi Baik'),
('PS0003', 'Ruang TU', 1, 'Kondisi Baik'),
('PS0004', 'Ruang Lab Komputer', 1, 'Kondisi Baik'),
('PS0005', 'Ruang Guru', 1, 'Kondisi Baik'),
('PS0006', 'Ruang Pimpinan Pesantren', 3, 'Kondisi Baik'),
('PS0007', 'Ruang Kepala Sekolah', 2, 'Kondisi Baik'),
('PS0008', 'Mesjid', 2, 'Kondisi Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sarana`
--

CREATE TABLE `data_sarana` (
  `id_sarana` varchar(6) NOT NULL,
  `nama_sarana` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `letak` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_sarana`
--

INSERT INTO `data_sarana` (`id_sarana`, `nama_sarana`, `jumlah`, `letak`, `keterangan`) VALUES
('S00001', 'Meja Santri', 300, 'Ruang Kelas', 'Kondisi Baik'),
('S00002', 'Kursi Santri', 300, 'Ruang Kelas', 'Kondisi Baik'),
('S00003', 'Papan Tulis', 12, 'Ruang Kelas', 'Kondisi Baik'),
('S00004', 'Lemari Kelas', 12, 'Ruang Kelas', '10 Kondisi Baik, 2 Rusak Ringan'),
('S00005', 'Telepon', 2, 'Ruang Kantor', 'Kondisi Baik'),
('S00006', 'Komputer', 30, 'Lab Komputer', 'Kondisi Baik'),
('S00007', 'TV', 1, 'Ruang Kantor', 'Kondisi Baik'),
('S00008', 'Kamera Digital', 2, 'Lemari Inventaris', 'Kondisi Baik'),
('S00009', 'Meja Guru', 50, 'Ruang Guru', 'Kondisi Baik'),
('S00010', 'Kursi Guru', 50, 'Ruang Guru', 'Kondisi Baik'),
('S00011', 'Meja TU', 5, 'Ruang TU', 'Kondisi Baik'),
('S00012', 'Kursi TU', 5, 'Ruang TU', 'Kondisi Baik'),
('S00013', 'Komputer TU', 3, 'Ruang TU', 'Kondisi Baik'),
('S00014', 'Mimbar', 1, 'Mesjid', 'Kondisi Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_req` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_sarana` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_req`, `nama`, `nama_sarana`, `jumlah`, `keterangan`) VALUES
(1, 'Harry Setiaji', 'Bola Basket', 6, 'Untuk ekstrakurikuler basket dan praktek olahraga'),
(2, 'Harry Setiaji', 'AC', 2, 'Di Ruang Guru dan Kantor'),
(3, 'Asep Sujana', 'Sound System', 2, 'Keperluan Acara Pesantren dan Sekolah'),
(5, 'Asep Sujana', 'Tenis Meja', 1, 'Persiapan Lomba dan Ekstrakurikuler'),
(7, 'Rifki Elza', 'Lampu Sorot', 4, 'Keperluan Acara Malam '),
(11, 'Harry Setiaji', 'Mesin Laminating', 1, 'Keperluan TU'),
(12, 'Harry Setiaji', 'Matras Bela Diri', 25, 'Keperluan Latihan dan Persiapan Kejuaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_hp`, `level`) VALUES
(1, 'Admin', 'admin', '$2y$10$oj8AlyryqbgMu9KOTHf8T.W8Ws2VWqZEGPBNd.CW4I6sAvIBoJg8a', '', 'admin'),
(6, 'Harry Setiaji', 'harry', '$2y$10$lJuOILl1t1WO4nAuOoaU/u/1/l6BQfwf9odCfZ/OyVsoDg/Hj.pSW', '086245673222', 'user'),
(7, 'Asep Sujana', 'asep', '$2y$10$M6pgbdLwLlCkVjJoru.cLOtcbUOKPexQA7VtsiQ/oeTmNcx3fm8om', '082987654321', 'user'),
(8, 'Fahri Akmal', 'fahri', '$2y$10$CAHGeViBc/T6i/A9nqLHou5YVY1nceo5plHZkYP4tvLqA5mjixLKa', '082223334556', 'user'),
(10, 'Rifki Elza', 'rifki', '$2y$10$NAO9vePhXiVKHFqKR9U21uRv2I93ZGzMqsBW0D.jhJqrcJgSiJBJe', '087564783322', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_prasarana`
--
ALTER TABLE `data_prasarana`
  ADD PRIMARY KEY (`id_prasarana`);

--
-- Indeks untuk tabel `data_sarana`
--
ALTER TABLE `data_sarana`
  ADD PRIMARY KEY (`id_sarana`);

--
-- Indeks untuk tabel `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_req`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `request`
--
ALTER TABLE `request`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
