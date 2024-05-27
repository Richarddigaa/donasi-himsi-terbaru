-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 12:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi_himsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `dana_dibutuhkan` int(11) NOT NULL,
  `dana_terkumpul` int(11) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(258) NOT NULL,
  `status_donasi` enum('Belum dicairkan','Sudah dicairkan') NOT NULL DEFAULT 'Belum dicairkan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id`, `judul`, `id_kategori`, `dana_dibutuhkan`, `dana_terkumpul`, `detail`, `gambar`, `status_donasi`) VALUES
(14, 'Sucikan Harta dengan Zakat Maal', 22, 250000000, 100000, '                                                                                            Zakat Maal adalah kewajiban zakat yang apabila harta telah mencapai batas minimum (nishab) dan haul. Jika di akhir tahun ini nishab dan haul zakatmu telah terpenuhi, mari segera tunaikan zakat maal. Agar hartamu bersih setahun ke belakang dan berkah setahun ke depan.\r\nZakat ini meliputi tabungan, harta berupa Emas/Perak, Saham, investasi, harta dari usaha perdagangan (hewan ternak atau perusahaan yang telah diimiliki dan berjalan selama 1 tahun). \r\nSeseorang yang wajib membayarkan zakat adalah dia yang memeluk agama islam, merdeka, mukalaf (akil baligh), tidak mempunyai hutang, harta milik sendiri, harta telah mencukupi kebutuhan pokoknya, harta sudah mencapai haul dan harta telah mencapai nishab.                                                                                 ', 'zakat_11.png', 'Belum dicairkan'),
(15, 'Bisa Zakat Untuk Membantu Sesama', 22, 590000000, 1000000, '                                                                Akhir tahun merupakan waktu yang tepat untuk menunaikan zakat. Sebagian besar masyarakat menjadikan akhir tahun sebagai patokan haul zakat (masa kepemilikan harta). Menunaikan zakat di akhir tahun juga menggenapi usaha yang telah kita lakukan selama setahun kebelakang dengan menutup usaha kita dengan kebaikan.\r\nJika nishab dan haul zakatmu telah terpenuhi, mari sisihkan sebagian hartamu untuk bantu banyak masyarakat yang membutuhkan. InsyaAllah zakat yang kamu tunaikan mensucikan hartamu setahun kebelakang dan mendapat keberkahan untuk setahun kedepan.                                                        ', 'zakat_sesama.jpeg', 'Belum dicairkan'),
(16, 'Zakat Untuk Yatim Dhuafa Faqir Miskin', 22, 300000000, 650000, '                                                                Yayasan Darul Auliyai Tisah ,juga merupakan lembaga sosial yang mengelola dana zakat mall dana sosial untuk di tasyarufkan kepada yatim piatu, fakir miskin, dhuafa\' dan lansia dan kita juga atau mengalirkan dana tersebut kepada asnaf 8. orang yang berhak menerima zakat. \r\nZakat yang terkumpul akan kami kelola untuk disalurkan kepada asnaf-asnaf yang telah ditetapkan. Semoga Melalui Zakat ini Para Muzakki semakin diberi berkah harta oleh Allah SWT. Amin.                                                        ', 'zakat_yatim.jpeg', 'Belum dicairkan'),
(17, 'Bantu Aqila Sembuh dari Kanker Mata', 23, 60000000, 70000, 'Saya Kalara saya adalah seorang buruh pabrik di daerah Cikarang Saat ini sepupu saya, Aqila yang masih berusia 5 tahun sedang mengidap Tumor Okular (tumor mata)\r\n\r\nAwalnya Aqila merasa nyeri dan gatal di beberapa bagian Matanya, sampai akhirnya Aqila merasa rasa sakit yang tidak tertahan di bagian mata. Akhirnya kami membawa Aqila ke puskesmas terdekat. Karena puskesmas tidak mampu melakukan pemeriksaan lebih lanjut, Nuri dirujuk ke RSU terdekat Setelah itu Aqila didiagnosis mengidap Tumor Okular yang mengakibatkan kebutaan tidak dapat melihat. Kondisi Aqila saat ini hanya terbaring lemah di kamarnya karena Aqila masih terus merasakan sakit di seluruh bagian Matanya.\r\nKondisi Aqila semakin memburuk sehingga harus menjalani USG Bagian mata, dan ternyata ada Tumor jahat Setelah itu Aqila dirawat di RSUD indramayu selama 7 hari dan menerima transfusi darah 2 kali dan albumin sekali. Untuk memastikan hasil, Aqila di MRCP dan dipastikan ada tumor Mata. Saat ini Aqila membutuhkan cuci darah sebanyak 3 kali lagi minimal dan kemoterapi. Jika tidak dilakukan, kondisi Aqila akan semakin memburuk dan bisa berujung fatal.\r\nSejak sakit,Aqila sudah tidak melakukan aktivitas yang biasa dia lakukan sehari-harinya. Aqila sudah tidak bisa mengikuti pelajaran di sekolah walaupun saat ini sekolahnya menerapkan sistem pembelajaran jarak jauh. Keadaan semakin sulit bagi keluarga Aqila, karena sekarang Ibu Aqila juga harus membiayai pengobatan Aqila seorang diri di luar kebutuhan-kebutuhan lainnya.\r\noperasi tumor Pada mata Rp 40.000.000 rawat inap 10.000.000 transportasi 3.000.000 biaya Makan dan Minuman 2.000.000. Aqila sangat membutuhkan bantuan semua orang agar bisa melakukan kemoterapi dan cuci darah untuk keberlangsungan hidup Aqila.', 'kesehatan_1.png', 'Belum dicairkan'),
(18, 'Derita Penyakit Jantung, Bantu Zainab Sembuh', 23, 150000000, 13000000, '                                                                Zainab anak pertama kami dari awal kehamilan sudah ada masalah dan lahir prematur. seminggu setelah lahir dokter bilang lihat dari wajahnya seperti down sindrom kebetulan waktu itu ada dari yayasan bantu untuk cek kromosom dan mau tahu hasilnya harus menunggu selama 1 bulan karna sample darah dibawa ke lab pusat di Jakarta, Alhamdulillah setelah sebulan menunggu hasil nya negatif.’’Cerita Ibu Zainab.\r\nSeiring perjalanan waktu saya lihat perkembangannya agak lambat dibanding anak lain dan bila dia dikurniai adek disitu saya melihat perkembangan ia lain dan harus diperiksakan. Setelah saya coba periksa ke dokter anak awalnya karna batuknya parah dan berterusan jadi di suruh ke dokter paru dan di Rontgen hasilnya positif TB setelah 6 bulan rutin minum obat TB cek lagi ke dokter anak, dokter sarankan ke dokter jantung karna terdengar ada suara yang agak lain di jantungnya.’’Ungkap Ibu Zainab dengan sedih.\r\nBila sudah dibawa ke dokter jantung diusia 3 tahun barulah ketahuan disitu ternyata ia jantung berlubang bawaan lahir dan dari situlah ia susah naik berat badan,sering sakit dan Allah buat juga dia hiperaktif. ia juga ada jantung bocor ia juga hiperaktif jadi saya sebagai orang tua harus lebih banyak sabar dalam menjaga dan merawatnya.\r\nSekarang usianya 4,5 tahun dokter bilang berat badan dia seperti anak umur 1 tahun. Berapa bulan lalu rencana pemasangan kateter bila sudah dilakukan tindakan ternyata baru ketahuan lubangnya agak besar jadi tidak bisa di tutup dengan kateter.\r\nJadi InsyaAllah awal tahun depan akan dilaksanakan operasi bedah untuk tutup bocor jantung nya. Saya sangat memohon doa dari semua semoga dilancarkan proses operasi anak saya dan diberi yang terbaik untuk anak saya dan saya sebagai orang tua semoga saya boleh belajar lebih sabar dan mampu memberi kekuatan untuk anak saya terus berjuang agar tetap sehat.                                                        ', 'kesehatan_2.png', 'Sudah dicairkan'),
(19, 'Bantu Anak Pedalaman Untuk Sekolah', 24, 200000000, 60000, 'Pendidikan adalah hak setiap warga negara, namun kenyataannya masih banyak diantara anak-anak kita yang masih sulit mendapat akses pendidikan, disisi lain mereka pun harus belajar dalam rasa takut karena sarana yang prasarana yang tidak layak.\r\nHal ini benar-benar dirasakan oleh anak-anak yang tinggal di wilayah pedalaman, mereka terkendala biaya untuk membeli perlengkapan sekolah, tak jarang ditemukan di tempat mereka belajar, hampir semua anak pergi ke sekolah memakai tas yang sobek, sepatu pun sudah bolong sehingga jika sedang musim hujan air tembus ke dalam sepatu mereka.\r\nBahkan, terkadang mereka hanya membawa buku dan pensil tanpa menggunakan tas sekolah hingga mereka malu berangkat sekolah karena tak memiliki alat sekolah layak sama sekali.\r\nUntuk itu, Donasi Kita berkolaborasi dengan partner di berbagai daerah berkolaborasi untuk bisa membantu anak-anak di pelosok agar bisa merasakan pendidikan dengan layak tanpa rasa takut dengan bernaung dalam gerakan #bisasekolah', 'pedidikan_1.png', 'Belum dicairkan'),
(20, 'Bantu Fasilitas Pendidikan Anak Difabel Pelosok', 24, 259000000, 790000, '                                Di Indonesia, masih banyak ketimpangan fasilitas di berbagai daerah. Banyak faktor yang mempengaruhinya, misal kondisi geografis daerah tersebut, sehingga sarana dan prasarana sulit didistribusikan.\r\nSalah satunya, teknologi yang masih sulit dijangkau, sehingga akses internet pun jadi terhambat. Dampak yang ditimbulkan adalah akan terlihat perbedaan hasil belajar dari siswa yang daerahnya terdukung teknologi dan tidak terdukung.  Apalagi fasilitas untuk anak-anak difabel yang masih minim.\r\nMari bantu mereka yang semangat untuk tetap sekolah walaupun dengan berbagai kekurangan yang ada.                            ', 'pendidikan_2.png', 'Belum dicairkan'),
(21, 'Donasi Rutin Lindungi Hewan Terlantar', 25, 50000000, 30000, 'Hewan-hewan terlantar di jalan dan satwa di alam liar membutuhkan bantuan hooman sepertimu untuk menjadi teman baiknya. Ada banyak sekali hewan yang sakit, kesulitan mencari makan, atau bahkan hampir punah karena habitat tempat tinggalnya terancam. Belum lagi hewan yang alami kekerasan. \r\nMenurut survei Asia For Animals Coalition, Indonesia ada di peringkat pertama sumber video penyiksaan hewan. Asia For Animals Coalition mencatat bahwa 1.626 dari 5.480 konten penyiksaan hewan di dunia berlokasi di Indonesia. Catatan kelam ini ditambah dengan 1.569 dari 5.480 konten penyiksaan hewan di-upload dari Indonesia.', 'hewan_1.png', 'Belum dicairkan'),
(22, 'Bantuan Pakan Untuk Hewan Liar dan Terlantar', 25, 65000000, 1200000, '                                Lewat program TemanHewan, kami mau mengajak teman-teman untuk menolong hewan-hewan liar dan terlantar di luar sana mulai dari kucing, anjing, dan hewan-hewan lainnya yang membutuhkan dengan bantuan pakan gratis.\r\nKamu bisa ikut membantu secara rutin agar semakin banyak hewan yang bisa dibantu, dengan ikutan donasi rutin pada program ini.\r\nTogether we can do it! Bersama-sama, kita pasti bisa ciptakan dampak yang lebih besar untuk selamatkan hewan Indonesia!                            ', 'hewan_2.png', 'Sudah dicairkan'),
(23, 'Selamatkan Hewan Disabilitas', 25, 78000000, 30000, 'Mari kita wujudkan kepedulian kita pada para hewan di luar sana. Kita tak perlu turun ke jalan lalu mengobati hewan yang sakit sendiri. Kamu bisa bantu dengan cara berdonasi. \r\nHasil donasi terkumpul di galang dana ini akan kami salurkan untuk bantu-bantu hewan yang sakit dan terluka. Kami akan berkolaborasi dengan lembaga-lembaga rehabilitasi hewan sakit, menyediakan kebutuhan pengobatan, meng-cover biaya tindakan medis, menyediakan alat bantu kesehatan seperti kursi roda. ', 'hewan_3.png', 'Belum dicairkan'),
(24, 'Pahala Tak Terputus, Sedekah Qur\'an untuk Pesantren', 26, 150000000, 10000, '                            Rasulullah SAW bersabda: \"Salah satu amal kebaikan yang pahalanya terus terbawa kepada si mayit sampai ke alam kuburnya adalah sedekah dan mewariskan mushaf Al-Qur\'an\" (H.R. Bukhari).\r\nMungkin banyak dari kita yang belum tahu, bahwa banyak masjid dan pesantren yang kondisi mushaf al-Quran-nya memprihatinkan: lecek, lusuh, dan beberapa halamannya sobek sehingga tidak terbaca. \r\nSebagai contoh Masjid al-Ikhlas di Cililin, Kab Bandung, Jawa Barat. Di masjid tersebut, sebagian besar mushaf al-Quran-nya kotor dan tintanya sudah pudar. Jumlahnya pun sangat sedikit sehingga jemaah mesti antri dan berebutan untuk membaca kitab suci. \r\nKondisi demikian juga terjadi di pesantren. Para santri, yang sudah seharusnya menjadikan al-Quran sebagai bacaan sehari-hari mereka, harus rebutan karena jumlah mushaf yang terbatas dan tidak sebanding dengan banyaknya jumlah santri. Kondisi semacam itu tidak menyurutkan semangat para santri untuk membaca, mengkaji, dan menghafal al-Quran. \r\nTidakkah semangat tersebut mengetuk hati kita semua? Bayangkan jika mushaf al-Quran yang mereka punya kondisinya prima, tentu mereka akan lebih semangat lagi untuk mendalami kitab suci. Para Penderma, yuk bantu mereka, sisihkan harta Anda demi mushaf al-Quran yang kondisinya lebih layak untuk mereka baca.                         ', 'sosial_1.png', 'Belum dicairkan'),
(25, 'Patungan Ambulan Gratis untuk Pasien Dhuafa', 26, 786000000, 86000000, 'Assalamualaikum warahmatullahi Wabarakatuh OrangBaik, kami dari Yayasan Sahabat Berbagi Riau ingin mengajak OrangBaik untuk membantu pasien pasien berobat menggunakan ambulans. Sewa mobil ambulance mahal, banyak kaum dhuafa tidak sanggup membayar sewa padahal situasi genting seperti sakit datangnya tiba-tiba.\r\nBanyak orang di Indonesia sulit memenuhi kebutuhannya karena keterbatasan. \r\nKehidupan mereka jauh dari kata layak begitu pun kesehatan mereka.\r\nTerbiasa sakit tanpa mendapat bantuan kesehatan. Bingung mencari pertolongan karena tidak memiliki biaya, hingga sulitnya mendapat akses kesehatan saat keadaan darurat datang.\r\nSaat keadaan darurat inilah, layanan mobil ambulance sangat mereka butuhkan.\r\nSebagai upaya untuk membantu kaum dhuafa, kami mengajak para Sobat Baik bersama Yayasan Sahabat Berbagi Riau untuk memberikan layanan ambulans gratis untuk penjemputan dan pengantaran pasien yang akan berobat.\r\n\"Allah akan senantiasa menolong hamba-Nya, selama hamba tersebut menolong saudaranya.\" (HR. Muslim)', 'sosial_2.png', 'Belum dicairkan'),
(26, 'Akhir Tahun, Bangun Masjid Lapuk Pelosok', 27, 689000000, 680000, 'Bayangkan shalat di masjid yang terbuat dari bilik bambu saat musim hujan dan angin kencang, ngga bahaya kah?\r\nTapi, itulah yang warga Bojongsari rasakan saat shalat di Musola Al Kautsar. Sedih melihatnya, terpaksa shalat di tempat yang kondisinya bahkan tak layak. Mushola ini letaknya ada di Kampung Bojongsari, Kec. Agrabinta, Kab. Cianjur. Mushola ini pertama kali didirikan pada 15 Juni 2001. Ukurannya tak begitu besar, hanya mampu memuat 20 jamaah.\r\nTerbuat dari bahan material sederhana. Dinding bilik bambu, lantai papan kayu, atap genteng, dan plafon bilik bambu. Belum memiliki instalasi sendiri, masih menumpang rumah warga. Selama ini juga belum pernah direnovasi. Musola ini sudah rusak Sejak tahun 2013. Banyak kerusakan pada bilik bambu, atap bocor, rangka atap genteng dan plafon sangat lapuk. Mereka kekurangan biaya jadi tak bisa merenovasi. ketidaknyamanan jamaah dalam berkegiatan beribadah, mengaji maupun kegiatan lainnya. Kondisi atap yang rusak dan dinding bilik bambu yang sudah rapuh/rusak membuat para jamaah waspada saat berada didalam maupun disekitar bangunan. Jika tidak segera diperbaiki, dapat rubuh jika dilihat dari keadaannya. Belum memiliki instalasi listrik dan tidak memiliki tempat wudhu/wc sendiri.\r\nMari jadi salah satu orang baik yang memberikan mereka masjid kokoh. Agar warga Kampung Bojongsari bisa beribadah dengan nyaman.     ', 'ibadah_1.png', 'Belum dicairkan'),
(27, 'Sedekah Jariyah Bangun Masjid', 27, 700000000, 3200000, 'Para santri di Yayasan pondok pesantren tahfidz ahbaabul mukhtar saat ini belum memiliki rumah ibadah ( Masjid ) sebagai sarana untuk menunaikan kewajiban beribadah 5 waktu, dan sebagai sarana untuk belajar mempelajari ilmunya Alloh SWT, Para santri saat ini melakukan kegiatan sholat berjamaah di tempat biasa dan sangat sempit, jadi kami berfikir keras bagaimana cara untuk segera membangun Masjid untuk kegiatan para santri.\r\nPara santri di pondok pesantren tahfidz ahbaabul mukhtar sudah sejak lama belum memiliki tempat khusus untuk sembahyang ( Masjid ). Lokasi Masjid yg sedang di bangun ini terletak di tengah-tengah komplek pondok pesantren tahfidz ahbaabul mukhtar. \r\nMasjid yg saat ini sedang di bangun baru tiang- tiang saja , estimasi progres pengerjaan saat ini baru 10 % . Jadi masih sangat² membutuhkan dana yang cukup besar untuk sampai tahap dapat digunakan para santri untuk beribadah. Kendala / kesulitan yg kami hadapi dg keterbatasan dana untuk membeli bahan dan pembayaran setiap akhir pekan.\r\nKebutuhan kami berupa material yang di antaranya Besi beton untuk dak, semen, pasir dll... Kebutuhan biaya tukang di setiap akhir pekan nya. Kami mengajak rekan-rekan semua, #OrangBaik, Para Dermawan untuk bergabung menjadi bagian dari pd pembangunan Masjid di Yayasan pondok pesantren tahfidz ahbaabul mukhtar, Dengan membantu membangun Masjid, Berarti Anda semua telah membangun ISTANA Anda sendiri di Surga.\r\nKami sangat senang sekali dg adanya Galang dana melalui kitabisa ini, kami sangat bersemangat InsyaAlloh dg izin Alloh SWT, Orang² yg melimpahkan rezekinya bisa terketuk dan bisa tergerak untuk ambil bagian dlm pembangunan Masjid ini. ', 'ibadah_2.png', 'Belum dicairkan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(22, 'Zakat'),
(23, 'Kesehatan'),
(24, 'Pendidikan'),
(25, 'Menolong Hewan'),
(26, 'Sosial'),
(27, 'Rumah Ibadah');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pencairan`
--

CREATE TABLE `laporan_pencairan` (
  `id_laporan` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `nama_donasi` varchar(256) NOT NULL,
  `kategori_donasi` varchar(128) NOT NULL,
  `dana_cair` int(11) NOT NULL,
  `nama_rekening` varchar(128) NOT NULL,
  `nomor_rekening` char(12) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `detail_pencairan` text NOT NULL,
  `tanggal_pencairan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_pencairan`
--

INSERT INTO `laporan_pencairan` (`id_laporan`, `id_donasi`, `nama_donasi`, `kategori_donasi`, `dana_cair`, `nama_rekening`, `nomor_rekening`, `nama_penerima`, `detail_pencairan`, `tanggal_pencairan`) VALUES
(8, 18, 'Derita Penyakit Jantung, Bantu Zainab Sembuh', 'Kesehatan', 13000000, 'BANK Mandiri', '08123456789', 'Linggar', 'Rencana Penggunaan Dana Pencairan : Biaya rumah sakit', 1716805872),
(9, 22, 'Bantuan Pakan Untuk Hewan Liar dan Terlantar', 'Menolong Hewan', 1200000, 'BANK BCA', '019283746523', 'Tiemothy', 'Rencana Penggunaan Dana Pencairan : Donasi digunakan untuk membeli pakan hewan', 1716806033);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(128) NOT NULL,
  `rekening` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayaran`, `rekening`) VALUES
