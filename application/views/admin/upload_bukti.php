<div class="container-fluid">
    <?php
    foreach ($upload as $u) {
        $queryUpload = "SELECT * FROM pencairan WHERE pencairan.id_pencairan = '$u[id_pencairan]'";
        $upload = $this->db->query($queryUpload)->result_array();
    }
    ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php foreach ($upload as $u) { ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Upload Bukti</h4>
                    <form action="<?= base_url('admin/uploadBukti_Donasi/') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_laporan" value="<?= $u['id_pencairan'] ?>">
                        <input type="hidden" name="old_pict" value="<?= $u['bukti_pencairan'] ?>">
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="bukti" name="bukti">
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