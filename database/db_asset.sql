-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Agu 2022 pada 16.09
-- Versi server: 5.7.24
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_asset`
--

CREATE TABLE `tb_asset` (
  `id_asset` int(11) NOT NULL,
  `nama_asset` varchar(255) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `nopol` varchar(15) NOT NULL,
  `km` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('Tersedia','Perbaikan','Rusak','Dipakai','Dijual') NOT NULL DEFAULT 'Tersedia',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_asset`
--

INSERT INTO `tb_asset` (`id_asset`, `nama_asset`, `id_jenis`, `id_kategori`, `harga`, `deskripsi`, `kondisi`, `nopol`, `km`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Mobil Elef', 2, 1, 'Rp. 500.000.000', 'tranportasi pesantren 20 orang', 'bagus', 'N 1 NJ', 250, '2e850dac7b5d25b282bb616a43036ab1.jpeg', 'Dipakai', '2022-08-16 10:41:44', NULL),
(5, 'Mobilio', 2, 1, 'Rp. 250.000.000', 'tranportasi pondok 6 orang', 'bagus', 'N 2 NJ', 200, 'dcf11218eb24f726018a0ea06501bd7a.jpeg', 'Tersedia', '2022-08-16 10:44:11', NULL),
(6, 'Innova Reborn', 2, 1, 'Rp. 300.000.000', 'transportasi pondok 7 penumpang', 'bagus', 'N 3 NJ', 150, '58a07c257f65a8a7499ff0275619d756.jpeg', 'Tersedia', '2022-08-16 10:46:22', NULL),
(7, 'Innova', 2, 1, 'Rp. 300.000.000', 'transportasi pondok 7 orang', 'bagus', 'N 4 NJ', 150, '6a05fd95cd0a297da41893eb22dd5a6a.jpeg', 'Tersedia', '2022-08-16 10:47:37', NULL),
(8, 'Calya', 2, 1, 'Rp. 250.000.000', 'transportasi pondok 7 orang', 'bagus', 'N 5 NJ', 150, 'accea846a6096171ad6b9f6eb0d97f13.jpeg', 'Tersedia', '2022-08-16 10:48:33', NULL),
(9, 'MOBIL', 2, 1, 'Rp. 320.000.000', 'HITAM', 'Bagus', 'N 1812 NJ', 2962, '601c9f52fa33d19c01dfebbceb83ce37.jpeg', 'Tersedia', '2022-08-19 22:00:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Kendaraan', '2022-06-21 13:24:16', '2022-08-09 19:07:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Aset Bergerak', '2022-06-21 13:46:36', '2022-08-09 19:07:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemakaian`
--

CREATE TABLE `tb_pemakaian` (
  `id_pemakaian` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `tujuan_pemakaian` varchar(255) NOT NULL,
  `tanggal_pemakaian` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Disetujui','Dibatalkan','Diproses','Dikembalikan') NOT NULL DEFAULT 'Diproses',
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemakaian`
--

INSERT INTO `tb_pemakaian` (`id_pemakaian`, `id_asset`, `tujuan_pemakaian`, `tanggal_pemakaian`, `deskripsi`, `status`, `id_user`, `created_at`) VALUES
(9, 7, 'besuki', '2022-08-18', 'membeli peralatan', 'Dikembalikan', 3, '2022-08-16 04:06:20'),
(10, 4, 'Kota Probolinggo', '2022-08-20', 'Mengantar Barang', 'Disetujui', 1, '2022-08-20 02:31:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengadaan`
--

CREATE TABLE `tb_pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `nama_asset` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tujuan_pengadaan` text NOT NULL,
  `status` enum('Belum diproses','Disetujui','Ditolak') NOT NULL DEFAULT 'Belum diproses',
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengadaan`
--

INSERT INTO `tb_pengadaan` (`id_pengadaan`, `nama_asset`, `jumlah`, `total_harga`, `tujuan_pengadaan`, `status`, `id_user`, `created_at`) VALUES
(4, 'mobil truck sampah', 1, 'Rp. 150.000.000', 'menambah unit pengangkut sampah di ppnj', 'Disetujui', 3, '2022-08-16 04:09:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengelolaan`
--

CREATE TABLE `tb_pengelolaan` (
  `id_pengelolaan` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `tujuan_pengelolaan` text NOT NULL,
  `status` enum('Diproses','Disetujui','Dibatalkan') NOT NULL DEFAULT 'Diproses',
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengelolaan`
--

INSERT INTO `tb_pengelolaan` (`id_pengelolaan`, `id_asset`, `tujuan_pengelolaan`, `status`, `id_user`, `created_at`) VALUES
(5, 7, 'service', 'Dibatalkan', 3, '2022-08-16 04:11:04'),
(6, 8, 'Ganti Oli', 'Disetujui', 1, '2022-08-20 03:52:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penghapusan`
--

CREATE TABLE `tb_penghapusan` (
  `id_penghapusan` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `tujuan_penghapusan` text NOT NULL,
  `status` enum('Diproses','Disetujui','Dibatalkan') NOT NULL DEFAULT 'Diproses',
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penghapusan`
--

INSERT INTO `tb_penghapusan` (`id_penghapusan`, `id_asset`, `tujuan_penghapusan`, `status`, `id_user`, `created_at`) VALUES
(3, 7, 'dijual', 'Dibatalkan', 3, '2022-08-16 04:11:46'),
(4, 9, 'Dijual', 'Disetujui', 1, '2022-08-20 04:15:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `jabatan`, `no_hp`, `level`, `image`, `username`, `password`) VALUES
(1, 'Ikhsan Hanafi', 'ikhsanhanafi@gmail.com', 'Admin SIM Asset', '085335506556', '1', '29b9f01209c3aca8b8e02125900caa79.jpeg', 'Ikhsan', '8b58c0bde0dba29c6d4980c3c74655416e9ee16b'),
(2, 'Nurul Jadid', 'nuruljadid@gmail.com', 'Pengurus Pesantren', '08883077077', '2', '59c40a44401a8b3dc60a7b29e8b9fe15.png', 'pondok', '9308baecf72b87756b48c4e0d3b03ab9f5b7586e'),
(3, 'Indra saputra', 'alangrizki27@gmail.com', 'petugas karungga', '085335506555', '2', 'default_avatar.jpg', 'indra', '300a29a2fe6e701da25021b20bb3f00151bc5498');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD PRIMARY KEY (`id_asset`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_pemakaian`
--
ALTER TABLE `tb_pemakaian`
  ADD PRIMARY KEY (`id_pemakaian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_asset` (`id_asset`);

--
-- Indeks untuk tabel `tb_pengadaan`
--
ALTER TABLE `tb_pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_pengelolaan`
--
ALTER TABLE `tb_pengelolaan`
  ADD PRIMARY KEY (`id_pengelolaan`),
  ADD KEY `id_asset` (`id_asset`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_penghapusan`
--
ALTER TABLE `tb_penghapusan`
  ADD PRIMARY KEY (`id_penghapusan`),
  ADD KEY `id_asset` (`id_asset`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_hp` (`no_hp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_asset`
--
ALTER TABLE `tb_asset`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pemakaian`
--
ALTER TABLE `tb_pemakaian`
  MODIFY `id_pemakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pengadaan`
--
ALTER TABLE `tb_pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pengelolaan`
--
ALTER TABLE `tb_pengelolaan`
  MODIFY `id_pengelolaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_penghapusan`
--
ALTER TABLE `tb_penghapusan`
  MODIFY `id_penghapusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_asset`
--
ALTER TABLE `tb_asset`
  ADD CONSTRAINT `tb_asset_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_asset_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemakaian`
--
ALTER TABLE `tb_pemakaian`
  ADD CONSTRAINT `tb_pemakaian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemakaian_ibfk_2` FOREIGN KEY (`id_asset`) REFERENCES `tb_asset` (`id_asset`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengadaan`
--
ALTER TABLE `tb_pengadaan`
  ADD CONSTRAINT `tb_pengadaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pengelolaan`
--
ALTER TABLE `tb_pengelolaan`
  ADD CONSTRAINT `tb_pengelolaan_ibfk_1` FOREIGN KEY (`id_asset`) REFERENCES `tb_asset` (`id_asset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengelolaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_penghapusan`
--
ALTER TABLE `tb_penghapusan`
  ADD CONSTRAINT `tb_penghapusan_ibfk_1` FOREIGN KEY (`id_asset`) REFERENCES `tb_asset` (`id_asset`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penghapusan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
