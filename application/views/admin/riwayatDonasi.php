<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php echo $this->session->flashdata('pesan'); ?>

                <?php
                // Pagination setup
                $limit = 5; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                $queryBerdonasi = "SELECT * FROM transaksi 
                                    INNER JOIN donasi ON transaksi.id_donasi = donasi.id_donasi
                                    INNER JOIN pembayaran ON transaksi.id_pembayaran = pembayaran.id_pembayaran
                                    INNER JOIN donatur ON transaksi.id_donatur = donatur.id_donatur
                                    WHERE status_transaksi = 'Sudah dikonfirmasi'
                                    ORDER BY id_transaksi DESC
                                    LIMIT $limit OFFSET $offset";

                $berdonasi = $this->db->query($queryBerdonasi)->result_array();
                $countData = $this->db->query("SELECT COUNT(*) as total FROM transaksi 
                                                WHERE status_transaksi = 'Sudah dikonfirmasi'")->row()->total;
                $totalPages = ceil($countData / $limit);
                ?>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email Donatur</th>
                                    <th scope="col">Nama Donatur</th>
                                    <th scope="col">Judul Donasi</th>
                                    <th scope="col">Metode Pembayaran</th>
                                    <th scope="col">Dana Yang Didonasikan</th>
                                    <th scope="col">Bukti Transfer</th>
                                    <th scope="col">Tanggal Donasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($countData < 1) { ?>
                                    <tr>
                                        <td colspan="8">
                                            <h4 class="text-center my-5">Tidak ada riwayat donasi</h4>
                                        </td>
                                    </tr>
                                    <?php } else {
                                    $i = $offset + 1; // Start counting from the correct record
                                    foreach ($berdonasi as $b) :
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $i . '.'; ?></td>
                                            <td><span><?php echo $b['email']; ?></span></td>
                                            <td><span><?php echo $b['nama']; ?></span></td>
                                            <td><span><?php echo $b['judul']; ?></span></td>
                                            <td><span><?php echo $b['nama_bank']; ?></span></td>
                                            <td><?php echo "Rp. " . number_format($b['dana_didonasikan']); ?></td>
                                            <td>
                                                <center><img style="width: 200px" src="<?php echo base_url('assets/img/bukti-transfer/' . $b['bukti']); ?>" alt=""><br><br>
                                                    <a class="btn btn-primary mr-2" target="_blank" href="<?php echo base_url('assets/img/bukti-transfer/' . $b['bukti']); ?>">Lihat</a>
                                                </center>
                                            </td>
                                            <td><span><?= date('d F Y', $b['tanggal_donasi']); ?></span></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1) { ?>
                            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a></li>
                        <?php } ?>

                        <!-- Display page numbers -->
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php } ?>

                        <?php if ($page < $totalPages) { ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1; ?>">Next</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $totalPages; ?>">Last</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->