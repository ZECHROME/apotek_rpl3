-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2023 at 01:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(4) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `id_obat` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga_satuan` double NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_obat`, `jumlah`, `harga_satuan`, `total_harga`) VALUES
(1, 2, 1, 5, 10000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(4) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `telp`) VALUES
(1, 'Andreas Batak', 'Jl. Batak Karo', '09172648129'),
(2, 'Sutama Pintar', 'Jl. Terbatak Batak', '0928317238419'),
(3, 'Zaenal Anjay', 'Jl. Zhu Bajie', '09823718293'),
(4, 'Yoga Bibidong', 'Jl. Cina Tercinacina', '0891627391');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `level_user` varchar(50) NOT NULL,
  `id_karyawan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `level_user`, `id_karyawan`) VALUES
('Andreas Batak', 'Chris', 'karyawan', 1),
('Andreas Batak', 'Chris', 'karyawan', 1),
('Zaenal Anjay', 'admin', 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(4) NOT NULL,
  `id_supplier` int(4) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `kategori_obat` varchar(50) NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `id_supplier`, `nama_obat`, `kategori_obat`, `harga_jual`, `harga_beli`, `stok_obat`, `keterangan`) VALUES
(1, 1, 'Paracetamol', 'Penyakit Panas', 100000, 40000, 30, '3x Sehari'),
(2, 1, 'Suyasa', 'Penyakit Kupang', 10000, 20000, 15, '5x sehari'),
(5, 3, 'Obat Mujair', 'Penyakit Lombok', 35000, 5000, 60, '9x sehari, minum selama sebulan\r\n'),
(7, 2, 'Strawberry', 'Penyakit Wibu', 1000, 0, 999, 'sebelum nafas, minum obat ini dulu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(4) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `usia` int(3) NOT NULL,
  `bukti_foto_resep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_lengkap`, `alamat`, `telp`, `usia`, `bukti_foto_resep`) VALUES
(1, 'Melkianus Pirlo', 'Jl. Gatsu Barat', 819453627, 22, 'IMG_3367.jpeg'),
(2, 'Khardika Anjay', 'Jl. Sesetan', 981673281, 56, 'khardika.png'),
(3, 'Yudho Siswanto', 'Jl. Ketumbar Jawa', 816272831, 34, 'bear.jpg'),
(4, 'Kenneth Gerald', 'Jl. Suyasa Merdeka', 819781655, 45, 'lampung.jpeg'),
(5, 'Zaenal Arifin', 'Jl. Kupang Merdeka', 897162838, 27, 'IMG_2718.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(4) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `perusahaan`, `telp`, `alamat`, `keterangan`) VALUES
(1, 'PT. Suarsana Maju', '08123456789', 'Jln. Menuju Kemerdekaan', 'Supplier 1'),
(2, 'PT. Berry Sejahtera', '089665319782', 'Jln. Sesat', 'Supplier 2'),
(3, 'PT. Mulyana', '087658493231', 'Jln. Mulia Sekali', 'Supplier 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `id_karyawan` int(4) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kategori_pelanggan` varchar(20) NOT NULL,
  `total_bayar` double NOT NULL,
  `bayar` double NOT NULL,
  `kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_pelanggan`, `id_karyawan`, `tgl_transaksi`, `kategori_pelanggan`, `total_bayar`, `bayar`, `kembali`) VALUES
(1, 2, 1, '2023-09-14', 'Pelanggan Olog', 20000, 20000, 0),
(2, 1, 3, '2023-09-20', 'Pelanggan Baik Hati', 50000, 100000, 50000),
(3, 2, 3, '2023-09-30', 'Pelanggan Olog 2', 10000, 20000, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`);

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `tb_obat_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
