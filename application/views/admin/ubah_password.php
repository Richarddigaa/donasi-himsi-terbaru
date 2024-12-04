<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <!-- Form untuk mengubah password -->
            <?= form_open_multipart('admin/new_password'); ?><!-- Menggunakan form_open() agar CSRF protection otomatis ditambahkan -->
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password baru">
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                    <a href="<?php echo base_url('admin/ubahProfile/') . $user['id_donatur']; ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->