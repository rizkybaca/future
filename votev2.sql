-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 17.10
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
-- Database: `votev2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `candidate`
--

INSERT INTO `candidate` (`id`, `nim`, `name`, `image`, `vision`, `mission`) VALUES
(5, '5181311025', 'Bagus Miftah', 'bami.jpg', 'Mewujudkan HMP sebagai organisasi yang memiliki keunggulan dan solidaritas tinggi.', '1. Mewujudkan HIMA yang berisi pribadi amanah dan tanggung jawab.\r\n2. Mampu membuat dan melaksanakan program HIMA yang bermanfaat secara luas.\r\n3. Bisa membangun dan mengkoordinasi seluruh elemen HIMA.'),
(6, '5181311017', 'Muklis Rahman Setiawan', 'rsz_muklis.jpg', 'Mewujudkan HMP yang aktif, profesional dan solid dalam membangun kemajuan prodi bersama.', '1. Mampu meningkatkan kualitas dan pribadi mahasiswa yang lebih unggul di bidang akademik atau non akademik.\r\n2. Mampu menjadi wadah dan memfasilitasi bakat serta minat mahasiswa yang berprestasi.\r\n3. Peningkatan kebersamaan seluruh mahasiswa jurusan yang optimal.\r\n4. Melaksanakan kegiatan mahasiswa yang aktif, inovatif dan produktif mengembangkan prestasi bersama.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `password`, `name`, `role_id`, `is_active`, `status`) VALUES
(23, '5181311006', '$2y$10$PMOXl5MeeBRlxuS/iW4twOmaIoGQwCou9phMgU0Xqyv8P2I3exMBC', 'rizky nur', 1, 1, 0),
(40, '5181311007', '$2y$10$oiiqZmh8RiBh5BxfzdstN.kdKHkqJTH6RNNkGq7A0ZjMV/QsV0.s.', 'Lavianus Wangge', 2, 1, 0),
(41, '5181311008', '$2y$10$jZPB260LgJDaKU2XaJP2eOnFKACuTba6tyYQo144VkDi3adlFZ1De', 'Kevin Itsnaen', 2, 1, 0),
(42, '5181311009', '$2y$10$lCYzNdokTcPBQlZArKUlH.8l5SQhb5eV3jPiszRObKXRrE4l3y0za', 'Yodi Irawan', 2, 1, 1),
(43, '5181311010', '$2y$10$U8yeKDUzMKjFCtB8mGKYAOL88Kylj/UZ1GnBxLcFWjLqOWSkOIXy2', 'Ajilim', 2, 1, 1),
(44, '5181311023', '$2y$10$sylqnRriqMXv6npRFNXfoe9NbF.aabsl.fqNF5sFfqaZlooLVjxNy', 'Awalif G.I.S.', 4, 0, 0),
(45, '5181311011', '$2y$10$6j4Eq6.4pAxR0I66KMwZO.9LGShvh2OXQVfHFudaqgWdMe0e75vjq', 'Fifi Melinda', 4, 0, 0);

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
(1, 1, 1),
(3, 3, 1),
(4, 2, 2),
(5, 4, 1),
(6, 5, 1),
(7, 2, 1),
(8, 2, 4),
(9, 5, 4),
(10, 4, 4),
(11, 6, 1),
(12, 6, 2),
(13, 6, 4),
(14, 7, 1);

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
(7, 'Committees');

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
(2, 'voter'),
(4, 'committee');

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
(21, 1, 'Activate User', 'admin/activate', 'fas fa-fw fa-user-clock', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_voted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vote`
--

INSERT INTO `vote` (`id`, `candidate_id`, `user_id`, `date_voted`) VALUES
(4, 6, 42, 1625496682),
(5, 5, 43, 1625496758);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
