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
                    <?php echo $this->session->flashdata('pesan'); ?>
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
                            <small class="text-danger"><?php echo form_error('kategori'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="dana_dibutuhkan" class="col-sm-2 col-form-label">Dana Dibutuhkan</label>
                            <input type="text" class="form-control form-control-user" onkeyup="formatInputRupiah(this)" id="dana_dibutuhkan" name="dana_dibutuhkan" placeholder="Masukkan Dana Yang Dibutuhkan">
                            <small class="text-danger"><?php echo form_error('dana_dibutuhkan'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="dana_terkumpul" class="col-sm-2 col-form-label">Dana Terkumpul</label>
                            <input type="text" class="form-control form-control-user" onkeyup="formatInputRupiah(this)" id="dana_terkumpul" name="dana_terkumpul" placeholder="Masukkan Dana Yang Tekumpul">
                            <small class="text-danger"><?php echo form_error('dana_terkumpul'); ?></small>
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
                        <div class="form-group">
                            <label for="status_donasi" class="col-sm-2 col-form-label">Status Donasi</label>
                            <input type="text" class="form-control form-control-user" id="status_donasi" name="status_donasi" value="Belum dicairkan" readonly>
                            <small class="text-danger"><?php echo form_error('status_donasi'); ?></small>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                            <!-- Tombol ke Halaman Sebelumnya-->
                            <a href="<?= base_url('admin/donasi/') ?>" class="btn btn-secondary">Batal</a>
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