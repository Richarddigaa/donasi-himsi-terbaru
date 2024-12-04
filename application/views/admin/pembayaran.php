<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('pembayaran', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <a href="<?php echo base_url(); ?>admin/tambah_Pembayaran/" class="btn btn-primary mb-3">
                    <i class="fas fa-fw fa-plus mr-2"></i>Tambah Metode Pembayaran
                </a>

                <?php
                // Pagination setup
                $limit = 5; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
                $offset = ($page - 1) * $limit; // Offset for the query

                // Fetch the records for the current page
                $queryPembayaran = "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC LIMIT $limit OFFSET $offset";
                $pembayaran = $this->db->query($queryPembayaran)->result_array();

                // Count the total number of records to calculate the number of pages
                $totalRecords = $this->db->query("SELECT COUNT(*) as total FROM pembayaran")->row()->total;
                $totalPages = ceil($totalRecords / $limit); // Total number of pages
                ?>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama bank</th>
                                    <th scope="col">No Rekening</th>
                                    <th scope="col">Pemilik Rekening</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $offset + 1; ?> <!-- Start row number from the offset -->
                                <?php foreach ($pembayaran as $p) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $p['nama_bank']; ?></span></td>
                                        <td><span><?php echo $p['rekening']; ?></span></td>
                                        <td><span><?php echo $p['pemilik_rekening']; ?></span></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>admin/edit_Pembayaran/<?php echo $p['id_pembayaran']; ?>" class="btn btn-primary mr-2"><i class="far fa-fw fa-edit mr-2"></i>Edit</a>
                                            <a href="<?php echo base_url(); ?>admin/hapus_Pembayaran/<?php echo $p['id_pembayaran']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash mr-2"></i>Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
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