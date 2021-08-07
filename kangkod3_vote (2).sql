-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2021 pada 09.27
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kangkod3_vote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `community_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `image`, `vision`, `mission`, `community_id`) VALUES
(16, 'Bagus Miftah', 'bami2.jpg', 'visions', 'missions', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(2, 3, 'drink1', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(11, 'uri:api/candidate/index:get', 16, 1628317608, 'drink1'),
(12, 'uri:api/quickcount/index:get', 4, 1628318575, 'drink1'),
(13, 'uri:api/countallvoter/index:get', 9, 1628318608, 'drink1'),
(14, 'uri:api/countwhohaventvote/index:get', 6, 1628318672, 'drink1'),
(15, 'uri:api/countwhovote/index:get', 4, 1628318919, 'drink1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  `community_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `role_id`, `is_active`, `status`, `date_created`, `date_modified`, `community_id`) VALUES
(631, 'bacaan.rizky@gmail.com', '$2y$10$l5cj0nJwE4Iv7YH87rnEKe2RtwtytIozBSmMKgDAEi3f1SgSeJQyC', 'Rizky', 1, 1, 1, 1628184335, 1628184335, 6),
(632, 'rizkyny09@gmail.com', '$2y$10$ivPgdLfBVa/Vj5r6.16pouojm7CGo8jMn0id9vrCQs2STDtBUj7p.', 'Raadiputra', 6, 1, 0, 1628261734, 1628261734, 7),
(633, 'rizky.nur.ahmad.adiputra@gmail.com', '$2y$10$7wKyKY7EvspTTDw84/M20eRLWNHcj3H5aTcLe32BuXOHyxMS0vCRO', 'Lala', 5, 0, 0, 1628274393, 1628274393, 6),
(634, 'akun.rizky.baca@gmail.com', '$2y$10$VMvKp0Dq5IGqMUSI0/mUSeU2R8k7wb012OHCU4pTxEmk7C7o6NbJm', 'Nano', 5, 0, 0, 1628274393, 1628274393, 6),
(635, 'rizkyny99@gmail.com', '$2y$10$ag9jRImfX7ghOyE9uKMAzuUJA30mYRHfpH/iimbk7XtABigCPAnQ6', 'Lili', 5, 0, 0, 1628274393, 1628274393, 6),
(637, 'akun.rizky.nonton@gmail.com', '$2y$10$nJVczrsKUg8VNmlJKCkxAOOMa8NXNzdNrp1tIAjGOL5i7gAR0.OIa', 'Nana', 1, 1, 0, 1628313831, 1628313831, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `menu_id`, `role_id`) VALUES
(1, 1, 6),
(5, 4, 1),
(7, 2, 1),
(11, 6, 1),
(15, 2, 6),
(16, 3, 6),
(17, 4, 6),
(18, 6, 6),
(20, 2, 5),
(21, 6, 5),
(23, 8, 1),
(24, 8, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_community`
--

CREATE TABLE `user_community` (
  `id` int(11) NOT NULL,
  `community` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_community`
--

INSERT INTO `user_community` (`id`, `community`, `user_id`) VALUES
(6, 'KPU HMP UTY 2021', 631),
(7, 'BOS', 632);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Votes'),
(6, 'Voting'),
(7, 'Committees'),
(8, 'Community');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(5, 'voter'),
(6, 'super');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(11, 4, 'Candidates', 'votes/candidate', 'fas fa-fw fa-user-astronaut', 1),
(17, 4, 'Voter', 'votes/voter', 'fas fa-fw fa-users', 1),
(18, 6, 'Voting', 'voting', 'fas fa-fw fa-vote-yea', 1),
(19, 6, 'Quick Count', 'voting/quickcount', 'fas fa-fw fa-chart-pie', 1),
(20, 7, 'Committees', 'committees', 'fas fa-fw fa-user-friends', 1),
(21, 4, 'Activate Voter', 'votes/activate', 'fas fa-fw fa-user-clock', 1),
(22, 4, 'Report', 'votes/report', 'fas fa-fw fa-file-export', 1),
(24, 8, 'Community', 'community', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'bacaan.rizky@gmail.com', 'gXT0yHdiQn9C5K/MK4J49ZLOm2JzqIaDP2AiWGr/n+E=', 1628191206),
(4, 'bacaan.rizky@gmail.com', 'nW96qZvo3hTw5/uYd5t7tQeB10EuBCjT88xmzuvbXuY=', 1628191232),
(5, 'bacaan.rizky@gmail.com', 'lXDoJM9kJ1AGDN5DFN23vhY86QzqyQ7QEjipT5SfZO0=', 1628191275),
(6, 'bacaan.rizky@gmail.com', 'gMgOXRjn8ddT0ib2f8tBgnwbb1B8bUKng7ajFCQfcAk=', 1628201346);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_voted` int(11) NOT NULL,
  `community_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vote`
--

INSERT INTO `vote` (`id`, `candidate_id`, `user_id`, `date_voted`, `community_id`) VALUES
(37, 16, 631, 1628276073, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`email`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_community`
--
ALTER TABLE `user_community`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_community`
--
ALTER TABLE `user_community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