(1, 'Bank Mandiri', '156002345678'),
(2, 'Bank BCA', '5432109876'),
(3, 'DANA', '089123456789'),
(4, 'GOPAY', '089123456789'),
(5, 'OVO', '089123456789');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(258) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `gambar`, `password`, `role_id`, `tanggal_input`) VALUES
(1, 'Admin', 'admin@gmail.com', 'logo-donasi.png', '$2y$10$85awVSnnWapkVHhkNnnWDOT5LlPrmHlJf1MUhB5/ovQuk.FzjaaZK', 1, 1701074570),
(2, 'tie', 'ie@gmail.com', 'default.jpg', '$2y$10$VpAjkSKBiIXpIPRhzcdCXOvl7nbQKOVWM9FzhoQkaQBhVYOpSdYgW', 1, 1701090676),
(3, 'Richard Richard', 'asd@gmail.com', 'saku.jpeg', '$2y$10$q67HpNQtU.V5CFfpZxG/DeAK3jZnnxzsoZP47gwjvoyTKGpfeC0hq', 1, 1701090781),
(4, 'Richard Diga Andreansyah', 'ads@gmail.com', 'php.jpeg', '$2y$10$UdNTTNSuzKNiI7/x3bGeduUeO0X3NnKbmmtP8O2QFQWySGZwaNgYS', 2, 1701863239),
(5, 'user', 'user@gmail.com', 'logo-donasi.png', '$2y$10$tssELi1OcC6ov0F6oDbjU.H7UCdiVvCmKJstre.KwP2emWqsR21ia', 2, 1702472173),
(6, 'Richard Diga Andreansyah', 'richard@gmail.com', 'logo-donasi.png', '$2y$10$/tqIz3n75AXmWOfc.2AfTe1Len/8aFSt54SCsqIZBc4WpovlgNHCW', 2, 1702564834),
(7, 'Hanifa Rahmania', 'hani@gmail.com', 'logo-donasi.png', '$2y$10$c2PMRL6L/AN6.hVfXEbQ..pQNLRPx5aCzSWebwGmFY6XW2m4RpJm.', 2, 1702564913),
(8, 'Muhammad Maulana Putra', 'putra@gmail.com', 'logo-donasi.png', '$2y$10$MUkwO5vhfcKpRr1uIhnUpuUFZajm50V5Giatv57cvN3/CtY2ARo9S', 2, 1702565013),
(9, 'Naufal Muhammad Alghifari', 'naufal@gmail.com', 'logo-donasi.png', '$2y$10$oUpQf2QIx7ZYFBJfFmpHvOwtI7RfEuuNOMNItW8QDPxBUpDGvzERy', 2, 1702565077),
(10, 'Tiemothy Henry Christiano Massie', 'tie@gmail.com', 'logo-donasi.png', '$2y$10$8NWi96jv36aM7uphAE0kQehg9vekDj1F2oapVlHkTbiYbuuwFVEeS', 2, 1702565269);

