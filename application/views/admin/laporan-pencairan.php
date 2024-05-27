<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php
                $queryPencairan = "SELECT * FROM laporan_pencairan";
                $pencairan = $this->db->query($queryPencairan)->result_array();
                ?>
                <a href="<?= base_url('admin/print_laporan_pencairan'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
                <a href="<?= base_url('admin/pdf_laporan_pencairan'); ?>" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                                    <th scope="col">Tanggal Pencairan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pencairan as $p) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $p['nama_donasi']; ?></span></td>
                                        <td><span><?php echo $p['kategori_donasi']; ?></span></td>
                                        <td><?php echo "Rp. " . number_format($p['dana_cair'], 2, ',', '.'); ?></td>
                                        <td><?php echo $p['nama_rekening']; ?></td>
                                        <td><?php echo $p['nomor_rekening']; ?></td>
                                        <td><?php echo $p['nama_penerima']; ?></td>
                                        <td><?php echo $p['detail_pencairan']; ?></td>
                                        <td><?php echo date('d F Y', $p['tanggal_pencairan']); ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->