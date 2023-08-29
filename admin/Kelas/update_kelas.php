<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require '../connect.php';
  $kd_kelas	    = $_POST['kd_kelas'];
  $nama_kelas	    = $_POST['nama_kelas'];
  $tahun_ajaran   = $_POST['tahun_ajaran'];
  $kd_guru	      = $_POST['kd_guru'];

  $query=mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', tahun_ajaran='$tahun_ajaran', kd_guru='$kd_guru' WHERE kd_kelas='$kd_kelas'");

  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil di Edit",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=kelas";
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
          window.location = "?page=kelas";
        }
      })
    </script>

  <?php }?>
</body>
