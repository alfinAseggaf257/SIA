<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require"../connect.php";
  $kd_pengumuman= $_POST['kd_pengumuman'];
  $judul        = $_POST['judul'];
  $tanggal      = $_POST['tanggal'];
  $keterangan   = $_POST['keterangan'];
  

  $query = mysqli_query($koneksi,"INSERT INTO  pengumuman(kd_pengumuman, judul, tanggal, keterangan)
   VALUES('$kd_pengumuman','$judul','$tanggal','$keterangan')");
  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil ditambahkan",
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
      title: 'Data Gagal disimpan!',
      text: "Terjadi kesalahan proses penyimpanan",
      icon: 'error',
    }).then(function (result) {
      if (true) {
        window.location = "?page=pengumuman";
      }
    })
  </script>
  <?php 
}  

?>
</body>
