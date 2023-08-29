<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require '../connect.php';
  require"function.php";
  $kd_guru        = $_POST['kd_guru'];
  $nip        = $_POST['nip'];
  $nama_guru       = $_POST['nama_guru'];
  $jenkel     = $_POST['jenkel'];
  $agama      = $_POST['agama'];
  $tempat_lahir  = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat     = $_POST['alamat'];
  $no_telp    = $_POST['no_telp'];
  $kd_mapel = $_POST['kd_mapel'];
  $username   = $_POST['username'];
  $password   = $_POST['password'];
  $fotoLama   =$_POST['fotoLama'];
  

  if(empty($password)) {
    $password   = $_POST['passwordLama'];
  }else{
    $password   = md5($_POST['password']);
  }

  if($_FILES['foto']['error'] === 4){
    $foto = $fotoLama;
  }else{
    $foto = uploadGuru();
  }



  $query=mysqli_query($koneksi, "UPDATE guru SET nama_guru='$nama_guru', jenkel='$jenkel', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telp='$no_telp', kd_mapel='$kd_mapel', username='$username', password='$password', foto='$foto' WHERE kd_guru='$kd_guru'");

  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil di Edit",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=guru";
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
          window.location = "?page=guru";
        }
      })
    </script>

  <?php }?>
</body>
