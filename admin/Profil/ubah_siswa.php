<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require '../connect.php';
  require"function.php";

  $kd_siswa   = $_POST['kd_siswa'];
  $nis        = $_POST['nis'];
  $nama_siswa = $_POST['nama_siswa'];
  $jenkel     = $_POST['jenkel'];
  $agama      = $_POST['agama'];
  $tempat_lahir  = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat     = $_POST['alamat'];
  $no_telp    = $_POST['no_telp'];
  $angkatan = $_POST['angkatan'];
  $username   = $_POST['username'];
  $password   = $_POST['password'];
  $fotoLama   = $_POST['fotoLama'];

  if(empty($password)) {
    $password   = $_POST['passwordLama'];
  }else{
    $password   = md5($_POST['password']);
  }


  if($_FILES['foto']['error'] === 4){
    $foto = $fotoLama;
  }else{
    $foto = uploadSiswa();
  }



  $query=mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama_siswa', jenkel='$jenkel', agama='$agama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telp='$no_telp', angkatan='$angkatan', username='$username', password='$password', foto='$foto' WHERE kd_siswa='$kd_siswa'");

  if ($query){
    ?>
    <script>
      swal({
        title: 'Success',
        text: "Profil Berhasil di Edit",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "index.php";
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
        window.location = "index.php";
      }
    })
  </script>

<?php }?>
</body>