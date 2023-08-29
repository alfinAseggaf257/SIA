<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require"../connect.php";
  $kd_nilai	  = $_POST['kd_nilai'];
  $kd_dataSiswa   = $_POST['kd_dataSiswa'];
  $semester	      = $_POST['semester'];
  $kd_guru	      = $_POST['kd_guru'];
  $nilai_tugas1	  = $_POST['nilai_tugas1'];
  $nilai_tugas2   = $_POST['nilai_tugas2'];
  $nilai_tugas3   = $_POST['nilai_tugas3'];
  $nilai_tugas4   = $_POST['nilai_tugas4'];
  $nilai_tugas5   = $_POST['nilai_tugas5'];
  $nilai_uts      = $_POST['nilai_uts'];
  $nilai_uas      = $_POST['nilai_uas'];
  $tn=$nilai_tugas1+$nilai_tugas2+$nilai_tugas3+$nilai_tugas4+$nilai_tugas5+$nilai_uts+$nilai_uas;
  $total_nilai=$tn/7;
  $cek_siswa_kelas=mysqli_query($koneksi, "SELECT IFNULL('kd_dataSiswa',0) AS kd_dataSiswa FROM nilai WHERE kd_dataSiswa='$kd_dataSiswa' AND kd_guru='$kd_guru' AND semester='$semester' ")or die(mysqli_error($koneksi));

  if(mysqli_num_rows($cek_siswa_kelas)>0) {
    ?>
    <script>
      swal({
        title: 'Data Gagal disimpan!',
        text: "Anda Telah menginputkan nilai siswa yang dipilih",
        icon: 'error',
      }).then(function (result) {
        if (true) {
          window.location = "?page=nilai";
        }
      })
    </script>
    <?php     
  }else{
    $query = mysqli_query($koneksi,"INSERT INTO  nilai(kd_nilai, kd_dataSiswa, semester, kd_guru, nilai_tugas1, nilai_tugas2, nilai_tugas3, nilai_tugas4, nilai_tugas5, nilai_uts, nilai_uas, total_nilai )
     VALUES('$kd_nilai','$kd_dataSiswa','$semester','$kd_guru','$nilai_tugas1','$nilai_tugas2','$nilai_tugas3','$nilai_tugas4','$nilai_tugas5','$nilai_uts','$nilai_uas','$total_nilai')");
    if ($query){
      ?>
      <script>
        swal({
          title: 'Success',
          text: "Data Berhasil ditambahkan",
          icon: 'success',
        }).then(function (result) {
          if (true) {
            window.location = "?page=nilai";
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
          window.location = "?page=nilai";
        }
      })
    </script>
    <?php 
    }	
  }
  ?>
</body>
