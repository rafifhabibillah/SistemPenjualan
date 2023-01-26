--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(10) NOT NULL,
  `id_kategori` char(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `harga_beli` int(15) DEFAULT NULL,
  `harga_jual` int(15) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `nama_barang`, `harga_beli`, `harga_jual`, `stok`, `foto`) VALUES
('P0001', 'K003', 'PC', 3500000, 4000000, 31, 0x323330323230313830383231343070632e6a7067),
('P0002', 'K004', 'Busi', 4500, 6000, 78, 0x3233303232303138303832323035627573692e6a7067),
('P0003', 'K001', 'Laptop', 4000000, 4500000, 44, 0x32333032323031383038323232376c6170746f702e6a7067),
('P0004', 'K008', 'Bola Sepak', 55000, 80000, 75, 0x3233303232303138303832333530626f6c612e6a7067),
('P005', 'K005', 'Baju', 150000, 160000, 169, 0x323330323230313830383339353162616a752e6a7067),
('P006', 'K007', 'Gitar Elektrik', 3000000, 3200000, 25, 0x3032303332303138303333363439323330323230313830373430343267697461722e6a7067),
('P007', 'K008', 'Jersey Bola', 60000, 0, 13, 0x32383032323031383036353333333233303232303138303832333530626f6c612e6a7067),
('P008', 'K004', 'Mesin Honda A12983', 3000000, 3005000, 15, 0x627573692e6a7067),
('P011', 'K008', 'Baju Bola', 30000, 35000, 50, 0x62616a752e6a7067),
('P015', 'K009', 'Mobil', 200000000, 220000000, 20, 0x30313033323031383034333633376d6f62696c2e6a7067),
('P016', 'K009', 'Truk', 300000000, 300005000, 18, 0x30313033323031383034333535387472756b2e6a7067),
('P017', 'K010', 'Buku AAA', 8000, 8800, 50, 0x303330333230313830343231323662756b752e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(25) NOT NULL,
  `kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('K001', 'elektronika'),
('K002', 'Prabot Rumah Tangga'),
('K003', 'multimedia'),
('K004', 'Sperpat'),
('K005', 'Busana'),
('K006', 'Mebel'),
('K007', 'Musik'),
('K008', 'Olahraga'),
('K009', 'Otomotif'),
('K010', 'Sekolah'),
('K011', 'Alat Tempur');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `fullname`, `level`) VALUES
('1', 'admin', 'ed989d2e7afc762fd6f4176bef38eabf', 'admin1', 'admin'),
('2', 'rafif', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'rafifoperator', 'operator'),
('3', 'muhammad', '25d55ad283aa400af464c76d713c07ad', 'muhammad', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(25) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `telepon` char(30) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `agama`, `tgl_lahir`, `telepon`, `email`, `alamat`) VALUES
('P001', 'Rafif', 'laki-laki', 'Islam', '2001-09-25', '0895355671056', 'rafifhabibillah@gmail.com', 'Krangean,Nglebak,Tawangma'),
('P002', 'Habibi', 'laki-laki', 'Islam', '2001-09-25', '08966433456775', 'habibibibiibibibiibib@goo', 'Krangean,Nglebak,Tawangma'),
('P003', 'Rafif', 'laki-laki', 'Islam', '2018-02-07', '089465644547', 'rafiefhabibillah354@gmail', 'Krangean,Nglebak,Tawangma'),
('P004', 'Muhammad', 'laki-laki', 'Islam', '2000-09-22', '081324435546', 'Muhammad@gmail.com', 'Tawangmangu'),
('P005', 'Vero', 'perempuan', 'Islam', '2002-09-10', '089531456306', 'vero@gmail.com', 'Nglegok,Nglebak,Tawangman'),
('P006', 'Imron', 'laki-laki', 'Islam', '2000-04-18', '0896356778887', 'imron@yahoo.co.id', 'Krangean,Nglebak,Tawangma');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` char(15) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_supplier` char(15) NOT NULL,
  `id_barang` char(15) NOT NULL,
  `harga_beli` int(15) NOT NULL,
  `jumlah_beli` int(10) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tgl_pembelian`, `id_supplier`, `id_barang`, `harga_beli`, `jumlah_beli`, `total`) VALUES
