<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <?php echo $this->session->flashdata('pesan'); ?>

                <?= form_error('donasi', '<div class="alert alert-danger alert-message" role="alert">', '</div>'); ?>

                <a href="<?php echo base_url(); ?>admin/tambah_donasi/" class="btn btn-primary mb-3">
                    <i class="fas fa-fw fa-plus mr-2"></i>Tambah Donasi
                </a>

                <?php
                // Pagination setup
                $limit = 5; // jumlah data yang ditampilkan
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // query untuk memanggil data donasi
                $queryDonasi = "SELECT * FROM donasi 
                                JOIN kategori ON donasi.id_kategori = kategori.id_kategori 
                                ORDER BY id_donasi desc 
                                LIMIT $limit OFFSET $offset";
                $donasi = $this->db->query($queryDonasi)->result_array();

                // hitung jumlah total data
                $totalRecords = $this->db->query("SELECT COUNT(*) as total FROM donasi")->row()->total;
                $totalPages = ceil($totalRecords / $limit);
                ?>

                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dana Yang Dibutuhkan</th>
                                    <th scope="col">Dana Yang Terkumpul</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $offset + 1; ?>
                                <?php foreach ($donasi as $d) : ?>
                                    <tr>
                                        <td scope="row"><?php echo $i . '.'; ?></td>
                                        <td><span><?php echo $d['judul']; ?></span></td>
                                        <td><span><?php echo $d['kategori']; ?></span></td>
                                        <td><?php echo "Rp. " . number_format($d['dana_dibutuhkan'], 2, ',', '.'); ?></td>
                                        <td><?php echo "Rp. " . number_format($d['dana_terkumpul'], 2, ',', '.'); ?></td>
                                        <td>
                                            <!-- jadi lebih sedikit detailnya -->
                                            <p class="fs-5 lh-sm" style="text-align: justify;">
                                                <span id="detail-short-<?= $d['id_donasi']; ?>">
                                                    <?= substr($d['detail'], 0, 200); ?>...
                                                </span>
                                                <span id="detail-full-<?= $d['id_donasi']; ?>" style="display: none;">
                                                    <?= $d['detail']; ?>
                                                </span>
                                                <a href="#" onclick="toggleDetail('<?= $d['id_donasi']; ?>'); return false;" id="btn-detail-<?= $d['id_donasi']; ?>">
                                                    Lihat selengkapnya
                                                </a>
                                            </p>
                                        </td>
                                        <td>
                                            <picture>
                                                <source srcset="" type="image/svg+xml">
                                                <img src="<?= base_url('assets/img/upload/') . $d['gambar']; ?>" class="img-fluid img-thumbnail" alt="...">
                                            </picture>
                                        </td>
                                        <td><?php echo $d['status_donasi']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/ubahDonasi/') . $d['id_donasi']; ?>" class="btn btn-primary mr-2 mb-2"><i class="far fa-fw fa-edit mr-2"></i>Edit</a>
                                            <a href="<?php echo base_url('admin/hapusDonasi/') . $d['id_donasi']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $d['judul']; ?> ?');" class="btn btn-danger"><i class="fas fa-fw fa-trash mr-2"></i>Hapus</a>
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

<script>
    function toggleDetail(id) {
        var shortText = document.getElementById('detail-short-' + id);
        var fullText = document.getElementById('detail-full-' + id);
        var btn = document.getElementById('btn-detail-' + id);

        if (fullText.style.display === 'none') {
            shortText.style.display = 'none';
            fullText.style.display = 'inline';
            btn.textContent = 'Sembunyikan';
        } else {
            shortText.style.display = 'inline';
            fullText.style.display = 'none';
            btn.textContent = 'Lihat selengkapnya';
        }
    }
</script>