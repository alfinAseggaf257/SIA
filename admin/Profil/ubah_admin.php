<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
    <?php 
    require '../connect.php';
    $kd_admin = $_POST['kd_admin'];
    $nama_admin	  = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($password)) {
        $password   = $_POST['passwordLama'];
    }else{
        $password   = md5($_POST['password']);
    }

    $query=mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', username='$username', password='$password' WHERE kd_admin='$kd_admin'");

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