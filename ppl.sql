-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 11:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `kode_wali` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip_dosen`, `nama_dosen`, `kode_wali`) VALUES
('196511071992031003', 'Drs. Eko Adi Sarwoko, M.Kom.', 'A1'),
('197007051997021001', 'Priyo Sidik Sasongko, S.Si., M.Kom.', 'A2'),
('197108111997021004', 'Dr. Aris Sugiharto, S.Si., M.Kom.', 'A3'),
('197308291998022001', 'Beta Noranita, S.Si, M.Kom.', 'A4'),
('197404011999031002', 'Dr. Aris Puji Widodo, S.Si, M.T.', 'A5'),
('197601102009122002', 'Dinar Mutiara K N, S.T., M.InfoTech.(Comp)., Ph.D', 'A6'),
('197805022005012002', 'Sukmawati Nur Endah, S.Si, M.Kom.', 'A7'),
('197805162003121001', 'Helmie Arif Wibawa, S.Si, M.Cs', 'A8'),
('197902122008121002', 'Indra Waspada, ST, M.T.I', 'A9'),
('197905242009121003', 'Sutikno, ST, M.Cs', 'A10');

-- --------------------------------------------------------

--
-- Table structure for table `irs`
--

CREATE TABLE `irs` (
  `semester_mhs` int(2) NOT NULL,
  `sks` int(2) NOT NULL,
  `status_irs` varchar(20) NOT NULL,
  `berkas_irs` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irs`
--

