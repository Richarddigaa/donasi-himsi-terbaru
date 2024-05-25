<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>

    <h3>
        <center>Laporan Data Pencairan Donasi</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Kategori</th>
                <th scope="col">Dana Yang Dicairkan</th>
                <th scope="col">Rekening</th>
                <th scope="col">No Rekening</th>
                <th scope="col">Nama Penerima</th>
                <th scope="col">Detail Pencairan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($laporan_pencairan as $p) {
            ?>
                <tr>
                    <td scope="row"><?php echo $no++ . '.'; ?></td>
                    <td><span><?php echo $p['nama_donasi']; ?></span></td>
                    <td><span><?php echo $p['kategori_donasi']; ?></span></td>
                    <td><?php echo "Rp. " . number_format($p['dana_cair'], 2, ',', '.'); ?></td>
                    <td><?php echo $p['nama_rekening']; ?></td>
                    <td><?php echo $p['nomor_rekening']; ?></td>
                    <td><?php echo $p['nama_penerima']; ?></td>
                    <td><?php echo $p['detail_pencairan']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>