<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <div class="my-3 p-3 rounded shadow-lg" style="background-color: #4285F4;">
        <h6 class="border-bottom border-gray fs-5 fw-bold pb-2 mb-0 text-white">Pencairan Dana</h6>
        <div class="media text-muted pt-3">
            <?php foreach ($lapor as $l) { ?>
                <?php
                $no_rekening = $l['no_rekening_tujuan'];
                $jumlah_sensor = 4;
                $setelah_angka_ke = 4;

                //ambil 4 angka di tengah yan akan disensor
                $censored = mb_substr($no_rekening, $setelah_angka_ke, $jumlah_sensor);

                //pecah kelompok angka pertama dan terakhir
                $no_rekening2 = explode($censored, $no_rekening);

                //gabung angka perama dan terakhir dengan angka tengah yang telah di sensor
                $no_rekening_new = $no_rekening2[0] . "****" . $no_rekening2[1];
                ?>
                <p class="media-body pb-3 mb-0 fs-6 lh-125 border-bottom border-gray text-white">
                    <?= date('d F Y', $l['tanggal_pencairan']); ?>
                    <strong class="d-block text-white"><?= "Pencairan Dana Rp." . number_format($l['dana_cair']); ?></strong>
                    <?= "Bank :" . $l['bank_tujuan']; ?>
                    <br>
                    <?php echo  "Nomor Rekening :" . $no_rekening_new; ?>
                    <br>
                    <?php echo "Nama penerima :" . $l['nama_penerima_tujuan']; ?>
                    <br>
                    <br>
                </p>
        </div>
        <h6 class="border-bottom border-gray fs-5 fw-bold pb-2 mb-0 text-white mt-2">Detail Pencairan</h6>
        <h5 class="text-light fs-6 mt-3 mb-5 ">
            <?php echo $l['detail_pencairan']; ?>
        </h5>
        <br>
        <h6 class="border-bottom border-gray fs-5 fw-bold pb-2 mb-0 text-white mt-2">Bukti Penyaluran Dana</h6>
        <?php if ($l['bukti_pencairan'] == '') { ?>
            <h5 class="text-light text-center mt-5 mb-5 fw-bold">Bukti Belum Ada</h5>
        <?php } else { ?>
            <div class="d-flex text-muted pt-3">
                <img src="<?= base_url('assets/img/upload/') . $l['bukti_pencairan']; ?>" style="display: block;margin-left: auto;margin-right: auto;" class="img-fluid" alt="Donasi Himsi">
            </div>
        <?php } ?>

    </div>
<?php } ?>
</div>