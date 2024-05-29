<html>

<head>

</head>

<body>
    <h2 style="text-align: center;">DONASI HIMSI</h2>
    <hr>
    <?php foreach ($data_berdonasi as $b) : ?>
        <p>Dear, <?= $b['nama'] ?></p>
        <p>Terima kasih!</p>
        <p>Donasi anda terhadap Campaign <?= $b['judul'] ?> telah kami terima dengan rincian donasi sebagai berikut:</p>
        <table border="0" style="margin-left: 50px;">
            <tbody>
                <tr>
                    <td>Campaign</td>
                    <td>:</td>
                    <td><?= $b['judul'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Donasi</td>
                    <td>:</td>
                    <td><?= date('d F Y', $b['tanggal_donasi']); ?></td>
                </tr>
                <tr>
                    <td>Dana yang diberikan</td>
                    <td>:</td>
                    <td><?= "Rp. " . number_format($b['dana_didonasikan']) ?></td>
                </tr>
                <tr>
                    <td>Bank</td>
                    <td>:</td>
                    <td><?= $b['nama_pembayaran'] ?></td>
                </tr>

            </tbody>
        </table>
        <p>Kami mengucapkan terima kasih yang sebesar-besarnya atas donasi yang Anda berikan. Dukungan Anda sangat berarti bagi campaign ini untuk menjalankan program dan kegiatan yang telah direncanakan.Semoga kebaikan Anda dibalas dengan ebaikan yang berlipat ganda.</p>
        <p>Terima kasih atas kepercayaan dan dukungan Anda</p>
        <p>Hormat kami,</p>
        <p>DONASI HIMSI</p>
    <?php endforeach ?>

</body>

</html>