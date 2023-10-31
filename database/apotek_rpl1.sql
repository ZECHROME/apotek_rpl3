-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2023 at 03:57 PM
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
-- Database: `apotek_rpl1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `iddetailtransaksi` int(4) NOT NULL,
  `idtransaksi` int(3) NOT NULL,
  `idobat` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `hargasatuan` double NOT NULL,
  `totalharga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`iddetailtransaksi`, `idtransaksi`, `idobat`, `jumlah`, `hargasatuan`, `totalharga`) VALUES
(2, 2, 18, 12, 3, 20000),
(3, 2, 21, 22, 3, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `idkaryawan` int(4) NOT NULL,
  `namakaryawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`idkaryawan`, `namakaryawan`, `alamat`, `telp`) VALUES
(1, 'giyanendra', 'jalan', '0128831293'),
(2, 'Kadek Nanda Sismawan', 'jalan jalan', '0928093812'),
(3, 'Rafly alam', 'jalan sekali', '082345334321');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `leveluser` varchar(50) NOT NULL,
  `idkaryawan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `leveluser`, `idkaryawan`) VALUES
('Giya', 'giya', 'admin', 1),
('Rafly', '$2y$10$RsWfo20j3yCKWXjD.NE.BudZfV7Pby5yTHhJjhyKt9nPXUHsD5HkS', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(4) NOT NULL,
  `id_supplier` int(4) NOT NULL,
  `namaobat` varchar(100) NOT NULL,
  `kategoriobat` varchar(50) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `id_supplier`, `namaobat`, `kategoriobat`, `hargajual`, `hargabeli`, `stok_obat`, `keterangan`) VALUES
(18, 1, 'Obat', 'Panas Juga', 30000, 15000, 400, '3x sehari'),
(21, 3, 'Stopcool', 'demam', 3500, 2000, 1002, 'menghilangkan panas demam'),
(24, 3, 'Obat ini itu', 'Obat Kuat', 500000, 100000, 2344, 'keterangan'),
(25, 4, 'paracetamol', 'obat panas', 30000, 15000, 56, '3x sehari'),
(26, 4, 'paracetamol ubah', 'obat panas', 300001, 150001, 51, '3x sehari'),
(31, 3, 'paracetamol', 'obat panas', 30000, 15000, 200, '3x sehari');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(4) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `usia` int(3) NOT NULL,
  `buktifotoresep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namalengkap`, `alamat`, `telp`, `usia`, `buktifotoresep`) VALUES
(1, 'Kadek Arie Wira Kusuma', 'Jalan Pulau Bungin Gg.Keker No 10 Pedungan, Banjar Pitik', 829293847, 22, 'c0056e98-ec1c-44d6-9d2e-9c20c33616a1.png');

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
(1, 'PT.Sejahtera Sentosa', '0928093812', 'Jalan Selamat No 44 Gang Kusuma', 'Persahaan menjual oba Peniscilin'),
(3, 'PT. Salam Sahaja', '0982324213', 'Jlaan Kecambah No 4', 'perusahaan menjual obat panas'),
(4, 'PT. INDOBAT', '0928093812', 'jalan Sengaja no 55', 'keterangan'),
(5, 'SUdi raharja', '0928093812', 'alamat', 'keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `idtransaksi` int(5) NOT NULL,
  `idpelanggan` int(4) NOT NULL,
  `idkaryawan` int(4) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kategoripelanggan` varchar(20) NOT NULL,
  `totalbayar` double NOT NULL,
  `bayar` double NOT NULL,
  `kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`idtransaksi`, `idpelanggan`, `idkaryawan`, `tgltransaksi`, `kategoripelanggan`, `totalbayar`, `bayar`, `kembali`) VALUES
(2, 1, 1, '2023-08-31', 'Umum', 200000, 300000, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`),
  ADD KEY `fk_obat` (`idobat`),
  ADD KEY `fk_transaksi` (`idtransaksi`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_karyawan` (`idkaryawan`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `fk_supplier` (`id_supplier`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `fk_pelanggan` (`idpelanggan`),
  ADD KEY `fk_transaksi_karyawan` (`idkaryawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `iddetailtransaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `idkaryawan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `idpelanggan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `idtransaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `fk_obat` FOREIGN KEY (`idobat`) REFERENCES `tb_obat` (`id_obat`),
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`idtransaksi`) REFERENCES `tb_transaksi` (`idtransaksi`);

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `fk_karyawan` FOREIGN KEY (`idkaryawan`) REFERENCES `tb_karyawan` (`idkaryawan`);

--
-- Constraints for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD CONSTRAINT `fk_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`idpelanggan`) REFERENCES `tb_pelanggan` (`idpelanggan`),
  ADD CONSTRAINT `fk_transaksi_karyawan` FOREIGN KEY (`idkaryawan`) REFERENCES `tb_karyawan` (`idkaryawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
