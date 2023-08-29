<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
    <?php 
    require '../connect.php';
    $kd_mapel     = $_POST['kd_mapel'];
    $nama_mapel     = $_POST['nama_mapel'];
    $kkm           = $_POST['kkm'];
    $keterangan     = $_POST['keterangan'];

    $query=mysqli_query($koneksi, "UPDATE mata_pelajaran SET nama_mapel='$nama_mapel', kkm='$kkm', keterangan='$keterangan' WHERE kd_mapel='$kd_mapel'");

    if ($query){
        ?>
        <script>
          swal({
            title: 'Success',
            text: "Data Berhasil di Edit",
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
          title: 'Gagal Edit!',
          text: "Terjadi kesalahan proses data",
          icon: 'error',
      }).then(function (result) {
          if (true) {
            window.location = "?page=mapel";
        }
    })
</script>

<?php }?>
</body>