<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('uploadBukti', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <?php
                // Pagination setup
                $limit = 5; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
                $offset = ($page - 1) * $limit; // Offset for the query

                // Query to fetch data for the current page
                $queryUpload = "SELECT * FROM pencairan WHERE bukti_pencairan = '' LIMIT $limit OFFSET $offset";
                $upload = $this->db->query($queryUpload)->result_array();

                // Count the total number of records to calculate the number of pages
                $countData = $this->db->query("SELECT COUNT(*) as total FROM pencairan WHERE bukti_pencairan = ''")->row()->total;
                $totalPages = ceil($countData / $limit); // Total number of pages
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
                                    <th scope="col">Tanggal Pencairan</th>
                                    <th scope="col">Opsi</th>
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
                                    <?php $i = $offset + 1; ?> <!-- Start row number from the offset -->
                                    <?php foreach ($upload as $u) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $i . '.'; ?></td>
                                            <td><span><?php echo $u['nama_donasi']; ?></span></td>
                                            <td><span><?php echo $u['kategori_donasi']; ?></span></td>
                                            <td><span><?php echo "Rp. " . number_format($u['dana_cair']); ?></span></td>
                                            <td><span><?php echo date('d F Y', strtotime($u['tanggal_pencairan'])); ?></span></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/uploadBukti_Donasi/') . $u['id_pencairan']; ?>" class="btn btn-primary mr-2 mb-2"> <i class="fas fa-camera"></i> Upload Bukti</a>
                                            </td>
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
                        <!-- First Page Link -->
                        <?php if ($page > 1) { ?>
                            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1; ?>">Previous</a></li>
                        <?php } ?>

                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php } ?>

                        <!-- Next Page Link -->
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

</div>
<!-- End of Main Content -->