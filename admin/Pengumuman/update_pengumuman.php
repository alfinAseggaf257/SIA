<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require '../connect.php';
  $kd_pengumuman	    = $_POST['kd_pengumuman'];
  $judul	    = $_POST['judul'];
  $tanggal   = $_POST['tanggal'];
  $keterangan	        = $_POST['keterangan'];

  $query=mysqli_query($koneksi, "UPDATE pengumuman SET judul='$judul', tanggal='$tanggal', keterangan='$keterangan' WHERE kd_pengumuman='$kd_pengumuman'");

  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil di Edit",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=pengumuman";
        }
      })
    </script>

    <?php  
  }else{
    ?>
    <script>
      swal({
        title: 'Gagal Edit!',
        text: "Terjadi kesalahan proses data",
        icon: 'error',
      }).then(function (result) {
        if (true) {
          window.location = "?page=pengumuman";
        }
      })
    </script>

  <?php }?>
</body>