<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('admin/ubahProfile'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10"> <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly> </div>
            </div>
            <div class="form-group row"> <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10"> <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>"> <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?> </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row"> <label for="password" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"> <a href="<?= base_url('admin/ubah_password/') . $user['id_donatur']; ?>">Ubah password</a> </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <!-- Balik ke halaman sebelumnya -->
                    <a href="<?= base_url('admin/profile/') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->