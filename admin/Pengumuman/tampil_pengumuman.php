<div class="container-fluid px-4">
  <h3>Pengumuman</h3>
  <!-- KONTEN TENGAH -->
  <div class="col-lg-12">
    <div class="card rounded">
      <div class="card-header ">
        List Data Pengumuman
      </div>
      <div class="card-body">
        <?php if ($_SESSION['level']=="Admin") {?>
          <a href="?page=tambah_pengumuman" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;">   <i class="fa fa-plus"></i> Tambah</a>
          <br>
        <?php } ?>
        <div class="card-title mb-4">

        </div>

        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
          <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
            <?php 
            require'../connect.php';
            require'function.php';
            $no=1;
            $query=mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY kd_pengumuman DESC ")or die(mysqli_error());
            while($data=mysqli_fetch_array($query)): 
              ?>
              <div class="col">
                <div class="card h-100 shadow"> <img src="../assets/img/info.png" class="card-img-top" alt="...">
                  <div class="card-body" >
                    <div class="clearfix mb-3">
                      <span><?= tgl($data['tanggal']); ?></span>
                      <h5><?= $data['judul']; ?></h5>
                    </div>
                    <div class="text-center my-4" > <a href="?page=detail_pengumuman&kd_pengumuman=<?php echo $data['kd_pengumuman']; ?>" class="btn btn-primary">Detail Info</a> </div>

                    <?php if ($_SESSION['level']=="Admin"): ?>  
                      <div class="text-center my-4" >
                        <a href="?page=edit_pengumuman&kd_pengumuman=<?php echo $data['kd_pengumuman']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>
                        <a href="#hapus" data-href="index.php?page=hapus_pengumuman&kd_pengumuman=<?php echo $data['kd_pengumuman']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link"><img name="delete" src="../assets/img/action/delete.png"></a>
                      </div>
                    <?php endif ?>

                  </div>
                </div>
              </div>

            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- tutup KONTEN TENGAH -->


  <!-- Modal -->
  <div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin ingin menghapus data ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <a name="hapus_kd_pengumuman" class="btn btn-danger btn-yes">YES</a>
        </div>
      </div>
    </div>
  </div>
  <!-- tutupmodal -->


