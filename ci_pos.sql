-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 01:11 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cookie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `cookie`) VALUES
(1, 'admin', '$2y$10$jCAq1XNzqgwDE1eEmeZdfeS6FUZT.WHopohuPYVdiP0rm3WueGvzO', 'i9BjkXpzH08tMZY1FeHFqozayn8jUU5xvAmY9vToEMg732XuhDtklfLhb7K5GdyJ');

-- --------------------------------------------------------

--
-- Table structure for table `img_produk`
--

CREATE TABLE `img_produk` (
  `id_img` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`, `icon`, `slug`) VALUES
(1, 'Sepatu', '1606900298841.png', 'sepatu'),
(3, 'Baju', '1606900233419.jpg', 'baju'),
(4, 'Celana', '1606900389883.png', 'celana');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id_package` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id_package`, `judul`, `slug`) VALUES
(2, 'New Product', 'new-product'),
(3, 'Fashion ', 'fashion');

-- --------------------------------------------------------

--
-- Table structure for table `package_produk`
--

CREATE TABLE `package_produk` (
  `id_pp` int(11) NOT NULL,
  `id_package` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_produk`
--

INSERT INTO `package_produk` (`id_pp`, `id_package`, `id_produk`) VALUES
(6, 2, 3),
(7, 2, 2),
(9, 3, 4),
(10, 3, 6),
(11, 3, 9),
(12, 3, 8),
(13, 3, 7),
(14, 2, 12),
(15, 2, 11),
(16, 2, 10),
(17, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `slug` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `kondisi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_submit` datetime NOT NULL,
  `terbit` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `transaksi` int(11) NOT NULL,
  `harga_promo` varchar(30) NOT NULL,
  `dilihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `judul`, `harga`, `stock`, `kategori`, `kondisi`, `berat`, `img`, `deskripsi`, `tanggal_submit`, `terbit`, `slug`, `transaksi`, `harga_promo`, `dilihat`) VALUES
(2, 'T-shirt Polos Pres Baju Kaos Distro Pria Wanita Hitam Pendek Slimfit', '32900', 50, 3, 1, 180, '1606961921193.jpg', 'Deskripsi T-shirt Polos Pres / Baju Kaos Distro Pria Wanita Hitam Pendek Slimfit\r\nHARAP BACA SEBELUM ORDER YAH\r\n\r\nEstimasi ukuran :\r\nALLSIZE FIT M - L\r\nQuality Import\r\nJahitan Double Stick dan Rapih\r\nDada 98CM-100CM*Barang Sesuai Dengan Foto Tanpa Edit\r\nLebar 50cm panjang 70cm\r\nBahan Cotton Combed 30S (Nyaman dan tidak panas)\r\n\r\nPertanyaan yang sering ditanyakan :\r\n1. Q : ada warna lain ?\r\nA : 1 warna yah setiap model, sesuai Foto\r\n\r\n2. Q : Bisa beli lebih dari 1 ?\r\nA : Bisa yah, caranya masukan item 1 per 1 ke keranjang atau kasi deskripsi\r\n\r\nCek toko Revenge Eleven untuk model lainnya.\r\nHappy Shopping~\r\n\r\n#kaosdistro #kaosmurah #kaospria #kaoswanita #kaoskeren #kaosdistromurah #KaosIslamic #Kaosmuslim #kaosgrosir #Cottoncombed30s #atasanpria #atasanwanita', '2020-12-02 17:33:38', 1, 't-shirt-polos-pres-baju-kaos-distro-pria-wanita-hitam-pendek-slimfit', 0, '0', 0),
(3, 'BAJU KAOS HABIB RIZIEQ HRS PANJANG DAKWAH SATU KOMANDO SPIRIT TSHIRT - XS', '80000', 50, 3, 1, 210, '1606905307260.jpg', 'Deskripsi BAJU KAOS HABIB RIZIEQ HRS PANJANG DAKWAH SATU KOMANDO SPIRIT TSHIRT - XS\r\nKami Hanya Menghadirkan Kaos dengan Kwalitas Premium Standart Export.\r\nBahan Cotton combed 24s Premium standart Export.\r\nApa saja kelebihan Kaos kami dibanding dengan kaos yang lain?\r\n- Cepat Menyerap & Melepaskan Keringat sehingga anda tetap nyaman menggunakannya dalam keadaan berkeringat sekalipun.\r\n- Bahan Tebal,\r\n- berstektur Halus & lembut,\r\n- sangat nyaman & adem saat dipakai,\r\n- tidak luntur ketika dicuci & direndam lama\r\n- jahitan double deck sangat kuat rapi,\r\n- gambar dengan daya rekat sangat kuat,\r\n- tidak akan pecah,\r\n- tidak akan terkelupas,\r\n- Warna yang mengkilap\r\n- tidak akan pudar atau berkurang Kwalitas Warna/Gambarnya.\r\n\r\nDETAIL UKURAN PANJANG*LEBAR\r\nXS : 57Cm X 38Cm\r\nS : 60Cm X41 Cm\r\nM : 66X 44 cm\r\nL : 68Cm X 50Cm\r\nXL : 70Cm X 52Cm\r\nXXL : 72Cm X 56Cm\r\nXXXL : 74Cm X 66Cm\r\n\r\n\r\n#kaoshabib #kaoshabibrizieq #kaoshabibbahar #kaoshabiblutfi #kaoshabibbaharsmith #kaoshabibsyech #kaoshabibrizieqbaju #kaoshabibrizieqsyihab #kaoshabibrizieqtshirt #kaoshabibrizieqislam #kaoshabibbaharmurah #kaoshabibbaharsmithpria #kaoshabibbaharsmithmurah #kaoshabibbaharsmithpendek #kaoshabibbaharsmithfans #kaoshabibsyechbaju #kaoshabibsyechtshirt #kaoshabibsyechassegaf #kaoshabibsyecha', '2020-12-02 17:35:07', 1, 'baju-kaos-habib-rizieq-hrs-panjang-dakwah-satu-komando-spirit-tshirt-xs', 0, '', 0),
(4, 'HEM KENNY KEMEJA PRIA LENGAN PENDEK COWO COWOK POLOS KASUAL SLIMFIT - , S', '47190', 50, 3, 1, 200, '1606905468858.jpg', 'Deskripsi HEM KENNY KEMEJA PRIA LENGAN PENDEK COWO COWOK POLOS KASUAL SLIMFIT - , S\r\nBUDAYAKAN MEMBACA SEBELUM MEMBELI !!!\r\nREAL PICTURE\r\nBAHAN KATUN STRETCH\r\nMODEL SLIM FIT\r\nSIZE CHAT :\r\nLINGKAR DADA X PANJANG BAJU\r\n- XS : 88CM X 65CM\r\n- S : 90CM X 65CM\r\n- M : 100CM X 70CM\r\n- L : 102CM X 70CM\r\n- XL : 104CM X 71CM\r\n\r\n- NOTE :\r\n~ MOHON UNTUK TIDAK REQUEST WARNA MELALUI CHAT\r\n~ SILAKAN PILIH WARNA SESUAI DI VARIASI ATAU TULIS DI KOMENTAR PEMBELI\r\n~ BARANG YG DI BELI TIDAK BISA DI RETUR DENGAN ALASAN APAPUN KECUALI :\r\n~ BARANG CACAT ( SOBEK )\r\n~ KESALAHAN DARI KAMI BILA SALAH KIRIM BARANG\r\n~ UNTUK UKURAN HARAP SESUAIKAN DENGAN SIZE CHAT YG SUDAH ADA, BILA BARANG KEKECILAN TIDAK BISA DI TUKAR\r\n~ MODEL BAJU SLIM FIT COCOK UNTUK PRIA YANG MEMILIKI BADAN SLIM ATAU KURUS\r\n~ TIDAK COCOK UNTUK PRIA YG BERBADAN GEMUK ATAU PERUT BUNCIT\r\n~ TRANSAKSI YG MASUK SEBELUM JAM 17.00 WIB AKAN DI KIRIM HARI YG SAMA LEWAT DARI ITU KIRIM KE ESOKAN HARI NYA\r\n~ PENGIRIMAN SETIAP HARI SENIN – SABTU HARI MINGGU LIBUR', '2020-12-02 17:37:48', 1, 'hem-kenny-kemeja-pria-lengan-pendek-cowo-cowok-polos-kasual-slimfit-s', 0, '', 0),
(5, 'Kemeja Polos LS Pique Slimfit - Olive - S', '149000', 50, 3, 1, 300, '1606957905658.jpg', 'Deskripsi Kemeja Polos LS Pique Slimfit - Olive - S\r\nAvailable Size ( Lebar dada x Panjang baju )\r\n.\r\nS : (50cm x 70cm)\r\nM : (53cm x 72cm)\r\nL : (56cm x 74cm)\r\nXL : (60 cm x 76cm)\r\n.\r\nModel pake size M tinggi 173 bb 68\r\n.\r\nMaterial Premium CVC PIQUE 24 S / LACOSTE\r\n.\r\nCuttingan slimfit serta jahitan yg kuat & rapi.\r\n.\r\nReal STOK..! Langsung Checkout aja\r\ntanyakan stok jika stok sisa 1 pcs\r\n.\r\nHEYMAN - BACK TO BASIC\r\n.\r\n#heyman #backtobasic #kemejacasual #kemko', '2020-12-03 08:11:45', 1, 'kemeja-polos-ls-pique-slimfit-olive-s', 0, '', 0),
(6, 'Celana Joger Pria Panjang Jogger Pants Training Running Gym Navy - Navy, M-L', '37800', 50, 4, 1, 400, '1606958567226.jpg', 'Deskripsi Celana Joger Pria Panjang Jogger Pants Training Running Gym Navy - Navy, M-L\r\nJogger Pants\r\n\r\nSelamat datang di Jaketbdg.co kami adalah online shop dari Bandung yang menjual berbagai macam produk celana panjang pria atau wanita dan tas seperti, Celana jogger, Waist Bag, Tas Selempang, Celana chino, Dll.\r\n\r\n\r\nMENERIMA PEMBAYARAN MELALUI COD!\r\n\r\n\r\nBISA UNTUK PRIA DAN WANITA\r\n\r\n1kg = 3pcs Celana jogger\r\n\r\nMATERIAL : FLEECE (LEBIH TEBAL)\r\n\r\nWARNA : Hitam / Navy / Abu Tua / Abu Muda\r\n\r\n\r\nDetail : Bahan fleece berkualitas dengan tekstur halus dan nyaman di gunakan, cocok untuk di pakai segala macam aktifiras, baik untuk hangout, nongkrong bareng teman, mau pun untuk olahraga. Terdapat kantong di kiri dan kanan, terdapat tali bagian depan (Warna dan ukuran tali dapat berbeda dari foto, tergantung ketersediaan tali di pasaran).\r\n\r\nUKURAN :\r\nM/L ( M fit to L)\r\n(BISA MASUK UKURAN 26, 27, 28, 29, 30, 31, 32, 33)\r\n\r\n- LINGKAR PINGGANG : 65cm fit to 84cm\r\n- PANJANG CELANA : 96cm\r\n- LINGKAR PAHA : 58cm fit to 62cm\r\n- LINGKAR BETIS : 36cm fit to 38CM\r\n- LINGKAR PINGGUL : 102cm fit to 106cm\r\n\r\nXL/XXL (XL fit to XXL)\r\n(BISA MASUK UKURAN 34, 35, 36, 37, 38)\r\n\r\n- LINGKAR PINGGANG : 82cm fit to 92cm\r\n- PANJANG CELANA : 98cm\r\n- LINGKAR PAHA : 62cm fit to 76cm\r\n- LINGKAR BETIS : 42cm fit to 46cm\r\n- LINGKAR PINGGUL : 104cm fit to 108cm\r\n\r\nPembeli harap memperhatikan dan mempertimbangkan detail ukuran di atas sebelum membeli.\r\n\r\nUntuk komplain silahkan hubungi kami via chat.\r\n\r\nBUDAYAKAN MEMBACA SEBELUM MEMBELI\r\n*) Pemilihan warna dan ukuran hanya melalui kolom KETERANGAN saat order, bukan melalui CHAT dan DISKUSI.\r\n\r\n*) Wajib mendokumentasikan saat membuka paket dalam bentuk video untuk berjaga-jaga jika ada barang yang tidak sesuai/rusak/cacat sebagai syarat retur di toko kami\r\n\r\n*) Jika anda memutuskan untuk membeli maka kami anggap anda setuju dengan aturan di atas.\r\n\r\n#jogerpants #jogerpria #jogger #joger #celanajogger #celanajoger #training #celanapria #celanawanita #celanaolahraga #celanatraining #joggerwanita #joggerpria #jogerwanita #celanalari #celanajogging #celanajogerpanjang #celanajoggerpanjang', '2020-12-03 08:22:47', 1, 'celana-joger-pria-panjang-jogger-pants-training-running-gym-navy-navy-m-l', 0, '', 0),
(7, 'Houseofcuff Celana Chino Panjang Pria Slim fit Stretch Jeans Hitam - Hitam, 30', '140000', 50, 4, 1, 100, '1606959894174.jpg', 'Deskripsi Houseofcuff Celana Chino Panjang Pria Slim fit Stretch Jeans Hitam - Hitam, 30\r\nTersedia size 27 (ukuran terkecil) hingga size 38 (ukuran terbesar)\r\n\r\nJANGAN LUPA KLIK UKURAN YANG ANDA INGINKAN (KAMI TIDAK MENERIMA PEMILIHAN / PERUBAHAN UKURAN VIA CHAT ATAU PESAN)\r\n\r\nDeskripsi Produk :\r\n\r\n- jenis celana : Celana Chino Slim Fit\r\n\r\n- bahan : Katun Twill stretch (melar / karet) sehingga sangat nyaman apabila di pakai sehari-hari baik kerja maupun jalan-jalan\r\n\r\n- Cutting : Slim Fit\r\n\r\n- Terdapat 2 kantong saku belakang model tanam (bukan tempel)\r\n\r\n- Packaging : bubble wrap dan plastik packaging\r\n\r\n- Detail ukuran : ada digambar (geser foto nya)\r\n\r\nuntuk wilayah jakarta dan sekitar nya (jabodetabek) bisa menggunakan gojek / grab\r\n\r\nNote :\r\n\r\n- Houseofcuff memberikan garansi / free retur atau refund uang kembali apabila barang yang diterima tidak cocok, salah ukuran atau apapun alasannya. sehingga tidak perlu ragu untuk membeli produk kami. (tanyakan kepada CS kami apabila butuh informasi lebih lanjut perihal tukar barang)\r\n\r\n- foto produk kami adalah asli produk kami, sehingga sudah pasti sesuai dengan barang aslinya. akan tetapi dikarenakan faktor cahaya, layar monitor hape anda, dll, perbedaan warna dapat terjadi, toleransi perbedaan warna 3% - 7%.', '2020-12-03 08:44:54', 1, 'houseofcuff-celana-chino-panjang-pria-slim-fit-stretch-jeans-hitam-hitam-30', 0, '', 0),
(8, 'Leedoo Sepatu Sneakers Pria Import Men Shoes Young Lifestyle F15 - Hitam, 39', '99000', 50, 1, 1, 100, '1606960457654.jpg', 'Deskripsi Leedoo Sepatu Sneakers Pria Import Men Shoes Young Lifestyle F15 - Hitam, 39\r\nKepada calon pembeli dimohon untuk membaca deskripsi sebelum memesan produk. Dan tanyakan stoknya terlebih dahulu.\r\n\r\nFREE KAOS KAKI SELAGI PERSEDIAAN MASIH ADA.\r\n\r\nSepatu Sneakers 100% Impor.\r\nSepatu Sneakers murah tapi gak murahan.\r\nSepatu yang kami jual 100% baru + box.\r\nBarang sesuai dengan GAMBAR.\r\nSepatu Sneakers ringan, Kaki bergerak leluasa Sepatu Sneakers lembut di dalam, Nyaman saat dipakai, Sepatu Sneakers Anti slip, Tidak pengap, Tidak mudah lepas, Sepatu Sneakers Model simple dan elegan, Trend Fashion.\r\nREADY WARNA\r\nHitam Putih ( ada list putihnya) : Size 39-44\r\nHitam Polos (tidak ada list putih) : Size 39-44\r\nPerincian Size\r\n39 = 24.5 cm\r\n40 = 25 cm\r\n41 = 25.5 cm\r\n42 = 26 cm\r\n43 = 26.5 cm\r\n44 = 27 cm\r\nOrder sebelum jam 12:00 WIB akan diproses dihari yang sama.\r\nOrder melewati jam 12:00 WIB akan diproses dihari selanjutnya.\r\n*CATATAN YANG PERLU DIPERHATIKAN*\r\n‘’PENGIRIMAN SEPATU APAPUN SUDAH TERMASUK BOX DENGAN KEADAAN BARU, APABILA SETELAH SAMPAI TUJUAN BOX ADA KERUSAKAN BUKAN KESALAHAN DARI KAMI. UNTUK PEMESANAN SEPATU JANGAN LUPA BERI KETERANGAN UKURAN/SIZE YANG DIPESAN’’.\r\n\r\nPesanan sesuai dengan invoice pesanan awal tidak dapat di retur.\r\nPesanan salah kirim barang, warna maupun ukuran boleh diretur.\r\nMasa diperbolehkan retur 3 hari setelah barang diterima. Dan harus dalam keadaan belum dipakai.\r\n\r\nInformasi:\r\n1. Kualitas import.\r\n2. Barang baru+box.\r\n3. Jam Operasional ( senin-sabtu ) jam 08:00 wib s/d 17:00 wib.\r\n4. Harap bersabar menunggu chat dibalas.\r\n5. Barang sesuai gambar. Jika ada sedikit perbedaan warna karena sebab dari pencahayaan saat memotret.\r\n6. Jika menerima barang yang bebeda dari pesanan, silahkan langsung chat saja ke kami dengan mengirimkan bukti foto barang yang diterima dan invoice pesanannya.\r\n7. Masa diperbolehkan retur adalah 2 hari setelah barang diterima.\r\n\r\nLebih detailnya bisa ditanyakan di chat ya ka. Terima kasih.', '2020-12-03 08:54:17', 1, 'leedoo-sepatu-sneakers-pria-import-men-shoes-young-lifestyle-f15-hitam-39', 0, '', 0),
(9, 'Sepatu Sneakers Pria Import Kets dan Kasual Slip On Model Terbaru 923 - Hitam, 44', '139000', 50, 1, 1, 800, '1606960607278.jpg', 'Deskripsi Sepatu Sneakers Pria Import Kets dan Kasual Slip On Model Terbaru 923 - Hitam, 44\r\nProduk 100% Import\r\nTidak Licin\r\nRingan\r\nSol Sepatu Bahan Karet Kuat dan Elastis\r\nBahan Kain Kanvas yang Lembut\r\nPijakan Empuk dan Nyaman\r\nIncluded Box Sepatu\r\n\r\nTersedia warna : HITAM, DARK BLUE, GRAY\r\nUkuran : 39, 40, 41, 42, 43, 44, 45\r\n\r\nNo 39 insole 24,5 cm\r\nNo 40 insole 24,6 - 25 cm\r\nNo 41 insole 25,1 - 25,5 cm\r\nNo 42 insole 25,6 - 26 cm\r\nNo 43 insole 26,1 - 26,5 cm\r\nNo 44 insole 26,6 - 27 cm\r\nNo 45 insole 27,1 - 27,5 cm\r\n\r\nHarap tanyakan warna dan Nomor sebelum checkout untuk menghindari pengiriman secara RANDOM.\r\nsilahkan pilih warna pada menu variasi yang tersedia', '2020-12-03 08:56:47', 1, 'sepatu-sneakers-pria-import-kets-dan-kasual-slip-on-model-terbaru-923-hitam-44', 0, '', 0),
(10, 'Sepatu Ventela BACK TO 70\'s Black Natural Low / Sepatu Ventela 70s LC - 44', '184000', 50, 1, 1, 1250, '1606961670321.jpg', 'Deskripsi Sepatu Ventela BACK TO 70\'s Black Natural Low / Sepatu Ventela 70s LC - 44\r\nVentela Sepatu buatan Indonesia yang lagi Ngetren, Kualitas YahuTT Harga Murah, Finishing rapih, material kuat ,nyaman pada saat dipakai ,cocok untuk dipakai aktifitas sehari hari.\r\n\r\n\r\n******* Tanya stok dulu sebelum membeli yaa\r\n\r\nBNIB (Brand New In Box), 100% Legit Original\r\nBahan dari Kanvas Tebal\r\nSol Teknologi Vulcanized : Awet,Kuat Dan Tahan Lama\r\nInsole Teknologi Eva Foam : Empuk,Ringan,Nyaman\r\nArt . BACK TO 70\'S\r\n\r\nSize Chart Ventela\r\n37 23.8cm\r\n38 24.7cm\r\n39 25.2cm\r\n40 26.1cm\r\n41 26.5cm\r\n42 27.4cm\r\n43 28.3cm\r\n44 28.8cm\r\n\r\nNB: Tulis Warna & Size di Kolom Keterangan.', '2020-12-03 09:14:30', 1, 'sepatu-ventela-back-to-70s-black-natural-low-sepatu-ventela-70s-lc-44', 0, '', 0),
(11, 'Kaos Hitam Motif Luffy Santai / Baju Distro Pria Keren Grosir Murah', '32800', 50, 3, 1, 180, '1606961763021.jpg', 'Deskripsi Kaos Hitam Motif Luffy Santai / Baju Distro Pria Keren Grosir Murah\r\nKETERANGAN LENGKAP DI BAWAH (MOHON DIBACA SEBELUM ORDER)\r\n\r\n*Ukuran :\r\n- All Size (Fit to L), Dada 98 - 100cm\r\n- Lebar 50cm panjang 70cm\r\n\r\n*Kualitas :\r\n- Import, jahitan double stick\r\n- Bahan Cotton Combat 30S (serap keringat dan tidak panas)\r\n\r\n*Note :\r\n- Untuk kondisi barang asli baik warna, ukuran dan bentuk sesuai dengan foto\r\n- Silahkan ditanyakan terlebih dahulu untuk ketersediaan barang dan stok yang diinginkan.\r\n\r\nAyo kunjungi toko kami Hobikaos20 untuk model lainnya ya\r\nSelamat Berbelanja!', '2020-12-03 09:16:03', 1, 'kaos-hitam-motif-luffy-santai-baju-distro-pria-keren-grosir-murah', 0, '', 0),
(12, 'KAOS DISTRO OTSKY/KAOS/BAJU KAOS MURAH/BAJU OTSKY PRIA', '50500', 50, 3, 1, 200, '1606961861562.jpg', 'Deskripsi KAOS DISTRO OTSKY/KAOS/BAJU KAOS MURAH/BAJU OTSKY PRIA\r\nbuat anak muda yang gaul disini kami jual produk kaos distro dari berbagai macam brand2 ternama tentunya dengan kualitas tidak kalah dan harga yang relatif terjangkau.\r\n\r\nKami baru buka toko online dikarenakan ingin mengenalkan produk kami lebih luas lg bagi anak gaul diberbagai daerah.\r\n\r\nToko kami berlokasi di Bandung kota, tentunya sangat strategis dalam kecepatan pelayanan dalam mendistribusikan produk kami sampai ketangan konsumen.\r\nMudah2an dengan kepuasan konsumen terhadap produk kami menjadikan barometer terciptanya toko yang\" amanah dan berkah\", itulah tujuan kami..!\r\n\r\nAyo tunggu apa lagi coba lah produk kami dijamin puas dengan harga yang relatif murah.\r\n\r\nkaos nya dijamin nyaman dipakai kualitas oke dengan harga relatif murah..!\r\n\r\n•>bahan cotton combed 30s\r\n•>bahan ringan,halus,lembut menyerap keringat\r\n•>sablon PLASTISOL karet kuat tahan lama\r\n•>tersedia 3 size standar distro lokal\r\n\r\n•> Size chart\r\n\r\nSize M :P X L :72 cm X 46 cm\r\nSize L :P X L :74 cm X 50,5 cm\r\nSize XL :P X L :77cm X 55,5 cm\r\n\r\nTersedia berbagai macam brand2 ternama:\r\n\r\n■FRIDAY KILLER\r\n■FAMILIAS\r\n■OUTSKY\r\n■THANKSINSOMNIA\r\n■PROBLEM\r\n■KICKOUT\r\n■DLL....\r\n\r\n\r\nPemilihan gambar dan harga grosir :\r\nWA. 081310304142\r\n\r\n\"\"MAU TAMPIL GAYA...INILAH KAOSNYA...!!\"\"\r\n\"\"ANDA PUASS..KAMI BANGGA....!!\"\"\r\n\r\n~~HAPPY SHOPPING~~\r\n\r\ncat:\r\n\"USAHAKAN CHAT DULU SEBELUM ORDER\"', '2020-12-03 09:17:41', 1, 'kaos-distro-otskykaosbaju-kaos-murahbaju-otsky-pria', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `img_produk`
--
ALTER TABLE `img_produk`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `package_produk`
--
ALTER TABLE `package_produk`
  ADD PRIMARY KEY (`id_pp`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_pages`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `img_produk`
--
ALTER TABLE `img_produk`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_produk`
--
ALTER TABLE `package_produk`
  MODIFY `id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
