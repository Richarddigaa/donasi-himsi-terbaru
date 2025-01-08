<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php
    // id pembayaran auto
    foreach ($idU as $u) {
        $IDMax = $u['maxID'];

        $ket = "US";
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
                    <h4 class="card-title mb-4">Tambah Donatur</h4>
                    <form action="<?= base_url('admin/tambah_donatur/') ?>" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="id_donatur" value="<?= $ID ?>">
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                            <small class=" text-danger"><?php echo form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Email">
                            <small class="text-danger"><?php echo form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                            <small class="text-danger"><?php echo form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <input type="text" class="form-control form-control-user" id="role" name="role" value="Donatur" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                            <input type="text" class="form-control form-control-user" id="gambar" name="gambar" value="logo-donasi.png" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_input" class="col-sm-2 col-form-label">Tanggal Input</label>
                            <input type="text" class="form-control form-control-user" id="tanggal_input" name="tanggal_input" value="<?= date("d-m-Y");  ?>" readonly>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                            <!-- Tombol ke Halaman sebelumnya -->
                            <a href="<?= base_url('admin/donatur/') ?>" class="btn btn-secondary">Batal</a>
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