 <div class="container-fluid" style="margin-top: 80px;">
     <div class="row">
         <div class="col-lg-9">
             <?php
                foreach ($bayar as $b) {
                ?>
                 <form action="<?= base_url('user/bayar/') ?>" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="old_bukti" value="<?= $b['bukti'] ?>">
                     <div class="form-group row m-3">
                         <label for="idTransaksi" class="col-sm-2 col-form-label">IDTRANSAKSI</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control form-control-user" id="idTransaksi" name="idTransaksi" value="<?= $b['id_transaksi']; ?>" readonly>
                         </div>
                     </div>
                     <div class="form-group row m-3">
                         <label for="dana" class="col-sm-2 col-form-label">Dana Didonasikan</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control form-control-user" id="dana" name="dana" value="<?= "Rp. " . number_format($b['dana_didonasikan']); ?>" readonly>
                         </div>
                     </div>
                 <?php } ?>
                 <?php
                    foreach ($pembayaran as $p) {
                    ?>
                     <div class="form-group row m-3">
                         <label for="nama_bank" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control form-control-user" id="nama_bank" name="nama_bank" value="<?= $p['nama_bank']; ?>" readonly>
                         </div>
                     </div>
                     <div class="form-group row m-3">
                         <label for="rekening" class="col-sm-2 col-form-label">No.Rekening</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control form-control-user" id="rekening" name="rekening" value="<?= $p['rekening']; ?>" readonly>
                         </div>
                     </div>
                     <div class="form-group row m-3">
                         <label for="pemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                         <div class="col-sm-10">
                             <input type="text" class="form-control form-control-user" id="pemilik" name="pemilik" value="<?= $p['pemilik_rekening']; ?>" readonly>
                         </div>
                     </div>
                     <div class="form-group row m-3">
                         <label for="gambar" class="col-sm-2 col-form-label">Silahkan Upload Bukti Transfer</label>
                         <div class="col-sm-10">
                             <input type="file" class="form-control form-control-user" id="gambar" name="gambar">
                         </div>
                     </div>
                     <div class="form-group row justify-content-end m-3">
                         <div class="col-sm-10">
                             <button type="submit" class="btn btn-primary">Kirim</button>
                         </div>
                     </div>
                 </form>
             <?php
                    }
                ?>
         </div>
     </div>
 </div>