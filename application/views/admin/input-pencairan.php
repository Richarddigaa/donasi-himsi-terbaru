<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?php
    foreach ($donasi as $d) {
        $queryDonasi = "SELECT * FROM donasi JOIN kategori ON donasi.id_kategori = kategori.id_kategori WHERE donasi.id = '$d[id]'";
        $donasi = $this->db->query($queryDonasi)->result_array();
    }
    ?>

    <?php
    foreach ($idPe as $pe) {
        $IDMax = $pe['maxID'];

        $ket = "LP";
        $tahun = date('Y');

        if ($IDMax++) {
            $ID = sprintf("%03s", $IDMax);
        } else {
            $ID = $ket . $tahun . sprintf("%03s", $IDMax);
        }

        foreach ($donasi as $d) {

    ?>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Input Pencairan Dana</h4>
                        <form action="<?= base_url('admin/inputPencairan/' . $data->id) ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_laporan" value="<?= $ID ?>">
                            <input type="hidden" name="id_donasi" value="<?= $d['id'] ?>">
                            <div class="form-group">
                                <label for="nama_donasi" class="col-sm-2 col-form-label">Nama Donasi</label>
                                <input type="text" class="form-control form-control-user" id="nama_donasi" name="nama_donasi" value="<?= $d['judul'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kategori_donasi" class="col-sm-2 col-form-label">Kategori</label>
                                <input type="text" class="form-control form-control-user" id="kategori_donasi" name="kategori_donasi" value="<?= $d['kategori'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="dana_cair" class="col-sm-2 col-form-label">Dana Yang Dicairkan</label>
                                <input type="number" class="form-control form-control-user" id="dana_cair" name="dana_cair" value="<?= $d['dana_terkumpul'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_rekening" class="col-sm-2 col-form-label">Pilih Rekening</label>
                                <select name="nama_rekening" class="form-control form-control-user">
                                    <option value="BANK BCA">BANK BCA</option>
                                    <option value="BANK Mandiri">BANK MANDIRI</option>
                                    <option value="BANK BRI">BANK BRI</option>
                                    <option value="BANK BNI">BANK BNI</option>

                                </select>
                                <small class="text-danger"><?php echo form_error('nama_rekening'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="nomor_rekening" class="col-sm-2 col-form-label">No Rekening</label>
                                <input type="number" class="form-control form-control-user" id="nomor_rekening" name="nomor_rekening">
                                <small class="text-danger"><?php echo form_error('nomor_rekening'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                                <input type="text" class="form-control form-control-user" id="nama_penerima" name="nama_penerima">
                                <small class="text-danger"><?php echo form_error('nama_penerima'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="detail_pencairan" class="col-sm-2 col-form-label">Detail Donasi</label>
                                <textarea name="detail_pencairan" id="detail_pencairan" cols="30" rows="10" class="form-control form-control-user"></textarea>
                                <small class="text-danger"><?php echo form_error('detail_pencairan'); ?></small>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light" onclick="goBack()">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->