-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 07:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smkbisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` varchar(4) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `gender` enum('L','P','','') DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `id_user`, `nama_guru`, `gender`, `no_hp`) VALUES
('G001', 'U0002', 'guru', 'L', '085726556966'),
('G002', 'U0005', 'Nirwan', 'L', '0812'),
('G003', 'U0006', 'kuro', 'P', '1111'),
('G004', 'U0007', 'EririEli', 'P', '08557755'),
('G005', 'U0010', 'test2', 'L', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_kuis` int(11) DEFAULT NULL,
  `jawaban_benar` varchar(50) DEFAULT NULL,
  `jawaban2` varchar(50) DEFAULT NULL,
  `jawaban3` varchar(50) DEFAULT NULL,
  `jawaban4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuis`
--

CREATE TABLE `tb_kuis` (
  `id_kuis` int(11) NOT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `nomor` int(11) DEFAULT NULL,
  `isi_soal` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuis_selesai`
--

CREATE TABLE `tb_kuis_selesai` (
  `id_kuis_selesai` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_kuis` int(11) DEFAULT NULL,
  `jawaban` varchar(50) DEFAULT NULL,
  `hasil` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` varchar(50) NOT NULL,
  `nama_mapel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `judul_materi` varchar(50) DEFAULT NULL,
  `isi_materi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi_selesai`
--

CREATE TABLE `tb_materi_selesai` (
  `id_materi_selesai` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `id_materi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id_modul` int(11) NOT NULL,
  `id_mapel` varchar(50) NOT NULL,
  `judul_modul` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` varchar(5) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL,
  `gender` enum('L','P','','') DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `nama_siswa`, `kelas`, `gender`, `no_hp`) VALUES
('S001', 'U0003', 'siswa', 'X', 'L', '123123'),
('S002', 'U0004', 'adit', 'XI', 'P', '222222'),
('S004', 'U0009', 'kurniawan', 'XI', 'L', '08122331'),
('S005', 'U0011', 'test3', 'XI', 'P', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(5) NOT NULL,
  `nama` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `password`, `level`) VALUES
('U0001', 'admin', 'admin@gmail.com', 'admin', 'admin'),
('U0002', 'guru', 'guru@gmail.com', 'guru', 'guru'),
('U0003', 'siswa', 'siswa@gmail.com', 'siswa', 'siswa'),
('U0004', 'adit', 'adit@gmail.com', 'adit', 'siswa'),
('U0005', 'nirwan', 'nirwan@gmail.com', 'nirwan', 'guru'),
('U0006', 'kuro', 'kuro@gmail.com', 'kuro', 'guru'),
('U0007', 'eririERI', 'eriri1@gmail.com', 'eririeli', 'guru'),
('U0009', 'adit', 'kurniawan@email.com', '123412345', 'siswa'),
('U0010', 'test2', 'test2@testing.com', 'test2', 'guru'),
('U0011', 'test3', 'test3@email.com', 'test3', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `tb_kuis`
--
ALTER TABLE `tb_kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `tb_kuis_selesai`
--
ALTER TABLE `tb_kuis_selesai`
  ADD PRIMARY KEY (`id_kuis_selesai`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tb_materi_selesai`
--
ALTER TABLE `tb_materi_selesai`
  ADD PRIMARY KEY (`id_materi_selesai`);

--
-- Indexes for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
