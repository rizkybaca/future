-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2021 pada 10.28
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
(8, '5181311025', 'Muklis Setiawan', 'rsz_muklis.jpg', 'Visi', 'Misi'),
(9, '51813111017', 'awalif', 'bami1.jpg', 'visi', 'misi');

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
(1, 1, 'rizky1', 1, 0, 0, NULL, 1),
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
(1, 'uri:api/mahasiswa/index:get', 16, 1625954717, 'drink1'),
(2, 'uri:api/mahasiswa/index:get', 3, 1625951116, 'rizky1'),
(3, 'uri:api/voting/index:get', 2, 1626292321, 'drink1'),
(4, 'uri:api/candidate/index:get', 5, 1626295757, 'drink1'),
(5, 'uri:api/user/index:get', 4, 1626296273, 'drink1'),
(6, 'uri:api/quickcount/index:get', 2, 1626297571, 'drink1'),
(7, 'uri:api/login/index:get', 1, 1626359236, 'drink1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `password`, `name`, `prodi`, `role_id`, `is_active`, `status`) VALUES
(455, '5181311099', '$2y$10$CUsDefIAjCELQvDzAKTms.K2emrn/.jwMfqUP65SXvlp54WV8vlLW', 'rizky nur', 'PTI', 1, 1, 0),
(457, '5201311001', '$2y$10$FmlSefOAxefk4dLxlND5i.4IS.FQBZA27lmUbfAfbZD/iTM7zWNeW', 'MOHAMMAD ZAENAL ABIDIN', 'PTI', 2, 0, 0),
(458, '5201311002', '$2y$10$MTDgJXlklzPDvCw3GwTWNer93OTLWno5JMop/gbp4ItQ1Q0rwXxfG', 'THALIA SINDY FATASYA', 'PTI', 2, 0, 0),
(459, '5201311003', '$2y$10$hc1ZuRpjMgI9i2eX3yihM.YiPHbfsSfctw84l0OYZUNWVR0h4OJR2', 'SANG AYU PUTU ANGGRAINI PRATIWI ', 'PTI', 2, 0, 0),
(460, '5201311004', '$2y$10$bWne6nL2dlZqMfWHwzxDPehh8KiEvb8inDHgC/YYQnZ6/pqQUylqe', 'YUSUF RAHMATULLAH', 'PTI', 2, 0, 0),
(461, '5201311005', '$2y$10$vsj1ztyYVFi0Upc4emFG/uGvtpWA.jwl84VOX.auvf04FFPRPuiC6', 'RISKI SOKANI', 'PTI', 2, 0, 0),
(462, '5201311006', '$2y$10$ykZ14J0moZYD74Gp43zdn.oCSt7h8nkqgV45ToIso9Ryo1ay2tPYW', 'ARINTA SEFRIANA WULANDARI', 'PTI', 2, 0, 0),
(463, '5201311007', '$2y$10$.bd684EX1fuYHcro.N.6c.9LROZ3eyPXd6WrQSpbbNE420UDiro7m', 'MUHAMMAD SIDDIQ AL HAFIZH', 'PTI', 2, 0, 0),
(464, '5201311008', '$2y$10$D6HH2nXZbKAND2UrAteR1.MsRW1euRB1kD5TIUEtN3Q/TFKW8.1vG', 'BACHTIAR SAKTIAN AFANDY', 'PTI', 2, 0, 0),
(465, '5201311009', '$2y$10$5ko8FSR4L6nVG/NJGp7CJuPmh9HdGe8CfG8YzpK3QI/JvzTfyKbWC', 'FERDI ANTONI', 'PTI', 2, 0, 0),
(466, '5201311010', '$2y$10$MPx3j5RiPOvJ04R6F0/dB.IZHGSZ1WvbKHMAweRNAxq53GlyGkLLC', 'AHMAD WAFAL AN\'AM', 'PTI', 2, 0, 0),
(467, '5201311011', '$2y$10$R220rLLflZ80NKoxlmzLXO196EB4ybnK/yHQEOMw1DGnbSpWGDLuC', 'HERIAWAN', 'PTI', 2, 0, 0),
(468, '5201311012', '$2y$10$auKpQVPASv58729h9D/gfOFsrpGbW5CQxGjpeIuo2RLhXzFCOnU0S', 'SABRINA AL ZAHRO', 'PTI', 2, 0, 0),
(469, '5201311013', '$2y$10$ynezqYLZuNpZw/3Zf6VA..6APVwd0Kq5Gxtm08prYftrMDE2oIbVu', 'SEKAR PUTRI ILLONA', 'PTI', 2, 0, 0),
(470, '5201311014', '$2y$10$l/TRGsHXfuA3wfnMUnH6DOmSl1lPk2olRxkMlgr019ne1ztdXcBkS', 'AFAN MUZAKI', 'PTI', 2, 0, 0),
(471, '5201311015', '$2y$10$SqpMxQaV1qWtoI6X3xzpVeqWNWInncqTORyooFfBTXDcmRAgtjTva', 'DIAN AMINUDIN', 'PTI', 2, 0, 0),
(472, '5201311016', '$2y$10$Qhw4xXxO6yA3gE9TN.rzI.lA5WB/aDiNOW1RZlLBq4YXZAe8gOJ5u', 'FENDY NANANG SETIAWAN', 'PTI', 2, 0, 0),
(473, '5201311017', '$2y$10$48BOH16xzXXrkof9ivpnjeESTHjq518RO2vLiISuyaX64N5JyA2Gi', 'ISNAINI HUSNA', 'PTI', 2, 0, 0),
(474, '5201311018', '$2y$10$CKBoS.5Mbt38dBPb.T1eduKI6UELpxAW7XBbnqTlAv8ABG2ACsoV6', 'SUCI DWI RAMADHANI', 'PTI', 2, 0, 0),
(475, '5201311019', '$2y$10$9F2eH4RaFdcWXqTIqFaC0eS5VLhNPAmNl4vm7.HHqEad.m2uUBWie', 'TEGUH PRAYITNO', 'PTI', 2, 0, 0),
(476, '5201311020', '$2y$10$xJXSZayhikNCZIk88Ddc2.H198wOegkSnblvtSuLX2VFCHO8KGrbK', 'M. ROYANI SOPIA AL-HASAN', 'PTI', 2, 0, 0),
(477, '5201311021', '$2y$10$o5bcJT4WD8CtPn1nxVkxBOJ9dETILrmVLJwCP94s3c.uXO4.UdtAa', 'AJMALUDDIN AMRULLOH', 'PTI', 2, 0, 0),
(478, '5201311022', '$2y$10$6cbXf8NPpSNojloQu34/ZupZJaVOD53WtktR3O2zl651xkO/sVM5.', 'ARIF DWI PRASETIYAWAN', 'PTI', 2, 0, 0),
(479, '5191311001', '$2y$10$WXxtJ8vVTdZdRFi/ueYe6eGkZQy2wNv1xZs6jqK7tWz29U/8V7/ly', 'TARTI', 'PTI', 2, 0, 0),
(480, '5191311002', '$2y$10$n6pm1pQ2U3b6ca3VKh2BruRFsBOin9cBYSfOouTcYRFWX6F1BeH/G', 'YOLANDA QHOIRILIA', 'PTI', 2, 0, 0),
(481, '5191311004', '$2y$10$.9exxJz2y4Wu8rkn.VLSLuag1DW.5yU5Xkh1e5PcKhrOuwq60XMCG', 'RICKY IDZA PRATAMA', 'PTI', 2, 0, 0),
(482, '5191311005', '$2y$10$ac9Td81zBOvN/EoakY36OehuzQzsX3DO8fOw5uq3zd9rC4gbsIyAa', 'MUHAMMAD FAFIAN DWI WINARKO', 'PTI', 2, 0, 0),
(483, '5191311006', '$2y$10$IgOKkkXZJY4F7Bl01r7.HeI26/EDB8sOgREvvArccaQm9DzS9jrtG', 'AKHMAD KHOIRUDDIN', 'PTI', 2, 0, 0),
(484, '5191311008', '$2y$10$VqfVkLluRKNhfey7tLhFpeCxDmdqyzaCXA.7BQwsDIWshbU.b0aQK', 'TRI AGNAS APRILIA LESTARI', 'PTI', 2, 0, 0),
(485, '5191311009', '$2y$10$1Cigr6A4DWo7nZhJAEYLhOFa1lnE8ayBt1sMERP5J5WrRsuKId5x6', 'ALWI ARIYANTO', 'PTI', 2, 0, 0),
(486, '5191311010', '$2y$10$sf5LeF6AOAvlUZny1ShXeuSX/HzAYmxhgQKZa05n7JXXcgEZL5dIW', 'VIRA AYU WIDIARTI', 'PTI', 2, 0, 0),
(487, '5191311011', '$2y$10$0vsZ6EAC9fRroCqC/Dp39.knJaTz1HT.dqWya4pHVuleNGIlNqkDW', 'ROSYANA SEPTIA RAHMAH', 'PTI', 2, 0, 0),
(488, '5191311012', '$2y$10$tw1bOcp2qfqrzBJ8lsSTuueH2L.s7L9fhesKkRTAsFtcQkXybuj2.', 'NOVA ALVIANA', 'PTI', 2, 0, 0),
(489, '5191311013', '$2y$10$eCt4LM7WDaiQhEj15A3a0eD9J/s5Fk18M0Dc.S4wJbACGkXmDlIKm', 'NURAGITA KUMALASARI', 'PTI', 2, 0, 0),
(490, '5191311014', '$2y$10$C5uN4iAhARcn78Sq5Pp5k.NRIKFRR6hg3CtumSp/INue.DuxY4wka', 'SOJA NUR PRATIWI', 'PTI', 2, 0, 0),
(491, '5191311015', '$2y$10$OsTeyzQaKpXxBydcj8dYlujWpA7JVih5Cg4zdtExehwuPUoMDBUvm', 'FEBRITA VERAWATI', 'PTI', 2, 0, 0),
(492, '5191311016', '$2y$10$F/a/nI/pJoa85lT/3.gXOODLosbYePo/Pj6/sFLiUvwLOMPS0pEkC', 'ALDY ANJAZSMARA', 'PTI', 2, 0, 0),
(493, '5191311017', '$2y$10$A29kbWAN./s6DIplG/aC3OffAq8PGirYK6fuMb3YWsbcAatv8V1O2', 'ZAHRA HARUM LUTHFIAH', 'PTI', 2, 0, 0),
(494, '5191311018', '$2y$10$kKac3Je6aY/nHFcvpRI./OweP5Q4MrNPXpehzMNuey0vV3p8O69Qe', 'FRISKA AMELLIA INSANI', 'PTI', 2, 0, 0),
(495, '5191311019', '$2y$10$MCSYNFfoK4vgTRnw0ygro.RKLJH4pmDlnAuPJYJmR4LD16xrx66PC', 'EVERESTO GIGIH ANGGAYUTAMA', 'PTI', 2, 0, 0),
(496, '5191311020', '$2y$10$XgM06b8tDT5KRVZ/1npnYuxs5.MCBTXtnftmku8.P92nZot7MEpdy', 'LUKI AWAL ANDRIANTO', 'PTI', 2, 0, 0),
(497, '5191311021', '$2y$10$1fsho0dFMr5TT/UTtSj.0uaTtGpXbZ.jAIYINxNPw.j66e3firvsK', 'WAHDAH SAMI\'UL ILMI', 'PTI', 2, 0, 0),
(498, '5191311022', '$2y$10$szabVgtmcLUOdA0RFpnbcetaEdN.efOMyhJJk2s3rmHczqicRiVsm', 'NANANG KURNIA WIDIANTO', 'PTI', 2, 0, 0),
(499, '5191311023', '$2y$10$aNHnVvETxqq5Y.yTFLu4U.0KwQA73P5F2I.AVQf/kJcoY8OFvg6B.', 'AJI PUTRA ROMADHAN', 'PTI', 2, 0, 0),
(500, '5191311024', '$2y$10$oqfcgb0Y7hiRSi2CVRXmJuUcVEk2z04WzOMv7Iy0b5bPX1UE2wdf.', 'NAUFAL FALAH SUSANTO', 'PTI', 2, 0, 0),
(501, '5191311025', '$2y$10$eY8JvqG0ha/d/QE02KZ7Vez.xY/bAGum.Xs3prT/bPuf9N1W52Im6', 'ADJIE PANGESTU', 'PTI', 2, 0, 0),
(502, '5191311026', '$2y$10$7sj/o8y7f/nTkJhV/cyqvuorxcUjdvWmaYYXQ8kGL2FGI5I8iBAqy', 'CITRA CUT KUSUMASANI', 'PTI', 2, 0, 0),
(503, '5191311027', '$2y$10$dgErL4T0TeNIw/64CdU3iOVBLluvf785xEyEBdEgoGZO3fjvdKFeq', 'ROSAD AGUNG KUSUMODJATI', 'PTI', 2, 0, 0),
(504, '5191311028', '$2y$10$SrSqhMXhIq92S9HlSdkZNOKEfMUlrFhiP7TrMmzTbfs.ia8tJyhpu', 'NOVITA HAYATUN NUFUS', 'PTI', 2, 0, 0),
(505, '5191311029', '$2y$10$BSRn7ynWe1p6sUH9NIH8L.MtiHGTua4iiTKPf2I9IJdOfpEWwDfEq', 'CATUR HANDANU', 'PTI', 2, 0, 0),
(506, '5191311031', '$2y$10$ud9.UWDLjicFcyN6tTMSUOCH/c.8LR4VClWYzlNyfh288y6VaJipy', 'IKHSAN RAMANDA WAHID', 'PTI', 2, 0, 0),
(507, '5191311032', '$2y$10$ZpupeeBzfLf4yyLFHtBec.5Ly3eEOkb5NK1Gd15sQdus0HmNCLaqy', 'AHMAD IRFANDA', 'PTI', 2, 0, 0),
(508, '5191311033', '$2y$10$AQAzGEjdhcCv1PaR1u7FuOvTZZkFYtJNEqbB/7uNvv1pfqAkchV3a', 'NUGROHO BIMO SUSENO', 'PTI', 2, 0, 0),
(509, '5191311034', '$2y$10$FHb75EB/ixaIOCsqgLlR3.emkEvuDO2pUJfCnOxDL2FfohsQweAji', 'RYAN PAMUNGKAS', 'PTI', 2, 0, 0),
(510, '5181311001', '$2y$10$j3/3Iavi1HgyZll0VdJMgOE25dnI9so1AsfnitAh98mej8kS2LgH6', 'CATUR BAYU PAMUNGKAS', 'PTI', 2, 0, 0),
(511, '5181311002', '$2y$10$tfXR16fUdBXgaxwtTKIGF.OhnMAs06Qc/LQRE6.5Xr2IrsrLDlQlG', 'DAMEE AYUNINGRUM', 'PTI', 2, 0, 0),
(512, '5181311003', '$2y$10$ggjA5TBQX8KeWXa4pJ3w4ut5SFYTxWLpOO2rQsyfqOm4Z7ZIlJST.', 'RIFQI ADDIA PUTRA', 'PTI', 2, 0, 0),
(514, '5181311005', '$2y$10$1ObIgrIJzEDf8361fbhQW.8E3NnESaJcrpw1Fwa6vZiPdxyTkju3u', 'YUDA SURYA PAMUNGKAS', 'PTI', 2, 0, 0),
(517, '5181311008', '$2y$10$1A9W0EHc1Sgnrp5tcl/0eO8aZDQiAMxR0H7jO6e/WNjOAhZLOHGvu', 'YODI IRAWAN', 'PTI', 2, 0, 0),
(518, '5181311009', '$2y$10$cPVRP.IjaAodL5mOkV9pbuskH5txtTyafmyoLO9XIPcrUE/3t9D5y', 'NABELLA HARRY MAHARANI', 'PTI', 2, 0, 0),
(519, '5181311010', '$2y$10$JBd35bwESp7pT9OEtxC1/.KUwG7zVdzMyeh2bsb2xNG0aO5K3.3oW', 'KEVIN ITSNAEN RIDHOKA', 'PTI', 2, 0, 0),
(520, '5181311011', '$2y$10$MyZQ/HBXDe9bAY/7WTh7J.UMS8vjVSFhmikHIHuABHWqyvVQvz/xS', 'LAVIANUS WANGGE', 'PTI', 2, 0, 0),
(521, '5181311012', '$2y$10$jo4VSl5zMm817vCH4qNbH.ZOonIV8Crac9n6bFyJrJDQS2MYssy.6', 'FIFI MELINDA FANI', 'PTI', 2, 0, 0),
(522, '5181311014', '$2y$10$fFrIIUQtg4ReXJGejyG4BO.hFqJxxOUKlZS3M9eevp840qa3ez96G', 'WUNI NOVIANTI', 'PTI', 2, 0, 0),
(523, '5181011015', '$2y$10$1wuOiuJVDLTPOv/TpyaCcOHpGuej/JOu4vUWrokSwvyvM9bRX0CKy', 'TANTI VINAWATI', 'PTI', 2, 0, 0),
(524, '5180711016', '$2y$10$C0JCfrujAijb9bJnb3z5h./l1ZBWlN2PxUxygFvP3RMLMI5xBNni2', 'AJI LIM SETEVEN', 'PTI', 2, 0, 0),
(525, '5181011017', '$2y$10$lnIqxO4tEJ6Gea5xiAXZhuaP00hBHVPABCKTIfb8QkCEbSz4C9oAW', 'MUKLIS RAHMAN SETIAWAN', 'PTI', 2, 0, 0),
(526, '5181311020', '$2y$10$yZjwvL.59aDsOGV/x3N5lOLo6u4fcRnADox5zPKJPQNZQb155wySK', 'NANDA LIDYA FADILLAH', 'PTI', 2, 0, 0),
(527, '5181311021', '$2y$10$VXqL6myusX0bSz0zQJbkVOiYoTkTLfwGVdcOc1M9rN1GwLVoAwDGW', 'SITI SAULIA TARI', 'PTI', 2, 0, 0),
(528, '5181311022', '$2y$10$6Jqo56DVRCyCH/UaOswkge2tXYIG9FDChd5kYXsxa1dxNVSVO.a9u', 'MUH. FAUZAN HAMZAH', 'PTI', 2, 0, 0),
(529, '5181311023', '$2y$10$4nZhqTfsXKejaXfaMif7Oeae1P74.SBb9W/7goN/x4OL.EdVvlD0i', 'AWALIF GHOTAMICHA IRFAN SAPUTRA', 'PTI', 2, 0, 0),
(530, '5181311024', '$2y$10$xS.P5JZ/CVHKocswZ0MbqOb1IoEoldVcQesRLbgPXtPZW1HlvA8Um', 'WAHYU BAGUS ASHARI', 'PTI', 2, 0, 0),
(531, '5181311025', '$2y$10$FSK92o7A7V8aOk3lcMmb2eviHiQL6jUzpNh9vmOolly1tCRbEq0Wi', 'BAGUS MIFTAH NUR HAQQI', 'PTI', 2, 0, 0),
(532, '5181311027', '$2y$10$PyavHxSpn9KLHfd/K7M7IOOheGfm942wOLXbmNsb4PWC7o7svG4DK', 'SYAYYIDATUL MUSABBIHAH', 'PTI', 2, 0, 0),
(533, '5201411001', '$2y$10$A7OMTDLe7Zku5oD0Byp1uumw4tc33hISand5MFyCViuMJM/1rQcvy', 'AXEL SYAILENDRA', 'PBI', 2, 0, 0),
(534, '5201411002', '$2y$10$5w5asDkX7kqK5JmV/An1euraqR/fTgosbtznMg7TqzxEUZN4u5bmK', 'RISMANSYAH', 'PBI', 2, 0, 0),
(535, '5201411003', '$2y$10$sxoIZK5Cvtmg9NCikjh5heElvh.sNeIWKsmZrgur/v7zCoZDgXfI.', 'TRI ANGGORO JATI', 'PBI', 2, 0, 0),
(536, '5201411004', '$2y$10$qzh5/IjhSXlTSr.gF8Vae.ivQUe3gmfAQJQzoxtSlOkDubA8HEcZm', 'DIDHA FRIDAYANTO', 'PBI', 2, 0, 0),
(537, '5201411005', '$2y$10$XymDDffx5GaUSspK0sEurO1NmQAIvQGhKbUsRES2s053RE2iEggve', 'NUR JANNAH', 'PBI', 2, 0, 0),
(538, '5201411006', '$2y$10$NJkkEXWUT0sdBJCKAJp7Wua99oPTnX6IDfujE5c8b3lIZMpkkZytC', 'ENDAH KUSUMA WARDANI', 'PBI', 2, 0, 0),
(539, '5201411007', '$2y$10$z.vbvG.4u/SUg9qbJzIKNeuxX/2xU9RQ3r8QK5tWpcM0JzdDLJTc6', 'APRILIANI DEWI PUSPITA N', 'PBI', 2, 0, 0),
(540, '5201411008', '$2y$10$f.teSubeRje.hdEVgE6Y3OgccczWenVoQqwGzuYjLGWV7uoMDhj66', 'RATRI MAURA ISANTI', 'PBI', 2, 0, 0),
(541, '5201411009', '$2y$10$KcXQ3K0OvKER8SyPd6GUWuit4NNDgG0LV8w/2KL8emBAuY3sMiaBW', 'AMINI ANDRIA MEILANI', 'PBI', 2, 0, 0),
(542, '5201411011', '$2y$10$PfSgG1W4UFMEx8wAY8zSduzRpdyXK/uGhuiX1ieVx6gKxtnfByTjG', 'ANGGITA PUTRI NURINA', 'PBI', 2, 0, 0),
(543, '5201411012', '$2y$10$58lYPPZtPqEr/5yX3zEHYubiV03hy6ZYFAm.wpxEw8pDmWf.HbF2m', 'NADIA KHAERUNISSA', 'PBI', 2, 0, 0),
(544, '5201411013', '$2y$10$H6FVDJsbnps4X6qZPbjHKu.w5Jdodahum0jH1Lwm.93F7hEkYGN1.', 'SADA AGISTHA SALSABILLA', 'PBI', 2, 0, 0),
(545, '5201411014', '$2y$10$PcpoqQVJ5rIxllvhN0OtqOm6DuX3qxta71NNQBUDlfkonZsbzig5O', 'NINDY CAHYA AILSA', 'PBI', 2, 0, 0),
(546, '5201411015', '$2y$10$EkxVnBVRIN54OXlUpcQ1tO6r46UkrLo5125bNpWf7199K2rzB4X7e', 'ADIRA RINANDA', 'PBI', 2, 0, 0),
(547, '5201411016', '$2y$10$CTFu.cdHiCjWnQtiDYfbZOVq17Le4Os/BUd8e6RqG5Ss3Wci/I.sC', 'GHULAM NAJMUDIN', 'PBI', 2, 0, 0),
(548, '5201411018', '$2y$10$.PEBSlDbs.Y8VkSQtpbmXeve0vut6c59MdEykSZ0H6RFA1dpKAn0G', 'RIZQI ISNANISA', 'PBI', 2, 0, 0),
(549, '5201411019', '$2y$10$WGaYVc.TBolpH23iCGaiNepNtkYLSahi9f59rtvNGq/RsKRscQUHy', 'SITI MAEMUNAH', 'PBI', 2, 0, 0),
(550, '5201411020', '$2y$10$zCfY5hWLvauWiLWy3jqeWedHQu1wfoEtJahFxsDKQS6.GRiLn6.p6', 'WINAR NURALISA OKTASARI', 'PBI', 2, 0, 0),
(551, '5201411021', '$2y$10$Rd1B.3xKaRjxuBDC57hd2OzDfkJNGb.iiOOC4c/36lLhKME1gFdmS', 'NABYLA DANIETHA RESTI MENTARI', 'PBI', 2, 0, 0),
(552, '5201411022', '$2y$10$grXdUiv6V5tv3k6FVGm57eIxNlrU4GWXM8uYCez.vpLIAQeEVSk2a', 'ARTESA PUTRI PRADEVI', 'PBI', 2, 0, 0),
(553, '5201411023', '$2y$10$z1uj3eDdqV0Lf3.pJxFDcO/ichEOgFbsVuKGkDmhHc3SxRJMG.FgO', 'BAYU PRASETYO AJI', 'PBI', 2, 0, 0),
(554, '5201411024', '$2y$10$CMYsqfHSFu113M4c0XhRsebiCHEao7O.oSsiRhx4msJlEqf89UXBO', 'DIAH NURSABILLA', 'PBI', 2, 0, 0),
(555, '5201411025', '$2y$10$UW3ChoN6tr8IfFQ62naAm.fTmfv5RDIl56uMXvH8nCEcSlqJlk2iy', 'MARISA SOFIA', 'PBI', 2, 0, 0),
(556, '5201411026', '$2y$10$zq/laQOOKk02dLZ0IeN0hOr7WG89cAZMEGawdC4rMV.rDfs0pK222', 'PUTRI LESTARI', 'PBI', 2, 0, 0),
(557, '5201411027', '$2y$10$C7w4kYUg03mCxXUXrAqQj.CNmVr6ov8VYbDK9THfQHxbD0rB5kWmq', 'SINTA AYU PURBORINI', 'PBI', 2, 0, 0),
(558, '5201411028', '$2y$10$Kz6KuWBj53lwFXQoeB5f9.xTEOyXAQBAUhnJak96/5hdRViKWq5XW', 'SALSABILA ADHWA BISYARAH', 'PBI', 2, 0, 0),
(559, '5201411029', '$2y$10$4gvZjwX1VxqgCkDFDG3qNO484h5Tt51/oSofZV.w2Bn1CUPDGzWeO', 'AINOMINOVA AYU', 'PBI', 2, 0, 0),
(560, '5201411030', '$2y$10$a6vDmz318vhry62/h/r.hOfIB4vTiiieo.l.4dahM4bzL1uzkq8Rq', 'NOVITA TRI WINARNI', 'PBI', 2, 0, 0),
(561, '5201411031', '$2y$10$qAZTZltlGlX62LO.pKskhe056dZmSuhqafzPDOHAqfvTuSlityi4C', 'ISNAINI NURMALA DEWI HARNINGTYAS', 'PBI', 2, 0, 0),
(562, '5201411032', '$2y$10$49nUlPQpj2wNPY7M6pg2FOKFzrU5ZJB3dogJCPxOP2QjIJ.YMRcW.', 'MUHAMMAD ASHARI PUTRA', 'PBI', 2, 0, 0),
(563, '5201411033', '$2y$10$P32RKsHcvTrISSrBLil.EOGV/RsfIMgKqB4fqFBgTS0bg2ajDJKgK', 'FAHRA MEYTHA DHEA', 'PBI', 2, 0, 0),
(564, '5201411034', '$2y$10$YYSEtGzzGFzcAO9WgQjQx.S7mpHyW5tIWH4nqsQJtrMlCjU.fjOWu', 'FEERAS BINTANG TIMUR', 'PBI', 2, 0, 0),
(565, '5201411035', '$2y$10$g2X8uRd4oa1Iibi4WcnDP.lP3XhOjsrzFxeJ9qISOAijoz6yj/yGm', 'ALIFIYA CAHYANINGSIH', 'PBI', 2, 0, 0),
(566, '5201411036', '$2y$10$w2d0JscAPTxBIA8e5fBP.ui66Q2TnoLIRTN26GtSK.NRWI.exGp0y', 'NUR KARTIKA RATRI', 'PBI', 2, 0, 0),
(567, '5201411037', '$2y$10$2oSOIXCJTiQaQNJEzqo/HuSwx/OmQSAVqMiGuHs4bKVtT9C4dnBFS', 'SHIFANI AISYAH PUTRI', 'PBI', 2, 0, 0),
(568, '5201411038', '$2y$10$X.CpyiAkIqOPe2SfJBewK.ODwO21p3POls9dJhTrHdDZC5DYNOIsK', 'ANNISA DIAH PRATIWI', 'PBI', 2, 0, 0),
(569, '5191411003', '$2y$10$HDEJu4E0fyVI9CjD7BCwu.Md6z7pABa4rdU45v2cllkG7DS8Rv/S6', 'VIKA WAHYUNINGTYAS', 'PBI', 2, 0, 0),
(570, '5191411005', '$2y$10$CKPAHcQjubL.nCrXvS326uEYzEXL2RE3th2q7.TweBHQN4puUR8Yu', 'GENTA RUSMANTO', 'PBI', 2, 0, 0),
(571, '5191411006', '$2y$10$hJmAJvZNAFe95wMxOkErnOir.o6VhDGNz.AQp9PGmWlr/OdVvmI62', 'FEBY YUSALDA BANOWATI', 'PBI', 2, 0, 0),
(572, '5191411007', '$2y$10$D0imXOK1.C7.iIAMp0nt4eyHS79P8SnekXslpVTb8bdIHTIJR.Syi', 'IPUL RUDY PRASETYO', 'PBI', 2, 0, 0),
(573, '5191411008', '$2y$10$2Ja5NGs7WP.0GOQV/uctKuUFu3DYi3kSJdKy9W1g1tJ.05ZUwS2Mm', 'KIKIN FEBY ALAMSYAH', 'PBI', 2, 0, 0),
(574, '5191411009', '$2y$10$iOQkHG7Va6SLPwMHN1zP2e89MMD34jXfMceZRz.50/W4HK.BUgV2O', 'SAFIRA ZAHRA PRASETYA', 'PBI', 2, 0, 0),
(575, '5191411010', '$2y$10$dfMdRIQ0uGRjWNCCTBrfT.MHpab41WaLtAB1Bxk6h8uYm4QuiyzMC', 'CINTYA RIMA PUSPITASARI', 'PBI', 2, 0, 0),
(576, '5191411011', '$2y$10$n2hIUI6oX0aBClfUqjBYGea1817vHRs5oRQWbECWe2/GYIGRuLWaS', 'RENDRA MIFTAHUL FADHILA', 'PBI', 2, 0, 0),
(577, '5191411012', '$2y$10$QELh8mDQ0kl8TAvgk2BlU.E40mQ426DzI8tmftmwhWPF8/SrcLtAG', 'EKA CAHYA SAPUTRA', 'PBI', 2, 0, 0),
(578, '5191411015', '$2y$10$dzRCTIuZnhMHDYxxmBW76elbIrtcMeukoUeBPRLRyB2bXua6S1JUW', 'MIRZA RIWAYATI SA\'ADAH', 'PBI', 2, 0, 0),
(579, '5191411016', '$2y$10$Yp24tkNU2ImJvgJ3vnDtXuJwh/iDxX8m9rjJ5/tKDuVG0uIZtg1ye', 'ANASTASYA GIOVANA BAMBANG', 'PBI', 2, 0, 0),
(580, '5191411017', '$2y$10$Ld2FjEVhTRhS/uCgSGRgCeoz8Xqtt0t1tpfNOz24RclC7ihUuoAJ.', 'GRATIUS OKTOCLARUS T', 'PBI', 2, 0, 0),
(581, '5191411018', '$2y$10$RjRDwvNgvtRiybjqGmMIuu.pZqVzeuWTYs2/c9qLPBHzsKXFS./uq', 'DELIS LISAFITRI', 'PBI', 2, 0, 0),
(582, '5191411019', '$2y$10$yOOmEyERx9CS6KteaCdVPemiZ5IU/Cjp/c64UNAJnWBsYDcRLGdWW', 'DEVARA AFTINA PUTRI', 'PBI', 2, 0, 0),
(583, '5191411020', '$2y$10$qI1/PbmHkx24bJrDobRUP.LR0I0qpJ4VZgWt2r8XxeA505.7ua91G', 'ANGELLA MUNA MAWAR DHANI', 'PBI', 2, 0, 0),
(584, '5191411021', '$2y$10$CsvaVo5NNJRHdqz64kWwMuf4jWvd24eBMT/.ACgDcswBdCK7GCbiS', 'PUTRI LISA ANGGRAINI', 'PBI', 2, 0, 0),
(585, '5191411022', '$2y$10$3hgsMF7aBNc2XZs0/8BOPubQ5lOHKZl6/Sc9phD8NtsV7cHw6rRfu', 'MUH. FARIS SUSATNO', 'PBI', 2, 0, 0),
(586, '5191411023', '$2y$10$aBHU6V9LDQwhn04v3uWCm.ciC.GbjI6Uiz.B2nelkY7EaTOgKO1gC', 'ALI FIRA', 'PBI', 2, 0, 0),
(587, '5191411024', '$2y$10$TuxQ5LOCF93tFUjULaouSejs5vpnKmUWtWkgkqd8VLOQ/aa9t5BKO', 'DINA RIZQI ANNISA PUTERI', 'PBI', 2, 0, 0),
(588, '5191411025', '$2y$10$GJQlEcXbUfIuY2HSx4FVE.YNvmY/dzSN15KjFclauVnRNWIu4Wrx2', 'ADITAMA BAGUS ANTASARI', 'PBI', 2, 0, 0),
(589, '5191411026', '$2y$10$Wlbp6qO/fQb/qQZmwOtBPuzB7NEko6buOPn2N4XJT00yC164XqL1y', 'METYANA SETYORINI', 'PBI', 2, 0, 0),
(590, '5191411027', '$2y$10$FMiqZa0iC2UMgjQ.HRO1PeGhsdpIV88yCXKMzAUFcz3s52EmEVxTa', 'HANA I KHAIRUNNISA', 'PBI', 2, 0, 0),
(591, '5191411028', '$2y$10$jkt2OpdGCdWbZ8nKx2492ODO/AeMws6OnZJchP.dQlWBYKKtvxE/G', 'DYAH AYU RAHMAWATI', 'PBI', 2, 0, 0),
(592, '5191411033', '$2y$10$3P1FqrKyprA7V5CzkIabOun92cAlX7IZyyKUFGT4OmMxkvGC4L58a', 'DANANG FAUZI ALAMSYAH', 'PBI', 2, 0, 0),
(593, '5191411034', '$2y$10$EVFUiv7NQmNtRCfFK3DK0evZnR94ZEhfqpq/ba.yW3WanEXlP7wzO', 'SABRINA ALIFANISA', 'PBI', 2, 0, 0),
(594, '5181411002', '$2y$10$9skjiCZ6Wv8nfUDzxZjy6..whuFC8j0H8QmEFgq9DLBX.uOvX1T8K', 'MUHAMMAD ASRI MAHU', 'PBI', 2, 0, 0),
(595, '5181411003', '$2y$10$yLv0KFLbIhNl/fqwNE8Z..5XOtYWgxbx1JPXpR6Y6w4pwDEvlSnye', 'ZAKY LUTHFAN ABDILLAH', 'PBI', 2, 0, 0),
(596, '5181411005', '$2y$10$ZsAVOGp1urpgmfRzKCPkQOWGnXMcVAa6jn4SNmqskfkgFuKifA4hq', 'AISA LAITUPA', 'PBI', 2, 0, 0),
(597, '5181411006', '$2y$10$nzA3Xzqo7qtRCq80VLqBieNfItczDiLbKCMXrWjYh93yQlADzL7rO', 'ARDANA RIZKY RAMADHAN', 'PBI', 2, 0, 0),
(598, '5181411008', '$2y$10$s/xn1yQZhum4oRInoUiDX.rB4yXqOlaE7DvrJItF.L1NQOVQUf2sK', 'MIRA LESTARI ', 'PBI', 2, 0, 0),
(599, '5181411009', '$2y$10$a32tF2NnxHlIZzcYwd8pcupy9x7xKBNxHIF1zEo/xseBf925xCB42', 'FAJRIN IVIANA NUR AINNI', 'PBI', 2, 0, 0),
(600, '5181411011', '$2y$10$YNuLuODdEljsxm.zJI7cPeg/RB3RPtPv6quz2NbW2MY4c88n7yziu', 'AYU SETIYA NINGSIH', 'PBI', 2, 0, 0),
(601, '5181411012', '$2y$10$UVhG0fYXJMyVn406VOp8o.V8sQJ7LWpKsTGpPoF0rdE7cDieKu8yy', 'DHINAR INDAH NIRMALA', 'PBI', 2, 0, 0),
(602, '5181411013', '$2y$10$uJBwh5YwT/TufbavyWHJXuVPifMnVBZek.ZFApXAOWYroFKfwCeNu', 'MAHDALINA INTAN SARI', 'PBI', 2, 0, 0),
(603, '5181411014', '$2y$10$AZOS7rAY9CjefdPkmd207eaYM85mbxdMOnqymX2/S0eWTdcpSfBde', 'NURLIN', 'PBI', 2, 0, 0),
(604, '5181411015', '$2y$10$VmQSDoaidw.vBIaevkK4LOU2cIoguFdTbWnOSwq.d5ONR..bV2f5K', 'ALIVIA INTAN SAPUTRI', 'PBI', 2, 0, 0),
(605, '5181411016', '$2y$10$OOkn/UWmYvlnMptV7ew51ux/Gq9RrL8L4zLypATdaMboY/fiiptB6', 'JIHAN KHANSA', 'PBI', 2, 0, 0),
(606, '5181411018', '$2y$10$/jchlwbAwt/eB0DJDE1ece4MkPuC7Y20QkiC5Pd0D2u.xPNCMWmZa', 'NURMA HARFI QUR ANNIEDA', 'PBI', 2, 0, 0),
(607, '5181411019', '$2y$10$t7CAocHWuLsF8yNJgRbGM.oHVLlMcicqBb/5pqNawhodNhQKb6mRu', 'INDRI HAPSARI PUSPOYO PUTRI', 'PBI', 2, 0, 0),
(608, '5181411020', '$2y$10$i4.vKKtA7eEoBz9TLQeWTuWQInBwjASFtLh8Ye5ADOg7TRAsmwwxS', 'DION ANDREYANTO', 'PBI', 2, 0, 0),
(609, '5181411021', '$2y$10$rs1yoChUDvwpv5Uyih4Om.jueJyAdtLMb7G9pRxuQ2k9XikUWO9dC', 'MAULINA IMTIHAN', 'PBI', 2, 0, 0),
(610, '5181411023', '$2y$10$ydq9gXkcN1XwTR.1cYMFs.aPt6cg96DtCH/cAYNlqpnhI2PpIGkHi', 'ALIFAH MAUDIA RIZQULLAH', 'PBI', 2, 0, 0),
(611, '5181411024', '$2y$10$v2xVic9t40p3mAV78C2AJuWEH8SUGUFwu35q13lXpjF524Z7eXeju', 'NURSAH NOLA BERUTU', 'PBI', 2, 0, 0),
(612, '5181411026', '$2y$10$5kQPXtIZZ0RtWM/AnY5Y6.JiMDU8dCWf5xFA9e2H1q.bKw1FPNoym', 'WITRIATUL MUNAWAROH', 'PBI', 2, 0, 0),
(613, '5181411027', '$2y$10$Bh40rKbIpnS4mVyb2UXdUOdLOMihQ7NpPwC34uVb.D3GXJnBMPteK', 'FAJAR MUKHORI', 'PBI', 2, 0, 0),
(614, '5181411028', '$2y$10$/KwKB5C2P3qR6GX.5Gn57uw75lMxQHH9D69IgkRdSkfZTEbgOlda.', 'ENGGAL MAWAS WATI', 'PBI', 2, 0, 0),
(615, '5181411029', '$2y$10$Fbh5vqthDdwI0WB8guLYc.0ZClqBkn5E3R/.ZwH3yNpTbhsHFoWO.', 'EMILLY RESTA ALAM', 'PBI', 2, 0, 0),
(616, '5181411030', '$2y$10$3/VjZc2HFQ1km8rKw6/F..VjEaN1aOKWJ1OnZRDchxDzJaHTr0rGm', 'MUHAMMAD FAISAL', 'PBI', 2, 0, 0),
(617, '5181411031', '$2y$10$u6Zn6srwztM6KTUcEk6sCev4akvWMJuBqbqhumaULmDZBefJl46hu', 'HENI FAMILIA', 'PBI', 2, 0, 0),
(618, '5181411032', '$2y$10$WHO2djiDUehvMOzKsURzPetEutTrJblUjEYPYxIJQSAp5Y7UWPZQm', 'NUR IZHA FATURRAHMAN RIVALDI', 'PBI', 2, 0, 0),
(619, '5181411033', '$2y$10$bQq0tEVWsd2yHf6V1CiF0u9I4/5cl4yOW8clZgpTy5cmIwqVLBa0i', 'SENIA PUTRI MIRANTI', 'PBI', 2, 0, 0),
(620, '5181411036', '$2y$10$BKNecAM9JGpb2dRdS9JKcOk3dOjg.FA40PRlynoMJc0ChGcCNPHzq', 'RIA WULAN DARU', 'PBI', 2, 0, 0),
(621, '5181411037', '$2y$10$Z.473qlETz5YuGNxP4v86e6gMY4UIwhKMNaD5ejPhAaPOpwDv709i', 'ADIMAS JAKA PRATAMA', 'PBI', 2, 0, 0),
(622, '5181411039', '$2y$10$Oh2Y60CSevnXM4qL2UyLZenroD4LujN74f/9BUmMHacGWh./Pnzii', 'INTAN DEWI RAKHMAWATI', 'PBI', 2, 0, 0),
(623, '5181411040', '$2y$10$W.RorEgaEAlyHh1kSkYZDulP/ccFos1izOjloX50v67/HdBwjDPRy', 'BIMA ALVIANTO ', 'PBI', 2, 0, 0),
(624, '5181411041', '$2y$10$SNqvO5e6zYdscYXcPEQakuPANtB0nGXRgzKaYhhHqdAtS94QHs1fm', 'ZULFANI DEWI NAELY ROHMAH', 'PBI', 2, 0, 0),
(625, '5181311017', '$2y$10$ThPgC8TLZtsHeP7RCURMHO2zxmEeHjCRTnBGpn6EaYHIRH2iBFTyG', 'Awalif GIS', 'PTI', 4, 1, 1),
(626, '5181311004', '$2y$10$RHlASwueVMcx3Z2yG.sILeIh0xn.3CteNLiscWcyUJCRtac2fLUR6', 'M. Fajar Adiska', 'PTI', 4, 1, 1),
(627, '5181311006', '$2y$10$7zeir88Iv5/IcLk4SrOdS.4C9NOodUAh4mI/z72IuU0C/LwOd1IyW', 'Rizky Nur', 'PTI', 4, 1, 1),
(628, '5181311007', '$2y$10$qJUQcoYoKM4lGVmw4uMYBO7zmJh8lXOxaxiUC/t32FfC01KYuNM92', 'Yuda Surya', 'PTI', 4, 1, 1);

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
(21, 1, 'Activate User', 'admin/activate', 'fas fa-fw fa-user-clock', 1),
(22, 4, 'Report', 'votes/report', 'fas fa-fw fa-file', 1);

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
(30, 8, 625, 1626297043),
(31, 8, 626, 1626297082),
(32, 9, 628, 1626297188),
(33, 9, 627, 1626297209);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=630;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
