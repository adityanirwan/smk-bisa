-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 06:27 PM
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
('G001', 'U0002', 'guru', 'P', '085726556966'),
('G002', 'U0005', 'Nirwan', 'L', '0812'),
('G003', 'U0006', 'kuro', 'P', '1111'),
('G006', 'U0014', 'gurubaru1', 'P', '0812231');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` varchar(11) NOT NULL,
  `id_pertanyaan` varchar(11) DEFAULT NULL,
  `isi_jawaban` varchar(50) DEFAULT NULL,
  `benar` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id_jawaban`, `id_pertanyaan`, `isi_jawaban`, `benar`) VALUES
('11nhreqigax', '11lfabyy78f', 'as', '1'),
('11qzt7r19p1', '11lfabyy78f', 'asd', '0'),
('11u0m99m49v', '11lfabyy78f', 'wasd', '0'),
('11u25vqbhvi', '11s2ldlirty', 'bisa oop', '1'),
('11vmva5s1bu', '11s2ldlirty', 'ringkas', '0'),
('11wkoc2mvm8', '11lfabyy78f', 'zx', '0'),
('11x17ifrwpc', '11s2ldlirty', 'cepat', '0'),
('11yaieolema', '11s2ldlirty', 'lambat', '0'),
('2yzenncoot6', '1gdnktsfxs3', ' . 0', '1'),
('4zoar5vqatc', '4vzbr3ymsy5', 'aa', '1'),
('50oo6ux5vnf', '1gdnktsfxs3', ' . 1', '0'),
('52hpwwgaf38', '4vzbr3ymsy5', 'bb', '0'),
('56nt897vu1a', '4vzbr3ymsy5', 'cc', '0'),
('5a7zso5jnrm', '4vzbr3ymsy5', 'dd', '0'),
('815h5x8a4cx', '1gdnktsfxs3', ' . 2', '0'),
('abr4w2l6ff6', '1gdnktsfxs3', ' . 3', '0'),
('co7jknzhvlz', '9kym5xm8wtz', '0', '1'),
('hgpenne2vp1', '9kym5xm8wtz', '1', '0'),
('j9blp9ysmz4', '9kym5xm8wtz', '2', '0'),
('kbyp1zkofel', 'kacyxxkilcp', '11', '1'),
('kd9mwuf574z', 'kacyxxkilcp', '22', '0'),
('keefdw80gfc', 'kacyxxkilcp', '33', '0'),
('kg2bdeevy5i', 'kacyxxkilcp', '44', '0'),
('lwgxfpgi98n', '9kym5xm8wtz', '3', '0'),
('ntbdmg1wfk1', 'nret13cb32w', '0', '1'),
('nwz7gobwnhc', 'nret13cb32w', '1', '0'),
('o0nwgaa74vj', 'nret13cb32w', '2', '0'),
('o4o7qfalq09', 'nret13cb32w', '3', '0'),
('v7zc7ohh7xh', 'v5evo8efyvm', 'rdbms', '1'),
('vb9z0v84xfv', 'v5evo8efyvm', 'nosql', '0'),
('vfijc5x48l5', 'v5evo8efyvm', 'mysqli', '0'),
('vhvjrqg4kzl', 'v5evo8efyvm', 'odbc', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban_tersimpan`
--

CREATE TABLE `tb_jawaban_tersimpan` (
  `id_simpan` varchar(11) NOT NULL,
  `id_kuis` varchar(11) NOT NULL,
  `id_pertanyaan` varchar(11) NOT NULL,
  `id_jawaban` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jawaban_tersimpan`
--

INSERT INTO `tb_jawaban_tersimpan` (`id_simpan`, `id_kuis`, `id_pertanyaan`, `id_jawaban`, `id_user`, `dt`) VALUES
('7veiu777tru', 'c57fg072khk', 'kacyxxkilcp', 'kbyp1zkofel', 'U0004', '2023-02-16'),
('r8ulyj07aq6', 'c57fg072khk', '4vzbr3ymsy5', '4zoar5vqatc', 'U0003', '2023-02-17'),
('r9a6nd5c16k', 'c57fg072khk', 'kacyxxkilcp', 'kbyp1zkofel', 'U0003', '2023-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuis`
--

CREATE TABLE `tb_kuis` (
  `id_kuis` varchar(11) NOT NULL,
  `id_modul` varchar(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi_kuis` text DEFAULT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kuis`
--

INSERT INTO `tb_kuis` (`id_kuis`, `id_modul`, `judul`, `deskripsi_kuis`, `waktu`) VALUES
('c57fg072khk', '6jdg8tet03h', 'Kuis 1', '<ol><li>materi pertama</li><li>apa yang disampaikan di kelas</li></ol>', 3),
('m6hgoyuyal6', '2', 'Kuis JS', '<p>Semua yang sudah kita pelajari</p>', 0),
('o6z2ajmwd6q', 'l51ez7mnisd', 'test edit 1', '<p>test</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kuis_selesai`
--

CREATE TABLE `tb_kuis_selesai` (
  `id_kuis_selesai` varchar(11) NOT NULL,
  `id_siswa` varchar(11) DEFAULT NULL,
  `id_kuis` varchar(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kuis_selesai`
--

INSERT INTO `tb_kuis_selesai` (`id_kuis_selesai`, `id_siswa`, `id_kuis`, `nilai`, `dt`) VALUES
('84oe2mhsgvq', 'S002', 'c57fg072khk', 100, '2023-02-16'),
('npb90loqjij', 'S001', 'c57fg072khk', 100, '2023-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` varchar(11) NOT NULL,
  `id_pelajaran` varchar(11) NOT NULL,
  `id_modul` varchar(11) NOT NULL,
  `judul_materi` varchar(50) DEFAULT NULL,
  `isi_materi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `id_pelajaran`, `id_modul`, `judul_materi`, `isi_materi`) VALUES
('1', '1', '2', 'Mari Menulis Hello World edit', '<p>A <b>\"Hello, World!\" program</b> is generally a <a href=\"https://en.wikipedia.org/wiki/Computer_program\" title=\"Computer program\">computer program</a> that ignores any input and outputs or displays a message similar to \"Hello, World!\". A small piece of code in most <a href=\"https://en.wikipedia.org/wiki/General-purpose_programming_language\" title=\"General-purpose programming language\">general-purpose programming languages</a>, this program is used to illustrate a language&apos;s basic <a href=\"https://en.wikipedia.org/wiki/Syntax_(programming_languages)\" title=\"Syntax (programming languages)\">syntax</a>. \"Hello, World!\" programs are often the first a student learns to write in a given language,<sup id=\"cite_ref-1\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/%22Hello,_World!%22_program#cite_note-1\">[1]</a></sup> and they can also be used as a <a href=\"https://en.wikipedia.org/wiki/Sanity_check\" title=\"Sanity check\">sanity check</a> to ensure computer software intended to compile or run <a href=\"https://en.wikipedia.org/wiki/Source_code\" title=\"Source code\">source code</a> is correctly installed, and that its operator understands how to use it.\r\n</p><p><b>History</b><br></p><p>While small test programs have existed since the development of programmable <a href=\"https://en.wikipedia.org/wiki/Computer\" title=\"Computer\">computers</a>, the tradition of using the phrase \"Hello, World!\" as a test message was influenced by an example program in the 1978 book <i><a href=\"https://en.wikipedia.org/wiki/The_C_Programming_Language_(book)\" class=\"mw-redirect\" title=\"The C Programming Language (book)\">The C Programming Language</a></i>,<sup id=\"cite_ref-2\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/%22Hello,_World!%22_program#cite_note-2\">[2]</a></sup>\r\n but there is no evidence that it originated there, and it is very \r\nlikely it was used in BCPL beforehand (as below). The example program in\r\n that book prints \"<samp style=\"padding-left:0.4em; padding-right:0.4em; color:#666666;\">hello, world</samp>\", and was inherited from a 1974 <a href=\"https://en.wikipedia.org/wiki/Bell_Labs\" title=\"Bell Labs\">Bell Laboratories</a> internal memorandum by <a href=\"https://en.wikipedia.org/wiki/Brian_Kernighan\" title=\"Brian Kernighan\">Brian Kernighan</a>, <i>Programming in C: A Tutorial</i>:<sup id=\"cite_ref-ctut_3-0\" class=\"reference\"><a href=\"https://en.wikipedia.org/wiki/%22Hello,_World!%22_program#cite_note-ctut-3\">[3]</a>&nbsp;</sup></p><p><sup id=\"cite_ref-ctut_3-0\" class=\"reference\">abcdefg</sup></p>'),
('2', '1', '2', 'Penjelasan Materi Hello World', '<p>hello world adalah bla bla <br></p>'),
('4e857smw0b4', 'gx7xbak7soc', '6jdg8tet03h', 'Relasional Database (2)', '<p>Test</p>'),
('hw6iedskkxo', '3', 'l51ez7mnisd', 'Syntax Dasar', ''),
('oyldg6txe86', 'somwrk7z6um', 'ie2vtz60rgw', 'materi test', '<p>12345</p>'),
('rspleq6hc83', 'gx7xbak7soc', '6jdg8tet03h', 'Database Relasional Adalah', '<p>Jika</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi_selesai`
--

CREATE TABLE `tb_materi_selesai` (
  `id_materi_selesai` varchar(11) NOT NULL,
  `id_siswa` varchar(11) DEFAULT NULL,
  `id_modul` varchar(11) DEFAULT NULL,
  `id_materi` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id_modul` varchar(11) NOT NULL,
  `id_pelajaran` varchar(11) NOT NULL,
  `nama_modul` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_modul`
--

INSERT INTO `tb_modul` (`id_modul`, `id_pelajaran`, `nama_modul`) VALUES
('2', '1', 'Mari Ucapkan Hello World'),
('4', '1', 'Perintah Dasar Dalam Javascript'),
('6', '1', 'test'),
('6jdg8tet03h', 'gx7xbak7soc', 'Apa itu Database Relasioal (1)'),
('ie2vtz60rgw', 'somwrk7z6um', 'modul test'),
('l51ez7mnisd', '3', 'Pengenalan C++');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelajaran`
--

CREATE TABLE `tb_pelajaran` (
  `id_pelajaran` varchar(11) NOT NULL,
  `judul_pelajaran` varchar(50) DEFAULT NULL,
  `desc_pelajaran` text NOT NULL,
  `created_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelajaran`
--

INSERT INTO `tb_pelajaran` (`id_pelajaran`, `judul_pelajaran`, `desc_pelajaran`, `created_by`) VALUES
('1', 'Javascript Dasar', 'jkhkhklhlk', 'Admin'),
('3', 'Dasar Pemrograman Dengan C++', 'C++ (dibaca: C plus-plus) adalah bahasa pemrograman komputer yang dibuat oleh Bjarne Stroustrup, yang merupakan perkembangan dari bahasa C dikembangkan di Bell Labs (Dennis Ritchie). Pada awal tahun 1970-an, bahasa itu merupakan peningkatan dari bahasa sebelumnya, yaitu B. ', NULL),
('4', 'Mysql', 'Mysql adalah bahasa yang digunakan untuk berinteraksi dengan database', NULL),
('gx7xbak7soc', 'Mengenal Mysql', 'Pengenalan tentang mysql dasar', 'U0002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` varchar(11) NOT NULL,
  `id_kuis` varchar(11) NOT NULL,
  `isi_pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `id_kuis`, `isi_pertanyaan`) VALUES
('11lfabyy78f', 'o6z2ajmwd6q', 'test halo4'),
('11s2ldlirty', 'o6z2ajmwd6q', 'kelebihan c++'),
('4vzbr3ymsy5', 'c57fg072khk', 'pertanyaan2'),
('5ow0qq2ihrk', '10fwp8iz33l', 'relasional artinya'),
('kacyxxkilcp', 'c57fg072khk', 'pertanyaan'),
('v5evo8efyvm', '10fwp8iz33l', 'Relasional Database adalah');

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
('S001', 'U0003', 'siswa default', 'X', 'L', '0855'),
('S002', 'U0004', 'adit', 'XI', 'P', '222222'),
('S004', 'U0009', 'kurniawan', 'XI', 'L', '08122331'),
('S005', 'U0011', 'test3', 'XI', 'P', '12345'),
('S007', 'U0013', 'Aditya Nirwan', 'XI', 'L', '0855123');

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
('U0003', 'siswa', 'siswa@gmail.com', 'siswa1', 'siswa'),
('U0004', 'adit', 'adit@gmail.com', 'adit', 'siswa'),
('U0005', 'nirwan', 'nirwan@gmail.com', 'nirwan', 'guru'),
('U0006', 'kuro', 'kuro@gmail.com', 'kuro', 'guru'),
('U0009', 'adit', 'kurniawan@email.com', '123412345', 'siswa'),
('U0011', 'test3', 'test3@email.com', 'test3', 'siswa'),
('U0013', 'nirwanprayogos', 'nirwanprayogos@gmail.com', 'testbaru', 'siswa'),
('U0014', 'gurubaru1', 'gurubaru1@email.com', 'gurubaru1', 'guru');

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
-- Indexes for table `tb_jawaban_tersimpan`
--
ALTER TABLE `tb_jawaban_tersimpan`
  ADD PRIMARY KEY (`id_simpan`);

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
-- Indexes for table `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

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
