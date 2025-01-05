<div class="col-11 grid-margin stretch-card py-5 mt-5" style="margin-left: auto; margin-right: auto">
    <div class="card">
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan'); ?>
            <?php
            $queryTransaksi = "SELECT * FROM transaksi 
                                INNER JOIN donasi ON transaksi.id_donasi = donasi.id_donasi
                                INNER JOIN pembayaran ON transaksi.id_pembayaran = pembayaran.id_pembayaran
                                WHERE transaksi.id_donatur = '$user[id_donatur]' AND transaksi.bukti = ''";
            $transaksi = $this->db->query($queryTransaksi)->result_array();

            $countData = $this->db->query($queryTransaksi)->num_rows();
            ?>

            <div class="widget">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">IDTRANSAKSI</th>
                                <th scope="col">Judul Donasi</th>
                                <th scope="col">Metode Pembayaran</th>
                                <th scope="col">Dana Didonasikan</th>
                                <th scope="col">Tanggal Donasi</th>
                                <th scope="col">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($countData < 1) { ?>
                                <tr>
                                    <td colspan="7">
                                        <h4 class="text-center my-5">Tidak ada transaksi</h4>
                                    </td>
                                </tr>
                                <?php } else {
                                $i = 1;
                                foreach ($transaksi as $t) :
                                ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $t['id_transaksi']; ?></span></td>
                                        <td><span><?php echo $t['judul']; ?></span></td>
                                        <td><span><?php echo $t['nama_bank']; ?></span></td>
                                        <td><?php echo "Rp. " . number_format($t['dana_didonasikan']); ?></td>
                                        <td><span><?= date('d F Y', strtotime($t['tanggal_donasi'])); ?></span></td>
                                        <td><a class="btn btn-danger" href="<?= base_url('user/bayar/') . $t['id_transaksi']; ?>"><i class="fas fa-wallet"></i> Bayar</a></td>
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