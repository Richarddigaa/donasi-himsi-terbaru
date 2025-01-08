<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php
    // id pembayaran auto
    foreach ($idP as $p) {
        $IDMax = $p['maxID'];

        $ket = "P";
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
                    <h4 class="card-title mb-4">Tambah Pembayaran</h4>
                    <form action="<?= base_url('admin/tambah_pembayaran/') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_pembayaran" value="<?= $ID ?>">
                        <div class="form-group">
                            <label for="nama_bank" class="col-sm-2 col-form-label">Nama Bank</label>
                            <input type="text" class="form-control form-control-user" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank">
                            <small class="text-danger"><?php echo form_error('nama_bank'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="rekening" class="col-sm-2 col-form-label">No Rekening</label>
                            <input type="number" class="form-control form-control-user" id="rekening" name="rekening" placeholder="Masukkan Rekening">
                            <small class="text-danger"><?php echo form_error('rekening'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="pemilik_rekening" class="col-sm-2 col-form-label">Pemilik Rekening</label>
                            <input type="text" class="form-control form-control-user" id="pemilik_rekening" name="pemilik_rekening" placeholder="Masukkan Nama Pemilik Rekening">
                            <small class="text-danger"><?php echo form_error('pemilik_rekening'); ?></small>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                            <!-- Balik ke halaman sebelumnya -->
                            <a href="<?= base_url('admin/pembayaran/') ?>" class="btn btn-secondary">Batal</a>
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