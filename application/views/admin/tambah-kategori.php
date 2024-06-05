<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php
    // id pembayaran auto
    foreach ($idK as $k) {
        $IDMax = $k['maxID'];

        $ket = "KT";
        $tahun = date('Y');

        if ($IDMax++) {
            $ID = sprintf("%03s", $IDMax);
        } else {
            $ID = $ket . $tahun . sprintf("%03s", $IDMax);
        }
    ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tambah Kategori</h4>
                    <form action="<?= base_url('admin/tambah_kategori/') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_kategori" value="<?= $ID ?>">
                        <div class="form-group">
                            <label for="kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                            <input type="text" class="form-control form-control-user" id="kategori" name="kategori" placeholder="Masukkan Nama Kategori">
                            <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                            <button class="btn btn-light" onclick="goBack()">Batal</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->