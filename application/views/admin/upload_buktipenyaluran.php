<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('uploadBukti', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <?php
                $queryUpload = "SELECT * FROM laporan_pencairan
                                    WHERE bukti_pencairan = '' ";
                $upload = $this->db->query($queryUpload)->result_array();
                $countData = $this->db->query($queryUpload)->num_rows();
                ?>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dana Disalurkan</th>
                                    <th scope="col">Tanggal Disalurkan</th>
                                    <th scope="col">opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($countData < 1) { ?>
                                    <tr>
                                        <td colspan="6">
                                            <h4 class="text-center my-5">Tidak ada yang belum diupload gambar</h4>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php $i = 1; ?>
                                    <?php foreach ($upload as $u) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $i . '.'; ?></td>
                                            <td><span><?php echo $u['nama_donasi']; ?></span></td>
                                            <td><span><?php echo $u['kategori_donasi']; ?></span></td>
                                            <td><span><?php echo "Rp. " . number_format($u['dana_cair']); ?></span></td>
                                            <td><span><?php echo date('d F Y', $u['tanggal_pencairan']); ?></span></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/uploadBukti_Donasi/') . $u['id_laporan']; ?>" class="btn btn-primary mr-2 mb-2"> <i class="fas fa-camera"></i> Upload Bukti</a>
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