-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 11:01 AM
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
-- Database: `db_simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `role_id`, `nama_lengkap`, `username`, `password`, `img_dir`) VALUES
(1, 1, 'Audy Ruslan', 'admin', '$2y$10$zC6oKkLPOXi1gAqZo8jY..Mc9jyVhCYWJIme1NIvNcuWdHkjA0FwS', '1722903035.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `berkas_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `nama_berkas` varchar(50) NOT NULL,
  `jenis_berkas` varchar(50) NOT NULL,
  `tgl_berkas` date NOT NULL,
  `uraian_berkas` text NOT NULL,
  `berkas_dir` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berkas`
--

INSERT INTO `tb_berkas` (`berkas_id`, `pegawai_id`, `nama_berkas`, `jenis_berkas`, `tgl_berkas`, `uraian_berkas`, `berkas_dir`) VALUES
(4, 1, 'Transkip', 'Dokumen', '2024-08-07', '', 'Transkip_Dokumen.pdf'),
(5, 1, 'KHS', 'Dokumen', '2024-08-07', '', 'KHS_Dokumen.pdf'),
(6, 2, 'Transkip Fikran', 'Dokumen', '2024-08-08', '', 'Transkip Fikran_Dokumen.pdf');

--
-- Triggers `tb_berkas`
--
DELIMITER $$
CREATE TRIGGER `after_insert_tb_berkas` AFTER INSERT ON `tb_berkas` FOR EACH ROW BEGIN
    INSERT INTO tb_validasi_berkas (berkas_id, admin_id, pegawai_id, status)
    VALUES (NEW.berkas_id, 0, NEW.pegawai_id, 0);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`jabatan_id`, `nama_jabatan`) VALUES
(1, 'Kepala Dinas'),
(2, 'Sekretaris'),
(3, 'Kepala Bidang'),
(4, 'Kepala Seksi'),
(5, 'Pegawai Tata Usaha'),
(6, 'ASN/PNS'),
(7, 'Penyuluh'),
(8, 'Staf'),
(9, 'Petugas'),
(10, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `nip_pegawai` varchar(50) NOT NULL,
  `password_pegawai` varchar(255) NOT NULL,
  `tmp_lahir_pegawai` varchar(50) NOT NULL,
  `tgl_lahir_pegawai` date NOT NULL,
  `agama_pegawai` varchar(50) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `no_hp_pegawai` varchar(50) NOT NULL,
  `pangkat_pegawai` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(50) NOT NULL,
  `npwp_pegawai` varchar(50) NOT NULL,
  `ktp_pegawai` varchar(50) NOT NULL,
  `kapreg_pegawai` varchar(50) NOT NULL,
  `email_pegawai` varchar(50) NOT NULL,
  `unit_organisasi` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `nama_suami_istri` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nip_suami_istri` varchar(50) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `img_dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`pegawai_id`, `role_id`, `jabatan_id`, `nama_lengkap`, `bidang`, `nip_pegawai`, `password_pegawai`, `tmp_lahir_pegawai`, `tgl_lahir_pegawai`, `agama_pegawai`, `status_perkawinan`, `no_hp_pegawai`, `pangkat_pegawai`, `pendidikan_terakhir`, `npwp_pegawai`, `ktp_pegawai`, `kapreg_pegawai`, `email_pegawai`, `unit_organisasi`, `unit_kerja`, `nama_suami_istri`, `pekerjaan`, `nip_suami_istri`, `alamat_pegawai`, `img_dir`) VALUES
(1, 3, 3, 'Audy Ruslan', '', '198407132005012007', '$2y$10$fh42h.c2Yf3aKPZ5M8oO7uvSdvEoBdfdyWXH.aInOWo1hS.gnszEm', 'Kota Palu', '1999-01-07', 'Islam', 'Belum Menikah', '082259708665', '', '', '', '', '', '4udyruslan@gmail.com', '', '', '', '', '', 'BTN TAMAN RIA ESTATE', '1722746921.png'),
(2, 2, 6, 'Fikran', 'Bidang Sekretariat', '198106022015022001', '$2y$10$u79gDNOjJNaQQrXSuuk5Ou2lj8Hiv/KV60mH18EW4emS5wXGcBClq', '', '0000-00-00', '', '', '', '', '', '', '', '', 'fikran@gmail.com', '', '', '', '', '', '', '1722754362.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role`) VALUES
(1, 'Admin Kepegawaian'),
(2, 'Admin Sub Bagian'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `surat_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tahun_surat` int(11) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `perihal_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_surat_masuk` date NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `uraian_surat` text NOT NULL,
  `surat_dir` varchar(255) NOT NULL,
  `tipe_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`surat_id`, `pegawai_id`, `tahun_surat`, `bidang`, `perihal_surat`, `tgl_surat`, `tgl_surat_masuk`, `no_surat`, `uraian_surat`, `surat_dir`, `tipe_surat`) VALUES
(1, 2, 2020, 'Bidang Sekretariat', 'Persetujuan', '2024-08-04', '2024-08-06', '4324', '', 'Persetujuan_Bidang Sekretariat.pdf', 'Surat Masuk'),
(2, 2, 2021, 'Bidang Sekretariat', 'Pengesahan', '2024-09-04', '2024-09-06', '1234', 'asd', 'Pengesahan_Bidang Sekretariat.pdf', 'Surat Masuk'),
(3, 2, 2024, 'Bidang Sekretariat', 'KHS', '2024-08-01', '2024-08-05', '1234', 'asd', 'KHS_Bidang Sekretariat.pdf', 'Surat Masuk'),
(4, 2, 2024, 'Bidang Sekretariat', 'Daftar Prestasi', '2024-08-10', '0000-00-00', '1234', '', 'Daftar Prestasi_Bidang Sekretariat.pdf', 'Surat Keluar'),
(5, 2, 2024, 'Bidang PSP', 'Persetujuan', '2024-09-20', '0000-00-00', '1234', '', 'Persetujuan_Bidang PSP.pdf', 'Surat Keluar'),
(6, 2, 2024, 'Bidang Sekretariat', 'Transkip Nilai', '2024-08-13', '0000-00-00', '1234', '', 'Transkip Nilai_Bidang Sekretariat.pdf', 'Surat Keputusan'),
(7, 2, 2024, 'Bidang PSP', 'KHS', '2024-09-18', '0000-00-00', '1234', '', 'KHS_Bidang PSP.pdf', 'Surat Keputusan'),
(8, 2, 2024, 'Bidang Sekretariat', 'Transkip Nilai', '2024-08-18', '0000-00-00', '1234', '', 'Transkip Nilai_Bidang Sekretariat.pdf', 'Surat Tugas'),
(9, 2, 2024, 'Bidang PSP', 'KHS', '2024-09-22', '0000-00-00', '1234', '', 'KHS_Bidang PSP.pdf', 'Surat Tugas'),
(10, 2, 2024, 'Bidang Sekretariat', 'KHS', '2024-08-25', '0000-00-00', '1234', '', 'KHS_Bidang Sekretariat.pdf', 'Surat Lainnya'),
(11, 2, 2024, 'Bidang PSP', 'Pengesahan', '2024-09-28', '0000-00-00', '12345', '', 'Pengesahan_Bidang PSP.pdf', 'Surat Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_validasi_berkas`
--

CREATE TABLE `tb_validasi_berkas` (
  `validasi_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `berkas_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_validasi_berkas`
--

INSERT INTO `tb_validasi_berkas` (`validasi_id`, `admin_id`, `pegawai_id`, `berkas_id`, `status`) VALUES
(1, 1, 1, 4, 1),
(2, 0, 1, 5, 0),
(3, 0, 2, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`berkas_id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`pegawai_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`surat_id`);

--
-- Indexes for table `tb_validasi_berkas`
--
ALTER TABLE `tb_validasi_berkas`
  ADD PRIMARY KEY (`validasi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `berkas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `surat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_validasi_berkas`
--
ALTER TABLE `tb_validasi_berkas`
  MODIFY `validasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
