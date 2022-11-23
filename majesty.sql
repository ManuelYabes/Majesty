-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2022 pada 03.38
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majesty`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_baju`
--

CREATE TABLE `daftar_baju` (
  `id_baju` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL DEFAULT 'S',
  `pembayaran` varchar(255) NOT NULL DEFAULT 'COD',
  `stok` int(11) NOT NULL DEFAULT 12,
  `harga` int(11) NOT NULL DEFAULT 50000,
  `berat` int(11) NOT NULL DEFAULT 300,
  `kondisi` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL DEFAULT 'Pakaian ini bagus sekali'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_baju`
--

INSERT INTO `daftar_baju` (`id_baju`, `foto`, `nama`, `ukuran`, `pembayaran`, `stok`, `harga`, `berat`, `kondisi`, `kategori`, `deskripsi`) VALUES
(2, 'image 22.png', 'Jas Hitam Poloss', 'S,M,L', 'BRI,BCA,COD,DANA,ALFA', 12, 50000, 120, 'Baru Belum Pernah Dicuci', 'Pernikahan', 'Keren'),
(3, 'image 26.png', 'Baju Adat Keren', 'S,M,L', 'COD,BCA,BRI', 12, 50000, 120, 'Sudah Dicuci', 'Adat', 'Baju adat ini sangat tradisional'),
(4, 'image 27.png', 'Gaun Germelap', 'S,L', 'COD,ALFA', 12, 50000, 120, 'Sudah Dicuci', 'Pesta', 'gaun ini sangat mencolok colok'),
(5, 'image 100.png', 'Gaun Emas', 'S', 'COD', 11, 50000, 120, 'Sudah Dicuci', 'Pernikahan', 'gaun ini bagus'),
(6, 'image 65.png', 'Gaun Coklat Terang Anggun', 'S', 'COD', 12, 50000, 300, 'Sudah Dicuci', 'Pernikahan', 'Pakaian ini bagus sekali'),
(7, 'image 55.png', 'Gaun Putih Ramping', 'S', 'COD', 12, 50000, 300, 'Sudah Dicuci', 'Pernikahan', 'Pakaian ini bagus sekali'),
(8, 'image 98.png', 'Gaun Putih Panjang', 'S', 'COD', 12, 50000, 300, 'Sudah Dicuci', 'Pernikahan', 'Pakaian ini bagus sekali'),
(10, 'image 67.png', 'test', 'S', 'COD', 12, 50000, 300, 'Sudah Dicuci', 'Adat', 'Pakaian ini bagus sekali'),
(16, '637d78947b8da.png', 'Dress Abad ke XI', 's,m,l,k', 'COD', 12, 1000, 300, 'Baru Belum Pernah Dicuci', 'Adat', 'pakaian ini berasal dr abad pertengahan'),
(17, '637d83971d6c3.png', 'Gaun putih', 'S,M,L,K', 'COD', 12, 1000, 300, 'Baru Belum Pernah Dicuci', 'Pernikahan', 'Yang di foto itu Ratu Elizabeth Pas Muda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `id_pengguna`, `id_baju`) VALUES
(3, 2, 2),
(5, 1, 4),
(9, 1, 8),
(34, 1, 1),
(40, 1, 5),
(43, 1, 10),
(113, 1, 6),
(115, 1, 2),
(169, 6, 13),
(170, 6, 12),
(178, 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_pengguna` varchar(16) NOT NULL,
  `ukuran` varchar(6) NOT NULL,
  `pembayaran` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_` date DEFAULT NULL,
  `code` varchar(6) NOT NULL,
  `total_harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id`, `id_baju`, `id_pengguna`, `nama`, `nama_pengguna`, `ukuran`, `pembayaran`, `tanggal`, `tanggal_`, `code`, `total_harga`) VALUES
(52, 5, 2, 'Gaun Emas', 'Tristan Eka Wirw', 'S', 'COD', '2022-11-22', '2022-11-24', 'b7acf9', '100000'),
(53, 2, 2, 'Jas Hitam Polos Awikwok', 'Tristan Eka Wirw', 'S', 'BRI', '2022-11-22', '2022-11-25', '72e6b3', '150000'),
(54, 7, 1, 'Gaun Putih Ramping', 'Yabessy', 'S', 'COD', '2022-11-22', '2022-11-24', 'fc5608', '100000'),
(55, 6, 7, 'Gaun Coklat Terang Anggun', 'Arlan SGK', 'S', 'COD', '2022-11-24', '2022-11-30', '27637f', '300000'),
(56, 1, 6, 'Gaun putih polos awikwok', 'omgHacker', 'S', 'BRI', '2022-11-22', '2022-11-24', '206372', '100000'),
(57, 5, 6, 'Gaun Emas', 'omgHacker', 'S', 'COD', '2022-11-23', '2022-11-24', 'af4635', '50000'),
(58, 5, 6, 'Gaun Emas', 'omgHacker', 'S', 'COD', '2022-11-22', '2022-11-23', '071b6d', '50000'),
(59, 13, 6, 'Test', 'omgHacker', 's', 'test', '2022-11-22', '2022-11-24', '63b8ce', '244444'),
(60, 5, 6, 'Gaun Emas', 'omgHacker', 'S', 'COD', '2022-11-22', '2022-11-23', 'd7b96f', '50000'),
(61, 5, 6, 'Gaun Emas', 'omgHacker', 'S', 'COD', '2022-11-23', '2022-11-23', 'c747ce', '0'),
(62, 1, 6, 'Gaun putih polos awikwok', 'omgHacker', 'S', 'BRI', '2022-11-22', '2022-11-22', '707b86', '0'),
(63, 1, 6, 'Gaun putih polos awikwok', 'omgHacker', 'S', 'BRI', '2022-11-22', '2022-11-22', 'b39abc', '50000'),
(64, 1, 6, 'Gaun putih polos awikwok', 'omgHacker', 'S', 'BRI', '2022-11-23', '2022-11-24', '5ae385', '50000'),
(65, 13, 6, 'Test', 'omgHacker', 's', 'test', '2022-11-23', '2022-11-26', '63d66f', '366666');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `foto`) VALUES
(1, 'Yabessy', 'imanuelyabesvernanda@gmail.com', '12', '2022-11-24', 'wanita', '83836610012', '637482d813061.jpg'),
(2, 'Tristan Eka Wirw', 'tristan@gmail.com', '31', NULL, '', '0', ''),
(3, 'Tristan', 'tristanekawirwir@gmail.com', '31', NULL, '', '0', ''),
(5, 'omgHacker', '', '$2y$10$XCSYpdYYMSLDB9RHtdOzmeSvMBqwB3lN37AMQCsl/D9LrA5fGIe/S', NULL, '', '', ''),
(6, 'omgHacker', 'udemy.cgjc3@slmail.me', '1', '0000-00-00', '', '', ''),
(7, 'Arlan SGK', 'arlan@gmai.com', '5', '0000-00-00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_baju`
--
ALTER TABLE `daftar_baju`
  ADD PRIMARY KEY (`id_baju`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_baju`
--
ALTER TABLE `daftar_baju`
  MODIFY `id_baju` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
