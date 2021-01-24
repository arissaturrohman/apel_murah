-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Des 2020 pada 14.45
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelayanan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_warga` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kk` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `negara` varchar(50) NOT NULL,
  `gol_darah` varchar(50) NOT NULL,
  `status_kawin` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `status_kk` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id_warga`, `nik`, `kk`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `agama`, `negara`, `gol_darah`, `status_kawin`, `alamat`, `rt`, `rw`, `desa`, `status_kk`, `pekerjaan`, `kode_pos`) VALUES
(1, '3321060203930001', '3321121111190001', 'Arissatur Rohman', 'Laki-laki', 'Demak', '2020-06-08', 'Islam', 'WNI (Warga Negara Indonesia)', 'Gol. Darah A', 'Kawin', 'Dukuh Truko', '04', '03', 'Sukodono', 'Kepala Keluarga', 'Petani', 59551),
(2, '2147483647', '3321121111190001', 'Lisnawati', 'Perempuan', 'Demak', '2020-08-15', 'Islam', 'WNI (Warga Negara Indonesia)', 'Gol. Darah B', 'Kawin', 'Dukuh Truko', '04', '03', 'Sukodono', 'Anak', 'Petani', 59551),
(3, '4679485969368', '4697642353', 'Narendra', 'Laki-laki', 'Demak', '2020-08-18', 'Islam', 'WNI (Warga Negara Indonesia)', 'A', 'Belum Kawin', 'Dukuh Truko', '04', '03', 'Sukodono', 'Kepala Keluarga', 'Pelajar', 59551);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `pengajuan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `id_warga`, `pengajuan`, `status`, `kode`, `qr_code`) VALUES
(33, 2, 'bhbhbsa', 'ttd', '24qNs', '24qNs.png'),
(34, 1, 'Membuat Akta Kelahiran', 'ttd', 'LQgIX', 'LQgIX.png'),
(35, 1, 'Perekaman KTP', 'ttd', 'pKxGr', 'pKxGr.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `level`, `nik`) VALUES
(1, 'ngadmin', '$2y$10$o..9okFEnmIV23oiZHAgHegxe/NM0vIZ5ANUrA0Ge8D25gqY8yhey', 'Lisnawati', 'petugas', ''),
(2, 'adm1n', '$2y$10$yzkXY7pKRYvQdcAAJ3zXgOuEQE8T7hbFOyuwwklMgyhF1o4c9k0Ju', 'Arissatur Rohman', 'admin', '3321060203930001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id_warga`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