('B001', '2018-02-27', 'S001', 'P0004', 55000, 2, 110000),
('B002', '2018-02-27', 'S002', 'P0002', 4500, 2, 9000),
('B003', '2018-02-28', 'S001', 'P005', 150000, 10, 1500000),
('B004', '2018-02-28', 'S001', 'P0004', 55000, 10, 550000),
('B004', '2018-02-28', 'S001', 'P005', 150000, 10, 1500000),
('B005', '2018-02-28', 'S001', 'P007', 50000, 10, 500000),
('B006', '2018-02-28', 'S001', 'P007', 1000, 10, 10000),
('B006', '2018-02-28', 'S001', 'P007', 1000, 10, 10000),
('B007', '2018-02-28', 'S001', 'P007', 60000, 0, 600000),
('B008', '2018-02-28', 'S002', 'P008', 3000000, 0, 45000000),
('B009', '2018-02-28', 'S002', 'P009', 25000, 30, 750000),
('B010', '2018-02-28', 'S002', 'P010', 30000, 5, 150000),
('B010', '2018-02-28', 'S002', 'P007', 60000, 3, 180000),
('B013', '2018-03-01', 'S002', 'P015', 200000000, 20, 2147483647),
('B013', '2018-03-01', 'S002', 'P016', 300000000, 20, 2147483647),
('B014', '2018-03-01', 'S003', 'P017', 9000, 75, 675000),
('B014', '2018-03-01', 'S003', 'P018', 5000, 35, 175000),
('B015', '2018-03-01', 'S002', 'P019', 1, 2, 2),
('B016', '2018-03-03', 'S001', 'P0004', 55000, 5, 275000),
('B017', '2018-03-03', 'S003', 'P017', 8000, 50, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` char(10) NOT NULL,
  `tgl_penjualan` date DEFAULT NULL,
  `id_pelanggan` char(10) DEFAULT NULL,
  `id_barang` char(10) DEFAULT NULL,
  `harga_barang` int(15) DEFAULT NULL,
  `jumlah_barang` int(10) DEFAULT NULL,
  `total_harga` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl_penjualan`, `id_pelanggan`, `id_barang`, `harga_barang`, `jumlah_barang`, `total_harga`) VALUES
('A001', '2018-02-26', 'P001', 'P0001', 4000000, 3, 12000000),
('A002', '2018-02-20', 'P003', 'P0001', 4000000, 2, 12000000),
('A003', '2018-02-26', 'P001', 'P0004', 80000, 1, 80000),
('A003', '2018-02-26', 'P001', 'P0004', 80000, 1, 80000),
('A003', '2018-02-26', 'P001', 'P0004', 80000, 1, 80000),
('A004', '2018-02-26', 'P001', 'P0002', 6000, 2, 24000),
('A005', '2018-02-20', 'P004', 'P0001', 4000000, 1, 4000000),
('A006', '2018-02-20', 'P001', 'P0002', 6000, 4, 24000),
('A007', '2018-02-20', 'P001', 'P0003', 4500000, 2, 9000000),
('A008', '2018-02-20', 'P004', 'P0002', 6000, 4, 24000),
('A008', '2018-02-20', 'P004', 'P0002', 6000, 4, 24000),
('A008', '2018-02-20', 'P004', 'P0002', 6000, 4, 24000),
('A008', '2018-02-20', 'P004', 'P0002', 6000, 4, 24000),
('A008', '2018-02-20', 'P004', 'P0002', 6000, 4, 24000),
('A009', '2018-02-20', 'P004', 'P0002', 6000, 3, 18000),
('A009', '2018-02-20', 'P004', 'P0002', 6000, 3, 18000),
('A009', '2018-02-20', 'P004', 'P0003', 4500000, 1, 4500000),
('A009', '2018-02-20', 'P004', 'P0004', 80000, 2, 160000),
('A010', '2018-02-20', 'P004', 'P0004', 80000, 1, 80000),
('A010', '2018-02-20', 'P004', 'P0002', 6000, 12, 72000),
('A017', '2018-02-21', 'P005', 'P0002', 6000, 2, 12000),
('A018', '2018-02-21', 'P001', 'P005', 160000, 1, 160000),
('A019', '2018-03-03', 'P002', 'P0002', 6000, 1, 12000),
('A020', '2018-03-03', 'P003', 'P0002', 6000, 2, 30000),
('A021', '2018-04-05', 'P001', 'P005', 160000, 2, 320000);

-- --------------------------------------------------------

--
-- Table structure for table `retur_penjualan`
--

