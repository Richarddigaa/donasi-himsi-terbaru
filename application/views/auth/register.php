<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <img src="<?= base_url('assets/img/'); ?>logo-donasi.png" width="380" height="480">
                </div>
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
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/register'); ?>">
                                <input type="hidden" name="id_user" value="<?= $ID ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="tanggal" name="tanggal" value="<?= date("Y-m-d");  ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <?php foreach ($role as $r) { ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="role" name="role" value="<?= $r['role'] ?>" readonly>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Kamu sudah punya akun? Login!</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

</div>