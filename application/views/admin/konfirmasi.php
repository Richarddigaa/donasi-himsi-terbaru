<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php echo $this->session->flashdata('pesan'); ?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php
                $queryBerdonasi = "SELECT * FROM transaksi 
                                        INNER JOIN donasi ON transaksi.id_donasi = donasi.id_donasi
                                        INNER JOIN pembayaran ON transaksi.id_pembayaran = pembayaran.id_pembayaran
                                        INNER JOIN donatur ON transaksi.id_donatur = donatur.id_donatur
                                        WHERE status_transaksi = 'Menunggu Konfirmasi' AND bukti != ''
                                        ORDER BY id_transaksi";
                $berdonasi = $this->db->query($queryBerdonasi)->result_array();

                $countData = $this->db->query($queryBerdonasi)->num_rows();
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
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($countData < 1) { ?>
                                    <tr>
                                        <td colspan="9">
                                            <h4 class="text-center my-5">Tidak ada konfirmasi</h4>
                                        </td>
                                    </tr>
                                    <?php } else {
                                    $i = 1;
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
                                            <td><span><?= date('d F Y', strtotime($b['tanggal_donasi'])); ?></span></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/konfirmasi/<?php echo $b['id_transaksi']; ?>" class="btn btn-success"><i class="fas fa-check"></i></a>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>admin/tolakKonfirmasi/<?php echo $b['id_transaksi']; ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
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