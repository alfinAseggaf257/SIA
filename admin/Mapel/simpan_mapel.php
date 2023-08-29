<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require"../connect.php";
  $kd_mapel   = $_POST['kd_mapel'];
  $nama_mapel   = $_POST['nama_mapel'];
  $kkm          = $_POST['kkm'];
  $keterangan   = $_POST['keterangan'];

  $query = mysqli_query($koneksi,"INSERT INTO mata_pelajaran(kd_mapel, nama_mapel, kkm, keterangan)
   VALUES('$kd_mapel','$nama_mapel','$kkm','$keterangan')");
  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil ditambahkan",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=mapel";
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
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=mapel";
        }
      })
    </script>
  <?php }  
  ?>
</body>
