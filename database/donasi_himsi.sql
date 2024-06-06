-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2024 pada 18.29
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

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
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` char(10) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `id_kategori` char(10) NOT NULL,
  `dana_dibutuhkan` int(11) NOT NULL,
  `dana_terkumpul` int(11) NOT NULL,
  `detail` text NOT NULL,
  `gambar` varchar(258) NOT NULL,
  `status_donasi` enum('Belum dicairkan','Sudah dicairkan') NOT NULL DEFAULT 'Belum dicairkan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `judul`, `id_kategori`, `dana_dibutuhkan`, `dana_terkumpul`, `detail`, `gambar`, `status_donasi`) VALUES
('DN2024001', 'Sucikan Harta dengan Zakat Maal', 'KT2024001', 250000000, 100000000, 'Zakat Maal adalah kewajiban zakat yang apabila harta telah mencapai batas minimum (nishab) dan haul. Jika di akhir tahun ini nishab dan haul zakatmu telah terpenuhi, mari segera tunaikan zakat maal. Agar hartamu bersih setahun ke belakang dan berkah setahun ke depan.  \r\nZakat ini meliputi tabungan, harta berupa Emas/Perak, Saham, investasi, harta dari usaha perdagangan (hewan ternak atau perusahaan yang telah diimiliki dan berjalan selama 1 tahun). \r\nSeseorang yang wajib membayarkan zakat adalah dia yang memeluk agama islam, merdeka, mukalaf (akil baligh), tidak mempunyai hutang, harta milik sendiri, harta telah mencukupi kebutuhan pokoknya, harta sudah mencapai haul dan harta telah mencapai nishab. \r\n', 'zakat_1.png', 'Belum dicairkan'),
('DN2024002', 'Bisa zakat Untuk Membantu Sesama', 'KT2024001', 130000000, 50000000, 'Akhir tahun merupakan waktu yang tepat untuk menunaikan zakat. Sebagian besar masyarakat menjadikan akhir tahun sebagai patokan haul zakat (masa kepemilikan harta). Menunaikan zakat di akhir tahun juga menggenapi usaha yang telah kita lakukan selama setahun kebelakang dengan menutup usaha kita dengan kebaikan. \r\nJika nishab dan haul zakatmu telah terpenuhi, mari sisihkan sebagian hartamu untuk bantu banyak masyarakat yang membutuhkan. InsyaAllah zakat yang kamu tunaikan mensucikan hartamu setahun kebelakang dan mendapat keberkahan untuk setahun kedepan.\r\n', 'zakat_sesama.jpeg', 'Belum dicairkan'),
('DN2024003', 'Zakat untuk Yatim Dhuafa Faqir Miskin', 'KT2024001', 28600000, 28600000, 'Yayasan Darul Auliyai Tisah ,juga merupakan lembaga sosial yang mengelola dana zakat mall dana sosial untuk di tasyarufkan kepada yatim piatu, fakir miskin, dhuafa\' dan lansia dan kita juga atau mengalirkan dana tersebut kepada asnaf 8. orang yang berhak menerima zakat. \r\nZakat yang terkumpul akan kami kelola untuk disalurkan kepada asnaf-asnaf yang telah ditetapkan. Semoga Melalui Zakat ini Para Muzakki semakin diberi berkah harta oleh Allah SWT. Amin. \r\n', 'zakat_yatim.jpeg', 'Belum dicairkan'),
('DN2024004', 'Bantu Aqila Sembuh dari Kanker Mata', 'KT2024002', 62500000, 14500000, 'Saya Kalara saya adalah seorang buruh pabrik di daerah Cikarang Saat ini sepupu saya, Aqila yang masih berusia 5 tahun sedang mengidap Tumor Okular (tumor mata)\r\n\r\nAwalnya Aqila merasa nyeri dan gatal di beberapa bagian Matanya, sampai akhirnya Aqila merasa rasa sakit yang tidak tertahan di bagian mata. Akhirnya kami membawa Aqila ke puskesmas terdekat. Karena puskesmas tidak mampu melakukan pemeriksaan lebih lanjut, Nuri dirujuk ke RSU terdekat Setelah itu Aqila didiagnosis mengidap Tumor Okular yang mengakibatkan kebutaan tidak dapat melihat. Kondisi Aqila saat ini hanya terbaring lemah di kamarnya karena Aqila masih terus merasakan sakit di seluruh bagian Matanya.\r\n Kondisi Aqila semakin memburuk sehingga harus menjalani USG Bagian mata, dan ternyata ada Tumor jahat Setelah itu Aqila dirawat di RSUD indramayu selama 7 hari dan menerima transfusi darah 2 kali dan albumin sekali. Untuk memastikan hasil, Aqila di MRCP dan dipastikan ada tumor Mata. Saat ini Aqila membutuhkan cuci darah sebanyak 3 kali lagi minimal dan kemoterapi. Jika tidak dilakukan, kondisi Aqila akan semakin memburuk dan bisa berujung fatal.\r\n Sejak sakit,Aqila sudah tidak melakukan aktivitas yang biasa dia lakukan sehari-harinya. Aqila sudah tidak bisa mengikuti pelajaran di sekolah walaupun saat ini sekolahnya menerapkan sistem pembelajaran jarak jauh. Keadaan semakin sulit bagi keluarga Aqila, karena sekarang Ibu Aqila juga harus membiayai pengobatan Aqila seorang diri di luar kebutuhan-kebutuhan lainnya.\r\n operasi tumor Pada mata Rp 40.000.000 rawat inap 10.000.000 transportasi 3.000.000 biaya Makan dan Minuman 2.000.000. Aqila sangat membutuhkan bantuan semua orang agar bisa melakukan kemoterapi dan cuci darah untuk keberlangsungan hidup Aqila.', 'kesehatan_1.png', 'Belum dicairkan'),
('DN2024005', 'Derita Penyakit Jantung, Bantu Zainab Sembuh', 'KT2024002', 341000000, 70000000, 'Zainab anak pertama kami dari awal kehamilan sudah ada masalah dan lahir prematur. seminggu setelah lahir dokter bilang lihat dari wajahnya seperti down sindrom kebetulan waktu itu ada dari yayasan bantu untuk cek kromosom dan mau tahu hasilnya harus menunggu selama 1 bulan karna sample darah dibawa ke lab pusat di Jakarta, Alhamdulillah setelah sebulan menunggu hasil nya negatif.’’Cerita Ibu Zainab\r\nSeiring perjalanan waktu saya lihat perkembangannya agak lambat dibanding anak lain dan bila dia dikurniai adek disitu saya melihat perkembangan ia lain dan harus diperiksakan. Setelah saya coba periksa ke dokter anak awalnya karna batuknya parah dan berterusan jadi di suruh ke dokter paru dan di Rontgen hasilnya positif TB setelah 6 bulan rutin minum obat TB cek lagi ke dokter anak, dokter sarankan ke dokter jantung karna terdengar ada suara yang agak lain di jantungnya.’’Ungkap Ibu Zainab dengan sedih\r\nBila sudah dibawa ke dokter jantung diusia 3 tahun barulah ketahuan disitu ternyata ia jantung berlubang bawaan lahir dan dari situlah ia susah naik berat badan,sering sakit dan Allah buat juga dia hiperaktif. ia juga ada jantung bocor ia juga hiperaktif jadi saya sebagai orang tua harus lebih banyak sabar dalam menjaga dan merawatnya.\r\nSekarang usianya 4,5 tahun dokter bilang berat badan dia seperti anak umur 1 tahun. Berapa bulan lalu rencana pemasangan kateter bila sudah dilakukan tindakan ternyata baru ketahuan lubangnya agak besar jadi tidak bisa di tutup dengan kateter.\r\nJadi InsyaAllah awal tahun depan akan dilaksanakan operasi bedah untuk tutup bocor jantung nya. Saya sangat memohon doa dari semua semoga dilancarkan proses operasi anak saya dan diberi yang terbaik untuk anak saya dan saya sebagai orang tua semoga saya boleh belajar lebih sabar dan mampu memberi kekuatan untuk anak saya terus berjuang agar tetap sehat.', 'kesehatan_2.png', 'Belum dicairkan'),
('DN2024006', 'Bantu Anak Pedaleman Untuk Sekolah', 'KT2024003', 198000000, 50500000, 'Pendidikan adalah hak setiap warga negara, namun kenyataannya masih banyak diantara anak-anak kita yang masih sulit mendapat akses pendidikan, disisi lain mereka pun harus belajar dalam rasa takut karena sarana yang prasarana yang tidak layak.\r\n Hal ini benar-benar dirasakan oleh anak-anak yang tinggal di wilayah pedalaman, mereka terkendala biaya untuk membeli perlengkapan sekolah, tak jarang ditemukan di tempat mereka belajar, hampir semua anak pergi ke sekolah memakai tas yang sobek, sepatu pun sudah bolong sehingga jika sedang musim hujan air tembus ke dalam sepatu mereka.\r\nBahkan, terkadang mereka hanya membawa buku dan pensil tanpa menggunakan tas sekolah hingga mereka malu berangkat sekolah karena tak memiliki alat sekolah layak sama sekali.\r\nUntuk itu, Donasi Kita berkolaborasi dengan partner di berbagai daerah berkolaborasi untuk bisa membantu anak-anak di pelosok agar bisa merasakan pendidikan dengan layak tanpa rasa takut dengan bernaung dalam gerakan #bisasekolah', 'pedidikan_1.png', 'Belum dicairkan'),
('DN2024007', 'Bantu Fasilitas Pendidikan Anak Difabel Pelosok', 'KT2024003', 29000000, 9300000, 'Di Indonesia, masih banyak ketimpangan fasilitas di berbagai daerah. Banyak faktor yang mempengaruhinya, misal kondisi geografis daerah tersebut, sehingga sarana dan prasarana sulit didistribusikan.\r\nSalah satunya, teknologi yang masih sulit dijangkau, sehingga akses internet pun jadi terhambat. Dampak yang ditimbulkan adalah akan terlihat perbedaan hasil belajar dari siswa yang daerahnya terdukung teknologi dan tidak terdukung.  Apalagi fasilitas untuk anak-anak difabel yang masih minim.\r\nMari bantu mereka yang semangat untuk tetap sekolah walaupun dengan berbagai kekurangan yang ada.\r\n', 'pendidikan_2.png', 'Belum dicairkan'),
('DN2024008', 'Donasi Rutin Lindungi Hewan Terlantar ', 'KT2024004', 165200000, 80000000, 'Hai, Orang Baik,\r\nHewan-hewan terlantar di jalan dan satwa di alam liar membutuhkan bantuan hooman sepertimu untuk menjadi teman baiknya. Ada banyak sekali hewan yang sakit, kesulitan mencari makan, atau bahkan hampir punah karena habitat tempat tinggalnya terancam. Belum lagi hewan yang alami kekerasan. \r\nMenurut survei Asia For Animals Coalition, Indonesia ada di peringkat pertama sumber video penyiksaan hewan. Asia For Animals Coalition mencatat bahwa 1.626 dari 5.480 konten penyiksaan hewan di dunia berlokasi di Indonesia. Catatan kelam ini ditambah dengan 1.569 dari 5.480 konten penyiksaan hewan di-upload dari Indonesia.\r\n', 'hewan_1.png', 'Belum dicairkan'),
('DN2024009', 'Bantuan Pakan untuk Hewan Liar dan Terlantar', 'KT2024004', 36500000, 36500000, 'Hai Teman – Teman \r\nLewat program TemanHewan, kami mau mengajak teman-teman untuk menolong hewan-hewan liar dan terlantar di luar sana mulai dari kucing, anjing, dan hewan-hewan lainnya yang membutuhkan dengan bantuan pakan gratis.\r\nKamu bisa ikut membantu secara rutin agar semakin banyak hewan yang bisa dibantu, dengan ikutan donasi rutin pada program ini.\r\nTogether we can do it! Bersama-sama, kita pasti bisa ciptakan dampak yang lebih besar untuk selamatkan hewan Indonesia!\r\n', 'hewan_2.png', 'Sudah dicairkan'),
('DN2024010', 'Yuk Selamatkan Hewan Disabillitas', 'KT2024004', 51700000, 20000000, 'Hai, Orang Baik\r\nMari kita wujudkan kepedulian kita pada para hewan di luar sana. Kita tak perlu turun ke jalan lalu mengobati hewan yang sakit sendiri. Kamu bisa bantu dengan cara berdonasi. \r\n Hasil donasi terkumpul di galang dana ini akan kami salurkan untuk bantu-bantu hewan yang sakit dan terluka. Kami akan berkolaborasi dengan lembaga-lembaga rehabilitasi hewan sakit, menyediakan kebutuhan pengobatan, meng-cover biaya tindakan medis, menyediakan alat bantu kesehatan seperti kursi roda. \r\n', 'hewan_3.png', 'Belum dicairkan'),
('DN2024011', 'Pahala Tak Terputus, Sedekah Qur’an untuk ', 'KT2024005', 81400000, 70000000, 'Rasulullah SAW bersabda: \"Salah satu amal kebaikan yang pahalanya terus terbawa kepada si mayit sampai ke alam kuburnya adalah sedekah dan mewariskan mushaf Al-Qur\'an\" (H.R. Bukhari)\r\n\r\nMungkin banyak dari kita yang belum tahu, bahwa banyak masjid dan pesantren yang kondisi mushaf al-Quran-nya memprihatinkan: lecek, lusuh, dan beberapa halamannya sobek sehingga tidak terbaca. \r\n\r\nSebagai contoh Masjid al-Ikhlas di Cililin, Kab Bandung, Jawa Barat. Di masjid tersebut, sebagian besar mushaf al-Quran-nya kotor dan tintanya sudah pudar. Jumlahnya pun sangat sedikit sehingga jemaah mesti antri dan berebutan untuk membaca kitab suci. \r\nKondisi demikian juga terjadi di pesantren. Para santri, yang sudah seharusnya menjadikan al-Quran sebagai bacaan sehari-hari mereka, harus rebutan karena jumlah mushaf yang terbatas dan tidak sebanding dengan banyaknya jumlah santri. Kondisi semacam itu tidak menyurutkan semangat para santri untuk membaca, mengkaji, dan menghafal al-Quran. \r\nTidakkah semangat tersebut mengetuk hati kita semua? Bayangkan jika mushaf al-Quran yang mereka punya kondisinya prima, tentu mereka akan lebih semangat lagi untuk mendalami kitab suci. Para Penderma, yuk bantu mereka, sisihkan harta Anda demi mushaf al-Quran yang kondisinya lebih layak untuk mereka baca. \r\n', 'sosial_1.png', 'Belum dicairkan'),
('DN2024012', 'Patungan Ambulans Gratis Tuk  Pasien Dhuafa', 'KT2024005', 585000000, 90200000, 'Assalamualaikum warahmatullahi Wabarakatuh OrangBaik, kami dari Yayasan Sahabat Berbagi Riau ingin mengajak OrangBaik untuk membantu pasien pasien berobat menggunakan ambulans. Sewa mobil ambulance mahal, banyak kaum dhuafa tidak sanggup membayar sewa padahal situasi genting seperti sakit datangnya tiba-tiba.\r\nBanyak orang di Indonesia sulit memenuhi kebutuhannya karena keterbatasan. \r\nKehidupan mereka jauh dari kata layak begitu pun kesehatan mereka.\r\nTerbiasa sakit tanpa mendapat bantuan kesehatan. Bingung mencari pertolongan karena tidak memiliki biaya, hingga sulitnya mendapat akses kesehatan saat keadaan darurat datang.\r\n Saat keadaan darurat inilah, layanan mobil ambulance sangat mereka butuhkan.\r\nSebagai upaya untuk membantu kaum dhuafa, kami mengajak para Sobat Baik bersama Yayasan Sahabat Berbagi Riau untuk memberikan layanan ambulans gratis untuk penjemputan dan pengantaran pasien yang akan berobat.\r\n\"Allah akan senantiasa menolong hamba-Nya, selama hamba tersebut menolong saudaranya.\" (HR. Muslim)', 'sosial_2.png', 'Belum dicairkan'),
('DN2024013', 'Akhir Tahun, Bangun Masjid Lapuk Pelosok', 'KT2024006', 135000000, 50030000, 'Bayangkan shalat di masjid yang terbuat dari bilik bambu saat musim hujan dan angin kencang, ngga bahaya kah?\r\nTapi, itulah yang warga Bojongsari rasakan saat shalat di Musola Al Kautsar. Sedih melihatnya, terpaksa shalat di tempat yang kondisinya bahkan tak layak. Mushola ini letaknya ada di Kampung Bojongsari, Kec. Agrabinta, Kab. Cianjur. Mushola ini pertama kali didirikan pada 15 Juni 2001. Ukurannya tak begitu besar, hanya mampu memuat 20 jamaah.\r\n Terbuat dari bahan material sederhana. Dinding bilik bambu, lantai papan kayu, atap genteng, dan plafon bilik bambu. Belum memiliki instalasi sendiri, masih menumpang rumah warga. Selama ini juga belum pernah direnovasi. Musola ini sudah rusak Sejak tahun 2013. Banyak kerusakan pada bilik bambu, atap bocor, rangka atap genteng dan plafon sangat lapuk. Mereka kekurangan biaya jadi tak bisa merenovasi. ketidaknyamanan jamaah dalam berkegiatan beribadah, mengaji maupun kegiatan lainnya. Kondisi atap yang rusak dan dinding bilik bambu yang sudah rapuh/rusak membuat para jamaah waspada saat berada didalam maupun disekitar bangunan. Jika tidak segera diperbaiki, dapat rubuh jika dilihat dari keadaannya. Belum memiliki instalasi listrik dan tidak memiliki tempat wudhu/wc sendiri.\r\nMari jadi salah satu orang baik yang memberikan mereka masjid kokoh. Agar warga Kampung Bojongsari bisa beribadah dengan nyaman.', 'ibadah_1.png', 'Belum dicairkan'),
('DN2024014', 'Sedekah Jariyah Bangun Masjid', 'KT2024006', 348500000, 79020000, '                                                        Para santri di Yayasan pondok pesantren tahfidz ahbaabul mukhtar saat ini belum memiliki rumah ibadah ( Masjid ) sebagai sarana untuk menunaikan kewajiban beribadah 5 waktu, dan sebagai sarana untuk belajar mempelajari ilmunya Alloh SWT, Para santri saat ini melakukan kegiatan sholat berjamaah di tempat biasa dan sangat sempit, jadi kami berfikir keras bagaimana cara untuk segera membangun Masjid untuk kegiatan para santri.\r\nPara santri di pondok pesantren tahfidz ahbaabul mukhtar sudah sejak lama belum memiliki tempat khusus untuk sembahyang ( Masjid ). Lokasi Masjid yg sedang di bangun ini terletak di tengah-tengah komplek pondok pesantren tahfidz ahbaabul mukhtar. \r\nMasjid yg saat ini sedang di bangun baru tiang- tiang saja , estimasi progres pengerjaan saat ini baru 10 % . Jadi masih sangat² membutuhkan dana yang cukup besar untuk sampai tahap dapat digunakan para santri untuk beribadah. Kendala / kesulitan yg kami hadapi dg keterbatasan dana untuk membeli bahan dan pembayaran setiap akhir pekan.\r\nKebutuhan kami berupa material yang di antaranya Besi beton untuk dak, semen, pasir dll... Kebutuhan biaya tukang di setiap akhir pekan nya. Kami mengajak rekan-rekan semua, #OrangBaik, Para Dermawan untuk bergabung menjadi bagian dari pd pembangunan Masjid di Yayasan pondok pesantren tahfidz ahbaabul mukhtar, Dengan membantu membangun Masjid, Berarti Anda semua telah membangun ISTANA Anda sendiri di Surga.\r\nKami sangat senang sekali dg adanya Galang dana melalui kitabisa ini, kami sangat bersemangat InsyaAlloh dg izin Alloh SWT, Orang² yg melimpahkan rezekinya bisa terketuk dan bisa tergerak untuk ambil bagian dlm pembangunan Masjid ini.                                                ', 'ibadah_11.png', 'Belum dicairkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(10) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
('KT2024001', 'Zakat'),
('KT2024002', 'Kesehatan'),
('KT2024003', 'Pendidikan'),
('KT2024004', 'Menolong Hewan'),
('KT2024005', 'Sosial'),
('KT2024006', 'Rumah Ibadah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pencairan`
--

