-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2021 pada 14.06
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumblibrary`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_tb`
--

CREATE TABLE `book_tb` (
  `id` int(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `category_id` int(20) NOT NULL,
  `writer_id` int(20) NOT NULL,
  `publication_year` year(4) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `book_tb`
--

INSERT INTO `book_tb` (`id`, `name`, `category_id`, `writer_id`, `publication_year`, `img`) VALUES
(11, 'lorem', 1, 1, 2000, 'lorem.jpg'),
(12, 'ipsum', 2, 1, 2001, 'ipsum.jpg'),
(13, 'damal', 3, 1, 2002, 'damal.jpg'),
(14, 'bare', 1, 2, 2002, 'bare.jpg'),
(15, 'beew', 2, 2, 2001, 'beww.jpg'),
(16, 'bgfgf', 3, 2, 2000, 'bgfgf.jpg'),
(17, 'kakr', 3, 3, 2002, 'kakr.jpg'),
(18, 'kakrdd', 2, 3, 2001, 'kakrdd.jpg'),
(21, 'Java T211', 1, 5, 2021, '604caae6d3f39.jpg'),
(22, 'dsadsa', 4, 4, 1999, '604cabb17f91c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_tb`
--

CREATE TABLE `category_tb` (
  `id` int(20) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category_tb`
--

INSERT INTO `category_tb` (`id`, `name`) VALUES
(1, 'horror'),
(2, 'comedy'),
(3, 'mystery'),
(4, 'test category'),
(5, 'consectetur'),
(7, 'Lorem Ipsum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `writer_tb`
--

CREATE TABLE `writer_tb` (
  `id` int(20) NOT NULL,
  `name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `writer_tb`
--

INSERT INTO `writer_tb` (`id`, `name`) VALUES
(1, 'prayogo'),
(2, 'bagus'),
(3, 'suntoro'),
(4, 'ssss'),
(5, 'test writer'),
(6, 'consectetur');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book_tb`
--
ALTER TABLE `book_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_id` (`category_id`),
  ADD KEY `FK_author_id` (`writer_id`);

--
-- Indeks untuk tabel `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `writer_tb`
--
ALTER TABLE `writer_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book_tb`
--
ALTER TABLE `book_tb`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `writer_tb`
--
ALTER TABLE `writer_tb`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book_tb`
--
ALTER TABLE `book_tb`
  ADD CONSTRAINT `FK_author_id` FOREIGN KEY (`writer_id`) REFERENCES `writer_tb` (`id`),
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
