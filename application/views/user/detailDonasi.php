<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <?php foreach ($donasi as $d) { ?>
                <div class="col-lg-5 md-5">
                    <img src="<?= base_url('assets/img/upload/') . $d['gambar']; ?>" class="w-100" alt="...">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $d['judul']; ?></h1>
                    <p class="fs-5">
                        <?php echo $d['detail']; ?>
                    </p>
                    <p class="fs-3 text-primary" style="font-weight: bold;">
                        <?= "Dana terkumpul Rp. " . number_format($d['dana_terkumpul']);  ?>
                    </p>
                    <p class="fs-5 text-secondary" style="margin-top: -4%;">
                        <?= "Dari dana yang dibutuhkan Rp. " . number_format($d['dana_dibutuhkan']);  ?>
                    </p>
                    <div class="progress mb-5">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= $d['dana_terkumpul'] / $d['dana_dibutuhkan'] * 100; ?>%"></div>
                    </div>
                    <?php if ($d['dana_terkumpul'] >= $d['dana_dibutuhkan']) { ?>
                        <a class="btn btn-outline-dark mt-auto">Donasi telah mencapai target</a>
                    <?php } else { ?>
                        <a class="btn btn-outline-dark mt-auto" href="<?= base_url('user/berdonasi/') . $d['id']; ?>">Donasi Sekarang</a>
                    <?php } ?>
                </div>
        </div>
    <?php } ?>
    </div>
</div>