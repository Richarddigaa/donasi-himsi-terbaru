<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pencairan Donasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Laporan Pencairan Donasi</h2>
    <p>Bulan: <?= isset($_GET['month'], $_GET['year']) ? date("F Y", strtotime($_GET['year'] . $_GET['month'] . "-01")) : "Semua Pencairan"; ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Dana Yang Dicairkan</th>
                <th>Tanggal Pencairan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($laporan_pencairan)) { ?>
                <tr>
                    <td colspan="5">Tidak ada data untuk bulan dan tahun ini.</td>
                </tr>
            <?php } else { ?>
                <?php $i = 1; ?>
                <?php foreach ($laporan_pencairan as $pencairan) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $pencairan['nama_donasi']; ?></td>
                        <td><?= $pencairan['kategori_donasi']; ?></td>
                        <td><?= "Rp. " . number_format($pencairan['dana_cair'], 2, ',', '.'); ?></td>
                        <td><?= date('d F Y', strtotime($pencairan['tanggal_pencairan'])); ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>