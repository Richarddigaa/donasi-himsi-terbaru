<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <!-- Month and Year Filter Form -->
                <form method="GET" class="mb-4">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label for="month" class="mr-2">Pilih Bulan:</label>
                            <select name="month" id="month" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="01" <?= isset($_GET['month']) && $_GET['month'] == '01' ? 'selected' : ''; ?>>Januari</option>
                                <option value="02" <?= isset($_GET['month']) && $_GET['month'] == '02' ? 'selected' : ''; ?>>Februari</option>
                                <option value="03" <?= isset($_GET['month']) && $_GET['month'] == '03' ? 'selected' : ''; ?>>Maret</option>
                                <option value="04" <?= isset($_GET['month']) && $_GET['month'] == '04' ? 'selected' : ''; ?>>April</option>
                                <option value="05" <?= isset($_GET['month']) && $_GET['month'] == '05' ? 'selected' : ''; ?>>Mei</option>
                                <option value="06" <?= isset($_GET['month']) && $_GET['month'] == '06' ? 'selected' : ''; ?>>Juni</option>
                                <option value="07" <?= isset($_GET['month']) && $_GET['month'] == '07' ? 'selected' : ''; ?>>Juli</option>
                                <option value="08" <?= isset($_GET['month']) && $_GET['month'] == '08' ? 'selected' : ''; ?>>Agustus</option>
                                <option value="09" <?= isset($_GET['month']) && $_GET['month'] == '09' ? 'selected' : ''; ?>>September</option>
                                <option value="10" <?= isset($_GET['month']) && $_GET['month'] == '10' ? 'selected' : ''; ?>>Oktober</option>
                                <option value="11" <?= isset($_GET['month']) && $_GET['month'] == '11' ? 'selected' : ''; ?>>November</option>
                                <option value="12" <?= isset($_GET['month']) && $_GET['month'] == '12' ? 'selected' : ''; ?>>Desember</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="year" class="mr-2">Pilih Tahun:</label>
                            <select name="year" id="year" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                <?php
                                // Menampilkan opsi tahun dinamis (misalnya, 2023 - 2030)
                                for ($year = 2023; $year <= 2030; $year++) {
                                    echo "<option value=\"$year\" " . (isset($_GET['year']) && $_GET['year'] == $year ? 'selected' : '') . ">$year</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-auto mt-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

                <?php
                // Pagination setup
                $limit = 5; // Number of records per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
                $offset = ($page - 1) * $limit; // Offset for the query

                // Get selected month and year from GET parameters
                $selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';
                $selectedYear = isset($_GET['year']) ? $_GET['year'] : '';

                // Build the query based on selected month and year
                $queryPencairan = "SELECT * FROM pencairan";
                $whereClauses = [];
                if ($selectedMonth != '') {
                    $whereClauses[] = "MONTH(tanggal_pencairan) = '$selectedMonth'";
                }
                if ($selectedYear != '') {
                    $whereClauses[] = "YEAR(tanggal_pencairan) = '$selectedYear'";
                }

                if (count($whereClauses) > 0) {
                    $queryPencairan .= " WHERE " . implode(' AND ', $whereClauses);
                }

                $queryPencairan .= " LIMIT $limit OFFSET $offset";

                // Fetch data for the current page
                $pencairan = $this->db->query($queryPencairan)->result_array();

                // Count the total number of records to calculate the number of pages
                $countQuery = "SELECT COUNT(*) as total FROM pencairan";
                if (count($whereClauses) > 0) {
                    $countQuery .= " WHERE " . implode(' AND ', $whereClauses);
                }
                $countData = $this->db->query($countQuery)->row()->total;
                $totalPages = ceil($countData / $limit); // Total number of pages
                ?>

                <!-- Print and PDF download buttons -->
                <a href="<?= base_url('admin/print_laporan_pencairan') . '?month=' . urlencode($selectedMonth) . '&year=' . urlencode($selectedYear); ?>" class="btn btn-primary mb-3">
                    <i class="fas fa-print"></i> Print
                </a>
                <a href="<?= base_url('admin/pdf_laporan_pencairan') . '?month=' . urlencode($selectedMonth) . '&year=' . urlencode($selectedYear); ?>" class="btn btn-warning mb-3">
                    <i class="far fa-file-pdf"></i> Download PDF
                </a>

                <!-- Table for displaying data -->
                <div class="widget">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Dana Yang Dicairkan</th>
                                    <th scope="col">Rekening</th>
                                    <th scope="col">No Rekening</th>
                                    <th scope="col">Nama Penerima</th>
                                    <th scope="col">Detail Pencairan</th>
                                    <th scope="col">Tanggal Pencairan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($countData < 1) { ?>
                                    <tr>
                                        <td colspan="9">
                                            <h4 class="text-center my-5">No records found</h4>
                                        </td>
                                    </tr>
                                <?php } else { ?>
                                    <?php $i = $offset + 1; ?> <!-- Start row number from the offset -->
                                    <?php foreach ($pencairan as $p) : ?>
                                        <tr>
                                            <td scope="row"><?php echo $i . '.'; ?></td>
                                            <td><span><?php echo $p['nama_donasi']; ?></span></td>
                                            <td><span><?php echo $p['kategori_donasi']; ?></span></td>
                                            <td><?php echo "Rp. " . number_format($p['dana_cair'], 2, ',', '.'); ?></td>
                                            <td><?php echo $p['bank_tujuan']; ?></td>
                                            <td><?php echo $p['no_rekening_tujuan']; ?></td>
                                            <td><?php echo $p['nama_penerima_tujuan']; ?></td>
                                            <td><?php echo $p['detail_pencairan']; ?></td>
                                            <td><?php echo date('d F Y', strtotime($p['tanggal_pencairan'])); ?></td>
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
                            <li class="page-item"><a class="page-link" href="?page=1&month=<?= $selectedMonth; ?>&year=<?= $selectedYear; ?>">First</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1; ?>&month=<?= $selectedMonth; ?>&year=<?= $selectedYear; ?>">Previous</a></li>
                        <?php } ?>

                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?= $i; ?>&month=<?= $selectedMonth; ?>&year=<?= $selectedYear; ?>"><?= $i; ?></a>
                            </li>
                        <?php } ?>

                        <!-- Next Page Link -->
                        <?php if ($page < $totalPages) { ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1; ?>&month=<?= $selectedMonth; ?>&year=<?= $selectedYear; ?>">Next</a></li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $totalPages; ?>&month=<?= $selectedMonth; ?>&year=<?= $selectedYear; ?>">Last</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</div>