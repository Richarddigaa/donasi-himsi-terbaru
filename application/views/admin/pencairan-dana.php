<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('pencairanDana', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <?php
                $queryDonasi = "SELECT * FROM donasi JOIN kategori ON donasi.id_kategori = kategori.id_kategori 
                                    WHERE status_donasi = 'Belum dicairkan' and dana_terkumpul >= 100000";
                $donasi = $this->db->query($queryDonasi)->result_array();
                ?>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dana Yang Terkumpul</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($donasi as $d) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $d['judul']; ?></span></td>
                                        <td><span><?php echo $d['kategori']; ?></span></td>
                                        <td><?php echo "Rp. " . number_format($d['dana_terkumpul'], 2, ',', '.'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/inputPencairan/') . $d['id']; ?>" class="btn btn-primary mr-2 mb-2"><i class="far fa-fw fa-edit mr-2"></i>Cairkan</a>
                                        </td>
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