CREATE TABLE `laporan_pencairan` (
  `id_laporan` char(10) NOT NULL,
  `id_donasi` char(10) NOT NULL,
  `nama_donasi` varchar(256) NOT NULL,
  `kategori_donasi` varchar(128) NOT NULL,
  `dana_cair` int(11) NOT NULL,
  `nama_rekening` varchar(128) NOT NULL,
  `nomor_rekening` char(12) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `detail_pencairan` text NOT NULL,
  `tanggal_pencairan` int(11) NOT NULL,
  `bukti_pencairan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_pencairan`
--

INSERT INTO `laporan_pencairan` (`id_laporan`, `id_donasi`, `nama_donasi`, `kategori_donasi`, `dana_cair`, `nama_rekening`, `nomor_rekening`, `nama_penerima`, `detail_pencairan`, `tanggal_pencairan`, `bukti_pencairan`) VALUES
('LP2024001', 'DN2024009', 'Bantuan Pakan untuk Hewan Liar dan Terlantar', 'Menolong Hewan', 36500000, 'BANK Mandiri', '521904758392', 'Tiemothy Henry Christiano Massie', 'Rencana Penggunaan Dana Pencairan : Donasi digunakan untuk membeli pakan hewan di pinggir jalan', 1717583863, 'penyaluran_dana1.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(10) NOT NULL,
  `nama_pembayaran` varchar(128) NOT NULL,
  `rekening` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayaran`, `rekening`) VALUES
('P2024001', 'BANK BCA', '4312684958'),
('P2024002', 'BANK MANDIRI', '513968742546'),
('P2024003', 'BANK BRI', '39684652381'),
('P2024004', 'GOPAY', '08567822234'),
('P2024005', 'DANA', '08567822234'),
('P2024006', 'OVO', '08567822234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(258) NOT NULL,
  `role_id` char(10) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `gambar`, `password`, `role_id`, `tanggal_input`) VALUES
('US2024001', 'Admin', 'admin@gmail.com', 'logo-donasi.png', '$2y$10$UTgJ32iqwWkNLBB75hVGiOMBjpIdC65aIMkWyUpQg8fR6Q1W3AUA2', '001', 1717491137),
('US2024003', 'zaldi', 'zaldi@gmail.com', 'logo-donasi.png', '$2y$10$4Rl3/BdtWimBreNS/8HPJ.0J28adXaCb8Xf6pGDUwnx.20uTd/coW', '002', 1717491655),
('US2024004', 'Linggar Pramudia Adi', 'linggar@gmail.com', 'logo-donasi.png', '$2y$10$4Z0Bv9mi0mPBc/sYIcHDfeSpqGnlUEgmg8ShHmq9.urLY5woZTDKC', '002', 1717491694),
('US2024005', 'Tiemothy Henry Christiano Massie', 'tie@gmail.com', 'logo-donasi.png', '$2y$10$bTyU92ZNveu82PoE33HUeuth8E3Tma9rZP0rknGfRy2/Mjq2xluhG', '002', 1717582641),
('US2024006', 'Hanifa Rahmania', 'hani@gmail.com', 'logo-donasi.png', '$2y$10$Bx72qnwj4w/URnxFCRtXeOV8W8eaHbl75ragygV52jEHkz1pJBAc2', '002', 1717582912),
('US2024007', 'Richard Diga Andreansyah', 'rich@gmail.com', 'logo-donasi.png', '$2y$10$JuQWyYRKyjH0mZvp7spE5.27s31a7SN1nYxHDvZO9IDtl5YGk4R42', '002', 1717583075),
('US2024008', 'Damar ', 'damar@gmail.com', 'logo-donasi.png', '$2y$10$16YkuBolYPVHXWWj.ghwLepZgmoETHsB0p2sT42sXUu.xHNVccIeW', '002', 1717583305);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_berdonasi`
--

CREATE TABLE `user_berdonasi` (
  `id_berdonasi` char(11) NOT NULL,
  `id_user` char(11) NOT NULL,
  `id_donasi` char(10) NOT NULL,
  `id_pembayaran` char(10) NOT NULL,
  `dana_didonasikan` int(11) NOT NULL,
  `bukti` varchar(258) NOT NULL,
  `tanggal_donasi` int(11) NOT NULL,
  `status_berdonasi` enum('Menunggu Konfirmasi','Sudah dikonfirmasi') DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_berdonasi`
--

INSERT INTO `user_berdonasi` (`id_berdonasi`, `id_user`, `id_donasi`, `id_pembayaran`, `dana_didonasikan`, `bukti`, `tanggal_donasi`, `status_berdonasi`) VALUES
('SB2024001', 'US2024004', 'DN2024014', 'P2024002', 500000, '50k.jpeg', 1717580979, 'Sudah dikonfirmasi'),
('SB2024002', 'US2024004', 'DN2024013', 'P2024005', 30000, '30k.jpeg', 1717581011, 'Sudah dikonfirmasi'),
('SB2024003', 'US2024004', 'DN2024012', 'P2024004', 200000, '20k.jpeg', 1717581048, 'Sudah dikonfirmasi'),
('SB2024004', 'US2024003', 'DN2024014', 'P2024002', 20000, '20k1.jpeg', 1717581125, 'Sudah dikonfirmasi'),
('SB2024005', 'US2024004', 'DN2024010', 'P2024002', 5000000, '50k1.jpeg', 1717582287, 'Menunggu Konfirmasi'),
('SB2024006', 'US2024004', 'DN2024009', 'P2024005', 2000000, '20k2.jpeg', 1717582315, 'Sudah dikonfirmasi'),
('SB2024007', 'US2024004', 'DN2024011', 'P2024003', 20000000, '20k3.jpeg', 1717582355, 'Sudah dikonfirmasi'),
('SB2024008', 'US2024004', 'DN2024013', 'P2024001', 30000000, '30k1.jpeg', 1717582376, 'Sudah dikonfirmasi'),
('SB2024009', 'US2024003', 'DN2024013', 'P2024003', 20000000, '20k4.jpeg', 1717582414, 'Sudah dikonfirmasi'),
('SB2024010', 'US2024003', 'DN2024010', 'P2024004', 20000000, '20k5.jpeg', 1717582447, 'Sudah dikonfirmasi'),
('SB2024011', 'US2024003', 'DN2024011', 'P2024006', 50000000, '50k2.jpeg', 1717582471, 'Sudah dikonfirmasi'),
('SB2024012', 'US2024003', 'DN2024009', 'P2024003', 16500000, '20k6.jpeg', 1717582491, 'Sudah dikonfirmasi'),
('SB2024013', 'US2024005', 'DN2024008', 'P2024001', 60000000, '50k3.jpeg', 1717582673, 'Sudah dikonfirmasi'),
('SB2024014', 'US2024005', 'DN2024007', 'P2024001', 9000000, '20k7.jpeg', 1717582699, 'Sudah dikonfirmasi'),
('SB2024015', 'US2024005', 'DN2024006', 'P2024001', 50000000, '50k4.jpeg', 1717582717, 'Sudah dikonfirmasi'),
('SB2024016', 'US2024005', 'DN2024005', 'P2024001', 30000000, '30k2.jpeg', 1717582736, 'Sudah dikonfirmasi'),
('SB2024017', 'US2024005', 'DN2024004', 'P2024001', 6500000, '50k5.jpeg', 1717582759, 'Sudah dikonfirmasi'),
('SB2024018', 'US2024005', 'DN2024003', 'P2024001', 5000000, '50k6.jpeg', 1717582779, 'Sudah dikonfirmasi'),
('SB2024019', 'US2024005', 'DN2024014', 'P2024001', 8500000, '20k8.jpeg', 1717582872, 'Sudah dikonfirmasi'),
('SB2024020', 'US2024005', 'DN2024012', 'P2024001', 30000000, '30k3.jpeg', 1717582890, 'Sudah dikonfirmasi'),
('SB2024021', 'US2024006', 'DN2024008', 'P2024003', 20000000, '20k9.jpeg', 1717582940, 'Sudah dikonfirmasi'),
('SB2024022', 'US2024006', 'DN2024007', 'P2024003', 300000, '30k4.jpeg', 1717582958, 'Sudah dikonfirmasi'),
('SB2024023', 'US2024006', 'DN2024006', 'P2024003', 500000, '50k7.jpeg', 1717582979, 'Sudah dikonfirmasi'),
('SB2024024', 'US2024006', 'DN2024005', 'P2024003', 20000000, '20k10.jpeg', 1717582999, 'Sudah dikonfirmasi'),
('SB2024025', 'US2024006', 'DN2024004', 'P2024003', 5000000, '50k8.jpeg', 1717583018, 'Sudah dikonfirmasi'),
('SB2024026', 'US2024006', 'DN2024002', 'P2024003', 30000000, '30k5.jpeg', 1717583034, 'Sudah dikonfirmasi'),
('SB2024027', 'US2024006', 'DN2024001', 'P2024003', 50000000, '50k9.jpeg', 1717583052, 'Sudah dikonfirmasi'),
('SB2024028', 'US2024007', 'DN2024012', 'P2024005', 30000000, '30k6.jpeg', 1717583101, 'Sudah dikonfirmasi'),
('SB2024029', 'US2024007', 'DN2024014', 'P2024002', 50000000, '50k10.jpeg', 1717583117, 'Sudah dikonfirmasi'),
('SB2024030', 'US2024007', 'DN2024002', 'P2024005', 20000000, '20k11.jpeg', 1717583137, 'Sudah dikonfirmasi'),
('SB2024031', 'US2024007', 'DN2024001', 'P2024005', 50000000, '50k11.jpeg', 1717583158, 'Sudah dikonfirmasi'),
('SB2024032', 'US2024007', 'DN2024004', 'P2024005', 3000000, '30k7.jpeg', 1717583179, 'Sudah dikonfirmasi'),
('SB2024033', 'US2024007', 'DN2024005', 'P2024002', 20000000, '20k12.jpeg', 1717583213, 'Sudah dikonfirmasi'),
('SB2024034', 'US2024008', 'DN2024012', 'P2024004', 30000000, '30k8.jpeg', 1717583329, 'Sudah dikonfirmasi'),
('SB2024035', 'US2024008', 'DN2024014', 'P2024006', 20000000, '20k13.jpeg', 1717583345, 'Sudah dikonfirmasi'),
('SB2024036', 'US2024008', 'DN2024003', 'P2024004', 23600000, '20k14.jpeg', 1717583441, 'Sudah dikonfirmasi'),
('SB2024037', 'US2024007', 'DN2024009', 'P2024005', 18000000, '20k15.jpeg', 1717583556, 'Sudah dikonfirmasi');

--
-- Trigger `user_berdonasi`
--
DELIMITER $$
CREATE TRIGGER `tambahDanaTerkumpul` AFTER UPDATE ON `user_berdonasi` FOR EACH ROW BEGIN 
	UPDATE donasi SET dana_terkumpul = dana_terkumpul + NEW.dana_didonasikan WHERE id = NEW.id_donasi;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` char(3) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
('001', 'Admin'),
('002', 'Member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `laporan_pencairan`
--
ALTER TABLE `laporan_pencairan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_berdonasi`
--
ALTER TABLE `user_berdonasi`
  ADD PRIMARY KEY (`id_berdonasi`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
