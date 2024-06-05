<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php
    // id pembayaran auto
    foreach ($idD as $d) {
        $IDMax = $d['maxID'];

        $ket = "DN";
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
                    <h4 class="card-title mb-4">Tambah Donasi</h4>
                    <form action="<?= base_url('admin/tambah_donasi/') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_donasi" value="<?= $ID ?>">
                        <div class="form-group">
                            <label for="donasi" class="col-sm-2 col-form-label">Judul Donasi</label>
                            <input type="text" class="form-control form-control-user" id="donasi" name="donasi" placeholder="Masukkan Judul Donasi">
                            <small class="text-danger"><?php echo form_error('donasi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <select name="kategori" class="form-control form-control-user">
                                <option value="">Pilih Kategori</option>
                                <?php
                                foreach ($kategori as $k) { ?>
                                    <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option> <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dana_dibutuhkan" class="col-sm-2 col-form-label">Dana Yang Dibutuhkan</label>
                            <input type="number" class="form-control form-control-user" id="dana_dibutuhkan" name="dana_dibutuhkan" placeholder="Masukkan Dana Yang Dibutuhkan">
                            <small class="text-danger"><?php echo form_error('dana_dibutuhkan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="detail" class="col-sm-2 col-form-label">Detail</label>
                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control form-control-user" placeholder="Masukkan Detail Donasi"></textarea>
                            <small class="text-danger"><?php echo form_error('detail'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                            <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
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