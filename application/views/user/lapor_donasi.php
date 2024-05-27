<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <div class="my-3 p-3 rounded shadow-lg" style="background-color: #4285F4;">
        <h6 class="border-bottom border-gray fs-5 fw-bold pb-2 mb-0 text-white">Pencairan Dana</h6>
        <div class="media text-muted pt-3">
            <?php foreach ($lapor as $l) { ?>
                <?php
                $no_rekening = $l['nomor_rekening'];
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
                    <?= "Ke rekening " . $l['nama_rekening'] . "&nbsp;" . $no_rekening_new . " a/n " . $l['nama_penerima']  ?><br>
                    <br>
                    <?= $l['detail_pencairan'] ?>
                </p>
            <?php } ?>
        </div>
    </div>
</div>