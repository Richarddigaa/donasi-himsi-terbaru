<div class="container-fluid" style="margin-top: 80px;">
    <div class="row">
        <div class="col-lg-9">
            <?php
            foreach ($idB as $b) {
                $IDMax = $b['maxID'];

                $ket = "SB";
                $tahun = date('Y');

                if ($IDMax++) {
                    $ID = sprintf("%03s", $IDMax);
                } else {
                    $ID = $ket . $tahun . sprintf("%03s", $IDMax);
                }

                foreach ($donasi as $d) {
            ?>
                    <form action="<?= base_url('user/berdonasi/') . $d['id_donasi'] ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_berdonasi" value="<?= $ID ?>">
                        <input type="hidden" name="id_donasi" value="<?= $d['id_donasi'] ?>">
                        <input type="hidden" name="id_user" value="<?= $user['id_donatur'] ?>">
                        <div class="form-group row m-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label for="judul_donasi" class="col-sm-2 col-form-label">Judul Donasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" id="judul_donasi" name="judul_donasi" value="<?= $d['judul']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label for="dana" class="col-sm-2 col-form-label">Dana Didonasikan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-user" onkeyup="formatInputRupiah(this)" id="dana" name="dana" placeholder=" Masukan Nominal">
                                <small class="text-danger"><?php echo form_error('dana'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <label for="pembayaran" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                            <div class="col-sm-10">
                                <select name="pembayaran" class="form-control form-control-user">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <?php
                                    foreach ($pembayaran as $p) { ?>
                                        <option value="<?= $p['id_pembayaran']; ?>"><?= $p['nama_bank'] ?></option>
                                    <?php } ?>
                                </select>
                                <small class="text-danger"><?php echo form_error('pembayaran'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row m-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="anonim" value="1" id="anonim">
                                    <label class="form-check-label" for="anonim">
                                        Sembunyikan nama saya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end m-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <button class="btn btn-dark" onclick="window.history.go(-1)">Batal</button>
                            </div>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>