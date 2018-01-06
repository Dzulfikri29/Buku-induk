-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Nov 2017 pada 03.14
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_induk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id_orangtua` int(12) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `tl_ayah` varchar(50) NOT NULL,
  `tglahir_ayah` varchar(50) NOT NULL,
  `peker_ayah` varchar(50) NOT NULL,
  `agama_ayah` varchar(20) NOT NULL,
  `tlp_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tl_ibu` varchar(50) NOT NULL,
  `tglahir_ibu` varchar(50) NOT NULL,
  `peker_ibu` varchar(50) NOT NULL,
  `agama_ibu` varchar(20) NOT NULL,
  `tlp_ibu` varchar(15) NOT NULL,
  `alamat_orngtua` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Dumping data untuk tabel `orang_tua`
--

INSERT INTO `orang_tua` (`id_orangtua`, `nama_ayah`, `tl_ayah`, `tglahir_ayah`, `peker_ayah`, `agama_ayah`, `tlp_ayah`, `nama_ibu`, `tl_ibu`, `tglahir_ibu`, `peker_ibu`, `agama_ibu`, `tlp_ibu`, `alamat_orngtua`) VALUES
(18, 'Ayahku', 'Lamongan', '2015-10-29', 'Manajer di PT. Sawah asri nan indah', 'Islam', '0987654334569', 'ibu', 'Lamongan', '2015-11-30', 'Petani', 'Islam', '098765432234567', 'Jl. Merdeka No. 19 RT. 03 / RW. 03 desa Solokuro, kec. Solokuro, kab. Lamongan'),
(19, 'Bapak', 'Bandung', '2011-11-29', 'Traktor driver', 'Islam', '09876544567890', 'Ibu', 'Malang', '2013-11-29', 'Ibu rumah tangga', 'Islam', '098765434567890', 'Jl. Merpati merah muda'),
(20, 'Bapak dul', 'Lamongan', '2008-11-30', 'Petani', 'Islam', '0987654', 'ibu lah', 'Lamongan', '2015-10-29', 'Ibu rumah tangga', 'Islam', '98765432', 'Jl. Buntu Mrican Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(12) NOT NULL,
  `nis_siswa` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `jkel_siswa` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis_siswa`, `nama_siswa`, `tmp_lahir`, `tgl_lahir`, `jkel_siswa`, `agama`, `alamat`, `kelas`, `jurusan`) VALUES
(18, '0005857509', 'Dzulfikri Safrilian', 'Lamongan', '2000-10-29', 'Laki - laki', 'Islam', 'Jl. Merdeka No. 19 RT. 03 RW. 03 desa Solokuro kec. Solokuro Kab. Lamongan, Jawa Timur', 'XI', 'Rekayasa Perangkat Lunak'),
(19, '09885789', 'Safrilian', 'Jakarta', '2009-11-29', 'Laki - laki', 'Islam', 'Jl. Merpati', 'X', 'Teknik Komputer Jaringan'),
(20, '00058575011', 'Fariz Al Faridli', 'Lamongan', '2016-12-30', 'Laki - laki', 'Islam', 'Jl. Buntu indah', 'XI', 'Mekatronika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`) VALUES
(18, 'BangDzul', 'c44a471bd78cc6c2fea32b9fe028d30a'),
(19, 'Dzul', '25d55ad283aa400af464c76d713c07ad'),
(20, 'Fariz', 'cc80cda7f695e48b53cb57dc384a2906');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id_orangtua`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id_orangtua` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `orang_tua_ibfk_1` FOREIGN KEY (`id_orangtua`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
