<div class="col-11 grid-margin stretch-card py-5 mt-5" style="margin-left: 50px;">
    <div class="card">
        <div class="card-body">

            <?php
            $queryBerdonasi = "SELECT * FROM user_berdonasi 
                                INNER JOIN donasi ON user_berdonasi.id_donasi = donasi.id
                                INNER JOIN pembayaran ON user_berdonasi.id_pembayaran = pembayaran.id_pembayaran
                                WHERE user_berdonasi.id_user = '$user[id_user]'";
            $berdonasi = $this->db->query($queryBerdonasi)->result_array();

            $countData = $this->db->query($queryBerdonasi)->num_rows();
            ?>

            <div class="widget">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Judul Donasi</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Dana Yang Didonasikan</th>
                                <th scope="col">Tanggal Donasi</th>
                                <th scope="col">Konfirmasi</th>
                                <th scope="col">Rincian dana donasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($countData < 1) { ?>
                                <tr>
                                    <td colspan="5">
                                        <h4 class="text-center my-5">Tidak ada riwayat donasi</h4>
                                    </td>
                                </tr>
                                <?php } else {
                                $i = 1;
                                foreach ($berdonasi as $b) :
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $b['judul']; ?></span></td>
                                        <td><span><?php echo $b['nama_pembayaran']; ?></span></td>
                                        <td><?php echo "Rp. " . number_format($b['dana_didonasikan']); ?></td>
                                        <td><span><?= date('d F Y', $b['tanggal_donasi']); ?></span></td>
                                        <?php if ($b['status_berdonasi'] == 'Menunggu Konfirmasi') { ?>
                                            <td>PEND</td>
                                        <?php } else { ?>
                                            <td><a class="btn btn-success" href="<?= base_url('user/struk/') . $b['id_berdonasi']; ?>"><i class="fas fa-file"></i></a></td>
                                        <?php } ?>
                                        <?php if ($b['status_donasi'] == 'Sudah dicairkan') { ?>
                                            <td><a class="btn btn-success" href="<?= base_url('user/lapor_donasi/') . $b['id']; ?>"><i class="fas fa-eye"></i> Cek Disini</a></td>
                                        <?php } else { ?>
                                            <td>Belum Ada</td>
                                        <?php } ?>
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