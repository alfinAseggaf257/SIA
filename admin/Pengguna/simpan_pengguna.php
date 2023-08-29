<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
<?php 
require"../connect.php";
$kd_admin	= $_POST['kd_admin'];
$nama_admin = $_POST['nama_admin'];
$username	= $_POST['username'];
$password	= md5($_POST['password']);
$level	  = $_POST['level'];

$cek_username=mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' ")or die(mysqli_error($koneksi));

if (mysqli_num_rows($cek_username)>0){
  ?>
  <script>
      swal({
        title: 'Gagal disimpan',
        text: "Username Sudah Gunakan || Silahkan Input Ulang!",
        icon: 'error',
      }).then(function (result) {
        if (true) {
          window.location = "?page=pengguna";
        }
      })
    </script>

  <?php  
 }else{

$query = mysqli_query($koneksi,"INSERT INTO admin (kd_admin, nama_admin, username, password, level)
        VALUES('$kd_admin','$nama_admin','$username','$password','$level')");


   ?>
    <script>
      swal({
        title: 'Success',
        text: "Data Berhasil ditambahkan",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=pengguna";
        }
      })
    </script>

    <?php  
 }  
 
?>
</body>