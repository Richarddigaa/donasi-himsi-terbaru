<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('kategori', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <a href="<?php echo base_url(); ?>admin/tambah_kategori/" class="btn btn-primary mb-3">
                    <i class="fas fa-fw fa-plus mr-2"></i>Tambah Kategori
                </a>

                <?php
                // Pagination setup
                $limit = 5; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Get the records for the current page
                $queryKategori = "SELECT * FROM kategori ORDER BY id_kategori desc LIMIT $limit OFFSET $offset";
                $kategori = $this->db->query($queryKategori)->result_array();

                // Count the total number of records to calculate the number of pages
                $totalRecords = $this->db->query("SELECT COUNT(*) as total FROM kategori")->row()->total;
                $totalPages = ceil($totalRecords / $limit);
                ?>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $offset + 1; ?>
                                <?php foreach ($kategori as $k) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $k['kategori']; ?></span></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>admin/edit_kategori/<?php echo $k['id_kategori']; ?>" class="btn btn-primary mr-2"><i class="far fa-fw fa-edit mr-2"></i>Edit</a>
                                            <a href="<?php echo base_url(); ?>admin/hapus_kategori/<?php echo $k['id_kategori']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash mr-2"></i>Hapus</a>
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