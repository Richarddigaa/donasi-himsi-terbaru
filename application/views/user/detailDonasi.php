<div class="container-fluid py-5 mt-5">
    <div class="container">
        <div class="row">
            <?php foreach ($donasi as $d) { ?>
                <div class="col-lg-5 md-5">
                    <img src="<?= base_url('assets/img/upload/') . $d['gambar']; ?>" class="w-100" alt="...">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $d['judul']; ?></h1>
                    <p class="fs-5 lh-sm" style="text-align: justify;">
                        <?php echo $d['detail']; ?>
                    </p>
                    <p class="fs-3 text-primary" style="font-weight: bold;">
                        <?= "Dana terkumpul Rp. " . number_format($d['dana_terkumpul']);  ?>
                    </p>
                    <p class="fs-5 text-secondary" style="margin-top: -4%;">
                        <?= "Dari dana yang dibutuhkan Rp. " . number_format($d['dana_dibutuhkan']);  ?>
                    </p>
                    <div class="progress mb-4">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $d['dana_terkumpul'] / $d['dana_dibutuhkan'] * 100; ?>%"></div>
                    </div>
                    <!-- jika dana terkumpul sudah seusai target atau lebih maka user tidak bisa donasi lagi -->
                    <?php if ($d['dana_terkumpul'] >= $d['dana_dibutuhkan']) { ?>
                        <a class="btn btn-outline-dark mt-auto">Donasi telah mencapai target</a>
                        <!-- jika dana telah dicairkan -->
                    <?php } elseif ($d['status_donasi'] == 'Sudah dicairkan') { ?>
                        <a class="btn btn-outline-dark mt-auto">Donasi telah dicairkan</a>
                        <!-- jika dana belum mencapai targer maka user bida berdonasi -->
                    <?php } else { ?>
                        <a class="btn btn-outline-dark mt-auto" href="<?= base_url('user/berdonasi/') . $d['id_donasi']; ?>">Donasi Sekarang</a>
                    <?php } ?>
                    <!-- jika dana sudah dicairkan maka -->
                    <?php if ($d['status_donasi'] == 'Sudah dicairkan') { ?>
                        <hr>
                        <h4 class="mb-3">Informasi penggalangan dana</h4>
                        <a class="btn btn-outline-primary mt-auto" href="<?= base_url('user/lapor_donasi/') . $d['id_donasi']; ?>"><i class="fas fa-file-invoice-dollar"></i> Rincian penggunaan dana</a>
                    <?php } ?>

                    <?php
                    $queryBerdonasi = "SELECT * FROM transaksi 
                                    INNER JOIN donasi ON transaksi.id_donasi = donasi.id_donasi
                                    INNER JOIN donatur ON transaksi.id_donatur = donatur.id_donatur
                                    WHERE transaksi.id_donasi = '$d[id_donasi]'
                                    AND status_transaksi = 'Sudah dikonfirmasi'
                                    ORDER BY transaksi.id_transaksi DESC
                                    LIMIT 5";
                    $berdonasi = $this->db->query($queryBerdonasi)->result_array();

                    $countData = $this->db->query($queryBerdonasi)->num_rows();
                    ?>

                    <hr class="mt-5">
                    <h5 class="mb-3">Donatur Terbaru</h5>
                    <div class="list-group mb-5">
                        <?php if ($countData > 0) { ?>
                            <?php foreach ($berdonasi as $b) { ?>
                                <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded bg-light">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/img/profile/') . $b['gambar']; ?>"
                                            alt="profile"
                                            class="rounded-circle me-2"
                                            style="width: 40px; height: 40px; object-fit: cover;">
                                        <strong>
                                            <?= ($b['anonim'] == 1) ? 'Orang Baik' : htmlspecialchars($b['nama']); ?>
                                        </strong>
                                    </div>
                                    <span class="fw-semibold">Rp<?= number_format($b['dana_didonasikan'], 0, ',', '.'); ?></span>
                                </div>

                            <?php } ?>
                        <?php } else { ?>
                            <div class="text-muted">Belum ada donatur</div>
                        <?php } ?>

                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
</div>