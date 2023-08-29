-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 12:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kd_admin` char(5) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama_admin`, `username`, `password`, `level`, `tanggal_dibuat`) VALUES
('KD001', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '2022-02-22 21:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswakelas`
--

CREATE TABLE `data_siswakelas` (
  `kd_dataSiswa` char(5) NOT NULL,
  `kd_kelas` char(5) NOT NULL,
  `kd_siswa` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswakelas`
--

INSERT INTO `data_siswakelas` (`kd_dataSiswa`, `kd_kelas`, `kd_siswa`) VALUES
('DS001', 'KL001', 'SW003'),
('DS002', 'KL001', 'SW004'),
('DS003', 'KL002', 'SW001'),
('DS004', 'KL002', 'SW002'),
('DS005', 'KL003', 'SW005');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kd_guru` char(5) NOT NULL,
  `nip` char(10) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(8) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kd_mapel` char(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kd_guru`, `nip`, `nama_guru`, `jenkel`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `kd_mapel`, `username`, `password`, `level`, `foto`) VALUES
('GR001', '12345', 'Zikri Aulia Dinata', 'Perempuan', 'Islam', 'Bandung', '2022-02-03', 'Jalan Surabaya \r\n', '081231233144', 'MP002', 'guru1', '92afb435ceb16630e9827f54330c59c9', 'Guru', '6220cd36ea67a.jpg'),
('GR002', '54321', 'Vivi Ariani', 'Perempuan', 'Islam', 'Semarang', '2022-02-01', 'Jakarta', '081313211987', 'MP003', 'guru3', 'ba6e3bb0215b631f473dd97cd3de08b2', 'Guru', '62234601c59c5.jpg'),
('GR003', '71231', 'Kayra Kharisma', 'Perempuan', 'Islam', 'Bandung', '2022-01-26', 'Jalan Kepatihan No.8 Semarang Timur No.12', '081231221223', 'MP004', 'guru2', '440a21bd2b3a7c686cf3238883dd34e9', 'Guru', '621f988889151.jpg'),
('GR004', '2132', 'Shinta Rahma', 'Perempuan', 'Islam', 'Pemalang', '2022-03-26', 'Jalan Jakarta No.21', '083123123219', 'MP001', 'guru4', 'aa5c4d9f3bd44b0c8975e93bcf318399', 'Guru', '6223477d59131.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` char(5) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `kd_guru` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nama_kelas`, `tahun_ajaran`, `kd_guru`) VALUES
('KL001', 'Kelas I', '2022', 'GR003'),
('KL002', 'Kelas II', '2022', 'GR004'),
('KL003', 'Kelas III', '2022', 'GR002'),
('KL004', 'Kelas IV', '2022', 'GR001');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_mapel` char(5) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  `kkm` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kd_mapel`, `nama_mapel`, `kkm`, `keterangan`) VALUES
('MP001', 'Matematika', 64, 'Wajib'),
('MP002', 'Penjaskes', 68, 'Non-Wajib'),
('MP003', 'Bahasa Indonesia', 73, 'Wajib'),
('MP004', 'IPA', 73, 'Wajib'),
('MP005', 'Sejarah', 65, 'Non-Wajib'),
('MP006', 'Prakarya', 65, 'Non-Wajib'),
('MP007', 'Biologi', 67, 'Wajib');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` char(5) NOT NULL,
  `kd_dataSiswa` varchar(5) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `kd_guru` varchar(5) NOT NULL,
  `nilai_tugas1` float NOT NULL,
  `nilai_tugas2` float NOT NULL,
  `nilai_tugas3` float NOT NULL,
  `nilai_tugas4` float NOT NULL,
  `nilai_tugas5` float NOT NULL,
  `nilai_uts` float NOT NULL,
  `nilai_uas` float NOT NULL,
  `total_nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_dataSiswa`, `semester`, `kd_guru`, `nilai_tugas1`, `nilai_tugas2`, `nilai_tugas3`, `nilai_tugas4`, `nilai_tugas5`, `nilai_uts`, `nilai_uas`, `total_nilai`) VALUES
('NL001', 'DS001', 'genap', 'GR002', 80, 78, 92, 80, 75, 82, 90, 82.4286),
('NL002', 'DS002', 'genap', 'GR002', 98, 90, 99, 77, 88, 70, 96, 88.2857),
('NL003', 'DS004', 'Ganjil', 'GR003', 87, 66, 56, 87, 86, 80, 88, 78.5714),
('NL004', 'DS005', 'Ganjil', 'GR004', 80, 79, 88, 76, 88, 90, 87, 84),
('NL005', 'DS001', 'Ganjil', 'GR001', 98, 76, 88, 86, 70, 78, 90, 83.7143),
('NL006', 'DS002', 'Ganjil', 'GR002', 90, 87, 99, 60, 79, 80, 78, 81.8571),
('NL007', 'DS002', 'Ganjil', 'GR001', 80, 67, 89, 89, 77, 90, 88, 82.8571);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `kd_pengumuman` char(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`kd_pengumuman`, `judul`, `tanggal`, `keterangan`) VALUES
('PG001', 'Libur Lebaran', '2022-03-12', '<p style=\"text-align:justify\"><strong>JAKARTA, KOMPAS.com</strong>&nbsp;- Pemerintah baru-baru ini mengubah jadwal libur sekolah&nbsp;dan pengambilan rapor semester I tahun ajaran 2021/2022.</p>\r\n\r\n<p style=\"text-align:justify\">Dalam aturan terbaru Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbud Ristek) disebutkan, jadwal libur kembali merujuk pada kalender pendidikan awal yang ditetapkan oleh setiap pemerintah daerah (pemda).</p>\r\n\r\n<p style=\"text-align:justify\">Kemendikbud Ristek juga melarang satuan pendidikan menambah waktu libur selama Nataru di luar waktu libur semester dalam kalender pendidikan yang ditetapkan pemda.</p>\r\n\r\n<p style=\"text-align:justify\">Aturan itu tertuang dalam Surat Edaran Nomor 32 Tahun 2021 tentang Penyelenggaraan Pembelajaran Menjelang Libur Natal 2021 dan Tahun Baru 2022 Dalam Rangka Pencegahan dan Penanggulangan Covid-19 yang terbit pada 14 Desember 2021.<br />\r\n&nbsp;</p>\r\n'),
('PG002', 'Libur Semester', '2022-04-10', '<p style=\"text-align:justify\"><img alt=\"\" src=\"https://akcdn.detik.net.id/visual/2022/01/03/luhut-binsar-pandjaitan-1_169.jpeg?w=650\" style=\"height:366px; width:650px\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Jakarta</strong>, CNN Indonesia -- Menteri Koordinator Bidang Kemaritiman dan Investasi Luhut Binsar Pandjaitan mengklaim big data yang berisi percakapan 110 juta orang di media sosial mendukung penundaan Pemilu 2024. Namun, hal itu berbanding terbalik dengan hasil hitung empat lembaga survei.<br />\r\nDia juga mengklaim pemilih Partai Demokrat, <em>Partai Gerindra</em>, dan PDIP mendukung wacana tersebut. Meskipun begitu, ketiga partai politik tersebut sudah menyatakan menolak usulan penundaan Pemilu 2024.</p>\r\n\r\n<p style=\"text-align:justify\">Luhut mengklaim rakyat tidak mau uang Rp110 triliun dipakai untuk menyelenggarakan pemilu serentak.<br />\r\n&nbsp;</p>\r\n'),
('PG003', 'Informasi Beasiswa ', '2022-04-10', '<p><strong>Jadwal Terbaru&nbsp;</strong></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Senin</strong></td>\r\n			<td><strong>Selasa</strong></td>\r\n			<td><strong>Rabu</strong></td>\r\n			<td><strong>Kamis</strong></td>\r\n			<td><strong>Jumat</strong></td>\r\n			<td><strong>Sabtu</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>MTK</td>\r\n			<td>Inggris</td>\r\n			<td>IPA</td>\r\n			<td>Penjaskes</td>\r\n			<td>IPS</td>\r\n			<td>Seni</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Cemungut<img alt=\"smiley\" src=\"http://localhost/SIA_KP/withUI/LOGIN/assets/ckeditor/plugins/smiley/images/regular_smile.png\" style=\"height:23px; width:23px\" title=\"smiley\" /><img alt=\"laugh\" src=\"http://localhost/SIA_KP/withUI/LOGIN/assets/ckeditor/plugins/smiley/images/teeth_smile.png\" style=\"height:23px; width:23px\" title=\"laugh\" /></p>\r\n'),
('PG004', 'Kurikulum Terbaru', '2022-04-10', '<p><em>asek</em> <strong>asek jos</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kd_siswa` char(5) NOT NULL,
  `nis` char(10) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenkel` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(8) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kd_siswa`, `nis`, `nama_siswa`, `jenkel`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`, `angkatan`, `username`, `password`, `level`, `foto`) VALUES
('SW001', '6169', 'Donna', 'Perempuan', 'Konghucu', 'jakarta', '2022-03-09', 'Jalan Sriwijaya No.9\r\n', '08213121213', '2018', '6196', 'f169b1a771215329737c91f70b5bf05c', 'Siswa', '621f2c95635e8.jpg'),
('SW002', '7621', 'Sasha Edina', 'Perempuan', 'Kristen', 'Sleman', '2022-03-30', 'Jalan Bandung', '08121312212', '2018', '7621', '9f4e3847f075d1e7e21141658ade4837', 'Siswa', '6247c67c80853.jpg'),
('SW003', '2312', 'Angga Dwi Pratama', 'Laki-laki', 'Islam', 'Bandung', '2022-03-31', 'Jalan Majapahit', '08312131212', '2019', '2312', '69dafe8b58066478aea48f3d0f384820', 'Siswa', '6220f29a503ab.jpg'),
('SW004', '6531', 'Bagir Muhammad', 'Laki-laki', 'Islam', 'Pekalongan', '2022-03-30', 'Jalan Bandung No.19 Pekalongan Timur', '08312312321', '2019', '6531', '0a7d83f084ec258aefd128569dda03d7', 'Siswa', '622306e6677fd.jpg'),
('SW005', '3212', 'Sasha Kharisma', 'Laki-laki', 'Islam', 'Surabaya', '2022-03-10', 'Jalan Pakisan No.12', '083123123231', '2020', '3212', '0aae0fede9a4d278e2f9a171e62fc76b', 'Siswa', '624bcb2e5a99b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `data_siswakelas`
--
ALTER TABLE `data_siswakelas`
  ADD PRIMARY KEY (`kd_dataSiswa`),
  ADD KEY `kode_kelas` (`kd_kelas`,`kd_siswa`),
  ADD KEY `kd_siswa` (`kd_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kd_guru`),
  ADD KEY `id_mapel` (`kd_mapel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD KEY `id_guru` (`kd_guru`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kd_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `id_guru` (`kd_guru`),
  ADD KEY `id_dataSiswa` (`kd_dataSiswa`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`kd_pengumuman`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kd_siswa`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_siswakelas`
--
ALTER TABLE `data_siswakelas`
  ADD CONSTRAINT `data_siswakelas_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_siswakelas_ibfk_2` FOREIGN KEY (`kd_siswa`) REFERENCES `siswa` (`kd_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kd_mapel`) REFERENCES `mata_pelajaran` (`kd_mapel`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_guru`) REFERENCES `guru` (`kd_guru`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kd_dataSiswa`) REFERENCES `data_siswakelas` (`kd_dataSiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
