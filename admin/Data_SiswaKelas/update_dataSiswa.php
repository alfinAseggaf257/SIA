<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require '../connect.php';
  $kd_dataSiswa     = $_POST['kd_dataSiswa'];
  $kd_kelas       = $_POST['kd_kelas'];
  $kd_siswa         = $_POST['kd_siswa'];

  $query=mysqli_query($koneksi, "UPDATE data_siswakelas SET kd_kelas='$kd_kelas', kd_siswa='$kd_siswa' WHERE kd_dataSiswa='$kd_dataSiswa'");

  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil di Edit",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=siswa_kelas";
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
          window.location = "?page=siswa_kelas";
        }
      })
    </script>

  <?php }?>
</body>