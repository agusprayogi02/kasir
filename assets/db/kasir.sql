-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2021 pada 13.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_brg` varchar(23) NOT NULL,
  `name_brg` varchar(128) NOT NULL,
  `price_brg` int(11) NOT NULL,
  `image_brg` varchar(128) NOT NULL,
  `stock_brg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_brg`, `name_brg`, `price_brg`, `image_brg`, `stock_brg`) VALUES
('1065', 'PESTISIDA', 50000, '601a7ff692828.jpg', 5),
('6142', 'BIBIT POHON', 5000, '601a80792c581.jpg', 9),
('8292', 'PUPUK UREA', 100000, '601a7fd1ef7ad.jpg', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `kode_history` int(11) NOT NULL,
  `kode_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `histori`
--

INSERT INTO `histori` (`id`, `kode_history`, `kode_brg`, `jumlah`) VALUES
(1, 19265, 2164, 2),
(2, 19265, 5737, 1),
(3, 42037, 2164, 2),
(4, 23772, 2164, 6),
(5, 37960, 1220, 2),
(6, 79517, 1070, 1),
(7, 17145, 1070, 1),
(8, 7508, 1065, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `nomor` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `kode_history` int(11) NOT NULL,
  `total_byr` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` int(20) NOT NULL,
  `onDelete` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`nomor`, `uid`, `kode_history`, `total_byr`, `bayar`, `tanggal`, `onDelete`) VALUES
(1, 13, 19265, 2000, 2000, 1605512231, '0'),
(2, 14, 42037, 1000, 2000, 1605517408, '0'),
(3, 14, 23772, 3000, 5000, 1605534481, '0'),
(4, 14, 37960, 90000, 200000, 1605615083, '1'),
(5, 14, 79517, 98000, 200000, 1605703663, '1'),
(6, 14, 17145, 98000, 2147483647, 1611731267, '1'),
(7, 17, 7508, 50000, 100000, 1613120526, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(13, 'firdaaa', 'firdahalimatuss@gmail.com', '60150e21bcf6a.jpg', '$2y$10$5ro37vP.N6riXHVKmL8BuO6scpE4R0WZOYUqBbnlbAOqgHOnh30wu', 1, '1', 1596525312),
(16, 'Firdahs', 'pertanian@gmail.com', 'user.png', '$2y$10$n0yaBZHttyWYyvuInCm/p.RNFSUscFZjhOEl5cLRGTIZmtp3klLCK', 2, '1', 1611990456),
(17, 'pertaniaku', 'pertanianku@gmail.com', 'user.png', '$2y$10$jGsphZCIPGUO9nXo23UkPup8p9W.G1xcS2TiNWUK0CnrD4YJtuQX.', 2, '1', 1611992714);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indeks untuk tabel `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_pk` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_pk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
