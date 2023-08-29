<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require '../connect.php';
  $kd_nilai     = $_POST['kd_nilai'];
  $kd_dataSiswa     = $_POST['kd_dataSiswa'];
  $semester           = $_POST['semester'];
  $kd_guru     = $_POST['kd_guru'];
  $nilai_tugas1     = $_POST['nilai_tugas1'];
  $nilai_tugas2     = $_POST['nilai_tugas2'];
  $nilai_tugas3     = $_POST['nilai_tugas3'];
  $nilai_tugas4     = $_POST['nilai_tugas4'];
  $nilai_tugas5     = $_POST['nilai_tugas5'];
  $nilai_uts     = $_POST['nilai_uts'];
  $nilai_uas     = $_POST['nilai_uas'];

 $tn=$nilai_tugas1+$nilai_tugas2+$nilai_tugas3+$nilai_tugas4+$nilai_tugas5+$nilai_uts+$nilai_uas;
  $total_nilai=$tn/7;
  
  $query=mysqli_query($koneksi, "UPDATE nilai SET kd_dataSiswa='$kd_dataSiswa', semester='$semester', kd_guru='$kd_guru', nilai_tugas1='$nilai_tugas1', nilai_tugas2='$nilai_tugas2', nilai_tugas3='$nilai_tugas3', nilai_tugas4='$nilai_tugas4', nilai_tugas5='$nilai_tugas5', nilai_uts='$nilai_uts', nilai_uas='$nilai_uas', total_nilai='$total_nilai' WHERE kd_nilai='$kd_nilai'");

  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil di Edit",
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
        title: 'Gagal Edit!',
        text: "Terjadi kesalahan proses data",
        icon: 'error',
      }).then(function (result) {
        if (true) {
          window.location = "?page=nilai";
        }
      })
    </script>

  <?php }?>
</body>