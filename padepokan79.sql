-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2022 pada 23.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `accountId` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`accountId`, `name`) VALUES
(3, 'Customer1'),
(4, 'Customer2'),
(7, 'Customer3'),
(11, 'Customer4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `transactionDate` datetime NOT NULL,
  `description` varchar(128) NOT NULL,
  `debitCreditStatus` varchar(45) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `accountId`, `transactionDate`, `description`, `debitCreditStatus`, `amount`) VALUES
(1, 3, '2022-08-30 00:00:00', 'Setor Tunai', 'C', 200000),
(2, 3, '2022-08-31 00:00:00', 'Beli Pulsa', 'D', 10000),
(3, 3, '2022-09-01 00:00:00', 'Bayar Listrik', 'D', 70000),
(4, 3, '2022-09-02 00:00:00', 'Tarik Tunai', 'D', 100000),
(5, 3, '2022-09-03 00:00:00', 'Setor Tunai', 'C', 300000),
(6, 3, '2022-09-04 00:00:00', 'Bayar Listrik', 'D', 50000),
(7, 3, '2022-09-05 00:00:00', 'Tarik Tunai', 'D', 50000),
(8, 3, '2022-09-06 00:00:00', 'Beli Pulsa', 'D', 40000),
(9, 3, '2022-09-07 00:00:00', 'Tarik Tunai', 'D', 50000),
(10, 3, '2022-09-08 00:00:00', 'Setor Tunai', 'C', 50000),
(11, 3, '2022-09-09 00:00:00', 'Bayar Listrik', 'D', 125000),
(12, 3, '2022-09-10 00:00:00', 'Beli Pulsa', 'D', 20000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`accountId`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