INSERT INTO `irs` (`semester_mhs`, `sks`, `status_irs`, `berkas_irs`) VALUES
(5, 100, 'Aktif', 0x66696c6531),
(7, 105, 'Aktif', 0x66696c6532),
(9, 113, 'Aktif', 0x66696c6533),
(7, 121, 'Aktif', 0x66696c6534),
(11, 117, 'Aktif', 0x66696c6535),
(5, 115, 'Aktif', 0x66696c6536),
(9, 119, 'Aktif', 0x66696c6537),
(9, 121, 'Aktif', 0x66696c6538),
(7, 115, 'Aktif', 0x66696c6539),
(9, 111, 'Aktif', 0x66696c653130);

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `kode_kabkota` varchar(5) NOT NULL,
  `nama_kabkota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`kode_kabkota`, `nama_kabkota`) VALUES
('1101', 'Aceh Selatan'),
('1102', 'Aceh Tenggara'),
('1201', 'Tapanuli Tengah'),
('1202', 'Tapanuli Utara'),
('1301', 'Pesisir Selatan'),
('1401', 'Kampar'),
('1402', 'Indragiri Hulu'),
('1501', 'Kerinci'),
('1701', 'Bengkulu Selatan'),
('1702', 'Rejang Lebong');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `nim_mhs` varchar(20) NOT NULL,
  `semester_mhs` int(11) NOT NULL,
  `sks_semester` int(11) NOT NULL,
  `ip_semester` float NOT NULL,
  `ip_kumulatif` float NOT NULL,
  `berkas_khs` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`nim_mhs`, `semester_mhs`, `sks_semester`, `ip_semester`, `ip_kumulatif`, `berkas_khs`) VALUES
('24060120000001', 100, 20, 3.56, 3.53, 0x66696c6531),
('24060120000002', 105, 18, 3.51, 3.57, 0x66696c6532),
('24060120000003', 113, 21, 3.75, 3.65, 0x66696c6533),
('24060120000004', 121, 18, 3.79, 3.85, 0x66696c6534),
('24060120000005', 117, 19, 3.83, 3.63, 0x66696c6535),
('24060120000006', 115, 20, 3.55, 3.55, 0x66696c6536),
('24060120000007', 119, 21, 3.59, 3.13, 0x66696c6537),
('24060120000008', 121, 24, 3.01, 2.93, 0x66696c6538),
('24060120000009', 115, 22, 2.55, 2.37, 0x66696c6539),
('24060120000010', 111, 23, 4, 4, 0x66696c653130);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` varchar(15) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `no_hp_mhs` varchar(15) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `jalur_masuk` varchar(10) NOT NULL,
  `email_mhs` varchar(50) NOT NULL,
  `alamat_mhs` varchar(100) NOT NULL,
  `status_mhs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `nama_mhs`, `no_hp_mhs`, `angkatan`, `jalur_masuk`, `email_mhs`, `alamat_mhs`, `status_mhs`) VALUES
('24060120000001', 'Muhammad Kurnia Fathurahman', '08000000001', '20', 'Mandiri', 'fathur@gmail.com', 'Jl. A', 'Aktif'),
('24060120000002', 'Rake Kelana Wangsa', '08000000002', '19', 'Mandiri', 'rake@gmail.com', 'Jl. B', 'Aktif'),
('24060120000003', 'Hanan Zain', '08000000003', '18', 'SNMPTN', 'hanan@gmail.com', 'Jl. C', 'Aktif'),
('24060120000004', 'Satira Reza Ramadhan', '08000000004', '19', 'SBMPTN', 'satria@gmail.com', 'Jl. D', 'Aktif'),
('24060120000005', 'Auliya Kafita Putri', '08000000005', '17', 'SBMPTN', 'auliya@gmail.com', 'Jl. E', 'Aktif'),
('24060120000006', 'Andira Faqih Muhammad', '08000000006', '20', 'Mandiri', 'andira@gmail.com', 'Jl. F', 'Aktif'),
('24060120000007', 'Fikri Afrizal', '08000000007', '18', 'Mandiri', 'fikri@gmail.com', 'Jl. G', 'Aktif'),
('24060120000008', 'Ryan Armando Sidabutar', '08000000008', '18', 'SNMPTN', 'ryan@gmail.com', 'Jl. H', 'Aktif'),
('24060120000009', 'Benhard Simanulang', '08000000009', '19', 'SBMPTN', 'benhard@gmail.com', 'Jl. I', 'Aktif'),
('24060120000010', 'Charisto Marc Gybran', '08000000010', '18', 'Mandiri', 'charisto@gmail.com', 'Jl. J', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE `pkl` (
  `nim_mhs` varchar(20) NOT NULL,
  `status_pkl` varchar(20) NOT NULL,
  `nilai_pkl` char(1) NOT NULL,
  `ba_pkl` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`nim_mhs`, `status_pkl`, `nilai_pkl`, `ba_pkl`) VALUES
('24060120000001', 'Sudah', 'A', 0x66696c6531),
('24060120000002', 'Sudah', 'A', 0x66696c6532),
('24060120000003', 'Sudah', 'B', 0x66696c6533),
('24060120000004', 'Belum', '-', ''),
('24060120000005', 'Sudah', 'C', 0x66696c6534),
('24060120000006', 'Sudah', 'B', 0x66696c6535),
('24060120000007', 'Belum', '-', ''),
('24060120000008', 'Sudah', 'A', 0x66696c6536),
('24060120000009', 'Sudah', 'B', 0x66696c6537),
('24060120000010', 'Belum', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `kode_prov` varchar(5) NOT NULL,
  `nama_prov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`kode_prov`, `nama_prov`) VALUES
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('13', 'Sumatera Barat'),
('14', 'Riau'),
('15', 'Jambi'),
('17', 'Bengkulu'),
('11', 'Aceh'),
('12', 'Sumatera Utara'),
('17', 'Bengkulu'),
('14', 'Riau');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `status_skripsi` varchar(20) NOT NULL,
  `nilai_skripsi` char(1) NOT NULL,
  `lama_belajar` int(11) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `ba_skripsi` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`status_skripsi`, `nilai_skripsi`, `lama_belajar`, `tanggal_sidang`, `ba_skripsi`) VALUES
('Sudah', 'A', 100, '2022-05-10', 0x66696c6531),
('Sudah', 'B', 105, '2022-05-09', 0x66696c6532),
('Sudah', 'B', 113, '2022-05-09', 0x66696c6533),
('Sudah', 'A', 121, '2022-05-10', 0x66696c6534),
('Sudah', 'B', 117, '2022-05-08', 0x66696c6535),
('Sudah', 'C', 115, '2022-05-07', 0x66696c6536),
('Sudah', 'A', 119, '2022-05-15', 0x66696c6538),
('Sudah', 'B', 121, '2022-05-17', 0x66696c6539),
('Sudah', 'A', 115, '2022-05-19', 0x66696c653130),
('Sudah', 'C', 111, '2022-05-15', 0x66696c653131);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip_dosen`);

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`kode_kabkota`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`nim_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