-- --------------------------------------------------------

--
-- Table structure for table `user_berdonasi`
--

CREATE TABLE `user_berdonasi` (
  `id_berdonasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `dana_didonasikan` int(11) NOT NULL,
  `bukti` varchar(258) NOT NULL,
  `tanggal_donasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_berdonasi`
--

INSERT INTO `user_berdonasi` (`id_berdonasi`, `id_user`, `id_donasi`, `id_pembayaran`, `dana_didonasikan`, `bukti`, `tanggal_donasi`) VALUES
(6, 6, 17, 3, 50000, '50k.jpeg', 1702565194),
(7, 10, 17, 3, 20000, '20k.jpeg', 1702565303),
(8, 10, 21, 3, 30000, '30k.jpeg', 1702565329),
(9, 10, 23, 3, 30000, '30k1.jpeg', 1702627544),
(10, 10, 25, 2, 6000000, '50k1.jpeg', 1702628851),
(11, 10, 25, 3, 80000000, '30k2.jpeg', 1702629070),
(12, 8, 16, 2, 150000, '50k2.jpeg', 1714613355);

--
-- Triggers `user_berdonasi`
--
DELIMITER $$
CREATE TRIGGER `tambahDanaTerkumpul` AFTER INSERT ON `user_berdonasi` FOR EACH ROW BEGIN 
	UPDATE donasi SET dana_terkumpul = dana_terkumpul + NEW.dana_didonasikan 		WHERE id = NEW.id_donasi;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan_pencairan`
--
ALTER TABLE `laporan_pencairan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_berdonasi`
--
ALTER TABLE `user_berdonasi`
  ADD PRIMARY KEY (`id_berdonasi`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `laporan_pencairan`
--
ALTER TABLE `laporan_pencairan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_berdonasi`
--
ALTER TABLE `user_berdonasi`
  MODIFY `id_berdonasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
