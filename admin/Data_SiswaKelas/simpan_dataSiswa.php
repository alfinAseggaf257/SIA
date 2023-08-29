<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require"../connect.php";
  $kd_dataSiswa   = $_POST['kd_dataSiswa'];
  $kd_kelas   = $_POST['kd_kelas'];
  $kd_siswa   = $_POST['kd_siswa'];
  $cek_siswa_kelas=mysqli_query($koneksi, "SELECT IFNULL('kd_siswa',0) AS kd_siswa FROM data_siswakelas WHERE kd_siswa='$kd_siswa' ")or die(mysqli_error($koneksi));
  if(mysqli_num_rows($cek_siswa_kelas)>0) {
    ?>
    <script>
      swal({
        title: 'Data Gagal disimpan!',
        text: "Siswa yang diinputkan telah memiliki kelas",
        icon: 'error',
      }).then(function (result) {
        if (true) 
        { window.location = "?page=siswa_kelas"; }
      })
    </script>
    <?php     
  }else{
    $query = mysqli_query($koneksi,"INSERT INTO  data_siswakelas(kd_dataSiswa,kd_kelas, kd_siswa)
     VALUES('$kd_dataSiswa','$kd_kelas','$kd_siswa')");
    if ($query){
      ?>
      <script>
        swal({
          title: 'Success',
          text: "Data Berhasil ditambahkan",
          icon: 'success',
        }).then(function (result) {
          if (true) 
            { window.location = "?page=siswa_kelas"; }
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
          if (true) 
            { window.location = "?page=siswa_kelas"; }
        })
      </script>
      <?php 
    }  
  }
  ?>
</body>
