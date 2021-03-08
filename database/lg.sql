-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Mar 2021 pada 01.20
-- Versi server: 8.0.23-0ubuntu0.20.04.1
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` smallint UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_group` tinyint UNSIGNED NOT NULL,
  `status` enum('AKTIF','NONAKTIF') NOT NULL DEFAULT 'AKTIF',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `user_group`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Taufik Maulana', 'taufikm9977@gmail.com', '63459198779de4e0da459d047cb840dd1ef8c352', 1, 'AKTIF', '2021-03-08 18:38:32', NULL, NULL),
(2, 'Indra Mulyadi', 'indra277@email.id', '63459198779de4e0da459d047cb840dd1ef8c352', 2, 'NONAKTIF', '2021-03-08 18:38:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `id` tinyint UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '2021-03-08 18:35:06', NULL, NULL),
(2, 'Shop Manager', '2021-03-08 18:35:06', NULL, NULL),
(3, 'Sales Team', '2021-03-08 18:35:06', NULL, NULL),
(4, 'Shop Floor Team', '2021-03-08 18:35:06', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_group` (`user_group`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_group`) REFERENCES `user_group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
