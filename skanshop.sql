-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2021 pada 10.01
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skanshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `search` text NOT NULL,
  `kategori` text NOT NULL,
  `produk_lainnya` text NOT NULL,
  `posting` text NOT NULL,
  `foto` text NOT NULL,
  `nama_produk` text NOT NULL,
  `harga_produk` varchar(15) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `search`, `kategori`, `produk_lainnya`, `posting`, `foto`, `nama_produk`, `harga_produk`, `deskripsi`) VALUES
(1, '', 'Makanan', '', '', '5.jpg', 'kacang', '1000', 'jajan'),
(2, '', 'Makanan', '', '', '3.jpg', 'beng-beng', '1000', 'jajanan'),
(3, '', 'Makanan', '', '', '12737452_bf1e0bd7-43b5-479f-9911-b02f66f121bb_1080_1069.jpg', 'jajan pasar', 'Rp.2000', 'jajanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `cpassword` text NOT NULL,
  `wa` varchar(15) NOT NULL,
  `fb` text DEFAULT NULL,
  `ig` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `foto`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `email`, `password`, `cpassword`, `wa`, `fb`, `ig`) VALUES
(4, '7.png', 'Linda', 'perempuan', '2021-10-17', 'semarang', 'lindasalsa@gmail.com', 'linda1', 'linda1', '0865432178', 'http://localhost/skanshop2/profil.php', 'http://localhost/skanshop2/profil.php'),
(6, 'ayu putri-6936 kids game zone.jpg', 'Reza', 'laki-laki', '2021-10-22', 'Demak', 'reza@gmail.com', 'reza1', 'reza1', '0876895432', 'http://localhost/skanshop2/profil.php', 'http://localhost/skanshop2/profil.php');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
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
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