CREATE TABLE `retur_penjualan` (
  `id_retur` char(10) NOT NULL,
  `tgl_retur` date NOT NULL,
  `id_penjualan` char(10) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `id_barang` char(20) NOT NULL,
  `harga_barang` int(25) NOT NULL,
  `jumlah_retur` int(25) NOT NULL,
  `total_retur` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_penjualan`
--

INSERT INTO `retur_penjualan` (`id_retur`, `tgl_retur`, `id_penjualan`, `id_pelanggan`, `id_barang`, `harga_barang`, `jumlah_retur`, `total_retur`) VALUES
('R001', '2018-02-26', 'A001', 'P001', 'P0001', 4000000, 1, 4000000),
('R002', '2018-02-26', 'A002', 'P003', 'P0001', 4000000, 1, 4000000),
('R003', '2018-02-26', 'A002', 'P003', 'P0001', 4000000, 1, 4000000),
('R004', '2018-02-26', 'A004', 'P001', 'P0002', 6000, 2, 12000),
('R005', '2018-02-26', 'A014', 'P005', 'P005', 160000, 1, 160000),
('R006', '2018-02-26', 'A016', 'P005', 'P0002', 6000, 2, 18000),
('R007', '2018-02-26', 'A019', 'P003', 'P0002', 6000, 1, 6000),
('R008', '2018-02-26', 'A022', 'P005', 'P0002', 6000, 1, 6000),
('R009', '2018-02-27', 'A021', 'P005', 'P0002', 6000, 1, 6000),
('R010', '2018-02-27', 'A021', 'P001', 'P0001', 4000000, 3, 12000000),
('R011', '2018-02-27', 'A021', 'P001', 'P0002', 6000, 2, 12000),
('R012', '2018-03-02', 'A012', 'P004', 'P0003', 4500000, 2, 9000000),
('R013', '2018-03-02', 'A012', 'P004', 'P0003', 4500000, 2, 9000000),
('R014', '2018-03-02', 'A010', 'P004', 'P0002', 6000, 12, 72000),
('R015', '2018-03-03', 'A011', 'P003', 'P0002', 6000, 1, 6000),
('R016', '2018-03-03', 'A019', 'P002', 'P0002', 6000, 1, 6000),
('R017', '2018-03-03', 'A020', 'P003', 'P0002', 6000, 3, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` char(10) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `telp`, `email`, `alamat`) VALUES
('S001', 'ANKER SPORT', '0812345678910', 'ankersport@yahoo.co.id', 'jl.Kapt.Patimura no.87 Malang,Jawa Timur'),
('S002', 'ASTRA DAIHATSU INDONESIA', '089543627786', 'Astraindonesia@gmail.com', 'Jl.Moh.Tamrin 21 ,Jakarta Selatan'),
('S003', 'PT SINARMAS', '0271627273', 'SidoIndo@gmail.com', 'Jl.Ir.Soekarno No.10F Jakarta'),
('S004', 'Candi Elektronik', '0271656500', 'candielektronik@gmail.com', 'Jl.Brigjen Slamet Riyadi No.153 Surakart'),
('S005', 'PT SAMSUNG ELEKTRONIK INDONESIA', '021-89837114', 'Samsungindo@yahoo.co.id', 'Jl Jababeka Raya Blok F. 29-33, Bekasi, '),
('S006', 'UD. Selatan Jaya', '08735547846535', 'Selatanjaya@yahoo.com', 'Surabaya,Jawa Timur'),
('S007', 'CV. Sinar Abadi Multimedia', '(0274)555337', 'SinarAbadiMedia212@yahoo.com', 'Jl. Petung No.5, Caturtunggal, Kec. Depo');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembelian`
--

CREATE TABLE `tabel_pembelian` (
  `id_beli` char(15) NOT NULL,
  `id_pembelian` char(15) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `id_supplier` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pembelian`
--

INSERT INTO `tabel_pembelian` (`id_beli`, `id_pembelian`, `tgl_pembelian`, `id_supplier`) VALUES
('B001', 'B001', '2018-02-27', 'S001'),
('B002', 'B002', '2018-02-27', 'S002'),
('B003', 'B003', '2018-02-28', 'S001'),
('B004', 'B004', '2018-02-28', 'S001'),
('B005', 'B005', '2018-02-28', 'S001'),
('B010', 'B010', '2018-02-28', 'S002'),
('B013', 'B013', '2018-03-01', 'S003'),
('B016', 'B016', '2018-03-03', 'S001'),
('B017', 'B017', '2018-03-03', 'S003');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penjualan`
--

CREATE TABLE `tabel_penjualan` (
  `id_jual` char(10) NOT NULL,
  `id_penjualan` char(10) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `id_pelanggan` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penjualan`
--

INSERT INTO `tabel_penjualan` (`id_jual`, `id_penjualan`, `tgl_penjualan`, `id_pelanggan`) VALUES
('', '', '0000-00-00', ''),
('A008', 'A008', '2018-02-20', 'P004'),
('A009', 'A009', '2018-02-20', 'P004'),
('A010', 'A010', '2018-02-20', 'P004'),
('A011', 'A011', '2018-02-20', 'P003'),
('A012', 'A012', '2018-02-20', 'P004'),
('A013', 'A013', '2018-02-20', 'P001'),
('A014', 'A014', '2018-02-21', 'P005'),
('A015', 'A015', '2018-02-21', 'P001'),
('A019', 'A019', '2018-03-03', 'P002'),
('A020', 'A020', '2018-03-03', 'P003'),
('A021', 'A021', '2018-02-21', 'P005'),
('A022', 'A022', '2018-02-23', 'P005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tabel_pembelian`
--
ALTER TABLE `tabel_pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `tabel_penjualan`
--
ALTER TABLE `tabel_penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
