-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 02:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_kantor`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cari_detail_peminjaman` (`id_peminjaman_param` INT) RETURNS VARCHAR(1000) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE hasil VARCHAR(1000);

    SELECT CONCAT(
        'Nama Petugas: ', pt.nama_petugas, 
        ', Nama Karyawan: ', k.nama_karyawan, 
        ', Nama Barang: ', GROUP_CONCAT(b.nama_barang SEPARATOR ', ')
    ) 
    INTO hasil
    FROM peminjaman p
    JOIN petugas pt ON p.id_petugas = pt.id_petugas
    JOIN karyawan k ON p.id_karyawan = k.id_karyawan
    JOIN detail_peminjaman dp ON p.id_peminjaman = dp.id_peminjaman
    JOIN barang b ON dp.id_barang = b.id_barang
    WHERE p.id_peminjaman = id_peminjaman_param
    GROUP BY p.id_peminjaman;

    RETURN IFNULL(hasil, 'Data tidak ditemukan');
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cari_petugas_peminjaman` (`id_peminjaman_param` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE nama_petugas VARCHAR(255);

    SELECT pt.nama_petugas
    INTO nama_petugas
    FROM peminjaman p
    JOIN petugas pt ON p.id_petugas = pt.id_petugas
    WHERE p.id_peminjaman = id_peminjaman_param;

    RETURN IFNULL(nama_petugas, 'Petugas tidak ditemukan');
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `hitung_total_barang` (`id_peminjaman` INT) RETURNS INT(11)  BEGIN
    DECLARE total_barang INT;

    SELECT SUM(jumlah_barang)
    INTO total_barang
    FROM detail_peminjaman
    WHERE detail_peminjaman.id_peminjaman = id_peminjaman;

    RETURN IFNULL(total_barang, 0); 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_lokasi`, `stok_barang`) VALUES
(1, 'Laptop Dell', 1, 1, 10),
(2, 'Meja Kantor', 2, 2, 15),
(3, 'Pulpen', 3, 3, 140),
(4, 'Sapu Lantai', 4, 4, 50),
(5, 'Kompor Gas', 5, 5, 3),
(6, 'MEJA', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `id_barang`, `jumlah_barang`) VALUES
(1, 2, 2, 2),
(2, 2, 2, 1),
(4, 4, 4, 5),
(5, 5, 5, 1);

--
-- Triggers `detail_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `after_delete_detail_peminjaman` AFTER DELETE ON `detail_peminjaman` FOR EACH ROW BEGIN

    

    UPDATE barang

    SET stok_barang = stok_barang + OLD.jumlah_barang

    WHERE id_barang = OLD.id_barang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_peminjaman_insert` AFTER INSERT ON `detail_peminjaman` FOR EACH ROW BEGIN
  
  IF (SELECT stok_barang FROM barang WHERE id_barang = NEW.id_barang) < NEW.jumlah_barang THEN
    SIGNAL SQLSTATE '45000' 
    SET MESSAGE_TEXT = 'Stok barang tidak mencukupi untuk peminjaman';
  ELSE
    
    UPDATE barang
    SET stok_barang = stok_barang - NEW.jumlah_barang
    WHERE id_barang = NEW.id_barang;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `nomor_hp`) VALUES
(1, 'Andi Saputra R', '081234567890'),
(2, 'Budi Santoso', '081234567891'),
(3, 'Citra Dewi', '081234567892'),
(4, 'Dian Purnama', '081234567893'),
(5, 'Eka Permana', '081234567894');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Elektronik'),
(2, 'Furniture'),
(3, 'Alat Tulis'),
(4, 'Peralatan Kebersihan'),
(5, 'Peralatan Dapur');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_aktivitas`, `deskripsi`, `tanggal`) VALUES
(2, 'Peminjaman baru oleh karyawan ID: 1 dengan ID Peminjaman: 7', '2024-12-10 15:42:09'),
(3, 'Peminjaman baru oleh karyawan ID: 3 dengan ID Peminjaman: 8', '2025-01-14 11:27:19'),
(4, 'Peminjaman baru oleh karyawan ID: 1 dengan ID Peminjaman: 9', '2025-01-14 19:06:23'),
(5, 'Peminjaman baru oleh karyawan ID: 5 dengan ID Peminjaman: 10', '2025-01-14 19:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
(1, 'Lokasi A'),
(2, 'Lokasi B'),
(3, 'Lokasi C'),
(4, 'Lokasi D'),
(5, 'Lokasi E');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_peminjaman`, `tanggal_pengembalian`, `id_karyawan`, `id_petugas`) VALUES
(1, '2024-12-01', '2024-12-05', 1, 1),
(2, '2024-12-02', '2024-12-06', 2, 2),
(3, '2024-12-03', '2024-12-07', 3, 3),
(4, '2024-12-04', '2024-12-08', 4, 4),
(5, '2024-12-05', '2024-12-09', 5, 5),
(7, '2024-12-06', '2024-12-10', 1, 1),
(8, '2025-01-14', '2025-01-25', 3, 2),
(9, '2025-01-02', '2025-01-25', 1, 5),
(10, '2025-01-03', '2025-01-15', 5, 1);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `log_peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
    INSERT INTO log_aktivitas (id_aktivitas, deskripsi, tanggal)
    VALUES (NULL, CONCAT('Peminjaman baru oleh karyawan ID: ', NEW.id_karyawan, ' dengan ID Peminjaman: ', NEW.id_peminjaman), NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `nomor_hp`, `username`, `password`, `level`) VALUES
(1, 'Fajar Maulana', '081345678901', 'admin123', 'rahasia0000', 'petugas'),
(2, 'Gita Andini', '081345678902', 'petugas1', 'rahasiapisan', 'petugas'),
(3, 'Hana Pratama', '081345678903', 'hana123', 'kamis123', 'petugas'),
(4, 'Indra Wijaya', '081345678904', 'indra000', '12345', 'petugas'),
(5, 'Joko Susilo', '081345678905', 'joko0001', 'makansianggratis', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`);

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
