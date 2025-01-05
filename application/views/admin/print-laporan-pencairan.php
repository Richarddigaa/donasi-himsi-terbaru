<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Laporan Pencairan</title>

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

        .text-center {
            text-align: center;
        }

        .mt-5 {
            margin-top: 5rem;
        }

        .mb-5 {
            margin-bottom: 5rem;
        }

        .no-print {
            display: none;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center">Laporan Pencairan Donasi</h2>
        <p class="text-center">
            <?= $selectedMonth ? "Bulan: " . date("F Y", strtotime("2024-" . $selectedMonth . "-01")) : "Semua Pencairan"; ?>
        </p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Dana Yang Dicairkan</th>
                    <th>Rekening</th>
                    <th>No Rekening</th>
                    <th>Nama Penerima</th>
                    <th>Detail Pencairan</th>
                    <th>Tanggal Pencairan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pencairan) < 1) { ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data untuk bulan ini.</td>
                    </tr>
                <?php } else { ?>
                    <?php $i = 1; ?>
                    <?php foreach ($pencairan as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['nama_donasi']; ?></td>
                            <td><?= $p['kategori_donasi']; ?></td>
                            <td><?= "Rp. " . number_format($p['dana_cair'], 2, ',', '.'); ?></td>
                            <td><?= $p['bank_tujuan']; ?></td>
                            <td><?= $p['no_rekening_tujuan']; ?></td>
                            <td><?= $p['nama_penerima_tujuan']; ?></td>
                            <td><?= $p['detail_pencairan']; ?></td>
                            <td><?= date('d F Y', strtotime($p['tanggal_pencairan'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>

        <script type="text/javascript">
            window.print();
        </script>

</body>

</html>