<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('pencairanDana', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <?php
                // Pagination setup
                $limit = 5; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
                $offset = ($page - 1) * $limit; // Offset for the query

                // Fetch the records for the current page
                $queryDonasi = "SELECT * FROM donasi JOIN kategori ON donasi.id_kategori = kategori.id_kategori 
                                WHERE status_donasi = 'Belum dicairkan' AND dana_terkumpul >= 100000
                                ORDER BY id_donasi DESC LIMIT $limit OFFSET $offset";
                $donasi = $this->db->query($queryDonasi)->result_array();

                // Count the total number of records to calculate the number of pages
                $totalRecords = $this->db->query("SELECT COUNT(*) as total FROM donasi 
                                                  WHERE status_donasi = 'Belum dicairkan' AND dana_terkumpul >= 100000")->row()->total;
                $totalPages = ceil($totalRecords / $limit); // Total number of pages
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
                                <?php $i = $offset + 1; ?> <!-- Start row number from the offset -->
                                <?php foreach ($donasi as $d) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $d['judul']; ?></span></td>
                                        <td><span><?php echo $d['kategori']; ?></span></td>
                                        <td><?php echo "Rp. " . number_format($d['dana_terkumpul'], 2, ',', '.'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/inputPencairan/') . $d['id_donasi']; ?>" class="btn btn-primary mr-2 mb-2"><i class="far fa-fw fa-edit mr-2"></i>Cairkan</a>
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

</div>
<!-- End of Main Content -->